<?php

namespace App\Http\Controllers\Api;

use App\Models\Jadwals;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwals::orderby('id', 'desc') -> paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Jadwal',
            'data' => $jadwals
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
            'jadwal' => 'required',
            'matakuliah_id' => 'required',
        ]);

        $j = jadwals::create([
          'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id,
        ]);

        if($jadwals)
        {
            return response()->json([
                'success' => true,
                'message' => 'Jadwal Berhasil Ditambahkan',
                'data' => $jadwals
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Jadwal Gagal Ditambahkan',
                'data' => $jadwals
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
          $jadwal = Jadwals::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data jadwal',
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
            'jadwal' => 'required',
            'matakuliah_id' => 'required',
        ]);
        $jadwals = Jadwals::find($id)->update([
          'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $j
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
        $cek = Jadwals::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
