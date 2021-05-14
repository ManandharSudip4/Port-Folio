<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perInfo;

class BackendController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }



    public function tablesDynamic(){
    $infos = perInfo::all();
        return view('/backend/tablesDynamic',[
        'info'=>$infos
        ]);
    }
    
    // public function perInfo(){
    //     return view('/backend/PerInfo/perInfo');
    // }
}
