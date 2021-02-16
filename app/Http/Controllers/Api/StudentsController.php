<?php

namespace App\Http\Controllers\Api;

use App\Models\Students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::orderby('id', 'desc') -> paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Mahasiswa',
            'data' => $students
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
            'nama_mahasiswa' => 'required|unique:students|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required',
        ]);

        $s = Students::create([
            'nama_mahasiswa' => $request->nama,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email
        ]);

        if($students)
        {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Ditambahkan',
                'data' => $students
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal Ditambahkan',
                'data' => $students
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
          $student = Students::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Mahasiswa',
            'data' => $student
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
            'nama' => 'required|unique:students|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required'
        ]);
        $students = Students::find($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email
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
        $cek = Students::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
