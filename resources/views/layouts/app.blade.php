<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sistem Inventaris Barang & Alat') }}</title>
    <script>
        tailwind = {
            config: {
                darkMode: 'class',
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .fade-in { animation: fadeIn 0.8s ease-in-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white shadow-md dark:from-gray-800 dark:via-gray-700 dark:to-gray-900">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <span class="text-2xl">📦</span>
                <h1 class="text-xl font-bold">Inventaris</h1>
            </div>

            <div class="space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="hover:text-blue-200 font-medium transition">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-blue-200 font-medium transition">Daftar</a>
                @else
                    
                    <a href="{{ route('logout') }}" class="hover:text-blue-200 font-medium transition"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main class="flex-grow flex items-center justify-center fade-in">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-6 text-gray-500 border-t dark:border-gray-700 mt-auto">
        © {{ date('Y') }} <span class="font-semibold text-gray-800 dark:text-gray-200">Sistem Inventaris Barang & Alat</span>.
    </footer>

</body>
</html>
