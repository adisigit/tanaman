<x-app-layout title="Keranjang">
    <h1>ini keranjang</h1>
    <div class="px-20 py-8">
        @foreach ($produks as $produk)
            <div class="shadow-md bg-white rounded-md p-8 grid grid-cols-8 gap-4 place-items-center">
                <div>
                    <input type="checkbox" name="" id="produkCheckbox" value="{{ $produk->id }}">
                </div>
                <div class="col-span-6">
                    <a href="{{ route('produk.show', $produk->id) }}">
                        <div class="grid grid-cols-9 gap-4 items-center">
                            <img class="size-30" src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $produk->gambar_path }}"
                                alt="">
                            <div>
                                <p>{{ $produk->nama }}</p>
                                <p>{{ $produk->stok }}</p>
                                <p>{{ $produk->harga }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    @livewire('counter', ['id_produk' => $produk->id])
                </div>
            </div>
            <br>
        @endforeach
    </div>
    <form action="{{ route('buy.index') }}" method="post">
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
