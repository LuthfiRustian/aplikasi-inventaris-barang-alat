<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('barang')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('peminjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'peminjam' => 'required|string|max:150',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'required|in:Dipinjam,Dikembalikan',
        ]);

        Peminjaman::create([
            'barang_id' => $request->barang_id,
            'peminjam' => $request->peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
