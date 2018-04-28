@extends('layouts.pegawai')

@section('title', 'Edit Pegawai')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    @foreach($pegawais as $pegawais)
                    <form method="POST" action="{{URL('pegawai/pegawai', $pegawais->id_pegawai)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="nama_pegawai" value="{{$pegawais->nama_pegawai}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="" name="email_pegawai" value="{{$pegawais->email_pegawai}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="username_pegawai" value="{{$pegawais->username_pegawai}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="" name="password_pegawai" placeholder="Password Pegawai" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jabatan Pegawai</label>
                            <div class="col-sm-10">
                                <select name="jabatan_pegawai" class="form-control">
                                    <option value="Admin"
                                    @if($pegawais->jabatan_pegawai=='Admin')
                                    selected
                                    @endif
                                    >Admin</option>
                                    <option value="Super Admin"
                                    @if($pegawais->jabatan_pegawai=='Super Admin')
                                    selected
                                    @endif
                                    >Super Admin</option>
                                </select>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endforeach
@endsection
