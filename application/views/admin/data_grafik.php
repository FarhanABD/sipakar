        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-fw fa-medkit"></i>Data Penderita Stunting</h3>
                </div>
                <div class="title_right">
                    <a href="" class="btn btn-success mb-3 pull-right" data-toggle="modal"
                        data-target="#newGrafikModal">
                        <i class="fa fa-fw fa-plus"></i> Tambah Data
                    </a>
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
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Jumlah</th>
                                        <th width="25%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($grafik as $p) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $p['kode']; ?></td>
                                        <td><?= $p['nama_kecamatan']; ?></td>
                                        <td><?= $p['jumlah']; ?></td>
                                        <td style="text-align: center">
                                            <a href="" class="btn btn-warning" data-toggle="modal"
                                                data-target="#editGrafikModal<?= $p['id_grafik']; ?>"><i
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
                                            <a href="<?= base_url('grafik/hapusGrafik/') . $p['id_grafik']; ?>"
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