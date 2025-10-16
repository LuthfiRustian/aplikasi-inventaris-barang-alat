@extends('layouts.app')
@section('content')
<div x-data="{ open: false }" 
     class="flex min-h-screen w-full bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 text-gray-800 dark:text-gray-100">

  <!-- Sidebar -->
  <aside 
    :class="open ? 'translate-x-0' : '-translate-x-full'"
    class="fixed md:static md:translate-x-0 transform top-0 left-0 w-64 h-screen bg-gradient-to-b from-sky-600 to-indigo-600 text-white shadow-2xl transition-transform duration-300 z-50 flex flex-col justify-between">
    
    <div>
      <div class="flex items-center px-6 py-5 border-b border-sky-400/40">
        <span class="text-3xl">📦</span>
        <h1 class="text-xl font-bold ml-2">Inventaris</h1>
      </div>

      <nav class="mt-4 space-y-1">
        <a href="{{ route('barang.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition {{ request()->is('barang*') ? 'bg-sky-500/90' : '' }}">Barang</a>
        <a href="{{ route('kategori.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition {{ request()->is('kategori*') ? 'bg-sky-500/90' : '' }}">Kategori</a>
        <a href="{{ route('peminjaman.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition {{ request()->is('peminjaman*') ? 'bg-sky-500/90' : '' }}">Peminjaman</a>
      </nav>
    </div>

    <div class="p-6 border-t border-sky-400/40">
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full bg-white/20 hover:bg-white/30 py-2 rounded-lg font-semibold shadow-md transition">
          Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Overlay (Mobile) -->
  <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/40 md:hidden z-40"></div>

  <!-- Main Content -->
  <main class="flex-1 p-6 overflow-x-auto">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 flex items-center">
        <span class="text-3xl mr-2">📘</span> Daftar Peminjaman Barang
      </h2>
      <a href="{{ route('peminjaman.create') }}"
         class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold px-5 py-2 rounded-lg shadow-lg transition-all transform hover:-translate-y-0.5">
        + Tambah Peminjaman
      </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
      <div class="overflow-x-auto">
        <table class="w-full border-collapse text-sm md:text-base">
          <thead>
            <tr class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
              <th class="px-4 py-3 text-left rounded-tl-lg">ID</th>
              <th class="px-4 py-3 text-left">Peminjam</th>
              <th class="px-4 py-3 text-left">Barang</th>
              <th class="px-4 py-3 text-left">Tanggal Pinjam</th>
              <th class="px-4 py-3 text-left">Tanggal Kembali</th>
              <th class="px-4 py-3 text-left">Status</th>
              <th class="px-4 py-3 text-left rounded-tr-lg">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($peminjaman as $pinjam)
              <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <td class="px-4 py-3">{{ $pinjam->id }}</td>
                <td class="px-4 py-3 font-semibold">{{ $pinjam->peminjam }}</td>
                <td class="px-4 py-3">{{ $pinjam->barang->nama_barang ?? '-' }}</td>
                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($pinjam->tanggal_pinjam)->format('d M Y') }}</td>
                <td class="px-4 py-3">
                  {{ $pinjam->tanggal_kembali ? \Carbon\Carbon::parse($pinjam->tanggal_kembali)->format('d M Y') : '-' }}
                </td>
                <td class="px-4 py-3">
                  <span class="px-3 py-1 rounded-full text-xs md:text-sm font-semibold
                    {{ $pinjam->status == 'Dikembalikan' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ $pinjam->status }}
                  </span>
                </td>
                <td class="px-4 py-3">
                  <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-rose-600 hover:text-rose-800 font-medium">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center py-6 text-gray-500 dark:text-gray-400">Belum ada data peminjaman.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
