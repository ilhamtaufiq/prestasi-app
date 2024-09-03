<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA NON AKADEMIK</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">DATA PRESTASI NON AKADEMIK SISWA SDN NYALINDUNG II</h1>
    @php
    $tahun = date('Y');
    @endphp
    <p class="text-center">Laporan Data Prestasi Non Akademik Siswa-Siswi SDN Nyalindung II
        Kp.Haregem, RT/RW. 005/001 Kel.Galudra, Kec.Cugenang, Kab.Cianjur Tahun {{$tahun}}</p>
    <br>
    <table id="table-data" class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA SISWA</th>
                <th>TANGGAL</th>
                <th>KATEGORI LOMBA</th>
                <th>JUARA LOMBA</th>
                <th>TINGKAT LOMBA</th>
                <th>DOKUMENTASI</th>
            </tr>
        </thead>
        <tbody>
            @php $num=1; @endphp
            @foreach ($nonakademik as $data)
            <tr>
                <td>{{ $num++ }}</td>
                <td>{{ $data->siswa->nama_siswa}}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->kategori_lomba }}</td>
                <td>{{ $data->juara_lomba }}</td>
                <td>{{ $data->tingkat_lomba }}</td>
                <td>
                    @if ($data->dokumentasi !== null)
                    <img src="{{ public_path('storage/dokumentasi/' . $data->dokumentasi) }}" width="80px" alt="Dokumentasi" class="h-12" />
                    @else
                    [Gambar Tidak Tersedia]
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>