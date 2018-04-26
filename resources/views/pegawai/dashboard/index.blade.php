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
                            {{$pegawai['nama_pegawai']}}
                        </h4>
                        <p class="card-text">
                            {{$pegawai['email_pegawai']}}<br />
                            {{$pegawai['jabatan_pegawai']}}
                        </p>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <a href="{{URL('pegawai/dashboard')}}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{URL('pegawai/reservasi')}}" class="list-group-item list-group-item-action">Reservasi</a>
                <a href="{{URL('pegawai/pemesanan')}}" class="list-group-item list-group-item-action active">Pemesanan</a>
                <a href="{{URL('pegawai/pelanggan')}}" class="list-group-item list-group-item-action">Pelanggan</a>
                <a href="{{URL('pegawai/pegawai')}}" class="list-group-item list-group-item-action">Pegawai</a>
                <a href="{{URL('pegawai/restoran')}}" class="list-group-item list-group-item-action">Restoran</a>
                <a href="{{URL('pegawai/hidangan')}}" class="list-group-item list-group-item-action">Hidangan</a>
                <a href="{{URL('pegawai/pengaturan')}}" class="list-group-item list-group-item-action">Pengaturan</a>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">ADMIN</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<div class="row align-items-center">
						<div class="col-6 mx-auto col-md-6 order-md-2">
							<img class="img-fluid mb-3 mb-md-0" src="" alt="" width="1024" height="860">
						</div>
						<div class="col-md-6 order-md-1 text-center text-md-left pr-md-5">
							<h1 class="mb-3 bd-text-purple-bright">NEWS</h1>
							<p class="lead">
								CONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWS
							</p>
							<p class="lead mb-4">
								CONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWSCONTOH NEWS.
							</p>
							<div class="d-flex flex-column flex-md-row lead mb-3">
								<a href="" class="btn btn-lg btn-bd-primary mb-3 mb-md-0 mr-md-3" >Get started</a>
								<a href="" class="btn btn-lg btn-outline-secondary" >Download</a>
							</div>
							<p class="text-muted mb-0">
								ADMIN CONTOH
							</p>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

			