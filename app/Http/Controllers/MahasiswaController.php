<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function showAll()
    {
        return response()->json(Mahasiswa::all());
    }
    public function showOne($id)
    {
        return response()->json(Mahasiswa::find($id));
    }
    public function create(Request $request)
    {
        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json($mahasiswa, 201);
    }
    public function update($id, Request $request)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return response()->json($mahasiswa, 200);
    }

    public function delete($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return response('File dari tabel mahasiswa sudah berhasil dihapus', 200);
    }

    public function __construct()
    {
        $this->middleware('auth:api');
    }
}
