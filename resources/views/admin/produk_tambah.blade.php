<x-app-layout title="Tambah">
  <div class="py-8 px-20">
    <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data" class="space-y-8">
      @csrf
      <div class="shadow-md bg-white rounded-md p-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="col-span-1 flex flex-col items-center">
          <p class="text-lg font-medium mb-2">Pilih gambar yang mau di upload:</p>
          <div class="w-full h-64 bg-gray-100 border border-gray-300 rounded-md flex items-center justify-center">
            <img id="uploadPreview" class="max-h-full max-w-full object-cover rounded-md" alt="Preview" />
          </div>
          <input type="file" name="gambar" id="imgToUpload" class="hidden" accept="image/jpeg,image/png,image/gif,image/svg+xml" onchange="PreviewImage();">
          <button type="button" class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md" onclick="document.getElementById('imgToUpload').click();">Pilih Gambar</button>
        </div>
        <div class="col-span-2 space-y-6">
          <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama produk</label>
            <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" type="text" name="nama" id="nama" required>
          </div>
          <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi produk</label>
            <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" type="text" name="deskripsi" id="deskripsi" required>
          </div>
          <div>
            <label for="stok" class="block text-sm font-medium text-gray-700">Stok produk</label>
            <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" type="number" name="stok" id="stok" required>
          </div>
          <div>
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga produk</label>
            <input class="w-full mt-1 p-2 border border-gray-300 rounded-md" type="number" name="harga" id="harga" required>
          </div>
          <div class="flex justify-end">
            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md cursor-pointer" type="submit" value="Tambah">
          </div>
        </div>
      </div>
    </form>
  </div>

  <script>
    function PreviewImage() {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("imgToUpload").files[0]);

      oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
      };
    }
  </script>
</x-app-layout>
