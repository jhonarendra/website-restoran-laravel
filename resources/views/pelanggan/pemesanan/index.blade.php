@extends('layouts.pelanggan')

@section('title', 'Pemesanan')

@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')
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
                    
@endsection
