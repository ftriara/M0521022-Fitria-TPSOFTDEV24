<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'kode_buku',
        'judul',
        'penerbit',
        'tahun_terbit',
    ];

    public function auth()
    {
        return $this->belongsTo(Author::class);
    }

    public function cat()
    {
        return $this->hasMany(Category::class);
    }
}
