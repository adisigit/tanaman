<x-app-layout title="Buy">
    @php
        $totalSemua = 0;
    @endphp
    @foreach ($produks as $produk)
    @php
        $arrayId[] = $produk->id; 
        $totalHarga = $produk->harga * $produk->banyak;
        $totalSemua += $totalHarga;
    @endphp
    <a href="{{route('produk.show', $produk->id) }}">
        <p>{{ $produk->nama }}</p>
        <p>{{ $produk->harga }}</p>
        <p>{{ $produk->banyak }}</p>
        <p>{{$totalHarga}}</p>
        <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{$produk->gambar_path}}" alt="">
    </a>
    @endforeach
    <p>{{$totalSemua}}</p>
    <form action="{{route('buy.store')}}" method="post">
        @csrf
        <input type="hidden" value="{{implode(' ', $arrayId) }}" name="beli">
        <button type="submit">beli</button>
    </form>
    <a href="/keranjang">batal</a>
</x-app-layout>