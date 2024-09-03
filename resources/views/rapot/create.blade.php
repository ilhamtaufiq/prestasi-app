<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-bold" id="tambahModalLabel">KELOLA NILAI RAPOT SISWA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('rapot.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf
                    <div class="flex items-center mb-2">
                        <div class="w-1/3">
                            <x-input-label for="nis" value="NIS/NISN" />
                        </div>
                        <div class="w-2/3 flex">
                            <select id="nis" name="id_siswa" class="block w-72 rounded-lg" required>
                                <option value="">Pilih NIS</option>
                                @foreach (App\Models\Siswa::all() as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nis }}</option>
                                @endforeach
                            </select>
                            <!-- <select id="id_siswa" name="id_siswa" class="block w-72 rounded-lg" required>
                                <option value="">Pilih ID Siswa</option>
                                @foreach (App\Models\Siswa::all() as $siswa)
<option value="{{ $siswa->id }}">{{ $siswa->nis }}</option>
@endforeach
                            </select> -->
                            <x-input-error class="mt-1" :messages="$errors->get('nis')" />
                            <button type="button" route="{{ 'searchSiswa' }}" id="searchButton"
                                class="btn btn-secondary m-2">Cari</button>
                        </div>
                    </div>

                    <!-- Pencarian Data Siswa Berdasarkan NIS -->
                    <div class="flex items-center mb-2">
                        <div class="w-1/3">
                            <x-input-label for="nama_siswa" value="NAMA SISWA" />
                        </div>
                        <div class="w-2/3">
                            <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="block w-72"
                                value="{{ old('nama_siswa') }}" required readonly />
                            <x-input-error class="mt-1" :messages="$errors->get('nama_siswa')" />
                        </div>
                    </div>

                    <div class="flex items-center mb-2">
                        <div class="w-1/3">
                            <x-input-label for="kelas" value="KELAS" />
                        </div>
                        <div class="w-2/3">
                            <x-text-input id="kelas" type="text" name="kelas" class="block w-72"
                                value="{{ old('kelas') }}" required readonly />
                            <x-input-error class="mt-1" :messages="$errors->get('kelas')" />
                        </div>
                    </div>

                    <div class="flex items-center mb-2">
                        <div class="w-1/3">
                            <x-input-label for="tahun_pelajaran" value="TAHUN PELAJARAN" />
                        </div>
                        <div class="w-2/3">
                            <x-text-input id="tahun_pelajaran" type="text" name="tahun_pelajaran" class="block w-72"
                                value="{{ old('tahun_pelajaran') }}" required readonly />
                            <x-input-error class="mt-1" :messages="$errors->get('tahun_pelajaran')" />
                        </div>
                    </div>

                    <div class="container">
                        <p class="font-bold">CAPAIAN KOMPETENSI</p>
                        <div class="row pl-6">
                            <table border="0" cellspacing="0" cellpadding="0" id="dynamicAddRemove">
                                <tr>
                                    <td>
                                        <select name="form[0][id_mapel]" id="id_mapel">
                                            @foreach (App\Models\MataPelajaran::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input placeholder="Nilai Pengetahuan" id="nilai_pengetahuan" type="number"
                                            name="form[0][nilai_pengetahuan]" class="form-control" />
                                    </td>
                                    <td><input placeholder="Nilai Keterampilan" name="form[0][nilai_keterampilan]"
                                            id="nilai_keterampilan" class="form-control" type="number"></td>
                                    <td><button type="button" name="add" id="dynamic-ar"
                                            class="btn btn-outline-primary">Tambah</button></td>
                                </tr>
                            </table>
                        </div>
                        <br>

                        {{--
                        <p>PPKN</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>Bahasa Indonesia</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>Matematika</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>IPA</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="nilai_pengetahuan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>IPS</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>PJOK</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>Seni Budaya</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div>
                        <br>

                        <p>Basa Sunda</p>
                        <div class="row pl-6">
                            <div class="col-md-3">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" name="nilai_pengetahuan" id="nilai_pengetahuan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_pengetahuan">Huruf</label>
                                <input type="text" name="huruf_pengetahuan" id="huruf_pengetahuan" class="form-control rounded" placeholder="Huruf">
                            </div>
                            <div class="col-md-3">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" name="nilai_keterampilan" id="nilai_keterampilan" class="form-control rounded" placeholder="Nilai">
                            </div>
                            <div class="col-md-2">
                                <label for="huruf_keterampilan">Huruf</label>
                                <input type="text" name="huruf_keterampilan" id="huruf_keterampilan" class="form-control rounded" placeholder="Huruf">
                            </div>
                        </div> --}}
                        <br>

                        <div class="modal-footer">
                            <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                            <x-primary-button name="save" value="true">Simpan</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    var i = 0;
    $("#dynamic-ar").click(function() {
        ++i;
        let table = `
        <tr>
                                    <td style="border-top-style: hidden">
                                        <select name="form[${i}][id_mapel]" id="id_mapel">
                                          @foreach (App\Models\MataPelajaran::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="border-top-style: hidden">
                                        <input type="number" id="nilai_pengetahuan${i}" type="text" name="form[${i}][nilai_pengetahuan]"
                                            placeholder="Nilai Pengetahuan" class="form-control" required/>
                                    </td style="border-top-style: hidden">
                                    <td style="border-top-style: hidden"><input type="number" name="form[${i}][nilai_keterampilan]" id="nilai_keterampilan${i}"
                                            class="form-control" placeholder="Nilai Keterampilan" required></td>
                                    <td style="border-top-style: hidden"><button type="button" class="btn btn-outline-danger remove-input-field">Hapus</button></td>
                                </tr>
    `;
        $("#dynamicAddRemove").append(table);
        // $("#dynamicAddRemove").append('<tr><td><select><option></option></select></td>'
        //     '<td><input type="text" id="korek' + i +
        //     '" name="form[' + i +
        //     '][nilai_pengetahuan]" placeholder="1" class="form-control" id="nilai_pengetahuan" /></td><td><input type="text" name="form[' +
        //     i +
        //     '][huruf_pengetahuan]" placeholder="2" id="huruf_pengetahuan' + i +
        //     '" class="form-control" id="uraian"' +
        //     i +
        //     ' /></td><td><input name="form[' +
        //     i +
        //     '][nilai_keterampilan]" placeholder="3"  class="form-control input-mask text-start" id="nilai_keterampilan' +
        //     i +
        //     '" /></td><td><input type="text" name="form[' +
        //     i +
        //     '][huruf_keterampilan]" placeholder="4" class="form-control" id="huruf_keterampilan" /><td><button type="button" class="btn btn-outline-danger remove-input-field">Hapus</button></td></tr>'
        // );
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('tr').remove();
    });
</script>
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        let nis = document.getElementById('nis').value;

        if (!nis) {
            alert('Silakan pilih NIS/NISN terlebih dahulu.');
            return;
        }

        fetch(`/siswa/${nis}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('nama_siswa').value = data.nama_siswa || '';
                document.getElementById('kelas').value = data.kelas || '';
                document.getElementById('tahun_pelajaran').value = data.tahun_pelajaran || '';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengambil data.');
            });
    });

    // Fungsi untuk mengkonversi nilai ke huruf
    function convertToLetterGrade(nilai) {
        if (nilai > 85) {
            return 'A';
        } else if (nilai > 75) {
            return 'B';
        } else {
            return 'C';
        }
    }

    // Event listener untuk input nilai pengetahuan dan otomatis mengisi huruf
    document.querySelectorAll('#nilai_pengetahuan').forEach(function(input) {
        input.addEventListener('input', function() {
            const nilai = parseFloat(input.value);
            const hurufInput = input.closest('.row').querySelector('#huruf_pengetahuan');
            if (!isNaN(nilai)) {
                hurufInput.value = convertToLetterGrade(nilai);
            } else {
                hurufInput.value = '';
            }
        });
    });

    // Event listener untuk input nilai keterampilan dan otomatis mengisi huruf
    document.querySelectorAll('#nilai_keterampilan').forEach(function(input) {
        input.addEventListener('input', function() {
            const nilai = parseFloat(input.value);
            const hurufInput = input.closest('.row').querySelector('#huruf_keterampilan');
            if (!isNaN(nilai)) {
                hurufInput.value = convertToLetterGrade(nilai);
            } else {
                hurufInput.value = '';
            }
        });
    });
</script>
