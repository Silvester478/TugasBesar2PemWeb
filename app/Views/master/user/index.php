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
                            <h4 class="me-2"><b>List User</b></h4>
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
                                        <th scope="th">Name</th>
                                        <th scope="th">Email</th>
                                        <th scope="th">Phone Number</th>
                                        <th scope="th">Role</th>

                                        <?php if (session()->get('role') == 'Admin') { ?>
                                            <th scope="th" width="100px">Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $val) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $val['name'] ?></td>
                                            <td><?= $val['email'] ?></td>
                                            <td><?= $val['phone_no'] ?></td>
                                            <td><?= $val['role'] ?></td>

                                            <?php if (session()->get('role') == 'Admin') { ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url(route_to('product-edit', $val['id'])) ?>" class="btn btn-warning btn-sm">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <button class="delete btn btn-danger btn-sm" onclick="deleteUser(<?= $val['id'] ?>)">
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
                    <h5 class="modal-title" id="myLargeModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?= base_url(route_to('user-add')) ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" required class="form-control" type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input name="email" required class="form-control" type="email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input name="phone_no" required class="form-control" type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" required class="form-select">
                                        <option value="">Select</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input name="password" required class="form-control" type="password">
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
    function deleteUser(id) {
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
                window.location.href = '<?= base_url(route_to('user-delete')) ?>' + '?id=' + id
            }
        });
    }
</script>
<?= $this->endSection() ?>