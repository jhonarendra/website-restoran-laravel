@extends('layouts.pegawai')

@section('title', 'Pemesanan')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <a href="{{URL('pegawai/pemesanan/create')}}" class="btn btn-success">Tambah Pemesanan</a>

                    <table class="table table-bordered table-responsive mt-3">
                        <thead>
                            <tr>
                                <th scope="col">ID Pemesanan</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Restoran</th>
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Total Pemesanan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Diperbarui</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemesanan as $pemesanan)
                            <tr>
                                <td>{{$pemesanan->id_pemesanan}}</td>
                                <td>{{$pemesanan->nama_pelanggan}}</td>
                                <td>{{$pemesanan->nama_restoran}}</td>
                                <td>{{$pemesanan->created_at}}</td>
                                <td>{{$pemesanan->nama_pegawai}}</td>
                                <td>{{$pemesanan->total_pemesanan}}</td>
                                <td>{{$pemesanan->status_pemesanan}}</td>
                                <td>{{$pemesanan->updated_at}}</td>
                                <td>
                                    <a href="{{URL('pegawai/pemesanan/'.$pemesanan->id_pemesanan)}}" class="btn btn-primary">Rincian</a>
                                    <a href="{{URL('pegawai/pemesanan/'.$pemesanan->id_pemesanan.'/edit')}}" class="btn btn-success">Edit</a>
                                    <form action="{{URL('pegawai/pemesanan/'.$pemesanan->id_pemesanan)}}" method="POST">
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
