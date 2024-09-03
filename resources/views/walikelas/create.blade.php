<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA WALI KELAS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('walikelas.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    <div class="max-w-xl">
                        <x-input-label for="email" value="EMAIL" />
                        <x-text-input id="email" type="text" name="email" class="mt-1 block w-full" value="{{ old('email')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="nip" value="NIP" />
                        <x-text-input id="nip" type="text" name="nip" class="mt-1 block w-full" value="{{ old('nip')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="nama_guru" value="NAMA GURU" />
                        <x-text-input id="nama_guru" type="text" name="nama_guru" class="mt-1 block w-full" value="{{ old('nama_guru')}}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_guru')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jabatan" value="JABATAN" />
                        <x-select-input id="jabatan" name="jabatan" class="mt-1 block w-full" required>
                            <option value="">Pilih Jabatan</option>
                            <option value="Kepala Sekolah" {{ old('jabatan') === 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                            <option value="Wali Kelas 1" {{ old('jabatan') === 'Wali Kelas 1' ? 'selected' : '' }}>Wali Kelas 1</option>
                            <option value="Wali Kelas 2" {{ old('jabatan') === 'Wali Kelas 2' ? 'selected' : '' }}>Wali Kelas 2</option>
                            <option value="Wali Kelas 3" {{ old('jabatan') === 'Wali Kelas 3' ? 'selected' : '' }}>Wali Kelas 3</option>
                            <option value="Wali Kelas 4" {{ old('jabatan') === 'Wali Kelas 4' ? 'selected' : '' }}>Wali Kelas 4</option>
                            <option value="Wali Kelas 5" {{ old('jabatan') === 'Wali Kelas 5' ? 'selected' : '' }}>Wali Kelas 5</option>
                            <option value="Wali Kelas 6" {{ old('jabatan') === 'Wali Kelas 6' ? 'selected' : '' }}>Wali Kelas 6</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="jenis_kelamin" value="JENIS KELAMIN" />
                        <x-select-input id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full" required autocomplete>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                            <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        </x-select-input>
                    </div>
                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
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