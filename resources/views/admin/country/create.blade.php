@extends('admin.layouts.app')

@section('title', 'Country Management')
@section('page-title', 'Country')
@section('page-subtitle', 'Manage country list for job locations')

@section('content')

    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-sm" style="background:var(--navy);color:#fff;" data-bs-toggle="modal" data-bs-target="#addCountryModal">
            <i class="fa-solid fa-plus me-1"></i> Add Country
        </button>
    </div>

    <div class="card-soft p-0">
        <table class="table align-middle mb-0">
            <thead>
                <tr style="background:var(--paper);">
                    <th style="width:50px;">#</th>
                    <th>Country</th>
                    <th>ISO</th>
                    <th>Phone Code</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th style="width:140px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($countries ?? [] as $country)
                    <tr>
                        <td class="mono text-muted">{{ $loop->iteration }}</td>
                        <td class="fw-medium">{{ $country->name }}</td>
                        <td class="mono">{{ $country->iso }}</td>
                        <td class="mono">{{ $country->phone_code }}</td>
                        <td class="mono">{{ $country->currency_code }} @if($country->currency_symbol)({{ $country->currency_symbol }})@endif</td>
                        <td>
                            @if($country->status == 1)
                                <span class="badge badge-mint">Active</span>
                            @else
                                <span class="badge bg-secondary">inactive</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                    data-bs-toggle="modal" data-bs-target="#editCountryModal{{ $country->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.country.destroy', $country->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure to delete this country?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editCountryModal{{ $country->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.country.update', $country->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Country</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Country Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $country->name }}" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label class="form-label">ISO Code</label>
                                                <input type="text" name="iso" class="form-control" value="{{ $country->iso }}" maxlength="5">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label class="form-label">Phone Code</label>
                                                <input type="text" name="phone_code" class="form-control" value="{{ $country->phone_code }}" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label class="form-label">Currency Code</label>
                                                <input type="text" name="currency_code" class="form-control" value="{{ $country->currency_code }}" maxlength="10">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label class="form-label">Currency Symble</label>
                                                <input type="text" name="currency_symbol" class="form-control" value="{{ $country->currency_symbol }}" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" name="status" value="1"
                                                   {{ $country->status == 1 ? 'checked' : '' }}>
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
                        <td colspan="7" class="text-center text-muted py-4">No Country Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($countries) && method_exists($countries, 'links'))
        <div class="mt-3">{{ $countries->links() }}</div>
    @endif

    <!-- Add Modal -->
    <div class="modal fade" id="addCountryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.country.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Country</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Country Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Bangladesh" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">ISO Code</label>
                                <input type="text" name="iso" class="form-control" placeholder="BD" maxlength="5">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Phone Code</label>
                                <input type="text" name="phone_code" class="form-control" placeholder="+880" maxlength="10">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Currency Code</label>
                                <input type="text" name="currency_code" class="form-control" placeholder="BDT" maxlength="10">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Currency Symble</label>
                                <input type="text" name="currency_symbol" class="form-control" placeholder="৳" maxlength="10">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn" style="background:var(--navy);color:#fff;">Add Country</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection