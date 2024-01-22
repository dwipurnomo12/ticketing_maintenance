<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="/assets/img/login.png" alt="" style="width: 50px">
        <a href="/">Ticketing Website</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">TW</a>
    </div>
    <ul class="sidebar-menu">
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if (auth()->user()->role->role == 'agen')
            <li class="{{ request()->is('laporan') ? 'active' : '' }}">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-regular fa-file-pen"></i>
                    <span>Laporan</span>
                </a>
            </li>
        @elseif(auth()->user()->role->role == 'devops')
            <li class="{{ request()->is('laporan') ? 'active' : '' }}">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-regular fa-file-pen"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li class="{{ request()->is('progres') ? 'active' : '' }}">
                <a class="nav-link" href="/progres">
                    <i class="fa-solid fa-bars-progress"></i>
                    <span>Progres</span>
                </a>
            </li>
        @elseif(auth()->user()->role->role == 'superadmin')
            <li class="{{ request()->is('laporan') ? 'active' : '' }}">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-regular fa-file-pen"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <li class="{{ request()->is('insiden') ? 'active' : '' }}">
                <a class="nav-link" href="/insiden">
                    <i class="fas fa-solid fa-chart-line"></i>
                    <span>Insiden</span>
                </a>
            </li>
            <li class="{{ request()->is('users') ? 'active' : '' }}">
                <a class="nav-link" href="/users">
                    <i class="fas fa-regular fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="{{ request()->is('report') ? 'active' : '' }}">
                <a class="nav-link" href="/report">
                    <i class="fas fa-solid fa-print"></i>
                    <span>Report</span>
                </a>
            </li>
        @elseif(auth()->user()->role->role == 'admin')
            <li class="{{ request()->is('laporan') ? 'active' : '' }}">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-regular fa-file-pen"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li class="{{ request()->is('tindak-lanjut') ? 'active' : '' }}">
                <a class="nav-link" href="/tindak-lanjut">
                    <i class="fas fa-solid fa-circle-exclamation"></i>
                    <span>Tindak Lanjut</span>
                </a>
            </li>
            <li class="{{ request()->is('insiden') ? 'active' : '' }}">
                <a class="nav-link" href="/insiden">
                    <i class="fas fa-solid fa-chart-line"></i>
                    <span>Insiden</span>
                </a>
            </li>
        @endif
    </ul>

</aside>
