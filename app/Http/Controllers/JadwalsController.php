<?php

namespace App\Http\Controllers;
Use App\Models\Jadwals;
use Illuminate\Http\Request;

class JadwalsController extends Controller
{
    public function index()
    {
     $jadwals = Jadwals::orderBy('id')->paginate(5);
     
     return view ('jadwals.index', compact('jadwals'));
    }
    public function create()
    {
     
     return view ('jadwals.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'jadwal' => 'required',
          'matakuliah_id' => 'required',
      ]);
 
         $jadwals = new Jadwals;
 
         $jadwals->jadwal = $request->jadwal;
         $jadwals->matakuliah_id = $request->matakuliah_id;
 
         $jadwals->save();
 
         return redirect('/jadwals');
 
    }
    public function show($id)
    {
       $jadwal = Jadwals::where('id',$id)->first();
       return view('jadwals.show', ['jadwal' => $jadwal]);
    }
    public function edit($id)
    {
       $jadwal = Jadwals::where('id',$id)->first();
       return view('jadwals.edit', ['jadwal' => $jadwal]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
         'jadwal' => 'required',
         'matakuliah_id' => 'required',
        ]);
   
         Jadwals::find($id)->update([
            'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id,
         ]);
   
         return redirect ('/jadwal');
    }
    public function destroy($id)
    {
       Jadwals::find($id)->delete();
       return redirect ('/jadwals');
    }
}
