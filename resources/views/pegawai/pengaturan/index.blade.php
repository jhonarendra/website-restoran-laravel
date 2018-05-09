@extends('layouts.pegawai')

@section('title', 'Profil')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <a href="{{URL('pegawai/pengaturan/'.$pegawai['id_pegawai'].'/edit')}}" class="btn-primary btn">Edit Profil</a>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{ asset('images/profil') }}/{{$pegawai['foto_pegawai']}}" style="width:200px; height:200px; border-radius:50%" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <p class="form-control-static">{{$pegawai['nama_pegawai']}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control-static">{{$pegawai['email_pegawai']}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <p class="form-control-static">{{$pegawai['username_pegawai']}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <p class="form-control-static">{{$pegawai['jabatan_pegawai']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table mt-3">
                        <tr>
                            <td>Nama</td>
                            <td>{{$pegawai['nama_pegawai']}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$pegawai['email_pegawai']}}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>{{$pegawai['username_pegawai']}}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>{{$pegawai['jabatan_pegawai']}}</td>
                        </tr>
                    </table>
@endsection
