<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f1f2f7;
    }

    .login-container {
      max-width: 400px;
      margin: 60px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .login-container h3 {
      text-align: center;
      margin-bottom: 20px;
      color: #343a40;
    }

    .form-control {
      border-radius: 10px;
    }

    .btn-primary {
      border-radius: 10px;
      width: 100%;
    }

    .logo {
      display: block;
      margin: 0 auto 15px;
      width: 80px;
    }

    .text-muted {
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <img src="https://img.icons8.com/ios-filled/100/admin-settings-male.png" alt="Admin" class="logo">
  <h3>Admin Login</h3>

  {{-- AJAX Error Message --}}
  <div id="errorMsg" class="alert alert-danger d-none"></div>

  <form id="adminLoginForm">
    @csrf

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="email" required autofocus>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>

  <p class="text-center text-muted mt-3">© {{ date('Y') }} MyJobs Admin Panel</p>
</div>

{{-- Axios --}}
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  const form = document.getElementById('adminLoginForm');
  const errorMsg = document.getElementById('errorMsg');

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    errorMsg.classList.add('d-none');
    errorMsg.innerHTML = '';

    const formData = new FormData(form);

    axios.post("{{ route('admin.login') }}", formData)
      .then(res => {
        if (res.data.success) {
          window.location.href = res.data.redirect;
        }
      })
      .catch(err => {
        if (err.response && err.response.data) {
          errorMsg.classList.remove('d-none');
          errorMsg.innerHTML = err.response.data.message || 'Login failed';
        }
      });
  });
</script>

</body>
</html>
