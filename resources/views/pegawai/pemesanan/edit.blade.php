@extends('layouts.pegawai')

@section('title', 'Edit Pemesanan')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    @foreach($pemesanan as $pemesanan)
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
                    @endforeach
@endsection
