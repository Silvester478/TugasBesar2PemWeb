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
                        <form action="<?= base_url(route_to('stock-out-store')) ?>" method="post" id="MyForm">

                            <div class="d-flex flex-wrap align-items-center mb-4">
                                <h4 class="me-2"><b>New Record</b></h4>
                                <div class="ms-auto">
                                    <div>
                                        <a href="#" class="btn btn-sm btn-soft-warning" onclick="history.back();">
                                            <i class=" dripicons-chevron-left"></i>
                                            Back</a>
                                        <button type="submit" class="btn btn-success btn-sm btnSubmit">Submit</button>
                                        <!-- <button type="submit" class="hide"></button> -->
                                    </div>
                                </div>
                            </div>
                            <!-- end header  -->
                            <!-- isi content  -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No Permintaan</label>
                                        <input class="form-control" name="transaction_code" id="transaction_code" type="text" placeholder="TRX/2022-IV/001" value="TRX-OUT/<?= date('Y-md/His') ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Tanggal Barang Keluar</label>
                                        <input class="form-control" name="date" type="date" value="<?= date('Y-m-d') ?>" id="example-date-input">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Catatan</label>
                                        <textarea name="note" class="form-control" id="note" cols="3" rows="3"></textarea>
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
                                            <th width='200px'>Stock</th>
                                            <th width='200px'>Qty</th>
                                            <th width='50px'><button class="btn btn-sm btn-success addFile" type="button"><i class="bx bx-plus"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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
<?= $this->section('script') ?>

<script>
    no = 0;

    var getProduct = <?= json_encode($record) ?>;
    $('body').on('click', '.addFile', function() {
        no++;

        select = "<select required name='stock_details[" + no + "][product_id]' data-name='product_id' class='form-control product_id'>";
        select += "<option value=''>--pilih barang--</option>";
        $.each(getProduct, function(k, v) {
            select += "<option value='" + v.id + "' no='" + no + "'>" + v.code + ' - ' + v.name + "</option>";
        });
        select += "</select>";
        html = '<tr>' +
            "<td class='number text-center'>" +
            no +
            "</td>" +
            "<td>" +
            select +
            "</td>" +
            "<td>" +
            "<input type='number' data-name='stock' name='stock_details[" + no + "][stock]' class='form-control stock stock" + no + "' readonly>" +
            "</td>" +
            "<td>" +
            "<input type='number' data-name='qty' name='stock_details[" + no + "][qty]' class='form-control qty' required>" +
            "</td>" +
            "<td class='text-center'>" +
            '<button type="button" class="btn btn-danger btn-sm dellFile"><span class="fas fa-times"></span></button>' +
            "</td>";
        $('.tableFile tbody').append(html);
    });

    // click dell file
    $('body').on('click', '.dellFile', function() {
        var tr = $(this).closest("tr");
        tr.remove();

        $.each($(".tableFile tbody tr:not(.tr-input)"), function(e, item) {
            //ganti nomor per TR
            var no = e * 1 + 1;
            $(this).find(".number").html(no);

            //NEANGAN INPUTAN PER TR
            $.each($(this).find("input"), function(s, f) {
                var dataName = $(this).data("name");
                $(this).attr("name", "stock_details[" + no + "][" + dataName + "]");
            })

            $.each($(this).find("select"), function(s, f) {
                var dataName = $(this).data("name");
                $(this).attr("name", "stock_details[" + no + "][" + dataName + "]");
            })
        })
        no = no - 1;
    });

    $('body').on('click', '.btnSubmit', function() {
        validate = true;
        if (no == 0) {
            msg = "Tambahkan barang terlebih dahulu.";
            validate = false;
            $('.addFile').trigger('click');
        }

        // celk validation 
        if (validate) {
            var isValid = $(e.target).parents('form').isValid();
            if (!isValid) {
                e.preventDefault(); //prevent the default action
            } else {
                $('#MyForm').submit();
            }
        } else {
            swal.fire('Oops', msg, 'error');
        }
    })

    $('body').on('change', '.product_id', function() {
        var value = $(this).val();
        var no = $('option:selected', this).attr('no');
        // console.log(no);

        $.getJSON("<?= base_url('stock-outs/get-stock') ?>" + "/" + value)
            .done(function(json) {
                var stock = json.all_stock;
                $(".stock" + no).val(stock);
            })
            .fail(function(jqxhr, textStatus, error) {
                // var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
            });
    });

    $('body').on('keyup', '.qty', function() {
        var value = $(this).val();
        // Get the current row
        var row = $(this).closest('tr');
        // find class 
        var amount = row.find('.stock').val();
        if (parseInt(value) > parseInt(amount)) {
            $(this).val(amount);
            swal.fire('Info', 'stock kurang!', 'info');
        }
    });
</script>
<?= $this->endSection() ?>