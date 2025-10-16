    @extends('layouts.app')

    @section('content')
    <div class="flex min-h-screen w-full bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 text-gray-800 dark:text-gray-100">

    <!-- Sidebar -->
    <aside class="hidden md:flex flex-col justify-between w-64 bg-gradient-to-b from-sky-600 to-indigo-600 text-white shadow-2xl">
        <div>
        <div class="flex items-center px-6 py-5 border-b border-sky-400/40">
            <span class="text-3xl">📦</span>
            <h1 class="text-xl font-bold ml-2">Inventaris</h1>
        </div>
        <nav class="mt-4 space-y-1">
            <a href="{{ route('barang.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition">Barang</a>
            <a href="{{ route('kategori.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition bg-sky-500/90">Kategori</a>
            <a href="{{ route('peminjaman.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition">Peminjaman</a>
        </nav>
        </div>
        <div class="p-6 border-t border-sky-400/40">
        <button onclick="document.getElementById('logout-form').submit()" class="w-full bg-white/20 hover:bg-white/30 py-2 rounded-lg font-semibold shadow-md transition">Logout</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-x-auto">
        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 flex items-center">
            <span class="text-3xl mr-2">➕</span> Tambah Kategori
            </h2>
            <a href="{{ route('kategori.index') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 text-sm font-semibold">← Kembali</a>
        </div>

        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
            <label class="block text-sm font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}"
                    class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>

            <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('kategori.index') }}" 
                class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 px-5 py-2 rounded-lg font-semibold transition">
                Batal
            </a>
            <button type="submit" 
                    class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold px-6 py-2 rounded-lg shadow-lg transition-all transform hover:-translate-y-0.5">
                Simpan
            </button>
            </div>
        </form>
        </div>
    </main>
    </div>
    @endsection
