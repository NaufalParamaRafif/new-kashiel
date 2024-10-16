<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="/main_dashboard" aria-expanded="false">
                    <i class="icon-chart menu-icon"></i><span class="nav-text">Main Dashboard</span>
                </a>
            </li>
            <li>
                <a href="widgets.html" aria-expanded="false">
                    <i class="icon-calculator menu-icon"></i><span class="nav-text">Kasir</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard_history_penjualan.index') }}" aria-expanded="false">
                    <i class="icon-clock menu-icon"></i><span class="nav-text">History Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard_produk.index') }}" aria-expanded="false">
                    <i class="icon-social-dropbox menu-icon"></i><span class="nav-text">Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard_pelanggan.index') }}" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text">Pelanggan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard_category.index') }}" aria-expanded="false">
                    <i class="icon-info menu-icon"></i><span class="nav-text">Category</span>
                </a>
            </li>
        </ul>
    </div>
</div>