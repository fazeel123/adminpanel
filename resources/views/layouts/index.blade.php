@extends('app')

@section('content')

<body class="hold-transition register-page">
    <div class="register-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="{{ route('index') }}" class="h1"><b>Admin</b>Panel</a>
        </div>
        <div class="card-body">
          <div class="text-center">
            <a href="{{ route('register') }}" class="btn btn-block btn-primary">
              Register
            </a>
            <a href="{{ route('login') }}" class="btn btn-block btn-success">
              Login
            </a>
          </div>

        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

@endsection
