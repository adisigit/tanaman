<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Gambar_produk;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('hasil')) {
            $inputString = $request->input('hasil');
        } else {
            $inputString = $request->session()->get('hasil');
        }
        $id = Auth::id();
        $arrayValues = explode(' ', $inputString);
        $arrayValues = array_map('trim', $arrayValues);
        $produks = collect();
        $banyakMapping = [];
        foreach ($arrayValues as $value) {
            if (!empty($value)) {
                $keranjangs = Keranjang::where('id_pelanggan', $id)->where('id_produk', $value)->get();
                $id_produk_keranjang = $keranjangs->pluck('id_produk')->toArray();
                $produks = $produks->merge(
                    Produk::whereIn('id', $id_produk_keranjang)->orderBy("created_at", "desc")->get()
                );
                foreach ($keranjangs as $keranjang) {
                    $banyakMapping[$keranjang->id_produk] = $keranjang->banyak;
                }
            }
        }
        $produks = $produks->unique();
        $gambar = Gambar_produk::whereIn("id", $produks->pluck('no_gambar'))->pluck('path', 'id');
        foreach ($produks as $produk) {
            $produk->banyak = $banyakMapping[$produk->id] ?? 0;
            $produk->gambar_path = $gambar[$produk->no_gambar] ?? null;
        }
        return view("auth.buy")->with("produks", $produks);
    }
    public function store(Request $request)
    {
        $id = Auth::id();
        $inputString = $request->input('beli');
        $arrayValues = explode(' ', $inputString);
        $arrayValues = array_map('trim', $arrayValues);
        $maxId = DB::table('buys')->max('id');
        if ($maxId === null) {
            $maxId = 0;
        }
        $newId = $maxId + 1;
        foreach ($arrayValues as $value) {
            if (!empty($value)) {
                $keranjangs = Keranjang::where('id_pelanggan', $id)->where('id_produk', $value)->get();
                foreach ($keranjangs as $keranjang) {
                    $produk = Produk::findOrFail($keranjang->id_produk);
                    $produk->update([
                        'stok' => $produk->stok - $keranjang->banyak
                    ]);
                    Buy::create([
                        'id' => $newId,
                        'id_produk' => $keranjang->id_produk,
                        'banyak' => $keranjang->banyak,
                        'total' => $produk->harga * $keranjang->banyak,
                        'id_pelanggan' => $id
                    ]);
                    Keranjang::where('id_produk', $keranjang->id_produk)->where('id_pelanggan', $id)->delete();
                }
            }
        }
        return redirect()->route('riwayat.index');
    }
}
