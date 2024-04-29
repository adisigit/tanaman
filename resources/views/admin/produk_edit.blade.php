<x-app-layout title="Edit">

    <h1>edit</h1>
    @if (isset($produk->no_gambar))
        <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $produk->gambar_path }}" alt="">
    @endif

    <form action="{{ route('produk.update', $id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="nama" id="" value="{{ $produk->nama }}">
        <input type="text" name="deskripsi" id="" value="{{ $produk->deskripsi }}">
        <input type="number" name="stok" id="" value="{{ $produk->stok }}">
        <input type="number" name="harga" id="" value="{{ $produk->harga }}">
        <input type="submit" value="update">
    </form>
</x-app-layout>
