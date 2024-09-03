@include('akademik.create')
@include('akademik.edit')
@include('akademik.delete')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PRESTASI SISWA AKADEMIK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button type="button" class="btn btn-outline-warning m-4" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">TAMBAH DATA</button>
                    <button type="button" class="btn btn-outline-warning m-4" href="{{ route('akademik.print') }}"
                        target='blank'>CETAK PDF</button>
                    <x-table :tableId="'myTable_' . uniqid()"><br>
                        <x-slot name="header">
                            <tr class="bg-gray-400 text-center">
                                <th>NO</th>
                                <th>NAMA SISWA</th>
                                <th>KELAS</th>
                                <th>JUMLAH NILAI RAPOT</th>
                                <th>RANKING</th>
                                <th>AKSI</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach ($akademiks as $data)
                            <tr class="text-center">
                                <td>{{ $num++ }}</td>
                                <td>{{ $data->nama_siswa }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->akademik->jumlah_nilai_rapot }}</td>
                                <td>{{ $data->akademik->ranking }}</td>
                                <td>
                                    <button tag="a" type="button" class="btn btn-outline-warning"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id }}"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal_{{ $data->id }}"><i
                                            class="fa-solid fa-trash-can"></i>
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
