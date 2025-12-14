<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
</head>

<body class="font-poppins text-[#0A090B]">
    <section id="content" class="flex">

        {{-- SIDEBAR --}}
        @include('components.sidebar')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">

            {{-- HEADER --}}
            <div class="nav flex justify-end p-5 border-b border-[#EEEEEE]">
                <div class="flex items-center gap-[30px]">

                    <div class="flex gap-[14px]">
                        <a
                            class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/receipt-text.svg') }}" alt="icon">
                        </a>
                        <a
                            class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/notification.svg') }}" alt="icon">
                        </a>
                    </div>

                    <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>

                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Mahasiswa</p>
                            <p class="font-semibold">{{ $student->name }}</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{ asset('images/photos/default-photo.svg') }}" alt="photo">
                        </div>
                    </div>

                </div>
            </div>

            {{-- HEADER CONTENT --}}
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">Dashboard</p>
                        <p class="text-[#7F8190]">Pantau semua laporan kamu di sini</p>
                    </div>
                    {{-- <a href="{{ route('laporan.create') }}"
                        class="p-[14px_20px] bg-[#0A090B] text-white rounded-full font-semibold hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300 flex items-center gap-[10px]">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Buat Laporan
                    </a> --}}
                </div>
            </div>

            {{-- STATISTIK CARDS --}}
            <div class="flex gap-5 px-5 mt-[30px]">

                {{-- TOTAL LAPORAN --}}
                <div class="flex-1 p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-[50px] h-[50px] rounded-full bg-[#FBFBFB] flex items-center justify-center">
                            <img src="{{ asset('images/icons/document-text.svg') }}" class="w-6 h-6" alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm text-[#7F8190]">Total Laporan</p>
                            <p class="font-extrabold text-[30px] leading-[45px]">{{ $stats['total'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- MENUNGGU --}}
                <div class="flex-1 p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-[50px] h-[50px] rounded-full bg-[#FFF2E6] flex items-center justify-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#F6770B"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm text-[#7F8190]">Menunggu</p>
                            <p class="font-extrabold text-[30px] leading-[45px] text-[#F6770B]">{{ $stats['waiting'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- DIPROSES --}}
                <div class="flex-1 p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-[50px] h-[50px] rounded-full bg-[#D5EFFE] flex items-center justify-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#066DFE"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm text-[#7F8190]">Diproses</p>
                            <p class="font-extrabold text-[30px] leading-[45px] text-[#066DFE]">{{ $stats['process'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- SELESAI --}}
                <div class="flex-1 p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-[50px] h-[50px] rounded-full bg-[#E6F9F0] flex items-center justify-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#06BC65"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm text-[#7F8190]">Selesai</p>
                            <p class="font-extrabold text-[30px] leading-[45px] text-[#06BC65]">{{ $stats['done'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- DITOLAK --}}
                <div class="flex-1 p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
                    <div class="flex items-center gap-4">
                        <div class="w-[50px] h-[50px] rounded-full bg-[#FEE6E9] flex items-center justify-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FD445E"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-sm text-[#7F8190]">Ditolak</p>
                            <p class="font-extrabold text-[30px] leading-[45px] text-[#FD445E]">{{ $stats['rejected'] }}</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- LAPORAN TERBARU --}}
            <div class="flex flex-col px-5 mt-[50px]">
                <div class="w-full flex justify-between items-center mb-[30px]">
                    <div class="flex flex-col gap-1">
                        <p class="font-bold text-xl">Laporan Terbaru</p>
                        <p class="text-[#7F8190]">5 laporan terakhir yang kamu buat</p>
                    </div>
                    {{-- <a href="{{ route('laporan.history') }}"
                        class="p-[10px_20px] border border-[#0A090B] rounded-full font-semibold hover:bg-[#0A090B] hover:text-white transition-all duration-300">
                        Lihat Semua
                    </a> --}}
                </div>

                @if ($reports->count() == 0)
                    {{-- EMPTY STATE --}}
                    <div class="flex flex-col items-center justify-center py-[60px] bg-white rounded-[20px] border border-[#EEEEEE]">
                        <div class="w-[100px] h-[100px] rounded-full bg-[#FBFBFB] flex items-center justify-center mb-5">
                            <img src="{{ asset('images/icons/document-text.svg') }}" class="w-[46px] h-[46px] opacity-50">
                        </div>
                        <p class="text-[#7F8190] text-lg">Kamu belum membuat laporan apa pun</p>
                        <a href="{{ route('laporan.create') }}"
                            class="mt-5 p-[14px_20px] bg-[#0A090B] text-white rounded-full font-semibold hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all">
                            Buat Laporan Pertama
                        </a>
                    </div>
                @else
                    {{-- TABLE HEADER --}}
                    <div class="course-list-container flex flex-col gap-[30px]">
                        <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
                            <div class="flex shrink-0 w-[300px]">
                                <p class="text-[#7F8190]">Laporan</p>
                            </div>
                            <div class="flex justify-center shrink-0 w-[150px]">
                                <p class="text-[#7F8190]">Tanggal</p>
                            </div>
                            <div class="flex justify-center shrink-0 w-[170px]">
                                <p class="text-[#7F8190]">Kategori</p>
                            </div>
                            <div class="flex justify-center shrink-0 w-[120px]">
                                <p class="text-[#7F8190]">Status</p>
                            </div>
                        </div>

                        {{-- TABLE ROWS --}}
                        @foreach ($reports->take(5) as $report)
                            <div class="list-items flex flex-nowrap justify-between pr-10">
                                {{-- LAPORAN --}}
                                <div class="flex shrink-0 w-[300px]">
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-16 flex shrink-0 overflow-hidden rounded-full bg-[#FBFBFB]">
                                            @if ($report->evidence)
                                                <img src="{{ asset('storage/' . $report->evidence) }}" class="w-full h-full object-cover" alt="thumbnail">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <img src="{{ asset('images/icons/document-text.svg') }}" class="w-8 h-8 opacity-50" alt="icon">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex flex-col gap-[2px]">
                                            <p class="font-bold text-lg">{{ Str::limit($report->title, 20) }}</p>
                                            @if ($report->is_anonymous)
                                                <p class="text-[#7F8190]">Anonim</p>
                                            @else
                                                <p class="text-[#7F8190]">{{ $student->name }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- TANGGAL --}}
                                <div class="flex shrink-0 w-[150px] items-center justify-center">
                                    <p class="font-semibold">{{ $report->created_at->format('d M Y') }}</p>
                                </div>

                                {{-- KATEGORI --}}
                                <div class="flex shrink-0 w-[170px] items-center justify-center">
                                    @php
                                        $categoryStyles = [
                                            'Fasilitas' => 'bg-[#D5EFFE] text-[#066DFE]',
                                            'Akademik' => 'bg-[#EAE8FE] text-[#6436F1]',
                                            'Administrasi' => 'bg-[#FFF2E6] text-[#F6770B]',
                                            'Pelecehan' => 'bg-[#FEE6E9] text-[#FD445E]',
                                            'Kekerasan' => 'bg-[#FEE6E9] text-[#FD445E]',
                                            'Diskriminasi' => 'bg-[#FEE6E9] text-[#FD445E]',
                                            'Lainnya' => 'bg-[#FBFBFB] text-[#7F8190]',
                                        ];
                                        $catStyle = $categoryStyles[$report->category] ?? 'bg-[#FBFBFB] text-[#7F8190]';
                                    @endphp
                                    <p class="p-[8px_16px] rounded-full font-bold text-sm {{ $catStyle }}">
                                        {{ $report->category }}
                                    </p>
                                </div>

                                {{-- STATUS --}}
                                <div class="flex shrink-0 w-[120px] items-center justify-center">
                                    @php
                                        $statusStyles = [
                                            'Menunggu' => 'bg-[#FFF2E6] text-[#F6770B]',
                                            'Diproses' => 'bg-[#D5EFFE] text-[#066DFE]',
                                            'Selesai' => 'bg-[#E6F9F0] text-[#06BC65]',
                                            'Ditolak' => 'bg-[#FEE6E9] text-[#FD445E]',
                                        ];
                                        $statStyle = $statusStyles[$report->status] ?? 'bg-[#FBFBFB] text-[#7F8190]';
                                    @endphp
                                    <p class="p-[8px_16px] rounded-full font-bold text-sm {{ $statStyle }}">
                                        {{ $report->status }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>

    </section>

</body>

</html>
