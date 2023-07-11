@extends('home.layout-user')
@section('content_dashboard')
    <h1 class="text-2xl font-semibold mb-4">Halo, {{ Auth::user()->nama }} Selamat Datang di Dashboard
        {{ Auth::user()->role->name }} </h1>
    <h2>Dari dasbor akun Anda, Anda dapat melakukan order dan melihat riwayat transaksi.</h2>
@endsection
