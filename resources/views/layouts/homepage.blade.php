<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem Inventaris Barang & Alat</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      transition: background 0.4s ease, color 0.4s ease;
    }

    .fade-in {
      animation: fadeIn 1s ease-in-out forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .toggle-btn {
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .toggle-btn:hover {
      transform: scale(1.15);
    }
  </style>
</head>
<body class="bg-gradient-to-b from-gray-50 to-gray-100 flex flex-col min-h-screen transition-all duration-500 dark:from-gray-900 dark:to-gray-800 dark:text-gray-100">

  <!-- Navbar dengan gradasi -->
  <nav class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white shadow-lg dark:from-gray-800 dark:via-gray-700 dark:to-gray-900">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <div class="flex items-center space-x-2">
        <span class="text-2xl">📦</span>
        <h1 class="text-2xl font-bold tracking-wide">Inventaris</h1>
      </div>

      <div class="flex items-center space-x-6">
        <a href="#" class="hover:text-blue-200 transition-all">Beranda</a>
        <a href="#" class="hover:text-blue-200 transition-all">Tentang</a>
        <a href="#" class="hover:text-blue-200 transition-all">Kontak</a>

        <!-- Tombol Dark Mode -->
        <button id="theme-toggle" class="toggle-btn text-2xl" title="Ganti tema">
          🌙
        </button>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <main class="flex-grow flex flex-col items-center justify-center text-center px-6 fade-in
              bg-gradient-to-b from-white via-gray-50 to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 dark:text-white mb-6 leading-tight">
      Sistem Inventaris Barang & Alat
    </h2>
    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mb-10 text-lg leading-relaxed">
      Aplikasi ini membantu Anda mencatat, mengelola, dan memantau data barang, alat, serta peminjaman
      di lingkungan kantor, sekolah, atau instansi dengan mudah dan efisien.
    </p>

    <!-- Tombol Aksi -->
    <div class="flex space-x-6">
    <a href="{{ route('login') }}"
       class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition-all transform hover:-translate-y-1 hover:shadow-2xl">
        Masuk
    </a>

    <a href="{{ route('register') }}"
       class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition-all transform hover:-translate-y-1 hover:shadow-2xl">
        Daftar
    </a>
</div>


    <!-- Gambar / Icon -->
    <div class="mt-16">
      <img src="https://cdn-icons-png.flaticon.com/512/3209/3209265.png"
           alt="Inventaris Icon"
           class="w-36 h-36 mx-auto opacity-95 hover:scale-105 transition-all duration-300">
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 text-gray-600 dark:text-gray-400 border-t dark:border-gray-700 mt-10">
    © 2025 <span class="font-semibold text-gray-800 dark:text-gray-200">Sistem Inventaris Barang & Alat</span>. Semua Hak Dilindungi.
  </footer>

  <script>
    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;

    // Set tema awal (cek preferensi sistem / localStorage)
    if (
      localStorage.theme === 'dark' ||
      (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
      html.classList.add('dark');
      themeToggle.textContent = '☀️';
    } else {
      html.classList.remove('dark');
      themeToggle.textContent = '🌙';
    }

    // Toggle tema manual
    themeToggle.addEventListener('click', () => {
      html.classList.toggle('dark');
      if (html.classList.contains('dark')) {
        themeToggle.textContent = '☀️';
        localStorage.theme = 'dark';
      } else {
        themeToggle.textContent = '🌙';
        localStorage.theme = 'light';
      }
    });
  </script>
</body>
</html>
