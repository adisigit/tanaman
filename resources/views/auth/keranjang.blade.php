<x-app-layout title="Keranjang">
    <div class="px-20 py-8">
        <h1 class="text-3xl font-bold mb-8">Keranjang</h1>
        <div id="produkList" class="space-y-6">
            @foreach ($produks as $produk)
                <div class="shadow-md bg-white rounded-md p-8 grid grid-cols-8 gap-4 place-items-center">
                    <div>
                        <input type="checkbox" class="produkCheckbox" value="{{ $produk->id }}">
                    </div>
                    <div class="col-span-0">
                        <a href="{{ route('produk.show', $produk->id) }}" class="flex items-center space-x-4">
                            <img class="w-24 h-24 object-cover rounded-md" src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $produk->gambar_path }}" alt="">
                            <div>
                                <p class="font-semibold">{{ $produk->nama }}</p>
                                <p class="text-gray-500">{{ $produk->stok }}</p>
                                <p class="text-green-500">{{ $produk->harga }}</p>
                            </div>
                        </a>
                    </div>
                    <div>
                        @livewire('counter', ['id_produk' => $produk->id])
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8 flex space-x-4">
            <form id="buyForm" action="{{ route('buy.index') }}" method="post">
                @csrf
                <input type="hidden" id="hasil" name="hasil">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Beli</button>
            </form>
            <form id="deleteForm" action="{{ route('keranjang.destroy') }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" id="pilih" name="pilih">
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">Hapus</button>
            </form>
        </div>
    </div>
</x-app-layout>
