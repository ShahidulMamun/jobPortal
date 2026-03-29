<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Software Engineer - SpaceSoftBD | LivejobsBD</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

  :root {
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --primary-light: #eff6ff;
    --accent: #f59e0b;
    --text-dark: #0f172a;
    --text-mid: #475569;
    --text-light: #94a3b8;
    --border: #e2e8f0;
    --bg: #f8fafc;
    --white: #ffffff;
    --green: #10b981;
    --red: #ef4444;
    --shadow-sm: 0 1px 3px rgba(0,0,0,.08);
    --shadow-md: 0 4px 20px rgba(0,0,0,.10);
    --shadow-lg: 0 10px 40px rgba(37,99,235,.12);
    --radius: 14px;
    --radius-sm: 8px;
  }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--text-dark);
    line-height: 1.6;
  }

  /* ─── HEADER ─── */
  header {
    background: var(--white);
    border-bottom: 1px solid var(--border);
    position: sticky;
    top: 0;
    z-index: 999;
    box-shadow: var(--shadow-sm);
  }
  header .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
  header nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 70px;
  }
  .logo {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 800;
    font-size: 1.35rem;
    color: var(--primary);
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
  }
  .nav-links {
    display: flex;
    align-items: center;
    gap: 6px;
    list-style: none;
  }
  .nav-links a {
    text-decoration: none;
    color: var(--text-mid);
    font-weight: 500;
    font-size: .9rem;
    padding: 6px 12px;
    border-radius: var(--radius-sm);
    transition: all .2s;
  }
  .nav-links a:hover { color: var(--primary); background: var(--primary-light); }
  .btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 20px;
    border-radius: var(--radius-sm);
    font-weight: 600;
    font-size: .875rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
    cursor: pointer;
    border: none;
    text-decoration: none;
    transition: all .2s;
  }
  .btn-primary { background: var(--primary); color: white; }
  .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); box-shadow: 0 4px 14px rgba(37,99,235,.35); }
  .btn-outline { background: transparent; color: var(--primary); border: 1.5px solid var(--primary); }
  .btn-outline:hover { background: var(--primary); color: white; }
  .btn-green { background: var(--green); color: white; font-size: 1rem; padding: 14px 32px; }
  .btn-green:hover { background: #059669; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(16,185,129,.35); }

  /* ─── BREADCRUMB ─── */
  .breadcrumb-bar {
    background: var(--white);
    border-bottom: 1px solid var(--border);
    padding: 12px 0;
  }
  .breadcrumb-bar .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
  .breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: .85rem;
    color: var(--text-light);
  }
  .breadcrumb a { color: var(--primary); text-decoration: none; }
  .breadcrumb a:hover { text-decoration: underline; }
  .breadcrumb i { font-size: .7rem; }

  /* ─── MAIN LAYOUT ─── */
  .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
  .page-wrapper { padding: 40px 0 80px; }

  .content-grid {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 28px;
    align-items: start;
  }

  /* ─── JOB HERO CARD ─── */
  .job-hero-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 36px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border);
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
  }
  .job-hero-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), #60a5fa);
  }
  .job-top-row {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 20px;
  }
  .company-logo-big {
    width: 72px;
    height: 72px;
    background: linear-gradient(135deg, var(--primary) 0%, #60a5fa 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(37,99,235,.25);
  }
  .job-title-block h1 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.65rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 4px;
    line-height: 1.2;
  }
  .company-link {
    color: var(--primary);
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
  }
  .company-link:hover { text-decoration: underline; }

  .badge-row {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 22px;
  }
  .badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 14px;
    border-radius: 40px;
    font-size: .8rem;
    font-weight: 600;
  }
  .badge-blue { background: #dbeafe; color: #1d4ed8; }
  .badge-green { background: #d1fae5; color: #065f46; }
  .badge-orange { background: #fef3c7; color: #92400e; }
  .badge-purple { background: #ede9fe; color: #5b21b6; }

  .meta-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px 0;
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    margin-bottom: 22px;
  }
  .meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: .88rem;
    color: var(--text-mid);
  }
  .meta-item i { color: var(--primary); font-size: .9rem; }
  .meta-item strong { color: var(--text-dark); font-weight: 600; }

  .salary-highlight {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #ecfdf5, #d1fae5);
    border: 1.5px solid #6ee7b7;
    padding: 12px 20px;
    border-radius: var(--radius-sm);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 1.1rem;
    color: #065f46;
  }
  .salary-highlight i { color: var(--green); }

  /* ─── DESCRIPTION CARD ─── */
  .card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 32px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border);
    margin-bottom: 24px;
  }
  .card h2 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .card h2 .icon-circle {
    width: 34px;
    height: 34px;
    background: var(--primary-light);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: .85rem;
  }
  .card p {
    color: var(--text-mid);
    font-size: .93rem;
    line-height: 1.75;
    margin-bottom: 14px;
  }
  .card ul {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .card ul li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    color: var(--text-mid);
    font-size: .93rem;
    line-height: 1.6;
  }
  .card ul li i {
    color: var(--green);
    margin-top: 3px;
    flex-shrink: 0;
  }

  /* Tags */
  .tags-wrap { display: flex; flex-wrap: wrap; gap: 8px; }
  .tag {
    background: var(--primary-light);
    color: var(--primary);
    padding: 6px 14px;
    border-radius: 40px;
    font-size: .8rem;
    font-weight: 600;
    border: 1px solid #bfdbfe;
  }

  /* ─── SIDEBAR ─── */
  .sidebar { display: flex; flex-direction: column; gap: 22px; }

  .apply-card {
    background: linear-gradient(135deg, var(--primary) 0%, #1e40af 100%);
    border-radius: var(--radius);
    padding: 28px;
    box-shadow: var(--shadow-lg);
    color: white;
    text-align: center;
  }
  .apply-card h3 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 8px;
  }
  .apply-card p { font-size: .85rem; opacity: .85; margin-bottom: 20px; }
  .apply-card .deadline {
    background: rgba(255,255,255,.15);
    border-radius: var(--radius-sm);
    padding: 10px;
    margin-bottom: 20px;
    font-size: .82rem;
  }
  .apply-card .deadline strong { display: block; font-size: 1rem; margin-top: 2px; }
  .btn-white { background: white; color: var(--primary); font-weight: 700; width: 100%; justify-content: center; font-size: .95rem; padding: 13px; }
  .btn-white:hover { background: #eff6ff; transform: translateY(-2px); }
  .btn-save { background: rgba(255,255,255,.15); color: white; border: 1.5px solid rgba(255,255,255,.4); width: 100%; justify-content: center; margin-top: 10px; }
  .btn-save:hover { background: rgba(255,255,255,.25); }

  .info-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 24px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border);
  }
  .info-card h3 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 18px;
    color: var(--text-dark);
    border-bottom: 1px solid var(--border);
    padding-bottom: 12px;
  }
  .info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px dashed var(--border);
    font-size: .85rem;
  }
  .info-row:last-child { border-bottom: none; }
  .info-row .label { color: var(--text-light); display: flex; align-items: center; gap: 6px; }
  .info-row .label i { color: var(--primary); }
  .info-row .value { font-weight: 600; color: var(--text-dark); }

  .company-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 24px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border);
    text-align: center;
  }
  .company-card .logo-wrap {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, var(--primary) 0%, #60a5fa 100%);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    margin: 0 auto 14px;
    box-shadow: 0 4px 12px rgba(37,99,235,.2);
  }
  .company-card h3 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    font-size: 1.05rem;
    margin-bottom: 4px;
  }
  .company-card .category {
    color: var(--text-light);
    font-size: .82rem;
    margin-bottom: 12px;
  }
  .company-stats {
    display: flex;
    justify-content: center;
    gap: 20px;
    padding: 12px 0;
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    margin: 12px 0;
  }
  .cstat { text-align: center; }
  .cstat strong {
    display: block;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    color: var(--primary);
    font-size: 1rem;
  }
  .cstat span { font-size: .75rem; color: var(--text-light); }

  /* Similar Jobs */
  .similar-job {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    padding: 12px 0;
    border-bottom: 1px dashed var(--border);
    text-decoration: none;
    color: inherit;
    transition: all .2s;
  }
  .similar-job:last-child { border-bottom: none; }
  .similar-job:hover .sj-title { color: var(--primary); }
  .sj-logo {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: var(--primary-light);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: .9rem;
    flex-shrink: 0;
  }
  .sj-title { font-weight: 600; font-size: .88rem; margin-bottom: 2px; transition: color .2s; }
  .sj-meta { font-size: .78rem; color: var(--text-light); }
  .sj-salary { font-size: .78rem; color: var(--green); font-weight: 600; margin-top: 2px; }

  /* ─── SHARE BAR ─── */
  .share-bar {
    background: var(--white);
    border-radius: var(--radius);
    padding: 18px 24px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
  }
  .share-bar span { font-weight: 600; font-size: .9rem; }
  .share-icons { display: flex; gap: 8px; }
  .share-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .9rem;
    cursor: pointer;
    transition: all .2s;
    text-decoration: none;
  }
  .si-fb { background: #1877f2; color: white; }
  .si-tw { background: #1da1f2; color: white; }
  .si-li { background: #0a66c2; color: white; }
  .si-wa { background: #25d366; color: white; }
  .si-cp { background: var(--bg); color: var(--text-mid); border: 1px solid var(--border); }
  .share-icon:hover { transform: translateY(-2px); opacity: .85; }

  /* ─── FOOTER ─── */
  footer {
    background: #0f172a;
    color: #94a3b8;
    padding: 50px 0 24px;
    margin-top: 60px;
  }
  footer .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
  .footer-content { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 40px; }
  .footer-section h3 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: white;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 16px;
  }
  .footer-section p { font-size: .85rem; line-height: 1.7; }
  .footer-section ul { list-style: none; }
  .footer-section ul li { margin-bottom: 8px; }
  .footer-section ul li a { color: #94a3b8; text-decoration: none; font-size: .85rem; transition: color .2s; }
  .footer-section ul li a:hover { color: white; }
  .social-links { display: flex; gap: 10px; margin-top: 16px; }
  .social-links a {
    width: 36px;
    height: 36px;
    background: rgba(255,255,255,.08);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: .85rem;
    text-decoration: none;
    transition: all .2s;
  }
  .social-links a:hover { background: var(--primary); }
  .footer-bottom {
    border-top: 1px solid rgba(255,255,255,.08);
    padding-top: 24px;
    text-align: center;
    font-size: .82rem;
  }

  /* ─── ANIMATIONS ─── */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(24px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .job-hero-card { animation: fadeUp .5s ease both; }
  .card:nth-child(2) { animation: fadeUp .5s .1s ease both; }
  .card:nth-child(3) { animation: fadeUp .5s .2s ease both; }
  .card:nth-child(4) { animation: fadeUp .5s .3s ease both; }
  .apply-card { animation: fadeUp .5s .1s ease both; }

  /* ─── RESPONSIVE ─── */
  @media (max-width: 900px) {
    .content-grid { grid-template-columns: 1fr; }
    .sidebar { order: -1; }
    .footer-content { grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 580px) {
    .job-top-row { flex-direction: column; }
    .meta-row { gap: 12px; }
    .footer-content { grid-template-columns: 1fr; }
    .nav-links { display: none; }
    .job-hero-card { padding: 24px; }
  }

  /* ─── REPORT LINK ─── */
  .report-link { font-size: .8rem; color: var(--text-light); display: flex; align-items: center; gap: 4px; text-decoration: none; justify-content: center; margin-top: 12px; }
  .report-link:hover { color: var(--red); }

  /* posted time */
  .posted-time { font-size: .8rem; color: var(--text-light); margin-top: 6px; display: flex; align-items: center; gap: 4px; }
</style>
</head>
<body>

<!-- Header -->
<header>
  <div class="container">
    <nav>
      <a href="#" class="logo"><i class="fas fa-briefcase"></i> LivejobsBD</a>
      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Find Jobs</a></li>
        <li><a href="#">Companies</a></li>
        <li><a href="#">Candidates</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#" class="btn btn-outline">Login</a></li>
        <li><a href="#" class="btn btn-primary">Post a Job</a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
  <div class="container">
    <div class="breadcrumb">
      <a href="#">Home</a>
      <i class="fas fa-chevron-right"></i>
      <a href="#">Find Jobs</a>
      <i class="fas fa-chevron-right"></i>
      <a href="#">IT & Development</a>
      <i class="fas fa-chevron-right"></i>
      <span>Software Engineer</span>
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
              <h1>{{$job->job_title}}</h1>
              <a href="#" class="company-link">{{$job->company_name}}</a>
              <div class="posted-time"><i class="fas fa-clock"></i> Posted 2 days ago</div>
            </div>
          </div>

          <div class="badge-row">
            <span class="badge badge-blue"><i class="fas fa-briefcase"></i> {{ucwords(str_replace("-"," ", $job->job_type))}}</span>
            <span class="badge badge-green"><i class="fas fa-map-marker-alt"></i> {{$job->location}}</span>
            <span class="badge badge-orange"><i class="fas fa-layer-group"></i> {{$job->job_level}}</span>
            <span class="badge badge-purple"><i class="fas fa-code"></i> {{$job->category->name}}</span>
          </div>

          <div class="meta-row">
            <div class="meta-item"><i class="fas fa-calendar-alt"></i> <div><span>Deadline</span><br><strong>{{Carbon\Carbon::parse($job->deadline)->format('d M Y')}}</strong></div></div>
            <div class="meta-item"><i class="fas fa-graduation-cap"></i> <div><span>Education</span><br><strong>BSc in CSE</strong></div></div>
            <div class="meta-item"><i class="fas fa-history"></i> <div><span>Experience</span><br><strong>2 - 5 Years</strong></div></div>
            <div class="meta-item"><i class="fas fa-users"></i> <div><span>Vacancy</span><br><strong>3 Positions</strong></div></div>
          </div>

          <div class="salary-highlight">
            <i class="fas fa-money-bill-wave"></i>
            BDT {{$job->salary_range}}
          </div>
        </div>

        <!-- Share Bar -->
        <div class="share-bar" style="margin-bottom:24px;">
          <span><i class="fas fa-share-alt" style="color:var(--primary);margin-right:6px;"></i> Share this job</span>
          <div class="share-icons">
            <a href="#" class="share-icon si-fb"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="share-icon si-tw"><i class="fab fa-twitter"></i></a>
            <a href="#" class="share-icon si-li"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="share-icon si-wa"><i class="fab fa-whatsapp"></i></a>
            <a href="#" class="share-icon si-cp" title="Copy link"><i class="fas fa-link"></i></a>
          </div>
        </div>

        <!-- Job Description -->
        <div class="card">
          <h2><span class="icon-circle"><i class="fas fa-file-alt"></i></span> Job Description</h2>
           <p>
            {{$job->description}}
          </p>
        </div>

        <!-- Responsibilities -->
        <div class="card">
          <h2><span class="icon-circle"><i class="fas fa-tasks"></i></span> Responsibilities</h2>
          <ul>
            <li><i class="fas fa-check-circle"></i> Design, develop, and maintain robust, scalable, and efficient web applications.</li>
            <li><i class="fas fa-check-circle"></i> Collaborate with product and design teams to translate business requirements into technical solutions.</li>
            <li><i class="fas fa-check-circle"></i> Write clean, well-documented, and testable code following best practices.</li>
            <li><i class="fas fa-check-circle"></i> Perform code reviews and provide constructive feedback to team members.</li>
            <li><i class="fas fa-check-circle"></i> Debug and resolve software defects and production issues in a timely manner.</li>
            <li><i class="fas fa-check-circle"></i> Participate in agile ceremonies including sprint planning, standups, and retrospectives.</li>
            <li><i class="fas fa-check-circle"></i> Stay up to date with emerging technologies and industry trends.</li>
            <li><i class="fas fa-check-circle"></i> Contribute to architecture decisions and technical roadmaps.</li>
          </ul>
        </div>

        <!-- Requirements -->
        <div class="card">
          <h2><span class="icon-circle"><i class="fas fa-clipboard-check"></i></span> Requirements</h2>
          <ul>
            <li><i class="fas fa-check-circle"></i> BSc in Computer Science, Software Engineering, or related field.</li>
            <li><i class="fas fa-check-circle"></i> 2–5 years of professional software development experience.</li>
            <li><i class="fas fa-check-circle"></i> Strong proficiency in one or more programming languages (Java, Python, JavaScript, etc.).</li>
            <li><i class="fas fa-check-circle"></i> Experience with web frameworks such as Laravel, Django, React, or Node.js.</li>
            <li><i class="fas fa-check-circle"></i> Solid understanding of databases (MySQL, PostgreSQL, MongoDB).</li>
            <li><i class="fas fa-check-circle"></i> Familiarity with version control systems, particularly Git.</li>
            <li><i class="fas fa-check-circle"></i> Knowledge of REST API design and integration.</li>
            <li><i class="fas fa-check-circle"></i> Good communication skills in both Bengali and English.</li>
          </ul>
        </div>

        <!-- Benefits -->
        <div class="card">
          <h2><span class="icon-circle"><i class="fas fa-gift"></i></span> Benefits</h2>
          <ul>
            <li><i class="fas fa-star" style="color:var(--accent);"></i> Competitive salary package (BDT 50,000 – 70,000/month)</li>
            <li><i class="fas fa-star" style="color:var(--accent);"></i> Two festival bonuses per year</li>
            <li><i class="fas fa-star" style="color:var(--accent);"></i> Annual performance-based salary increment</li>
            <li><i class="fas fa-star" style="color:var(--accent);"></i> Provident fund & gratuity benefits</li>
            <li><i class="fas fa-star" style="color:var(--accent);"></i> Health insurance coverage for employee & family</li>
            <li><i class="fas fa-star" style="color:var(--accent);"></i> Flexible working hours (Hybrid model available)</li>
            <li><i class="fas fa-star" style="color:var(--accent);"></i> Training & professional development opportunities</li>
            <li><i class="fas fa-star" style="color:var(--accent);"></i> Friendly and collaborative work culture</li>
          </ul>
        </div>

        <!-- Skills -->
        <div class="card">
          <h2><span class="icon-circle"><i class="fas fa-tags"></i></span> Skills Required</h2>
          <div class="tags-wrap">
            @php $skills = explode(',',$job->skills) @endphp

            @foreach($skills as $skill)

            <a  href=" " style="text-decoration: none"> <span class="tag">{{$skill}}</span> </a>
           @endforeach
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
            <strong>30 March 2026</strong>
          </div>
          <a href="#" class="btn btn-white">
            <i class="fas fa-paper-plane"></i> Apply Now
          </a>
          <a href="#" class="btn btn-save">
            <i class="fas fa-bookmark"></i> Save Job
          </a>
          <a href="#" class="report-link">
            <i class="fas fa-flag"></i> Report this job
          </a>
        </div>

        <!-- Job Overview -->
        <div class="info-card">
          <h3><i class="fas fa-info-circle" style="color:var(--primary);margin-right:6px;"></i> Job Overview</h3>
          <div class="info-row">
            <span class="label"><i class="fas fa-briefcase"></i> Job Type</span>
            <span class="value">Full Time</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-map-marker-alt"></i> Location</span>
            <span class="value">Dhaka</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-money-bill"></i> Salary</span>
            <span class="value" style="color:var(--green);">50k – 70k</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-layer-group"></i> Level</span>
            <span class="value">Mid Level</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-history"></i> Experience</span>
            <span class="value">2 – 5 Years</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-graduation-cap"></i> Education</span>
            <span class="value">BSc in CSE</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-users"></i> Vacancy</span>
            <span class="value">3 Positions</span>
          </div>
          <div class="info-row">
            <span class="label"><i class="fas fa-calendar-alt"></i> Deadline</span>
            <span class="value" style="color:var(--red);">30 Mar 2026</span>
          </div>
        </div>

        <!-- Company Card -->
        <div class="company-card">
          <div class="logo-wrap"><i class="fas fa-code"></i></div>
          <h3>SpaceSoftBD</h3>
          <p class="category">Information Technology</p>
          <div class="company-stats">
            <div class="cstat"><strong>12</strong><span>Open Jobs</span></div>
            <div class="cstat"><strong>5+</strong><span>Years</span></div>
            <div class="cstat"><strong>80+</strong><span>Employees</span></div>
          </div>
          <a href="#" class="btn btn-outline" style="width:100%;justify-content:center;">
            <i class="fas fa-building"></i> View Company
          </a>
        </div>

        <!-- Similar Jobs -->
        <div class="info-card">
          <h3><i class="fas fa-th-list" style="color:var(--primary);margin-right:6px;"></i> Similar Jobs</h3>

          <a href="#" class="similar-job">
            <div class="sj-logo"><i class="fas fa-code"></i></div>
            <div>
              <div class="sj-title">IT Engineer</div>
              <div class="sj-meta">DebugBD · Dhaka</div>
              <div class="sj-salary">40k – 60k / Month</div>
            </div>
          </a>

          <a href="#" class="similar-job">
            <div class="sj-logo"><i class="fas fa-laptop-code"></i></div>
            <div>
              <div class="sj-title">Junior Developer</div>
              <div class="sj-meta">TechCorp Solutions · Dhaka</div>
              <div class="sj-salary">25k – 40k / Month</div>
            </div>
          </a>

          <a href="#" class="similar-job">
            <div class="sj-logo"><i class="fas fa-server"></i></div>
            <div>
              <div class="sj-title">Backend Engineer</div>
              <div class="sj-meta">SoftNova BD · Chittagong</div>
              <div class="sj-salary">60k – 90k / Month</div>
            </div>
          </a>

          <a href="#" class="similar-job">
            <div class="sj-logo"><i class="fas fa-mobile-alt"></i></div>
            <div>
              <div class="sj-title">Android Developer</div>
              <div class="sj-meta">AppMaker BD · Remote</div>
              <div class="sj-salary">45k – 65k / Month</div>
            </div>
          </a>

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
        <h3><i class="fas fa-briefcase"></i> JobPortal</h3>
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
          <li><a href="#">Browse Jobs</a></li>
          <li><a href="#">Browse Categories</a></li>
          <li><a href="#">Candidate Dashboard</a></li>
          <li><a href="#">Job Alerts</a></li>
          <li><a href="#">My Bookmarks</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>For Employers</h3>
        <ul>
          <li><a href="#">Post a Job</a></li>
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
      <p>&copy; 2026 JobPortal. All rights reserved. Designed with <i class="fas fa-heart" style="color:#e74c3c;"></i> for job seekers worldwide.</p>
    </div>
  </div>
</footer>

<script>
// Copy link button
document.querySelector('.si-cp')?.addEventListener('click', function(e) {
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