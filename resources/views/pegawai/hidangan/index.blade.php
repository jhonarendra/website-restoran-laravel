@extends('layouts.pegawai')

@section('title', 'Hidangan')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <a href="{{URL('pegawai/hidangan/create')}}" class="btn btn-success">Tambah Hidangan</a>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hidangan as $hidangan)
                            <tr>
                                <td>{{$hidangan->nama_hidangan}}</td>
                                <td>{{$hidangan->jenis_hidangan}}</td>
                                <td>
                                    <a href="{{URL('pegawai/hidangan/'.$hidangan->id_hidangan.'/edit')}}" class="btn btn-primary">Edit</a>
                                    <form action="{{URL('pegawai/hidangan/'.$hidangan->id_hidangan)}}" method="POST">
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
