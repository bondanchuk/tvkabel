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
                "url": "<?php echo site_url('operator/Paralel/ajax_list') ?>",
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
        document.getElementById("set_nama").value = nama;
        document.getElementById("set_alamat").value = alamat;
        $('#modalPelanggan').modal('hide');
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