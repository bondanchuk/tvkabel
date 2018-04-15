

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Data Status Pelanggan</h3>
                    </div>
                    <a href="<?php echo site_url('operator/LihatStatus')?>" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom"><i class="la la-list-ol"> Lihat Data</i></a>

                </div>
            </div>
            <!-- END: Subheader -->

            <div class="m-content">
                <div class="row">
                    <div class="col-xl-12">
                        <!--begin::Portlet-->
                        <div class="m-portlet" id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon">
                                                        <i class="flaticon-user-add"></i>
                                                    </span>
                                        <h3 class="m-portlet__head-text">
                                            Form Tambah Status Pelanggan
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">
                                <?php
                                $attributes = array('id' => 'form', 'class' => 'm-form m-form--label-align-right m-form--fit');
                                echo form_open('operator/Status/status_pelanggan', $attributes);
                                ?>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">No Registrasi</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="set_Noreg" id="set_Noreg" required readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#modalPelanggan" data-target="#modalPelanggan" data-toggle="modal" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom"><i class="la la-binoculars"> Cari Data</i></a>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Tanggal Status</label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" name="tanggal_status" id="tanggal_status" required>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-3">
                                        <select name="status" class="form-control" required>
                                            <option value="Aktif">Aktif Kembali</option>
                                            <option value="Putus Sementara">Putus Sementara</option>
                                            <option value="Putus">Putus</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Uraian</label>
                                    <div class="col-md-3">
                                        <textarea class="form-control" name="uraian"></textarea>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Teknisi</label>
                                    <div class="col-md-3">
                                        <select name="teknisi" class="form-control" required>
                                            <?php
                                            foreach ($teknisi as $teknik){
                                                echo '<option value="'.$teknik['id_teknisi'].'">'.$teknik['teknisi'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group m-form__group row">
                                    <div class="col-lg-2 ">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="simpan" class="btn btn-info m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom">
                                                <span>
                                                    <i class="la la-refresh"></i>
                                                    <span>Simpan</span>
                                                </span>
                                        </button>
                                    </div>
                                </div>


                                <?php echo form_close(); ?>
                            </div>
                        </div>






                        <!--end::Portlet-->
                    </div>

                    <div class="col-xl-6">
                        <div class="m-portlet" id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon">
                                                        <i class="flaticon-user-add"></i>
                                                    </span>
                                        <h3 class="m-portlet__head-text">
                                            Daftar Tunggakan
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">

                                <link href="<?php echo base_url(); ?>assets/Datatables/datatables.min.css" rel="stylesheet">
                                <link href="<?php echo base_url(); ?>assets/Datatables/Responsive-2.2.0/css/responsive.bootstrap.css" rel="stylesheet">

                                <div class="form-group m-form__group row">
                                    <table id="tbl_tunggakan" class="table table-striped" cellspacing="0" width="100%">
                                        <thead style="font-size: 12px; color: black;">
                                        <tr>

                                            <th>No</th>
                                            <th style="text-align: center;">Periode</th>
                                            <th style="text-align: center;">Jumlah Iuran</th>
                                            <th style="text-align: center;">Penagih</th>

                                        </tr>
                                        </thead>
                                        <tbody style="font-size:12px; color: black; text-align: center;">
                                        </tbody>
                                    </table>
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="m-portlet" id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon">
                                                        <i class="flaticon-user-add"></i>
                                                    </span>
                                        <h3 class="m-portlet__head-text">
                                            Biodata Pelanggan
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">

                                <link href="<?php echo base_url(); ?>assets/Datatables/datatables.min.css" rel="stylesheet">
                                <link href="<?php echo base_url(); ?>assets/Datatables/Responsive-2.2.0/css/responsive.bootstrap.css" rel="stylesheet">

                                <div class="form-group m-form__group row">
                                    <table id="tbl_biodata" class="table table-striped" cellspacing="0" width="100%">
                                        <thead style="font-size: 12px; color: black;">
                                        <tr>

                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Alamat</th>
                                            <th style="text-align: center;">Tanggal Pasang</th>
                                            <th style="text-align: center;">Jumlah Tv</th>
                                            <th style="text-align: center;">Status Pelanggan</th>

                                        </tr>
                                        </thead>
                                        <tbody style="font-size:12px; color: black; text-align: center;">
                                        </tbody>
                                    </table>
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bs-example-modal-md" tabindex="-1" id="modalPelanggan" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Cari Data Pelanggan</h4>
                            </div>

                            <div class="modal-body">

                                <div class="form-body" >
                                    <link href="<?php echo base_url(); ?>assets/Datatables/datatables.min.css" rel="stylesheet">
                                    <link href="<?php echo base_url(); ?>assets/Datatables/Responsive/css/responsive.bootstrap.css" rel="stylesheet">
                                    <br>
                                    <table id="table_status" class="table table-striped" cellspacing="0" width="100%">
                                        <thead style="font-size: 12px; color: black;">
                                        <tr>

                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Lengkap</th>
                                            <th style="text-align: center;">Alamat</th>
                                            <th style="text-align: center;">Nomor Rumah</th>
                                            <th style="text-align: center;">Blok</th>
                                            <th style="text-align: center;">No. Hp</th>
                                            <th style="text-align: center;">No. Registrasi</th>

                                        </tr>
                                        </thead>
                                        <tbody style="font-size:12px; color: black; text-align: center;">
                                        </tbody>
                                    </table>


                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end::Body -->

<!-- begin::Footer -->
<footer class="m-grid__item m-footer ">
    <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
        <div class="m-footer__wrapper">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                                <span class="m-footer__copyright">
                                    2017 &copy;  <a href="#" class="m-link"></a>
                                </span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end::Footer -->

</div>


<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/alertify.js"></script>
<script src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dashboard.js" type="text/javascript"></script>


<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/Datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/Datatables/Responsive/js/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>assets/Datatables/DataTables/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    var table;

    $(document).ready(function () {

        $('#table_status').DataTable({
            responsive: true,
            "iDisplayLength": 100,
            "bLengthChange": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('operator/Status/ajax_list') ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
            ],
            destroy: true,
        });
    });

    function setID(id, nama, alamat)
    {
        document.getElementById("set_Noreg").value = id;
        $('#modalPelanggan').modal('hide');

        $('#tbl_tunggakan').DataTable({
            responsive: true,
            "iDisplayLength": 100,
            "bLengthChange": false,
            "searching": false,
            "info":     false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('operator/IuranKolektor/ajax_tunggakan')?>/"+id,
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
            ],
            destroy: true,
        });

        $('#tbl_biodata').DataTable({
            responsive: true,
            "iDisplayLength": 100,
            "bLengthChange": false,
            "searching": false,
            "info":     false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('operator/Status/ajax_biodata')?>/"+id,
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
            ],
            destroy: true,
        });
    }




    $(document).ready(function () {

        $('#table2').DataTable({
            responsive: true,
            "iDisplayLength": 100,
            "bLengthChange": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('operator/Pemutusan/ajax_list') ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
            ],
            destroy: true,
        });
    });

    function setID2(id, nama, status)
    {
        document.getElementById("set_Noreg").value = id;
        document.getElementById("set_Nama").value = nama;
        document.getElementById("set_Status").value = status;
        $('#modalPelanggan').modal('hide');
    }



</script>

<?php
if ($this->session->flashdata('error')){?>
    <div class="alert alert-danger">
        <script>
            alertify.error('Salah !');
        </script>
    </div>
<?php }elseif ($this->session->flashdata('success')){ ?>
    <div class="alert alert-danger">
        <script>
            alertify.success('Benar !');
        </script>
    </div>
<?php } ?>
</body>
</html>