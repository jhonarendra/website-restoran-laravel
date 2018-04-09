@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-3">
            <div class="card mb-3" style="max-width: 20rem;">
                <div class="card-header">Profil</div>
                <div class="card-body">
                    <div style="text-align: center">
                        <img src="" style="width: 100px;height: 100px;border-radius: 50%;" />
                        <h4 class="card-title">
                            <!--Auth::user()->name--> Jhonarendra
                        </h4>
                        <p class="card-text">
                            <!--Auth::user()->email--> jhonarendra@gmail.com
                        </p>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <a href="{{URL('pelanggan')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{URL('pelanggan/reservasi')}}" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="{{URL('pelanggan/pemesanan')}}" class="list-group-item list-group-item-action active">Pemesanan</a>
                <a href="{{URL('pelanggan/pengaturan')}}" class="list-group-item list-group-item-action">Pengaturan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Buat Pesanan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

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

                        <!--<a id="tambah-hidangan" class="btn btn-success">Tambah Hidangan</a>

                        <div id="hidangan">
                            <div class="form-group row">
                                <label for="id_restoran" class="col-sm-2 col-form-label">Hidangan</label>
                                <div class="col-sm-10">
                                    <select name="id_hidangan" class="form-control">
                                        foreach($hidangan as $hidangan)
                                        <option value="$hidangan->id_hidangan}}">$hidangan->nama_hidangan}}</option>
                                        endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_hidangan" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jumlah_hidangan" name="jumlah_hidangan" >
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                            $("#tambah-hidangan").click(function(){
                                $('#hidangan').append('<div class="form-group row"><label for="id_restoran" class="col-sm-2 col-form-label">Hidangan</label><div class="col-sm-10"><select name="id_hidangan" class="form-control">foreach($hidangan as $hidangan)<option value="$hidangan->id_hidangan}}">$hidangan->nama_hidangan}}</option>endforeach</select></div></div><div class="form-group row"><label for="jumlah_hidangan" class="col-sm-2 col-form-label">Jumlah</label><div class="col-sm-10"><input type="text" class="form-control" id="jumlah_hidangan" name="jumlah_hidangan" ></div></div>');
                            });
                        </script>-->

                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                            <a class="btn btn-danger" href="{{URL('pelanggan/pemesanan')}}">Batal</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
