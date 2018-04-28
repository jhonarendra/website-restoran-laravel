@extends('layouts.pelanggan')

@section('title', 'Profil')

@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')
                    <a href="{{URL('pelanggan/pengaturan/'.$pelanggan['id_pelanggan'].'/edit')}}" class="btn-primary btn">Edit Profil</a>

                    <table class="table mt-3">
                        <tr>
                            <td>Nama</td>
                            <td>{{$pelanggan['nama_pelanggan']}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$pelanggan['email_pelanggan']}}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>{{$pelanggan['username_pelanggan']}}</td>
                        </tr>
                    </table>
@endsection
