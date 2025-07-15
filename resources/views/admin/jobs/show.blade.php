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
        <a href="{{route('admin.pending.jobs')}}">Pending Jobs</a>
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

@section('title', 'Job Details')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Job Details: {{ $job->job_title }}</h2>

    <table class="table table-bordered">
        <tr>
            <th>Job Title</th>
            <td>{{ $job->job_title }}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>{{ $job->company_name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Job Type</th>
            <td>{{ ucfirst($job->job_type) }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $job->category }}</td>
        </tr>
        <tr>
            <th>Location</th>
            <td>{{ $job->location ?? 'Remote' }}</td>
        </tr>
        <tr>
            <th>Vacancy</th>
            <td>{{ $job->vacancy }}</td>
        </tr>
        <tr>
            <th>Deadline</th>
            <td>{{ $job->deadline ? $job->deadline->format('d M, Y') : 'N/A' }} at {{ $job->application_deadline_time }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                @if($job->is_approved)
                    <span class="badge badge-success">Approved</span>
                @else
                    <span class="badge badge-warning">Pending</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{!! nl2br(e($job->description)) !!}</td>
        </tr>
        <tr>
            <th>Responsibilities</th>
            <td>{!! nl2br(e($job->responsibilities)) !!}</td>
        </tr>
        <tr>
            <th>Requirements</th>
            <td>{!! nl2br(e($job->requirements)) !!}</td>
        </tr>
    </table>

    <a href="{{ route('admin.pending.jobs') }}" class="btn btn-sm btn-secondary">← Back to List</a>

     <form action="{{route('admin.job.approve',$job->id)}}" method="POST" class="d-inline-block">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Approve this job?')">Approve</button>
    </form>

    <form action="{{ route('admin.job.reject', $job->id) }}" method="POST" class="d-inline">
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Reject this job?')">Reject</button>
</form>

</div>
@endsection

    </div>

</body>
</html>

