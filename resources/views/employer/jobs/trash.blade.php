@extends('layouts.app')
@section('content')
<h2>Your Posted Jobs</h2>

@if($jobs->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Category</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job->job_title }}</td>
                    <td>{{ $job->category }}</td>
                    <td>{{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}</td>
                    <td>
                        @if($job->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('employer.jobs.edit', $job->id) }}" class="btn btn-primary btn-sm">Edit</a>

                     <form action="{{ route('employer.job.restore', $job->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to restore this job?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-success">Restore</button>
                    </form>


                         <form action="{{ route('employer.job.forceDelete', $job->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this job parmanently?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Permanent Delete</button>
                    </form>
                        {{-- Add Delete or View actions if needed --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $jobs->links() }} {{-- Pagination links --}}
@else
    <p>You have not posted any jobs yet.</p>
@endif

@include('partials.toast')
@endsection
