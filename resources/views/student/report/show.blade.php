<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins bg-gray-50 text-[#0A090B]">
    <section class="flex">

        @include('components.sidebar')

        <div class="flex flex-col w-full pb-[30px]">

            {{-- HEADER sama seperti history --}}
            {{-- @include('components.header-student') --}}

            <div class="px-5 mt-5">
                <h1 class="font-extrabold text-[30px] leading-[45px]">Detail Laporan</h1>
                <p class="text-[#7F8190]">Informasi lengkap laporan yang kamu kirim</p>
            </div>

            <div class="px-5 mt-8">
                <div class="bg-white border shadow rounded-xl p-5 space-y-3">
                    <h2 class="text-2xl font-bold">{{ $report->title }}</h2>

                    <p class="text-sm text-gray-500">Kategori: {{ $report->category }}</p>

                    <div>
                        <h3 class="font-semibold mb-1">Pelapor</h3>
                        @if ($report->is_anonymous)
                            <p class="text-sm">Anonim</p>
                        @else
                            <p class="text-sm">{{ $student->name }}</p>
                        @endif
                    </div>

                    <p class="text-sm">
                        Status:
                        <span
                            class="font-semibold
                        @if ($report->status == 'Menunggu') text-yellow-500
                        @elseif($report->status == 'Diproses') text-blue-600
                        @elseif($report->status == 'Selesai') text-green-600
                        @elseif($report->status == 'Ditolak') text-red-600 @endif
                    ">
                            {{ $report->status }}
                        </span>
                    </p>

                    <p class="text-xs text-gray-400">
                        Dikirim pada: {{ $report->created_at->format('d M Y, H:i') }}
                    </p>

                    <hr class="my-3">

                    <div>
                        <h3 class="font-semibold mb-1">Deskripsi / Kronologi</h3>
                        <p class="text-sm leading-relaxed">{{ $report->description }}</p>
                    </div>

                    @if ($report->evidence)
                        <div class="mt-3">
                            <h3 class="font-semibold mb-1">Bukti</h3>
                            <a href="{{ asset('storage/' . $report->evidence) }}" target="_blank"
                                class="text-sm text-blue-600 underline">
                                Lihat Bukti
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
</body>

</html>
