<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employer Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 420px;
      margin: 60px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .login-container h4 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .btn-primary {
      border-radius: 8px;
    }

    .form-control {
      border-radius: 8px;
    }

    .logo {
      display: block;
      margin: 0 auto 10px;
      width: 60px;
    }

    .text-muted {
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <img src="https://img.icons8.com/ios-filled/100/conference-background-selected.png" class="logo" alt="Employer">
  <h4>Employer Login</h4>

  @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <form method="POST" action="{{ route('employer.login') }}">
    @csrf

    <div class="mb-3">
      <label>Email address</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>

  <p class="text-center text-muted mt-3">
    Don't have an account?
    <a href="{{ route('register') }}">Register</a>
  </p>
</div>

</body>
</html>
