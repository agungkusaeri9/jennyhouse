<div>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ $setting->site_name }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">{{ $alias }}</a>
        </div>
        <ul class="sidebar-menu">
            @can('Dashboard')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                        <span>Dashboard</span></a>
                </li>
            @endcan
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-newspaper"></i>
                    <span>Artikel</span></a>
                <ul class="dropdown-menu">
                    @can('Kategori View')
                        <li><a href="{{ route('admin.post-categories.index') }}">Kategori</a></li>
                    @endcan
                    @can('Kategori View')
                    <li><a href="{{ route('admin.post-tags.index') }}">Tag</a></li>
                @endcan
                    @can('Artikel View')
                        <li><a href="{{ route('admin.posts.index') }}">Artikel</a></li>
                    @endcan
                </ul>
            </li>
            @can('Metode Pembayaran View')
                <li>
                    <a class="nav-link" href="{{ route('admin.payments.index') }}"><i class="fas fa-folder"></i>
                        <span>Metode Pembayaran</span></a>
                </li>
            @endcan
            @can('Pesan Masuk View')
            <li>
                <a class="nav-link" href="{{ route('admin.inboxes.index') }}"><i class="fas fa-folder"></i>
                    <span>Pesan Masuk</span></a>
            </li>
        @endcan
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-newspaper"></i>
                    <span>Produk</span></a>
                <ul class="dropdown-menu">
                    @can('Kategori Produk View')
                        <li><a href="{{ route('admin.product-categories.index') }}">Kategori</a></li>
                    @endcan
                    @can('Kategori View')
                    <li><a href="{{ route('admin.post-tags.index') }}">Tag</a></li>
                @endcan
                    @can('Artikel View')
                        <li><a href="{{ route('admin.posts.index') }}">Artikel</a></li>
                    @endcan
                </ul>
            </li>
            @can('User View')
            <li>
                <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i>
                    <span>User</span></a>
            </li>
        @endcan
            @can('Sosial Media View')
                <li><a class="nav-link" href="{{ route('admin.socmeds.index') }}"><i class="fas fa-sitemap"></i>
                        <span>Sosial Media</span></a>
                </li>
            @endcan
            @can('Filemanager View')
                <li>
                    <a class="nav-link" target="_blank" href="{{ url('admin/filemanager') }}"><i class="fas fa-folder"></i>
                        <span>File Manager</span></a>
                </li>
            @endcan
            @can('Role View')
                <li>
                    <a class="nav-link" href="{{ route('admin.roles.index') }}"><i class="fas fa-folder"></i>
                        <span>Role</span></a>
                </li>
            @endcan
            @can('Permission View')
                <li>
                    <a class="nav-link" href="{{ route('admin.permissions.index') }}"><i class="fas fa-folder"></i>
                        <span>Hak Akses</span></a>
                </li>
            @endcan
            @can('Setting View')
                <li>
                    <a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog"></i>
                        <span>Pengaturan Web</span></a>
                </li>
            @endcan
            @can('Sitemap View')
                <li>
                    <a class="nav-link" href=""><i class="fas fa-sitemap"></i>
                        <span>Perbaharui Sitemap</span></a>
                </li>
            @endcan
        </ul>

    </aside>
</div>
