@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ul class="list-group">
                <a href="home" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="pegawai" class="list-group-item list-group-item-action">Pegawai</a>
                <a href="dapur" class="list-group-item list-group-item-action">Dapur</a>
                <a href="gudang" class="list-group-item list-group-item-action">Gudang</a>
                <a href="akuntansi" class="list-group-item list-group-item-action">Akuntansi</a>
                <a href="pelayanan" class="list-group-item list-group-item-action active">Pelayanan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Pelayanan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Nama Pesanan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Jon</td>
                                <td>Nasi Goreng</td>
                                <td>3</td>
                                <td>Rp 30000</td>
                                <td>Menunggu</td>
                                <td>
                                    <a class="btn btn-primary" href="">Edit</a>
                                    <a class="btn btn-danger" href="">Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jon</td>
                                <td>Nasi Goreng</td>
                                <td>3</td>
                                <td>Rp 30000</td>
                                <td>Menunggu</td>
                                <td>
                                    <a class="btn btn-primary" href="">Edit</a>
                                    <a class="btn btn-danger" href="">Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jon</td>
                                <td>Nasi Goreng</td>
                                <td>3</td>
                                <td>Rp 30000</td>
                                <td>Menunggu</td>
                                <td>
                                    <a class="btn btn-primary" href="">Edit</a>
                                    <a class="btn btn-danger" href="">Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jon</td>
                                <td>Nasi Goreng</td>
                                <td>3</td>
                                <td>Rp 30000</td>
                                <td>Menunggu</td>
                                <td>
                                    <a class="btn btn-primary" href="">Edit</a>
                                    <a class="btn btn-danger" href="">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
