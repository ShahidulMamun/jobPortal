@extends('admin.layouts.app')

@section('title', 'State Management')
@section('page-title', 'State / Division')
@section('page-subtitle', 'Manage states or divisions under each country')

@section('content')

    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-sm" style="background:var(--navy);color:#fff;" data-bs-toggle="modal" data-bs-target="#addStateModal">
            <i class="fa-solid fa-plus me-1"></i> Add State
        </button>
    </div>

    <div class="card-soft p-0">
        <table class="table align-middle mb-0">
            <thead>
                <tr style="background:var(--paper);">
                    <th style="width:60px;">#</th>
                    <th>State Name</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th style="width:140px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($states ?? [] as $state)
                    <tr>
                        <td class="mono text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-medium">{{ $state->name }}</td>
                        <td>{{ $state->country->name ?? '—' }}</td>
                        <td>
                            @if($state->status == 1)
                                <span class="badge badge-mint">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                    data-bs-toggle="modal" data-bs-target="#editStateModal{{ $state->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.state.destroy', $state->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are sure to delete this state?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editStateModal{{ $state->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.state.update', $state->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit State</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select name="country_id" class="form-select" required>
                                                @foreach($countries ?? [] as $country)
                                                    <option value="{{ $country->id }}" {{ $state->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">State Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $state->name }}" required>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" name="status" value="1"
                                                   {{ $state->status == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn" style="background:var(--navy);color:#fff;">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No State Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($states) && method_exists($states, 'links'))
        <div class="mt-3">{{ $states->links() }}</div>
    @endif

    <!-- Add Modal -->
    <div class="modal fade" id="addStateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.state.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New State </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Country <span class="text-danger">*</span></label>
                            <select name="country_id" class="form-select" required>
                                <option value="" disabled selected>Select Country</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">State Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="যেমনঃ Dhaka Division" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn" style="background:var(--navy);color:#fff;">Add State</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection