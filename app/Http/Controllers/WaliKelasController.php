<?php

namespace App\Http\Controllers;

use App\Models\DataWaliKelas;
use App\Models\Rapot;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WaliKelasController extends Controller
{
    public function index()
    {
        $data['wali_kelas'] = WaliKelas::get();
        return view('walikelas.index', $data);
    }

    public function create()
    {
        $data['wali_kelas'] = User::pluck('name', 'id');
        return view('walikelas.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|max:255',
            'nip' => 'required|max:255',
            'nama_guru' => 'required|max:150',
            'jabatan' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
        ]);
        

        $user = new User();
        $user->name = $validate['nama_guru'];
        $user->email = $validate['email'];
        $user->password = Hash::make('Password2024');
        $user->save();

        $walikelas = WaliKelas::create([

            'nip' => $validate['nip'],
            'nama_guru' => $validate['nama_guru'],
            'jabatan' => $validate['jabatan'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'id_user' => $user->id,
        ]);

        $user->assignRole('WaliKelas');


        $notification = array(
            'message' => "Data wali kelas berhasil ditambahkan",
            'alert-type' => 'success'
        );

        return redirect()->route('walikelas.index')->with($notification);
    }

    public function edit(string $id)
    {
        $data['walikelas'] = Walikelas::findOrFail($id);
        $data['user'] = Walikelas::findOrFail($id);
        $data['rapot'] = Rapot::pluck('name', 'id');

        return view('walikelas.edit', $data);
    }
    
    public function update(Request $request, string $id)
    {
        $walikelas = WaliKelas::findOrFail($id);

        $validate = $request->validate([
            'email' => 'required|max:255',
            'nip' => 'required|max:255',
            'nama_guru' => 'required|max:150',
            'jabatan' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
        ]);

        // $user = new User();
        // $dataUpdateWaliKelas = [
        //     'nip' => $validate['nip'],
        //     'nama_guru' => $validate['nama_guru'],
        //     'guru_kelas' => $validate['guru_kelas'],
        //     'jenis_kelamin' => $validate['jenis_kelamin'],
        //     'id_user' => $user->id,
        // ];
        $walikelas = WaliKelas::findOrFail($id);
        $user = User::find($walikelas->id_user);

        $user->name = $validate['nama_guru'];
        $user->email = $validate['email'];
        $user->save();

        $user->update([
            'email' => $validate['email'],
            'name' => $validate['nama_guru'],
        ]);

        $walikelas->update([
            'nip' => $validate['nip'],
            'nama_guru' => $validate['nama_guru'],
            'jabatan' => $validate['jabatan'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'id_user' => $user->id,
        ]);

        $notificaton = array(
            'message' => 'Data wali kelas berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('walikelas.index')->with($notificaton);
    }
    public function destroy(string $id)
    {
        $walikelas = WaliKelas::findOrFail($id);

        $walikelas->delete();

        $notificaton = array(
            'message' => 'Data wali kelas berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('walikelas.index')->with($notificaton);
    }

    // public function print()
    // {
    //     $doktors = doktor::all();

    //     $pdf = Pdf::loadview('doktors.print', ['doktors' => $doktors]);
    //     return $pdf->download('data_doktor.pdf');
    // }

    // public function export()
    // {
    //     return Excel::download(new DoktorExport, 'doktors.xlsx');
    //}
}

