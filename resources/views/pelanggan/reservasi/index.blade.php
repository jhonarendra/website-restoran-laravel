@extends('layouts.pelanggan')

@section('title', 'Reservasi')

@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')
                    <a href="{{URL('pelanggan/reservasi/create')}}" class="btn btn-success">Reservasi Baru</a>
                    
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">ID Reservasi</th>
                                <th scope="col">Restoran</th>
                                <th scope="col">Tanggal Reservasi</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Nomor Meja</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Pembaruan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservasi as $reservasi)
                            <tr>
                                <td>{{$reservasi->id_reservasi}}</td>
                                <td>{{$reservasi->nama_restoran}}</td>
                                <td>{{$reservasi->created_at}}</td>
                                <td>{{$reservasi->nama_pegawai}}</td>
                                <td>{{$reservasi->no_meja_reservasi}}</td>
                                <td>{{$reservasi->status_reservasi}}</td>
                                <td>{{$reservasi->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
@endsection
