<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LivejobsBD - Find Your Dream Job</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700;9..144,800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

@vite('resources/css/app.css')
@vite('resources/js/app.js')

<style>
  :root {
    --ink: #0a1730;
    --ink-2: #101f3d;
    --slate: #17284a;
    --slate-2: #223764;
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

  h1, h2, h3, .logo-wordmark { font-family: 'Fraunces', serif; }

  .eyebrow {
    font-family: 'JetBrains Mono', monospace;
    font-size: 11.5px;
    font-weight: 600;
    letter-spacing: 0.14em;
    text-transform: uppercase;
  }

  .container { max-width: 1180px; margin: 0 auto; padding: 0 24px; }
  a { text-decoration: none; }
  ::selection { background: var(--gold); color: var(--ink); }

  .brand-bar {
    height: 4px;
    background: linear-gradient(90deg, var(--cobalt) 0%, var(--gold) 50%, var(--mint) 100%);
  }

  .btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 26px;
    border-radius: 999px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    border: none;
    font-family: 'Inter', sans-serif;
    transition: transform .2s cubic-bezier(.2,.8,.2,1), box-shadow .2s ease, background .2s ease, color .2s ease;
  }

  .btn-gold { background: var(--gold); color: #F8F5EF; }
  .btn-gold:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(240,172,47,0.35); color: #fff; }

  .btn-outline { background: transparent; border: 1.5px solid rgba(255,255,255,0.28); color: #fff; }
  .btn-outline:hover { background: rgba(255,255,255,0.1); transform: translateY(-2px); }

  .btn-outline-dark { background: transparent; border: 1.5px solid #d8d1bd; color: var(--ink); }
  .btn-outline-dark:hover { background: var(--ink); border-color: var(--ink); color: #fff; transform: translateY(-2px); }

  .btn-ghost-white { background: #fff; color: var(--ink); }
  .btn-ghost-white:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(0,0,0,0.25); }

  header {
    position: sticky; top: 0; z-index: 100;
    background: rgba(10, 23, 48, 0.94);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255,255,255,0.07);
  }

  nav { display: flex; align-items: center; justify-content: space-between; padding: 16px 0; }

  .logo-wordmark { display: flex; align-items: center; gap: 10px; font-weight: 700; font-size: 21px; color: #fff; }
  .logo-wordmark .mark {
    width: 36px; height: 36px; border-radius: 9px;
    background: linear-gradient(150deg, var(--gold), #e08d1f);
    color: var(--ink);
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; font-family: 'Inter', sans-serif;
  }

  .nav-links { list-style: none; display: flex; align-items: center; gap: 28px; margin: 0; padding: 0; }

   .nav-links a { color: #F8F5EF; font-size: 14px; font-weight: 500; transition: color .2s ease; }
  .nav-links a:hover { color: #122343; }
  .menu-toggle { display: none; color: #fff; font-size: 21px; cursor: pointer; }

  .hero {
    position: relative;
    background: radial-gradient(ellipse 900px 500px at 12% 0%, #1a2f57, var(--ink) 60%);
    padding: 96px 0 0;
    overflow: hidden;
  }

  .hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: repeating-linear-gradient(115deg, rgba(255,255,255,0.025) 0px, rgba(255,255,255,0.025) 1px, transparent 1px, transparent 64px);
    pointer-events: none;
  }

  .hero-inner {
    position: relative; z-index: 1;
    display: grid; grid-template-columns: 1.15fr 0.85fr;
    gap: 40px; align-items: center;
    padding-bottom: 60px;
  }

  .hero-eyebrow { color: var(--gold); display: inline-flex; align-items: center; gap: 10px; margin-bottom: 22px; }
  .hero-eyebrow .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--mint); box-shadow: 0 0 0 4px rgba(35,217,166,0.18); }

  .hero-content h1 {
    font-size: 56px; font-weight: 700; color: #fff;
    line-height: 1.08; letter-spacing: -0.01em; margin: 0 0 22px;
  }

  .hero-content h1 em {
    font-style: normal; font-weight: 600;
    background: linear-gradient(180deg, transparent 62%, rgba(240,172,47,0.5) 62%);
  }

  .hero-content p { color: var(--muted-on-dark); font-size: 17px; line-height: 1.65; max-width: 460px; margin: 0 0 34px; }

  .hero-cta-row { display: flex; align-items: center; gap: 22px; flex-wrap: wrap; }
  .hero-cta-note { color: var(--muted-on-dark); font-size: 13px; display: flex; align-items: center; gap: 8px; }

  .hero-visual { position: relative; height: 100%; min-height: 340px; }

  .float-card {
    position: absolute;
    background: linear-gradient(150deg, #1c3157, #142544);
    border: 1px solid rgba(255,255,255,0.14);
    box-shadow: 0 16px 32px rgba(5,12,28,0.4);
    border-radius: 16px;
    padding: 18px 20px;
    color: #fff;
    text-align: left;
  }

  .float-card .num { font-family: 'JetBrains Mono', monospace; font-size: 24px; font-weight: 600; color: var(--gold); }
  .float-card .lbl { font-size: 12px; color: var(--muted-on-dark); margin-top: 2px; }

  .float-card--1 { top: 4%; right: 6%; width: 190px; }
  .float-card--2 { top: 40%; left: 0%; width: 170px; }
  .float-card--3 { bottom: 6%; right: 14%; width: 200px; }

  .role-chip {
    position: absolute; background: #fff; border-radius: 999px;
    padding: 9px 16px 9px 10px;
    display: flex; align-items: center; gap: 8px;
    font-size: 12.5px; font-weight: 600; color: var(--ink);
    box-shadow: 0 14px 30px rgba(0,0,0,0.28);
  }

  .role-chip .avatar { width: 22px; height: 22px; border-radius: 50%; background: linear-gradient(135deg, var(--cobalt), #6c86ff); }
  .role-chip--1 { top: 62%; right: -2%; }
  .role-chip--2 { top: 20%; left: 18%; }

  .search-box-wrap {
    position: relative;
    z-index: 5;
    margin-top: -56px;
    padding-bottom: 40px;
  }

  .search-box {
    position: relative; z-index: 2;
    background: #fff; border-radius: 18px; padding: 16px;
    box-shadow: 0 30px 60px rgba(10,23,48,0.35);
  }

  .search-form { display: grid; grid-template-columns: 1.3fr 1fr 1fr auto; gap: 10px; }

  .search-input {
    padding: 14px 16px; border-radius: 11px;
    border: 1.5px solid #ece7da; font-size: 14.5px;
    font-family: 'Inter', sans-serif; background: var(--paper);
    transition: all .2s ease;
  }
  .search-input:focus { outline: none; border-color: var(--cobalt); background: #fff; box-shadow: 0 0 0 4px rgba(61,90,255,0.1); }
  .search-form .btn { justify-content: center; white-space: nowrap; border-radius: 11px; }

  .section { padding: 90px 0 80px; }
  .section + .section { padding-top: 80px; }

  .section-header {
    display: flex; align-items: flex-end; justify-content: space-between;
    gap: 24px; margin-bottom: 44px;
    opacity: 0; transform: translateY(16px);
    transition: opacity .5s ease, transform .5s ease;
  }
  .section-header.active { opacity: 1; transform: translateY(0); }
  .section-header .eyebrow { color: var(--cobalt); margin-bottom: 10px; display: block; }
  .section-header h2 { font-size: 32px; font-weight: 600; color: var(--ink); margin: 0; letter-spacing: -0.01em; }
  .section-header .sub { color: var(--muted); font-size: 14.5px; margin-top: 8px; max-width: 420px; }

  .categories-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; }

  .category-card {
    background: #fff; border: 1px solid var(--hairline); border-radius: 16px;
    padding: 26px 20px;
    display: flex; flex-direction: column; align-items: flex-start;
    transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
  }
  .category-card:hover { transform: translateY(-5px); box-shadow: 0 18px 36px rgba(10,23,48,0.08); border-color: transparent; }

  .category-card i {
    width: 46px; height: 46px; border-radius: 12px;
    background: var(--paper-2); color: var(--cobalt);
    display: flex; align-items: center; justify-content: center;
    font-size: 19px; margin-bottom: 18px;
  }

  .category-card h3 { font-size: 15px; font-weight: 600; color: var(--ink); margin: 0 0 6px; font-family: 'Inter', sans-serif; }
  .category-card p { color: var(--cobalt); font-size: 11.5px; font-weight: 600; margin: 0; letter-spacing: 0.04em; font-family: 'JetBrains Mono', monospace; }

  .stats { background: #F8F5EF; padding: 4px 0 4px; position: relative; }
  .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 50px }

  .stat-item {
    text-align: center; border-left: 1px solid rgba(255,255,255,0.1); padding-left: 20px;
    opacity: 0; transform: translateY(14px);
    transition: opacity .5s ease, transform .5s ease;
  }
  .stat-item.active { opacity: 1; transform: translateY(0); }
  .stat-item:first-child { border-left: none; padding-left: 0; }

  .stat-item i { color: #0A1730; font-size: 25px; margin-bottom: 14px; display: block;}
  .stat-item h3 { font-family: 'JetBrains Mono', monospace; color: #0A1730; font-size: 30px; font-weight: 600; margin: 0 0 4px; }
  .stat-item p { color: #0A1730; font-size: 13px; margin: 0; }

  .jobs-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }

  .job-card {
    display: flex; background: #fff; border: 1px solid var(--hairline);
    border-radius: 18px; overflow: hidden;
    transition: transform .22s ease, box-shadow .22s ease;
    position: relative;
  }
  .job-card:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(10,23,48,0.1); }

  .job-main { flex: 1; padding: 24px; min-width: 0; }
  .job-header { display: flex; align-items: center; gap: 13px; margin-bottom: 15px; }

  .company-logo {
    width: 44px; height: 44px; border-radius: 11px;
    background: linear-gradient(150deg, var(--cobalt), #6c86ff);
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 17px; flex-shrink: 0;
  }

  .job-info h3 { font-size: 15.5px; font-weight: 600; color: var(--ink); margin: 0 0 2px; font-family: 'Inter', sans-serif; }
  .job-info .company-name { color: var(--muted); font-size: 13px; margin: 0; }

  .job-meta { display: flex; gap: 14px; margin-bottom: 13px; flex-wrap: wrap; }
  .meta-item { display: flex; align-items: center; gap: 6px; color: var(--muted); font-size: 12.5px; }
  .meta-item i { color: var(--gold); font-size: 11px; }

  .job-tags { display: flex; flex-wrap: wrap; gap: 7px; }
  .tag { background: var(--paper-2); color: var(--ink); font-size: 11.5px; font-weight: 600; padding: 5px 11px; border-radius: 999px; }

  .job-stub {
    width: 128px; flex-shrink: 0;
    border-left: 2px dashed #e2ddd0;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    gap: 10px; padding: 18px 12px;
    position: relative; background: var(--paper);
  }

  .job-stub::before, .job-stub::after {
    content: ""; position: absolute; left: -9px;
    width: 18px; height: 18px; border-radius: 50%;
    background: var(--paper); border: 1px solid var(--hairline);
  }
  .job-stub::before { top: -9px; }
  .job-stub::after { bottom: -9px; }

  .salary { font-family: 'JetBrains Mono', monospace; font-weight: 600; color: var(--ink); font-size: 14px; text-align: center; }
  .job-stub .btn { padding: 9px 14px; font-size: 12px; white-space: nowrap; }

  .companies-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; }

  .company-card {
    background: #fff; border: 1px solid var(--hairline); border-radius: 16px;
    padding: 28px 20px; text-align: center;
    transition: transform .22s ease, box-shadow .22s ease;
  }
  .company-card:hover { transform: translateY(-5px); box-shadow: 0 18px 36px rgba(10,23,48,0.08); }
  .company-card .company-logo { margin: 0 auto 15px; background: #fff; border: 2px solid var(--gold-soft); color: var(--gold); }
  .company-card h3 { font-size: 14.5px; font-weight: 600; color: var(--ink); margin-bottom: 3px; font-family: 'Inter', sans-serif; }
  .company-card p { color: var(--muted); font-size: 12.5px; margin: 2px 0; }
  .company-card .job-count { color: var(--cobalt); font-weight: 600; font-family: 'JetBrains Mono', monospace; font-size: 11.5px; }

  .candidates-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; }

  .candidate-card {
    background: #fff; border: 1px solid var(--hairline); border-radius: 16px;
    padding: 28px 20px; text-align: center;
    transition: transform .22s ease, box-shadow .22s ease;
  }
  .candidate-card:hover { transform: translateY(-5px); box-shadow: 0 18px 36px rgba(10,23,48,0.08); }

  .candidate-avatar {
    width: 58px; height: 58px; border-radius: 50%;
    background: linear-gradient(150deg, var(--gold), #e08d1f);
    color: var(--ink); font-weight: 700; font-size: 16px;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 14px; font-family: 'JetBrains Mono', monospace;
  }

  .candidate-card h3 { font-size: 14.5px; font-weight: 600; color: var(--ink); margin-bottom: 3px; font-family: 'Inter', sans-serif; }
  .candidate-card .role { color: var(--muted); font-size: 12.5px; margin-bottom: 14px; }
  .candidate-card .skills { display: flex; justify-content: center; gap: 7px; flex-wrap: wrap; margin-bottom: 18px; }
  .candidate-card .btn { padding: 9px 18px; font-size: 12.5px; }

  .cta { position: relative; background: var(--ink); text-align: center; padding: 90px 0; overflow: hidden; }
  .cta::before {
    content: ""; position: absolute;
    width: 480px; height: 480px; border-radius: 50%;
    background: radial-gradient(circle, rgba(240,172,47,0.16), transparent 70%);
    top: -180px; left: 50%; transform: translateX(-50%);
  }
  .cta-inner { position: relative; z-index: 1; }
  .cta h2 { color: #fff; font-size: 34px; font-weight: 600; margin-bottom: 12px; }
  .cta p { color: var(--muted-on-dark); font-size: 15.5px; margin-bottom: 32px; }
  .cta-buttons { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; }

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

  @media (max-width: 992px) {
    .hero-inner { grid-template-columns: 1fr; padding-bottom: 40px; }
    .hero-visual { display: none; }
    .hero-content h1 { font-size: 42px; }
    .categories-grid { grid-template-columns: repeat(3, 1fr); }
    .jobs-grid { grid-template-columns: 1fr; }
    .companies-grid, .candidates-grid { grid-template-columns: repeat(2, 1fr); }
    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 28px 20px; }
    .stat-item:nth-child(3) { border-left: none; padding-left: 0; }
    .footer-content { grid-template-columns: 1fr 1fr; }
  }

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

    .hero { padding-top: 56px; }
    .hero-content h1 { font-size: 30px; }
    .hero-content p { font-size: 14.5px; }
    .hero-cta-row { flex-direction: column; align-items: flex-start; gap: 14px; }

    .search-box-wrap { margin-top: -34px; padding-bottom: 30px; }
    .search-box { border-radius: 16px; padding: 12px; }
    .search-form { grid-template-columns: 1fr; }

    .section { padding: 70px 0 60px; }
    .section-header { flex-direction: column; align-items: flex-start; gap: 8px; }
    .section-header h2 { font-size: 25px; }

    .categories-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }

    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 26px 16px; }
    .stat-item:nth-child(2n+1) { border-left: none; padding-left: 0; }

    .job-card { flex-direction: column; }
    .job-stub {
      width: 100%; flex-direction: row; justify-content: space-between;
      border-left: none; border-top: 2px dashed #e2ddd0;
      padding: 14px 20px;
    }
    .job-stub::before, .job-stub::after { left: auto; top: -9px; }
    .job-stub::before { left: -9px; }
    .job-stub::after { right: -9px; left: auto; bottom: auto; }

    .companies-grid, .candidates-grid { grid-template-columns: 1fr 1fr; gap: 12px; }

    .footer-content { grid-template-columns: 1fr; gap: 28px; text-align: left; }
    .cta h2 { font-size: 25px; }
    .cta-buttons { flex-direction: column; align-items: stretch; }
  }

  @media (max-width: 420px) {
    .categories-grid, .companies-grid, .candidates-grid { grid-template-columns: 1fr; }
    .hero-content h1 { font-size: 26px; }
    .stats-grid { grid-template-columns: 1fr; }
    .stat-item { border-left: none !important; padding-left: 0 !important; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 16px; }
    .stat-item:first-child { border-top: none; padding-top: 0; }
  }
</style>
</head>
<body>

<header>
<div class="container">
<nav>
<div class="logo-wordmark"><div class="mark"><i class="fas fa-briefcase"></i></div>LivejobsBD</div>
<ul class="nav-links" id="navLinks">
<li><a href="#home">Home</a></li>
<li><a href="#jobs">Find Jobs</a></li>
<li><a href="#companies">Companies</a></li>
<li><a href="#candidates">Candidates</a></li>
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="{{route('login')}}" class="btn btn-gold"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
<li><a href="{{route('register')}}" class="btn btn-gold"><i class="fa fa-plus-circle" aria-hidden="true"></i> Register</a></li>
</ul>
<div class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></div>
</nav>
</div>
</header>

<section class="hero" id="home">
<div class="container">
<div class="hero-inner">

<div class="hero-content">
<div class="hero-eyebrow eyebrow"><span class="dot"></span>12,845 open roles across Bangladesh</div>
<h1>Find your <em>dream job</em> today</h1>
<p>Discover thousands of vetted opportunities from real companies — with the salary, location and details up front, every time.</p>
<div class="hero-cta-row">
<a href="{{route('register')}}" class="btn btn-gold">Browse Jobs <i class="fas fa-arrow-right"></i></a>
<div class="hero-cta-note"><i class="fas fa-circle-check" style="color:var(--mint);"></i> Free for candidates, always</div>
</div>
</div>

<div class="hero-visual">
<div class="float-card float-card--1">
<div class="num">25.6K</div>
<div class="lbl">Active candidates</div>
</div>
<div class="float-card float-card--2">
<div class="num">3,254</div>
<div class="lbl">Hiring companies</div>
</div>
<div class="float-card float-card--3">
<div class="num">18.9K</div>
<div class="lbl">CVs uploaded</div>
</div>
<div class="role-chip role-chip--1"><div class="avatar"></div>Senior Developer hired</div>
<div class="role-chip role-chip--2"><div class="avatar" style="background:linear-gradient(135deg,var(--gold),#e08d1f);"></div>UX Designer hired</div>
</div>

</div>

</div>
</section>

<div class="search-box-wrap">
<div class="container">
<div class="search-box">
<form class="search-form">
<input type="text" class="search-input" placeholder="Job title, keywords, or company">
<input type="text" class="search-input" placeholder="City or postcode">
<select class="search-input">
<option>All Categories</option>
<option>IT & Development</option>
<option>Marketing</option>
<option>Design</option>
<option>Sales</option>
</select>
<button type="submit" class="btn btn-gold"><i class="fas fa-search"></i> Search</button>
</form>
</div>
</div>
</div>


<section class="job-categories section">
  <div class="container">
    <div class="section-header">
      <div>
        <span class="eyebrow">Browse by field</span>
        <h2>Job categories</h2>
      </div>
      <p class="sub">Five fields, thousands of openings — pick where you want to grow.</p>
    </div>
    <div class="categories-grid">
      <div class="category-card">
        <i class="fas fa-code"></i>
        <h3>IT & Development</h3>
        <p>4,512 JOBS</p>
      </div>
      <div class="category-card">
        <i class="fas fa-bullhorn"></i>
        <h3>Marketing</h3>
        <p>3,120 JOBS</p>
      </div>
      <div class="category-card">
        <i class="fas fa-paint-brush"></i>
        <h3>Design</h3>
        <p>2,845 JOBS</p>
      </div>
      <div class="category-card">
        <i class="fas fa-chart-line"></i>
        <h3>Finance</h3>
        <p>1,980 JOBS</p>
      </div>
      <div class="category-card">
        <i class="fas fa-users"></i>
        <h3>Human Resources</h3>
        <p>1,245 JOBS</p>
      </div>
    </div>
  </div>
</section>


<section class="section" id="jobs">
<div class="container">
<div class="section-header">
<div>
<span class="eyebrow">Fresh off the board</span>
<h2>Latest jobs</h2>
</div>
<p class="sub">Newest opportunities posted today, tickets ready to claim.</p>
</div>
<div class="jobs-grid">
@forelse ($jobs as $job)
<div class="job-card">
<div class="job-main">
<div class="job-header"><div class="company-logo"><i class="fas fa-code"></i></div>
<div class="job-info"><h3>{{$job->job_title}}</h3><p class="company-name">{{$job->company_name}}</p></div></div>
<div class="job-meta"><span class="meta-item"><i class="fas fa-map-marker-alt"></i>{{$job->location}}</span><span class="meta-item"><i class="fas fa-clock"></i>{{ucwords(str_replace("-", " ", $job->job_type))}}</span></div>
<div class="job-tags">
   @php $tags = explode(",", $job->tags); @endphp
    @foreach ($tags as $tag)
     <span class='tag'> {{ trim($tag) }} </span>
    @endforeach
</div>
<div class="job-footer"><span class="salary">{{$job->salary_range}}</span><a href="{{route('jobs.show',$job->slug)}}" class="btn btn-outline">Apply Now</a></div>
</div>
</div>
@empty
<p>No jobs found right now.</p>
@endforelse
</div>
<div style="text-align:center; margin-top:3rem;"><a href="#" class="btn btn-outline-dark">View all jobs <i class="fas fa-arrow-right"></i></a></div>
</div>
</section>

<section class="section" id="companies">
<div class="container">
<div class="section-header">
<div>
<span class="eyebrow">Who's hiring</span>
<h2>Popular companies</h2>
</div>
<p class="sub">Established teams actively growing their headcount right now.</p>
</div>
<div class="companies-grid">
<div class="company-card"><div class="company-logo"><i class="fas fa-code"></i></div><h3>TechCorp Solutions</h3><p>Information Technology</p><p class="job-count">45 OPEN POSITIONS</p></div>
<div class="company-card"><div class="company-logo"><i class="fas fa-building"></i></div><h3>Global Finance Corp</h3><p>Banking & Finance</p><p class="job-count">28 OPEN POSITIONS</p></div>
<div class="company-card"><div class="company-logo"><i class="fas fa-heart"></i></div><h3>HealthCare Plus</h3><p>Healthcare</p><p class="job-count">32 OPEN POSITIONS</p></div>
<div class="company-card"><div class="company-logo"><i class="fas fa-graduation-cap"></i></div><h3>EduLearn Platform</h3><p>Education</p><p class="job-count">19 OPEN POSITIONS</p></div>
</div>
</div>
</section>

<section class="section" id="candidates">
<div class="container">
<div class="section-header">
<div>
<span class="eyebrow">Talent on the market</span>
<h2>Featured candidates</h2>
</div>
<p class="sub">Skilled professionals ready for their next opportunity.</p>
</div>
<div class="candidates-grid">
<div class="candidate-card"><div class="candidate-avatar">JS</div><h3>John Smith</h3><p class="role">Senior Web Developer</p><div class="skills"><span class="tag">React</span><span class="tag">Node.js</span></div><a href="#" class="btn btn-outline-dark">View Profile</a></div>
<div class="candidate-card"><div class="candidate-avatar">SE</div><h3>Sarah Evans</h3><p class="role">UX Designer</p><div class="skills"><span class="tag">Figma</span><span class="tag">UI Design</span></div><a href="#" class="btn btn-outline-dark">View Profile</a></div>
<div class="candidate-card"><div class="candidate-avatar">MP</div><h3>Michael Park</h3><p class="role">Data Analyst</p><div class="skills"><span class="tag">Python</span><span class="tag">SQL</span></div><a href="#" class="btn btn-outline-dark">View Profile</a></div>
<div class="candidate-card"><div class="candidate-avatar">EJ</div><h3>Emily Johnson</h3><p class="role">Marketing Specialist</p><div class="skills"><span class="tag">SEO</span><span class="tag">Content</span></div><a href="#" class="btn btn-outline-dark">View Profile</a></div>
</div>
</div>
</section>


<section class="stats">
<div class="container">

<div class="stats-grid">
<div class="stat-item"><i class="fas fa-briefcase"></i><h3>12,845</h3><p>Available jobs</p></div>
<div class="stat-item"><i class="fas fa-building"></i><h3>3,254</h3><p>Popular companies</p></div>
<div class="stat-item"><i class="fas fa-users"></i><h3>25,680</h3><p>Active candidates</p></div>
<div class="stat-item"><i class="fas fa-file-alt"></i><h3>18,920</h3><p>CVs uploaded</p></div>
</div>

</div>
</section>



<section class="cta">
<div class="container cta-inner">
<h2>Ready to take the next step?</h2>
<p>Join thousands of professionals finding their dream jobs on LivejobsBD.</p>
<div class="cta-buttons">
<a href="{{route('register')}}" class="btn btn-ghost-white">Create free account</a>
<a href="#" class="btn btn-outline">Upload your CV</a>
</div>
</div>
</section>

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

<script>
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');
menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    const icon = menuToggle.querySelector('i');
    icon.classList.toggle('fa-bars');
    icon.classList.toggle('fa-times');
});

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{
    anchor.addEventListener('click',function(e){
        const target = document.querySelector(this.getAttribute('href'));
        if(target){
            e.preventDefault();
            target.scrollIntoView({behavior:'smooth'});
            navLinks.classList.remove('active');
        }
    });
});

const stats = document.querySelectorAll('.stat-item');
const sections = document.querySelectorAll('.section-header');

window.addEventListener('scroll', () => {
    let triggerBottom = window.innerHeight / 5 * 4;
    stats.forEach(stat => {
        const statTop = stat.getBoundingClientRect().top;
        if(statTop < triggerBottom) stat.classList.add('active');
    });
    sections.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;
        if(sectionTop < triggerBottom) section.classList.add('active');
    });
});
</script>
</body>
</html>