@extends('layouts.app')

@section('title', 'Registrasi - ' . config('app.name', 'Laravel'))

@section('content')
    <main class="flex-1 w-full max-w-md mx-auto px-6 py-12 flex flex-col justify-center">
        <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-xl shadow-sm overflow-hidden">
            <div class="p-8">
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold">Registrasi Warga Baru</h1>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-2">Daftarkan akun baru Anda untuk menggunakan layanan SuratApp.</p>
                </div>

                <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="name">Nama Lengkap</label>
                        <input
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            type="text"
                            required
                            autofocus
                            placeholder="Masukkan nama lengkap"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none @error('name') border-rose-500 @enderror"
                        />
                        @error('name')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="email">Email Address</label>
                        <input
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            type="email"
                            required
                            placeholder="Masukkan email aktif"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none @error('email') border-rose-500 @enderror"
                        />
                        @error('email')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="password">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            placeholder="Buat password (min. 6 karakter)"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none @error('password') border-rose-500 @enderror"
                        />
                        @error('password')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="password_confirmation">Konfirmasi Password</label>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            placeholder="Ulangi password di atas"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none"
                        />
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center rounded-xl bg-[#f53003] px-6 py-3 text-sm font-semibold text-white hover:bg-[#d12c01] transition">
                        Daftar Sekarang
                    </button>
                </form>

                <div class="mt-8 text-center text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-[#f53003] hover:underline">Masuk di sini</a>
                </div>
            </div>
        </div>
    </main>
@endsection
