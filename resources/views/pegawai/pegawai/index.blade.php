@extends('layouts.pegawai')

@section('title', 'Pegawai')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <a href="{{URL('pegawai/pegawai/create')}}" class="btn btn-success">Tambah Pegawai</a>

                    <table class="table table-bordered table-responsive mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Jabatan</th>
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Pembaruan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawais as $pegawais)
                            <tr>
                                <td>{{$pegawais->id_pegawai}}</td>
                                <td>{{$pegawais->nama_pegawai}}</td>
                                <td>{{$pegawais->email_pegawai}}</td>
                                <td>{{$pegawais->username_pegawai}}</td>
                                <td>{{$pegawais->jabatan_pegawai}}</td>
                                <td>{{$pegawais->created_at}}</td>
                                <td>{{$pegawais->updated_at}}</td>
                                <td>
                                    <a href="{{URL('pegawai/pegawai/'.$pegawais->id_pegawai.'/edit')}}" class="btn btn-primary">Edit</a>
                                    <form action="{{URL('pegawai/pegawai/'.$pegawais->id_pegawai)}}" method="POST">
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
