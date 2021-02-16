<?php

namespace App\Http\Controllers\Api;

use App\Models\Kontraks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontraksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontraks = Kontraks::orderby('id', 'desc') -> paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Kontrak Mahasiswa',
            'data' => $kontraks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|unique:kontraks|max:255',
            'semester_id' => 'required',
        ]);

        $k = Kontraks::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);

        if($kontraks)
        {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Ditambahkan',
                'data' => $kontraks
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal Ditambahkan',
                'data' => $kontraks
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $matakuliah = Kontraks::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Kontrak Mahasiswa',
            'data' => $matakuliah
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'semester_id' => 'required',
        ]);
        $kontraks = Kontraks::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $k
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Kontraks::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
