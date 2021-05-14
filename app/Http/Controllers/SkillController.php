<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skill;
use App\Models\perInfo;

class SkillController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function skill(){
        $skills = skill::all();
        $infos = perInfo::all();
        return view('backend/Skills/skill',
        [
            'skills' => $skills,
            'info'=>$infos
            ]);
    }

    public function addUpdateSkills(Request $req){
        // return $req;
        if($req->id==null){
            $data = new skill();
            $data->id = request('id');
            $data->skillname = request('skillname');
            $data->skilltype = request('skilltype');
            $data->skillpercent = request('skillpercent');
        }else{
            $data = skill::findorfail($req->id);
            $data->skillname = request('skillname');
            $data->skilltype = request('skilltype');
            $data->skillpercent = request('skillpercent');
        }
        $data->save();        
        return redirect('/skill');
    }
    public function destroy($id){
        $data = skill::findorfail($id);
        $data->delete();
        return redirect('/skill');
    }
}
