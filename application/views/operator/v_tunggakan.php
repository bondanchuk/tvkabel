

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Cetak Kwitansi</h3>
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
                                            Form Cari Kwitansi
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">

                                <div class="form-group m-form__group row">
                                    <label class="col-md-1 col-form-label">Nama</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="nama" id="nama" autocomplete="off">
                                    </div>
                                    <label class="col-md-1 col-form-label">No.Registrasi</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="noreg" id="noreg" autocomplete="off">
                                    </div>
                                    <label class="col-md-1 col-form-label">Alamat</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-1 col-form-label">Tunggakan</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" name="tunggakan" id="tunggakan" required>
                                    </div>
                                    <label class="col-form-label">Tgl Terakhir Bayar</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="tglbayar" id="tglbayar" required>
                                    </div>
                                    <label class="col-form-label">Status Pelanggan</label>
                                    <div class="col-md-2">
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Semua</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Putus">Putus</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group m-form__group row">
                                    <div class="col-lg-2">
                                        <input type="submit" class="btn btn-info m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" value="Cari" onclick="getTunggakan();">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--begin::Portlet-->

                    <div class="col-xl-12">
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
                                <a href="" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" onclick="Cetak();"><i class="la la-print"> Cetak Tunggakan</i></a>
                                <input class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" type="submit" onclick="Cetak();">
                                <br>
                                <br>

                                <link href="<?php echo base_url(); ?>assets/Datatables/datatables.min.css" rel="stylesheet">
                                <link href="<?php echo base_url(); ?>assets/Datatables/Responsive-2.2.0/css/responsive.bootstrap.css" rel="stylesheet">

                                <div class="form-group m-form__group row">
                                    <table id="table2" class="table table-striped" cellspacing="0" width="100%">
                                        <thead style="font-size: 12px; color: black;">
                                        <tr>
                                            <th><input type="checkbox" class="Form-Control" name="cekAll" id="cekAll"></th>
                                            <th>No</th>
                                            <th style="text-align: center;">No. Registrasi</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Alamat</th>
                                            <th style="text-align: center;">No. Hp</th>
                                            <th style="text-align: center;">status</th>
                                            <th style="text-align: center;">Tgl Bayar Terakhir</th>
                                            <th style="text-align: center;">Tagihan</th>
                                            <th style="text-align: center;">Iuran</th>
                                            <th style="text-align: center;">Jumlah</th>

                                        </tr>
                                        </thead>
                                        <tbody style="font-size:12px; color: black; text-align: center;">
                                        </tbody>
                                    </table>
                                </div>

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

    function getTunggakan() {
        var nama = $('#nama').val();
        var noreg = $('#noreg').val();
        var alamat = $('#alamat').val();
        var tunggakan = $('#tunggakan').val();
        var tglbayar = $('#tglbayar').val();
        var status = $('#status').val();


        $('#table2').DataTable({
            responsive: true,
            "iDisplayLength": 100,
            "bLengthChange": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "ordering": false,
            "ajax": {
                "url": "<?php echo site_url('operator/Tunggakan/ajax_list') ?>/",
                "type": "POST",
                dataType: 'json',
                data: {nama: nama, noreg: noreg, almt:alamat, tgkn:tunggakan, tglbyr:tglbayar, stts:status},

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
    var vals=[];
    function CekKwitansi(id) {
        var noreg = document.getElementsByName('noreg[]');
        vals = [];


        for (var i=0, n=noreg.length;i<n;i++)
        {
            if (noreg[i].checked)
            {
                vals += ","+noreg[i].value;
            }
        }
        if (vals) vals = vals.substring(1);
        alert(vals)
    }

    function Cetak() {

        window.location.href = "<?php echo base_url('index.php/operator/CetakKwitansi/Cetak')?>/"+vals;
    }

    $(document).ready(function() {
        // Check or Uncheck All checkboxes
        $("#cekAll").change(function () {
            var checked = $(this).is(':checked');
            if (checked) {
                $(".checkbox").each(function () {
                    $(this).prop("checked", true);
                });
            } else {
                $(".checkbox").each(function () {
                    $(this).prop("checked", false);
                });
            }
        });
    });

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
