<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\workingexp;
use App\Models\perInfo;

class WorkingexpController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function workingexp(){
        $workingexps = workingexp::all();
        $infos = perInfo::all();
        return view('backend/WorkExp/workingexp',
        [
            'info'=>$infos,
            'workingexps' => $workingexps
            ]);
    }
    public function addUpdateExperience(Request $req){
        if($req->id==null){
            $data = new workingexp();
            $data->id = request('id');
            $data->startyear = request('startyear');
            $data->endyear = request('endyear');
            $data->institute = request('institute');
            $data->post = request('post');
            $data->description = request('description');
        }else{
            $data = workingexp::findorfail($req->id);
            $data->startyear = request('startyear');
            $data->endyear = request('endyear');
            $data->institute = request('institute');
            $data->post = request('post');
            $data->description = request('description');
        }
        $data->save();        
        return redirect('/workingexp');
    }
    public function destroy($id){
        $data = workingexp::findorfail($id);
        $data->delete();
        return redirect('/workingexp');
    }
}
