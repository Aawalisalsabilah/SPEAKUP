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
                            class="w-[46px] h-[46px] flex items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/receipt-text.svg') }}">
                        </a>
                        <a
                            class="w-[46px] h-[46px] flex items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/notification.svg') }}">
                        </a>
                    </div>

                    <div class="h-[46px] w-[1px] border border-[#EEEEEE]"></div>

                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Mahasiswa</p>
                            <p class="font-semibold">{{ session('student')->name }}</p>
                        </div>
                        <img src="{{ asset('images/photos/default-photo.svg') }}" class="w-[46px] h-[46px]">
                    </div>

                </div>
            </div>

            {{-- HEADER CONTENT --}}
            <div class="header flex flex-col gap-1 px-5 mt-5">
                <h1 class="font-extrabold text-[30px] leading-[45px]">Buat Laporan Baru</h1>
                <p class="text-[#7F8190]">Masukkan detail laporan secara lengkap dan akurat</p>
            </div>

            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))
                <div class="mx-[70px] mt-5 p-4 bg-green-200 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FORM --}}
            <form class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10" action="{{ route('laporan.store') }}"
                method="POST" enctype="multipart/form-data">

                @csrf

                {{-- EVIDENCE --}}
                <div class="flex gap-5 items-center">
                    <input type="file" name="evidence" id="icon" class="hidden" onchange="previewFile()">

                    <div class="relative w-[150px] h-[150px] rounded-[20px] overflow-hidden border border-[#EEEEEE]">
                        <div class="file-preview hidden w-full h-full">
                            <img class="thumbnail-icon w-full h-full object-cover">
                        </div>

                        <span class="absolute inset-0 flex items-center justify-center text-center text-[#7F8190]">
                            Foto<br>Kejadian
                        </span>
                    </div>

                    <button type="button"
                        class="p-[8px_20px] bg-[#0A090B] text-white rounded-full font-semibold hover:bg-[#2A2A2A]"
                        onclick="document.getElementById('icon').click()">
                        Upload Bukti
                    </button>
                </div>

                {{-- TITLE --}}
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Judul Laporan</p>

                    <div class="flex items-center h-[52px] px-4 border rounded-full">
                        <img src="{{ asset('images/icons/note-favorite-outline.svg') }}" class="mr-3">
                        <input type="text" name="title" class="w-full outline-none"
                            placeholder="contoh: Parkir motor banjir" required>
                    </div>
                </div>

                {{-- CATEGORY --}}
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Kategori</p>

                    <div class="flex items-center p-4 border rounded-full">
                        <img src="{{ asset('images/icons/bill.svg') }}" class="mr-3">

                        <select name="category" required class="w-full outline-none font-semibold">
                            <option value="" disabled selected hidden>Pilih kategori laporan</option>
                            <option value="Fasilitas">Fasilitas</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Administrasi">Administrasi</option>
                            <option value="Pelecehan">Pelecehan</option>
                            <option value="Kekerasan">Kekerasan</option>
                            <option value="Diskriminasi">Diskriminasi</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                {{-- ANONYMOUS --}}
                <input type="hidden" name="is_anonymous" id="anonInput" value="0">

                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Identitas Pelapor</p>

                    <div class="flex gap-[10px]">

                        {{-- TAMPILKAN --}}
                        <a href="#" onclick="handleActiveAnchor(this)" data-group="identity" data-value="0"
                            aria-checked="true"
                            class="group relative flex w-full items-center gap-[14px] p-4 border border-[#EEEEEE]
            rounded-full transition-all
            aria-checked:border-2 aria-checked:border-[#0A090B]">

                            <img src="{{ asset('images/icons/profile.svg') }}" class="w-[24px] h-[24px]">
                            <span class="font-semibold">Tampilkan</span>

                            {{-- TICK --}}
                            <div class="absolute right-4 hidden group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}">
                            </div>
                        </a>

                        {{-- ANONIM --}}
                        <a href="#" onclick="handleActiveAnchor(this)" data-group="identity" data-value="1"
                            aria-checked="false"
                            class="group relative flex w-full items-center gap-[14px] p-4 border border-[#EEEEEE]
            rounded-full transition-all
            aria-checked:border-2 aria-checked:border-[#0A090B]">

                            <img src="{{ asset('images/icons/eye-slash-outline.svg') }}" class="w-[24px] h-[24px]">
                            <span class="font-semibold">Anonim</span>

                            {{-- TICK --}}
                            <div class="absolute right-4 hidden group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}">
                            </div>
                        </a>

                    </div>
                </div>


                {{-- DESCRIPTION --}}
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Detail Laporan</p>

                    <div class="flex items-start p-4 border rounded-[20px]">
                        <img src="{{ asset('images/icons/document-text.svg') }}" class="mr-3">
                        <textarea name="description" class="w-full h-[150px] outline-none" placeholder="contoh: Parkir motor banjir..."
                            required></textarea>
                    </div>
                </div>

                {{-- TNC --}}
                <label class="font-semibold flex items-center gap-[10px]">
                    <input type="checkbox" required class="w-[24px] h-[24px]">
                    Saya menyetujui syarat dan ketentuan
                </label>

                {{-- SUBMIT --}}
                <button type="submit"
                    class="h-[52px] bg-[#0A090B] text-white rounded-full font-semibold hover:bg-[#2A2A2A]">
                    Kirim Laporan
                </button>

            </form>

        </div>
    </section>

    {{-- SCRIPT --}}
    <script>
        function previewFile() {
            const preview = document.querySelector('.file-preview');
            const fileInput = document.getElementById('icon');

            if (fileInput.files.length > 0) {
                const reader = new FileReader();

                reader.onloadend = function() {
                    preview.querySelector('.thumbnail-icon').src = reader.result;
                    preview.classList.remove('hidden');
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        function handleActiveAnchor(el) {
            event.preventDefault();

            const group = el.getAttribute('data-group');
            const value = el.getAttribute('data-value');

            document.querySelectorAll(`[data-group="${group}"]`).forEach(i => {
                i.setAttribute('aria-checked', 'false');
            });

            el.setAttribute('aria-checked', 'true');

            document.getElementById('anonInput').value = value;
        }
    </script>

</body>

</html>
