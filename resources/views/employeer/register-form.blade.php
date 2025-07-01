<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employer Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f7fa;
    }

    .register-container {
      max-width: 500px;
      margin: 60px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-primary {
      width: 100%;
      border-radius: 8px;
    }

    .title {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 600;
      color: #333;
    }
  </style>
</head>
<body>

<div class="register-container">
  <h4 class="title">Employer Registration</h4>

  @if (session('message'))
    <div class="alert alert-danger">{{ session('message') }}</div>
  @endif

  <form method="POST" action="{{ route('employeer.register.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="company" class="form-label">Company Name</label>
      <input type="text" name="company_name" id="company" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirm Password</label>
      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>

    <div class="mt-3 text-center">
      Already have an account? <a href="{{ route('employeer.login') }}">Login</a>
    </div>
  </form>
</div>

</body>
</html>
