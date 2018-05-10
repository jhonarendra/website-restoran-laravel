@extends('layouts.pelanggan')

@section('title', 'Buat Pemesanan')

@section('foto_pelanggan', $pelanggan['foto_pelanggan'])
@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')
                    <div class="card">
                            <div class="basic-form">
                                 <form method="POST" action="{{ URL('pelanggan/pemesanan/') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="id_restoran">Restoran</label>
                                        <select name="id_restoran" class="form-control">
                                            @foreach($restoran as $restoran)
                                            <option value="{{$restoran->id_restoran}}">{{$restoran->nama_restoran.' - '.$restoran->alamat_restoran}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        @foreach($hidangan as $hidangan)
                                        <div class="col-md-3">
                                            <div class="card">
                                              <img class="card-img-top" src="{{ asset('images/hidangan/'.$hidangan->foto_hidangan) }}">
                                              <div class="card-body">
                                                <h4 class="card-title">{{$hidangan->nama_hidangan}}</h4>
                                                <p class="card-text">Rp {{$hidangan->harga_hidangan}}</p>
                                                <div class="row">
                                                    <input type="checkbox" class="form-control col-md-4" name="hidangan[]" value="{{$hidangan->id_hidangan}}">
                                                    <input type="hidden" class="form-control" name="harga_hidangan{{$hidangan->id_hidangan}}" value="{{$hidangan->harga_hidangan}}">
                                                    <input type="text" class="form-control col-md-8" name="jumlah_hidangan{{$hidangan->id_hidangan}}" placeholder="Jumlah">
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-danger" href="{{URL('pelanggan/pemesanan')}}">Batal</a>
                                    </div>
                                </form>
                            </div>
                    </div>


                    <form method="POST" action="{{ URL('pelanggan/pemesanan/') }}">
                        {{ csrf_field() }}

                    </form>
@endsection
