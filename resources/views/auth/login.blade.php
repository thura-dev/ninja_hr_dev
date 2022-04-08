@extends('layouts.app_plain')
@section('title','Login')
@section('extra_css')
<style>

</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center align-content-center" style="height:100vh;">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <img src="{{ asset('image/logo.png') }}" alt="Ninja HR" style="width:75px;">
            </div>
            <div class="card">
                 <div class="card-body">
                    <h5 class="text-center">Login</h5>
                    <p class="text-center text-muted mb-0">Please fill the login form</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="md-form">
                            <label for="">Phone</label>
                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus>
                        </div>
                        @error('phone')
                        <span class="text-danger">$message</span>
                        @enderror
                        <div class="md-form">
                            <label for="">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  required>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-theme mt-4 btn-block">Login

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
