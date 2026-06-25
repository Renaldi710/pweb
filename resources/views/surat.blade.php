@extends('layouts.app')

@section('title', 'Daftar Surat - ' . config('app.name', 'Laravel'))

@section('content')
    {{-- Hero Section --}}
    <section class="w-full bg-gradient-to-br from-[#f53003]/5 via-transparent to-transparent dark:from-[#f53003]/10 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex flex-col gap-2">
                <h1 class="text-2xl font-semibold">📋 Daftar Surat</h1>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    Menampilkan seluruh data surat yang telah diajukan oleh penduduk.
                </p>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center rounded-md border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#161615] px-4 py-2 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:bg-rose-50 dark:hover:bg-rose-950/30 hover:border-rose-200 dark:hover:border-rose-900 hover:text-rose-600 dark:hover:text-rose-400 transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </div>
    </section>

    {{-- Session Success Message --}}
    @if(session('success'))
        <div class="max-w-6xl mx-auto px-6 pt-6">
            <div class="rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-emerald-900 text-sm">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="max-w-6xl mx-auto px-6 pt-6">
            <div class="rounded-xl bg-rose-50 border border-rose-200 p-4 text-rose-900 text-sm">
                {{ $errors->first() }}
            </div>
        </div>
    @endif

    {{-- Content --}}
    <main class="flex-1 w-full max-w-6xl mx-auto px-6 py-8">
        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md p-5 shadow-sm">
                <p class="text-xs uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A] mb-1">Total Surat</p>
                <p class="text-2xl font-semibold">{{ $semuaSurat->count() }}</p>
            </div>
            <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md p-5 shadow-sm">
                <p class="text-xs uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A] mb-1">Jenis Surat</p>
                <p class="text-2xl font-semibold">{{ $semuaSurat->pluck('jenis_surat')->unique()->count() }}</p>
            </div>
            <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md p-5 shadow-sm">
                <p class="text-xs uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A] mb-1">Penduduk Terkait</p>
                <p class="text-2xl font-semibold">{{ $semuaSurat->pluck('penduduk_id')->unique()->count() }}</p>
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] flex items-center justify-between">
                <h2 class="font-medium text-sm">Data Surat Masuk</h2>
                <div class="flex items-center gap-3">
                    <span class="text-xs text-[#706f6c] dark:text-[#A1A09A]">{{ $semuaSurat->count() }} data ditemukan</span>
                    <a href="{{ route('surat.create') }}" class="inline-flex items-center justify-center rounded-md bg-[#f53003] px-3 py-1.5 text-xs font-medium text-white hover:bg-[#d12c01] transition">Tambah Surat</a>
                </div>
            </div>            @if($semuaSurat->isEmpty())
                <div class="px-6 py-16 text-center">
                    <svg class="w-12 h-12 mx-auto text-[#dbdbd7] dark:text-[#3E3E3A] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">Belum ada data surat.</p>
                    <p class="text-[#706f6c] dark:text-[#A1A09A] text-xs mt-1">Silakan tambahkan data surat melalui database seeder.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-xs uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                            <tr>
                                <th class="px-6 py-3 font-medium">No</th>
                                <th class="px-6 py-3 font-medium">Nomor Surat</th>
                                <th class="px-6 py-3 font-medium">Jenis Surat</th>
                                <th class="px-6 py-3 font-medium">Tanggal Ajuan</th>
                                <th class="px-6 py-3 font-medium">NIK Penduduk</th>
                                <th class="px-6 py-3 font-medium">Nama Penduduk</th>
                                <th class="px-6 py-3 font-medium">JK</th>
                                <th class="px-6 py-3 font-medium">Alamat</th>
                                <th class="px-6 py-3 font-medium">Berkas Pendukung</th>
                                <th class="px-6 py-3 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                            @foreach($semuaSurat as $index => $surat)
                                <tr class="hover:bg-[#FDFDFC] dark:hover:bg-[#1b1b18] transition-colors">
                                    <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A]">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 font-medium">{{ $surat->nomor_surat }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-2.5 py-0.5 bg-[#f53003]/10 text-[#f53003] dark:bg-[#f53003]/20 dark:text-[#FF4433] rounded-full text-xs font-medium">
                                            {{ $surat->jenis_surat }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">{{ $surat->tanggal_ajuan->format('d M Y') }}</td>
                                    <td class="px-6 py-4 font-mono text-xs">{{ $surat->penduduk->nik ?? '-' }}</td>
                                    <td class="px-6 py-4">{{ $surat->penduduk->nama ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        @if($surat->penduduk)
                                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium {{ $surat->penduduk->jk === 'L' ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400' : 'bg-pink-100 text-pink-700 dark:bg-pink-900/30 dark:text-pink-400' }}">
                                                {{ $surat->penduduk->jk === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A] max-w-[200px] truncate">{{ $surat->penduduk->alamat ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        @if($surat->berkas_pendukung)
                                            @php
                                                $ext = strtolower(pathinfo($surat->berkas_pendukung, PATHINFO_EXTENSION));
                                                $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif']);
                                            @endphp
                                            @if($isImage)
                                                <a href="{{ Storage::url($surat->berkas_pendukung) }}" target="_blank">
                                                    <img src="{{ Storage::url($surat->berkas_pendukung) }}" alt="Thumbnail" style="height: 50px; width: auto; object-fit: cover;" class="rounded border shadow-sm hover:opacity-80 transition">
                                                </a>
                                            @else
                                                <a href="{{ Storage::url($surat->berkas_pendukung) }}" target="_blank" class="btn btn-info btn-sm bg-blue-100 text-blue-700 px-3 py-1 rounded text-xs font-medium hover:bg-blue-200 transition">
                                                    Lihat PDF
                                                </a>
                                            @endif
                                        @else
                                            <span class="badge bg-secondary bg-gray-200 text-gray-700 px-2.5 py-1 rounded-full text-xs font-medium">Belum ada berkas</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="d-flex gap-1 flex-wrap flex justify-end gap-1">
                                            <a href="{{ route('surat.cetak', $surat->id) }}" class="btn btn-primary btn-sm bg-blue-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-blue-700 transition" target="_blank">
                                                Cetak PDF
                                            </a>
                                            <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-warning btn-sm bg-amber-500 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-amber-600 transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm bg-red-600 text-white px-3 py-1.5 rounded text-xs font-medium hover:bg-red-700 transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
@endsection
