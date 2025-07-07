
@extends('layouts.app') 
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2>{{ $job->job_title }}</h2>
            <p><strong>Company:</strong> {{ $job->employer->company_name ?? 'N/A' }}</p>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
            <p><strong>Salary:</strong>
                @if($job->salary_hidden)
                    <span class="text-muted">Negotiable</span>
                @else
                    {{ $job->salary_range }}
                @endif
            </p>
            <p><strong>Deadline:</strong> {{ $job->deadline }} {{ $job->application_deadline_time }}</p>

            <hr>

            <h4>Job Description</h4>
            <div>{!! nl2br(e($job->description)) !!}</div>

            @if($job->responsibilities)
            <h4 class="mt-4">Responsibilities</h4>
            <div>{!! nl2br(e($job->responsibilities)) !!}</div>
            @endif

            @if($job->requirements)
            <h4 class="mt-4">Requirements</h4>
            <div>{!! nl2br(e($job->requirements)) !!}</div>
            @endif

            <hr>

            <a href="mailto:{{ $job->application_email }}" class="btn btn-primary">
                Apply via Email
            </a>

            @if($job->application_link)
            <a href="{{ $job->application_link }}" target="_blank" class="btn btn-secondary">
                Apply Online
            </a>
            @endif
        </div>
    </div>
</div>
@endsection
