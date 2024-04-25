<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Categories::orderBy('name', 'asc')->get();
        $userId = auth()->id();
        $borrowings = Borrowing::where('user_id', $userId)
            ->with('book') // Eager load data buku yang terkait
            ->get();
    
        // Verifikasi batas waktu pengembalian
        foreach ($borrowings as $borrowing) {
            $tanggalSekarang = Carbon::now();
            $batasWaktuPengembalian = Carbon::parse($borrowing->kembali);
            
            if ($tanggalSekarang->greaterThan($batasWaktuPengembalian)) {
                // Update status peminjaman jika melewati batas waktu
                $borrowing->status = 'Telat Mengembalikan';
                $borrowing->save();
            }
        }
    
        return view('customer.mybook', compact('borrowings', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('customer.book_detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookDetail $bookDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookDetail $bookDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookDetail $bookDetail)
    {
        //
    }
}
