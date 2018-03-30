@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ul class="list-group">
                <a href="pelanggan" class="list-group-item list-group-item-action active">Dashboard</a>
                <a href="pelanggan/reservasi" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="pelanggan/pengaturan" class="list-group-item list-group-item-action">Pengaturan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat datang {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
