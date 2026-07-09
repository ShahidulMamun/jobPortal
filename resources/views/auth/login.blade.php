<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LivejobsBD | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --navy-900: #0c1826;
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
      background: radial-gradient(circle at 20% 20%, #14243b, var(--navy-900) 60%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
      overflow-x: hidden;
    }

    .stage {
      width: 100%;
      max-width: 1000px;
      position: relative;
    }

    /* Shared header */
    .stage-header {
      text-align: center;
      margin-bottom: 34px;
    }

    .stage-header .brand {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-family: 'Sora', sans-serif;
      font-weight: 700;
      font-size: 22px;
      color: #fff;
      margin-bottom: 10px;
    }

    .stage-header .brand .icon-box {
      width: 40px;
      height: 40px;
      border-radius: 11px;
      background: linear-gradient(135deg, var(--accent), var(--accent-2));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 19px;
    }

    .stage-header p {
      color: rgba(255,255,255,0.55);
      font-size: 14.5px;
      margin: 0;
    }

    /* ===== VIEW 1: ROLE SELECT ===== */
    #roleSelect {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 22px;
      transition: opacity .35s ease, transform .35s ease;
    }

    .role-card {
      background: linear-gradient(160deg, #16273f, #1b2f4d);
      border: 1.5px solid rgba(255,255,255,0.06);
      border-radius: 18px;
      padding: 36px 28px;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
      text-align: center;
    }

    .role-card:hover {
      transform: translateY(-6px);
      border-color: rgba(77,141,255,0.4);
      box-shadow: 0 20px 40px rgba(0,0,0,0.35);
    }

    .role-card::before {
      content: "";
      position: absolute;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      top: -80px;
      right: -80px;
      background: radial-gradient(circle, rgba(77,141,255,0.18), transparent 70%);
      transition: transform .3s ease;
    }

    .role-card:hover::before { transform: scale(1.3); }

    .role-card .role-icon {
      width: 68px;
      height: 68px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 30px;
      margin: 0 auto 20px;
      position: relative;
      z-index: 1;
    }

    .role-card.candidate .role-icon {
      background: linear-gradient(135deg, var(--accent-2), #35b891);
      color: #0c1826;
    }

    .role-card.employer .role-icon {
      background: linear-gradient(135deg, var(--accent), #3a6fe0);
      color: #fff;
    }

    .role-card h5 {
      font-family: 'Sora', sans-serif;
      font-weight: 700;
      color: #fff;
      font-size: 18px;
      margin-bottom: 8px;
      position: relative;
      z-index: 1;
    }

    .role-card p {
      color: var(--text-muted);
      font-size: 13.5px;
      line-height: 1.5;
      margin-bottom: 18px;
      position: relative;
      z-index: 1;
    }

    .role-card .go-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: var(--accent-2);
      font-size: 13.5px;
      font-weight: 600;
      position: relative;
      z-index: 1;
    }

    .role-card.employer .go-link { color: var(--accent); }

    /* ===== VIEW 2: LOGIN FORM ===== */
    #loginForms {
      display: none;
      justify-content: center;
    }

    .form-card {
      display: none;
      background: #ffffff;
      border-radius: 20px;
      padding: 44px 40px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 30px 60px rgba(0,0,0,0.35);
      animation: fadeSlideUp .4s ease;
    }

    @keyframes fadeSlideUp {
      from { opacity: 0; transform: translateY(16px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-card.active { display: block; }

    .back-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: var(--text-muted);
      font-size: 13.5px;
      font-weight: 500;
      background: none;
      border: none;
      padding: 0;
      margin-bottom: 18px;
      cursor: pointer;
    }

    .back-btn:hover { color: var(--navy-800); }

    .form-card-head {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 26px;
    }

    .form-card-head .role-icon-sm {
      width: 42px;
      height: 42px;
      border-radius: 11px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 19px;
    }

    #candidateForm .role-icon-sm {
      background: linear-gradient(135deg, var(--accent-2), #35b891);
      color: #0c1826;
    }

    #employerForm .role-icon-sm {
      background: linear-gradient(135deg, var(--accent), #3a6fe0);
      color: #fff;
    }

    .form-card-head h4 {
      font-family: 'Sora', sans-serif;
      font-weight: 700;
      font-size: 20px;
      color: var(--navy-900);
      margin: 0;
    }

    .form-card-head span {
      font-size: 12.5px;
      color: var(--text-muted);
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

    .input-icon-group i.field-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      font-size: 17px;
    }

    .input-icon-group .form-control {
      padding: 12px 42px 12px 42px;
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

    .form-extra a { color: var(--accent); text-decoration: none; font-weight: 500; }
    .form-check-label { color: var(--text-muted); font-size: 13px; }

    .btn-login {
      border: none;
      border-radius: 10px;
      padding: 12px;
      font-weight: 600;
      font-size: 15px;
      color: #fff;
      width: 100%;
      transition: transform .15s ease, box-shadow .15s ease;
    }

    #candidateForm .btn-login {
      background: linear-gradient(160deg, #16273f, #1b2f4d);
      color: #ffffff;
    }

    #employerForm .btn-login {
      background: linear-gradient(160deg, #16273f, #1b2f4d);
      color: #ffffff;
    }

    .btn-login:hover { transform: translateY(-1px); box-shadow: 0 10px 20px rgba(0,0,0,0.18); }

    .register-cta {
      text-align: center;
      font-size: 14px;
      color: var(--text-muted);
      margin-top: 20px;
    }

    .register-cta a { color: var(--navy-800); font-weight: 600; text-decoration: none; }

    .alert-modern {
      border-radius: 10px;
      font-size: 13.5px;
      border: none;
      background: #fdeeee;
      color: #c0392b;
      padding: 10px 14px;
      margin-bottom: 20px;
    }

    /* MOBILE */
    @media (max-width: 720px) {
      body {
        align-items: flex-start;
        padding: 14px 16px;
      }

      .stage-header {
        margin-bottom: 18px;
      }

      .stage-header .brand {
        font-size: 19px;
        margin-bottom: 4px;
      }

      .stage-header .brand .icon-box {
        width: 34px;
        height: 34px;
        font-size: 16px;
      }

      .stage-header p {
        font-size: 13px;
      }

      #roleSelect { grid-template-columns: 1fr; gap: 16px; }
      .role-card { padding: 26px 22px; }
      .form-card { padding: 28px 22px; border-radius: 16px; }
    }
  </style>
</head>
<body>

<div class="stage">

  <div class="stage-header">
    <div class="brand">
      <div class="icon-box"><i class="ti ti-bolt"></i></div>
      LivejobsBD
    </div>
    <p id="headerSubtitle">Choose how you want to sign in</p>
  </div>

  <!-- VIEW 1: ROLE SELECTION -->
  <div id="roleSelect">
    <div class="role-card candidate" onclick="showForm('candidate')">
      <div class="role-icon"><i class="ti ti-user-search"></i></div>
      <h5>Candidate Login</h5>
      <p>Find microtasks, submit work, and get paid — track everything from your dashboard.</p>
      <span class="go-link">Continue as Candidate <i class="ti ti-arrow-right"></i></span>
    </div>

    <div class="role-card employer" onclick="showForm('employer')">
      <div class="role-icon"><i class="ti ti-briefcase"></i></div>
      <h5>Employer Login</h5>
      <p>Post jobs, review submissions, and manage your workforce with ease.</p>
      <span class="go-link">Continue as Employer <i class="ti ti-arrow-right"></i></span>
    </div>
  </div>

  <!-- VIEW 2: LOGIN FORMS -->
  <div id="loginForms">

    <!-- CANDIDATE LOGIN -->
    <div class="form-card" id="candidateForm">
      <button type="button" class="back-btn" onclick="showRoleSelect()">
        <i class="ti ti-arrow-left"></i> Back to role selection
      </button>

      <div class="form-card-head">
        <div class="role-icon-sm"><i class="ti ti-user-search"></i></div>
        <div>
          <h4>Candidate Login</h4>
          <span>Sign in to start earning</span>
        </div>
      </div>

      @if (session('candidate_error'))
        <div class="alert-modern"><i class="ti ti-alert-circle me-1"></i> {{ session('candidate_error') }}</div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <label class="form-label">Email address</label>
        <div class="input-icon-group">
          <i class="ti ti-mail field-icon"></i>
          <input type="email" name="email" class="form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
        </div>

        <label class="form-label">Password</label>
        <div class="input-icon-group">
          <i class="ti ti-lock field-icon"></i>
          <input type="password" name="password" id="candidatePassword" class="form-control" placeholder="••••••••" required>
          <button type="button" class="toggle-eye" onclick="togglePassword('candidatePassword','candidateEye')">
            <i class="ti ti-eye" id="candidateEye"></i>
          </button>
        </div>

        <div class="form-extra">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="rememberCandidate">
            <label class="form-check-label" for="rememberCandidate">Remember me</label>
          </div>
          <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>

        <button type="submit" class="btn-login">Login to Dashboard</button>
      </form>

      <p class="register-cta">
        Don't have an account? <a href="{{ route('register') }}">Register as Candidate</a>
      </p>
    </div>

    <!-- EMPLOYER LOGIN -->
    <div class="form-card" id="employerForm">
      <button type="button" class="back-btn" onclick="showRoleSelect()">
        <i class="ti ti-arrow-left"></i> Back to role selection
      </button>

      <div class="form-card-head">
        <div class="role-icon-sm"><i class="ti ti-briefcase"></i></div>
        <div>
          <h4>Employer Login</h4>
          <span>Manage jobs and your team</span>
        </div>
      </div>

      @if (session('employer_error'))
        <div class="alert-modern"><i class="ti ti-alert-circle me-1"></i> {{ session('employer_error') }}</div>
      @endif

      <form method="POST" action="{{ route('employer.login') }}">
        @csrf
        <label class="form-label">Email address</label>
        <div class="input-icon-group">
          <i class="ti ti-mail field-icon"></i>
          <input type="email" name="email" class="form-control" placeholder="you@company.com" value="{{ old('email') }}" required>
        </div>

        <label class="form-label">Password</label>
        <div class="input-icon-group">
          <i class="ti ti-lock field-icon"></i>
          <input type="password" name="password" id="employerPassword" class="form-control" placeholder="••••••••" required>
          <button type="button" class="toggle-eye" onclick="togglePassword('employerPassword','employerEye')">
            <i class="ti ti-eye" id="employerEye"></i>
          </button>
        </div>

        <div class="form-extra">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="rememberEmployer">
            <label class="form-check-label" for="rememberEmployer">Remember me</label>
          </div>
          <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>

        <button type="submit" class="btn-login">Login to Dashboard</button>
      </form>

      <p class="register-cta">
        Don't have an account? <a href="{{ route('register') }}">Register as Employer</a>
      </p>
    </div>

  </div>

</div>

<script>
  function showForm(role) {
    document.getElementById('roleSelect').style.display = 'none';
    document.getElementById('loginForms').style.display = 'flex';
    document.getElementById(role + 'Form').classList.add('active');
    document.getElementById('headerSubtitle').innerText =
      role === 'candidate' ? 'Sign in to your Candidate account' : 'Sign in to your Employer account';

    // Preselect the correct form if URL has ?role=candidate|employer
    history.replaceState(null, '', '?role=' + role);
  }

  function showRoleSelect() {
    document.querySelectorAll('.form-card').forEach(f => f.classList.remove('active'));
    document.getElementById('loginForms').style.display = 'none';
    document.getElementById('roleSelect').style.display = 'grid';
    document.getElementById('headerSubtitle').innerText = 'Choose how you want to sign in';
    history.replaceState(null, '', window.location.pathname);
  }

  function togglePassword(fieldId, iconId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(iconId);
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

  // Auto-open form based on ?role= param or server-side error redirect
  (function () {
    const params = new URLSearchParams(window.location.search);
    const role = params.get('role');
    const hasCandidateError = {{ session('candidate_error') ? 'true' : 'false' }};
    const hasEmployerError = {{ session('employer_error') ? 'true' : 'false' }};

    if (role === 'candidate' || hasCandidateError) showForm('candidate');
    else if (role === 'employer' || hasEmployerError) showForm('employer');
  })();
</script>

</body>
</html>