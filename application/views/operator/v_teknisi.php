

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Master Teknisi</h3>
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
                                            Form Tambah Teknisi
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">
                                <?php
                                $attributes = array('id' => 'form', 'class' => 'm-form m-form--label-align-right m-form--fit');
                                echo form_open('operator/Teknisi/teknisi_tambah', $attributes);
                                ?>

                                <div class="form-group m-form__group row">
                                    <label class="col-md-2 col-form-label">Nama Teknisi</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" required>
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
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end::Body -->

