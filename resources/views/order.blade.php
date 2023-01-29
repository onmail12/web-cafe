@php use App\Http\Controllers\UtilController; @endphp

@extends('layout')
@section('main')
<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
    <h2 class="section-title pb-3">Menu</h2>
    <div class="row justify-content-center">
        <div class="col-sm-7 col-md-4 mb-5">
            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#foods" role="tab">Foods</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#juices" role="tab">Juices</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="foods" role="tabpanel">
            <div class="row">
                @foreach ($food_menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 bg-transparent border my-3 my-md-0">
                        <img src="assets/imgs/{{ $menu->gambar }}" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h4 class="pt20 pb20">{{ $menu->nama_menu }}</h4>
                            <p class="text-white">{{ $menu->deskripsi }}</p>
                            <h3 class="text-center mb-4">Rp{{ UtilController::rupiahFormat($menu->harga) }}
                            </h3>
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $menu->id }}" name="id">
                                <input type="hidden" value="{{ $menu->nama_menu }}" name="nama">
                                <input type="hidden" value="{{ $menu->harga }}" name="harga">
                                <input type="hidden" value=1 name="jumlah">
                                <button type="submit" class="btn btn-lg btn-primary">PESAN</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="juices" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
                @foreach ($drink_menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card border-0 bg-transparent border my-3 my-md-0">
                        <img src="assets/imgs/{{ $menu->gambar }}" class="rounded-0 card-img-top mg-responsive">
                        <div class="card-body">
                            <h4 class="pt20 pb20">{{ $menu->nama_menu }}</h4>
                            <p class="text-white">{{ $menu->deskripsi }}</p>
                            <h3 class="text-center mb-4">Rp{{ UtilController::rupiahFormat($menu->harga) }}
                            </h3>
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $menu->id }}" name="id">
                                <input type="hidden" value="{{ $menu->nama_menu }}" name="nama">
                                <input type="hidden" value="{{ $menu->harga }}" name="harga">
                                <input type="hidden" value=1 name="jumlah">
                                <button type="submit" class="btn btn-lg btn-primary">PESAN</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</div>




@endsection