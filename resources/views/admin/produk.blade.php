<x-app-layout title="Produk">
    <section class="the-wedding-section section-bg section-padding" id="section_3">
        <div class="up-center-text">
            <div class="row">
                <h2 class="section-title">Produk</h2>
            </div>
            
            <div class="row">
                @foreach ($produks as $key => $item)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="update-cart">
                        <div class="cart">
                            <img src="https://k1-toko-tanaman.s3.ap-southeast-1.amazonaws.com/{{$item->gambar_path}}" class="card-img-top img-thumbnail mx-auto" alt="..." style="width: 200px; height: 200px;">
                        </div>

                        <div class="card">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="card-text">Stok: {{ $item->stok }}</p>
                            <p class="card-text">Harga: {{ $item->harga }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('produk.destroy', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
