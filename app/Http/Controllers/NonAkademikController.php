<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\NonAkademik;
use App\Models\Rapot;
use App\Models\User;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class NonAkademikController extends Controller
{
    public function index()
    {
        $data['nonakademiks'] = NonAkademik::with('siswa')->get();
        return view('nonakademik.index', $data);
    }

    public function create()
    {
        $data['siswas'] = Siswa::all();
        return view('nonakademik.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_siswa' => 'required|integer|max:100',
            'tanggal' => 'required|max:100',
            'kategori_lomba' => 'required|max:100',
            'juara_lomba' => 'required|max:100',
            'tingkat_lomba' => 'required|max:100',
            'dokumentasi' => 'nullable|image',
        ]);

        if ($request->hasFile('dokumentasi')) {
            $filename = 'dokumentasi' . time() . '.' . $request->file('dokumentasi')->extension();
            $path = $request->file('dokumentasi')->storeAs('public/dokumentasi', $filename);
            $validate['dokumentasi'] = basename($path);
        }

        $nonakademik = NonAkademik::create([
            'id_siswa' => $validate['id_siswa'],
            'tanggal' => $validate['tanggal'],
            'kategori_lomba' => $validate['kategori_lomba'],
            'juara_lomba' => $validate['juara_lomba'],
            'tingkat_lomba' => $validate['tingkat_lomba'],
            'dokumentasi' => $validate['dokumentasi'] ?? null,
        ]);

        $notification = array(
            'message' => 'Data non akademik berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('nonakademik.index')->with($notification);
    }

    public function edit(string $id)
    {
        $data['nonakademiks'] = NonAkademik::findOrFail($id);
        $data['prestasi'] = NonAkademik::findOrFail($id);
        $data['rapot'] = Rapot::pluck('name', 'id');

        return view('nonakademik.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $nonakademik = NonAkademik::findOrFail($id);

        $validate = $request->validate([
            'id_siswa' => 'required|integer',
            'tanggal' => 'required|max:100',
            'kategori_lomba' => 'required|max:100',
            'juara_lomba' => 'required|max:100',
            'tingkat_lomba' => 'required|max:100',
            'dokumentasi' => 'nullable|image',
        ]);

        if ($request->hasFile('dokumentasi')) {
            if ($nonakademik->dokumentasi != null) {
                Storage::delete('public/dokumentasi/' . $nonakademik->dokumentasi);
            }

            $filename = 'dokumentasi' . time() . '.' . $request->file('dokumentasi')->extension();
            $path = $request->file('dokumentasi')->storeAs('public/dokumentasi', $filename);
            $validate['dokumentasi'] = basename($path);
        }

        $nonakademik->update([
            'id_siswa' => $validate['id_siswa'],
            'tanggal' => $validate['tanggal'],
            'kategori_lomba' => $validate['kategori_lomba'],
            'juara_lomba' => $validate['juara_lomba'],
            'tingkat_lomba' => $validate['tingkat_lomba'],
            'dokumentasi' => $validate['dokumentasi'] ?? $nonakademik->dokumentasi,
        ]);

        $notification = array(
            'message' => 'Data non akademik berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('nonakademik.index')->with($notification);
    }

    public function destroy(string $id)
    {
        $nonakademik = NonAkademik::findOrFail($id);

        Storage::delete('public/dokumentasi/' . $nonakademik->dokumentasi);

        $nonakademik->delete();

        $notification = array(
            'message' => 'Data non akademik berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('nonakademik.index')->with($notification);
    }

    public function print()
    {
        $nonakademik = NonAkademik::all();

        $pdf = PDF::loadview('nonakademik.print', ['nonakademik' => $nonakademik]);
        return $pdf->download('data_prestasi_nonakademik.pdf');
    }
}
