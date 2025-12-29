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
        @include('components.sidebar-admin')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">

            {{-- HEADER --}}
            <div class="nav flex justify-end p-5 border-b border-[#EEEEEE]">
                <div class="flex items-center gap-[30px]">

                    <div class="flex gap-[14px]">
                        <a
                            class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE] relative">
                            <img src="{{ asset('images/icons/notification.svg') }}" alt="icon">
                            @if ($stats['waiting'] > 0)
                                <div
                                    class="absolute -top-1 -right-1 w-5 h-5 flex rounded-full items-center justify-center bg-[#FD445E]">
                                    <p class="font-bold text-[10px] text-white">{{ $stats['waiting'] }}</p>
                                </div>
                            @endif
                        </a>
                    </div>

                    <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>

                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Administrator</p>
                            <p class="font-semibold">{{ session('admin')->name ?? 'Admin' }}</p>
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
                        <p class="font-extrabold text-[30px] leading-[45px]">Dashboard Admin</p>
                        <p class="text-[#7F8190]">Kelola dan pantau semua laporan mahasiswa</p>
                    </div>
                </div>
            </div>

            @php
                // Warna kategori & status (definisikan sekali biar konsisten)
                $categoryStyles = [
                    'Fasilitas' => 'bg-[#D5EFFE] text-[#066DFE]',
                    'Akademik' => 'bg-[#EAE8FE] text-[#6436F1]',
                    'Administrasi' => 'bg-[#FFF2E6] text-[#F6770B]',
                    'Pelecehan' => 'bg-[#FEE6E9] text-[#FD445E]',
                    'Kekerasan' => 'bg-[#FEE6E9] text-[#FD445E]',
                    'Diskriminasi' => 'bg-[#FEE6E9] text-[#FD445E]',
                    'Lainnya' => 'bg-[#FBFBFB] text-[#7F8190]',
                ];

                $statusStyles = [
                    'Menunggu' => 'bg-[#FFF2E6] text-[#F6770B]',
                    'Diproses' => 'bg-[#D5EFFE] text-[#066DFE]',
                    'Selesai' => 'bg-[#E6F9F0] text-[#06BC65]',
                    'Ditolak' => 'bg-[#FEE6E9] text-[#FD445E]',
                ];
            @endphp

            {{-- STATISTIK CARDS (RESPONSIVE GRID) --}}
            <div class="px-5 mt-[30px]">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5">

                    {{-- TOTAL LAPORAN --}}
                    <div
                        class="p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
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
                    <div
                        class="p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
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
                                <p class="font-extrabold text-[30px] leading-[45px] text-[#F6770B]">
                                    {{ $stats['waiting'] }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- DIPROSES --}}
                    <div
                        class="p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-[50px] h-[50px] rounded-full bg-[#D5EFFE] flex items-center justify-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#066DFE"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-sm text-[#7F8190]">Diproses</p>
                                <p class="font-extrabold text-[30px] leading-[45px] text-[#066DFE]">
                                    {{ $stats['process'] }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- SELESAI --}}
                    <div
                        class="p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
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
                                <p class="font-extrabold text-[30px] leading-[45px] text-[#06BC65]">{{ $stats['done'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- DITOLAK --}}
                    <div
                        class="p-[30px] bg-white rounded-[20px] border border-[#EEEEEE] hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all duration-300">
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
                                <p class="font-extrabold text-[30px] leading-[45px] text-[#FD445E]">
                                    {{ $stats['rejected'] }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- STATISTIK KATEGORI --}}
            <div class="flex flex-col px-5 mt-[30px]">
                <div class="w-full flex justify-between items-center mb-[20px]">
                    <div class="flex flex-col gap-1">
                        <p class="font-bold text-xl">Statistik Kategori</p>
                        <p class="text-[#7F8190]">Kategori laporan terbanyak</p>
                    </div>
                </div>

                <div class="p-[30px] bg-white rounded-[20px] border border-[#EEEEEE]">
                    @php $totalAll = $stats['total'] ?? 0; @endphp

                    @if (($categoryStats->count() ?? 0) == 0)
                        <p class="text-[#7F8190]">Belum ada data kategori.</p>
                    @else
                        <div class="flex flex-col gap-5">
                            @foreach ($categoryStats as $row)
                                @php
                                    $catStyle = $categoryStyles[$row->category] ?? 'bg-[#FBFBFB] text-[#7F8190]';
                                    $percent = $totalAll > 0 ? round(($row->total / $totalAll) * 100) : 0;
                                @endphp

                                <div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <p
                                                class="p-[8px_16px] rounded-full font-bold text-sm {{ $catStyle }}">
                                                {{ $row->category }}
                                            </p>
                                            <p class="text-sm text-[#7F8190]">{{ $percent }}%</p>
                                        </div>

                                        <p class="font-extrabold text-[18px]">{{ $row->total }}</p>
                                    </div>

                                    <div
                                        class="mt-3 w-full h-[10px] bg-[#FBFBFB] rounded-full overflow-hidden border border-[#EEEEEE]">
                                        <div class="h-full bg-[#0A090B]" style="width: {{ $percent }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- LAPORAN TERBARU MENUNGGU VERIFIKASI --}}
            <div class="flex flex-col px-5 mt-[50px]">
                <div class="w-full flex justify-between items-center mb-[30px]">
                    <div class="flex flex-col gap-1">
                        <p class="font-bold text-xl">Laporan Menunggu Verifikasi</p>
                        <p class="text-[#7F8190]">Laporan terbaru yang perlu ditindaklanjuti</p>
                    </div>
                    <a href="{{ route('admin.reports') }}"
                        class="p-[10px_20px] border border-[#0A090B] rounded-full font-semibold hover:bg-[#0A090B] hover:text-white transition-all duration-300">
                        Lihat Semua
                    </a>
                </div>

                @if ($pendingReports->count() == 0)
                    {{-- EMPTY STATE --}}
                    <div
                        class="flex flex-col items-center justify-center py-[60px] bg-white rounded-[20px] border border-[#EEEEEE]">
                        <div
                            class="w-[100px] h-[100px] rounded-full bg-[#E6F9F0] flex items-center justify-center mb-5">
                            <svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="#06BC65"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <p class="text-[#06BC65] text-lg font-semibold">Semua laporan sudah ditangani!</p>
                        <p class="text-[#7F8190] mt-2">Tidak ada laporan yang menunggu verifikasi</p>
                    </div>
                @else
                    {{-- TABLE --}}
                    <div class="course-list-container flex flex-col gap-[30px]">
                        {{-- TABLE HEADER --}}
                        <div
                            class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
                            <div class="flex shrink-0 w-[250px]">
                                <p class="text-[#7F8190]">Laporan</p>
                            </div>
                            <div class="flex justify-center shrink-0 w-[150px]">
                                <p class="text-[#7F8190]">Pelapor</p>
                            </div>
                            <div class="flex justify-center shrink-0 w-[120px]">
                                <p class="text-[#7F8190]">Tanggal</p>
                            </div>
                            <div class="flex justify-center shrink-0 w-[150px]">
                                <p class="text-[#7F8190]">Kategori</p>
                            </div>
                            <div class="flex justify-center shrink-0 w-[120px]">
                                <p class="text-[#7F8190]">Status</p>
                            </div>
                            <div class="flex justify-center shrink-0 w-[120px]">
                                <p class="text-[#7F8190]">Aksi</p>
                            </div>
                        </div>

                        {{-- TABLE ROWS --}}
                        @foreach ($pendingReports->take(5) as $report)
                            @php
                                $catStyle = $categoryStyles[$report->category] ?? 'bg-[#FBFBFB] text-[#7F8190]';
                                $statStyle = $statusStyles[$report->status] ?? 'bg-[#FBFBFB] text-[#7F8190]';
                            @endphp

                            <div class="list-items flex flex-nowrap justify-between pr-10">
                                {{-- LAPORAN --}}
                                <div class="flex shrink-0 w-[250px]">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-14 flex shrink-0 overflow-hidden rounded-full bg-[#FBFBFB]">
                                            @if ($report->evidence)
                                                <img src="{{ asset('storage/' . $report->evidence) }}"
                                                    class="w-full h-full object-cover" alt="thumbnail">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <img src="{{ asset('images/icons/document-text.svg') }}"
                                                        class="w-7 h-7 opacity-50" alt="icon">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex flex-col gap-[2px]">
                                            <p class="font-bold">{{ Str::limit($report->title, 18) }}</p>
                                            <p class="text-sm text-[#7F8190]">
                                                {{ $report->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- PELAPOR --}}
                                <div class="flex shrink-0 w-[150px] items-center justify-center">
                                    @if ($report->is_anonymous)
                                        <p class="font-semibold text-[#7F8190]">Anonim</p>
                                    @else
                                        <p class="font-semibold">{{ $report->student->name ?? '-' }}</p>
                                    @endif
                                </div>

                                {{-- TANGGAL --}}
                                <div class="flex shrink-0 w-[120px] items-center justify-center">
                                    <p class="font-semibold">{{ $report->created_at->format('d M Y') }}</p>
                                </div>

                                {{-- KATEGORI --}}
                                <div class="flex shrink-0 w-[150px] items-center justify-center">
                                    <p class="p-[8px_16px] rounded-full font-bold text-sm {{ $catStyle }}">
                                        {{ $report->category }}
                                    </p>
                                </div>

                                {{-- STATUS --}}
                                <div class="flex shrink-0 w-[120px] items-center justify-center">
                                    <p class="p-[8px_16px] rounded-full font-bold text-sm {{ $statStyle }}">
                                        {{ $report->status }}
                                    </p>
                                </div>

                                {{-- AKSI --}}
                                <div class="flex shrink-0 w-[120px] items-center justify-center">
                                    <button type="button" onclick="openModal({{ $report->id }})"
                                        class="w-full max-h-[41px] p-[10px_20px] bg-[#0A090B] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_10px_16px_0_#0A090B0D] text-center">
                                        Tinjau
                                    </button>
                                </div>
                            </div>

                            {{-- MODAL --}}
                            <div id="modal-{{ $report->id }}"
                                class="fixed inset-0 z-10 hidden items-center justify-center bg-[#0A090B]/50">
                                <div
                                    class="bg-white rounded-[20px] w-full max-w-[700px] max-h-[90vh] overflow-y-auto mx-5 relative">

                                    {{-- CLOSE BUTTON --}}
                                    <button type="button" onclick="closeModal({{ $report->id }})"
                                        class="absolute top-5 right-5 w-[46px] h-[46px] rounded-full border border-[#EEEEEE] flex items-center justify-center hover:bg-[#FBFBFB] transition-all">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18">
                                            </line>
                                            <line x1="6" y1="6" x2="18" y2="18">
                                            </line>
                                        </svg>
                                    </button>

                                    {{-- MODAL HEADER --}}
                                    <div class="p-[30px] border-b border-[#EEEEEE]">
                                        <div class="flex items-start gap-5 pr-[50px]">
                                            <div
                                                class="w-[70px] h-[70px] rounded-[14px] bg-[#FBFBFB] flex items-center justify-center shrink-0 overflow-hidden">
                                                @if ($report->evidence)
                                                    <img src="{{ asset('storage/' . $report->evidence) }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <img src="{{ asset('images/icons/document-text.svg') }}"
                                                        class="w-8 h-8 opacity-50">
                                                @endif
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <h2 class="font-bold text-xl leading-[30px]">{{ $report->title }}</h2>
                                                <p
                                                    class="p-[8px_16px] rounded-full text-sm font-bold {{ $statStyle }} w-fit">
                                                    {{ $report->status }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- MODAL BODY --}}
                                    <div class="p-[30px] flex flex-col gap-6">

                                        {{-- INFO GRID --}}
                                        <div class="grid grid-cols-2 gap-5">
                                            <div class="flex flex-col gap-2">
                                                <p class="text-sm text-[#7F8190]">Kategori</p>
                                                <p class="font-semibold">{{ $report->category }}</p>
                                            </div>

                                            <div class="flex flex-col gap-2">
                                                <p class="text-sm text-[#7F8190]">Pelapor</p>
                                                @if ($report->is_anonymous)
                                                    <p class="font-semibold text-[#7F8190]">Anonim</p>
                                                @else
                                                    <p class="font-semibold">{{ $report->student->name ?? '-' }}</p>
                                                @endif
                                            </div>

                                            <div class="flex flex-col gap-2">
                                                <p class="text-sm text-[#7F8190]">Tanggal Dibuat</p>
                                                <p class="font-semibold">{{ $report->created_at->format('d M Y') }}
                                                </p>
                                            </div>

                                            <div class="flex flex-col gap-2">
                                                <p class="text-sm text-[#7F8190]">Waktu</p>
                                                <p class="font-semibold">{{ $report->created_at->format('H:i') }} WIB
                                                </p>
                                            </div>
                                        </div>

                                        {{-- DESCRIPTION --}}
                                        <div class="flex flex-col gap-2">
                                            <p class="text-sm text-[#7F8190]">Deskripsi / Kronologi</p>
                                            <p class="font-semibold leading-[170%]">{{ $report->description }}</p>
                                        </div>

                                        {{-- EVIDENCE --}}
                                        @if ($report->evidence)
                                            <div class="flex flex-col gap-2">
                                                <p class="text-sm text-[#7F8190]">Bukti Pendukung</p>
                                                <div class="rounded-[14px] overflow-hidden border border-[#EEEEEE]">
                                                    <img src="{{ asset('storage/' . $report->evidence) }}"
                                                        class="w-full max-h-[300px] object-contain bg-[#FBFBFB]">
                                                </div>
                                                <a href="{{ asset('storage/' . $report->evidence) }}" target="_blank"
                                                    class="text-sm text-[#066DFE] font-semibold flex items-center gap-2 mt-1">
                                                    <svg width="16" height="16" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                                        </path>
                                                        <polyline points="15 3 21 3 21 9"></polyline>
                                                        <line x1="10" y1="14" x2="21"
                                                            y2="3"></line>
                                                    </svg>
                                                    Buka di Tab Baru
                                                </a>
                                            </div>
                                        @endif

                                        {{-- UPDATE STATUS --}}
                                        <div class="flex flex-col gap-[30px] pt-4 border-t border-[#EEEEEE]">
                                            <form action="{{ route('admin.reports.update', $report->id) }}"
                                                method="POST" class="flex flex-col gap-[30px]">
                                                @csrf
                                                @method('PUT')

                                                {{-- STATUS DROPDOWN --}}
                                                <div class="flex flex-col gap-[10px]">
                                                    <p class="text-sm text-[#7F8190]">Status</p>
                                                    <div
                                                        class="flex items-center p-4 border border-[#EEEEEE] rounded-full focus-within:border-2 focus-within:border-[#0A090B]">
                                                        <select name="status" required
                                                            class="w-full outline-none font-semibold">
                                                            <option value="Menunggu"
                                                                {{ $report->status == 'Menunggu' ? 'selected' : '' }}>
                                                                Menunggu</option>
                                                            <option value="Diproses"
                                                                {{ $report->status == 'Diproses' ? 'selected' : '' }}>
                                                                Diproses</option>
                                                            <option value="Selesai"
                                                                {{ $report->status == 'Selesai' ? 'selected' : '' }}>
                                                                Selesai</option>
                                                            <option value="Ditolak"
                                                                {{ $report->status == 'Ditolak' ? 'selected' : '' }}>
                                                                Ditolak</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- CATATAN ADMIN --}}
                                                <div class="flex flex-col gap-[10px]">
                                                    <p class="text-sm text-[#7F8190]">Catatan Admin (opsional)</p>
                                                    <div
                                                        class="flex items-start p-4 border border-[#EEEEEE] rounded-[20px] focus-within:border-2 focus-within:border-[#0A090B]">
                                                        <textarea name="admin_notes" rows="2"
                                                            class="w-full outline-none font-semibold placeholder:font-normal placeholder:text-[#7F8190]"
                                                            placeholder="Tulis catatan atau alasan tindakan...">{{ $report->admin_notes }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- BUTTONS --}}
                                                <div class="flex gap-3">
                                                    <button type="button" onclick="closeModal({{ $report->id }})"
                                                        class="flex-1 h-[52px] border border-[#0A090B] rounded-full font-semibold hover:bg-[#0A090B] hover:text-white transition-all">
                                                        Tutup
                                                    </button>
                                                    <button type="submit"
                                                        class="flex-1 h-[52px] bg-[#0A090B] text-white rounded-full font-semibold hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>

    </section>

    {{-- SCRIPT --}}
    <script>
        function openModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('fixed')) {
                const modals = document.querySelectorAll('[id^="modal-"]');
                modals.forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
                document.body.style.overflow = 'auto';
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = document.querySelectorAll('[id^="modal-"]');
                modals.forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
                document.body.style.overflow = 'auto';
            }
        });
    </script>

</body>

</html>
