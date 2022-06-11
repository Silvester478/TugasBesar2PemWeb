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
                                <form action="<?= base_url(route_to('category-update')) ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Category Code</label>
                                        <input value="<?= $category['category_code'] ?>" name="code" required class="form-control" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input value="<?= $category['name'] ?>" name="name" required class="form-control" type="text">
                                    </div>

                                    <a href="<?= base_url(route_to('category-list')) ?>" class="btn btn-warning">Cancel</a>
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