@extends('admin.layouts.app')

@section('title', 'District Management')
@section('page-title', 'District')
@section('page-subtitle', 'Manage districts under each state/Division')

@section('content')

    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-sm" style="background:var(--navy);color:#fff;" data-bs-toggle="modal" data-bs-target="#addDistrictModal">
            <i class="fa-solid fa-plus me-1"></i> Add District
        </button>
    </div>

    <div class="card-soft p-0">
        <table class="table align-middle mb-0">
            <thead>
                <tr style="background:var(--paper);">
                    <th style="width:60px;">#</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th style="width:140px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($districts ?? [] as $district)
                    <tr>
                        <td class="mono text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-medium">{{ $district->name }}</td>
                        <td>{{ $district->state->name ?? '—' }}</td>
                        <td>{{ $district->country->name ?? '—' }}</td>
                        <td>
                            @if($district->status == 1)
                                <span class="badge badge-mint">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                    data-bs-toggle="modal" data-bs-target="#editDistrictModal{{ $district->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.district.destroy', $district->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure to delete this district?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editDistrictModal{{ $district->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.district.update', $district->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit District</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select name="country_id" class="form-select" id="edit_country_{{ $district->id }}" required>
                                                <option value="" disabled>Select Country</option>
                                                @foreach($countries ?? [] as $country)
                                                    <option value="{{ $country->id }}" {{ $district->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <select name="state_id" class="form-select" id="edit_state_{{ $district->id }}" required>
                                                <option value="" disabled>Select Country First</option>
                                                @foreach($states ?? [] as $state)
                                                    <option value="{{ $state->id }}" data-parent="{{ $state->country_id }}"
                                                        {{ $district->state_id == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">District</label>
                                            <input type="text" name="name" class="form-control" value="{{ $district->name }}" required>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" name="status" value="1"
                                                   {{ $district->status == 1 ? 'checked' : '' }}>
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
                        <td colspan="6" class="text-center text-muted py-4">No District Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($districts) && method_exists($districts, 'links'))
        <div class="mt-3">{{ $districts->links() }}</div>
    @endif

    <!-- Add Modal -->
    <div class="modal fade" id="addDistrictModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.district.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Districts</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Country <span class="text-danger">*</span></label>
                            <select name="country_id" id="add_country" class="form-select" required>
                                <option value="" disabled selected>Select Country</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">State <span class="text-danger">*</span></label>
                            <select name="state_id" id="add_state" class="form-select" required disabled>
                                <option value="" disabled selected>Selecert Country First</option>
                                @foreach($states ?? [] as $state)
                                    <option value="{{ $state->id }}" data-parent="{{ $state->country_id }}" hidden>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">District <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Dhaka" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn" style="background:var(--navy);color:#fff;">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function cascadeSelect(parentSelect, childSelect, preselectedChildId) {
        function filterOptions() {
            const parentId = parentSelect.value;
            let hasVisibleSelected = false;

            Array.from(childSelect.options).forEach(function (opt) {
                if (!opt.dataset.parent) return; // skip placeholder option
                const match = opt.dataset.parent === parentId;
                opt.hidden = !match;
                opt.disabled = !match;
                if (match && opt.selected) hasVisibleSelected = true;
            });

            childSelect.disabled = !parentId;
            if (!hasVisibleSelected) {
                childSelect.value = '';
            }
            childSelect.dispatchEvent(new Event('change'));
        }

        parentSelect.addEventListener('change', filterOptions);
        filterOptions();

        if (preselectedChildId) {
            childSelect.value = preselectedChildId;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Add modal
        cascadeSelect(
            document.getElementById('add_country'),
            document.getElementById('add_state'),
            null
        );

        // Edit modals
        @foreach($districts ?? [] as $district)
            cascadeSelect(
                document.getElementById('edit_country_{{ $district->id }}'),
                document.getElementById('edit_state_{{ $district->id }}'),
                '{{ $district->state_id }}'
            );
        @endforeach
    });
</script>
@endpush