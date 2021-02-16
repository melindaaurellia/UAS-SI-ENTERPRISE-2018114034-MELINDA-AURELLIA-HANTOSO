<?php

namespace App\Http\Controllers;
Use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
     $students = Students::orderBy('id')->paginate(5);
     
     return view ('students.index', compact('students'));
    }

    public function create()
    {
     
     return view ('students.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'nama_mahasiswa' => 'required|unique:students|max:255',
          'alamat' => 'required',
          'no_tlp' => 'required|numeric',
          'email' => 'required',
      ]);
 
         $students = new students;
 
         $students->nama_mahasiswa = $request->nama_mahasiswa;
         $students->alamat = $request->alamat;
         $students->no_tlp = $request->no_tlp;
         $students->email = $request->email;
 
         $students->save();
 
         return redirect('/');
 
    }
    public function show($id)
    {
       $student = Students::where('id',$id)->first();
       return view('students.show', ['student' => $student]);
    }
    public function edit($id)
    {
       $student = Students::where('id',$id)->first();
       return view('students.edit', ['student' => $student]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|unique:friends|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required',
        ]);
   
         Students::find($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email
         ]);
   
         return redirect ('/');
    }
    public function destroy($id)
    {
       Students::find($id)->delete();
       return redirect ('/');
    }
}
