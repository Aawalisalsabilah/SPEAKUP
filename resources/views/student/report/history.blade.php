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
                        <p class="font-extrabold text-[30px] leading-[45px]">Riwayat Laporan</p>
                        <p class="text-[#7F8190]">Semua catatan laporan tersimpan di sini</p>
                    </div>
                </div>
            </div>

            {{-- TABLE CONTENT --}}
            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">

                @if ($reports->count() == 0)
                    {{-- EMPTY STATE --}}
                    <div class="flex flex-col items-center justify-center py-[60px]">
                        <div
                            class="w-[100px] h-[100px] rounded-full bg-[#FBFBFB] flex items-center justify-center mb-5">
                            <img src="{{ asset('images/icons/document-text.svg') }}"
                                class="w-[46px] h-[46px] opacity-50">
                        </div>
                        <p class="text-[#7F8190] text-lg">Belum ada laporan yang pernah dibuat</p>
                        <a href="{{ route('laporan.create') }}"
                            class="mt-5 p-[14px_20px] bg-[#0A090B] text-white rounded-full font-semibold hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all">
                            Buat Laporan Pertama
                        </a>
                    </div>
                @else
                    {{-- TABLE HEADER --}}
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
                        <div class="flex justify-center shrink-0 w-[120px]">
                            <p class="text-[#7F8190]">Aksi</p>
                        </div>
                    </div>

                    {{-- TABLE ROWS --}}
                    @foreach ($reports as $report)
                        <div class="list-items flex flex-nowrap justify-between pr-10">
                            {{-- LAPORAN --}}
                            <div class="flex shrink-0 w-[300px]">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 flex shrink-0 overflow-hidden rounded-full bg-[#FBFBFB]">
                                        @if ($report->evidence)
                                            <img src="{{ asset('storage/' . $report->evidence) }}" class="w-full h-full object-cover"
                                                alt="thumbnail">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <img src="{{ asset('images/icons/document-text.svg') }}"
                                                    class="w-8 h-8 opacity-50" alt="icon">
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

                            {{-- AKSI --}}
                            <div class="flex shrink-0 w-[120px] items-center justify-center">
                                <button type="button" onclick="openModal({{ $report->id }})"
                                    class="w-full max-h-[41px] p-[10px_20px] bg-[#0A090B] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_10px_16px_0_#0A090B0D] text-center">
                                    Detail
                                </button>
                            </div>
                        </div>

                        {{-- MODAL FOR THIS REPORT --}}
                        <div id="modal-{{ $report->id }}"
                            class="fixed inset-0 z-10 hidden items-center justify-center bg-[#0A090B]/50">

                            {{-- MODAL CONTENT --}}
                            <div
                                class="bg-white rounded-[20px] w-full max-w-[650px] max-h-[90vh] overflow-y-auto mx-5 relative">

                                {{-- CLOSE BUTTON --}}
                                <button type="button" onclick="closeModal({{ $report->id }})"
                                    class="absolute top-5 right-5 w-[46px] h-[46px] rounded-full border border-[#EEEEEE] flex items-center justify-center hover:bg-[#FBFBFB] transition-all">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>

                                {{-- MODAL HEADER --}}
                                <div class="p-[30px] border-b border-[#EEEEEE]">
                                    <div class="flex items-start gap-5 pr-[50px]">
                                        {{-- THUMBNAIL --}}
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
                                            <p class="p-[8px_16px] rounded-full text-sm font-bold {{ $statStyle }} w-fit">
                                                {{ $report->status }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{-- MODAL BODY --}}
                                <div class="p-[30px] flex flex-col gap-6">

                                    {{-- INFO GRID --}}
                                    <div class="grid grid-cols-2 gap-5">
                                        {{-- CATEGORY --}}
                                        <div class="flex flex-col gap-2">
                                            <p class="text-sm text-[#7F8190]">Kategori</p>
                                            <p class="font-semibold">{{ $report->category }}</p>
                                        </div>

                                        {{-- REPORTER --}}
                                        <div class="flex flex-col gap-2">
                                            <p class="text-sm text-[#7F8190]">Pelapor</p>
                                            @if ($report->is_anonymous)
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('images/icons/eye-slash-outline.svg') }}"
                                                        class="w-5 h-5 opacity-60">
                                                    <p class="font-semibold">Anonim</p>
                                                </div>
                                            @else
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('images/icons/profile.svg') }}"
                                                        class="w-5 h-5 opacity-60">
                                                    <p class="font-semibold">{{ $student->name }}</p>
                                                </div>
                                            @endif
                                        </div>

                                        {{-- DATE --}}
                                        <div class="flex flex-col gap-2">
                                            <p class="text-sm text-[#7F8190]">Tanggal Dibuat</p>
                                            <p class="font-semibold">{{ $report->created_at->format('d M Y') }}</p>
                                        </div>

                                        {{-- TIME --}}
                                        <div class="flex flex-col gap-2">
                                            <p class="text-sm text-[#7F8190]">Waktu</p>
                                            <p class="font-semibold">{{ $report->created_at->format('H:i') }} WIB</p>
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
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                                    </path>
                                                    <polyline points="15 3 21 3 21 9"></polyline>
                                                    <line x1="10" y1="14" x2="21" y2="3"></line>
                                                </svg>
                                                Buka di Tab Baru
                                            </a>
                                        </div>
                                    @endif

                                    {{-- CATATAN ADMIN --}}
                                    @if ($report->admin_notes)
                                        <div class="flex flex-col gap-2 pt-4 border-t border-[#EEEEEE]">
                                            <p class="text-sm text-[#7F8190]">Catatan dari Admin</p>
                                            <div class="p-4 bg-[#FBFBFB] rounded-[14px]">
                                                <p class="font-semibold leading-[170%]">{{ $report->admin_notes }}</p>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                {{-- MODAL FOOTER --}}
                                <div class="p-[30px] border-t border-[#EEEEEE]">
                                    <button type="button" onclick="closeModal({{ $report->id }})"
                                        class="w-full h-[52px] bg-[#0A090B] text-white rounded-full font-semibold hover:shadow-[0_10px_16px_0_#0A090B0D] transition-all">
                                        Tutup
                                    </button>
                                </div>

                            </div>
                        </div>
                    @endforeach
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

        // Close modal when clicking outside
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

        // Close modal with Escape key
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
