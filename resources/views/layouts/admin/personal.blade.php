@extends('layouts.global.dashboard')

@section('title', 'Update Member')

@section('content')
<main>
    @if (session('warning'))
        <div class="alert alert-danger text-center">
            {{ session('warning') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
            <br>
            <h5 style="text-align: center;">NEGROS WOMEN FOR TOMMORROW FOUNDATION, INC.</h5>
            <p style="text-align: center;">Project Dungganon</p>
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5"> 
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-1">CLIENT INFORMATION SHEET</h3>
                        <br>
                        <form method="POST" action="{{ route('admin.member.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
    <div class="form-group col-md-4" style="float: right; margin-right: -200px;">
    <img src="{{ asset('storage/' . $user->photo) }}" width='50' height='50' class="img img-reponsive"  alt="User Photo"/>
    </div>
</div>

<div class="row mb-3">
    <div class="form-group col-md-3">
        <label style="font-weight: bold;" for="memberId">Member ID</label>
        <p>{{ $user->memberId }}</p>
    </div>
    <div class="form-group col-md-3">
        <label style="font-weight: bold;" for="txt_first_name">First name</label>
        <p>{{ $user->first_name }}</p>
    </div>
    <div class="form-group col-md-4">
        <label style="font-weight: bold;" for="txt_middle_name">Middle name</label>
        <p>{{ $user->middle_name }}</p>
    </div>
    <div class="form-group col-md-4">
        <label style="font-weight: bold;" for="txt_last_name">Last name</label>
        <p>{{ $user->last_name }}</p>
    </div>
</div>

<div class="row mb-3">
    <div class="form-group col-md-4">
        <label style="font-weight: bold;" for="dtr_date_of_birth">Date of Birth</label>
        <p>{{ $user->date_of_birth }}</p>
    </div>
    <div class="form-group col-md-4">
        <label style="font-weight: bold;" for="civil_status">Civil Status</label>
        <p>{{ $user->civil_status }}</p>
    </div>
    <div class="form-group col-md-4">
        <label style="font-weight: bold;" for="gender">Gender</label>
        <p>{{ $user->gender }}</p>
    </div>
</div>

<div class="form-group mb-3">
    <label style="font-weight: bold;" for="txt_place_of_birth">Place of Birth</label>
    <p>{{ $user->place_of_birth }}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for=""></label>
    <p></p>
</div>

<!-- The rest of the form fields can be similarly replaced with paragraph elements -->

    </div>
</main>
@endsection
