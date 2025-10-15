<aside 
  x-data
  class="fixed md:static top-0 left-0 w-64 h-screen bg-gradient-to-b from-sky-600 to-indigo-600 text-white shadow-2xl flex flex-col justify-between z-50">

  <div>
    <div class="flex items-center px-6 py-5 border-b border-sky-400/40">
      <span class="text-3xl">📦</span>
      <h1 class="text-xl font-bold ml-2">Inventaris</h1>
    </div>

    <nav class="mt-4 space-y-1">
      <a href="{{ route('barang.index') }}" 
         class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition {{ request()->is('barang*') ? 'bg-sky-500/90' : '' }}">
         Barang
      </a>
      <a href="{{ route('kategori.index') }}" 
         class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition {{ request()->is('kategori*') ? 'bg-sky-500/90' : '' }}">
         Kategori
      </a>
      <a href="{{ route('peminjaman.index') }}" 
         class="block px-6 py-3 rounded-lg hover:bg-sky-500/80 transition {{ request()->is('peminjaman*') ? 'bg-sky-500/90' : '' }}">
         Peminjaman
      </a>
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
