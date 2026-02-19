<style>
    .jobs-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .jobs-header h2 {
        font-size: 24px;
        font-weight: 700;
        color: #2c4964;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }

    .jobs-header h2 i {
        color: #ffc451;
    }

    .header-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: #2c4964;
        color: #fff;
    }

    .btn-primary:hover {
        background: #ffc451;
        color: #2c4964;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #f4f6f9;
        color: #2c4964;
        border: 1px solid #e0e0e0;
    }

    .btn-secondary:hover {
        background: #e9ecef;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .stat-icon {
        width: 50px; height: 50px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .icon-blue   { background: #e8f0fe; color: #2c4964; }
    .icon-green  { background: #e8f5e9; color: #2e7d32; }
    .icon-yellow { background: #fff8e1; color: #ffa000; }
    .icon-red    { background: #fce4ec; color: #c62828; }

    .stat-info h3 { font-size: 24px; font-weight: 700; color: #2c4964; margin: 0; }
    .stat-info p  { font-size: 12px; color: #888; margin: 3px 0 0; }

    /* Filter Bar */
    .filter-bar {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        margin-bottom: 25px;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        align-items: center;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
        flex: 1;
        min-width: 180px;
    }

    .filter-group label {
        font-size: 12px;
        font-weight: 600;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .filter-control {
        padding: 9px 12px;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        color: #444;
        transition: all 0.2s;
        background: #fff;
    }

    .filter-control:focus {
        outline: none;
        border-color: #ffc451;
        box-shadow: 0 0 0 3px rgba(255,196,81,0.15);
    }

    .filter-btn {
        padding: 9px 18px;
        margin-top: auto;
    }

    /* Table Container */
    .table-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .jobs-table {
        width: 100%;
        border-collapse: collapse;
    }

    .jobs-table thead {
        background: linear-gradient(135deg, #2c4964, #3d6b8f);
        color: #fff;
    }

    .jobs-table thead th {
        padding: 16px 20px;
        text-align: left;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .jobs-table tbody tr {
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.2s;
    }

    .jobs-table tbody tr:hover {
        background: #fffdf5;
    }

    .jobs-table tbody td {
        padding: 18px 20px;
        font-size: 14px;
        color: #444;
        vertical-align: middle;
    }

    /* Job Title Column */
    .job-title-cell {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .job-logo {
        width: 45px; height: 45px;
        border-radius: 8px;
        background: #f4f6f9;
        border: 1px solid #e0e0e0;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px; color: #2c4964;
        flex-shrink: 0;
    }

    .job-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 8px;
    }

    .job-info h4 {
        font-size: 15px;
        font-weight: 600;
        color: #2c4964;
        margin: 0 0 3px;
    }

    .job-info p {
        font-size: 12px;
        color: #888;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .job-info i {
        color: #ffc451;
    }

    /* Status Badges */
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
        display: inline-block;
    }

    .status-active    { background: #e8f5e9; color: #2e7d32; }
    .status-draft     { background: #e0e0e0; color: #666; }
    .status-expired   { background: #fce4ec; color: #c62828; }
    .status-pending   { background: #fff8e1; color: #f57c00; }
    .status-featured  { background: #f3e5f5; color: #6a1b9a; }

    /* Application Count */
    .app-count {
        font-weight: 700;
        color: #2c4964;
        font-size: 16px;
    }

    .app-count-sub {
        font-size: 11px;
        color: #888;
        display: block;
        margin-top: 2px;
    }

    /* Action Buttons */
    .action-btns {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .action-btn {
        width: 32px; height: 32px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        transition: all 0.2s;
    }

    .btn-view   { background: #e8f0fe; color: #2c4964; }
    .btn-edit   { background: #fff8e1; color: #f57c00; }
    .btn-delete { background: #fce4ec; color: #c62828; }
    .btn-stats  { background: #e8f5e9; color: #2e7d32; }

    .btn-view:hover   { background: #2c4964; color: #fff; }
    .btn-edit:hover   { background: #f57c00; color: #fff; }
    .btn-delete:hover { background: #c62828; color: #fff; }
    .btn-stats:hover  { background: #2e7d32; color: #fff; }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 64px;
        color: #e0e0e0;
        margin-bottom: 20px;
        display: block;
    }

    .empty-state h3 {
        font-size: 20px;
        color: #2c4964;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #888;
        margin-bottom: 25px;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        padding: 25px 20px;
        border-top: 1px solid #f0f0f0;
    }

    .pagination a,
    .pagination span {
        min-width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        color: #2c4964;
        border: 1px solid #e0e0e0;
        transition: all 0.2s;
    }

    .pagination a:hover {
        background: #ffc451;
        color: #2c4964;
        border-color: #ffc451;
    }

    .pagination .active {
        background: #2c4964;
        color: #fff;
        border-color: #2c4964;
    }

    .pagination .disabled {
        color: #ccc;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .stats-grid { grid-template-columns: 1fr; }
        .filter-bar { flex-direction: column; align-items: stretch; }
        .filter-group { min-width: 100%; }
        .jobs-header { flex-direction: column; align-items: stretch; }
        .header-actions { justify-content: stretch; }
        .header-actions .btn { flex: 1; justify-content: center; }
    }
</style>
<!-- ─── Posted Jobs ─── -->
 <div class="tab-panel" id="tab-postedjob">
    <div class="card">
        {{-- <div class="card-header">
            <h3>Posted Jobs (24)</h3>
            <select class="form-control" style="width:auto;padding:6px 12px">
                <option>All Status</option>
                <option>Pending</option>
                <option>Reviewed</option>
                <option>Interview</option>
                <option>Offered</option>
                <option>Rejected</option>
            </select>
        </div> --}}
        <div class="card-body">
            <?php  $jobs = App\Models\JobPost::myJobs()->paginate(10); ?>
  
    <div>
    {{-- Header --}}
    <div class="jobs-header">
                    <div>
                        <h2>
                            <i class="fas fa-briefcase"></i>
                            My Posted Jobs
                        </h2>
                        <p style="color:#888; font-size:14px; margin-top:5px;">
                            Manage all your job postings in one place
                        </p>
                    </div>
                    <div class="header-actions">
                        
                        <a onclick="showTab('postjob', this)" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Post New Job
                        </a>
                        <button class="btn btn-secondary" onclick="window.print()">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </div>

                {{-- Stats Cards --}}
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon icon-blue">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalJobs ?? 0 }}</h3>
                            <p>Total Jobs Posted</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon icon-green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $activeJobs ?? 0 }}</h3>
                            <p>Active Jobs</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon icon-yellow">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalApplications ?? 0 }}</h3>
                            <p>Total Applications</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon icon-red">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalViews ?? 0 }}</h3>
                            <p>Total Views</p>
                        </div>
                    </div>
                </div>

                {{-- Filter Bar --}}
                <form action="{{ route('employer.jobs.index') }}" method="GET" class="filter-bar">
                    <div class="filter-group">
                        <label>Search</label>
                        <input type="text" name="search" class="filter-control"
                            placeholder="Job title, code..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="filter-group">
                        <label>Status</label>
                        <select name="status" class="filter-control">
                            <option value="">All Status</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Job Type</label>
                        <select name="job_type" class="filter-control">
                            <option value="">All Types</option>
                            <option value="full-time" {{ request('job_type') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                            <option value="part-time" {{ request('job_type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                            <option value="contract" {{ request('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                            <option value="freelance" {{ request('job_type') == 'freelance' ? 'selected' : '' }}>Freelance</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Sort By</label>
                        <select name="sort" class="filter-control">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="applications" {{ request('sort') == 'applications' ? 'selected' : '' }}>Most Applications</option>
                            <option value="views" {{ request('sort') == 'views' ? 'selected' : '' }}>Most Views</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary filter-btn">
                        <i class="fas fa-filter"></i> Filter
                    </button>

                    @if(request()->hasAny(['search', 'status', 'job_type', 'sort']))
                        <a href="{{ route('employer.jobs.index') }}" class="btn btn-secondary filter-btn">
                            <i class="fas fa-times"></i> Reset
                        </a>
                    @endif
                </form>

                {{-- Jobs Table --}}
                <div class="table-container">
                    @if($jobs->count() > 0)
                        <div class="table-responsive">
                            <table class="jobs-table">
                                <thead>
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:30%">Job Title</th>
                                        <th style="width:12%">Job Type</th>
                                        <th style="width:12%">Deadline</th>
                                        <th style="width:10%">Applications</th>
                                        <th style="width:8%">Views</th>
                                        <th style="width:10%">Status</th>
                                        <th style="width:13%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $index => $job)
                                    <tr>
                                        {{-- ID --}}
                                        <td>
                                            <strong style="color:#2c4964; font-size:15px;">
                                                {{ $jobs->firstItem() + $index }}
                                            </strong>
                                        </td>

                                        {{-- Job Title --}}
                                        <td>
                                            <div class="job-title-cell">
                                                <div class="job-logo">
                                                    @if($job->company_logo)
                                                        <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Logo">
                                                    @else
                                                        <i class="fas fa-briefcase"></i>
                                                    @endif
                                                </div>
                                                <div class="job-info">
                                                    <h4>{{ Str::limit($job->job_title, 40) }}</h4>
                                                    <p>
                                                        @if($job->job_code)
                                                            <i class="fas fa-hashtag"></i>
                                                            {{ $job->job_code }}
                                                        @endif
                                                        @if($job->location)
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            {{ $job->location }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Job Type --}}
                                        <td>
                                            <span style="font-weight:600; color:#2c4964; text-transform:capitalize;">
                                                {{ str_replace('-', ' ', $job->job_type) }}
                                            </span>
                                            @if($job->remote_available)
                                                <br><small style="color:#2e7d32; font-weight:600;">
                                                    <i class="fas fa-home"></i> Remote
                                                </small>
            
                                            @endif
                                        </td>

                                        {{-- Deadline --}}
                                        <td>
                                            @if($job->deadline)
                                                <div style="font-weight:600; color:#2c4964;">
                                                    {{ \Carbon\Carbon::parse($job->deadline)->format('d M, Y') }}
                                                </div>
                                                <small style="color:#888;">
                                                    @php
                                                        $daysLeft = \Carbon\Carbon::now()->diffInDays($job->deadline, false);
                                                    @endphp
                                                    @if($daysLeft > 0)
                                                        <i class="fas fa-clock"></i> {{ $daysLeft }} days left
                                                    @elseif($daysLeft == 0)
                                                        <span style="color:#f57c00;">Today</span>
                                                    @else
                                                        <span style="color:#c62828;">Expired</span>
                                                    @endif
                                                </small>
                                            @else
                                                <span style="color:#888;">No deadline</span>
                                            @endif
                                        </td>

                                        {{-- Applications --}}
                                        <td>
                                            <div class="app-count">
                                                {{ $job->applications_count ?? 0 }}
                                                <span class="app-count-sub">applications</span>
                                            </div>
                                        </td>

                                        {{-- Views --}}
                                        <td>
                                            <div style="font-weight:600; color:#666;">
                                                <i class="fas fa-eye" style="color:#ffc451; margin-right:5px;"></i>
                                                {{ number_format($job->view_count) }}
                                            </div>
                                        </td>

                                        {{-- Status --}}
                                        <td>
                                            @php
                                                $statusClass = 'status-draft';
                                                $statusText = 'Draft';
                                                
                                                if ($job->status && $job->is_approved) {
                                                    if ($job->deadline && \Carbon\Carbon::parse($job->deadline)->isPast()) {
                                                        $statusClass = 'status-expired';
                                                        $statusText = 'Expired';
                                                    } else {
                                                        $statusClass = 'status-active';
                                                        $statusText = 'Active';
                                                    }
                                                } elseif ($job->status && !$job->is_approved) {
                                                    $statusClass = 'status-pending';
                                                    $statusText = 'Pending';
                                                }
                                            @endphp
                                            <span class="status-badge {{ $statusClass }}">
                                                {{ $statusText }}
                                            </span>
                                            @if($job->is_featured)
                                                <br><span class="status-badge status-featured" style="margin-top:5px;">
                                                    <i class="fas fa-star"></i> Featured
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Actions --}}
                                        <td>
                                            <div class="action-btns">
                                                <a href=""
                                                class="action-btn btn-view"
                                                title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <a href="{{ route('employer.job.applications', $job->id) }}"
                                                class="action-btn btn-stats"
                                                title="Applications">
                                                    <i class="fas fa-users"></i>
                                                </a>

                                                <a href="{{ route('employer.jobs.edit', $job->id) }}"
                                                class="action-btn btn-edit"
                                                title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('employer.jobs.destroy', $job->id) }}"
                                                    method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this job?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="action-btn btn-delete"
                                                            title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        @if($jobs->hasPages())
                            <div class="pagination">
                                {{-- Previous --}}
                                @if ($jobs->onFirstPage())
                                    <span class="disabled"><i class="fas fa-chevron-left"></i></span>
                                @else
                                    <a href="{{ $jobs->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                                @endif

                                {{-- Page Numbers --}}
                                @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                                    @if ($page == $jobs->currentPage())
                                        <span class="active">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    @endif
                                @endforeach

                                {{-- Next --}}
                                @if ($jobs->hasMorePages())
                                    <a href="{{ $jobs->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                                @else
                                    <span class="disabled"><i class="fas fa-chevron-right"></i></span>
                                @endif
                            </div>
                        @endif

                    @else
                        {{-- Empty State --}}
                        <div class="empty-state">
                            <i class="fas fa-briefcase"></i>
                            <h3>No Jobs Posted Yet</h3>
                            <p>Start by posting your first job listing to attract qualified candidates.</p>
                            <a href="{{ route('employer.job.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Post Your First Job
                            </a>
                        </div>
                    @endif
                </div>
            </div>
         
        </div>
    </div>
</div>



@include('partials.toast')

