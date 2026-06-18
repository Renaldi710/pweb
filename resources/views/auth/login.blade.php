@extends('layouts.app')

@section('title', 'Login - ' . config('app.name', 'Laravel'))

@section('content')
    <main class="flex-1 w-full max-w-md mx-auto px-6 py-12 flex flex-col justify-center">
        <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-xl shadow-sm overflow-hidden">
            <div class="p-8">
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold">Masuk ke SuratApp</h1>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-2">Masukkan email dan password Anda untuk masuk.</p>
                </div>

                @if(session('sukses'))
                    <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-900 text-sm">
                        {{ session('sukses') }}
                    </div>
                @endif

                @if($errors->has('login_error'))
                    <div class="mb-6 rounded-xl bg-rose-50 border border-rose-200 p-4 text-rose-900 text-sm">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif

                <form action="{{ route('login.auth') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="email">Email Address</label>
                        <input
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            type="email"
                            required
                            autofocus
                            placeholder="Masukkan email anda"
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
                            placeholder="Masukkan password anda"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none @error('password') border-rose-500 @enderror"
                        />
                        @error('password')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center rounded-xl bg-[#f53003] px-6 py-3 text-sm font-semibold text-white hover:bg-[#d12c01] transition">
                        Login
                    </button>
                </form>

                <div class="mt-8 text-center text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    Belum punya akun? <a href="{{ route('register') }}" class="font-medium text-[#f53003] hover:underline">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </main>
@endsection
