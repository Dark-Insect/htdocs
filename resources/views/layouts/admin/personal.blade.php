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
    <div class="form-group col-md-3" style="float: right; margin-right: -200px;">
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
    <div class="form-group col-md-3">
        <label style="font-weight: bold;" for="txt_middle_name">Middle name</label>
        <p>{{ $user->middle_name }}</p>
    </div>
    <div class="form-group col-md-3">
        <label style="font-weight: bold;" for="txt_last_name">Last name</label>
        <p>{{ $user->last_name }}</p>
    </div>
</div>

<div class="row mb-3">
    <div class="form-group col-md-3">
        <label style="font-weight: bold;" for="dtr_date_of_birth">Date of Birth</label>
        <p>{{ $user->date_of_birth }}</p>
    </div>
    <div class="form-group col-md-3">
        <label style="font-weight: bold;" for="civil_status">Civil Status</label>
        <p>{{ $user->civil_status }}</p>
    </div>
    <div class="form-group col-md-3">
        <label style="font-weight: bold;" for="gender">Gender</label>
        <p>{{ $user->gender }}</p>
    </div>
    <div class="form-group mb-3">
    <label style="font-weight: bold;" for="txt_place_of_birth">Place of Birth</label>
    <p>{{ $user->place_of_birth }}</p>
</div>
</div>

<div class="row mb-3">
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Religion</label>
    <p>{{ $user->religion}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Educational Attainment</label>
    <p>{{ $user->education_attainment}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Contact No.</label>
    <p>{{$user->phone }}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Present Address</label>
    <p>{{ $user->present_address }}</p>
</div>
</div>

<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Permanent Address</label>
    <p>{{ $user->permanent_address }}</p>
</div>
<label style="font-weight: bold; background-color: gray; color: black;">Mother's Maiden Name (Name of mother when she was still single)</label>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">First Name</label>
    <p>{{$user->mother_first_name }}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Middle Name</label>
    <p>{{$user->mother_middle_name }}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Last Name</label>
    <p>{{ $user->mother_last_name}}</p>
</div>
<label style="font-weight: bold; background-color: gray; color: black;">Other Information: Spouse</label>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">First Name</label>
    <p>{{ $user->hs_first_name}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Middle Name</label>
    <p>{{ $user->hs_middle_name}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Last Name</label>
    <p>{{ $user->mother_last_name}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Extension(Suffix)</label>
    <p>{{ $user->hs_extension}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Date of Birth</label>
    <p>{{ $user->hs_date_of_birth}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Client's Present Source of Income</label>
    <p>{{ $user->client_source_income}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Husband's Present Source of Income</label>
    <p>{{ $user->hs_source_income}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Total Family Income</label>
    <p>{{ $user->total_income}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Total PPI Score</label>
    <p>{{ $user->total_ppi_score}}</p>
</div>
<div class="form-group mb-3">
    <label style="font-weight: bold;" for="">Email</label>
    <p>{{ $user->email}}</p>
</div>
<!-- The rest of the form fields can be similarly replaced with paragraph elements -->

    </div>
</main>
@endsection
