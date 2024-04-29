<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Gambar_produk;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(){
        $produks = Produk::orderBy("created_at","desc")->get();
        $gambar = Gambar_produk::whereIn("id", $produks->pluck('no_gambar'))->pluck('path', 'id');
        foreach ($produks as $produk){
            $produk->gambar_path = $gambar[$produk->no_gambar] ?? null;
        }
        return view('admin.produk')->with('produks',$produks);
    }
    public function create(){
        return view('admin.produk_tambah');
    }

    public function store(Request $request){
        $imagePath = Storage::disk('s3')->put('images', $request->gambar, 'public');
        $gambar = $request->file('gambar');
        $gambarSize = $gambar->getSize();
        $gambarType = $gambar->getClientOriginalExtension();
        $gambarName = basename($imagePath);
        $gambarProduk = Gambar_produk::create([
            'nama'=> $gambarName,
            'ukuran' => $gambarSize,
            'tipe' => $gambarType,
            'path'=> $imagePath
        ]);

        session()->flash('success', 'Image Upload successfully');
        $noGambar = $gambarProduk->id;

        Produk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga'=> $request->harga,
            'no_gambar' => $noGambar
        ]);

        return redirect()->route('produk.index');
    }
    public function show($id){
        $produk = Produk::find($id);
        $gambar = Gambar_produk::whereIn('id', $produk->pluck('no_gambar'))->pluck('path', 'id');
        $produk->gambar_path = $gambar[$produk->no_gambar] ?? null;
        return view('produk_detail')->with('id', $id)->with('produk', $produk);
    }
    public function edit($id){
        $produk = Produk::findOrFail( $id );
        $gambar = Gambar_produk::whereIn("id", $produk->pluck('no_gambar'))->pluck('path', 'id');
        $produk->gambar_path = $gambar[$produk->no_gambar] ?? null;
        return view('admin.produk_edit')->with('id', $id)->with('produk', $produk);
    }
    public function update(Request $request, $id){
        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama'=> $request->nama,
            'deskripsi'=> $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
        return redirect()->route('produk.index');
    }

    public function destroy($id){
        $produk = Produk::find($id);

        $keranjang = Keranjang::where('id_produk', $id)->get();
        foreach ($keranjang as $item) {
            $item->delete();
        }

        $buy = Buy::where('id_produk', $id)->get();
        foreach ($buy as $item) {
            $item->delete();
        }

        if(!is_null($produk->no_gambar)){
            $gambar = Gambar_produk::where('id', $produk->no_gambar)->first();
            Storage::disk('s3')->delete($gambar->path);
            $gambar->delete();
        }
        $produk->delete();

        return redirect()->route('produk.index');
    }
}
