<x-app-layout title="Produk">
    <div class="px-20 py-8">
        @foreach ($produks as $key => $item)
        <div class="py-2">
            <div class="shadow-md bg-white rounded-md p-8 grid grid-cols-10 gap-4 place-items-center">
                <div class="col-span-1">
                    <img class="size-30"
                        src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $item->gambar_path }}"
                        alt="">
                </div>
                <div class="col-span-2">
                    <p>{{ $item->nama }}</p>
                </div>
                <div class="col-span-2">
                    <p>{{ $item->stok }}</p>
                </div>
                <div class="col-span-2">
                    <p>{{ $item->harga }}</p>
                </div>
                <div class="col-span-1">
                    <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                        <a class="text-white" href="{{ route('produk.edit', $item->id) }}">edit</a>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                        <form action="{{ route('produk.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="text-white" type="submit">delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
