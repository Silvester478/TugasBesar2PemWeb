<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/logo-light-sm.png') ?>" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/logo-light-sm.png') ?>" alt="" height="30"> <span class="logo-txt">InventoryKu</span>
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/images/logo-light-sm.png') ?>" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/images/logo-light-sm.png') ?>" alt="" height="30"> <span class="logo-txt">InventoryKu</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <em class="fa fa-fw fa-bars"></em>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <em data-feather="search" class="icon-lg"></em>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?= lang('Files.Search') ?>..." aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><em class="mdi mdi-magnify"></em></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <em data-feather="moon" class="icon-lg layout-mode-dark"></em>
                    <em data-feather="sun" class="icon-lg layout-mode-light"></em>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url('assets/images/users/avatar-1.jpg') ?>" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?= session()->get('name') ?></span>
                    <em class="mdi mdi-chevron-down d-none d-xl-inline-block"></em>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="<?= base_url('logout'); ?>">
                        <em class="mdi mdi-logout font-size-16 align-middle me-1"></em> <?= lang('Files.Logout') ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>