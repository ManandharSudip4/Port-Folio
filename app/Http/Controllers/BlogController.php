<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\workcategory;
use App\Models\perInfo;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function blog(){
        $blogs = blog::all();
        $infos = perInfo::all();
        $workCats = workcategory::all();
        return view('backend\Works\blog', 
        [
            'info'=>$infos,
            'blogs'=>$blogs,
                'workCats'=>$workCats
            ]);
    }
    
    public function addUpdateBlog(Request $req){
        function uploadImage($data, $loc){
            $extension = $data->getClientOriginalExtension();
            $filename = $loc.date('Ymdhisa').'.'.$extension;
            $data->move('uploads/'.$loc.'/', $filename);
            return $filename;
        }
        if($req->id == null){
            // return $req;
            $data = new blog();
            $data->blogtitle = request('blogtitle');
            $data->categoryid = request('categoryid');
            $data->featured = request('featured');
            $data->content = strip_tags(request('content'));
            $data->view = 0;
            $filename = uploadImage($req->file('blogimage'),'blog');
            $data->blogimage = $filename;
        }else{
            // return $req;
            $data = blog::findorfail($req->id);
            $data->blogtitle = request('blogtitle');
            $data->categoryid = request('categoryid');
            $data->featured = request('featured');
            $data->content = strip_tags(request('content'));
        
            if ($req->hasfile('blogimage')){
                $filename = uploadImage($req->file('blogimage'),'blog');
                $data->blogimage = $filename;
            }else{     
                $data->blogimage = $data->blogimage;
            }
        }
        $data->save();        
        return redirect('/blog');
    }
    public function destroy($id){
        $data = blog::findorfail($id);
        $data->delete();
        return redirect('/blog');
    }
}
