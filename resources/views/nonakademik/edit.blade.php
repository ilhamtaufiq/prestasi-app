@foreach($nonakademiks as $data)
<div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel_{{$data->id}}">EDIT DATA NON AKADEMIK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('nonakademik.update', $data->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('PATCH')
                    <div class="max-w-xl">
                        <x-input-label for="id_siswa" value="SISWA" />
                        <select id="id_siswa" name="id_siswa" class="mt-1 block w-full" required>
                            <option value="">Pilih Siswa</option>
                            @foreach(App\Models\Siswa::all() as $value)
                            <option value="{{ $value->id }}" {{ old('id_siswa', $data->id_siswa) == $value->id ? 'selected' : '' }}>
                                {{ $value->nama_siswa }}
                            </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('id_siswa')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="tanggal" value="TANGGAL" />
                        <x-text-input id="tanggal" type="date" name="tanggal" class="mt-1 block w-full" value="{{ old('tanggal', $data->tanggal) }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="kategori_lomba" value="KATEGORI LOMBA" />
                        <x-text-input id="kategori_lomba" type="text" name="kategori_lomba" class="mt-1 block w-full" value="{{ old('kategori_lomba', $data->kategori_lomba) }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('kategori_lomba')" />
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="juara_lomba" value="JUARA LOMBA" />
                        <select id="juara_lomba" name="juara_lomba" class="mt-1 block w-full" required>
                            <option value="">Pilih Juara Lomba</option>
                            <option value="1" {{ old('juara_lomba', $data->juara_lomba) == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('juara_lomba', $data->juara_lomba) == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('juara_lomba', $data->juara_lomba) == '3' ? 'selected' : '' }}>3</option>
                        </select>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="tingkat_lomba" value="TINGKAT LOMBA" />
                        <select id="tingkat_lomba" name="tingkat_lomba" class="mt-1 block w-full" required>
                            <option value="">Pilih Tingkat Lomba</option>
                            <option value="Kecamatan" {{ old('tingkat_lomba', $data->tingkat_lomba) == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                            <option value="Kabupaten" {{ old('tingkat_lomba', $data->tingkat_lomba) == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
                            <option value="Provinsi" {{ old('tingkat_lomba', $data->tingkat_lomba) == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                        </select>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="dokumentasi" value="DOKUMENTASI" />
                        <x-file-input id="dokumentasi" name="dokumentasi" class="mt-1 block w-full" value="{{ old('dokumentasi') }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('dokumentasi')" />
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
@endforeach

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
@endsection
