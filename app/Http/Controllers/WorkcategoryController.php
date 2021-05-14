<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\workcategory;
use App\Models\perInfo;

class WorkcategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function workCat(){
        $workCats = workcategory::all();
        $infos = perInfo::all();
        return view('backend\Works\workcategory', 
        [
            'info'=>$infos,
            'workCats'=>$workCats
                ]);
        }
        
        
        public function addUpdateWorkCat(Request $req){
            function uploadImage($data, $loc){
                $extension = $data->getClientOriginalExtension();
                $filename = $loc.date('Ymdhisa').'.'.$extension;
                $data->move('uploads/'.$loc.'/', $filename);
                return $filename;
            }
            if($req->id == null){
                $data = new workcategory();
                $data->catname = request('catname');
                $data->description = request('description');
                $filename = uploadImage($req->file('catimage'),'workCat');
                $data->catimage = $filename;
            }else{
                $data = workcategory::findorfail($req->id);
                $data->catname = request('catname');
                $data->description = request('description');
            
                if ($req->hasfile('catimage')){
                    $filename = uploadImage($req->file('catimage'),'workCat');
                    $data->catimage = $filename;
                }else{     
                    $data->catimage = $data->catimage;
                }
            }
            $data->save();        
            return redirect('/workcategory');
        }
        public function destroy($id){
            $data = workcategory::findorfail($id);
            $data->delete();
            return redirect('/workcategory');
        }
}
