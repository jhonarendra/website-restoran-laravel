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
                            <!--Auth::user()->name--> Jhonarendra
                        </h4>
                        <p class="card-text">
                            <!--Auth::user()->email--> jhonarendra@gmail.com
                        </p>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <a href="{{URL('pelanggan')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{URL('pelanggan/reservasi')}}" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="{{URL('pelanggan/pemesanan')}}" class="list-group-item list-group-item-action">Pemesanan</a>
                <a href="{{URL('pelanggan/pengaturan')}}" class="list-group-item list-group-item-action active">Pengaturan</a>
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

                    @foreach($pengaturan as $pengaturan)
                        <div class="row">
                            <div class="col-2">
                                Nama
                            </div>
                            <div class="col-10">
                                : {{$pengaturan->nama_pelanggan}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Email
                            </div>
                            <div class="col-10">
                                : {{$pengaturan->email_pelanggan}}
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-2">
                                Username
                            </div>
                            <div class="col-10">
                                : {{$pengaturan->username_pelanggan}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Password
                            </div>
                            <div class="col-10">
                                : Password Anda
                            </div>
                        </div>
                        <a href="{{URL('pelanggan/pengaturan/1/edit')}}" class="btn btn-primary">Edit Profil</a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
