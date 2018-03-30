@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ul class="list-group">
                <a href="../pelanggan" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="../pelanggan/reservasi" class="list-group-item list-group-item-action active">Reservasi</a>
                <a href="../pelanggan/pengaturan" class="list-group-item list-group-item-action">Pengaturan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Reservasi</div>

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
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nomer Meja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>12/12/12</td>
                                <td>02</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
