@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }} | Nusantara Flora</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

<script>
    function PreviewImage() {
        var oFReader = new FileReader();
        var uploadPreview = document.getElementById("uploadPreview");

        oFReader.readAsDataURL(document.getElementById("imgToUpload").files[0]);

        oFReader.onload = function(oFREvent) {
            uploadPreview.src = oFREvent.target.result;
            uploadPreview.style.maxWidth = '300px'; // Example style
            uploadPreview.style.height = '100%'; // Example style
            // Add more styles as needed
        };
    };
    let counterValue = 1;

    function increment() {
        var currentStock = parseInt(document.getElementById("stok").innerText);
        var counterElement = document.getElementById("counter");
        var counterValue = parseInt(counterElement.innerText);
        if (counterValue < currentStock) {
            counterValue++;
            counterElement.innerText = counterValue;
            document.getElementById("counterValue").value = counterValue;
            document.getElementById("counterBeli").value = counterValue;
        }
    }

    function decrement() {
        var counterElement = document.getElementById("counter");
        var counterValue = parseInt(counterElement.innerText);
        if (counterValue > 1) {
            counterValue--;
            counterElement.innerText = counterValue;
            document.getElementById("counterValue").value = counterValue;
            document.getElementById("counterBelie").value = counterValue;
        }
    }

    var checkboxes = document.querySelectorAll("#produkCheckbox");
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', handleCheckboxChange);
    });

    function updateHasil() {
        document.getElementById('hasil').value = produkTerpilih.join(' ');
        document.getElementById('pilih').value = produkTerpilih.join(' ');
    }

    var produkTerpilih = [];

    function handleCheckboxChange(event) {
        var checkbox = event.target;
        var idProduk = checkbox.value;

        if (checkbox.checked) {
            produkTerpilih.push(idProduk);
        } else {
            var index = produkTerpilih.indexOf(idProduk);
            if (index !== -1) {
                produkTerpilih.splice(index, 1);
            }
        }
        updateHasil();
    }
    
</script>
