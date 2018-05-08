@extends('layouts.pelanggan')

@section('title', 'Profil')

@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')
                    <a href="{{URL('pelanggan/pengaturan/'.$pelanggan['id_pelanggan'].'/edit')}}" class="btn-primary btn">Edit Profil</a>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                nanti disini fotonya
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <p class="form-control-static">{{$pelanggan['nama_pelanggan']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <p class="form-control-static">{{$pelanggan['email_pelanggan']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <p class="form-control-static">{{$pelanggan['username_pelanggan']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection
