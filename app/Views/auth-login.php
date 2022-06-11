<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | InventoryKu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo4.png">

    <?= $this->include('partials/head-css') ?>
    <style>
        .auth-bg {
            background-image: url('assets/images/gudang.png');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<?= $this->include('partials/body') ?>
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="/login" class="d-block auth-logo">
                                    <img src="assets/images/logo4.png" alt="" height="80"> <br> <span class="logo-txt">InventoryKu</span>
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <p class="text-muted mt-2">Sign in to continue to InventoryKu. <?= session()->get('role') ?></p>
                                </div>

                                <?php if(session()->get('error')) { ?>
                                <div class="text-center">
                                    <div class="card bg-danger border-danger text-white-50">
                                        <div class="card-body">
                                            <h5 class="mb-4 text-white"><em class="mdi mdi-block-helper me-3"></em>Opps...</h5>
                                            <p class="card-text"><?= session()->get('error') ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                                <form class="custom-form mt-4 pt-2" method="post" action="<?= base_url('do-login'); ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email" type="email" required class="form-control" id="username" placeholder="Enter email">
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label">Password</label>
                                            </div>
                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input name="password" required type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light ms-0" type="button" id="password-addon"><em class="mdi mdi-eye-outline"></em></button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </form>

                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> InventoryKu . Crafted with <em class="mdi mdi-heart text-danger"></em> by NXT Developer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay bg-primary"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-white">
                                                <em class="bx bxs-quote-alt-left text-success display-6"></em>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Tuhan cinta kebersihan dan kerapihan.”
                                                </h4>
                                                <br>
                                                <h5 class="font-size-18 text-white">InventoryKu</h5>
                                                <p class="mb-0 text-white-50">NXT Developer
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>
<!-- password addon init -->
<script src="assets/js/pages/pass-addon.init.js"></script>

</body>

</html>