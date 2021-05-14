<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\work;
use App\Models\workcategory;
use App\Models\perInfo;

class WorkController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function work(){
        $works = work::all();
        $infos = perInfo::all();
        $workCats = workcategory::all();
        return view('backend\Works\work', 
        [
                'info'=>$infos,
                'works'=>$works,
                'workCats'=>$workCats
            ]);
    }
    
    public function addUpdateWork(Request $req){
        function uploadImage($data, $loc){
            $extension = $data->getClientOriginalExtension();
            $filename = $loc.date('Ymdhisa').'.'.$extension;
            $data->move('uploads/'.$loc.'/', $filename);
            return $filename;
        }
        if($req->id == null){
            // return $req;
            $data = new work();
            $data->title = request('wtitle');
            $data->categoryid = request('categoryid');
            $data->featured = request('featured');
            $data->link = request('link');
            $data->content = strip_tags(request('content'));
            $data->view = 0;
            $filename = uploadImage($req->file('workimage'),'work');
            $data->workimage = $filename;
        }else{
            // return $req;
            $data = work::findorfail($req->id);
            $data->title = request('wtitle');
            $data->categoryid = request('categoryid');
            $data->featured = request('featured');
            $data->link = request('link');
            $data->content = strip_tags(request('content'));
        
            if ($req->hasfile('workimage')){
                $filename = uploadImage($req->file('workimage'),'work');
                $data->workimage = $filename;
            }else{     
                $data->workimage = $data->workimage;
            }
        }
        $data->save();        
        return redirect('/work');
    }
    public function destroy($id){
        $data = work::findorfail($id);
        $data->delete();
        return redirect('/work');
    }
}
