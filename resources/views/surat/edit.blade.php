@extends('layouts.app')

@section('title', 'Edit Surat - ' . config('app.name', 'Laravel'))

@section('content')
    {{-- Hero Section --}}
    <section class="w-full bg-gradient-to-br from-[#f53003]/5 via-transparent to-transparent dark:from-[#f53003]/10 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col gap-2">
            <h1 class="text-2xl font-semibold">Edit Surat</h1>
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                Ubah data surat yang telah diajukan.
            </p>
        </div>
    </section>

    <main class="flex-1 w-full max-w-6xl mx-auto px-6 py-8">
        <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-between gap-4">
                <div>
                    <h2 class="font-medium text-sm">Form Edit Surat</h2>
                    <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] mt-1">Perbarui data surat lalu simpan.</p>
                </div>
                <span class="text-xs text-[#706f6c] dark:text-[#A1A09A]">Pastikan semua field terisi.</span>
            </div>

            <div class="p-6">
                @if (session('success'))
                    <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-900">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2" for="nomor_surat">Nomor Surat</label>
                        <input
                            id="nomor_surat"
                            name="nomor_surat"
                            value="{{ old('nomor_surat', $surat->nomor_surat) }}"
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
                            value="{{ old('jenis_surat', $surat->jenis_surat) }}"
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
                            value="{{ old('tanggal_ajuan', $surat->tanggal_ajuan) }}"
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
                                <option value="{{ $item->id }}" {{ old('penduduk_id', $surat->penduduk_id) == $item->id ? 'selected' : '' }}>
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
                        @if($surat->berkas_pendukung)
                            <div class="mb-3 flex items-center gap-3 p-3 rounded-xl border border-[#e3e3e0] bg-[#FDFDFC] dark:bg-[#0a0a0a] dark:border-[#3E3E3A]">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">File saat ini:</span>
                                <a href="{{ Storage::url($surat->berkas_pendukung) }}" target="_blank" class="text-sm text-blue-600 hover:underline flex items-center gap-1">
                                    Lihat Berkas
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            </div>
                        @endif
                        <input
                            id="berkas_pendukung"
                            name="berkas_pendukung"
                            type="file"
                            accept=".pdf,.jpg,.jpeg,.png"
                            class="w-full rounded-xl border border-[#e3e3e0] bg-white dark:bg-[#0b0b0b] px-4 py-3 text-[#1b1b18] dark:text-[#EDEDEC] focus:border-[#f53003] focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#f53003]/10 file:text-[#f53003] hover:file:bg-[#f53003]/20"
                        />
                        <p class="mt-1 text-xs text-[#706f6c] dark:text-[#A1A09A]">Format: PDF, JPG, PNG. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah berkas.</p>
                        @error('berkas_pendukung')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ route('surat.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#e3e3e0] px-5 py-3 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-[#f8f8f8] dark:hover:bg-[#0f0f0f] transition">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#f53003] px-6 py-3 text-sm font-semibold text-white hover:bg-[#d12c01] transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
