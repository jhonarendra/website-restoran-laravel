@extends('layouts.pegawai')

@section('title', 'Dashboard')

@section('nama_pegawai', $pegawai['nama_pegawai'])
@section('email_pegawai', $pegawai['email_pegawai'])
@section('jabatan_pegawai', $pegawai['jabatan_pegawai'])

@section('content')

@yield('nama_pegawai')<br />
@yield('email_pegawai')<br />
@yield('jabatan_pegawai')

@endsection