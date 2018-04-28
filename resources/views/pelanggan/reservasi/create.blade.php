@extends('layouts.pelanggan')

@section('title', 'Buat Reservasi')

@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')
                    @foreach($reservasi as $reservasi)
                    <form method="POST" action="{{ URL('pelanggan/reservasi') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="{{$reservasi->nama_pelanggan}}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="{{$reservasi->email_pelanggan}}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_restoran" class="col-sm-2 col-form-label">Restoran</label>
                            <div class="col-sm-10">
                                <select name="id_restoran" class="form-control">
                                    @foreach($restoran as $restoran)
                                    <option value="{{$restoran->id_restoran}}">{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                            <a class="btn btn-danger" href="{{URL('pelanggan/reservasi')}}">Batal</a>
                        </div>
                    </form>
                    @endforeach
@endsection
