@extends('app')

@section('content')
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 24rem;">
      <h4 class="text-center mb-4">Register</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('auth.register') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name"
            required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="mb-3">
          <label for="confirm-password" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="Confirm your password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
      </form>
      <div class="text-center mt-3">
        <p>Already have an account? <a href="{{ route('auth.loginForm') }}">Login</a></p>
      </div>
    </div>
  </div>
@endsection
