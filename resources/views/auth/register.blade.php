<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Livejobsbd - Find Your Dream Job</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
@vite('resources/css/app.css')
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




<!-- Register section -->
<section class="search-job pt-100 " style="margin-top: 100px;">
           <div class="container mt-5">
           

        <!-- User Type Selection -->
        <div class="user-type-container" style="margin-bottom: 183px;">
            <div class="card" onclick="openModal('employer')">
                <img src="https://img.icons8.com/fluency/96/company.png"/>
                <h3>Employer</h3>
                <p>Post jobs & hire top talent</p>
            </div>

            <div class="card" onclick="openModal('candidate')">
                <img src="https://img.icons8.com/fluency/96/users.png"/>
                <h3>Candidate</h3>
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
                        <label>Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus autocomplete="name">

                            @error('name')
                                <div style="color:red; margin-top:5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                                            
                    </div>

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
                     <div class="form-group">
                        <label>Confirm Password</label>
                         <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('Confirm Password') }}"  autocomplete="new-password">
                          @error('password_confirmation')
                            <div style="color:red; margin-top:5px;">
                                {{ $message }}
                            </div>
                          @enderror
                    </div>

                    <!-- Employer -->
                    <div id="employerFields" style="display:none;">
                        <div class="form-group">
                            <label>Company Name</label>
                              <input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}"  autocomplete="company_name">
                          @error('company_name')
                            <div style="color:red; margin-top:5px;">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>


                    <button type="submit">Create Account</button>
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
<a href="{{route('register')}}" class="btn btn-white">Create Free Account</a>
<a href="#" class="btn btn-outline" style="color:white; border-color:white;">Upload Your CV</a>
</div>
</div>
</section>

<!-- Footer -->
<footer>
<div class="container">
<div class="footer-content">
<div class="footer-section"><h3><i class="fas fa-briefcase"></i>JobPortal</h3>
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

<!-- scripts for modal open -->
<script>
function openModal(type) {
    document.getElementById('registerModal').style.display = 'flex';

    let form = document.getElementById('registerForm');

    if (type === 'employer') {
        form.action = "{{ route('employer.register.store') }}";
        document.getElementById('modalTitle').innerText = 'Employer Registration';
        document.getElementById('employerFields').style.display = 'block';
    } else {
        form.action = "{{ route('register') }}";
        document.getElementById('modalTitle').innerText = 'User Registration';
        document.getElementById('employerFields').style.display = 'none';
    }
}

function closeModal() {
    document.getElementById('registerModal').style.display = 'none';
}
</script>

<!-- scripts for data store -->

<script>
let registerForm = document.getElementById('registerForm');

registerForm.addEventListener('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(registerForm);

    fetch(registerForm.action, {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
        },
        body: formData
    })
    .then(async response => {
        let data = await response.json();

        if (!response.ok) {
            if (data.errors) {
                Object.values(data.errors).forEach(errArr => {
                    Toast.fire({
                        icon: 'error',
                        title: errArr[0]
                    });
                });
            }
            throw new Error('Validation failed');
        }

        return data;
    })
    .then(data => {
            sessionStorage.setItem('success_message', data.message);
            window.location.href = data.redirect
    })
    .catch(() => {});
});
</script>
</body>
</html>
