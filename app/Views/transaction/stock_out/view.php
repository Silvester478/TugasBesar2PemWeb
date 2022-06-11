<?= $this->extend('layout/main-layout') ?>

<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <?= $page_title ?>
        <!-- end page title -->

        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <!-- header  -->
                        <form action="<?= base_url(route_to('stock-store')) ?>" method="post" id="MyForm">

                            <div class="d-flex flex-wrap align-items-center mb-4">
                                <h4 class="me-2"><b>View Record</b></h4>
                                <div class="ms-auto">
                                    <div>
                                        <a href="#" class="btn btn-sm btn-soft-warning" onclick="history.back();">
                                            <i class=" dripicons-chevron-left"></i>
                                            Back</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end header  -->
                            <!-- isi content  -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No Permintaan</label>
                                        <input class="form-control" name="transaction_code" id="transaction_code" type="text" placeholder="TRX/2022-IV/001" value="<?= $record['transaction_code'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Tanggal Barang Keluar</label>
                                        <input class="form-control" name="date" type="date" value="<?= $record['date'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Catatan</label>
                                        <textarea name="note" class="form-control" id="note" cols="3" rows="3" disabled><?= $record['note'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h6>Detail Barang</h6>
                                <table class="table table-bordered table-striped tableFile">
                                    <thead>
                                        <tr>
                                            <th width='5px'>No</th>
                                            <th>Produk</th>
                                            <th width='100px'>Qty</th>
                                            <!-- <th width='50px'>
                                                <button class="btn btn-sm btn-success addFile" type="button"><i class="bx bx-plus"></i></button></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($stock_detail as $key => $value) {
                                        ?>
                                            <tr>
                                                <th><?= $key + 1 ?></th>
                                                <th><?= $value['code'] . '-' . $value['name'] ?></th>
                                                <th align="right"><?= $value['qty'] ?></th>
                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <!-- end isi content  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>