<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\smedia;
use App\Models\perInfo;
class SmediaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function smedia(){
        $infos = perInfo::all();
        $medias = smedia::all();
        return view('backend/Medias/smedia',
        [
                'info'=>$infos,
                'medias' => $medias
            ]);
    }

    public function addUpdateMedia(Request $req){
        if($req->id==null){
            $data = new smedia();
            $data->id = request('id');
            $data->name = request('medianame');
            $data->link = request('link');
            $data->iconname = request('iconname');
        }else{
            $data = smedia::findorfail($req->id);
            $data->name = request('medianame');
            $data->link = request('link');
            $data->iconname = request('iconname');
        }
        $data->save();        
        return redirect('/smedia');
    }
    public function destroy($id){
        $data = smedia::findorfail($id);
        $data->delete();
        return redirect('/smedia');
    }
}
