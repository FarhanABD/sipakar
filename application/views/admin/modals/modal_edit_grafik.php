<!-- Modal Edit -->
<?php foreach ($grafik as $g) : ?>
<div class="modal fade" id="editGrafikModal<?= $g['id_grafik']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="forModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="apasih">Edit Data Stunting</h5>
                <form action="<?= base_url('grafik/editGrafik'); ?>" method="post">
            </div>
            <input type="hidden" name="id" value="<?= $g['id_grafik']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $g['kode']; ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                        value="<?= $g['nama_kecamatan']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $g['jumlah']; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>