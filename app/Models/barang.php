<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori_id',
        'jumlah',
        'satuan',
        'kondisi',
        'gambar',
        'keterangan',
    ];

    // Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke Peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'barang_id');
    }
}
