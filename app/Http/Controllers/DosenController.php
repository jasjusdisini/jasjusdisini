<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function showAll()
    {
        return response()->json(Dosen::all());
    }
    public function showOne($id)
    {
        return response()->json(Dosen::find($id));
    }
    public function create(Request $request)
    {
        $dosen = Dosen::create($request->all());
        return response()->json($dosen, 201);
    }
    public function update($id, Request $request)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());

        return response()->json($dosen, 200);
    }

    public function delete($id)
    {
        Dosen::findOrFail($id)->delete();
        return response('File dari tabel dosen sudah berhasil dihapus', 200);
    }

    public function __construct()
    {
        $this->middleware('auth:api');
    }
}
