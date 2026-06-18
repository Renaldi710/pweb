@extends('layouts.app')

@section('title', 'Detail Surat - ' . config('app.name', 'Laravel'))

@section('content')
    <section class="w-full bg-gradient-to-br from-[#f53003]/5 via-transparent to-transparent dark:from-[#f53003]/10 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col gap-2">
            <h1 class="text-2xl font-semibold">Detail Surat</h1>
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                Informasi lengkap mengenai surat yang diajukan.
            </p>
        </div>
    </section>

    <main class="flex-1 w-full max-w-6xl mx-auto px-6 py-8">
        <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md shadow-sm overflow-hidden p-6">
            <div class="space-y-6">
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">Nomor Surat</span>
                    <span class="font-medium text-lg">{{ $surat->nomor_surat }}</span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">Jenis Surat</span>
                    <span>{{ $surat->jenis_surat }}</span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">Tanggal Ajuan</span>
                    <span>{{ \Carbon\Carbon::parse($surat->tanggal_ajuan)->format('d F Y') }}</span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">Penduduk Terkait</span>
                    <span>{{ $surat->penduduk->nik ?? '-' }} - {{ $surat->penduduk->nama ?? '-' }}</span>
                </div>
            </div>
            <div class="mt-8 flex gap-3">
                <a href="{{ route('surat.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#e3e3e0] px-5 py-3 text-sm font-medium hover:bg-[#f8f8f8] transition">Kembali</a>
                <a href="{{ route('surat.edit', $surat->id) }}" class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-medium text-white hover:bg-blue-700 transition">Edit Surat</a>
            </div>
        </div>
    </main>
@endsection
