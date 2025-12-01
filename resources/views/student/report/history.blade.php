<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins bg-gray-50 text-[#0A090B]">
    <section class="flex">

        {{-- SIDEBAR --}}
        @include('components.sidebar')

        <div class="flex flex-col w-full pb-[30px]">

            {{-- HEADER --}}
            <div class="flex justify-end items-center p-5 border-b border-[#EEEEEE]">
                <div class="flex items-center gap-[30px]">

                    <div class="flex gap-[14px]">
                        <a class="w-[46px] h-[46px] flex items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/receipt-text.svg') }}">
                        </a>
                        <a class="w-[46px] h-[46px] flex items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/notification.svg') }}">
                        </a>
                    </div>

                    <div class="h-[46px] w-[1px] border border-[#EEEEEE]"></div>

                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-sm text-[#7F8190]">Mahasiswa</p>
                            <p class="font-semibold">{{ $student->name }}</p>
                        </div>
                        <img src="{{ asset('images/photos/default-photo.svg') }}" class="w-[46px] h-[46px]">
                    </div>

                </div>
            </div>

            {{-- HEADER CONTENT --}}
            <div class="px-5 mt-5">
                <h1 class="font-extrabold text-[30px] leading-[45px]">Riwayat Laporan</h1>
                <p class="text-[#7F8190]">Semua laporan yang pernah kamu kirim</p>
            </div>

            {{-- CONTENT --}}
            <div class="px-5 mt-8">
                @if ($reports->count() == 0)
                    <p class="text-gray-500 italic">Belum ada laporan yang pernah dibuat.</p>
                @endif

                <div class="space-y-4">

                    @foreach ($reports as $report)
                        <div class="bg-white border shadow rounded-xl p-5">

                            <div class="flex justify-between items-start">

                                <div class="space-y-2">
                                    <h3 class="text-lg font-bold">{{ $report->title }}</h3>
                                    <p class="text-sm text-gray-500">{{ $report->category }}</p>

                                    <p class="text-sm">
                                        Status:
                                        <span class="font-semibold
                                            @if ($report->status == 'Menunggu') text-yellow-500
                                            @elseif($report->status == 'Diproses') text-blue-600
                                            @elseif($report->status == 'Selesai') text-green-600
                                            @elseif($report->status == 'Ditolak') text-red-600
                                            @endif
                                        ">
                                            {{ $report->status }}
                                        </span>
                                    </p>

                                    <p class="text-xs text-gray-400">
                                        {{ $report->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>

                                @if ($report->evidence)
                                    <a href="{{ asset('storage/' . $report->evidence) }}"
                                       target="_blank"
                                       class="text-sm text-blue-600 underline">
                                        Lihat Bukti
                                    </a>
                                @endif

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>
        </div>

    </section>
</body>
</html>
