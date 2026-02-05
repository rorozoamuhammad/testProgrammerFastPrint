<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false; // Karena tabel di soal tidak ada created_at

    protected $fillable = ['nama_kategori'];
}
