@foreach ($nonakademiks as $data)
<div class="modal fade" id="hapusModal_{{ $data->id }}" tabindex="-1" aria-labelledby="hapusModalLabel_{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel_{{ $data->id }}">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('nonakademik.destroy', $data->id)}}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('delete')
                    <p>Anda yakin ingin menghapus data {{ $data->nama_siswa }} ?</p>
                    <div class="modal-footer">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button value="true">Hapus</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach