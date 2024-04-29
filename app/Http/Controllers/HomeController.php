<?php

namespace App\Http\Controllers;

use App\Models\Gambar_produk;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $produks = Produk::orderBy("created_at","desc")->get();
        $gambar = Gambar_produk::whereIn("id", $produks->pluck('no_gambar'))->pluck('path', 'id');
        foreach ($produks as $produk){
            $produk->gambar_path = $gambar[$produk->no_gambar] ?? null;
        }
        return view('index')->with('produks',$produks);
    }
}
