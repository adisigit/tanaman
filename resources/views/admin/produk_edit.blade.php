<x-app-layout title="Edit">
    <div class="py-8 px-20">
        <div class="shadow-md bg-white rounded-md p-8 grid grid-cols-3 gap-4 ">
            <div class="col-span-1">
                @if (isset($produk->no_gambar))
                    <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $produk->gambar_path }}"
                        alt="">
                @endif
            </div>
            <div class="col-span-2">
                <form action="{{ route('produk.update', $id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nama">Nama produk</label>
                        <input class="w-full" type="text" name="nama" id="" value="{{ $produk->nama }}">
                    </div>
                    <div>
                        <label for="deskripsi">Deskripsi produk</label>
                        <input class="w-full" type="text" name="deskripsi" id=""
                            value="{{ $produk->deskripsi }}">
                    </div>
                    <div>
                        <label for="stok">Stok produk</label>
                        <input class="w-full" type="number" name="stok" id="" value="{{ $produk->stok }}">
                    </div>
                    <div>
                        <label for="harga">Harga produk</label>
                        <input class="w-full" type="number" name="harga" id="" value="{{ $produk->harga }}">
                    </div>
                    <br>
                    <div>
                        <input
                            class=" place-items-end bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>

</x-app-layout>
