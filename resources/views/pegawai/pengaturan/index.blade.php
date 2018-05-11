@extends('layouts.pegawai')

@section('title', 'Profil')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <a href="{{URL('pegawai/pengaturan/'.$pegawai['id_pegawai'].'/edit')}}" class="btn-primary btn">Edit Profil</a>

                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-two">
                                        <header>
                                            <div class="avatar">
                                                <img src="{{ asset('images/profil') }}/{{$pegawai['foto_pegawai']}}" />
                                            </div>
                                        </header>

                                        <h3>{{$pegawai['nama_pegawai']}}</h3>
                                        <div class="desc">
                                            {{$pegawai['email_pegawai']}} - {{$pegawai['username_pegawai']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
