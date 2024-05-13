<x-app-layout title="Tambah" class="bg-green-100 flex justify-center items-center">
    <h1 class="text-green-800 text-2xl mb-6 text-center">Halaman Upload</h1>
    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <fieldset class="mb-6">
        <legend class="text-green-800 mb-2">Input gambar yang ingin diupload:</legend>
        <img id="uploadPreview" class="w-full mb-4">
        <input type="file" name="gambar" id="imgToUpload" onchange="PreviewImage();" accept="image/jpeg,image/png,image/gif,image/svg+xml" aria-describedby="gambar-help" class="sr-only">
        <button type="button" class="bg-white text-green-500 hover:bg-green-100 active:bg-green-200 focus:ring-green-500 focus:ring-4 focus:outline-none focus:ring-opacity-50 rounded-lg shadow-sm inline-flex items-center justify-center w-full mb-4 gap-2 px-4 py-2" aria-label="Pilih Gambar" onclick="document.getElementById('imgToUpload').click();">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 15.75 7.5 12M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z" />
  </svg>
    Pilih Gambar
</button>
        <p id="gambar-help" class="text-green-800 text-sm">Format gambar yang dapat diinputkan : JPEG, PNG, GIF, SVG</p>
      </fieldset>
      <fieldset class="mb-6">
        <legend class="text-green-800 mb-2 text-center">Informasi Produk</legend>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="nama" class="text-green-800 mb-2">Nama produk</label>
            <input type="text" name="nama" id="nama" class="w-full border border-green-500 rounded-lg px-4 py-2" aria-label="Nama produk">
          </div>
          <div>
            <label for="deskripsi" class="text-green-800 mb-2">Deskripsi produk</label>
            <input type="text" name="deskripsi" id="deskripsi" class="w-full border border-green-500 rounded-lg px-4 py-2" aria-label="Deskripsi produk">
          </div>
          <div>
            <label for="stok" class="text-green-800 mb-2">Stok produk</label>
            <input type="number" name="stok" id="stok" class="w-full border border-green-500 rounded-lg px-4 py-2" aria-label="Stok produk">
          </div>
          <div>
            <label for="harga" class="text-green-800 mb-2">Harga produk</label>
            <input type="number" name="harga" id="harga" class="w-full border border-green-500 rounded-lg px-4 py-2" aria-label="Harga produk">
          </div>
        </div>
      </fieldset>
      <button type="submit" class="bg-white text-green-500 hover:bg-green-100 active:bg-green-200 focus:ring-green-500 focus:ring-4 focus:outline-none focus:ring-opacity-50 rounded-lg shadow-sm inline-flex items-center justify-center w-full mb-4 gap-2 px-4 py-2" aria-label="Tambah produk">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
  </svg>
  Tambah
</button>
    </form>
  </main>
</x-app-layout>