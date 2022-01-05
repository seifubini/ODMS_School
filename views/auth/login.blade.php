@extends('auth.header')

@section('content')
<br>
<br>
@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Username or Password is Incorrect! <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="login-box">
  <div class="login-logo">
    <h2>Online Donation Management System </h2>
  </div>
   @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" type="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input id="remember_me" type="checkbox" class="form-checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a class="underline text-sm text-gray-600 hover:text-gray-900 pull-left" href="{{ route('password.request') }}">Forgot your password?</a><br>
    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline text-center">Register</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
