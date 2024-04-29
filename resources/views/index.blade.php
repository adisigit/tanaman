<x-app-layout title="Home">
    <h1>ini adalah halaman home</h1>
    @foreach ($produks as $key => $item)
    <a href="{{route('produk.show', $item->id) }}">
        <p>{{ $item->nama }}</p>
        <p>{{ $item->deskripsi }}</p>
        <p>{{ $item->stok }}</p>
        <p>{{ $item->harga }}</p>
        <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{$item->gambar_path}}" alt="">
    </a>
    @endforeach
</x-app-layout>