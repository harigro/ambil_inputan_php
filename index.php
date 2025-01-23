<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP AJAX JSON Example</title>
    <link href="front/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container w-50 h-50 mt-5 border">
        <h1 class="text-center">Data Siswa</h1>
        <form id="dataForm">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" id="kelas" class="form-control" required>
            </div>
            <button type="button" id="submitBtn" class="btn btn-primary w-25 mb-4">Kirim</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Hasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Pesan akan ditampilkan di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="front/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
