@extends('layouts.pegawai')

@section('title', 'Pegawai')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')
<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
<div class="col-lg-12">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
                    <a href="{{URL('pegawai/pegawai/create')}}" class="btn btn-success">Tambah Pegawai</a>

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Jabatan</th>
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Pembaruan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawais as $pegawais)
                            <tr>
                                <td>{{$pegawais->id_pegawai}}</td>
                                <td>{{$pegawais->nama_pegawai}}</td>
                                <td>{{$pegawais->email_pegawai}}</td>
                                <td>{{$pegawais->username_pegawai}}</td>
                                <td>{{$pegawais->jabatan_pegawai}}</td>
                                <td>{{$pegawais->created_at}}</td>
                                <td>{{$pegawais->updated_at}}</td>
                                <td>
                                    <a href="{{URL('pegawai/pegawai/'.$pegawais->id_pegawai.'/edit')}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <form action="{{URL('pegawai/pegawai/'.$pegawais->id_pegawai)}}" method="POST">
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
                        title: "Yakin Ingin Menghapus ?",
                        text: "Data pegawai yang dihapus tidak bisa dikembalikan",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, hapus",
                        closeOnConfirm: false
                    },
                    function(){
                        form.submit();
                    }
                );
            });

        </script>
@endsection
