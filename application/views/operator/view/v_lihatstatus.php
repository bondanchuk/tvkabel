

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
                                                        <i class="la la-th-list"></i>
                                                    </span>
                                        <h3 class="m-portlet__head-text">
                                            Form Mutasi Pelanggan
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">

                                <div class="form-group m-form__group row">
                                    <label class="col-md-1 col-form-label">Tanggal</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="tanggal1" id="tanggal1" required>
                                    </div>
                                    <label class="col-form-label">-</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="tanggal2" id="tanggal2" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-info m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" value="Cari" onclick="getTanggal();">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-1 col-form-label">Nama</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="nama" id="nama" autocomplete="off">
                                    </div>
                                    <label class="col-md-1 col-form-label">No.Registrasi</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="noreg" id="noreg" autocomplete="off">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-info m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom" value="Cari" onclick="getID();">
                                    </div>
                                </div>

                                <br>

                                <table id="tableStatus" class="table table-striped" cellspacing="0" width="100%">
                                    <thead style="font-size: 12px; color: black;">
                                    <tr>

                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">No Registrasi</th>
                                        <th style="text-align: center;">Nama Lengkap</th>
                                        <th style="text-align: center;">Alamat</th>
                                        <th style="text-align: center;">Tgl Status</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Uraian</th>
                                        <th style="text-align: center;">Aksi</th>

                                    </tr>
                                    </thead>
                                    <tbody style="font-size:12px; color: black; text-align: center;">
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!--end::Portlet-->
                    </div>
                </div>
                <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
                <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

                <script>
                    function setAjax(noreg) {

                        $.ajax({
                            url: "<?php echo site_url('operator/LihatMutasi/ajax_edit') ?>/" + noreg,
                            type: "GET",
                            dataType: "JSON",
                            success: function (data)
                            {
                                $('[name="set_noregistrasi"]').val(data.no_registrasi);
                                $('[name="set_namalengkap"]').val(data.nama_lengkap);
                                $('[name="set_nohp"]').val(data.no_hp);
                                $('[name="set_alamat2"]').val(data.alamat2);

                                $('#modal_edit').modal('show'); // show bootstrap modal when complete loaded
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error get data from ajax');
                            }
                        });
                    }
                </script>


                <div class="modal fade bs-example-modal-md" tabindex="-1" id="modal_edit" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <?php
                            $attributes = array('id' => 'form');
                            echo form_open('operator/LihatMutasi/update_mutasi', $attributes);
                            ?>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Cari Data Pelanggan</h4>
                            </div>

                            <div class="modal-body">

                                <div class="form-body" >
                                    <div class="form-group m-form__group row">
                                        <label class="col-md-3 col-form-label">No Registrasi</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="set_noregistrasi" id="set_noregistrasi" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-md-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="set_namalengkap" id="set_namalengkap" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-md-3 col-form-label">No. Hp</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="set_nohp" id="set_nohp" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-md-3 col-form-label">Alamat Mutasi</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="set_alamat2" id="set_alamat2"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <button type="button" class="btn btn-warning" onclick="hapus_mutasi();">Hapus</button>
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


<script src="<?php echo base_url(); ?>assets/js/alertify.js"></script>
<script src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dashboard.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>assets/Datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/Datatables/Responsive/js/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>assets/Datatables/DataTables/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

    function getTanggal() {

        var tanggal1 = $('#tanggal1').val();
        var tanggal2 = $('#tanggal2').val();
        if(tanggal1 == '' || tanggal2==''){
            alert("Tanggal Harus Diisi !!")
        }else{
            $('#tableMutasi').DataTable({
                responsive: true,
                "iDisplayLength": 100,
                "bLengthChange": false,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo site_url('operator/LihatStatus/ajax_list') ?>/",
                    "type": "POST",
                    dataType: 'json',
                    data: {tgl1: tanggal1, tgl2: tanggal2},

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
    }

    function getID() {

        var nama = $('#nama').val();
        var noreg = $('#noreg').val();
        $('#tableStatus').DataTable({
            responsive: true,
            "iDisplayLength": 100,
            "bLengthChange": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('operator/LihatStatus/ajax_id') ?>/",
                "type": "POST",
                dataType: 'json',
                data: {nama:nama, noreg:noreg, alamat:alamat, norumah:norumah, nohp:nohp},

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


    function hapus_mutasi() {
        var noreg = $('#set_noregistrasi').val();
        if (confirm('Hapus Data Mutasi?'))
        {

            $.ajax({
                url: "<?php echo site_url('operator/LihatMutasi/hapus_data') ?>/" + noreg,
                type: "POST",
                dataType: "JSON",
                success: function (data)
                {
                    //if success reload ajax table
                    $('#modal_edit').modal('hide');
                    table.ajax.reload(null, false);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });

        }
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