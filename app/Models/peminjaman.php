<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'barang_id',
        'peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    // Relasi ke Kategori lewat Barang
    public function kategori()
    {
        return $this->hasOneThrough(
            Kategori::class,
            Barang::class,
            'id',           // Foreign key di barang
            'id',           // Foreign key di kategori
            'barang_id',    // Foreign key di peminjaman
            'kategori_id'   // Foreign key di barang
);
}
}
