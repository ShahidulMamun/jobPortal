<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Find Jobs | LivejobsBD</title>
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
  .container { max-width: 1240px; margin: 0 auto; padding: 0 24px; }
  a { text-decoration: none; }

  .eyebrow {
    font-family: 'JetBrains Mono', monospace;
    font-size: 11px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;
  }

  .brand-bar { height: 4px; background: linear-gradient(90deg, var(--cobalt) 0%, var(--gold) 50%, var(--mint) 100%); }

  .btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 12px 24px; border-radius: 999px;
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

  /* ===== PAGE HERO / SEARCH ===== */
  .jobs-hero {
    position: relative;
    background: radial-gradient(ellipse 900px 400px at 20% -20%, #1a2f57, var(--ink) 65%);
    padding: 44px 0 68px;
    overflow: hidden;
  }
  .jobs-hero::before {
    content: ""; position: absolute; inset: 0;
    background-image: repeating-linear-gradient(115deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 1px, transparent 1px, transparent 60px);
  }
  .jobs-hero-inner { position: relative; z-index: 1; }
  .jobs-hero .eyebrow { color: var(--gold); display: flex; align-items: center; gap: 8px; margin-bottom: 10px; }
  .jobs-hero .eyebrow .dot { width: 6px; height: 6px; border-radius: 50%; background: var(--mint); }
  .jobs-hero h1 { color: #fff; font-size: 30px; font-weight: 700; margin: 0 0 20px; }

  .search-box {
    background: #fff; border-radius: 16px; padding: 14px;
    box-shadow: 0 26px 50px rgba(10,23,48,0.35);
  }
  .search-form { display: grid; grid-template-columns: 1.3fr 1fr 1fr auto; gap: 10px; }
  .search-input {
    padding: 13px 15px; border-radius: 10px;
    border: 1.5px solid #ece7da; font-size: 14px;
    font-family: 'Inter', sans-serif; background: var(--paper);
    transition: all .2s ease;
  }
  .search-input:focus { outline: none; border-color: var(--cobalt); background: #fff; box-shadow: 0 0 0 4px rgba(61,90,255,0.1); }
  .search-form .btn { justify-content: center; white-space: nowrap; border-radius: 10px; }

  /* ===== LAYOUT ===== */
  .jobs-layout { display: grid; grid-template-columns: 270px minmax(0,1fr); gap: 24px; padding: 34px 0 70px; align-items: start; }

  /* ===== FILTER SIDEBAR ===== */
  .filter-panel {
    background: #fff; border: 1px solid var(--hairline); border-radius: 16px;
    padding: 22px; position: sticky; top: 90px;
  }
  .filter-panel-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
  .filter-panel-header h3 { font-size: 15px; font-weight: 700; color: var(--ink); margin: 0; font-family: 'Inter', sans-serif; }
  .filter-panel-header .clear-link { font-size: 12px; color: var(--cobalt); font-weight: 600; cursor: pointer; }

  .filter-group { border-bottom: 1px solid var(--paper-2); padding-bottom: 18px; margin-bottom: 18px; }
  .filter-group:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
  .filter-group h4 {
    font-size: 11.5px; font-weight: 700; color: var(--muted);
    text-transform: uppercase; letter-spacing: 0.06em;
    margin: 0 0 12px; font-family: 'JetBrains Mono', monospace;
  }

  .check-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; cursor: pointer; }
  .check-row:last-child { margin-bottom: 0; }
  .check-row label { display: flex; align-items: center; gap: 9px; font-size: 13px; color: var(--ink-text); cursor: pointer; }
  .check-row input[type="checkbox"] { accent-color: var(--cobalt); width: 15px; height: 15px; cursor: pointer; }
  .check-row .count { font-size: 11px; color: var(--muted); font-family: 'JetBrains Mono', monospace; }

  .salary-range-display {
    display: flex; justify-content: space-between; font-size: 12px;
    font-family: 'JetBrains Mono', monospace; color: var(--ink); font-weight: 600; margin-bottom: 8px;
  }
  .filter-group input[type="range"] { width: 100%; accent-color: var(--cobalt); }

  .filter-apply-btn {
    width: 100%; margin-top: 4px;
    background: linear-gradient(160deg, #16273f, #1b2f4d); color: #fff;
    border: none; border-radius: 10px; padding: 11px; font-weight: 600; font-size: 13px;
    cursor: pointer; transition: transform .18s ease, box-shadow .18s ease;
  }
  .filter-apply-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgba(10,23,48,0.25); }

  /* ===== RESULTS ===== */
  .results-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; flex-wrap: wrap; gap: 12px; }
  .results-count { font-size: 14px; color: var(--ink-text); }
  .results-count strong { color: var(--ink); font-family: 'JetBrains Mono', monospace; }
  .results-sort { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--muted); }
  .results-sort select {
    padding: 8px 12px; border-radius: 9px; border: 1.5px solid var(--hairline);
    font-size: 13px; font-family: 'Inter', sans-serif; background: #fff;
  }

  .active-filters { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 18px; }
  .active-filter-chip {
    display: flex; align-items: center; gap: 7px;
    background: rgba(61,90,255,0.08); color: var(--cobalt);
    font-size: 12px; font-weight: 600; padding: 6px 8px 6px 13px; border-radius: 999px;
  }
  .active-filter-chip i { cursor: pointer; font-size: 10px; }

  /* job ticket card (reused pattern) */
  .job-card {
    display: flex; background: #fff; border: 1px solid var(--hairline);
    border-radius: 16px; overflow: hidden; margin-bottom: 16px;
    transition: transform .2s ease, box-shadow .2s ease;
  }
  .job-card:hover { transform: translateY(-3px); box-shadow: 0 18px 36px rgba(10,23,48,0.09); }

  .job-main { flex: 1; padding: 20px 22px; min-width: 0; }
  .job-header { display: flex; align-items: flex-start; justify-content: space-between; gap: 10px; margin-bottom: 13px; }
  .job-header-left { display: flex; align-items: center; gap: 12px; min-width: 0; }
  .company-logo {
    width: 46px; height: 46px; border-radius: 12px; flex-shrink: 0;
    background: linear-gradient(150deg, var(--cobalt), #6c86ff); color: #fff;
    display: flex; align-items: center; justify-content: center; font-size: 18px;
  }
  .job-info h3 { font-size: 15.5px; font-weight: 600; color: var(--ink); margin: 0 0 3px; font-family: 'Inter', sans-serif; }
  .job-info .company-name { color: var(--muted); font-size: 12.5px; margin: 0; }
  .save-icon-btn {
    width: 34px; height: 34px; border-radius: 9px; flex-shrink: 0;
    border: 1.5px solid var(--hairline); background: var(--paper); color: var(--muted);
    display: flex; align-items: center; justify-content: center; cursor: pointer;
    transition: all .2s ease;
  }
  .save-icon-btn:hover, .save-icon-btn.saved { border-color: var(--gold); color: var(--gold); }

  .job-meta { display: flex; gap: 14px; margin-bottom: 13px; flex-wrap: wrap; }
  .meta-item { display: flex; align-items: center; gap: 6px; color: var(--muted); font-size: 12px; }
  .meta-item i { color: var(--gold); font-size: 11px; }

  .job-tags { display: flex; flex-wrap: wrap; gap: 7px; }
  .tag { background: var(--paper-2); color: var(--ink); font-size: 11px; font-weight: 600; padding: 5px 11px; border-radius: 999px; }
  .tag.new { background: rgba(35,217,166,0.14); color: #14a17d; }

  .job-stub {
    width: 132px; flex-shrink: 0;
    border-left: 2px dashed #e2ddd0;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    gap: 10px; padding: 18px 12px; position: relative; background: var(--paper);
  }
  .job-stub::before, .job-stub::after {
    content: ""; position: absolute; left: -9px;
    width: 18px; height: 18px; border-radius: 50%;
    background: var(--paper); border: 1px solid var(--hairline);
  }
  .job-stub::before { top: -9px; }
  .job-stub::after { bottom: -9px; }
  .salary { font-family: 'JetBrains Mono', monospace; font-weight: 600; color: var(--ink); font-size: 13.5px; text-align: center; }
  .job-stub .btn { padding: 9px 14px; font-size: 11.5px; white-space: nowrap; }
  .posted-time { font-size: 10.5px; color: var(--muted); }

  .empty-results { text-align: center; padding: 60px 20px; background: #fff; border: 1px solid var(--hairline); border-radius: 16px; }
  .empty-results i { font-size: 34px; color: var(--hairline); margin-bottom: 14px; display: block; }
  .empty-results h3 { font-size: 17px; color: var(--ink); margin: 0 0 6px; }
  .empty-results p { color: var(--muted); font-size: 13.5px; margin: 0; }

  /* pagination */
  .pagination { display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 30px; }
  .pagination a, .pagination span {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 600; color: var(--ink);
    border: 1.5px solid var(--hairline); background: #fff;
    font-family: 'JetBrains Mono', monospace;
    transition: all .2s ease;
  }
  .pagination a:hover { border-color: var(--cobalt); color: var(--cobalt); }
  .pagination .active { background: var(--ink); border-color: var(--ink); color: #fff; }
  .pagination .disabled { opacity: 0.4; pointer-events: none; }

  /* mobile filter drawer */
  .mobile-filter-toggle { display: none; }
  .filter-drawer-overlay { display: none; position: fixed; inset: 0; background: rgba(10,17,33,0.5); z-index: 250; }
  .filter-drawer-overlay.active { display: block; }

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

  /* ===== MOBILE ===== */
  @media (max-width: 992px) {
    .jobs-layout { grid-template-columns: 1fr; }
    .filter-panel { display: none; position: fixed; top: 0; left: 0; height: 100vh; width: 300px; z-index: 300;
      border-radius: 0; overflow-y: auto; transform: translateX(-100%); transition: transform .25s ease; }
    .filter-panel.active { display: block; transform: translateX(0); }
    .mobile-filter-toggle {
      display: flex; align-items: center; gap: 8px;
      background: #fff; border: 1.5px solid var(--hairline); border-radius: 10px;
      padding: 10px 16px; font-size: 13px; font-weight: 600; color: var(--ink);
      cursor: pointer; margin-bottom: 18px;
    }
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

    .jobs-hero { padding: 30px 0 46px; }
    .jobs-hero h1 { font-size: 22px; }
    .search-box { padding: 12px; }
    .search-form { grid-template-columns: 1fr; }

    .jobs-layout { padding: 24px 0 50px; }
    .results-header { flex-direction: column; align-items: flex-start; }

    .job-card { flex-direction: column; }
    .job-stub {
      width: 100%; flex-direction: row; justify-content: space-between;
      border-left: none; border-top: 2px dashed #e2ddd0; padding: 14px 20px;
    }
    .job-stub::before, .job-stub::after { left: -9px; top: -9px; bottom: auto; }
    .job-stub::after { left: auto; right: -9px; }

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
<div class="logo"><i class="fas fa-briefcase"></i> LivejobsBD</div>
<ul class="nav-links" id="navLinks">
<li><a href="{{ route('candidate.dashboard') }}">Home</a></li>
<li><a href="{{ route('candidate.jobs.index') }}">Find Jobs</a></li>
<li><a href="#companies">Companies</a></li>
<li><a href="#candidates">Candidates</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="{{route('login')}}" class="btn btn-outline">Login</a></li>
<li><a href="{{route('register')}}" class="btn btn-gold">Post a Job</a></li>
</ul>
<div class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></div>
</nav>
</div>
</header>

<!-- Jobs Hero / Search -->
<section class="jobs-hero">
<div class="container jobs-hero-inner">
<div class="eyebrow"><span class="dot"></span>{{ $totalJobs ?? '12,845' }} open roles across Bangladesh</div>
<h1>Find your next opportunity</h1>

<form method="GET" action="{{ route('candidate.jobs.index') }}" class="search-box">
<div class="search-form">
<input type="text" name="keyword" class="search-input" placeholder="Job title, keywords, or company" value="{{ request('keyword') }}">
<input type="text" name="location" class="search-input" placeholder="City or division" value="{{ request('location') }}">
<select name="category" class="search-input">
<option value="">All Categories</option>
<option value="it">IT & Development</option>
<option value="marketing">Marketing</option>
<option value="design">Design</option>
<option value="finance">Finance</option>
<option value="hr">Human Resources</option>
</select>
<button type="submit" class="btn btn-gold"><i class="fas fa-search"></i> Search</button>
</div>
</form>
</div>
</section>

<!-- Jobs Layout -->
<div class="container">
<div class="jobs-layout">

  <!-- Mobile filter overlay -->
  <div class="filter-drawer-overlay" id="filterOverlay" onclick="toggleFilters()"></div>

  <!-- FILTER SIDEBAR -->
  <aside class="filter-panel" id="filterPanel">
    <div class="filter-panel-header">
      <h3>Filters</h3>
      <span class="clear-link" onclick="clearFilters()">Clear all</span>
    </div>

    <div class="filter-group">
      <h4>Job Type</h4>
      <div class="check-row"><label><input type="checkbox" name="job_type[]" value="full-time"> Full Time</label><span class="count">{{ $jobTypeCounts['full-time'] ?? 210 }}</span></div>
      <div class="check-row"><label><input type="checkbox" name="job_type[]" value="part-time"> Part Time</label><span class="count">{{ $jobTypeCounts['part-time'] ?? 84 }}</span></div>
      <div class="check-row"><label><input type="checkbox" name="job_type[]" value="contract"> Contract</label><span class="count">{{ $jobTypeCounts['contract'] ?? 52 }}</span></div>
      <div class="check-row"><label><input type="checkbox" name="job_type[]" value="remote"> Remote</label><span class="count">{{ $jobTypeCounts['remote'] ?? 130 }}</span></div>
    </div>

    <div class="filter-group">
      <h4>Category</h4>
      <div class="check-row"><label><input type="checkbox" name="category[]" value="it"> IT & Development</label><span class="count">4,512</span></div>
      <div class="check-row"><label><input type="checkbox" name="category[]" value="marketing"> Marketing</label><span class="count">3,120</span></div>
      <div class="check-row"><label><input type="checkbox" name="category[]" value="design"> Design</label><span class="count">2,845</span></div>
      <div class="check-row"><label><input type="checkbox" name="category[]" value="finance"> Finance</label><span class="count">1,980</span></div>
      <div class="check-row"><label><input type="checkbox" name="category[]" value="hr"> Human Resources</label><span class="count">1,245</span></div>
    </div>

    <div class="filter-group">
      <h4>Experience Level</h4>
      <div class="check-row"><label><input type="checkbox" name="experience[]" value="entry"> Entry-level</label><span class="count">96</span></div>
      <div class="check-row"><label><input type="checkbox" name="experience[]" value="mid"> Mid-level</label><span class="count">214</span></div>
      <div class="check-row"><label><input type="checkbox" name="experience[]" value="senior"> Senior</label><span class="count">128</span></div>
      <div class="check-row"><label><input type="checkbox" name="experience[]" value="lead"> Lead / Manager</label><span class="count">38</span></div>
    </div>

    <div class="filter-group">
      <h4>Salary Range (৳)</h4>
      <div class="salary-range-display"><span id="salaryMin">10K</span><span id="salaryMax">150K+</span></div>
      <input type="range" min="10" max="150" value="80" id="salarySlider" oninput="document.getElementById('salaryMax').innerText = this.value + 'K'">
    </div>

    <div class="filter-group">
      <h4>Division</h4>
      <div class="check-row"><label><input type="checkbox" name="division[]" value="dhaka"> Dhaka</label></div>
      <div class="check-row"><label><input type="checkbox" name="division[]" value="chattogram"> Chattogram</label></div>
      <div class="check-row"><label><input type="checkbox" name="division[]" value="khulna"> Khulna</label></div>
      <div class="check-row"><label><input type="checkbox" name="division[]" value="sylhet"> Sylhet</label></div>
    </div>

    <button class="filter-apply-btn" onclick="toggleFilters()">Apply Filters</button>
  </aside>

  <!-- RESULTS -->
  <div>

    <div class="mobile-filter-toggle" onclick="toggleFilters()">
      <i class="fas fa-sliders"></i> Filters
    </div>

    <div class="results-header">
      <div class="results-count">Showing <strong>{{ ($jobs ?? collect())->count() ?: 24 }}</strong> of <strong>{{ $totalJobs ?? '12,845' }}</strong> jobs</div>
      <div class="results-sort">
        Sort by:
        <select>
          <option>Most Relevant</option>
          <option>Newest First</option>
          <option>Salary: High to Low</option>
          <option>Salary: Low to High</option>
        </select>
      </div>
    </div>

    <div class="active-filters" id="activeFilters" style="display:none;">
      <span class="active-filter-chip">Full Time <i class="fas fa-times"></i></span>
      <span class="active-filter-chip">Dhaka <i class="fas fa-times"></i></span>
    </div>

    @forelse ($jobs ?? [] as $job)
    <div class="job-card">
      <div class="job-main">
        <div class="job-header">
          <div class="job-header-left">
            <div class="company-logo"><i class="fas fa-code"></i></div>
            <div class="job-info">
              <h3>{{ $job->job_title }}</h3>
              <p class="company-name">{{ $job->company_name }}</p>
            </div>
          </div>
          <div class="save-icon-btn"><i class="fas fa-bookmark"></i></div>
        </div>
        <div class="job-meta">
          <span class="meta-item"><i class="fas fa-map-marker-alt"></i>{{ $job->location }}</span>
          <span class="meta-item"><i class="fas fa-clock"></i>{{ ucwords(str_replace('-', ' ', $job->job_type)) }}</span>
          <span class="meta-item"><i class="fas fa-briefcase"></i>{{ $job->experience_level ?? 'Mid-level' }}</span>
        </div>
        <div class="job-tags">
          @php $tags = explode(",", $job->tags); @endphp
          @foreach ($tags as $tag)
          <span class="tag">{{ trim($tag) }}</span>
          @endforeach
        </div>
      </div>
      <div class="job-stub">
        <span class="salary">{{ $job->salary_range }}</span>
        <span class="posted-time">{{ $job->created_at->diffForHumans() }}</span>
        <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-outline-dark">Apply</a>
      </div>
    </div>
    @empty
    <div class="job-card">
      <div class="job-main">
        <div class="job-header">
          <div class="job-header-left">
            <div class="company-logo"><i class="fas fa-code"></i></div>
            <div class="job-info"><h3>Senior Laravel Developer</h3><p class="company-name">TechCorp Solutions</p></div>
          </div>
          <div class="save-icon-btn"><i class="fas fa-bookmark"></i></div>
        </div>
        <div class="job-meta">
          <span class="meta-item"><i class="fas fa-map-marker-alt"></i>Dhaka, Bangladesh</span>
          <span class="meta-item"><i class="fas fa-clock"></i>Full Time</span>
          <span class="meta-item"><i class="fas fa-briefcase"></i>Senior</span>
        </div>
        <div class="job-tags"><span class="tag new">New</span><span class="tag">Laravel</span><span class="tag">MySQL</span><span class="tag">API</span></div>
      </div>
      <div class="job-stub">
        <span class="salary">৳60K-90K</span>
        <span class="posted-time">2 days ago</span>
        <a href="#" class="btn btn-outline-dark">Apply</a>
      </div>
    </div>

    <div class="job-card">
      <div class="job-main">
        <div class="job-header">
          <div class="job-header-left">
            <div class="company-logo"><i class="fas fa-bullhorn"></i></div>
            <div class="job-info"><h3>Digital Marketing Executive</h3><p class="company-name">Global Finance Corp</p></div>
          </div>
          <div class="save-icon-btn"><i class="fas fa-bookmark"></i></div>
        </div>
        <div class="job-meta">
          <span class="meta-item"><i class="fas fa-map-marker-alt"></i>Chattogram, Bangladesh</span>
          <span class="meta-item"><i class="fas fa-clock"></i>Full Time</span>
          <span class="meta-item"><i class="fas fa-briefcase"></i>Mid-level</span>
        </div>
        <div class="job-tags"><span class="tag">SEO</span><span class="tag">Ads</span><span class="tag">Content</span></div>
      </div>
      <div class="job-stub">
        <span class="salary">৳35K-50K</span>
        <span class="posted-time">5 days ago</span>
        <a href="#" class="btn btn-outline-dark">Apply</a>
      </div>
    </div>

    <div class="job-card">
      <div class="job-main">
        <div class="job-header">
          <div class="job-header-left">
            <div class="company-logo"><i class="fas fa-paint-brush"></i></div>
            <div class="job-info"><h3>Product Designer</h3><p class="company-name">HealthCare Plus</p></div>
          </div>
          <div class="save-icon-btn"><i class="fas fa-bookmark"></i></div>
        </div>
        <div class="job-meta">
          <span class="meta-item"><i class="fas fa-map-marker-alt"></i>Remote</span>
          <span class="meta-item"><i class="fas fa-clock"></i>Contract</span>
          <span class="meta-item"><i class="fas fa-briefcase"></i>Mid-level</span>
        </div>
        <div class="job-tags"><span class="tag new">New</span><span class="tag">Figma</span><span class="tag">UI/UX</span></div>
      </div>
      <div class="job-stub">
        <span class="salary">৳45K-70K</span>
        <span class="posted-time">1 week ago</span>
        <a href="#" class="btn btn-outline-dark">Apply</a>
      </div>
    </div>

    <div class="job-card">
      <div class="job-main">
        <div class="job-header">
          <div class="job-header-left">
            <div class="company-logo"><i class="fas fa-chart-line"></i></div>
            <div class="job-info"><h3>Financial Analyst</h3><p class="company-name">EduLearn Platform</p></div>
          </div>
          <div class="save-icon-btn"><i class="fas fa-bookmark"></i></div>
        </div>
        <div class="job-meta">
          <span class="meta-item"><i class="fas fa-map-marker-alt"></i>Sylhet, Bangladesh</span>
          <span class="meta-item"><i class="fas fa-clock"></i>Part Time</span>
          <span class="meta-item"><i class="fas fa-briefcase"></i>Entry-level</span>
        </div>
        <div class="job-tags"><span class="tag">Excel</span><span class="tag">Reporting</span></div>
      </div>
      <div class="job-stub">
        <span class="salary">৳30K-40K</span>
        <span class="posted-time">2 weeks ago</span>
        <a href="#" class="btn btn-outline-dark">Apply</a>
      </div>
    </div>
    @endforelse

    @if (($jobs ?? null) && method_exists($jobs, 'links'))
      {{ $jobs->links() }}
    @else
    <div class="pagination">
      <span class="disabled"><i class="fas fa-chevron-left"></i></span>
      <span class="active">1</span>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#"><i class="fas fa-chevron-right"></i></a>
    </div>
    @endif

  </div>
</div>
</div>

<!-- Footer -->
<footer>
<div class="container">
<div class="footer-content">
<div class="footer-section"><h3><i class="fas fa-briefcase" style="color:var(--gold);"></i> LivejobsBD</h3>
<p>Your trusted partner in finding the perfect career opportunity. Connect with top employers and discover your dream job.</p>
<div class="social-links"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fab fa-instagram"></i></a></div>
</div>
<div class="footer-section"><h3>For Candidates</h3><ul><li><a href="{{ route('candidate.jobs.index') }}">Browse Jobs</a></li><li><a href="#">Browse Categories</a></li><li><a href="{{ route('candidate.dashboard') }}">Candidate Dashboard</a></li><li><a href="{{ route('candidate.alerts') }}">Job Alerts</a></li><li><a href="{{ route('candidate.saved') }}">My Bookmarks</a></li></ul></div>
<div class="footer-section"><h3>For Employers</h3><ul><li><a href="{{ route('register') }}">Post a Job</a></li><li><a href="#">Browse Candidates</a></li><li><a href="#">Employer Dashboard</a></li><li><a href="#">Applications</a></li><li><a href="#">Pricing Plans</a></li></ul></div>
<div class="footer-section"><h3>Quick Links</h3><ul><li><a href="#">About Us</a></li><li><a href="#">Contact Us</a></li><li><a href="#">Career Advice</a></li><li><a href="#">FAQs</a></li><li><a href="#">Terms & Conditions</a></li><li><a href="#">Privacy Policy</a></li></ul></div>
</div>
<div class="footer-bottom"><p>&copy; 2026 LivejobsBD. All rights reserved. Designed with <i class="fas fa-heart" style="color:#e05c6b;"></i> for job seekers worldwide.</p></div>
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

function toggleFilters() {
    document.getElementById('filterPanel').classList.toggle('active');
    document.getElementById('filterOverlay').classList.toggle('active');
}

function clearFilters() {
    document.querySelectorAll('.filter-panel input[type="checkbox"]').forEach(cb => cb.checked = false);
}
</script>

</body>
</html>