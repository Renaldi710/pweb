@extends('layouts.app')

@section('title', 'Selamat Datang di App Surat - ' . config('app.name', 'Laravel'))

@section('content')
    <section class="w-full bg-gradient-to-br from-[#f53003]/5 via-transparent to-transparent dark:from-[#f53003]/10 py-16">
        <div class="max-w-6xl mx-auto px-6 grid gap-10 lg:grid-cols-[1.3fr_0.9fr] items-center">
            <div>
                <p class="text-sm uppercase tracking-[0.2em] text-[#f53003] dark:text-[#ff7144] mb-4">Selamat Datang</p>
                <h1 class="text-4xl sm:text-5xl font-semibold tracking-tight text-[#1b1b18] dark:text-[#F5F5F3]">App Surat Kelurahan</h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-[#4f5150] dark:text-[#c7c6c2]">
                    Aplikasi ini dirancang untuk memudahkan pengelolaan surat pengajuan warga. Kelola nomor surat, jenis surat, tanggal ajuan, dan data penduduk dalam satu sistem yang rapi dan mudah digunakan.
                </p>

                <div class="mt-10 flex flex-col gap-3 sm:flex-row sm:items-center">
                    <a href="{{ route('surat.create') }}" class="inline-flex items-center justify-center rounded-xl bg-[#f53003] px-7 py-3 text-sm font-semibold text-white hover:bg-[#d12c01] transition">
                        Tambah Surat
                    </a>
                    <a href="{{ route('surat.index') }}" class="inline-flex items-center justify-center rounded-xl border border-[#e3e3e0] bg-white px-7 py-3 text-sm font-semibold text-[#1b1b18] dark:bg-[#101010] dark:text-[#EDEDEC] hover:bg-[#f8f8f8] dark:hover:bg-[#181818] transition">
                        Lihat Daftar Surat
                    </a>
                </div>
            </div>

            <div class="rounded-[32px] border border-[#e3e3e0] bg-white/90 p-8 shadow-lg shadow-[#f5300380] backdrop-blur-xl dark:border-[#3E3E3A] dark:bg-[#161615]/95">
                <div class="space-y-5">
                    <div>
                        <p class="text-xs uppercase tracking-[0.25em] text-[#706f6c] dark:text-[#A1A09A] mb-2">Tentang Proyek</p>
                        <h2 class="text-xl font-semibold text-[#1b1b18] dark:text-[#F5F5F3]">Apa itu App Surat?</h2>
                        <p class="mt-3 text-sm leading-7 text-[#525252] dark:text-[#c7c6c2]">
                            App Surat adalah sistem sederhana untuk mencatat dan melihat surat yang diajukan oleh penduduk. Data tersimpan dalam database, sehingga proses pemantauan surat menjadi lebih rapi dan terdokumentasi.
                        </p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl border border-[#e3e3e0] bg-[#faf7f7] p-4 dark:border-[#3E3E3A] dark:bg-[#111111]/80">
                            <p class="text-xs uppercase tracking-[0.2em] text-[#706f6c] dark:text-[#A1A09A] mb-3">Fitur Utama</p>
                            <ul class="space-y-2 text-sm text-[#4f5150] dark:text-[#c7c6c2]">
                                <li>• Tambah surat</li>
                                <li>• Daftar surat</li>
                                <li>• Koneksi data penduduk</li>
                            </ul>
                        </div>
                        <div class="rounded-3xl border border-[#e3e3e0] bg-[#faf7f7] p-4 dark:border-[#3E3E3A] dark:bg-[#111111]/80">
                            <p class="text-xs uppercase tracking-[0.2em] text-[#706f6c] dark:text-[#A1A09A] mb-3">Teknologi</p>
                            <p class="text-sm leading-7 text-[#4f5150] dark:text-[#c7c6c2]">
                                Dibangun dengan Laravel, Blade, dan Tailwind CSS. Struktur folder sudah disiapkan untuk layout dan partial agar tema konsisten di semua halaman.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
