<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employer Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
    }
    .sidebar {
      width: 240px;
      background-color: #343a40;
      color: white;
      padding: 20px;
    }
    .sidebar a {
      color: #ccc;
      text-decoration: none;
      display: block;
      margin-bottom: 12px;
    }
    .sidebar a:hover {
      color: #fff;
    }
    .main-content {
      flex-grow: 1;
      padding: 30px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h4>Employer Panel</h4>
    <hr>
    <a href="{{ route('employer.dashboard') }}">Dashboard</a>
    <a href="#">Post a Job</a>
    <a href="{{route('employer.jobs.index')}}">Posted Jobs</a>
    <a href="{{route('employer.jobs.trash')}}">Trashed Jobs</a>
    <a href="{{route('employer.profile.edit')}}">Profile</a>

    <form method="POST" action="{{ route('employer.logout') }}" class="mt-3">
      @csrf
      <button class="btn btn-sm btn-danger w-100" type="submit">Logout</button>
    </form>
  </div>

  <div class="main-content">
    <h2>Welcome, {{ Auth::guard('employer')->user()->name }}</h2>
    <p class="text-muted">You are logged in as an employer under: <strong>{{ Auth::guard('employer')->user()->company_name }}</strong></p>

    <div class="mt-4">
      <a href="{{route('employer.job.create')}}" class="btn btn-primary">Post a New Job</a>
    </div>
  </div>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let msg = sessionStorage.getItem('success_message');

    if (msg) {
        Toast.fire({
            icon: 'success',
            title: msg
        });

        sessionStorage.removeItem('success_message');
    }
});
</script>



</body>


</html>
