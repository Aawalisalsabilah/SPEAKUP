<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins bg-gray-50">

    <section class="flex">

        {{-- SIDEBAR --}}
        @include('components.sidebar')

        <div class="w-full p-8">

            {{-- HEADER --}}
            <div class="flex justify-between items-center border-b pb-4">
                <h1 class="text-2xl font-bold">Dashboard Mahasiswa</h1>

                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Mahasiswa</p>
                        <p class="font-semibold">{{ $student->name }}</p>
                    </div>
                    <img src="{{ asset('images/photos/default-photo.svg') }}" class="w-12 h-12 rounded-full">
                </div>
            </div>

            {{-- STATISTIK --}}
            <div class="grid grid-cols-4 gap-5 mt-8">

                <div class="bg-white shadow rounded-2xl p-5 border">
                    <p class="text-sm text-gray-500">Total Laporan</p>
                    <p class="text-3xl font-extrabold mt-1">{{ $stats['total'] }}</p>
                </div>

                <div class="bg-white shadow rounded-2xl p-5 border">
                    <p class="text-sm text-gray-500">Menunggu</p>
                    <p class="text-3xl font-extrabold mt-1 text-yellow-500">{{ $stats['waiting'] }}</p>
                </div>

                <div class="bg-white shadow rounded-2xl p-5 border">
                    <p class="text-sm text-gray-500">Diproses</p>
                    <p class="text-3xl font-extrabold mt-1 text-blue-600">{{ $stats['process'] }}</p>
                </div>

                <div class="bg-white shadow rounded-2xl p-5 border">
                    <p class="text-sm text-gray-500">Selesai / Ditolak</p>
                    <p class="text-3xl font-extrabold mt-1 text-green-600">
                        {{ $stats['done'] + $stats['rejected'] }}
                    </p>
                </div>

            </div>

            {{-- RIWAYAT LAPORAN --}}
            <div class="mt-10">
                <h2 class="text-xl font-bold mb-4">Riwayat Laporan Kamu</h2>

                @if ($reports->count() == 0)
                    <p class="text-gray-500 italic">Kamu belum membuat laporan apa pun.</p>
                @endif

                <div class="space-y-4">

                    @foreach ($reports as $report)
                        <div class="p-5 bg-white shadow rounded-xl border">

                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="font-bold text-lg">{{ $report->title }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ $report->category }}</p>

                                    <p class="text-sm mt-2">
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

                                    <p class="text-xs text-gray-400 mt-1">
                                        {{ $report->created_at->format('d M Y - H:i') }}
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
