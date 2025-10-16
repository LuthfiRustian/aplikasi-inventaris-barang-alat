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

    // Relasi ke tabel barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
