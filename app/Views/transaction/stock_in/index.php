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
                            <!-- <h4 class="me-2"><b>List Stock</b></h4> -->
                            <div class="ms-auto">
                                <div>
                                    <a href="<?= base_url(route_to('stock-add')) ?>" class="btn btn-soft-primary">
                                        <i class="mdi mdi-checkbox-multiple-blank-circle"></i>
                                        <b>New Record</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- end header  -->

                        <!-- isi content  -->
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width='5px'>#</th>
                                    <th>No Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th width='100px'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($records as $key => $val) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $val['transaction_code'] ?></td>
                                        <td><?= $val['date'] ?></td>
                                        <td><?= $val['note'] ?></td>
                                        <?php if (session()->get('role') == 'Admin') { ?>
                                            <td class="text-center">
                                                <a href="<?= base_url(route_to('stock-view', $val['id'])) ?>" class="btn btn-info btn-sm">
                                                    <i class="mdi mdi-eye-settings-outline"></i>
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
                        <!-- end isi content  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>