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
                        <h4 class="card-title">{{Auth::user()->name}}</h4>
                        <p class="card-text">{{Auth::user()->email}}</p>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <a href="pelanggan" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="pelanggan/reservasi" class="list-group-item list-group-item-action active">Reservasi</a>
                <a href="pelanggan/pengaturan" class="list-group-item list-group-item-action">Pengaturan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Buat Reservasi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form method="POST" action="{{ URL('pelanggan/reservasi/store') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="{{Auth::user()->name}}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="{{Auth::user()->email}}" readonly="">
                            </div>
                        </div>
                        <input type="hidden" value="{{Auth::user()->id}}" name="id_pelanggan" />
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
