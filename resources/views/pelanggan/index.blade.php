@extends('layouts.pelanggan')

@section('title', 'Dashboard')

@section('nama_pelanggan', $pelanggan['nama_pelanggan'])
@section('email_pelanggan', $pelanggan['email_pelanggan'])

@section('content')

@yield('nama_pelanggan')<br />
@yield('email_pelanggan')<br />

@endsection