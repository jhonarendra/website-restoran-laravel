@extends('layouts.pegawai')

@section('title', 'Dashboard')

@section('foto_pegawai', $pegawai['foto_pegawai'])
@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')



<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-bag f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('pegawai/pelanggan')}}"><h2 class="color-white">{{$dashboard['jumlah_pelanggan']}}</h2></a>
                    <p class="m-b-0">Jumlah Pelanggan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-pink p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-comment f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('pegawai/pemesanan')}}"><h2 class="color-white">{{$dashboard['jumlah_pesanan']}}</h2></a>
                    <p class="m-b-0">Jumlah Pesanan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-vector f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('pegawai/reservasi')}}"><h2 class="color-white">{{$dashboard['jumlah_reservasi']}}</h2></a>
                    <p class="m-b-0">Jumlah Reservasi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-location-pin f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('pegawai/hidangan')}}"><h2 class="color-white">{{$dashboard['jumlah_hidangan']}}</h2></a>
                    <p class="m-b-0">Jumlah Hidangan</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Reservasi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pelanggan</th>
                                <th>Pegawai</th>
                                <th>Tanggal Reservasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservasi as $reservasi)
                            <tr>
                                <td>
                                    <div class="round-img">
                                        <a href=""><img src="{{asset('images/profil')}}/{{$reservasi['foto_pelanggan']}}" title="{{$reservasi['nama_pelanggan']}}"></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="round-img">
                                        <a href=""><img src="{{asset('images/profil')}}/{{$reservasi['foto_pegawai']}}" title="{{$reservasi['nama_pegawai']}}"></a>
                                    </div>
                                </td>
                                <td><span>{{$reservasi['created_at']}}</span></td>
                                <td>
                                    @if($reservasi['status_reservasi']=='Menunggu Konfirmasi')
                                    <span class="badge badge-warning">
                                    @elseif($reservasi['status_reservasi']=='Dikonfirmasi')
                                    <span class="badge badge-success">
                                    @elseif($reservasi['status_reservasi']=='Selesai')
                                    <span class="badge badge-primary">
                                    @elseif($reservasi['status_reservasi']=='Batal')
                                    <span class="badge badge-danger">
                                    @else
                                    <span class="badge">
                                    @endif
                                        {{$reservasi['status_reservasi']}}
                                    </span>
                                </td>
                                <td><span>{{$reservasi['updated_at']}}</span></td>
                                <td>
                                    <a href="{{URL('pegawai/pemesanan/'.$reservasi->id_pemesanan.'/edit')}}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ URL('pegawai/pemesanan') }}" class="btn btn-primary">Selengkapnya</a>
            </div>
        </div>
    </div>

	<div class="col-lg-6">
	    <div class="card">
	        <div class="card-title">
	            <h4>Recent Orders </h4>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table">
	                    <thead>
	                        <tr>
	                            <th>Pelanggan</th>
	                            <th>Pegawai</th>
	                            <th>Tanggal Pesan</th>
	                            <th>Status</th>
                                <th>Aksi</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($pesanan as $pesanan)
	                        <tr>
	                            <td>
	                                <div class="round-img">
	                                    <a href=""><img src="{{asset('images/profil')}}/{{$pesanan['foto_pelanggan']}}" title="{{$pesanan['nama_pelanggan']}}"></a>
	                                </div>
	                            </td>
	                            <td>
	                                <div class="round-img">
	                                    <a href=""><img src="{{asset('images/profil')}}/{{$pesanan['foto_pegawai']}}" title="{{$pesanan['nama_pegawai']}}"></a>
	                                </div>
	                            </td>
	                            <td><span>{{$pesanan['created_at']}}</span></td>
	                            <td>
                                    @if($pesanan['status_pemesanan']=='Belum Dibayar')
	                            	<span class="badge badge-danger">
                                    @elseif($pesanan['status_pemesanan']=='Lunas')
                                    <span class="badge badge-success">
                                    @else
                                    <span class="badge">
                                    @endif
	                            		{{$pesanan['status_pemesanan']}}
	                            	</span>
	                            </td>
                                <td>
                                    <a href="{{URL('pegawai/pemesanan/'.$pesanan->id_pemesanan.'/edit')}}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
	                        </tr>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>
                <a href="{{ URL('pegawai/pemesanan') }}" class="btn btn-primary">Selengkapnya</a>
	        </div>
	    </div>
	</div>
</div>

<script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
<!-- scripit init-->
<script type="text/javascript">
    swal("Hey, {{$pegawai['nama_pegawai']}}", "Selamat datang di dashboard 8-Stars Restaurant", "success")
</script>
@endsection