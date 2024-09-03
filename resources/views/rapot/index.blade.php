@include('rapot.create')
@include('rapot.detail')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATA NILAI RAPOT SISWA-SISWI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <button type="button" class="btn btn-outline-warning m-4" data-bs-toggle="modal"
                    data-bs-target="#tambahModal">TAMBAH DATA</button>
                <x-table :tableId="'myTable_' . uniqid()">
                    <x-slot name="header">
                        <tr class="bg-gray-400 text-center">
                            <th>NO.</th>
                            <th>NAMA SISWA</th>
                            <th>NIS</th>
                            <th>KELAS</th>
                            <th>TAHUN PELAJARAN</th>
                            <th>AKSI</th>
                        </tr>
                    </x-slot>

                    @php $num = 1; @endphp
                    @foreach ($siswa as $data)
                        <tr class="text-center">
                            <td>{{ $num++ }}</td>
                            <td>{{ $data->nama_siswa }}</td>
                            <td>{{ $data->nis }}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>{{ $data->tahun_pelajaran }}</td>
                            <td>
                                <!-- <button tag="a" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id }}"><i class="fa-solid fa-folder"></i></button> -->
                                <button tag="a" type="button" class="btn btn-outline-warning"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $data->id }}"><i
                                        class="fa-solid fa-pen-to-square"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal_{{ $data->id }}"><i
                                        class="fa-solid fa-trash-can"></i></button>
                                <button tag="a" type="button" class="btn btn-outline-success"
                                    data-bs-toggle="modal" data-bs-target="#openModel_{{ $data->id }}"><i
                                        class="fa-solid fa-folder"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>

    <script>
        function submitFilterForm() {
            document.getElementById("filterForm").submit();
        }
    </script>
</x-app-layout>
