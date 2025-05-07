        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-fw fa-list-alt"></i> Riwayat Diagnosis</h3>
                    </div>

                    <div class="title_right">
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Tanggal</th>
                                            <th>Gejala</th>
                                            <th>Diagnosis</th>
                                            <!-- <th>Nilai</th> -->
                                            <!-- <th width="15%">Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($riwayat_gejala as $gejala) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= (new DateTime($gejala['tanggal']))->format('d F Y'); ?></td>
                                            <td><?= $gejala['gejala']; ?></td>
                                            <td><?= $gejala['diagnosis']; ?></td>

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