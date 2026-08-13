<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $job->job_title }} - {{ $job->company_name }} | LivejobsBD</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700;9..144,800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
{{-- @vite('resources/css/app.css') --}}

<style>
  :root {
    --ink: #0a1730;
    --ink-2: #101f3d;
    --slate: #17284a;
    --cobalt: #3d5aff;
    --gold: #f0ac2f;
    --gold-soft: #fbe3ae;
    --mint: #23d9a6;
    --rose: #e05c6b;
    --paper: #f8f5ef;
    --paper-2: #f1ece1;
    --ink-text: #1a2338;
    --muted: #6f7891;
    --muted-on-dark: rgba(232,234,244,0.58);
    --hairline: #e7e1d2;
  }

  * { box-sizing: border-box; }
  html { margin: 0; padding: 0; width: 100%; }

  body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    color: var(--ink-text);
    background: var(--paper);
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
  }

  h1, h2, h3, .logo { font-family: 'Fraunces', serif; }
  .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
  a { text-decoration: none; }

  .eyebrow {
    font-family: 'JetBrains Mono', monospace;
    font-size: 11px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;
  }

  .brand-bar { height: 4px; background: linear-gradient(90deg, var(--cobalt) 0%, var(--gold) 50%, var(--mint) 100%); }

  .btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 12px 22px; border-radius: 999px;
    font-weight: 600; font-size: 13.5px; cursor: pointer; border: none;
    font-family: 'Inter', sans-serif;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
  }
  .btn-gold { background: var(--gold); color: var(--ink); }
  .btn-gold:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(240,172,47,0.35); color: var(--ink); }
  .btn-outline { background: transparent; border: 1.5px solid rgba(255,255,255,0.28); color: #fff; }
  .btn-outline:hover { background: rgba(255,255,255,0.1); transform: translateY(-2px); }
  .btn-outline-dark { background: transparent; border: 1.5px solid #d8d1bd; color: var(--ink); }
  .btn-outline-dark:hover { background: var(--ink); border-color: var(--ink); color: #fff; }
  .btn-white { background: #fff; color: var(--ink); width: 100%; justify-content: center; }
  .btn-white:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(0,0,0,0.25); }

  /* ===== HEADER ===== */
  header {
    position: sticky; top: 0; z-index: 100;
    background: rgba(10, 23, 48, 0.94);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255,255,255,0.07);
  }
  nav { display: flex; align-items: center; justify-content: space-between; padding: 16px 0; }
  .logo { display: flex; align-items: center; gap: 10px; font-weight: 700; font-size: 20px; color: #fff; }
  .logo i {
    width: 36px; height: 36px; border-radius: 9px;
    background: linear-gradient(150deg, var(--gold), #e08d1f);
    color: var(--ink);
    display: flex; align-items: center; justify-content: center; font-size: 15px;
  }
  .nav-links { list-style: none; display: flex; align-items: center; gap: 26px; margin: 0; padding: 0; }
  .nav-links a:not(.btn) { color: var(--muted-on-dark); font-size: 14px; font-weight: 500; transition: color .2s ease; }
  .nav-links a:not(.btn):hover { color: #fff; }
  .menu-toggle { display: none; color: #fff; font-size: 21px; cursor: pointer; }

  /* ===== BREADCRUMB ===== */
  .breadcrumb-bar { background: #fff; border-bottom: 1px solid var(--hairline); padding: 12px 0; }
  .breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 12.5px; color: var(--muted); flex-wrap: wrap; }
  .breadcrumb a { color: var(--cobalt); font-weight: 500; }
  .breadcrumb a:hover { text-decoration: underline; }
  .breadcrumb i { font-size: 9px; color: var(--hairline); }

  /* ===== LAYOUT ===== */
  .page-wrapper { padding: 34px 0 70px; }
  .content-grid { display: grid; grid-template-columns: minmax(0, 1fr) 360px; gap: 22px; align-items: start; }
  .left-col { min-width: 0; overflow-x: hidden; }

  /* ===== JOB HERO CARD ===== */
  .job-hero-card {
    position: relative; overflow: hidden;
    background: #fff; border: 1px solid var(--hairline); border-radius: 18px;
    padding: 30px 32px; margin-bottom: 18px;
  }
  .job-hero-card::before {
    content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(90deg, var(--cobalt), var(--gold), var(--mint));
  }
  .job-top-row { display: flex; align-items: flex-start; gap: 18px; margin-bottom: 20px; }
  .company-logo-big {
    width: 68px; height: 68px; border-radius: 16px; flex-shrink: 0;
    background: linear-gradient(150deg, var(--cobalt), #6c86ff); color: #fff;
    display: flex; align-items: center; justify-content: center; font-size: 26px;
  }
  .job-title-block h1 { font-size: 24px; font-weight: 700; color: var(--ink); margin: 0 0 5px; line-height: 1.25; }
  .company-link { color: var(--cobalt); font-weight: 600; font-size: 14.5px; }
  .company-link:hover { text-decoration: underline; }
  .posted-time { font-size: 12px; color: var(--muted); margin-top: 6px; display: flex; align-items: center; gap: 5px; }

  .badge-row { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 22px; }
  .badge {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 6px 13px; border-radius: 999px; font-size: 12px; font-weight: 600;
  }
  .badge-blue { background: rgba(61,90,255,0.1); color: var(--cobalt); }
  .badge-green { background: rgba(35,217,166,0.14); color: #14a17d; }
  .badge-orange { background: var(--gold-soft); color: #a3701a; }
  .badge-purple { background: rgba(224,92,107,0.1); color: var(--rose); }

  .meta-row {
    display: flex; flex-wrap: wrap; gap: 22px;
    padding: 18px 0; border-top: 1px solid var(--paper-2); border-bottom: 1px solid var(--paper-2);
    margin-bottom: 20px;
  }
  .meta-item { display: flex; align-items: flex-start; gap: 9px; font-size: 12.5px; color: var(--muted); }
  .meta-item i { color: var(--gold); font-size: 13px; margin-top: 2px; }
  .meta-item strong { color: var(--ink); font-weight: 600; display: block; font-size: 13px; }

  .salary-highlight {
    display: inline-flex; align-items: center; gap: 9px;
    background: linear-gradient(135deg, rgba(35,217,166,0.1), rgba(35,217,166,0.16));
    border: 1.5px solid rgba(35,217,166,0.4);
    padding: 12px 20px; border-radius: 12px;
    font-family: 'JetBrains Mono', monospace; font-weight: 700; font-size: 16px; color: #0e8a6b;
  }
  .salary-highlight i { color: #14a17d; }

  /* ===== SHARE BAR ===== */
  .share-bar {
    background: #fff; border: 1px solid var(--hairline); border-radius: 16px;
    padding: 16px 22px; margin-bottom: 18px;
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;
  }
  .share-bar span { font-weight: 600; font-size: 13.5px; color: var(--ink); }
  .share-icons { display: flex; gap: 8px; }
  .share-icon {
    width: 34px; height: 34px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; cursor: pointer; transition: all .2s ease; color: #fff;
  }
  .si-fb { background: #1877f2; }
  .si-tw { background: #1da1f2; }
  .si-li { background: #0a66c2; }
  .si-wa { background: #25d366; }
  .si-cp { background: var(--paper-2); color: var(--muted); }
  .share-icon:hover { transform: translateY(-2px); opacity: .88; }

  /* ===== CONTENT CARDS ===== */
  .card { background: #fff; border: 1px solid var(--hairline); border-radius: 16px; padding: 26px 28px; margin-bottom: 18px; }
  .card h2 {
    font-size: 16.5px; font-weight: 600; color: var(--ink); margin: 0 0 16px;
    display: flex; align-items: center; gap: 10px; font-family: 'Inter', sans-serif;
  }
  .card h2 .icon-circle {
    width: 32px; height: 32px; border-radius: 9px;
    background: rgba(61,90,255,0.1); color: var(--cobalt);
    display: flex; align-items: center; justify-content: center; font-size: 13px;
  }
  .card p { color: var(--muted); font-size: 13.5px; line-height: 1.75; margin-bottom: 0; }
  .card ul { list-style: none; display: flex; flex-direction: column; gap: 10px; margin: 0; padding: 0; }
  .card ul li { display: flex; align-items: flex-start; gap: 10px; color: var(--ink-text); font-size: 13.5px; line-height: 1.6; }
  .card ul li i { color: var(--mint); margin-top: 3px; flex-shrink: 0; }
  .card ul li .fa-star { color: var(--gold) !important; }

  .tags-wrap { display: flex; flex-wrap: wrap; gap: 8px; }
  .tag { background: var(--paper-2); color: var(--ink); padding: 6px 13px; border-radius: 999px; font-size: 12px; font-weight: 600; }

  /* ===== SIDEBAR ===== */
  .sidebar { display: flex; flex-direction: column; gap: 18px; }

  .apply-card {
    position: relative; overflow: hidden;
    background: radial-gradient(ellipse 400px 220px at 90% -20%, #1a2f57, var(--ink) 70%);
    border-radius: 18px; padding: 26px; text-align: center; color: #fff;
  }
  .apply-card::before {
    content: ""; position: absolute; inset: 0;
    background-image: repeating-linear-gradient(115deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 1px, transparent 1px, transparent 60px);
  }
  .apply-card > * { position: relative; z-index: 1; }
  .apply-card h3 { font-size: 18px; font-weight: 700; margin-bottom: 8px; }
  .apply-card p { font-size: 12.5px; color: var(--muted-on-dark); margin-bottom: 18px; }
  .apply-card .deadline {
    background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12);
    border-radius: 10px; padding: 10px; margin-bottom: 18px; font-size: 11.5px; color: var(--muted-on-dark);
  }
  .apply-card .deadline strong { display: block; font-size: 14.5px; color: var(--gold); margin-top: 3px; font-family: 'JetBrains Mono', monospace; }
  .btn-save { background: rgba(255,255,255,0.08); color: #fff; border: 1.5px solid rgba(255,255,255,0.22); width: 100%; justify-content: center; margin-top: 10px; }
  .btn-save:hover { background: rgba(255,255,255,0.15); }
  .report-link { font-size: 11.5px; color: var(--muted-on-dark); display: flex; align-items: center; gap: 5px; justify-content: center; margin-top: 12px; }
  .report-link:hover { color: var(--rose); }

  .info-card { background: #fff; border: 1px solid var(--hairline); border-radius: 16px; padding: 22px; }
  .info-card h3 {
    font-size: 14.5px; font-weight: 600; margin-bottom: 16px; color: var(--ink);
    border-bottom: 1px solid var(--paper-2); padding-bottom: 12px;
    display: flex; align-items: center; gap: 8px;
  }
  .info-row { display: flex; justify-content: space-between; align-items: center; padding: 9px 0; border-bottom: 1px dashed var(--paper-2); font-size: 12.5px; }
  .info-row:last-child { border-bottom: none; }
  .info-row .label { color: var(--muted); display: flex; align-items: center; gap: 7px; }
  .info-row .label i { color: var(--cobalt); width: 13px; }
  .info-row .value { font-weight: 600; color: var(--ink); }

  .company-card { background: #fff; border: 1px solid var(--hairline); border-radius: 16px; padding: 22px; text-align: center; }
  .company-card .logo-wrap {
    width: 60px; height: 60px; border-radius: 14px; margin: 0 auto 14px;
    background: linear-gradient(150deg, var(--cobalt), #6c86ff); color: #fff;
    display: flex; align-items: center; justify-content: center; font-size: 22px;
  }
  .company-card h3 { font-size: 15px; font-weight: 700; margin-bottom: 4px; color: var(--ink); }
  .company-card .category { color: var(--muted); font-size: 12px; margin-bottom: 12px; }
  .company-stats { display: flex; justify-content: center; gap: 20px; padding: 12px 0; border-top: 1px solid var(--paper-2); border-bottom: 1px solid var(--paper-2); margin: 12px 0; }
  .cstat { text-align: center; }
  .cstat strong { display: block; font-family: 'JetBrains Mono', monospace; font-weight: 700; color: var(--cobalt); font-size: 15px; }
  .cstat span { font-size: 10.5px; color: var(--muted); }

  .similar-job {
    display: flex; gap: 11px; align-items: flex-start;
    padding: 11px 0; border-bottom: 1px dashed var(--paper-2);
    transition: opacity .2s ease;
  }
  .similar-job:last-child { border-bottom: none; }
  .similar-job:hover .sj-title { color: var(--cobalt); }
  .sj-logo {
    width: 38px; height: 38px; border-radius: 10px; flex-shrink: 0;
    background: var(--paper-2); color: var(--cobalt);
    display: flex; align-items: center; justify-content: center; font-size: 14px;
  }
  .sj-title { font-weight: 600; font-size: 13px; margin-bottom: 2px; color: var(--ink); transition: color .2s ease; }
  .sj-meta { font-size: 11.5px; color: var(--muted); }
  .sj-salary { font-size: 11.5px; color: #14a17d; font-weight: 600; margin-top: 2px; font-family: 'JetBrains Mono', monospace; }

  /* ===== FOOTER ===== */
  footer { background: var(--ink); padding: 50px 0 0; margin-top: 20px; }
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

  /* ===== ANIMATIONS ===== */
  @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
  .job-hero-card { animation: fadeUp .5s ease both; }
  .apply-card { animation: fadeUp .5s .1s ease both; }

  /* ===== MOBILE ===== */
  @media (max-width: 992px) {
    .content-grid { grid-template-columns: 1fr; display: flex; flex-direction: column; }
    .left-col, .sidebar { display: contents; }

    .job-hero-card { order: 1; }
    .job-overview-card { order: 2; margin-bottom: 18px; }
    .skills-card { order: 3; }
    .description-card { order: 4; }
    .responsibilities-card { order: 5; }
    .requirements-card { order: 6; }
    .benefits-card { order: 7; }
    .share-bar { order: 8; }
    .apply-card { order: 9; margin-bottom: 18px; }
    .company-card { order: 10; margin-bottom: 18px; }
    .similar-jobs-card { order: 11; margin-bottom: 18px; }
    .footer-content { grid-template-columns: 1fr 1fr; }
  }

  @media (max-width: 720px) {
    .container { padding: 0 18px; }

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

    .breadcrumb { font-size: 11.5px; }
    .page-wrapper { padding: 22px 0 50px; }

    .job-hero-card { padding: 22px 20px; }
    .job-top-row { flex-direction: column; }
    .job-title-block h1 { font-size: 19px; }
    .meta-row { gap: 14px; }
    .salary-highlight { font-size: 14px; padding: 10px 16px; width: 100%; justify-content: center; }

    .share-bar { padding: 14px 16px; }

    .card { padding: 20px 18px; }

    .footer-content { grid-template-columns: 1fr; gap: 28px; text-align: left; }
  }
</style>
</head>
<body>

<div class="brand-bar"></div>

<!-- Header -->
<header>
  <div class="container">
    <nav>
      <a href="{{ route('candidate.dashboard') }}" class="logo"><i class="fas fa-briefcase"></i> LivejobsBD</a>
      <ul class="nav-links" id="navLinks">
        <li><a href="{{ route('candidate.dashboard') }}">Home</a></li>
        <li><a href="{{ route('candidate.jobs.index') }}">Find Jobs</a></li>
        <li><a href="#">Companies</a></li>
        <li><a href="#">Candidates</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="{{ route('login') }}" class="btn btn-outline">Login</a></li>
        <li><a href="{{ route('register') }}" class="btn btn-gold">Post a Job</a></li>
      </ul>
      <div class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></div>
    </nav>
  </div>
</header>

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
  <div class="container">
    <div class="breadcrumb">
      <a href="{{ route('candidate.dashboard') }}">Home</a>
      <i class="fas fa-chevron-right"></i>
      <a href="{{ route('candidate.jobs.index') }}">Find Jobs</a>
      <i class="fas fa-chevron-right"></i>
      <a href="#">{{ $job->category->name ?? 'Category' }}</a>
      <i class="fas fa-chevron-right"></i>
      <span>{{ $job->job_title }}</span>
    </div>
  </div>
</div>

<!-- Page Content -->
<div class="page-wrapper">
  <div class="container">
    <div class="content-grid">

      <!-- LEFT COLUMN -->
      <div class="left-col">

        <!-- Job Hero Card -->
        <div class="job-hero-card">
          <div class="job-top-row">
            <div class="company-logo-big"><i class="fas fa-code"></i></div>
            <div class="job-title-block">
              <h1>{{ $job->job_title }}</h1>
              <a href="#" class="company-link">{{ $job->company_name }}</a>
              <div class="posted-time"><i class="fas fa-clock"></i> Posted {{ $job->created_at->diffForHumans() }}</div>
            </div>
          </div>

          <div class="badge-row">
            <span class="badge badge-blue"><i class="fas fa-briefcase"></i> {{ ucwords(str_replace('-', ' ', $job->job_type)) }}</span>
            <span class="badge badge-green"><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</span>
            <span class="badge badge-orange"><i class="fas fa-layer-group"></i> {{ $job->job_level }}</span>
            <span class="badge badge-purple"><i class="fas fa-code"></i> {{ $job->category->name ?? 'General' }}</span>
          </div>

          <div class="meta-row">
            <div class="meta-item"><i class="fas fa-calendar-alt"></i> <div><span>Deadline</span><strong>{{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}</strong></div></div>
            <div class="meta-item"><i class="fas fa-graduation-cap"></i> <div><span>Education</span><strong>{{ $job->education ?? 'BSc in CSE' }}</strong></div></div>
            <div class="meta-item"><i class="fas fa-history"></i> <div><span>Experience</span><strong>{{ $job->experience_range ?? '2 - 5 Years' }}</strong></div></div>
            <div class="meta-item"><i class="fas fa-users"></i> <div><span>Vacancy</span><strong>{{ $job->vacancy ?? 3 }} Positions</strong></div></div>
          </div>

          <div class="salary-highlight">
            <i class="fas fa-money-bill-wave"></i>
            BDT {{ $job->salary_range }}
          </div>
        </div>

        <!-- Skills -->
        <div class="card skills-card">
          <h2><span class="icon-circle"><i class="fas fa-tags"></i></span> Skills Required</h2>
          <div class="tags-wrap">
            @php $skills = explode(',', $job->skills); @endphp
            @foreach ($skills as $skill)
            <span class="tag">{{ trim($skill) }}</span>
            @endforeach
          </div>
        </div>

        <!-- Job Description -->
        <div class="card description-card">
          <h2><span class="icon-circle"><i class="fas fa-file-alt"></i></span> Job Description</h2>
          <p>{{ $job->description }}</p>
        </div>

        <!-- Responsibilities -->
        <div class="card responsibilities-card">
          <h2><span class="icon-circle"><i class="fas fa-tasks"></i></span> Responsibilities</h2>
          {{$job->responsibilities}}
        </div>

        <!-- Requirements -->
        <div class="card requirements-card">
          <h2><span class="icon-circle"><i class="fas fa-clipboard-check"></i></span> Requirements</h2>
         {{$job->requirements}}
        </div>

        <!-- Education -->
        <div class="card benefits-card">
          <h2><span class="icon-circle"><i class="fas fa-gift"></i></span> Education</h2>
         {{$job->education_requirements}}
        </div>

           <!-- Experience -->
        <div class="card benefits-card">
          <h2><span class="icon-circle"><i class="fas fa-gift"></i></span> Experience</h2>
           {{$job->experience_requirements}}
        </div>

        <!-- Share Bar -->
        <div class="share-bar">
          <span><i class="fas fa-share-alt" style="color:var(--cobalt); margin-right:6px;"></i> Share this job</span>
          <div class="share-icons">
            <a href="#" class="share-icon si-fb"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="share-icon si-tw"><i class="fab fa-twitter"></i></a>
            <a href="#" class="share-icon si-li"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="share-icon si-wa"><i class="fab fa-whatsapp"></i></a>
            <a href="#" class="share-icon si-cp" title="Copy link"><i class="fas fa-link"></i></a>
          </div>
        </div>

      </div>

      <!-- RIGHT COLUMN / SIDEBAR -->
      <div class="sidebar">

        <!-- Apply Card -->
        <div class="apply-card">
          <h3>Apply for this Job</h3>
          <p>Don't miss this opportunity. Apply before the deadline!</p>
          <div class="deadline">
            <span><i class="fas fa-hourglass-half"></i> Application Deadline</span>
            <strong>{{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}</strong>
          </div>
          <a href="{{ route('candidate.job.apply', $job->slug) }}" class="btn btn-white">
            <i class="fas fa-paper-plane"></i> Apply Now
          </a>
          <a href="{{ route('candidate.saved.toggle', $job->id) }}" class="btn btn-save">
            <i class="fas fa-bookmark"></i> Save Job
          </a>
          <a href="#" class="report-link">
            <i class="fas fa-flag"></i> Report this job
          </a>
        </div>

        <!-- Job Overview -->
        <div class="info-card job-overview-card">
          <h3><i class="fas fa-info-circle" style="color:var(--cobalt);"></i> Job Overview</h3>
          <div class="info-row">
            <span class="label"><i class="fas fa-briefcase"></i> Job Type</span>
            <span class="value">{{ ucwords(str_replace('-', ' ', $job->job_type)) }}</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-map-marker-alt"></i> Location</span>
            <span class="value">{{ $job->location }}</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-money-bill"></i> Salary</span>
            <span class="value" style="color:#14a17d;">{{ $job->salary_range }}</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-layer-group"></i> Level</span>
            <span class="value">{{ $job->job_level }}</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-history"></i> Experience</span>
            <span class="value">{{ $job->experience_range ?? '2 - 5 Years' }}</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-graduation-cap"></i> Education</span>
            <span class="value">{{ $job->education ?? 'BSc in CSE' }}</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-users"></i> Vacancy</span>
            <span class="value">{{ $job->vacancy ?? 3 }} Positions</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-calendar-alt"></i> Deadline</span>
            <span class="value" style="color:var(--rose);">{{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}</span>
          </div>
        </div>

        <!-- Company Card -->
        <div class="company-card">
          <div class="logo-wrap"><i class="fas fa-code"></i></div>
          <h3>{{ $job->company_name }}</h3>
          <p class="category">{{ $job->category->name ?? 'Information Technology' }}</p>
          <div class="company-stats">
            <div class="cstat"><strong>{{ $job->company_open_jobs ?? 12 }}</strong><span>Open Jobs</span></div>
            <div class="cstat"><strong>{{ $job->company_years ?? '5+' }}</strong><span>Years</span></div>
            <div class="cstat"><strong>{{ $job->company_employees ?? '80+' }}</strong><span>Employees</span></div>
          </div>
          <a href="#" class="btn btn-outline-dark" style="width:100%; justify-content:center;">
            <i class="fas fa-building"></i> View Company
          </a>
        </div>

        <!-- Similar Jobs -->
        <div class="info-card similar-jobs-card">
          <h3><i class="fas fa-th-list" style="color:var(--cobalt);"></i> Similar Jobs</h3>

          @forelse ($similarJobs ?? [] as $sj)
          <a href="{{ route('jobs.show', $sj->slug) }}" class="similar-job">
            <div class="sj-logo"><i class="fas fa-code"></i></div>
            <div>
              <div class="sj-title">{{ $sj->job_title }}</div>
              <div class="sj-meta">{{ $sj->company_name }} &middot; {{ $sj->location }}</div>
              <div class="sj-salary">{{ $sj->salary_range }}</div>
            </div>
          </a>
          @empty
          <a href="#" class="similar-job">
            <div class="sj-logo"><i class="fas fa-code"></i></div>
            <div><div class="sj-title">IT Engineer</div><div class="sj-meta">DebugBD &middot; Dhaka</div><div class="sj-salary">40k – 60k / Month</div></div>
          </a>
          <a href="#" class="similar-job">
            <div class="sj-logo"><i class="fas fa-laptop-code"></i></div>
            <div><div class="sj-title">Junior Developer</div><div class="sj-meta">TechCorp Solutions &middot; Dhaka</div><div class="sj-salary">25k – 40k / Month</div></div>
          </a>
          <a href="#" class="similar-job">
            <div class="sj-logo"><i class="fas fa-server"></i></div>
            <div><div class="sj-title">Backend Engineer</div><div class="sj-meta">SoftNova BD &middot; Chittagong</div><div class="sj-salary">60k – 90k / Month</div></div>
          </a>
          <a href="#" class="similar-job">
            <div class="sj-logo"><i class="fas fa-mobile-alt"></i></div>
            <div><div class="sj-title">Android Developer</div><div class="sj-meta">AppMaker BD &middot; Remote</div><div class="sj-salary">45k – 65k / Month</div></div>
          </a>
          @endforelse
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-section">
        <h3><i class="fas fa-briefcase" style="color:var(--gold);"></i> LivejobsBD</h3>
        <p>Your trusted partner in finding the perfect career opportunity. Connect with top employers and discover your dream job.</p>
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="footer-section">
        <h3>For Candidates</h3>
        <ul>
          <li><a href="{{ route('candidate.jobs.index') }}">Browse Jobs</a></li>
          <li><a href="#">Browse Categories</a></li>
          <li><a href="{{ route('candidate.dashboard') }}">Candidate Dashboard</a></li>
          <li><a href="{{ route('candidate.alerts') }}">Job Alerts</a></li>
          <li><a href="{{ route('candidate.saved') }}">My Bookmarks</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>For Employers</h3>
        <ul>
          <li><a href="{{ route('register') }}">Post a Job</a></li>
          <li><a href="#">Browse Candidates</a></li>
          <li><a href="#">Employer Dashboard</a></li>
          <li><a href="#">Applications</a></li>
          <li><a href="#">Pricing Plans</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Career Advice</a></li>
          <li><a href="#">FAQs</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2026 LivejobsBD. All rights reserved. Designed with <i class="fas fa-heart" style="color:#e05c6b;"></i> for job seekers worldwide.</p>
    </div>
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

// Copy link button
document.querySelector('.si-cp')?.addEventListener('click', function (e) {
  e.preventDefault();
  navigator.clipboard.writeText(window.location.href).then(() => {
    this.innerHTML = '<i class="fas fa-check"></i>';
    this.style.background = '#d1fae5';
    this.style.color = '#065f46';
    setTimeout(() => {
      this.innerHTML = '<i class="fas fa-link"></i>';
      this.style.background = '';
      this.style.color = '';
    }, 2000);
  });
});
</script>
</body>
</html>