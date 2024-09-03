<?php
namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Rapot;
use App\Models\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class RapotController extends Controller
{
    public function index()
    {
        // $data['rapots'] = Rapot::get();
        $rapot = Rapot::get();
        $siswa = Siswa::has('rapot')->with('rapot.mapel')->get();
        // return response()->json($siswa, 200);
        return view('rapot.index', compact('siswa','rapot'));
    }

    public function create()
    {
        $data['Rapot'] = Rapot::pluck('rapot', 'id');
        $mapel = MataPelajaran::pluck('id','nama_mapel');
        return view('rapot.create', compact('data', 'mapel'));
    }

    // public function store(Request $request)
    // {
    //     $validate = $request->validate([
    //         'id_siswa' => 'required|max:100',
    //         'id_wali_kelas' => 'required|max:100',
    //         'pai' => 'required|max:100',
    //         'pkn' => 'required|max:100',
    //         'indo' => 'required|max:100',
    //         'mtk' => 'required|max:100',
    //         'ipa' => 'required|max:100',
    //         'ips' => 'required|max:100',
    //         'pjok' => 'required|max:100',
    //         'senbud' => 'required|max:100',
    //         'sunda' => 'required|max:100',
    //         'nilai_pengetahuan' => 'required|max:100',
    //         'huruf_pengetahuan' => 'required|max:100',
    //         'nilai_keterampilan' => 'required|max:100',
    //         'huruf_keterampilan' => 'required|max:100',
    //     ]);
    //     dd($validate);

    // $rapot = Rapot::create([
    //         'id_siswa' => $validate['id_siswa'],
    //         'id_wali_kelas' => $validate['id_wali_kelas'],
    //         'pai' => $validate['pai'],
    //         'pkn' => $validate['pkn'],
    //         'indo' => $validate['indo'],
    //         'mtk' => $validate['mtk'],
    //         'ipa' => $validate['ipa'],
    //         'ips' => $validate['ips'],
    //         'pjok' => $validate['pjok'],
    //         'senbud' => $validate['senbud'],
    //         'sunda' => $validate['sunda'],
    //         'nilai_pengetahuan' => $validate['nilai_pengetahuan'],
    //         'huruf_pengetahuan' => $validate['nilai_pengetahuan'],
    //         'nilai_keterampilan' => $validate['nilai_keterampilan'],
    //         'huruf_keterampilan' => $validate['nilai_keterampilan'],
    //     ]);


    //     $notificaton = array(
    //         'message' => 'Data siswa berhasil ditambahkan',
    //         'alert-type' => 'success'
    //     );

    //     if ($request->save == true) {
    //         return redirect()->route('rapot.index')->with($notificaton);
    //     } else
    //         return redirect()->route('rapot.create')->with($notificaton);
    //  }

    public function store(Request $request)
    {
        foreach ($request->form as $key => $value) {
            $hurufP = '';
            $hurufK = '';

            if ($value['nilai_pengetahuan'] >= 85) {
                $hurufP = 'A';
            } else if ($value['nilai_pengetahuan'] >= 75 ) {
               $hurufP = 'B';
            } else {
                $hurufP = 'C';
            };

            if ($value['nilai_pengetahuan'] >= 85) {
                $hurufK = 'A';
            } else if ($value['nilai_pengetahuan'] >= 75 ) {
               $hurufK = 'B';
            } else {
                $hurufK = 'C';
            };

           $rapot =  Rapot::create([
                'id_siswa' => $request['id_siswa'],
                'id_mapel' => $value['id_mapel'],
                'id_wali_kelas' => Auth::id(),
                'nilai_pengetahuan' => $value['nilai_pengetahuan'],
                'huruf_pengetahuan' => $hurufP,
                'nilai_keterampilan' => $value['nilai_keterampilan'],
                'huruf_keterampilan' => $hurufK,

                ]);
        }
        // Validasi data dari request
        // $validated = $request->validate([
        //     'id_siswa' => 'required|max:100',
        //     'nilai_pengetahuan' => 'required|max:100',
        //     'huruf_pengetahuan' => 'required|max:100',
        //     'nilai_keterampilan' => 'required|max:100',
        //     'huruf_keterampilan' => 'required|max:100',
        // ]);

        // $rapot = Rapot::create([
        //     'id_siswa' => $validated['id_siswa'],
        //     'nilai_pengetahuan' => $validated['nilai_pengetahuan'],
        //     'huruf_pengetahuan' => $validated['huruf_pengetahuan'],
        //     'nilai_keterampilan' => $validated['nilai_keterampilan'],
        //     'huruf_keterampilan' => $validated['huruf_keterampilan'],
        // ]);

        // return response()->json($rapot, 201);
        $notificaton = array(
            'message' => 'Data siswa berhasil ditambahkan',
            'alert-type' => 'success'
        );
        if ($request->save == true) {
            return redirect()->route('rapot.index')->with($notificaton);
        } else
            return redirect()->route('rapot.create')->with($notificaton);

    }

    public function pai(Request $request)
    {
        $validated = $request->validate([
            'nilai_pengetahuan' => 'required|max:100',
            'huruf_pengetahuan' => 'required|max:100',
            'nilai_keterampilan' => 'required|max:100',
            'huruf_keterampilan' => 'required|max:100',
        ]);
        return response()->json($validated);
    }
}
