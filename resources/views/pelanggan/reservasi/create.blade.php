@extends('layouts.pelanggan')

@section('title', 'Buat Reservasi')

@section('foto_pelanggan', $pelanggan['foto_pelanggan'])
@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')
                    @foreach($reservasi as $reservasi)

                    <div class="col-lg-6">
                        <div class="card" style="background: #f5f5f5">
                                <div class="basic-form">
                                    <form method="POST" action="{{ URL('pelanggan/reservasi') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" placeholder="{{$reservasi->nama_pelanggan}}" readonly="">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="{{$reservasi->email_pelanggan}}" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_restoran">Restoran</label>
                                            <select name="id_restoran" class="form-control">
                                                @foreach($restoran as $restoran)
                                                <option value="{{$restoran->id_restoran}}">{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="text-align: right;">
                                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                            <a class="btn btn-danger" href="{{URL('pelanggan/reservasi')}}">Batal</a>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                    @endforeach
@endsection
