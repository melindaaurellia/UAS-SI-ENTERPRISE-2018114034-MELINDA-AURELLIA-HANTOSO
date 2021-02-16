<?php

namespace App\Http\Controllers\Api;

use App\Models\Semesters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semesters::orderby('id', 'desc') -> paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Data Semester',
            'data' => $semesters
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
            'waktu_absen' => 'required',
          'mahasiswa_id' => 'required|unique:semesters|max:255',
          'matakuliah_id' => 'required',
          'keterangan' => 'required',
        ]);

        $s = Semesters::create([
          'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id,
            'keterangan' => $request->keterangan,
        ]);

        if($semesters)
        {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Ditambahkan',
                'data' => $semesters
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal Ditambahkan',
                'data' => $semesters
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
          $jadwal = Semesters::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Semester',
            'data' => $jadwal
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
            'waktu_absen' => 'required',
            'mahasiswa_id' => 'required|unique:semesters|max:255',
            'matakuliah_id' => 'required',
            'keterangan' => 'required',
        ]);
        $semesters = Semesters::find($id)->update([
            'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id,
            'keterangan' => $request->keterangan,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $s
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
        $cek = Semesters::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
