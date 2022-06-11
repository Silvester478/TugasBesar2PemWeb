<?= $this->extend('layout/main-layout') ?>

<?= $this->section('content') ?>

<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                        </div>
                        <!-- end header  -->

                        <!-- isi content  -->
                        <table class="table table-striped table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th width='5px'>#</th>
                                    <th>Code Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Barang Masuk</th>
                                    <th>Barang Keluar</th>
                                    <th>Semua Stock</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($records as $key => $val) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $val->product_code ?></td>
                                        <td><?= $val->product_name ?></td>
                                        <td><?= $val->category_code ?></td>
                                        <td align="right"><?= $val->stock_in ?></td>
                                        <td align="right"><?= $val->stock_out ?></td>
                                        <td align="right"><?= $val->all_stock ?></td>
                                        <td><?= $val->unit_code ?></td>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <?php if ($no == 0) : ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Data tidak tersedia</td>
                                    </tr>
                                <?php endif ?>
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
<?= $this->section('script') ?>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script>
    $('.dataTable').DataTable();
</script>
<?= $this->endSection() ?>