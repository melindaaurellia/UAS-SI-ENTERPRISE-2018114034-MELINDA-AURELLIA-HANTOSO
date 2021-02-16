<?php

namespace App\Http\Controllers\Api;

use App\Models\Absens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absens = Absens::orderby('id', 'desc') -> paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data absens',
            'data' => $absens
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
            'waktu_absens' => 'required|unique:absens|max:255',
            'nama_mahasiswa' => 'required',
            'nama_matakuliah' => 'required',
        ]);

        $m = Absens::create([
            'waktu_absens' => $request->waktu_absens,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nama_matakuliah' => $request->nama_matakuliah,
        ]);

        if($absens)
        {
            return response()->json([
                'success' => true,
                'message' => 'Teman Berhasil Ditambahkan',
                'data' => $absens
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Teman Gagal Ditambahkan',
                'data' => $absens
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
          $absens = Absens::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Absens',
            'data' => $absens
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
            'waktu_absens' => 'required|unique:absens|max:255',
            'nama_mahasiswa' => 'required',
            'nama_matakuliah' => 'required',
        ]);
        $absens = MSatakuliahs::find($id)->update([
            'waktu_absens' => $request->waktu_absens,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nama_matakuliah' => $request->nama_matakuliah
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $a
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
        $cek = absens::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
