@extends('layouts.pegawai')

@section('title', 'Restoran')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
                    <link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
                    <a href="{{URL('pegawai/restoran/create')}}" class="btn btn-success">Tambah Restoran</a>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restoran as $restoran)
                            <tr>
                                <td>{{$restoran->nama_restoran}}</td>
                                <td>{{$restoran->alamat_restoran}}</td>
                                <td>
                                    <a href="{{URL('pegawai/restoran/'.$restoran->id_restoran.'/edit')}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <form action="{{URL('pegawai/restoran/'.$restoran->id_restoran)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="{{asset('ela/js/lib/datatables/datatables.min.js')}}"></script>
        <script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('ela/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
        <script src="{{asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('ela/js/lib/datatables/datatables-init.js')}}"></script>


        <script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
        <!-- scripit init-->
        <script type="text/javascript">
            $('form').submit(function(e){
                var form = this;
                e.preventDefault();
                swal({
                        title: "Are you sure to delete ?",
                        text: "You will not be able to recover this file !!",
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
