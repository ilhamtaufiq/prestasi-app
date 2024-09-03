<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">TAMBAH DATA AKADEMIK</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('akademik.store') }}" enctype="multipart/form-data"
                    class="mt-6 space-y-6">
                    @csrf
                    <div class="max-w-xl">
                        <x-input-label for="id_siswa" value="SISWA" />
                        <x-select-input id="id_siswa" name="id_siswa" class="mt-1 block w-full" required>
                            <option value="">Pilih Siswa</option>
                            @foreach (App\Models\Siswa::all() as $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->nama_siswa }}
                                </option>
                            @endforeach
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="kelas" value="KELAS" />
                        <x-select-input id="kelas" name="kelas" class="mt-1 block w-full" required>
                            <option value="">Pilih kelas</option>
                            <option value="I" {{ old('kelas') === 'I' ? 'selected' : '' }}>I</option>
                            <option value="II" {{ old('kelas') === 'II' ? 'selected' : '' }}>II</option>
                            <option value="III" {{ old('kelas') === 'III' ? 'selected' : '' }}>III</option>
                            <option value="IV" {{ old('kelas') === 'IV' ? 'selected' : '' }}>IV</option>
                            <option value="V" {{ old('kelas') === 'V' ? 'selected' : '' }}>V</option>
                            <option value="VI" {{ old('kelas') === 'VI' ? 'selected' : '' }}>VI</option>
                        </x-select-input>
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="id_rapot" value="JUMLAH NILAI RAPOT" />
                        <x-text-input id="id_rapot" type="number" name="jumlah_nilai_rapot" class="mt-1 block w-full"
                            value="" required />

                        {{-- <x-select-input id="id_rapot" name="id_rapot" class="mt-1 block w-full" required>
                            <option value="">Pilih Jumlah Nilai Siswa</option>
                            @foreach (App\Models\Rapot::all() as $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->siswa->rapot }}
                                </option>
                            @endforeach
                        </x-select-input> --}}
                    </div>
                    <div class="max-w-xl">
                        <x-input-label for="ranking" value="RANKING" />
                        <x-text-input id="ranking" type="text" name="ranking" class="mt-1 block w-full"
                            value="{{ old('ranking') }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('ranking')" />
                    </div>
                    <div class="modal-footer ">
                        <x-secondary-button tag="a" data-bs-dismiss="modal">Batal</x-secondary-button>
                        <x-primary-button name="save" value="true">Simpan</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#id_siswa').on('change', function() {
            var siswaID = $(this).val();
            if (siswaID) {
                $.ajax({
                    url: '/getrapot/' + siswaID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            $('#id_rapot').val(data);
                        } else {
                            $('#id_rapot').val(data);
                        }
                    }
                });
            } else {
                $('#course').empty();
            }
        });
    });
</script>
