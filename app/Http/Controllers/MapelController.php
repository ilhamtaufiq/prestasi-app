<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = MataPelajaran::get();
        return view('mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_mapel' => 'required',
        ]);

        $mapel = MataPelajaran::create([
            'nama_mapel' => $validate['nama_mapel'],
        ]);

        $notificaton = array(
            'message' => 'Data berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($mapel->save == true) {
            return redirect()->route('mapel.index')->with($notificaton);
        } else
            return redirect()->route('mapel.index')->with($notificaton);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $validate = $request->validate([

            'nama_mapel' => 'required',
        ]);

        $mapel->update([

            'nama_mapel' => $validate['nama_mapel'],
        ]);

        $notificaton = array(
            'message' => 'Data berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('mapel.index')->with($notificaton);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $mapel->delete();

        $notificaton = array(
            'message' => 'Data berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('mapel.index')->with($notificaton);
    }
}
