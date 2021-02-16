<?php

namespace App\Http\Controllers;
Use App\Models\Semesters;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    public function index()
    {
     $semesters = Semesters::orderBy('id')->paginate(5);
     
     return view ('semesters.index', compact('semesters'));
    }
    public function create()
    {
     
     return view ('semesters.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'waktu_absen' => 'required',
          'mahasiswa_id' => 'required|unique:semesters|max:255',
          'matakuliah_id' => 'required',
          'keterangan' => 'required',
      ]);
 
         $semesters = new semesters;
 
         $Semesters->waktu_absen = $request->waktu_absen;
         $Semesters->mahasiswa_id = $request->mahasiswa_id;
         $Semesters->matakuliah_id = $request->matakuliah_id;
         $Semesters->keterangan = $request->keterangan;
 
         $Semesters->save();
 
         return redirect('/');
 
    }
    public function show($id)
    {
       $semester = Semesters::where('id',$id)->first();
       return view('semesters.show', ['semester' => $semester]);
    }
    public function edit($id)
    {
       $semester = Semesters::where('id',$id)->first();
       return view('semesters.edit', ['semester' => $semester]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'waktu_absen' => 'required',
         'mahasiswa_id' => 'required|unique:semesters|max:255',
         'matakuliah_id' => 'required',
         'keterangan' => 'required',
        ]);
   
         Semesters::find($id)->update([
            'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id,
            'keterangan' => $request->keterangan
         ]);
   
         return redirect ('/');
    }
    public function destroy($id)
    {
       Semesters::find($id)->delete();
       return redirect ('/');
    }
}
