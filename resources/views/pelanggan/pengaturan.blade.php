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
                <a href="../pelanggan" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="../pelanggan/reservasi" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="../pelanggan/pengaturan" class="list-group-item list-group-item-action active">Pengaturan</a>
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
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary mt-3" value="Edit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
