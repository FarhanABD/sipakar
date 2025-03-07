        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-fw fa-users"></i> Data Pengguna</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Tgl Registrasi</th>
                          <th width="25%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($member as $m) : ?>
                          <?php
                          if ($m['is_active'] == 1) {
                            $m['is_active'] = 'Aktif';
                          } else {
                            $m['is_active'] = 'Tidak Aktif';
                          }
                          ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $m['name']; ?></td>
                            <td><?= $m['email']; ?></td>
                            <td><?= $m['is_active']; ?></td>
                            <td><?= (new DateTime($m['date_created']))->format('d F Y'); ?></td>
                            <td style="text-align: center">
                              <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editMemberModal<?= $m['id']; ?>"><i class="fa fa-fw fa-edit"></i> Ubah</a>
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
                              <a href="<?= base_url('member/hapusMember/') . $m['id']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> Hapus</a>
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