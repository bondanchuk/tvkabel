

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Form Pembayaran</h3>
                    </div>
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
                                            Form Iuran Kolektor
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">
                                <?php
                                $attributes = array('id' => 'form', 'class' => 'm-form m-form--label-align-right m-form--fit');
                                echo form_open('operator/IuranKolektor/pembayaran', $attributes);
                                ?>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Tanggal Bayar</label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" name="tanggal_bayar" id="tanggal_bayar" required>
                                    </div>

                                    <label class="col-md-2 col-form-label">Kolektor</label>
                                    <div class="col-md-3">
                                        <select name="kolektor" id="kolektor" class="form-control">
                                            <option value="">--Pilih Nama Kolektor--</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Nama</label>
                                    <div class="col-md-3">
                                        <label class="col-form-label" id="nama"></label>
                                    </div>

                                    <label class="col-md-2 col-form-label">No Registrasi</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="set_Noreg" id="set_Noreg" required readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="#modalPelanggan" data-target="#modalPelanggan" data-toggle="modal" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom"><i class="la la-binoculars"> Cari Data</i></a>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Alamat</label>
                                    <div class="col-md-3">
                                        <label class="col-form-label" id="alamat1"></label>
                                    </div>

                                    <label class="col-md-2 col-form-label">Alamat Mutasi</label>
                                    <div class="col-md-3">
                                        <label class="col-form-label" id="alamat2"></label>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">No. Hp</label>
                                    <div class="col-md-3">
                                        <label class="col-form-label" id="no_hp"></label>
                                    </div>

                                    <label class="col-md-2 col-form-label">Penagih</label>
                                    <div class="col-md-3">
                                        <label class="col-form-label" id="penagih"></label>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-3">
                                        <input class="form-control" id="status" name="status" readonly>
                                    </div>

                                    <label class="col-md-2 col-form-label">Jenis Pemasangan</label>
                                    <div class="col-md-1">
                                        <label class="col-form-label" id="jenis_pemasangan"></label><label class="col-md-1 col-form-label">Tv</label>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Bayar Untuk</label>
                                    <div class="col-md-1">
                                        <input name="bulan" id="bulan" class="form-control" onkeyup="getJumlah();">
                                    </div>
                                    <label class="  col-form-label">x</label>
                                    <div class="col-md-2">
                                        <input name="bulanan" id="bulanan" class="form-control" type="hidden">
                                        <label class="col-form-label" id="tx_bulanan"></label><label class="col-form-label">/bulan</label>
                                    </div>


                                    <label class="col-md-2 col-form-label">Jumlah Pembayaran</label>
                                    <div class="col-md-2">
                                        <input name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" readonly>
                                    </div>
                                </div>


                                <div class="form-group m-form__group row">
                                    <div class="col-lg-2 ">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="submit" name="simpan" class="btn btn-info m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom">
                                                <span>
                                                    <i class="la la-money"></i>
                                                    <span>Bayar</span>
                                                </span>
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                </div>



                        <!--begin::Portlet-->

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
                                        <table id="table2" class="table table-striped" cellspacing="0" width="100%">
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
                                            Daftar Pembayaran
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">

                                <link href="<?php echo base_url(); ?>assets/Datatables/datatables.min.css" rel="stylesheet">
                                <link href="<?php echo base_url(); ?>assets/Datatables/Responsive-2.2.0/css/responsive.bootstrap.css" rel="stylesheet">

                                <div class="form-group m-form__group row">
                                    <table id="table3" class="table table-striped" cellspacing="0" width="100%">
                                        <thead style="font-size: 12px; color: black;">
                                        <tr>

                                            <th>No</th>
                                            <th style="text-align: center;">Periode</th>
                                            <th style="text-align: center;">Jumlah Iuran</th>
                                            <th style="text-align: center;">Penagih</th>
                                            <th style="text-align: center;">Tanggal Bayar</th>

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


                        <!--end::Portlet-->

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
                                    <table id="table" class="table table-striped" cellspacing="0" width="100%">
                                        <thead style="font-size: 12px; color: black;">
                                        <tr>

                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Lengkap</th>
                                            <th style="text-align: center;">Alamat</th>
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

        $('#table').DataTable({
            responsive: true,
            "iDisplayLength": 100,
            "bLengthChange": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('operator/IuranKolektor/ajax_list') ?>",
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

    function setID(id, nama, alamat, alamat2, no_hp, penagih, status, jenis_pemasangan, iuran)
    {
        document.getElementById("set_Noreg").value = id;
        document.getElementById("nama").innerHTML = nama;
        document.getElementById("alamat1").innerHTML = alamat;
        document.getElementById("alamat2").innerHTML = alamat2;
        document.getElementById("no_hp").innerHTML = no_hp;
        document.getElementById("penagih").innerHTML = penagih;
        document.getElementById("status").value = status;
        document.getElementById("jenis_pemasangan").innerHTML = jenis_pemasangan;
        document.getElementById("tx_bulanan").innerHTML = iuran;
        document.getElementById("bulanan").value = iuran;
        $('#modalPelanggan').modal('hide');

        $(document).ready(function () {

            $('#table2').DataTable({
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

            $('#table3').DataTable({
                responsive: true,
                "iDisplayLength": 100,
                "bLengthChange": false,
                "searching": false,
                "info":     false,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo site_url('operator/IuranKolektor/ajax_pembayaran')?>/"+id,
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
    }


    function setID2(id)
    {
        document.getElementById("set_Noreg").value = id;
        $('#modalPelanggan').modal('hide');
    }

    function getJumlah()
    {
        $bulan = document.getElementById("bulan").value;
        $bulanan = document.getElementById("tx_bulanan").textContent;
        $bulanan2 = document.getElementById("bulanan").value;

        document.getElementById("jumlah_pembayaran").value = $bulan*$bulanan2;
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
