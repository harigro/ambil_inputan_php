document.getElementById('submitBtn').addEventListener('click', async () => {
    const nama = document.getElementById('nama').value;
    const kelas = document.getElementById('kelas').value;
    const modal = new bootstrap.Modal(document.getElementById('resultModal'));

    // Fungsi validasi input
    const validateInput = (nama, kelas) => {
        if (!nama || !kelas) {
            return "Nama dan kelas harus diisi!";
        }
        return null; // Tidak ada masalah
    }

    const errorMessage = validateInput(nama, kelas);
    if (!nama || !kelas) {
        document.getElementById('modalBody').textContent = errorMessage;
        modal.show();
        return;
    }
    try {
        // Buat data JSON
        const data = { nama, kelas };
        // Kirim data ke server menggunakan Fetch API
        const response = await fetch('proses.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });
        // Parse respon dari server
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const result = await response.json();
        // Tampilkan hasil dalam modal
        document.getElementById('modalBody').textContent = result.message;
        // const modal = new bootstrap.Modal(document.getElementById('resultModal'));
        modal.show();
    } catch (error) {
        // Tangani error
        console.error('Error:', error);
        alert('Terjadi kesalahan! Silakan coba lagi.');
    }
});
