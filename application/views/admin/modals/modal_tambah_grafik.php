<!-- Tambahkan SweetAlert jika belum ada -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Modal Tambah -->
<div class="modal fade" id="newGrafikModal" tabindex="-1" role="dialog" aria-labelledby="forModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="apasih">Tambah Data Stunting</h5>
            </div>
            <form id="grafikForm" action="<?= base_url('grafik/tambahGrafik'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                            placeholder="Nama Kecamatan" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                            placeholder="Jumlah Prevalensi" min="1" step="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelector("#grafikForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah form terkirim langsung

    let namaKecamatan = document.getElementById("nama_kecamatan").value.trim();
    let jumlah = document.getElementById("jumlah").value.trim();

    if (namaKecamatan === "" || jumlah === "") {
        Swal.fire({
            icon: "warning",
            title: "Peringatan!",
            text: "Isi semua field terlebih dahulu!",
            confirmButtonColor: "#d33",
            confirmButtonText: "OK"
        });
        return;
    }

    if (isNaN(jumlah) || jumlah <= 0) {
        Swal.fire({
            icon: "error",
            title: "Error!",
            text: "Masukkan angka yang valid!",
        });
        return;
    }

    this.submit(); // Kirim form jika semua validasi lolos
});
</script>