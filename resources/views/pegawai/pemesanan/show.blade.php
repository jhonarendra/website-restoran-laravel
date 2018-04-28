@extends('layouts.pegawai')

@section('title', 'Rincian Pemesanan')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')

                    <a href="{{URL('pegawai/pemesanan/create')}}" class="btn btn-success">Tambah Pemesanan</a>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Nama Hidangan</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga Hidangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detil_pemesanan as $detil_pemesanan)
                            <tr>
                                <td>{{$detil_pemesanan->nama_hidangan}}</td>
                                <td>{{$detil_pemesanan->jenis_hidangan}}</td>
                                <td>{{$detil_pemesanan->harga_hidangan}}</td>
                                <td>{{$detil_pemesanan->jumlah_hidangan}}</td>
                                <td>{{$detil_pemesanan->total_harga_hidangan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
@endsection
