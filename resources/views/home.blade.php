<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Portal Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background: linear-gradient(to right, #4e54c8, #8f94fb);
      color: white;
      padding: 100px 20px;
      text-align: center;
    }

    .search-input {
      max-width: 500px;
      margin: 0 auto;
    }

    .job-category {
      transition: 0.3s;
    }

    .job-category:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .navbar-brand {
      font-weight: bold;
      color: #4e54c8 !important;
    }
  </style>
</head>
<body>

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/">MyJobs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          {{-- User Buttons --}}
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">User Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">User Register</a></li>

          {{-- Employer Buttons --}}
          <li class="nav-item"><a class="nav-link" href="{{ route('employer.login') }}">Employer Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('employer.register') }}">Employer Register</a></li>

          {{-- Admin (optional) --}}
          {{-- <li class="nav-item"><a class="nav-link" href="{{ route('admin.login') }}">Admin</a></li> --}}
        </ul>
      </div>
    </div>
  </nav>

  {{-- Hero --}}
  <section class="hero">
    <div class="container">
      <h1 class="display-5 fw-bold">Find Your Dream Job</h1>
      <p class="lead">Search thousands of job listings and apply easily</p>

      <form action="#" method="GET" class="search-input mt-4">
        <input type="text" class="form-control form-control-lg" placeholder="Search by job title or keyword">
      </form>
    </div>
  </section>

  {{-- Categories --}}
  <section class="py-5 bg-light">
    <div class="container">
      <h3 class="mb-4 text-center">Browse by Category</h3>
      <div class="row g-4">
        @foreach (['IT', 'Marketing', 'Design', 'Finance', 'Education', 'Healthcare'] as $category)
          <div class="col-md-4">
            <div class="p-4 bg-white rounded shadow-sm job-category text-center">
              <h5 class="mb-0">{{ $category }}</h5>
              <small class="text-muted">Explore {{ $category }} jobs</small>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Latest Jobs --}}
  <section class="py-5">
    <div class="container">
      <h3 class="mb-4 text-center">Latest Jobs</h3>

      <div class="list-group">
        @for ($i = 1; $i <= 5; $i++)
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <div>
              <h6 class="mb-1">Frontend Developer</h6>
              <small>Company {{ $i }} • Dhaka, Bangladesh</small>
            </div>
            <span class="badge bg-primary rounded-pill">Full-time</span>
          </a>
        @endfor
      </div>
    </div>
  </section>

  {{-- Footer --}}
  <footer class="text-center py-4 bg-light mt-5">
    <small>&copy; {{ date('Y') }} MyJob Portal. All rights reserved.</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
