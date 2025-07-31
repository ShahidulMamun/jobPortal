@extends('layouts.app')
@section('content')
<h2>Your Posted Jobs</h2>

@if($job->count() > 0)
    
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
@else
    <p>You have not posted any jobs yet.</p>
@endif

@include('partials.toast')
@endsection
