<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Surat - {{ config('app.name', 'Laravel') }}</title>

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col antialiased">

    {{-- Navbar --}}
    <nav class="w-full bg-white dark:bg-[#161615] border-b border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2 text-lg font-semibold tracking-wide">
                <span>Surat<span class="text-[#f53003]">Kelurahan</span></span>
            </a>
            <a href="/"
               class="inline-block px-4 py-1.5 text-sm border border-[#19140035] dark:border-[#3E3E3A] rounded-sm hover:bg-[#1b1b18] hover:text-white dark:hover:bg-[#eeeeec] dark:hover:text-[#1C1C1A] transition">
                ← Beranda
            </a>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="w-full bg-gradient-to-br from-[#f53003]/5 via-transparent to-transparent dark:from-[#f53003]/10 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col gap-2">
            <h1 class="text-2xl font-semibold">📋 Daftar Surat</h1>
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                Menampilkan seluruh data surat yang telah diajukan oleh penduduk.
            </p>
        </div>
    </section>

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
                <span class="text-xs text-[#706f6c] dark:text-[#A1A09A]">{{ $semuaSurat->count() }} data ditemukan</span>
            </div>

            @if($semuaSurat->isEmpty())
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
                                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium
                                                {{ $surat->penduduk->jk === 'L'
                                                    ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'
                                                    : 'bg-pink-100 text-pink-700 dark:bg-pink-900/30 dark:text-pink-400' }}">
                                                {{ $surat->penduduk->jk === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A] max-w-[200px] truncate">{{ $surat->penduduk->alamat ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>

    {{-- Footer --}}
    <footer class="w-full border-t border-[#e3e3e0] dark:border-[#3E3E3A] py-6">
        <div class="max-w-6xl mx-auto px-6 flex items-center justify-between text-xs text-[#706f6c] dark:text-[#A1A09A]">
            <span>© {{ date('Y') }} SuratKelurahan — Laravel v{{ app()->version() }}</span>
            <a href="/" class="hover:text-[#f53003] transition">Beranda</a>
        </div>
    </footer>

</body>
</html>
