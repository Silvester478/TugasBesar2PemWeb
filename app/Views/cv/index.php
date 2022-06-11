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
                            <h4 class="me-2"><b>List Curriculum Vitae</b></h4>
                            <div class="ms-auto">
                                <div>
                                <a href="<?= base_url(route_to('cv-add')) ?>" class="btn btn-soft-primary">
                                        <i class="mdi mdi-checkbox-multiple-blank-circle"></i>
                                        <b>New Record</b>
                                        </a>
                                </div>
                            </div>
                        </div>
                        <!-- end header  -->
                        <div class="table-responsive mb-0">
                            <table aria-describedby="user-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="th" width="5px">#</th>
                                        <th scope="th">Nama</th>
                                        <th scope="th">Jabatan</th>
                                        <th scope="th">No Telepon</th>
                                        <th scope="th">Email</th>
                                        <?php if (session()->get('role') == 'Admin') { ?>
                                            <th scope="th" width="170px">Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($records as $key => $val) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $val['name'] ?></td>
                                            <td><?= $val['title'] ?></td>
                                            <td><?= $val['phone'] ?></td>
                                            <td><?= $val['email'] ?></td>

                                            <?php if (session()->get('role') == 'Admin') { ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url(route_to('cv-edit', $val['id'])) ?>" class="btn btn-warning btn-sm">
                                                        <i class="bx bx-pencil"></i>
                                                    </a>
                                                    <button class="delete btn btn-danger btn-sm" onclick="deleteCV(<?= $val['id'] ?>)">
                                                        <i class=" bx bx-trash"></i>
                                                    </button>
                                                    <a class="btn btn-danger btn-sm" href="<?= base_url(route_to('generate-cv-pdf', $val['id'])) ?>">
                                                        <i class="bx bx-download"></i>
                                                    </a>
                                                    <a class="btn btn-success btn-sm" href="<?= base_url(route_to('generate-cv-excel', $val['id'])) ?>">
                                                        <i class="bx bx-download"></i>
                                                    </a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                        $no++;
                                    } ?>

                                    <?php if ($no == 0) : ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Data tidak tersedia</td>
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


<script>
    function deleteCV(id) {
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
                window.location.href = '<?= base_url(route_to('cv-delete')) ?>' + '?id=' + id
            }
        });
    }
</script>

<?= $this->endSection() ?>