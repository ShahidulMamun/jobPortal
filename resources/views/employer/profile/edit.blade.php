@extends('layouts.app')

@section('content')
<div class="container max-w-lg mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Update Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('employeer.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', auth('employeer')->user()->name) }}" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Company Name</label>
            <input type="text" name="company_name" value="{{ old('company_name', auth('employeer')->user()->company_name) }}" class="form-control">
            @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', auth('employeer')->user()->email) }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', auth('employeer')->user()->phone) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
