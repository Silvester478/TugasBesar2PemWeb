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
                    <div class="card-body">
                        <!-- header  -->
                        <div class="d-flex flex-wrap align-items-center mb-4">
                            <h4 class="me-2"><b>List Product</b></h4>
                            <div class="ms-auto">
                                <div>
                                    <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal" data-bs-target=".add-modal">
                                        <i class="mdi mdi-checkbox-multiple-blank-circle"></i>
                                        <b>New Record</b>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end header  -->
                        <div class="table-responsive mb-0">
                            <table aria-describedby="user-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="th" width="5px">#</th>
                                        <th scope="th">Category</th>
                                        <th scope="th">Unit</th>
                                        <th scope="th">Product Code</th>
                                        <th scope="th">Name</th>

                                        <?php if (session()->get('role') == 'Admin') { ?>
                                            <th scope="th" width="100px">Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $key => $val) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $val['category_code'] . ' - ' . $val['category_name'] ?></td>
                                            <td><?= $val['description'] ?></td>
                                            <td><?= $val['code'] ?></td>
                                            <td><?= $val['name'] ?></td>
                                            <?php if (session()->get('role') == 'Admin') { ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url(route_to('product-edit', $val['id'])) ?>" class="btn btn-warning btn-sm">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <!-- <button class="delete btn btn-danger btn-sm" onclick="deleteProduct(<?= $val['id'] ?>)">
                                                        <i class=" bx bx-trash"></i>
                                                    </button> -->
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->

    <!--  Large modal example -->
    <div class="modal fade add-modal" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?= base_url(route_to('product-add')) ?>" method="post">
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
                                    <input name="code" required class="form-control" type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" required class="form-control" type="text">
                                </div>
                                <button class="btn btn-success" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    function deleteProduct(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2ab57d",
            cancelButtonColor: "#fd625e",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                window.location.href = '<?= base_url(route_to('product-delete')) ?>' + '?id=' + id
            }
        });
    }
</script>
<?= $this->endSection() ?>