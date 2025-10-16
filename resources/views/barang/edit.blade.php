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
        <a href="{{ route('barang.index') }}" class="block px-6 py-3 rounded-lg bg-sky-500/90">Barang</a>
        <a href="{{ route('kategori.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition">Kategori</a>
        <a href="{{ route('peminjaman.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition">Peminjaman</a>
      </nav>
    </div>

    <div class="p-6 border-t border-sky-400/40">
      <button onclick="document.getElementById('logout-form').submit()" 
              class="w-full bg-white/20 hover:bg-white/30 py-2 rounded-lg font-semibold shadow-md transition">
        Logout
      </button>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    </div>
  </aside>

  <!-- Overlay (Mobile) -->
  <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/40 md:hidden z-40"></div>

  <!-- Main Content -->
  <main class="flex-1 p-8 overflow-x-auto">
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 flex items-center">
          <span class="text-3xl mr-2">✏</span> Edit Barang
        </h2>
        <a href="{{ route('barang.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 text-sm font-semibold">
          ← Kembali
        </a>
      </div>

      <!-- Pesan error -->
      @if ($errors->any())
        <div class="bg-rose-100 text-rose-800 p-4 rounded-lg mb-6">
          <strong>Terjadi kesalahan:</strong>
          <ul class="list-disc pl-5 mt-2">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="kode_barang" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang"
              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300"
              value="{{ old('kode_barang', $barang->kode_barang) }}" readonly>
          </div>

          <div>
            <label for="nama_barang" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang"
              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white"
              value="{{ old('nama_barang', $barang->nama_barang) }}" required>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div>
            <label for="kategori_id" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Kategori</label>
            <select name="kategori_id" id="kategori_id"
              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white" required>
              @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ old('kategori_id', $barang->kategori_id) == $k->id ? 'selected' : '' }}>
                  {{ $k->nama_kategori }}
                </option>
              @endforeach
            </select>
          </div>

          <div>
            <label for="jumlah" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" min="0"
              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white"
              value="{{ old('jumlah', $barang->jumlah) }}" required>
          </div>

          <div>
            <label for="satuan" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Satuan</label>
            <input type="text" name="satuan" id="satuan"
              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white"
              value="{{ old('satuan', $barang->satuan) }}" required>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="kondisi" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Kondisi</label>
            <select name="kondisi" id="kondisi"
              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">
              <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
              <option value="Rusak" {{ old('kondisi', $barang->kondisi) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
              <option value="Hilang" {{ old('kondisi', $barang->kondisi) == 'Hilang' ? 'selected' : '' }}>Hilang</option>
            </select>
          </div>

          <div>
            <label for="gambar" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Gambar (opsional)</label>
            <input type="file" name="gambar" id="gambar" accept=".jpg,.jpeg,.png"
              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">

            @if($barang->gambar)
              <div class="mt-3">
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">Gambar Saat Ini:</p>
                <img src="{{ asset($barang->gambar) }}" alt="Gambar {{ $barang->nama_barang }}" class="rounded-lg border w-40 shadow">
              </div>
            @endif
          </div>
        </div>

        <div>
          <label for="keterangan" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Keterangan</label>
          <textarea name="keterangan" id="keterangan" rows="4"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">{{ old('keterangan', $barang->keterangan) }}</textarea>
        </div>

        <div class="flex justify-end items-center gap-4 mt-8">
          <a href="{{ route('barang.index') }}"
             class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 px-6 py-2 rounded-lg font-semibold transition">
            Kembali
          </a>
          <button type="submit"
                  class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition-all transform hover:-translate-y-1">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
