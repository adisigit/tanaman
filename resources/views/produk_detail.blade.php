<x-app-layout title="Detail">
    <div class="p-8">
        <div class="grid grid-cols-4 gap-4 p-8 shadow-md bg-white rounded-md">
            <div class="w-80 h-80">
                @if (isset($produk->no_gambar))
                    <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $produk->gambar_path }}" alt="" class="object-cover w-full h-full rounded-md">
                @endif
            </div>
            <div class="col-span-3 space-y-4">
                <div>
                    <h3 class="text-2xl font-bold">{{ $produk->nama }}</h3>
                    <p class="text-lg text-gray-700">{{ $produk->harga }}</p>
                    <p id="stok" class="text-lg text-gray-500">{{ $produk->stok }}</p>
                    <p class="text-gray-600">{{ $produk->deskripsi }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-2 py-1 bg-gray-300 rounded" onclick="decrement()">-</button>
                    <span id="counter" class="text-xl">1</span>
                    <button class="px-2 py-1 bg-gray-300 rounded" onclick="increment()">+</button>
                </div>
                <div class="flex space-x-4">
                    <form action="{{ route('keranjang.store', $id) }}" method="post">
                        @csrf
                        <input type="hidden" id="counterValue" name="counterValue" value="1">
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Keranjang</button>
                    </form>
                    <form action="{{ route('keranjang.store', $id) }}" method="post">
                        @csrf
                        <input type="hidden" id="counterBeli" name="counterValue" value="1">
                        <input type="hidden" name="hasil" value="{{ $id }}">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Beli</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
