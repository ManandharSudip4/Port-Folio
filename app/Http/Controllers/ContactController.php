<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\perInfo;
        
        
class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function contact(){
        $contacts = contact::all();
        $infos = perInfo::all();
        return view('backend/Contacts/contact',
            [
                'contacts' => $contacts,
                'info'=>$infos
            ]);
    }
    public function addUpdateContact(Request $req){
        if($req->id==null){
            $data = new contact();
            $data->id = request('id');
            $data->name = request('name');
            $data->content = request('contents');
            $data->iconname = request('iconname');
        }else{
            $data = contact::findorfail($req->id);
            $data->name = request('name');
            $data->content = request('contents');
            $data->iconname = request('iconname');
        }
        $data->save();        
        return redirect('/contact');
    }
    public function destroy($id){
        $data = contact::findorfail($id);
        $data->delete();
        return redirect('/contact');
    }
}
