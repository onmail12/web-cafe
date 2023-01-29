@php use App\Http\Controllers\UtilController; @endphp
@php use App\Models\Menu; @endphp


@extends('layout')

@section('main')
<div id="blog" class="container-fluid bg-dark text-light p-5">
    @if (count($cartItems) <= 0)
    <h2 class="section-title text-center">Empty Cart</h2>
    <small><p class="text-center"><a href="/">Order here</a></p></small>
    @else
    <h2 class="section-title ">Pesanan</h2>
    
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <table class="table table-hover table-dark text-light">
        <tbody>
            @php
            $i=0
            @endphp
            <thead>
                <th></th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </thead>
            @foreach ($cartItems as $item)
            <tr>
                <td style="width: 10%"> <img src="assets/imgs/{{ Menu::find($item->id)->gambar }}"
                    style="width: 120px;height:120px;"></td>
                    <td>{{ $item->name }}<br><span class="fw-lighter">{{ Menu::find($item->id)->keterangan }}</span></td>
                    <td>Rp{{ UtilController::rupiahFormat($item->price) }}</td>
                    <td style="width: 10%;" class="form-outline">
                        
                        <form id="update_cart" action="{{ route('cart.refresh') }}" method="post">
                            @csrf
                            <input type="number" min="1" name="quantity" style="width:50%" value="{{ $item->quantity }}"
                            class="form-control bg-dark text-white" />
                            <input type="hidden" name="id" value="{{ $item->id }}">
                    </form>
                </td>
                
                <td>Rp{{ UtilController::rupiahFormat($item->price * $item->quantity)}}</td>
                <td>
                    <form action="{{ route('cart.remove') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <button class="btn btn-link text-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="fw-bolder float-start">Total: Rp{{ UtilController::rupiahFormat(Cart::getTotal()) }}</p>
    
    <form action="{{ route('pesanan.add') }}" method="post">
        @csrf
        <button type="submit" class="float-end btn btn-success">Bayar</button>
    </form>
    {{-- update price --}}
    <button form="update_cart" class="btn float-end mx-3 btn-secondary" type="submit">Update</button>
</div>

@endif
@endsection