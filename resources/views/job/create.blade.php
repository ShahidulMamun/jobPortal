@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      <h4>Post a New Job</h4>
    </div>
    <div class="card-body">



      <form method="POST" action="{{ route('employeer.job.store') }}">
        @csrf

        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Job Title</label>
            <input type="text" name="job_title" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label>Job Category</label>
            <input type="text" name="category" class="form-control" placeholder="e.g. IT, Sales">
          </div>

          <div class="col-md-6 mb-3">
            <label>Job Type</label>
            <select name="job_type" class="form-select">
              <option>Full-time</option>
              <option>Part-time</option>
              <option>Contract</option>
              <option>Internship</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label>Job Level</label>
            <select name="job_level" class="form-select">
              <option>Entry</option>
              <option>Mid</option>
              <option>Senior</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label>Vacancy</label>
            <input type="number" name="vacancy" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Remote Available?</label><br>
            <input type="checkbox" name="remote_available" value="1"> Yes
          </div>

          <div class="col-md-6 mb-3">
            <label>Salary Range</label>
            <input type="text" name="salary_range" class="form-control" placeholder="e.g. 25k - 40k">
            <div class="form-check mt-2">
              <input type="checkbox" class="form-check-input" name="salary_hidden" value="1">
              <label class="form-check-label">Hide Salary from public</label>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label>Application Deadline</label>
            <input type="date" name="deadline" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Application Deadline Time</label>
            <input type="time" name="application_deadline_time" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Application Email</label>
            <input type="email" name="application_email" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Application Link</label>
            <input type="url" name="application_link" class="form-control">
          </div>

          <div class="col-md-6 mb-3">
            <label>Tags (comma separated)</label>
            <input type="text" name="tags" class="form-control" placeholder="e.g. Laravel, Remote, SEO">
          </div>

          <div class="col-md-6 mb-3">
            <label>Skills</label>
            <input type="text" name="skills" class="form-control" placeholder="e.g. HTML, CSS, PHP">
          </div>

          <div class="col-md-6 mb-3">
            <label>Gender</label>
            <select name="gender" class="form-select">
              <option>Any</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>

          <div class="col-md-6 mb-3">
            <label>Age Limit</label>
            <input type="text" name="age_limit" class="form-control" placeholder="e.g. 22-35">
          </div>

          <div class="mb-3">
            <label>Job Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
          </div>

          <div class="mb-3">
            <label>Responsibilities</label>
            <textarea name="responsibilities" class="form-control" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label>Requirements</label>
            <textarea name="requirements" class="form-control" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label>Education Requirements</label>
            <textarea name="education_requirements" class="form-control" rows="2"></textarea>
          </div>

          <div class="mb-3">
            <label>Experience Requirements</label>
            <textarea name="experience_requirements" class="form-control" rows="2"></textarea>
          </div>

          <div class="mb-3">
            <label>Job Benefits</label>
            <textarea name="job_benefits" class="form-control" rows="2" placeholder="e.g. Lunch, Bonus, Festival Bonus"></textarea>
          </div>

          <div class="mb-3">
            <label>Apply Instruction</label>
            <textarea name="apply_instruction" class="form-control" rows="2"></textarea>
          </div>

          <div class="mb-3">
            <label>Job Language</label>
            <select name="job_language" class="form-select">
              <option value="en">English</option>
              <option value="bn">Bengali</option>
            </select>
          </div>

          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="is_featured" value="1">
            <label class="form-check-label">Feature this Job</label>
          </div>
        </div>

        <button type="submit" class="btn btn-success w-100">Post Job</button>
      </form>
    </div>
  </div>
</div>

@include('partials.toast')
@endsection
