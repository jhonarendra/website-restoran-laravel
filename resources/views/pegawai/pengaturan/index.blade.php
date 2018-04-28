@extends('layouts.pegawai')

@section('title', 'Profil')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <a href="{{URL('pegawai/pengaturan/'.$pegawai['id_pegawai'].'/edit')}}" class="btn-primary btn">Edit Profil</a>

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
