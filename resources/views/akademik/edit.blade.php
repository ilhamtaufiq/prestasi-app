@foreach($akademiks as $data)
<div class="modal fade" id="exampleModal_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel_{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel_{{$data->id}}">EDIT DATA AKADEMIK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <form method="post" action="{{ route('akademik.update', $data->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="nama_siswa" value="NAMA SISWA" />
                            <x-text-input id="nama_siswa" type="text" name="nama_siswa" class="mt-1 block w-full" value="{{ old('nama_siswa')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_siswa')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="kelas" value="KELAS" />
                            <x-text-input id="kelas" type="text" name="kelas" class="mt-1 block w-full" value="{{ old('kelas')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jumlah_nilai_rapot" value="JUMLAH NILAI RAPOT" />
                            <x-text-input id="jumlah_nilai_rapot" type="date" name="jumlah_nilai_rapot" class="mt-1 block w-full" value="{{ old('jumlah_nilai_rapot')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_nilai_rapot')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="ranking" value="RANKING" />
                            <x-text-input id="ranking" type="text" name="ranking" class="mt-1 block w-full" value="{{ old('ranking')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('ranking')" />
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
