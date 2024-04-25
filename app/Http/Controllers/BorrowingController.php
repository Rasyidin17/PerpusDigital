<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::with('book')->with('user')->latest()->paginate(5);

        // Periksa tanggal kembali untuk setiap peminjaman
        foreach ($borrowings as $borrowing) {
            if ($borrowing->status === 'pinjam') {
                $tanggalKembali = Carbon::parse($borrowing->kembali);
                if (Carbon::now()->greaterThan($tanggalKembali)) {
                    // Tanggal kembali sudah lewat, atur status menjadi 'Telat Mengembalikan'
                    $borrowing->status = 'Telat Mengembalikan';
                }
            }
        }
        return view('admin.borrowings.index', compact('borrowings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function generatePdf()
    {
        $barangs = Borrowing::with('book')->with('user')->get();
        $pdf = FacadePdf::loadView('admin.export-pdf', ['barangs' => $barangs]);
        // dd($pdf);
        return $pdf->download('barangs' .Carbon::now()->timestamp. '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.borrowings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Periksa apakah buku sudah dipinjam oleh pengguna dan belum dikembalikan
        $existingBorrowing = Borrowing::where('user_id', Auth::id())
            ->where('buku_id', $request->input('book_id'))
            ->where('status', 'pinjam')
            ->first();

        if ($existingBorrowing) {
            // Buku sudah dipinjam oleh pengguna dan belum dikembalikan
            return redirect()->back()->with('error', 'Anda sudah meminjam buku ini.');
        }

        // Menghitung tanggal peminjaman dan pengembalian
        $tanggalPeminjaman = Carbon::now();
        $tanggalPengembalian = $tanggalPeminjaman->copy()->addDays(7);

        // Membuat entri peminjaman baru
        $borrowing = new Borrowing();
        $borrowing->user_id = Auth::id(); 
        $borrowing->buku_id = $request->input('book_id'); 
        $borrowing->pinjam = $tanggalPeminjaman;
        $borrowing->kembali = $tanggalPengembalian;
        $borrowing->status = 'pinjam';
        $borrowing->save();

        // Increment borrowed_count pada buku yang dipinjam
        $book = Book::find($request->input('book_id'));
        $book->increment('borrowed_count');

        // Redirect dengan pesan sukses
        return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dipinjam.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        // Periksa apakah buku sedang dipinjam
        if ($borrowing->status === 'pinjam') {
            // Ubah status peminjaman menjadi 'kembali'
            $borrowing->status = 'kembali';
            $borrowing->save();

            // Kurangi jumlah buku yang dipinjam di tabel Book
            $book = $borrowing->book;
            $book->decrement('borrowed_count');

            return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dikembalikan.');
        }

        // Jika buku telah dikembalikan sebelumnya, kembalikan dengan pesan bahwa buku telah dikembalikan sebelumnya
        return redirect()->route('borrowings.index')->with('error', 'Buku telah dikembalikan sebelumnya.');
    }

}
