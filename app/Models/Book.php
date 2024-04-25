<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'kategori',
        'sinopsis',
        'isbn',
        'tahun_terbit',
        'img',
        'pdf',
        // 'borrowed_count',
    ];

    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }

    public function borrowCount()
    {
        return $this->hasMany('App\Models\Borrowing')->count();
    }

    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class, 'buku_id');
    }

    public function currentBorrowedCount()
    {
        return Borrowing::where('buku_id', $this->id)
            ->whereNull('returned_at')
            ->count();
    }

}
