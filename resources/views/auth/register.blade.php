<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | LivejobsBD</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700;9..144,800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
@vite('resources/css/app.css')

<style>
  :root {
    --ink: #0a1730;
    --ink-2: #101f3d;
    --slate: #17284a;
    --cobalt: #3d5aff;
    --gold: #f0ac2f;
    --gold-soft: #fbe3ae;
    --mint: #23d9a6;
    --paper: #f8f5ef;
    --paper-2: #f1ece1;
    --ink-text: #1a2338;
    --muted: #6f7891;
    --muted-on-dark: rgba(232,234,244,0.58);
    --hairline: #e7e1d2;
  }

  * { box-sizing: border-box; }

  body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    color: var(--ink-text);
    background: var(--paper);
    -webkit-font-smoothing: antialiased;
  }

  h1, h2, h3, .logo { font-family: 'Fraunces', serif; }
  .container { max-width: 1180px; margin: 0 auto; padding: 0 24px; }
  a { text-decoration: none; }

  .brand-bar { height: 4px; background: linear-gradient(90deg, var(--cobalt) 0%, var(--gold) 50%, var(--mint) 100%); }

  .btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 13px 26px; border-radius: 999px;
    font-weight: 600; font-size: 14px; cursor: pointer; border: none;
    font-family: 'Inter', sans-serif;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
  }
  .btn-gold { background: var(--gold); color: var(--ink); }
  .btn-gold:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(240,172,47,0.35); color: var(--ink); }
  .btn-outline { background: transparent; border: 1.5px solid rgba(255,255,255,0.28); color: #fff; }
  .btn-outline:hover { background: rgba(255,255,255,0.1); transform: translateY(-2px); }
  .btn-ghost-white { background: #fff; color: var(--ink); }
  .btn-ghost-white:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(0,0,0,0.25); }

  header {
    position: sticky; top: 0; z-index: 100;
    background: rgba(10, 23, 48, 0.94);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255,255,255,0.07);
  }
  nav { display: flex; align-items: center; justify-content: space-between; padding: 16px 0; }
  .logo { display: flex; align-items: center; gap: 10px; font-weight: 700; font-size: 21px; color: #fff; }
  .logo i {
    width: 36px; height: 36px; border-radius: 9px;
    background: linear-gradient(150deg, var(--gold), #e08d1f);
    color: var(--ink);
    display: flex; align-items: center; justify-content: center; font-size: 16px;
  }
  .nav-links { list-style: none; display: flex; align-items: center; gap: 28px; margin: 0; padding: 0; }
  .nav-links a:not(.btn) { color: var(--muted-on-dark); font-size: 14px; font-weight: 500; transition: color .2s ease; }
  .nav-links a:not(.btn):hover { color: #fff; }
  .menu-toggle { display: none; color: #fff; font-size: 21px; cursor: pointer; }

  /* ===== REGISTER SECTION ===== */
  .register-hero {
    position: relative;
    background: radial-gradient(ellipse 900px 500px at 50% -10%, #1a2f57, var(--ink) 65%);
    padding: 90px 0 110px;
    overflow: hidden;
  }
  .register-hero::before {
    content: "";
    position: absolute; inset: 0;
    background-image: repeating-linear-gradient(115deg, rgba(255,255,255,0.025) 0px, rgba(255,255,255,0.025) 1px, transparent 1px, transparent 64px);
    pointer-events: none;
  }

  .register-heading { position: relative; z-index: 1; text-align: center; max-width: 560px; margin: 0 auto 54px; }
  .register-heading .eyebrow {
    font-family: 'JetBrains Mono', monospace; font-size: 11.5px; font-weight: 600;
    letter-spacing: 0.14em; text-transform: uppercase; color: var(--gold);
    display: inline-flex; align-items: center; gap: 10px; margin-bottom: 18px;
  }
  .register-heading .eyebrow .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--mint); box-shadow: 0 0 0 4px rgba(35,217,166,0.18); }
  .register-heading h1 { font-size: 38px; font-weight: 700; color: #fff; margin: 0 0 12px; }
  .register-heading p { color: var(--muted-on-dark); font-size: 15.5px; margin: 0; }

  .user-type-container {
    position: relative; z-index: 1;
    display: grid; grid-template-columns: 1fr 1fr; gap: 22px;
    max-width: 720px; margin: 0 auto;
  }

  .role-card {
    background: linear-gradient(160deg, #16273f, #1b2f4d);
    border: 1.5px solid rgba(255,255,255,0.07);
    border-radius: 18px;
    padding: 40px 28px;
    cursor: pointer;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
  }
  .role-card:hover { transform: translateY(-6px); border-color: rgba(240,172,47,0.4); box-shadow: 0 20px 40px rgba(0,0,0,0.35); }
  .role-card::before {
    content: ""; position: absolute; width: 200px; height: 200px; border-radius: 50%;
    top: -80px; right: -80px;
    background: radial-gradient(circle, rgba(240,172,47,0.14), transparent 70%);
    transition: transform .3s ease;
  }
  .role-card:hover::before { transform: scale(1.3); }

  .role-card img { width: 60px; height: 60px; position: relative; z-index: 1; margin-bottom: 18px; }
  .role-card h3 { font-size: 19px; font-weight: 700; color: #fff; margin: 0 0 8px; position: relative; z-index: 1; }
  .role-card p { color: var(--muted-on-dark); font-size: 13.5px; margin: 0; position: relative; z-index: 1; }

  /* ===== MODAL ===== */
  .modal {
    display: none;
    position: fixed; inset: 0; z-index: 999;
    background: rgba(10, 17, 33, 0.65);
    backdrop-filter: blur(6px);
    align-items: center; justify-content: center;
    padding: 20px;
  }

  .modal-content {
    background: #fff;
    border-radius: 20px;
    width: 100%; max-width: 460px;
    max-height: 90vh;
    overflow-y: auto;
    padding: 36px 34px;
    position: relative;
    box-shadow: 0 40px 80px rgba(0,0,0,0.4);
    animation: modalPop .25s ease;
  }

  @keyframes modalPop { from { opacity: 0; transform: translateY(14px) scale(.98); } to { opacity: 1; transform: translateY(0) scale(1); } }

  .close {
    position: absolute; top: 20px; right: 22px;
    width: 30px; height: 30px; border-radius: 50%;
    background: var(--paper-2);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; font-size: 13px; color: var(--muted);
    transition: background .2s ease, color .2s ease;
  }
  .close:hover { background: var(--ink); color: #fff; }

  #modalTitle { font-size: 22px; font-weight: 700; color: var(--ink); margin: 0 0 26px; padding-right: 30px; }

  .form-group { margin-bottom: 17px; }
  .form-group label {
    display: block; font-size: 13px; font-weight: 600;
    color: var(--ink); margin-bottom: 6px;
  }

  .input-wrap { position: relative; }
  .input-wrap i {
    position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
    color: var(--muted); font-size: 15px;
  }

  .form-group input, .form-group select {
    width: 100%;
    padding: 12px 14px 12px 40px;
    border-radius: 10px;
    border: 1.5px solid #e6e2d5;
    font-size: 14px;
    font-family: 'Inter', sans-serif;
    background: var(--paper);
    transition: all .2s ease;
  }
  .form-group input:focus, .form-group select:focus {
    outline: none; border-color: var(--cobalt); background: #fff;
    box-shadow: 0 0 0 4px rgba(61,90,255,0.1);
  }

  .toggle-eye {
    position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
    cursor: pointer; color: var(--muted); font-size: 15px; background: none; border: none;
  }

  .field-error { color: #c0392b; font-size: 12px; margin-top: 5px; }

  /* captcha block */
  .captcha-box {
    display: flex; align-items: center; gap: 12px;
    background: var(--paper-2);
    border: 1.5px dashed #ddd6c4;
    border-radius: 12px;
    padding: 12px 14px;
    margin-bottom: 17px;
  }
  .captcha-question {
    font-family: 'JetBrains Mono', monospace;
    font-weight: 600; font-size: 16px; color: var(--ink);
    white-space: nowrap;
  }
  .captcha-box input {
    flex: 1; padding: 10px 12px; border-radius: 9px;
    border: 1.5px solid #e6e2d5; background: #fff; font-size: 14px;
    font-family: 'JetBrains Mono', monospace; text-align: center;
  }
  .captcha-box input:focus { outline: none; border-color: var(--cobalt); box-shadow: 0 0 0 4px rgba(61,90,255,0.1); }
  .captcha-refresh {
    width: 38px; height: 38px; border-radius: 9px;
    background: #fff; border: 1.5px solid #e6e2d5;
    display: flex; align-items: center; justify-content: center;
    color: var(--muted); cursor: pointer; flex-shrink: 0;
    transition: background .2s ease, color .2s ease, transform .2s ease;
  }
  .captcha-refresh:hover { background: var(--ink); color: #fff; transform: rotate(45deg); }

  .btn-submit {
    width: 100%;
    background: linear-gradient(160deg, #16273f, #1b2f4d);
    color: #fff;
    border: none; border-radius: 10px;
    padding: 13px; font-weight: 600; font-size: 15px;
    cursor: pointer; margin-top: 6px;
    transition: transform .18s ease, box-shadow .18s ease;
  }
  .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(10,23,48,0.3); }

  .modal-note {
    text-align: center; font-size: 12.5px; color: var(--muted);
    margin-top: 16px;
  }

  /* ===== CTA ===== */
  .cta { position: relative; background: var(--ink); text-align: center; padding: 90px 0; overflow: hidden; }
  .cta::before {
    content: ""; position: absolute;
    width: 480px; height: 480px; border-radius: 50%;
    background: radial-gradient(circle, rgba(240,172,47,0.16), transparent 70%);
    top: -180px; left: 50%; transform: translateX(-50%);
  }
  .cta > .container { position: relative; z-index: 1; }
  .cta h2 { color: #fff; font-size: 32px; font-weight: 600; margin-bottom: 12px; }
  .cta p { color: var(--muted-on-dark); font-size: 15.5px; margin-bottom: 30px; }
  .cta-buttons { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; }

  /* ===== FOOTER ===== */
  footer { background: var(--ink); padding: 50px 0 0; border-top: 1px solid rgba(255,255,255,0.07); }
  .footer-content { display: grid; grid-template-columns: 1.6fr 1fr 1fr 1fr; gap: 32px; padding-bottom: 40px; }
  .footer-section h3 { color: #fff; font-size: 16px; margin-bottom: 16px; display: flex; align-items: center; gap: 8px; font-weight: 600; }
  .footer-section p { color: var(--muted-on-dark); font-size: 13.5px; line-height: 1.7; }
  .footer-section ul { list-style: none; padding: 0; margin: 0; }
  .footer-section ul li { margin-bottom: 10px; }
  .footer-section ul a { color: var(--muted-on-dark); font-size: 13.5px; transition: color .2s ease; }
  .footer-section ul a:hover { color: var(--gold); }
  .social-links { display: flex; gap: 10px; margin-top: 18px; }
  .social-links a {
    width: 34px; height: 34px; border-radius: 9px;
    background: rgba(255,255,255,0.06); color: #fff;
    display: flex; align-items: center; justify-content: center;
    transition: background .2s ease, transform .2s ease;
  }
  .social-links a:hover { background: var(--gold); color: var(--ink); transform: translateY(-2px); }
  .footer-bottom { border-top: 1px solid rgba(255,255,255,0.08); padding: 20px 0; text-align: center; }
  .footer-bottom p { color: rgba(255,255,255,0.35); font-size: 12.5px; margin: 0; }

  /* ===== MOBILE ===== */
  @media (max-width: 720px) {
    .nav-links {
      position: fixed; top: 68px; left: 0; right: 0;
      background: rgba(10, 23, 48, 0.98);
      backdrop-filter: blur(10px);
      flex-direction: column; align-items: flex-start; gap: 0;
      padding: 8px 24px 20px;
      transform: translateY(-12px); opacity: 0; pointer-events: none;
      transition: all .25s ease;
    }
    .nav-links.active { transform: translateY(0); opacity: 1; pointer-events: auto; }
    .nav-links li { width: 100%; padding: 12px 0; border-bottom: 1px solid rgba(255,255,255,0.06); }
    .nav-links li:last-child, .nav-links li:nth-last-child(2) { border-bottom: none; padding: 12px 0 6px; }
    .nav-links a.btn { width: 100%; justify-content: center; }
    .menu-toggle { display: block; }

    .register-hero { padding: 50px 0 70px; }
    .register-heading h1 { font-size: 27px; }
    .user-type-container { grid-template-columns: 1fr; gap: 16px; }
    .role-card { padding: 30px 22px; }

    .modal-content { padding: 28px 22px; border-radius: 16px; }
    .captcha-box { flex-wrap: wrap; }

    .footer-content { grid-template-columns: 1fr; gap: 28px; text-align: left; }
    .cta h2 { font-size: 25px; }
    .cta-buttons { flex-direction: column; align-items: stretch; }
  }
</style>
</head>
<body>

<div class="brand-bar"></div>

<!-- Header -->
<header>
<div class="container">
<nav>
<div class="logo"><i class="fas fa-briefcase"></i> LivejobsBD</div>
<ul class="nav-links" id="navLinks">
<li><a href="#home">Home</a></li>
<li><a href="#jobs">Find Jobs</a></li>
<li><a href="#companies">Companies</a></li>
<li><a href="#candidates">Candidates</a></li>
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="{{route('login')}}" class="btn btn-outline">Login</a></li>
<li><a href="{{route('register')}}" class="btn btn-gold">Post a Job</a></li>
</ul>
<div class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></div>
</nav>
</div>
</header>

<!-- Register Section -->
<section class="register-hero">
<div class="container">

<div class="register-heading">
<div class="eyebrow"><span class="dot"></span>Join LivejobsBD</div>
<h1>Create your account</h1>
<p>Choose how you want to use LivejobsBD to get started in under a minute.</p>
</div>

<!-- User Type Selection -->
<div class="user-type-container">
<div class="role-card" onclick="openModal('employer')">
<img src="https://img.icons8.com/fluency/96/company.png" alt="Employer">
<h3>Employer</h3>
<p>Post jobs & hire top talent</p>
</div>

<div class="role-card" onclick="openModal('candidate')">
<img src="https://img.icons8.com/fluency/96/users.png" alt="Candidate">
<h3>Candidate</h3>
<p>Find jobs & grow your career</p>
</div>
</div>

<!-- Modal -->
<div class="modal" id="registerModal">
<div class="modal-content">
<div class="close" onclick="closeModal()"><i class="fas fa-times"></i></div>
<h2 id="modalTitle"></h2>

<form method="POST" id="registerForm">
@csrf
<input type="hidden" name="user_type" id="userType">

<div class="form-group">
<label>Full Name</label>
<div class="input-wrap">
<i class="fas fa-user"></i>
<input id="name" type="text" name="name" value="{{ old('name') }}" autofocus autocomplete="name">
</div>
@error('name')
<div class="field-error">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<label>Email Address</label>
<div class="input-wrap">
<i class="fas fa-envelope"></i>
<input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username">
</div>
@error('email')
<div class="field-error">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<label>Password</label>
<div class="input-wrap">
<i class="fas fa-lock"></i>
<input id="password" type="password" name="password" autocomplete="new-password">
<button type="button" class="toggle-eye" onclick="togglePassword('password','eye1')"><i class="fas fa-eye" id="eye1"></i></button>
</div>
@error('password')
<div class="field-error">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<label>Confirm Password</label>
<div class="input-wrap">
<i class="fas fa-lock"></i>
<input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password">
<button type="button" class="toggle-eye" onclick="togglePassword('password_confirmation','eye2')"><i class="fas fa-eye" id="eye2"></i></button>
</div>
@error('password_confirmation')
<div class="field-error">{{ $message }}</div>
@enderror
</div>

<!-- Employer -->
<div id="employerFields" style="display:none;">
<div class="form-group">
<label>Company Name</label>
<div class="input-wrap">
<i class="fas fa-building"></i>
<input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}" autocomplete="organization">
</div>
@error('company_name')
<div class="field-error">{{ $message }}</div>
@enderror
</div>
</div>

<!-- Math Captcha (backend session-based) -->
<div class="form-group">
<label>Security Check</label>
<div class="captcha-box">
<span class="captcha-question">{{ $captchaNum1 ?? 4 }} + {{ $captchaNum2 ?? 7 }} =</span>
<input type="text" name="captcha_answer" inputmode="numeric" placeholder="?" required>
<div class="captcha-refresh" onclick="window.location.reload()" title="Refresh question">
<i class="fas fa-rotate"></i>
</div>
</div>
@error('captcha_answer')
<div class="field-error">{{ $message }}</div>
@enderror
</div>

<button type="submit" class="btn-submit">Create Account</button>
</form>

<p class="modal-note">By registering, you agree to our Terms & Conditions and Privacy Policy.</p>

</div>
</div>

</div>
</section>

<!-- CTA Section -->
<section class="cta">
<div class="container">
<h2>Ready to Take the Next Step?</h2>
<p>Join thousands of professionals finding their dream jobs</p>
<div class="cta-buttons">
<a href="{{route('register')}}" class="btn btn-ghost-white">Create Free Account</a>
<a href="#" class="btn btn-outline">Upload Your CV</a>
</div>
</div>
</section>

<!-- Footer -->
<footer>
<div class="container">
<div class="footer-content">
<div class="footer-section"><h3><i class="fas fa-briefcase" style="color:var(--gold);"></i> LivejobsBD</h3>
<p>Your trusted partner in finding the perfect career opportunity. Connect with top employers and discover your dream job.</p>
<div class="social-links"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fab fa-instagram"></i></a></div>
</div>
<div class="footer-section"><h3>For Candidates</h3><ul><li><a href="#">Browse Jobs</a></li><li><a href="#">Browse Categories</a></li><li><a href="#">Candidate Dashboard</a></li><li><a href="#">Job Alerts</a></li><li><a href="#">My Bookmarks</a></li></ul></div>
<div class="footer-section"><h3>For Employers</h3><ul><li><a href="#">Post a Job</a></li><li><a href="#">Browse Candidates</a></li><li><a href="#">Employer Dashboard</a></li><li><a href="#">Applications</a></li><li><a href="#">Pricing Plans</a></li></ul></div>
<div class="footer-section"><h3>Quick Links</h3><ul><li><a href="#">About Us</a></li><li><a href="#">Contact Us</a></li><li><a href="#">Career Advice</a></li><li><a href="#">FAQs</a></li><li><a href="#">Terms & Conditions</a></li><li><a href="#">Privacy Policy</a></li></ul></div>
</div>
<div class="footer-bottom"><p>&copy; 2026 LivejobsBD. All rights reserved. Designed with <i class="fas fa-heart" style="color:#e05c5c;"></i> for job seekers worldwide.</p></div>
</div>
</footer>

@include('partials.toast')

<script>
function openModal(type) {
    document.getElementById('registerModal').style.display = 'flex';

    let form = document.getElementById('registerForm');

    if (type === 'employer') {
        form.action = "{{ route('employer.register.store') }}";
        document.getElementById('modalTitle').innerText = 'Employer Registration';
        document.getElementById('employerFields').style.display = 'block';
        document.getElementById('userType').value = 'employer';
    } else {
        form.action = "{{ route('register') }}";
        document.getElementById('modalTitle').innerText = 'Candidate Registration';
        document.getElementById('employerFields').style.display = 'none';
        document.getElementById('userType').value = 'candidate';
    }
}

function closeModal() {
    document.getElementById('registerModal').style.display = 'none';
}

function togglePassword(fieldId, iconId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(iconId);
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Mobile menu
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');
menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    const icon = menuToggle.querySelector('i');
    icon.classList.toggle('fa-bars');
    icon.classList.toggle('fa-times');
});

@if ($errors->any())
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('registerModal').style.display = 'flex';
});
@endif
</script>

</body>
</html>