<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Carbon;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);

        return view('admin.books.index', compact('books'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function generatePdf()
    {
        $book = Book::all();
        $pdf = FacadePdf::loadView('admin.books.book-pdf', ['book' => $book]);
        return $pdf->download('book' .Carbon::now()->timestamp. '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Categories::all();

        return view('admin.books.create', compact('category'));
    }

        /**
     * Generate a random ISBN-13.
     */
    private function generateISBN()
    {
        $prefix = '978'; // Prefix untuk ISBN-13
        $countryCode = '3'; // Kode negara atau bahasa (misalnya, 3 untuk Jerman)
        $publisherCode = '16'; // Kode penerbit (misalnya, 16 untuk kode penerbit tertentu)
        $productCode = '148410'; // Kode produk
        $registrationNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT); // Nomor registrasi (5 digit)
        $checksum = $this->calculateISBNChecksum($prefix . $countryCode . $publisherCode . $productCode . $registrationNumber); // Hitung digit checksum
        return $prefix . '-' . $countryCode . '-' . $publisherCode . '-' . $productCode . '-' . $registrationNumber . '-' . $checksum;
    }

    /**
     * Calculate the checksum digit for ISBN-13.
     */
    private function calculateISBNChecksum($isbn)
    {
        $isbnLength = strlen($isbn);
        $sum = 0;

        for ($i = 0; $i < $isbnLength; $i++) {
            $digit = (int)$isbn[$i];
            $weight = $i % 2 === 0 ? 1 : 3;
            $sum += $digit * $weight;
        }

        $checksum = 10 - ($sum % 10);
        return $checksum === 10 ? 0 : $checksum;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required',
            'sinopsis' => 'required',
            'tahun_terbit' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
            'pdf' => 'required|mimes:pdf|max:50000',
        ]);

        if ($request->hasFile('img')) {
            $imageName = time().'.'.$request->img->getClientOriginalExtension();
            $request->img->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }

        if ($request->hasFile('pdf')) {
            $pdfName = time().'.'.$request->pdf->getClientOriginalExtension();
            $request->pdf->storeAs('public/pdfs', $pdfName);
        } else {
            $pdfName = null;
        }    

        $book = new Book([
            'judul' => $request->get('judul'),
            'penulis' => $request->get('penulis'),
            'penerbit' => $request->get('penerbit'),
            'kategori' => $request->get('kategori'),
            'sinopsis' => $request->get('sinopsis'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'img' => $imageName,
            'pdf' => $pdfName,
            'isbn' => $this->generateISBN(),
        ]);
    
        $book->save();
        Alert::toast('Buku berhasil di tambahkan!', 'success');
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
{
    // $request->validate([
    //     'judul' => 'required',
    //     'penulis' => 'required',
    //     'penerbit' => 'required',
    //     'kategori' => 'required',
    //     'sinopsis' => 'required',
    //     'tahun_terbit' => 'required',
    //     // 'img' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
    //     // 'pdf' => 'mimetypes:application/pdf|max:50000',
    // ]);
    $validator = Validator::make($request->all(), [
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'kategori' => 'required',
        'sinopsis' => 'required',
        'tahun_terbit' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
        'pdf' => 'mimetypes:application/pdf|max:50000',
    ]);

    // dd($validator->errors());

    if ($request->hasFile('img')) {
        // Hapus gambar lama jika ada
        if ($book->img) {
            Storage::delete('public/images/' . $book->img);
        }
        // Simpan gambar baru
        $imageName = time() . '.' . $request->img->getClientOriginalExtension();
        $request->img->storeAs('public/images', $imageName);
    } else {
        $imageName = $book->img; // Jika tidak ada file gambar yang diunggah, gunakan nama gambar yang lama
    }

    if ($request->hasFile('pdf')) {
        // Hapus PDF lama jika ada
        if ($book->pdf) {
            Storage::delete('public/pdfs/' . $book->pdf);
        }
        // Simpan PDF baru
        $pdfName = time() . '.' . $request->pdf->getClientOriginalExtension();
        $request->pdf->storeAs('public/pdfs', $pdfName);
    } else {
        $pdfName = $book->pdf; // Jika tidak ada file PDF yang diunggah, gunakan nama PDF yang lama
    }

    // Update data buku dengan data baru
    $book->update([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'kategori' => $request->kategori,
        'sinopsis' => $request->sinopsis,
        'tahun_terbit' => $request->tahun_terbit,
        'img' => $imageName,
        'pdf' => $pdfName,
    ]);

    Alert::toast('Buku berhasil di ubah!', 'success');
    return redirect()->route('books.index')->with('success', 'Edit buku berhasil!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil Dihapus!');
    }
}
