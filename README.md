# Business Requirements Document (BRD) - HRIS Backend Engine

## 📄 Informasi Proyek
| Item | Deskripsi |
| :--- | :--- |
| **Nama Proyek** | Core HRIS API Engine |
| **Framework** | Laravel 12 (Headless/Decoupled Architecture) |
| **Language** | PHP 8.3+ |
| **Kepatuhan Hukum** | UU Cipta Kerja No. 6/2023, PPh 21 TER (PP 58/2023), BPJS Kesehatan & Ketenagakerjaan |

---

## 1. Pendahuluan
Proyek ini bertujuan membangun **Headless HRIS Engine** yang mengelola seluruh siklus hidup karyawan (*Employee Lifecycle*) secara otomatis. Laravel 12 digunakan sebagai Backend API untuk memastikan performa tinggi, keamanan data finansial, dan skalabilitas. Sistem ini dirancang untuk diintegrasikan dengan Frontend (React/Vue/Mobile) melalui RESTful API.

---

## 2. Cakupan Sistem (Functional Requirements)

### A. Company & System Configuration (The Foundation)
Sebelum sistem digunakan, admin harus mengatur parameter legalitas dan kebijakan:
* **Legal Entity:** Nama perusahaan, NPWP, alamat kantor pusat/cabang, dan penandatangan dokumen.
* **Payroll Policy:** * Konfigurasi tanggal *cut-off* absensi dan pembayaran gaji.
    * Metode perhitungan pajak (Gross, Gross Up, Netto).
* **Work Schedule:** Jam kerja (Shift), toleransi keterlambatan, dan sinkronisasi kalender hari libur nasional.
* **Approval Workflow:** Pengaturan tingkat persetujuan (multi-level) untuk cuti, lembur, dan klaim biaya.

### B. Employee Onboarding (The Entrance)
Mengelola proses penerimaan karyawan baru agar terdata secara digital:
* **Pre-Onboarding:** Pengisian data mandiri oleh calon karyawan (Personal Info, Family, Education).
* **Document Management:** Upload otomatis KTP, NPWP, BPJS, KK, dan Ijazah dengan enkripsi file.
* **Employee ID Generator:** Pembuatan NIK (Nomor Induk Karyawan) otomatis berdasarkan tahun dan departemen.
* **Asset Assignment:** Pencatatan serah terima inventaris perusahaan (Laptop, Kendaraan, ID Card).

### C. Employee Movement (The Maintenance)
Mengelola dinamika karyawan selama bekerja:
* **Contract Management:** Notifikasi otomatis H-30 untuk kontrak PKWT yang akan habis.
* **Promotion, Demotion, & Transfer:** Pencatatan riwayat perubahan jabatan, divisi, atau lokasi kerja.
* **Grade & Compensation:** Update struktur gaji berdasarkan perubahan level organisasi.

### D. Time & Attendance (The Operations)
* **Geofencing API:** Validasi absensi berdasarkan koordinat GPS dan radius kantor.
* **Overtime (Lembur):** Kalkulasi otomatis uang lembur menggunakan indeks UU Cipta Kerja (1.5x, 2.0x, 3.0x, 4.0x).
* **Leave & Permit:** Pengajuan cuti tahunan, cuti melahirkan, izin sakit, dan potong cuti otomatis.

### E. Payroll & Tax Engine (The Core)
* **BPJS Calculation:** * Ketenagakerjaan (JKK, JKM, JHT, JP).
    * Kesehatan (4% Perusahaan, 1% Karyawan).
* **PPh 21 TER:** Implementasi Tarif Efektif Rata-rata sesuai kategori PTKP (A, B, C).
* **Salary Disbursement:** Export file CSV/Excel untuk *Mass Banking Transfer*.
* **Payslip Generator:** API untuk generate Slip Gaji PDF secara aman.

### F. Employee Offboarding (The Exit)
Proses pemberhentian atau pengunduran diri yang akurat secara hukum:
* **Resignation & Termination:** Alur persetujuan resign dan pencatatan alasan PHK.
* **Exit Clearance:** Checklist pengembalian aset dan penutupan akses sistem secara otomatis.
* **Severance Pay (Pesangon):** Kalkulasi otomatis Uang Pesangon (UP), Uang Penghargaan Masa Kerja (UPMK), dan Uang Penggantian Hak (UPH) sesuai Pasal 40 PP 35/2021.
* **Final Settlement:** Perhitungan gaji prorate dan penerbitan Surat Keterangan Kerja (Paklaring).

---

## 3. Spesifikasi Teknis & Arsitektur

### Backend Stack
* **Core:** Laravel 12.
* **Database:** PostgreSQL (Direkomendasikan untuk integritas data finansial).
* **Auth:** Laravel Sanctum (Stateless API Authentication).
* **Queue:** Laravel Horizon (Proses payroll, kirim email, dan generate PDF).
* **Documentation:** Swagger/OpenAPI via Scribe.

### Keamanan Data
* **Data Encryption:** Menggunakan `Illuminate\Support\Facades\Crypt` untuk data sensitif seperti Gaji dan NIK.
* **Audit Trail:** Setiap aktivitas `Store`, `Update`, dan `Delete` dicatat dalam tabel `audit_logs`.
* **CORS Policy:** Pembatasan akses API hanya dari domain Frontend yang didaftarkan.

---

## 4. Struktur API Utama (Endpoints Overview)

| Endpoint | Method | Deskripsi |
| :--- | :--- | :--- |
| `/api/v1/settings` | GET/PATCH | Pengaturan kebijakan perusahaan. |
| `/api/v1/onboarding` | POST | Inisiasi proses karyawan baru. |
| `/api/v1/attendance` | POST | Log absensi GPS & Foto. |
| `/api/v1/payroll/process` | POST | Eksekusi kalkulasi gaji bulanan. |
| `/api/v1/offboarding` | POST | Inisiasi proses keluar & hitung pesangon. |

---

## 5. Kepatuhan Regulasi (Compliance)
1.  **PPh 21:** Perhitungan pajak bulanan otomatis mengikuti tabel TER 2024.
2.  **BPJS:** Update limit upah minimum/maksimum BPJS secara berkala melalui menu Settings.
3.  **UU Ciptaker:** Standar perhitungan lembur dan pesangon yang selalu mutakhir.

---

## 6. Pengembangan Mendatang
* Integrasi dengan API BPJS Kesehatan (PPU).
* Modul Recruitment (Applicant Tracking System).
* Performance Appraisal (KPI & 360 Feedback).