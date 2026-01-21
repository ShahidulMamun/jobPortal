<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JobPortal - Find Your Dream Job</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        overflow-x: hidden; /* horizontal scroll fix */
    }

    a { text-decoration: none; }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        width: 100%;
    }

    /* Header & Navigation */
    header {
        background: #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
        animation: slideDown 1s ease;
    }

    @keyframes slideDown {
        from { transform: translateY(-100%); opacity:0; }
        to { transform: translateY(0); opacity:1; }
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        flex-wrap: wrap;
    }

    .logo {
        font-size: 1.8rem;
        font-weight: bold;
        color: #086613;
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 1.5rem;
        align-items: center;
        flex-wrap: wrap;
    }

    .nav-links a {
        color: #333;
        font-weight: 500;
        transition: color 0.3s;
    }

    .nav-links a:hover {
        color: #086613;
    }

    .btn {
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
    }

    .btn-primary {
        background: #086613;
        color: white;
    }

    .btn-primary:hover {
        background: #3730a3;
    }

    .btn-outline {
        border: 2px solid #086613;
        color: #086613;
        background: transparent;
    }

    .btn-outline:hover {
        background: #086613;
        color: white;
    }

    .menu-toggle {
        display: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #333;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #086613 0%, #1e2a20 100%);
        color: white;
        padding: 4rem 0;
        position: relative;
        overflow: hidden;
    }

    .hero::after {
        content:"";
        position:absolute;
        width:500px;
        height:500px;
        top:-100px;
        right:-100px;
        background: rgba(255,255,255,0.1);
        border-radius:50%;
        animation: float 8s ease-in-out infinite;
    }

    @keyframes float {
        0%,100% { transform: translateY(0);}
        50% { transform: translateY(20px);}
    }

    .hero-content { text-align: center; margin-bottom: 3rem; }
    .hero h1 { font-size: 3rem; margin-bottom: 1rem; animation: fadeIn 1.5s ease; }
    .hero p { font-size: 1.2rem; opacity: 0.9; animation: fadeIn 2s ease; }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px);}
        to { opacity: 1; transform: translateY(0);}
    }

    .search-box {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        max-width: 100%;
        overflow: hidden;
    }

    .search-form {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr auto;
        gap: 1rem;
    }

    .search-input {
        padding: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        width: 100%;
    }

    .search-input:focus { outline:none; border-color:#086613; }


    /* Job Categories Section */
.job-categories {
    padding: 3rem 0;
    background: #f8fafc;
}

.job-categories .section-header {
    text-align: center;
    margin-bottom: 2rem;
}

.job-categories .section-header h2 {
    font-size: 2rem;
    color: #1e293b;
}

.job-categories .section-header p {
    color: #4b5563;
    font-size: 1rem;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1.5rem;
}

.category-card {
    background: white;
    border-radius: 10px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.category-card i {
    font-size: 2rem;
    color: #086613;
    margin-bottom: 0.5rem;
}

.category-card h3 {
    margin-bottom: 0.3rem;
    font-size: 1.1rem;
    color: #111827;
}

.category-card p {
    color: #6b7280;
    font-size: 0.9rem;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}


    /* Stats Section */
    .stats {
        background: linear-gradient(135deg,#f3f4f6 0%,#e0e7ff 100%);
        padding: 3rem 0;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
        gap: 2rem;
        text-align: center;
    }

    .stat-item {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        opacity:0;
        transform: translateY(20px);
        transition: all 0.8s ease;
    }

    .stat-item.active { opacity:1; transform: translateY(0); }

    .stat-item i { font-size:2.5rem; color:#086613; margin-bottom:1rem; }
    .stat-item h3 { font-size:2rem; color:#086613; margin-bottom:0.5rem; }
    .stat-item p { color:#666; }

    /* Sections */
    .section { padding: 4rem 0; }
    .section-header { text-align:center; margin-bottom:3rem; opacity:0; transform:translateY(20px); transition: all 0.8s ease; }
    .section-header.active { opacity:1; transform:translateY(0); }
    .section-header h2 { font-size:2.5rem; margin-bottom:0.5rem; color:#1e293b; }
    .section-header p { color:#666; font-size:1.1rem; }

    /* Jobs Grid */
    .jobs-grid { display: grid; grid-template-columns: repeat(auto-fit,minmax(280px,1fr)); gap:2rem; }
    .job-card {
        background:white;
        border:1px solid #e2e8f0;
        border-radius:10px;
        padding:1.5rem;
        transition: all 0.3s;
        cursor: pointer;
    }

    .job-card:hover {
        box-shadow:0 10px 30px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }

    .job-header { display:flex; align-items:start; gap:1rem; margin-bottom:1rem; }
    .company-logo { width:60px; height:60px; background:#f1f5f9; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.5rem; color:#086613; }
    .job-info h3 { font-size:1.2rem; margin-bottom:0.3rem; }
    .company-name { color:#666; font-size:0.9rem; }
    .job-meta { display:flex; gap:1rem; margin:1rem 0; flex-wrap:wrap; }
    .meta-item { display:flex; align-items:center; gap:0.3rem; color:#666; font-size:0.9rem; }
    .meta-item i { color:#086613; }
    .job-tags { display:flex; gap:0.5rem; flex-wrap:wrap; margin:1rem 0; }
    .tag { background:#e0e7ff; color:#086613; padding:0.3rem 0.8rem; border-radius:20px; font-size:0.85rem; }
    .job-footer { display:flex; justify-content:space-between; align-items:center; margin-top:1rem; padding-top:1rem; border-top:1px solid #e2e8f0; }
    .salary { font-weight:bold; color:#16a34a; }

    /* Companies & Candidates */
    .companies-grid, .candidates-grid { display:grid; grid-template-columns: repeat(auto-fit,minmax(250px,1fr)); gap:2rem; }

    .company-card, .candidate-card {
        background:white;
        border:1px solid #e2e8f0;
        border-radius:10px;
        padding:2rem;
        text-align:center;
        transition: all 0.3s;
    }

    .company-card:hover, .candidate-card:hover { box-shadow:0 10px 30px rgba(0,0,0,0.1); }

    .candidate-avatar { width:100px; height:100px; background: linear-gradient(135deg,#086613,#1e2a20); border-radius:50%; margin:0 auto 1rem; display:flex; align-items:center; justify-content:center; color:white; font-size:2.5rem; font-weight:bold; }

    .candidate-card h3 { margin-bottom:0.3rem; }
    .candidate-card .role { color:#666; margin-bottom:1rem; }
    .skills { display:flex; gap:0.5rem; flex-wrap:wrap; justify-content:center; margin:1rem 0; }

    /* CTA Section */
    .cta { background: linear-gradient(135deg,#086613 0%,#1e2a20 100%); color:white; padding:4rem 0; text-align:center; }
    .cta h2 { font-size:2.5rem; margin-bottom:1rem; }
    .cta p { font-size:1.2rem; margin-bottom:2rem; opacity:0.9; }
    .cta-buttons { display:flex; gap:1rem; justify-content:center; flex-wrap:wrap; }
    .btn-white { background:white; color:#086613; }
    .btn-white:hover { background:#f1f5f9; }

    /* Footer */
    footer { background:#1e293b; color:white; padding:3rem 0 1rem; }
    .footer-content { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:2rem; margin-bottom:2rem; }
    .footer-section h3 { margin-bottom:1rem; color:#086613; font-size:1.2rem; }
    .footer-section p, .footer-section a { color:#cbd5e1; }
    .footer-section a:hover { color:white; }
    .social-links { display:flex; gap:1rem; margin-top:1rem; }
    .social-links a { width:40px; height:40px; background:#334155; border-radius:50%; display:flex; align-items:center; justify-content:center; transition: all 0.3s; }
    .social-links a:hover { background:#086613; transform:translateY(-3px); }
    .footer-bottom { text-align:center; padding-top:2rem; border-top:1px solid #334155; color:#cbd5e1; }

    /* Responsive */
    @media(max-width:768px){
        .menu-toggle { display:block; }
        .nav-links {
            position: fixed;
            left: -100%;
            top: 70px;
            flex-direction: column;
            background: white;
            width: 100%;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: left 0.3s;
        }
        .nav-links.active { left:0; }
        .hero h1 { font-size:2rem; }
        .search-form { grid-template-columns: 1fr; }
    }
</style>
</head>
<body>

<!-- Header -->
<header>
<div class="container">
<nav>
<div class="logo"><i class="fas fa-briefcase"></i> JobPortal</div>
<ul class="nav-links" id="navLinks">
<li><a href="#home">Home</a></li>
<li><a href="#jobs">Find Jobs</a></li>
<li><a href="#companies">Companies</a></li>
<li><a href="#candidates">Candidates</a></li>
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="#" class="btn btn-outline">Login</a></li>
<li><a href="#" class="btn btn-primary">Post a Job</a></li>
</ul>
<div class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></div>
</nav>
</div>
</header>

<!-- Hero Section -->
<section class="hero" id="home">
<div class="container">
<div class="hero-content">
<h1>Find Your Dream Job Today</h1>
<p>Discover thousands of job opportunities with all the information you need</p>
</div>
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
<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
</form>
</div>
</div>
</section>


<!-- Job Categories Section -->
<section class="job-categories">
  <div class="container">
    <div class="section-header">
      <h2>Job Categories</h2>
      <p>Explore jobs by top categories</p>
    </div>
    <div class="categories-grid">
      <div class="category-card">
        <i class="fas fa-code"></i>
        <h3>IT & Development</h3>
        <p>4,512 Jobs</p>
      </div>
      <div class="category-card">
        <i class="fas fa-bullhorn"></i>
        <h3>Marketing</h3>
        <p>3,120 Jobs</p>
      </div>
      <div class="category-card">
        <i class="fas fa-paint-brush"></i>
        <h3>Design</h3>
        <p>2,845 Jobs</p>
      </div>
      <div class="category-card">
        <i class="fas fa-chart-line"></i>
        <h3>Finance</h3>
        <p>1,980 Jobs</p>
      </div>
      <div class="category-card">
        <i class="fas fa-users"></i>
        <h3>Human Resources</h3>
        <p>1,245 Jobs</p>
      </div>
    </div>
  </div>
</section>



<!-- Stats Section -->
<section class="stats">
<div class="container">
<div class="stats-grid">
<div class="stat-item"><i class="fas fa-briefcase"></i><h3>12,845</h3><p>Available Jobs</p></div>
<div class="stat-item"><i class="fas fa-building"></i><h3>3,254</h3><p>Popular Companies</p></div>
<div class="stat-item"><i class="fas fa-users"></i><h3>25,680</h3><p>Active Candidates</p></div>
<div class="stat-item"><i class="fas fa-file-alt"></i><h3>18,920</h3><p>CVs Uploaded</p></div>
</div>
</div>
</section>

<!-- Jobs Section -->
<section class="section" id="jobs">
<div class="container">
<div class="section-header"><h2>Latest Jobs</h2><p>Explore the newest job opportunities posted today</p></div>
<div class="jobs-grid">
<div class="job-card">
<div class="job-header"><div class="company-logo"><i class="fas fa-code"></i></div>
<div class="job-info"><h3>Senior Frontend Developer</h3><p class="company-name">TechCorp Solutions</p></div></div>
<div class="job-meta"><span class="meta-item"><i class="fas fa-map-marker-alt"></i> New York, USA</span><span class="meta-item"><i class="fas fa-clock"></i> Full Time</span></div>
<div class="job-tags"><span class="tag">React</span><span class="tag">JavaScript</span><span class="tag">CSS</span></div>
<div class="job-footer"><span class="salary">$80k - $120k</span><a href="#" class="btn btn-outline">Apply Now</a></div>
</div>
<div class="job-card">
<div class="job-header"><div class="company-logo"><i class="fas fa-paint-brush"></i></div>
<div class="job-info"><h3>UI/UX Designer</h3><p class="company-name">Creative Studios</p></div></div>
<div class="job-meta"><span class="meta-item"><i class="fas fa-map-marker-alt"></i> London, UK</span><span class="meta-item"><i class="fas fa-clock"></i> Remote</span></div>
<div class="job-tags"><span class="tag">Figma</span><span class="tag">Adobe XD</span></div>
<div class="job-footer"><span class="salary">$60k - $90k</span><a href="#" class="btn btn-outline">Apply Now</a></div>
</div>
<div class="job-card">
<div class="job-header"><div class="company-logo"><i class="fas fa-chart-line"></i></div>
<div class="job-info"><h3>Marketing Manager</h3><p class="company-name">Global Marketing Inc</p></div></div>
<div class="job-meta"><span class="meta-item"><i class="fas fa-map-marker-alt"></i> San Francisco</span><span class="meta-item"><i class="fas fa-clock"></i> Full Time</span></div>
<div class="job-tags"><span class="tag">SEO</span><span class="tag">Content</span></div>
<div class="job-footer"><span class="salary">$70k - $100k</span><a href="#" class="btn btn-outline">Apply Now</a></div>
</div>
</div>
<div style="text-align:center; margin-top:3rem;"><a href="#" class="btn btn-primary">View All Jobs</a></div>
</div>
</section>

<!-- Companies Section -->
<section class="section" style="background:#f8fafc;" id="companies">
<div class="container">
<div class="section-header"><h2>Popular Companies</h2><p>Explore top companies hiring now</p></div>
<div class="companies-grid">
<div class="company-card"><div class="company-logo"><i class="fas fa-code"></i></div><h3>TechCorp Solutions</h3><p>Information Technology</p><p class="job-count">45 Open Positions</p></div>
<div class="company-card"><div class="company-logo"><i class="fas fa-building"></i></div><h3>Global Finance Corp</h3><p>Banking & Finance</p><p class="job-count">28 Open Positions</p></div>
<div class="company-card"><div class="company-logo"><i class="fas fa-heart"></i></div><h3>HealthCare Plus</h3><p>Healthcare</p><p class="job-count">32 Open Positions</p></div>
<div class="company-card"><div class="company-logo"><i class="fas fa-graduation-cap"></i></div><h3>EduLearn Platform</h3><p>Education</p><p class="job-count">19 Open Positions</p></div>
</div>
</div>
</section>

<!-- Candidates Section -->
<section class="section" id="candidates">
<div class="container">
<div class="section-header"><h2>Featured Candidates</h2><p>Connect with talented professionals</p></div>
<div class="candidates-grid">
<div class="candidate-card"><div class="candidate-avatar">JS</div><h3>John Smith</h3><p class="role">Senior Web Developer</p><div class="skills"><span class="tag">React</span><span class="tag">Node.js</span></div><a href="#" class="btn btn-outline">View Profile</a></div>
<div class="candidate-card"><div class="candidate-avatar">SE</div><h3>Sarah Evans</h3><p class="role">UX Designer</p><div class="skills"><span class="tag">Figma</span><span class="tag">UI Design</span></div><a href="#" class="btn btn-outline">View Profile</a></div>
<div class="candidate-card"><div class="candidate-avatar">MP</div><h3>Michael Park</h3><p class="role">Data Analyst</p><div class="skills"><span class="tag">Python</span><span class="tag">SQL</span></div><a href="#" class="btn btn-outline">View Profile</a></div>
<div class="candidate-card"><div class="candidate-avatar">EJ</div><h3>Emily Johnson</h3><p class="role">Marketing Specialist</p><div class="skills"><span class="tag">SEO</span><span class="tag">Content</span></div><a href="#" class="btn btn-outline">View Profile</a></div>
</div>
</div>
</section>

<!-- CTA Section -->
<section class="cta">
<div class="container">
<h2>Ready to Take the Next Step?</h2>
<p>Join thousands of professionals finding their dream jobs</p>
<div class="cta-buttons">
<a href="#" class="btn btn-white">Create Free Account</a>
<a href="#" class="btn btn-outline" style="color:white; border-color:white;">Upload Your CV</a>
</div>
</div>
</section>

<!-- Footer -->
<footer>
<div class="container">
<div class="footer-content">
<div class="footer-section"><h3><i class="fas fa-briefcase"></i> JobPortal</h3>
<p>Your trusted partner in finding the perfect career opportunity. Connect with top employers and discover your dream job.</p>
<div class="social-links"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-linkedin-in"></i></a><a href="#"><i class="fab fa-instagram"></i></a></div>
</div>
<div class="footer-section"><h3>For Candidates</h3><ul><li><a href="#">Browse Jobs</a></li><li><a href="#">Browse Categories</a></li><li><a href="#">Candidate Dashboard</a></li><li><a href="#">Job Alerts</a></li><li><a href="#">My Bookmarks</a></li></ul></div>
<div class="footer-section"><h3>For Employers</h3><ul><li><a href="#">Post a Job</a></li><li><a href="#">Browse Candidates</a></li><li><a href="#">Employer Dashboard</a></li><li><a href="#">Applications</a></li><li><a href="#">Pricing Plans</a></li></ul></div>
<div class="footer-section"><h3>Quick Links</h3><ul><li><a href="#">About Us</a></li><li><a href="#">Contact Us</a></li><li><a href="#">Career Advice</a></li><li><a href="#">FAQs</a></li><li><a href="#">Terms & Conditions</a></li><li><a href="#">Privacy Policy</a></li></ul></div>
</div>
<div class="footer-bottom"><p>&copy; 2026 JobPortal. All rights reserved. Designed with <i class="fas fa-heart" style="color:#e74c3c;"></i> for job seekers worldwide.</p></div>
</div>
</footer>

<script>
// Mobile Menu Toggle
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');
menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    const icon = menuToggle.querySelector('i');
    icon.classList.toggle('fa-bars');
    icon.classList.toggle('fa-times');
});

// Smooth scroll
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

// Animate stats & section headers on scroll
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
