@extends('admin.layouts.app')

@section('title', 'City Management')
@section('page-title', 'City')
@section('page-subtitle', 'Manage cities under each state')

@section('content')

    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-sm" style="background:var(--navy);color:#fff;" data-bs-toggle="modal" data-bs-target="#addCityModal">
            <i class="fa-solid fa-plus me-1"></i> Add City
        </button>
    </div>

    <div class="card-soft p-0">
        <table class="table align-middle mb-0">
            <thead>
                <tr style="background:var(--paper);">
                    <th style="width:60px;">#</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th style="width:140px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cities ?? [] as $city)
                    <tr>
                        <td class="mono text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-medium">{{ $city->name }}</td>
                        <td>{{ $city->state->name ?? '—' }}</td>
                        <td>{{ $city->state->country->name ?? '—' }}</td>
                        <td>
                            @if($city->status == 1)
                                <span class="badge badge-mint">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                    data-bs-toggle="modal" data-bs-target="#editCityModal{{ $city->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.city.destroy', $city->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure to delete this city?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editCityModal{{ $city->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.city.update', $city->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit City</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select class="form-select" id="edit_country_{{ $city->id }}">
                                                <option value="" disabled>Select Country</option>
                                                @foreach($countries ?? [] as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ optional($city->state)->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <select name="state_id" class="form-select" id="edit_state_{{ $city->id }}" required>
                                                <option value="" disabled>Select Country First</option>
                                                @foreach($states ?? [] as $state)
                                                    <option value="{{ $state->id }}" data-country="{{ $state->country_id }}"
                                                        {{ $city->state_id == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">City Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $city->name }}" required>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" name="status" value="1"
                                                   {{ $city->status == 1 ? 'checked' : '' }}>
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
                        <td colspan="6" class="text-center text-muted py-4">No City Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($cities) && method_exists($cities, 'links'))
        <div class="mt-3">{{ $cities->links() }}</div>
    @endif

    <!-- Add Modal -->
    <div class="modal fade" id="addCityModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.city.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New City</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Country <span class="text-danger">*</span></label>
                            <select id="add_country" class="form-select" required>
                                <option value="" disabled selected>Select Country</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">State <span class="text-danger">*</span></label>
                            <select name="state_id" id="add_state" class="form-select" required disabled>
                                <option value="" disabled selected>Select Country First</option>
                                @foreach($states ?? [] as $state)
                                    <option value="{{ $state->id }}" data-country="{{ $state->country_id }}" hidden>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="যেমনঃ Dhaka" required>
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
    function cascadeCountryState(countrySelect, stateSelect, preselectedStateId) {
        function filterStates() {
            const countryId = countrySelect.value;
            let hasVisibleSelected = false;

            Array.from(stateSelect.options).forEach(function (opt) {
                if (!opt.dataset.country) return; // skip placeholder option
                const match = opt.dataset.country === countryId;
                opt.hidden = !match;
                opt.disabled = !match;
                if (match && opt.selected) hasVisibleSelected = true;
            });

            stateSelect.disabled = !countryId;
            if (!hasVisibleSelected) {
                stateSelect.value = '';
            }
        }

        countrySelect.addEventListener('change', filterStates);

        // initial run so edit modals show the correct state list on open
        filterStates();

        if (preselectedStateId) {
            stateSelect.value = preselectedStateId;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Add modal
        cascadeCountryState(
            document.getElementById('add_country'),
            document.getElementById('add_state'),
            null
        );

        // Edit modals
        @foreach($cities ?? [] as $city)
            cascadeCountryState(
                document.getElementById('edit_country_{{ $city->id }}'),
                document.getElementById('edit_state_{{ $city->id }}'),
                '{{ $city->state_id }}'
            );
        @endforeach
    });
</script>
@endpush