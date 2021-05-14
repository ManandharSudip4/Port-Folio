<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perInfo;

class PerInfoController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }

    public function perInfo(){
        $infos = perInfo::all();
        return view('backend\PerInfo.perInfo', 
            [
                'info'=>$infos
            ]);
        }
        
        public function updatePerInfo(REquest $req){
            function uploadImage($data, $loc){
                $extension = $data->getClientOriginalExtension();
                $filename = $loc.date('Ymdhisa').'.'.$extension;
                $data->move('uploads/'.$loc.'/', $filename);
                return $filename;
            }
            $data = perInfo::findorfail($req->id);
            // dd($data->name);
            // dd(request('fullname'));
        $data->name = request('fullname');
        $data->profession = request('profession');
        $data->quote = request('quote');
        $data->bio = request('bio');
        
        if ($req->hasfile('pp')){
            $ppfilename = uploadImage($req->file('pp'),'pp');
            $data->pp = $ppfilename;
        }else{     
            $data->pp = $data->pp;
        }
        if ($req->hasfile('cp')){
            $cpfilename = uploadImage($req->file('cp'),'cp');
            $data->cp = $cpfilename;
        }else{
            $data->cp = $data->cp;
        }

        
        // $req->pp->storeAs('images/pp','pp.jpg','public');
        // $req->cp->storeAs('images/cp','cp.jpg','public');
        $data->save();
        
        return redirect('/perInfo');
    }


}
