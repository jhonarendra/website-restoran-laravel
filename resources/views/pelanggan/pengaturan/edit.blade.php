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
                <div class="card-header">Edit Pengaturan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($pengaturan as $pengaturan)
                    <form method="POST" action="{{URL('pelanggan/pengaturan', $pengaturan->id_pelanggan)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{$pengaturan->nama_pelanggan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_pelanggan" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_pelanggan" name="email_pelanggan" value="{{$pengaturan->email_pelanggan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username_pelanggan" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username_pelanggan" name="username_pelanggan" value="{{$pengaturan->username_pelanggan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_pelanggan" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_pelanggan" name="password_pelanggan" value="" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                        <a class="btn btn-danger" href="../reservasi">Batal</a>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
