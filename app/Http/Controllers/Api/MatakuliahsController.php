<?php

namespace App\Http\Controllers\Api;

use App\Models\Matakuliahs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatakuliahsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliahs = Matakuliahs::orderby('id', 'desc') -> paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Matakuliah',
            'data' => $matakuliahs
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
            'nama_matakuliah' => 'required|unique:matakuliahs|max:255',
            'sks' => 'required',
        ]);

        $m = Matakuliahs::create([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
        ]);

        if($matakuliahs)
        {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Ditambahkan',
                'data' => $matakuliahs
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal Ditambahkan',
                'data' => $matakuliahs
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
          $matakuliah = Matakuliahs::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Matakuliah',
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
            'nama_matakuliah' => 'required|unique:matakuliahs|max:255',
            'sks' => 'required',
        ]);
        $matakuliahs = Matakuliahs::find($id)->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $m
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
        $cek = Matakuliahs::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
