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
                            <h4 class="me-2"><b>List Unit</b></h4>
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
                                        <th scope="th">Unit Code</th>
                                        <th scope="th">Description</th>

                                        <?php if (session()->get('role') == 'Admin') { ?>
                                            <th scope="th" width="100px">Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($units as $key => $val) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $val['unit_code'] ?></td>
                                            <td><?= $val['description'] ?></td>

                                            <?php if (session()->get('role') == 'Admin') { ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url(route_to('product-edit', $val['id'])) ?>" class="btn btn-warning btn-sm">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <button class="delete btn btn-danger btn-sm" onclick="deleteUnit(<?= $val['id'] ?>)">
                                                        <i class=" bx bx-trash"></i>
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
                    <h5 class="modal-title" id="myLargeModalLabel">Add Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?= base_url(route_to('unit-add')) ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Unit Code</label>
                                    <input name="code" required class="form-control" type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <input name="description" required class="form-control" type="text">
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

<script>
    function deleteUnit(id) {
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
                window.location.href = '<?= base_url(route_to('unit-delete')) ?>' + '?id=' + id
            }
        });
    }
</script>

<?= $this->endSection() ?>