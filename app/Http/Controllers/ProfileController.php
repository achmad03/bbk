<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Users;

class ProfileController extends Controller
{
    //
    public function tampil($id){

        return view('profile');
    }

    public function edit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'foto' => 'required',
            'alamat' => 'required',
            'nowa' => 'required',
            'notelp' => 'required',
        ]);
        $foto=$request->file('foto');
        $fotos="/images/".$request->name."-.".$foto->getClientOriginalExtension();
        Users::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'foto_profil' => $fotos,
            'no_wa' => $request->nowa,
            'no_telp' => $request->notelp,
            'updated_at' => now()
          ]);
          $foto->move('images',$request->name."-.".$foto->getClientOriginalExtension());
        return redirect('/profile/0');
    }
}
