<x-app-layout title="Produk">
    <div class="p-8">
        <h1>produk</h1>
        <div class="grid grid-cols-4 gap-4 place-items-center">
            @foreach ($produks as $key => $item)
                <div class="shadow-md bg-white rounded-md p-8 ">
                    <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $item->gambar_path }}"
                        alt="">
                    <p>{{ $item->nama }}</p>
                    <p>{{ $item->stok }}</p>
                    <p>{{ $item->harga }}</p>
                    <br>
                    <a href="{{ route('produk.edit', $item->id) }}">edit</a>
                    <form action="{{ route('produk.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
