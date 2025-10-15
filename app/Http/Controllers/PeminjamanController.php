<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Tampilkan semua peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with('barang.kategori')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // Form tambah peminjaman
    public function create()
    {
        $barang = Barang::where('jumlah', '>', 0)->get();
        return view('peminjaman.create', compact('barang'));
    }

    // Simpan data peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'peminjam' => 'required|string|max:150',
            'tanggal_pinjam' => 'required|date',
        ]);

        Peminjaman::create([
            'barang_id' => $request->barang_id,
            'peminjam' => $request->peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'Dipinjam',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    // Update status peminjaman jadi dikembalikan
    public function update($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => 'Dikembalikan',
            'tanggal_kembali' => now(),
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Barang telah dikembalikan.');
    }

    // Hapus data peminjaman
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman dihapus.');
}
}
