<x-app-layout title="Home">
    <div class="p-8">
        <h1 class="text-3xl font-bold mb-4">Produk Catalog</h1>
        <div class="grid grid-cols-5 gap-4 place-items-center">
            @foreach ($produks as $key => $item)
                <div class="shadow-md bg-white rounded-md p-8">
                    <a href="{{ route('produk.show', $item->id) }}">
                        <img class="w-48 h-48 object-cover rounded-md mb-4" src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $item->gambar_path }}" alt="{{ $item->nama }}">
                        <p class="font-semibold text-lg">{{ $item->nama }}</p>
                        <p class="text-gray-500">{{ $item->deskripsi }}</p>
                        <p class="text-gray-700">Stok: {{ $item->stok }}</p>
                        <p class="text-green-500">{{ $item->harga }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
