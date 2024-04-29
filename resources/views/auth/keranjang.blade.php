<x-app-layout title="Keranjang">
    <h1>ini keranjang</h1>
    @foreach ($produks as $produk)
    <input type="checkbox" name="" id="produkCheckbox" value="{{$produk->id}}">
    <a href="{{route('produk.show', $produk->id) }}">
        <p>{{ $produk->nama }}</p>
        <p>{{ $produk->stok }}</p>
        <p>{{ $produk->harga }}</p>
        <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{$produk->gambar_path}}" alt="">
    </a>
    @livewire('counter', ['id_produk' => $produk->id])
    @endforeach
    <form action="{{route('buy.index')}}" method="post">
        @csrf
        <input type="hidden" id="hasil" name="hasil">
        <button type="submit">beli</button>
    </form>
    <form action="{{ route('keranjang.destroy') }}" method="post">
        @csrf
        @method('delete')
        <input type="hidden" id="pilih" name="pilih">
        <button class="btn btn-danger" type="submit">delete</button>
    </form>
</x-app-layout>