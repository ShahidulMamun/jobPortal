<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Dashboard | LivejobsBD</title>
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
  a { text-decoration: none; }

  .eyebrow {
    font-family: 'JetBrains Mono', monospace;
    font-size: 11px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;
  }

  /* ===== LAYOUT ===== */
  .dashboard-wrap {
    display: grid; grid-template-columns: 264px minmax(0, 1fr); min-height: 100vh;
    width: 100%;
  }

  .sidebar-overlay {
    display: none;
    position: fixed; inset: 0; background: rgba(10,17,33,0.5); z-index: 150;
  }
  .sidebar-overlay.active { display: block; }

  /* ===== SIDEBAR ===== */
  .sidebar {
    width: 264px; min-width: 264px; max-width: 264px; flex-shrink: 0;
    background: linear-gradient(180deg, var(--ink), var(--ink-2));
    padding: 26px 20px;
    display: flex; flex-direction: column;
    position: sticky; top: 0; height: 100vh;
    overflow-y: auto;
  }

  .sidebar-logo { display: flex; align-items: center; gap: 10px; font-weight: 700; font-size: 19px; color: #fff; margin-bottom: 34px; padding: 0 6px; }
  .sidebar-logo i {
    width: 34px; height: 34px; border-radius: 9px;
    background: linear-gradient(150deg, var(--gold), #e08d1f);
    color: var(--ink);
    display: flex; align-items: center; justify-content: center; font-size: 15px;
  }

  .side-section-label {
    color: rgba(255,255,255,0.35);
    font-size: 10.5px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;
    font-family: 'JetBrains Mono', monospace;
    padding: 0 10px; margin: 18px 0 8px;
  }

  .side-nav { list-style: none; margin: 0; padding: 0; }
  .side-nav li { margin-bottom: 3px; }
  .side-nav a {
    display: flex; align-items: center; gap: 12px;
    color: var(--muted-on-dark);
    font-size: 14px; font-weight: 500;
    padding: 10px 12px; border-radius: 10px;
    transition: background .2s ease, color .2s ease;
    position: relative;
  }
  .side-nav a i { width: 18px; text-align: center; font-size: 15px; }
  .side-nav a:hover { background: rgba(255,255,255,0.06); color: #fff; }
  .side-nav a.active { background: rgba(240,172,47,0.12); color: var(--gold); }
  .side-nav a.active::before {
    content: ""; position: absolute; left: -20px; top: 50%; transform: translateY(-50%);
    width: 3px; height: 20px; border-radius: 3px; background: var(--gold);
  }
  .side-nav .badge-count {
    margin-left: auto;
    background: var(--cobalt); color: #fff;
    font-size: 10.5px; font-weight: 700;
    padding: 2px 7px; border-radius: 999px;
    font-family: 'JetBrains Mono', monospace;
  }

  .sidebar-profile {
    margin-top: auto;
    display: flex; align-items: center; gap: 10px;
    padding: 12px; border-radius: 12px;
    background: rgba(255,255,255,0.05);
  }
  .sidebar-profile .avatar {
    width: 38px; height: 38px; border-radius: 50%;
    background: linear-gradient(150deg, var(--cobalt), #6c86ff);
    color: #fff; font-weight: 700; font-size: 14px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .sidebar-profile .info h4 { margin: 0; font-size: 13.5px; color: #fff; font-weight: 600; }
  .sidebar-profile .info span { font-size: 11.5px; color: var(--muted-on-dark); }
  .sidebar-profile .logout-link { margin-left: auto; color: var(--muted-on-dark); font-size: 14px; }
  .sidebar-profile .logout-link:hover { color: var(--rose); }

  /* ===== MAIN ===== */
  .main { min-width: 0; overflow-x: hidden; }

  .topbar {
    background: #fff;
    border-bottom: 1px solid var(--hairline);
    padding: 16px 32px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 20px;
    position: sticky; top: 0; z-index: 50;
  }

  .topbar-search { position: relative; flex: 1; max-width: 380px; }
  .topbar-search i { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--muted); font-size: 14px; }
  .topbar-search input {
    width: 100%; padding: 10px 14px 10px 38px;
    border-radius: 10px; border: 1.5px solid var(--hairline);
    background: var(--paper); font-size: 13.5px; font-family: 'Inter', sans-serif;
    transition: all .2s ease;
  }
  .topbar-search input:focus { outline: none; border-color: var(--cobalt); background: #fff; box-shadow: 0 0 0 4px rgba(61,90,255,0.1); }

  .topbar-actions { display: flex; align-items: center; gap: 16px; }
  .icon-btn {
    position: relative;
    width: 40px; height: 40px; border-radius: 10px;
    background: var(--paper); border: 1.5px solid var(--hairline);
    display: flex; align-items: center; justify-content: center;
    color: var(--ink); font-size: 15px; cursor: pointer;
    transition: background .2s ease, border-color .2s ease;
  }
  .icon-btn:hover { background: #fff; border-color: var(--cobalt); }
  .icon-btn .dot {
    position: absolute; top: 8px; right: 9px;
    width: 7px; height: 7px; border-radius: 50%; background: var(--rose);
    border: 2px solid #fff;
  }
  .menu-toggle-mobile { display: none; color: var(--ink); font-size: 20px; cursor: pointer; }

  .content { padding: 30px 32px 60px; }

  /* ===== WELCOME BANNER ===== */
  .welcome-banner {
    position: relative;
    background: radial-gradient(ellipse 700px 300px at 90% -20%, #1a2f57, var(--ink) 70%);
    border-radius: 20px;
    padding: 32px 34px;
    color: #fff;
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px;
    overflow: hidden;
    margin-bottom: 26px;
  }
  .welcome-banner::before {
    content: ""; position: absolute; inset: 0;
    background-image: repeating-linear-gradient(115deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 1px, transparent 1px, transparent 60px);
  }
  .welcome-text { position: relative; z-index: 1; }
  .welcome-text .eyebrow { color: var(--gold); display: flex; align-items: center; gap: 8px; margin-bottom: 10px; }
  .welcome-text .eyebrow .dot { width: 6px; height: 6px; border-radius: 50%; background: var(--mint); }
  .welcome-text h1 { font-size: 25px; font-weight: 700; margin: 0 0 8px; }
  .welcome-text p { color: var(--muted-on-dark); font-size: 14px; margin: 0; max-width: 420px; }
  .welcome-banner .btn-gold {
    position: relative; z-index: 1;
    background: var(--gold); color: var(--ink);
    padding: 12px 22px; border-radius: 999px; font-weight: 600; font-size: 13.5px;
    display: inline-flex; align-items: center; gap: 8px; white-space: nowrap;
    transition: transform .2s ease, box-shadow .2s ease;
  }
  .welcome-banner .btn-gold:hover { transform: translateY(-2px); box-shadow: 0 12px 26px rgba(240,172,47,0.3); }

  /* ===== STATS ===== */
  .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 26px; }
  .stat-card {
    background: #fff; border: 1px solid var(--hairline); border-radius: 16px;
    padding: 20px; display: flex; align-items: center; gap: 14px;
    transition: transform .2s ease, box-shadow .2s ease;
  }
  .stat-card:hover { transform: translateY(-3px); box-shadow: 0 16px 32px rgba(10,23,48,0.08); }
  .stat-card .icon {
    width: 46px; height: 46px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;
  }
  .stat-card .icon.blue { background: rgba(61,90,255,0.1); color: var(--cobalt); }
  .stat-card .icon.gold { background: var(--gold-soft); color: #b3781f; }
  .stat-card .icon.mint { background: rgba(35,217,166,0.12); color: #14a17d; }
  .stat-card .icon.rose { background: rgba(224,92,107,0.1); color: var(--rose); }
  .stat-card h3 { font-family: 'JetBrains Mono', monospace; font-size: 22px; font-weight: 600; color: var(--ink); margin: 0 0 2px; }
  .stat-card p { color: var(--muted); font-size: 12px; margin: 0; }

  /* ===== CONTENT GRID ===== */
  .content-grid { display: grid; grid-template-columns: 1.4fr 1fr; gap: 20px; align-items: start; }

  .panel {
    background: #fff; border: 1px solid var(--hairline); border-radius: 18px;
    padding: 24px; margin-bottom: 20px;
  }
  .panel-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
  .panel-header h2 { font-size: 17px; font-weight: 600; color: var(--ink); margin: 0; font-family: 'Inter', sans-serif; }
  .panel-header a { font-size: 12.5px; font-weight: 600; color: var(--cobalt); }

  /* profile completion */
  .completion-bar-track { height: 8px; border-radius: 999px; background: var(--paper-2); overflow: hidden; margin-bottom: 6px; }
  .completion-bar-fill { height: 100%; border-radius: 999px; background: linear-gradient(90deg, var(--cobalt), var(--mint)); }
  .completion-pct { font-family: 'JetBrains Mono', monospace; font-size: 12.5px; color: var(--muted); margin-bottom: 16px; }

  .checklist { list-style: none; margin: 0; padding: 0; }
  .checklist li {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 0; font-size: 13.5px; color: var(--ink-text);
    border-bottom: 1px solid var(--paper-2);
  }
  .checklist li:last-child { border-bottom: none; }
  .checklist li i { font-size: 15px; }
  .checklist li.done i { color: var(--mint); }
  .checklist li.pending i { color: var(--hairline); }
  .checklist li.pending { color: var(--muted); }
  .checklist li a { margin-left: auto; font-size: 12px; font-weight: 600; color: var(--cobalt); }

  /* recommended job ticket cards */
  .rec-job-card {
    display: flex; align-items: center; gap: 14px;
    border: 1px solid var(--hairline); border-radius: 14px;
    padding: 14px 16px; margin-bottom: 12px;
    transition: transform .2s ease, box-shadow .2s ease;
  }
  .rec-job-card:last-child { margin-bottom: 0; }
  .rec-job-card:hover { transform: translateY(-2px); box-shadow: 0 12px 26px rgba(10,23,48,0.08); }
  .rec-job-card .company-logo {
    width: 42px; height: 42px; border-radius: 11px; flex-shrink: 0;
    background: linear-gradient(150deg, var(--cobalt), #6c86ff); color: #fff;
    display: flex; align-items: center; justify-content: center; font-size: 16px;
  }
  .rec-job-card .job-info { flex: 1; min-width: 0; }
  .rec-job-card .job-info h4 { margin: 0 0 2px; font-size: 14px; font-weight: 600; color: var(--ink); }
  .rec-job-card .job-info span { font-size: 12px; color: var(--muted); }
  .rec-job-card .match-tag {
    background: rgba(35,217,166,0.12); color: #14a17d;
    font-size: 11px; font-weight: 700; padding: 4px 9px; border-radius: 999px;
    font-family: 'JetBrains Mono', monospace; white-space: nowrap;
  }
  .rec-job-card .save-btn {
    width: 34px; height: 34px; border-radius: 9px;
    border: 1.5px solid var(--hairline); background: var(--paper);
    color: var(--muted); display: flex; align-items: center; justify-content: center;
    cursor: pointer; flex-shrink: 0; transition: all .2s ease;
  }
  .rec-job-card .save-btn:hover { border-color: var(--gold); color: var(--gold); }

  /* applications table */
  .applications-table { width: 100%; border-collapse: collapse; }
  .applications-table th {
    text-align: left; font-size: 11px; font-weight: 600; color: var(--muted);
    text-transform: uppercase; letter-spacing: 0.06em;
    padding: 0 0 10px; border-bottom: 1px solid var(--hairline);
    font-family: 'JetBrains Mono', monospace;
  }
  .applications-table td {
    padding: 13px 0; border-bottom: 1px solid var(--paper-2);
    font-size: 13.5px; vertical-align: middle;
  }
  .applications-table tr:last-child td { border-bottom: none; }
  .job-cell { display: flex; align-items: center; gap: 10px; }
  .job-cell .mini-logo {
    width: 34px; height: 34px; border-radius: 9px; flex-shrink: 0;
    background: var(--paper-2); color: var(--cobalt);
    display: flex; align-items: center; justify-content: center; font-size: 13px;
  }
  .job-cell h4 { margin: 0; font-size: 13.5px; font-weight: 600; color: var(--ink); }
  .job-cell span { font-size: 11.5px; color: var(--muted); }

  .status-chip { font-size: 11px; font-weight: 700; padding: 5px 11px; border-radius: 999px; white-space: nowrap; }
  .status-chip.pending { background: var(--gold-soft); color: #a3701a; }
  .status-chip.review { background: rgba(61,90,255,0.1); color: var(--cobalt); }
  .status-chip.interview { background: rgba(35,217,166,0.12); color: #14a17d; }
  .status-chip.rejected { background: rgba(224,92,107,0.1); color: var(--rose); }

  /* notifications list */
  .notif-item { display: flex; gap: 12px; padding: 12px 0; border-bottom: 1px solid var(--paper-2); }
  .notif-item:last-child { border-bottom: none; }
  .notif-item .n-icon {
    width: 36px; height: 36px; border-radius: 10px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center; font-size: 14px;
  }
  .notif-item .n-icon.blue { background: rgba(61,90,255,0.1); color: var(--cobalt); }
  .notif-item .n-icon.mint { background: rgba(35,217,166,0.12); color: #14a17d; }
  .notif-item .n-icon.gold { background: var(--gold-soft); color: #a3701a; }
  .notif-item p { margin: 0 0 2px; font-size: 13px; color: var(--ink-text); line-height: 1.4; }
  .notif-item span { font-size: 11px; color: var(--muted); }

  .empty-state { text-align: center; padding: 30px 10px; color: var(--muted); }
  .empty-state i { font-size: 26px; margin-bottom: 10px; color: var(--hairline); display: block; }
  .empty-state p { font-size: 13px; margin: 0; }

  /* ===== MOBILE ===== */
  @media (max-width: 1080px) {
    .content-grid { grid-template-columns: 1fr; }
  }

  @media (max-width: 900px) {
    .dashboard-wrap { grid-template-columns: 1fr; }
    .sidebar {
      position: fixed; left: 0; top: 0; height: 100vh; width: 264px; z-index: 200;
      transform: translateX(-100%);
      transition: transform .25s ease;
      box-shadow: 20px 0 50px rgba(0,0,0,0.3);
    }
    .sidebar.active { transform: translateX(0); }
    .menu-toggle-mobile { display: block; }
  }

  @media (max-width: 720px) {
    .topbar { padding: 14px 18px; }
    .topbar-search { display: none; }
    .content { padding: 20px 18px 50px; }

    .welcome-banner { flex-direction: column; align-items: flex-start; padding: 24px 22px; }
    .welcome-text h1 { font-size: 21px; }
    .welcome-banner .btn-gold { width: 100%; justify-content: center; }

    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .stat-card { padding: 16px; }
    .stat-card h3 { font-size: 18px; }

    .panel { padding: 18px; border-radius: 14px; }

    .rec-job-card { flex-wrap: wrap; }
    .rec-job-card .match-tag { order: 3; }

    .applications-table { display: block; overflow-x: auto; white-space: nowrap; }
  }

  @media (max-width: 420px) {
    .stats-grid { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<div class="dashboard-wrap">

  <!-- Sidebar overlay (mobile) -->
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo"><i class="fas fa-briefcase"></i> LivejobsBD</div>

    <div class="side-section-label">Overview</div>
    <ul class="side-nav">
      <li><a href="{{ route('candidate.dashboard') }}" class="active"><i class="fas fa-grid-2"></i> Dashboard</a></li>
      <li><a href="{{ route('candidate.profile') }}"><i class="fas fa-user"></i> My Profile</a></li>
    </ul>

    <div class="side-section-label">Job Search</div>
    <ul class="side-nav">
      <li><a href="{{ route('jobs.index') }}"><i class="fas fa-magnifying-glass"></i> Find Jobs</a></li>
      <li><a href="{{ route('candidate.applications') }}"><i class="fas fa-file-lines"></i> Applied Jobs @if(($applications ?? collect())->count()) <span class="badge-count">{{ ($applications ?? collect())->count() }}</span> @endif</a></li>
      <li><a href="{{ route('candidate.saved') }}"><i class="fas fa-bookmark"></i> Saved Jobs</a></li>
      <li><a href="{{ route('candidate.alerts') }}"><i class="fas fa-bell"></i> Job Alerts</a></li>
    </ul>

    <div class="side-section-label">Account</div>
    <ul class="side-nav">
      <li><a href="{{ route('candidate.messages') }}"><i class="fas fa-message"></i> Messages</a></li>
      <li><a href="{{ route('candidate.settings') }}"><i class="fas fa-gear"></i> Settings</a></li>
    </ul>

    <div class="sidebar-profile">
      <div class="avatar">{{ isset($user) ? strtoupper(substr($user->name,0,1)) : 'U' }}</div>
      <div class="info">
        <h4>{{ $user->name ?? 'Guest User' }}</h4>
        <span>Candidate</span>
      </div>
      <a href="{{ route('logout') }}" class="logout-link" title="Logout"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-arrow-right-from-bracket"></i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    </div>
  </aside>

  <!-- Main -->
  <div class="main">

    <!-- Topbar -->
    <div class="topbar">
      <div class="menu-toggle-mobile" onclick="toggleSidebar()"><i class="fas fa-bars"></i></div>

      <div class="topbar-search">
        <i class="fas fa-magnifying-glass"></i>
        <input type="text" placeholder="Search jobs, companies...">
      </div>

      <div class="topbar-actions">
        <div class="icon-btn"><i class="fas fa-bell"></i><span class="dot"></span></div>
        <div class="icon-btn"><i class="fas fa-envelope"></i></div>
      </div>
    </div>

    <div class="content">

      <!-- Welcome Banner -->
      <div class="welcome-banner">
        <div class="welcome-text">
          <div class="eyebrow"><span class="dot"></span>Candidate Dashboard</div>
          <h1>Welcome back, {{ $user->name ?? 'there' }} 👋</h1>
          <p>You have {{ $newRecommendations ?? 5 }} new job matches and {{ $pendingApplications ?? 2 }} applications awaiting response.</p>
        </div>
        <a href="{{ route('jobs.index') }}" class="btn-gold"><i class="fas fa-magnifying-glass"></i> Browse Jobs</a>
      </div>

      <!-- Stats -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="icon blue"><i class="fas fa-file-lines"></i></div>
          <div><h3>{{ $stats['applications'] ?? 12 }}</h3><p>Applications Sent</p></div>
        </div>
        <div class="stat-card">
          <div class="icon gold"><i class="fas fa-bookmark"></i></div>
          <div><h3>{{ $stats['saved'] ?? 8 }}</h3><p>Saved Jobs</p></div>
        </div>
        <div class="stat-card">
          <div class="icon mint"><i class="fas fa-eye"></i></div>
          <div><h3>{{ $stats['profile_views'] ?? 34 }}</h3><p>Profile Views</p></div>
        </div>
        <div class="stat-card">
          <div class="icon rose"><i class="fas fa-comments"></i></div>
          <div><h3>{{ $stats['interviews'] ?? 3 }}</h3><p>Interview Invites</p></div>
        </div>
      </div>

      <!-- Content Grid -->
      <div class="content-grid">

        <!-- LEFT COLUMN -->
        <div>

          <!-- Recommended Jobs -->
          <div class="panel">
            <div class="panel-header">
              <h2>Recommended for You</h2>
              <a href="{{ route('jobs.index') }}">View all <i class="fas fa-arrow-right"></i></a>
            </div>

            @forelse ($recommendedJobs ?? [] as $job)
            <div class="rec-job-card">
              <div class="company-logo"><i class="fas fa-code"></i></div>
              <div class="job-info">
                <h4>{{ $job->job_title }}</h4>
                <span>{{ $job->company_name }} &middot; {{ $job->location }}</span>
              </div>
              <span class="match-tag">{{ $job->match_percent ?? 90 }}% match</span>
              <div class="save-btn"><i class="fas fa-bookmark"></i></div>
            </div>
            @empty
            <div class="rec-job-card">
              <div class="company-logo"><i class="fas fa-code"></i></div>
              <div class="job-info"><h4>Senior Laravel Developer</h4><span>TechCorp Solutions &middot; Dhaka</span></div>
              <span class="match-tag">95% match</span>
              <div class="save-btn"><i class="fas fa-bookmark"></i></div>
            </div>
            <div class="rec-job-card">
              <div class="company-logo"><i class="fas fa-paint-brush"></i></div>
              <div class="job-info"><h4>Product Designer</h4><span>HealthCare Plus &middot; Remote</span></div>
              <span class="match-tag">88% match</span>
              <div class="save-btn"><i class="fas fa-bookmark"></i></div>
            </div>
            <div class="rec-job-card">
              <div class="company-logo"><i class="fas fa-chart-line"></i></div>
              <div class="job-info"><h4>Financial Analyst</h4><span>EduLearn Platform &middot; Sylhet</span></div>
              <span class="match-tag">82% match</span>
              <div class="save-btn"><i class="fas fa-bookmark"></i></div>
            </div>
            @endforelse
          </div>

          <!-- Recent Applications -->
          <div class="panel">
            <div class="panel-header">
              <h2>Recent Applications</h2>
              <a href="{{ route('candidate.applications') }}">View all <i class="fas fa-arrow-right"></i></a>
            </div>

            @if (($applications ?? collect())->count() === 0 && !isset($applications))
            <table class="applications-table">
              <thead>
                <tr><th>Job</th><th>Applied</th><th>Status</th></tr>
              </thead>
              <tbody>
                <tr>
                  <td class="job-cell"><div class="mini-logo"><i class="fas fa-code"></i></div><div><h4>Senior Laravel Developer</h4><span>TechCorp Solutions</span></div></td>
                  <td>2 days ago</td>
                  <td><span class="status-chip review">In Review</span></td>
                </tr>
                <tr>
                  <td class="job-cell"><div class="mini-logo"><i class="fas fa-bullhorn"></i></div><div><h4>Digital Marketing Executive</h4><span>Global Finance Corp</span></div></td>
                  <td>5 days ago</td>
                  <td><span class="status-chip interview">Interview</span></td>
                </tr>
                <tr>
                  <td class="job-cell"><div class="mini-logo"><i class="fas fa-paint-brush"></i></div><div><h4>Product Designer</h4><span>HealthCare Plus</span></div></td>
                  <td>1 week ago</td>
                  <td><span class="status-chip pending">Pending</span></td>
                </tr>
                <tr>
                  <td class="job-cell"><div class="mini-logo"><i class="fas fa-chart-line"></i></div><div><h4>Financial Analyst</h4><span>EduLearn Platform</span></div></td>
                  <td>2 weeks ago</td>
                  <td><span class="status-chip rejected">Not Selected</span></td>
                </tr>
              </tbody>
            </table>
            @else
            <table class="applications-table">
              <thead>
                <tr><th>Job</th><th>Applied</th><th>Status</th></tr>
              </thead>
              <tbody>
                @forelse ($applications as $app)
                <tr>
                  <td class="job-cell">
                    <div class="mini-logo"><i class="fas fa-code"></i></div>
                    <div><h4>{{ $app->job_title }}</h4><span>{{ $app->company_name }}</span></div>
                  </td>
                  <td>{{ $app->created_at->diffForHumans() }}</td>
                  <td><span class="status-chip {{ $app->status_class ?? 'pending' }}">{{ $app->status_label ?? 'Pending' }}</span></td>
                </tr>
                @empty
                <tr><td colspan="3">
                  <div class="empty-state"><i class="fas fa-inbox"></i><p>No applications yet — start applying to jobs!</p></div>
                </td></tr>
                @endforelse
              </tbody>
            </table>
            @endif
          </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div>

          <!-- Profile Completion -->
          <div class="panel">
            <div class="panel-header"><h2>Profile Strength</h2></div>
            <div class="completion-bar-track"><div class="completion-bar-fill" style="width: {{ $profileCompletion ?? 70 }}%;"></div></div>
            <div class="completion-pct">{{ $profileCompletion ?? 70 }}% complete</div>
            <ul class="checklist">
              <li class="done"><i class="fas fa-circle-check"></i> Basic information</li>
              <li class="done"><i class="fas fa-circle-check"></i> Contact details</li>
              <li class="done"><i class="fas fa-circle-check"></i> Skills added</li>
              <li class="pending"><i class="far fa-circle"></i> Upload resume/CV <a href="{{ route('candidate.profile') }}">Add</a></li>
              <li class="pending"><i class="far fa-circle"></i> Work experience <a href="{{ route('candidate.profile') }}">Add</a></li>
            </ul>
          </div>

          <!-- Notifications -->
          <div class="panel">
            <div class="panel-header"><h2>Notifications</h2></div>

            @forelse ($notifications ?? [] as $notif)
            <div class="notif-item">
              <div class="n-icon {{ $notif->icon_color ?? 'blue' }}"><i class="fas {{ $notif->icon ?? 'fa-bell' }}"></i></div>
              <div><p>{{ $notif->message }}</p><span>{{ $notif->created_at->diffForHumans() }}</span></div>
            </div>
            @empty
            <div class="notif-item">
              <div class="n-icon mint"><i class="fas fa-circle-check"></i></div>
              <div><p>Your application to <strong>TechCorp Solutions</strong> moved to interview stage.</p><span>3 hours ago</span></div>
            </div>
            <div class="notif-item">
              <div class="n-icon blue"><i class="fas fa-eye"></i></div>
              <div><p><strong>Global Finance Corp</strong> viewed your profile.</p><span>1 day ago</span></div>
            </div>
            <div class="notif-item">
              <div class="n-icon gold"><i class="fas fa-bell"></i></div>
              <div><p>5 new jobs match your <strong>Laravel Developer</strong> alert.</p><span>2 days ago</span></div>
            </div>
            @endforelse
          </div>

        </div>

      </div>

    </div>
  </div>
</div>

<script>
function toggleSidebar() {
  document.getElementById('sidebar').classList.toggle('active');
  document.getElementById('sidebarOverlay').classList.toggle('active');
}
</script>

</body>
</html>