Berikut adalah versi sederhana dari file `README.md`:


# PHP AJAX JSON Example with Bootstrap 5.3.3

## Deskripsi
Proyek ini adalah contoh sederhana integrasi antara PHP, JavaScript, dan Bootstrap 5.3.3. Aplikasi ini memungkinkan pengguna mengirim data siswa (nama dan kelas) ke server menggunakan AJAX, memprosesnya di PHP, dan menampilkan respon di modal.

---

## Teknologi
- PHP 7.4+ atau versi lebih baru
- JavaScript (Fetch API)
- Bootstrap 5.3.3 (via CDN)

---

## Cara Menggunakan
1. Jalankan server lokal (XAMPP, WAMP, atau server bawaan PHP):
   ```bash
   php -S localhost:8000
   ```
2. Buka file `index.html` di browser melalui alamat:
   ```
   http://localhost:8000/index.html
   ```
3. Isi form dengan nama dan kelas, lalu klik tombol `Kirim`.
4. Pesan dari server akan muncul di modal.

---

## File dalam Proyek
- `index.html` : Halaman utama dengan form dan modal.
- `proses.php` : Backend untuk memproses data JSON dari frontend.

---

## Lisensi
Proyek ini dilisensikan di bawah lisensi MIT.

## Penjelasan Program PHP
Berikut penjelasan kode program ``prosess.php`` dan kegunaannya.

Program PHP ini menangani input data dalam format JSON dari sebuah permintaan HTTP dan memberikan respons dalam format JSON. Berikut adalah penjelasan tiap bagian kode:

---

### **1. `header('Content-Type: application/json');`**
- **Fungsi:** Mengatur header HTTP untuk memberitahu klien bahwa server akan mengirimkan data dalam format JSON.
- **Tujuan:** Supaya browser atau klien yang menerima respons tahu bahwa konten adalah JSON, sehingga bisa memprosesnya dengan benar.

---

### **2. `$input = file_get_contents('php://input');`**
- **Fungsi:** Membaca isi dari tubuh (body) permintaan HTTP. 
- **Tujuan:** Mendapatkan data mentah (raw data) yang dikirim oleh klien, biasanya dalam format JSON.

---

### **3. `$data = json_decode($input, true);`**
- **Fungsi:** Mengonversi data JSON mentah menjadi array asosiatif PHP.
  - Parameter `true` memastikan hasilnya berupa array, bukan objek PHP.
- **Tujuan:** Mempermudah pengolahan data yang dikirimkan oleh klien.

---

### **4. `if (isset($data['nama']) && isset($data['kelas'])) { ... }`**
- **Fungsi:** Memeriksa apakah data yang dikirimkan oleh klien berisi kunci `nama` dan `kelas`.
- **Tujuan:** Memastikan bahwa data yang diperlukan ada sebelum melanjutkan proses.

---

### **5. `$nama = htmlspecialchars($data['nama']);`**
- **Fungsi:** Mengambil nilai `nama` dari data yang dikirim, lalu membersihkannya dari karakter berbahaya menggunakan fungsi `htmlspecialchars`.
  - Fungsi ini mencegah serangan *Cross-Site Scripting (XSS)* dengan mengubah karakter seperti `<`, `>`, dan `"` menjadi entitas HTML.
- **Tujuan:** Menjamin keamanan data sebelum digunakan.

---

### **6. `$kelas = htmlspecialchars($data['kelas']);`**
- **Fungsi:** Sama seperti poin 5, tetapi untuk nilai `kelas`.

---

### **7. `$message = "Selamat datang, $nama dari kelas $kelas!";`**
- **Fungsi:** Membuat pesan sambutan dengan menggunakan data `nama` dan `kelas`.
- **Tujuan:** Memberikan respons dinamis berdasarkan input klien.

---

### **8. `echo json_encode(['message' => $message]);`**
- **Fungsi:** Mengonversi array PHP menjadi format JSON, lalu mengirimkannya kembali sebagai respons HTTP.
- **Tujuan:** Mengirimkan pesan ke klien dalam format JSON yang mudah dibaca oleh aplikasi klien.

---

### **9. `else { echo json_encode(['message' => 'Data tidak lengkap!']); }`**
- **Fungsi:** Memberikan respons error dalam format JSON jika data yang diperlukan (`nama` dan `kelas`) tidak ditemukan.
- **Tujuan:** Memberitahu klien bahwa data yang dikirim tidak memenuhi syarat.

--- 

### **Alur Program**
1. Klien mengirim data dalam format JSON melalui permintaan HTTP (misalnya POST).
2. Server membaca data menggunakan `file_get_contents('php://input')`.
3. Data diubah menjadi array PHP menggunakan `json_decode`.
4. Program memvalidasi data:
   - Jika data lengkap, dibuat pesan sambutan berdasarkan data `nama` dan `kelas`.
   - Jika data tidak lengkap, diberikan pesan error.
5. Pesan dikembalikan ke klien dalam format JSON. 

---

### **Kegunaan Program**
Program ini dapat digunakan dalam aplikasi berbasis API untuk menangani input dari klien, seperti form pengisian nama dan kelas, yang kemudian memberikan respons berupa pesan dinamis.