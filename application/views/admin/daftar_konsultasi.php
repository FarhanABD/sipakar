        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-fw fa-user-md"></i> Daftar Konsultasi</h3>
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">
                                <div class="btn-group">
                                    <a href="<?= base_url('diagnosa/export_pdf') ?>" class="btn btn-danger">
                                        <i class="fa fa-file-pdf-o"></i> Cetak PDF
                                    </a>
                                    <a href="<?= base_url('konsultasi/export_excel'); ?>" class="btn btn-success">
                                        <i class="fa fa-file-excel-o"></i> Cetak Excel
                                    </a>
                                </div>
                                <br><br>
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Tanggal</th>
                                            <th>Username</th>
                                            <th width="25%">Gejala</th>
                                            <th>Diagnosis</th>
                                            <th width="15%">Pengobatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($dftr_konsul as $konsul) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= (new DateTime($konsul['tanggal']))->format('d F Y'); ?></td>
                                            <td><?= $konsul['nama_user']; ?></td>
                                            <td><?= $konsul['gejala']; ?></td>
                                            <td><?= $konsul['diagnosis']; ?>%</td>
                                            <td>
                                                <?php if (empty($konsul['pengobatan'])) : ?>
                                                <a href="" data-toggle="modal"
                                                    data-target="#newPengobatanModal<?= $konsul['id']; ?>"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-plus"></i> Tambah
                                                </a>
                                                <?php else : ?>
                                                <?= $konsul['pengobatan']; ?>
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->