<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;
use App\Models\perInfo;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function message(){
        $messages = message::all();
        $infos = perInfo::all();
        return view('backend/Reviews/message',
        [
            'info'=>$infos,
            'messages' => $messages
            ]);
    }
    public function addUpdateMessage(Request $req){
        if($req->id==null){
            // return $req;
            $data = new message();
            $data->id = request('id');
            $data->name = request('name');
            $data->email = request('email');
            $data->message = request('message');
        }else{
            $data = message::findorfail($req->id);
            $data->id = request('id');
            $data->name = request('name');
            $data->email = request('email');
            $data->message = request('message');
        }
        $data->save();
        if($req->front==="ms10"){
            return redirect('/#contact-section');
        }else{     
            return redirect('/message');
        }
    }
    public function status($id){
        $data = message::findorfail($id);
        $data->status = 'seen';
        $data->save();
        return redirect('/message');
    }
    public function destroy($id){
        $data = message::findorfail($id);
        $data->delete();
        return redirect('/message');
    }
}
