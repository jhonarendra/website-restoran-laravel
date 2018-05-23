@extends('layouts.pelanggan')

@section('title', 'Edit Profil')

@section('foto_pelanggan', $pelanggan['foto_pelanggan'])
@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')

        <div class="col-lg-8">
            <div class="card" style="background: #f5f5f5">
                <div class="basic-form">
                    <form method="POST" action="{{URL('pelanggan/pengaturan', $pelanggan['id_pelanggan'])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                            <label for="foto_pelanggan" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/profil') }}/{{$pelanggan['foto_pelanggan']}}" style="width:200px; height:200px; border-radius:50%" />
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="foto_pelanggan" name="foto_pelanggan" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{$pelanggan['nama_pelanggan']}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_pelanggan" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_pelanggan" name="email_pelanggan" value="{{$pelanggan['email_pelanggan']}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username_pelanggan" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username_pelanggan" name="username_pelanggan" value="{{$pelanggan['username_pelanggan']}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_pelanggan" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_pelanggan" name="password_pelanggan" placeholder="Masukkan Password Anda" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                        <a class="btn btn-danger" href="../pengaturan">Batal</a>
                    </form>
                </div>
            </div>
        </div>

@endsection
