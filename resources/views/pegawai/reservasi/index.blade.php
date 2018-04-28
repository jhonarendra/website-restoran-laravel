@extends('layouts.pegawai')

@section('title', 'Reservasi')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')

<a href="{{URL('pegawai/reservasi/create')}}" class="btn btn-success">Reservasi Baru</a>

<table class="table table-bordered table-responsive mt-3">
    <thead>
        <tr>
            <th scope="col">ID Reservasi</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Restoran</th>
            <th scope="col">Tanggal Reservasi</th>
            <th scope="col">Nama Pegawai</th>
            <th scope="col">Nomor Meja</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggal Pembaruan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservasi as $reservasi)
        <tr>
            <td>{{$reservasi->id_reservasi}}</td>
            <td>{{$reservasi->nama_pelanggan}}</td>
            <td>{{$reservasi->nama_restoran}}</td>
            <td>{{$reservasi->created_at}}</td>
            <td>{{$reservasi->nama_pegawai}}</td>
            <td>{{$reservasi->no_meja_reservasi}}</td>
            <td>{{$reservasi->status_reservasi}}</td>
            <td>{{$reservasi->updated_at}}</td>
            <td>
                <a href="{{URL('pegawai/reservasi/'.$reservasi->id_reservasi.'/edit')}}" class="btn btn-primary">Edit</a>
                <form action="{{URL('pegawai/reservasi/'.$reservasi->id_reservasi)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <input type="submit" class="btn btn-danger" value="Hapus">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
