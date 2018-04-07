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
                <a href="{{URL('admin')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{URL('admin/reservasi')}}" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="{{URL('admin/pegawai')}}" class="list-group-item list-group-item-action">Pegawai</a>
                <a href="{{URL('admin/dapur')}}" class="list-group-item list-group-item-action">Dapur</a>
                <a href="{{URL('admin/akuntansi')}}" class="list-group-item list-group-item-action active">Akuntansi</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Akuntansi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
