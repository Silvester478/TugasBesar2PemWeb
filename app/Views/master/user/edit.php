<?= $this->extend('layout/main-layout') ?>

<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <?= $page_title ?>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="<?= base_url(route_to('user-update')) ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input value="<?= $user['name'] ?>" name="name" required class="form-control" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input value="<?= $user['email'] ?>" name="email" required class="form-control" type="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input value="<?= $user['phone_no'] ?>" name="phone_no" required class="form-control" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Select</label>
                                        <select name="role" required class="form-select">
                                            <option disabled value="">Select</option>
                                            <option <?php if($user['role'] == 'Admin') echo 'selected' ?> value="Admin">Admin</option>
                                            <option <?php if($user['role'] == 'User') echo 'selected' ?> value="User">User</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input name="password" class="form-control" type="password">
                                        <small>leave it empty if you dont want to change your password</small>
                                    </div>

                                    <button class="btn btn-success" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>

<?= $this->endSection() ?>