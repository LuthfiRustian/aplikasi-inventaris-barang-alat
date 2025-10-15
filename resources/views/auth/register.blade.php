@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center w-full min-h-[80vh] bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 px-4">
  <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl p-8 w-full max-w-md mt-8">
    <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-8">Daftar Akun Baru</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-5">
        <label for="name" class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Nama Lengkap</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white outline-none">
        @error('name')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-5">
        <label for="email" class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white outline-none">
        @error('email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-5">
        <label for="password" class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Password</label>
        <input id="password" type="password" name="password" required
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white outline-none">
        @error('password')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="password-confirm" class="block text-gray-700 dark:text-gray-300 mb-2 font-medium">Konfirmasi Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required
               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white outline-none">
      </div>

      <button type="submit"
              class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3 rounded-lg shadow-md transition-all transform hover:-translate-y-1">
        Daftar
      </button>

      <p class="text-center text-gray-600 dark:text-gray-400 mt-6">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Masuk Sekarang</a>
      </p>
    </form>
  </div>
</div>
@endsection
