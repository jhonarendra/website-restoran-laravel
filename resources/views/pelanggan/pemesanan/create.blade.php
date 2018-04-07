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
                <a href="{{URL('pelanggan/pemesanan')}}" class="list-group-item list-group-item-action active">Pemesanan</a>
                <a href="{{URL('pelanggan/pengaturan')}}" class="list-group-item list-group-item-action">Pengaturan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Buat Pesanan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ URL('pelanggan/pemesanan/') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="id_restoran" class="col-sm-2 col-form-label">ID Restoran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_restoran" name="id_restoran" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_hidangan" class="col-sm-2 col-form-label">ID Hidangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_hidangan" name="id_hidangan" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_hidangan" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jumlah_hidangan" name="jumlah_hidangan" >
                            </div>
                        </div>
                        <input type="hidden" name="id_pelanggan" value="1">
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                            <a class="btn btn-danger" href="../reservasi">Batal</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
