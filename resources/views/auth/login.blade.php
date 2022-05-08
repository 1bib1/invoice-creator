@extends('layouts.app')

@section('content')
<!-- Pills content -->
<div class="masthead container">
  <div class="container d-flex align-items-center flex-column">
    <form method="POST" action="{{ route('login.perform') }}">
      <h1 class="masthead-heading text-uppercase mb-0">Login to access invoices.</h1>
      {{ csrf_field() }}
      @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
      <div class="divider-custom divider-light">
                      <div class="divider-custom-line"></div>
                      <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                      <div class="divider-custom-line"></div>
                  </div>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="user" id="username" name="username" type="text" class="form-control" />
          <label class="form-label" for="username">Username</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="password" name="password" type="text"class="form-control" />
          <label class="form-label" for="password">Password</label>
        </div>

        <!-- 2 column grid layout -->
        <div class="row mb-4">
          <div class="col-md-6 d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check mb-3 mb-md-0">
              <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
              <label class="form-check-label" for="loginCheck"> Remember me </label>
            </div>
          </div>

          <div class="col-md-6 d-flex justify-content-center">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="{{ route('register.show') }}">Register</a></p>
      </div>
    </form>
  </div>
</div>
 
</div>
<!-- Pills content -->
@endsection