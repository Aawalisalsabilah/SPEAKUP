<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="font-poppins text-[#0A090B]">
    <section id="content" class="flex">
        <div id="sidebar"
            class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
            <div class="w-full flex flex-col gap-[30px]">
                <a href="index.html" class="flex items-center justify-center">
                    <img src="{{asset('images/logo/logo.svg')}}" alt="logo">
                </a>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">MENU</h3>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#EF4444]">
                            <div>
                                <img src="{{asset('images/icons/home-hashtag.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Beranda</p>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 bg-[#EF4444] transition-all duration-300 hover:bg-[#EF4444]">
                            <div>
                                <img src="{{asset('images/icons/sms-tracking.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold text-white transition-all duration-300 hover:text-white">Buat Laporan</p>
                        </a>
                    </li>
                    <li>
                        <a href="history.html"
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#EF4444]">
                            <div>
                                <img src="{{asset('images/icons/note-favorite-grey.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Riwayat Laporan</p>
                        </a>
                    </li>
                </ul>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">LAINNYA</h3>
                    </li>
                    <li>
                        <a href="signin.html"
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#EF4444]">
                            <div>
                                <img src="{{asset('images/icons/security-safe.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Keluar</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            <div class="nav flex justify-end p-5 border-b border-[#EEEEEE]">
                <div class="flex items-center gap-[30px]">
                    <div class="flex gap-[14px]">
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{asset('images/icons/receipt-text.svg')}}" alt="icon">
                        </a>
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{asset('images/icons/notification.svg')}}" alt="icon">
                        </a>
                    </div>
                    <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>
                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Mahasiswa</p>
                            <p class="font-semibold">Kharis Pradana</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{asset('images/photos/default-photo.svg')}}" alt="photo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="header flex flex-col gap-1 px-5 mt-5">
                <h1 class="font-extrabold text-[30px] leading-[45px]">Buat Laporan Baru</h1>
                <p class="text-[#7F8190]">Masukkan detail laporan secara lengkap dan akurat</p>
            </div>
            <form class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10">
                <div class="flex gap-5 items-center">
                    <input type="file" name="icon" id="icon" class="peer hidden" onchange="previewFile()" data-empty="true" required>
                    <div class="relative w-[150px] h-[150px] rounded-[20px] overflow-hidden peer-data-[empty=true]:border-[3px] peer-data-[empty=true]:border-dashed peer-data-[empty=true]:border-[#EEEEEE]">
                        <div class="relative file-preview z-10 w-full h-full hidden">
                            <img src="" class="thumbnail-icon w-full h-full object-cover" alt="thumbnail">
                        </div>
                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 text-center font-semibold text-sm text-[#7F8190] w-full px-2">
                            Foto<br>Kejadian
                        </span>
                    </div>
                    <button type="button" class="flex shrink-0 p-[8px_20px] h-fit items-center rounded-full bg-[#0A090B] font-semibold text-white transition hover:bg-[#2A2A2A]" onclick="document.getElementById('icon').click()">
                        Upload Bukti
                    </button>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Judul Laporan</p>
                    <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="contoh: Parkir motor banjir" name="name" required>
                    </div>
                </div>
                <div class="group/category flex flex-col gap-[10px]">
                    <p class="font-semibold">Kategori</p>
                    <div class="peer flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/bill.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <select id="category" class="pl-1 font-semibold focus:outline-none w-full text-[#0A090B] invalid:text-[#7F8190] invalid:font-normal appearance-none bg-[url('{{asset('images/icons/arrow-down.svg')}}')] bg-no-repeat bg-right" name="category" required>
                            <option value="" disabled selected hidden>Pilih kategori laporan</option>
                            <option value="a" class="font-semibold">Fasilitas</option>
                            <option value="b" class="font-semibold">Akademik</option>
                            <option value="b" class="font-semibold">Administrasi</option>
                            <option value="b" class="font-semibold">Pelecehan</option>
                            <option value="b" class="font-semibold">Kekerasan</option>
                            <option value="b" class="font-semibold">Diskriminasi</option>
                            <option value="b" class="font-semibold">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Identitas Pelapor</p>
                    <div class="flex gap-[10px] items-center">
                        <a href="#" class="group relative flex w-full items-center gap-[14px] p-[14px_16px] border border-[#EEEEEE] rounded-full transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]" data-group="publish-date" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[24px] h-[24px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('images/icons/profile.svg')}}" class="w-full h-full" alt="icon">
                            </div>
                            <span class="font-semibold">Tampilkan</span>
                            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{asset('images/icons/tick-circle.svg')}}" alt="icon">
                            </div>
                        </a>
                        <a href="#" class="group relative flex w-full items-center gap-[14px] p-[14px_16px] border border-[#EEEEEE] rounded-full transition-all duration-300 aria-checked:border-2 aria-checked:border-[#0A090B]" data-group="publish-date" aria-checked="false" onclick="handleActiveAnchor(this)">
                            <div class="w-[24px] h-[24px] flex shrink-0 overflow-hidden">
                                <img src="{{asset('images/icons/eye-slash-outline.svg')}}" class="w-full h-full" alt="icon">
                            </div>
                            <span class="font-semibold">Anonim</span>
                            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 right-0 hidden transition-all duration-300 group-aria-checked:block">
                                <img src="{{asset('images/icons/tick-circle.svg')}}" alt="icon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Detail Laporan</p>

                    <div class="flex items-start w-[500px] p-[14px_16px] rounded-[20px] border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">

                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden mt-[2px] flex-shrink-0">
                            <img src="{{asset('images/icons/document-text.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>

                        <textarea
                            id="laporanInput"
                            style="resize: none; overflow-y: hidden;"
                            class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none bg-transparent h-[144px]"
                            placeholder="contoh: Parkir motor banjir..."
                            name="detail_laporan"
                            required
                            oninput="autoResize(this)"></textarea>
                    </div>
                </div>
                <label class="font-semibold flex items-center gap-[10px]"
                    ><input
                    type="radio"
                    name="tnc"
                    class="w-[24px] h-[24px] appearance-none checked:border-[3px] checked:border-solid checked:border-white rounded-full checked:bg-[#DC2626] ring ring-[#EEEEEE]"
                    checked/>
                    I have read terms and conditions
                </label>
                <div class="flex items-center gap-5">
                    <a href="history.html" class="w-full h-[52px] p-[14px_20px] bg-[#0A090B] rounded-full font-semibold text-white transition-all duration-300 text-center">Kirim Laporan</a>
                </div>
            </form>
        </div>
    </section>

    <script>
        function previewFile() {
            var preview = document.querySelector('.file-preview');
            var fileInput = document.querySelector('input[type=file]');

            if (fileInput.files.length > 0) {
                var reader = new FileReader();
                var file = fileInput.files[0]; // Get the first file from the input

                reader.onloadend = function () {
                    var img = preview.querySelector('.thumbnail-icon'); // Get the thumbnail image element
                    img.src = reader.result; // Update src attribute with the uploaded file
                    preview.classList.remove('hidden'); // Remove the 'hidden' class to display the preview
                }

                reader.readAsDataURL(file);
                fileInput.setAttribute('data-empty', 'false');
            } else {
                preview.classList.add('hidden'); // Hide preview if no file selected
                fileInput.setAttribute('data-empty', 'true');
            }
        }
    </script>

    <script>
        function handleActiveAnchor(element) {
            event.preventDefault();

            const group = element.getAttribute('data-group');

            // Reset all elements' aria-checked to "false" within the same data-group
            const allElements = document.querySelectorAll(`[data-group="${group}"][aria-checked="true"]`);
            allElements.forEach(el => {
                el.setAttribute('aria-checked', 'false');
            });

            // Set the clicked element's aria-checked to "true"
            element.setAttribute('aria-checked', 'true');
        }
    </script>

    <script>
        function autoResize(el) {
            el.style.height = '144px';

            if (el.scrollHeight > 144) {
                el.style.height = el.scrollHeight + 'px';
            }
        }
    </script>

</body>
</html>
