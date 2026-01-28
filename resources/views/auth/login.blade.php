<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Livejobsbd - Find Your Dream Job</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
@vite('resources/css/style.css')
@vite('resources/css/login.css')
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




<!-- login section -->

<section class="search-job pt-100 " style="margin-top: 113px;">
           <div class="container mt-5">
           

        <!-- User Type Selection -->
        <div class="user-type-container" style="margin-bottom: 183px;">
            <div class="card" onclick="openModal('employer')">
                <img src="https://img.icons8.com/fluency/96/company.png"/>
                <h3>Employer Login</h3>
                <p>Post jobs & hire top talent</p>
            </div>

            <div class="card" onclick="openModal('candidate')">
                <img src="https://img.icons8.com/fluency/96/users.png"/>
                <h3>User Login</h3>
                <p>Find jobs & grow your career</p>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="registerModal">
            <div class="modal-content">
                <div class="close" onclick="closeModal()">✖</div>
                <h2 id="modalTitle"></h2>

               <form method="POST" id="registerForm">
                    @csrf
                    <input type="hidden" name="user_type" id="userType">

                  

                    <div class="form-group">
                        <label>Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"  autocomplete="username">
                         @error('email')
                            <div style="color:red; margin-top:5px;">
                                {{ $message }}
                            </div>
                         @enderror
             
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                         <input id="password" type="password" name="password" value="{{ old('Password') }}"  autocomplete="new-password">
                          @error('password')
                            <div style="color:red; margin-top:5px;">
                                {{ $message }}
                            </div>
                          @enderror
                                 
                    </div>


                    <button type="submit">Login</button>
                </form>
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

@include('partials.toast')

<script>
function openModal(type) {
    document.getElementById('registerModal').style.display = 'flex';

    let form = document.getElementById('registerForm');

    if (type === 'employer') {
        form.action = "{{ route('employer.login') }}";
        document.getElementById('modalTitle').innerText = 'Employer Login';
        document.getElementById('employerFields').style.display = 'block';
    } else {
        form.action = "{{ route('login') }}";
        document.getElementById('modalTitle').innerText = 'User Login';
        document.getElementById('employerFields').style.display = 'none';
    }
}

function closeModal() {
    document.getElementById('registerModal').style.display = 'none';
}
</script>


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
