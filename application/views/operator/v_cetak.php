

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
                                    <label class="col-md-2 col-form-label">Periode</label>
                                    <div class="col-md-2">
                                        <?php
                                        $monthArray = range(1, 12);
                                        ?>
                                        <select name="periode" id="periode" class="form-control">
                                           <?php
                                            foreach ($monthArray as $month) {
                                                $monthPadding = str_pad($month, 2, "0", STR_PAD_LEFT);
                                                $fdate = date("F", strtotime("2015-$monthPadding-01"));
                                                $selected = ($monthPadding == date("m")) ? 'selected' : '';
                                                echo '<option '.$selected.' value="'.$monthPadding.'">'.$fdate.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <label class=" col-form-label">Tahun</label>
                                    <div class="col-md-2">
                                                                                <?php
                                        // set start and end year range
                                        $yearArray = range(2018, 2025);
                                        ?>
                                        <select name="tahun" id="tahun" class="form-control">
                                            <?php
                                            foreach ($yearArray as $year) {
                                                $selected = ($year == date("Y")) ? 'selected' : '';
                                                echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <label class=" col-form-label">Nama</label>
                                    <div class="col-md-3">
                                        <input type="text" name="nama" id="nama" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Kolektor</label>
                                    <div class="col-md-3">
                                        <select name="kolektor" class="form-control" required>
                                            <option value="">Semua</option>
                                            <?php
                                            foreach ($kolektor as $pembayaran){
                                                echo '<option value="'.$pembayaran['id_kolektor'].'">'.$pembayaran['kolektor'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>


                                <div class="form-group m-form__group row">
                                    <div class="col-lg-2 ">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" class="btn btn-info m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" value="Cari" onclick="getKwitansi();">
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
                                            Daftar Kwitansi
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">
                                <a href="" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" onclick="Cetak();"><i class="la la-print"> Cetak Kwitansi</i></a>
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
                                            <th style="text-align: center;">Alamat Mutasi</th>
                                            <th style="text-align: center;">No. Hp</th>
                                            <th style="text-align: center;">Jenis Pemasangan</th>
                                            <th style="text-align: center;">Iuran</th>
                                            <th style="text-align: center;">Terakhir Bayar</th>

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

    function getKwitansi() {
        var periode = $('#periode').val();
        var tahun = $('#tahun').val();
        var nama = $('#nama').val();
        var kolektor = $('#kolektor').val();


            $('#table2').DataTable({
                responsive: true,
                "iDisplayLength": 100,
                "bLengthChange": false,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true,
                "ordering": false,
                "ajax": {
                    "url": "<?php echo site_url('operator/CetakKwitansi/ajax_list') ?>/",
                    "type": "POST",
                    dataType: 'json',
                    data: {prd: periode, thn: tahun, nm:nama, klt:kolektor},

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
    function CekKwitansi() {
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

                for (var i=0, n=noreg.length;i<n;i++)
                {
                    if (noreg[i].checked)
                    {
                        vals += ","+noreg[i].value;
                    }
                }
                if (vals) vals = vals.substring(1);
                alert(vals)

            } else {
                $(".checkbox").each(function () {
                    $(this).prop("checked", false);
                });
                vals = [];
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
