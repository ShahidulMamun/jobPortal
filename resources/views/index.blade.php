<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Livejobsbd - Find Your Dream Job</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
@vite('resources/css/style.css')

</head>
<body>

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
<li><a href="{{route('register')}}" class="btn btn-primary">Post a Job</a></li>
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
