<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>

                <li>
                    <a href="/">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard"><?= lang('Files.Dashboard') ?></span>
                    </a>
                </li>
                <li class="menu-title mt-2" data-key="t-components">Master Data</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url(route_to('category-list')); ?>">Categories</a></li>
                        <li><a href="<?= base_url(route_to('unit-list')); ?>">Units</a></li>
                        <li><a href="<?= base_url(route_to('product-list')); ?>">Products</a></li>
                    </ul>
                </li>
                <li class="menu-title mt-2" data-key="t-components">Management</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-basket"></i>
                        <span data-key="t-components">Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url(route_to('stock-list')); ?>">Barang Masuk</a></li>
                        <li><a href="<?= base_url(route_to('stock-out-list')); ?>">Barang Keluar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url(route_to('stock-barang')); ?>">
                        <i data-feather="pie-chart"></i>
                        <span data-key="t-stock">Stock</span>
                    </a>
                </li>
                <li class="menu-title mt-2" data-key="t-components">Curriculum Vitae</li>
                <li>
                    <a href="<?= base_url(route_to('cv-list')); ?>">
                        <i class="bx bxs-file"></i>
                        <span data-key="t-stock">CV Management</span>
                    </a>
                </li>
                <li class="menu-title mt-2" data-key="t-components">App Management</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="mdi mdi-database-settings-outline"></i>
                        <span data-key="t-components">Application</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="<?= base_url(route_to('user-list')); ?>">Users</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->