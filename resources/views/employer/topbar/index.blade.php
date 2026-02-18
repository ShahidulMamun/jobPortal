 <div class="topbar">
        <div class="topbar-left">
            <span class="hamburger" id="hamburger" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </span>
            <span class="page-title" id="pageTitle">Dashboard</span>
        </div>
        <div class="topbar-right">
            <button class="topbar-btn"><i class="fas fa-search"></i></button>
            <button class="topbar-btn">
                <i class="fas fa-bell"></i>
                <span class="notif-dot"></span>
            </button>
            <button class="topbar-btn"><i class="fas fa-envelope"></i></button>
            <div class="topbar-user">
                <div class="topbar-avatar">JS</div>
                <div>
                    <div style="font-size:14px;font-weight:600;color:#2c4964">{{Auth::guard('employer')->user()->name}}</div>
                    <div style="font-size:12px;color:#888">Employee</div>
                </div>
            </div>
        </div>
    </div>