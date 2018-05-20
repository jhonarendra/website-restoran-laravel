@extends('layouts.pegawai')

@section('title', 'Edit Pemesanan')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')

<div class="col-lg-8">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">


                    @foreach($pemesanan as $pemesanan)
                    <form method="POST" action="{{URL('pegawai/pemesanan', $pemesanan->id_pemesanan)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Restoran</label>
                            <div class="col-sm-10">
                                <select name="id_restoran" class="form-control">
                                    @foreach($restoran as $restoran)
                                    <option value="{{$restoran->id_restoran}}" @if($restoran->id_restoran == $pemesanan->id_restoran) selected @endif>{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                                <select name="id_pelanggan" class="form-control">
                                    @foreach($pelanggan as $pelanggan)
                                    <option value="{{$pelanggan->id_pelanggan}}" @if($pelanggan->id_pelanggan == $pemesanan->id_pelanggan) selected @endif>{{$pelanggan->nama_pelanggan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <select name="id_pegawai" class="form-control">
                                    @foreach($pegawais as $pegawais)
                                    <option value="{{$pegawais->id_pegawai}}" @if($pegawais->id_pegawai == $pemesanan->id_pegawai) selected @endif>{{$pegawais->nama_pegawai}}</option>
                                    @endforeach
                                </select>
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
                    @endforeach
        </div>
    </div>
</div>
@endsection
