<x-app-layout title="Produk">
    <h1>produk</h1>
    @foreach ($produks as $key => $item)
        <p>{{ $item->nama }}</p>
        <p>{{ $item->deskripsi }}</p>
        <p>{{ $item->stok }}</p>
        <p>{{ $item->harga }}</p>
        <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{$item->gambar_path}}" alt="">
        <br>
        <a href="{{ route('produk.edit', $item->id) }}">edit</a>
        <form action="{{ route('produk.destroy', $item->id) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">delete</button>
        </form>
    @endforeach
</x-app-layout>
