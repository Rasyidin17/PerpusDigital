<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'buku_id',
        'pinjam',
        'kembali',
        // 'returned_at',
        'status',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id', 'id'); // Relasi dengan tabel Book
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Relasi dengan tabel User
    }
}
