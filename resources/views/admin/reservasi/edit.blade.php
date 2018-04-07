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
                <a href="{{URL('admin/reservasi')}}" class="list-group-item list-group-item-action active">Reservasi</a>
                <a href="{{URL('admin/pegawai')}}" class="list-group-item list-group-item-action">Pegawai</a>
                <a href="{{URL('admin/dapur')}}" class="list-group-item list-group-item-action">Dapur</a>
                <a href="{{URL('admin/akuntansi')}}" class="list-group-item list-group-item-action">Akuntansi</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Reservasi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($reservasi as $reservasi)
                    <form action="{{URL('admin/reservasi/update/'.$reservasi->id_reservation)}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nomor Meja</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="no_meja_reservasi" value="{{$reservasi->no_meja_reservasi}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_reservasi" class="col-sm-2 col-form-label">Status Reservasi</label>
                            <div class="col-sm-10">
                                <select name="status_reservasi" class="custom-select">
                                    <option value="Dikonfirmasi"
                                    @if($reservasi->status_reservasi=='Dikonfirmasi')
                                    selected
                                    @endif
                                    >Dikonfirmasi</option>
                                    <option value="Sedang Berlangsung"
                                    @if($reservasi->status_reservasi=='Sedang Berlangsung')
                                    selected
                                    @endif>Sedang Berlangsung</option>
                                    <option value="Selesai"
                                    @if($reservasi->status_reservasi=='Selesai')
                                    selected
                                    @endif>Selesai</option>
                                    <option value="Batal"
                                    @if($reservasi->status_reservasi=='Batal')
                                    selected
                                    @endif>Batal</option>
                                    <option value="Menunggu Konfirmasi"
                                    @if($reservasi->status_reservasi=='Menunggu Konfirmasi')
                                    selected
                                    @endif>Menunggu Konfirmasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_admin" class="col-sm-2 col-form-label">ID Pegawai</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="id_admin" value="{{$reservasi->id_admin}}">
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update" />
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
