<div class="sidebar">
    <!-- Sidebar Search Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Daftar user -->
            <li class="nav-header">Daftar User</li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ ($activeMenu == 'user') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Daftar User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ ($activeMenu == 'level') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>Daftar Level</p>
                </a>
            </li>           

            <!-- Daftar Buku -->
            <li class="nav-header">Daftar Buku</li>
            <li class="nav-item">
                <a href="{{ url('/buku') }}" class="nav-link {{ ($activeMenu == 'buku') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Data Buku</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link {{ ($activeMenu == 'kategori') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-folder-open"></i>
                    <p>Kategori Buku</p>
                </a>
            </li>

            <!-- Data Transaksi -->
            <li class="nav-header">Data Peminjaman</li>
            <li class="nav-item">
                <a href="{{ url('/peminjam') }}" class="nav-link {{ ($activeMenu == 'peminjam') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Peminjaman Buku</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
