@extends('layouts.app')

@section('content')
<div class="container max-w-lg mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Update Profile</h2>

    <form action="{{ route('employer.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', auth('employer')->user()->name) }}" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Company Name</label>
            <input type="text" name="company_name" value="{{ old('company_name', auth('employer')->user()->company_name) }}" class="form-control">
            @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', auth('employer')->user()->email) }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', auth('employer')->user()->phone) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

@include('partials.toast')
@endsection
