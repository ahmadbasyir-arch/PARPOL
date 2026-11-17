-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: wasbang
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anggotas`
--

DROP TABLE IF EXISTS `anggotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anggotas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivasi` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `anggotas_nik_unique` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggotas`
--

LOCK TABLES `anggotas` WRITE;
/*!40000 ALTER TABLE `anggotas` DISABLE KEYS */;
INSERT INTO `anggotas` VALUES (1,'Raden Muhammad Ilham','3201123456780001','ilham@example.com','081298765432','Jawa Barat','Kota Bogor','Mewujudkan tata kelola pedesaan mandiri pangan dan melek teknologi.','terverifikasi','2026-11-16 18:49:08','2026-11-16 18:49:08'),(2,'Anisa Rahmawati, S.E.','3171123456780002','anisa.rahma@example.com','081387654321','DKI Jakarta','Jakarta Selatan','Mendorong akses pembiayaan mikro bagi pedagang pasar tradisional.','terverifikasi','2026-11-16 18:49:08','2026-11-16 18:49:08');
/*!40000 ALTER TABLE `anggotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspirasis`
--

DROP TABLE IF EXISTS `aspirasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aspirasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diterima',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspirasis`
--

LOCK TABLES `aspirasis` WRITE;
/*!40000 ALTER TABLE `aspirasis` DISABLE KEYS */;
INSERT INTO `aspirasis` VALUES (1,'Pak Joko Susilo','joko.petani@example.com','Pertanian & Pangan','Perbaikan Irigasi Sawah di Karawang','Mohon bantuan Fraksi PARPOL untuk menyampaikan ke Dinas PUPR terkait normalisasi saluran irigasi sawah tersier di wilayah Karawang Timur yang mendangkal.','diproses','2026-11-16 18:49:08','2026-11-16 18:49:08'),(2,'Fitri Handayani','fitri.h@example.com','Pendidikan','Beasiswa Kuliah Mahasiswa Berprestasi Kurang Mampu','Apakah PARPOL memiliki program beasiswa advokasi jalur aspirasi DPR RI untuk mahasiswa aktif dari keluarga buruh tani?','diterima','2026-11-16 18:49:08','2026-11-16 18:49:08'),(3,'Bambang Tri','bambang.umkm@example.com','Ekonomi & UMKM','Pelatihan Legalitas Usaha & NIB Gratis','Sangat mengapresiasi program pendampingan izin edar BPOM dan NIB gratis dari DPD PARPOL. Semoga bisa rutin diadakan setiap bulan.','selesai','2026-11-16 18:49:08','2026-11-16 18:49:08');
/*!40000 ALTER TABLE `aspirasis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan_wasbangs`
--

DROP TABLE IF EXISTS `kegiatan_wasbangs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kegiatan_wasbangs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` int NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL DEFAULT '2026',
  `tanggal_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rincian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkas_laporan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'terarsip',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan_wasbangs`
--

LOCK TABLES `kegiatan_wasbangs` WRITE;
/*!40000 ALTER TABLE `kegiatan_wasbangs` DISABLE KEYS */;
INSERT INTO `kegiatan_wasbangs` VALUES (1,'Seleksi Lapangan Calon Paskibraka Kabupaten Tanah Laut Tahun 2026','Paskibraka','Rabu',18,'Maret',2026,'Rabu, 18 Maret 2026','Stadion Pertasi Kencana, Kecamatan Pelaihari','150 Pelajar SLTA se-Kabupaten Tanah Laut','Pelaksanaan uji kesamaptaan jasmani, postur, serta Peraturan Baris Berbaris (PBB) luar ruangan bagi calon Pasukan Pengibar Bendera Pusaka (Paskibraka) Kabupaten Tanah Laut tahun 2026 untuk persiapan penugasan Upacara HUT Kemerdekaan RI ke-81.','images/wasbang/paskibraka.jpg','https://www.youtube.com/watch?v=dQw4w9WgXcQ','docs/wasbang/laporan-seleksi-paskibraka-2026.pdf','terarsip','2026-11-16 18:49:07','2026-11-16 18:49:07'),(2,'Kemah Bakti Bela Negara & Penguatan Karakter Generasi Muda','Bela Negara','Sabtu',25,'April',2026,'Sabtu, 25 April 2026','Bumi Perkemahan Pantai Batakan Baru, Kecamatan Panyipatan','200 Pemuda Karang Taruna & Pramuka Penegak','Kegiatan luar ruangan (outbound) yang memadukan wawasan kebangsaan, latihan kepemimpinan lapangan, mitigasi ancaman narkoba dan radikalisme, serta penanaman jiwa korsa cinta tanah air.','images/wasbang/bela-negara.jpg','https://www.youtube.com/watch?v=dQw4w9WgXcQ','docs/wasbang/laporan-kemah-bela-negara-2026.pdf','terarsip','2026-11-16 18:49:07','2026-11-16 18:49:07'),(3,'Apel Akbar & Pawai Kebangsaan Peringatan Hari Lahir Pancasila','Bina Ideologi','Senin',1,'Juni',2026,'Senin, 01 Juni 2026','Halaman Depan Kantor Bupati Tanah Laut, Pelaihari','500 Peserta (ASN, Ormas, Tokoh Adat, dan Pelajar)','Upacara bendera peringatan Hari Lahir Pancasila dilanjutkan pawai kebhinekaan pakaian adat nusantara untuk memperkokoh persatuan dan kesatuan bangsa di Bumi Tuntung Pandang.','images/wasbang/pancasila.jpg','https://www.youtube.com/watch?v=dQw4w9WgXcQ','docs/wasbang/laporan-hari-lahir-pancasila-2026.pdf','terarsip','2026-11-16 18:49:07','2026-11-16 18:49:07'),(4,'Sosialisasi Lapangan Pendidikan Karakter Bangsa & Etika Bermedia Sosial','Karakter Bangsa','Kamis',23,'Juli',2026,'Kamis, 23 Juli 2026','Panggung Terbuka SMKN 1 Pelaihari, Kabupaten Tanah Laut','320 Siswa-Siswi Tingkat Menengah Kejuruan','Sosialisasi interaktif lapangan pencegahan paham intoleransi, hoaks di media sosial, dan penanaman etika budaya luhur bangsa bagi generasi Z.','images/wasbang/karakter-bangsa.jpg','https://www.youtube.com/watch?v=dQw4w9WgXcQ','docs/wasbang/laporan-pendidikan-karakter-2026.pdf','terarsip','2026-11-16 18:49:07','2026-11-16 18:49:07'),(5,'Dialog Kebangsaan Terbuka Forum Pembauran Kebangsaan (FPK) Lintas Etnis','Pembauran Kebangsaan','Selasa',11,'Agustus',2026,'Selasa, 11 Agustus 2026','Balai Pertemuan Terbuka Desa Bentok Darat, Kecamatan Bati-Bati','85 Tokoh Adat, Tokoh Agama, dan Paguyuban Etnis','Forum dialog terbuka lintas etnis (Banjar, Jawa, Dayak, Bugis, Sunda, Madura) di wilayah Kabupaten Tanah Laut guna merawat harmoni, toleransi, dan kerukunan warga pasca Pemilu.','images/wasbang/pembauran-kebangsaan.jpg','https://www.youtube.com/watch?v=dQw4w9WgXcQ','docs/wasbang/laporan-fpk-lintas-etnis-2026.pdf','terarsip','2026-11-16 18:49:07','2026-11-16 18:49:07');
/*!40000 ALTER TABLE `kegiatan_wasbangs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_10_20_013200_create_anggotas_table',1),(5,'2026_10_20_013201_create_aspirasis_table',1),(6,'2026_10_21_062706_create_parpols_table',1),(7,'2026_10_22_100000_create_pendidikan_politiks_table',1),(8,'2026_10_26_140450_create_wasbang_kegiatans_table',1),(9,'2026_10_27_024110_add_role_and_parpol_id_to_users_table',1),(10,'2026_10_27_034236_create_kegiatan_wasbangs_table',1),(11,'2026_10_27_083600_add_tempat_pelaksanaan_to_pendidikan_politiks_table',1),(12,'2026_11_06_104000_add_nip_and_jabatan_to_users_table',1),(13,'2026_11_11_080000_add_visi_and_misi_to_parpols_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parpols`
--

DROP TABLE IF EXISTS `parpols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parpols` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor_urut` int unsigned NOT NULL,
  `nama_partai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akronim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna_primer` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#b91c1c',
  `no_sk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_sk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_ketua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekretaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bendahara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lo_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lo_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pelaihari',
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tanah Laut',
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kalimantan Selatan',
  `visi` text COLLATE utf8mb4_unicode_ci,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `sk3p3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parpols`
--

LOCK TABLES `parpols` WRITE;
/*!40000 ALTER TABLE `parpols` DISABLE KEYS */;
INSERT INTO `parpols` VALUES (1,1,'Partai Kebangkitan Bangsa','PKB','images/parpol/pkb.png','#007a3d','13434/DPP/01/VII/2026','1 Juli 2026','H. MUHAMMAD ZAZULI, S.H.',NULL,'SUPIAN HADI','PARMADI','SUPIAN HADI','085249727776','Jl. H. Boejasin Kel. Angsau Kec. Pelaihari','Kel. Angsau','Pelaihari','Tanah Laut','Kalimantan Selatan','Mewujudkan cita-cita kemerdekaan Republik Indonesia sebagaimana dituangkan dalam Pembukaan Undang-Undang Dasar 1945;\n\nMewujudkan masyarakat yang adil dan makmur secara lahir dan batin, material dan spiritual;\n\nMewujudkan tatanan politik nasional yang demokratis, terbuka, bersih dan berakhlakul karimah.','• Bidang Ekonomi: menegakkan dan mengembangkan kehidupan ekonomi kerakyatan yang adil dan demokratis;\n\n• Bidang Hukum: berusaha menegakkan dan mengembangkan negara hukum yang beradab, mampu mengayomi seluruh rakyat, menjunjung tinggi hak-hak asasi manusia, dan berkeadilan sosial;\n\n• Bidang Sosial Budaya: berusaha membangun budaya yang maju dan modern dengan tetap memelihara jatidiri bangsa yang baik demi meningkatkan harkat dan martabat bangsa;\n\n• Bidang Pendidikan: berusaha meningkatkan kualitas sumber daya manusia yang berakhlak mulia, mandiri, terampil, profesional dan kritis terhadap lingkungan sosial di sekitarnya, mengusahakan terwujudnya sistem pendidikan nasional yang berorientasi kerakyatan, murah dan berkesinambungan;\n\n• Bidang Pertahanan: membangun kesadaran setiap warga negara terhadap kewajiban untuk turut serta dalam usaha pertahanan negara; mendorong terwujudnya swabela masyarakat terhadap perlakuan-perlakuan yang menimbulkan rasa tidak aman, baik yang datang dari pribadi-pribadi maupun institusi tertentu dalam masyarakat.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(2,2,'Partai Gerakan Indonesia Raya','GERINDRA','images/parpol/gerindra.png','#b91c1c','07-0195/Kpts/DPP-GERINDRA/2022','11 Juli 2022','H. ATMARI',NULL,'KHAIRIL ANWAR','Drs. H. ABDULLAH, MM','RISNAWATI','081347075054','Jl. KH Mansyur RT.013 RW.005 Kel. Angsau Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Angsau','Pelaihari','Tanah Laut','Kalimantan Selatan','Menjadi Partai Politik yang mampu menciptakan kesejahteraan rakyat, keadilan sosial dan tatanan politik negara yang melandaskan diri pada nilai-nilai nasionalisme dan religiusitas dalam wadah Negara Kesatuan Republik Indonesia yang berdasarkan pada Pancasila dan Undang-Undang Dasar 1945 yang senantiasa berdaulat di bidang politik, berkepribadian di bidang budaya dan berdiri diatas kaki sendiri dalam bidang ekonomi.','1. Mempertahankan kedaulatan dan tegaknya Negara Kesatuan Republik Indonesia yang berdasarkan Pancasila dan Undang-Undang Dasar 1945 yang ditetapkan pada tanggal 18 Agustus 1945.\n\n2. Mendorong pembangunan nasional yang menitikberatkan pada pembangunan ekonomi kerakyatan, pertumbuhan ekonomi yang berkelanjutan dan pemerataan hasil-hasil pembangunan bagi seluruh warga bangsa dengan senantiasa berpegang teguh pada kemampuan sendiri.\n\n3. Membentuk tatanan sosial dan politik masyarakat yang kondusif untuk mewujudkan kedaulatan rakyat dan kesejahteraan rakyat.\n\n4. Menegakkan supremasi hukum dengan mengedepankan azas praduga tak bersalah dan persamaan hak di hadapan hukum serta melindungi seluruh warga Negara Indonesia secara berkeadilan tanpa memandang suku, agama, ras dan/atau latar belakang golongan.\n\n5. Merebut kekuasaan pemerintahan secara konstitusional melalui Pemilu Legislatif, Pemilu Presiden dan Pemilu Kepala Daerah untuk menciptakan lapisan kepemimpinan nasional yang kuat dan bersih disetiap tingkat pemerintahan.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(3,3,'Partai Demokrasi Indonesia Perjuangan','PDI PERJUANGAN','images/parpol/pdi-perjuangan.png','#dc2626','22.02/KPTS-DPC/XII/2025','30 Desember 2025','H. JUNAIDI, S.K.M',NULL,'YUSUF AR','MUSLIMIN, SE','NURUL','08125156376','Jl. A. Yani Rt.04 Rw.02 Kel. Pabahanan Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Pabahanan','Pelaihari','Tanah Laut','Kalimantan Selatan','Visi Partai adalah keadaan pada masa depan yang diidamkan oleh Partai, dan oleh karena itu menjadi arah bagi perjuangan Partai. Berdasarkan amanat Pasal 6 Anggaran Dasar Partai, PDI Perjuangan adalah:\n\n1. Alat perjuangan guna membentuk dan membangun karakter bangsa berdasarkan Pancasila 1 Juni 1945;\n2. Alat perjuangan untuk melahirkan kehidupan berbangsa dan bernegara yang ber-Ketuhanan, memiliki semangat sosio nasionalisme, dan sosio demokrasi (Tri Sila);\n3. Alat perjuangan untuk menentang segala bentuk individualisme dan untuk menghidupkan jiwa dan semangat gotong royong dalam kehidupan bermasyarakat, berbangsa dan bernegara (Eka Sila);\n4. Wadah komunikasi politik, mengembangkan dan memperkuat partisipasi politik warga negara; dan\n5. Wadah untuk membentuk kader bangsa yang berjiwa pelopor, dan memiliki pemahaman, kemampuan menjabarkan dan melaksanakan ajaran Bung Karno dalam kehidupan bermasyarakat, berbangsa, dan bernegara.','Misi Partai adalah muatan hidup yang diemban oleh partai, sekaligus menjadi dasar pemikiran atas keberlangsungan eksistensi Partai, sebagaimana diamanatkan dalam Pasal 7, 8, 9 dan 10 Anggaran Dasar Partai:\n\n• Pasal 7 (Tujuan Umum):\n1. Mewujudkan cita-cita Proklamasi Kemerdekaan 17 Agustus 1945 sebagaimana dimaksud dalam Pembukaan UUD NRI 1945 dalam bentuk mewujudkan masyarakat adil dan makmur dalam bingkai NKRI yang bersemboyan Bhinneka Tunggal Ika;\n2. Berjuang mewujudkan Indonesia sejahtera berkeadilan sosial yang berdaulat di bidang politik, berdiri di atas kaki sendiri di bidang ekonomi, dan Indonesia yang berkepribadian dalam kebudayaan.\n\n• Pasal 8 (Tujuan Khusus):\n1. Membangun gerakan politik yang bersumber pada kekuatan rakyat untuk mewujudkan kesejahteraan berkeadilan sosial;\n2. Membangun semangat, mengkonsolidasi kemauan, mengorganisir tindakan dan kekuatan rakyat untuk mencapai kemerdekaan politik dan ekonomi;\n3. Memperjuangkan hak rakyat atas politik, ekonomi, sosial dan budaya (kebutuhan material: sandang, pangan, papan; spiritual: kebudayaan, pendidikan, kesehatan);\n4. Berjuang mendapatkan kekuasaan politik secara konstitusional guna memajukan kesejahteraan umum dan mencerdaskan kehidupan bangsa;\n5. Menggalang solidaritas dan membangun kerjasama internasional berdasarkan spirit Dasa Sila Bandung.\n\n• Pasal 9 (Fungsi Partai):\n1. Mendidik dan mencerdaskan rakyat agar bertanggung jawab menggunakan hak dan kewajibannya;\n2. Melakukan rekrutmen anggota dan kader Partai untuk ditugaskan dalam struktural Partai dan Lembaga Publik;\n3. Membentuk kader Partai yang berjiwa pelopor penjabar ajaran Bung Karno;\n4. Menghimpun, merumuskan, dan memperjuangkan aspirasi rakyat menjadi kebijakan pemerintahan negara;\n5. Menghimpun, membangun dan menggerakkan kekuatan rakyat mencapai cita-cita masyarakat Pancasila;\n6. Membangun komunikasi politik dan partisipasi politik warga negara.\n\n• Pasal 10 (Tugas Partai):\n1. Mempertahankan dan mewujudkan cita-cita negara Proklamasi 17 Agustus 1945 di dalam NKRI;\n2. Mempertahankan, menyebarluaskan dan melaksanakan Pancasila sebagai dasar dan pandangan hidup bangsa;\n3. Menjabarkan, menyebarluaskan dan membumikan ajaran Bung Karno;\n4. Memperjuangkan aspirasi rakyat berdasarkan ideologi Pancasila 1 Juni 1945, UUD 1945, serta jalan TRISAKTI;\n5. Memperjuangkan kebijakan politik Partai menjadi kebijakan politik penyelenggaraan Negara;\n6. Mempersiapkan kader Partai sebagai petugas Partai dalam jabatan politik dan jabatan publik;\n7. Mengawasi jalannya penyelenggaraan negara agar senantiasa berdasarkan Pancasila 1 Juni 1945, UUD 1945, dan jalan TRISAKTI demi pemerintahan yang kuat, efektif, bersih dan berwibawa;\n8. Berperan aktif menghidupkan spirit Dasa Sila Bandung melawan liberalisme dan individualisme.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(4,4,'Partai Golongan Karya','GOLKAR','images/parpol/golkar.jpg','#facc15','Skep-014/DPD/GOLKAR/XII/2025','23 Desember 2025','H. AGUS PRASETYA BUDIONO',NULL,'MUKHTARRADEN','Hj. MARNI','TAUFIK','088245416377','Jl. A. Yani/ Ks Tubun No. 2 Rt. 022 Rw 001 Kel. Angsau Kec. Pelaihari','Kel. Angsau','Pelaihari','Tanah Laut','Kalimantan Selatan','Terwujudnya masyarakat Indonesia yang bersatu, berdaulat, maju, modern, damai, adil, makmur, beriman dan berakhlak mulia, berkesadaran hukum dan lingkungan, menguasai ilmu pengetahuan dan teknologi, dan bermartabat dalam pergaulan dunia.\n\n(Berlandaskan Paradigma Baru dan Doktrin Karya Kekaryaan \'Karya Siaga Gatra Praja\' yang berorientasi program, pemecahan masalah/problem solving, mengutamakan karya nyata yang bermanfaat bagi seluruh rakyat, serta menolak polarisasi primordialisme dan sektarianisme).','1. Menegaskan, mengamankan, dan mempertahankan Pancasila sebagai dasar negara dan ideologi bangsa demi memperkokoh Negara Kesatuan Republik Indonesia.\n\n2. Mewujudkan cita-cita proklamasi melalui pelaksanaan pembangunan nasional di segala bidang untuk merealisasikan masyarakat yang demokratis dan berdaulat, sejahtera dan makmur, menegakkan supremasi hukum dan menghormati hak asasi manusia, serta terwujudnya ketertiban dan perdamaian dunia.\n\n3. Mewujudkan pemerintahan yang efektif dengan tata pemerintahan yang baik, bersih, berwibawa dan demokratis.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(5,5,'Partai NasDem','Partai NasDem','images/parpol/nasdem.png','#1e3a8a','496-Kpts/DPP-NasDem/XI/2025','7 November 2025','JOKO PITOYO, S.AP',NULL,'HERRY WINARDI','PAULUS ARI PURMANTO, SE','PAULUS A P, SE','085251362186','Jl. Almanar Rt 28 Rw 02 Kel. Angsau Kec. Pelaihari','Kel. Angsau','Pelaihari','Tanah Laut','Kalimantan Selatan','“Indonesia yang merdeka sebagai negara bangsa, berdaulat secara ekonomi, dan bermartabat dalam budaya.”\n\nTiga kata kunci fundamental:\n1. Merdeka (Freedom & Liberty): Bebas dari belenggu penindasan sekaligus bebas berpendapat, bersikap, berekspresi, dan berpartisipasi nyata dalam politik tanpa terhalang ketimpangan modal.\n2. Kedaulatan Ekonomi: Menegakkan kedaulatan ekonomi rakyat, memberantas kemiskinan, serta meminimalisasi kesenjangan sosial ekonomi.\n3. Martabat Kebudayaan: Menjaga kekayaan dan identitas luhur budaya Indonesia di tengah era globalisasi dengan percaya diri dan gotong royong.','1. Sistem Politik yang Demokratis dan Berkeadilan:\n• Menuntaskan masalah oligarki, politik uang, KKN, dan memulihkan kepercayaan publik (public trust) terhadap partai politik.\n• Aksi Terstruktur: DPP mendesain, mengawasi, dan mengatur pendanaan; DPW/DPD menyelenggarakan Sekolah Kader Calon Legislatif dan mimbar anti-politik uang; DPC/DPRt menggerakkan aksi akar rumput, mengusung kader idealis potensial, dan mengontrol kerja eksekutif serta legislatif.\n\n2. Sistem Ekonomi yang Demokratis:\nMenciptakan kemandirian ekonomi masyarakat melalui penguatan usaha kerakyatan, keadilan distribusi sumber daya alam, dan perlindungan pelaku ekonomi mikro.\n\n3. Gotong Royong sebagai Budaya:\nMengembangkan karakter bangsa yang menjunjung tinggi toleransi, persatuan, dan nilai-nilai kearifan lokal Nusantara dalam kehidupan bermasyarakat dan bernegara.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(6,6,'Partai Gelombang Rakyat Indonesia','GELORA INDONESIA','images/parpol/gelora.png','#0284c7','002.63/SK/DPP/VII/2025','Juli 2025','SURYANI PRAMESTI PODO',NULL,'RENDI KRISTIAWAN','FAKHRINA NUR RAHMI','RENDI','085391910345','Jl. A. Yani Rt.001 Rw.001 Kel. Sarang Halang Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Sarang Halang','Pelaihari','Tanah Laut','Kalimantan Selatan','Mewujudkan Indonesia yang berdaulat, adil, makmur dan menjadi bagian dari kepemimpinan dunia.','1. Membangun masyarakat yang religius dan berpengetahuan.\n2. Membangun pemerintahan efektif.\n3. Mengembangkan kekuatan pertahanan nasional.\n4. Menjadikan Indonesia sebagai bangsa yang mengedepankan inovasi sains dan teknologi.\n5. Menumbuhkan dan memeratakan ekonomi dengan mewujudkan sumber pertumbuhan ekonomi baru.\n6. Mendorong pembangunan yang menopang kelestarian lingkungan.\n7. Berperan aktif dalam kepemimpinan nasional dan internasional.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(7,7,'Partai Keadilan Sejahtera','PKS','images/parpol/pks.jpg','#f97316','063.01.PD/SKEP/DPPPKS/2025','5 September 2025','FUAD AMIN',NULL,'MALIK','DADANG IMANUDIN','SLAMET HERMAWAN','083152039062','Jl. A Yani Rt.04 Rw.02 Kel Sarang Halang Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Sarang Halang','Pelaihari','Tanah Laut','Kalimantan Selatan','Menjadi Partai Islam rahmatan lil \'alamin yang kokoh dan terdepan dalam melayani rakyat dan Negara Kesatuan Republik Indonesia.','1. Meningkatkan pertumbuhan jumlah Anggota Partai dan mengokohkan integritas, solidaritas, akseptabilitas, profesionalitas untuk menghadirkan kepemimpinan bangsa yang beriman dan bertakwa serta berakhlak mulia.\n\n2. Mengokohkan soliditas Partai berskala nasional, mandiri, dan terbuka agar mampu menjalankan fungsi edukasi, advokasi, kaderisasi kepemimpinan, serta menerapkan sistem manajemen partai modern untuk meningkatkan sinergi, kinerja, dan kredibilitas.\n\n3. Meningkatkan kepeloporan Partai dalam pelayanan, pemberdayaan, dan pembelaan terhadap ketahanan keluarga, pemuda, kepentingan masyarakat, dan lingkungan hidup, serta memperkuat kemitraan strategis di berbagai sektor pengabdian untuk meningkatkan kualitas kehidupan yang produktif, inovatif, dan patriotik.\n\n4. Memenangkan Pemilu 2024 dan meningkatkan kontribusi Partai dalam menggagas dan memperjuangkan kebijakan publik yang berpihak kepada kemaslahatan rakyat, bangsa, dan negara yang bersih dari korupsi, kolusi, dan nepotisme, serta turut berperan dalam pengembangan demokratisasi di kawasan, dan pengembangan kerjasama internasional untuk memperkokoh posisi Indonesia.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(8,8,'Partai Hati Nurani Rakyat','HANURA','images/parpol/hanura.png','#991b1b','SKEP/044/DPP-P.HANURA/II/2026','Februari 2026','YUDI RIZAL',NULL,'MUHAMMAD FIRMANSYAH','ERNA ELFA','FIRMAN','083145203320','Jl. A. Syairani Kel Sarang Halang Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Sarang Halang','Pelaihari','Tanah Laut','Kalimantan Selatan','“Terwujudnya bangsa Indonesia yang bersatu, berdaulat, adil dan makmur berdasarkan Pancasila dan Undang-Undang Dasar Negara Republik Indonesia 1945”.','1. Tata Kelola & Kepemimpinan: Mewujudkan pemerintahan yang demokratis, bersih, berwibawa, transparan, serta melahirkan pemimpin berhati nurani yang jujur dan tegas.\n\n2. Hukum & HAM: Menegakkan supremasi hukum yang berkeadilan, memberikan kepastian hukum, serta menjunjung tinggi HAM.\n\n3. Pembangunan SDM & Ekonomi: Meningkatkan kualitas SDM yang berakhlak dan cerdas dengan melibatkan peran perempuan serta pemuda, serta membangun ekonomi berkeadilan dan berwawasan lingkungan.\n\n4. Reformasi & Daerah: Memberantas korupsi secara total serta mengembangkan otonomi daerah untuk pemerataan pembangunan.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(9,9,'Partai Amanat Nasional','PAN','images/parpol/pan.jpg','#1e3a8a','PAN/A/Kpts/KU-SJ/256/III/2026','6 Maret 2026','YOGA PINIS SUHENDRA, ST, MH',NULL,'SYAPRULLAH, S.Pi','Hj. MEGA PURNAMA, SH, MM','ASRIEL','082156488770','Jl. Raya Takisung Rt.007 Rw.002 Kel. Karang Taruna Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Karang Taruna','Pelaihari','Tanah Laut','Kalimantan Selatan','“Mewujudkan Indonesia yang Beradab, Adil, Makmur, dan Bermartabat melalui Perjuangan Politik yang Demokratis, Berintegritas, dan Berpihak pada Rakyat”\n\nVisi ini mencerminkan komitmen Fraksi PAN untuk membangun Indonesia yang tidak hanya maju secara ekonomi, tetapi juga unggul dalam nilai-nilai kemanusiaan, keadilan sosial, dan moralitas publik. Kemajuan sejati hanya dapat dicapai ketika seluruh rakyat Indonesia merasakan manfaat pembangunan secara merata dan berkeadilan.','1. Memperjuangkan Keadilan Sosial dan Pemerataan Pembangunan:\nMendorong kebijakan yang memastikan hasil pembangunan dapat dinikmati oleh seluruh lapisan masyarakat, terutama kelompok rentan dan daerah tertinggal.\n\n2. Memperkuat Demokrasi dan Supremasi Hukum:\nMengawal proses demokratisasi yang sehat, transparan, dan akuntabel serta memastikan penegakan hukum yang adil tanpa pandang bulu.\n\n3. Membela Aspirasi dan Kepentingan Rakyat:\nMenjadi jembatan antara aspirasi rakyat dengan kebijakan negara melalui fungsi legislasi, pengawasan, dan anggaran yang responsif.\n\n4. Mendorong Pembangunan Ekonomi yang Inklusif:\nMemperjuangkan kebijakan ekonomi yang memberikan ruang bagi UMKM, koperasi, dan ekonomi kerakyatan untuk berkembang.\n\n5. Menjaga Persatuan dan Kesatuan Bangsa:\nMemelihara kebhinekaan dan toleransi sebagai kekuatan bangsa dalam menghadapi tantangan global dan dinamika sosial.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(10,10,'Partai Bulan Bintang','PBB','images/parpol/pbb.jpg','#14532d','SK.PP/367/2026','18 September 2026','MUHAMMAD GAZALI RAHMAN SE',NULL,'NILA SANTI','FARIDA ZULFIKAR','ZALI','083185778444 / 085345494445','Jl. Majakeling No.10 Rt.015 Rw.005 Kel. Pelaihari Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Pelaihari','Pelaihari','Tanah Laut','Kalimantan Selatan','1. Kehidupan Masyarakat Islami: Terwujudnya kehidupan masyarakat Indonesia yang Islami.\n2. Keadilan dan Hukum: Tegakkan keadilan dan kepastian hukum.\n3. Semboyan Perjuangan: Bela umat, bela ulama, bela Islam, bela rakyat, dan bela Negara Kesatuan Republik Indonesia (NKRI).','1. Keimanan dan Karakter: Beriman, bertakwa, berkepribadian tinggi, cerdas, mandiri, dan maju.\n2. Kesejahteraan dan Keadilan: Berkeadilan serta berkemakmuran bagi seluruh rakyat.\n3. Kehidupan Demokratis: Mengembangkan kehidupan demokratis berdasarkan kerakyatan yang dipimpin oleh hikmah kebijaksanaan dalam permusyawaratan/perwakilan.\n4. Perdamaian Dunia: Turut serta menciptakan perdamaian dunia berdasarkan nilai-nilai Islam.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(11,11,'Partai Demokrat','PARTAI DEMOKRAT','images/parpol/demokrat.png','#1e3a8a','106/SK/DPP.PD/DPC/VI/2022 & 28 SK/DPP.PD/DPC/VII/2024','9 Juni 2022 & 12 Juli 2024','H. ARKANI, S.Pd. M.Si',NULL,'SAMINGAN','MASLIAH (Plt)','SAMINGAN','085248522432','Jl. KH. Mansyur No.15 Rt.15 Rw.05 Kel. Angsau Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Angsau','Pelaihari','Tanah Laut','Kalimantan Selatan','Visi untuk Indonesia Masa Depan:\n• Indonesia menjadi Negara Maju di Abad 21.\n• Indonesia menjadi Negara Kuat di tahun 2045.\n• Indonesia menjadi Emerging Economy di tahun 2030.\n\nVisi untuk Partai Demokrat Masa Depan:\nMenjadi partai politik masa depan yang:\n1. Kuat, berintegritas dan berkapasitas.\n2. Relevan dan adaptif dengan perkembangan zaman.\n3. Konsisten pada nilai, idealisme dan platform perjuangan partai yang menjunjung tinggi perdamaian, keadilan, kesejahteraan, demokrasi dan kelestarian lingkungan.\n4. Menyatu dengan rakyat dan terus memperjuangkan kepentingan dan aspirasi rakyat.\n5. Mempertahankan jati diri sebagai partai Nasionalis-Religius, Partai Terbuka, Partai Tengah, Partai Pluralis dan Partai Pro Rakyat Kecil.','Sebagai salah satu kekuatan politik nasional, Partai Demokrat berpartisipasi dan berkontribusi dalam kehidupan bernegara dan pembangunan nasional, menuju terwujudnya Indonesia yang makin maju, makin damai, makin adil, makin sejahtera dan makin demokratis.\n\nMisi Partai Demokrat:\n1. Memenangkan pemilihan umum pada tingkat nasional, baik pemilu legislatif maupun pemilu presiden dan wakil presiden.\n2. Memenangkan pemilihan umum tingkat daerah, baik pemilu legislatif maupun pemilu kepala daerah.\n3. Mempersiapkan kader-kader Demokrat untuk maju sebagai peserta pemilihan umum, baik pusat maupun daerah, baik legislatif maupun eksekutif.\n4. Menjalin komunikasi secara berkelanjutan dengan rakyat guna mengetahui persoalan, harapan dan aspirasi mereka, untuk selanjutnya diperjuangkan di berbagai medan pengabdian dan penugasan partai.\n5. Menjalankan kehidupan internal partai sesuai dengan undang-undang dan anggaran dasar serta anggaran rumah tangga, menuju masa depan Partai Demokrat yang makin kuat, makin modern, makin dicintai rakyat dan makin kontributif bagi pembangunan bangsa.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(12,12,'Partai Solidaritas Indonesia','PSI','images/parpol/psi.png','#dc2626','245/SK/DPP/2026','25 Mei 2026','HARRY YADI','081348397755','AVRAHERSATIADI RICCO GALANG','M. TAUFIK YULIZAR','GALANG','082252973411','Komplek Puri Anggoro Permai RT 008/RW000 Kel. Angsau Pelaihari','Kel. Angsau','Pelaihari','Tanah Laut','Kalimantan Selatan','Indonesia yang berkarakter kerakyatan, berkemanusiaan, berkeragaman, berkeadilan, berkemajuan dan bermartabat.','1. Menggalang kekuatan nasional melalui sebuah kepemimpinan politik yang ideologis, terorganisir, dan terstruktur.\n\n2. Menggalang perjuangan politik dengan nilai solidaritas nasional melanjutkan agenda reformasi dan demokratisasi.\n\n3. Membangun kembali semangat republikanisme, merajut kembali rasa kebangsaan yang terserak, menanam kembali benih-benih idealisme, mendirikan kembali benteng-benteng kebhinnekaan dan membangun kembali pondasi gotong royong.\n\n4. Mendorong martabat Indonesia dalam pergaulan internasional, sesuai prinsip politik bebas aktif dengan melibatkan kondisi geopolitik internasional yang sedang berkembang.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(13,13,'Partai Persatuan Indonesia','PARTAI PERINDO','images/parpol/perindo.png','#1e3a8a','784/SK/DPP-PARTAI PERINDO/V/2026','Mei 2026','KASIR',NULL,'TIEN SUHARTINI, SE','ARU SITI KHASANAH','KASIR','082154094043','Jl. Takut Blok B No.3 Rt.07 B/2 Komplek Permata Jingga Kel. Karang Taruna Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Karang Taruna','Pelaihari','Tanah Laut','Kalimantan Selatan','“Mewujudkan Indonesia berkemajuan, bersatu, adil, makmur, sejahtera, berdaulat, bermartabat, dan berbudaya.”','1. Pemerintahan Berkeadilan: Mewujudkan pemerintahan yang berkeadilan sesuai dengan Undang-Undang Dasar (UUD) 1945.\n\n2. Bebas KKN: Mewujudkan pemerintahan yang bebas dari korupsi, kolusi, dan nepotisme (KKN) demi Indonesia yang mandiri dan bermartabat.\n\n3. Kedaulatan NKRI: Menjaga keutuhan Negara Kesatuan Republik Indonesia (NKRI) yang berdaulat dan bermartabat.\n\n4. Kesejahteraan Masyarakat: Menciptakan masyarakat yang adil, makmur, dan sejahtera berdasarkan Pancasila dan UUD 1945.\n\n5. HAM & Supremasi Hukum: Menegakkan hak dan kewajiban asasi manusia (HAM) serta supremasi hukum.\n\n6. Ekonomi Nasional: Mendorong pertumbuhan ekonomi nasional yang berpihak dan berkontribusi langsung pada kesejahteraan warga.\n\n7. Pemberdayaan Ekonomi Lemah & UMKM: Memproduktifkan kelompok ekonomi lemah serta melakukan digitalisasi dan meningkatkan produktivitas bagi sekitar 60 juta UMKM.\n\n8. Mitra Pemerintah: Berposisi sebagai mitra strategis pemerintah (bukan sebagai oposisi).','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(14,14,'Partai Persatuan Pembangunan','PPP','images/parpol/ppp.png','#14532d','0244/SK/DPP/C/V/2026','15 Mei 2026','AIRLANGGA',NULL,'LUTFI WARDHANA','MUHAMMAD ALFIAN','ANGGA','085347222285','Jl. Matah No.2 Rt.09 Komp Perumahan SATP Kel. Karang Taruna Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Karang Taruna','Pelaihari','Tanah Laut','Kalimantan Selatan','Mewujudkan masyarakat bertaqwa kepada Allah SWT serta negara yang adil, makmur, demokratis, dan menjunjung tinggi HAM berlandaskan nilai Islam.\n\nSlogan Perjuangan: “Merawat Persatuan dengan Pembangunan”','1. Kehidupan Beragama: Membina masyarakat yang beriman, meningkatkan mutu kehidupan beragama, dan mengembangkan ukhuwah Islamiyah.\n\n2. Hak Asasi Manusia (HAM): Memperjuangkan hak dan kewajiban dasar manusia sesuai harkat martabat dengan berpedoman pada nilai agama.\n\n3. Peran Agama: Menjadikan agama sebagai panduan moral dalam kehidupan bernegara secara simbiotik dan sinergis.\n\n4. Bidang Politik: Memperkuat demokrasi yang berdaulat dan menjunjung musyawarah.\n\n5. Bidang Ekonomi: Mengembangkan ekonomi kerakyatan melalui koperasi dan UKM.\n\n6. Bidang Hukum: Memberantas KKN dan memperbarui hukum yang berkeadilan.\n\n7. Bidang Sosial & Pendidikan: Mewujudkan masyarakat religius anti-kekerasan serta meningkatkan kesejahteraan dan kualitas pendidikan.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(15,15,'Partai Gerakan Rakyat','PARTAI GERAKAN RAKYAT','images/parpol/gerakan-rakyat.png','#b91c1c','A/190/Ktps/DPP-GR/KU-SJ/I/2026','28 Januari 2026','MADI',NULL,'SUSILAWATI','SUJIATI','MADI','085248837818','Jl. Damit Hulu RT. 05 Desa Damit Hulu Kecamatan Batu Ampar','Desa Damit Hulu','Batu Ampar','Tanah Laut','Kalimantan Selatan','Visi Utama:\nMewujudkan Keadilan Sosial Bagi Seluruh Rakyat Indonesia.\n\n5 Agenda / Pilar Utama:\n1. Pajak yang Adil\n2. Ekonomi untuk Kesejahteraan\n3. Pemerintahan yang Kompeten dan Bijak\n4. Hukum yang Tegak untuk Semua\n5. Pembangunan yang Peduli Lingkungan\n\nPanca Dharma Gerakan Rakyat (Nilai Karakter Kader): Integritas Moral, Kersa-Kesatria, Kasih Sayang, dan Nasionalisme Kerakyatan.','1. Pendidikan Politik untuk Rakyat: Menyelenggarakan pendidikan politik inklusif melalui program unggulan seperti Sekolah Politik Kerakyatan (Spartan) untuk membangun kesadaran politik, nalar kritis, dan partisipasi publik.\n\n2. Penguatan Kontrol Masyarakat Sipil: Berperan aktif mengawasi hak-hak politik serta ekonomi rakyat guna menjaga kualitas demokrasi dan mencegah penurunan kesejahteraan kelas menengah.\n\n3. Menjaga Silaturahmi dan Kebersamaan: Menjadi wadah pemersatu berbagai komponen masyarakat yang digerakkan oleh semangat gotong-royong dan gagasan perubahan.\n\n4. Memperjuangkan Gagasan Perubahan: Menginstitusionalkan ide-ide besar pembangunan dan kebaikan agar terus hidup serta diperjuangkan secara konsisten di kancah politik nasional.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(16,16,'Partai Gema Bangsa','PARTAI GEMA BANGSA','images/parpol/gema-bangsa.jpg','#1e3a8a','662/GB.1/DPP Partai Gema Bangsa/IV/2026','3 April 2026','EKO CAHYADI, SE',NULL,'MUHAMMAD YUSRANSYAH','TATA SELAMET SENTOSO','EKO CAHYADI, SE','081349237329','Jalan Norsehat Rt. 4 Rw. 02 Kelurahan Pelaihari Kecamatan Pelaihari','Kel. Pelaihari','Pelaihari','Tanah Laut','Kalimantan Selatan','Visi Umum:\nMewujudkan Indonesia yang mandiri, maju, berdaulat, berbudaya, adil, dan makmur dengan semangat nasionalisme religius.\n\nTiga Pilar Visi Besar:\n1. Indonesia Mandiri: Membangun kemandirian mulai dari tingkat individu, masyarakat, hingga tingkat nasional agar tidak tergantung pada bangsa lain.\n2. Desentralisasi Politik: Mengatasi sistem kepartaian yang sentralistik dan feodal dengan memberikan kewenangan otonomi yang besar kepada struktur di daerah (wilayah, kabupaten, hingga desa) dalam menentukan kebijakan dan menyeleksi pemimpin.\n3. Indonesia Reborn: Menghadirkan wajah baru partai politik yang relevan dengan tantangan zaman, termasuk merangkul generasi muda (Gen Z, milenial, dan Gen Alfa) sebagai mayoritas masyarakat digital.','1. Mewujudkan pemerintahan yang kuat, bersih, dan berintegritas.\n\n2. Menghapuskan sistem politik yang kaku dan transaksional serta memperkuat demokrasi tingkat lokal melalui otonomi daerah.\n\n3. Melakukan gerakan kemandirian ekonomi, politik, dan sosial dengan memanfaatkan sumber daya alam secara berkeadilan bagi seluruh rakyat Indonesia.\n\n4. Menjadikan partai sebagai rumah perjuangan yang menjunjung tinggi etika, integritas, dan keberanian moral.','Ada','2026-11-16 18:48:50','2026-11-16 18:48:50'),(17,17,'Partai Garda Perubahan Indonesia','PARTAI GARUDA','images/parpol/garuda.jpg','#0f172a','063/SK/DPP/I/2022','Januari 2022','TRI SURADIANINGSIH',NULL,'NADIA REFLIANA','NOOR AINA HAYATI','NADIA','085971881052','Jl. Gembira No.29 Rt.05 Rw.02 Kel. Pelaihari Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Pelaihari','Pelaihari','Tanah Laut','Kalimantan Selatan','Terwujudnya Cita-cita Perubahan Indonesia.','1. Terwujudnya cita-cita nasional bangsa Indonesia sebagaimana dimaksud dalam Pembukaan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945.\n\n2. Terwujudnya masyarakat demokratis yang adil dan sejahtera serta berkeyakinan pada Tuhan Yang Maha Esa, mencintai tanah air dan bangsa dalam bingkai Negara Kesatuan Republik Indonesia.\n\n3. Mewujudkan masyarakat kedaulatan rakyat dalam berdemokrasi, yang menjunjung tinggi nilai-nilai kebenaran dan hukum yang berlaku.\n\n4. Mewujudkan ekonomi kerakyatan yang berkeadilan.','Blm','2026-11-16 18:48:50','2026-11-16 18:48:50'),(18,18,'Partai Kebangkitan Nusantara','PKN','images/parpol/pkn.png','#991b1b','567/SK/PIMNAS-PKN/VI/2022','Juni 2022','MIXE SRIBIMA AREOTEJO, SH',NULL,'SAFRIANTO','RISNAWATI','ALI MASHARI','081271781122','Jl. Kolonel Soepirman Rt.03 Rw.01 No.86 Desa Atu Atu Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Desa Atu Atu','Pelaihari','Tanah Laut','Kalimantan Selatan','“Terwujudnya bangsa Indonesia yang bersatu, berdaulat, adil, dan makmur dengan berwawasan Nusantara.”','1. Pemerintahan & Kepemimpinan:\nMewujudkan pemerintahan yang bersih, demokratis, transparan, dan berwibawa berdasarkan Pancasila dan UUD 1945, serta melahirkan pemimpin yang jujur, tegas, dan berwawasan Nusantara.\n\n2. Kemandirian Bangsa:\nMemperjuangkan penguatan wawasan Nusantara dalam tata kelola pemerintahan dan pengelolaan sumber daya nasional secara mandiri.','Blm','2026-11-16 18:48:50','2026-11-16 18:48:50'),(19,19,'Partai Ummat','PARTAI UMMAT','images/parpol/ummat.png','#ca8a04','0378/01.63.01/SK.Kep-II/DPP.PU/V/2021','Mei 2021','RONIANSYAH',NULL,'RUSMAWATI','ERNIWATI','SYAHRIANTO','085347222285','Jl. Al Jihad Manunggal X Rt.003 Rw.001 Kel. Angsau Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Kel. Angsau','Pelaihari','Tanah Laut','Kalimantan Selatan','Terwujudnya Indonesia sebagai negeri Baldatun Tayyibatun Wa Rabbun Ghafur dengan menegakkan nilai-nilai Ilahiah, Ukhuwah (Persaudaraan Ummat), Hurriyah (Kebebasan), Musawah (Kesamaan), dan ‘Adaalah (Keadilan) dalam wadah Negara Kesatuan Republik Indonesia.','1. Mempertahankan tegaknya Negara Kesatuan Republik Indonesia di atas prinsip Ketuhanan Yang Maha Esa.\n\n2. Mewujudkan kehidupan kebangsaan yang dirahmati Allah, yang memegang teguh nilai-nilai Ilahiah dengan tetap menjaga nilai luhur budaya bangsa serta mengembangkan semangat perdamaian, toleransi, saling menghormati, dan bekerja sama.\n\n3. Mewujudkan kekuasaan pemerintahan yang adil, amanah, dan bertanggung jawab secara konstitusional melalui pemilihan umum yang jujur, adil, langsung, umum, bebas, dan rahasia.\n\n4. Mewujudkan pemerintahan yang amanah, kuat dan berwibawa, bebas dari praktik korupsi, kolusi, dan nepotisme, serta menegakkan transparansi, akuntabilitas, maslahat umum, dan sistem meritokrasi.\n\n5. Mewujudkan sistem ekonomi Indonesia yang makmur dan berkeadilan berdasarkan Pancasila sesuai dengan UUD Negara Republik Indonesia 1945.\n\n6. Mewujudkan kedaulatan pangan, energi, dan air.\n\n7. Menegakkan hukum yang adil tanpa diskriminasi melalui aparat dan institusi hukum yang bersih, mandiri, dan profesional.\n\n8. Mewujudkan kebebasan pers yang bertanggung jawab yang dilandasi oleh hukum dan etika moral, sehingga masyarakat memperoleh informasi yang benar, objektif, transparan, dan bertanggung jawab.\n\n9. Mewujudkan kualitas pendidikan yang holistik, penguasaan ilmu pengetahuan, teknologi, dan seni untuk mewujudkan SDM Indonesia, khususnya generasi muda milenial yang memiliki kesadaran Ilahiah, berakhlak mulia, profesional, dan memiliki jiwa nasionalisme Indonesia.\n\n10. Memperjuangkan peningkatan kesejahteraan perempuan melalui perlindungan, pemberdayaan, dan optimalisasi perannya untuk kemaslahatan ummat.\n\n11. Memperjuangkan peningkatan kesejahteraan dan jaminan atas hak-hak tenaga kerja, petani, dan nelayan.\n\n12. Menciptakan tatanan kehidupan sosial yang saling menghormati serta mengembangkan daya cipta, rasa, dan karsa yang unggul serta mengedepankan kearifan lokal sebagai kekayaan budaya nasional.\n\n13. Meningkatkan perlindungan dan jaminan atas pendidikan, kesehatan, dan lapangan kerja bagi seluruh rakyat.','Blm','2026-11-16 18:48:50','2026-11-16 18:48:50'),(20,20,'Partai Buruh','PARTAI BURUH','images/parpol/buruh.png','#ea580c','012A/V/SK_KAB-KOTA/EXCO-PB/XI/2021','30 April 2021','NURYANTO',NULL,'MULYAJI WAHYONO','KALIMAN WIDODO','MULYAJI','085386145752','Jl. Pondok Indah III Desa Panggung Kec. Pelaihari Kab. Tanah Laut, Kalimantan Selatan','Desa Panggung','Pelaihari','Tanah Laut','Kalimantan Selatan','Visi Utama:\nMewujudkan Indonesia sebagai Negara Sejahtera (Welfare State).\n\nTiga Prinsip Utama Negara Sejahtera:\n1. Kesetaraan Kesempatan (Equality of Opportunity)\n2. Distribusi Kekayaan yang Adil dan Merata\n3. Tanggung Jawab Publik','13 Platform / Sasaran Kerja Utama Partai Buruh:\n1. Kedaulatan Rakyat: Di bidang politik, penghapusan parliamentary threshold, presidential threshold, dan mekanisme recall anggota dewan.\n2. Lapangan Kerja: Memastikan akses pekerjaan yang setara dan penghapusan outsourcing.\n3. Pemberantasan Korupsi: Mewujudkan pemerintahan yang bersih dan penindakan korupsi tanpa kompromi.\n4. Jaminan Sosial: Jaminan kesehatan, pensiun, pengangguran, perumahan, pendidikan, dan air bersih untuk seluruh rakyat.\n5. Kedaulatan Pangan, Ikan, dan Ternak: Melindungi serta menyejahterakan kaum petani, nelayan, dan peternak.\n6. Upah yang Layak: Menolak upah murah dan menegakkan keadilan pengupahan.\n7. Pajak yang Berkeadilan: Penerapan pajak untuk kesejahteraan rakyat dan pemerataan distribusi kekayaan.\n8. Hubungan Industrial: Menghentikan sistem kerja fleksibel yang merugikan buruh dan pekerja.\n9. Perlindungan Perempuan dan Pemuda: Memperjuangkan kesetaraan gender dan pemberdayaan generasi muda.\n10. Lingkungan Hidup, Masyarakat Adat, dan HAM: Menjaga kelestarian alam, hak-hak masyarakat adat, dan penegakan HAM.\n11. Kesejahteraan Guru dan Status ASN: Meningkatkan kesejahteraan serta kejelasan status bagi guru dan tenaga honorer.\n12. Pemberdayaan Penyandang Disabilitas: Memberikan hak aksesibilitas dan kesempatan kerja inklusif bagi penyandang disabilitas.\n13. BUMN dan Koperasi: Menguatkan peran koperasi dan BUMN sebagai pilar penyangga ekonomi rakyat.','Blm','2026-11-16 18:48:50','2026-11-16 18:48:50');
/*!40000 ALTER TABLE `parpols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendidikan_politiks`
--

DROP TABLE IF EXISTS `pendidikan_politiks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pendidikan_politiks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parpol_id` bigint unsigned NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pelaksanaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_pelaksanaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peserta_jumlah` int NOT NULL,
  `peserta_kader` tinyint(1) NOT NULL DEFAULT '1',
  `peserta_masyarakat` int NOT NULL DEFAULT '0',
  `jumlah_biaya` bigint NOT NULL,
  `dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pendidikan_politiks_parpol_id_foreign` (`parpol_id`),
  CONSTRAINT `pendidikan_politiks_parpol_id_foreign` FOREIGN KEY (`parpol_id`) REFERENCES `parpols` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendidikan_politiks`
--

LOCK TABLES `pendidikan_politiks` WRITE;
/*!40000 ALTER TABLE `pendidikan_politiks` DISABLE KEYS */;
INSERT INTO `pendidikan_politiks` VALUES (1,7,'Menghadiri rakornas bendahara di yogyakarta','09 s.d. 11 Januari 2026','Hotel Grand Mercure, Yogyakarta',1,1,0,4141000,'images/kegiatan/pks/kegiatan-1.jpg','Rapat Koordinasi Nasional Bendahara PKS se-Indonesia','2026-11-16 18:48:50','2026-11-16 18:48:50'),(2,7,'Sarasehan','28 Februari 2026','Kantor DPD PKS Kab. Tanah Laut',70,1,0,5608000,'images/kegiatan/pks/kegiatan-2.jpg','Sarasehan kader politik DPD PKS Kabupaten Tanah Laut','2026-11-16 18:48:50','2026-11-16 18:48:50'),(3,7,'Pelatihan pemantapan spritual (pps) bidang kaderisasi DPD PKS','01 Juni 2026','Aula Serbaguna DPD PKS Kab. Tanah Laut',14,1,0,2000000,'images/kegiatan/pks/kegiatan-3.jpg','Pembekalan nilai integritas dan spiritual kaderisasi partai','2026-11-16 18:48:50','2026-11-16 18:48:50'),(4,7,'Monev struktur DPC - Ranting','17 Juni 2026','Wilayah DPC & Ranting se-Kabupaten Tanah Laut',28,1,0,5868000,'images/kegiatan/pks/kegiatan-4.jpg','Monitoring dan evaluasi kesiapan struktur kepengurusan DPC dan Ranting','2026-11-16 18:48:50','2026-11-16 18:48:50'),(5,7,'Sarasehan DPD, DPC Panyipatan dan Ranting, DPC takisung dan Ranting','21 Juni 2026','Aula Pertemuan Kec. Panyipatan & Takisung',40,1,0,7810000,'images/kegiatan/pks/kegiatan-5.jpg','Sarasehan pendidikan politik wilayah pesisir (Panyipatan & Takisung)','2026-11-16 18:48:50','2026-11-16 18:48:50'),(6,7,'Konsolidasi DPD, DPC Pelaihari dan Ranting, DPC Bajuin dan Ranting','29 Juni 2026','Gedung Pertemuan Pemuda Pelaihari',47,1,0,9167100,'images/kegiatan/pks/kegiatan-6.jpg','Konsolidasi penguatan kader partai wilayah Pelaihari dan Bajuin','2026-11-16 18:48:50','2026-11-16 18:48:50');
/*!40000 ALTER TABLE `pendidikan_politiks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('8Pbes8mlOkzEWOXlU9owBTaAmDG3Cu6OsJs2FCJg',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.9818','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVF3cVNXNUJTMlc3ajJCUWtWN0F6ckJSUXZYb0RZbmhvZklJZlcxMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93YXNiYW5nIjtzOjU6InJvdXRlIjtzOjEzOiJ3YXNiYW5nLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1794883832);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'parpol',
  `parpol_id` bigint unsigned DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_parpol_id_foreign` (`parpol_id`),
  CONSTRAINT `users_parpol_id_foreign` FOREIGN KEY (`parpol_id`) REFERENCES `parpols` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'H. Bambang Kusdariman, S.I.P., M.Si.','19680818 199010 1 003','Kepala Badan Kesatuan Bangsa dan Politik Kabupaten Tanah Laut','kaban@tanahlautkab.go.id','admin',NULL,NULL,'$2y$12$IWMArWus3CKAFqLdCxbk4es/Ja4U4lPITGak7HwRHX6cCAQzkTgLm',NULL,'2026-11-16 18:48:51','2026-11-16 18:48:51'),(2,'H. Bambang Kusdariman, S.I.P., M.Si.','19680818 199010 1 003','Kepala Badan Kesatuan Bangsa dan Politik Kabupaten Tanah Laut','admin@tanahlautkab.go.id','admin',NULL,NULL,'$2y$12$Qlu1u3kpvgAwPcx7ZflHd.htahtckPSaFfrWf5X/hbsOvgsItlZ.e',NULL,'2026-11-16 18:48:51','2026-11-16 18:48:51'),(3,'Auranti Muraya Purihaningrum, S.STP.','198605022004122001','Kepala Bidang Bina Ideologi, Wawasan Kebangsaan dan Karakter Bangsa','kabid.wasbang@tanahlautkab.go.id','kabid_wasbang',NULL,NULL,'$2y$12$JlLsb9itks1nL/a3YlfZSu39mmMfQLMRYEtC0tUFAOFLmX3Y.S6M.',NULL,'2026-11-16 18:48:52','2026-11-16 18:48:52'),(4,'Staf Pelaksana Bidang Wasbang','19951015 202203 1 002','Staf Pelaksana Pengarsipan Dokumentasi Lapangan','wasbang@tanahlautkab.go.id','staf_wasbang',NULL,NULL,'$2y$12$Z6fsRFU/wi4NVg7KP6LsPeFVegXwM8ssCTji6yke1rHtA2VXcFsOa',NULL,'2026-11-16 18:48:52','2026-11-16 18:48:52'),(5,'Staf Pelaksana Bidang Wasbang','19951015 202203 1 002','Staf Pelaksana Pengarsipan Dokumentasi Lapangan','staf.wasbang@tanahlautkab.go.id','staf_wasbang',NULL,NULL,'$2y$12$LdW2.Ix6cewB34EjFe91je1xJPSTgZD00BXEdcFTAv387HEpG1wVC',NULL,'2026-11-16 18:48:53','2026-11-16 18:48:53'),(6,'Bakesbangpol Kab. Tanah Laut (Bidang Poldagri)','19750412 199803 1 005','Admin Poldagri & Banpol','bakesbangpol@tanahlautkab.go.id','admin',NULL,NULL,'$2y$12$v9s/mHw3.CN85Oxg3jKTV.x4wl.aci5xMvrTm2XA/47OzzcWWxwrO',NULL,'2026-11-16 18:48:53','2026-11-16 18:48:53'),(7,'Administrator DPP PARPOL',NULL,'Administrator Sistem','admin@parpol.or.id','admin',NULL,NULL,'$2y$12$AEPgiRYNPooXHMPcnJDDZ.9TaibfKYux0KqIdcvfNZxSZjUJTml0O',NULL,'2026-11-16 18:48:54','2026-11-16 18:48:54'),(8,'DPC PKB Kab. Tanah Laut',NULL,NULL,'pkb@tanahlautkab.go.id','parpol',1,NULL,'$2y$12$wgdeGKJCn5cfQcuattd60eZHupWFxB0e5Ap6PG6SbsXYORk9jFGCy',NULL,'2026-11-16 18:48:55','2026-11-16 18:48:55'),(9,'DPC Partai Gerindra Kab. Tanah Laut',NULL,NULL,'gerindra@tanahlautkab.go.id','parpol',2,NULL,'$2y$12$hVaGJCY9mSzYDweaMASYJugWvo3k6Tf.zDH.zxn8n.q5co9GIo8w.',NULL,'2026-11-16 18:48:55','2026-11-16 18:48:55'),(10,'DPC PDI Perjuangan Kab. Tanah Laut',NULL,NULL,'pdiperjuangan@tanahlautkab.go.id','parpol',3,NULL,'$2y$12$/X9l/BpNnmHFq83FUebWqu4OY.53jpBKVsu7aNfTZvEoNf4vmDlW.',NULL,'2026-11-16 18:48:56','2026-11-16 18:48:56'),(11,'DPD Partai Golkar Kab. Tanah Laut',NULL,NULL,'golkar@tanahlautkab.go.id','parpol',4,NULL,'$2y$12$PI.3XcHAqrC6DRSG9nQU8Om6j5DfSe3j8zO/jgCg5rSQxRpwd1eo6',NULL,'2026-11-16 18:48:56','2026-11-16 18:48:56'),(12,'DPD Partai NasDem Kab. Tanah Laut',NULL,NULL,'nasdem@tanahlautkab.go.id','parpol',5,NULL,'$2y$12$2OfJzFoISg8k1gyq.xIsWuizm2SbSFEH29qmG0Vu1HG8EomxQHp7C',NULL,'2026-11-16 18:48:57','2026-11-16 18:48:57'),(13,'DPD Partai Gelora Kab. Tanah Laut',NULL,NULL,'gelora@tanahlautkab.go.id','parpol',6,NULL,'$2y$12$0.wTa0wKVTEk.t7ED/C6jeVS0jUvlKEXVRdCzfzWgVUP9IRhK6ZCe',NULL,'2026-11-16 18:48:57','2026-11-16 18:48:57'),(14,'DPD PKS Kab. Tanah Laut',NULL,NULL,'pks@tanahlautkab.go.id','parpol',7,NULL,'$2y$12$arbQ.4gxAzMHJYkf.0PKaurZkYBOe1u91EpuU697s49/JXguzhkFK',NULL,'2026-11-16 18:48:58','2026-11-16 18:48:58'),(15,'DPC Partai Hanura Kab. Tanah Laut',NULL,NULL,'hanura@tanahlautkab.go.id','parpol',8,NULL,'$2y$12$t2BQ825NK/qlDAh/9TwP/.7hUp8ec0KJlG3pd4.HVFMq8F9VAK7pe',NULL,'2026-11-16 18:48:59','2026-11-16 18:48:59'),(16,'DPD PAN Kab. Tanah Laut',NULL,NULL,'pan@tanahlautkab.go.id','parpol',9,NULL,'$2y$12$V7nDq95nb5tpKihdiQCXbeP3K9B2.ZGsP2CT.CIbw0bpoF/dUkI8m',NULL,'2026-11-16 18:48:59','2026-11-16 18:48:59'),(17,'DPC PBB Kab. Tanah Laut',NULL,NULL,'pbb@tanahlautkab.go.id','parpol',10,NULL,'$2y$12$16VsCD7DuFTtZVYCmNKndOGpwS75Wg0BkjapQNJibL2e33gXh70LC',NULL,'2026-11-16 18:49:00','2026-11-16 18:49:00'),(18,'DPC Partai Demokrat Kab. Tanah Laut',NULL,NULL,'demokrat@tanahlautkab.go.id','parpol',11,NULL,'$2y$12$9Qq9LkGKenC4VEfzB9YgHe2lhAoxRLNbDPaRjMIjnlyFzewiWL/rq',NULL,'2026-11-16 18:49:00','2026-11-16 18:49:00'),(19,'DPD PSI Kab. Tanah Laut',NULL,NULL,'psi@tanahlautkab.go.id','parpol',12,NULL,'$2y$12$gwyypNaci5m019XpHkTv6.3OrPRxrKHac6ebAVMvihkJoRwulXUpG',NULL,'2026-11-16 18:49:01','2026-11-16 18:49:01'),(20,'DPD Partai Perindo Kab. Tanah Laut',NULL,NULL,'perindo@tanahlautkab.go.id','parpol',13,NULL,'$2y$12$jFev/2XZW.a6ZPb0DKBqL.iWTWBq.yVy35/iSDqTh6K63M7pfIWx.',NULL,'2026-11-16 18:49:02','2026-11-16 18:49:02'),(21,'DPC PPP Kab. Tanah Laut',NULL,NULL,'ppp@tanahlautkab.go.id','parpol',14,NULL,'$2y$12$a8J8yT.C842C0ydMaN83le3EwIlkGXhEx76rpMsMhnbXgEC1b2j/W',NULL,'2026-11-16 18:49:02','2026-11-16 18:49:02'),(22,'DPC Partai Gerakan Rakyat Kab. Tanah Laut',NULL,NULL,'gerakanrakyat@tanahlautkab.go.id','parpol',15,NULL,'$2y$12$fNL1eht/w2Of7fCFZ3fWnOJxU1eOgvbEJDz82UqzFRxs9IWxL856G',NULL,'2026-11-16 18:49:03','2026-11-16 18:49:03'),(23,'DPC Partai Gema Bangsa Kab. Tanah Laut',NULL,NULL,'gemabangsa@tanahlautkab.go.id','parpol',16,NULL,'$2y$12$TbBTFP/pBrAx9IHSXD.uzeSMvlNeR1ZhxOTQc49qxFR3ejbsL/O1e',NULL,'2026-11-16 18:49:03','2026-11-16 18:49:03'),(24,'DPC Partai Garuda Kab. Tanah Laut',NULL,NULL,'garuda@tanahlautkab.go.id','parpol',17,NULL,'$2y$12$SVscTeO18H.lYO/h4P1mmuAT4jX4MquScDtiq0T9fP7mzgBMRUL.i',NULL,'2026-11-16 18:49:04','2026-11-16 18:49:04'),(25,'Pimcab PKN Kab. Tanah Laut',NULL,NULL,'pkn@tanahlautkab.go.id','parpol',18,NULL,'$2y$12$juAY4rNqzJsW8CCt2qqG/.HpDTTOSDvk5y6RHRnU1hCBs3IjIu1hu',NULL,'2026-11-16 18:49:05','2026-11-16 18:49:05'),(26,'DPD Partai Ummat Kab. Tanah Laut',NULL,NULL,'ummat@tanahlautkab.go.id','parpol',19,NULL,'$2y$12$84r2iujnKVZbPEuOIlSVqOSIuLhng1VLC1xeZBtnzkIknGaGNq.au',NULL,'2026-11-16 18:49:06','2026-11-16 18:49:06'),(27,'Exco Partai Buruh Kab. Tanah Laut',NULL,NULL,'buruh@tanahlautkab.go.id','parpol',20,NULL,'$2y$12$79/S1fqpE8pPL7Q6myHXyejf70AVghIkbQwn4vN0hX613lM2REGIO',NULL,'2026-11-16 18:49:07','2026-11-16 18:49:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wasbang_kegiatans`
--

DROP TABLE IF EXISTS `wasbang_kegiatans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wasbang_kegiatans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Wawasan Kebangsaan',
  `tanggal` date NOT NULL,
  `hari` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sasaran_peserta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelaksana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bidang Bina Ideologi, Wawasan Kebangsaan & Karakter Bangsa',
  `rincian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Selesai Dilaksanakan',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_tambahan` text COLLATE utf8mb4_unicode_ci,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_laporan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wasbang_kegiatans`
--

LOCK TABLES `wasbang_kegiatans` WRITE;
/*!40000 ALTER TABLE `wasbang_kegiatans` DISABLE KEYS */;
INSERT INTO `wasbang_kegiatans` VALUES (1,'Sosialisasi Penguatan 4 Konsensus Dasar Kebangsaan & Nilai Pancasila bagi Generasi Muda','Wawasan Kebangsaan','2026-08-18','Selasa','08:30 - 12:30 WITA','Lapangan Terbuka SMKN 1 Pelaihari, Jl. Gembira No. 1','250 Siswa-Siswi OSIS & Pramuka Penegak se-Kecamatan Pelaihari','Subbidang Bina Ideologi & Wawasan Kebangsaan','Pelaksanaan sosialisasi lapangan penguatan 4 Konsensus Dasar Kebangsaan (Pancasila, UUD 1945, NKRI, dan Bhinneka Tunggal Ika).\n\nNarasumber berasal dari Kodim 1009/Tanah Laut dan Bakesbangpol Kabupaten Tanah Laut. Kegiatan berlangsung interaktif di ruang terbuka dengan metode outbound kepemimpinan, simulasi pemecahan masalah kebangsaan, dan ikrar pemuda penerus bangsa. Diakhiri dengan penyerahan simbolis paket bendera merah putih kepada masing-masing perwakilan sekolah.','Selesai Dilaksanakan','images/wasbang/wasbang-1.svg','\"[\\\"images\\\\\\/wasbang\\\\\\/wasbang-1.svg\\\",\\\"images\\\\\\/wasbang\\\\\\/wasbang-3.svg\\\"]\"',NULL,'https://www.youtube.com/watch?v=dQw4w9WgXcQ',NULL,'2026-11-16 18:49:07','2026-11-16 18:49:07'),(2,'Monitoring & Evaluasi Lapangan Pembinaan Desa Tangguh Ideologi & Kerukunan Beragama','Bina Ideologi Pancasila','2026-09-09','Rabu','09:00 - 14:00 WITA','Balai Pertemuan Terbuka Desa Sumber Makmur, Kec. Takisung','65 Peserta (Aparatur Desa, Tokoh Agama, Tokoh Adat, BPD & Karang Taruna)','Tim Monitoring Ketahanan Ideologi Bakesbangpol Tala','Monitoring langsung ke lapangan terhadap pelaksanaan program Desa Tangguh Ideologi Pancasila di wilayah pesisir Kecamatan Takisung.\n\nTim melakukan dialog terbuka bersama pemuka agama (MUI, FKUB), tokoh masyarakat transmigran, dan generasi muda desa. Fokus bahasan mencakup pemetaan potensi kerawanan gesekan sosial, penguatan deteksi dini paham radikal intoleran, serta pemantapan gotong royong warga antar-suku.','Selesai Dilaksanakan','images/wasbang/wasbang-2.svg','\"[\\\"images\\\\\\/wasbang\\\\\\/wasbang-2.svg\\\"]\"',NULL,NULL,NULL,'2026-11-16 18:49:07','2026-11-16 18:49:07'),(3,'Pemusatan Diklat Lapangan Calon Pasukan Pengibar Bendera Pusaka (Paskibraka) Tala 2026','Paskibraka & Kepemimpinan Pemuda','2026-08-05','Rabu','07:00 - 17:30 WITA','Lapangan Pertasi Kencana Pelaihari, Kab. Tanah Laut','40 Calon Paskibraka Terpilih dari 11 Kecamatan di Kabupaten Tanah Laut','Bidang Bina Ideologi Wasbang bersama Tim Instruktur TNI/Polri','Latihan intensif luar ruangan pembentukan mental, disiplin Peraturan Baris Berbaris (PBB), formasi pengibaran bendera pusaka, serta wawasan kebangsaan nusantara bagi 40 calon Paskibraka Kabupaten Tanah Laut Tahun 2026.\n\nDidampingi pelatih dari Kodim 1009/TLA, Polres Tanah Laut, PPI Tala, serta pengawalan tim medis Dinas Kesehatan Tala. Kondisi seluruh peserta fisik dan stamina prima.','Selesai Dilaksanakan','images/wasbang/wasbang-3.svg','\"[\\\"images\\\\\\/wasbang\\\\\\/wasbang-3.svg\\\",\\\"images\\\\\\/wasbang\\\\\\/wasbang-1.svg\\\"]\"',NULL,'https://www.youtube.com/watch?v=dQw4w9WgXcQ',NULL,'2026-11-16 18:49:07','2026-11-16 18:49:07'),(4,'Kemah Wawasan Nusantara & Bela Negara Pemuda Lintas Etnis Tanah Laut','Bela Negara & Ketahanan Bangsa','2026-10-10','Sabtu','2 Hari 1 Malam (10 - 11 Okt 2026)','Bumi Perkemahan Agro Wisata Desa Tirta Jaya, Kec. Bajuin','150 Pemuda perwakilan KNPI, Pemuda Pancasila, FPK, dan BEM se-Tala','Bidang Bina Ideologi, Wasbang & Karakter Bangsa','Penyelenggaraan kemah outdoor wawasan nusantara dan bela negara. Agenda meliputi: (1) Apel Kebangsaan pembuka, (2) Lintas alam jelajah ketahanan fisik, (3) Diskusi panel peran pemuda menyongsong Indonesia Emas 2045, (4) Api unggun kebangsaan dengan ikrar persatuan lintas suku (Banjar, Jawa, Bugis, Dayak, Madura, Bali), serta (5) Kerja bakti pembersihan area wisata lokal Bajuin.','Selesai Dilaksanakan','images/wasbang/wasbang-4.svg','\"[\\\"images\\\\\\/wasbang\\\\\\/wasbang-4.svg\\\"]\"',NULL,NULL,NULL,'2026-11-16 18:49:07','2026-11-16 18:49:07'),(5,'Aksi Lapangan Gerakan Pembagian 10 Juta Bendera Merah Putih & Kampanye Cinta Tanah Air','Karakter Bangsa & Moralitas','2026-08-01','Sabtu','07:30 - 10:30 WITA','Simpang Bundaran Angsau & Area Terbuka Pasar Rakyat Pelaihari','1.000+ Masyarakat umum, pedagang, dan pengguna jalan raya','Bakesbangpol Tala bersama Jajaran Forkopimda & Ormas Kebangsaan','Aksi turun ke jalan membagikan bendera merah putih secara cuma-cuma kepada masyarakat pengendara roda dua, roda empat, pedagang pasar, dan warga sekitar bundaran Angsau Pelaihari.\n\nKegiatan ini merupakan implementasi Surat Edaran Kementerian Dalam Negeri tentang Gerakan Pembagian 10 Juta Bendera Merah Putih dalam rangka menyemarakkan HUT ke-81 Kemerdekaan Republik Indonesia.','Selesai Dilaksanakan','images/wasbang/wasbang-5.svg','\"[\\\"images\\\\\\/wasbang\\\\\\/wasbang-5.svg\\\"]\"',NULL,NULL,NULL,'2026-11-16 18:49:07','2026-11-16 18:49:07'),(6,'Roadshow Lapangan Ketahanan Budaya Lokal & Pencegahan Faham Ekstremisme di Tambang Ulang','Karakter Bangsa & Moralitas','2026-10-24','Sabtu','09:00 - 13:00 WITA','Halaman Terbuka Kantor Camat Tambang Ulang, Kab. Tanah Laut','90 Tokoh Pemuda, Karang Taruna, dan Pamong Desa','Subbidang Bina Karakter Bangsa','Kegiatan sosialisasi dan dialog interaktif outdoor penguatan ketahanan kearifan lokal Banjar dalam membentengi generasi muda dari infiltrasi paham radikal dan ekstrimisme berbasis agama maupun separatisme.\n\nDilakukan penandatanganan deklarasi pemuda Tambang Ulang pelopor perdamaian dan kerukunan warga.','Sedang Dilaksanakan','images/wasbang/wasbang-6.svg','\"[\\\"images\\\\\\/wasbang\\\\\\/wasbang-6.svg\\\"]\"',NULL,NULL,NULL,'2026-11-16 18:49:07','2026-11-16 18:49:07'),(7,'Penjaringan Calon Paskibraka di SMA/Pesantren Kintap','Penjaringan & Seleksi Paskibraka (SMA/SMK/Pesantren)','2026-11-12','Kamis','08:30 - 11:30 WITA','SMAN 1 Kintap','Siswa-Siswi SMA/SMK, Santri Aliyah Pesantren, dan Tamu','Bidang Bina Ideologi, Wasbang & Karakter Bangsa','Penjaringan Calon Paskibraka di SMA/Pesantren di Kecamatan Kintapura','Selesai Dilaksanakan','uploads/wasbang/foto/foto_1794794253_penjaringan-calon-paskibraka-d.jpg',NULL,'uploads/wasbang/video/video_1794794253_penjaringan-calon-paskibraka-d.mp4',NULL,'uploads/wasbang/laporan/laporan_1794794253_penjaringan-calon-paskibraka-d.pdf','2026-11-16 18:49:39','2026-11-16 18:49:39');
/*!40000 ALTER TABLE `wasbang_kegiatans` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-17 10:51:02
