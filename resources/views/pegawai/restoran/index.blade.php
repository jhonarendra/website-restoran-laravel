@extends('layouts.pegawai')

@section('title', 'Restoran')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <a href="{{URL('pegawai/restoran/create')}}" class="btn btn-success">Tambah Restoran</a>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restoran as $restoran)
                            <tr>
                                <td>{{$restoran->nama_restoran}}</td>
                                <td>{{$restoran->alamat_restoran}}</td>
                                <td>
                                    <a href="{{URL('pegawai/restoran/'.$restoran->id_restoran.'/edit')}}" class="btn btn-primary">Edit</a>
                                    <form action="{{URL('pegawai/restoran/'.$restoran->id_restoran)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <input type="submit" class="btn btn-danger" value="Hapus">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Jangan hapus restoran, nanti semua pemesanan, detilpemesanan, reservasi yang id restorannya dihapus ikut kehapus
@endsection
