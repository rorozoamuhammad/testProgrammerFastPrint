<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $primaryKey = 'id_produk';
    public $timestamps = false;

    // Masukkan semua kolom yang akan diisi dari API maupun Form
    protected $fillable = [
        'id_produk', 
        'nama_produk', 
        'harga', 
        'kategori_id', 
        'status_id'
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id', 'id_status');
    }

    public $incrementing = true;
}
