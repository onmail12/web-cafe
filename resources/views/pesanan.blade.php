@php
use App\Http\Controllers\UtilController;
use App\Models\Menu;
use App\Models\Meja;
@endphp

@extends('layout')

@section('main')
<div id="blog" class="container-fluid bg-dark text-light p-5 ">

    @if ($pesanans->isEmpty())
    <h3 class="section-title text-center">Empty Pesanan</h3>
    @else
    
    @foreach ($pesanans as $pesanan)
    <h3 class="section-title">Pesanan Meja No.{{ $pesanan->meja->id }}</h3>
    @foreach ($pesanan->makanan as $makanan)
    @php
    $menu = Menu::where('id', '=', $makanan['menu_id'])->first();
    @endphp
    <table class="table table-hover table-dark text-light">
        <tbody>
            <tr>
                <td style="width: 10%"> <img src="assets/imgs/{{ $menu->gambar }}" style="width: 120px;height:120px;">
                </td>
                <td>{{ $menu->nama_menu }}<br><span class="fw-lighter">{{ $menu->keterangan }}</span></td>
                <td>{{ $makanan['jumlah'] }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <form action="{{ route('pesanan.remove') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $pesanan->id }}" name="id">
        <button class="btn btn-success mb-4" type="submit">Selesai</button>
    </form>
    @endforeach
</div>

@endif
@endsection