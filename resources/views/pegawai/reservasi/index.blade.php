@extends('layouts.pegawai')

@section('title', 'Reservasi')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')

<a href="{{URL('pegawai/reservasi/create')}}" class="btn btn-success">Reservasi Baru</a>

<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                     <tr>
                         <th scope="col">ID Reservasi</th>
                         <th scope="col">Nama Pelanggan</th>
                         <th scope="col">Restoran</th>
                         <th scope="col">Tanggal Reservasi</th>
                         <th scope="col">Nama Pegawai</th>
                         <th scope="col">Nomor Meja</th>
                         <th scope="col">Status</th>
                         <th scope="col">Tanggal Pembaruan</th>
                         <th scope="col">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($reservasi as $reservasi)
                     <tr>
                         <td>{{$reservasi->id_reservasi}}</td>
                         <td>{{$reservasi->nama_pelanggan}}</td>
                         <td>{{$reservasi->nama_restoran}}</td>
                         <td>{{$reservasi->created_at}}</td>
                         <td>{{$reservasi->nama_pegawai}}</td>
                         <td>{{$reservasi->no_meja_reservasi}}</td>
                         <td>{{$reservasi->status_reservasi}}</td>
                         <td>{{$reservasi->updated_at}}</td>
                         <td>
                             <a href="{{URL('pegawai/reservasi/'.$reservasi->id_reservasi.'/edit')}}" class="btn btn-primary">
                                 <i class="fa fa-pencil"></i>
                             </a>
                             <form action="{{URL('pegawai/reservasi/'.$reservasi->id_reservasi)}}" method="POST">
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE')}}
                                 <button type="submit" class="btn btn-danger">
                                     <i class="fa fa-trash"></i>
                                 </button>
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
@endsection
