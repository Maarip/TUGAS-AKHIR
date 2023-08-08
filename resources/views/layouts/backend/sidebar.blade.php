<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Utama</li>

        <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-title">Fitur Admin</li>

        <li class="sidebar-item {{ request()->is('admin/wisata') ? 'active' : '' }}">
            <a href="{{ route('admin.wisata.index') }}" class='sidebar-link'>
                <i class="bi bi-map"></i>
                <span>List Wisata</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->is('admin/wisata/create') ? 'active' : '' }}">
            <a href="{{ route('admin.wisata.create') }}" class='sidebar-link'>
                <i class="bi bi-plus"></i>
                <span>Tambah Wisata</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->is('admin/kuliner') ? 'active' : '' }}">
            <a href="{{ route('admin.kuliner.index') }}" class='sidebar-link'>
                <i class="bi bi-map"></i>
                <span>List Oleh Oleh</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->is('admin/kuliner/create') ? 'active' : '' }}">
            <a href="{{ route('admin.kuliner.create') }}" class='sidebar-link'>
                <i class="bi bi-plus"></i>
                <span>Tambah Oleh Oleh</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->is('admin/hotel') ? 'active' : '' }}">
            <a href="{{ route('admin.hotel.index') }}" class='sidebar-link'>
                <i class="bi bi-map"></i>
                <span>List hotel</span>
            </a>
        </li>

        <li class="sidebar-item {{ request()->is('admin/hotel/create') ? 'active' : '' }}">
            <a href="{{ route('admin.hotel.create') }}" class='sidebar-link'>
                <i class="bi bi-plus"></i>
                <span>Tambah hotel</span>
            </a>
        </li>


        {{-- <li class="sidebar-title">Kelola Product</li>

        <li class="sidebar-item {{ (request()->is('v1/product')) ? 'active' : '' }}">
            <a href="{{ route('product.index')}}" class='sidebar-link'>
                <i class="bi bi-box2-fill"></i>
                <span>List Product</span>
            </a>
        </li>

        <li class="sidebar-item {{ (request()->is('v1/product/create')) ? 'active' : '' }}">
            <a href="{{ route('product.create')}}" class='sidebar-link'>
                <i class="bi bi-box-arrow-in-up"></i>
                <span>Tambah Product</span>
            </a>
        </li>

        <li class="sidebar-title">Kelola Orderan</li>

        <li class="sidebar-item {{ (request()->is('v1/orderan*')) ? 'active' : '' }}">
            <a href="{{ route('orderan.index')}}" class='sidebar-link'>
                <i class="bi bi-cart-fill"></i>
                <span>Orderan Masuk</span>
            </a>
        </li>

        <li class="sidebar-item {{ (request()->is('v1/cities')) ? 'active' : '' }}">
            <a href="https://wa.me/6281912488040" target="__blank" class='sidebar-link'>
                <i class="bi bi-star-fill"></i>
                <span>Review Product</span>
            </a>
        </li>

        <li class="sidebar-title">Tools Admin</li>

        <li class="sidebar-item {{ (request()->is('v1/cities')) ? 'active' : '' }}">
            <a href="https://wa.me/6281912488040" target="__blank" class='sidebar-link'>
                <i class="bi bi-person-lines-fill"></i>
                <span>Daftar User</span>
            </a>
        </li>

        <li class="sidebar-item {{ (request()->is('v1/cities')) ? 'active' : '' }}">
            <a href="https://wa.me/6281912488040" target="__blank" class='sidebar-link'>
                <i class="bi bi-whatsapp"></i>
                <span>Hubungi Author</span>
            </a>
        </li> --}}

    </ul>
</div>
