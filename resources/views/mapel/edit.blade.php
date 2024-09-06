@foreach ($mapel as $data)
    <div class="modal fade" id="exampleModal_{{ $data->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel_{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel_{{ $data->id }}">EDIT DATA SISWA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('mapel.update', $data->id) }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="max-w-xl">
                            <x-input-label for="nama_mapel" />
                            <x-text-input id="nama_mapel" type="text" name="nama_mapel" class="mt-1 block w-full"
                                value="{{ old('nama_mapel', $data->nama_mapel) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_mapel')" />
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
@endforeach
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
@endsection
