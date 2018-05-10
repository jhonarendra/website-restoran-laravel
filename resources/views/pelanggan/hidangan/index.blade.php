@extends('layouts.pelanggan')

@section('title', 'Hidangan')

@section('foto_pelanggan', $pelanggan['foto_pelanggan'])
@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#makanan" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Makanan</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#minuman" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Minuman</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="makanan" role="tabpanel">
                        <div class="row">
                        @foreach($makanan as $makanan)
                        <div class="col-md-3">
                            <div class="card">
                              <img class="card-img-top" src="{{ asset('images/hidangan/'.$makanan->foto_hidangan) }}">
                              <div class="card-body">
                                <h4 class="card-title">{{$makanan->nama_hidangan}}</h4>
                                <p class="card-text">Rp {{$makanan->harga_hidangan}}</p>
                              </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="minuman" role="tabpanel">
                        <div class="row">
                        @foreach($minuman as $minuman)
                        <div class="col-md-3">
                            <div class="card">
                              <img class="card-img-top" src="{{ asset('images/hidangan/'.$minuman->foto_hidangan) }}">
                              <div class="card-body">
                                <h4 class="card-title">{{$minuman->nama_hidangan}}</h4>
                                <p class="card-text">Rp {{$minuman->harga_hidangan}}</p>
                              </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ URL('pelanggan/pemesanan/create')}}">Pesan Sekarang!</a>
            </div>
        </div>
@endsection
