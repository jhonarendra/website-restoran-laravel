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
                <div class="card-header">Pemesanan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{URL('pelanggan/pemesanan/create')}}" class="btn btn-success">Pesan</a>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">ID Pemesanan</th>
                                <th scope="col">Restoran</th>
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Total Pemesanan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemesanan as $pemesanan)
                            <tr>
                                <td>{{$pemesanan->id_pemesanan}}</td>
                                <td>{{$pemesanan->nama_restoran}}</td>
                                <td>{{$pemesanan->created_at}}</td>
                                <td>{{$pemesanan->nama_pegawai}}</td>
                                <td>{{$pemesanan->total_pemesanan}}</td>
                                <td>{{$pemesanan->status_pemesanan}}</td>
                                <td>
                                    <a href="{{URL('pelanggan/pemesanan/'.$pemesanan->id_pemesanan)}}" class="btn btn-primary">Rincian</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
