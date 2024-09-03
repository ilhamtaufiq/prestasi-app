<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA AKADEMIK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('nonakademik.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    <div class="max-w-xl">
                        <x-input-label for="id_siswa" value="NAMA SISWA" />
                        <select id="id_siswa" name="id_siswa" class="mt-1 block w-full" required>
                            <option value="" selected>Pilih Siswa</option>
                            @foreach (\App\Models\Siswa::all() as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('id_siswa')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="tanggal" value="TANGGAL" />
                        <x-text-input id="tanggal" type="date" name="tanggal" class="mt-1 block w-full" value="{{ old('tanggal') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="kategori_lomba" value="KATEGORI LOMBA" />
                        <x-text-input id="kategori_lomba" type="text" name="kategori_lomba" class="mt-1 block w-full" value="{{ old('kategori_lomba') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('kategori_lomba')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="juara_lomba" value="JUARA LOMBA" />
                        <select id="juara_lomba" name="juara_lomba" class="mt-1 block w-full" required>
                            <option value="">Pilih Juara Lomba</option>
                            <option value="1 Solo" {{ old('juara_lomba') === '1 Solo' ? 'selected' : '' }}>1 Solo</option>
                            <option value="2 Solo" {{ old('juara_lomba') === '2 Solo' ? 'selected' : '' }}>2 Solo</option>
                            <option value="3 Solo" {{ old('juara_lomba') === '3 Solo' ? 'selected' : '' }}>3 Solo</option>
                            <option value="1 Group" {{ old('juara_lomba') === '1 Group' ? 'selected' : '' }}>1 Group</option>
                            <option value="2 Group" {{ old('juara_lomba') === '2 Group' ? 'selected' : '' }}>2 Group</option>
                            <option value="3 Group" {{ old('juara_lomba') === '3 Group' ? 'selected' : '' }}>3 Group</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('juara_lomba')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="tingkat_lomba" value="TINGKAT LOMBA" />
                        <select id="tingkat_lomba" name="tingkat_lomba" class="mt-1 block w-full" required>
                            <option value="">Pilih Tingkat Lomba</option>
                            <option value="kabupaten" {{ old('tingkat_lomba') === 'kabupatan' ? 'selected' : '' }}>Kabupaten</option>
                            <option value="kecamatan" {{ old('tingkat_lomba') === 'kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                            <option value="provinsi" {{ old('tingkat_lomba') === 'provinsi' ? 'selected' : '' }}>Provinsi</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('tingkat_lomba')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="dokumentasi" value="DOKUMENTASI" />
                        <x-file-input id="dokumentasi" name="dokumentasi" class="mt-1 block w-full" value="{{ old('dokumentasi') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('dokumentasi')" />
                    </div>
                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Close</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>