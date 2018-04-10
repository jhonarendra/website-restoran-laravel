@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-3">
            <div class="card mb-3" style="max-width: 20rem;">
                <div class="card-header">Profil</div>
                <div class="card-body">
                    <div style="text-align: center">
                        <img src="" style="width: 100px;height: 100px;border-radius: 50%;" />
                        <h4 class="card-title">
                            {{$pelanggan['nama_pelanggan']}}
                        </h4>
                        <p class="card-text">
                            {{$pelanggan['email_pelanggan']}}
                        </p>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <a href="{{URL('pelanggan')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{URL('pelanggan/reservasi')}}" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="{{URL('pelanggan/pemesanan')}}" class="list-group-item list-group-item-action">Pemesanan</a>
                <a href="{{URL('pelanggan/pengaturan')}}" class="list-group-item list-group-item-action active">Pengaturan</a>
                <a href="{{URL('pelanggan/logout')}}" class="list-group-item list-group-item-action">Logout</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Pengaturan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

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
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
