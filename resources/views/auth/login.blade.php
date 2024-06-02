@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @auth
                        @if (auth()->user()->role === "member")
                            <h2 class="text-center">Oops, please go back.</h2>
                            <p class="text-center"><a href="{{ route('member.mail.index') }}">Dashboard</a></p>
                        @elseif (auth()->user()->role === "admin")
                            <h2 class="text-center">Oops, please go back.</h2>
                            <p class="text-center"><a href="{{ route('admin.member.index') }}">Dashboard</a></p>
                        @else
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        @endif
                    @else
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 12rem;">
        <div class="col-md-5">
            <div class="card">
                @auth
                    @if (auth()->user()->role === "member")
                        <div class="card-header text-center">404</div>
                    @endif
                    @if (auth()->user()->role === "admin")
                        <div class="card-header text-center">404</div>
                    @endif
                @endauth
                <div class="card-header hide-me">{{ __('Login') }}</div>

                <div class="card-body px-5 py-4">
                    @auth
                        @if (auth()->user()->role === "member")
                            <h2 class="text-center">Opps, please go back.</h2>
                            <p class="text-center"><a href="{{ route('member.mail.index') }}">Dashboard</a></p>
                        @endif
                        @if (auth()->user()->role === "admin")
                            <h2 class="text-center">Opps, please go back.</h2>
                            <p class="text-center"><a href="{{ route('admin.member.index') }}">Dashboard</a></p>
                        @endif
                    @endauth
                    <form id="my-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
                            <div class="col-md-12">
                                <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}
                            <div class="col-md-12">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@auth
@if (auth()->user()->role === "member")
<style>
    #my-form{
        display: none !important;
    }
    .hide-me{
        display: none !important;
    }
</style>
@endif
@if (auth()->user()->role === "admin")
<style>
    #my-form{
        display: none !important;
    }
    .hide-me{
        display: none !important;
    }
</style>
@endif
@endauth
@endsection -->
