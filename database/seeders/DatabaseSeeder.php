<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Jurusan;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ================= ADMIN =================
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'name'     => 'Admin SMKN 4',
                'email'    => 'admin@smkn4bogor.sch.id',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        // ================= JURUSAN =================
        Jurusan::firstOrCreate(['slug' => 'pplg'], [
            'singkatan'      => 'PPLG',
            'nama'           => 'Pengembangan Perangkat Lunak dan Gim',
            'deskripsi'      => 'Belajar membuat aplikasi, website, dan gim.',
            'kompetensi'     => "Pemrograman Web (HTML, CSS, JavaScript, PHP)\nPengembangan Aplikasi Mobile\nPembuatan dan Desain Gim\nBasis Data (MySQL)\nUI/UX Design",
            'peluang_kerja'  => "Web Developer\nMobile Developer\nGame Developer\nUI/UX Designer\nDatabase Administrator\nMahasiswa Teknik Informatika",
        ]);

        Jurusan::firstOrCreate(['slug' => 'tjkt'], [
            'singkatan'      => 'TJKT',
            'nama'           => 'Teknik Jaringan Komputer dan Telekomunikasi',
            'deskripsi'      => 'Belajar jaringan komputer, server, dan keamanan jaringan.',
            'kompetensi'     => "Instalasi Jaringan LAN/WAN\nAdministrasi Server\nKonfigurasi Router & Switching (Mikrotik, Cisco)\nKeamanan Jaringan (Cyber Security Dasar)\nPerakitan dan Perawatan Komputer",
            'peluang_kerja'  => "Teknisi Jaringan\nNetwork Administrator\nIT Support\nSystem Administrator\nTechnical Support Engineer\nMahasiswa Teknik Komputer/Jaringan",
        ]);

        Jurusan::firstOrCreate(['slug' => 'to'], [
            'singkatan'      => 'TO',
            'nama'           => 'Teknik Otomotif',
            'deskripsi'      => 'Belajar perawatan dan perbaikan kendaraan bermotor.',
            'kompetensi'     => "Perawatan Mesin Kendaraan Bermotor\nSistem Kelistrikan & Injeksi Otomotif\nTune-up dan Diagnosa Kerusakan\nServis Chassis dan Suspensi\nK3 Bengkel",
            'peluang_kerja'  => "Mekanik Otomotif\nService Advisor\nTeknisi Bengkel Resmi\nOwner Bengkel\nQC Industri Otomotif\nMahasiswa D3/S1 Otomotif",
        ]);

        Jurusan::firstOrCreate(['slug' => 'tp'], [
            'singkatan'      => 'TP',
            'nama'           => 'Teknik Pengelasan',
            'deskripsi'      => 'Belajar fabrikasi logam dan teknik pengelasan.',
            'kompetensi'     => "Pengelasan SMA, MIG, dan TIG\nFabrikasi dan Konstruksi Logam\nMembaca Gambar Teknik (Blueprint)\nPengujian Hasil Las (NDT Dasar)\nK3 Las",
            'peluang_kerja'  => "Welder / Fabricator\nInspector Las (Sertifikasi BNSP)\nOperator Produksi Logam\nTeknisi Konstruksi Baja\nWirausaha Bengkel Las\nMahasiswa Teknik Mesin",
        ]);

        // ================= BERITA =================
        $beritas = [
            [
                'slug' => 'peresmian-jembatan-garuda',
                'judul' => 'Peresmian Jembatan Garuda',
                'kategori' => 'Kegiatan',
                'tanggal' => '2026-07-28',
                'gambar' => 'images/jembatan.webp',
                'ringkasan' => 'Kegiatan Peresmian Jembatan Garuda RW. 08 Kelurahan Muarasari Bogor Selatan.',
                'isi' => "SMKN 4 Bogor turut menghadiri acara peresmian Jembatan Garuda RW. 08, Kelurahan Muarasari, Kecamatan Bogor Selatan. Kegiatan ini merupakan wujud kolaborasi antara pihak sekolah dan warga sekitar dalam membangun fasilitas umum.\n\nJembatan yang telah diresmikan ini diharapkan dapat mempermudah akses warga dalam beraktivitas sehari-hari, sekaligus menjadi simbol kebanggaan masyarakat Muarasari.\n\nSekolah berharap kebersamaan seperti ini dapat terus terjalin, agar hubungan antara sekolah dan masyarakat sekitar semakin erat dan saling mendukung.",
            ],
            [
                'slug' => 'peduli-lingkungan',
                'judul' => 'Kegiatan SMKN 4 Bogor Peduli Lingkungan',
                'kategori' => 'Kegiatan',
                'tanggal' => '2026-07-24',
                'gambar' => 'images/lingkungan.webp',
                'ringkasan' => 'Kegiatan membersihkan sampah di lingkungan sungai di Jembatan Garuda Kencana Merah Putih Muarasari, Kec. Bogor Selatan.',
                'isi' => "Siswa-siswi SMKN 4 Bogor kembali menunjukkan kepedulian terhadap lingkungan dengan melakukan kegiatan bersih sungai di area Jembatan Garuda Kencana Merah Putih, Kelurahan Muarasari, Kecamatan Bogor Selatan.\n\nKegiatan ini diikuti dengan antusias oleh para siswa yang berhasil mengumpulkan karung-karung berisi sampah dari sepanjang bantaran sungai. Selain membersihkan, kegiatan ini juga menjadi sarana edukasi pentingnya menjaga alur sungai.\n\nMelalui aksi ini, sekolah berharap para siswa terbiasa peduli terhadap lingkungan sekitar dan menularkan budaya hidup bersih kepada masyarakat.",
            ],
            [
                'slug' => 'kelulusan-mpls',
                'judul' => 'Upacara Kelulusan MPLS Pancawaluya',
                'kategori' => 'Kegiatan',
                'tanggal' => '2026-07-21',
                'gambar' => 'images/kelulusan.webp',
                'ringkasan' => 'Kegiatan Kelulusan MPLS SMKN 4 Bogor telah dilaksanakan dengan penuh semangat dan kebersamaan di lapangan sekolah.',
                'isi' => "Kegiatan Kelulusan Masa Pengenalan Lingkungan Sekolah (MPLS) Pancawaluya SMKN 4 Bogor telah dilaksanakan dengan penuh semangat dan kebersamaan di lapangan sekolah.\n\nSeluruh siswa baru dinyatakan lulus dari rangkaian MPLS setelah mengikuti serangkaian kegiatan, mulai dari pengenalan sekolah, pembiasaan disiplin, hingga penguatan karakter.\n\nPara siswa baru diharapkan dapat menerapkan nilai-nilai yang telah diperoleh selama MPLS dalam kehidupan bersekolah sehari-hari.",
            ],
            [
                'slug' => 'aksi-ekologi',
                'judul' => 'Pelaksanaan Aksi Ekologi Pancawaluya',
                'kategori' => 'Kegiatan',
                'tanggal' => '2026-07-21',
                'gambar' => 'images/ekologi.jpg',
                'ringkasan' => 'Mari bersama menjaga kebersihan lingkungan sebagai langkah kecil untuk menciptakan lingkungan yang sehat, bersih, dan nyaman.',
                'isi' => "Aksi Ekologi Pancawaluya kembali digelar dengan mengusung tema menjaga kebersihan lingkungan. Kegiatan ini melibatkan siswa-siswi SMKN 4 Bogor dari berbagai jurusan.\n\nPeserta aksi berkeliling membersihkan lingkungan sekitar serta mengajak masyarakat untuk ikut menjaga kebersihan bersama-sama.\n\nMari bersama menjaga kebersihan lingkungan sebagai langkah kecil untuk menciptakan lingkungan yang sehat, bersih, dan nyaman.",
            ],
            [
                'slug' => 'pra-mpls',
                'judul' => 'Pra MPLS SMKN 4 Bogor',
                'kategori' => 'Kegiatan',
                'tanggal' => '2026-07-01',
                'gambar' => 'images/mpls.webp',
                'ringkasan' => 'Dimulai dengan senyuman, diakhiri dengan kesuksesan. Selamat bergabung para calon hebat!',
                'isi' => "Kegiatan Pra MPLS SMKN 4 Bogor resmi dimulai. Ratusan siswa baru terlihat antusias mengikuti rangkaian pembukaan yang berlangsung meriah di lingkungan sekolah.\n\nDimulai dengan senyuman, diakhiri dengan kesuksesan. Selamat bergabung para calon hebat! Saatnya mengenal lingkungan baru, dan mengukir prestasi di sekolah pusat keunggulan.\n\nKegiatan Pra MPLS ini merupakan pembuka sebelum siswa baru mengikuti rangkaian Masa Pengenalan Lingkungan Sekolah yang sesungguhnya.",
            ],
            [
                'slug' => 'tes-fisik',
                'judul' => 'Tes Fisik Persiapan Keberangkatan Ke Luar Negeri',
                'kategori' => 'Kegiatan',
                'tanggal' => '2026-07-05',
                'gambar' => 'images/tes.webp',
                'ringkasan' => 'Dengan fisik yang kuat dan mental yang hebat, langkah menuju karier global kini semakin dekat!',
                'isi' => "Tes fisik untuk persiapan keberangkatan ke luar negeri telah dilaksanakan di SMKN 4 Bogor. Kegiatan ini diikuti oleh siswa-siswi terpilih yang akan mengikuti program di luar negeri.\n\nDengan fisik yang kuat dan mental yang hebat, langkah menuju karier global kini semakin dekat!\n\nSeluruh peserta dinyatakan siap untuk melanjutkan ke tahap persiapan berikutnya, mulai dari kelengkapan dokumen hingga pembekalan bahasa.",
            ],
            [
                'slug' => 'lomba-saga',
                'judul' => 'Lomba SAGA VOL.II',
                'kategori' => 'Kegiatan',
                'tanggal' => '2026-06-17',
                'gambar' => 'images/lomba.webp',
                'ringkasan' => 'Kegiatan perlombaan untuk meningkatkan semangat sportivitas, kerja sama tim, serta mengembangkan potensi peserta didik.',
                'isi' => "Lomba SAGA VOL.II kembali diselenggarakan dengan berbagai cabang lomba menarik yang diikuti oleh tim-tim dari berbagai kelas.\n\nKegiatan perlombaan ini diselenggarakan untuk meningkatkan semangat sportivitas, kerja sama tim, serta mengembangkan potensi dan bakat peserta didik melalui berbagai kompetisi yang edukatif dan menyenangkan.\n\nPemenang dari setiap cabang lomba akan diumumkan pada acara penutupan dan mendapatkan hadiah menarik dari pihak sekolah.",
            ],
            [
                'slug' => 'tes-viera',
                'judul' => 'Pelaksanaan Tes VIERA',
                'kategori' => 'Kegiatan',
                'tanggal' => '2026-06-15',
                'gambar' => 'images/viera.webp',
                'ringkasan' => 'Tes VIERA diikuti seluruh siswa kelas XI untuk mengidentifikasi potensi, minat, dan kemampuan.',
                'isi' => "Pelaksanaan Tes VIERA telah diikuti oleh seluruh siswa kelas XI di SMKN 4 Bogor. Tes ini bertujuan untuk mengidentifikasi potensi, minat, dan kemampuan setiap siswa.\n\nHasil dari tes ini akan menjadi bekal dalam merencanakan masa depan, baik untuk melanjutkan studi maupun mempersiapkan diri memasuki dunia kerja.\n\nSekolah berharap melalui kegiatan ini para siswa dapat lebih mengenal dirinya sendiri dan lebih percaya diri dalam menentukan langkah setelah lulus.",
            ],
        ];

        foreach ($beritas as $b) {
            Berita::firstOrCreate(['slug' => $b['slug']], $b);
        }

        // ================= GALERI =================
        $fotos = [
            'silat.jpeg'       => 'Ekstrakurikuler Silat',
            'bola.jpeg'        => 'Ekstrakurikuler Sepak Bola',
            'basket.jpeg'      => 'Ekstrakurikuler Basket',
            'jalan sehat.jpeg' => 'Jalan Sehat',
            'onta.jpeg'        => 'Kegiatan Sekolah',
            'pramuka.jpeg'     => 'Ekstrakurikuler Pramuka',
            'jembatan.webp'    => 'Peresmian Jembatan Garuda',
            'lingkungan.webp'  => 'SMKN 4 Bogor Peduli Lingkungan',
            'kelulusan.webp'   => 'Kelulusan MPLS Pancawaluya',
            'ekologi.jpg'      => 'Aksi Ekologi Pancawaluya',
            'mpls.webp'        => 'Pra MPLS SMKN 4 Bogor',
            'lomba.webp'       => 'Lomba SAGA VOL.II',
            'viera.webp'       => 'Pelaksanaan Tes VIERA',
            'tes.webp'         => 'Tes Fisik Persiapan Keberangkatan',
        ];

        foreach ($fotos as $file => $judul) {
            Galeri::firstOrCreate(
                ['gambar' => 'images/' . $file],
                ['judul' => $judul]
            );
        }
    }
}