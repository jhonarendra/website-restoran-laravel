@extends('layouts.pegawai')

@section('title', 'Dashboard')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')

@yield('nama_pegawai')<br />
@yield('email_pegawai')<br />
@yield('jabatan_pegawai')
Contoh news Contoh news Contoh news Contoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh newsContoh news 
<a href="" class="btn btn-lg btn-outline-secondary">Download Berkas</a>
<p class="text-muted mb-0">
	Pegawai Adminstrator
</p>
@endsection