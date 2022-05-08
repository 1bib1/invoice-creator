@extends('layouts.app')

@section('content')
<div class="masthead  section tab-pane" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    
    <div class="container d-flex align-items-center flex-column">
        <h1 class="masthead-heading text-uppercase mb-0">Register</h1>
        <form method="POST" action="{{ route('register.perform') }}">
            <div class="text-center mb-3">
            {{ csrf_field() }}
            <!-- Username input -->
            <div class="form-outline mb-4">
                <input type="text" id="username" name="username" type="text" class="form-control" />
                <label class="form-label" for="username">Username</label>
            @if ($errors->has('username'))
                    <div class="text-danger">{{ $errors->first('username') }}</div>
            @endif
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control" />
                <label class="form-label" for="email">Email</label>
            @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" />
                <label class="form-label" for="password">Password</label>
            @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
            @endif
            </div>

            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password_confirmation" id="password_confirmation" class="form-control"/>
                <label class="form-label" for="password_confirmation">Repeat password</label>
            @if ($errors->has('password_confirmation'))
                    <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
            @endif
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                aria-describedby="registerCheckHelpText" />
                <label class="form-check-label" for="registerCheck">
                I have read and agree to the terms
                </label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
        </form>
    </div>
</div>
@endsection