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
                            <h4 class="me-2"><b>List Category</b></h4>
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
                                    <tr class="text-center">
                                        <th scope="th" width="5px">#</th>
                                        <th scope="th">Category Code</th>
                                        <th scope="th">Name</th>
                                        <?php if (session()->get('role') == 'Admin') { ?>
                                            <th scope="th" width="100px">Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($categories as $key => $val) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $val['category_code'] ?></td>
                                            <td><?= $val['name'] ?></td>

                                            <?php if (session()->get('role') == 'Admin') { ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url(route_to('category-edit', $val['id'])) ?>" class="btn btn-warning btn-sm">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <button class="delete btn btn-danger btn-sm" onclick="deleteCategory(<?= $val['id'] ?>)">
                                                        <i class=" bx bx-trash"></i>
                                                    </button>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                        $no++;
                                    } ?>

                                    <?php if ($no == 0) : ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Data tidak tersedia</td>
                                        </tr>
                                    <?php endif ?>
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
                    <h5 class="modal-title" id="myLargeModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?= base_url(route_to('category-add')) ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Category Code</label>
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

<script>
    function deleteCategory(id) {
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
                window.location.href = '<?= base_url(route_to('category-delete')) ?>' + '?id=' + id
            }
        });
    }
</script>

<?= $this->endSection() ?>