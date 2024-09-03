<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA SISWA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('siswa.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    <div class="max-w-xl">
                        <x-input-label for="nama_siswa" value="NAMA SISWA" />
                        <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="mt-1 block w-full" value="{{ old('nama_siswa')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_siswa')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="nis" value="NIS" />
                        <x-text-input id="nis" type="text" name="nis" class="mt-1 block w-full" value="{{ old('nis')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="ttl" value="TEMPAT TANGGAL LAHIR" />
                        <x-text-input id="ttl" type="text" name="ttl" class="mt-1 block w-full" value="{{ old('ttl')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('ttl')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jenis_kelamin" value="JENIS KELAMIN" />
                        <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required autocomplete>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                            <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="agama" value="AGAMA" />
                        <x-text-input id="agama" type="text" name="agama" class="mt-1 block w-full" value="{{ old('agama')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('agama')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="pendik_sebelumnya" value="PENDIDIKAN SEBELUMNYA" />
                        <x-text-input id="pendik_sebelumnya" type="text" name="pendik_sebelumnya" class="mt-1 block w-full" value="{{ old('pendik_sebelumnya')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('pendik_sebelumnya')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jmlh_sodara" value="ANAK KE" />
                        <x-text-input id="jmlh_sodara" type="text" name="jmlh_sodara" class="mt-1 block w-full" value="{{ old('jmlh_sodara')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('jmlh_sodara')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="alamat" value="ALAMAT" />
                        <x-text-input id="alamat" type="text" name="alamat" class="mt-1 block w-full" value="{{ old('alamat')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                    </div>
                    <div class="row g-3">
                        <p>NAMA ORANG TUA </p>
                        <div class="col">
                            <x-text-input id="nama_ayah" type="text" name="nama_ayah" class="mt-1 block w-full" value="{{ old('nama_ayah')}}" required placeholder="Nama Ayah"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama_ayah')" />
                        </div>
                        <div class="col">
                            <x-text-input id="nama_ibu" type="text" name="nama_ibu" class="mt-1 block w-full" value="{{ old('nama_ibu')}}" required placeholder="Nama Ibu"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama_ibu')" />
                        </div>
                    </div>
                    <div class="row g-3">
                        <p>PEKERJAAN ORANG TUA </p>
                        <div class="col">
                            <x-text-input id="pekerjaan_ayah" type="text" name="pekerjaan_ayah" class="mt-1 block w-full" value="{{ old('pekerjaan_ayah')}}" required placeholder="Pekerjaan Ayah"/>
                            <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ayah')" />
                        </div>
                        <div class="col">
                            <x-text-input id="pekerjaan_ibu" type="text" name="pekerjaan_ibu" class="mt-1 block w-full" value="{{ old('pekerjaan_ibu')}}" required placeholder="Pekerjaan Ibu"/>
                            <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ibu')" />
                        </div>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="wali_siswa" value="NAMA WALI SISWA" />
                        <x-text-input id="wali_siswa" type="text" name="wali_siswa" class="mt-1 block w-full" value="{{ old('wali_siswa')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('wali_siswa')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="kelas" value="KELAS" />
                        <x-select-input id="kelas" name="kelas" class="mt-1 block w-full" required>
                            <option value="">Pilih Kelas</option>
                            <option value="I" {{ old('kelas') === 'I' ? 'selected' : '' }}>I</option>
                            <option value="II" {{ old('kelas') === 'II' ? 'selected' : '' }}>II</option>
                            <option value="III" {{ old('kelas') === 'III' ? 'selected' : '' }}>III</option>
                            <option value="IV" {{ old('kelas') === 'IV' ? 'selected' : '' }}>IV</option>
                            <option value="V" {{ old('kelas') === 'V' ? 'selected' : '' }}>V</option>
                            <option value="VI" {{ old('kelas') === 'VI' ? 'selected' : '' }}>VI</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="id_wali_kelas" value="WALI KELAS" />
                        <x-select-input id="id_wali_kelas" name="id_wali_kelas" class="mt-1 block w-full" required>
                            <option value="">Pilih Wali Kelas</option>
                            <option value="1" {{ old('id_wali_kelas') === '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('id_wali_kelas') === '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('id_wali_kelas') === '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('id_wali_kelas') === '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('id_wali_kelas') === '5' ? 'selected' : '' }}>5</option>
                            <option value="6" {{ old('id_wali_kelas') === '6' ? 'selected' : '' }}>6</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="tahun_pelajaran" value="TAHUN PELAJARAN" />
                        <x-select-input id="tahun_pelajaran" name="tahun_pelajaran" class="mt-1 block w-full" required autocomplete>
                            <option value="">Pilih Tahun Pelajaran</option>
                            <option value="2024" {{ old('tahun_pelajaran') === '2024' ? 'selected' : '' }}>2024</option>
                            <option value="2025" {{ old('tahun_pelajaran') === '2025' ? 'selected' : '' }}>2025</option>
                        </x-select-input>
                    </div>
                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
                </form>
                </form>
            </div>
        </div>
    </div>
</div>

﻿

<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> -->