<x-app-layout title="Tambah">
    <h1>halaman upload</h1>
    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="gambar">
            <p>Pilih gambar yang mau di upload:</p> 
            <img id="uploadPreview" />
            <br>
            <input type = "button" value = "Choose image" onclick="javascript:document.getElementById('imgToUpload').click();">
            <input type="file" name="gambar" id="imgToUpload" onchange="PreviewImage();" style="display: none;" accept="image/jpeg,image/png,image/gif,image/svg+xml">  
        </div>
        <p>Nama produk</p>
        <input type="text" name="nama" id="">
        <p>Deskripsi produk</p>
        <input type="text" name="deskripsi" id="">
        <p>Stok produk</p>
        <input type="number" name="stok" id="">
        <p>Harga produk</p>
        <input type="number" name="harga" id="">
        <input type="submit" value="tambah">
    </form>
</x-app-layout>
