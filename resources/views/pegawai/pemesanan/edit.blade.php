@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-3">
            <div class="card mb-3" style="max-width: 20rem;">
                <div class="card-header">Profil</div>
                <div class="card-body">
                    <div style="text-align: center">
                        <img src="" style="width: 100px;height: 100px;border-radius: 50%;" />
                        <h4 class="card-title">
                            {{$pegawai['nama_pegawai']}}
                        </h4>
                        <p class="card-text">
                            {{$pegawai['email_pegawai']}}<br />
                            {{$pegawai['jabatan_pegawai']}}
                        </p>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <a href="{{URL('pegawai')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{URL('pegawai/reservasi')}}" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="{{URL('pegawai/pemesanan')}}" class="list-group-item list-group-item-action active">Pemesanan</a>
                <a href="{{URL('pegawai/pelanggan')}}" class="list-group-item list-group-item-action">Pelanggan</a>
                <a href="{{URL('pegawai/pegawai')}}" class="list-group-item list-group-item-action">Pegawai</a>
                <a href="{{URL('pegawai/restoran')}}" class="list-group-item list-group-item-action">Restoran</a>
                <a href="{{URL('pegawai/hidangan')}}" class="list-group-item list-group-item-action">Hidangan</a>
                <a href="{{URL('pegawai/pengaturan')}}" class="list-group-item list-group-item-action">Pengaturan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Pemesanan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Apakah perlu diedit?
                    <!--@foreach($pemesanan as $pemesanan)
                    <form method="POST" action="{{URL('pegawai/pemesanan', $pemesanan->id_pemesanan)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID Restoran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="id_restoran" value="{{$pemesanan->id_restoran}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID Pelanggan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="id_pelanggan" value="{{$pemesanan->id_pelanggan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">ID Pegawai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="id_pegawai" value="{{$pemesanan->id_pegawai}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total Pemesanan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="total_pemesanan" value="{{$pemesanan->total_pemesanan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status_pemesanan" class="form-control">
                                    <option value="Belum Dibayar"
                                    @if($pemesanan->status_pemesanan=='Belum Dibayar')
                                    selected
                                    @endif
                                    >Belum Dibayar</option>
                                    <option value="Lunas"
                                    @if($pemesanan->status_pemesanan=='Lunas')
                                    selected
                                    @endif
                                    >Lunas</option>
                                </select>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endforeach-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
