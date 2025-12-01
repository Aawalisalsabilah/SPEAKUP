<div id="sidebar"
    class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px]
           bg-[#F3F3F3] rounded-r-3xl shadow-xl border-r border-[#E5E5E5]">

    <div class="w-full flex flex-col gap-[30px]">

        <!-- Logo -->
        <a href="{{ route('student.dashboard') }}" class="flex items-center justify-center">
            <img src="{{asset('images/logo/logo.svg')}}" alt="logo">
        </a>

        <!-- MENU -->
        <ul class="flex flex-col gap-3">
            <li>
                <h3 class="font-bold text-xs text-[#9CA3AF]">MENU</h3>
            </li>

            <li>
                <a href="{{ route('student.dashboard') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all
                    {{ request()->is('dashboard')
                        ? 'bg-[#EF4444] text-white shadow-md'
                        : 'hover:bg-[#EF4444] hover:text-white' }}">
                    <img src="{{asset('images/icons/home-hashtag.svg')}}" alt="icon" class="opacity-90">
                    <p class="font-semibold">Beranda</p>
                </a>
            </li>

            <li>
                <a href="{{ route('laporan.create') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all
                    {{ request()->is('laporan/buat')
                        ? 'bg-[#EF4444] text-white shadow-md'
                        : 'hover:bg-[#EF4444] hover:text-white' }}">
                    <img src="{{asset('images/icons/sms-tracking.svg')}}" alt="icon" class="opacity-90">
                    <p class="font-semibold">Buat Laporan</p>
                </a>
            </li>

            <li>
                <a href="{{ route('laporan.history') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all
                    {{ request()->is('riwayat')
                        ? 'bg-[#EF4444] text-white shadow-md'
                        : 'hover:bg-[#EF4444] hover:text-white' }}">
                    <img src="{{asset('images/icons/note-favorite-grey.svg')}}" alt="icon" class="opacity-90">
                    <p class="font-semibold">Riwayat Laporan</p>
                </a>
            </li>
        </ul>

        <!-- LAINNYA -->
        <ul class="flex flex-col gap-3 mt-6">
            <li>
                <h3 class="font-bold text-xs text-[#9CA3AF]">LAINNYA</h3>
            </li>

            <li>
                <a href="{{ route('logout') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all
                    hover:bg-[#EF4444] hover:text-white">
                    <img src="{{asset('images/icons/security-safe.svg')}}" alt="icon" class="opacity-90">
                    <p class="font-semibold">Keluar</p>
                </a>
            </li>
        </ul>

    </div>
</div>
