@extends('layouts.pegawai')

@section('title', 'Edit Profil')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')

<div class="col-lg-8">
                    <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">
                    <form method="POST" action="{{URL('pegawai/pengaturan', $pegawai['id_pegawai'])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="foto_pegawai" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/profil') }}/{{$pegawai['foto_pegawai']}}" style="width:200px; height:200px; border-radius:50%" />
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="foto_pelanggan" name="foto_pegawai" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_pegawai" class="form-control" id="" value="{{$pegawai['nama_pegawai']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email_pegawai" class="form-control" id="" value="{{$pegawai['email_pegawai']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username_pegawai" class="form-control" id="" value="{{$pegawai['username_pegawai']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_pegawai" class="form-control" id="" placeholder="Password Anda">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select name="jabatan_pegawai" class="form-control">
                                    <option value="Admin"
                                    @if($pegawai['jabatan_pegawai']=='Admin')
                                    selected
                                    @endif
                                    >Admin
                                    </option>
                                    <option value="Super Admin"
                                    @if($pegawai['jabatan_pegawai']=='Super Admin')
                                    selected
                                    @endif
                                    >Super Admin
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
