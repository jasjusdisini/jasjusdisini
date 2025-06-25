<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makul;

class MakulController extends Controller
{
    public function showAll()
    {
        return response()->json(Makul::all());
    }
    public function showOne($id)
    {
        return response()->json(Makul::find($id));
    }
    public function create(Request $request)
    {
        $makul = Makul::create($request->all());
        return response()->json($makul, 201);
    }
    public function update($id, Request $request)
    {
        $makul = Makul::findOrFail($id);
        $makul->update($request->all());

        return response()->json($makul, 200);
    }

    public function delete($id)
    {
        Makul::findOrFail($id)->delete();
        return response('File dari tabel mata kuliah sudah berhasil dihapus', 200);
    }

    public function __construct()
    {
        $this->middleware('auth:api');
    }
}
