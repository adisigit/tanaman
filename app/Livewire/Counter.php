<?php

namespace App\Livewire;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $stok;
    public $id_produk;
    public function increment(){
        if($this->count < $this->stok){
            $this->count++;
            $this->updateCountKeranjang();
        }
    }
    public function mount($id_produk){
        $this->id_produk = $id_produk;
        $id = Auth::id();
        $produk = Produk::findOrFail($id_produk);
        $keranjang = Keranjang::where('id_produk', $id_produk)->where('id_pelanggan', $id)->first();
        if ($keranjang) {
            $this->count = $keranjang->banyak;
        } else {
            $this->count = 0;
        }
        $this->stok = $produk->stok;
    }
    public function decrement(){
        if($this->count > 0){
            $this->count--;
            $this->updateCountKeranjang();
        }
    }
    protected function updateCountKeranjang(){
        $id = Auth::id();
        $keranjang = Keranjang::where('id_produk', $this->id_produk)->where('id_pelanggan', $id)->first();
        $keranjang->banyak = $this->count;
        $keranjang->save();
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
