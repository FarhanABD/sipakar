<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar - Naïve Bayes</title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>style_diagnosa.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
    .card-transparent {
        background: rgba(102, 223, 183, 0.1) !important;
        backdrop-filter: blur(10px);
        border: none;
    }
    </style>
</head>

<body class="bg-success text-white">
    <div class="container py-5">
        <div class="card card-transparent p-4 text-white rounded">
            <h2 class="text-center mb-4">Pilih Gejala yang Dialami</h2>
            <form onsubmit="return validate();" action="<?= base_url('diagnosa/hasil'); ?>" method="POST">
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    <?php foreach ($gejala as $g) : ?>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="<?= $g['id_gejala']; ?>" name="gejala[]"
                                value="<?= $g['id_gejala']; ?>">
                            <label class="form-check-label" for="<?= $g['id_gejala']; ?>">
                                <?= $g['gejala']; ?>
                            </label>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-4 d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-cogs"></i> Proses</button>
                    <button type="reset" class="btn btn-danger px-4"><i class="fas fa-undo"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
    <script>
    function validate() {
        let checkboxes = document.querySelectorAll("input[name='gejala[]']:checked");
        if (checkboxes.length === 0) {
            alert('Gejala harus dipilih terlebih dahulu!');
            return false;
        } else if (checkboxes.length < 2) {
            alert('Pilih minimal 2 gejala!');
            return false;
        }
        return true;
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>