-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2025 at 07:21 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u234144659_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` bigint(20) NOT NULL,
  `role` varchar(16) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `title_id` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `slug_id` varchar(255) DEFAULT NULL,
  `slug_en` varchar(255) DEFAULT NULL,
  `content_id` longtext DEFAULT NULL,
  `content_en` longtext DEFAULT NULL,
  `cover` text DEFAULT NULL,
  `status` enum('editing','review','approved','rejected','published') DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `approved_by` bigint(20) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `title_id`, `title_en`, `slug_id`, `slug_en`, `content_id`, `content_en`, `cover`, `status`, `created_by`, `updated_by`, `approved_by`, `approved_at`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'quote satu', 'quotes one', 'quote-satu', 'quotes-one', 'Penyembuhan lebih tentang menerima rasa sakit dan menemukan cara untuk hidup berdampingan secara damai. Di lautan kehidupan, rasa sakit adalah gelombang pasang yang akan surut dan terus menerus.\n\nKita perlu belajar bagaimana membiarkannya membanjiri kita, tanpa tenggelam di dalamnya. Hidup kita tidak harus berakhir di tempat rasa sakit itu bermula, namun di situlah kita mulai pulih.', 'Healing is more about accepting the pain and finding a way to peacefully co-exist with it. In the sea of life, pain is a tide that will ebb and weave, continually.\n\nWe need to learn how to let it wash over us, without drowning in it. Our life doesn\'t have to end where the pain begins, but rather, it is where we start to mend.', '/storage/uploads/blog/potret-polisi-hutan-sang-penjaga-rimba-gunung-gede-pangrango-1.jpeg', 'editing', 1, NULL, NULL, NULL, NULL, '2023-08-24 14:52:15', '2023-09-01 16:05:09'),
(2, 1, 'KLHK Giatkan Sosialisasi Upaya Turunkan Emisi Gas Rumah Kaca', 'Ministry of Environment and Forestry Intensifies Socialization of Efforts to Reduce Greenhouse Gas Emissions', 'klhk-giatkan-sosialisasi-upaya-turunkan-emisi-gas-rumah-kaca', 'ministry-of-environment-and-forestry-intensifies-socialization-of-efforts-to-reduce-greenhouse-gas-emissions', '<p>Kementerian Lingkungan Hidup dan Kehutanan menyosialisasikan tujuan dari kegiatan Indonesia\'s Forest and Other Land Use (FOLU) Net Sink 2030 yang diadakan pada tanggal 1 Agustus bertempat di Balai Petitih Kantor Gubernur Kalimantan Barat. Pelaksana Tugas Direktur Jenderal Planlogi Kehutanan dan Tata Lingkungan Ruandha Agung Sugadirman menyampaikan menjaga kelestarian di dalam pencapaian Indonesia\'s FOLU Net Sink 2030 adalah bagian dari kontribusi untuk pengendalian perubahan iklim Indonesia kepada dunia.</p><p>\"Sebagaimana komitmen Bapak Presiden yang telah disampaikan kepada dunia, Indonesia\'s FOLU Net Sink menargetkan tingkat serapan emisi gas rumah kaca dari sektor kehutanan dan penggunaan lahan lainnya pada tahun 2030 akan seimbang atau bahkan lebih tinggi dari tingkat emisi. Sektor kehutanan menyumbang porsi terbesar di dalam target penurunan emisi gas rumah kaca dengan kontribusi sekitar 60% dalam pemenuhan target netral karbon atau net-zero emission,\" ujar Ruandha dalam keterangan tertulis, Rabu (3/8/2022)</p><p>Kegiatan Indonesia\'s FOLU Net Sink 2030 ini terdiri atas rencana operasional sebagai tindak lanjut Peraturan Presiden No 98 Tahun 2021 terkait penyelenggaraan nilai ekonomi karbon serta Keputusan Menteri No 168 Tahun 2022 tentang Indonesia\'s FOLU Net Sink 2030 untuk menekan perubahan iklim. Kementerian LHK juga telah menyusun rencana strategis dan rencana kerja sebagai dasar untuk pelaksanaan di tingkat regional dan daerah. Selain itu, ada target penyerapan emisi GRK yang ingin dicapai pada tahun 2030 adalah sebesar -140 juta ton CO2e.</p><p>Untuk melakukan kegiatan tersebut, Ruandha menjelaskan tiga aksi utama dalam pelaksanaan rencana operasional Indonesia FOLU Net Sink 2030. Dari ketiga aksi utama tersebut ialah pengurangan emisi, pertahankan serapan, dan peningkatan serapan karbon.</p><p>\"Hutan menjadi kunci penting untuk keberhasilan Indonesia\'s FOLU Net Sink 2030. Pengendalian kebakaran hutan dan lahan secara berkelanjutan mampu mencegah terjadinya deforestasi serta pelepasan emisi ke atmosfir. Selain itu hutan juga menjadi tempat bagi keanekaragaman hayati yang penting bagi masa depan serta menopang pembangunan ekonomi dan sosial masyarakat Indonesia. Untuk itu pelestarian hutan kita tingkatkan dan berbagai penambahan tutupan lahan terus kita lakukan bersama masyarakat dalam rangka membangun hutan tropis basah di Indonesia,\" ucap Ruandha.</p><p>Ruandha turut mengakui potensi hutan mangrove yang mempunyai kemampuan 4-5 kali lebih besar di dalam penyerapan karbon dibanding hutan mineral.</p><p>\"Oleh karena itu, Kementerian LHK mengharapkan peran aktif pemerintah daerah, akademisi, alumni, mitra KLHK, LSM, media, serta masyarakat umum untuk mensinergikan dan mengimplementasikan aksi mitigasi pengendalian perubahan iklim melalui potensi yang ada di daerah dengan mengacu pada target penurunan emisi gas rumah kaca nasional,\" kata Ruandha.</p><p>Gubernur Kalimantan Barat, Sutarmidji mengatakan bahwa Provinsi Kalimantan Barat mempunyai potensi besar untuk turut andil dalam menyukseskan agenda nasional tersebut. Berdasarkan SK Menteri Kehutanan Nomor 733 Tahun 2014, Provinsi Kalimantan Barat memiliki luas kawasan hutan mencapai 8.389.600 hektar atau sekitar 57,14% dari total luas wilayah Kalimantan Barat.</p><p>Provinsi ini juga memiliki luas kawasan gambut mencapai 2.793.331 hektar berdasarkan SK Menteri LHK Nomor 130 Tahun 2017. Kawasan gambut tersebut terbagi menjadi indikatif fungsi budidaya gambut dan indikatif fungsi lindung gambut di 699 desa.</p><p>Selain itu, Provinsi Kalimantan Barat juga mempunyai kawasan mangrove mencapai 161.557,19 hektar berdasarkan Peta Mangrove Nasional yang tersebar di Kabupaten Bengkayang, Kabupaten Kayong Utara, Kabupaten Ketapang, Kabupaten Kubu Raya, Kabupaten Mempawah, Kabupaten Sambas dan Kota Singkawang.</p><p>\"Potensi sumber daya alam yang luar biasa ini sudah seharusnya bagi Provinsi Kalimantan Barat untuk menjaga hutan hujan tropis alaminya yang memiliki berbagai peran penting. Oleh karena itu kami berupaya secara optimal melalui perwujudan pengelolaan lingkungan hidup dan pembangunan kehutanan yang berkelanjutan dan berkeadilan sekaligus meningkatkan kesejahteraan masyarakat,\" ucap Sutarmidji.</p><p>Kegiatan Sosialisasi Indonesia\'s FOLU Net Sink 2030 Sub Nasional dilakukan untuk mendorong seluruh pemerintah daerah agar dapat menyusun rencana kerja secara lebih detail. Sosialisasi di tingkat sub nasional dilakukan KLHK yang disampaikan ke 10 provinsi mulai dari Aceh, Sumatera Barat, Riau, Sumatra Selatan, Jambi, Lampung, Kalimantan Barat, Kalimantan Tengah, Kalimantan Utara, dan Kalimantan Timur. Dengan disampaikannya kegiatan ini, diharapkan semua proses sosialisasi dan penyusunan rencana kerja sub nasional terkait Indonesia\'s FOLU Net Sink 2030 dapat terselesaikan pada tahun ini.</p>', '<p>The Ministry of Environment and Forestry socialized the objectives of the Indonesia\'s Forest and Other Land Use (FOLU) Net Sink 2030 activity which was held on August 1 at the Petitih Hall of the West Kalimantan Governor\'s Office. Acting Director General of Forestry Planning and Environmental Management, Ruandha Agung Sugadirman, said that maintaining sustainability in achieving Indonesia\'s FOLU Net Sink 2030 is part of Indonesia\'s contribution to controlling climate change to the world.</p><p>\"As the President\'s commitment has been conveyed to the world, Indonesia\'s FOLU Net Sink targets that the absorption level of greenhouse gas emissions from the forestry sector and other land uses in 2030 will be equal to or even higher than the emission level. The forestry sector contributes the largest portion of the target \"reducing greenhouse gas emissions with a contribution of around 60% in meeting the carbon neutral or net-zero emission target,\" said Ruandha in a written statement, Wednesday (3/8/2022)</p><p>Indonesia\'s FOLU Net Sink 2030 activities consist of operational plans as a follow-up to Presidential Regulation No. 98 of 2021 regarding the implementation of carbon economic value as well as Ministerial Decree No. 168 of 2022 concerning Indonesia\'s FOLU Net Sink 2030 to suppress climate change. The Ministry of Environment and Forestry has also prepared strategic plans and work plans as a basis for implementation at regional and regional levels. Apart from that, there is a GHG emission absorption target that we want to achieve by 2030, which is -140 million tons of CO2e.</p><p>To carry out these activities, Ruandha explained three main actions in implementing the Indonesia FOLU Net Sink 2030 operational plan. Of the three main actions, they are reducing emissions, maintaining absorption, and increasing carbon absorption.</p><p>\"Forests are an important key to the success of Indonesia\'s FOLU Net Sink 2030. Sustainable control of forest and land fires can prevent deforestation and the release of emissions into the atmosphere. Apart from that, forests are also a place for biodiversity which is important for the future and supports economic and social development \"Indonesian people. For this reason, we are increasing forest conservation and we continue to carry out various additions to land cover together with the community in order to build wet tropical forests in Indonesia,\" said Ruandha.</p><p>Ruandha also acknowledged the potential of mangrove forests which have 4-5 times greater capacity for carbon absorption than mineral forests.</p><p>\"Therefore, the Ministry of Environment and Forestry expects the active role of local governments, academics, alumni, KLHK partners, NGOs, media, and the general public to synergize and implement mitigation actions to control climate change through the potential that exists in the regions by referring to the target of reducing house gas emissions. national glass,\" said Ruandha.</p><p>The Governor of West Kalimantan, Sutarmidji, said that West Kalimantan Province has great potential to contribute to the success of this national agenda. Based on the Decree of the Minister of Forestry Number 733 of 2014, West Kalimantan Province has a forest area of 8,389,600 hectares or around 57.14% of the total area of West Kalimantan.</p><p>This province also has a peat area of 2,793,331 hectares based on the Decree of the Minister of Environment and Forestry Number 130 of 2017. The peat area is divided into indicative peat cultivation functions and indicative peat protection functions in 699 villages.</p><p>Apart from that, West Kalimantan Province also has a mangrove area of 161,557.19 hectares based on the National Mangrove Map which is spread across Bengkayang Regency, North Kayong Regency, Ketapang Regency, Kubu Raya Regency, Mempawah Regency, Sambas Regency and Singkawang City.</p><p>\"This extraordinary natural resource potential is necessary for West Kalimantan Province to protect its natural tropical rain forests which have various important roles. Therefore, we are making optimal efforts by realizing environmental management and forestry development that is sustainable and fair while improving community welfare. ,\" said Sutarmidji.</p><p>Indonesia\'s FOLU Net Sink 2030 Sub National Socialization Activities were carried out to encourage all local governments to prepare work plans in more detail. Socialization at the sub-national level was carried out by the Ministry of Environment and Forestry which was delivered to 10 provinces starting from Aceh, West Sumatra, Riau, South Sumatra, Jambi, Lampung, West Kalimantan, Central Kalimantan, North Kalimantan and East Kalimantan. By delivering this activity, it is hoped that all socialization processes and preparation of sub-national work plans related to Indonesia\'s FOLU Net Sink 2030 can be completed this year.</p>', '/storage/uploads/blog/potret-polisi-hutan-sang-penjaga-rimba-gunung-gede-pangrango-1.jpeg', 'published', 1, 1, 1, NULL, NULL, '2023-09-01 09:37:10', '2023-09-01 16:05:09'),
(3, 1, 'Hari Pohon Sedunia dan Bahaya Penebangan Liar', 'World Tree Day and the Dangers of Illegal Logging', 'hari-pohon-sedunia-dan-bahaya-penebangan-liar', 'world-tree-day-and-the-dangers-of-illegal-logging', '<p>Hari Pohon Sedunia diperingati setiap tanggal 21 November. Ini merupakan momen untuk mengingatkan soal pentingnya pohon bagi kehidupan.</p><p>Pohon memiliki kemampuan untuk menyerap CO2. Selain itu, pohon juga menyimpan karbon dan menghasilkan oksigen.</p><p>Dalam situs resmi Kabupaten Probolinggo dijelaskan, pohon mempunyai dua peran penting dalam kehidupan. Berikut penjelasannya:</p><p><strong>1. Manfaat secara langsung</strong></p><p>Manfaat secara langsung dari pohon ialah membentuk keindahan dan kenyamanan. Serta menghasilkan bahan-bahan untuk dimanfaatkan.</p><p><strong>2. Manfaat secara tidak langsung</strong></p><p>Manfaat tidak langsung dari pohon adalah menjaga persediaan air di tanah. Selain itu, pohon juga melestarikan fungsi lingkungan dan sebagai pembersih udara.</p><p>Namun hingga kini, masih marak penebangan pohon secara liar. Itu menjadi salah satu faktor utama mengapa Indonesia dilanda krisis iklim di sektor hutan.</p><p>Dampak alam yang ditimbulkan pun beragam. Seperti longsor, banjir, tanah bergerak.</p><h4>Berikut empat dampak penebangan pohon secara liar, dikutip dari laman Pusat Krisis Kemkes:</h4><p><strong>1. Hilangnya kesuburan tanah</strong></p><p>Tanah membutuhkan banyak nutrisi. Nutrisi itu adalah pohon. Ketika pohon ditebang, tanah menyerap langsung sinar matahari. Sehingga tanah menjadi kering dan gersang.</p><p><strong>2. Turunnya sumber daya air</strong></p><p>Pohon memiliki andil dalam menjaga siklus air. Akar pohon menyerap air, lalu diuapkan ke daun. Lalu dilepaskan ke lapisan atmosfer.</p><p><strong>3. Punahnya keanekaragaman hayati</strong></p><p>Akibat tanah yang gundul dan gersang, sekitar 100 spesies hewan turun gunung setiap harinya.</p><p><strong>4. Mengakibatkan banjir</strong></p><p>Hutan berfungsi sebagai penyerap air. Namun jika hutannya gundul, maka tidak ada tempat menyimpan air hujan. Sehingga mengakibatkan banjir.</p>', '<p>World Tree Day is celebrated every November 21. This is a moment to remind you about the importance of trees for life.</p><p>Trees have the ability to absorb CO2. Apart from that, trees also store carbon and produce oxygen.</p><p>On the official Probolinggo Regency website, it is explained that trees have two important roles in life. Here\'s the explanation:</p><p><strong>1. Direct benefits</strong></p><p>The direct benefit of trees is that they create beauty and comfort. As well as producing materials to be used.</p><p><strong>2. Indirect benefits</strong></p><p>An indirect benefit of trees is maintaining water supplies in the soil. Apart from that, trees also preserve environmental functions and act as air purifiers.</p><p>However, until now, illegal cutting of trees is still rampant. This is one of the main factors why Indonesia is hit by a climate crisis in the forest sector.</p><p>The natural impacts caused are also varied. Like landslides, floods, the ground moves.</p><h4>The following are four impacts of illegal felling of trees, quoted from the Ministry of Health\'s Crisis Center page:</h4><p><strong>1. Loss of soil fertility</strong></p><p>Soil needs a lot of nutrients. That nutrition is a tree. When trees are cut down, the soil absorbs direct sunlight. So the land becomes dry and barren.</p><p><strong>2. Decrease in water resources</strong></p><p>Trees play a role in maintaining the water cycle. Tree roots absorb water, which is then evaporated into the leaves. Then released into the atmosphere.</p><p><strong>3. Extinction of biodiversity</strong></p><p>Due to the bare and arid land, around 100 species of animals descend from the mountains every day.</p><p><strong>4. Resulting in flooding</strong></p><p>Forests function as water absorbers. However, if the forest is bare, there is no place to store rainwater. Thus causing flooding.</p>', '/storage/uploads/blog/foto-hijaunya-hutan-kalimantan-yang-jadi-paru-paru-dunia-6_169.jpeg', 'published', 1, 1, 1, NULL, NULL, '2022-09-01 09:37:10', '2023-09-01 16:05:09'),
(4, 1, 'Serba-serbi Phon Jati: Sifat Ekologis, Sebaran dan Manfaat', 'Sundries of Phon Teak: Ecological Properties, Distribution and Benefits', 'serba-serbi-phon-jati-sifat-ekologis-sebaran-dan-manfaat', 'sundries-of-phon-teak-ecological-properties-distribution-and-benefits', '<p>Pohon jati merupakan pohon yang menghasilkan kayu berkualitas tinggi. Pohon jati ini memiliki kayu yang kuat dan awet untuk membuat furniture. Kayu dari pohon jati merupakan kayu berkualitas tinggi dan dihasilkan dari pohon yang berumur lebih dari 80 tahun.</p><p>Pohon jati dapat tumbuh hingga ratusan tahun, di Indonesia pohon jati terbesar dan tertua yaitu pohon \'Jati Denok\' yang tumbuh di Blora, Jawa Tengah.</p><p>Melansir dari laman Dinas Kehutanan Provinsi Jogjakarta, berikut adalah penjelasan mengenai pohon jati:</p><h4>Serba-serbi Pohon Jati:</h4><h4>1. Sifat Ekologis dan Sebarannya</h4><p>Pohon Jati menyebar luas mulai dari India, Myanmar, Laos, Kamboja, Thailand, Indochina, sampai ke Jawa. Pohon Jati sendiri tumbuh di hutan-hutan gugur, yang menggugurkan daunnya di musim kemarau.</p><p>Pohon Jati dapat bertumbuh di iklim kering yang nyata, namun tidak terlalu panjang. Memiliki curah hujan antara 1.200-3.000 mm per tahun dan dengan intensitas cahaya yang cukup tinggi sepanjang tahun.</p><p>Ketinggian tempat yang optimal adalah antara 0 - 700 m dpl; meski jati bisa tumbuh hingga 1.300 mdpl.</p><p>Di luar Jawa, Pohon Jati dapat ditemukan di Pulau Sulawesi, Pulau Muna, daerah Bima di Pulau Sumbawa, dan Pulau Buru. Pohon jati berkembang juga di daerah Lampung di Pulau Sumatera.</p><p>Sedangkan di Jawa, pohon jati menyebar di pantai utara Jawa, mulai dari Kerawang hingga ke ujung timur pulau ini. Namun, hutan jati paling banyak menyebar di Provinsi Jawa Tengah dan Jawa Timur.</p><p>Di kedua provinsi ini, hutan jati sering terbentuk secara alami akibat iklim muson yang menimbulkan kebakaran hutan secara berkala. Hutan jati yang cukup luas di Jawa terpusat di daerah alas roban Rembang, Blora, Groboragan, dan Pati. Bahkan, jati jawa dengan mutu terbaik dihasilkan di daerah tanah perkapuran Cepu, Kabupaten Blora, Jawa Tengah.</p><h4>2. Jenis Pohon Jati</h4><p>Di masyarakat Jawa terdapat beberapa jenis pohon jati yaitu:</p><p>1. Jati lengo atau jati malam, pohon ini memiliki kayu yang keras, berat, terasa halus apabila diraba dan seperti mengandung minyak. Jati lengo juga berwarna gelap, berbercak, dan bergaris.</p><p>2. Jati sungu, berwarna hitam, padat, dan berat.</p><p>3. Jati werut, yaitu pohon jati yang memiliki kayu yang keras dan serat berombak.</p><p>4. Jati doreng, berkayu sangat keras dengan warna loreng-loreng hitam menyala, sangat indah.</p><p>5. Jati kembang.</p><p>6. Jati kapur, kayunya berwarna keputih-putihan karena mengandung banyak kapur. Kurang kuat dan kurang awet.</p><h4>3. Manfaat Pohon Jati</h4><p>Daun jati dapat dimanfaatkan sebagai pembungkus makanan. Nasi yang dibungkus dengan daun jati akan terasa lebih nikmat. Contohnya adalah nasi jamblang yang terkenal dari Cirebon.</p><p>Selain itu daun jati juga banyak digunakan di Yogyakarta, Jawa Tengah, dan Jawa Timur sebagai pembungkus tempe.</p><p>Berbagai jenis serangga hama jati juga sering dimanfaatkan sebagai bahan makanan orang desa. Dua di antaranya adalah belalang jati (Jw. walang kayu), yang besar berwarna kecoklatan, dan ulat jati (Endoclita). Ulat jati bahkan kerap dianggap makanan istimewa karena lezatnya.</p><p>Demikianlah penjelasan mengenai pohon jati detikers. Apakah bisa dipahami?</p>', '<p>Teak trees are trees that produce high quality wood. This teak tree has strong and durable wood to make furniture. Wood from teak trees is high quality wood and is produced from trees that are more than 80 years old.</p><p>Teak trees can grow for hundreds of years, in Indonesia the largest and oldest teak tree is the \'Jati Denok\' tree which grows in Blora, Central Java.</p><p>Quoting from the Jogjakarta Provincial Forestry Service page, the following is an explanation of teak trees:</p><h4>Teak Tree Miscellaneous:</h4><h4>1. Ecological Characteristics and Distribution</h4><p>Teak trees are widespread from India, Myanmar, Laos, Cambodia, Thailand, Indochina, to Java. Teak trees themselves grow in deciduous forests, shedding their leaves in the dry season.</p><p>Teak trees can grow in real dry climates, but not for too long. It has rainfall between 1,200-3,000 mm per year and quite high light intensity throughout the year.</p><p>The optimal altitude is between 0 - 700 m above sea level; although teak can grow up to 1,300 meters above sea level.</p><p>Outside Java, teak trees can be found on Sulawesi Island, Muna Island, the Bima area on Sumbawa Island, and Buru Island. Teak trees also grow in the Lampung area on Sumatra Island.</p><p>Meanwhile in Java, teak trees spread across the north coast of Java, starting from Kerawang to the eastern tip of the island. However, teak forests are most widespread in the provinces of Central Java and East Java.</p><p>In these two provinces, teak forests are often formed naturally due to the monsoon climate which causes regular forest fires. Teak forests which are quite extensive in Java are concentrated in the robbed areas of Rembang, Blora, Groboragan, and Pati. In fact, the best quality Javanese teak is produced in the Cepu limestone soil area, Blora Regency, Central Java.</p><h4>2. Types of Teak Trees</h4><p>In Javanese society there are several types of teak trees, namely:</p><p>1. Lengo teak or night teak, this tree has wood that is hard, heavy, feels smooth when touched and seems to contain oil. Lengo teak is also dark, spotted and striped.</p><p>2. Sungu teak, black, dense and heavy.</p><p>3. Werut teak, which is a teak tree that has hard wood and wavy fibers.</p><p>4. Doreng teak, very hard wood with bright black stripes, very beautiful.</p><p>5. Teak flower.</p><p>6. Lime teak, the wood is whitish because it contains a lot of lime. Less strong and less durable.</p><h4>3. Benefits of Teak Trees</h4><p>Teak leaves can be used as food wrappers. Rice wrapped in teak leaves will taste better. An example is the famous jamblang rice from Cirebon.</p><p>Apart from that, teak leaves are also widely used in Yogyakarta, Central Java and East Java as tempe wrappers.</p><p>Various types of teak pest insects are also often used as food for villagers. Two of them are the teak locust (Jw. walang kayu), which is large brown in color, and the teak caterpillar (Endoclita). Teak caterpillars are often considered a special food because of their deliciousness.</p><p>That is the explanation of the detikers teak tree. Can it be understood?</p>', '/storage/uploads/blog/melestarikan-pohon-jatijpg-20220120071532.jpg', 'published', 1, 1, 1, NULL, NULL, '2023-09-01 09:37:10', '2023-09-01 16:49:01'),
(5, 1, 'KLHK Giatkan Sosialisasi Upaya Turunkan Emisi Gas Rumah Kaca', 'Ministry of Environment and Forestry Intensifies Socialization of Efforts to Reduce Greenhouse Gas Emissions', 'klhk-giatkan-sosialisasi-upaya-turunkan-emisi-gas-rumah-kaca-2', 'ministry-of-environment-and-forestry-intensifies-socialization-of-efforts-to-reduce-greenhouse-gas-emissions-2', '<p>Kementerian Lingkungan Hidup dan Kehutanan menyosialisasikan tujuan dari kegiatan Indonesia\'s Forest and Other Land Use (FOLU) Net Sink 2030 yang diadakan pada tanggal 1 Agustus bertempat di Balai Petitih Kantor Gubernur Kalimantan Barat. Pelaksana Tugas Direktur Jenderal Planlogi Kehutanan dan Tata Lingkungan Ruandha Agung Sugadirman menyampaikan menjaga kelestarian di dalam pencapaian Indonesia\'s FOLU Net Sink 2030 adalah bagian dari kontribusi untuk pengendalian perubahan iklim Indonesia kepada dunia.</p><p>\"Sebagaimana komitmen Bapak Presiden yang telah disampaikan kepada dunia, Indonesia\'s FOLU Net Sink menargetkan tingkat serapan emisi gas rumah kaca dari sektor kehutanan dan penggunaan lahan lainnya pada tahun 2030 akan seimbang atau bahkan lebih tinggi dari tingkat emisi. Sektor kehutanan menyumbang porsi terbesar di dalam target penurunan emisi gas rumah kaca dengan kontribusi sekitar 60% dalam pemenuhan target netral karbon atau net-zero emission,\" ujar Ruandha dalam keterangan tertulis, Rabu (3/8/2022)</p><p>Kegiatan Indonesia\'s FOLU Net Sink 2030 ini terdiri atas rencana operasional sebagai tindak lanjut Peraturan Presiden No 98 Tahun 2021 terkait penyelenggaraan nilai ekonomi karbon serta Keputusan Menteri No 168 Tahun 2022 tentang Indonesia\'s FOLU Net Sink 2030 untuk menekan perubahan iklim. Kementerian LHK juga telah menyusun rencana strategis dan rencana kerja sebagai dasar untuk pelaksanaan di tingkat regional dan daerah. Selain itu, ada target penyerapan emisi GRK yang ingin dicapai pada tahun 2030 adalah sebesar -140 juta ton CO2e.</p><p>Untuk melakukan kegiatan tersebut, Ruandha menjelaskan tiga aksi utama dalam pelaksanaan rencana operasional Indonesia FOLU Net Sink 2030. Dari ketiga aksi utama tersebut ialah pengurangan emisi, pertahankan serapan, dan peningkatan serapan karbon.</p><p>\"Hutan menjadi kunci penting untuk keberhasilan Indonesia\'s FOLU Net Sink 2030. Pengendalian kebakaran hutan dan lahan secara berkelanjutan mampu mencegah terjadinya deforestasi serta pelepasan emisi ke atmosfir. Selain itu hutan juga menjadi tempat bagi keanekaragaman hayati yang penting bagi masa depan serta menopang pembangunan ekonomi dan sosial masyarakat Indonesia. Untuk itu pelestarian hutan kita tingkatkan dan berbagai penambahan tutupan lahan terus kita lakukan bersama masyarakat dalam rangka membangun hutan tropis basah di Indonesia,\" ucap Ruandha.</p><p>Ruandha turut mengakui potensi hutan mangrove yang mempunyai kemampuan 4-5 kali lebih besar di dalam penyerapan karbon dibanding hutan mineral.</p><p>\"Oleh karena itu, Kementerian LHK mengharapkan peran aktif pemerintah daerah, akademisi, alumni, mitra KLHK, LSM, media, serta masyarakat umum untuk mensinergikan dan mengimplementasikan aksi mitigasi pengendalian perubahan iklim melalui potensi yang ada di daerah dengan mengacu pada target penurunan emisi gas rumah kaca nasional,\" kata Ruandha.</p><p>Gubernur Kalimantan Barat, Sutarmidji mengatakan bahwa Provinsi Kalimantan Barat mempunyai potensi besar untuk turut andil dalam menyukseskan agenda nasional tersebut. Berdasarkan SK Menteri Kehutanan Nomor 733 Tahun 2014, Provinsi Kalimantan Barat memiliki luas kawasan hutan mencapai 8.389.600 hektar atau sekitar 57,14% dari total luas wilayah Kalimantan Barat.</p><p>Provinsi ini juga memiliki luas kawasan gambut mencapai 2.793.331 hektar berdasarkan SK Menteri LHK Nomor 130 Tahun 2017. Kawasan gambut tersebut terbagi menjadi indikatif fungsi budidaya gambut dan indikatif fungsi lindung gambut di 699 desa.</p><p>Selain itu, Provinsi Kalimantan Barat juga mempunyai kawasan mangrove mencapai 161.557,19 hektar berdasarkan Peta Mangrove Nasional yang tersebar di Kabupaten Bengkayang, Kabupaten Kayong Utara, Kabupaten Ketapang, Kabupaten Kubu Raya, Kabupaten Mempawah, Kabupaten Sambas dan Kota Singkawang.</p><p>\"Potensi sumber daya alam yang luar biasa ini sudah seharusnya bagi Provinsi Kalimantan Barat untuk menjaga hutan hujan tropis alaminya yang memiliki berbagai peran penting. Oleh karena itu kami berupaya secara optimal melalui perwujudan pengelolaan lingkungan hidup dan pembangunan kehutanan yang berkelanjutan dan berkeadilan sekaligus meningkatkan kesejahteraan masyarakat,\" ucap Sutarmidji.</p><p>Kegiatan Sosialisasi Indonesia\'s FOLU Net Sink 2030 Sub Nasional dilakukan untuk mendorong seluruh pemerintah daerah agar dapat menyusun rencana kerja secara lebih detail. Sosialisasi di tingkat sub nasional dilakukan KLHK yang disampaikan ke 10 provinsi mulai dari Aceh, Sumatera Barat, Riau, Sumatra Selatan, Jambi, Lampung, Kalimantan Barat, Kalimantan Tengah, Kalimantan Utara, dan Kalimantan Timur. Dengan disampaikannya kegiatan ini, diharapkan semua proses sosialisasi dan penyusunan rencana kerja sub nasional terkait Indonesia\'s FOLU Net Sink 2030 dapat terselesaikan pada tahun ini.</p>', '<p>The Ministry of Environment and Forestry socialized the objectives of the Indonesia\'s Forest and Other Land Use (FOLU) Net Sink 2030 activity which was held on August 1 at the Petitih Hall of the West Kalimantan Governor\'s Office. Acting Director General of Forestry Planning and Environmental Management, Ruandha Agung Sugadirman, said that maintaining sustainability in achieving Indonesia\'s FOLU Net Sink 2030 is part of Indonesia\'s contribution to controlling climate change to the world.</p><p>\"As the President\'s commitment has been conveyed to the world, Indonesia\'s FOLU Net Sink targets that the absorption level of greenhouse gas emissions from the forestry sector and other land uses in 2030 will be equal to or even higher than the emission level. The forestry sector contributes the largest portion of the target \"reducing greenhouse gas emissions with a contribution of around 60% in meeting the carbon neutral or net-zero emission target,\" said Ruandha in a written statement, Wednesday (3/8/2022)</p><p>Indonesia\'s FOLU Net Sink 2030 activities consist of operational plans as a follow-up to Presidential Regulation No. 98 of 2021 regarding the implementation of carbon economic value as well as Ministerial Decree No. 168 of 2022 concerning Indonesia\'s FOLU Net Sink 2030 to suppress climate change. The Ministry of Environment and Forestry has also prepared strategic plans and work plans as a basis for implementation at regional and regional levels. Apart from that, there is a GHG emission absorption target that we want to achieve by 2030, which is -140 million tons of CO2e.</p><p>To carry out these activities, Ruandha explained three main actions in implementing the Indonesia FOLU Net Sink 2030 operational plan. Of the three main actions, they are reducing emissions, maintaining absorption, and increasing carbon absorption.</p><p>\"Forests are an important key to the success of Indonesia\'s FOLU Net Sink 2030. Sustainable control of forest and land fires can prevent deforestation and the release of emissions into the atmosphere. Apart from that, forests are also a place for biodiversity which is important for the future and supports economic and social development \"Indonesian people. For this reason, we are increasing forest conservation and we continue to carry out various additions to land cover together with the community in order to build wet tropical forests in Indonesia,\" said Ruandha.</p><p>Ruandha also acknowledged the potential of mangrove forests which have 4-5 times greater capacity for carbon absorption than mineral forests.</p><p>\"Therefore, the Ministry of Environment and Forestry expects the active role of local governments, academics, alumni, KLHK partners, NGOs, media, and the general public to synergize and implement mitigation actions to control climate change through the potential that exists in the regions by referring to the target of reducing house gas emissions. national glass,\" said Ruandha.</p><p>The Governor of West Kalimantan, Sutarmidji, said that West Kalimantan Province has great potential to contribute to the success of this national agenda. Based on the Decree of the Minister of Forestry Number 733 of 2014, West Kalimantan Province has a forest area of 8,389,600 hectares or around 57.14% of the total area of West Kalimantan.</p><p>This province also has a peat area of 2,793,331 hectares based on the Decree of the Minister of Environment and Forestry Number 130 of 2017. The peat area is divided into indicative peat cultivation functions and indicative peat protection functions in 699 villages.</p><p>Apart from that, West Kalimantan Province also has a mangrove area of 161,557.19 hectares based on the National Mangrove Map which is spread across Bengkayang Regency, North Kayong Regency, Ketapang Regency, Kubu Raya Regency, Mempawah Regency, Sambas Regency and Singkawang City.</p><p>\"This extraordinary natural resource potential is necessary for West Kalimantan Province to protect its natural tropical rain forests which have various important roles. Therefore, we are making optimal efforts by realizing environmental management and forestry development that is sustainable and fair while improving community welfare. ,\" said Sutarmidji.</p><p>Indonesia\'s FOLU Net Sink 2030 Sub National Socialization Activities were carried out to encourage all local governments to prepare work plans in more detail. Socialization at the sub-national level was carried out by the Ministry of Environment and Forestry which was delivered to 10 provinces starting from Aceh, West Sumatra, Riau, South Sumatra, Jambi, Lampung, West Kalimantan, Central Kalimantan, North Kalimantan and East Kalimantan. By delivering this activity, it is hoped that all socialization processes and preparation of sub-national work plans related to Indonesia\'s FOLU Net Sink 2030 can be completed this year.</p>', '/storage/uploads/blog/potret-polisi-hutan-sang-penjaga-rimba-gunung-gede-pangrango-1.jpeg', 'published', 1, 1, 1, NULL, NULL, '2023-09-01 09:37:10', '2023-09-01 16:05:09'),
(6, 1, 'Hari Pohon Sedunia dan Bahaya Penebangan Liar', 'World Tree Day and the Dangers of Illegal Logging', 'hari-pohon-sedunia-dan-bahaya-penebangan-liar-2', 'world-tree-day-and-the-dangers-of-illegal-logging-2', '<p>Hari Pohon Sedunia diperingati setiap tanggal 21 November. Ini merupakan momen untuk mengingatkan soal pentingnya pohon bagi kehidupan.</p><p>Pohon memiliki kemampuan untuk menyerap CO2. Selain itu, pohon juga menyimpan karbon dan menghasilkan oksigen.</p><p>Dalam situs resmi Kabupaten Probolinggo dijelaskan, pohon mempunyai dua peran penting dalam kehidupan. Berikut penjelasannya:</p><p><strong>1. Manfaat secara langsung</strong></p><p>Manfaat secara langsung dari pohon ialah membentuk keindahan dan kenyamanan. Serta menghasilkan bahan-bahan untuk dimanfaatkan.</p><p><strong>2. Manfaat secara tidak langsung</strong></p><p>Manfaat tidak langsung dari pohon adalah menjaga persediaan air di tanah. Selain itu, pohon juga melestarikan fungsi lingkungan dan sebagai pembersih udara.</p><p>Namun hingga kini, masih marak penebangan pohon secara liar. Itu menjadi salah satu faktor utama mengapa Indonesia dilanda krisis iklim di sektor hutan.</p><p>Dampak alam yang ditimbulkan pun beragam. Seperti longsor, banjir, tanah bergerak.</p><h4>Berikut empat dampak penebangan pohon secara liar, dikutip dari laman Pusat Krisis Kemkes:</h4><p><strong>1. Hilangnya kesuburan tanah</strong></p><p>Tanah membutuhkan banyak nutrisi. Nutrisi itu adalah pohon. Ketika pohon ditebang, tanah menyerap langsung sinar matahari. Sehingga tanah menjadi kering dan gersang.</p><p><strong>2. Turunnya sumber daya air</strong></p><p>Pohon memiliki andil dalam menjaga siklus air. Akar pohon menyerap air, lalu diuapkan ke daun. Lalu dilepaskan ke lapisan atmosfer.</p><p><strong>3. Punahnya keanekaragaman hayati</strong></p><p>Akibat tanah yang gundul dan gersang, sekitar 100 spesies hewan turun gunung setiap harinya.</p><p><strong>4. Mengakibatkan banjir</strong></p><p>Hutan berfungsi sebagai penyerap air. Namun jika hutannya gundul, maka tidak ada tempat menyimpan air hujan. Sehingga mengakibatkan banjir.</p>', '<p>World Tree Day is celebrated every November 21. This is a moment to remind you about the importance of trees for life.</p><p>Trees have the ability to absorb CO2. Apart from that, trees also store carbon and produce oxygen.</p><p>On the official Probolinggo Regency website, it is explained that trees have two important roles in life. Here\'s the explanation:</p><p><strong>1. Direct benefits</strong></p><p>The direct benefit of trees is that they create beauty and comfort. As well as producing materials to be used.</p><p><strong>2. Indirect benefits</strong></p><p>An indirect benefit of trees is maintaining water supplies in the soil. Apart from that, trees also preserve environmental functions and act as air purifiers.</p><p>However, until now, illegal cutting of trees is still rampant. This is one of the main factors why Indonesia is hit by a climate crisis in the forest sector.</p><p>The natural impacts caused are also varied. Like landslides, floods, the ground moves.</p><h4>The following are four impacts of illegal felling of trees, quoted from the Ministry of Health\'s Crisis Center page:</h4><p><strong>1. Loss of soil fertility</strong></p><p>Soil needs a lot of nutrients. That nutrition is a tree. When trees are cut down, the soil absorbs direct sunlight. So the land becomes dry and barren.</p><p><strong>2. Decrease in water resources</strong></p><p>Trees play a role in maintaining the water cycle. Tree roots absorb water, which is then evaporated into the leaves. Then released into the atmosphere.</p><p><strong>3. Extinction of biodiversity</strong></p><p>Due to the bare and arid land, around 100 species of animals descend from the mountains every day.</p><p><strong>4. Resulting in flooding</strong></p><p>Forests function as water absorbers. However, if the forest is bare, there is no place to store rainwater. Thus causing flooding.</p>', '/storage/uploads/blog/foto-hijaunya-hutan-kalimantan-yang-jadi-paru-paru-dunia-6_169.jpeg', 'published', 1, 1, 1, NULL, NULL, '2022-09-01 09:37:10', '2023-09-01 16:05:09'),
(7, 1, 'Serba-serbi Phon Jati: Sifat Ekologis, Sebaran dan Manfaat', 'Sundries of Phon Teak: Ecological Properties, Distribution and Benefits', 'serba-serbi-phon-jati-sifat-ekologis-sebaran-dan-manfaat-2', 'sundries-of-phon-teak-ecological-properties-distribution-and-benefits-2', '<p>Pohon jati merupakan pohon yang menghasilkan kayu berkualitas tinggi. Pohon jati ini memiliki kayu yang kuat dan awet untuk membuat furniture. Kayu dari pohon jati merupakan kayu berkualitas tinggi dan dihasilkan dari pohon yang berumur lebih dari 80 tahun.</p><p>Pohon jati dapat tumbuh hingga ratusan tahun, di Indonesia pohon jati terbesar dan tertua yaitu pohon \'Jati Denok\' yang tumbuh di Blora, Jawa Tengah.</p><p>Melansir dari laman Dinas Kehutanan Provinsi Jogjakarta, berikut adalah penjelasan mengenai pohon jati:</p><h4>Serba-serbi Pohon Jati:</h4><h4>1. Sifat Ekologis dan Sebarannya</h4><p>Pohon Jati menyebar luas mulai dari India, Myanmar, Laos, Kamboja, Thailand, Indochina, sampai ke Jawa. Pohon Jati sendiri tumbuh di hutan-hutan gugur, yang menggugurkan daunnya di musim kemarau.</p><p>Pohon Jati dapat bertumbuh di iklim kering yang nyata, namun tidak terlalu panjang. Memiliki curah hujan antara 1.200-3.000 mm per tahun dan dengan intensitas cahaya yang cukup tinggi sepanjang tahun.</p><p>Ketinggian tempat yang optimal adalah antara 0 - 700 m dpl; meski jati bisa tumbuh hingga 1.300 mdpl.</p><p>Di luar Jawa, Pohon Jati dapat ditemukan di Pulau Sulawesi, Pulau Muna, daerah Bima di Pulau Sumbawa, dan Pulau Buru. Pohon jati berkembang juga di daerah Lampung di Pulau Sumatera.</p><p>Sedangkan di Jawa, pohon jati menyebar di pantai utara Jawa, mulai dari Kerawang hingga ke ujung timur pulau ini. Namun, hutan jati paling banyak menyebar di Provinsi Jawa Tengah dan Jawa Timur.</p><p>Di kedua provinsi ini, hutan jati sering terbentuk secara alami akibat iklim muson yang menimbulkan kebakaran hutan secara berkala. Hutan jati yang cukup luas di Jawa terpusat di daerah alas roban Rembang, Blora, Groboragan, dan Pati. Bahkan, jati jawa dengan mutu terbaik dihasilkan di daerah tanah perkapuran Cepu, Kabupaten Blora, Jawa Tengah.</p><h4>2. Jenis Pohon Jati</h4><p>Di masyarakat Jawa terdapat beberapa jenis pohon jati yaitu:</p><p>1. Jati lengo atau jati malam, pohon ini memiliki kayu yang keras, berat, terasa halus apabila diraba dan seperti mengandung minyak. Jati lengo juga berwarna gelap, berbercak, dan bergaris.</p><p>2. Jati sungu, berwarna hitam, padat, dan berat.</p><p>3. Jati werut, yaitu pohon jati yang memiliki kayu yang keras dan serat berombak.</p><p>4. Jati doreng, berkayu sangat keras dengan warna loreng-loreng hitam menyala, sangat indah.</p><p>5. Jati kembang.</p><p>6. Jati kapur, kayunya berwarna keputih-putihan karena mengandung banyak kapur. Kurang kuat dan kurang awet.</p><h4>3. Manfaat Pohon Jati</h4><p>Daun jati dapat dimanfaatkan sebagai pembungkus makanan. Nasi yang dibungkus dengan daun jati akan terasa lebih nikmat. Contohnya adalah nasi jamblang yang terkenal dari Cirebon.</p><p>Selain itu daun jati juga banyak digunakan di Yogyakarta, Jawa Tengah, dan Jawa Timur sebagai pembungkus tempe.</p><p>Berbagai jenis serangga hama jati juga sering dimanfaatkan sebagai bahan makanan orang desa. Dua di antaranya adalah belalang jati (Jw. walang kayu), yang besar berwarna kecoklatan, dan ulat jati (Endoclita). Ulat jati bahkan kerap dianggap makanan istimewa karena lezatnya.</p><p>Demikianlah penjelasan mengenai pohon jati detikers. Apakah bisa dipahami?</p>', '<p>Teak trees are trees that produce high quality wood. This teak tree has strong and durable wood to make furniture. Wood from teak trees is high quality wood and is produced from trees that are more than 80 years old.</p><p>Teak trees can grow for hundreds of years, in Indonesia the largest and oldest teak tree is the \'Jati Denok\' tree which grows in Blora, Central Java.</p><p>Quoting from the Jogjakarta Provincial Forestry Service page, the following is an explanation of teak trees:</p><h4>Teak Tree Miscellaneous:</h4><h4>1. Ecological Characteristics and Distribution</h4><p>Teak trees are widespread from India, Myanmar, Laos, Cambodia, Thailand, Indochina, to Java. Teak trees themselves grow in deciduous forests, shedding their leaves in the dry season.</p><p>Teak trees can grow in real dry climates, but not for too long. It has rainfall between 1,200-3,000 mm per year and quite high light intensity throughout the year.</p><p>The optimal altitude is between 0 - 700 m above sea level; although teak can grow up to 1,300 meters above sea level.</p><p>Outside Java, teak trees can be found on Sulawesi Island, Muna Island, the Bima area on Sumbawa Island, and Buru Island. Teak trees also grow in the Lampung area on Sumatra Island.</p><p>Meanwhile in Java, teak trees spread across the north coast of Java, starting from Kerawang to the eastern tip of the island. However, teak forests are most widespread in the provinces of Central Java and East Java.</p><p>In these two provinces, teak forests are often formed naturally due to the monsoon climate which causes regular forest fires. Teak forests which are quite extensive in Java are concentrated in the robbed areas of Rembang, Blora, Groboragan, and Pati. In fact, the best quality Javanese teak is produced in the Cepu limestone soil area, Blora Regency, Central Java.</p><h4>2. Types of Teak Trees</h4><p>In Javanese society there are several types of teak trees, namely:</p><p>1. Lengo teak or night teak, this tree has wood that is hard, heavy, feels smooth when touched and seems to contain oil. Lengo teak is also dark, spotted and striped.</p><p>2. Sungu teak, black, dense and heavy.</p><p>3. Werut teak, which is a teak tree that has hard wood and wavy fibers.</p><p>4. Doreng teak, very hard wood with bright black stripes, very beautiful.</p><p>5. Teak flower.</p><p>6. Lime teak, the wood is whitish because it contains a lot of lime. Less strong and less durable.</p><h4>3. Benefits of Teak Trees</h4><p>Teak leaves can be used as food wrappers. Rice wrapped in teak leaves will taste better. An example is the famous jamblang rice from Cirebon.</p><p>Apart from that, teak leaves are also widely used in Yogyakarta, Central Java and East Java as tempe wrappers.</p><p>Various types of teak pest insects are also often used as food for villagers. Two of them are the teak locust (Jw. walang kayu), which is large brown in color, and the teak caterpillar (Endoclita). Teak caterpillars are often considered a special food because of their deliciousness.</p><p>That is the explanation of the detikers teak tree. Can it be understood?</p>', '/storage/uploads/blog/melestarikan-pohon-jatijpg-20220120071532.jpg', 'published', 1, 1, 1, NULL, NULL, '2023-09-01 09:37:10', '2023-09-01 16:49:01');
INSERT INTO `blog` (`id`, `category_id`, `title_id`, `title_en`, `slug_id`, `slug_en`, `content_id`, `content_en`, `cover`, `status`, `created_by`, `updated_by`, `approved_by`, `approved_at`, `published_at`, `created_at`, `updated_at`) VALUES
(8, 1, 'KLHK Giatkan Sosialisasi Upaya Turunkan Emisi Gas Rumah Kaca', 'Ministry of Environment and Forestry Intensifies Socialization of Efforts to Reduce Greenhouse Gas Emissions', 'klhk-giatkan-sosialisasi-upaya-turunkan-emisi-gas-rumah-kaca-3', 'ministry-of-environment-and-forestry-intensifies-socialization-of-efforts-to-reduce-greenhouse-gas-emissions-3', '<p>Kementerian Lingkungan Hidup dan Kehutanan menyosialisasikan tujuan dari kegiatan Indonesia\'s Forest and Other Land Use (FOLU) Net Sink 2030 yang diadakan pada tanggal 1 Agustus bertempat di Balai Petitih Kantor Gubernur Kalimantan Barat. Pelaksana Tugas Direktur Jenderal Planlogi Kehutanan dan Tata Lingkungan Ruandha Agung Sugadirman menyampaikan menjaga kelestarian di dalam pencapaian Indonesia\'s FOLU Net Sink 2030 adalah bagian dari kontribusi untuk pengendalian perubahan iklim Indonesia kepada dunia.</p><p>\"Sebagaimana komitmen Bapak Presiden yang telah disampaikan kepada dunia, Indonesia\'s FOLU Net Sink menargetkan tingkat serapan emisi gas rumah kaca dari sektor kehutanan dan penggunaan lahan lainnya pada tahun 2030 akan seimbang atau bahkan lebih tinggi dari tingkat emisi. Sektor kehutanan menyumbang porsi terbesar di dalam target penurunan emisi gas rumah kaca dengan kontribusi sekitar 60% dalam pemenuhan target netral karbon atau net-zero emission,\" ujar Ruandha dalam keterangan tertulis, Rabu (3/8/2022)</p><p>Kegiatan Indonesia\'s FOLU Net Sink 2030 ini terdiri atas rencana operasional sebagai tindak lanjut Peraturan Presiden No 98 Tahun 2021 terkait penyelenggaraan nilai ekonomi karbon serta Keputusan Menteri No 168 Tahun 2022 tentang Indonesia\'s FOLU Net Sink 2030 untuk menekan perubahan iklim. Kementerian LHK juga telah menyusun rencana strategis dan rencana kerja sebagai dasar untuk pelaksanaan di tingkat regional dan daerah. Selain itu, ada target penyerapan emisi GRK yang ingin dicapai pada tahun 2030 adalah sebesar -140 juta ton CO2e.</p><p>Untuk melakukan kegiatan tersebut, Ruandha menjelaskan tiga aksi utama dalam pelaksanaan rencana operasional Indonesia FOLU Net Sink 2030. Dari ketiga aksi utama tersebut ialah pengurangan emisi, pertahankan serapan, dan peningkatan serapan karbon.</p><p>\"Hutan menjadi kunci penting untuk keberhasilan Indonesia\'s FOLU Net Sink 2030. Pengendalian kebakaran hutan dan lahan secara berkelanjutan mampu mencegah terjadinya deforestasi serta pelepasan emisi ke atmosfir. Selain itu hutan juga menjadi tempat bagi keanekaragaman hayati yang penting bagi masa depan serta menopang pembangunan ekonomi dan sosial masyarakat Indonesia. Untuk itu pelestarian hutan kita tingkatkan dan berbagai penambahan tutupan lahan terus kita lakukan bersama masyarakat dalam rangka membangun hutan tropis basah di Indonesia,\" ucap Ruandha.</p><p>Ruandha turut mengakui potensi hutan mangrove yang mempunyai kemampuan 4-5 kali lebih besar di dalam penyerapan karbon dibanding hutan mineral.</p><p>\"Oleh karena itu, Kementerian LHK mengharapkan peran aktif pemerintah daerah, akademisi, alumni, mitra KLHK, LSM, media, serta masyarakat umum untuk mensinergikan dan mengimplementasikan aksi mitigasi pengendalian perubahan iklim melalui potensi yang ada di daerah dengan mengacu pada target penurunan emisi gas rumah kaca nasional,\" kata Ruandha.</p><p>Gubernur Kalimantan Barat, Sutarmidji mengatakan bahwa Provinsi Kalimantan Barat mempunyai potensi besar untuk turut andil dalam menyukseskan agenda nasional tersebut. Berdasarkan SK Menteri Kehutanan Nomor 733 Tahun 2014, Provinsi Kalimantan Barat memiliki luas kawasan hutan mencapai 8.389.600 hektar atau sekitar 57,14% dari total luas wilayah Kalimantan Barat.</p><p>Provinsi ini juga memiliki luas kawasan gambut mencapai 2.793.331 hektar berdasarkan SK Menteri LHK Nomor 130 Tahun 2017. Kawasan gambut tersebut terbagi menjadi indikatif fungsi budidaya gambut dan indikatif fungsi lindung gambut di 699 desa.</p><p>Selain itu, Provinsi Kalimantan Barat juga mempunyai kawasan mangrove mencapai 161.557,19 hektar berdasarkan Peta Mangrove Nasional yang tersebar di Kabupaten Bengkayang, Kabupaten Kayong Utara, Kabupaten Ketapang, Kabupaten Kubu Raya, Kabupaten Mempawah, Kabupaten Sambas dan Kota Singkawang.</p><p>\"Potensi sumber daya alam yang luar biasa ini sudah seharusnya bagi Provinsi Kalimantan Barat untuk menjaga hutan hujan tropis alaminya yang memiliki berbagai peran penting. Oleh karena itu kami berupaya secara optimal melalui perwujudan pengelolaan lingkungan hidup dan pembangunan kehutanan yang berkelanjutan dan berkeadilan sekaligus meningkatkan kesejahteraan masyarakat,\" ucap Sutarmidji.</p><p>Kegiatan Sosialisasi Indonesia\'s FOLU Net Sink 2030 Sub Nasional dilakukan untuk mendorong seluruh pemerintah daerah agar dapat menyusun rencana kerja secara lebih detail. Sosialisasi di tingkat sub nasional dilakukan KLHK yang disampaikan ke 10 provinsi mulai dari Aceh, Sumatera Barat, Riau, Sumatra Selatan, Jambi, Lampung, Kalimantan Barat, Kalimantan Tengah, Kalimantan Utara, dan Kalimantan Timur. Dengan disampaikannya kegiatan ini, diharapkan semua proses sosialisasi dan penyusunan rencana kerja sub nasional terkait Indonesia\'s FOLU Net Sink 2030 dapat terselesaikan pada tahun ini.</p>', '<p>The Ministry of Environment and Forestry socialized the objectives of the Indonesia\'s Forest and Other Land Use (FOLU) Net Sink 2030 activity which was held on August 1 at the Petitih Hall of the West Kalimantan Governor\'s Office. Acting Director General of Forestry Planning and Environmental Management, Ruandha Agung Sugadirman, said that maintaining sustainability in achieving Indonesia\'s FOLU Net Sink 2030 is part of Indonesia\'s contribution to controlling climate change to the world.</p><p>\"As the President\'s commitment has been conveyed to the world, Indonesia\'s FOLU Net Sink targets that the absorption level of greenhouse gas emissions from the forestry sector and other land uses in 2030 will be equal to or even higher than the emission level. The forestry sector contributes the largest portion of the target \"reducing greenhouse gas emissions with a contribution of around 60% in meeting the carbon neutral or net-zero emission target,\" said Ruandha in a written statement, Wednesday (3/8/2022)</p><p>Indonesia\'s FOLU Net Sink 2030 activities consist of operational plans as a follow-up to Presidential Regulation No. 98 of 2021 regarding the implementation of carbon economic value as well as Ministerial Decree No. 168 of 2022 concerning Indonesia\'s FOLU Net Sink 2030 to suppress climate change. The Ministry of Environment and Forestry has also prepared strategic plans and work plans as a basis for implementation at regional and regional levels. Apart from that, there is a GHG emission absorption target that we want to achieve by 2030, which is -140 million tons of CO2e.</p><p>To carry out these activities, Ruandha explained three main actions in implementing the Indonesia FOLU Net Sink 2030 operational plan. Of the three main actions, they are reducing emissions, maintaining absorption, and increasing carbon absorption.</p><p>\"Forests are an important key to the success of Indonesia\'s FOLU Net Sink 2030. Sustainable control of forest and land fires can prevent deforestation and the release of emissions into the atmosphere. Apart from that, forests are also a place for biodiversity which is important for the future and supports economic and social development \"Indonesian people. For this reason, we are increasing forest conservation and we continue to carry out various additions to land cover together with the community in order to build wet tropical forests in Indonesia,\" said Ruandha.</p><p>Ruandha also acknowledged the potential of mangrove forests which have 4-5 times greater capacity for carbon absorption than mineral forests.</p><p>\"Therefore, the Ministry of Environment and Forestry expects the active role of local governments, academics, alumni, KLHK partners, NGOs, media, and the general public to synergize and implement mitigation actions to control climate change through the potential that exists in the regions by referring to the target of reducing house gas emissions. national glass,\" said Ruandha.</p><p>The Governor of West Kalimantan, Sutarmidji, said that West Kalimantan Province has great potential to contribute to the success of this national agenda. Based on the Decree of the Minister of Forestry Number 733 of 2014, West Kalimantan Province has a forest area of 8,389,600 hectares or around 57.14% of the total area of West Kalimantan.</p><p>This province also has a peat area of 2,793,331 hectares based on the Decree of the Minister of Environment and Forestry Number 130 of 2017. The peat area is divided into indicative peat cultivation functions and indicative peat protection functions in 699 villages.</p><p>Apart from that, West Kalimantan Province also has a mangrove area of 161,557.19 hectares based on the National Mangrove Map which is spread across Bengkayang Regency, North Kayong Regency, Ketapang Regency, Kubu Raya Regency, Mempawah Regency, Sambas Regency and Singkawang City.</p><p>\"This extraordinary natural resource potential is necessary for West Kalimantan Province to protect its natural tropical rain forests which have various important roles. Therefore, we are making optimal efforts by realizing environmental management and forestry development that is sustainable and fair while improving community welfare. ,\" said Sutarmidji.</p><p>Indonesia\'s FOLU Net Sink 2030 Sub National Socialization Activities were carried out to encourage all local governments to prepare work plans in more detail. Socialization at the sub-national level was carried out by the Ministry of Environment and Forestry which was delivered to 10 provinces starting from Aceh, West Sumatra, Riau, South Sumatra, Jambi, Lampung, West Kalimantan, Central Kalimantan, North Kalimantan and East Kalimantan. By delivering this activity, it is hoped that all socialization processes and preparation of sub-national work plans related to Indonesia\'s FOLU Net Sink 2030 can be completed this year.</p>', '/storage/uploads/blog/potret-polisi-hutan-sang-penjaga-rimba-gunung-gede-pangrango-1.jpeg', 'published', 1, 1, 1, NULL, NULL, '2023-09-01 09:37:10', '2023-09-01 16:05:09'),
(9, 1, 'Hari Pohon Sedunia dan Bahaya Penebangan Liar', 'World Tree Day and the Dangers of Illegal Logging', 'hari-pohon-sedunia-dan-bahaya-penebangan-liar-3', 'world-tree-day-and-the-dangers-of-illegal-logging-3', '<p>Hari Pohon Sedunia diperingati setiap tanggal 21 November. Ini merupakan momen untuk mengingatkan soal pentingnya pohon bagi kehidupan.</p><p>Pohon memiliki kemampuan untuk menyerap CO2. Selain itu, pohon juga menyimpan karbon dan menghasilkan oksigen.</p><p>Dalam situs resmi Kabupaten Probolinggo dijelaskan, pohon mempunyai dua peran penting dalam kehidupan. Berikut penjelasannya:</p><p><strong>1. Manfaat secara langsung</strong></p><p>Manfaat secara langsung dari pohon ialah membentuk keindahan dan kenyamanan. Serta menghasilkan bahan-bahan untuk dimanfaatkan.</p><p><strong>2. Manfaat secara tidak langsung</strong></p><p>Manfaat tidak langsung dari pohon adalah menjaga persediaan air di tanah. Selain itu, pohon juga melestarikan fungsi lingkungan dan sebagai pembersih udara.</p><p>Namun hingga kini, masih marak penebangan pohon secara liar. Itu menjadi salah satu faktor utama mengapa Indonesia dilanda krisis iklim di sektor hutan.</p><p>Dampak alam yang ditimbulkan pun beragam. Seperti longsor, banjir, tanah bergerak.</p><h4>Berikut empat dampak penebangan pohon secara liar, dikutip dari laman Pusat Krisis Kemkes:</h4><p><strong>1. Hilangnya kesuburan tanah</strong></p><p>Tanah membutuhkan banyak nutrisi. Nutrisi itu adalah pohon. Ketika pohon ditebang, tanah menyerap langsung sinar matahari. Sehingga tanah menjadi kering dan gersang.</p><p><strong>2. Turunnya sumber daya air</strong></p><p>Pohon memiliki andil dalam menjaga siklus air. Akar pohon menyerap air, lalu diuapkan ke daun. Lalu dilepaskan ke lapisan atmosfer.</p><p><strong>3. Punahnya keanekaragaman hayati</strong></p><p>Akibat tanah yang gundul dan gersang, sekitar 100 spesies hewan turun gunung setiap harinya.</p><p><strong>4. Mengakibatkan banjir</strong></p><p>Hutan berfungsi sebagai penyerap air. Namun jika hutannya gundul, maka tidak ada tempat menyimpan air hujan. Sehingga mengakibatkan banjir.</p>', '<p>World Tree Day is celebrated every November 21. This is a moment to remind you about the importance of trees for life.</p><p>Trees have the ability to absorb CO2. Apart from that, trees also store carbon and produce oxygen.</p><p>On the official Probolinggo Regency website, it is explained that trees have two important roles in life. Here\'s the explanation:</p><p><strong>1. Direct benefits</strong></p><p>The direct benefit of trees is that they create beauty and comfort. As well as producing materials to be used.</p><p><strong>2. Indirect benefits</strong></p><p>An indirect benefit of trees is maintaining water supplies in the soil. Apart from that, trees also preserve environmental functions and act as air purifiers.</p><p>However, until now, illegal cutting of trees is still rampant. This is one of the main factors why Indonesia is hit by a climate crisis in the forest sector.</p><p>The natural impacts caused are also varied. Like landslides, floods, the ground moves.</p><h4>The following are four impacts of illegal felling of trees, quoted from the Ministry of Health\'s Crisis Center page:</h4><p><strong>1. Loss of soil fertility</strong></p><p>Soil needs a lot of nutrients. That nutrition is a tree. When trees are cut down, the soil absorbs direct sunlight. So the land becomes dry and barren.</p><p><strong>2. Decrease in water resources</strong></p><p>Trees play a role in maintaining the water cycle. Tree roots absorb water, which is then evaporated into the leaves. Then released into the atmosphere.</p><p><strong>3. Extinction of biodiversity</strong></p><p>Due to the bare and arid land, around 100 species of animals descend from the mountains every day.</p><p><strong>4. Resulting in flooding</strong></p><p>Forests function as water absorbers. However, if the forest is bare, there is no place to store rainwater. Thus causing flooding.</p>', '/storage/uploads/blog/foto-hijaunya-hutan-kalimantan-yang-jadi-paru-paru-dunia-6_169.jpeg', 'published', 1, 1, 1, NULL, NULL, '2022-09-01 09:37:10', '2023-09-01 16:05:09'),
(10, 1, 'Serba-serbi Phon Jati: Sifat Ekologis, Sebaran dan Manfaat', 'Sundries of Phon Teak: Ecological Properties, Distribution and Benefits', 'serba-serbi-phon-jati-sifat-ekologis-sebaran-dan-manfaat-3', 'sundries-of-phon-teak-ecological-properties-distribution-and-benefits-3', '<p>Pohon jati merupakan pohon yang menghasilkan kayu berkualitas tinggi. Pohon jati ini memiliki kayu yang kuat dan awet untuk membuat furniture. Kayu dari pohon jati merupakan kayu berkualitas tinggi dan dihasilkan dari pohon yang berumur lebih dari 80 tahun.</p><p>Pohon jati dapat tumbuh hingga ratusan tahun, di Indonesia pohon jati terbesar dan tertua yaitu pohon \'Jati Denok\' yang tumbuh di Blora, Jawa Tengah.</p><p>Melansir dari laman Dinas Kehutanan Provinsi Jogjakarta, berikut adalah penjelasan mengenai pohon jati:</p><h4>Serba-serbi Pohon Jati:</h4><h4>1. Sifat Ekologis dan Sebarannya</h4><p>Pohon Jati menyebar luas mulai dari India, Myanmar, Laos, Kamboja, Thailand, Indochina, sampai ke Jawa. Pohon Jati sendiri tumbuh di hutan-hutan gugur, yang menggugurkan daunnya di musim kemarau.</p><p>Pohon Jati dapat bertumbuh di iklim kering yang nyata, namun tidak terlalu panjang. Memiliki curah hujan antara 1.200-3.000 mm per tahun dan dengan intensitas cahaya yang cukup tinggi sepanjang tahun.</p><p>Ketinggian tempat yang optimal adalah antara 0 - 700 m dpl; meski jati bisa tumbuh hingga 1.300 mdpl.</p><p>Di luar Jawa, Pohon Jati dapat ditemukan di Pulau Sulawesi, Pulau Muna, daerah Bima di Pulau Sumbawa, dan Pulau Buru. Pohon jati berkembang juga di daerah Lampung di Pulau Sumatera.</p><p>Sedangkan di Jawa, pohon jati menyebar di pantai utara Jawa, mulai dari Kerawang hingga ke ujung timur pulau ini. Namun, hutan jati paling banyak menyebar di Provinsi Jawa Tengah dan Jawa Timur.</p><p>Di kedua provinsi ini, hutan jati sering terbentuk secara alami akibat iklim muson yang menimbulkan kebakaran hutan secara berkala. Hutan jati yang cukup luas di Jawa terpusat di daerah alas roban Rembang, Blora, Groboragan, dan Pati. Bahkan, jati jawa dengan mutu terbaik dihasilkan di daerah tanah perkapuran Cepu, Kabupaten Blora, Jawa Tengah.</p><h4>2. Jenis Pohon Jati</h4><p>Di masyarakat Jawa terdapat beberapa jenis pohon jati yaitu:</p><p>1. Jati lengo atau jati malam, pohon ini memiliki kayu yang keras, berat, terasa halus apabila diraba dan seperti mengandung minyak. Jati lengo juga berwarna gelap, berbercak, dan bergaris.</p><p>2. Jati sungu, berwarna hitam, padat, dan berat.</p><p>3. Jati werut, yaitu pohon jati yang memiliki kayu yang keras dan serat berombak.</p><p>4. Jati doreng, berkayu sangat keras dengan warna loreng-loreng hitam menyala, sangat indah.</p><p>5. Jati kembang.</p><p>6. Jati kapur, kayunya berwarna keputih-putihan karena mengandung banyak kapur. Kurang kuat dan kurang awet.</p><h4>3. Manfaat Pohon Jati</h4><p>Daun jati dapat dimanfaatkan sebagai pembungkus makanan. Nasi yang dibungkus dengan daun jati akan terasa lebih nikmat. Contohnya adalah nasi jamblang yang terkenal dari Cirebon.</p><p>Selain itu daun jati juga banyak digunakan di Yogyakarta, Jawa Tengah, dan Jawa Timur sebagai pembungkus tempe.</p><p>Berbagai jenis serangga hama jati juga sering dimanfaatkan sebagai bahan makanan orang desa. Dua di antaranya adalah belalang jati (Jw. walang kayu), yang besar berwarna kecoklatan, dan ulat jati (Endoclita). Ulat jati bahkan kerap dianggap makanan istimewa karena lezatnya.</p><p>Demikianlah penjelasan mengenai pohon jati detikers. Apakah bisa dipahami?</p>', '<p>Teak trees are trees that produce high quality wood. This teak tree has strong and durable wood to make furniture. Wood from teak trees is high quality wood and is produced from trees that are more than 80 years old.</p><p>Teak trees can grow for hundreds of years, in Indonesia the largest and oldest teak tree is the \'Jati Denok\' tree which grows in Blora, Central Java.</p><p>Quoting from the Jogjakarta Provincial Forestry Service page, the following is an explanation of teak trees:</p><h4>Teak Tree Miscellaneous:</h4><h4>1. Ecological Characteristics and Distribution</h4><p>Teak trees are widespread from India, Myanmar, Laos, Cambodia, Thailand, Indochina, to Java. Teak trees themselves grow in deciduous forests, shedding their leaves in the dry season.</p><p>Teak trees can grow in real dry climates, but not for too long. It has rainfall between 1,200-3,000 mm per year and quite high light intensity throughout the year.</p><p>The optimal altitude is between 0 - 700 m above sea level; although teak can grow up to 1,300 meters above sea level.</p><p>Outside Java, teak trees can be found on Sulawesi Island, Muna Island, the Bima area on Sumbawa Island, and Buru Island. Teak trees also grow in the Lampung area on Sumatra Island.</p><p>Meanwhile in Java, teak trees spread across the north coast of Java, starting from Kerawang to the eastern tip of the island. However, teak forests are most widespread in the provinces of Central Java and East Java.</p><p>In these two provinces, teak forests are often formed naturally due to the monsoon climate which causes regular forest fires. Teak forests which are quite extensive in Java are concentrated in the robbed areas of Rembang, Blora, Groboragan, and Pati. In fact, the best quality Javanese teak is produced in the Cepu limestone soil area, Blora Regency, Central Java.</p><h4>2. Types of Teak Trees</h4><p>In Javanese society there are several types of teak trees, namely:</p><p>1. Lengo teak or night teak, this tree has wood that is hard, heavy, feels smooth when touched and seems to contain oil. Lengo teak is also dark, spotted and striped.</p><p>2. Sungu teak, black, dense and heavy.</p><p>3. Werut teak, which is a teak tree that has hard wood and wavy fibers.</p><p>4. Doreng teak, very hard wood with bright black stripes, very beautiful.</p><p>5. Teak flower.</p><p>6. Lime teak, the wood is whitish because it contains a lot of lime. Less strong and less durable.</p><h4>3. Benefits of Teak Trees</h4><p>Teak leaves can be used as food wrappers. Rice wrapped in teak leaves will taste better. An example is the famous jamblang rice from Cirebon.</p><p>Apart from that, teak leaves are also widely used in Yogyakarta, Central Java and East Java as tempe wrappers.</p><p>Various types of teak pest insects are also often used as food for villagers. Two of them are the teak locust (Jw. walang kayu), which is large brown in color, and the teak caterpillar (Endoclita). Teak caterpillars are often considered a special food because of their deliciousness.</p><p>That is the explanation of the detikers teak tree. Can it be understood?</p>', '/storage/uploads/blog/melestarikan-pohon-jatijpg-20220120071532.jpg', 'published', 1, 1, 1, NULL, NULL, '2023-09-01 09:37:10', '2023-09-01 16:49:01'),
(11, 1, 'KLHK Giatkan Sosialisasi Upaya Turunkan Emisi Gas Rumah Kaca', 'Ministry of Environment and Forestry Intensifies Socialization of Efforts to Reduce Greenhouse Gas Emissions', 'klhk-giatkan-sosialisasi-upaya-turunkan-emisi-gas-rumah-kaca-4', 'ministry-of-environment-and-forestry-intensifies-socialization-of-efforts-to-reduce-greenhouse-gas-emissions-4', '<p>Kementerian Lingkungan Hidup dan Kehutanan menyosialisasikan tujuan dari kegiatan Indonesia\'s Forest and Other Land Use (FOLU) Net Sink 2030 yang diadakan pada tanggal 1 Agustus bertempat di Balai Petitih Kantor Gubernur Kalimantan Barat. Pelaksana Tugas Direktur Jenderal Planlogi Kehutanan dan Tata Lingkungan Ruandha Agung Sugadirman menyampaikan menjaga kelestarian di dalam pencapaian Indonesia\'s FOLU Net Sink 2030 adalah bagian dari kontribusi untuk pengendalian perubahan iklim Indonesia kepada dunia.</p><p>\"Sebagaimana komitmen Bapak Presiden yang telah disampaikan kepada dunia, Indonesia\'s FOLU Net Sink menargetkan tingkat serapan emisi gas rumah kaca dari sektor kehutanan dan penggunaan lahan lainnya pada tahun 2030 akan seimbang atau bahkan lebih tinggi dari tingkat emisi. Sektor kehutanan menyumbang porsi terbesar di dalam target penurunan emisi gas rumah kaca dengan kontribusi sekitar 60% dalam pemenuhan target netral karbon atau net-zero emission,\" ujar Ruandha dalam keterangan tertulis, Rabu (3/8/2022)</p><p>Kegiatan Indonesia\'s FOLU Net Sink 2030 ini terdiri atas rencana operasional sebagai tindak lanjut Peraturan Presiden No 98 Tahun 2021 terkait penyelenggaraan nilai ekonomi karbon serta Keputusan Menteri No 168 Tahun 2022 tentang Indonesia\'s FOLU Net Sink 2030 untuk menekan perubahan iklim. Kementerian LHK juga telah menyusun rencana strategis dan rencana kerja sebagai dasar untuk pelaksanaan di tingkat regional dan daerah. Selain itu, ada target penyerapan emisi GRK yang ingin dicapai pada tahun 2030 adalah sebesar -140 juta ton CO2e.</p><p>Untuk melakukan kegiatan tersebut, Ruandha menjelaskan tiga aksi utama dalam pelaksanaan rencana operasional Indonesia FOLU Net Sink 2030. Dari ketiga aksi utama tersebut ialah pengurangan emisi, pertahankan serapan, dan peningkatan serapan karbon.</p><p>\"Hutan menjadi kunci penting untuk keberhasilan Indonesia\'s FOLU Net Sink 2030. Pengendalian kebakaran hutan dan lahan secara berkelanjutan mampu mencegah terjadinya deforestasi serta pelepasan emisi ke atmosfir. Selain itu hutan juga menjadi tempat bagi keanekaragaman hayati yang penting bagi masa depan serta menopang pembangunan ekonomi dan sosial masyarakat Indonesia. Untuk itu pelestarian hutan kita tingkatkan dan berbagai penambahan tutupan lahan terus kita lakukan bersama masyarakat dalam rangka membangun hutan tropis basah di Indonesia,\" ucap Ruandha.</p><p>Ruandha turut mengakui potensi hutan mangrove yang mempunyai kemampuan 4-5 kali lebih besar di dalam penyerapan karbon dibanding hutan mineral.</p><p>\"Oleh karena itu, Kementerian LHK mengharapkan peran aktif pemerintah daerah, akademisi, alumni, mitra KLHK, LSM, media, serta masyarakat umum untuk mensinergikan dan mengimplementasikan aksi mitigasi pengendalian perubahan iklim melalui potensi yang ada di daerah dengan mengacu pada target penurunan emisi gas rumah kaca nasional,\" kata Ruandha.</p><p>Gubernur Kalimantan Barat, Sutarmidji mengatakan bahwa Provinsi Kalimantan Barat mempunyai potensi besar untuk turut andil dalam menyukseskan agenda nasional tersebut. Berdasarkan SK Menteri Kehutanan Nomor 733 Tahun 2014, Provinsi Kalimantan Barat memiliki luas kawasan hutan mencapai 8.389.600 hektar atau sekitar 57,14% dari total luas wilayah Kalimantan Barat.</p><p>Provinsi ini juga memiliki luas kawasan gambut mencapai 2.793.331 hektar berdasarkan SK Menteri LHK Nomor 130 Tahun 2017. Kawasan gambut tersebut terbagi menjadi indikatif fungsi budidaya gambut dan indikatif fungsi lindung gambut di 699 desa.</p><p>Selain itu, Provinsi Kalimantan Barat juga mempunyai kawasan mangrove mencapai 161.557,19 hektar berdasarkan Peta Mangrove Nasional yang tersebar di Kabupaten Bengkayang, Kabupaten Kayong Utara, Kabupaten Ketapang, Kabupaten Kubu Raya, Kabupaten Mempawah, Kabupaten Sambas dan Kota Singkawang.</p><p>\"Potensi sumber daya alam yang luar biasa ini sudah seharusnya bagi Provinsi Kalimantan Barat untuk menjaga hutan hujan tropis alaminya yang memiliki berbagai peran penting. Oleh karena itu kami berupaya secara optimal melalui perwujudan pengelolaan lingkungan hidup dan pembangunan kehutanan yang berkelanjutan dan berkeadilan sekaligus meningkatkan kesejahteraan masyarakat,\" ucap Sutarmidji.</p><p>Kegiatan Sosialisasi Indonesia\'s FOLU Net Sink 2030 Sub Nasional dilakukan untuk mendorong seluruh pemerintah daerah agar dapat menyusun rencana kerja secara lebih detail. Sosialisasi di tingkat sub nasional dilakukan KLHK yang disampaikan ke 10 provinsi mulai dari Aceh, Sumatera Barat, Riau, Sumatra Selatan, Jambi, Lampung, Kalimantan Barat, Kalimantan Tengah, Kalimantan Utara, dan Kalimantan Timur. Dengan disampaikannya kegiatan ini, diharapkan semua proses sosialisasi dan penyusunan rencana kerja sub nasional terkait Indonesia\'s FOLU Net Sink 2030 dapat terselesaikan pada tahun ini.</p>', '<p>The Ministry of Environment and Forestry socialized the objectives of the Indonesia\'s Forest and Other Land Use (FOLU) Net Sink 2030 activity which was held on August 1 at the Petitih Hall of the West Kalimantan Governor\'s Office. Acting Director General of Forestry Planning and Environmental Management, Ruandha Agung Sugadirman, said that maintaining sustainability in achieving Indonesia\'s FOLU Net Sink 2030 is part of Indonesia\'s contribution to controlling climate change to the world.</p><p>\"As the President\'s commitment has been conveyed to the world, Indonesia\'s FOLU Net Sink targets that the absorption level of greenhouse gas emissions from the forestry sector and other land uses in 2030 will be equal to or even higher than the emission level. The forestry sector contributes the largest portion of the target \"reducing greenhouse gas emissions with a contribution of around 60% in meeting the carbon neutral or net-zero emission target,\" said Ruandha in a written statement, Wednesday (3/8/2022)</p><p>Indonesia\'s FOLU Net Sink 2030 activities consist of operational plans as a follow-up to Presidential Regulation No. 98 of 2021 regarding the implementation of carbon economic value as well as Ministerial Decree No. 168 of 2022 concerning Indonesia\'s FOLU Net Sink 2030 to suppress climate change. The Ministry of Environment and Forestry has also prepared strategic plans and work plans as a basis for implementation at regional and regional levels. Apart from that, there is a GHG emission absorption target that we want to achieve by 2030, which is -140 million tons of CO2e.</p><p>To carry out these activities, Ruandha explained three main actions in implementing the Indonesia FOLU Net Sink 2030 operational plan. Of the three main actions, they are reducing emissions, maintaining absorption, and increasing carbon absorption.</p><p>\"Forests are an important key to the success of Indonesia\'s FOLU Net Sink 2030. Sustainable control of forest and land fires can prevent deforestation and the release of emissions into the atmosphere. Apart from that, forests are also a place for biodiversity which is important for the future and supports economic and social development \"Indonesian people. For this reason, we are increasing forest conservation and we continue to carry out various additions to land cover together with the community in order to build wet tropical forests in Indonesia,\" said Ruandha.</p><p>Ruandha also acknowledged the potential of mangrove forests which have 4-5 times greater capacity for carbon absorption than mineral forests.</p><p>\"Therefore, the Ministry of Environment and Forestry expects the active role of local governments, academics, alumni, KLHK partners, NGOs, media, and the general public to synergize and implement mitigation actions to control climate change through the potential that exists in the regions by referring to the target of reducing house gas emissions. national glass,\" said Ruandha.</p><p>The Governor of West Kalimantan, Sutarmidji, said that West Kalimantan Province has great potential to contribute to the success of this national agenda. Based on the Decree of the Minister of Forestry Number 733 of 2014, West Kalimantan Province has a forest area of 8,389,600 hectares or around 57.14% of the total area of West Kalimantan.</p><p>This province also has a peat area of 2,793,331 hectares based on the Decree of the Minister of Environment and Forestry Number 130 of 2017. The peat area is divided into indicative peat cultivation functions and indicative peat protection functions in 699 villages.</p><p>Apart from that, West Kalimantan Province also has a mangrove area of 161,557.19 hectares based on the National Mangrove Map which is spread across Bengkayang Regency, North Kayong Regency, Ketapang Regency, Kubu Raya Regency, Mempawah Regency, Sambas Regency and Singkawang City.</p><p>\"This extraordinary natural resource potential is necessary for West Kalimantan Province to protect its natural tropical rain forests which have various important roles. Therefore, we are making optimal efforts by realizing environmental management and forestry development that is sustainable and fair while improving community welfare. ,\" said Sutarmidji.</p><p>Indonesia\'s FOLU Net Sink 2030 Sub National Socialization Activities were carried out to encourage all local governments to prepare work plans in more detail. Socialization at the sub-national level was carried out by the Ministry of Environment and Forestry which was delivered to 10 provinces starting from Aceh, West Sumatra, Riau, South Sumatra, Jambi, Lampung, West Kalimantan, Central Kalimantan, North Kalimantan and East Kalimantan. By delivering this activity, it is hoped that all socialization processes and preparation of sub-national work plans related to Indonesia\'s FOLU Net Sink 2030 can be completed this year.</p>', '/storage/uploads/blog/potret-polisi-hutan-sang-penjaga-rimba-gunung-gede-pangrango-1.jpeg', 'published', 1, 1, 1, NULL, NULL, '2023-09-01 09:37:10', '2023-09-01 16:05:09'),
(12, 1, 'Hari Pohon Sedunia dan Bahaya Penebangan Liar', 'World Tree Day and the Dangers of Illegal Logging', 'hari-pohon-sedunia-dan-bahaya-penebangan-liar-4', 'world-tree-day-and-the-dangers-of-illegal-logging-4', '<p>Hari Pohon Sedunia diperingati setiap tanggal 21 November. Ini merupakan momen untuk mengingatkan soal pentingnya pohon bagi kehidupan.</p><p>Pohon memiliki kemampuan untuk menyerap CO2. Selain itu, pohon juga menyimpan karbon dan menghasilkan oksigen.</p><p>Dalam situs resmi Kabupaten Probolinggo dijelaskan, pohon mempunyai dua peran penting dalam kehidupan. Berikut penjelasannya:</p><p><strong>1. Manfaat secara langsung</strong></p><p>Manfaat secara langsung dari pohon ialah membentuk keindahan dan kenyamanan. Serta menghasilkan bahan-bahan untuk dimanfaatkan.</p><p><strong>2. Manfaat secara tidak langsung</strong></p><p>Manfaat tidak langsung dari pohon adalah menjaga persediaan air di tanah. Selain itu, pohon juga melestarikan fungsi lingkungan dan sebagai pembersih udara.</p><p>Namun hingga kini, masih marak penebangan pohon secara liar. Itu menjadi salah satu faktor utama mengapa Indonesia dilanda krisis iklim di sektor hutan.</p><p>Dampak alam yang ditimbulkan pun beragam. Seperti longsor, banjir, tanah bergerak.</p><h4>Berikut empat dampak penebangan pohon secara liar, dikutip dari laman Pusat Krisis Kemkes:</h4><p><strong>1. Hilangnya kesuburan tanah</strong></p><p>Tanah membutuhkan banyak nutrisi. Nutrisi itu adalah pohon. Ketika pohon ditebang, tanah menyerap langsung sinar matahari. Sehingga tanah menjadi kering dan gersang.</p><p><strong>2. Turunnya sumber daya air</strong></p><p>Pohon memiliki andil dalam menjaga siklus air. Akar pohon menyerap air, lalu diuapkan ke daun. Lalu dilepaskan ke lapisan atmosfer.</p><p><strong>3. Punahnya keanekaragaman hayati</strong></p><p>Akibat tanah yang gundul dan gersang, sekitar 100 spesies hewan turun gunung setiap harinya.</p><p><strong>4. Mengakibatkan banjir</strong></p><p>Hutan berfungsi sebagai penyerap air. Namun jika hutannya gundul, maka tidak ada tempat menyimpan air hujan. Sehingga mengakibatkan banjir.</p>', '<p>World Tree Day is celebrated every November 21. This is a moment to remind you about the importance of trees for life.</p><p>Trees have the ability to absorb CO2. Apart from that, trees also store carbon and produce oxygen.</p><p>On the official Probolinggo Regency website, it is explained that trees have two important roles in life. Here\'s the explanation:</p><p><strong>1. Direct benefits</strong></p><p>The direct benefit of trees is that they create beauty and comfort. As well as producing materials to be used.</p><p><strong>2. Indirect benefits</strong></p><p>An indirect benefit of trees is maintaining water supplies in the soil. Apart from that, trees also preserve environmental functions and act as air purifiers.</p><p>However, until now, illegal cutting of trees is still rampant. This is one of the main factors why Indonesia is hit by a climate crisis in the forest sector.</p><p>The natural impacts caused are also varied. Like landslides, floods, the ground moves.</p><h4>The following are four impacts of illegal felling of trees, quoted from the Ministry of Health\'s Crisis Center page:</h4><p><strong>1. Loss of soil fertility</strong></p><p>Soil needs a lot of nutrients. That nutrition is a tree. When trees are cut down, the soil absorbs direct sunlight. So the land becomes dry and barren.</p><p><strong>2. Decrease in water resources</strong></p><p>Trees play a role in maintaining the water cycle. Tree roots absorb water, which is then evaporated into the leaves. Then released into the atmosphere.</p><p><strong>3. Extinction of biodiversity</strong></p><p>Due to the bare and arid land, around 100 species of animals descend from the mountains every day.</p><p><strong>4. Resulting in flooding</strong></p><p>Forests function as water absorbers. However, if the forest is bare, there is no place to store rainwater. Thus causing flooding.</p>', '/storage/uploads/blog/foto-hijaunya-hutan-kalimantan-yang-jadi-paru-paru-dunia-6_169.jpeg', 'published', 1, 1, 1, NULL, NULL, '2022-09-01 09:37:10', '2023-09-01 16:05:09'),
(13, 1, 'Serba-serbi Phon Jati: Sifat Ekologis, Sebaran dan Manfaat edit', 'Sundries of Phon Teak: Ecological Properties, Distribution and Benefits', 'serba-serbi-phon-jati-sifat-ekologis-sebaran-dan-manfaat-4', 'sundries-of-phon-teak-ecological-properties-distribution-and-benefits-4', '<p>Pohon jati merupakan pohon yang menghasilkan kayu berkualitas tinggi. Pohon jati ini memiliki kayu yang kuat dan awet untuk membuat furniture. Kayu dari pohon jati merupakan kayu berkualitas tinggi dan dihasilkan dari pohon yang berumur lebih dari 80 tahun.</p><p>Pohon jati dapat tumbuh hingga ratusan tahun, di Indonesia pohon jati terbesar dan tertua yaitu pohon \'Jati Denok\' yang tumbuh di Blora, Jawa Tengah.</p><p>Melansir dari laman Dinas Kehutanan Provinsi Jogjakarta, berikut adalah penjelasan mengenai pohon jati:</p><h4>Serba-serbi Pohon Jati:</h4><h4>1. Sifat Ekologis dan Sebarannya</h4><p>Pohon Jati menyebar luas mulai dari India, Myanmar, Laos, Kamboja, Thailand, Indochina, sampai ke Jawa. Pohon Jati sendiri tumbuh di hutan-hutan gugur, yang menggugurkan daunnya di musim kemarau.</p><p>Pohon Jati dapat bertumbuh di iklim kering yang nyata, namun tidak terlalu panjang. Memiliki curah hujan antara 1.200-3.000 mm per tahun dan dengan intensitas cahaya yang cukup tinggi sepanjang tahun.</p><p>Ketinggian tempat yang optimal adalah antara 0 - 700 m dpl; meski jati bisa tumbuh hingga 1.300 mdpl.</p><p>Di luar Jawa, Pohon Jati dapat ditemukan di Pulau Sulawesi, Pulau Muna, daerah Bima di Pulau Sumbawa, dan Pulau Buru. Pohon jati berkembang juga di daerah Lampung di Pulau Sumatera.</p><p>Sedangkan di Jawa, pohon jati menyebar di pantai utara Jawa, mulai dari Kerawang hingga ke ujung timur pulau ini. Namun, hutan jati paling banyak menyebar di Provinsi Jawa Tengah dan Jawa Timur.</p><p>Di kedua provinsi ini, hutan jati sering terbentuk secara alami akibat iklim muson yang menimbulkan kebakaran hutan secara berkala. Hutan jati yang cukup luas di Jawa terpusat di daerah alas roban Rembang, Blora, Groboragan, dan Pati. Bahkan, jati jawa dengan mutu terbaik dihasilkan di daerah tanah perkapuran Cepu, Kabupaten Blora, Jawa Tengah.</p><h4>2. Jenis Pohon Jati</h4><p>Di masyarakat Jawa terdapat beberapa jenis pohon jati yaitu:</p><p>1. Jati lengo atau jati malam, pohon ini memiliki kayu yang keras, berat, terasa halus apabila diraba dan seperti mengandung minyak. Jati lengo juga berwarna gelap, berbercak, dan bergaris.</p><p>2. Jati sungu, berwarna hitam, padat, dan berat.</p><p>3. Jati werut, yaitu pohon jati yang memiliki kayu yang keras dan serat berombak.</p><p>4. Jati doreng, berkayu sangat keras dengan warna loreng-loreng hitam menyala, sangat indah.</p><p>5. Jati kembang.</p><p>6. Jati kapur, kayunya berwarna keputih-putihan karena mengandung banyak kapur. Kurang kuat dan kurang awet.</p><h4>3. Manfaat Pohon Jati</h4><p>Daun jati dapat dimanfaatkan sebagai pembungkus makanan. Nasi yang dibungkus dengan daun jati akan terasa lebih nikmat. Contohnya adalah nasi jamblang yang terkenal dari Cirebon.</p><p>Selain itu daun jati juga banyak digunakan di Yogyakarta, Jawa Tengah, dan Jawa Timur sebagai pembungkus tempe.</p><p>Berbagai jenis serangga hama jati juga sering dimanfaatkan sebagai bahan makanan orang desa. Dua di antaranya adalah belalang jati (Jw. walang kayu), yang besar berwarna kecoklatan, dan ulat jati (Endoclita). Ulat jati bahkan kerap dianggap makanan istimewa karena lezatnya.</p><p>Demikianlah penjelasan mengenai pohon jati detikers. Apakah bisa dipahami?</p>', '<p>Teak trees are trees that produce high quality wood. This teak tree has strong and durable wood to make furniture. Wood from teak trees is high quality wood and is produced from trees that are more than 80 years old.</p><p>Teak trees can grow for hundreds of years, in Indonesia the largest and oldest teak tree is the \'Jati Denok\' tree which grows in Blora, Central Java.</p><p>Quoting from the Jogjakarta Provincial Forestry Service page, the following is an explanation of teak trees:</p><h4>Teak Tree Miscellaneous:</h4><h4>1. Ecological Characteristics and Distribution</h4><p>Teak trees are widespread from India, Myanmar, Laos, Cambodia, Thailand, Indochina, to Java. Teak trees themselves grow in deciduous forests, shedding their leaves in the dry season.</p><p>Teak trees can grow in real dry climates, but not for too long. It has rainfall between 1,200-3,000 mm per year and quite high light intensity throughout the year.</p><p>The optimal altitude is between 0 - 700 m above sea level; although teak can grow up to 1,300 meters above sea level.</p><p>Outside Java, teak trees can be found on Sulawesi Island, Muna Island, the Bima area on Sumbawa Island, and Buru Island. Teak trees also grow in the Lampung area on Sumatra Island.</p><p>Meanwhile in Java, teak trees spread across the north coast of Java, starting from Kerawang to the eastern tip of the island. However, teak forests are most widespread in the provinces of Central Java and East Java.</p><p>In these two provinces, teak forests are often formed naturally due to the monsoon climate which causes regular forest fires. Teak forests which are quite extensive in Java are concentrated in the robbed areas of Rembang, Blora, Groboragan, and Pati. In fact, the best quality Javanese teak is produced in the Cepu limestone soil area, Blora Regency, Central Java.</p><h4>2. Types of Teak Trees</h4><p>In Javanese society there are several types of teak trees, namely:</p><p>1. Lengo teak or night teak, this tree has wood that is hard, heavy, feels smooth when touched and seems to contain oil. Lengo teak is also dark, spotted and striped.</p><p>2. Sungu teak, black, dense and heavy.</p><p>3. Werut teak, which is a teak tree that has hard wood and wavy fibers.</p><p>4. Doreng teak, very hard wood with bright black stripes, very beautiful.</p><p>5. Teak flower.</p><p>6. Lime teak, the wood is whitish because it contains a lot of lime. Less strong and less durable.</p><h4>3. Benefits of Teak Trees</h4><p>Teak leaves can be used as food wrappers. Rice wrapped in teak leaves will taste better. An example is the famous jamblang rice from Cirebon.</p><p>Apart from that, teak leaves are also widely used in Yogyakarta, Central Java and East Java as tempe wrappers.</p><p>Various types of teak pest insects are also often used as food for villagers. Two of them are the teak locust (Jw. walang kayu), which is large brown in color, and the teak caterpillar (Endoclita). Teak caterpillars are often considered a special food because of their deliciousness.</p><p>That is the explanation of the detikers teak tree. Can it be understood?</p>', '/storage/uploads/blog/melestarikan-pohon-jatijpg-20220120071532.jpg', 'published', 1, NULL, NULL, NULL, NULL, '2023-09-01 09:37:10', '2023-09-19 19:30:37'),
(14, 3, 'blabla', '111', '1111', '111', '<p>blabla</p>', '<p>111</p>', '/storage/uploads/blog/ZTVlMTlhZGUtYWJiNC00N2NlLThhMDItMTJiMDM2YTU2NWUz.jpeg', 'editing', 1, NULL, NULL, NULL, NULL, '2024-06-27 13:46:24', '2024-12-17 12:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` bigint(20) NOT NULL,
  `blog_id` bigint(20) DEFAULT NULL,
  `name_id` varchar(30) NOT NULL,
  `name_en` varchar(30) NOT NULL,
  `slug_id` text NOT NULL,
  `slug_en` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `blog_id`, `name_id`, `name_en`, `slug_id`, `slug_en`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'informasi', 'information', 'informasi', 'information', 1, '2023-08-13 15:43:25', '2023-08-22 17:39:57'),
(2, NULL, 'prestasi', 'achievements', 'prestasi', 'achievements', 1, '2023-08-21 03:48:46', '2023-08-22 17:39:57'),
(3, NULL, 'teknologi', 'technology', 'teknologi', 'technology', 1, '2023-08-21 03:48:46', '2023-08-22 17:39:57'),
(4, NULL, 'riset', 'research', 'riset', 'research', 1, '2023-08-21 03:48:46', '2023-08-22 17:39:57'),
(5, NULL, 'aktifitas', 'activity', 'aktifitas', 'activity', 1, '2023-08-21 03:48:46', '2023-08-22 17:39:57'),
(6, NULL, 'acara', 'programs', 'acara', 'programs', 1, '2023-08-21 03:48:46', '2023-08-22 17:39:57'),
(7, NULL, 'penghargaan', 'awards', 'penghargaan', 'awards', 1, '2023-08-21 03:48:46', '2023-08-22 17:39:57'),
(8, NULL, 'Konservasi', 'Concervation', 'konservasi', 'concervation', 0, '2024-06-29 02:06:25', '2024-06-29 09:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `blog_history`
--

CREATE TABLE `blog_history` (
  `id` bigint(20) NOT NULL,
  `blog_id` bigint(20) DEFAULT NULL,
  `title_id` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `status` enum('review','rejected') DEFAULT NULL COMMENT 'review and rejected only',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_visitor`
--

CREATE TABLE `blog_visitor` (
  `id` bigint(20) NOT NULL,
  `blog_id` bigint(20) DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `ua` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `name_id` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_id` text DEFAULT NULL,
  `description_en` text NOT NULL,
  `showcase` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `admin_id`, `name_id`, `name_en`, `description_id`, `description_en`, `showcase`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'PROPER (Program Penilaian Peringkat Kinerja Perusahaan) peringkat HIJAU', 'PROPER (Company Performance Rating Program) GREEN rating', 'PT. Itci Hutani Manunggal telah memperoleh sertifikat PROPER “Program Penilaian Peringkat Kinerja Perusahaan” dalam pengelolaan Lingkungan hidup dari Gubernur Kalimantan Timur dengan Peringkat Kinerja “HIJAU” pada tahun 2022 – 2023.', 'PT. Itci Hutani Manunggal has received a PROPER certificate \"Company Performance Rating Assessment Program\" in environmental management from the Governor of East Kalimantan with a \"GREEN\" Performance Rating in 2022 - 2023.', 0, 1, '2023-09-04 01:02:54', '2023-09-04 01:02:54'),
(2, NULL, 'PROPER (Program Penilaian Peringkat Kinerja Perusahaan) peringkat EMAS', 'PROPER (Company Performance Rating Program) GOLD rating', 'PT. Itci Hutani Manunggal telah memperoleh sertifikat PROPER “Program Penilaian Peringkat Kinerja Perusahaan” dalam pengelolaan Lingkungan hidup dari Gubernur Kalimantan Timur dengan Peringkat Kinerja “EMAS” pada tahun 2019 – 2020.', 'PT. Itci Hutani Manunggal has received a PROPER certificate \"Company Performance Rating Program\" in environmental management from the Governor of East Kalimantan with a \"GOLD\" Performance Rating in 2019 - 2020.', 0, 1, '2023-09-04 01:17:18', '2023-09-04 01:17:18'),
(3, NULL, 'Pengelolaan Hutan Produksi Lestari (PHPL) dan Verifikasi Legalitas Kayu (VLK)', 'Sustainable Production Forest Management (PHPL) and Timber Legality Verification (VLK)', 'Pengelolaan Hutan Produksi Lestari (PHPL) dan Verifikasi Legalitas Kayu (VLK)||\r\nTahun 2020 PT. Itci Hutani Manunggal telah melakukan Re-Sertifikasi PHPL – VLK dengan Nilai Akhir Re-Sertifikasi Kinerja dengan total nilai kinerja indikator yang dicapai adalah “89%”, tidak terdapat verifier dominan yang bernilai buruk dan “Memenuhi” semua norma penilaian untuk setiap verifier yang diterapkan pada VLK, sehingga dinyatakan Lulus dengan predikat “BAIK”. Sertifikat berlaku sampai dengan Desember 2025.', 'Sustainable Production Forest Management (PHPL) and Timber Legality Verification (VLK)||\r\nIn 2020 PT. Itci Hutani Manunggal has carried out PHPL – VLK Re-Certification with the Final Performance Re-Certification Score with the total indicator performance score achieved being \"89%\", there are no dominant verifiers with bad grades and \"Meets\" all assessment norms for each verifier applied on VLK, so it is declared Passed with the predicate \"GOOD\". The certificate is valid until December 2025.', 0, 1, '2023-09-04 01:19:36', '2023-09-04 01:19:36'),
(4, NULL, 'Kesehatan dan Keselamatan Kerja (SMK3)', 'Occupational Health and Safety (SMK3)', 'PT. Itci Hutani Manunggal berkomitmen dalam penerapan di bidang Kesehatan dan Keselamatan Kerja (K3), hal ini dibuktikan dengan diraihnya sertifikat SMK3 dari Kementerian Tenaga Kerja pada bulan Maret 2019, sertifikat SMK3 ini berlaku sampai Maret 2022.', 'PT. Itci Hutani Manunggal is committed to implementing it in the Occupational Health and Safety (K3) sector, this is evidenced by the fact that it received an SMK3 certificate from the Ministry of Manpower in March 2019, this SMK3 certificate is valid until March 2022.', 0, 1, '2023-09-04 01:20:42', '2023-09-04 01:20:42'),
(5, NULL, 'HIGH CONSERVATION VALUE FOREST (HCVF)', 'HIGH CONSERVATION VALUE FOREST (HCVF)', 'insert description', 'insert description', 0, 1, '2023-09-04 01:30:03', '2023-09-04 01:30:03'),
(6, NULL, 'ENVIRONMENTAL MANAGEMENT SYSTEM (EMS) ISO 14001:2015', 'ENVIRONMENTAL MANAGEMENT SYSTEM (EMS) ISO 14001:2015', 'insert description', 'insert description', 0, 1, '2023-09-04 01:31:42', '2023-09-04 01:31:42'),
(7, NULL, 'OCCUPATIONAL HEALTH AND SAFETY MANAGEMENT SYSTEMS (OHSMS ISO 45001:2018)', 'OCCUPATIONAL HEALTH AND SAFETY MANAGEMENT SYSTEMS (OHSMS ISO 45001:2018)', 'insert description', 'insert description', 0, 1, '2023-09-04 01:32:19', '2023-09-04 01:32:19'),
(8, NULL, 'Programme for the Endorsement of Forest Certification - Indonesian Forestry Certification Cooperation', 'Programme for the Endorsement of Forest Certification - Indonesian Forestry Certification Cooperation', 'insert description', 'insert description', 0, 1, '2023-09-04 01:34:22', '2023-09-04 01:34:22'),
(9, NULL, 'PROPER (Program Penilaian Peringkat Kinerja Perusahaan) Peringkat HIJAU 2023-2024', 'PROPER (Corporate Performance Rating Assessment Program) GREEN Rating 2023-2024', 'PROPER (Corporate Performance Rating Assessment Program) GREEN Rating 2023-2024', 'PROPER (Corporate Performance Rating Assessment Program) GREEN Rating 2023-2024', 0, 0, '2024-06-27 13:09:57', '2024-09-02 08:49:34'),
(10, NULL, 'PROPER (Program Penilaian Peringkat Kinerja Perusahaan) peringkat HIJAU', 'PROPER (Company Performance Rating Program) GREEN rating', 'PT. Itci Hutani Manunggal telah memperoleh sertifikat PROPER “Program Penilaian Peringkat Kinerja Perusahaan” dalam pengelolaan Lingkungan hidup dari Gubernur Kalimantan Timur dengan Peringkat Kinerja “HIJAU” pada tahun 2023 – 2024.', 'PT. Itci Hutani Manunggal has received a PROPER certificate \"Company Performance Rating Assessment Program\" in environmental management from the Governor of East Kalimantan with a \"GREEN\" Performance Rating in 2023 - 2024.', 0, 0, '2024-09-02 01:46:58', '2024-09-02 08:50:07'),
(11, NULL, 'PROPER (Program Penilaian Peringkat Kinerja Perusahaan) peringkat HIJAU', 'PROPER (Company Performance Rating Program) GREEN rating', 'PT. Itci Hutani Manunggal telah memperoleh sertifikat PROPER “Program Penilaian Peringkat Kinerja Perusahaan” dalam pengelolaan Lingkungan hidup dari Gubernur Kalimantan Timur dengan Peringkat Kinerja “HIJAU” pada tahun 2023 – 2024.', 'PT. Itci Hutani Manunggal has received a PROPER certificate \"Company Performance Rating Assessment Program\" in environmental management from the Governor of East Kalimantan with a \"GREEN\" Performance Rating in 2023 - 2024.', 0, 1, '2024-09-02 01:48:25', '2024-09-02 01:48:25'),
(12, NULL, 'Kesehatan dan Keselamatan Kerja (SMK3)', 'Occupational Health and Safety (SMK3)', 'PT. Itci Hutani Manunggal berkomitmen dalam penerapan di bidang Kesehatan dan Keselamatan Kerja (K3), hal ini dibuktikan dengan diraihnya sertifikat SMK3 dari Kementerian Tenaga Kerja pada bulan Mei 2022, sertifikat SMK3 ini berlaku sampai Mei 2025.', 'PT. Itci Hutani Manunggal is committed to implementing it in the Occupational Health and Safety (K3) sector, this is evidenced by the fact that it received an SMK3 certificate from the Ministry of Manpower in May 2022, this SMK3 certificate is valid until May 2025.', 0, 1, '2024-09-02 01:55:25', '2024-09-02 01:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_image`
--

CREATE TABLE `certificate_image` (
  `id` bigint(20) NOT NULL,
  `certificate_id` bigint(20) DEFAULT NULL,
  `src` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate_image`
--

INSERT INTO `certificate_image` (`id`, `certificate_id`, `src`, `created_at`) VALUES
(2, 1, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f52cbe72c45.png', '2023-09-04 01:02:54'),
(3, 2, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f5301eace8c.png', '2023-09-04 01:17:18'),
(4, 3, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f530a800e6a.png', '2023-09-04 01:19:36'),
(5, 4, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f530eaa57e8.png', '2023-09-04 01:20:42'),
(6, 5, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f5331bb99fb.jpeg', '2023-09-04 01:30:03'),
(7, 6, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f5337e0c045.png', '2023-09-04 01:31:42'),
(8, 7, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f533a36e015.png', '2023-09-04 01:32:19'),
(9, 8, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f5341e7553c.png', '2023-09-04 01:34:22'),
(10, 8, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f5341e77626.png', '2023-09-04 01:34:22'),
(11, 8, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f5341e7798d.png', '2023-09-04 01:34:22'),
(12, 8, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_64f5341e77c9b.png', '2023-09-04 01:34:22'),
(13, 9, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_667d64a5c1574.pdf', '2024-06-27 13:09:57'),
(14, 10, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_66d519124e368.pdf', '2024-09-02 01:46:58'),
(15, 11, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_66d51969e9012.png', '2024-09-02 01:48:25'),
(16, 12, '/storage/uploads/certificate/Y2VydGlmaWNhdGU=_66d51b0d3aee8.png', '2024-09-02 01:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `certification_logo`
--

CREATE TABLE `certification_logo` (
  `id` bigint(20) NOT NULL,
  `src` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certification_logo`
--

INSERT INTO `certification_logo` (`id`, `src`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eef6f70d3c8.webp', 0, '2023-08-30 07:59:51', '2023-08-31 02:01:16'),
(2, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eef721300b9.webp', 0, '2023-08-30 08:00:33', '2023-08-30 08:03:28'),
(3, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eef74a8351e.webp', 0, '2023-08-30 08:01:14', '2023-08-31 02:01:19'),
(4, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eff48b88c64.png', 1, '2023-08-31 02:01:47', '2023-08-31 02:01:47'),
(5, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eff48b8a8e2.png', 1, '2023-08-31 02:01:47', '2023-08-31 02:01:47'),
(6, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eff48b8abcb.png', 1, '2023-08-31 02:01:47', '2023-08-31 02:01:47'),
(7, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eff48b8b7ae.png', 1, '2023-08-31 02:01:47', '2023-08-31 02:01:47'),
(8, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eff48b8bad0.png', 1, '2023-08-31 02:01:47', '2023-08-31 02:01:47'),
(9, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64eff48b8be0a.png', 1, '2023-08-31 02:01:47', '2023-08-31 02:01:47'),
(10, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64f7fe6c1a448.jpeg', 0, '2023-09-06 04:22:04', '2023-09-06 11:29:57'),
(11, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64f8002ecb010.jpeg', 0, '2023-09-06 04:29:34', '2023-09-06 11:30:01'),
(12, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64f8005696ba7.jpeg', 0, '2023-09-06 04:30:14', '2023-09-06 11:30:21'),
(13, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64f800822d592.png', 0, '2023-09-06 04:30:58', '2023-09-06 11:31:17'),
(14, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_64f8009cf061a.png', 0, '2023-09-06 04:31:24', '2023-09-13 08:57:02'),
(15, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_650bf3d63881b.png', 0, '2023-09-21 07:42:14', '2023-09-21 14:43:12'),
(16, '/storage/uploads/certification-logo/Y2VydGlmaWNhdGlvbi1sb2dv_650bf4229ff61.png', 0, '2023-09-21 07:43:30', '2023-09-21 14:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `name_id` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `address_id` text DEFAULT NULL,
  `address_en` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(18) DEFAULT NULL,
  `fax` varchar(18) DEFAULT NULL,
  `cover` text DEFAULT NULL,
  `location_map` longtext DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_footer` tinyint(1) NOT NULL DEFAULT 0,
  `is_main` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `admin_id`, `name_id`, `name_en`, `address_id`, `address_en`, `email`, `telephone`, `fax`, `cover`, `location_map`, `is_active`, `is_footer`, `is_main`, `created_at`, `updated_at`) VALUES
(1, 1, 'Base Camp', 'Base Camp', 'Jl. 1519 Simpang Empat Terunen RT. 010, Desa Bumi Harapan, Kecamatan Sepaku, Kabupaten Penajam Paser Utara, Kalimantan Timur', 'Jl. 1519 Simpang Empat Terunen RT. 010, Desa Bumi Harapan, Kecamatan Sepaku, Kabupaten Penajam Paser Utara, Kalimantan Timur', 'info@itcihutanimanunggal.co.id', '(0542) 840428', '(05442) 840216', '/storage/uploads/contact/Y29udGFjdF9rYW50b3IgcHVzYXQ=_64f14c3879463.jpeg', 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7978.567635672669!2d116.69052450528501!3d-0.937866!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1695128151661!5m2!1sid!2sid', 1, 1, 1, '2023-09-01 02:28:08', '2023-09-19 19:57:55'),
(2, 1, 'kantor cabang surabaya', 'surabaya branch office', 'Jalan Kenangan KM. 1 Jenebora Penajam, Kariangau, Kec. Balikpapan Bar., Kota Balikpapan, Kalimantan Timur 76134', 'KM Memories Street. 1 Jenebora Penajam, Kariangau, District. Balikpapan Bar., Balikpapan City, East Kalimantan 76134', 'info@itcihutanimanunggal.co.id', '(0542) 840248', '(05442) 840216', '/storage/uploads/contact/Y29udGFjdF9rYW50b3IgcHVzYXQ=_64f14c3879463.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.25766576029!2d112.6302805186902!3d-7.275441714864695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1693708838145!5m2!1sen!2sid', 0, 0, 0, '2023-09-01 02:28:08', '2025-05-23 13:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_social`
--

CREATE TABLE `contact_social` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_social`
--

INSERT INTO `contact_social` (`id`, `name`, `link`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com/Kaspersky', 'ri-facebook-circle-line', 1, '2023-08-23 07:10:39', '2023-09-01 02:19:29'),
(2, 'Twitter', 'https://twitter.com/kaspersky/updated', 'ri-twitter-line', 1, '2023-08-23 07:10:39', '2023-09-01 02:19:29'),
(3, 'Instagram', 'https://instagram.com/kasperskylab', 'ri-instagram-line', 1, '2023-08-23 07:10:39', '2023-09-01 02:19:29'),
(4, 'LinkedIn', 'https://linkedin.com/company/kaspersky', 'ri-linkedin-box-line', 1, '2023-08-23 07:10:39', '2023-09-01 02:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `cover`
--

CREATE TABLE `cover` (
  `id` bigint(20) NOT NULL,
  `type` enum('about','certificate','sustainability','career','career-detail','career-apply','career-open-position','blog','contact','home') DEFAULT NULL,
  `src` text DEFAULT NULL,
  `is_video` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cover`
--

INSERT INTO `cover` (`id`, `type`, `src`, `is_video`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'home', '/storage/uploads/cover/Y292ZXI=_MQ==.mp4', 1, '2023-08-29 14:51:19', '2024-08-20 09:19:58', 1, NULL),
(2, 'about', '/storage/uploads/cover/Y292ZXI=_Mg==.webm', 1, '2023-08-29 14:51:19', '2023-09-02 16:15:00', 1, NULL),
(3, 'certificate', '/storage/uploads/cover/Y292ZXI=_Mw==.png', 0, '2023-08-29 14:51:19', '2025-05-23 13:19:59', 1, NULL),
(4, 'sustainability', '/storage/uploads/cover/Y292ZXI=_NA==.png', 0, '2023-08-29 14:51:19', '2025-05-23 13:33:29', 1, NULL),
(5, 'career', NULL, 0, '2023-08-29 14:51:19', '2023-08-29 14:52:19', 1, NULL),
(6, 'career-detail', NULL, 0, '2023-08-29 14:51:19', '2023-08-29 14:52:22', 1, NULL),
(7, 'career-apply', NULL, 0, '2023-08-29 14:51:19', '2023-08-29 14:52:25', 1, NULL),
(8, 'career-open-position', '/storage/uploads/cover/Y292ZXI=_OA==.jpg', 0, '2023-08-29 14:51:19', '2025-05-23 13:06:49', 1, NULL),
(9, 'blog', '/storage/uploads/cover/Y292ZXI=_OQ==.jpg', 0, '2023-08-29 14:51:19', '2025-05-23 13:15:27', 1, NULL),
(10, 'contact', '/storage/uploads/cover/Y292ZXI=_MTA=.jpg', 0, '2023-08-29 14:51:19', '2023-09-02 15:22:35', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `key_value`
--

CREATE TABLE `key_value` (
  `id` bigint(20) NOT NULL,
  `title_id` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_alt_id` varchar(255) DEFAULT NULL,
  `title_alt_en` varchar(255) NOT NULL,
  `description_id` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) NOT NULL,
  `content_id` longtext DEFAULT NULL,
  `content_en` longtext NOT NULL,
  `is_list` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `id` bigint(20) NOT NULL,
  `lang_id` varchar(255) DEFAULT NULL,
  `content_id` longtext DEFAULT NULL,
  `content_en` longtext DEFAULT NULL,
  `group_id` bigint(20) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `lang_id`, `content_id`, `content_en`, `group_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'perusahaan', 'Perusahaan', 'Company', 2, 1, '2023-08-21 01:39:32', '2023-08-26 05:01:29'),
(2, 'keberlanjutan', 'Keberlanjutan', 'Sustainability', 2, 1, '2023-08-21 01:41:17', '2023-08-26 06:11:59'),
(3, 'karir', 'Karir', 'Career', 2, 1, '2023-08-21 01:42:00', '2023-08-26 05:01:29'),
(4, 'blog', 'Blog', 'Blog', 2, 1, '2023-08-21 16:17:20', '2023-08-26 05:01:29'),
(5, 'kontak', 'Kontak', 'Contact', 2, 1, '2023-08-21 16:17:20', '2023-08-26 05:01:29'),
(6, 'tentang', 'Tentang', 'About', 2, 1, '2023-08-21 16:17:20', '2023-08-26 05:01:29'),
(7, 'sertifikat', 'Sertifikat', 'Certificate', 2, 1, '2023-08-21 16:17:20', '2023-08-26 05:01:29'),
(8, 'kategori', 'kategori', 'category', 1, 1, '2023-08-21 16:17:20', '2023-08-21 16:17:20'),
(9, 'tahun', 'tahun', 'year', 1, 1, '2023-08-21 16:17:20', '2023-08-21 16:17:20'),
(10, 'muat-lebih', 'muat lebih banyak', 'load more', 1, 1, '2023-08-21 16:17:20', '2023-08-21 16:17:20'),
(11, 'memuat', 'memuat...', 'loading...', 1, 1, '2023-08-21 16:17:20', '2023-08-21 16:17:20'),
(21, 'about', 'Perusahaan yang bergerak dibidang Hutan Tanaman Industri (HTI) dengan Acacia Mangium dan Eucalyptus Sp. dengan luasan konsesi ±161.127 Ha terletak di Provinsi Kalimantan Timur yang telah mendapatkan legalitas pengelolahan hutan (SK IUPHHK-HTI) melalui keptusan menteri kehutanan No. 184/Kpts-II/1996 tanggal 23 April 1996.', 'A company operating in the Industrial Plantation Forest (HTI) sector with Acacia Mangium and Eucalyptus Sp. with a concession area of ±161,127 Ha located in East Kalimantan Province which has obtained forest management legality (SK IUPHHK-HTI) through the Minister of Forestry Decree No. 184/Kpts-II/1996 dated 23 April 1996.', 3, 1, '2023-08-23 07:53:10', '2023-08-23 07:53:10'),
(22, 'visi', 'visi', 'vision', 3, 1, '2023-08-23 07:53:10', '2023-08-23 07:53:10'),
(23, 'visi-value', 'Menjadi penghasil serat kayu tanaman terbaik didunia dan menyediakan serat berkualitas tinggi kepada para pelanggan dengan memperhatikan kontribusi kepada masyarakat luas serta pelaksanaan standar-standar lingkungan, dan keselamatan kerja.', 'To be the best producer of plant wood fiber in the world and provide high quality fiber to customers by paying attention to contribution to the wider community and implementing environmental and occupational safety standards.', 3, 1, '2023-08-23 07:53:10', '2023-08-23 07:53:10'),
(24, 'misi', 'misi', 'mission', 3, 1, '2023-08-23 07:53:10', '2023-08-23 07:53:10'),
(25, 'misi-value', 'Melaksanakan pembangunan hutan tanaman lestari di lokasi operasional dengan menerapkan Kebijakan Pengelolaan Hutan Lestari yang secara konsisten mempertimbangkan aspek lingkungan, produksi, dan sosial.||Mewujudkan kemakmuran masyarakat dan penyediaan bahan baku yang lestari pada lahan konsesi yang ditetapkan oleh Pemerintah untuk pengembangan hutan tanaman||Mendukung tujuan pemerintah terkait perubahan iklim, pengelolaan konservasi untuk mencapai dan mempertahankan status konservasi di wilayah operasi perusahaan.||Menjamin bahwa hanya kayu serat yang legal yang dikirimkan dan masuk ke jalur produksi perusahaan, dan mendukung tindakan Pemerintah dalam memerangi pembalakan liar.||Mengelola konsesi secara lestari dengan menerapkan konsep mosaik hutan tanaman untuk menghasilkan kayu serat untuk melestarikan dan meningkatkan keanekaragaman hayati serta ekosistem alami yang representatif sesuai dengan kerangka pendekatan Nilai Konservasi tinggi.||Mempromosikan dan melindungi kesehatan, keselamatan dan kesejahteraan karyawan, tenaga kerja kontraktor dan masyarakat sekitar wilayah operasi PT. ITCI HUTANI MANUNGGAL; meningkatkan kinerja Lingkungan, Sosial, Kesehatan dan Keselamatan secara berkelanjutan, dan Pengelolaan Hutan Tanaman Lestari.||Melindungi lingkungan untuk mencegah dampak negatif yang merugikan melalui pencegahan pencemaran lingkungan.||Meminimalisir potensi konflik antara pekerja dan pengusaha dalam penyediaan lingkungan kerja yang layak dan sehat dan meningkatkan produkstifitas pekerja melalui efisiensi waktu dan biaya.||Penggunaan sumberdaya alam yang lebih bijaksana menuju terciptanya eko-efisiensi.||Menjaga citra bisnis industri yang selama ini sering dikaitkan secara negatif dengan pencemaran lingkungan.', 'Carry out the development of sustainable plantation forests at operational locations by implementing a Sustainable Forest Management Policy that consistently considers environmental, production and social aspects.||Realizing community prosperity and sustainable supply of raw materials on concession land determined by the Government for the development of plantation forests||Supporting government goals related to climate change, conservation management to achieve and maintain conservation status in the company\'s operational areas.||Ensure that only legal fiberwood is shipped and enter the company\'s production lines, and support Government action against illegal logging.||Manage the concession sustainably by applying the plantation mosaic concept to produce fiberwood to conserve and enhance biodiversity and representative natural ecosystems according to the high Conservation Value approach framework.||Promote and protect the health, safety and welfare of employees, contractor workers and the community around the PT. MANUNGGAL HUTANI ITCI; improve Environmental, Social, Health and Safety performance in a sustainable manner, and Sustainable Plantation Forest Management.||Protecting the environment to prevent adverse negative impacts through prevention of environmental pollution.||Minimizing the potential for conflict between workers and employers in providing a decent and healthy work environment and increasing worker productivity through time and cost efficiency.||Wise use of natural resources towards creating eco-efficiency.||Maintaining the image of the industrial business which has so far been negatively associated with environmental pollution.', 3, 1, '2023-08-23 07:53:10', '2023-08-23 07:53:10'),
(26, 'objectives', 'objektif', 'objectives', 3, 1, '2023-08-23 07:53:10', '2023-08-23 07:53:10'),
(27, 'objectives-desc', 'Dalam pelaksanaan bisnisnya, PT. ITCI HUTANI MANUNGGAL berkomitmen :', 'In carrying out its business, PT. ITCI HUTANI MANUNGGAL is committed to:', 3, 1, '2023-08-23 07:53:10', '2023-08-23 07:53:10'),
(28, 'objectives-value', 'Mematuhi peraturan perundang-undangan yang berlaku khususnya mengenai pengelolaan hutan dan lingkungan dan persyaratan lain yang diikuti Perusahaan;||Melaksanakan dan memelihara sistem manajemen lingkungan, kesehatan dan keselamatan kerja diseluruh operasional perusahaan;||Melaksanakan praktik pengelolaan hutan terbaik untuk memastikan perlindungan dan mencegah pencemaran air, tanah dan udara akibat operasional perusahaan.||Menetapkan tujuan dan sasaran yang terukur, serta melakukan upaya strategis untuk mencegah pencemaran lingkungan, kecelakaan dan sakit akibat kerja terhadap karyawan dan pihak-pihak yang berkepentingan, dan melakukan pengkajian tujuan dan sasaran secara berkala untuk memperoleh perbaikan kinerja secara berkelanjutan;||Mengintegrasikan isu sosial, lingkungan, kesehatan dan keselamatan kerja dalam kegiatan perencanaan operasional; dan menyesuaikan praktek pengelolaan hutan tanaman dengan standar nasional dan internasional yang bertanggung jawab dan tersertifikasi.||Mempraktikkan secara ketat kebijakan \'tanpa membakar\', dalam hubungannya dengan persiapan lokasi penanaman dan mendukung upaya aktif untuk mencegah dan menguasai kebakaran hutan dan asap;||Mengelola kawasan keanekaragaman hayati di dalam wilayah konsesi dengan tujuan memaksimalkan nilai konservasi dan nilai keanekaragaman hayatinya serta memaksimalkan manfaat ekologi dan sosialnya.||Melindungi kawasan keanekaragaman hayati dan kawasan lindung lainnya dari pembalakan liar dan bekerjasama dengan pihak-pihak yang berkepentingan lainnya untuk melindungi daerah konservasi lain diluar konsesi;||Melaksanakan progran Reuse, Reduce dan Recycle (3R) sebagai upaya pengendalian pencemaran dan pengelolaan Sumber Daya Alam.||Menyediakan kepada pihak-pihak yang berkepentingan informasi yang dapat dipahami, sesuai dengan isunya, dan menyajikan sistem pengelolaan dan kinerja lingkungan, kesehatan dan keselamatan kerja di Perusahaan secara akurat dan dapat dibuktikan;||Memastikan bahwa kontraktor-kontraktor dan karyawan di semua tingkatan dan fungsi organisasi menyadari tentang dampak lingkungan dan resiko kesehatan dan keselamatan akibat kegiatan mereka dan tiap individu wajib untuk melaksanakan Prosedur PT. ITCI HUTANI MANUNGGAL sesuai dengan kegiatannya;||Secara berkala meninjau kebijakan lingkungan, sosial, kesehatan dan keselamatan kerja ini untuk memastikan bahwa kebijakan tersebut tetap relevan dengan perkembangan perusahaan.||Memastikan bahwa kebijakan ini tersedia bagi pihak-pihak yang berkepentingan||Mendukung dan memastikan mitra-mitra usaha menerima dan melaksanakan prinsip-prinsip kebijakan ini; dan||Melakukan upaya-upaya terbaik untuk memperoleh peningkatan secara terus menerus dalam sistim pengelolaan dan kinerja Lingkungan, Sosial, Kesehatan dan Keselamatan kerja di seluruh operasional perusahaan', 'Comply with applicable laws and regulations, especially regarding forest and environmental management and other requirements followed by the Company;||Implement and maintain an environmental, occupational health and safety management system throughout the company\'s operations;||Implement best forest management practices to ensure protection and prevent water, soil and air pollution due to company operations.||Setting measurable goals and objectives, as well as making strategic efforts to prevent environmental pollution, accidents and work-related illnesses for employees and interested parties, and conducting periodic reviews of goals and targets to obtain continuous performance improvements;||Integrate social, environmental, occupational health and safety issues in operational planning activities; and adapting plantation forest management practices to responsible and certified national and international standards.||Strictly practice a \'no burning\' policy, in relation to site preparation for planting and support active efforts to prevent and control forest fires and haze;||Manage biodiversity areas within concession areas with the aim of maximizing their conservation and biodiversity values as well as maximizing their ecological and social benefits.||Protect biodiversity areas and other protected areas from illegal logging and cooperate with other interested parties to protect other conservation areas outside the concession;||Carry out the Reuse, Reduce and Recycle (3R) program as an effort to control pollution and manage natural resources.||Provide to interested parties information that can be understood, in accordance with the issue, and presents an accurate and verifiable environmental, health and safety management and performance system in the Company;||Ensure that contractors and employees at all levels and functions of the organization are aware of the environmental impacts and health and safety risks resulting from their activities and that each individual is required to implement the PT Procedures. ITCI HUTANI MANUNGGAL in accordance with its activities;||Periodically review these environmental, social, health and safety policies to ensure that these policies remain relevant to the development of the company.||Ensure that this policy is made available to interested parties||Support and ensure business partners accept and implement the principles of this policy; And||Make the best efforts to obtain continuous improvement in the environmental, social, health and safety management system and performance in all company operations', 3, 1, '2023-08-23 07:53:10', '2023-08-23 07:53:10'),
(29, 'sertifikat-kami', 'Sertifikat kami', 'Our certifications', 3, 1, '2023-08-23 07:53:10', '2023-08-26 04:49:04'),
(30, 'hidup-di-ihm', 'Hidup di Itci Hutani Manunggal', 'Living in Itci Hutani Manunggal', 4, 1, '2023-08-23 12:30:59', '2023-08-23 12:30:59'),
(31, 'hidup-di-ihm-desc', 'Sekilas tentang mereka yang bergabung di keluarga kami', 'A glimpse of those who join our family', 4, 1, '2023-08-23 12:30:59', '2023-08-23 12:30:59'),
(41, 'about-short', 'Perusahaan Yang Bergerak Dibidang Hutan Tanam Dengan Acacia Mangium Dan Eucalyptus Sp.', 'Companies Engaged In Planting Forests With Acacia Mangium And Eucalyptus Sp.', 1, 1, '2023-08-26 00:26:27', '2023-08-26 00:26:27'),
(42, 'about-desc', 'Perusahaan yang bergerak dibidang Hutan Tanam dengan Acacia Mangium dan Eucalyptus Sp. dengan luasan konsesi ±114,830 Ha terletak di Provinsi Kalimantan Timur yang telah mendapatkan izin berusaha pemanfaatan hutan dengan nomor SK.198/Menlhk/Setjen/HPL.2/3/2022 yang dikeluarkan oleh Menteri Lingkungan Hidup Dan Kehutanan pada tanggal 10 Maret 2022.', 'A company engaged in Planting Forest with Acacia Mangium and Eucalyptus Sp. with a concession area of ​​±114,830 Ha located in East Kalimantan Province which has obtained a business permit for forest utilization with number SK.198/Menlhk/Setjen/HPL.2/3/2022 issued by the Minister of Environment and Forestry on March 10, 2022.', 1, 1, '2023-08-26 00:26:27', '2023-10-25 10:45:11'),
(43, 'empowering-woman', 'memberdayakan perempuan', 'empowering woman', 1, 1, '2023-08-26 00:26:27', '2023-08-26 00:26:27'),
(44, 'empowering-woman-short', 'Memelihara hutan dengan keberlanjutan dan ketulusan demi masa depan', 'Preserving Forests with Sustainability and Sincerity for the Future', 1, 1, '2023-08-26 00:26:27', '2025-02-18 08:06:59'),
(45, 'empowering-woman-desc', 'Kami percaya pada kekuatan, ketulusan dan ketahanan dalam pengelolaan kehutanan. Di ITCI Hutani Manunggal, tim perempuan kami yang beragam memimpin upaya ini, mulai dari konservasi hingga pengelolaan dengan sentuhan ketulusan yang didasari oleh pelatihan, kompetensi, dukungan serta kerjasama seluruh insan ITCI Hutani Manunggal. Bersama-sama, kita membentuk praktik kehutanan berkelanjutan dengan melindungi ekosistem, dan mendorong inovasi. Dengan dedikasi dan persatuan, kami tidak hanya menanam pohon, namun juga memupuk budaya di mana perempuan bisa berkembang, sehingga memberikan dampak jangka panjang pada industri dan dunia. Bergabunglah bersama kami saat kami membuka jalan menuju masa depan yang lebih hijau dan inklusif.', 'We believe in the power, sincerity, and resilience in forest management. At ITCI Hutani Manunggal, our diverse team of women leads these efforts—from conservation to management—guided by heartfelt dedication, training, competence, and the collective support of the entire ITCI Hutani Manunggal family. Together, we shape sustainable forestry practices by protecting ecosystems and driving innovation.\r\n\r\nWith passion and unity, we do more than plant trees; we nurture a culture where women can thrive, creating a lasting impact on the industry and the world. Join us as we pave the way toward a greener and more inclusive future.', 1, 1, '2023-08-26 00:26:27', '2025-02-18 08:08:06'),
(46, 'lihat-detail', 'Lihat detail', 'See details', 1, 1, '2023-08-26 00:26:27', '2023-08-26 00:26:27'),
(47, 'berita-terbaru', 'Berita terbaru', 'Latest news', 1, 1, '2023-08-26 00:26:27', '2023-08-26 00:26:27'),
(48, 'berita-all', 'Semua berita', 'All news', 1, 1, '2023-08-26 00:26:27', '2023-08-26 00:26:27'),
(49, 'tagline-text', 'MEMASTIKAN;KEBERLANJUTAN;UNTUK MASA DEPAN', 'ENSURE;SUSTAINABILITY;FOR THE FUTURE', 1, 1, '2023-08-26 02:35:21', '2023-08-26 10:52:18'),
(50, 'kontak-kami', 'Kontak kami', 'Contact us', 1, 1, '2023-08-26 05:10:03', '2023-08-26 05:10:03'),
(51, 'ikuti', 'ikuti', 'follow', 1, 1, '2023-08-26 05:10:03', '2023-08-26 05:10:03'),
(52, 'keberlanjutan-desc', 'Mengolah Pohon, Melestarikan Bumi. Janji Kami untuk Memelihara, Menumbuhkan, dan Melindungi Hutan Secara Berkelanjutan. Inovasi Ramah Lingkungan Berakar pada Setiap Kayu.', 'Cultivating Trees, Preserving Earth. Our Promise to Sustainably Nurture, Grow, and Protect Forests. Eco-Innovation Rooted in Every Timber.', 1, 1, '2023-08-26 06:34:42', '2023-08-26 06:34:42'),
(53, 'sustainable', 'Berkelanjutan', 'sustainable', 1, 1, '2023-08-26 06:34:42', '2024-08-29 09:21:18'),
(54, 'best-firefighter-desc', 'Visi bisnis IHM berpusat pada keyakinan bahwa pembangunan yang bertanggung jawab dapat membangun masa depan yang lebih baik bagi Indonesia, membantu masyarakat lokal untuk memutus siklus kemiskinan dan meningkatkan kehidupan mereka. Beroperasi secara berkelanjutan sangat penting untuk mencapai visi ini, di mana keberlanjutan didefinisikan sebagai penggunaan sumber daya untuk memenuhi kebutuhan manusia sambil memastikan keberlanjutan sistem dan lingkungan alam saat ini dan di masa depan. Itulah sebabnya keberlanjutan berada di inti dari nilai-nilai dan aspirasi kami', 'The business vision of IHM is centered around the belief that responsible development can build a better future for Indonesia, helping local communities to break the cycle of poverty and improve their lives. Operating sustainably is crucial in achieving this vision, where sustainability is defined as using resources to meet human needs while ensuring the continuity of current and future systems and the natural environment. That is why sustainability lies at the core of our values and aspirations.', 1, 1, '2023-08-26 06:34:42', '2025-02-14 15:00:13'),
(55, 'Forest-Conservation', 'Konservasi hutan', 'Forest-Conservation', 1, 1, '2023-08-26 06:34:42', '2024-08-27 10:43:15'),
(56, 'conservation-forest', 'Konservasi hutan adalah praktik penanaman dan pemeliharaan kawasan hutan untuk kepentingan dan keberlanjutan generasi mendatang.\r\n\r\nSebagai salah satu bentuk utama bentang alam, sumber daya hutan mempunyai nilai sebagai bagian integral dari ekosistem, dari sudut pandang komersial, dan sebagai penyedia perlindungan bagi satwa liar. Masa depan bumi kita sangat perlu dijaga, mengingat perubahan iklim telah membawa kerusakan pada lingkungan alam kita. Perserikatan Bangsa-Bangsa menekankan pentingnya memastikan keberlangsungan ekosistem yang penting bagi kesejahteraan manusia. \r\n\r\nUntuk mencapai hal ini, kita perlu mengurangi jumlah dampak buruk aktivitas manusia terhadap lingkungan dan mendukung alam sebanyak yang kita bisa, baik itu praktik bisnis yang lebih bertanggung jawab, mengurangi efek gas rumah kaca, mengurangi sampah dan limbah, dsb. Faktanya, para ilmuwan memperingatkan kita hanya memiliki waktu 10 tahun lagi untuk mencegah kerusakan kesehatan di planet kita, jika tidak maka umat manusia akan menderita akibat yang sangat buruk. Dan di sinilah peran konservasi. Selain sebagai rumah bagi flora dan fauna, beberapa hutan dianggap sebagai kawasan Nilai Konservasi Tinggi (HCV) – habitat alami, yang memiliki arti penting atau sangat penting karena nilai biologis, ekologi, sosial atau budayanya yang tinggi. \r\n\r\nAwalnya dikembangkan oleh Forest Stewardship Council (FSC) pada tahun 1999, konsep NKT digunakan dalam sertifikasi pengelolaan hutan. Saat ini prinsip ini menjadi prinsip dasar standar keberlanjutan bagi banyak industri berbasis sumber daya alam, termasuk minyak sawit, kedelai, gula, biofuel, karbon, serta untuk pemetaan lanskap, konservasi, serta perencanaan dan advokasi sumber daya alam.\r\n\r\nPT. IHM telah berkomitmen terhadap konservasi hutan bernilai lingkungan di dalam wilayah konsesi hutan kami. \r\n\r\nDari total luasan konsesi PT. IHM yaiut seluas 114.830 Ha kami melestarikan dan melindungi 12.636 hektar hutan konservasi, termasuk Buffer Zone TAHURA, Kawasan Pelestarian Plasma Nutfah (KPPN), Kawasan Perlindungan Satwa Liar (KPSL), Lereng E dan Riparian Zone. Untuk melestarikan hutan yang ada PT. IHM menolak dan melarang adanya deforestasi dalam bentuk komitmen SFMP 2.0. Komitmen SFMP 2.0 APRIL berlaku efektif sejak kebijakan ini diluncurkan pada tanggal 3 Juni 2015 dan seterusnya.\r\n\r\n\r\nUpaya kami dalam perlindungan dan pengamanan hutan dilakukan dalam beberapa bentuk konservasi tanah dan air, seperti pemantauan erosi tanah, pemantauan fisika dan kimia tanah, pengukuran ketebalan top soil, pemantauan air sungai, persemaian bibit anakan alam dan buah, pengayaan tanaman endemic setempat di kawasan konservasi, patroli hutan secara rutin, inventarisasi flora dan fauna. \r\n\r\nKami juga mendukung peningkatan perekonomian masyarakat setempat yang masih memanfaatkan hasil hutan bukan kayu dengan berupaya membina dan membentuk kerjasama dengan dalam pemanfaatannya agar tetap terkendali dan berkelanjutan.', 'Forest conservation is the practice of planting and maintaining forest areas for the benefit and sustainability of future generations.\r\nAs one of the main forms of landscapes, forest resources have value as an integral part of the ecosystem, from a commercial point of view, and as a protection provider for wildlife. The future of our earth urgently needs to be safeguarded, considering that climate change has brought damage to our natural environment. The United Nations emphasizes the importance of ensuring the sustainability of ecosystems that are important for human well-being. \r\nTo achieve this, we need to reduce the number of adverse impacts of human activities on the environment and support nature as much as we can, be it more responsible business practices, reduce the effects of greenhouse gases, reduce garbage and waste, etc. In fact, scientists warn we only have 10 more years to prevent health damage on our planet, otherwise humanity will suffer very bad consequences. And this is where conservation comes in. In addition to being home to flora and fauna, some forests are considered High Conservation Value (HCV) areas – natural habitats, which have significance or are of great importance due to their high biological, ecological, social or cultural value.\r\nOriginally developed by the Forest Stewardship Council (FSC) in 1999, the concept of HCV is used in forest management certification. Today, it is the basic principle of sustainability standards for many natural resource-based industries, including palm oil, soybeans, sugar, biofuels, carbon, as well as for landscape mapping, conservation, and natural resource planning and advocacy.\r\nPT. IHM has committed to the conservation of environmentally valuable forests within our forest concessions. \r\nOf the total concession area of PT. Our 114,830 hectares of IHM conserve and protect 12,636 hectares of conservation forests, including the TAHURA Buffer Zone, Germplasm Conservation Area (KPPN), Wildlife Protection Area (KPSL), Slope E and Riparian Zone. To preserve the existing forests, PT. IHM rejects and prohibits deforestation in the form of SFMP 2.0 commitments. April\'s SFMP 2.0 commitments are effective from the launch of this policy on June 3, 2015 onwards.\r\nOur efforts in protecting and securing forests are carried out in several forms of soil and water conservation, such as soil erosion monitoring, soil physics and chemical monitoring, top soil thickness measurement, river water monitoring, natural and fruit seedling seedlings, enrichment of local endemic plants in conservation areas, routine forest patrols, flora and fauna inventory. \r\nWe also support the improvement of the economy of local communities who still utilize non-timber forest products by trying to foster and form cooperation in their use so that it remains controlled and sustainable', 1, 1, '2023-08-26 06:34:42', '2024-08-30 13:52:40'),
(57, 'ihm-planner', 'Perencanaan IHM', 'IHM\'s Planner', 1, 1, '2023-08-26 06:34:42', '2023-08-26 06:34:42'),
(58, 'ihm-planner-desc', 'Itci Hutani Manunggal berdiri sebagai perencana hebat yang menunjukkan keterampilan luar biasa dalam koordinasi dan strategi. Kemampuannya untuk berkolaborasi secara lancar dengan Kendaraan Udara Tak Berawak (UAV) dan perencana strategis telah meningkatkan efektivitasnya. Pendekatan visioner Ihm memanfaatkan teknologi UAV untuk meningkatkan kesadaran situasional, mengoptimalkan respons bencana, dan alokasi sumber daya. Kehebatannya dalam menyatukan beragam elemen ini menunjukkan kemampuan luar biasa dalam menggabungkan teknologi dan pemikiran strategis secara mulus. Pendekatan inovatif ini tidak hanya meningkatkan efisiensi namun juga menetapkan tolok ukur kolaborasi yang efektif, yang menunjukkan kekuatan perencanaan terpadu dalam mengatasi tantangan secara langsung.', 'Itci Hutani Manunggal stands as a great planner, displaying exceptional skills in coordination and strategy. His ability to collaborate seamlessly with Unmanned Aerial Vehicles (UAVs) and strategic planners has elevated his effectiveness. Ihm\'s visionary approach leverages UAV technology for enhanced situational awareness, optimizing disaster response and resource allocation. His prowess in uniting these diverse elements showcases a remarkable ability to merge technology and strategic thinking seamlessly. This innovative approach has not only increased efficiency but has also set a benchmark for effective collaboration, demonstrating the power of integrated planning in tackling challenges head-on.', 1, 1, '2023-08-26 06:34:42', '2023-08-26 06:34:42'),
(59, 'continuous-improvements', 'perbaikan berkelanjutan', 'continuous improvements', 1, 1, '2023-08-26 06:34:42', '2023-08-26 06:34:42'),
(60, 'continuous-improvements-desc', 'Komitmen Itci Hutani Manunggal terhadap inovasi dan pemikiran ke depan sungguh luar biasa. Dedikasinya yang tak tergoyahkan untuk menyempurnakan dan mengadaptasi strategi secara real-time telah menghasilkan siklus perbaikan yang berkelanjutan. Kemampuan IHM dalam menilai lanskap yang terus berkembang, baik dalam pemadaman kebakaran maupun tata kelola, memungkinkannya untuk tetap menjadi yang terdepan. Ia menyadari pentingnya belajar dari pengalaman masa lalu dan menerapkan pembelajaran tersebut untuk menciptakan sistem yang lebih tangguh dan efisien.', 'Itci Hutani Manunggal\'s commitment to innovation and forward-thinking is truly remarkable. His unwavering dedication to refining and adapting strategies in real-time has resulted in a continuous cycle of improvement. IHM\'s ability to assess the ever-evolving landscape, both in firefighting and governance, enables him to stay ahead of the curve. He recognizes the importance of learning from past experiences and applying those lessons to create a more resilient and efficient system.', 1, 1, '2023-08-26 06:34:42', '2023-08-26 06:34:42'),
(61, 'sertifikasi', 'sertifikasi', 'certification', 1, 1, '2023-08-26 10:59:12', '2023-08-26 10:59:12'),
(62, 'test_add', 'coba buat data baru', 'trying to add a new data', 1, 1, '2023-08-31 05:07:48', '2025-02-18 01:01:28'),
(63, 'alamat', 'alamat', 'address', 1, 1, '2023-09-03 01:59:24', '2023-09-03 01:59:24'),
(64, 'unleash-passion', 'UNLEASH YOUR PASSION', 'UNLEASH YOUR PASSION', 1, 1, '2023-09-04 22:28:17', '2023-09-04 22:28:17'),
(65, 'join-forestry-eco', 'Ecoleaf', 'Ecoleaf', 1, 1, '2023-09-04 22:28:55', '2025-02-14 14:57:59'),
(66, 'job-title', 'job title', 'job title', 1, 1, '2023-09-04 22:45:03', '2023-09-04 22:45:03'),
(67, 'department', 'department', 'department', 1, 1, '2023-09-04 22:45:24', '2023-09-04 22:45:24'),
(68, 'location', 'location', 'location', 1, 1, '2023-09-04 22:45:44', '2023-09-04 22:45:44'),
(69, 'search', 'search', 'search', 1, 1, '2023-09-04 22:46:59', '2023-09-04 22:46:59'),
(70, 'jobs-available', 'jobs available', 'jobs available', 1, 1, '2023-09-04 22:48:07', '2023-09-04 22:48:07'),
(71, 'recent-open-position', 'recent open position', 'recent open position', 1, 1, '2023-09-05 06:11:19', '2023-09-05 06:11:19'),
(72, 'view-all', 'lihat semua', 'view all', 1, 1, '2023-09-05 06:12:33', '2023-09-05 06:12:33'),
(73, 'training-program', 'training program kuy', 'training program kuy', 1, 1, '2023-09-05 06:12:59', '2024-06-27 20:38:48'),
(74, 'training-program-desc', 'Kami sedang mempersiapkan generasi berikutnya, yang ingin menjadi tim kehutanan masa depan dan fokus pada dampak keberlanjutan!', 'We are preparing for our next generation, who wants to become our future forestry team and focus on sustainability impact!', 1, 1, '2023-09-05 06:13:38', '2023-09-05 06:13:38'),
(75, 'hear-their-story', 'hear their story', 'hear their story', 1, 1, '2023-09-05 06:14:35', '2023-09-05 06:14:35'),
(76, 'training-program-avail', 'Program Pelatihan Tersedia', 'Training Program Available', 1, 1, '2023-09-05 06:16:10', '2023-09-05 06:16:10'),
(77, 'no-training-open', 'Belum ada Pelatihan Terbuka', 'No Open Training Yet', 1, 1, '2023-09-05 10:24:08', '2023-09-05 10:24:08'),
(78, 'follow-social-1-edited', 'Ikuti akun sosial kami untuk mendapatkan info terbaru', 'Follow our social accounts to get latest info', 1, 1, '2023-09-05 10:25:18', '2024-06-27 07:26:54'),
(79, 'test', 'test', 'test', 1, 1, '2023-09-06 11:13:50', '2025-02-18 01:01:31'),
(80, 'Concervation', 'Konservasi', 'Concervation', 1, 1, '2024-06-29 09:20:55', '2025-02-18 01:01:17'),
(81, 'Sustainability', 'PT. IHM berkomitmen untuk melakukan penerapan pengelolaan hutan berkelanjutan yang bertanggung jawab dan menerapkan praktik terbaik di setiap aspek operasionalnya. Dengan cara ini menyediakan kebutuhan bahan baku kayu untuk peningkatan ekonomi dengan tetap menjaga lingkungan serta memperhatikan kepentingan social baik hak-hak masyarakat lokal dan pihak terkait lainnya.\r\n\r\nMaka dari itu, setiap bahan baku kayu yang dihasilkan PT. IHM bersertifikasi baik local maupun internasional seperti sertifikasi lingkungan (ISO 14001) dan pengelolaan hutan secara lestari baik (PHL-VLHH dan PEFC-IFCC), yang memastikan bahwa semua produk bersumber dari pengelolaan hutan yang dikelola secara berkelanjutan.\r\n\r\nVisi PT. IHM berpusat pada pengelolaan hutan yang bertanggung jawab dapat membangun masa depan yang lebih baik bagi sekitarnya, membantu pihak terkait seperti masyarakat lokal dalam penyerapan tenaga kerja dan meningkatkan kehidupan mereka. Dengan mesmastikan kegiatan operasional berjalan secara berkelanjutan sangat penting untuk mencapai visi ini, dimana keberlanjutan didefinisikan sebagai penggunaan sumber daya hutan untuk memenuhi kebutuhan manusia sekaligus memastikan keberlanjutan sistem dan lingkungan alam saat ini dan di masa depan. Itulah sebabnya keberlanjutan menjadi inti nilai dan aspirasi kami.\r\n\r\nPendekatan kami terhadap praktik hutan keberlanjutan berkomitmen bahwa keberlangsungan daerah sekitar yang terdampak serta lokasi Ibukota Negara Nusantara yang berdampingan dan kontribusi berkelanjutan kami terhadap perekonomian masyarakat sekitar didasarkan pada kemampuan kami mengelola operasi kami dengan cara yang menjamin produktivitas jangka panjang serta manfaat sosial dan lingkungan. Melalui tindakan kami, kami terus memperkuat komitmen kami terhadap pengelolaan berkelanjutan dan menerapkan praktik terbaik pengelolaan lingkungan dan keselamatan di seluruh operasi kami. Kami bertujuan untuk menjadi bagian yang selaras dengan pembangunan Ibukota baru Nusantara mencapai keseimbangan antara pembangunan ekonomi dan pengelolaan lingkungan.', 'PT. IHM is committed to implementing responsible sustainable forest management and implementing best practices in every aspect of its operations. In this way, it provides the need for wood raw materials for economic improvement while maintaining the environment and paying attention to social interests, both the rights of local communities and other related parties.\r\n\r\nTherefore, every wood raw material produced by PT. IHM is certified both locally and internationally such as environmental certification (ISO 14001) and sustainable forest management both (PHL-VLHH and PEFC-IFCC), which ensures that all products are sourced from sustainably managed forest management.\r\n\r\nThe vision of PT. IHM centered on responsible forest management can build a better future for the surrounding area, assisting stakeholders such as local communities in absorbing labor and improving their livelihoods. Ensuring that operational activities are carried out in a sustainable manner is essential to achieve this vision, where sustainability is defined as the use of forest resources to meet human needs while ensuring the sustainability of current and future natural systems and environments. That\'s why sustainability is at the core of our values and aspirations.\r\n\r\nOur approach to sustainable forest practices is committed to the sustainability of the surrounding affected areas as well as the location of the adjacent Nusantara National Capital and our sustainable contribution to the economies of the surrounding communities based on our ability to manage our operations in a way that ensures long-term productivity as well as social and environmental benefits. Through our actions, we continue to strengthen our commitment to sustainable management and implement environmental and safety management best practices throughout our operations. We aim to be part of the development of the new capital of the archipelago, achieving a balance between economic development and environmental management.', 1, 1, '2024-08-27 09:58:23', '2025-02-18 01:01:23'),
(82, 'ecoleaf-grove-nursey-desc', 'asasad', 'adasasas', 1, 1, '2025-02-18 12:09:46', '2025-02-18 12:09:46'),
(83, 'ecoleaf-grove-nursey', 'Header', 'Header', 1, 1, '2025-02-18 12:11:18', '2025-02-18 12:11:18'),
(84, 'best-firefighter', 'Best Fighter', 'Best Fighter', 1, 1, '2025-02-18 12:12:20', '2025-02-18 12:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `lang_group`
--

CREATE TABLE `lang_group` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lang_group`
--

INSERT INTO `lang_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ungroup', '2023-08-21 08:33:52', '2023-08-21 08:38:48'),
(2, 'menu', '2023-08-21 08:38:42', '2023-08-21 08:38:42'),
(3, 'about', '2023-08-23 07:31:56', '2023-08-23 07:31:56'),
(4, 'live-in', '2023-08-23 12:28:42', '2023-08-23 12:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `live_in`
--

CREATE TABLE `live_in` (
  `id` bigint(20) NOT NULL,
  `title_id` varchar(255) DEFAULT NULL,
  `description_id` text DEFAULT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_en` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `live_in`
--

INSERT INTO `live_in` (`id`, `title_id`, `description_id`, `title_en`, `description_en`, `created_at`, `updated_at`) VALUES
(1, 'Hidup Di\nItci Hutani Manunggal', 'Sekilas tentang mereka yang bergabung di keluarga kami', 'Living in Itci Hutani Manunggal', 'A glimpse of those who join our family', '2023-08-23 12:27:45', '2023-08-23 12:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `live_in_people`
--

CREATE TABLE `live_in_people` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `position` varchar(40) DEFAULT NULL,
  `cover` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_08_13_091626_create_admin_table', 0),
(2, '2023_08_13_091626_create_admin_role_table', 0),
(3, '2023_08_13_091626_create_blog_table', 0),
(4, '2023_08_13_091626_create_blog_category_table', 0),
(5, '2023_08_13_091626_create_blog_visitor_table', 0),
(6, '2023_08_13_091626_create_certificate_table', 0),
(7, '2023_08_13_091626_create_certificate_image_table', 0),
(8, '2023_08_13_091626_create_contact_table', 0),
(9, '2023_08_13_091626_create_key_value_table', 0),
(10, '2023_08_13_091626_create_live_in_table', 0),
(11, '2023_08_13_091626_create_live_in_people_table', 0),
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2023_08_13_160517_create_admin_table', 0),
(17, '2023_08_13_160517_create_admin_role_table', 0),
(18, '2023_08_13_160517_create_blog_table', 0),
(19, '2023_08_13_160517_create_blog_category_table', 0),
(20, '2023_08_13_160517_create_blog_visitor_table', 0),
(21, '2023_08_13_160517_create_certificate_table', 0),
(22, '2023_08_13_160517_create_certificate_image_table', 0),
(23, '2023_08_13_160517_create_contact_table', 0),
(24, '2023_08_13_160517_create_failed_jobs_table', 0),
(25, '2023_08_13_160517_create_key_value_table', 0),
(26, '2023_08_13_160517_create_live_in_table', 0),
(27, '2023_08_13_160517_create_live_in_people_table', 0),
(28, '2023_08_13_160517_create_password_reset_tokens_table', 0),
(29, '2023_08_13_160517_create_personal_access_tokens_table', 0),
(30, '2023_08_13_160517_create_users_table', 0),
(31, '2023_08_13_160805_create_admin_table', 0),
(32, '2023_08_13_160805_create_admin_role_table', 0),
(33, '2023_08_13_160805_create_blog_table', 0),
(34, '2023_08_13_160805_create_blog_category_table', 0),
(35, '2023_08_13_160805_create_blog_visitor_table', 0),
(36, '2023_08_13_160805_create_certificate_table', 0),
(37, '2023_08_13_160805_create_certificate_image_table', 0),
(38, '2023_08_13_160805_create_contact_table', 0),
(39, '2023_08_13_160805_create_failed_jobs_table', 0),
(40, '2023_08_13_160805_create_key_value_table', 0),
(41, '2023_08_13_160805_create_live_in_table', 0),
(42, '2023_08_13_160805_create_live_in_people_table', 0),
(43, '2023_08_21_020207_create_admin_table', 0),
(44, '2023_08_21_020207_create_admin_role_table', 0),
(45, '2023_08_21_020207_create_blog_table', 0),
(46, '2023_08_21_020207_create_blog_category_table', 0),
(47, '2023_08_21_020207_create_blog_visitor_table', 0),
(48, '2023_08_21_020207_create_certificate_table', 0),
(49, '2023_08_21_020207_create_certificate_image_table', 0),
(50, '2023_08_21_020207_create_contact_table', 0),
(51, '2023_08_21_020207_create_failed_jobs_table', 0),
(52, '2023_08_21_020207_create_key_value_table', 0),
(53, '2023_08_21_020207_create_live_in_table', 0),
(54, '2023_08_21_020207_create_live_in_people_table', 0),
(55, '2023_08_21_020210_add_foreign_keys_to_blog_table', 0),
(56, '2023_08_21_020210_add_foreign_keys_to_blog_visitor_table', 0),
(57, '2023_08_21_075024_create_admin_table', 0),
(58, '2023_08_21_075024_create_admin_role_table', 0),
(59, '2023_08_21_075024_create_blog_table', 0),
(60, '2023_08_21_075024_create_blog_category_table', 0),
(61, '2023_08_21_075024_create_blog_visitor_table', 0),
(62, '2023_08_21_075024_create_certificate_table', 0),
(63, '2023_08_21_075024_create_certificate_image_table', 0),
(64, '2023_08_21_075024_create_contact_table', 0),
(65, '2023_08_21_075024_create_failed_jobs_table', 0),
(66, '2023_08_21_075024_create_key_value_table', 0),
(67, '2023_08_21_075024_create_lang_table', 0),
(68, '2023_08_21_075024_create_live_in_table', 0),
(69, '2023_08_21_075024_create_live_in_people_table', 0),
(70, '2023_08_21_075027_add_foreign_keys_to_blog_table', 0),
(71, '2023_08_21_075027_add_foreign_keys_to_blog_visitor_table', 0),
(72, '2023_08_21_083019_create_admin_table', 0),
(73, '2023_08_21_083019_create_admin_role_table', 0),
(74, '2023_08_21_083019_create_blog_table', 0),
(75, '2023_08_21_083019_create_blog_category_table', 0),
(76, '2023_08_21_083019_create_blog_visitor_table', 0),
(77, '2023_08_21_083019_create_certificate_table', 0),
(78, '2023_08_21_083019_create_certificate_image_table', 0),
(79, '2023_08_21_083019_create_contact_table', 0),
(80, '2023_08_21_083019_create_failed_jobs_table', 0),
(81, '2023_08_21_083019_create_key_value_table', 0),
(82, '2023_08_21_083019_create_lang_table', 0),
(83, '2023_08_21_083019_create_lang_group_table', 0),
(84, '2023_08_21_083019_create_live_in_table', 0),
(85, '2023_08_21_083019_create_live_in_people_table', 0),
(86, '2023_08_21_083022_add_foreign_keys_to_blog_table', 0),
(87, '2023_08_21_083022_add_foreign_keys_to_blog_visitor_table', 0),
(88, '2023_08_21_083022_add_foreign_keys_to_lang_table', 0),
(89, '2023_08_21_162257_create_admin_table', 0),
(90, '2023_08_21_162257_create_admin_role_table', 0),
(91, '2023_08_21_162257_create_blog_table', 0),
(92, '2023_08_21_162257_create_blog_category_table', 0),
(93, '2023_08_21_162257_create_blog_visitor_table', 0),
(94, '2023_08_21_162257_create_certificate_table', 0),
(95, '2023_08_21_162257_create_certificate_image_table', 0),
(96, '2023_08_21_162257_create_contact_table', 0),
(97, '2023_08_21_162257_create_failed_jobs_table', 0),
(98, '2023_08_21_162257_create_key_value_table', 0),
(99, '2023_08_21_162257_create_lang_table', 0),
(100, '2023_08_21_162257_create_lang_group_table', 0),
(101, '2023_08_21_162257_create_live_in_table', 0),
(102, '2023_08_21_162257_create_live_in_people_table', 0),
(103, '2023_08_21_162300_add_foreign_keys_to_blog_table', 0),
(104, '2023_08_21_162300_add_foreign_keys_to_blog_visitor_table', 0),
(105, '2023_08_21_162300_add_foreign_keys_to_lang_table', 0),
(106, '2023_08_22_214112_create_admin_table', 0),
(107, '2023_08_22_214112_create_admin_role_table', 0),
(108, '2023_08_22_214112_create_blog_table', 0),
(109, '2023_08_22_214112_create_blog_category_table', 0),
(110, '2023_08_22_214112_create_blog_visitor_table', 0),
(111, '2023_08_22_214112_create_certificate_table', 0),
(112, '2023_08_22_214112_create_certificate_image_table', 0),
(113, '2023_08_22_214112_create_contact_table', 0),
(114, '2023_08_22_214112_create_failed_jobs_table', 0),
(115, '2023_08_22_214112_create_key_value_table', 0),
(116, '2023_08_22_214112_create_lang_table', 0),
(117, '2023_08_22_214112_create_lang_group_table', 0),
(118, '2023_08_22_214112_create_live_in_table', 0),
(119, '2023_08_22_214112_create_live_in_people_table', 0),
(120, '2023_08_22_214115_add_foreign_keys_to_blog_table', 0),
(121, '2023_08_22_214115_add_foreign_keys_to_blog_visitor_table', 0),
(122, '2023_08_22_214115_add_foreign_keys_to_lang_table', 0),
(123, '2023_08_23_101236_create_admin_table', 0),
(124, '2023_08_23_101236_create_admin_role_table', 0),
(125, '2023_08_23_101236_create_blog_table', 0),
(126, '2023_08_23_101236_create_blog_category_table', 0),
(127, '2023_08_23_101236_create_blog_visitor_table', 0),
(128, '2023_08_23_101236_create_certificate_table', 0),
(129, '2023_08_23_101236_create_certificate_image_table', 0),
(130, '2023_08_23_101236_create_contact_table', 0),
(131, '2023_08_23_101236_create_contact_social_table', 0),
(132, '2023_08_23_101236_create_failed_jobs_table', 0),
(133, '2023_08_23_101236_create_key_value_table', 0),
(134, '2023_08_23_101236_create_lang_table', 0),
(135, '2023_08_23_101236_create_lang_group_table', 0),
(136, '2023_08_23_101236_create_live_in_table', 0),
(137, '2023_08_23_101236_create_live_in_people_table', 0),
(138, '2023_08_23_101239_add_foreign_keys_to_blog_table', 0),
(139, '2023_08_23_101239_add_foreign_keys_to_blog_visitor_table', 0),
(140, '2023_08_23_101239_add_foreign_keys_to_lang_table', 0),
(141, '2023_08_23_102126_create_admin_table', 0),
(142, '2023_08_23_102126_create_admin_role_table', 0),
(143, '2023_08_23_102126_create_blog_table', 0),
(144, '2023_08_23_102126_create_blog_category_table', 0),
(145, '2023_08_23_102126_create_blog_visitor_table', 0),
(146, '2023_08_23_102126_create_certificate_table', 0),
(147, '2023_08_23_102126_create_certificate_image_table', 0),
(148, '2023_08_23_102126_create_contact_table', 0),
(149, '2023_08_23_102126_create_contact_social_table', 0),
(150, '2023_08_23_102126_create_failed_jobs_table', 0),
(151, '2023_08_23_102126_create_key_value_table', 0),
(152, '2023_08_23_102126_create_lang_table', 0),
(153, '2023_08_23_102126_create_lang_group_table', 0),
(154, '2023_08_23_102126_create_live_in_table', 0),
(155, '2023_08_23_102126_create_live_in_people_table', 0),
(156, '2023_08_23_102129_add_foreign_keys_to_blog_table', 0),
(157, '2023_08_23_102129_add_foreign_keys_to_blog_visitor_table', 0),
(158, '2023_08_23_102129_add_foreign_keys_to_lang_table', 0),
(159, '2023_08_23_233203_create_admin_table', 0),
(160, '2023_08_23_233203_create_admin_role_table', 0),
(161, '2023_08_23_233203_create_blog_table', 0),
(162, '2023_08_23_233203_create_blog_category_table', 0),
(163, '2023_08_23_233203_create_blog_visitor_table', 0),
(164, '2023_08_23_233203_create_certificate_table', 0),
(165, '2023_08_23_233203_create_certificate_image_table', 0),
(166, '2023_08_23_233203_create_contact_table', 0),
(167, '2023_08_23_233203_create_contact_social_table', 0),
(168, '2023_08_23_233203_create_failed_jobs_table', 0),
(169, '2023_08_23_233203_create_key_value_table', 0),
(170, '2023_08_23_233203_create_lang_table', 0),
(171, '2023_08_23_233203_create_lang_group_table', 0),
(172, '2023_08_23_233203_create_live_in_table', 0),
(173, '2023_08_23_233203_create_live_in_people_table', 0),
(174, '2023_08_23_233203_create_video_table', 0),
(175, '2023_08_23_233203_create_video_group_table', 0),
(176, '2023_08_23_233206_add_foreign_keys_to_blog_table', 0),
(177, '2023_08_23_233206_add_foreign_keys_to_blog_visitor_table', 0),
(178, '2023_08_23_233206_add_foreign_keys_to_lang_table', 0),
(179, '2023_08_23_233206_add_foreign_keys_to_video_table', 0),
(180, '2023_08_24_201520_create_admin_table', 0),
(181, '2023_08_24_201520_create_admin_role_table', 0),
(182, '2023_08_24_201520_create_blog_table', 0),
(183, '2023_08_24_201520_create_blog_category_table', 0),
(184, '2023_08_24_201520_create_blog_history_table', 0),
(185, '2023_08_24_201520_create_blog_visitor_table', 0),
(186, '2023_08_24_201520_create_certificate_table', 0),
(187, '2023_08_24_201520_create_certificate_image_table', 0),
(188, '2023_08_24_201520_create_contact_table', 0),
(189, '2023_08_24_201520_create_contact_social_table', 0),
(190, '2023_08_24_201520_create_failed_jobs_table', 0),
(191, '2023_08_24_201520_create_key_value_table', 0),
(192, '2023_08_24_201520_create_lang_table', 0),
(193, '2023_08_24_201520_create_lang_group_table', 0),
(194, '2023_08_24_201520_create_live_in_table', 0),
(195, '2023_08_24_201520_create_live_in_people_table', 0),
(196, '2023_08_24_201520_create_video_table', 0),
(197, '2023_08_24_201520_create_video_group_table', 0),
(198, '2023_08_24_201523_add_foreign_keys_to_blog_table', 0),
(199, '2023_08_24_201523_add_foreign_keys_to_blog_visitor_table', 0),
(200, '2023_08_24_201523_add_foreign_keys_to_lang_table', 0),
(201, '2023_08_24_201523_add_foreign_keys_to_video_table', 0),
(202, '2023_08_24_201706_create_admin_table', 0),
(203, '2023_08_24_201706_create_admin_role_table', 0),
(204, '2023_08_24_201706_create_blog_table', 0),
(205, '2023_08_24_201706_create_blog_category_table', 0),
(206, '2023_08_24_201706_create_blog_history_table', 0),
(207, '2023_08_24_201706_create_blog_visitor_table', 0),
(208, '2023_08_24_201706_create_certificate_table', 0),
(209, '2023_08_24_201706_create_certificate_image_table', 0),
(210, '2023_08_24_201706_create_contact_table', 0),
(211, '2023_08_24_201706_create_contact_social_table', 0),
(212, '2023_08_24_201706_create_failed_jobs_table', 0),
(213, '2023_08_24_201706_create_key_value_table', 0),
(214, '2023_08_24_201706_create_lang_table', 0),
(215, '2023_08_24_201706_create_lang_group_table', 0),
(216, '2023_08_24_201706_create_live_in_table', 0),
(217, '2023_08_24_201706_create_live_in_people_table', 0),
(218, '2023_08_24_201706_create_video_table', 0),
(219, '2023_08_24_201706_create_video_group_table', 0),
(220, '2023_08_24_201709_add_foreign_keys_to_blog_table', 0),
(221, '2023_08_24_201709_add_foreign_keys_to_blog_visitor_table', 0),
(222, '2023_08_24_201709_add_foreign_keys_to_lang_table', 0),
(223, '2023_08_24_201709_add_foreign_keys_to_video_table', 0),
(224, '2023_08_29_214750_create_admin_table', 0),
(225, '2023_08_29_214750_create_admin_role_table', 0),
(226, '2023_08_29_214750_create_blog_table', 0),
(227, '2023_08_29_214750_create_blog_category_table', 0),
(228, '2023_08_29_214750_create_blog_history_table', 0),
(229, '2023_08_29_214750_create_blog_visitor_table', 0),
(230, '2023_08_29_214750_create_certificate_table', 0),
(231, '2023_08_29_214750_create_certificate_image_table', 0),
(232, '2023_08_29_214750_create_contact_table', 0),
(233, '2023_08_29_214750_create_contact_social_table', 0),
(234, '2023_08_29_214750_create_cover_table', 0),
(235, '2023_08_29_214750_create_failed_jobs_table', 0),
(236, '2023_08_29_214750_create_key_value_table', 0),
(237, '2023_08_29_214750_create_lang_table', 0),
(238, '2023_08_29_214750_create_lang_group_table', 0),
(239, '2023_08_29_214750_create_live_in_table', 0),
(240, '2023_08_29_214750_create_live_in_people_table', 0),
(241, '2023_08_29_214750_create_video_table', 0),
(242, '2023_08_29_214750_create_video_group_table', 0),
(243, '2023_08_29_214753_add_foreign_keys_to_blog_table', 0),
(244, '2023_08_29_214753_add_foreign_keys_to_blog_visitor_table', 0),
(245, '2023_08_29_214753_add_foreign_keys_to_lang_table', 0),
(246, '2023_08_29_214753_add_foreign_keys_to_video_table', 0),
(247, '2023_08_29_215318_create_admin_table', 0),
(248, '2023_08_29_215318_create_admin_role_table', 0),
(249, '2023_08_29_215318_create_blog_table', 0),
(250, '2023_08_29_215318_create_blog_category_table', 0),
(251, '2023_08_29_215318_create_blog_history_table', 0),
(252, '2023_08_29_215318_create_blog_visitor_table', 0),
(253, '2023_08_29_215318_create_certificate_table', 0),
(254, '2023_08_29_215318_create_certificate_image_table', 0),
(255, '2023_08_29_215318_create_contact_table', 0),
(256, '2023_08_29_215318_create_contact_social_table', 0),
(257, '2023_08_29_215318_create_cover_table', 0),
(258, '2023_08_29_215318_create_failed_jobs_table', 0),
(259, '2023_08_29_215318_create_key_value_table', 0),
(260, '2023_08_29_215318_create_lang_table', 0),
(261, '2023_08_29_215318_create_lang_group_table', 0),
(262, '2023_08_29_215318_create_live_in_table', 0),
(263, '2023_08_29_215318_create_live_in_people_table', 0),
(264, '2023_08_29_215318_create_video_table', 0),
(265, '2023_08_29_215318_create_video_group_table', 0),
(266, '2023_08_29_215321_add_foreign_keys_to_blog_table', 0),
(267, '2023_08_29_215321_add_foreign_keys_to_blog_visitor_table', 0),
(268, '2023_08_29_215321_add_foreign_keys_to_lang_table', 0),
(269, '2023_08_29_215321_add_foreign_keys_to_video_table', 0),
(270, '2023_08_30_082445_create_admin_table', 0),
(271, '2023_08_30_082445_create_admin_role_table', 0),
(272, '2023_08_30_082445_create_blog_table', 0),
(273, '2023_08_30_082445_create_blog_category_table', 0),
(274, '2023_08_30_082445_create_blog_history_table', 0),
(275, '2023_08_30_082445_create_blog_visitor_table', 0),
(276, '2023_08_30_082445_create_certificate_table', 0),
(277, '2023_08_30_082445_create_certificate_image_table', 0),
(278, '2023_08_30_082445_create_contact_table', 0),
(279, '2023_08_30_082445_create_contact_social_table', 0),
(280, '2023_08_30_082445_create_cover_table', 0),
(281, '2023_08_30_082445_create_failed_jobs_table', 0),
(282, '2023_08_30_082445_create_key_value_table', 0),
(283, '2023_08_30_082445_create_lang_table', 0),
(284, '2023_08_30_082445_create_lang_group_table', 0),
(285, '2023_08_30_082445_create_live_in_table', 0),
(286, '2023_08_30_082445_create_live_in_people_table', 0),
(287, '2023_08_30_082445_create_slide_table', 0),
(288, '2023_08_30_082445_create_slide_group_table', 0),
(289, '2023_08_30_082445_create_video_table', 0),
(290, '2023_08_30_082445_create_video_group_table', 0),
(291, '2023_08_30_082448_add_foreign_keys_to_blog_table', 0),
(292, '2023_08_30_082448_add_foreign_keys_to_blog_visitor_table', 0),
(293, '2023_08_30_082448_add_foreign_keys_to_lang_table', 0),
(294, '2023_08_30_082448_add_foreign_keys_to_video_table', 0),
(295, '2023_08_30_143419_create_admin_table', 0),
(296, '2023_08_30_143419_create_admin_role_table', 0),
(297, '2023_08_30_143419_create_blog_table', 0),
(298, '2023_08_30_143419_create_blog_category_table', 0),
(299, '2023_08_30_143419_create_blog_history_table', 0),
(300, '2023_08_30_143419_create_blog_visitor_table', 0),
(301, '2023_08_30_143419_create_certificate_table', 0),
(302, '2023_08_30_143419_create_certificate_image_table', 0),
(303, '2023_08_30_143419_create_certification_logo_table', 0),
(304, '2023_08_30_143419_create_contact_table', 0),
(305, '2023_08_30_143419_create_contact_social_table', 0),
(306, '2023_08_30_143419_create_cover_table', 0),
(307, '2023_08_30_143419_create_failed_jobs_table', 0),
(308, '2023_08_30_143419_create_key_value_table', 0),
(309, '2023_08_30_143419_create_lang_table', 0),
(310, '2023_08_30_143419_create_lang_group_table', 0),
(311, '2023_08_30_143419_create_live_in_table', 0),
(312, '2023_08_30_143419_create_live_in_people_table', 0),
(313, '2023_08_30_143419_create_slide_table', 0),
(314, '2023_08_30_143419_create_slide_group_table', 0),
(315, '2023_08_30_143419_create_video_table', 0),
(316, '2023_08_30_143419_create_video_group_table', 0),
(317, '2023_08_30_143422_add_foreign_keys_to_blog_table', 0),
(318, '2023_08_30_143422_add_foreign_keys_to_blog_visitor_table', 0),
(319, '2023_08_30_143422_add_foreign_keys_to_lang_table', 0),
(320, '2023_08_30_143422_add_foreign_keys_to_slide_table', 0),
(321, '2023_08_30_143422_add_foreign_keys_to_video_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `src` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `group_id`, `src`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, '/storage/uploads/slides/aG9tZS0x_64eeeb1e4b1a4.jpeg', 0, '2023-08-30 07:09:18', '2023-08-30 07:09:54'),
(2, 1, '/storage/uploads/slides/aG9tZS0x_64eeeb1e4cdc1.jpeg', 0, '2023-08-30 07:09:18', '2023-08-30 07:09:41'),
(3, 1, '/storage/uploads/slides/aG9tZS0x_64eeed40775ce.webp', 0, '2023-08-30 07:18:24', '2023-08-30 07:19:51'),
(4, 1, '/storage/uploads/slides/aG9tZS0x_64eeed4079595.webp', 0, '2023-08-30 07:18:24', '2023-08-30 07:20:41'),
(5, 1, '/storage/uploads/slides/aG9tZS0x_64eeedfd8f70a.webp', 0, '2023-08-30 07:21:33', '2023-08-30 07:21:37'),
(6, 1, '/storage/uploads/slides/aG9tZS0x_64eeedfd91626.webp', 0, '2023-08-30 07:21:33', '2023-09-01 01:50:31'),
(7, 2, '/storage/uploads/slides/aG9tZS0x_64eeee10a5b9f.jpeg', 0, '2023-08-30 07:21:52', '2023-09-01 01:50:34'),
(8, 3, '/storage/uploads/slides/aG9tZS0x_64eeee168ea95.webp', 0, '2023-08-30 07:21:58', '2023-09-01 01:50:37'),
(9, 4, '/storage/uploads/slides/aG9tZS0x_64eeee1d7ea49.webp', 0, '2023-08-30 07:22:05', '2023-09-01 01:50:40'),
(10, 5, '/storage/uploads/slides/aG9tZS0x_64eeee2546e50.jpeg', 0, '2023-08-30 07:22:13', '2023-09-01 01:50:43'),
(11, 1, '/storage/uploads/slides/aG9tZS0x_64f1438d8b88c.jpeg', 0, '2023-09-01 01:51:09', '2025-02-18 14:16:49'),
(12, 1, '/storage/uploads/slides/aG9tZS0x_64f1438d927cd.jpeg', 0, '2023-09-01 01:51:09', '2025-02-18 14:14:41'),
(13, 1, '/storage/uploads/slides/aG9tZS0x_64f1438d93b9e.jpeg', 0, '2023-09-01 01:51:09', '2025-02-18 14:14:37'),
(14, 2, '/storage/uploads/slides/aG9tZS0x_64f143f1a650e.png', 0, '2023-09-01 01:52:49', '2024-08-20 19:02:07'),
(15, 2, '/storage/uploads/slides/aG9tZS0x_64f143f1a8cf1.png', 0, '2023-09-01 01:52:49', '2024-08-20 19:08:05'),
(16, 2, '/storage/uploads/slides/aG9tZS0x_64f143f1aa273.png', 0, '2023-09-01 01:52:49', '2024-08-20 19:08:11'),
(17, 2, '/storage/uploads/slides/aG9tZS0x_64f143ff4bec2.png', 0, '2023-09-01 01:53:03', '2024-08-20 19:08:15'),
(18, 3, '/storage/uploads/slides/aG9tZS0x_64f1442567827.png', 0, '2023-09-01 01:53:41', '2024-08-21 21:23:40'),
(19, 3, '/storage/uploads/slides/aG9tZS0x_64f144256a286.png', 0, '2023-09-01 01:53:41', '2024-08-20 19:36:54'),
(20, 3, '/storage/uploads/slides/aG9tZS0x_64f144256b391.png', 0, '2023-09-01 01:53:41', '2024-08-20 19:36:49'),
(21, 3, '/storage/uploads/slides/aG9tZS0x_64f144256c1b6.png', 0, '2023-09-01 01:53:41', '2024-08-20 19:36:44'),
(22, 5, '/storage/uploads/slides/aG9tZS0x_64f14446c31b4.png', 0, '2023-09-01 01:54:14', '2024-08-21 21:53:16'),
(23, 5, '/storage/uploads/slides/aG9tZS0x_64f14446c5693.png', 0, '2023-09-01 01:54:14', '2024-08-21 21:51:37'),
(24, 1, '/storage/uploads/slides/aG9tZS0x_64f4606d168ae.jpeg', 0, '2023-09-03 10:31:09', '2025-02-18 14:14:33'),
(25, 1, '/storage/uploads/slides/aG9tZS0x_64f4610d69ef9.jpeg', 0, '2023-09-03 10:33:49', '2025-02-18 14:14:29'),
(26, 2, '/storage/uploads/slides/aG9tZS0x_667d638b1bdd4.jpeg', 0, '2024-06-27 13:05:15', '2024-06-27 20:06:05'),
(27, 2, '/storage/uploads/slides/aG9tZS0x_667d63e057b5a.jpeg', 0, '2024-06-27 13:06:40', '2024-06-27 20:07:04'),
(28, 2, '/storage/uploads/slides/aG9tZS0x_667f67d57fd2a.jpeg', 0, '2024-06-29 01:48:05', '2024-06-29 08:49:05'),
(29, 2, '/storage/uploads/slides/aG9tZS0x_667f6839167c1.jpeg', 0, '2024-06-29 01:49:45', '2024-06-29 09:26:53'),
(30, 2, '/storage/uploads/slides/aG9tZS0x_667f710d07163.jpeg', 0, '2024-06-29 02:27:25', '2024-06-29 09:27:30'),
(31, 2, '/storage/uploads/slides/aG9tZS0x_667f7153e9a0e.jpeg', 0, '2024-06-29 02:28:35', '2024-06-29 09:28:52'),
(32, 5, '/storage/uploads/slides/aG9tZS0x_667f717c78e55.jpeg', 0, '2024-06-29 02:29:16', '2024-06-29 09:29:23'),
(33, 3, '/storage/uploads/slides/aG9tZS0x_6681f998bf538.jpeg', 0, '2024-07-01 00:34:32', '2024-07-01 07:34:38'),
(34, 2, '/storage/uploads/slides/aG9tZS0x_668896a6884f4.jpeg', 0, '2024-07-06 00:58:14', '2024-07-06 07:58:25'),
(35, 2, '/storage/uploads/slides/aG9tZS0x_66bebfa848f27.jpeg', 0, '2024-08-16 02:55:36', '2024-08-19 07:31:55'),
(36, 2, '/storage/uploads/slides/aG9tZS0x_66c285c1e9447.png', 0, '2024-08-18 23:37:37', '2024-08-19 07:32:00'),
(37, 2, '/storage/uploads/slides/aG9tZS0x_66c2899fa75d4.png', 0, '2024-08-18 23:54:07', '2024-08-19 07:32:04'),
(38, 2, '/storage/uploads/slides/aG9tZS0x_66c28aba2b25e.png', 0, '2024-08-18 23:58:50', '2024-08-19 07:32:08'),
(39, 2, '/storage/uploads/slides/aG9tZS0x_66c2926c7228c.png', 0, '2024-08-19 00:31:40', '2024-08-20 19:05:21'),
(40, 3, '/storage/uploads/slides/aG9tZS0x_66c293877127e.jpeg', 0, '2024-08-19 00:36:23', '2024-08-20 19:27:33'),
(41, 2, '/storage/uploads/slides/aG9tZS0x_66c483eb25c3b.jpeg', 1, '2024-08-20 11:54:19', '2024-08-20 11:54:19'),
(42, 2, '/storage/uploads/slides/aG9tZS0x_66c486454a3ae.jpeg', 1, '2024-08-20 12:04:21', '2024-08-20 12:04:21'),
(43, 2, '/storage/uploads/slides/aG9tZS0x_66c486772884c.jpeg', 0, '2024-08-20 12:05:11', '2024-08-21 21:42:24'),
(44, 2, '/storage/uploads/slides/aG9tZS0x_66c486a8d6931.jpeg', 0, '2024-08-20 12:06:00', '2024-08-21 21:44:07'),
(45, 2, '/storage/uploads/slides/aG9tZS0x_66c486cceb2d2.jpeg', 0, '2024-08-20 12:06:36', '2025-05-23 13:16:31'),
(46, 2, '/storage/uploads/slides/aG9tZS0x_66c487002b6f6.jpeg', 1, '2024-08-20 12:07:28', '2024-08-20 12:07:28'),
(47, 2, '/storage/uploads/slides/aG9tZS0x_66c48892dcc65.jpeg', 1, '2024-08-20 12:14:10', '2024-08-20 12:14:10'),
(48, 3, '/storage/uploads/slides/aG9tZS0x_66c48ba83ef0a.jpeg', 0, '2024-08-20 12:27:20', '2024-08-21 21:24:20'),
(49, 3, '/storage/uploads/slides/aG9tZS0x_66c48c275a63d.jpeg', 0, '2024-08-20 12:29:27', '2024-08-20 19:29:32'),
(50, 3, '/storage/uploads/slides/aG9tZS0x_66c48c6dd0a9d.jpeg', 0, '2024-08-20 12:30:37', '2024-08-20 19:30:42'),
(51, 3, '/storage/uploads/slides/aG9tZS0x_66c48cb51b9ab.jpeg', 0, '2024-08-20 12:31:49', '2024-08-21 21:27:44'),
(52, 3, '/storage/uploads/slides/aG9tZS0x_66c48d3f3f026.jpeg', 0, '2024-08-20 12:34:07', '2024-08-20 19:34:13'),
(53, 3, '/storage/uploads/slides/aG9tZS0x_66c48d3f3f62c.jpeg', 0, '2024-08-20 12:34:07', '2024-08-21 21:23:11'),
(54, 3, '/storage/uploads/slides/aG9tZS0x_66c48df528fb8.jpeg', 0, '2024-08-20 12:37:09', '2024-08-21 21:22:15'),
(55, 3, '/storage/uploads/slides/aG9tZS0x_66c48e3370d96.jpeg', 0, '2024-08-20 12:38:11', '2024-08-21 21:21:20'),
(56, 5, '/storage/uploads/slides/aG9tZS0x_66c49071055d6.jpeg', 1, '2024-08-20 12:47:45', '2024-08-20 12:47:45'),
(57, 3, '/storage/uploads/slides/aG9tZS0x_66c5f7f0480b8.png', 1, '2024-08-21 14:21:36', '2024-08-21 14:21:36'),
(58, 3, '/storage/uploads/slides/aG9tZS0x_66c5f8246c032.png', 1, '2024-08-21 14:22:28', '2024-08-21 14:22:28'),
(59, 3, '/storage/uploads/slides/aG9tZS0x_66c5f85cdc3f1.png', 1, '2024-08-21 14:23:24', '2024-08-21 14:23:24'),
(60, 3, '/storage/uploads/slides/aG9tZS0x_66c5f8a4499f6.png', 1, '2024-08-21 14:24:36', '2024-08-21 14:24:36'),
(61, 3, '/storage/uploads/slides/aG9tZS0x_66c5f8fdc2b22.png', 1, '2024-08-21 14:26:05', '2024-08-21 14:26:05'),
(62, 3, '/storage/uploads/slides/aG9tZS0x_66c5f96d20e3f.png', 1, '2024-08-21 14:27:57', '2024-08-21 14:27:57'),
(63, 3, '/storage/uploads/slides/aG9tZS0x_66c5f9bb4091a.png', 1, '2024-08-21 14:29:15', '2024-08-21 14:29:15'),
(64, 3, '/storage/uploads/slides/aG9tZS0x_66c5fa0bf41b3.png', 1, '2024-08-21 14:30:36', '2024-08-21 14:30:36'),
(65, 3, '/storage/uploads/slides/aG9tZS0x_66c5fa51a8944.png', 1, '2024-08-21 14:31:45', '2024-08-21 14:31:45'),
(66, 3, '/storage/uploads/slides/aG9tZS0x_66c5fa79abdc5.png', 1, '2024-08-21 14:32:25', '2024-08-21 14:32:25'),
(67, 3, '/storage/uploads/slides/aG9tZS0x_66c5faa06ed1e.png', 1, '2024-08-21 14:33:04', '2024-08-21 14:33:04'),
(68, 3, '/storage/uploads/slides/aG9tZS0x_66c5fb2222032.png', 1, '2024-08-21 14:35:14', '2024-08-21 14:35:14'),
(69, 3, '/storage/uploads/slides/aG9tZS0x_66c5fb8d513c9.png', 1, '2024-08-21 14:37:01', '2024-08-21 14:37:01'),
(70, 3, '/storage/uploads/slides/aG9tZS0x_66c5fc288ddcf.png', 0, '2024-08-21 14:39:36', '2025-05-23 13:16:19'),
(71, 3, '/storage/uploads/slides/aG9tZS0x_66c5fc9a30776.png', 1, '2024-08-21 14:41:30', '2024-08-21 14:41:30'),
(72, 2, '/storage/uploads/slides/aG9tZS0x_66c5fd03846ee.png', 1, '2024-08-21 14:43:15', '2024-08-21 14:43:15'),
(73, 2, '/storage/uploads/slides/aG9tZS0x_66c5fd44d8ccd.png', 1, '2024-08-21 14:44:20', '2024-08-21 14:44:20'),
(74, 2, '/storage/uploads/slides/aG9tZS0x_66c5fd7c6b226.jpeg', 0, '2024-08-21 14:45:16', '2024-08-21 21:45:29'),
(75, 2, '/storage/uploads/slides/aG9tZS0x_66c5fe0d33ad7.jpeg', 1, '2024-08-21 14:47:41', '2024-08-21 14:47:41'),
(76, 2, '/storage/uploads/slides/aG9tZS0x_66c5fe3bc636a.png', 1, '2024-08-21 14:48:27', '2024-08-21 14:48:27'),
(77, 2, '/storage/uploads/slides/aG9tZS0x_66c5fe67e186c.jpeg', 1, '2024-08-21 14:49:11', '2024-08-21 14:49:11'),
(78, 5, '/storage/uploads/slides/aG9tZS0x_66c5ff08364f8.jpeg', 1, '2024-08-21 14:51:52', '2024-08-21 14:51:52'),
(79, 2, '/storage/uploads/slides/aG9tZS0x_66c6001c34679.mp4', 0, '2024-08-21 14:56:28', '2024-08-21 21:56:45'),
(80, 5, '/storage/uploads/slides/aG9tZS0x_66c600c578c81.jpeg', 1, '2024-08-21 14:59:17', '2024-08-21 14:59:17'),
(81, 2, '/storage/uploads/slides/aG9tZS0x_66d1710772571.jpeg', 0, '2024-08-30 07:13:11', '2025-05-25 16:04:15'),
(82, 2, '/storage/uploads/slides/aG9tZS0x_66d17b9cabe37.jpeg', 1, '2024-08-30 07:58:20', '2024-08-30 07:58:20'),
(83, 1, '/storage/uploads/slides/aG9tZS0x_67b433897c936.png', 0, '2025-02-18 07:15:21', '2025-02-18 14:16:29'),
(84, 1, '/storage/uploads/slides/aG9tZS0x_67b437f44e563.jpeg', 1, '2025-02-18 07:34:12', '2025-02-18 07:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `slide_group`
--

CREATE TABLE `slide_group` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide_group`
--

INSERT INTO `slide_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'home-1', '2023-08-30 01:23:31', '2023-08-30 01:23:58'),
(2, 'sustainability-1', '2023-08-30 01:23:31', '2023-08-30 01:23:31'),
(3, 'sustainability-2', '2023-08-30 01:23:31', '2023-08-30 01:23:31'),
(4, 'sustainability-3', '2023-08-30 01:23:31', '2023-08-30 01:23:31'),
(5, 'sustainability-4', '2023-08-30 06:55:06', '2023-08-30 06:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('superadmin','admin','writer') DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `can_delete` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `can_delete`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', 'Rangga Aditya Julian Evirizal', 'admin@mail.com', '2023-08-12 17:00:00', '$2y$10$fyUkWoxcjd9oETfBN64XS.lzmjcwEcm3hliA9n9Mc6Kx7AyYd/yKa', NULL, 0, 0, NULL, '2025-02-18 11:52:51', NULL),
(2, 'writer', 'joe taslim', 'deleted', '2023-08-12 17:00:00', 'deleted', NULL, 1, 1, NULL, '2025-02-18 11:53:03', '2025-02-18 11:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint(20) NOT NULL,
  `video_group_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cover` text NOT NULL,
  `video` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video_group_id`, `name`, `description`, `cover`, `video`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'zainal mubtadiin', 'front officer', '/storage/uploads/video/cGhvdG96YWluYWwgbXVidGFkaWlu_64ef747026754.jpg', '/storage/uploads/video/dmlkZW96YWluYWwgbXVidGFkaWlu_64ef747026528.mp4', 0, '2023-08-30 16:55:12', '2023-08-30 18:05:31'),
(2, 1, 'khasna sari utami', 'front officer', '/storage/uploads/video/cGhvdG9raGFzbmEgc2FyaSB1dGFtaQ==_64ef804edfdb9.jpg', '/storage/uploads/video/dmlkZW9raGFzbmEgc2FyaSB1dGFtaQ==_64ef804edfab9.mp4', 0, '2023-08-30 17:45:50', '2023-09-01 01:55:15'),
(3, 1, 'rosmalinda jean', 'network security', '/storage/uploads/video/cGhvdG9yb3NtYWxpbmRhIGplYW4=_64ef813c55435.jpg', '/storage/uploads/video/dmlkZW9yb3NtYWxpbmRhIGplYW4=_64ef813c55148.mp4', 0, '2023-08-30 17:49:48', '2023-09-01 01:55:19'),
(4, 1, 'jaja juju', 'car washer', '/storage/uploads/video/cGhvdG9qYWphIGp1anU=_64ef81a649467.jpg', '/storage/uploads/video/dmlkZW9qYWphIGp1anU=_64ef81a6492fb.mp4', 0, '2023-08-30 17:51:34', '2023-08-30 18:06:09'),
(5, 2, 'Yessica Kristiana Putri Adi', 'Assessment Center', '/storage/uploads/video/cGhvdG9DYWh5YW50byBIYXJkaWFuc3lhaA==_64f1460ac3270.jpg', '/storage/uploads/video/dmlkZW9DYWh5YW50byBIYXJkaWFuc3lhaA==_64f1460ac30d3.mp4', 0, '2023-09-01 02:01:46', '2024-08-20 10:27:03'),
(6, 1, 'Tiara Handayani', 'front officer', '/storage/uploads/video/cGhvdG9UaWFyYSBIYW5kYXlhbmk=_64f146faa4e42.webp', '/storage/uploads/video/dmlkZW9UaWFyYSBIYW5kYXlhbmk=_64f146faa4c0d.mp4', 0, '2023-09-01 02:05:46', '2024-08-20 10:26:45'),
(7, 1, 'Rusman Maheswara', 'Backend developer', '/storage/uploads/video/cGhvdG9SdXNtYW4gTWFoZXN3YXJh_64f1477cedf27.jpg', '/storage/uploads/video/dmlkZW9SdXNtYW4gTWFoZXN3YXJh_64f1477cedd40.mp4', 0, '2023-09-01 02:07:56', '2024-08-20 10:26:40'),
(8, 1, 'Mursinin Lazuardi', 'Backend developer', '/storage/uploads/video/cGhvdG9NdXJzaW5pbiBMYXp1YXJkaQ==_64f14806c1eb3.webp', '/storage/uploads/video/dmlkZW9NdXJzaW5pbiBMYXp1YXJkaQ==_64f14806c1ccb.mp4', 0, '2023-09-01 02:10:14', '2024-08-20 10:22:42'),
(9, 1, 'Garang Prasetyo', 'QA Engineer', '/storage/uploads/video/cGhvdG9HYXJhbmcgUHJhc2V0eW8=_64f1486a0f714.jpg', '/storage/uploads/video/dmlkZW9HYXJhbmcgUHJhc2V0eW8=_64f1486a0f59f.mp4', 0, '2023-09-01 02:11:54', '2024-08-20 10:22:34'),
(10, 1, 'Rudi Suryono', 'System analyst', '/storage/uploads/video/cGhvdG9SdWRpIFN1cnlvbm8=_64f148ca43a78.jpg', '/storage/uploads/video/dmlkZW9SdWRpIFN1cnlvbm8=_64f148ca43900.mp4', 0, '2023-09-01 02:13:30', '2024-08-20 10:22:00'),
(11, 1, 'Gada Rajasa', 'network administrator', '/storage/uploads/video/cGhvdG9HYWRhIFJhamFzYQ==_64f148f831c8b.webp', '/storage/uploads/video/dmlkZW9HYWRhIFJhamFzYQ==_64f148f831a3e.mp4', 0, '2023-09-01 02:14:16', '2024-08-20 10:22:19'),
(12, 2, 'AT & FT Training Batch 3', 'Training Documentary', '/storage/uploads/video/cGhvdG9BVCAmIEZUIFRyYWluaW5nIEJhdGNoIDM=_64f42d6210449.png', '/storage/uploads/video/dmlkZW9BVCAmIEZUIFRyYWluaW5nIEJhdGNoIDM=_64f42d621025a.mp4', 1, '2023-09-03 06:53:22', '2023-09-03 06:53:22'),
(13, 2, 'Adita Handayani', 'Best Assistant', '/storage/uploads/video/cGhvdG9BZGl0YSBIYW5kYXlhbmk=_64f42da5de483.png', '/storage/uploads/video/dmlkZW9BZGl0YSBIYW5kYXlhbmk=_64f42da5de167.mp4', 1, '2023-09-03 06:54:29', '2023-09-03 06:54:29'),
(14, 2, 'Aryo Maulana', 'Best Foreman', '/storage/uploads/video/cGhvdG9BcnlvIE1hdWxhbmE=_64f42de112cc3.png', '/storage/uploads/video/dmlkZW9BcnlvIE1hdWxhbmE=_64f42de112b24.mp4', 1, '2023-09-03 06:55:29', '2023-09-03 06:55:29'),
(15, 2, 'Anggoro Syahputro', 'Best AT Batch 3', '/storage/uploads/video/cGhvdG9Bbmdnb3JvIFN5YWhwdXRybw==_64f42e0614aef.png', '/storage/uploads/video/dmlkZW9Bbmdnb3JvIFN5YWhwdXRybw==_64f42e06148b9.mp4', 1, '2023-09-03 06:56:06', '2023-09-03 06:56:06'),
(16, 2, 'Tonny Irawan', 'Best FT 2023', '/storage/uploads/video/cGhvdG9Ub25ueSBJcmF3YW4=_64f42e2ce5123.png', '/storage/uploads/video/dmlkZW9Ub25ueSBJcmF3YW4=_64f42e2ce4fc3.mp4', 1, '2023-09-03 06:56:44', '2023-09-03 06:56:44'),
(17, 1, 'Jane Veronica', 'Cash Management', '/storage/uploads/video/cGhvdG9KYW5lIFZlcm9uaWNh_66c410cb0c39a.jpeg', '/storage/uploads/video/dmlkZW9KYW5lIFZlcm9uaWNh_66c410cb116a6.mp4', 1, '2024-08-20 03:43:07', '2024-08-20 03:43:07'),
(18, 1, 'Nicholas Andreanus Sugianto', 'Human Resources', '/storage/uploads/video/cGhvdG9OaWNob2xhcyBBbmRyZWFudXMgU3VnaWFudG8=_66c412aa4315d.jpeg', '/storage/uploads/video/dmlkZW9OaWNob2xhcyBBbmRyZWFudXMgU3VnaWFudG8=_66c412aa4610f.mp4', 1, '2024-08-20 03:51:06', '2024-08-20 03:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `video_group`
--

CREATE TABLE `video_group` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_group`
--

INSERT INTO `video_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'live-in', '2023-08-23 16:44:58', '2023-08-23 16:44:58'),
(2, 'career', '2023-08-23 16:45:08', '2023-08-23 16:45:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_category_id` (`category_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_history`
--
ALTER TABLE `blog_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_visitor`
--
ALTER TABLE `blog_visitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_blog_id` (`blog_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_image`
--
ALTER TABLE `certificate_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certification_logo`
--
ALTER TABLE `certification_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_social`
--
ALTER TABLE `contact_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover`
--
ALTER TABLE `cover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `key_value`
--
ALTER TABLE `key_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lang_id` (`lang_id`),
  ADD KEY `f_group_id` (`group_id`);

--
-- Indexes for table `lang_group`
--
ALTER TABLE `lang_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_in`
--
ALTER TABLE `live_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_in_people`
--
ALTER TABLE `live_in_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_slide_group_id` (`group_id`);

--
-- Indexes for table `slide_group`
--
ALTER TABLE `slide_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_video_group_id` (`video_group_id`);

--
-- Indexes for table `video_group`
--
ALTER TABLE `video_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_history`
--
ALTER TABLE `blog_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_visitor`
--
ALTER TABLE `blog_visitor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `certificate_image`
--
ALTER TABLE `certificate_image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `certification_logo`
--
ALTER TABLE `certification_logo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_social`
--
ALTER TABLE `contact_social`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cover`
--
ALTER TABLE `cover`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `key_value`
--
ALTER TABLE `key_value`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `lang_group`
--
ALTER TABLE `lang_group`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `live_in`
--
ALTER TABLE `live_in`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `live_in_people`
--
ALTER TABLE `live_in_people`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `slide_group`
--
ALTER TABLE `slide_group`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `video_group`
--
ALTER TABLE `video_group`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `f_category_id` FOREIGN KEY (`category_id`) REFERENCES `blog_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_visitor`
--
ALTER TABLE `blog_visitor`
  ADD CONSTRAINT `f_blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lang`
--
ALTER TABLE `lang`
  ADD CONSTRAINT `f_group_id` FOREIGN KEY (`group_id`) REFERENCES `lang_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `f_slide_group_id` FOREIGN KEY (`group_id`) REFERENCES `slide_group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `f_video_group_id` FOREIGN KEY (`video_group_id`) REFERENCES `video_group` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
