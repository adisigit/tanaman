<x-app-layout title="Tambah">
  <div class="py-8 px-20">
    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="shadow-md bg-white rounded-md p-8 grid grid-cols-3 gap-4 ">
          <div class="col-span-1">
            <div class="gambar">
                <p>Pilih gambar yang mau di upload:</p> 
                <img id="uploadPreview" />
                <br>
                <input type = "button" value = "Choose image" onclick="javascript:document.getElementById('imgToUpload').click();">
                <input type="file" name="gambar" id="imgToUpload" onchange="PreviewImage();" style="display: none;" accept="image/jpeg,image/png,image/gif,image/svg+xml">  
            </div>
          </div>
          <div class="col-span-2">
            <div>
                <label for="nama">Nama produk</label>
                <input class="w-full" type="text" name="nama" id="nama">
            </div>
            <div>
                <label for="deskripsi">Deskripsi produk</label>
                <input class="w-full" type="text" name="deskripsi" id="deskripsi">
            </div>
            <div>
                <label for="stok">Stok produk</label>
                <input class="w-full" type="number" name="stok" id="stok">
            </div>
            <div>
                <label for="harga">Harga produk</label>
                <input class="w-full" type="number" name="harga" id="harga">
            </div>
            <br>
            <div>
                <input class=" place-items-end bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="tambah">
            </div>
        </div>
    </form>
  </div>
</x-app-layout>