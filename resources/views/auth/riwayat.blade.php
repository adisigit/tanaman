<x-app-layout title="Riwayat">
    <p>aaaa</p>
    @foreach ($riwayat as $riwayat)
        <p>{{$riwayat->total}}</p>
    @endforeach
    
</x-app-layout>