@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Job Post</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Job Title</label>
            <input type="text" name="job_title" class="form-control" value="{{ old('job_title', $job->job_title) }}" required>
            @error('job_title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category', $job->category) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- অন্যান্য ফিল্ড গুলো একই রকম ইনপুট, এখানে শুধু উদাহরণস্বরূপ ২টা দিলাম -->

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5" required>{{ old('description', $job->description) }}</textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remote_available" class="form-check-input" id="remote_available" {{ old('remote_available', $job->remote_available) ? 'checked' : '' }}>
            <label class="form-check-label" for="remote_available">Remote Available</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="salary_hidden" class="form-check-input" id="salary_hidden" {{ old('salary_hidden', $job->salary_hidden) ? 'checked' : '' }}>
            <label class="form-check-label" for="salary_hidden">Salary Hidden</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured" {{ old('is_featured', $job->is_featured) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">Featured Job</label>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ old('status', $job->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $job->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
