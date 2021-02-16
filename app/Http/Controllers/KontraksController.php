<?php

namespace App\Http\Controllers;
Use App\Models\Kontraks;
use Illuminate\Http\Request;

class KontraksController extends Controller
{
    public function index()
    {
     $kontraks = Kontraks::orderBy('id')->paginate(5);
     
     return view ('kontraks.index', compact('kontraks'));
    }
    public function create()
    {
     
     return view ('kontraks.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'mahasiswa_id' => 'required',
          'semester_id' => 'required',
      ]);
 
         $kontraks = new Kontraks;
 
         $kontraks->mahasiswa_id = $request->mahasiswa_id;
         $kontraks->semester_id = $request->semester_id;
 
         $kontraks->save();
 
         return redirect('/kontraks');
 
    }
    public function show($id)
    {
       $kontrak = Kontraks::where('id',$id)->first();
       return view('kontraks.show', ['kontrak' => $kontrak]);
    }
    public function edit($id)
    {
       $kontrak = Kontraks::where('id',$id)->first();
       return view('kontraks.edit', ['kontrak' => $kontrak]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'mahasiswa_id' => 'required',
         'semester_id' => 'required',
        ]);
   
         Kontraks::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
         ]);
   
         return redirect ('/');
    }
    public function destroy($id)
    {
       Kontraks::find($id)->delete();
       return redirect ('/kontraks');
    }
}
