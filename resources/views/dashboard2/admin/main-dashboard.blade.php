@extends('layouts.dashboard-layout')
@section('dashboard-content')
    <h1 class="font-bold capitalize text-2xl">Welcome to {{ Auth::user()->role->name }} Dashboard</h1>
@endsection
