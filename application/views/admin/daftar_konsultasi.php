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
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Tanggal</th>
                          <th>Username</th>
                          <th>Penyakit</th>
                          <th>Nilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($dftr_konsul as $konsul) : ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= (new DateTime($konsul['tanggal']))->format('d F Y'); ?></td>
                            <td><?= $konsul['name']; ?></td>
                            <td><?= $konsul['nama_penyakit']; ?></td>
                            <td><?= $konsul['nilai']; ?>%</td>
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