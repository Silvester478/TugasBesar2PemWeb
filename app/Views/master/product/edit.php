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
                                <form action="<?= base_url(route_to('product-update')) ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="category_id" required class="form-select">
                                        <option default="true" value="">Select Category</option>
                                        <?php foreach ($categories as $key => $val) { ?>
                                            <option value="<?= @$val['id'] ?>"> <?= @$val['category_code'] . ' - ' . @$val['name'] ?> </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Unit</label>
                                        <select name="unit_id" required class="form-select">
                                        <option default="true" value="">Select Unit</option>
                                        <?php foreach ($units as $key => $val) { ?>
                                            <option value="<?= @$val['id'] ?>"> <?= @$val['unit_code'] . ' - ' . @$val['description'] ?> </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Code</label>
                                        <input value="<?= $product['code'] ?>" name="code" required class="form-control" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input value="<?= $product['name'] ?>" name="name" required class="form-control" type="text">
                                    </div>

                                    <a href="<?= base_url(route_to('product-list')) ?>" class="btn btn-warning">Cancel</a>
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