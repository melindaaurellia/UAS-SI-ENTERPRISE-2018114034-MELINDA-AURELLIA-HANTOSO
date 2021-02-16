<?php

namespace App\Http\Controllers;
Use App\Models\Absens;
use Illuminate\Http\Request;

class AbsensController extends Controller
{
    public function index()
    {
     $absens = Absens::orderBy('id','desc')->paginate(10);
     
     return view ('absens.index', compact('absens'));
    }

    public function create()
    {
     
     return view ('absens.create');
    }

    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'waktu_absen' => 'required',
          'mahasiswa_id' => 'required|unique:absens|max:255',
          'matakuliah_id' => 'required',
          'keterangan' => 'required',
      ]);
 
         $absens = new absens;
 
         $absens->waktu_absen = $request->waktu_absen;
         $absens->mahasiswa_id = $request->mahasiswa_id;
         $absens->matakuliah_id = $request->matakuliah_id;
         $absens->keterangan = $request->keterangan;
 
         $absens->save();
 
         return redirect('/absens');
 
    }
    public function show($id)
    {
       $absen = Absens::where('id',$id)->first();
       return view('absens.show', ['absen' => $absen]);
    }
    public function edit($id)
    {
       $absen = Absens::where('id',$id)->first();
       return view('absens.edit', ['absen' => $absen]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'waktu_absen' => 'required',
         'mahasiswa_id' => 'required|unique:absens|max:255',
         'matakuliah_id' => 'required',
         'keterangan' => 'required',
        ]);
   
         Absens::find($id)->update([
            'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id,
            'keterangan' => $request->keterangan
         ]);
   
         return redirect ('/absens');
    }
    public function destroy($id)
    {
       Absens::find($id)->delete();
       return redirect ('/absens');
    }
}
