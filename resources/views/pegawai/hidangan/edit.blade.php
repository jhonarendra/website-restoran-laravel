@extends('layouts.pegawai')

@section('title', 'Edit Hidangan')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
<div class="col-lg-8">
    <div class="card" style="background: #f5f5f5">
            <div class="basic-form">
                @foreach($hidangan as $hidangan)
                    <form method="POST" action="{{URL('pegawai/hidangan', $hidangan->id_hidangan)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Hidangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="nama_hidangan" value="{{$hidangan->nama_hidangan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jenis Hidangan</label>
                            <div class="col-sm-10">
                                <select name="jenis_hidangan" class="form-control">
                                    <option value="Makanan"
                                    @if($hidangan->jenis_hidangan=='Makanan')
                                    selected
                                    @endif
                                    >Makanan</option>
                                    <option value="Minuman"
                                    @if($hidangan->jenis_hidangan=='Minuman')
                                    selected
                                    @endif
                                    >Minuman</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Harga Hidangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="harga_hidangan" value="{{$hidangan->harga_hidangan}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Foto Hidangan</label>
                            <div class="col-sm-10">
                                <input type="file" name="foto_hidangan" class="form-control">
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @endforeach
            </div>
    </div>
</div>
@endsection
