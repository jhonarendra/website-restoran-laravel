@extends('layouts.pegawai')

@section('title', 'Edit Reservasi')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
@foreach($reservasi as $reservasi)
<div class="col-lg-8">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">

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
        </div>
    </div>
</div>
@endforeach
@endsection
