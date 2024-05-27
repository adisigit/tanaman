<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Gambar_produk;
use App\Models\Produk;
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
        $id_produk_riwayat = $riwayat->pluck('id_produk')->toArray();
        $produks = Produk::whereIn('id', $id_produk_riwayat)->orderBy("created_at", "desc")->get();
        $gambar = Gambar_produk::whereIn("id", $produks->pluck('no_gambar'))->pluck('path', 'id');
        foreach ($produks as $produk) {
            $produk->banyak = $riwayat->where('id_produk', $produk->id)->first()->banyak ?? 0;
            $produk->gambar_path = $gambar[$produk->no_gambar] ?? null;
        }
        return view('auth.riwayat')->with(['produk'=>$produk, 'riwayat'=>$riwayat]);
    }
}
