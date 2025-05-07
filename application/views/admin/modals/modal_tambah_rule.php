<!-- Modal Tambah -->
<div class="modal fade" id="newRuleModal" tabindex="-1" role="dialog" aria-labelledby="forModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="apasih">Tambah Rule</h5>
            </div>
            <form action="<?= base_url('rule/tambahRule'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" name="nama_penyakit">
                            <option>-- Nama Penyakit --</option>
                            <?php foreach ($penyakit as $p) : ?>
                            <option value="<?= $p['id_penyakit']; ?>"><?= $p['nama_penyakit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="nama_gejala">
                            <option>-- Gejala --</option>
                            <?php foreach ($gejala as $g) : ?>
                            <option value="<?= $g['id_gejala']; ?>"><?= $g['gejala']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prob" name="prob" placeholder="Nilai Probabilitas">
                        <small id="probError" class="text-danger"></small>

                        <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.querySelector("form").addEventListener("submit", function(event) {
                                let penyakit = document.querySelector("[name='nama_penyakit']").value;
                                let gejala = document.querySelector("[name='nama_gejala']").value;
                                let prob = document.querySelector("#prob").value;

                                // Cek apakah semua field telah diisi
                                if (penyakit === "-- Nama Penyakit --" || gejala === "-- Gejala --" ||
                                    prob.trim() === "") {
                                    event.preventDefault(); // Mencegah form terkirim
                                    alert("Isi field terlebih dahulu");
                                    return;
                                }

                                // Cek apakah probabilitas hanya angka
                                if (isNaN(prob) || prob <= 0) {
                                    event.preventDefault();
                                    alert("Masukkan angka yang valid");
                                    return;
                                }
                            });
                        });
                        </script>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>