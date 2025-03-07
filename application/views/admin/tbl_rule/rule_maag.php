        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-fw fa-database"></i> Data Rule Beri Beri</h3>
                    </div>
                    <a href="" class="btn btn-success mb-3 pull-right" data-toggle="modal"
                        data-target="#newRuleModal"><i class="fa fa-fw fa-plus"></i> Tambah Rule</a>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <!-- <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal" data-target="#newRuleModal">Tambah Rule</a> -->
                            <div class="x_content">
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Penyakit</th>
                                            <th>Gejala</th>
                                            <th>Probabilitas</th>
                                            <th width="25%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($beri_beri as $m) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $m['nama_penyakit']; ?></td>
                                            <td><?= $m['gejala']; ?></td>
                                            <td><?= $m['probabilitas']; ?></td>
                                            <td style="text-align: center">
                                                <a href="" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editRuleModal<?= $m['id']; ?>"><i
                                                        class="fa fa-fw fa-edit"></i> Ubah</a>
                                                <script>
                                                $(".tombol-hapus").on("click", function(e) {
                                                    e.preventDefault();
                                                    const href = $(this).attr("href");

                                                    Swal({
                                                        title: "Apakah anda yakin",
                                                        text: "data ini akan dihapus",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#3085d6",
                                                        cancelButtonColor: "#d33",
                                                        confirmButtonText: "Hapus Data!"
                                                    }).then(result => {
                                                        if (result.value) {
                                                            document.location.href = href;
                                                        }
                                                    });
                                                });
                                                </script>
                                                <a href="<?= base_url('rule/hapusRule/') . $m['id']; ?>"
                                                    class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> Hapus</a>
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