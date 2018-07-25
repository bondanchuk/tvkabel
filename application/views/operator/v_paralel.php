

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Registrasi Paralel</h3>
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
                                            Form Paralel
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">
                                <?php
                                $attributes = array('id' => 'form', 'class' => 'm-form m-form--label-align-right m-form--fit');
                                echo form_open('operator/Paralel/tambah_pelanggan', $attributes);
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
                                    <label class="col-md-2 col-form-label">Tanggal Daftar</label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" required>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="set_nama" id="set_nama" readonly>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Alamat</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="set_alamat" id="set_alamat" readonly>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Marketing</label>
                                    <div class="col-md-4">
                                        <select name="marketing" class="form-control" required>
                                            <?php
                                            foreach ($marketing as $mkt){
                                                echo '<option value="'.$mkt['id_marketing'].'">'.$mkt['marketing'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label class="col-md-3 col-form-label">Teknisi</label>
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
                                        <button type="submit" name="simpan" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom">
                                                <span>
                                                    <i class="la la-save"></i>
                                                    <span>Simpan</span>
                                                </span>
                                        </button>
                                    </div>
                                    <div class="col-lg-1 ">
                                        <button type="submit" name="reset" class="btn btn-secondary  m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom">
                                                <span>
                                                    <i class="la la-recycle"></i>
                                                    <span>Reset Data</span>
                                                </span>
                                        </button>
                                    </div>
                                </div>


                                <?php echo form_close(); ?>
                            </div>
                        </div>


                        <!--end::Portlet-->
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

