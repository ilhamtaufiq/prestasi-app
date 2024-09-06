<x-app-layout>
    {{--
    @include('siswa.create')
    @include('siswa.edit')
    @include('siswa.delete')
    @include('siswa.detail') --}}
    @include('mapel.edit')
    @include('mapel.delete')
    @include('mapel.create')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA SISWA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xlxl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between items-center">
                    <button type="button" class="btn btn-outline-warning m-4 p-2" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">TAMBAH DATA</button>
                </div>
                <x-table :tableId="'myTable_' . uniqid()">
                    <x-slot name="header">
                        <tr class="bg-gray-400 text-center">
                            <th>NO.</th>
                            <th>NAMA MATAPELAJARAN</th>
                            <th>AKSI</th>
                        </tr>
                    </x-slot>

                    @php $num = 1; @endphp
                    @foreach ($mapel as $data)
                        <tr class="">
                            <td>{{ $num++ }}</td>
                            <td>{{ $data->nama_mapel }}</td>
                            <td>
                                <button tag="a" type="button" class="btn btn-outline-warning"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id }}"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal_{{ $data->id }}"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
