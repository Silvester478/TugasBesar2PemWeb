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
                        <form action="<?= base_url(route_to('cv-store')) ?>" method="post" id="MyForm">

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

                            <h5 class="me-2"><b>Data Pribadi</b></h5>
                            <hr>
                            
                            <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="basicpill-email-input" class="form-label">Foto Pribadi</label>
                                    <input type="file" name="photo" class="form-control" id="basicpill-email-input">
                                </div>
                            </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Masukkan Nama Anda" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input class="form-control" name="title" id="title" type="text" placeholder="Masukkan Jabatan Anda" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Tentang Saya</label>
                                        <textarea id="basicpill-address-input" name="description" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Tanggal Lahir</label>
                                        <input class="form-control" name="date_of_birth" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">No Telepon</label>
                                        <input class="form-control" name="phone" id="phone" type="text" placeholder="Masukkan Nomor Telepon Anda" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" id="email" type="text" placeholder="Masukkan Email Anda" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat Tempat Tinggal</label>
                                        <textarea id="basicpill-address-input" name="address" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class='col-md-12'>
                                    
                                <h5 class="me-2"><b>Data Pendidikan</b></h5>
                                <hr>
                                
                                <table class="table table-borderless tableEducation">
                                    <thead>
                                        <tr>
                                            <td style="padding: 0px">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-email-input" class="form-label">Nama Institusi</label>
                                                            <input type="text" name="master_cv_educations[0][name]" class="form-control" placeholder="Input Nama Institusi" id="basicpill-email-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-email-input" class="form-label">Jurusan</label>
                                                            <input type="text" name="master_cv_educations[0][title]" class="form-control" placeholder="Input Jurusan Anda" id="basicpill-email-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-date-input" class="form-label">Tanggal Mulai</label>
                                                            <input class="form-control" name="master_cv_educations[0][start_date]" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-date-input" class="form-label">Tanggal Selesai</label>
                                                            <input class="form-control" name="master_cv_educations[0][end_date]" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="padding: 0px !important; padding-top: 15px !important;" align="right">
                                                <div class="row">
                                                    <div class="col-md-2 offset-10">
                                                        <button class="btn btn-sm btn-success addEducation" type="button" style="width: 100% !important;"><i class="bx bx-plus"></i> Tambah Data Baru</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                </div>

                                <div class='col-md-12'>
                                    
                                <h5 class="me-2"><b>Pengalaman Kerja</b></h5>
                                <hr>

                                <table class="table table-borderless tableExperience">
                                    <thead>
                                        <tr>
                                            <td style="padding: 0px">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-email-input" class="form-label">Nama Perusahaan</label>
                                                            <input type="text" name="master_cv_experiences[0][company_name]" class="form-control" placeholder="Input Nama Perusahaan" id="basicpill-email-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basicpill-email-input" class="form-label">Jabatan</label>
                                                            <input type="text" name="master_cv_experiences[0][title]" class="form-control" placeholder="Input Jabatan Anda" id="basicpill-email-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-date-input" class="form-label">Tanggal Mulai</label>
                                                            <input class="form-control" name="master_cv_experiences[0][start_date]" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-date-input" class="form-label">Tanggal Selesai</label>
                                                            <input class="form-control" name="master_cv_experiences[0][end_date]" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="basicpill-address-input" class="form-label">Detail</label>
                                                            <textarea id="basicpill-address-input" name="master_cv_experiences[0][description]" class="form-control" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="padding: 0px !important; padding-top: 15px !important;" align="right">
                                                <div class="row">
                                                    <div class="col-md-2 offset-10">
                                                        <button class="btn btn-sm btn-success addExperience" type="button" style="width: 100% !important;"><i class="bx bx-plus"></i> Tambah Data Baru</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                </div>


                                <div class='col-md-12'>
                                    
                                <h5 class="me-2"><b>Kemampuan</b></h5>
                                <hr>

                                <table class="table table-borderless tableSkill">
                                    <thead>
                                        <tr>
                                            <td style="padding: 0px">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="basicpill-email-input" class="form-label">Kemampuan</label>
                                                            <input type="text" name="master_cv_skills[0][name]" class="form-control" placeholder="Input Kemampuan Anda" id="basicpill-email-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="padding: 0px !important; padding-top: 15px !important;" align="right">
                                                <div class="row">
                                                    <div class="col-md-2 offset-10">
                                                        <button class="btn btn-sm btn-success addSkill" type="button" style="width: 100% !important;"><i class="bx bx-plus"></i> Tambah Data Baru</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                </div>




                                </div>

                                </div>
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
noExperience = 0;
noEducation = 0;
noSkill = 0;

    $('body').on('click', '.addEducation', function() {
        noEducation++;
        html = '<tr>' +
            "<td style='padding: 0px;'>" +
            '<div class="row"><div class="col-lg-6"><div class="mb-3"><label for="basicpill-email-input" class="form-label">Nama Institusi</label><input type="text" name="master_cv_educations[' + noEducation + '][name]" class="form-control" placeholder="Input Nama Institusi" id="basicpill-email-input"></div></div><div class="col-lg-6"><div class="mb-3"><label for="basicpill-email-input" class="form-label">Jurusan</label><input type="text" name="master_cv_educations[' + noEducation + '][title]" class="form-control" placeholder="Input Jurusan Anda" id="basicpill-email-input"></div></div><div class="col-md-6"><div class="mb-3"><label for="example-date-input" class="form-label">Tanggal Mulai</label><input class="form-control" name="master_cv_educations[' + noEducation + '][start_date]" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input"></div></div><div class="col-md-6"><div class="mb-3"><label for="example-date-input" class="form-label">Tanggal Selesai</label><input class="form-control" name="master_cv_educations[' + noEducation + '][end_date]" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input"></div></div><div class="col-md-10"><hr></div><div class="col-md-2"><button type="button" class="btn btn-danger btn-sm delEducation" style="width: 100% !important"><span class="fas fa-times"></span> delete record</button></div></div>' +
            "</td>" +
            "</tr>";
        console.log(html);
        $('.tableEducation tbody').append(html);
    });

    $('body').on('click', '.addExperience', function() {
        noExperience++;
        html = '<tr>' +
            "<td style='padding: 0px;'>" +
            '<div class="row"><div class="col-lg-6"><div class="mb-3"><label for="basicpill-email-input" class="form-label">Nama Perusahaan</label><input type="text" name="master_cv_experiences[' + noExperience + '][company_name]" class="form-control" placeholder="Input Nama Perusahaan" id="basicpill-email-input"></div></div><div class="col-lg-6"><div class="mb-3"><label for="basicpill-email-input" class="form-label">Jabatan</label><input type="text" name="master_cv_experiences[' + noExperience + '][title]" class="form-control" placeholder="Input Jabatan Anda" id="basicpill-email-input"></div></div><div class="col-md-6"><div class="mb-3"><label for="example-date-input" class="form-label">Tanggal Mulai</label><input class="form-control" name="master_cv_experiences[' + noExperience + '][start_date]" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input"></div></div><div class="col-md-6"><div class="mb-3"><label for="example-date-input" class="form-label">Tanggal Selesai</label><input class="form-control" name="master_cv_experiences[' + noExperience + '][end_date]" type="date" value="<?= date('d-m-Y') ?>" id="example-date-input"></div></div><div class="col-lg-12"><div class="mb-3"><label for="basicpill-address-input" class="form-label">Detail</label><textarea id="basicpill-address-input" name="master_cv_experiences[' + noExperience + '][description]" class="form-control" rows="4"></textarea></div></div><div class="col-md-10"><hr></div><div class="col-md-2"><button type="button" class="btn btn-danger btn-sm delExperience" style="width: 100% !important"><span class="fas fa-times"></span> delete record</button></div></div>' +
            "</td>" +
            "</tr>";
        console.log(html);
        $('.tableExperience tbody').append(html);
    });

    $('body').on('click', '.addSkill', function() {
        noSkill++;
        html = '<tr>' +
            "<td style='padding: 0px;'>" +
            '<div class="row"><div class="col-lg-12"><div class="mb-3"><label for="basicpill-email-input" class="form-label">Kemampuan</label><input type="text" name="master_cv_skills[' + noSkill + '][name]" class="form-control" placeholder="Input Kemampuan Anda" id="basicpill-email-input"></div></div><div class="col-md-10"><hr></div><div class="col-md-2"><button type="button" class="btn btn-danger btn-sm delSkill" style="width: 100% !important"><span class="fas fa-times"></span> delete record</button></div></div>' +
            "</td>" +
            "</tr>";
        console.log(html);
        $('.tableSkill tbody').append(html);
    });

    // click dell file

    $('body').on('click', '.delEducation', function() {
        var tr = $(this).closest("tr");
        tr.remove();

        $.each($(".tableEducation tbody tr:not(.tr-input)"), function(e, item) {
            //ganti nomor per TR
            var no = e * 1 + 1;
            $(this).find(".number").html(no);

            //NEANGAN INPUTAN PER TR
            $.each($(this).find("input"), function(s, f) {
                var dataName = $(this).data("name");
                $(this).attr("name", "master_cv_educations[" + no + "][" + dataName + "]");
            })

            $.each($(this).find("select"), function(s, f) {
                var dataName = $(this).data("name");
                $(this).attr("name", "master_cv_educations[" + no + "][" + dataName + "]");
            })
        })
        no = no - 1;
    });


    $('body').on('click', '.delExperience', function() {
        var tr = $(this).closest("tr");
        tr.remove();

        $.each($(".tableExperience tbody tr:not(.tr-input)"), function(e, item) {
            //ganti nomor per TR
            var no = e * 1 + 1;
            $(this).find(".number").html(no);

            //NEANGAN INPUTAN PER TR
            $.each($(this).find("input"), function(s, f) {
                var dataName = $(this).data("name");
                $(this).attr("name", "master_cv_experiences[" + no + "][" + dataName + "]");
            })

            $.each($(this).find("select"), function(s, f) {
                var dataName = $(this).data("name");
                $(this).attr("name", "master_cv_experiences[" + no + "][" + dataName + "]");
            })
        })
        no = no - 1;
    });

    $('body').on('click', '.delSkill', function() {
        var tr = $(this).closest("tr");
        tr.remove();

        $.each($(".tableSkill tbody tr:not(.tr-input)"), function(e, item) {
            //ganti nomor per TR
            var no = e * 1 + 1;
            $(this).find(".number").html(no);

            //NEANGAN INPUTAN PER TR
            $.each($(this).find("input"), function(s, f) {
                var dataName = $(this).data("name");
                $(this).attr("name", "master_cv_skills[" + no + "][" + dataName + "]");
            })

            $.each($(this).find("select"), function(s, f) {
                var dataName = $(this).data("name");
                $(this).attr("name", "master_cv_skills[" + no + "][" + dataName + "]");
            })
        })
        no = no - 1;
    });

    $('body').on('click', '.btnSubmit', function() {
        validate = true;
        if (no == 0) {
            validate = false;
            $('.addFile').trigger('click');
        }

        // cek validation 
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
</script>
<?= $this->endSection() ?>