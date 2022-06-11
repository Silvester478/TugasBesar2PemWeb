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
                                <form action="<?= base_url(route_to('unit-update')) ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $unit['id'] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Unit Code</label>
                                        <input value="<?= $unit['unit_code'] ?>" name="code" required class="form-control" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <input value="<?= $unit['description'] ?>" name="description" required class="form-control" type="text">
                                    </div>

                                    <a href="<?= base_url(route_to('unit-list')) ?>" class="btn btn-warning">Cancel</a>
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