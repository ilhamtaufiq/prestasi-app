@include('nonakademik.create')
@include('nonakademik.edit')
@include('nonakademik.delete')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PRESTASI SISWA NON AKADEMIK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button type="button" class="btn btn-outline-warning m-4" data-bs-toggle="modal" data-bs-target="#tambahModal">TAMBAH DATA</button>
                    <a class="btn btn-outline-warning m-4" href="{{ route('nonakademik.print') }}" target="_blank">CETAK PDF</a>

                    <x-table :tableId="'myTable_' . uniqid()">
                        <x-slot name="header">
                            <tr class="bg-gray-400 text-center">
                                <th>NO</th>
                                <th>NAMA SISWA</th>
                                <th>TANGGAL</th>
                                <th>KATEGORI LOMBA</th>
                                <th>JUARA LOMBA</th>
                                <th>TINGKAT LOMBA</th>
                                <th>DOKUMENTASI</th>
                                <th>AKSI</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach ($nonakademiks as $data)
                        <tr class="text-center">
                            <td>{{ $num++ }}</td>
                            <td>{{ $data->siswa->nama_siswa}}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{{ $data->kategori_lomba }}</td>
                            <td>{{ $data->juara_lomba }}</td>
                            <td>{{ $data->tingkat_lomba }}</td>
                            <td class="items-center">
                                @if ($data->dokumentasi)
                                <img src="{{ asset('storage/dokumentasi/' . $data->dokumentasi) }}" alt="Dokumentasi" class="h-12"/>
                                @endif
                            </td>
                            <td>
                                <button tag="a" type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id }}"><i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $data->id }}"><i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>