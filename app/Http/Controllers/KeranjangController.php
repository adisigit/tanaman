<?php

namespace App\Http\Controllers;

use App\Models\Gambar_produk;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $keranjangs = Keranjang::whereIn('id_pelanggan', [$id])->get();
        $id_produk_keranjang = $keranjangs->pluck('id_produk')->toArray();
        $produks = Produk::whereIn('id', $id_produk_keranjang)->orderBy("created_at", "desc")->get();
        $gambar = Gambar_produk::whereIn("id", $produks->pluck('no_gambar'))->pluck('path', 'id');
        foreach ($produks as $produk) {
            $produk->banyak = $keranjangs->where('id_produk', $produk->id)->first()->banyak ?? 0;
            $produk->gambar_path = $gambar[$produk->no_gambar] ?? null;
        }
        return view("auth.keranjang")->with("produks", $produks);
    }
    public function store(Request $request, $id)
    {
        $idUser = Auth::id();
        $keranjang = Keranjang::where('id_produk', $id)
            ->where('id_pelanggan', $idUser)
            ->first();
        if ($keranjang) {
            $keranjang->banyak += $request->counterValue;
            $keranjang->save();
        } else {
            $keranjang = new Keranjang();
            $keranjang->id_produk = $id;
            $keranjang->banyak = $request->counterValue;
            $keranjang->id_pelanggan = $idUser;
            $keranjang->save();
        }
        if ($request->input('hasil')) {
            $request->session()->put('hasil', $request->input('hasil'));
            return redirect()->route('buy.index');
        } else {
            return redirect()->route('produk.show', ['id' => $id]);
        }
    }
    public function destroy(Request $request)
    {
        $id = Auth::id();
        $inputString = $request->input('pilih');
        $arrayValues = explode(' ', $inputString);
        $arrayValues = array_map('trim', $arrayValues);
        foreach ($arrayValues as $value) {
            if (!empty($value)) {
                Keranjang::where('id_produk', $value)->where('id_pelanggan', $id)->delete();
            }
        }
        return redirect()->route('keranjang.index');
    }
}
