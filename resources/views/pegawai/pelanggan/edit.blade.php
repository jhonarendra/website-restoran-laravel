@extends('layouts.pegawai')

@section('title', 'Edit Pelanggan')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
<div class="col-lg-8">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
                    @foreach($pelanggan as $pelanggan)
                    <form method="POST" action="{{URL('pegawai/pelanggan', $pelanggan->id_pelanggan)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="nama_pelanggan" value="{{$pelanggan->nama_pelanggan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="" name="email_pelanggan" value="{{$pelanggan->email_pelanggan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="username_pelanggan" value="{{$pelanggan->username_pelanggan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="" name="password_pelanggan" placeholder="Password pelanggan" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input id="foto" class="form-control" type="file" name="foto_pelanggan" required>
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
