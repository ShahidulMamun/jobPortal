<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employer Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --navy-900: #0f1b2d;
      --navy-800: #16273f;
      --navy-700: #1e3354;
      --navy-600: #2c4a73;
      --accent: #4d8dff;
      --accent-2: #6ee7c9;
      --text-muted: #7c8aa0;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      min-height: 100vh;
      font-family: 'Inter', sans-serif;
      background: var(--navy-900);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .auth-wrapper {
      width: 100%;
      max-width: 960px;
      background: #101d31;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 30px 60px rgba(0,0,0,0.45);
      display: grid;
      grid-template-columns: 1fr 1fr;
      min-height: 560px;
    }

    /* LEFT BRAND PANEL */
    .brand-panel {
      position: relative;
      background: linear-gradient(160deg, var(--navy-800), var(--navy-700) 55%, var(--navy-600));
      padding: 48px 40px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      color: #fff;
      overflow: hidden;
    }

    .brand-panel::before {
      content: "";
      position: absolute;
      width: 320px;
      height: 320px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(77,141,255,0.35), transparent 70%);
      top: -100px;
      right: -100px;
    }

    .brand-panel::after {
      content: "";
      position: absolute;
      width: 260px;
      height: 260px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(110,231,201,0.25), transparent 70%);
      bottom: -80px;
      left: -80px;
    }

    .brand-logo {
      display: flex;
      align-items: center;
      gap: 10px;
      font-family: 'Sora', sans-serif;
      font-weight: 700;
      font-size: 20px;
      position: relative;
      z-index: 1;
    }

    .brand-logo .icon-box {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--accent), var(--accent-2));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }

    .brand-copy {
      position: relative;
      z-index: 1;
    }

    .brand-copy h2 {
      font-family: 'Sora', sans-serif;
      font-weight: 700;
      font-size: 28px;
      line-height: 1.3;
      margin-bottom: 14px;
    }

    .brand-copy p {
      color: rgba(255,255,255,0.7);
      font-size: 14.5px;
      line-height: 1.6;
      max-width: 320px;
    }

    .brand-stats {
      display: flex;
      gap: 28px;
      position: relative;
      z-index: 1;
    }

    .brand-stats div strong {
      font-family: 'Sora', sans-serif;
      font-size: 20px;
      display: block;
    }

    .brand-stats div span {
      font-size: 12.5px;
      color: rgba(255,255,255,0.55);
    }

    /* RIGHT FORM PANEL */
    .form-panel {
      background: #ffffff;
      padding: 48px 44px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-panel h4 {
      font-family: 'Sora', sans-serif;
      font-weight: 700;
      font-size: 24px;
      color: var(--navy-900);
      margin-bottom: 6px;
    }

    .form-panel .subtitle {
      color: var(--text-muted);
      font-size: 14px;
      margin-bottom: 28px;
    }

    .form-label {
      font-size: 13.5px;
      font-weight: 600;
      color: var(--navy-800);
      margin-bottom: 6px;
    }

    .input-icon-group {
      position: relative;
      margin-bottom: 18px;
    }

    .input-icon-group i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      font-size: 17px;
    }

    .input-icon-group .form-control {
      padding: 12px 14px 12px 42px;
      border-radius: 10px;
      border: 1.5px solid #e6e9ef;
      font-size: 14.5px;
      background: #f9fafb;
      transition: all .2s ease;
    }

    .input-icon-group .form-control:focus {
      border-color: var(--accent);
      background: #fff;
      box-shadow: 0 0 0 4px rgba(77,141,255,0.12);
    }

    .toggle-eye {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: var(--text-muted);
      font-size: 17px;
      background: none;
      border: none;
    }

    .form-extra {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin-bottom: 22px;
    }

    .form-extra a {
      color: var(--accent);
      text-decoration: none;
      font-weight: 500;
    }

    .form-check-label {
      color: var(--text-muted);
      font-size: 13px;
    }

    .btn-login {
      background: linear-gradient(135deg, var(--accent), #3a6fe0);
      border: none;
      border-radius: 10px;
      padding: 12px;
      font-weight: 600;
      font-size: 15px;
      color: #fff;
      transition: transform .15s ease, box-shadow .15s ease;
    }

    .btn-login:hover {
      transform: translateY(-1px);
      box-shadow: 0 10px 20px rgba(77,141,255,0.3);
      color: #fff;
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      color: var(--text-muted);
      font-size: 12.5px;
      margin: 22px 0;
    }

    .divider::before, .divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background: #e6e9ef;
    }

    .register-cta {
      text-align: center;
      font-size: 14px;
      color: var(--text-muted);
    }

    .register-cta a {
      color: var(--navy-800);
      font-weight: 600;
      text-decoration: none;
    }

    .alert-modern {
      border-radius: 10px;
      font-size: 13.5px;
      border: none;
      background: #fdeeee;
      color: #c0392b;
      padding: 10px 14px;
      margin-bottom: 20px;
    }

    /* MOBILE RESPONSIVE */
    @media (max-width: 860px) {
      .auth-wrapper {
        grid-template-columns: 1fr;
        min-height: auto;
      }

      .brand-panel {
        padding: 32px 28px;
        min-height: 200px;
      }

      .brand-copy h2 { font-size: 22px; }
      .brand-copy p { display: none; }
      .brand-stats { display: none; }

      .form-panel {
        padding: 34px 26px 40px;
      }
    }

    @media (max-width: 420px) {
      .auth-wrapper { border-radius: 16px; }
      .form-panel { padding: 28px 20px 34px; }
      .brand-panel { padding: 26px 22px; }
    }
  </style>
</head>
<body>

<div class="auth-wrapper">

  <!-- LEFT BRAND PANEL -->
  <div class="brand-panel">
    <div class="brand-logo">
      <div class="icon-box"><i class="ti ti-briefcase"></i></div>
      OnetaskMarket
    </div>

    <div class="brand-copy">
      <h2>Hire faster. Manage smarter.</h2>
      <p>Post jobs, review submissions, and manage your workforce — all in one powerful employer dashboard.</p>
    </div>

    <div class="brand-stats">
      <div>
        <strong>10K+</strong>
        <span>Active Workers</span>
      </div>
      <div>
        <strong>2.5K+</strong>
        <span>Jobs Posted</span>
      </div>
      <div>
        <strong>98%</strong>
        <span>Satisfaction</span>
      </div>
    </div>
  </div>

  <!-- RIGHT FORM PANEL -->
  <div class="form-panel">
    <h4>Employer Login</h4>
    <p class="subtitle">Welcome back! Please enter your details.</p>

    @if (session('error'))
      <div class="alert-modern">
        <i class="ti ti-alert-circle me-1"></i> {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <label class="form-label">Email address</label>
      <div class="input-icon-group">
        <i class="ti ti-mail"></i>
        <input type="email" name="email" class="form-control" placeholder="you@company.com"
               value="{{ old('email') }}" required>
      </div>

      <label class="form-label">Password</label>
      <div class="input-icon-group">
        <i class="ti ti-lock"></i>
        <input type="password" name="password" id="passwordField" class="form-control"
               placeholder="••••••••" required>
        <button type="button" class="toggle-eye" onclick="togglePassword()">
          <i class="ti ti-eye" id="eyeIcon"></i>
        </button>
      </div>

      <div class="form-extra">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <a href="{{ route('password.request') }}">Forgot password?</a>
      </div>

      <button type="submit" class="btn btn-login w-100">Login to Dashboard</button>
    </form>

    <div class="divider">or</div>

    <p class="register-cta">
      Don't have an account? <a href="{{ route('register') }}">Register now</a>
    </p>
  </div>

</div>

<script>
  function togglePassword() {
    const field = document.getElementById('passwordField');
    const icon = document.getElementById('eyeIcon');
    if (field.type === 'password') {
      field.type = 'text';
      icon.classList.remove('ti-eye');
      icon.classList.add('ti-eye-off');
    } else {
      field.type = 'password';
      icon.classList.remove('ti-eye-off');
      icon.classList.add('ti-eye');
    }
  }
</script>

</body>
</html>