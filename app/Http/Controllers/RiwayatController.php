<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index(){
        $type = Auth::user()->usertype;
        if ($type == 'admin') {
            $riwayat = Buy::orderBy("created_at","desc")->get();
        }else{
            $id = Auth::id();
            $riwayat = Buy::where("id_pelanggan", $id)->get();
        }
        return view('auth.riwayat')->with('riwayat',$riwayat);
    }
}
