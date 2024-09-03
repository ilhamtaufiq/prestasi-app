<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">DATA PRESTASI AKADEMIK SISWA SDN NYALINDUNG II</h1>
    @php
    $tahun = date('Y');
    @endphp
    <p class="text-center">Laporan Data Prestasi Akademik Siswa-Siswi SDN Nyalindung II
        Kp.Haregem, RT/RW. 005/001 Kel.Galudra, Kec.Cugenang, Kab.Cianjur Tahun{{$tahun}}</p>
    <br>
    <table id="table-data" class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA SISWA</th>
                <th>KELAS</th>
                <th>JUMLAH NILAI RAPOT</th>
                <th>RANKING</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($akademiks as $data)
            <tr>
                <td>{{ $num++ }}</td>
                <td>{{ $data->siswa->nama_siswa}}</td>
                <td>{{ $data->siswa->kelas }}</td>
                <td>{{ $data->jumlah_nilai_rapot }}</td>
                <td>{{ $data->ranking }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>