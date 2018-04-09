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
                <a href="{{URL('pegawai')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{URL('pegawai/reservasi')}}" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="{{URL('pegawai/pemesanan')}}" class="list-group-item list-group-item-action">Pemesanan</a>
                <a href="{{URL('pegawai/pelanggan')}}" class="list-group-item list-group-item-action">Pelanggan</a>
                <a href="{{URL('pegawai/pegawai')}}" class="list-group-item list-group-item-action">Pegawai</a>
                <a href="{{URL('pegawai/restoran')}}" class="list-group-item list-group-item-action">Restoran</a>
                <a href="{{URL('pegawai/hidangan')}}" class="list-group-item list-group-item-action">Hidangan</a>
                <a href="{{URL('pegawai/pengaturan')}}" class="list-group-item list-group-item-action active">Pengaturan</a>
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

                    @foreach($pegawai as $pegawai)
                    <form method="POST" action="{{URL('pegawai/pengaturan', $pegawai->id_pegawai)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_pegawai" class="form-control" id="" value="{{$pegawai->nama_pegawai}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email_pegawai" class="form-control" id="" value="{{$pegawai->email_pegawai}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username_pegawai" class="form-control" id="" value="{{$pegawai->username_pegawai}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_pegawai" class="form-control" id="" placeholder="Password Anda">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select name="jabatan_pegawai" class="form-control">
                                    <option value="Admin"
                                    @if($pegawai->jabatan_pegawai=='Admin')
                                    selected
                                    @endif
                                    >Admin
                                    </option>
                                    <option value="Super Admin"
                                    @if($pegawai->jabatan_pegawai=='Super Admin')
                                    selected
                                    @endif
                                    >Super Admin
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
