@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ul class="list-group">
                <a href="admin" class="list-group-item list-group-item-action active">Dashboard</a>
                <a href="admin/pegawai" class="list-group-item list-group-item-action">Pegawai</a>
                <a href="admin/dapur" class="list-group-item list-group-item-action">Dapur</a>
                <a href="admin/akuntansi" class="list-group-item list-group-item-action">Akuntansi</a>
                <a href="admin/pelayanan" class="list-group-item list-group-item-action">Pelayanan</a>
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
