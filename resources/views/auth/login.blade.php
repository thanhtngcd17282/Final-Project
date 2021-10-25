@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-4">
    <div class="login-wrap p-0">
        <h3 class="mb-4 text-center">Have an account?</h3>
        <form action="{{ route('login') }}" class="signin-form" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Username" required>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                        <input type="checkbox" name="remember" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="w-50 text-md-right">
                    <a href="{{ route('password.request') }}" style="color: #fff">Forgot Password</a>
                </div>
            </div>
        </form>
        <a href="{{ route('register') }}"><p class="w-100 text-center">&mdash; Or Sign Up &mdash;</p></a>
    </div>
</div>
@endsection