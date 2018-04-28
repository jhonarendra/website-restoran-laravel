@extends('layouts.pegawai')

@section('title', 'Buat Pemesanan')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')

                    <form method="POST" action="{{ URL('pegawai/pemesanan/') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="id_restoran" class="col-sm-2 col-form-label">Restoran</label>
                            <div class="col-sm-10">
                                <select name="id_restoran" class="form-control">
                                    @foreach($restoran as $restoran)
                                    <option value="{{$restoran->id_restoran}}">{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <select name="id_pegawai" class="form-control">
                                    @foreach($pegawais as $pegawais)
                                    <option value="{{$pegawais->id_pegawai}}">{{$pegawais->nama_pegawai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                                <select name="id_pelanggan" class="form-control">
                                    @foreach($pelanggan as $pelanggan)
                                    <option value="{{$pelanggan->id_pelanggan}}">{{$pelanggan->nama_pelanggan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($hidangan as $hidangan)
                            <div class="col-md-3">
                                <input type="checkbox" name="hidangan[]" value="{{$hidangan->id_hidangan}}">{{$hidangan->nama_hidangan}}
                                <input type="text" class="form-control" name="harga_hidangan{{$hidangan->id_hidangan}}" value="{{$hidangan->harga_hidangan}}" readonly="">
                                <input type="text" class="form-control" name="jumlah_hidangan{{$hidangan->id_hidangan}}" placeholder="Jumlah">
                            </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="id_pegawai" value="1">
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
@endsection
