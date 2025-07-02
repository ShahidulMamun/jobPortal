@extends('layouts.app') {{-- অথবা আপনার main layout --}}

@section('content')
<div class="container max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Employer Registration</h2>

    <form method="POST" action="{{ route('employer.register.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name">Your Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control" required>
            @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="email">Company Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="phone">Phone (optional)</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-full">Register</button>
    </form>
</div>
@endsection
