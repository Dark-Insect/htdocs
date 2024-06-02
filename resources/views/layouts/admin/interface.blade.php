@extends('layouts.global.dashboard')

@section('title', 'Members')

@section('content')
<main>
    @if (session('deleted'))
        <div class="alert alert-danger text-center">
            {{ session('deleted') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="text-align:center; font-weight: bold;">Welcome to Dungganon Siaton-Branch Loan Management System</h1>
        <div class="card mb-4">
            <img src="{{ asset('files/home-slider-img.png') }}" alt="Background Image">
        </div>
    </div>
</main>
@endsection
