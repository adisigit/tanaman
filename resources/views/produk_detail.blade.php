<x-app-layout title="Detail">
    <div class="p-8">
        <div class="grid grid-cols-2 gap-4 p-8 shadow-md bg-white rounded-md">
            <div class="size-80">
                @if (isset($produk->no_gambar))
                    <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $produk->gambar_path }}"
                        alt="">
                @endif
            </div>
            <div>
                <div>
                    <h3>{{ $produk->nama }}</h3>
                    <p>{{ $produk->harga }}</p>
                    <p id="stok">{{ $produk->stok }}</p>
                    <p>{{ $produk->deskripsi }}</p>
                </div>
                <div>
                    <button onclick="decrement()">-</button>
                    <span id="counter">1</span>
                    <button onclick="increment()">+</button>
                </div>
                <div>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
