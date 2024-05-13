<x-app-layout title="Home">
    <div class="p-8">
        <h1>ini adalah halaman home</h1>
        <div class="grid grid-cols-4 gap-4 place-items-center">
            @foreach ($produks as $key => $item)
                <div class="shadow-md bg-white rounded-md p-8 ">
                    <a href="{{ route('produk.show', $item->id) }}">
                        <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $item->gambar_path }}"
                            alt="">
                        <p>{{ $item->nama }}</p>
                        <p>{{ $item->deskripsi }}</p>
                        <p>{{ $item->stok }}</p>
                        <p>{{ $item->harga }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
