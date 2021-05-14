<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\review;
use App\Models\perInfo;

class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function review(){
        $reviews = review::all();
        $infos = perInfo::all();
        return view('backend/Reviews/review',
        [
            'info'=>$infos,
            'reviews' => $reviews
            ]);
    }
    public function addUpdateReview(Request $req){
        if($req->id==null){
            // return $req;
            $data = new review();
            $data->id = request('id');
            $data->name = request('name');
            $data->post = request('post');
            $data->company = request('company');
            $data->review = request('review');
            $data->email = request('email');
            $data->workid = request('workid');
        }else{
            $data = review::findorfail($req->id);
            $data->id = request('id');
            $data->name = request('name');
            $data->post = request('post');
            $data->company = request('company');
            $data->review = request('review');
            $data->email = request('email');
            $data->workid = request('workid');
        }
        $data->save();        
        return redirect('/review');
    }
    public function destroy($id){
        $data = review::findorfail($id);
        $data->delete();
        return redirect('/review');
    }
}
