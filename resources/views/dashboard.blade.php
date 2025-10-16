@extends('layouts.app')

@section('content')
<div class="flex min-h-screen w-full bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 text-gray-800 dark:text-gray-100">

  <!-- Sidebar -->
  <aside class="hidden md:flex flex-col justify-between w-64 bg-gradient-to-b from-sky-600 to-indigo-600 text-white shadow-2xl">
    <div>
      <div class="flex items-center px-6 py-5 border-b border-sky-400/40">
        <span class="text-3xl">📊</span>
        <h1 class="text-xl font-bold ml-2">Inventaris</h1>
      </div>
      <nav class="mt-4 space-y-1">
        <a href="{{ route('dashboard') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition bg-sky-500/90">Dashboard</a>
        <a href="{{ route('barang.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition">Barang</a>
        <a href="{{ route('kategori.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition">Kategori</a>
        <a href="{{ route('peminjaman.index') }}" class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition">Peminjaman</a>
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

  <!-- Main Content -->
  <main class="flex-1 p-8 overflow-x-auto">
    <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-gray-100 flex items-center">
      <span class="text-4xl mr-2">📈</span> Dashboard Inventaris
    </h2>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
      <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-2xl shadow-lg p-6 flex flex-col items-center">
        <p class="text-lg font-semibold mb-1">Total Barang</p>
        <h3 class="text-4xl font-bold">{{ $totalBarang }}</h3>
      </div>

      <div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-2xl shadow-lg p-6 flex flex-col items-center">
        <p class="text-lg font-semibold mb-1">Total Kategori</p>
        <h3 class="text-4xl font-bold">{{ $totalKategori }}</h3>
      </div>

      <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-2xl shadow-lg p-6 flex flex-col items-center">
        <p class="text-lg font-semibold mb-1">Peminjaman Aktif</p>
        <h3 class="text-4xl font-bold">{{ $peminjamanAktif }}</h3>
      </div>

      <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-2xl shadow-lg p-6 flex flex-col items-center">
        <p class="text-lg font-semibold mb-1">Peminjaman Selesai</p>
        <h3 class="text-4xl font-bold">{{ $peminjamanSelesai }}</h3>
      </div>
    </div>

    <!-- Chart Section -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
      <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">📊 Statistik Peminjaman</h3>
      <canvas id="peminjamanChart" height="120"></canvas>
    </div>
  </main>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('peminjamanChart');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Dipinjam', 'Dikembalikan'],
      datasets: [{
        data: [{{ $peminjamanAktif }}, {{ $peminjamanSelesai }}],
        backgroundColor: ['#3b82f6', '#22c55e'],
        borderWidth: 1,
      }]
    },
    options: {
      plugins: {
        legend: {
          position: 'bottom',
          labels: { color: '#fff' }
        }
      }
    }
  });
</script>
@endsection
