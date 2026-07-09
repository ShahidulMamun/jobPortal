
@extends('layouts.app') 
@section('content')
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
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
                Apply via Email {{ $job->featured_badge }}
            </a>

            @if($job->application_link)
            <a href="{{ $job->application_link }}" target="_blank" class="btn btn-secondary">
                Apply Online
            </a>
            @endif

         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyJobModal">
          Apply Now
        </button>

        </div>
    </div>


    <!-- Apply Job Modal -->
<div class="modal fade" id="applyJobModal" tabindex="-1" role="dialog" aria-labelledby="applyJobModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('job.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="applyJobModalLabel">Apply for {{ $job->job_title }}</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          

           <!-- Message -->
          <div class="form-group">
            <label for="message">Cover Letter</label>
            <textarea name="cover_letter" rows="4" class="form-control" placeholder="Write something..."></textarea>
          </div>

          
          <!-- CV Upload -->
          <div class="form-group">
            <label for="cv">Upload CV (PDF only)</label>
            <input type="file" name="cv" class="form-control-file" accept=".pdf" required>
          </div>

         
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit Application</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

</div>

@include('partials.toast')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
