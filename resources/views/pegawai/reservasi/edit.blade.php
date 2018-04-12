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
                            <!--Auth::user()->name--> Jhonarendra
                        </h4>
                        <p class="card-text">
                            <!--Auth::user()->email--> jhonarendra@gmail.com
                        </p>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <a href="{{URL('pegawai')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{URL('pegawai/reservasi')}}" class="list-group-item list-group-item-action active">Reservasi</a>
                <a href="{{URL('pegawai/pemesanan')}}" class="list-group-item list-group-item-action">Pemesanan</a>
                <a href="{{URL('pegawai/pelanggan')}}" class="list-group-item list-group-item-action">Pelanggan</a>
                <a href="{{URL('pegawai/pegawai')}}" class="list-group-item list-group-item-action">Pegawai</a>
                <a href="{{URL('pegawai/restoran')}}" class="list-group-item list-group-item-action">Restoran</a>
                <a href="{{URL('pegawai/hidangan')}}" class="list-group-item list-group-item-action">Hidangan</a>
                <a href="{{URL('pegawai/pengaturan')}}" class="list-group-item list-group-item-action">Pengaturan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Reservasi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($reservasi as $reservasi)
                    <form method="POST" action="{{URL('pegawai/reservasi', $reservasi->id_reservasi)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Restoran</label>
                            <div class="col-sm-10">
                                <select name="id_restoran" class="form-control">
                                    @foreach($restoran as $restoran)
                                    <option value="{{$restoran->id_restoran}}"
                                        @if($restoran->id_restoran == $reservasi->id_restoran)
                                        selected
                                        @endif
                                        >{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                                <select name="id_pelanggan" class="form-control">
                                    @foreach($pelanggan as $pelanggan)
                                    <option value="{{$pelanggan->id_pelanggan}}"
                                        @if($pelanggan->id_pelanggan == $reservasi->id_pelanggan)
                                        selected
                                        @endif
                                        >{{$pelanggan->nama_pelanggan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <select name="id_pegawai" class="form-control">
                                    @foreach($pegawais as $pegawais)
                                    <option value="{{$pegawais->id_pegawai}}"
                                        @if($pegawais->id_pegawai == $reservasi->id_pegawai)
                                        selected
                                        @endif
                                        >{{$pegawais->nama_pegawai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nomor Meja</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_meja_reservasi" class="form-control" id="" value="{{$reservasi->no_meja_reservasi}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status_reservasi" class="form-control">
                                    Batal, Dikonfirmasi, Menunggu Konfirmasi, Sedang Berlangsung, Selesai
                                    <option value="Batal"
                                    @if($reservasi->status_reservasi=='Batal')
                                    selected
                                    @endif
                                    >Batal</option>
                                    <option value="Dikonfirmasi"
                                    @if($reservasi->status_reservasi=='Dikonfirmasi')
                                    selected
                                    @endif
                                    >Dikonfirmasi</option>
                                    <option value="Menunggu Konfirmasi"
                                    @if($reservasi->status_reservasi=='Menunggu Konfirmasi')
                                    selected
                                    @endif
                                    >Menunggu Konfirmasi</option>
                                    <option value="Sedang Berlangsung"
                                    @if($reservasi->status_reservasi=='Sedang Berlangsung')
                                    selected
                                    @endif
                                    >Sedang Berlangsung</option>
                                    <option value="Selesai"
                                    @if($reservasi->status_reservasi=='Selesai')
                                    selected
                                    @endif
                                    >Selesai</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" value="{{$reservasi->id_pelanggan}}" name="id_pelanggan" />
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-danger" href="{{URL('pegawai/reservasi')}}">Batal</a>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
