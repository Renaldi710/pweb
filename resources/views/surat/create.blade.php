@extends('layouts.app')

@section('title', 'Tambah Surat - ' . config('app.name', 'Laravel'))

@section('content')
    {{-- Hero Section --}}
    <section class="w-full bg-gradient-to-br from-[#f53003]/5 via-transparent to-transparent dark:from-[#f53003]/10 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col gap-2">
            <h1 class="text-2xl font-semibold">Tambah Surat</h1>
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                Tambahkan surat baru dengan data lengkap untuk penduduk.
            </p>
        </div>
    </section>

    <main class="flex-1 w-full max-w-6xl mx-auto px-6 py-8">
        <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-between gap-4">
                <div>
                    <h2 class="font-medium text-sm">Form Tambah Surat</h2>
                    <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] mt-1">Isi data surat lalu simpan agar tersimpan di database.</p>
                </div>
                <span class="text-xs text-[#706f6c] dark:text-[#A1A09A]">Pastikan semua field terisi.</span>
            </div>

            <div class="p-6">
                @if (session('success'))
                    <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-900">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="nomor_surat">Nomor Surat</label>
                        <input
                            id="nomor_surat"
                            name="nomor_surat"
                            value="{{ old('nomor_surat') }}"
                            type="text"
                            maxlength="50"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none"
                        />
                        @error('nomor_surat')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="jenis_surat">Jenis Surat</label>
                        <input
                            id="jenis_surat"
                            name="jenis_surat"
                            value="{{ old('jenis_surat') }}"
                            type="text"
                            maxlength="100"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none"
                        />
                        @error('jenis_surat')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="tanggal_ajuan">Tanggal Ajuan</label>
                        <input
                            id="tanggal_ajuan"
                            name="tanggal_ajuan"
                            value="{{ old('tanggal_ajuan') }}"
                            type="date"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none"
                        />
                        @error('tanggal_ajuan')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="penduduk_id">Penduduk</label>
                        <select
                            id="penduduk_id"
                            name="penduduk_id"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none"
                        >
                            <option value="" class="text-[#706f6c]">Pilih penduduk</option>
                            @foreach ($penduduk as $item)
                                <option value="{{ $item->id }}" {{ old('penduduk_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nik }} - {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('penduduk_id')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="berkas_pendukung">Berkas Pendukung (Opsional)</label>
                        <input
                            id="berkas_pendukung"
                            name="berkas_pendukung"
                            type="file"
                            accept=".pdf,.jpg,.jpeg,.png"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#f53003]/10 file:text-[#f53003] hover:file:bg-[#f53003]/20"
                        />
                        <p class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]">Format: PDF, JPG, PNG. Maksimal 2MB.</p>
                        @error('berkas_pendukung')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ url('/') }}" class="inline-flex items-center justify-center rounded-xl border border-[#e3e3e0] px-5 py-3 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#f8f8f8] dark:hover:bg-[#0f0f0f] transition">
                            Kembali
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#f53003] px-6 py-3 text-sm font-semibold text-white hover:bg-[#d12c01] transition">
                            Simpan Surat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
