<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
        <a href="{{route('admin.active.jobs')}}">Active Jobs</a>
        <a href="{{route('admin.trashed.jobs')}}"><i class="fa fa-trash" aria-hidden="true"></i>Trash</a>
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
         <h3>Applicants for: {{ $job->title }}</h3>

       <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Cover Latter</th>
            <th>CV</th>
            <th>Applied At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($job->jobApplications as $application)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $application->user->name }}</td>
            <td>{{ $application->user->email }}</td>
            <td>{{ $application->cover_letter }}</td>
            <td>
                @if($application->cv_path)
                    <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank" class="btn btn-sm btn-primary">
                        View CV
                    </a>
                    <a href="{{ asset('storage/' . $application->cv_path) }}" download class="btn btn-sm btn-secondary">
                        Download
                    </a>
                @else
                    <span class="text-danger">No CV</span>
                @endif
            </td>

            <td>{{ $application->created_at->format('d M, Y h:i A') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

    </div>

</body>
</html>






