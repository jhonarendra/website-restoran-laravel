@extends('layouts.pegawai')

@section('title', 'Hidangan')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
        <a href="{{URL('pegawai/hidangan/create')}}" class="btn btn-success">Tambah Hidangan</a>

        <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#makanan" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Makanan</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#minuman" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Minuman</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="makanan" role="tabpanel">
                                <div class="row">
                                @foreach($makanan as $makanan)
                                <div class="col-md-3">
                                    <div class="card">
                                      <img class="card-img-top" src="{{ asset('images/hidangan/'.$makanan->foto_hidangan) }}">
                                      <div class="card-body">
                                        <h4 class="card-title">{{$makanan->nama_hidangan}}</h4>
                                        <p class="card-text">Rp {{$makanan->harga_hidangan}}</p>
                                        <div class="row">
                                            <a href="{{URL('pegawai/hidangan/'.$makanan->id_hidangan.'/edit')}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                            
                                            <form action="{{URL('pegawai/hidangan/'.$makanan->id_hidangan)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="minuman" role="tabpanel">
                                <div class="row">
                                @foreach($minuman as $minuman)
                                <div class="col-md-3">
                                    <div class="card">
                                      <img class="card-img-top" src="{{ asset('images/hidangan/'.$minuman->foto_hidangan) }}">
                                      <div class="card-body">
                                        <h4 class="card-title">{{$minuman->nama_hidangan}}</h4>
                                        <p class="card-text">Rp {{$minuman->harga_hidangan}}</p>
                                        <div class="row">
                                            <a href="{{URL('pegawai/hidangan/'.$minuman->id_hidangan.'/edit')}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                                            <form action="{{URL('pegawai/hidangan/'.$minuman->id_hidangan)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
                <!-- scripit init-->
                <script type="text/javascript">
                    $('form').submit(function(e){
                        var form = this;
                        e.preventDefault();
                        swal({
                                title: "Yakin Menghapus Hidangan?",
                                text: "Hidangan yang dihapus tidak bisa dikembalikan lhoo.",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, delete it !!",
                                closeOnConfirm: false
                            },
                            function(){
                                form.submit();
                            }
                        );
                    });

                </script>
@endsection
