@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      <h4>Edit Job</h4>
    </div>
    <div class="card-body">

      <form method="POST" action="{{ route('employer.jobs.update', $job->id) }}">
        @csrf
        @method('PUT')

        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Job Title</label>
            <input type="text" name="job_title" value="{{ old('job_title', $job->job_title) }}" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label>Job Category</label>
            <select name="category" class="form-control" required>
              <option value="">Select Category</option>
              @foreach($categories as $id => $name)
                <option value="{{ $id }}" {{ $job->category == $id ? 'selected' : '' }}>{{ $name }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label>Job Type</label>
            <select name="job_type" class="form-select">
              @foreach(['Full-time', 'Part-time', 'Contract', 'Internship'] as $type)
                <option {{ $job->job_type == $type ? 'selected' : '' }}>{{ $type }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label>Job Level</label>
            <select name="job_level" class="form-select">
              @foreach(['Entry', 'Mid', 'Senior'] as $level)
                <option {{ $job->job_level == $level ? 'selected' : '' }}>{{ $level }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label>Vacancy</label>
            <input type="number" name="vacancy" value="{{ old('vacancy', $job->vacancy) }}" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Location</label>
            <input type="text" name="location" value="{{ old('location', $job->location) }}" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Remote Available?</label><br>
            <input type="checkbox" name="remote_available" value="1" {{ $job->remote_available ? 'checked' : '' }}> Yes
          </div>

          <div class="col-md-6 mb-3">
            <label>Salary Range</label>
            <input type="text" name="salary_range" value="{{ old('salary_range', $job->salary_range) }}" class="form-control">
            <div class="form-check mt-2">
              <input type="checkbox" class="form-check-input" name="salary_hidden" value="1" {{ $job->salary_hidden ? 'checked' : '' }}>
              <label class="form-check-label">Hide Salary from public</label>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label>Application Deadline</label>
            <input type="date" name="deadline" value="{{ old('deadline', \Carbon\Carbon::parse($job->deadline)->format('Y-m-d')) }}" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Application Deadline Time</label>
            <input type="time" name="application_deadline_time" value="{{ old('application_deadline_time', $job->application_deadline_time) }}" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Application Email</label>
            <input type="email" name="application_email" value="{{ old('application_email', $job->application_email) }}" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Application Link</label>
            <input type="url" name="application_link" value="{{ old('application_link', $job->application_link) }}" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Tags</label>
            <input type="text" name="tags" value="{{ old('tags', $job->tags) }}" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Skills</label>
            <input type="text" name="skills" value="{{ old('skills', $job->skills) }}" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Gender</label>
            <select name="gender" class="form-select">
              @foreach(['Any', 'Male', 'Female'] as $gender)
                <option {{ $job->gender == $gender ? 'selected' : '' }}>{{ $gender }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label>Age Limit</label>
            <input type="text" name="age_limit" value="{{ old('age_limit', $job->age_limit) }}" class="form-control">
          </div>

          <div class="mb-3">
            <label>Job Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $job->description) }}</textarea>
          </div>

          <div class="mb-3">
            <label>Responsibilities</label>
            <textarea name="responsibilities" class="form-control" rows="3">{{ old('responsibilities', $job->responsibilities) }}</textarea>
          </div>

          <div class="mb-3">
            <label>Requirements</label>
            <textarea name="requirements" class="form-control" rows="3">{{ old('requirements', $job->requirements) }}</textarea>
          </div>

          <div class="mb-3">
            <label>Education Requirements</label>
            <textarea name="education_requirements" class="form-control" rows="2">{{ old('education_requirements', $job->education_requirements) }}</textarea>
          </div>

          <div class="mb-3">
            <label>Experience Requirements</label>
            <textarea name="experience_requirements" class="form-control" rows="2">{{ old('experience_requirements', $job->experience_requirements) }}</textarea>
          </div>

          <div class="mb-3">
            <label>Job Benefits</label>
            <textarea name="job_benefits" class="form-control" rows="2">{{ old('job_benefits', $job->job_benefits) }}</textarea>
          </div>

          <div class="mb-3">
            <label>Apply Instruction</label>
            <textarea name="apply_instruction" class="form-control" rows="2">{{ old('apply_instruction', $job->apply_instruction) }}</textarea>
          </div>

          <div class="mb-3">
            <label>Job Language</label>
            <select name="job_language" class="form-select">
              <option value="en" {{ $job->job_language == 'en' ? 'selected' : '' }}>English</option>
              <option value="bn" {{ $job->job_language == 'bn' ? 'selected' : '' }}>Bengali</option>
            </select>
          </div>

          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="is_featured" value="1" {{ $job->is_featured ? 'checked' : '' }}>
            <label class="form-check-label">Feature this Job</label>
          </div>

        </div>

        <button type="submit" class="btn btn-primary w-100">Update Job</button>
      </form>
    </div>
  </div>
</div>
@endsection
