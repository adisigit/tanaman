<x-app-layout title="Buy">
    @php
        $totalSemua = 0;
    @endphp
    <div class="py-8 px-20">
        <div class="shadow-md bg-white rounded-md p-8 ">
            @foreach ($produks as $produk)
                @php
                    $arrayId[] = $produk->id;
                    $totalHarga = $produk->harga * $produk->banyak;
                    $totalSemua += $totalHarga;
                @endphp
                <a href="{{ route('produk.show', $produk->id) }}">
                    <div class="shadow-md bg-white rounded-md p-2 grid grid-cols-9 gap-4 place-items-center">
                        <div class="col-span-1">
                            <img class="size-30"
                                src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{ $produk->gambar_path }}"
                                alt="">
                        </div>
                        <div class="col-span-2">
                            <p>{{ $produk->nama }}</p>
                        </div>
                        <div class="col-span-2">
                            <p>{{ $produk->harga }}</p>
                        </div>
                        <div class="col-span-2">
                            <p>x {{ $produk->banyak }}</p>
                        </div>
                        <div class="col-span-2">
                            <p>{{ $totalHarga }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
            <br>
            <br>
            <br>
            <div class="grid place-content-end px-10">
                <div >
                    <div class="text-end">
                        <p>Total: {{ $totalSemua }}</p>
                    </div>
                    <br>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                            <a href="/keranjang">Batal</a>
                        </div>
                        <div class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center">
                            <form action="{{ route('buy.store') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ implode(' ', $arrayId) }}" name="beli">
                                <button type="submit">Beli</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
