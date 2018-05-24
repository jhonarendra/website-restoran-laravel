@extends('layouts.pegawai')

@section('title', 'Edit Restoran')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
<div class="col-lg-8">
                    <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">
                    @foreach($restoran as $restoran)
                    <form method="POST" action="{{URL('pegawai/restoran', $restoran->id_restoran)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Restoran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="nama_restoran" value="{{$restoran->nama_restoran}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Alamat Restoran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="alamat_restoran" value="{{$restoran->alamat_restoran}}" >
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                    @endforeach
@endsection
