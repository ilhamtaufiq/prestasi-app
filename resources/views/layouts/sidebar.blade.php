<nav x-data="{ open: false }" class="d-flex flex-column bg-white h-full border-t min-h-screen">
    <div class="pt-8 pl-3">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fa-solid fa-dashboard p-2"></i>{{ __('BERANDA') }}
            </x-nav-link>
        </div>
        @hasrole('WaliKelas')
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('walikelas.index')" :active="request()->routeIs('walikelas.index')">
                <i class="fa-solid fa-user-pen p-2"></i>{{ __('WALI KELAS') }}
            </x-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.index')|| request()->routeIs('siswa.create')">
                <i class="fa-solid fa-user-group p-2"></i>{{ __('SISWA') }}
            </x-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('rapot.index')" :active="request()->routeIs('rapot.index')|| request()->routeIs('rapot.create')">
                <i class="fa-solid fa-book p-2"></i>{{ __('NILAI RAPOT') }}
            </x-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex relative" x-data="{ open: false }">
            <x-nav-link @click="open = !open" class="cursor-pointer">
                <i class="fa-solid fa-medal p-2"></i>{{ __('PRESTASI') }}
            </x-nav-link>

            <div x-show="open" @click.away="open = false" class="absolute mt-10 bg-white rounded-md shadow-lg">
                <a href="{{ route('akademik.index') }}" class="block px-2 py-2 text-gray-800 hover:bg-gray-200">
                    <i class="fa-solid fa-graduation-cap p-2"></i>{{ __('AKADEMIK') }}
                </a>
                <a href="{{ route('nonakademik.index') }}" class="block px-2 py-2 text-gray-800 hover:bg-gray-200">
                    <i class="fa-solid fa-trophy p-2"></i> {{ __('NON AKADEMIK') }}
                </a>
            </div>
        </div>
        @endhasrole

        @hasrole('KepalaSekolah')
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex relative" x-data="{ open: false }">
            <x-nav-link @click="open = !open" class="cursor-pointer">
                <i class="fa-solid fa-medal p-2"></i>{{ __('PRESTASI') }}
            </x-nav-link>
            <div x-show="open" @click.away="open = false" class="absolute mt-16 bg-white rounded-md shadow-lg">
                <a href="{{ route('akademik.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                    {{ __('AKADEMIK') }}
                </a>
                <a href="{{ route('nonakademik.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                    {{ __('NON AKADEMIK') }}
                </a>
            </div>
        </div>
        @endhasrole
    </div>
</nav>