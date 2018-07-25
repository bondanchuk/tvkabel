
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">Registrasi Pelanggan Baru</h3>
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
                                            Form Pelanggan Baru
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="m-portlet__body">
                                <?php
                                $attributes = array('id' => 'form', 'class' => 'm-form m-form--label-align-right m-form--fit');
                                echo form_open('operator/Registrasi/tambah_pelanggan', $attributes);
                                ?>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">No Registrasi</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" value="<?= $noreg; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Tanggal Daftar</label>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" required>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">No KTP/SIM</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="no_ktp" id="no_ktp" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Alamat</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off" required>
                                        </div>
                                        <label class="col-md-2 col-form-label">No. Rumah</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="no_rumah" id="no_rumah" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Keterangan Rumah</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="keterangan_rumah" id="keterangan_rumah" autocomplete="off">
                                        </div>
                                        <label class="col-md-2 col-form-label">Keterangan Bangunan</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="keterangan_bangunan" id="keterangan_bangunan" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Blok</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="blok" id="blok" autocomplete="off" required>
                                        </div>
                                        <label class="col-md-2 col-form-label">Gang</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="gang" id="gang" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">RT</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="rt" id="rt" autocomplete="off">
                                        </div>
                                        <label class="col-md-2 col-form-label">RW</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="rw" id="rw" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Kelurahan</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="kelurahan" id="kelurahan">
                                        </div>
                                        <label class="col-md-2 col-form-label">Kecamatan</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Keterangan Alamat</label>
                                        <div class="col-md-5">
                                            <textarea class="form-control" rows="2" name="keterangan_alamat" id="keterangan_alamat"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Telp. Rumah</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="telp_rumah" id="telp_rumah" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">No. Hp</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="no_hp" id="no_hp" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Type Bangunan</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="tipe_bangunan" id="tipe_bangunan" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label class="col-md-2 col-form-label">Pembayaran</label>
                                        <div class="col-md-3">
                                            <select name="pembayaran" class="form-control" required>
                                            <?php
                                            foreach ($kolektor as $pembayaran){
                                                echo '<option value="'.$pembayaran['id_kolektor'].'">'.$pembayaran['kolektor'].'</option>';
                                            }
                                            ?>
                                            </select>
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
                                            <button type="submit" name="simpan" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--air m-btn--custom">
                                                <span>
                                                    <i class="la la-save"></i>
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

