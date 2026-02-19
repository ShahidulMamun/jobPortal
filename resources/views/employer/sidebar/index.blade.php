<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="fas fa-briefcase"></i></div>
        <span class="brand-text">LivejobsBD</span>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">Main Menu</div>
        <a class="nav-item" onclick="showTab('dashboard', this)">
            <i class="fas fa-th-large"></i> Dashboard
        </a>
        <a class="nav-item" onclick="showTab('postjob', this)">
            <i class="fa fa-briefcase"></i> Post Job
            <span class="badge">5</span>
        </a>

         <a class="nav-item" onclick="showTab('postedjob', this)">
            <i class="fa fa-briefcase"></i> Posted Job
            <span class="badge">5</span>
        </a>

        <a class="nav-item" onclick="showTab('applications', this)">
            <i class="fas fa-file-alt"></i> My Applications
            <span class="badge">5</span>
        </a>
        <a class="nav-item" onclick="showTab('saved', this)">
            <i class="fas fa-bookmark"></i> Saved Jobs
            <span class="badge">8</span>
        </a>
        <a class="nav-item" onclick="showTab('recommended', this)">
            <i class="fas fa-star"></i> Recommended
        </a>

        <div class="nav-label">Profile</div>
        <a class="nav-item" onclick="showTab('profile', this)">
            <i class="fas fa-user"></i> My Profile
        </a>
        <a class="nav-item" onclick="showTab('resume', this)">
            <i class="fas fa-file-upload"></i> My Resume / CV
        </a>
        <a class="nav-item" onclick="showTab('alerts', this)">
            <i class="fas fa-bell"></i> Job Alerts
            <span class="badge">3</span>
        </a>

        <div class="nav-label">Account</div>
        <a class="nav-item" onclick="showTab('settings', this)">
            <i class="fas fa-cog"></i> Settings
        </a>

        {{-- ══ LOGOUT — No JS needed, plain POST form ══ --}}
        <form class="logout-form" action="{{ route('employer.logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-item"
                onclick="localStorage.removeItem('activeTab')">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </nav>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">JS</div>
            <div>
                <div class="user-name">{{Auth::guard('employer')->user()->name}}</div>
                <div class="user-role">{{Auth::guard('employer')->user()->designation}}</div>
            </div>
        </div>
    </div>
</aside>