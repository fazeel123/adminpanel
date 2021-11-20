@extends('app')

@section('content')

<body class="hold-transition register-page">
    <div class="register-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="{{ route('index') }}" class="h1"><b>Admin</b>Register</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Register as new user</p>

        @if (count($errors) > 0)
            <div class="alert alert-warning">
                @foreach ($errors as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

          <form action="{{ route('post.register') }}" method="post">

            @csrf

            <div class="input-group mb-3">
              <input type="text" class="form-control" name="name" placeholder="Full name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            {{-- <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Retype password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div> --}}
            <div class="row">
              <div class="col-4">
                <a href="{{ route('index') }}" type="submit" class="btn btn-danger btn-block">Back</a>
                {{-- <div class="icheck-primary">
                  <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                  <label for="agreeTerms">
                   I agree to the <a href="#">terms</a>
                  </label>
                </div> --}}
              </div>
              <!-- /.col -->
              <div class="col-8">
                <input type="submit" class="btn btn-primary btn-block" value="Register">
              </div>
              <!-- /.col -->
            </div>
          </form>

          {{-- <div class="social-auth-links text-center">
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i>
              Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i>
              Sign up using Google+
            </a>
          </div> --}}

          {{-- <a href="login.html" class="text-center">I already have a membership</a> --}}
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

@endsection
