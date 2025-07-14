<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }
        .sidebar a:hover {
            color: #fff;
        }
        .main {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4>Admin Panel</h4>
        <hr>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{route('admin.pending.jobs')}}}">Pending Jobs</a>
        <a href="#">Users</a>
        <a href="#">Settings</a>
         <a href="{{route('admin.categories.list')}}">Add Category</a>
        <a href="{{route('admin.profile.edit')}}">Profile</a>

        <form action="{{ route('admin.logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
        </form>
    </div>

    <div class="main">
       @extends('layouts.admin')

@section('title', 'Unapproved Valid Jobs')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Unapproved & Valid Job Posts</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($jobs->isEmpty())
        <div class="alert alert-info">No valid unapproved jobs found.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Employer</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Deadline</th>
                        <th>Time</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $key => $job)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $job->job_title }}</td>
                            <td>{{ $job->company_name ?? 'N/A' }}</td>
                              <td>{{ $job->employer->name ?? 'N/A' }}</td>
                            <td>{{ ucfirst($job->job_type) }}</td>
                            <td>{{ $job->location ?? 'Remote' }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->application_deadline_time)->format('h:i A') }}</td>

                            <td>{{ $job->salary_range ?? 'Negotiat' }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary">View</a>

                                <form action="" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Approve this job?')">Approve</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
  


    </div>

</body>
</html>

