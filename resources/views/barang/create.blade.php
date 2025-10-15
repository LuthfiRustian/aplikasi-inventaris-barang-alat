@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 px-4 py-10">
  <div class="bg-white dark:bg-gray-900 shadow-xl rounded-2xl w-full max-w-2xl p-8">
    
    <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-white flex items-center justify-center gap-2">
      📦 Tambah Barang
    </h2>

    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Kode Barang</label>
        <input type="text" name="kode_barang" value="{{ old('kode_barang') }}"
          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white outline-none" required>
      </div>

      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}"
          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white outline-none" required>
      </div>

      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Kategori</label>
        <select name="kategori_id" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white" required>
          <option value="">-- Pilih Kategori --</option>
          @foreach($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
          @endforeach
        </select>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Jumlah</label>
          <input type="number" name="jumlah" value="{{ old('jumlah') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white outline-none" required>
        </div>

        <div>
          <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Satuan</label>
          <input type="text" name="satuan" value="{{ old('satuan') }}"
            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white outline-none" required>
        </div>
      </div>

      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Kondisi</label>
        <select name="kondisi" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">
          <option value="Baik">Baik</option>
          <option value="Rusak">Rusak</option>
          <option value="Hilang">Hilang</option>
        </select>
      </div>

      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Upload Gambar</label>
        <input type="file" name="gambar"
          class="block w-full text-sm text-gray-600 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer">
      </div>

      <div>
        <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Keterangan</label>
        <textarea name="keterangan" rows="3"
          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white outline-none">{{ old('keterangan') }}</textarea>
      </div>

      <div class="flex justify-between items-center mt-8">
        <a href="{{ route('barang.index') }}" class="text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-white transition">
          ← Kembali
        </a>

        <button type="submit"
          class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition-all transform hover:-translate-y-1">
          Simpan Barang
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
