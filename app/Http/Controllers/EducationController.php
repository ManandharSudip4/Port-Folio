<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\education;
use App\Models\perInfo;
class EducationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function education(){
        $educations = education::all();
        $infos = perInfo::all();
        return view('backend/Education/education',
        [
            'educations' => $educations,
            'info'=>$infos
            ]);
    }
    public function addUpdateAcademics(Request $req){
        if($req->id==null){
            $data = new education();
            $data->id = request('id');
            $data->startyear = request('startyear');
            $data->endyear = request('endyear');
            $data->qualification = request('qualifications');
            $data->institute = request('institute');
            $data->boarduni = request('boarduni');
            $data->description = request('description');
            $data->gpa = request('gpa');
        }else{
            $data = education::findorfail($req->id);
            $data->startyear = request('startyear');
            $data->endyear = request('endyear');
            $data->qualification = request('qualifications');
            $data->institute = request('institute');
            $data->boarduni = request('boarduni');
            $data->description = request('description');
            $data->gpa = request('gpa');
        }
        $data->save();        
        return redirect('/education');
    }
    public function destroy($id){
        $data = education::findorfail($id);
        $data->delete();
        return redirect('/education');
    }
}
