@extends('layouts.pegawai')

@section('title', 'Pelanggan')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <a href="{{URL('pegawai/pelanggan/create')}}" class="btn btn-success">Tambah Pelanggan</a>

                    <table class="table table-bordered table-responsive mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Pembaruan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggan as $pelanggan)
                            <tr>
                                <td>{{$pelanggan->id_pelanggan}}</td>
                                <td>{{$pelanggan->nama_pelanggan}}</td>
                                <td>{{$pelanggan->email_pelanggan}}</td>
                                <td>{{$pelanggan->username_pelanggan}}</td>
                                <td>{{$pelanggan->created_at}}</td>
                                <td>{{$pelanggan->updated_at}}</td>
                                <td>
                                    <a href="{{URL('pegawai/pelanggan/'.$pelanggan->id_pelanggan.'/edit')}}" class="btn btn-primary">Edit</a>
                                    <form action="{{URL('pegawai/pelanggan/'.$pelanggan->id_pelanggan)}}" method="POST">
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
