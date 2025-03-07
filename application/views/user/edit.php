<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-fw fa-pencil"></i> Edit Profile</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="clearfix"></div>
                    <div class="x_content">
                        <?= form_open_multipart('user/edit'); ?>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="email" name="email"
                                value="<?= $user['email']; ?>" readonly>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="name" name="name"
                                value="<?= $user['name']; ?>">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="berat_badan"
                                name="berat_badan" placeholder="Berat Badan (kg)" value="<?= $user['berat_badan']; ?>">
                            <span class="fa fa-balance-scale form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="tinggi_badan"
                                name="tinggi_badan" placeholder="Tinggi Badan (cm)"
                                value="<?= $user['tinggi_badan']; ?>">
                            <span class="fa fa-arrows-v form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="lingkar_kepala"
                                name="lingkar_kepala" placeholder="Lingkar Kepala (cm)"
                                value="<?= $user['lingkar_kepala']; ?>">
                            <span class="fa fa-circle-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="lingkar-lengan-atas"
                                name="lingkar_lengan_atas" placeholder="Lingkar Lengan Atas (cm)"
                                value="<?= $user['lingkar_lengan_atas']; ?>">
                            <span class="fa fa-child form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="clearfix"></div>
                        <div class="form-group">
                            <div class="col-sm-2" style="margin-bottom: 10px;">
                                <img src="<?= base_url('assets/images/') . $user['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary">Pilih foto</button>
                                    </span>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div style="margin-bottom: 55px; margin-top: 85px;">
                                    <button type="submit" class="btn btn-success tombol-submit">Submit</button>
                                    <button class="btn btn-warning" type="reset">Reset</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->