<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <button tag="a" type="button" class="btn btn-outline-warning" onclick="history.back()">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-2">
                    @php
                    $kelas = App\Models\Siswa::find('kelas');
                    @endphp
                    DATA SISWA KELAS {{$kelas}}
                </h2>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-table>
                        <thead>
                            <tr class="bg-gray-400 text-center">
                                <th>NO</th>
                                <th>NIS</th>
                                <th>NAMA</th>
                                <th>KELAS</th>
                                <th>JENIS KELAMIN</th>
                                <th>TAHUN PELAJARAN</th>
                                <th>WALI KELAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $num = 1; @endphp
                            @foreach ($siswas as $data)
                            <tr class="text-center">
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama_siswa }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->tahun_pelajaran }}</td>
                                <td>{{ $data->walikelas->nama_guru }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>