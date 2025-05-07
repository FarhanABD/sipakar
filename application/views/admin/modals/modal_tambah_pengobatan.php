<!-- Modal Tambah -->
<?php foreach ($dftr_konsul as $p) : ?>
<div class="modal fade" id="newPengobatanModal<?= $p['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="forModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="apasih">Edit Saran Pengobatan</h5>
                <form action="<?= base_url('konsultasi/tambahSaran'); ?>" method="post">
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?= $p['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="gejala" name="gejala" value="<?= $p['gejala']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="diagnosis" name="diagnosis"
                        value="<?= $p['diagnosis']; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pengobatan" name="pengobatan"
                        value="<?= $p['pengobatan']; ?>">
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