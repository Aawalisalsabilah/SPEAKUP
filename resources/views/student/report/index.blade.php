<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                            <img src="{{ asset('images/icons/receipt-text.svg') }}" alt="icon">
                        </a>
                        <a
                            class="w-[46px] h-[46px] flex items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('images/icons/notification.svg') }}" alt="icon">
                        </a>
                    </div>

                    <div class="h-[46px] w-[1px] border border-[#EEEEEE]"></div>

                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Mahasiswa</p>
                            <p class="font-semibold">{{ session('student')->name }}</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{ asset('images/photos/default-photo.svg') }}" alt="photo">
                        </div>
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

            {{-- FORM START --}}
            <form class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10" action="{{ route('laporan.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                {{-- FILE UPLOAD --}}
                <div class="flex gap-5 items-center">
                    <input type="file" name="evidence" id="icon" class="peer hidden" onchange="previewFile()">

                    <div
                        class="relative w-[150px] h-[150px] rounded-[20px] overflow-hidden
                    peer-data-[empty=true]:border-[3px]
                    peer-data-[empty=true]:border-dashed
                    peer-data-[empty=true]:border-[#EEEEEE]">
                        <div class="relative file-preview z-10 w-full h-full hidden">
                            <img class="thumbnail-icon w-full h-full object-cover" alt="thumbnail">
                        </div>

                        <span
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
                        text-center font-semibold text-sm text-[#7F8190] w-full px-2">
                            Foto<br>Kejadian
                        </span>
                    </div>

                    <button type="button"
                        class="flex shrink-0 p-[8px_20px] items-center rounded-full bg-[#0A090B] font-semibold text-white hover:bg-[#2A2A2A]"
                        onclick="document.getElementById('icon').click()">
                        Upload Bukti
                    </button>
                </div>


                {{-- JUDUL --}}
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Judul Laporan</p>

                    <div
                        class="flex items-center w-full h-[52px] p-[14px_16px]
                    rounded-full border border-[#EEEEEE]
                    focus-within:border-2 focus-within:border-[#0A090B]">
                        <img src="{{ asset('images/icons/note-favorite-outline.svg') }}" class="mr-[14px] w-6 h-6">
                        <input type="text" name="title"
                            class="font-semibold w-full outline-none placeholder:text-[#7F8190]"
                            placeholder="contoh: Parkir motor banjir" required>
                    </div>
                </div>


                {{-- KATEGORI --}}
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Kategori</p>

                    <div
                        class="flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                        <img src="{{ asset('images/icons/bill.svg') }}" class="mr-[10px] w-6 h-6">

                        <select name="category" required
                            class="font-semibold w-full outline-none text-[#0A090B]
                        invalid:text-[#7F8190] invalid:font-normal
                        bg-[url('{{ asset('images/icons/arrow-down.svg') }}')] bg-no-repeat bg-right">
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


                {{-- ANONIM --}}
                <input type="hidden" value="0" name="is_anonymous" id="anonInput">

                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Identitas Pelapor</p>

                    <div class="flex gap-[10px] items-center">

                        <a href="#" onclick="handleActiveAnchor(this)" data-group="identity" data-value="0"
                            aria-checked="true"
                            class="group relative flex w-full items-center gap-[14px]
                        p-[14px_16px] border border-[#EEEEEE] rounded-full
                        aria-checked:border-2 aria-checked:border-[#0A090B]">
                            <img src="{{ asset('images/icons/profile.svg') }}" class="w-[24px] h-[24px]">
                            <span class="font-semibold">Tampilkan</span>

                            <div
                                class="absolute top-1/2 right-0 transform -translate-y-1/2 hidden group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}">
                            </div>
                        </a>

                        <a href="#" onclick="handleActiveAnchor(this)" data-group="identity" data-value="1"
                            aria-checked="false"
                            class="group relative flex w-full items-center gap-[14px]
                        p-[14px_16px] border border-[#EEEEEE] rounded-full
                        aria-checked:border-2 aria-checked:border-[#0A090B]">
                            <img src="{{ asset('images/icons/eye-slash-outline.svg') }}" class="w-[24px] h-[24px]">
                            <span class="font-semibold">Anonim</span>

                            <div
                                class="absolute top-1/2 right-0 transform -translate-y-1/2 hidden group-aria-checked:block">
                                <img src="{{ asset('images/icons/tick-circle.svg') }}">
                            </div>
                        </a>

                    </div>
                </div>


                {{-- DETAIL LAPORAN --}}
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Detail Laporan</p>

                    <div
                        class="flex items-start p-[14px_16px] rounded-[20px] border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">

                        <img src="{{ asset('images/icons/document-text.svg') }}" class="mr-[14px] w-6 h-6">

                        <textarea name="description" placeholder="contoh: Parkir motor banjir..." style="resize:none;overflow-y:auto"
                            class="font-semibold w-full outline-none h-[144px] placeholder:text-[#7F8190]" required></textarea>
                    </div>
                </div>


                {{-- TNC --}}
                <label class="font-semibold flex items-center gap-[10px]">
                    <input type="checkbox" required class="w-[24px] h-[24px]">
                    Saya menyetujui syarat dan ketentuan
                </label>


                {{-- SUBMIT --}}
                <div class="flex items-center gap-5">
                    <button type="submit"
                        class="w-full h-[52px] bg-[#0A090B] rounded-full font-semibold text-white hover:bg-[#2A2A2A]">
                        Kirim Laporan
                    </button>
                </div>

            </form>

        </div>
    </section>

    {{-- SCRIPTS --}}
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
    </script>

    <script>
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
