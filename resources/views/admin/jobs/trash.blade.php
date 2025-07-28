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
        <a href="{{route('admin.trashed.jobs')}}">Trash</a>
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
          <table class="table table-bordered">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Deleted At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trashedJobs as $job)
            <tr>
                <td>{{ $job->job_title }}</td>
                <td>{{ $job->deleted_at->diffForHumans() }}</td>
                <td>
                    <form action="{{ route('admin.job.restore', $job->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-success btn-sm">Restore</button>
                    </form>

                    <form action="{{ route('admin.job.forceDelete', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Permanent Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
@include('partials.toast')
</body>
</html>

