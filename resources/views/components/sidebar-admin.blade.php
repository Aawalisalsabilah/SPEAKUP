<div id="sidebar"
    class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px]
           bg-[#F3F3F3] rounded-r-3xl shadow-xl border-r border-[#E5E5E5]">

    <div class="w-full flex flex-col gap-[30px]">

        <!-- Logo -->
        <a href="{{ route('dashboard.admin') }}" class="flex items-center justify-center">
            <img src="{{ asset('images/logo/logo.svg') }}" alt="logo">
        </a>

        <!-- MENU -->
        <ul class="flex flex-col gap-3">
            <li>
                <h3 class="font-bold text-xs text-[#9CA3AF]">MENU</h3>
            </li>

            <li>
                <a href="{{ route('dashboard.admin') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all
                    {{ request()->is('admin/dashboard')
                        ? 'bg-[#0A090B] text-white shadow-md'
                        : 'hover:bg-[#0A090B] hover:text-white' }}">
                    <img src="{{ asset('images/icons/home-hashtag.svg') }}" alt="icon" class="opacity-90">
                    <p class="font-semibold">Dashboard</p>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.reports') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all
                    {{ request()->is('admin/reports*')
                        ? 'bg-[#0A090B] text-white shadow-md'
                        : 'hover:bg-[#0A090B] hover:text-white' }}">
                    <img src="{{ asset('images/icons/note-favorite-grey.svg') }}" alt="icon" class="opacity-90">
                    <p class="font-semibold">Kelola Laporan</p>
                    @if(isset($pendingCount) && $pendingCount > 0)
                        <div class="w-5 h-5 flex shrink-0 rounded-full items-center justify-center bg-[#FD445E]">
                            <p class="font-bold text-[10px] leading-[15px] text-white">{{ $pendingCount }}</p>
                        </div>
                    @endif
                </a>
            </li>
        </ul>

        <!-- LAINNYA -->
        <ul class="flex flex-col gap-3 mt-6">
            <li>
                <h3 class="font-bold text-xs text-[#9CA3AF]">LAINNYA</h3>
            </li>

            <li>
                <a href="{{ route('admin.logout') }}"
                    class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all
                    hover:bg-[#EF4444] hover:text-white">
                    <img src="{{ asset('images/icons/security-safe.svg') }}" alt="icon" class="opacity-90">
                    <p class="font-semibold">Keluar</p>
                </a>
            </li>
        </ul>

    </div>
</div>
