<x-app-layout title="Detail">
    @if (isset($produk->no_gambar))
        <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $produk->gambar_path }}" alt="">
    @endif
    <h3>{{ $produk->nama }}</h3>
    <p>{{ $produk->harga }}</p>
    <p id="stok">{{ $produk->stok }}</p>
    <p>{{ $produk->deskripsi }}</p>
    <button onclick="decrement()">-</button>
    <span id="counter">1</span>
    <button onclick="increment()">+</button>
    <form action="{{ route('keranjang.store', $id) }}" method="post">
        @csrf
        <input type="hidden" id="counterValue" name="counterValue" value="1">
        <button type="submit">keranjang</button>
    </form>
    <form action="{{ route('keranjang.store', $id) }}" method="post">
        @csrf
        <input type="hidden" id="counterBeli" name="counterValue" value="1">
        <input type="hidden" name="hasil" value="{{ $id }}">
        <button type="submit">beli</button>
    </form>
</x-app-layout>
