<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mostBorrowedBooks = Book::withCount('borrowings')
            ->orderByDesc('borrowings_count')
            ->take(5)
            ->get();

        return view('landing', compact('mostBorrowedBooks'));
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $book = DB::table('books')->count();
        $user = DB::table('users')->count();
        $borrowing = DB::table('borrowings')->count();
        return view('admin.dashboard', compact('book', 'user', 'borrowing'));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        $book = DB::table('books')->count();
        $user = DB::table('users')->count();
        $borrowing = DB::table('borrowings')->count();
        return view('admin.dashboard', compact('book', 'user', 'borrowing'));
    }
}
