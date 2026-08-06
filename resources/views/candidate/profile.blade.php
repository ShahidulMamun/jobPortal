<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile | LivejobsBD</title>
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
  .dashboard-wrap { display: grid; grid-template-columns: 264px minmax(0, 1fr); min-height: 100vh; width: 100%; }

  .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(10,17,33,0.5); z-index: 150; }
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
    margin-left: auto; background: var(--cobalt); color: #fff;
    font-size: 10.5px; font-weight: 700; padding: 2px 7px; border-radius: 999px;
    font-family: 'JetBrains Mono', monospace;
  }

  .sidebar-profile {
    margin-top: auto; display: flex; align-items: center; gap: 10px;
    padding: 12px; border-radius: 12px; background: rgba(255,255,255,0.05);
  }
  .sidebar-profile .avatar {
    width: 38px; height: 38px; border-radius: 50%;
    background: linear-gradient(150deg, var(--cobalt), #6c86ff);
    color: #fff; font-weight: 700; font-size: 14px;
    display: flex; align-items: center; justify-content: center; flex-shrink: 0;
  }
  .sidebar-profile .info h4 { margin: 0; font-size: 13.5px; color: #fff; font-weight: 600; }
  .sidebar-profile .info span { font-size: 11.5px; color: var(--muted-on-dark); }
  .sidebar-profile .logout-link { margin-left: auto; color: var(--muted-on-dark); font-size: 14px; }
  .sidebar-profile .logout-link:hover { color: var(--rose); }

  /* ===== MAIN ===== */
  .main { min-width: 0; overflow-x: hidden; }

  .topbar {
    background: #fff; border-bottom: 1px solid var(--hairline);
    padding: 16px 32px; display: flex; align-items: center; justify-content: space-between;
    gap: 20px; position: sticky; top: 0; z-index: 50;
  }
  .topbar-heading h1 { font-size: 18px; font-weight: 700; color: var(--ink); margin: 0; }
  .topbar-heading span { font-size: 12.5px; color: var(--muted); }

  .topbar-actions { display: flex; align-items: center; gap: 12px; }
  .icon-btn {
    position: relative; width: 40px; height: 40px; border-radius: 10px;
    background: var(--paper); border: 1.5px solid var(--hairline);
    display: flex; align-items: center; justify-content: center;
    color: var(--ink); font-size: 15px; cursor: pointer;
    transition: background .2s ease, border-color .2s ease;
  }
  .icon-btn:hover { background: #fff; border-color: var(--cobalt); }
  .menu-toggle-mobile { display: none; color: var(--ink); font-size: 20px; cursor: pointer; }

  .content { padding: 30px 32px 80px; max-width: 920px; margin: auto }

  /* ===== PROFILE HEADER CARD ===== */
  .profile-header-card {
    position: relative;
    background: radial-gradient(ellipse 700px 260px at 90% -30%, #1a2f57, var(--ink) 70%);
    border-radius: 20px;
    padding: 32px 34px;
    color: #fff;
    display: flex; align-items: center; gap: 22px;
    overflow: hidden;
    margin-bottom: 22px;
  }
  .profile-header-card::before {
    content: ""; position: absolute; inset: 0;
    background-image: repeating-linear-gradient(115deg, rgba(255,255,255,0.02) 0px, rgba(255,255,255,0.02) 1px, transparent 1px, transparent 60px);
  }

  .avatar-upload { position: relative; z-index: 1; flex-shrink: 0; }
  .avatar-upload .avatar-circle {
    width: 92px; height: 92px; border-radius: 50%;
    background: linear-gradient(150deg, var(--cobalt), #6c86ff);
    display: flex; align-items: center; justify-content: center;
    font-size: 32px; font-weight: 700; color: #fff;
    overflow: clip;
  }
  .avatar-upload .avatar-circle img {
    width: 100%; height: 100%; object-fit: cover;
  }
  .avatar-upload .camera-btn {
    position: absolute; bottom: 0; right: 0;
    width: 30px; height: 30px; border-radius: 50%;
    background: var(--gold); color: var(--ink);
    display: flex; align-items: center; justify-content: center;
    font-size: 12px; border: 3px solid var(--ink);
    cursor: pointer;
  }

  .profile-header-info { position: relative; z-index: 1; flex: 1; min-width: 0; }
  .profile-header-info h2 { margin: 0 0 4px; font-size: 22px; font-weight: 700; }
  .profile-header-info .role-title { color: var(--gold); font-size: 13.5px; font-weight: 600; margin-bottom: 8px; }
  .profile-header-info .meta-row { display: flex; flex-wrap: wrap; gap: 16px; }
  .profile-header-info .meta-row span { display: flex; align-items: center; gap: 6px; color: var(--muted-on-dark); font-size: 12.5px; }

  .completion-pill {
    position: relative; z-index: 1; flex-shrink: 0; text-align: center;
    background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.14);
    border-radius: 14px; padding: 14px 18px;
  }
  .completion-pill .pct { font-family: 'JetBrains Mono', monospace; font-size: 22px; font-weight: 700; color: var(--mint); }
  .completion-pill .lbl { font-size: 10.5px; color: var(--muted-on-dark); margin-top: 2px; }

  /* ===== FORM PANELS ===== */
  .panel {
    background: #fff; border: 1px solid var(--hairline); border-radius: 18px;
    padding: 26px 28px; margin-bottom: 20px;
  }
  .panel-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
  .panel-header h2 { font-size: 16.5px; font-weight: 600; color: var(--ink); margin: 0; display: flex; align-items: center; gap: 9px; }
  .panel-header h2 i { color: var(--cobalt); font-size: 15px; }
  .panel-header .add-btn {
    font-size: 12.5px; font-weight: 600; color: var(--cobalt);
    display: flex; align-items: center; gap: 6px; cursor: pointer;
  }

  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
  .form-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 16px; }
  .form-row-4 { display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 14px; margin-bottom: 16px; }
  .form-group { margin-bottom: 16px; }
  .form-group:last-child { margin-bottom: 0; }
  .form-group label { display: block; font-size: 12.5px; font-weight: 600; color: var(--ink); margin-bottom: 6px; }
  .form-group .hint { font-size: 11px; color: var(--muted); font-weight: 400; margin-left: 6px; }

  .form-group input, .form-group select, .form-group textarea {
    width: 100%; padding: 11px 14px;
    border-radius: 10px; border: 1.5px solid #e6e2d5;
    font-size: 13.5px; font-family: 'Inter', sans-serif;
    background: var(--paper); transition: all .2s ease;
  }
  .form-group textarea { resize: vertical; min-height: 90px; line-height: 1.6; }
  .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
    outline: none; border-color: var(--cobalt); background: #fff;
    box-shadow: 0 0 0 4px rgba(61,90,255,0.1);
  }
  .form-group select:disabled { opacity: .55; cursor: not-allowed; }

  .field-error { color: #c0392b; font-size: 11.5px; margin-top: 5px; }

  /* skills tag input */
  .tags-box {
    display: flex; flex-wrap: wrap; gap: 8px;
    border: 1.5px solid #e6e2d5; border-radius: 10px; padding: 10px 12px;
    background: var(--paper);
  }
  .tags-box:focus-within { border-color: var(--cobalt); background: #fff; box-shadow: 0 0 0 4px rgba(61,90,255,0.1); }
  .skill-tag {
    display: flex; align-items: center; gap: 7px;
    background: rgba(61,90,255,0.1); color: var(--cobalt);
    font-size: 12.5px; font-weight: 600;
    padding: 5px 8px 5px 12px; border-radius: 999px;
  }
  .skill-tag button { background: none; border: none; color: var(--cobalt); cursor: pointer; font-size: 11px; padding: 0; display: flex; }
  .tags-box input {
    flex: 1; min-width: 120px; border: none; background: transparent;
    font-size: 13.5px; padding: 5px 4px; font-family: 'Inter', sans-serif;
  }
  .tags-box input:focus { outline: none; box-shadow: none; }

  /* repeatable experience / education block */
  .repeat-block {
    border: 1px solid var(--hairline); border-radius: 14px;
    padding: 18px 20px; margin-bottom: 14px; position: relative;
  }
  .repeat-block:last-of-type { margin-bottom: 0; }
  .repeat-block .remove-btn {
    position: absolute; top: 14px; right: 14px;
    width: 26px; height: 26px; border-radius: 8px;
    background: var(--paper); border: 1px solid var(--hairline);
    color: var(--muted); display: flex; align-items: center; justify-content: center;
    font-size: 11px; cursor: pointer; transition: all .2s ease;
  }
  .repeat-block .remove-btn:hover { background: rgba(224,92,107,0.1); border-color: var(--rose); color: var(--rose); }

  .current-check { display: flex; align-items: center; gap: 8px; font-size: 12.5px; color: var(--muted); margin-top: -6px; margin-bottom: 16px; }
  .current-check input { width: auto; }

  /* resume dropzone */
  .resume-dropzone {
    border: 1.5px dashed #ddd6c4; border-radius: 14px;
    padding: 28px 20px; text-align: center;
    background: var(--paper-2);
    transition: border-color .2s ease, background .2s ease;
    cursor: pointer;
  }
  .resume-dropzone:hover { border-color: var(--cobalt); background: #fff; }
  .resume-dropzone i { font-size: 26px; color: var(--cobalt); margin-bottom: 10px; display: block; }
  .resume-dropzone p { margin: 0 0 4px; font-size: 13.5px; font-weight: 600; color: var(--ink); }
  .resume-dropzone span { font-size: 11.5px; color: var(--muted); }
  .resume-dropzone input[type="file"] { display: none; }

  .uploaded-file-row {
    display: flex; align-items: center; gap: 12px;
    background: var(--paper-2); border-radius: 12px; padding: 12px 14px; margin-top: 14px;
  }
  .uploaded-file-row .file-icon {
    width: 38px; height: 38px; border-radius: 9px;
    background: rgba(224,92,107,0.12); color: var(--rose);
    display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0;
  }
  .uploaded-file-row .file-info { flex: 1; min-width: 0; }
  .uploaded-file-row h4 { margin: 0; font-size: 13px; font-weight: 600; color: var(--ink); }
  .uploaded-file-row span { font-size: 11.5px; color: var(--muted); }
  .uploaded-file-row .file-remove { color: var(--muted); cursor: pointer; font-size: 14px; }
  .uploaded-file-row .file-remove:hover { color: var(--rose); }

  /* resume tabs */
  .resume-tabs {
    display: flex; gap: 8px; margin-bottom: 18px;
    background: var(--paper); border-radius: 12px; padding: 4px;
  }
  .resume-tab-btn {
    flex: 1; text-align: center; padding: 9px 14px;
    border: none; background: transparent; border-radius: 9px;
    font-size: 13px; font-weight: 600; color: var(--muted);
    cursor: pointer; transition: background .2s ease, color .2s ease;
  }
  .resume-tab-btn.active { background: #fff; color: var(--ink); box-shadow: 0 2px 8px rgba(10,23,48,0.08); }
  .resume-tab-panel { display: none; }
  .resume-tab-panel.active { display: block; }

  .resume-create-box {
    text-align: center; padding: 32px 20px;
    background: var(--paper-2); border-radius: 14px;
    border: 1.5px dashed #ddd6c4;
  }
  .resume-create-box i { font-size: 26px; color: var(--cobalt); margin-bottom: 10px; display: block; }
  .resume-create-box p { margin: 0 0 16px; font-size: 13px; color: var(--muted); }
  .resume-create-box .btn-create-resume {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 22px; border-radius: 999px; font-weight: 600; font-size: 13.5px;
    background: linear-gradient(160deg, #16273f, #1b2f4d); color: #fff; border: none; cursor: pointer;
  }

  .resume-selected-preview {
    display: none; align-items: center; gap: 12px;
    background: var(--paper-2); border-radius: 12px; padding: 12px 14px; margin-top: 14px;
  }
  .resume-selected-preview.active { display: flex; }
  .resume-selected-preview .file-icon {
    width: 38px; height: 38px; border-radius: 9px;
    background: rgba(61,90,255,0.12); color: var(--cobalt);
    display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0;
  }
  .resume-selected-preview .file-info { flex: 1; min-width: 0; }
  .resume-selected-preview h4 { margin: 0; font-size: 13px; font-weight: 600; color: var(--ink); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
  .resume-selected-preview span { font-size: 11.5px; color: var(--muted); }
  .resume-selected-preview .file-remove { color: var(--muted); cursor: pointer; font-size: 14px; }
  .resume-selected-preview .file-remove:hover { color: var(--rose); }

  /* social links */
  .social-input-row { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
  .social-input-row:last-child { margin-bottom: 0; }
  .social-input-row .social-icon {
    width: 38px; height: 38px; border-radius: 10px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center; font-size: 15px; color: #fff;
  }
  .social-icon.linkedin { background: #0a66c2; }
  .social-icon.github { background: #24292e; }
  .social-icon.portfolio { background: linear-gradient(150deg, var(--gold), #e08d1f); color: var(--ink); }
  .social-input-row input { flex: 1; }

  /* sticky save bar */
  .save-bar {
    position: sticky; bottom: 0;
    background: #fff; border-top: 1px solid var(--hairline);
    padding: 16px 28px; margin: 0 -28px -80px;
    display: flex; align-items: center; justify-content: flex-end; gap: 12px;
    border-radius: 0 0 18px 18px;
  }
  .btn-cancel {
    padding: 11px 22px; border-radius: 999px; font-weight: 600; font-size: 13.5px;
    background: var(--paper); border: 1.5px solid var(--hairline); color: var(--ink);
    cursor: pointer;
  }
  .btn-save {
    padding: 11px 26px; border-radius: 999px; font-weight: 600; font-size: 13.5px;
    background: linear-gradient(160deg, #16273f, #1b2f4d); color: #fff;
    border: none; cursor: pointer;
    display: flex; align-items: center; gap: 8px;
    transition: transform .18s ease, box-shadow .18s ease;
  }
  .btn-save:hover { transform: translateY(-2px); box-shadow: 0 14px 28px rgba(10,23,48,0.3); }

  /* ===== MOBILE ===== */
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
    .content { padding: 20px 18px 60px; }

    .profile-header-card { flex-direction: column; text-align: center; padding: 26px 22px; }
    .profile-header-info .meta-row { justify-content: center; }
    .completion-pill { width: 100%; }

    .panel { padding: 20px 18px; }
    .form-row, .form-row-3 { grid-template-columns: 1fr; gap: 0; }

    .save-bar { flex-direction: column-reverse; align-items: stretch; margin: 0 -18px -60px; }
    .btn-save, .btn-cancel { width: 100%; justify-content: center; }
  }
</style>
</head>
<body>

<div class="dashboard-wrap">

  <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo"><i class="fas fa-briefcase"></i> LivejobsBD</div>

    <div class="side-section-label">Overview</div>
    <ul class="side-nav">
      <li><a href="{{ route('candidate.dashboard') }}"><i class="fas fa-grid-2"></i> Dashboard</a></li>
      <li><a href="{{ route('candidate.profile') }}" class="active"><i class="fas fa-user"></i> My Profile</a></li>
    </ul>

    <div class="side-section-label">Job Search</div>
    <ul class="side-nav">
      <li><a href="{{ route('jobs.index') }}"><i class="fas fa-magnifying-glass"></i> Find Jobs</a></li>
      <li><a href="{{ route('candidate.applications') }}"><i class="fas fa-file-lines"></i> Applied Jobs</a></li>
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

    <div class="topbar">
      <div style="display:flex; align-items:center; gap:14px;">
        <div class="menu-toggle-mobile" onclick="toggleSidebar()"><i class="fas fa-bars"></i></div>
        <div class="topbar-heading">
          <h1>My Profile</h1>
          <span>Keep your profile updated to get better job matches</span>
        </div>
      </div>
      <div class="topbar-actions">
        <div class="icon-btn"><i class="fas fa-bell"></i></div>
      </div>
    </div>

    <div class="content">

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form method="POST" action="{{ route('candidate.profile.update') }}" enctype="multipart/form-data" id="profileForm">
      @csrf


      <!-- Profile Header -->
      <div class="profile-header-card">
        <div class="avatar-upload">
          <div class="avatar-circle">
            @if(!empty($user->photo))
                <img src="{{ asset('storage/'.$user->photo) }}" alt="{{ $user->full_name }}">
            @else
                {{ strtoupper(substr($user->full_name, 0, 1)) }}
            @endif
          </div>
          <label class="camera-btn" for="avatarInput"><i class="fas fa-camera"></i></label>
          <input type="file" id="avatarInput" name="photo" accept="image/*" style="display:none;">
        </div>

        <div class="profile-header-info">
          <h2>{{ $user->full_name ?? 'Your Name' }}</h2>
          <div class="role-title">{{ $user->designation ?? 'Add a professional headline' }}</div>
          <div class="meta-row">
            <span><i class="fas fa-envelope"></i> {{ $user->email ?? 'you@example.com' }}</span>
            <span><i class="fas fa-map-marker-alt"></i> {{ $user->state->name ?? ''}},{{ $user->country->name ?? '' }}</span>
            <span><i class="fas fa-briefcase"></i> {{ $user->experience_level ?? 'Mid-level' }}</span>
          </div>
        </div>

        <div class="completion-pill">
          <div class="pct">{{ $profileCompletion ?? 70 }}%</div>
          <div class="lbl">PROFILE COMPLETE</div>
        </div>
      </div>

      <!-- Personal Details -->
      <div class="panel">
        <div class="panel-header"><h2><i class="fas fa-id-card"></i> Personal Details</h2></div>

        <div class="form-row">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" value="{{ old('full_name', $user->full_name ?? '') }}">
            @error('full_name')<div class="field-error">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Professional Headline <span class="hint">e.g. "Senior Laravel Developer"</span></label>
            <input type="text" name="designation" value="{{ old('designation', $user->designation ?? '') }}">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}">
            @error('email')<div class="field-error">{{ $message }}</div>@enderror
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}">
          </div>
        </div>

        <div class="form-row-4">
          <div class="form-group">
            <label>Country</label>
            <select name="country_id" id="countrySelect">
              <option value="" disabled {{ old('country_id', $user->country_id ?? '') ? '' : 'selected' }}>Select Country</option>
              @foreach($countries ?? [] as $country)
                <option value="{{ $country->id }}" {{ (old('country_id', $user->country_id ?? '') == $country->id) ? 'selected' : '' }}>
                  {{ $country->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>State / Division</label>
            <select name="state_id" id="stateSelect" disabled>
              <option value="" disabled {{ old('state_id', $user->state_id ?? '') ? '' : 'selected' }}>Select Country First</option>
              @foreach($states ?? [] as $state)
                <option value="{{ $state->id }}" data-parent="{{ $state->country_id }}" hidden
                  {{ (old('state_id', $user->state_id ?? '') == $state->id) ? 'selected' : '' }}>
                  {{ $state->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>District</label>
            <select name="district_id" id="districtSelect" disabled>
              <option value="" disabled {{ old('district_id', $user->district_id ?? '') ? '' : 'selected' }}>Select State First</option>
              @foreach($districts ?? [] as $district)
                <option value="{{ $district->id }}" data-parent="{{ $district->state_id }}" hidden
                  {{ (old('district_id', $user->district_id ?? '') == $district->id) ? 'selected' : '' }}>
                  {{ $district->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>City</label>
            <select name="city_id" id="citySelect" disabled>
              <option value="" disabled {{ old('city_id', $user->city_id ?? '') ? '' : 'selected' }}>Select District First</option>
              @foreach($cities ?? [] as $city)
                <option value="{{ $city->id }}" data-parent="{{ $city->district_id }}" hidden
                  {{ (old('city_id', $user->city_id ?? '') == $city->id) ? 'selected' : '' }}>
                  {{ $city->name }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Experience Level</label>
            <select name="experience_level">
              <option value="">Select Level</option>
              @foreach(['Entry-level','Mid-level','Senior','Lead / Manager'] as $lvl)
              <option value="{{ $lvl }}" {{ (old('experience_level', $user->experience_level ?? '') == $lvl) ? 'selected' : '' }}>{{ $lvl }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group"></div>
        </div>

        <div class="form-group">
          <label>About / Bio</label>
          <textarea name="bio" placeholder="Tell employers a bit about yourself...">{{ old('bio', $user->bio ?? '') }}</textarea>
        </div>
      </div>

      <!-- Skills -->
      <div class="panel">
        <div class="panel-header"><h2><i class="fas fa-star"></i> Skills</h2></div>

        <div class="form-group">
          <label>Add your key skills <span class="hint">press Enter to add</span></label>
          <div class="tags-box" id="skillsBox">
            <?php $skills = json_decode($user->skills)?>
            @foreach (( $skills ?? ['Laravel','MySQL','JavaScript']) as $skill)
            <span class="skill-tag">{{ $skill }} <button type="button" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
              <input type="hidden" name="skills[]" value="{{ $skill }}">
            </span>
            @endforeach
            <input type="text" id="skillInput" placeholder="Type a skill and press Enter">
          </div>
        </div>
      </div>

      <!-- Work Experience -->
      <div class="panel">
        <div class="panel-header">
          <h2><i class="fas fa-briefcase"></i> Work Experience</h2>
          <div class="add-btn" onclick="addExperienceBlock()"><i class="fas fa-plus"></i> Add Experience</div>
        </div>

        <div id="experienceContainer">
          @foreach ($experiences ?? [1] as $index => $exp)
          @php
            $expStart = optional($exp)->start_date ? \Carbon\Carbon::parse(optional($exp)->start_date)->format('Y-m') : '';
            $expEnd   = optional($exp)->end_date ? \Carbon\Carbon::parse(optional($exp)->end_date)->format('Y-m') : '';
          @endphp
          <div class="repeat-block">
            <div class="remove-btn" onclick="this.closest('.repeat-block').remove()"><i class="fas fa-times"></i></div>
            <div class="form-row">
              <div class="form-group">
                <label>Job Title</label>
                <input type="text" name="experience[{{ $index }}][job_title]"
                       value="{{ old('experience.'.$index.'.job_title', optional($exp)->job_title) }}"
                       placeholder="e.g. Backend Developer">
              </div>
              <div class="form-group">
                <label>Company Name</label>
                <input type="text" name="experience[{{ $index }}][company_name]"
                       value="{{ old('experience.'.$index.'.company_name', optional($exp)->company_name) }}"
                       placeholder="e.g. TechCorp Solutions">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Start Date</label>
                <input type="month" name="experience[{{ $index }}][start_date]"
                       value="{{ old('experience.'.$index.'.start_date', $expStart) }}">
              </div>
              <div class="form-group">
                <label>End Date</label>
                <input type="month" name="experience[{{ $index }}][end_date]"
                       value="{{ old('experience.'.$index.'.end_date', $expEnd) }}">
              </div>
            </div>
            <div class="current-check">
              <input type="checkbox" name="experience[{{ $index }}][current]" id="current{{ $index }}" value="1"
                     {{ old('experience.'.$index.'.current', optional($exp)->current) ? 'checked' : '' }}>
              <label for="current{{ $index }}">I currently work here</label>
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea name="experience[{{ $index }}][description]" placeholder="What did you work on?">{{ old('experience.'.$index.'.description', optional($exp)->description) }}</textarea>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Education -->
      <div class="panel">
        <div class="panel-header">
          <h2><i class="fas fa-graduation-cap"></i> Education</h2>
          <div class="add-btn" onclick="addEducationBlock()"><i class="fas fa-plus"></i> Add Education</div>
        </div>

        <div id="educationContainer">
          @foreach ($education ?? [1] as $index => $edu)
          <div class="repeat-block">
            <div class="remove-btn" onclick="this.closest('.repeat-block').remove()"><i class="fas fa-times"></i></div>
            <div class="form-row">
              <div class="form-group">
                <label>Degree / Certificate</label>
                <input type="text" name="education[{{ $index }}][degree]"
                       value="{{ old('education.'.$index.'.degree', optional($edu)->degree) }}"
                       placeholder="e.g. BSc in CSE">
              </div>
              <div class="form-group">
                <label>Institution</label>
                <input type="text" name="education[{{ $index }}][institution]"
                       value="{{ old('education.'.$index.'.institution', optional($edu)->institution) }}"
                       placeholder="e.g. University of Dhaka">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Start Year</label>
                <input type="number" name="education[{{ $index }}][start_year]"
                       value="{{ old('education.'.$index.'.start_year', optional($edu)->start_year) }}"
                       placeholder="2018">
              </div>
              <div class="form-group">
                <label>End Year</label>
                <input type="number" name="education[{{ $index }}][end_year]"
                       value="{{ old('education.'.$index.'.end_year', optional($edu)->end_year) }}"
                       placeholder="2022">
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Resume -->
      <div class="panel">
        <div class="panel-header"><h2><i class="fas fa-file-pdf"></i> Resume / CV</h2></div>

        <div class="resume-tabs">
          <button type="button" class="resume-tab-btn active" onclick="switchResumeTab('upload')" id="tabBtnUpload">Upload Resume</button>
          <button type="button" class="resume-tab-btn" onclick="switchResumeTab('create')" id="tabBtnCreate">Create Resume</button>
        </div>

        <!-- Upload tab -->
        <div class="resume-tab-panel active" id="resumeTabUpload">
          <label class="resume-dropzone" for="resumeInput" id="resumeDropzone">
            <i class="fas fa-cloud-arrow-up"></i>
            <p>Click to upload or drag & drop</p>
            <span>PDF or DOCX, max 5MB</span>
            <input type="file" id="resumeInput" name="resume" accept=".pdf,.doc,.docx">
          </label>

          <!-- Shows immediately when a new file is picked, before saving -->
          <div class="resume-selected-preview" id="resumeSelectedPreview">
            <div class="file-icon"><i class="fas fa-file-pdf"></i></div>
            <div class="file-info">
              <h4 id="resumeSelectedName"></h4>
              <span>Selected — will upload on Save</span>
            </div>
            <div class="file-remove" id="resumeSelectedRemove" title="Remove"><i class="fas fa-times"></i></div>
          </div>

          @if (!empty($user->resume))
          <div class="uploaded-file-row">
            <div class="file-icon"><i class="fas fa-file-pdf"></i></div>
            <div class="file-info">
              <h4>Resume on file</h4>
              <span>Uploaded {{ $user->resume_uploaded_at ?? 'recently' }}</span>
            </div>
            <a href="{{ asset('storage/'.$user->resume) }}" target="_blank" class="file-remove" title="View Resume">
              <i class="fas fa-eye"></i> View Resume
            </a>
          </div>
          @endif
        </div>

        <!-- Create tab -->
        <div class="resume-tab-panel" id="resumeTabCreate">
          <div class="resume-create-box">
            <i class="fas fa-file-circle-plus"></i>
            <p>Build a professional resume right here using your profile details — no design skills needed.</p>
            <a href="" class="btn-create-resume">
              <i class="fas fa-wand-magic-sparkles"></i> Start Building Resume
            </a>
          </div>
        </div>
      </div>

      <!-- Social Links -->
      <div class="panel">
        <div class="panel-header"><h2><i class="fas fa-link"></i> Social & Portfolio Links</h2></div>

        <div class="social-input-row">
          <div class="social-icon linkedin"><i class="fab fa-linkedin-in"></i></div>
          <input type="url" name="linkedin_url" placeholder="https://linkedin.com/in/yourname" value="{{ old('linkedin_url', $user->linkedin_url ?? '') }}">
        </div>
        <div class="social-input-row">
          <div class="social-icon github"><i class="fab fa-github"></i></div>
          <input type="url" name="github_url" placeholder="https://github.com/yourname" value="{{ old('github_url', $user->github_url ?? '') }}">
        </div>
        <div class="social-input-row">
          <div class="social-icon portfolio"><i class="fas fa-globe"></i></div>
          <input type="url" name="portfolio_url" placeholder="https://yourportfolio.com" value="{{ old('portfolio_url', $user->portfolio_url ?? '') }}">
        </div>
      </div>

      <!-- Save Bar -->
      <div class="save-bar">
        <button type="button" class="btn-cancel">Cancel</button>
        <button type="submit" class="btn-save"><i class="fas fa-check"></i> Save Changes</button>
      </div>

      </form>

    </div>
  </div>
</div>

<script>
function toggleSidebar() {
  document.getElementById('sidebar').classList.toggle('active');
  document.getElementById('sidebarOverlay').classList.toggle('active');
}

// Skills tag input
const skillInput = document.getElementById('skillInput');
skillInput.addEventListener('keydown', function (e) {
  if (e.key === 'Enter' && this.value.trim() !== '') {
    e.preventDefault();
    const value = this.value.trim();
    const tag = document.createElement('span');
    tag.className = 'skill-tag';
    tag.innerHTML = value + ' <button type="button" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>' +
                     '<input type="hidden" name="skills[]" value="' + value + '">';
    document.getElementById('skillsBox').insertBefore(tag, skillInput);
    this.value = '';
  }
});

// Add new blank experience block
let expIndex = document.querySelectorAll('#experienceContainer .repeat-block').length;
function addExperienceBlock() {
  const container = document.getElementById('experienceContainer');
  const block = document.createElement('div');
  block.className = 'repeat-block';
  block.innerHTML = `
    <div class="remove-btn" onclick="this.closest('.repeat-block').remove()"><i class="fas fa-times"></i></div>
    <div class="form-row">
      <div class="form-group"><label>Job Title</label><input type="text" name="experience[${expIndex}][job_title]" placeholder="e.g. Backend Developer"></div>
      <div class="form-group"><label>Company Name</label><input type="text" name="experience[${expIndex}][company_name]" placeholder="e.g. TechCorp Solutions"></div>
    </div>
    <div class="form-row">
      <div class="form-group"><label>Start Date</label><input type="month" name="experience[${expIndex}][start_date]"></div>
      <div class="form-group"><label>End Date</label><input type="month" name="experience[${expIndex}][end_date]"></div>
    </div>
    <div class="current-check">
      <input type="checkbox" name="experience[${expIndex}][current]" id="current${expIndex}" value="1">
      <label for="current${expIndex}">I currently work here</label>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea name="experience[${expIndex}][description]" placeholder="What did you work on?"></textarea>
    </div>
  `;
  container.appendChild(block);
  expIndex++;
}

// Add new blank education block
let eduIndex = document.querySelectorAll('#educationContainer .repeat-block').length;
function addEducationBlock() {
  const container = document.getElementById('educationContainer');
  const block = document.createElement('div');
  block.className = 'repeat-block';
  block.innerHTML = `
    <div class="remove-btn" onclick="this.closest('.repeat-block').remove()"><i class="fas fa-times"></i></div>
    <div class="form-row">
      <div class="form-group"><label>Degree / Certificate</label><input type="text" name="education[${eduIndex}][degree]" placeholder="e.g. BSc in CSE"></div>
      <div class="form-group"><label>Institution</label><input type="text" name="education[${eduIndex}][institution]" placeholder="e.g. University of Dhaka"></div>
    </div>
    <div class="form-row">
      <div class="form-group"><label>Start Year</label><input type="number" name="education[${eduIndex}][start_year]" placeholder="2018"></div>
      <div class="form-group"><label>End Year</label><input type="number" name="education[${eduIndex}][end_year]" placeholder="2022"></div>
    </div>
  `;
  container.appendChild(block);
  eduIndex++;
}

// Resume: inline preview instead of alert
const resumeInput = document.getElementById('resumeInput');
const resumeSelectedPreview = document.getElementById('resumeSelectedPreview');
const resumeSelectedName = document.getElementById('resumeSelectedName');
const resumeSelectedRemove = document.getElementById('resumeSelectedRemove');
const resumeDropzone = document.getElementById('resumeDropzone');

resumeInput.addEventListener('change', function () {
  if (this.files.length > 0) {
    resumeSelectedName.textContent = this.files[0].name;
    resumeSelectedPreview.classList.add('active');
    resumeDropzone.style.display = 'none';
  }
});

resumeSelectedRemove.addEventListener('click', function () {
  resumeInput.value = '';
  resumeSelectedPreview.classList.remove('active');
  resumeDropzone.style.display = '';
});

// Resume tabs: Upload vs Create
function switchResumeTab(tab) {
  document.getElementById('tabBtnUpload').classList.toggle('active', tab === 'upload');
  document.getElementById('tabBtnCreate').classList.toggle('active', tab === 'create');
  document.getElementById('resumeTabUpload').classList.toggle('active', tab === 'upload');
  document.getElementById('resumeTabCreate').classList.toggle('active', tab === 'create');
}

// Avatar preview
document.getElementById('avatarInput').addEventListener('change', function () {
  if (this.files.length > 0) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const circle = document.querySelector('.avatar-circle');
      circle.innerHTML = '';
      const img = document.createElement('img');
      img.src = e.target.result;
      circle.appendChild(img);
    };
    reader.readAsDataURL(this.files[0]);
  }
});

// ===== Country -> State -> District -> City cascade =====
function cascadeSelect(parentSelect, childSelect, placeholderText, preselectedChildId) {
  function filterOptions() {
    const parentId = parentSelect.value;
    let hasVisibleSelected = false;

    Array.from(childSelect.options).forEach(function (opt) {
      if (!opt.dataset.parent) return; // skip placeholder option
      const match = opt.dataset.parent === parentId;
      opt.hidden = !match;
      opt.disabled = !match;
      if (match && opt.selected) hasVisibleSelected = true;
    });

    childSelect.disabled = !parentId;
    childSelect.options[0].text = parentId ? placeholderText : childSelect.options[0].text;

    if (!hasVisibleSelected) {
      childSelect.value = '';
    }
    childSelect.dispatchEvent(new Event('change'));
  }

  parentSelect.addEventListener('change', filterOptions);
  filterOptions();

  if (preselectedChildId) {
    childSelect.value = preselectedChildId;
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const countrySelect = document.getElementById('countrySelect');
  const stateSelect = document.getElementById('stateSelect');
  const districtSelect = document.getElementById('districtSelect');
  const citySelect = document.getElementById('citySelect');

  cascadeSelect(countrySelect, stateSelect, 'Select State / Division', '{{ old('state_id', $user->state_id ?? '') }}');
  cascadeSelect(stateSelect, districtSelect, 'Select District', '{{ old('district_id', $user->district_id ?? '') }}');
  cascadeSelect(districtSelect, citySelect, 'Select City', '{{ old('city_id', $user->city_id ?? '') }}');
});
</script>

</body>
</html>