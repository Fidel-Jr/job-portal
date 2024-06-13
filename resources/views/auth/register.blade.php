@extends('layouts.app')

@section('content')
<section class="section-hero overlay inner-page bg-image" style=" margin-top: -24px;background-image: url('{{ asset('assets/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
    <div class="row">
        <div class="col-md-7">
        <h1 class="text-white font-weight-bold">Register</h1>
        <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Register</strong></span>
        </div>
        </div>
    </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form style="margin: 35px;" action="{{ route('register') }}" class="p-4 border rounded" method="POST">
                @csrf
                <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="fname">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="fname">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="fname">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="fname">Re-Type Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                </div>

                <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" name="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
