@extends('layouts.pelanggan')

@section('title', 'Buat Pemesanan')

@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')
                    <form method="POST" action="{{ URL('pelanggan/pemesanan/') }}">
                        {{ csrf_field() }}
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

                        <div class="row">
                            @foreach($hidangan as $hidangan)
                            <div class="col-md-3">
                                <input type="checkbox" name="hidangan[]" value="{{$hidangan->id_hidangan}}">{{$hidangan->nama_hidangan}}
                                <input type="text" class="form-control" name="harga_hidangan{{$hidangan->id_hidangan}}" value="{{$hidangan->harga_hidangan}}" readonly="">
                                <input type="text" class="form-control" name="jumlah_hidangan{{$hidangan->id_hidangan}}" placeholder="Jumlah">
                            </div>
                            @endforeach
                        </div>

                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-danger" href="{{URL('pelanggan/pemesanan')}}">Batal</a>
                        </div>
                    </form>
@endsection
