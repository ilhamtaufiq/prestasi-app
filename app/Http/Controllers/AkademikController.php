<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\Akademik;
use App\Models\Rapot;
use App\Models\User;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkademikController extends Controller
{
    public function index()
    {
        $data['akademiks'] = Siswa::has('akademik')->get();
        return view('akademik.index', $data);
    }

    public function create()
    {
        // $data['siswas'] = Siswa::all();
        $data = Siswa::has('rapot')->with('rapot.mapel')->get();
        return view('akademik.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_siswa' => 'required|max:100',
            'jumlah_nilai_rapot' => 'required|max:100',
            'ranking' => 'required|max:100',
        ]);

        $akademik = Akademik::create([
            'id_siswa' => $validate['id_siswa'],
            'jumlah_nilai_rapot' => $validate['jumlah_nilai_rapot'],
            'ranking' => $validate['ranking'],
        ]);

        $notificaton = array(
            'message' => 'Data akademik berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('akademik.index')->with($notificaton);
        } else
            return redirect()->route('akademik.create')->with($notificaton);
    }

    public function edit(string $id)
    {
        $data['akademiks'] = Akademik::findOrFail($id);
        $data['prestasi'] = Akademik::findOrFail($id);
        $data['rapot'] = Rapot::pluck('name', 'id');

        return view('akademik.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $akademik = Akademik::findOrFail($id);

        $validate = $request->validate([
            'id_siswa' => 'required|max:100',
            'jumlah_nilai_rapot' => 'required|max:100',
            'ranking' => 'required|max:100',
        ]);

        $akademik->update([
           'id_siswa' => $validate['id_siswa'],
            'jumlah_nilai_rapot' => $validate['jumlah_nilai_rapot'],
            'ranking' => $validate['ranking'],
        ]);

        $notificaton = array(
            'message' => 'Data akademik berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('akademik.index')->with($notificaton);

    }
    public function destroy(string $id)
    {
        $akademik = Akademik::findOrFail($id);

        $akademik->delete();

        $notificaton = array(
            'message' => 'Data akademik berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('akademik.index')->with($notificaton);
    }

    public function print()
    {
        $akademik = Akademik::all();

        $pdf = Pdf::loadview('akademik.print', ['akademik' => $akademik]);
        return $pdf->download('data_prestasi_akademik.pdf');
    }
}
