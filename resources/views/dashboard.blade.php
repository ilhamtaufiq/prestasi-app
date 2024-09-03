<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BERANDA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Auth::check())
                    Ini halaman
                    @foreach(Auth::user()->roles as $role)
                    {{ $role->name }}
                    @endforeach
                    - Selamat datang {{ Auth::user()->name }} di Aplikasi Pengelolaan dan Pemilihan Siswa Berprestasi!
                    @endif
                </div>
            </div>

            @hasrole('WaliKelas')
            <style>
                @media (min-width: 640px) {
                    .responsive-margin>div {
                        margin: 0 !important;
                    }
                }
            </style>
            <div class="flex flex-wrap pt-4 gap-4 responsive-margin">
                <div class="bg-sky-950 w-72 overflow-hidden shadow-sm sm:rounded-lg m-auto">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-xl text-white leading-tight">Data Guru</h2>
                        <small class="text-white">Data guru di SDN Nyalindung II</small>
                        <p class="font-extrabold text-2xl text-right pt-2 text-white">{{ App\Models\WaliKelas::count() }}</p>
                    </div>
                </div>

                <div class="bg-red-950 w-72 overflow-hidden shadow-sm sm:rounded-lg m-auto">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-xl text-white leading-tight">Data Prestasi Akademik</h2>
                        <small class="text-white">Data prestasi siswa akademik</small>
                        <p class="font-extrabold text-2xl text-right pt-2 text-white">{{ App\Models\Akademik::count() }}</p>
                    </div>
                </div>

                <div class="bg-amber-950 w-72 overflow-hidden shadow-sm sm:rounded-lg m-auto">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-xl text-white leading-tight">Data Prestasi Non-Akademik</h2>
                        <small class="text-white">Data prestasi siswa non akademik</small>
                        <p class="font-extrabold text-2xl text-right pt-2 text-white">{{ App\Models\NonAkademik::count() }}</p>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <div style="height: 1000px; width: 600px;">
                <canvas id="mykelas"></canvas>
            </div>
            @endhasrole

            @hasrole('KepalaSekolah')
            <style>
                @media (min-width: 640px) {
                    .responsive-margin>div {
                        margin: 0 !important;
                    }
                }
            </style>
            <div class="flex flex-wrap pt-4 gap-4 responsive-margin">
                <div class="bg-red-950 w-72 overflow-hidden shadow-sm sm:rounded-lg m-auto">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-xl text-white leading-tight">Data Prestasi Akademik</h2>
                        <small class="text-white">Data prestasi siswa akademik</small>
                        <p class="font-extrabold text-2xl text-right pt-2 text-white">{{ App\Models\Akademik::count() }}</p>
                    </div>
                </div>

                <div class="bg-amber-800 w-72 overflow-hidden shadow-sm sm:rounded-lg m-auto">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-bold text-xl text-white leading-tight">Data Prestasi Non-Akademik</h2>
                        <small class="text-white">Data prestasi siswa non akademik</small>
                        <p class="font-extrabold text-2xl text-right pt-2 text-white">{{ App\Models\NonAkademik::count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div style="height: 300px; width: full;">
            <canvas id="mykelas"></canvas>
        </div>
        @endhasrole

    </div>
    </div>
</x-app-layout>

@php
    $kelas1= DB::table('siswas')->where('kelas', 'I')->count();
    $kelas2= DB::table('siswas')->where('kelas', 'II')->count();
    $kelas3= DB::table('siswas')->where('kelas', 'III')->count();
    $kelas4= DB::table('siswas')->where('kelas', 'IV')->count();
    $kelas5= DB::table('siswas')->where('kelas', 'V')->count();
    $kelas6= DB::table('siswas')->where('kelas', 'VI')->count();  
@endphp

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const kelas = document.getElementById('mykelas');

    new Chart(kelas, {
        type: 'bar',
        data: {
            labels: ['Kelas-I', 'Kelas-II', 'Kelas-III', 'Kelas-IV', 'Kelas-V', 'Kelas-VI'],
            datasets: [{
                label: 'JUMLAH DATA SISWA-SISWI',
                data: [{{ $kelas1 }}, {{ $kelas2 }}, {{ $kelas3 }}, {{ $kelas3 }}, {{ $kelas4 }}, {{ $kelas5 }}, {{ $kelas6 }}],
                backgroundColor: ['#16303F', '#91887B'],
                borderWidth: 1
            }]
        },
    });
</script>