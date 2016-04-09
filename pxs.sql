-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 04:40 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `px`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `idbank` varchar(4) NOT NULL DEFAULT '0',
  `nama_bank` varchar(10) NOT NULL,
  `no_rekening` varchar(50) NOT NULL DEFAULT '',
  `nama_pemilik` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`idbank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`idbank`, `nama_bank`, `no_rekening`, `nama_pemilik`) VALUES
('B001', 'BCA', '7840418787', 'Ramon Owen');

-- --------------------------------------------------------

--
-- Table structure for table `contributor`
--

DROP TABLE IF EXISTS `contributor`;
CREATE TABLE IF NOT EXISTS `contributor` (
  `memberid` varchar(6) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `no_identitas` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_daftar` date NOT NULL,
  `paket` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `app_status` int(1) NOT NULL,
  `trusted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`memberid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributor`
--

INSERT INTO `contributor` (`memberid`, `username`, `password`, `no_identitas`, `nama`, `tanggal_lahir`, `tanggal_daftar`, `paket`, `email`, `status`, `alamat`, `foto`, `app_status`, `trusted`) VALUES
('C00001', 'monotz', '420e6bec827d907c3caa56ea6efbe246', '', 'epul jamilz', '0000-00-00', '2016-02-09', 0, 'spiritofmonot@yahoo.com', 'C', '', 'a7d26dd92b1b551850d56a69c7f1c9bf.jpg', 2, 0),
('C00002', 'felixgalaxy8', '1130a355aa0b0e797b53081162097ad1', '', '', '0000-00-00', '2016-02-11', 0, 'felixgalaxy8@gmail.com', 'C', '', '', 2, 0),
('C00003', 'fsekatama', '795c0288d60bbd8c1f0bd8530dff321f', '3204121905900002', 'Fajar Satria Ekatama', '1990-05-19', '2016-02-11', 0, 'fs.ekatama@gmail.com', 'C', 'Jl. Soekaarno-Hatta Gg.Situgunting Barat 30A - Bandung', '92892b80ee5300fda542571ea617b747.jpg', 2, 0),
('C00004', 'anakayam', '070b544f80462ce4ff09578f32054f65', '', '', NULL, '2016-02-11', 0, 'agitnaeta@gmail.com', 'C', '', '', 2, 0),
('C00005', 'daiker96', '00feddcdb73203d03e35d4e470ac90c2', '', '', '0000-00-00', '2016-02-12', 0, 'yung.jr81@gmail.com', 'C', '', '', 2, 0),
('C00006', 'defriariyanto', 'a71c0e97374ad924ef0b316e35ff9c22', '', '', '0000-00-00', '2016-02-16', 0, 'defri@bps.go.id', 'C', '', '', 2, 0),
('C00007', 'Prstyodw', '623a19bdda7b13ed4e9c395480b9369a', '', 'Dwi prasetyo', '1995-09-24', '2016-02-16', 0, '24prstyodw@gmail.com', 'C', 'Yogyakarta', '8e6468d153288e6066107dc3fedfb601.jpg', 2, 0),
('C00008', 'RKphoto', '98ea50a74e967d164e7bb5352278ec39', '', '', '0000-00-00', '2016-02-16', 0, 'ramondekong@gmail.com', 'C', '', '', 2, 0),
('C00009', 'CKphotography', 'e10adc3949ba59abbe56e057f20f883e', '', '', '0000-00-00', '2016-02-16', 0, 'chu.kiang@yahoo.com', 'C', '', '', 2, 0),
('C00010', 'life108', '2214b006caec800eb1992282f5e15cd7', '', '', '0000-00-00', '2016-02-16', 0, 'life.chandra@gmail.com', 'C', '', '', 2, 0),
('C00011', 'roneysyah', '98ad1e47b0fb934d29b3c3a4ae488680', '', '', '0000-00-00', '2016-02-19', 0, 'roneytirta@gmail.com', 'C', '', '', 2, 0),
('C00012', 'adinugraha', '3903027f75aafa69076c68488afac8de', '3271020904920006', 'Muhammad Adi Nugraha', '1992-04-09', '2016-02-22', 0, 'adinugraha.bogor@yahoo.com', 'C', 'Kp. Muara Babakan 4, Rt.03/10 Kel. Sindangrasa, Bogor 16145', 'a667dc448f90cfc70d14003a2b2a10b3.jpg', 2, 0),
('C00013', 'FirnaFajrin ', '2cffdac0cb7563265222a1789e2b40e6', '', '', '0000-00-00', '2016-02-22', 0, 'sukabola@ymail.com', 'C', '', '', 2, 0),
('C00014', 'Tropikalkoi', '93e7ae54495789168386e54052b82aa2', '', '', '0000-00-00', '2016-02-22', 0, 'tropikalkoi@yahoo.com', 'C', '', '', 2, 0),
('C00015', 'itodinata94', '140caf12c97efc00eb42e84d8f533962', '', 'Sugiarto Hadinata', '0000-00-00', '2016-02-24', 0, 'sugiarto.hadinata@mail.ugm.ac.id', 'C', 'yogyakarta', 'd03c126e0bfd15c54388cba9125d5d9c.JPG', 2, 0),
('C00016', 'fredy_bs', '6f8e86f30f86898173f1ae966775e88f', '', '', '0000-00-00', '2016-02-24', 0, 'freybond@gmail.com', 'C', '', '', 2, 0),
('C00017', 'AhmadBarokah', '516df9138fe7d9f0b0e4b615443fa6ca', '', '', '0000-00-00', '2016-02-24', 0, 'a.barokah.ab@gmail.com', 'C', '', '', 2, 0),
('C00018', 'yudialif', '7cba48ef671f8fcc3d18b93f5ed9b594', '', '', '0000-00-00', '2016-02-24', 0, 'yudialif@yahoo.co.id', 'C', '', '', 2, 0),
('C00019', 'indra21', '03e14f949bc6521ef5ecb8c23004f8de', '021', '', '1995-03-04', '2016-02-24', 0, 'indrasyaputra95.is@gmail.com', 'C', 'toboali.bangka.indonesia', '8b53a31ac88be6c6ee6c47f7118c12b6.jpg', 2, 0),
('C00021', 'zainalmuslich', '78601ee217a7af05a6b685a1e36891b8', '', '', '1990-05-20', '2016-02-26', 0, 'zainalmuslich@gmail.com', 'C', 'Malang, Jawa Timur INDONESIA', '401539ca405703eda92be5108689d2c7.jpg', 2, 0),
('C00022', 'olieolay', 'a7c6c98972ad0bd17efacfab6632d540', '', '', '0000-00-00', '2016-02-27', 0, 'thecukz@gmail.com', 'C', '', '', 2, 0),
('C00023', 'Ahmad Syaukani', 'ea0fb077a9324f98412390714310381a', '6309011811980003', 'Ahmad Syaukani', '1998-11-18', '2016-02-29', 0, 'ahmadsyaukanimk@gmail.com', 'C', 'Sungai Durian Kec. Banua Lawas Kab. Tabalong Kal-Sel Indonesia', 'c90f946085a1b405b0ac91cbc48076b1.jpg', 2, 0),
('C00024', 'taufanyanuar', 'daf5cadcf85fb648c91639960fa85780', '', 'taufan yanuar', '1996-01-27', '2016-02-29', 0, 'ovanmuslim@gmail.com', 'C', 'nangka 5 no 103b karangnongko, maguwoharjo sleman ,Diy', 'a1bd42b2af604c40e147b232845e71a9.jpg', 2, 0),
('C00025', 'swllomerah', '06690020bbc6ee5e4ede49d94f423658', '', '', '0000-00-00', '2016-03-01', 0, 'swallow.merah@gmail.com', 'C', '', '', 2, 0),
('C00026', 'GarrySiauwanda', 'adfe0b1a37eb2cfb35042c9d2e6e9175', '', 'Garry Siauwanda', '1996-10-03', '2016-03-02', 0, 'garryforall@yahoo.com', 'C', '', 'cdf075b1a3f83c02c7435977babf77f7.jpg', 2, 0),
('C00027', 'yoyyo', 'e9758145b8281ecaa7380b55314d5980', '', '', '0000-00-00', '2016-03-24', 0, 'yohan.yoyyo@gmail.com', 'C', '', '', 2, 0),
('C00028', 'OZhe', '4582a5c315cdd2c4e0ce828ca68cb489', '', '', '0000-00-00', '2016-03-24', 0, 'yoseph_hamdani@yahoo.com', 'C', '', '', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
CREATE TABLE IF NOT EXISTS `deposit` (
  `id_deposit` varchar(9) NOT NULL DEFAULT '',
  `memberid` varchar(7) NOT NULL DEFAULT '',
  `kode_paket` varchar(6) NOT NULL DEFAULT '',
  `tanggal_expired` date NOT NULL DEFAULT '0000-00-00',
  `sisa_download` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sisa_deposit` float NOT NULL DEFAULT '0',
  `tanggal_deposit` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_deposit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id_deposit`, `memberid`, `kode_paket`, `tanggal_expired`, `sisa_download`, `status`, `sisa_deposit`, `tanggal_deposit`) VALUES
('Dep000001', 'C00020\n', 'PX.003', '2016-02-29', 0, 1, 0, '2016-02-23'),
('Dep000002', 'C00020', 'PX.003', '2016-03-01', 1, 1, 0, '2016-02-25'),
('Dep000003', 'C00010', 'PX.003', '2016-03-19', 5, 1, 0, '2016-03-14'),
('Dep000004', 'C00003', 'PX.001', '2016-03-15', 1, 1, 0, '2016-03-14'),
('Dep000005', 'C00005', 'PX.003', '2016-04-07', 5, 1, -234500, '2016-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
CREATE TABLE IF NOT EXISTS `download` (
  `id_download` varchar(10) NOT NULL DEFAULT '',
  `memberid` varchar(7) NOT NULL DEFAULT '',
  `id_foto` varchar(45) NOT NULL DEFAULT '',
  `tanggal_download` date NOT NULL DEFAULT '0000-00-00',
  `link` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `big` varchar(255) NOT NULL DEFAULT '',
  `mini` varchar(255) NOT NULL DEFAULT '',
  `earning` float NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `memberid`, `id_foto`, `tanggal_download`, `link`, `status`, `big`, `mini`, `earning`) VALUES
('D000000001', 'M00018', '20160220125929', '2016-02-23', '0194G9fe454a03f0c420eb264ac02J12002f114dP56c9e772', 1, 'a304fc04c19cb70f54ee1d426ae40f74.JPG', 'a304fc04c19cb70f54ee1d426ae40f74_thumb.JPG', 25000),
('D000000002', 'M00018', '20160216205008', '2016-02-23', '8f200820bG25016b8a6dJc6f02009106626da3P7ea6228e05', 1, 'd6628b659b86f2c00a02a2f7d80e63ea.JPG', 'd6628b659b86f2c00a02a2f7d80e63ea_thumb.JPG', 25000),
('D000000003', 'M00018', '20160216202501', '2016-02-23', '2bbd0cfadbf2266b47f2274aee065c10a04eJ0eGd1102af0P', 0, 'bcfb04daecbf4bd27ad24f0aefeea706.JPG', 'bcfb04daecbf4bd27ad24f0aefeea706_thumb.JPG', 0),
('D000000004', 'M00018', '20160216202501', '2016-02-23', '200afeG12440P5a026b00a4J0bddb6f7ac12f62f7ee2c1bed', 1, 'bcfb04daecbf4bd27ad24f0aefeea706.JPG', 'bcfb04daecbf4bd27ad24f0aefeea706_thumb.JPG', 25000),
('D000000005', 'M00018', '20160216213412', '2016-02-23', '9c9a453ddG2164c1280a0088104f79267P324fc3111e1J294', 0, 'a41182ccf849098d7a0c571e3fd93494.JPG', 'a41182ccf849098d7a0c571e3fd93494_thumb.JPG', 0),
('D000000006', 'M00018', '20160216213412', '2016-02-23', '0361G1P4df12f70a9076dJ02489c42c11894394ec2a131258', 0, 'a41182ccf849098d7a0c571e3fd93494.JPG', 'a41182ccf849098d7a0c571e3fd93494_thumb.JPG', 0),
('D000000007', 'M00018', '20160216213412', '2016-02-23', '81c03cf0cd2dP4601912a2446821a721341e0199Jf79358G4', 1, 'a41182ccf849098d7a0c571e3fd93494.JPG', 'a41182ccf849098d7a0c571e3fd93494_thumb.JPG', 25000),
('D000000008', 'M00018', '20160216204208', '2016-02-23', '023de8G9eJ1026cabP2c17ff4ab11681aa42c600660117bb8', 0, '0177f9b13aeba1cd6f181ae6b6cb84ca.JPG', '0177f9b13aeba1cd6f181ae6b6cb84ca_thumb.JPG', 0),
('D000000009', 'M00018', '20160216204208', '2016-02-23', '3a1626a81e618c7a14e19df0P4JG2ab02120b0f71b0b6c68c', 0, '0177f9b13aeba1cd6f181ae6b6cb84ca.JPG', '0177f9b13aeba1cd6f181ae6b6cb84ca_thumb.JPG', 0),
('D000000010', 'M00018', '20160216204208', '2016-02-23', 'eJ8308814G609e4a0c72612661c10a71260dbc11bffPbba2a', 0, '0177f9b13aeba1cd6f181ae6b6cb84ca.JPG', '0177f9b13aeba1cd6f181ae6b6cb84ca_thumb.JPG', 0),
('D000000011', 'M00018', '20160216204208', '2016-02-23', '3f46b71P2d60bG0f187aJ104ba28ac211968ac1062bc60ee1', 1, '0177f9b13aeba1cd6f181ae6b6cb84ca.JPG', '0177f9b13aeba1cd6f181ae6b6cb84ca_thumb.JPG', 25000),
('D000000012', 'M00018', '20160216211306', '2016-02-23', '5f00d6a24aaPa46205e0e1e1f615c021G437a875a8ed9b73J', 0, 'ee4588fa7d57a90a03ac7a5bd544eafe.JPG', 'ee4588fa7d57a90a03ac7a5bd544eafe_thumb.JPG', 0),
('D000000013', 'M00018', '20160216211306', '2016-02-23', '420d408bcJ550aaeP10f807e71d546ea1329a5ae1G6af2637', 0, 'ee4588fa7d57a90a03ac7a5bd544eafe.JPG', 'ee4588fa7d57a90a03ac7a5bd544eafe_thumb.JPG', 0),
('D000000014', 'M00018', '20160216211306', '2016-02-23', '5P75d762a4a037eJaf2d062eea54c0100eaGbf49183a81165', 0, 'ee4588fa7d57a90a03ac7a5bd544eafe.JPG', 'ee4588fa7d57a90a03ac7a5bd544eafe_thumb.JPG', 0),
('D000000015', 'M00018', '20160216211306', '2016-02-23', '25P7e00feb10502a402a193Ja76da5167G48a8a456e3f1dec', 0, 'ee4588fa7d57a90a03ac7a5bd544eafe.JPG', 'ee4588fa7d57a90a03ac7a5bd544eafe_thumb.JPG', 0),
('D000000016', 'M00018', '20160216211306', '2016-02-23', 'a6442e1ee88d5e630a12c455172a3PJ00b765a7fdG0afa910', 1, 'ee4588fa7d57a90a03ac7a5bd544eafe.JPG', 'ee4588fa7d57a90a03ac7a5bd544eafe_thumb.JPG', 25000),
('D000000017', 'C00020', '20160220120914', '2016-02-25', '9c4f2c246200b2d3b031J4e713e31dc0dG9P1a00fd2cd1654', 1, 'dcd1404fc931dd2303db4f35be67ceca.JPG', 'dcd1404fc931dd2303db4f35be67ceca_thumb.JPG', 25000),
('D000000018', 'C00020', '20160220122154', '2016-02-25', 'e48G63751a92d232c2f00f4182a717efaP440d101625J705e', 1, 'a1862f9347fa81d7ecad7ee45f734050.JPG', 'a1862f9347fa81d7ecad7ee45f734050_thumb.JPG', 25000),
('D000000019', 'C00020', '20160217215446', '2016-02-25', 'd9ea279f45PJ5c2a510422a6226a0571f8cG6312a4ce60701', 1, '948d70256e2aae60a35a9acf2c157c2f.JPG', '948d70256e2aae60a35a9acf2c157c2f_thumb.JPG', 25000),
('D000000020', 'C00020', '20160212233957', '2016-02-25', '7282P1521d73aJ01e15291a3e6d81b70Ged03496b84747958', 1, '4bb047d1817ae9edd485911785e8736a.JPG', '4bb047d1817ae9edd485911785e8736a_thumb.JPG', 25000),
('D000000021', 'C00005', '20160224192200', '2016-03-23', '120842127040ffb6e2b22dd0b501Ped1136970J264567G2b8', 1, '56e870d6042bf17615b2142dd7eb8fb3.JPG', '56e870d6042bf17615b2142dd7eb8fb3_thumb.JPG', 25000),
('D000000022', 'C00005', '20160224190317', '2016-03-23', 'g34646p04c2c610f5216c1a0d907307ej227a1b11ab973772', 1, 'c26b10a4467e1aa2c7cf09b71675d733.jpg', 'c26b10a4467e1aa2c7cf09b71675d733_thumb.jpg', 25000),
('D000000023', 'C00005', '20160223173623', '2016-03-23', '3a08ebc0004eea8e97621a26eb83f7252pd173ds9636023a3', 1, 'e7b937a8e30ade64c02d9836a850feba.eps', 'ff33a754e130b51bd20543c16f8809c5_thumb.jpg', 25000),
('D000000024', 'C00005', '20160308175758', '2016-03-23', 'b0f5b7d302s1b507761128376055d1c808e86pf55ee73e071', 1, '3e2db1070ff17bde65781635ce5b8057.eps', 'd9c6519eb28c361a1cf75c94ed0dde3b_thumb.jpg', 25000),
('D000000025', 'C00005', '20160223174130', '2016-03-23', 'd29106s7a272ab1591f8317f6f9a101524c75f19p606e8c23', 1, '2cb98816ff66c557a15f7a219d17f9a9.eps', 'e7267852bc4340371f7be9b9340edbbb_thumb.jpg', 25000),
('D000000026', 'C00005', '20160223174948', '2016-03-23', '1184486ba2e72550a89e25f65000s1718f246ep95de7598e3', 1, '88a698be95512467f8ae051ef0755e5d.eps', '2f25dcdbcbd2df930b4ff501a3da8fc2_thumb.jpg', 25000),
('D000000027', 'C00005', '20160223175501', '2016-03-23', '6s74445202ep971990a7ad0bf1e233e5aeb8295d1b95ae30d', 1, 'd890baa429db9bafe4395e73957eaed4.eps', '2371ce799db1241efa65a040b13898a1_thumb.jpg', 25000),
('D000000028', 'C00005', '20160223175844', '2016-03-23', 'd9a7c81e0006c53f778243210p8c7a660204s82e42f42a73a', 1, '28d7830227a4c0ac8cf0706a9637f4ea.eps', '3213e7c2c93683539200740f3db89107_thumb.jpg', 25000),
('D000000029', 'C00005', '20160223180938', '2016-03-23', '78f722e18b093sce7pf2dd3f06e59d8ceda9e026b2b169841', 1, 'c86be7efafc9d5e4961d2b27f8dd9e7b.eps', '5fbbfb6cf9fa821512664fb8443e8e5e_thumb.jpg', 25000),
('D000000030', 'C00005', '20160308175004', '2016-03-23', '58660706de099b4218182ac66d215pb1a64c0380sd01e5cc4', 1, '5db4288d4bcc1c80669e952d11aac666.eps', '1e7d96ae871335e58238c6cd7d11b376_thumb.jpg', 25000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `earning`
--
DROP VIEW IF EXISTS `earning`;
CREATE TABLE IF NOT EXISTS `earning` (
`id_download` varchar(10)
,`id_foto` varchar(15)
,`earning` float
,`id_contributor` varchar(20)
,`memberid` varchar(7)
,`status` tinyint(1)
,`tanggal_download` date
);

-- --------------------------------------------------------

--
-- Table structure for table `email_setting`
--

DROP TABLE IF EXISTS `email_setting`;
CREATE TABLE IF NOT EXISTS `email_setting` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `host` varchar(45) NOT NULL DEFAULT '',
  `username` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `port` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`id`, `host`, `username`, `password`, `port`) VALUES
(1, 'mail.pixtox.com', 'pixtoxco', 'pix29815', '587');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file_url`, `name`, `active`) VALUES
(3, 'SURAT_PERNYATAAN_(Model_Release).pdf', 'Model Release', 1);

-- --------------------------------------------------------

--
-- Table structure for table `firstlogin`
--

DROP TABLE IF EXISTS `firstlogin`;
CREATE TABLE IF NOT EXISTS `firstlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` varchar(6) NOT NULL DEFAULT '',
  `token` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firstlogin`
--

INSERT INTO `firstlogin` (`id`, `memberid`, `token`, `password`, `status`) VALUES
(102, 'M00001', 'f3lt3W9ObgTqdSu', 'be4493dac60b78d75c4d90bc71bb7611', 1),
(105, 'C00001', 'pDA3TpopnLm1Ljt', '420e6bec827d907c3caa56ea6efbe246', 1),
(108, 'C00002', 'RQUNYkijqaMzrSY', '1130a355aa0b0e797b53081162097ad1', 1),
(111, 'C00003', 'CCCPLdopLYjUmDy', '795c0288d60bbd8c1f0bd8530dff321f', 1),
(112, 'C00004', '6pOeDiIsg8rBUdR', '070b544f80462ce4ff09578f32054f65', 1),
(114, 'C00005', 'NgMSwtHuNWT7l2u', '00feddcdb73203d03e35d4e470ac90c2', 1),
(115, 'M00004', '8qXxyEZeb7wUKDb', 'b4417fb36196418d6df71488a97903c4', 1),
(117, 'M00006', 'Jy08yoh45Y9gYKg', '3ccafe254bbf441c671b259918fd19e8', 0),
(118, 'C00006', 'W3M5iJfG8DNcQ3Q', 'a71c0e97374ad924ef0b316e35ff9c22', 1),
(120, 'C00007', 'QpvQvkSZUAl7crC', '623a19bdda7b13ed4e9c395480b9369a', 1),
(122, 'C00008', 'BduHbFcHM8pUFAw', '98ea50a74e967d164e7bb5352278ec39', 1),
(125, 'C00009', 'Z4yhGffqMyTlDox', 'e10adc3949ba59abbe56e057f20f883e', 1),
(126, 'C00010', 'vQvNlWCxQLI0fAV', '2214b006caec800eb1992282f5e15cd7', 1),
(127, 'M00007', 'HAvNuoxqr1NdciU', '89e3582aa332ab3124e833f4ef9e5644', 0),
(128, 'M00008', 'hBexjv7vSn1TxlF', 'c9146556da946b25f649f113b84b9e3f', 0),
(130, 'C00011', 'dii2ONr8fulCyYs', '98ad1e47b0fb934d29b3c3a4ae488680', 1),
(131, 'M00009', 'bUR7xneJlJ9YpLQ', 'c706393914fcfb7fc8903f4341ee05b0', 0),
(132, 'M00010', 'Bvs1mfIsiqTxVPC', 'e2df9020c6ab34fa1149669e5745abb0', 0),
(133, 'M00011', 'xmDJJaqo3rrtMCe', '9082b7aeb5e1032871be6ea899321295', 1),
(135, 'C00012', 'QjcGXKkLkj70756', '3903027f75aafa69076c68488afac8de', 1),
(136, 'M00012', 'kA9TCI4SAZNoFKa', '5829a0c599463b98aaa1d7fa9f3d2b75', 0),
(138, 'C00013', '98vLPse2qd8yPQ6', '2cffdac0cb7563265222a1789e2b40e6', 1),
(139, 'M00013', 'jqhP8p5KYLxdmHi', '6283a43c3c6bf93ae7b48a07e774cec6', 0),
(140, 'M00014', 'IcfYYqbDj94zC0u', '202b8e7c443b4fb85a25983e7f9fdb9e', 0),
(141, 'M00015', 'mETDFGSCLdMkUOO', '827caad887188e66d98fcff904c45b88', 1),
(143, 'C00014', 'Nf7qVJz3ELKaj2b', '93e7ae54495789168386e54052b82aa2', 1),
(144, 'M00016', 'StA51MO4kK0Cga2', '6000a2391e9cd41c62592cb3471d1e1e', 0),
(145, 'M00017', 'QaZVBDqI7r3ZLOh', 'edbf5c35661f49b8ca0d68f16be5f3ba', 0),
(147, 'M00019', 'tYMYoT8GfVJa523', '90c41d2996061540d1c10ca76c0aa265', 0),
(148, 'M00020', 'jZyu1ClE3XHPtOF', '8651a1e07e9247e7ddd223d9e112b401', 0),
(149, 'M00021', 'E5Cp4k1KEVveYOw', '497c21021c47a86386f469deb12d0786', 0),
(157, 'M00022', 'xhikqK4hXO9ZRkd', 'd4a95cad21bcdd9475d1361ebd21936a', 0),
(158, 'M00023', 'HiElv6bv2VfU4dd', 'e55454d9f92aefa3911d671a3ed772b4', 0),
(159, 'M00024', 'CbmvzXoeRDtGvUh', 'b03d0357f3d22be29b8febd8ab2d5af1', 1),
(160, 'M00025', 'oJBA0KmfKsS5xlT', '6490e0f12627a481856679eab931fb8d', 0),
(164, 'C00015', 'rIxcELyPQVS0sI4', '140caf12c97efc00eb42e84d8f533962', 1),
(165, 'C00016', 'tyvpQgJm62NMoWX', '6f8e86f30f86898173f1ae966775e88f', 1),
(166, 'C00017', 'xsllljmmHZ5Kgio', '516df9138fe7d9f0b0e4b615443fa6ca', 1),
(168, 'C00018', 'hIpwUj9O4DDelGD', '7cba48ef671f8fcc3d18b93f5ed9b594', 1),
(169, 'M00026', 'iF7bb3fTsK0MKWr', 'ef1c10dd6a0f6007f22e6f89b6fcc976', 0),
(170, 'M00027', 'USKkGMd9SIf4TFz', '93a1739e9d0baf391e9cd47742355684', 0),
(171, 'M00028', 'YFXMv8S3rkGNYqG', '5a8f8b3102c99ff94f0b6415a63ed4e3', 0),
(174, 'C00019', 'ddC3kygqXskHgrY', '03e14f949bc6521ef5ecb8c23004f8de', 1),
(175, 'M00031', 'Lf5nmpqVrAj1wVz', '06afad2e523b69810993f70d002ed0d5', 1),
(177, 'M00032', 'matcSeZ2PvZpiPR', 'b4f309c32973ef770fac79baa92ff631', 0),
(178, 'M00033', 'IM4jO5tgF7avI1m', '70252e91c0099a1bb46afbe40bbef918', 1),
(179, 'M00034', 'afK4qqo6iwUm6R2', 'ac81e0a6c753daac5df68b2b62ff5a14', 1),
(180, 'M00035', 'mQgByWlj1y0DJdE', 'af433edb28a00e6e64315248ce9a56bc', 0),
(181, 'C00021', 'iA3bA22WW0uzB7W', '78601ee217a7af05a6b685a1e36891b8', 1),
(183, 'C00022', 'r9uYkYNAp6pG1PP', 'a7c6c98972ad0bd17efacfab6632d540', 1),
(184, 'M00036', 'TKTvMhRFiojlRmG', '0b823e13889ed3c9be49fd36e32881be', 1),
(185, 'M00037', 'rKbpj6qtzPfaKAk', '5277e0eee7b1f3ed5b77ca870e3c3290', 1),
(186, 'M00038', 'Kwa2afespNpspdq', '2f160973f6912750afbad6c46062b6b4', 0),
(188, 'M00040', 'n15BdFBqX2XT8PA', '6ce13bfe129034c588e0db679f181bbc', 0),
(189, 'C00023', 'oGTdHnl0RX8gOqU', 'ea0fb077a9324f98412390714310381a', 1),
(190, 'M00041', '2VDETl9CEQs4oXj', 'c39eb110d84895d9765806cf7784676b', 0),
(192, 'C00024', 'fOVCJEmBfMXn4SN', 'daf5cadcf85fb648c91639960fa85780', 1),
(193, 'M00042', '6tQ6L7GmgAwfqwH', '466a9fb982feafdd2d7f9cec2439610a', 1),
(194, 'M00043', '7ZsX19Y3KpHC70q', '9ebba11e4caaa942cf8fed34790872cd', 1),
(196, 'C00025', 'f1Rh4TlUM9v0mzC', '06690020bbc6ee5e4ede49d94f423658', 1),
(197, 'M00044', 'Q5Mj25yfy8tMKdh', '9bae4a03fc8436d29f2132100fa66c1b', 0),
(198, 'M00045', 'Lxp9RjQE8F4QHxV', 'f27fe3fa35222fc8bd410d89154cde33', 0),
(199, 'M00046', 'ByAvw1r8j2lhVi6', 'de2dc9ed97cc43838a22395daa33d2ef', 0),
(200, 'M00047', 'CWjO0uUEhw5KIe5', '0df91f7713428fa5a27b0a45439bae01', 0),
(201, 'M00048', '7tN3xJEXWXOhL45', '0158c1695428d9dffe76dc0a37ec1bc1', 0),
(203, 'C00026', 'smPeAD0puoP4LhN', 'adfe0b1a37eb2cfb35042c9d2e6e9175', 1),
(204, 'M00049', 'd8ynhuQIkmuJhQv', '618669533d692b10c6b82b6b6dd5432a', 0),
(206, 'M00051', '7ypkeBdQKSqVPUT', '53a77fc5e2f93c7cfb3392b828e9f10e', 0),
(209, 'M00052', 'DlTM2fVp4B1AcW3', '735a43f49046d31e6ed43bf27f6ec51e', 1),
(210, 'M00052', '3qXuWxrlnkiRi6Y', '7313786c45a0445a0e126e346773dd92', 1),
(211, 'M00052', 'EiyYhG5U0uyterM', '5b58edc00637994cd6c39d0990490915', 1),
(212, 'M00053', 'jcToesE7moUNsde', 'f3efff53478e5e3628d071c34fe9ae04', 1),
(213, 'M00054', 'X0DV9wA92IpzILK', 'e2e57f113c7c412a60ce2f04dcdb7b9f', 1),
(214, 'C00027', 'TyC7iYqkrhtwjRa', 'e9758145b8281ecaa7380b55314d5980', 1),
(216, 'C00028', 'cF4WGqZZ67L5OIv', '4582a5c315cdd2c4e0ce828ca68cb489', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` varchar(15) NOT NULL DEFAULT '',
  `judul` varchar(255) NOT NULL,
  `id_contributor` varchar(20) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `model_realise` varchar(255) NOT NULL,
  `jumlah_download` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `watermark` varchar(255) NOT NULL,
  `mini` varchar(255) NOT NULL,
  `big` varchar(255) NOT NULL,
  `temp_path` varchar(255) NOT NULL,
  `kategori` longtext NOT NULL,
  `type` varchar(10) NOT NULL,
  `image_week` tinyint(1) NOT NULL,
  `vote_by` longtext NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `judul`, `id_contributor`, `tanggal_upload`, `model_realise`, `jumlah_download`, `tag`, `status`, `watermark`, `mini`, `big`, `temp_path`, `kategori`, `type`, `image_week`, `vote_by`) VALUES
('20160212223441', 'shoes on the wooden background flour', 'C00005', '2016-02-12', '', 0, 'shoes,wood,wooden,background,object,abstract,step', 1, '2b4d429b9cae3d1fe3b7dbf25aeb999e_thumb.JPG', '2b4d429b9cae3d1fe3b7dbf25aeb999e_thumb.JPG', '2b4d429b9cae3d1fe3b7dbf25aeb999e.JPG', '2b4d429b9cae3d1fe3b7dbf25aeb999e.JPG', 'Abstract,Background/Texture,Arts', 'photo', 0, ''),
('20160212224015', 'small rocks on the green grass', 'C00005', '2016-02-12', '', 0, 'nature,rock,rocks,garden,grass,green,outdoor', 1, '9a26cccaacdcbc230127e58b72039864_thumb.JPG', '9a26cccaacdcbc230127e58b72039864_thumb.JPG', '9a26cccaacdcbc230127e58b72039864.JPG', '9a26cccaacdcbc230127e58b72039864.JPG', 'Background/Texture,Nature,Object', 'photo', 0, ''),
('20160212224846', 'yacht parking at the harbor', 'C00005', '2016-02-12', '', 0, 'yacht,cruise,sea,harbor,outdoor,vacation,island,transportation', 1, '4819c87ed918d1f3f83138b274bd614e_thumb.jpg', '4819c87ed918d1f3f83138b274bd614e_thumb.jpg', '4819c87ed918d1f3f83138b274bd614e.jpg', '4819c87ed918d1f3f83138b274bd614e.jpg', 'Object,Parks/Outdor,Transportation,Travel', 'photo', 0, ''),
('20160212230141', 'lights of heart in the night', 'C00005', '2016-02-12', '', 0, 'lights,love,heart,shine,sparkling,red,yellow,night,city', 1, '4ac9f34e654689527ac43368fa71cefd_thumb.JPG', '4ac9f34e654689527ac43368fa71cefd_thumb.JPG', '4ac9f34e654689527ac43368fa71cefd.JPG', '4ac9f34e654689527ac43368fa71cefd.JPG', 'Abstract,Background/Texture,Arts,Object', 'photo', 0, ''),
('20160212230828', 'motivation quotes', 'C00005', '2016-02-12', '', 0, 'motivation,success,dream,workhard,quotes,belief,fight,attitude', 1, '58f9f36acca5786f5fada6f971c79028_thumb.JPG', '58f9f36acca5786f5fada6f971c79028_thumb.JPG', '58f9f36acca5786f5fada6f971c79028.JPG', '58f9f36acca5786f5fada6f971c79028.JPG', 'Bussines, Education,People,Object', 'photo', 0, ''),
('20160212231802', 'apple pie served whit art design', 'C00005', '2016-02-12', '', 0, 'pie,food,indonesian,art,apple,java,drink', 1, '6ae44f0857afe529088780d0f5277695_thumb.JPG', '6ae44f0857afe529088780d0f5277695_thumb.JPG', '6ae44f0857afe529088780d0f5277695.JPG', '6ae44f0857afe529088780d0f5277695.JPG', 'Background/Texture,Food And Drink,Arts', 'photo', 0, ''),
('20160212232203', 'spalshes of rain on the window glass', 'C00005', '2016-02-12', '', 0, 'rain,light,shine,splash,window,sparkling,lights,art,abstarct', 1, 'a8d7ec308b6dd88d9c50342f53a8b433_thumb.JPG', 'a8d7ec308b6dd88d9c50342f53a8b433_thumb.JPG', 'a8d7ec308b6dd88d9c50342f53a8b433.JPG', 'a8d7ec308b6dd88d9c50342f53a8b433.JPG', 'Abstract,Background/Texture,Nature', 'photo', 0, ''),
('20160212232726', 'sunrise at tebing keraton bandung west java', 'C00005', '2016-02-12', '', 0, 'sunrise,nature,landscape,java,indonesia,morning,beauty', 1, 'fcedb2cbe6fd30cdbeb5cb95c793445d_thumb.jpg', 'fcedb2cbe6fd30cdbeb5cb95c793445d_thumb.jpg', 'fcedb2cbe6fd30cdbeb5cb95c793445d.jpg', 'fcedb2cbe6fd30cdbeb5cb95c793445d.jpg', 'Holidays,Nature,Travel', 'photo', 0, ''),
('20160212233229', 'coffee maker machine', 'C00005', '2016-02-12', '', 0, 'coffee,machine,cappucino,latte,enjoy,drink,booster,energic,maker', 1, '874a2cfdc383290da2c26bef854b3048_thumb.jpg', '874a2cfdc383290da2c26bef854b3048_thumb.jpg', '874a2cfdc383290da2c26bef854b3048.jpg', '874a2cfdc383290da2c26bef854b3048.jpg', 'Food And Drink,Industrial,Object', 'photo', 0, ''),
('20160212233957', 'aroma theraphy on the table for relaxing body and soul', 'C00005', '2016-02-12', '', 0, 'garden,green,aromatheraphy,yoga,relax,enjoy,background,', 1, '4bb047d1817ae9edd485911785e8736a_thumb.JPG', '4bb047d1817ae9edd485911785e8736a_thumb.JPG', '4bb047d1817ae9edd485911785e8736a.JPG', '4bb047d1817ae9edd485911785e8736a.JPG', 'Healtcare/Medical,Object,Parks/Outdor,Religion', 'photo', 0, ''),
('20160216170434', 'Gili Lawa Darat, Labuan Bajo', 'C00006', '2016-02-16', '', 0, 'LabuanBajo,GiliLawa,Komodo,Flores,NTT', 1, '34c89e6c62c48261677cd2abea4511f2_thumb.JPG', '34c89e6c62c48261677cd2abea4511f2_thumb.JPG', '34c89e6c62c48261677cd2abea4511f2.JPG', '34c89e6c62c48261677cd2abea4511f2.JPG', 'Nature', 'photo', 1, ''),
('20160216170657', 'Gili Lawa Darat, Labuan Bajo', 'C00006', '2016-02-16', '', 0, 'LabuanBajo,GiliLawa,Komodo,Flores,NTT', 1, 'bb4d2da418e186a25e52777d19f33b24_thumb.JPG', 'bb4d2da418e186a25e52777d19f33b24_thumb.JPG', 'bb4d2da418e186a25e52777d19f33b24.JPG', 'bb4d2da418e186a25e52777d19f33b24.JPG', '', 'photo', 1, ''),
('20160216202501', 'Tanaman plant flower', 'C00008', '2016-02-16', '', 0, 'flower,bunga,tanaman,plant,ungu,purple', 1, 'bcfb04daecbf4bd27ad24f0aefeea706_thumb.JPG', 'bcfb04daecbf4bd27ad24f0aefeea706_thumb.JPG', 'bcfb04daecbf4bd27ad24f0aefeea706.JPG', 'bcfb04daecbf4bd27ad24f0aefeea706.JPG', 'Nature', 'photo', 0, ''),
('20160216203511', 'bunga jarum unggu', 'C00008', '2016-02-16', '', 0, 'bunga,flower,bungajarum,violetflower,plant,tanaman', 1, '86399d0786efc7ae50b31dd0170947e0_thumb.JPG', '86399d0786efc7ae50b31dd0170947e0_thumb.JPG', '86399d0786efc7ae50b31dd0170947e0.JPG', '86399d0786efc7ae50b31dd0170947e0.JPG', 'Nature', 'photo', 0, ''),
('20160216204208', 'bunga putih, white flower', 'C00008', '2016-02-16', '', 0, 'flower,bunga,plant,bungaputih,bungakecil,whiteflower', 1, '0177f9b13aeba1cd6f181ae6b6cb84ca_thumb.JPG', '0177f9b13aeba1cd6f181ae6b6cb84ca_thumb.JPG', '0177f9b13aeba1cd6f181ae6b6cb84ca.JPG', '0177f9b13aeba1cd6f181ae6b6cb84ca.JPG', 'Nature', 'photo', 0, ''),
('20160216205008', 'bunga merah, red flowers', 'C00008', '2016-02-16', '', 0, 'bungamerah,redflowers,tanaman,plant,bunga,flower', 1, 'd6628b659b86f2c00a02a2f7d80e63ea_thumb.JPG', 'd6628b659b86f2c00a02a2f7d80e63ea_thumb.JPG', 'd6628b659b86f2c00a02a2f7d80e63ea.JPG', 'd6628b659b86f2c00a02a2f7d80e63ea.JPG', 'Nature', 'photo', 0, ''),
('20160216210811', 'bunga kamboja kuning', 'C00008', '2016-02-16', '', 0, 'bungakuning,yellowflower,tanaman,plant,pohon,kambojaflower', 1, 'fe48857cfa50053cc1fc4d36b74c176d_thumb.JPG', 'fe48857cfa50053cc1fc4d36b74c176d_thumb.JPG', 'fe48857cfa50053cc1fc4d36b74c176d.JPG', 'fe48857cfa50053cc1fc4d36b74c176d.JPG', 'Nature', 'photo', 0, ''),
('20160216211306', 'bunga bintang ungu', 'C00008', '2016-02-16', '', 0, 'bunga,bungabintang,red,merah,bungamerah,flower,redflower', 1, 'ee4588fa7d57a90a03ac7a5bd544eafe_thumb.JPG', 'ee4588fa7d57a90a03ac7a5bd544eafe_thumb.JPG', 'ee4588fa7d57a90a03ac7a5bd544eafe.JPG', 'ee4588fa7d57a90a03ac7a5bd544eafe.JPG', 'Nature', 'photo', 0, ''),
('20160216212028', 'bunga biru', 'C00008', '2016-02-16', '', 0, 'bunga,biru,flower,tanaman,bungabiru,plant', 1, '359439d4d5a071052ad0bebe464d5829_thumb.JPG', '359439d4d5a071052ad0bebe464d5829_thumb.JPG', '359439d4d5a071052ad0bebe464d5829.JPG', '359439d4d5a071052ad0bebe464d5829.JPG', 'Nature', 'photo', 0, ''),
('20160216212424', 'bunga nanas', 'C00008', '2016-02-16', '', 0, 'bungakuning,yellowflower,tanaman,plant,pohon,nanas,pineapple', 1, '6c1f6d3441a3fb1883d358af085cd417_thumb.JPG', '6c1f6d3441a3fb1883d358af085cd417_thumb.JPG', '6c1f6d3441a3fb1883d358af085cd417.JPG', '6c1f6d3441a3fb1883d358af085cd417.JPG', 'Nature', 'photo', 0, ''),
('20160216213412', 'bunga biru bulat', 'C00008', '2016-02-16', '', 0, 'bungabiru,flower,plant,tanaman,bunga,blueflower', 1, 'a41182ccf849098d7a0c571e3fd93494_thumb.JPG', 'a41182ccf849098d7a0c571e3fd93494_thumb.JPG', 'a41182ccf849098d7a0c571e3fd93494.JPG', 'a41182ccf849098d7a0c571e3fd93494.JPG', 'Nature', 'photo', 0, ''),
('20160216214331', 'lebah biru', 'C00008', '2016-02-16', '', 0, 'lebah,bee,lebahbiru,lebahhitam,serangga,animal', 1, 'baf96a6c5d487c8eb846fdc53805f4fa_thumb.JPG', 'baf96a6c5d487c8eb846fdc53805f4fa_thumb.JPG', 'baf96a6c5d487c8eb846fdc53805f4fa.JPG', 'baf96a6c5d487c8eb846fdc53805f4fa.JPG', 'Animal/Wildlife', 'photo', 0, ''),
('20160216215216', 'bunga kuning', 'C00008', '2016-02-16', '', 0, 'bunga,flower,bungakuning,plant,tanaman,yellowflower', 1, 'f6b112c5bf79761067391f450657e88b_thumb.JPG', 'f6b112c5bf79761067391f450657e88b_thumb.JPG', 'f6b112c5bf79761067391f450657e88b.JPG', 'f6b112c5bf79761067391f450657e88b.JPG', 'Nature', 'photo', 0, ''),
('20160216215744', 'bunga merah bulat', 'C00008', '2016-02-16', '', 0, 'bungamerah,bungakuning,flower,redflower,tanaman,plant', 1, '8c9ec098a28bf0d15e776126a75f971d_thumb.JPG', '8c9ec098a28bf0d15e776126a75f971d_thumb.JPG', '8c9ec098a28bf0d15e776126a75f971d.JPG', '8c9ec098a28bf0d15e776126a75f971d.JPG', 'Nature', 'photo', 0, ''),
('20160216220253', 'Bunga Pink', 'C00008', '2016-02-16', '', 0, 'bungapink,flower,bunga,plant,flowers,tanaman', 1, '47de821fd74847bfe87ffa38c914f777_thumb.JPG', '47de821fd74847bfe87ffa38c914f777_thumb.JPG', '47de821fd74847bfe87ffa38c914f777.JPG', '47de821fd74847bfe87ffa38c914f777.JPG', 'Nature', 'photo', 0, ''),
('20160216220837', 'Lumut putih', 'C00008', '2016-02-16', '', 0, 'tanaman,plant,lumut,bunga,flowerputih,tumbuhan', 1, '0125fe3ce889a383fef54fa3b996ca20_thumb.JPG', '0125fe3ce889a383fef54fa3b996ca20_thumb.JPG', '0125fe3ce889a383fef54fa3b996ca20.JPG', '0125fe3ce889a383fef54fa3b996ca20.JPG', 'Nature', 'photo', 0, ''),
('20160216221704', 'bambi in the jungle', 'C00009', '2016-02-16', '', 0, 'bambi,deer,animal,wildlife,nature', 1, 'abf91dbc5f7a07af9754d29c328b6cd8_thumb.JPG', 'abf91dbc5f7a07af9754d29c328b6cd8_thumb.JPG', 'abf91dbc5f7a07af9754d29c328b6cd8.JPG', 'abf91dbc5f7a07af9754d29c328b6cd8.JPG', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160216222047', 'chinese opera artist', 'C00009', '2016-02-16', '', 0, 'opera,chinese,drama,culture,show,live', 1, 'f4311527975ef2f7c202a02000eb28e1_thumb.jpg', 'f4311527975ef2f7c202a02000eb28e1_thumb.jpg', 'f4311527975ef2f7c202a02000eb28e1.jpg', 'f4311527975ef2f7c202a02000eb28e1.jpg', 'Arts,People,Event', 'photo', 0, ''),
('20160216222337', 'chinese opera show', 'C00009', '2016-02-16', '', 0, 'opera,chinese,culture,show,people,live', 1, 'b22b9e4fd663cc00f21590f608f4a345_thumb.jpg', 'b22b9e4fd663cc00f21590f608f4a345_thumb.jpg', 'b22b9e4fd663cc00f21590f608f4a345.jpg', 'b22b9e4fd663cc00f21590f608f4a345.jpg', 'Arts,People,Event', 'photo', 0, ''),
('20160216222441', 'Pohon Pakis', 'C00008', '2016-02-16', '', 0, 'pohon,tanaman,plant,pakis,pohonhijau,daunpakis', 1, '9f0817193a7924a6b34c83da6b4f30cb_thumb.JPG', '9f0817193a7924a6b34c83da6b4f30cb_thumb.JPG', '9f0817193a7924a6b34c83da6b4f30cb.JPG', '9f0817193a7924a6b34c83da6b4f30cb.JPG', 'Nature', 'photo', 0, ''),
('20160216222947', 'sunny day at the beach', 'C00009', '2016-02-16', '', 0, 'beach,outdoor,travel,vacation,summer,island', 1, '861505fc4fb96a3815a6cc13ae2300cb_thumb.jpg', '861505fc4fb96a3815a6cc13ae2300cb_thumb.jpg', '861505fc4fb96a3815a6cc13ae2300cb.jpg', '861505fc4fb96a3815a6cc13ae2300cb.jpg', 'Holidays,Parks/Outdor,Travel', 'photo', 0, ''),
('20160216224320', 'its a perfect peacock', 'C00009', '2016-02-16', '', 0, 'peacock,animal,nature,wild,beauty,zoo,wings,blow,background', 1, 'd3d3e56d36395ac6d2376357559c8597_thumb.jpg', 'd3d3e56d36395ac6d2376357559c8597_thumb.jpg', 'd3d3e56d36395ac6d2376357559c8597.jpg', 'd3d3e56d36395ac6d2376357559c8597.jpg', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160216224637', 'orange splashing in the water', 'C00009', '2016-02-16', '', 0, 'orange,fruit,water,wet,splash,strobist,speed,stillife', 1, '7114be3ba77ae3620dcdb700289f2315_thumb.jpg', '7114be3ba77ae3620dcdb700289f2315_thumb.jpg', '7114be3ba77ae3620dcdb700289f2315.jpg', '7114be3ba77ae3620dcdb700289f2315.jpg', 'Food And Drink,Arts,Object', 'photo', 0, ''),
('20160216225026', 'water drop', 'C00009', '2016-02-16', '', 0, 'water,drop,stillife,splash,art,speed,strobist', 1, '061f00fd09a74dfc4ecced9629617630_thumb.jpg', '061f00fd09a74dfc4ecced9629617630_thumb.jpg', '061f00fd09a74dfc4ecced9629617630.jpg', '061f00fd09a74dfc4ecced9629617630.jpg', 'Background/Texture,Arts,Object', 'photo', 0, ''),
('20160216225746', 'small island in the middle of the sea', 'C00005', '2016-02-16', '', 0, 'island,small,sunny,summer,water,poncanisland,sumatra,holiday', 1, '904e2ab8705d6e0d41189655f981c0bc_thumb.jpg', '904e2ab8705d6e0d41189655f981c0bc_thumb.jpg', '904e2ab8705d6e0d41189655f981c0bc.jpg', '904e2ab8705d6e0d41189655f981c0bc.jpg', 'Holidays,Nature,Travel', 'photo', 0, ''),
('20160216230234', 'sunrise in the poncan island', 'C00005', '2016-02-16', '', 0, 'sunrise,island,poncan,sumatra,holiday,vacation,summer', 1, 'dbec8696db6b8753f681663c598ef061_thumb.jpg', 'dbec8696db6b8753f681663c598ef061_thumb.jpg', 'dbec8696db6b8753f681663c598ef061.jpg', 'dbec8696db6b8753f681663c598ef061.jpg', 'Holidays,Nature,Travel', 'photo', 0, ''),
('20160217130220', '', 'C00007', '2016-02-17', '', 0, 'ocean', 1, '91002fee684bc7e0155ac4d559972dd0_thumb.jpg', '91002fee684bc7e0155ac4d559972dd0_thumb.jpg', '91002fee684bc7e0155ac4d559972dd0.jpg', '91002fee684bc7e0155ac4d559972dd0.jpg', '', 'photo', 0, ''),
('20160217130938', '', 'C00007', '2016-02-17', '', 0, 'beachday', 1, '35afa0d5f5a5a6c812c32c6467ad7073_thumb.jpg', '35afa0d5f5a5a6c812c32c6467ad7073_thumb.jpg', '35afa0d5f5a5a6c812c32c6467ad7073.jpg', '35afa0d5f5a5a6c812c32c6467ad7073.jpg', 'Animal/Wildlife,Background/Texture,Holidays,Nature,Parks/Outdor,Travel', 'photo', 0, ''),
('20160217215446', 'big turtle', 'C00005', '2016-02-17', '', 0, 'animal,turtle,big,wild,hobbies,pet,zoo,nature', 1, '948d70256e2aae60a35a9acf2c157c2f_thumb.JPG', '948d70256e2aae60a35a9acf2c157c2f_thumb.JPG', '948d70256e2aae60a35a9acf2c157c2f.JPG', '948d70256e2aae60a35a9acf2c157c2f.JPG', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160220120914', 'fried rice served with chicken curry', 'C00005', '2016-02-20', '', 0, 'cook,friedrice,curry,chicken,hobbies,delicious,yummy,indonesian,food,meal', 1, 'dcd1404fc931dd2303db4f35be67ceca_thumb.JPG', 'dcd1404fc931dd2303db4f35be67ceca_thumb.JPG', 'dcd1404fc931dd2303db4f35be67ceca.JPG', 'dcd1404fc931dd2303db4f35be67ceca.JPG', 'Background/Texture,Food And Drink,Object', 'photo', 0, ''),
('20160220121436', 'tea gardens at bandung indonesia', 'C00005', '2016-02-20', '', 0, 'garden,tea,nature,natural,westjava,plant,green,tree,', 1, 'cd2fe8b03e707af72ee19ddc72073911_thumb.jpg', 'cd2fe8b03e707af72ee19ddc72073911_thumb.jpg', 'cd2fe8b03e707af72ee19ddc72073911.jpg', 'cd2fe8b03e707af72ee19ddc72073911.jpg', 'Background/Texture,Healtcare/Medical,Nature,Parks/Outdor', 'photo', 0, ''),
('20160220122154', 'developing a leather goods', 'C00005', '2016-02-20', '', 0, 'leather,grinder,work,develop,industrial,factory,machine,polish', 1, 'a1862f9347fa81d7ecad7ee45f734050_thumb.JPG', 'a1862f9347fa81d7ecad7ee45f734050_thumb.JPG', 'a1862f9347fa81d7ecad7ee45f734050.JPG', 'a1862f9347fa81d7ecad7ee45f734050.JPG', 'Bussines, Education,Industrial,Object', 'photo', 0, ''),
('20160220125929', 'pasta with curry chicken', 'C00005', '2016-02-20', '', 0, 'pasta,spaghetti,cook,food,hobbiest,meal,eat,curry,chicken', 1, 'a304fc04c19cb70f54ee1d426ae40f74_thumb.JPG', 'a304fc04c19cb70f54ee1d426ae40f74_thumb.JPG', 'a304fc04c19cb70f54ee1d426ae40f74.JPG', 'a304fc04c19cb70f54ee1d426ae40f74.JPG', 'Food And Drink,Arts,Object', 'photo', 0, ''),
('20160222115013', 'Kayu Aro terkenal sebagai daerah penghasil teh. Perkebunan teh Kayu Aro milik PTPN 6 adalah kebun teh terluas di dunia dalam satu hamparan. Teh produksi Kayu Aro diekspor keberbagai negara di dunia dan dalam negeri.', 'C00012', '2016-02-22', '', 0, 'Tea,Plantation,KayuAro,Jambi,Keinci,PTPNVI,Sunset', 0, '2bfb3b0cb4cdbca06f0c027c253f9b18_thumb.JPG', '2bfb3b0cb4cdbca06f0c027c253f9b18_thumb.JPG', '2bfb3b0cb4cdbca06f0c027c253f9b18.JPG', '2bfb3b0cb4cdbca06f0c027c253f9b18.JPG', 'Background/Texture,Holidays,Nature,Parks/Outdor', 'photo', 1, ''),
('20160222131439', 'Battle Bug', 'C00008', '2016-02-22', '', 0, 'bug,serangga,animal,nature,forest,kumbang', 1, 'd9a28e9fa9bd5002f34463b6dbb3f126_thumb.jpg', 'd9a28e9fa9bd5002f34463b6dbb3f126_thumb.jpg', 'd9a28e9fa9bd5002f34463b6dbb3f126.jpg', 'd9a28e9fa9bd5002f34463b6dbb3f126.jpg', 'Animal/Wildlife,Nature,Macro,Object', 'photo', 0, ''),
('20160222214704', 'Jokey child and horse', 'C00013', '2016-02-22', '', 0, 'horserace', 1, '4a1012a0ad95311cd8626c5b07d286e9_thumb.jpg', '4a1012a0ad95311cd8626c5b07d286e9_thumb.jpg', '4a1012a0ad95311cd8626c5b07d286e9.jpg', '4a1012a0ad95311cd8626c5b07d286e9.jpg', 'Animal/Wildlife,Holidays,People,Travel', 'photo', 0, ''),
('20160222221349', 'horses race traditional from bima, west nusa tenggara ', 'C00013', '2016-02-22', '', 0, 'photo,world,humaninterest,travel,holiday,culture', 1, 'c4fc81319c51c8eb8f6001a60c85b43a_thumb.jpg', 'c4fc81319c51c8eb8f6001a60c85b43a_thumb.jpg', 'c4fc81319c51c8eb8f6001a60c85b43a.jpg', 'c4fc81319c51c8eb8f6001a60c85b43a.jpg', 'Abstract,Animal/Wildlife,Holidays,Nature,Sports,People', 'photo', 0, ''),
('20160222222548', 'memandikan kuda', 'C00013', '2016-02-22', '', 0, 'photo,world,humaninterest,travel,holiday,culture', 1, '10a748bf6f2c3e687c28f2fe8ba74296_thumb.jpg', '10a748bf6f2c3e687c28f2fe8ba74296_thumb.jpg', '10a748bf6f2c3e687c28f2fe8ba74296.jpg', '10a748bf6f2c3e687c28f2fe8ba74296.jpg', 'Abstract,Animal/Wildlife,Holidays,Nature,Sports,People,Travel', 'photo', 0, ''),
('20160223173623', 'silhoutte of a bulldog', 'C00001', '2016-02-23', '', 0, 'dog,pet,animal,bulldog,blackandwhite,bw,silhouette', 1, 'ff33a754e130b51bd20543c16f8809c5_thumb.jpg', 'ff33a754e130b51bd20543c16f8809c5_thumb.jpg', 'e7b937a8e30ade64c02d9836a850feba.eps', 'e7b937a8e30ade64c02d9836a850feba.eps', 'Abstract,Animal/Wildlife,Ilustrations/Clip Art,Icons', 'vektor', 1, ''),
('20160223174130', 'SPORTS ICON', 'C00001', '2016-02-23', '', 0, 'SPORTSDIVINGROWINGCYCLINGBIKEHIKINGHORSERIDINGEXTREME', 1, 'e7267852bc4340371f7be9b9340edbbb_thumb.jpg', 'e7267852bc4340371f7be9b9340edbbb_thumb.jpg', '2cb98816ff66c557a15f7a219d17f9a9.eps', '2cb98816ff66c557a15f7a219d17f9a9.eps', 'Animal/Wildlife,Holidays,Sport,Signs/Symbols,Icons', 'vektor', 1, ''),
('20160223174948', 'hand icon', 'C00001', '2016-02-23', '', 0, 'handiconfbblueprayingprayersreligionbeliefs', 1, '2f25dcdbcbd2df930b4ff501a3da8fc2_thumb.jpg', '2f25dcdbcbd2df930b4ff501a3da8fc2_thumb.jpg', '88a698be95512467f8ae051ef0755e5d.eps', '88a698be95512467f8ae051ef0755e5d.eps', 'Ilustrations/Clip Art,Religion,Signs/Symbols,Icons', 'vektor', 1, ''),
('20160223175501', 'fish and bird', 'C00001', '2016-02-23', '', 0, 'animal,fish,bird,ocean,sea,sky,blue,nature,wildlife,zoo', 1, '2371ce799db1241efa65a040b13898a1_thumb.jpg', '2371ce799db1241efa65a040b13898a1_thumb.jpg', 'd890baa429db9bafe4395e73957eaed4.eps', 'd890baa429db9bafe4395e73957eaed4.eps', 'Animal/Wildlife,Ilustrations/Clip Art,Icons', 'vektor', 1, ''),
('20160223175844', 'gear, globe, and swoosh ', 'C00001', '2016-02-23', '', 0, 'gear,globe,swoosh,world,business,biz,industry,industrial,engineer', 1, '3213e7c2c93683539200740f3db89107_thumb.jpg', '3213e7c2c93683539200740f3db89107_thumb.jpg', '28d7830227a4c0ac8cf0706a9637f4ea.eps', '28d7830227a4c0ac8cf0706a9637f4ea.eps', 'Abstract,Business,Ilustrations/Clip Art', 'vektor', 1, ''),
('20160223180212', 'tools wrench screwdriver hammer', 'C00001', '2016-02-23', '', 0, 'hammerwrenchscrewscrewdrivertoolshandymanbuildingbuildrepairmechanicmechanical', 1, '2623086b443ff8ab401dd1db6d6fd301_thumb.jpg', '2623086b443ff8ab401dd1db6d6fd301_thumb.jpg', '45c15cdb3bd2c5b6bc3466f178bc77ff.eps', '45c15cdb3bd2c5b6bc3466f178bc77ff.eps', 'Architect,Building/Landmarks,Business,Ilustrations/Clip Art', 'vektor', 1, ''),
('20160223180655', 'city and buildings illustration', 'C00001', '2016-02-23', '', 0, 'citybuildingscityviewpencilwindowseducationlearn', 1, '42ff3e24e9ed589d03fbf40e0775649b_thumb.jpg', '42ff3e24e9ed589d03fbf40e0775649b_thumb.jpg', 'b85579ba93f88c8a81a97613b955ce38.eps', 'b85579ba93f88c8a81a97613b955ce38.eps', 'Abstract,Building/Landmarks,Business,Education,Ilustrations/Clip Art', 'vektor', 1, ''),
('20160223180938', 'human globe ', 'C00001', '2016-02-23', '', 0, 'humanglobeworldhumanityworkerinternationalbizbusiness', 1, '5fbbfb6cf9fa821512664fb8443e8e5e_thumb.jpg', '5fbbfb6cf9fa821512664fb8443e8e5e_thumb.jpg', 'c86be7efafc9d5e4961d2b27f8dd9e7b.eps', 'c86be7efafc9d5e4961d2b27f8dd9e7b.eps', 'Abstract,Business,Ilustrations/Clip Art', 'vektor', 1, ''),
('20160223224356', 'Keindahan pagi dengan aktivitasnya', 'C00013', '2016-02-23', '', 0, 'worl,culture,nature,humaninterest,traditional', 1, '14e4477f77358a2366d151c864cb1ad0_thumb.jpg', '14e4477f77358a2366d151c864cb1ad0_thumb.jpg', '14e4477f77358a2366d151c864cb1ad0.jpg', '14e4477f77358a2366d151c864cb1ad0.jpg', 'Holidays,Nature,Travel', 'photo', 1, ''),
('20160224144221', 'keris tarian jawa', 'C00015', '2016-02-24', '', 0, 'dance', 0, '432a0932b3ed1c4838cc36bb7104333f_thumb.JPG', '432a0932b3ed1c4838cc36bb7104333f_thumb.JPG', '432a0932b3ed1c4838cc36bb7104333f.JPG', '432a0932b3ed1c4838cc36bb7104333f.JPG', 'Arts', 'photo', 0, ''),
('20160224150059', 'macro', 'C00016', '2016-02-24', '', 0, '', 0, '0589f8441afa8e2df567b9037ad77e12_thumb.jpg', '0589f8441afa8e2df567b9037ad77e12_thumb.jpg', '0589f8441afa8e2df567b9037ad77e12.jpg', '0589f8441afa8e2df567b9037ad77e12.jpg', 'Macro', 'photo', 0, ''),
('20160224152558', 'Brachymeria sp.', 'C00017', '2016-02-24', '', 0, 'Macro,Macrophotography,animal,insects,hoverfly', 1, '85b3c8853ffb278be44e0544557efc27_thumb.jpg', '85b3c8853ffb278be44e0544557efc27_thumb.jpg', '85b3c8853ffb278be44e0544557efc27.jpg', '85b3c8853ffb278be44e0544557efc27.jpg', 'Animal/Wildlife', 'photo', 0, ''),
('20160224152709', 'ROL', 'C00016', '2016-02-24', '', 0, '', 0, '91c9bdc12d27b9f518ab9819e6865034_thumb.jpg', '91c9bdc12d27b9f518ab9819e6865034_thumb.jpg', '91c9bdc12d27b9f518ab9819e6865034.jpg', '91c9bdc12d27b9f518ab9819e6865034.jpg', 'Nature', 'photo', 0, ''),
('20160224190317', 'Semut hitam yang berlindung di dalam bunga merah', 'C00008', '2016-02-24', '', 0, 'animal,ant,semut,hewan,serangga,bunga', 1, 'c26b10a4467e1aa2c7cf09b71675d733_thumb.jpg', 'c26b10a4467e1aa2c7cf09b71675d733_thumb.jpg', 'c26b10a4467e1aa2c7cf09b71675d733.jpg', 'c26b10a4467e1aa2c7cf09b71675d733.jpg', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224190650', 'lebah mengangkut bunga sari', 'C00008', '2016-02-24', '', 0, 'bee,tawon,serangga,hewan,animal', 1, 'b82c3d73515db4cf378fc5682e01d980_thumb.jpg', 'b82c3d73515db4cf378fc5682e01d980_thumb.jpg', 'b82c3d73515db4cf378fc5682e01d980.jpg', 'b82c3d73515db4cf378fc5682e01d980.jpg', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224190932', 'Ulat di rumput hijau', 'C00008', '2016-02-24', '', 0, 'ulat,animal,serangga,hewan,caterpilar', 1, '7b9017d3950b50c91851792014ffc46a_thumb.jpg', '7b9017d3950b50c91851792014ffc46a_thumb.jpg', '7b9017d3950b50c91851792014ffc46a.jpg', '7b9017d3950b50c91851792014ffc46a.jpg', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224191154', 'Ulat Hitam Putih', 'C00008', '2016-02-24', '', 0, 'ulat,serangga,animal,hewan,nature,object', 1, '156aa70e1e9d2b2bed49065551447352_thumb.jpg', '156aa70e1e9d2b2bed49065551447352_thumb.jpg', '156aa70e1e9d2b2bed49065551447352.jpg', '156aa70e1e9d2b2bed49065551447352.jpg', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224191316', 'Ulat Bulu', 'C00008', '2016-02-24', '', 0, 'ulat,serangga,animal,hewan,nature,object', 0, 'a0d4227ac7f368e83f397e446fcc102b_thumb.jpg', 'a0d4227ac7f368e83f397e446fcc102b_thumb.jpg', 'a0d4227ac7f368e83f397e446fcc102b.jpg', 'a0d4227ac7f368e83f397e446fcc102b.jpg', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224191904', 'Belalang hijau dengan garis coklat di padang rumput', 'C00008', '2016-02-24', '', 0, 'belalang,serangga,animal,object,hewan', 1, '0b275c592b57baef5a5fd55cadd34de9_thumb.JPG', '0b275c592b57baef5a5fd55cadd34de9_thumb.JPG', '0b275c592b57baef5a5fd55cadd34de9.JPG', '0b275c592b57baef5a5fd55cadd34de9.JPG', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224192200', 'kepiting pasir di pantai batu karas', 'C00008', '2016-02-24', '', 0, 'crab,kepiting,animal,hewan,pantai,pasir', 1, '56e870d6042bf17615b2142dd7eb8fb3_thumb.JPG', '56e870d6042bf17615b2142dd7eb8fb3_thumb.JPG', '56e870d6042bf17615b2142dd7eb8fb3.JPG', '56e870d6042bf17615b2142dd7eb8fb3.JPG', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224192439', 'kepiting pasir', 'C00008', '2016-02-24', '', 0, 'crab,kepiting,animal,hewan,pantai,pasir,pantai', 1, '8cd0fe186f7e1ad1884c205620bcfb2d_thumb.JPG', '8cd0fe186f7e1ad1884c205620bcfb2d_thumb.JPG', '8cd0fe186f7e1ad1884c205620bcfb2d.JPG', '8cd0fe186f7e1ad1884c205620bcfb2d.JPG', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224192817', 'kupukupu putih coklat', 'C00008', '2016-02-24', '', 0, 'kupukupu,ngengat,animal,hewan,nature,object', 0, '6cd05440b1e7a08d7ad70748e0f68e5e_thumb.jpg', '6cd05440b1e7a08d7ad70748e0f68e5e_thumb.jpg', '6cd05440b1e7a08d7ad70748e0f68e5e.jpg', '6cd05440b1e7a08d7ad70748e0f68e5e.jpg', 'Animal/Wildlife,Nature,Object', 'photo', 0, ''),
('20160224200751', 'sunrise di hutan pinus cikole bandung', 'C00008', '2016-02-24', '', 0, 'sunrise,forest,nature,hutan,matahariterbit,lembayungsenja', 1, '24c2c7d0c90b1d775220a696d0dfbd1a_thumb.JPG', '24c2c7d0c90b1d775220a696d0dfbd1a_thumb.JPG', '24c2c7d0c90b1d775220a696d0dfbd1a.JPG', '24c2c7d0c90b1d775220a696d0dfbd1a.JPG', 'Background/Texture,Nature,Parks/Outdor', 'photo', 0, ''),
('20160224200959', 'danau yang mengering ', 'C00008', '2016-02-24', '', 0, 'danau,hutan,padangrumput,forest,nature', 1, '1be73c6e65222543ca73fc975688793c_thumb.JPG', '1be73c6e65222543ca73fc975688793c_thumb.JPG', '1be73c6e65222543ca73fc975688793c.JPG', '1be73c6e65222543ca73fc975688793c.JPG', 'Background/Texture,Holidays,Nature', 'photo', 0, ''),
('20160224201210', 'perangkap ikan dari bambu dipinggir danau', 'C00008', '2016-02-24', '', 0, 'nature,danau,tools,sungai,alam,hutan', 0, 'f8f35effb5ed751511e0c00c9e15e41c_thumb.JPG', 'f8f35effb5ed751511e0c00c9e15e41c_thumb.JPG', 'f8f35effb5ed751511e0c00c9e15e41c.JPG', 'f8f35effb5ed751511e0c00c9e15e41c.JPG', 'Background/Texture,Nature,Object,Parks/Outdor', 'photo', 0, ''),
('20160224201456', 'kebun teh di subang ', 'C00008', '2016-02-24', '', 0, 'kebun,nature,teh,object,background,alam,sunrise', 0, '99a58cb73092d090b760b5b005419c6a_thumb.JPG', '99a58cb73092d090b760b5b005419c6a_thumb.JPG', '99a58cb73092d090b760b5b005419c6a.JPG', '99a58cb73092d090b760b5b005419c6a.JPG', 'Background/Texture,Nature,Parks/Outdor', 'photo', 0, ''),
('20160224201839', 'pohon teh yang terkena sinar matahari pagi', 'C00008', '2016-02-24', '', 0, 'daun,pohonteh,perkebunan,alam,nature,pemandangan', 1, 'a06dade213e4028130d821d610599022_thumb.JPG', 'a06dade213e4028130d821d610599022_thumb.JPG', 'a06dade213e4028130d821d610599022.JPG', 'a06dade213e4028130d821d610599022.JPG', 'Background/Texture,Holidays,Nature,Object', 'photo', 0, ''),
('20160227063026', 'Mountain Curves', 'C00021', '2016-02-27', '', 0, 'Mountain,curves,sunset,landscape,goldenhour', 1, '1e5a50a003f3f26157e467aac535278c_thumb.jpg', '1e5a50a003f3f26157e467aac535278c_thumb.jpg', '1e5a50a003f3f26157e467aac535278c.jpg', '1e5a50a003f3f26157e467aac535278c.jpg', '', 'photo', 1, ''),
('20160227063041', 'Mountain Curves', 'C00021', '2016-02-27', '', 0, 'Mountain,curves,sunset,landscape,goldenhour', 1, '59f08b20648e616aa472ff74333fefa5_thumb.jpg', '59f08b20648e616aa472ff74333fefa5_thumb.jpg', '59f08b20648e616aa472ff74333fefa5.jpg', '59f08b20648e616aa472ff74333fefa5.jpg', '', 'photo', 1, ''),
('20160229195627', 'nightfall tree', 'C00024', '2016-02-29', '', 0, 'tree,sunset,sea,cloudy', 0, '9df9de1967d4317249d90e15f7e69994_thumb.jpg', '9df9de1967d4317249d90e15f7e69994_thumb.jpg', '9df9de1967d4317249d90e15f7e69994.jpg', '9df9de1967d4317249d90e15f7e69994.jpg', 'Nature', 'photo', 1, ''),
('20160229202152', '', 'C00023', '2016-02-29', '', 0, 'Animal,macro,nature,binatang,object,victor', 0, '7100fdd2bb125b6886bc4f96017e52c0_thumb.jpg', '7100fdd2bb125b6886bc4f96017e52c0_thumb.jpg', '7100fdd2bb125b6886bc4f96017e52c0.jpg', '7100fdd2bb125b6886bc4f96017e52c0.jpg', 'Animal/Wildlife,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160229203930', 'kupu-kupu', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '5d03c9442942e65b9e6edacc0a1976d6_thumb.jpg', '5d03c9442942e65b9e6edacc0a1976d6_thumb.jpg', '5d03c9442942e65b9e6edacc0a1976d6.jpg', '5d03c9442942e65b9e6edacc0a1976d6.jpg', 'Animal/Wildlife,Nature,Macro', 'photo', 0, ''),
('20160229204235', 'dranfly', 'C00023', '2016-02-29', '', 0, 'animal,victor,macro,binatang', 0, 'a540990fb15be89418d88f3e4f491955_thumb.jpg', 'a540990fb15be89418d88f3e4f491955_thumb.jpg', 'a540990fb15be89418d88f3e4f491955.jpg', 'a540990fb15be89418d88f3e4f491955.jpg', 'Animal/Wildlife,Nature,Macro,Vector', 'photo', 0, ''),
('20160229204503', '', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, 'c8a15c80a75630033f01c512eff0d958_thumb.jpg', 'c8a15c80a75630033f01c512eff0d958_thumb.jpg', 'c8a15c80a75630033f01c512eff0d958.jpg', 'c8a15c80a75630033f01c512eff0d958.jpg', 'Animal/Wildlife,Nature,Macro,Object', 'photo', 0, ''),
('20160229204755', '', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam,flower,bunga', 0, '13e9a715ff1bf715e6d3118d7ddbcf6e_thumb.jpg', '13e9a715ff1bf715e6d3118d7ddbcf6e_thumb.jpg', '13e9a715ff1bf715e6d3118d7ddbcf6e.jpg', '13e9a715ff1bf715e6d3118d7ddbcf6e.jpg', 'Animal/Wildlife,Nature,Macro,Vector', 'photo', 0, ''),
('20160229205056', 'atap khas kalimantan', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam,flower,bunga', 0, '2573e0b28dc1b50f9679eda8cbb7046b_thumb.jpg', '2573e0b28dc1b50f9679eda8cbb7046b_thumb.jpg', '2573e0b28dc1b50f9679eda8cbb7046b.jpg', '2573e0b28dc1b50f9679eda8cbb7046b.jpg', 'Architect,Background/Texture,Nature,Macro,People,Object', 'photo', 0, ''),
('20160229205338', 'kumbang full color', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, 'f12ab77010bb7f25d2cee31a6f2b475d_thumb.jpg', 'f12ab77010bb7f25d2cee31a6f2b475d_thumb.jpg', 'f12ab77010bb7f25d2cee31a6f2b475d.jpg', 'f12ab77010bb7f25d2cee31a6f2b475d.jpg', 'Animal/Wildlife,Nature,Macro,Vector', 'photo', 0, ''),
('20160229205803', '', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '0ad608191b9a6c8a783805a5c9094a6c_thumb.jpg', '0ad608191b9a6c8a783805a5c9094a6c_thumb.jpg', '0ad608191b9a6c8a783805a5c9094a6c.jpg', '0ad608191b9a6c8a783805a5c9094a6c.jpg', 'Animal/Wildlife,Nature,Macro,Vector', 'photo', 0, ''),
('20160229210205', 'sunset', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '44c85c17155ebf880cf66518f7bfd356_thumb.jpg', '44c85c17155ebf880cf66518f7bfd356_thumb.jpg', '44c85c17155ebf880cf66518f7bfd356.jpg', '44c85c17155ebf880cf66518f7bfd356.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229210404', 'memberi ikan ', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, 'd4f49b064e26018a2ada7da8ccd84983_thumb.jpg', 'd4f49b064e26018a2ada7da8ccd84983_thumb.jpg', 'd4f49b064e26018a2ada7da8ccd84983.jpg', 'd4f49b064e26018a2ada7da8ccd84983.jpg', 'Animal/Wildlife,Macro,Vector,People,Object', 'photo', 0, ''),
('20160229210855', 'sepeda / bicycle', 'C00023', '2016-02-29', '', 0, 'macro,animal,vision,victor,binatang,nature,alam,flower,bunga', 0, '4949e8dfb28befe792824b63981931a1_thumb.jpg', '4949e8dfb28befe792824b63981931a1_thumb.jpg', '4949e8dfb28befe792824b63981931a1.jpg', '4949e8dfb28befe792824b63981931a1.jpg', 'Animal/Wildlife,Nature,Macro,Vector,Sports,People,Object', 'photo', 0, ''),
('20160229211333', 'ant/ semut', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '226eb25a1ec1d29e1330a7ee798ba691_thumb.jpg', '226eb25a1ec1d29e1330a7ee798ba691_thumb.jpg', '226eb25a1ec1d29e1330a7ee798ba691.jpg', '226eb25a1ec1d29e1330a7ee798ba691.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229211627', 'snail / siput', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, 'c3204a334512bdafe959ebb76fda0677_thumb.jpg', 'c3204a334512bdafe959ebb76fda0677_thumb.jpg', 'c3204a334512bdafe959ebb76fda0677.jpg', 'c3204a334512bdafe959ebb76fda0677.jpg', 'Animal/Wildlife,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160229211904', 'bulu', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '4696bda66f894ecb2919a9fd33cc9db5_thumb.jpg', '4696bda66f894ecb2919a9fd33cc9db5_thumb.jpg', '4696bda66f894ecb2919a9fd33cc9db5.jpg', '4696bda66f894ecb2919a9fd33cc9db5.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro', 'photo', 0, ''),
('20160229212226', 'belalang', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, 'b8f03a5b4b063c783bbe84104fc74cd7_thumb.jpg', 'b8f03a5b4b063c783bbe84104fc74cd7_thumb.jpg', 'b8f03a5b4b063c783bbe84104fc74cd7.jpg', 'b8f03a5b4b063c783bbe84104fc74cd7.jpg', 'Animal/Wildlife,Nature,Macro,Vector', 'photo', 0, ''),
('20160229212908', 'sunset', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam,sunset', 0, 'a4a60d9613c88306b6f861ebe926b810_thumb.jpg', 'a4a60d9613c88306b6f861ebe926b810_thumb.jpg', 'a4a60d9613c88306b6f861ebe926b810.jpg', 'a4a60d9613c88306b6f861ebe926b810.jpg', 'Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229213139', 'sun', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam,sunset', 0, '5f3303a989c1395f76ed5a78e5b3a0fd_thumb.jpg', '5f3303a989c1395f76ed5a78e5b3a0fd_thumb.jpg', '5f3303a989c1395f76ed5a78e5b3a0fd.jpg', '5f3303a989c1395f76ed5a78e5b3a0fd.jpg', 'Animal/Wildlife,Nature,Macro,Vector', 'photo', 0, ''),
('20160229213502', 'animal', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '9dcb9cee68735016b3aa9b924fdf4ddb_thumb.jpg', '9dcb9cee68735016b3aa9b924fdf4ddb_thumb.jpg', '9dcb9cee68735016b3aa9b924fdf4ddb.jpg', '9dcb9cee68735016b3aa9b924fdf4ddb.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229213702', 'flower', 'C00023', '2016-02-29', '', 0, 'macro,animal,vision,victor,binatang,nature,alam,flower,bunga', 0, '0051343d43942f157efe060193dd7174_thumb.jpg', '0051343d43942f157efe060193dd7174_thumb.jpg', '0051343d43942f157efe060193dd7174.jpg', '0051343d43942f157efe060193dd7174.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229213938', 'buku adalah gudangnya ilmu', 'C00023', '2016-02-29', '', 0, 'macro,victor,nature,alam,background', 0, '72a84d2a0007df9909cd0a9a3f75c958_thumb.jpg', '72a84d2a0007df9909cd0a9a3f75c958_thumb.jpg', '72a84d2a0007df9909cd0a9a3f75c958.jpg', '72a84d2a0007df9909cd0a9a3f75c958.jpg', 'Background/Texture,Beauty/Fashion,Bussines, Education,Nature,Macro', 'photo', 0, ''),
('20160229214130', 'capung', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '1a399663a5634ee8203d5674d52b21e4_thumb.jpg', '1a399663a5634ee8203d5674d52b21e4_thumb.jpg', '1a399663a5634ee8203d5674d52b21e4.jpg', '1a399663a5634ee8203d5674d52b21e4.jpg', 'Animal/Wildlife,Nature,Macro,Vector', 'photo', 0, ''),
('20160229214321', 'sunset', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam,sunset', 0, '9e6feed38a0a9d71aec7624de877cfe1_thumb.jpg', '9e6feed38a0a9d71aec7624de877cfe1_thumb.jpg', '9e6feed38a0a9d71aec7624de877cfe1.jpg', '9e6feed38a0a9d71aec7624de877cfe1.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229214535', 'kumbang full color', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, 'ec08ae8147bf06c66272ae47fb508e3d_thumb.jpg', 'ec08ae8147bf06c66272ae47fb508e3d_thumb.jpg', 'ec08ae8147bf06c66272ae47fb508e3d.jpg', 'ec08ae8147bf06c66272ae47fb508e3d.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229215006', 'natural', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,nature,alam,natural', 0, '6c04105dcab3215204e4a54b2c5804ea_thumb.jpg', '6c04105dcab3215204e4a54b2c5804ea_thumb.jpg', '6c04105dcab3215204e4a54b2c5804ea.jpg', '6c04105dcab3215204e4a54b2c5804ea.jpg', 'Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229215254', 'capung', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '4331e864f85fd7b3943b7513379f466f_thumb.jpg', '4331e864f85fd7b3943b7513379f466f_thumb.jpg', '4331e864f85fd7b3943b7513379f466f.jpg', '4331e864f85fd7b3943b7513379f466f.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229215550', 'butterply', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, 'f249db23373d4cfb90bf6a13c9f8be0c_thumb.jpg', 'f249db23373d4cfb90bf6a13c9f8be0c_thumb.jpg', 'f249db23373d4cfb90bf6a13c9f8be0c.jpg', 'f249db23373d4cfb90bf6a13c9f8be0c.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229215832', 'locust', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, 'd4dbd5ec44c6c6f0007ca03f6493c16b_thumb.jpg', 'd4dbd5ec44c6c6f0007ca03f6493c16b_thumb.jpg', 'd4dbd5ec44c6c6f0007ca03f6493c16b.jpg', 'd4dbd5ec44c6c6f0007ca03f6493c16b.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229220045', 'flower', 'C00023', '2016-02-29', '', 0, 'macro,animal,vision,victor,binatang,nature,alam,flower,bunga', 0, 'a48bd91d24cb72f34b31b4635b4790c4_thumb.jpg', 'a48bd91d24cb72f34b31b4635b4790c4_thumb.jpg', 'a48bd91d24cb72f34b31b4635b4790c4.jpg', 'a48bd91d24cb72f34b31b4635b4790c4.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229220244', 'flower', 'C00023', '2016-02-29', '', 0, 'macro,animal,vision,victor,binatang,nature,alam,flower,bunga', 0, 'aa0e0e52a8afdfcc8bbe4c595c3bf07f_thumb.jpg', 'aa0e0e52a8afdfcc8bbe4c595c3bf07f_thumb.jpg', 'aa0e0e52a8afdfcc8bbe4c595c3bf07f.jpg', 'aa0e0e52a8afdfcc8bbe4c595c3bf07f.jpg', 'Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229220512', 'kumbang full color', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '40489221406eb585ceb8789e920ff6b3_thumb.jpg', '40489221406eb585ceb8789e920ff6b3_thumb.jpg', '40489221406eb585ceb8789e920ff6b3.jpg', '40489221406eb585ceb8789e920ff6b3.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229220819', 'snail / siput', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '761a08d9afd78a6d669de5d0e365f6ae_thumb.jpg', '761a08d9afd78a6d669de5d0e365f6ae_thumb.jpg', '761a08d9afd78a6d669de5d0e365f6ae.jpg', '761a08d9afd78a6d669de5d0e365f6ae.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229221208', 'capung', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '7137b5452e669fae3be0f5afcf286124_thumb.jpg', '7137b5452e669fae3be0f5afcf286124_thumb.jpg', '7137b5452e669fae3be0f5afcf286124.jpg', '7137b5452e669fae3be0f5afcf286124.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229221408', 'capung', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '4b7fd4290d80cf8d8ba2d74e338b0b1d_thumb.jpg', '4b7fd4290d80cf8d8ba2d74e338b0b1d_thumb.jpg', '4b7fd4290d80cf8d8ba2d74e338b0b1d.jpg', '4b7fd4290d80cf8d8ba2d74e338b0b1d.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229221538', 'full color', 'C00023', '2016-02-29', '', 0, 'macro,animal,vision,victor,binatang,nature,alam,flower,bunga', 0, 'b245142c516732fda8f32d8856cf16ad_thumb.jpg', 'b245142c516732fda8f32d8856cf16ad_thumb.jpg', 'b245142c516732fda8f32d8856cf16ad.jpg', 'b245142c516732fda8f32d8856cf16ad.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229221732', 'full color', 'C00023', '2016-02-29', '', 0, 'macro,animal,vision,victor,binatang,nature,alam,flower,bunga', 0, 'd861bc3497b4bd477d6b9ee7e0e9c12b_thumb.jpg', 'd861bc3497b4bd477d6b9ee7e0e9c12b_thumb.jpg', 'd861bc3497b4bd477d6b9ee7e0e9c12b.jpg', 'd861bc3497b4bd477d6b9ee7e0e9c12b.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229221940', '', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '524299ca0a623b06e3bf7dcd475463d7_thumb.jpg', '524299ca0a623b06e3bf7dcd475463d7_thumb.jpg', '524299ca0a623b06e3bf7dcd475463d7.jpg', '524299ca0a623b06e3bf7dcd475463d7.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160229222310', 'belalang', 'C00023', '2016-02-29', '', 0, 'macro,animal,victor,binatang,nature,alam', 0, '9980dfae70eca6dd9e76bb1a8c6529e9_thumb.jpg', '9980dfae70eca6dd9e76bb1a8c6529e9_thumb.jpg', '9980dfae70eca6dd9e76bb1a8c6529e9.jpg', '9980dfae70eca6dd9e76bb1a8c6529e9.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160301175504', 'Kupu-kupu', 'C00023', '2016-03-01', '', 0, 'Vector,macro,animal,binatang,alam', 0, '6d636c66fdf6e0d91666f5960bfa598a_thumb.jpg', '6d636c66fdf6e0d91666f5960bfa598a_thumb.jpg', '6d636c66fdf6e0d91666f5960bfa598a.jpg', '6d636c66fdf6e0d91666f5960bfa598a.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160301181053', 'Kupu-kupu', 'C00023', '2016-03-01', '', 0, 'Macro,victor,animal,nature,binatang,natural', 0, '12cfcf14b896fb56ca18f59519a13425_thumb.jpg', '12cfcf14b896fb56ca18f59519a13425_thumb.jpg', '12cfcf14b896fb56ca18f59519a13425.jpg', '12cfcf14b896fb56ca18f59519a13425.jpg', 'Background/Texture,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160301203424', 'Full color', 'C00023', '2016-03-01', '', 0, 'Macro,victor,animal,binatang,nature,natural', 0, 'f8c650b9a4bac29a87b31323a67097a6_thumb.jpg', 'f8c650b9a4bac29a87b31323a67097a6_thumb.jpg', 'f8c650b9a4bac29a87b31323a67097a6.jpg', 'f8c650b9a4bac29a87b31323a67097a6.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160302073140', 'after sunset at balangan beach , bali', 'C00021', '2016-03-02', '', 0, 'sunset,coral,beach,ocean,world,longexposure,', 1, '73bb5d33751239e2fe9577bc094f91be_thumb.jpg', '73bb5d33751239e2fe9577bc094f91be_thumb.jpg', '73bb5d33751239e2fe9577bc094f91be.jpg', '73bb5d33751239e2fe9577bc094f91be.jpg', 'Nature', 'photo', 1, ''),
('20160302145016', 'Belalang', 'C00023', '2016-03-02', '', 0, 'Macro,animal,animals,binatang,nature,vector', 1, 'd289ffbb414beb3dbd09b7b9cb24230a_thumb.jpg', 'd289ffbb414beb3dbd09b7b9cb24230a_thumb.jpg', 'd289ffbb414beb3dbd09b7b9cb24230a.jpg', 'd289ffbb414beb3dbd09b7b9cb24230a.jpg', 'Animal/Wildlife,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160302151255', 'Belalang', 'C00023', '2016-03-02', '', 0, 'Macro,vector,nature,binatang,animal,animals', 0, '40b05001c7f785a6dfb719792365d66c_thumb.jpg', '40b05001c7f785a6dfb719792365d66c_thumb.jpg', '40b05001c7f785a6dfb719792365d66c.jpg', '40b05001c7f785a6dfb719792365d66c.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160302152257', 'Kumbang', 'C00023', '2016-03-02', '', 0, 'Macro,vector,animal,animals,binatang,nature,natural', 1, '103c5b568cfe6cd3f44885caad767e5b_thumb.jpg', '103c5b568cfe6cd3f44885caad767e5b_thumb.jpg', '103c5b568cfe6cd3f44885caad767e5b.jpg', '103c5b568cfe6cd3f44885caad767e5b.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160302180617', 'Belalang', 'C00023', '2016-03-02', '', 0, 'Macro,animal,nature,binatang,vector', 0, '4b80c92a4d344e4fcc4f0664f0313efe_thumb.jpg', '4b80c92a4d344e4fcc4f0664f0313efe_thumb.jpg', '4b80c92a4d344e4fcc4f0664f0313efe.jpg', '4b80c92a4d344e4fcc4f0664f0313efe.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160302202227', 'melambangkan bentuk cerobong asap,yang dapat dilihat sebagai cerobong untuk kereta atau lainnya', 'C00026', '2016-03-02', '', 0, 'Train,Chimney,Vektor,Black&white,cerobongasap,', 1, 'fc9ffa20e525cc977358d5a997e72927_thumb.jpg', 'fc9ffa20e525cc977358d5a997e72927_thumb.jpg', 'ec62bfbb6d16e4387746c61578c6a16d.eps', 'ec62bfbb6d16e4387746c61578c6a16d.eps', 'Architect,Signs/Symbols,Transportation,Travel', 'vektor', 1, ''),
('20160303002418', '', 'C00026', '2016-03-03', '', 0, 'Ticket,Vektor,Black&White,Black,White', 1, 'ebe5c986c24beb64ab7c2ed500abf52e_thumb.jpg', 'ebe5c986c24beb64ab7c2ed500abf52e_thumb.jpg', 'fe76b12714a61c129768e9ef93068d15.eps', 'fe76b12714a61c129768e9ef93068d15.eps', 'Business,Transportation,Travel,Icons,Event', 'vektor', 1, ''),
('20160303003258', '', 'C00026', '2016-03-03', '', 0, 'Clock,vektor,jam,stasiun', 1, '13378cf2856e72c4f0ff68b56b5ff5de_thumb.jpg', '13378cf2856e72c4f0ff68b56b5ff5de_thumb.jpg', '6bbe7735ef360a481f6e13978c2bc3ab.eps', '6bbe7735ef360a481f6e13978c2bc3ab.eps', 'Architect,Signs/Symbols,Transportation,Icons', 'vektor', 1, ''),
('20160303004358', '', 'C00026', '2016-03-03', '', 0, 'loket,vektor,locket,ticket,tiket,black,white,', 1, '930e141d50d23afb532c99b22aeaf4ce_thumb.jpg', '930e141d50d23afb532c99b22aeaf4ce_thumb.jpg', '03687f7e5d5abf772b63a11f1b5c3ce2.eps', '03687f7e5d5abf772b63a11f1b5c3ce2.eps', 'Architect,Building/Landmarks,Business,Signs/Symbols,Transportation,Icons,Event', 'vektor', 0, ''),
('20160305184444', 'Lalat', 'C00023', '2016-03-05', '', 0, 'Macro,nature,vector,natural,binatang', 0, '6cc1aa872ec29687baed9aca41bcdb21_thumb.jpg', '6cc1aa872ec29687baed9aca41bcdb21_thumb.jpg', '6cc1aa872ec29687baed9aca41bcdb21.jpg', '6cc1aa872ec29687baed9aca41bcdb21.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector', 'photo', 0, ''),
('20160305190216', 'patung selamat datang', 'C00026', '2016-03-05', '', 0, 'patung,statue,landmark,siluet,vektor,indonesia,jakarta', 1, '1b0d1ec0272a8a4dfc59acbc51780ef6_thumb.jpg', '1b0d1ec0272a8a4dfc59acbc51780ef6_thumb.jpg', '57cafab0ce8d64d5c3cf28b4af8dba5b.eps', '57cafab0ce8d64d5c3cf28b4af8dba5b.eps', 'Architect,Building/Landmarks,Holidays,Travel,Icons', 'vektor', 0, ''),
('20160305192827', 'Gedung Sate', 'C00026', '2016-03-05', '', 0, 'landmark,vektor,indonesia,bandung,gedung,building,gedungsate,', 1, 'cd0ebda40f19bba264a7d5fae606f0ec_thumb.jpg', 'cd0ebda40f19bba264a7d5fae606f0ec_thumb.jpg', 'd235d6cb041ac06ba6663cec921fb678.eps', 'd235d6cb041ac06ba6663cec921fb678.eps', 'Architect,Holidays,Ilustrations/Clip Art,Signs/Symbols,Travel,Icons', 'vektor', 0, ''),
('20160305193938', 'Borobudur', 'C00026', '2016-03-05', '', 0, 'borobudur,candi,religion,buddhism,buddha,indonesia,landmark,vektor,jawatengah,7wonder', 1, '7880048ede13339b04a69694274e865e_thumb.jpg', '7880048ede13339b04a69694274e865e_thumb.jpg', 'a3c0f03eb285cec35f912d62f06e2557.eps', 'a3c0f03eb285cec35f912d62f06e2557.eps', 'Architect,Building/Landmarks,Holidays,Ilustrations/Clip Art,Religion,Signs/Symbols,Travel', 'vektor', 0, ''),
('20160307011059', 'the lake were enshrouded in mist', 'C00024', '2016-03-07', '', 0, 'lake,menjer,dieng,traveling,mist,indonesia,centraljava,holiday,nature', 1, '16bbdacd31c54ed7a8954bcbd6c209f0_thumb.jpg', '16bbdacd31c54ed7a8954bcbd6c209f0_thumb.jpg', '16bbdacd31c54ed7a8954bcbd6c209f0.jpg', '16bbdacd31c54ed7a8954bcbd6c209f0.jpg', '', 'photo', 1, ''),
('20160307201217', 'Capung', 'C00023', '2016-03-07', '', 0, 'Macro,nature,natural,binatang,vector', 1, '626db7e1871044ab00df05a8dcbad75c_thumb.jpg', '626db7e1871044ab00df05a8dcbad75c_thumb.jpg', '626db7e1871044ab00df05a8dcbad75c.jpg', '626db7e1871044ab00df05a8dcbad75c.jpg', 'Animal/Wildlife,Background/Texture,Nature,Macro,Vector,Object', 'photo', 0, ''),
('20160308174627', 'star icon ', 'C00001', '2016-03-08', '', 0, 'stariconartsymbol', 1, '29b3c79f6143aa5e266f258f9982dad0_thumb.jpg', '29b3c79f6143aa5e266f258f9982dad0_thumb.jpg', '0206aa3cbf9b6ca006a960af395b7bea.eps', '0206aa3cbf9b6ca006a960af395b7bea.eps', 'Abstract,Ilustrations/Clip Art,Icons', 'vektor', 1, ''),
('20160308175004', 'paper frog origami', 'C00001', '2016-03-08', '', 0, 'paperfrogorigamigreen', 1, '1e7d96ae871335e58238c6cd7d11b376_thumb.jpg', '1e7d96ae871335e58238c6cd7d11b376_thumb.jpg', '5db4288d4bcc1c80669e952d11aac666.eps', '5db4288d4bcc1c80669e952d11aac666.eps', 'Animal/Wildlife,Ilustrations/Clip Art', 'vektor', 1, ''),
('20160308175758', 'phone signals wifi internet technology', 'C00001', '2016-03-08', '', 0, 'phonesmartphonecellphonewifisignalsinternetandroidiphone', 1, 'd9c6519eb28c361a1cf75c94ed0dde3b_thumb.jpg', 'd9c6519eb28c361a1cf75c94ed0dde3b_thumb.jpg', '3e2db1070ff17bde65781635ce5b8057.eps', '3e2db1070ff17bde65781635ce5b8057.eps', 'Ilustrations/Clip Art,Science,Signs/Symbols', 'vektor', 1, ''),
('20160308180035', 'robot icon', 'C00001', '2016-03-08', '', 0, 'faceroboticontechgeek', 1, '9c5bb00290c2569fc2e64fc5c89e52df_thumb.jpg', '9c5bb00290c2569fc2e64fc5c89e52df_thumb.jpg', '50a798efe75f5ffd1449af7d875e8bed.eps', '50a798efe75f5ffd1449af7d875e8bed.eps', 'Abstract,Ilustrations/Clip Art,Icons', 'vektor', 1, ''),
('20160308180220', 'hand gestures', 'C00001', '2016-03-08', '', 0, 'handblackgesturespalmfingers', 1, 'a77fc1d9c6823e0f2095af4aa9fdd5fe_thumb.jpg', 'a77fc1d9c6823e0f2095af4aa9fdd5fe_thumb.jpg', '923457f8293cf102fe4e44ee139ac910.eps', '923457f8293cf102fe4e44ee139ac910.eps', 'Abstract,Ilustrations/Clip Art', 'vektor', 1, ''),
('20160308180407', 'blue city ', 'C00001', '2016-03-08', '', 0, 'bluewavewatercitybuildingsillustrationvector', 1, '45cabd16129719ba463950385558e498_thumb.jpg', '45cabd16129719ba463950385558e498_thumb.jpg', 'eb85896485eea76571e95e624e4967ac.eps', 'eb85896485eea76571e95e624e4967ac.eps', 'Abstract,Building/Landmarks,Ilustrations/Clip Art,Travel', 'vektor', 1, ''),
('20160318130701', 'the moth on the flower', 'C00024', '2016-03-18', '', 0, 'moth,macro,flower,nature,animal', 1, 'd35a1104593ca70a7de888d2214598ef_thumb.jpg', 'd35a1104593ca70a7de888d2214598ef_thumb.jpg', 'd35a1104593ca70a7de888d2214598ef.jpg', 'd35a1104593ca70a7de888d2214598ef.jpg', 'Animal/Wildlife,Nature,Macro,Object,Parks/Outdor', 'photo', 1, ''),
('20160324194819', 'toko shop', 'C00027', '2016-03-24', '', 0, 'toko,shop', 0, '698d16ac9682aa0ac77193d9b96c5f29_thumb.JPG', '698d16ac9682aa0ac77193d9b96c5f29_thumb.JPG', '698d16ac9682aa0ac77193d9b96c5f29.JPG', '698d16ac9682aa0ac77193d9b96c5f29.JPG', 'Holidays,Travel', 'photo', 0, ''),
('20160324201636', 'TEST', 'C00028', '2016-03-24', '', 0, '', 0, '018532e619406a78da01887967d84e78_thumb.JPG', '018532e619406a78da01887967d84e78_thumb.JPG', '018532e619406a78da01887967d84e78.JPG', '018532e619406a78da01887967d84e78.JPG', '', 'photo', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `freeimage`
--

DROP TABLE IF EXISTS `freeimage`;
CREATE TABLE IF NOT EXISTS `freeimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `imageweek`
--
DROP VIEW IF EXISTS `imageweek`;
CREATE TABLE IF NOT EXISTS `imageweek` (
`watermark` varchar(255)
,`mini` varchar(255)
,`big` varchar(255)
,`judul` varchar(255)
,`id_foto` varchar(15)
,`status` tinyint(1)
,`vote` bigint(21)
,`nilai` decimal(25,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `image_prop`
--

DROP TABLE IF EXISTS `image_prop`;
CREATE TABLE IF NOT EXISTS `image_prop` (
  `kode` varchar(20) NOT NULL DEFAULT '',
  `size` varchar(10) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_prop`
--

INSERT INTO `image_prop` (`kode`, `size`) VALUES
('max_height', '999999'),
('max_size', '999999'),
('max_width', '999999'),
('min_height', '1680'),
('min_size', '4000'),
('min_width', '2240'),
('resize', '5');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `no_invoice` varchar(9) NOT NULL DEFAULT '',
  `subject` varchar(45) NOT NULL DEFAULT '',
  `memberid` varchar(6) NOT NULL DEFAULT '',
  `kode_paket` varchar(6) NOT NULL DEFAULT '',
  `lama_hari` int(11) NOT NULL,
  `harga` float NOT NULL DEFAULT '0',
  `kapasitas_download` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tanggal_deposit` date NOT NULL DEFAULT '0000-00-00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`no_invoice`, `subject`, `memberid`, `kode_paket`, `lama_hari`, `harga`, `kapasitas_download`, `tanggal_deposit`, `status`) VALUES
('INV000001', 'Pembelian Satuan', 'C00020', 'PX.001', 1, 89000, 1, '2016-02-23', 1),
('INV000002', 'Pembelian Paket', 'C00020', 'PX.003', 5, 395000, 5, '2016-02-23', 1),
('INV000003', 'Pembelian Paket', 'C00020', 'PX.003', 5, 395000, 5, '2016-02-25', 1),
('INV000004', 'Pembelian Paket', 'C00023', 'PX.003', 5, 395000, 5, '2016-02-29', 0),
('INV000005', 'Pembelian Satuan', 'M00036', 'PX.001', 1, 89000, 1, '2016-03-01', 0),
('INV000006', 'Pembelian Paket', 'C00005', 'PX.003', 5, 395000, 5, '2016-03-08', 0),
('INV000007', 'Pembelian Deposit Spc. Request', 'C00005', 'PX.002', 1, 295000, 10, '2016-03-08', 0),
('INV000008', 'Pembelian Paket', 'C00005', 'PX.003', 5, 395000, 5, '2016-03-08', 0),
('INV000009', 'Pembelian Paket', 'C00010', 'PX.003', 5, 395000, 5, '2016-03-08', 0),
('INV000010', 'Pembelian Satuan', 'C00004', 'PX.001', 1, 89000, 1, '2016-03-09', 0),
('INV000011', 'Pembelian Satuan', 'M00001', 'PX.001', 1, 89000, 1, '2016-03-09', 0),
('INV000012', 'Pembelian Satuan', 'M00001', 'PX.001', 1, 89000, 1, '2016-03-09', 0),
('INV000013', 'Pembelian Satuan', 'C00004', 'PX.001', 1, 89000, 1, '2016-03-09', 0),
('INV000014', 'Pembelian Paket', 'C00003', 'PX.003', 5, 395000, 5, '2016-03-10', 0),
('INV000015', 'Pembelian Satuan', 'C00004', 'PX.001', 1, 89000, 1, '2016-03-10', 0),
('INV000016', 'Pembelian Satuan', 'C00004', 'PX.001', 1, 89000, 1, '2016-03-10', 0),
('INV000017', 'Pembelian Satuan', 'C00003', 'PX.001', 1, 89000, 1, '2016-03-10', 0),
('INV000018', 'Pembelian Paket', 'C00002', 'PX.003', 5, 395000, 5, '2016-03-14', 0),
('INV000019', 'Pembelian Satuan', 'C00001', 'PX.001', 1, 89000, 1, '2016-03-14', 0),
('INV000020', 'Pembelian Paket', 'C00008', 'PX.003', 5, 395000, 5, '2016-03-14', 0),
('INV000021', 'Pembelian Satuan', 'C00003', 'PX.001', 1, 89000, 1, '2016-03-14', 1),
('INV000022', 'Pembelian Paket', 'C00010', 'PX.003', 5, 395000, 5, '2016-03-14', 1),
('INV000023', 'Pembelian Paket', 'C00002', 'PX.003', 5, 395000, 5, '2016-03-22', 0),
('INV000024', 'Pembelian Paket', 'C00005', 'PX.003', 5, 395000, 5, '2016-03-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` varchar(6) NOT NULL,
  `type` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `type`, `nama`) VALUES
('CAT004', 'photo', 'Abstract'),
('CAT005', 'photo', 'Architect'),
('CAT006', 'photo', 'Animal/Wildlife'),
('CAT007', 'photo', 'Background/Texture'),
('CAT008', 'photo', 'Beauty/Fashion'),
('CAT009', 'photo', 'Bussines, Education'),
('CAT010', 'photo', 'Food And Drink'),
('CAT011', 'photo', 'Healtcare/Medical'),
('CAT012', 'photo', 'Holidays'),
('CAT013', 'photo', 'Ilustration/Clip Art'),
('CAT014', 'photo', 'Industrial'),
('CAT015', 'photo', 'Interior'),
('CAT016', 'photo', 'Nature'),
('CAT017', 'photo', 'Macro'),
('CAT018', 'photo', 'Vector'),
('CAT019', 'photo', 'Sports'),
('CAT020', 'photo', 'Arts'),
('CAT021', 'photo', 'People'),
('CAT022', 'photo', 'Object'),
('CAT023', 'photo', 'Icon'),
('CAT024', 'photo', 'Vintage'),
('CAT025', 'photo', 'Parks/Outdor'),
('CAT026', 'photo', 'Event'),
('CAT027', 'photo', 'Science'),
('CAT028', 'photo', 'Religion'),
('CAT029', 'photo', 'Signs/Symbols'),
('CAT030', 'photo', 'Transportation'),
('CAT031', 'photo', 'Travel'),
('CAT032', 'vektor', 'Abstract'),
('CAT033', 'vektor', 'Architect'),
('CAT034', 'vektor', 'Animal/Wildlife'),
('CAT035', 'vektor', 'Background/Texture'),
('CAT036', 'vektor', 'Building/Landmarks'),
('CAT037', 'vektor', 'Business'),
('CAT038', 'vektor', 'Education'),
('CAT039', 'vektor', 'Food and Drink'),
('CAT040', 'vektor', 'Healthcare/Medical'),
('CAT041', 'vektor', 'Holidays'),
('CAT042', 'vektor', 'Ilustrations/Clip Art'),
('CAT043', 'vektor', 'Sport'),
('CAT044', 'vektor', 'Science'),
('CAT045', 'vektor', 'Religion'),
('CAT046', 'vektor', 'Signs/Symbols'),
('CAT047', 'vektor', 'Transportation'),
('CAT048', 'vektor', 'Travel'),
('CAT049', 'vektor', 'Icons'),
('CAT050', 'vektor', 'Event'),
('CAT051', 'photo', 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

DROP TABLE IF EXISTS `konfirmasi`;
CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `idkonfirmasi` varchar(9) NOT NULL DEFAULT '',
  `memberid` varchar(6) NOT NULL,
  `no_invoice` varchar(9) NOT NULL DEFAULT '',
  `no_rek_tujuan` varchar(50) NOT NULL DEFAULT '',
  `no_pengirim` varchar(50) NOT NULL DEFAULT '',
  `nama_pengirim` varchar(100) NOT NULL DEFAULT '',
  `tanggal_kirim` date DEFAULT NULL,
  `waktu` time NOT NULL DEFAULT '00:00:00',
  `bukti` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `jumlah_bayar` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idkonfirmasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`idkonfirmasi`, `memberid`, `no_invoice`, `no_rek_tujuan`, `no_pengirim`, `nama_pengirim`, `tanggal_kirim`, `waktu`, `bukti`, `status`, `jumlah_bayar`) VALUES
('K00000001', 'C00010', 'INV000022', '7840418787', '12345', 'erwin chandra', '2016-03-14', '12:02:00', '22fcc4741730b44a00a3746fbaa06225.JPG', 1, 434500),
('K00000002', 'C00003', 'INV000021', '7840418787', '3242343242', 'FSE', '2016-03-14', '12:17:00', '88d1b4f190be83569762a7eb8e3a4c37.jpg', 1, 97900),
('K00000003', 'C00005', 'INV000024', '7840418787', '8250022116', 'harianto', '2016-03-23', '10:01:00', '9751ed6972c3f39ef0c32c9518977695.JPG', 1, 200000),
('K00000004', 'C00005', 'INV000024', '7840418787', '8250022116', 'harianto', '2016-03-23', '10:01:00', '4c21850b3b9c17a997669b18ebf27cb5.JPG', 0, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal_login` date NOT NULL,
  `jam_login` time NOT NULL,
  `browser` varchar(40) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=444 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `userID`, `username`, `status`, `tanggal_login`, `jam_login`, `browser`, `ip`) VALUES
(1, 'Adm0000', 'super', '1', '2015-10-29', '04:16:01', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(2, 'Adm0000', 'super', '1', '2015-11-05', '03:17:17', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(3, 'Adm0000', 'super', '1', '2015-11-06', '07:53:22', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(4, 'Adm0000', 'super', '1', '2015-11-06', '13:56:41', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(5, 'Adm0000', 'super', '1', '2015-11-06', '15:50:05', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(6, 'Adm0000', 'super', '1', '2015-11-07', '02:22:55', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(7, 'Adm0000', 'super', '1', '2015-11-09', '08:04:38', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(8, 'Adm0000', 'super', '1', '2015-11-10', '02:34:16', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(9, 'Adm0000', 'super', '1', '2015-11-11', '04:34:26', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(10, 'Adm0000', 'super', '1', '2015-11-12', '02:08:41', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(11, 'Adm0000', 'super', '1', '2015-11-12', '03:09:30', 'Chrome 46.0.2490.80Windows 8.1', '::1'),
(12, 'Adm0000', 'super', '1', '2015-11-12', '18:51:14', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(13, 'Adm0000', 'super', '1', '2015-11-13', '08:53:01', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(14, 'Adm0000', 'super', '1', '2015-11-14', '04:54:09', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(15, 'Adm0000', 'super', '1', '2015-11-18', '03:40:27', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(16, 'Adm0000', 'super', '1', '2015-11-18', '08:35:19', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(17, 'Adm0000', 'super', '1', '2015-11-18', '10:01:01', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(18, 'Adm0000', 'super', '1', '2015-11-18', '10:04:05', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(19, 'Adm0000', 'super', '1', '2015-11-19', '04:17:51', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(20, 'Adm0000', 'super', '1', '2015-11-19', '07:17:55', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(21, 'Adm0000', 'super', '1', '2015-11-22', '07:08:40', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(22, 'Adm0000', 'super', '1', '2015-11-22', '10:37:21', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(23, 'Adm0000', 'super', '1', '2015-11-23', '06:46:58', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(24, 'Adm0000', 'super', '1', '2015-11-23', '08:51:37', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(25, 'Adm0000', 'super', '1', '2015-11-24', '02:17:16', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(26, 'Adm0000', 'super', '1', '2015-11-25', '09:52:27', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(27, 'Adm0000', 'super', '1', '2015-11-26', '03:09:45', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(28, 'Adm0000', 'super', '1', '2015-11-26', '07:44:20', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(29, 'Adm0000', 'super', '1', '2015-11-27', '07:55:38', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(30, 'Adm0000', 'super', '1', '2015-12-02', '09:52:10', 'Chrome 46.0.2490.86Windows 8.1', '::1'),
(31, 'Adm0000', 'super', '1', '2015-12-03', '08:43:49', 'Chrome 47.0.2526.73Windows 8.1', '::1'),
(32, 'Adm0000', 'super', '1', '2015-12-04', '07:54:33', 'Chrome 47.0.2526.73Windows 8.1', '::1'),
(33, 'Adm0000', 'super', '1', '2015-12-07', '08:57:29', 'Chrome 47.0.2526.73Windows 8.1', '::1'),
(34, 'Adm0000', 'super', '1', '2015-12-07', '10:31:29', 'Chrome 47.0.2526.73Windows 8.1', '::1'),
(35, 'Adm0000', 'super', '1', '2015-12-07', '11:03:01', 'Chrome 47.0.2526.73Windows 8.1', '::1'),
(36, 'Adm0000', 'super', '1', '2015-12-07', '15:20:27', 'Chrome 47.0.2526.73Windows 8.1', '::1'),
(37, 'Adm0000', 'super', '1', '2015-12-10', '06:46:08', 'Chrome 47.0.2526.80Windows 8.1', '::1'),
(38, 'Adm0000', 'super', '1', '2015-12-12', '03:05:13', 'Chrome 47.0.2526.80Windows 8.1', '::1'),
(39, 'Adm0000', 'super', '1', '2015-12-12', '10:22:41', 'Chrome 47.0.2526.80Windows 8.1', '36.80.111.235'),
(40, 'Adm0000', 'super', '1', '2015-12-12', '11:29:42', 'Chrome 47.0.2526.80Windows 8.1', '182.253.128.9'),
(41, 'Adm0000', 'super', '1', '2015-12-12', '12:11:15', 'Chrome 47.0.2526.80Windows 8.1', '182.253.128.9'),
(42, 'Adm0000', 'super', '1', '2015-12-12', '12:26:12', 'Chrome 47.0.2526.80Windows 8.1', '182.253.128.9'),
(43, 'Adm0000', 'super', '1', '2015-12-14', '15:11:33', 'Chrome 47.0.2526.80Windows 8.1', '36.80.33.193'),
(44, 'Adm0000', 'super', '1', '2015-12-15', '07:41:20', 'Chrome 47.0.2526.80Windows 8.1', '139.193.12.127'),
(45, 'Adm0000', 'super', '1', '2015-12-15', '13:35:41', 'Chrome 47.0.2526.80Windows 8.1', '139.193.12.127'),
(46, 'Adm0000', 'super', '1', '2015-12-16', '04:14:01', 'Chrome 47.0.2526.80Windows 8.1', '36.80.111.235'),
(47, 'Adm0000', 'super', '1', '2015-12-16', '05:09:08', 'Firefox 42.0Windows 8.1', '36.80.33.193'),
(48, 'Adm0000', 'super', '1', '2015-12-16', '05:14:49', 'Chrome 47.0.2526.80Windows 8.1', '36.80.33.193'),
(49, 'Adm0000', 'super', '1', '2015-12-16', '05:56:56', 'Chrome 47.0.2526.80Windows 8.1', '36.80.33.193'),
(50, 'Adm0000', 'super', '1', '2015-12-16', '06:16:34', 'Chrome 47.0.2526.80Windows 8.1', '36.80.33.193'),
(51, 'Adm0000', 'super', '1', '2015-12-16', '06:17:56', 'Chrome 34.0.1847.76Android', '114.4.78.78'),
(52, 'Adm0000', 'super', '1', '2015-12-16', '06:18:27', 'Chrome 34.0.1847.76Android', '202.62.16.251'),
(53, 'Adm0001', 'felixsadikin', '1', '2015-12-16', '06:19:38', 'Chrome 38.0.2125.102Android', '120.161.1.92'),
(54, 'Adm0000', 'super', '1', '2015-12-16', '06:27:36', 'Safari 9537.53iOS', '36.72.43.99'),
(55, 'Adm0000', 'super', '1', '2015-12-16', '06:58:36', 'Chrome 47.0.2526.83Android', '64.233.173.134'),
(56, 'Adm0000', 'super', '1', '2015-12-16', '08:23:27', 'Chrome 34.0.1847.76Android', '114.4.78.85'),
(57, 'Adm0001', 'felixsadikin', '1', '2015-12-16', '08:34:03', 'Chrome 38.0.2125.102Android', '112.215.66.76'),
(58, 'Adm0000', 'super', '1', '2015-12-16', '09:36:44', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(59, 'Adm0000', 'super', '1', '2015-12-16', '15:38:47', 'Chrome 34.0.1847.76Android', '120.164.40.222'),
(60, 'Adm0000', 'super', '1', '2015-12-16', '15:38:48', 'Chrome 34.0.1847.76Android', '120.164.40.222'),
(61, 'Adm0000', 'super', '1', '2015-12-16', '15:41:54', 'Chrome 34.0.1847.76Android', '120.164.40.222'),
(62, 'Adm0000', 'super', '1', '2015-12-16', '15:51:47', 'Chrome 47.0.2526.80Windows 10', '182.253.128.14'),
(63, 'Adm0000', 'super', '1', '2015-12-16', '17:32:51', 'Safari 9537.53iOS', '36.72.43.99'),
(64, 'Adm0000', 'super', '1', '2015-12-16', '17:48:08', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(65, 'Adm0000', 'super', '1', '2015-12-17', '08:59:40', 'Chrome 47.0.2526.106Windows 8.1', '36.79.162.53'),
(66, 'Adm0000', 'super', '1', '2015-12-17', '12:38:33', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(67, 'Adm0000', 'super', '1', '2015-12-17', '13:56:26', 'Chrome 34.0.1847.76Android', '202.62.16.152'),
(68, 'Adm0000', 'super', '1', '2015-12-17', '14:01:49', 'Chrome 34.0.1847.76Android', '202.62.16.157'),
(69, 'Adm0000', 'super', '1', '2015-12-17', '14:52:06', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(70, 'Adm0001', 'felixsadikin', '1', '2015-12-17', '14:53:35', 'Chrome 38.0.2125.102Android', '112.215.66.76'),
(71, 'Adm0000', 'super', '1', '2015-12-17', '15:26:29', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(72, 'Adm0000', 'super', '1', '2015-12-17', '16:50:31', 'Chrome 47.0.2526.83Android', '64.233.173.129'),
(73, 'Adm0000', 'super', '1', '2015-12-17', '16:51:53', 'Safari 9537.53iOS', '112.215.66.76'),
(74, 'Adm0000', 'super', '1', '2015-12-18', '10:30:56', 'Chrome 34.0.1847.76Android', '202.62.16.147'),
(75, 'Adm0001', 'felixsadikin', '1', '2015-12-18', '10:38:36', 'Chrome 38.0.2125.102Android', '112.215.66.70'),
(76, 'Adm0000', 'super', '1', '2015-12-18', '10:40:55', 'Safari 9537.53iOS', '112.215.66.76'),
(77, 'Adm0000', 'super', '1', '2015-12-18', '10:43:09', 'Chrome 47.0.2526.83Android', '223.255.230.106'),
(78, 'Adm0000', 'super', '1', '2015-12-18', '10:57:02', 'Chrome 34.0.1847.76Android', '120.164.41.82'),
(79, 'Adm0000', 'super', '1', '2015-12-18', '11:10:42', 'Chrome 47.0.2526.83Android', '64.233.173.134'),
(80, 'Adm0000', 'super', '1', '2015-12-18', '11:14:20', 'Chrome 47.0.2526.83Android', '223.255.230.106'),
(81, 'Adm0000', 'super', '1', '2015-12-18', '14:33:22', 'Chrome 47.0.2526.106Windows 8.1', '36.80.33.193'),
(82, 'Adm0005', 'yung.jr', '1', '2015-12-18', '16:02:33', 'Chrome 34.0.1847.76Android', '202.62.17.155'),
(83, 'Adm0001', 'felixsadikin', '1', '2015-12-18', '16:03:10', 'Chrome 38.0.2125.102Android', '112.215.66.76'),
(84, 'Adm0000', 'super', '1', '2015-12-18', '16:08:22', 'Chrome 34.0.1847.76Android', '202.62.17.15'),
(85, 'Adm0000', 'super', '1', '2015-12-18', '17:17:08', 'Chrome 47.0.2526.106Windows 8.1', '36.79.162.53'),
(86, 'Adm0000', 'super', '1', '2015-12-19', '08:50:24', 'Chrome 47.0.2526.106Windows 10', '182.253.128.14'),
(87, 'Adm0000', 'super', '1', '2015-12-19', '09:17:36', 'Chrome 47.0.2526.106Windows 8.1', '36.80.33.193'),
(88, 'Adm0005', 'yung.jr', '1', '2015-12-19', '09:31:49', 'Chrome 34.0.1847.76Android', '202.62.16.116'),
(89, 'Adm0001', 'felixsadikin', '1', '2015-12-19', '09:38:32', 'Chrome 38.0.2125.102Android', '112.215.66.79'),
(90, 'Adm0000', 'super', '1', '2015-12-19', '10:43:01', 'Chrome 47.0.2526.106Windows 8.1', '36.79.162.53'),
(91, 'Adm0001', 'felixsadikin', '1', '2015-12-20', '09:40:58', 'Chrome 38.0.2125.102Android', '112.215.66.77'),
(92, 'Adm0000', 'super', '1', '2015-12-21', '11:54:08', 'Chrome 47.0.2526.80Windows 10', '182.253.128.20'),
(93, 'Adm0000', 'super', '1', '2015-12-21', '15:04:40', 'Chrome 34.0.1847.76Android', '202.62.16.8'),
(94, 'Adm0005', 'yung.jr', '1', '2015-12-21', '15:17:20', 'Chrome 34.0.1847.76Android', '114.125.61.178'),
(95, 'Adm0001', 'felixsadikin', '1', '2015-12-22', '07:25:22', 'Chrome 38.0.2125.102Android', '36.84.67.11'),
(96, 'Adm0005', 'yung.jr', '1', '2015-12-22', '12:32:54', 'Chrome 34.0.1847.76Android', '202.62.17.124'),
(97, 'Adm0001', 'felixsadikin', '1', '2015-12-22', '14:37:23', 'Chrome 38.0.2125.102Android', '112.215.66.77'),
(98, 'Adm0000', 'super', '1', '2015-12-22', '22:05:28', 'Chrome 34.0.1847.76Android', '36.76.173.224'),
(99, 'Adm0000', 'super', '1', '2015-12-22', '22:09:57', 'Chrome 47.0.2526.83Android', '64.233.173.139'),
(100, 'Adm0000', 'super', '1', '2015-12-22', '22:20:15', 'Chrome 34.0.1847.76Android', '36.76.173.224'),
(101, 'Adm0004', 'ramondekong', '1', '2015-12-22', '23:10:59', 'Safari 9537.53iOS', '112.215.66.77'),
(102, 'Adm0003', 'owensantoso', '1', '2015-12-23', '00:02:43', 'Chrome 47.0.2526.83Android', '64.233.173.139'),
(103, 'Adm0000', 'super', '1', '2015-12-23', '08:41:53', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(104, 'Adm0002', 'erwinc', '1', '2015-12-23', '08:43:56', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(105, 'Adm0003', 'owensantoso', '1', '2015-12-23', '11:36:08', 'Chrome 47.0.2526.83Android', '64.233.173.129'),
(106, 'Adm0002', 'erwinc', '1', '2015-12-23', '11:37:27', 'Chrome 34.0.1847.76Android', '202.62.16.3'),
(107, 'Adm0002', 'erwinc', '1', '2015-12-23', '11:39:51', 'Firefox 43.0Windows XP', '120.185.109.89'),
(108, 'Adm0004', 'ramondekong', '1', '2015-12-23', '15:41:13', 'Safari 9537.53iOS', '36.79.174.41'),
(109, 'Adm0003', 'owensantoso', '1', '2015-12-23', '15:46:34', 'Firefox 43.0Windows 10', '180.214.232.81'),
(110, 'Adm0003', 'owensantoso', '1', '2015-12-23', '15:46:35', 'Firefox 43.0Windows 10', '180.214.232.81'),
(111, 'Adm0004', 'ramondekong', '1', '2015-12-23', '15:55:22', 'Safari 9537.53iOS', '36.79.174.41'),
(112, 'Adm0005', 'yung.jr', '1', '2015-12-23', '16:17:59', 'Firefox 43.0Windows 8.1', '139.193.12.127'),
(113, 'Adm0002', 'erwinc', '1', '2015-12-23', '16:30:10', 'Chrome 34.0.1847.76Android', '202.62.16.3'),
(114, 'Adm0004', 'ramondekong', '1', '2015-12-23', '16:31:07', 'Chrome 47.0.2526.106Windows 10', '180.214.232.81'),
(115, 'Adm0005', 'yung.jr', '1', '2015-12-23', '16:34:56', 'Chrome 6.0.422.0Windows 7', '202.62.17.124'),
(116, 'Adm0003', 'owensantoso', '1', '2015-12-23', '16:38:02', 'Chrome 47.0.2526.83Android', '180.214.233.127'),
(117, 'Adm0001', 'felixsadikin', '1', '2015-12-23', '16:41:20', 'Chrome 38.0.2125.102Android', '112.215.66.76'),
(118, 'Adm0005', 'yung.jr', '1', '2015-12-23', '16:45:58', 'Chrome 42.0.2311.135Windows 10', '180.214.232.81'),
(119, 'Adm0005', 'yung.jr', '1', '2015-12-23', '16:49:53', 'Chrome 47.0.2526.83Android', '180.214.233.127'),
(120, 'Adm0005', 'yung.jr', '1', '2015-12-23', '17:00:25', 'Chrome 47.0.2526.83Android', '202.62.17.124'),
(121, 'Adm0001', 'felixsadikin', '1', '2015-12-24', '09:25:32', 'Chrome 47.0.2526.106Windows 10', '182.253.128.24'),
(122, 'Adm0001', 'felixsadikin', '1', '2015-12-24', '10:31:28', 'Chrome 38.0.2125.102Android', '112.215.66.70'),
(123, 'Adm0005', 'yung.jr', '1', '2015-12-24', '11:49:09', 'Chrome 47.0.2526.83Android', '202.62.17.124'),
(124, 'Adm0004', 'ramondekong', '1', '2015-12-24', '22:35:17', 'Safari 9537.53iOS', '36.79.196.246'),
(125, 'Adm0003', 'owensantoso', '1', '2015-12-26', '08:45:40', 'Chrome 47.0.2526.106Windows 8.1', '36.71.242.218'),
(126, 'Adm0003', 'owensantoso', '1', '2015-12-26', '08:52:20', 'Chrome 47.0.2526.106Windows 8.1', '36.71.242.218'),
(127, 'Adm0001', 'felixsadikin', '1', '2015-12-28', '11:34:22', 'Chrome 47.0.2526.106Windows 10', '182.253.128.24'),
(128, 'Adm0002', 'erwinc', '1', '2015-12-28', '13:58:33', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(129, 'Adm0001', 'felixsadikin', '1', '2015-12-28', '14:21:36', 'Chrome 47.0.2526.106Windows 10', '182.253.128.24'),
(130, 'Adm0002', 'erwinc', '1', '2015-12-28', '15:05:50', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(131, 'Adm0004', 'ramondekong', '1', '2015-12-28', '16:10:28', 'Safari 9537.53iOS', '36.79.174.41'),
(132, 'Adm0005', 'yung.jr', '1', '2015-12-28', '16:15:55', 'Chrome 47.0.2526.83Android', '202.62.17.75'),
(133, 'Adm0002', 'erwinc', '1', '2015-12-28', '16:50:41', 'Chrome 34.0.1847.76Android', '124.195.118.78'),
(134, 'Adm0002', 'erwinc', '1', '2015-12-28', '16:53:52', 'Chrome 47.0.2526.83Android', '124.195.118.78'),
(135, 'Adm0002', 'erwinc', '1', '2015-12-28', '17:03:01', 'Chrome 47.0.2526.83Android', '124.195.117.22'),
(136, 'Adm0002', 'erwinc', '1', '2015-12-28', '17:09:26', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(137, 'Adm0003', 'owensantoso', '1', '2015-12-28', '18:18:17', 'Chrome 47.0.2526.83Android', '64.233.173.129'),
(138, 'Adm0002', 'erwinc', '1', '2015-12-29', '08:09:04', 'Chrome 47.0.2526.106Windows 8.1', '36.71.242.218'),
(139, 'Adm0001', 'felixsadikin', '1', '2015-12-30', '11:40:50', 'Chrome 47.0.2526.106Windows 10', '182.253.128.24'),
(140, 'Adm0003', 'owensantoso', '1', '2015-12-30', '12:53:06', 'Chrome 47.0.2526.83Android', '64.233.173.129'),
(141, 'Adm0002', 'erwinc', '1', '2015-12-30', '14:11:48', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(142, 'Adm0001', 'felixsadikin', '1', '2015-12-30', '15:03:58', 'Chrome 47.0.2526.106Windows 10', '180.214.232.87'),
(143, 'Adm0002', 'erwinc', '1', '2015-12-31', '09:47:56', 'Chrome 47.0.2526.106Windows 8.1', '180.253.3.197'),
(144, 'Adm0001', 'felixsadikin', '1', '2016-01-01', '13:29:47', 'Chrome 47.0.2526.106Windows 10', '182.253.128.24'),
(145, 'Adm0003', 'owensantoso', '1', '2016-01-01', '13:32:52', 'Firefox 43.0Windows 10', '182.253.128.24'),
(146, 'Adm0002', 'erwinc', '1', '2016-01-04', '22:18:49', 'Chrome 47.0.2526.106Windows 8.1', '36.72.36.214'),
(147, 'Adm0003', 'owensantoso', '1', '2016-01-06', '13:30:12', 'Chrome 47.0.2526.83Android', '64.233.173.129'),
(148, 'Adm0001', 'felixsadikin', '1', '2016-01-06', '13:43:15', 'Chrome 47.0.2526.106Windows 10', '182.253.128.13'),
(149, 'Adm0005', 'yung.jr', '1', '2016-01-06', '13:52:52', 'Chrome 47.0.2526.83Android', '202.62.16.135'),
(150, 'Adm0002', 'erwinc', '1', '2016-01-06', '13:53:17', 'Chrome 47.0.2526.106Windows 8.1', '139.193.12.127'),
(151, 'Adm0004', 'ramondekong', '1', '2016-01-06', '13:59:09', 'Safari 9537.53iOS', '112.215.66.74'),
(152, 'Adm0002', 'erwinc', '1', '2016-01-06', '14:16:13', 'Chrome 34.0.1847.76Android', '202.62.16.74'),
(153, 'Adm0005', 'yung.jr', '1', '2016-01-06', '14:19:21', 'Chrome 47.0.2526.83Android', '202.62.16.135'),
(154, 'Adm0001', 'felixsadikin', '1', '2016-01-06', '14:20:14', 'Chrome 38.0.2125.102Android', '112.215.66.68'),
(155, 'Adm0003', 'owensantoso', '1', '2016-01-06', '15:35:47', 'Chrome 47.0.2526.106Windows 10', '182.253.128.13'),
(156, 'Adm0001', 'felixsadikin', '1', '2016-01-06', '15:36:32', 'Chrome 47.0.2526.106Windows 10', '182.253.128.13'),
(157, 'Adm0003', 'owensantoso', '1', '2016-01-06', '15:37:40', 'Firefox 43.0Windows 10', '182.253.128.13'),
(158, 'Adm0005', 'yung.jr', '1', '2016-01-06', '15:41:21', 'Firefox 43.0Windows 10', '182.253.128.13'),
(159, 'Adm0004', 'ramondekong', '1', '2016-01-06', '15:43:14', 'Firefox 43.0Windows 10', '182.253.128.13'),
(160, 'Adm0002', 'erwinc', '1', '2016-01-06', '15:46:22', 'Firefox 43.0Windows 10', '182.253.128.13'),
(161, 'Adm0001', 'felixsadikin', '1', '2016-01-06', '15:59:50', 'Firefox 43.0Windows 10', '182.253.128.13'),
(162, 'Adm0001', 'felixsadikin', '1', '2016-01-07', '09:08:33', 'Firefox 43.0Windows 10', '182.253.128.24'),
(163, 'Adm0002', 'erwinc', '1', '2016-01-07', '17:00:44', 'Firefox 43.0Windows 10', '182.253.128.24'),
(164, 'Adm0001', 'felixsadikin', '1', '2016-01-13', '10:31:47', 'Firefox 43.0Windows 10', '103.10.66.77'),
(165, 'Adm0003', 'owensantoso', '1', '2016-01-13', '10:40:55', 'Chrome 47.0.2526.106Windows 10', '112.215.66.75'),
(166, 'Adm0001', 'felixsadikin', '1', '2016-01-13', '10:48:41', 'Firefox 43.0Windows 8.1', '182.253.128.9'),
(167, 'Adm0001', 'felixsadikin', '1', '2016-01-13', '10:52:56', 'Chrome 38.0.2125.102Android', '112.215.66.78'),
(168, 'Adm0003', 'owensantoso', '1', '2016-01-13', '11:00:04', 'Chrome 47.0.2526.83Android', '64.233.173.129'),
(169, 'Adm0002', 'erwinc', '1', '2016-01-13', '11:02:53', 'Chrome 47.0.2526.106Windows 10', '112.215.66.77'),
(170, 'Adm0005', 'yung.jr', '1', '2016-01-13', '11:03:06', 'Chrome 47.0.2526.83Android', '202.62.17.66'),
(171, 'Adm0004', 'ramondekong', '1', '2016-01-13', '11:08:22', 'Chrome 47.0.2526.106Windows 10', '112.215.66.68'),
(172, 'Adm0001', 'felixsadikin', '1', '2016-01-13', '11:15:26', 'Firefox 43.0Windows 10', '112.215.66.68'),
(173, 'Adm0002', 'erwinc', '1', '2016-01-13', '19:06:12', 'Chrome 47.0.2526.106Windows 8.1', '182.253.128.9'),
(174, 'Adm0004', 'ramondekong', '1', '2016-01-19', '10:35:17', 'Chrome 47.0.2526.111Windows 10', '112.215.66.70'),
(175, 'Adm0004', 'ramondekong', '1', '2016-01-19', '22:04:56', 'Chrome 47.0.2526.111Windows 10', '112.215.66.73'),
(176, 'Adm0002', 'erwinc', '1', '2016-01-20', '20:10:43', 'Chrome 47.0.2526.111Windows 10', '36.78.14.233'),
(177, 'Adm0002', 'erwinc', '1', '2016-01-20', '20:44:08', 'Firefox 43.0Windows XP', '114.4.75.67'),
(178, 'Adm0003', 'owensantoso', '1', '2016-01-20', '20:47:31', 'Chrome 47.0.2526.83Android', '64.233.173.238'),
(179, 'Adm0004', 'ramondekong', '1', '2016-01-20', '20:56:53', 'Chrome 47.0.2526.111Windows 10', '112.215.66.68'),
(180, 'Adm0004', 'ramondekong', '1', '2016-01-20', '22:30:53', 'Firefox 41.0Windows 10', '112.215.66.77'),
(181, 'Adm0002', 'erwinc', '1', '2016-01-20', '23:55:57', 'Firefox 43.0Windows 10', '36.78.14.233'),
(182, 'Adm0003', 'owensantoso', '1', '2016-01-21', '00:17:11', 'Chrome 47.0.2526.83Android', '64.233.173.238'),
(183, 'Adm0002', 'erwinc', '1', '2016-01-21', '00:19:00', 'Chrome 42.0.2311.135Windows 10', '36.78.14.233'),
(184, 'Adm0002', 'erwinc', '1', '2016-01-21', '00:20:33', 'Chrome 42.0.2311.135Windows 10', '36.78.14.233'),
(185, 'Adm0004', 'ramondekong', '1', '2016-01-21', '19:48:33', 'Firefox 41.0Windows 10', '112.215.66.73'),
(186, 'Adm0003', 'owensantoso', '1', '2016-01-21', '19:53:36', 'Chrome 47.0.2526.83Android', '64.233.173.234'),
(187, 'Adm0001', 'felixsadikin', '1', '2016-01-21', '22:41:17', 'Chrome 48.0.2564.82Windows 8', '112.215.66.74'),
(188, 'Adm0004', 'ramondekong', '1', '2016-01-22', '19:18:40', 'Firefox 41.0Windows 10', '112.215.66.68'),
(189, 'Adm0001', 'felixsadikin', '1', '2016-01-22', '19:59:32', 'Chrome 38.0.2125.102Android', '222.124.121.225'),
(190, 'Adm0004', 'ramondekong', '1', '2016-01-22', '20:05:06', 'Firefox 41.0Windows 10', '112.215.66.72'),
(191, 'Adm0005', 'yung.jr', '1', '2016-01-22', '20:37:48', 'Chrome 47.0.2526.83Android', '202.62.16.12'),
(192, 'Adm0002', 'erwinc', '1', '2016-01-22', '20:49:15', 'Chrome 34.0.1847.76Android', '114.4.78.84'),
(193, 'Adm0003', 'owensantoso', '1', '2016-01-22', '21:06:14', 'Chrome 47.0.2526.83Android', '64.233.173.234'),
(194, 'Adm0004', 'ramondekong', '1', '2016-01-22', '22:30:19', 'Safari 9537.53iOS', '1.9.216.91'),
(195, 'Adm0004', 'ramondekong', '1', '2016-01-22', '22:31:37', 'Safari 9537.53iOS', '1.9.216.91'),
(196, 'Adm0001', 'felixsadikin', '1', '2016-01-22', '22:47:54', 'Chrome 38.0.2125.102Android', '222.124.121.225'),
(197, 'Adm0005', 'yung.jr', '1', '2016-01-22', '22:48:53', 'Chrome 47.0.2526.83Android', '202.62.16.12'),
(198, 'Adm0002', 'erwinc', '1', '2016-01-22', '22:55:39', 'Chrome 34.0.1847.76Android', '114.4.78.84'),
(199, 'Adm0002', 'erwinc', '1', '2016-01-23', '00:45:19', 'Chrome 47.0.2526.111Windows 8.1', '103.28.12.88'),
(200, 'Adm0003', 'owensantoso', '1', '2016-01-23', '22:47:50', 'Chrome 47.0.2526.83Android', '64.233.173.242'),
(201, 'Adm0004', 'ramondekong', '1', '2016-01-24', '19:19:20', 'Firefox 41.0Windows 10', '112.215.66.70'),
(202, 'Adm0003', 'owensantoso', '1', '2016-01-24', '20:00:37', 'Chrome 47.0.2526.83Android', '64.233.173.238'),
(203, 'Adm0001', 'felixsadikin', '1', '2016-01-24', '22:46:50', 'Chrome 48.0.2564.82Windows 8', '112.215.66.69'),
(204, 'Adm0002', 'erwinc', '1', '2016-01-24', '23:03:21', 'Chrome 34.0.1847.76Android', '202.62.16.29'),
(205, 'Adm0004', 'ramondekong', '1', '2016-01-24', '23:07:07', 'Safari 9537.53iOS', '202.69.69.221'),
(206, 'Adm0005', 'yung.jr', '1', '2016-01-24', '23:16:51', 'Chrome 47.0.2526.83Android', '202.62.16.89'),
(207, 'Adm0001', 'felixsadikin', '1', '2016-01-24', '23:37:22', 'Chrome 38.0.2125.102Android', '112.215.66.68'),
(208, 'Adm0002', 'erwinc', '1', '2016-01-25', '00:20:10', 'Chrome 47.0.2526.111Windows 10', '103.28.12.88'),
(209, 'Adm0004', 'ramondekong', '1', '2016-01-25', '00:40:39', 'Firefox 41.0Windows 10', '112.215.66.77'),
(210, 'Adm0002', 'erwinc', '1', '2016-01-25', '02:37:53', 'Chrome 47.0.2526.111Windows 8.1', '139.193.12.127'),
(211, 'Adm0002', 'erwinc', '1', '2016-01-25', '02:45:33', 'Chrome 47.0.2526.111Windows 8.1', '139.193.12.127'),
(212, 'Adm0004', 'ramondekong', '1', '2016-01-25', '21:36:23', 'Firefox 41.0Windows 10', '112.215.66.76'),
(213, 'Adm0002', 'erwinc', '1', '2016-01-26', '03:57:04', 'Chrome 47.0.2526.111Windows 8.1', '139.193.12.127'),
(214, 'Adm0002', 'erwinc', '1', '2016-01-26', '03:59:06', 'Chrome 47.0.2526.111Windows 10', '103.28.12.88'),
(215, 'Adm0004', 'ramondekong', '1', '2016-01-26', '19:29:28', 'Firefox 41.0Windows 10', '112.215.66.75'),
(216, 'Adm0002', 'erwinc', '1', '2016-01-26', '19:51:01', 'Chrome 48.0.2564.82Windows 8.1', '39.250.207.14'),
(217, 'Adm0003', 'owensantoso', '1', '2016-01-26', '20:49:04', 'Chrome 47.0.2526.83Android', '112.215.66.78'),
(218, 'Adm0005', 'yung.jr', '1', '2016-01-26', '20:52:54', 'Chrome 47.0.2526.83Android', '202.62.16.140'),
(219, 'Adm0002', 'erwinc', '1', '2016-01-26', '21:03:31', 'Chrome 34.0.1847.76Android', '202.62.16.201'),
(220, 'Adm0002', 'erwinc', '1', '2016-01-26', '21:06:43', 'Chrome 47.0.2526.111Windows 10', '36.72.54.247'),
(221, 'Adm0003', 'owensantoso', '1', '2016-01-26', '21:10:56', 'Chrome 42.0.2311.135Windows 10', '36.72.54.247'),
(222, 'Adm0003', 'owensantoso', '1', '2016-01-26', '21:38:11', 'Chrome 42.0.2311.135Windows 10', '36.72.54.247'),
(223, 'Adm0004', 'ramondekong', '1', '2016-01-26', '21:48:19', 'Safari 9537.53iOS', '112.96.128.101'),
(224, 'Adm0001', 'felixsadikin', '1', '2016-01-26', '22:09:04', 'Chrome 38.0.2125.102Android', '222.124.121.225'),
(225, 'Adm0002', 'erwinc', '1', '2016-01-27', '01:28:22', 'Chrome 48.0.2564.82Windows 8.1', '36.72.54.247'),
(226, 'Adm0004', 'ramondekong', '1', '2016-01-27', '19:21:23', 'Chrome 48.0.2564.82Windows 10', '112.215.66.68'),
(227, 'Adm0002', 'erwinc', '1', '2016-01-27', '19:44:48', 'Chrome 47.0.2526.111Windows 10', '182.253.128.24'),
(228, 'Adm0003', 'owensantoso', '1', '2016-01-29', '07:17:38', 'Chrome 47.0.2526.83Android', '64.233.173.238'),
(229, 'Adm0003', 'owensantoso', '1', '2016-01-29', '07:18:16', 'Chrome 47.0.2526.83Android', '64.233.173.238'),
(230, 'Adm0004', 'ramondekong', '1', '2016-02-01', '23:22:43', 'Chrome 48.0.2564.82Windows 10', '112.215.63.12'),
(231, 'Adm0002', 'erwinc', '1', '2016-02-01', '23:28:45', 'Chrome 34.0.1847.76Android', '202.62.17.168'),
(232, 'Adm0003', 'owensantoso', '1', '2016-02-01', '23:47:28', 'Chrome 47.0.2526.83Android', '64.233.173.234'),
(233, 'Adm0001', 'felixsadikin', '1', '2016-02-01', '23:49:27', 'Chrome 38.0.2125.102Android', '112.215.63.21'),
(234, 'Adm0004', 'ramondekong', '1', '2016-02-01', '23:55:47', 'Safari 601.1iOS', '180.253.115.152'),
(235, 'Adm0005', 'yung.jr', '1', '2016-02-02', '00:00:34', 'Chrome 47.0.2526.83Android', '202.62.16.223'),
(236, 'Adm0001', 'felixsadikin', '1', '2016-02-02', '02:28:59', 'Chrome 38.0.2125.102Android', '120.164.46.181'),
(237, 'Adm0003', 'owensantoso', '1', '2016-02-02', '02:29:07', 'Chrome 47.0.2526.83Android', '64.233.173.238'),
(238, 'Adm0002', 'erwinc', '1', '2016-02-02', '16:51:45', 'Chrome 48.0.2564.97Windows 10', '182.253.128.21'),
(239, 'Adm0004', 'ramondekong', '1', '2016-02-03', '11:41:53', 'Chrome 48.0.2564.97Windows 10', '112.215.63.21'),
(240, 'Adm0004', 'ramondekong', '1', '2016-02-05', '08:38:13', 'Chrome 48.0.2564.97Windows 10', '112.215.63.15'),
(241, 'Adm0004', 'ramondekong', '1', '2016-02-06', '12:17:12', 'Chrome 48.0.2564.103Windows 10', '112.215.63.22'),
(242, 'Adm0004', 'ramondekong', '1', '2016-02-09', '08:23:52', 'Chrome 48.0.2564.103Windows 10', '112.215.63.21'),
(243, 'Adm0002', 'erwinc', '1', '2016-02-09', '09:25:36', 'Chrome 48.0.2564.103Windows 8.1', '182.253.128.35'),
(244, 'Adm0002', 'erwinc', '1', '2016-02-09', '09:35:09', 'Chrome 48.0.2564.103Windows 8.1', '182.253.128.35'),
(245, 'Adm0002', 'erwinc', '1', '2016-02-09', '10:33:50', 'Chrome 48.0.2564.103Windows 10', '222.124.108.42'),
(246, 'Adm0006', 'Admin', '1', '2016-02-09', '15:04:45', 'Chrome 48.0.2564.103Windows 10', '112.215.63.18'),
(247, 'Adm0006', 'Admin', '1', '2016-02-10', '10:29:50', 'Chrome 48.0.2564.103Windows 10', '112.215.63.13'),
(248, 'Adm0002', 'erwinc', '1', '2016-02-11', '12:29:23', 'Chrome 48.0.2564.109Windows 10', '222.124.108.42'),
(249, 'Adm0002', 'erwinc', '1', '2016-02-11', '12:31:25', 'Chrome 48.0.2564.109Windows 10', '222.124.108.42'),
(250, 'Adm0002', 'erwinc', '1', '2016-02-11', '12:32:07', 'Chrome 48.0.2564.109Windows 10', '222.124.108.42'),
(251, 'Adm0002', 'erwinc', '1', '2016-02-11', '13:01:36', 'Chrome 48.0.2564.109Windows 8.1', '182.253.128.29'),
(252, 'Adm0002', 'erwinc', '1', '2016-02-11', '15:41:32', 'Chrome 48.0.2564.109Windows 10', '222.124.108.42'),
(253, 'Adm0005', 'yung.jr', '1', '2016-02-12', '22:39:15', 'Chrome 47.0.2526.83Android', '202.62.16.185'),
(254, 'Adm0002', 'erwinc', '1', '2016-02-12', '22:41:18', 'Chrome 34.0.1847.76Android', '125.162.18.229'),
(255, 'Adm0001', 'felixsadikin', '1', '2016-02-12', '23:59:09', 'Chrome 38.0.2125.102Android', '36.72.46.39'),
(256, 'Adm0002', 'erwinc', '1', '2016-02-13', '07:25:27', 'Chrome 34.0.1847.76Android', '125.162.18.229'),
(257, 'Adm0006', 'Admin', '1', '2016-02-13', '08:53:04', 'Chrome 48.0.2564.103Windows 10', '112.215.63.17'),
(258, 'Adm0003', 'owensantoso', '1', '2016-02-13', '14:14:15', 'Chrome 48.0.2564.95Android', '64.233.173.242'),
(259, 'Adm0002', 'erwinc', '1', '2016-02-13', '14:52:25', 'Chrome 34.0.1847.76Android', '125.162.18.229'),
(260, 'Adm0004', 'ramondekong', '1', '2016-02-14', '20:27:44', 'Safari 601.1iOS', '36.72.193.97'),
(261, 'Adm0002', 'erwinc', '1', '2016-02-15', '08:55:19', 'Chrome 48.0.2564.109Windows 10', '180.253.10.68'),
(262, 'Adm0004', 'ramondekong', '1', '2016-02-15', '10:09:39', 'Chrome 48.0.2564.109Windows 10', '112.215.63.20'),
(263, 'Adm0002', 'erwinc', '1', '2016-02-15', '13:33:32', 'Chrome 48.0.2564.109Windows 8.1', '182.253.128.19'),
(264, 'Adm0004', 'ramondekong', '1', '2016-02-16', '08:28:14', 'Chrome 48.0.2564.109Windows 10', '112.215.63.21'),
(265, 'Adm0001', 'felixsadikin', '1', '2016-02-16', '17:22:02', 'Chrome 38.0.2125.102Android', '112.215.63.14'),
(266, 'Adm0002', 'erwinc', '1', '2016-02-16', '17:49:43', 'Chrome 34.0.1847.76Android', '124.195.113.218'),
(267, 'Adm0004', 'ramondekong', '1', '2016-02-16', '17:51:01', 'Safari 601.1iOS', '180.245.186.99'),
(268, 'Adm0005', 'yung.jr', '1', '2016-02-16', '18:35:57', 'Chrome 47.0.2526.83Android', '114.125.11.25'),
(269, 'Adm0003', 'owensantoso', '1', '2016-02-16', '18:40:27', 'Chrome 48.0.2564.95Android', '64.233.173.234'),
(270, 'Adm0004', 'ramondekong', '1', '2016-02-16', '19:55:36', 'Safari 601.1iOS', '180.245.186.99'),
(271, 'Adm0001', 'felixsadikin', '1', '2016-02-16', '20:10:05', 'Chrome 38.0.2125.102Android', '180.253.233.53'),
(272, 'Adm0002', 'erwinc', '1', '2016-02-16', '20:33:17', 'Chrome 34.0.1847.76Android', '125.162.18.229'),
(273, 'Adm0004', 'ramondekong', '1', '2016-02-16', '21:15:36', 'Safari 9537.53iOS', '180.245.186.99'),
(274, 'Adm0001', 'felixsadikin', '1', '2016-02-16', '23:45:56', 'Safari 601.1iOS', '180.253.233.53'),
(275, 'Adm0005', 'yung.jr', '1', '2016-02-16', '23:46:17', 'Chrome 47.0.2526.83Android', '202.62.16.95'),
(276, 'Adm0002', 'erwinc', '1', '2016-02-17', '07:51:53', 'Chrome 34.0.1847.76Android', '124.195.112.239'),
(277, 'Adm0005', 'yung.jr', '1', '2016-02-17', '08:23:11', 'Chrome 47.0.2526.83Android', '202.62.17.115'),
(278, 'Adm0004', 'ramondekong', '1', '2016-02-17', '08:33:31', 'Safari 601.1iOS', '180.245.186.99'),
(279, 'Adm0005', 'yung.jr', '1', '2016-02-17', '11:09:11', 'Chrome 47.0.2526.83Android', '202.62.17.115'),
(280, 'Adm0004', 'ramondekong', '1', '2016-02-17', '11:24:14', 'Safari 9537.53iOS', '112.215.63.19'),
(281, 'Adm0002', 'erwinc', '1', '2016-02-17', '11:24:17', 'Firefox 44.0Windows 10', '180.214.232.28'),
(282, 'Adm0001', 'felixsadikin', '1', '2016-02-17', '11:24:41', 'Safari 601.1iOS', '114.121.129.225'),
(283, 'Adm0001', 'felixsadikin', '1', '2016-02-17', '11:32:45', 'Chrome 38.0.2125.102Android', '120.161.1.87'),
(284, 'Adm0002', 'erwinc', '1', '2016-02-17', '11:34:23', 'Chrome 34.0.1847.76Android', '202.62.17.199'),
(285, 'Adm0002', 'erwinc', '1', '2016-02-17', '11:35:20', 'Chrome 48.0.2564.109Windows 10', '180.214.232.28'),
(286, 'Adm0002', 'erwinc', '1', '2016-02-17', '11:35:42', 'Chrome 48.0.2564.109Windows 8.1', '139.193.12.7'),
(287, 'Adm0002', 'erwinc', '1', '2016-02-17', '11:48:46', 'Chrome 48.0.2564.109Windows 10', '180.214.232.28'),
(288, 'Adm0004', 'ramondekong', '1', '2016-02-17', '11:54:01', 'Chrome 48.0.2564.109Windows 10', '180.214.232.28'),
(289, 'Adm0003', 'owensantoso', '1', '2016-02-17', '12:08:58', 'Chrome 48.0.2564.95Android', '64.233.173.234'),
(290, 'Adm0004', 'ramondekong', '1', '2016-02-17', '17:00:43', 'Safari 601.1iOS', '180.245.186.99'),
(291, 'Adm0003', 'owensantoso', '1', '2016-02-17', '17:30:24', 'Chrome 48.0.2564.95Android', '64.233.173.234'),
(292, 'Adm0003', 'owensantoso', '1', '2016-02-17', '20:42:28', 'Chrome 48.0.2564.95Android', '64.233.173.234'),
(293, 'Adm0005', 'yung.jr', '1', '2016-02-17', '22:06:41', 'Chrome 47.0.2526.83Android', '202.62.16.37'),
(294, 'Adm0004', 'ramondekong', '1', '2016-02-17', '23:28:08', 'Safari 9537.53iOS', '180.245.186.99'),
(295, 'Adm0003', 'owensantoso', '1', '2016-02-18', '04:08:21', 'Chrome 48.0.2564.95Android', '64.233.173.242'),
(296, 'Adm0003', 'owensantoso', '1', '2016-02-18', '09:38:48', 'Chrome 48.0.2564.109Windows 8.1', '182.253.128.22'),
(297, 'Adm0004', 'ramondekong', '1', '2016-02-18', '09:57:03', 'Chrome 48.0.2564.109Windows 10', '112.215.63.15'),
(298, 'Adm0004', 'ramondekong', '1', '2016-02-18', '10:25:17', 'Safari 601.1iOS', '180.245.186.99'),
(299, 'Adm0004', 'ramondekong', '1', '2016-02-19', '08:11:27', 'Chrome 48.0.2564.109Windows 10', '112.215.63.15'),
(300, 'Adm0004', 'ramondekong', '1', '2016-02-20', '08:24:15', 'Chrome 48.0.2564.109Windows 10', '112.215.63.15'),
(301, 'Adm0005', 'yung.jr', '1', '2016-02-20', '12:20:22', 'Chrome 47.0.2526.83Android', '202.62.17.114'),
(302, 'Adm0003', 'owensantoso', '1', '2016-02-20', '12:31:20', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(303, 'Adm0004', 'ramondekong', '1', '2016-02-20', '12:35:46', 'Chrome 48.0.2564.95Android', '64.233.173.194'),
(304, 'Adm0004', 'ramondekong', '1', '2016-02-22', '08:10:08', 'Chrome 48.0.2564.116Windows 10', '112.215.63.14'),
(305, 'Adm0003', 'owensantoso', '1', '2016-02-22', '08:18:14', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(306, 'Adm0005', 'yung.jr', '1', '2016-02-22', '11:54:36', 'Chrome 48.0.2564.95Android', '202.62.16.201'),
(307, 'Adm0003', 'owensantoso', '1', '2016-02-22', '11:56:22', 'Chrome 48.0.2564.95Android', '64.233.173.194'),
(308, 'Adm0004', 'ramondekong', '1', '2016-02-22', '14:26:20', 'Safari 601.1iOS', '180.245.186.99'),
(309, 'Adm0005', 'yung.jr', '1', '2016-02-22', '22:01:15', 'Chrome 48.0.2564.95Android', '202.62.16.63'),
(310, 'Adm0003', 'owensantoso', '1', '2016-02-22', '22:04:13', 'Chrome 48.0.2564.95Android', '64.233.173.190'),
(311, 'Adm0003', 'owensantoso', '1', '2016-02-23', '04:09:22', 'Chrome 48.0.2564.116Windows 8.1', '182.253.128.22'),
(312, 'Adm0004', 'ramondekong', '1', '2016-02-23', '08:36:10', 'Chrome 48.0.2564.116Windows 10', '36.72.206.82'),
(313, 'Adm0004', 'ramondekong', '1', '2016-02-23', '08:40:22', 'Chrome 48.0.2564.116Windows 10', '112.215.63.16'),
(314, 'Adm0003', 'owensantoso', '1', '2016-02-23', '09:58:28', 'Chrome 48.0.2564.95Android', '64.233.173.190'),
(315, 'Adm0005', 'yung.jr', '1', '2016-02-23', '10:04:56', 'Chrome 48.0.2564.95Android', '202.62.17.153'),
(316, 'Adm0005', 'yung.jr', '1', '2016-02-23', '10:22:24', 'Chrome 48.0.2564.95Android', '202.62.17.153'),
(317, 'Adm0004', 'ramondekong', '1', '2016-02-23', '11:33:13', 'Chrome 48.0.2564.116Windows 10', '36.72.206.82'),
(318, 'Adm0004', 'ramondekong', '1', '2016-02-23', '12:00:23', 'Safari 601.1iOS', '180.245.186.99'),
(319, 'Adm0003', 'owensantoso', '1', '2016-02-23', '13:30:25', 'Chrome 48.0.2564.116Windows 8.1', '182.253.128.22'),
(320, 'Adm0004', 'ramondekong', '1', '2016-02-23', '13:51:00', 'Safari 9537.53iOS', '112.215.63.16'),
(321, 'Adm0004', 'ramondekong', '1', '2016-02-23', '14:59:23', 'Chrome 48.0.2564.116Windows 10', '36.72.206.82'),
(322, 'Adm0004', 'ramondekong', '1', '2016-02-23', '15:02:44', 'Chrome 48.0.2564.116Windows 10', '36.72.206.82'),
(323, 'Adm0004', 'ramondekong', '1', '2016-02-23', '15:13:00', 'Chrome 48.0.2564.116Windows 10', '36.72.206.82'),
(324, 'Adm0005', 'yung.jr', '1', '2016-02-23', '17:49:18', 'Chrome 48.0.2564.95Android', '202.62.17.140'),
(325, 'Adm0004', 'ramondekong', '1', '2016-02-23', '18:03:52', 'Safari 9537.53iOS', '180.245.166.13'),
(326, 'Adm0003', 'owensantoso', '1', '2016-02-23', '18:55:20', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(327, 'Adm0003', 'owensantoso', '1', '2016-02-23', '22:51:52', 'Chrome 48.0.2564.95Android', '64.233.173.194'),
(328, 'Adm0003', 'owensantoso', '1', '2016-02-24', '06:56:22', 'Chrome 48.0.2564.95Android', '64.233.173.194'),
(329, 'Adm0004', 'ramondekong', '1', '2016-02-24', '08:21:53', 'Chrome 48.0.2564.116Windows 10', '112.215.63.19'),
(330, 'Adm0004', 'ramondekong', '1', '2016-02-24', '08:22:32', 'Safari 601.1iOS', '180.245.166.13'),
(331, 'Adm0004', 'ramondekong', '1', '2016-02-24', '09:57:15', 'Chrome 48.0.2564.116Windows 10', '36.72.206.82'),
(332, 'Adm0005', 'yung.jr', '1', '2016-02-24', '10:15:53', 'Chrome 48.0.2564.95Android', '202.62.16.205'),
(333, 'Adm0004', 'ramondekong', '1', '2016-02-24', '10:47:51', 'Chrome 42.0.2311.135Windows 10', '36.72.206.82'),
(334, 'Adm0004', 'ramondekong', '1', '2016-02-24', '10:58:27', 'Chrome 48.0.2564.95Android', '36.72.206.82'),
(335, 'Adm0005', 'yung.jr', '1', '2016-02-24', '11:21:18', 'Chrome 48.0.2564.116Windows 10', '112.215.63.16'),
(336, 'Adm0004', 'ramondekong', '1', '2016-02-24', '12:22:53', 'Chrome 48.0.2564.116Windows 10', '112.215.63.22'),
(337, 'Adm0003', 'owensantoso', '1', '2016-02-24', '12:23:40', 'Chrome 48.0.2564.95Android', '64.233.173.190'),
(338, 'Adm0004', 'ramondekong', '1', '2016-02-24', '13:12:15', 'Chrome 42.0.2311.135Windows 10', '36.72.206.82'),
(339, 'Adm0004', 'ramondekong', '1', '2016-02-24', '13:12:25', 'Safari 601.1iOS', '180.253.243.133'),
(340, 'Adm0004', 'ramondekong', '1', '2016-02-24', '14:02:07', 'Chrome 42.0.2311.135Windows 10', '36.72.206.82'),
(341, 'Adm0005', 'yung.jr', '1', '2016-02-24', '14:56:18', 'Chrome 48.0.2564.95Android', '202.62.16.205'),
(342, 'Adm0005', 'yung.jr', '1', '2016-02-24', '14:57:27', 'Chrome 48.0.2564.95Android', '202.62.16.205'),
(343, 'Adm0005', 'yung.jr', '1', '2016-02-24', '15:04:38', 'Chrome 6.0.422.0Windows 7', '202.62.16.205'),
(344, 'Adm0005', 'yung.jr', '1', '2016-02-24', '15:20:02', 'Chrome 42.0.2311.135Windows 10', '36.72.206.82'),
(345, 'Adm0003', 'owensantoso', '1', '2016-02-24', '15:23:43', 'Firefox 29.0Windows 7', '182.253.150.112'),
(346, 'Adm0005', 'yung.jr', '1', '2016-02-24', '15:23:51', 'Chrome 48.0.2564.116Windows 8.1', '139.192.249.40'),
(347, 'Adm0005', 'yung.jr', '1', '2016-02-24', '17:12:46', 'Chrome 48.0.2564.95Android', '202.62.16.205'),
(348, 'Adm0004', 'ramondekong', '1', '2016-02-24', '17:30:09', 'Safari 601.1iOS', '180.245.166.13'),
(349, 'Adm0003', 'owensantoso', '1', '2016-02-24', '17:41:22', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(350, 'Adm0004', 'ramondekong', '1', '2016-02-24', '17:55:33', 'Safari 601.1iOS', '180.245.166.13'),
(351, 'Adm0005', 'yung.jr', '1', '2016-02-24', '19:17:49', 'Chrome 48.0.2564.95Android', '202.62.16.205'),
(352, 'Adm0004', 'ramondekong', '1', '2016-02-25', '08:17:42', 'Chrome 48.0.2564.116Windows 10', '112.215.63.16'),
(353, 'Adm0004', 'ramondekong', '1', '2016-02-25', '08:33:07', 'Chrome 42.0.2311.135Windows 10', '36.72.206.82'),
(354, 'Adm0003', 'owensantoso', '1', '2016-02-25', '09:53:11', 'Chrome 48.0.2564.95Android', '64.233.173.190'),
(355, 'Adm0004', 'ramondekong', '1', '2016-02-25', '15:55:41', 'Chrome 42.0.2311.135Windows 10', '36.72.206.82'),
(356, 'Adm0004', 'ramondekong', '1', '2016-02-25', '16:17:37', 'Chrome 42.0.2311.135Windows 10', '36.72.206.82'),
(357, 'Adm0005', 'yung.jr', '1', '2016-02-25', '21:25:15', 'Chrome 48.0.2564.116Windows 8.1', '182.253.128.22'),
(358, 'Adm0004', 'ramondekong', '1', '2016-02-26', '08:25:14', 'Chrome 48.0.2564.116Windows 10', '112.215.63.22'),
(359, 'Adm0003', 'owensantoso', '1', '2016-02-26', '09:34:17', 'Chrome 48.0.2564.95Android', '64.233.173.190'),
(360, 'Adm0004', 'ramondekong', '1', '2016-02-26', '11:35:05', 'Chrome 48.0.2564.116Windows 10', '112.215.63.20'),
(361, 'Adm0005', 'yung.jr', '1', '2016-02-27', '07:21:29', 'Chrome 48.0.2564.95Android', '114.125.40.139'),
(362, 'Adm0004', 'ramondekong', '1', '2016-02-27', '08:11:40', 'Chrome 48.0.2564.116Windows 10', '112.215.63.11'),
(363, 'Adm0005', 'yung.jr', '1', '2016-02-27', '09:51:02', 'Chrome 48.0.2564.116Windows 8.1', '182.253.128.22'),
(364, 'Adm0004', 'ramondekong', '1', '2016-02-27', '11:57:31', 'Chrome 48.0.2564.116Windows 10', '112.215.63.20'),
(365, 'Adm0004', 'ramondekong', '1', '2016-02-27', '13:04:34', 'Chrome 42.0.2311.135Windows 10', '36.72.206.82'),
(366, 'Adm0004', 'ramondekong', '1', '2016-02-29', '08:21:05', 'Chrome 48.0.2564.116Windows 10', '112.215.63.19'),
(367, 'Adm0003', 'owensantoso', '1', '2016-02-29', '17:40:27', 'Chrome 48.0.2564.95Android', '64.233.173.182'),
(368, 'Adm0005', 'yung.jr', '1', '2016-02-29', '17:47:53', 'Chrome 48.0.2564.95Android', '202.62.17.48'),
(369, 'Adm0005', 'yung.jr', '1', '2016-02-29', '17:49:48', 'Chrome 48.0.2564.95Android', '202.62.17.48'),
(370, 'Adm0005', 'yung.jr', '1', '2016-02-29', '20:48:35', 'Chrome 48.0.2564.95Android', '202.62.17.48'),
(371, 'Adm0003', 'owensantoso', '1', '2016-02-29', '22:07:29', 'Chrome 48.0.2564.95Android', '112.215.63.18'),
(372, 'Adm0004', 'ramondekong', '1', '2016-03-01', '08:26:31', 'Chrome 48.0.2564.116Windows 10', '112.215.63.13'),
(373, 'Adm0003', 'owensantoso', '1', '2016-03-01', '08:37:09', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(374, 'Adm0004', 'ramondekong', '1', '2016-03-01', '08:37:57', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(375, 'Adm0005', 'yung.jr', '1', '2016-03-01', '18:06:50', 'Chrome 48.0.2564.95Android', '202.62.16.238'),
(376, 'Adm0005', 'yung.jr', '1', '2016-03-01', '20:48:01', 'Chrome 48.0.2564.95Android', '202.62.16.238'),
(377, 'Adm0005', 'yung.jr', '1', '2016-03-02', '08:01:01', 'Chrome 48.0.2564.95Android', '114.125.61.11'),
(378, 'Adm0004', 'ramondekong', '1', '2016-03-02', '08:18:21', 'Safari 601.1iOS', '112.215.63.16'),
(379, 'Adm0004', 'ramondekong', '1', '2016-03-02', '08:19:01', 'Safari 601.1iOS', '112.215.63.19'),
(380, 'Adm0004', 'ramondekong', '1', '2016-03-02', '08:42:23', 'Chrome 48.0.2564.116Windows 10', '112.215.63.17'),
(381, 'Adm0003', 'owensantoso', '1', '2016-03-02', '14:33:40', 'Chrome 48.0.2564.95Android', '64.233.173.190'),
(382, 'Adm0005', 'yung.jr', '1', '2016-03-02', '14:55:17', 'Chrome 48.0.2564.95Android', '114.125.13.253'),
(383, 'Adm0005', 'yung.jr', '1', '2016-03-02', '18:23:07', 'Chrome 48.0.2564.95Android', '202.62.16.55'),
(384, 'Adm0005', 'yung.jr', '1', '2016-03-02', '20:25:57', 'Chrome 48.0.2564.95Android', '202.62.16.55'),
(385, 'Adm0003', 'owensantoso', '1', '2016-03-02', '20:29:06', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(386, 'Adm0005', 'yung.jr', '1', '2016-03-03', '08:01:09', 'Chrome 48.0.2564.95Android', '202.62.17.33'),
(387, 'Adm0003', 'owensantoso', '1', '2016-03-03', '09:55:28', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(388, 'Adm0004', 'ramondekong', '1', '2016-03-03', '14:25:38', 'Safari 601.1iOS', '222.124.126.163'),
(389, 'Adm0003', 'owensantoso', '1', '2016-03-04', '10:01:46', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(390, 'Adm0005', 'yung.jr', '1', '2016-03-05', '18:53:03', 'Chrome 48.0.2564.95Android', '202.62.17.188'),
(391, 'Adm0003', 'owensantoso', '1', '2016-03-05', '22:44:15', 'Chrome 48.0.2564.95Android', '64.233.173.194'),
(392, 'Adm0005', 'yung.jr', '1', '2016-03-07', '08:26:42', 'Chrome 48.0.2564.95Android', '202.62.16.18'),
(393, 'Adm0003', 'owensantoso', '1', '2016-03-07', '10:07:14', 'Chrome 48.0.2564.95Android', '64.233.173.194'),
(394, 'Adm0004', 'ramondekong', '1', '2016-03-07', '11:22:49', 'Chrome 42.0.2311.135Windows 10', '180.253.8.194'),
(395, 'Adm0004', 'ramondekong', '1', '2016-03-07', '12:12:29', 'Firefox 44.0Windows XP', '114.4.75.83'),
(396, 'Adm0004', 'ramondekong', '1', '2016-03-07', '12:24:34', 'Firefox 44.0Windows XP', '114.4.75.83'),
(397, 'Adm0005', 'yung.jr', '1', '2016-03-07', '12:27:46', 'Firefox 45.0Windows 7', '202.62.17.60'),
(398, 'Adm0004', 'ramondekong', '1', '2016-03-07', '14:42:42', 'Firefox 44.0Windows XP', '120.164.44.184'),
(399, 'Adm0004', 'ramondekong', '1', '2016-03-07', '14:58:48', 'Firefox 44.0Windows XP', '120.190.209.104'),
(400, 'Adm0004', 'ramondekong', '1', '2016-03-07', '14:59:40', 'Firefox 44.0Windows XP', '120.164.47.137'),
(401, 'Adm0004', 'ramondekong', '1', '2016-03-07', '15:14:45', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(402, 'Adm0005', 'yung.jr', '1', '2016-03-07', '20:50:16', 'Chrome 48.0.2564.95Android', '202.62.17.24'),
(403, 'Adm0003', 'owensantoso', '1', '2016-03-07', '22:05:55', 'Chrome 48.0.2564.116Windows 8.1', '182.253.128.13'),
(404, 'Adm0003', 'owensantoso', '1', '2016-03-08', '00:04:28', 'Chrome 48.0.2564.95Android', '112.215.63.12'),
(405, 'Adm0004', 'ramondekong', '1', '2016-03-08', '08:36:04', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(406, 'Adm0003', 'owensantoso', '1', '2016-03-08', '08:50:44', 'Chrome 48.0.2564.116Windows 8.1', '182.253.128.13'),
(407, 'Adm0004', 'ramondekong', '1', '2016-03-08', '09:50:36', 'Safari 601.1iOS', '112.215.63.20'),
(408, 'Adm0004', 'ramondekong', '1', '2016-03-08', '16:23:57', 'Firefox 44.0Windows XP', '120.164.46.58'),
(409, 'Adm0005', 'yung.jr', '1', '2016-03-08', '16:46:34', 'Firefox 45.0Windows 7', '202.62.16.100'),
(410, 'Adm0005', 'yung.jr', '1', '2016-03-08', '17:58:02', 'Chrome 48.0.2564.95Android', '202.62.16.100'),
(411, 'Adm0003', 'owensantoso', '1', '2016-03-08', '18:05:04', 'Chrome 48.0.2564.95Android', '64.233.173.186'),
(412, 'Adm0004', 'ramondekong', '1', '2016-03-10', '09:07:27', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(413, 'Adm0004', 'ramondekong', '1', '2016-03-10', '09:07:40', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(414, 'Adm0003', 'owensantoso', '1', '2016-03-10', '09:07:54', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(415, 'Adm0005', 'yung.jr', '1', '2016-03-10', '09:08:10', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(416, 'Adm0003', 'owensantoso', '1', '2016-03-10', '09:09:11', 'Chrome 48.0.2564.116Windows 8.1', '139.192.249.40'),
(417, 'Adm0003', 'owensantoso', '1', '2016-03-10', '09:09:46', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(418, 'Adm0003', 'owensantoso', '1', '2016-03-10', '09:09:59', 'Chrome 48.0.2564.116Windows 10', '36.72.45.100'),
(419, 'Adm0003', 'owensantoso', '1', '2016-03-10', '09:10:57', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(420, 'Adm0003', 'owensantoso', '1', '2016-03-10', '09:11:43', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(421, 'Adm0004', 'ramondekong', '1', '2016-03-10', '10:02:33', 'Firefox 44.0Windows XP', '114.4.75.241'),
(422, 'Adm0005', 'yung.jr', '1', '2016-03-10', '10:12:06', 'Firefox 45.0Windows 7', '202.62.17.198'),
(423, 'Adm0003', 'owensantoso', '1', '2016-03-10', '14:14:11', 'Chrome 42.0.2311.135Windows 10', '36.72.45.100'),
(424, 'Adm0004', 'ramondekong', '1', '2016-03-10', '15:01:53', 'Firefox 44.0Windows XP', '114.4.75.224'),
(425, 'Adm0005', 'yung.jr', '1', '2016-03-10', '15:08:06', 'Chrome 48.0.2564.95Android', '202.62.16.255'),
(426, 'Adm0004', 'ramondekong', '1', '2016-03-11', '08:50:22', 'Firefox 44.0Windows XP', '120.164.41.247'),
(427, 'Adm0003', 'owensantoso', '1', '2016-03-14', '11:36:53', 'Chrome 42.0.2311.135Windows 10', '223.255.230.34'),
(428, 'Adm0003', 'owensantoso', '1', '2016-03-14', '12:39:53', 'Chrome 49.0.2623.91Android', '112.215.66.135'),
(429, 'Adm0005', 'yung.jr', '1', '2016-03-14', '13:07:12', 'Firefox 45.0Windows 7', '202.62.17.115'),
(430, 'Adm0004', 'ramondekong', '1', '2016-03-15', '08:51:33', 'Firefox 44.0Windows XP', '120.164.41.141'),
(431, 'Adm0004', 'ramondekong', '1', '2016-03-15', '11:16:49', 'Firefox 44.0Windows XP', '114.4.76.90'),
(432, 'Adm0005', 'yung.jr', '1', '2016-03-18', '13:26:52', 'Chrome 48.0.2564.95Android', '114.120.232.129'),
(433, 'Adm0004', 'ramondekong', '1', '2016-03-22', '10:41:34', 'Firefox 44.0Windows XP', '120.189.242.35'),
(434, 'Adm0003', 'owensantoso', '1', '2016-03-22', '10:45:47', 'Chrome 49.0.2623.91Android', '64.233.173.186'),
(435, 'Adm0004', 'ramondekong', '1', '2016-03-22', '10:49:31', 'Firefox 44.0Windows XP', '120.189.242.35'),
(436, 'Adm0004', 'ramondekong', '1', '2016-03-23', '08:54:38', 'Firefox 44.0Windows XP', '120.190.92.97'),
(437, 'Adm0005', 'yung.jr', '1', '2016-03-24', '20:08:10', 'Chrome 48.0.2564.95Android', '202.62.17.161'),
(438, 'Adm0004', 'ramondekong', '1', '2016-03-24', '20:42:28', 'Safari 601.1iOS', '114.124.26.31'),
(439, 'Adm0003', 'owensantoso', '1', '2016-03-25', '02:39:02', 'Chrome 49.0.2623.91Android', '64.233.173.194'),
(440, 'Adm0003', 'owensantoso', '1', '2016-03-26', '09:57:30', 'Chrome 49.0.2623.87Windows 10', '61.94.135.36'),
(441, 'Adm0003', 'owensantoso', '1', '2016-04-07', '10:28:12', 'Chrome 49.0.2623.110Windows 8.1', '::1'),
(442, 'Adm0003', 'owensantoso', '1', '2016-04-08', '08:56:51', 'Chrome 49.0.2623.110Windows 8.1', '::1'),
(443, 'Adm0003', 'owensantoso', '1', '2016-04-09', '02:08:50', 'Chrome 49.0.2623.110Windows 10', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `memberid` varchar(6) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `no_identitas` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `paket` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`memberid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberid`, `username`, `password`, `no_identitas`, `nama`, `tanggal_lahir`, `tanggal_daftar`, `paket`, `email`, `status`, `foto`, `alamat`) VALUES
('M00001', 'saitama', 'be4493dac60b78d75c4d90bc71bb7611', '', '', '0000-00-00', '2016-02-09', '', 'ownstso@gmail.com', 'M', '', ''),
('M00004', 'setchung', 'b4417fb36196418d6df71488a97903c4', '', 'Setiawan Kartawidjaja', '1979-11-01', '2016-02-14', '', 'setiawan3d@gmail.com', 'M', '', 'Jalan Pendawa No. 3'),
('M00006', 'Itodinata', '3ccafe254bbf441c671b259918fd19e8', '', '', '0000-00-00', '2016-02-16', '', 'Adi199494@gmail.com', 'M', '', ''),
('M00007', 'adityagusetyawan', '89e3582aa332ab3124e833f4ef9e5644', '', '', '0000-00-00', '2016-02-17', '', 'adityagusetyawan@windowslive.com', 'M', '', ''),
('M00008', 'IhsanMaulana', 'c9146556da946b25f649f113b84b9e3f', '', '', '0000-00-00', '2016-02-17', '', 'chokichi7@gmail.com', 'M', '', ''),
('M00009', 'Lulukman', 'c706393914fcfb7fc8903f4341ee05b0', '', '', '0000-00-00', '2016-02-19', '', 'lukmanyogatama@gmail.com', 'M', '', ''),
('M00010', 'kamalmuhammadd', 'e2df9020c6ab34fa1149669e5745abb0', '', '', '0000-00-00', '2016-02-20', '', 'muhammadnaqiudinkamal@gmail.com', 'M', '', ''),
('M00011', 'MerryTheresi', '9082b7aeb5e1032871be6ea899321295', '3274034305870013', 'Merry Theresia', '1987-05-03', '2016-02-21', '', 'bibir_unick@yahoo.com', 'M', '', 'jl. tubagus raya no55A'),
('M00012', 'abdul azis paera', '5829a0c599463b98aaa1d7fa9f3d2b75', '', '', '0000-00-00', '2016-02-22', '', 'fajrapaera01@gmail.com', 'M', '', ''),
('M00013', 'derryhadian', '6283a43c3c6bf93ae7b48a07e774cec6', '', '', '0000-00-00', '2016-02-22', '', 'derryhadian12@gmail.com', 'M', '', ''),
('M00014', 'Erik', '202b8e7c443b4fb85a25983e7f9fdb9e', '', '', '0000-00-00', '2016-02-22', '', 'satria1420_r@ymail.com', 'M', '', ''),
('M00015', 'Made_widnyana', '827caad887188e66d98fcff904c45b88', '', '', '0000-00-00', '2016-02-22', '', 'madewidnyana51@yahoo.com', 'M', '', ''),
('M00016', 'ishak mutiara', '6000a2391e9cd41c62592cb3471d1e1e', '', '', '0000-00-00', '2016-02-22', '', 'ishakmutiara@gmail.com', 'M', '', ''),
('M00017', 'Benny martha', 'edbf5c35661f49b8ca0d68f16be5f3ba', '', '', '0000-00-00', '2016-02-23', '', 'bennymartha@yahoo.com', 'M', '', ''),
('M00019', 'Mey Imaniar Mufida', '90c41d2996061540d1c10ca76c0aa265', '', '', '0000-00-00', '2016-02-23', '', 'mey.niar@gmail.com', 'M', '', ''),
('M00020', 'Doeljoe ', '8651a1e07e9247e7ddd223d9e112b401', '', '', '0000-00-00', '2016-02-23', '', 'mikhail_balad@yahoo.com', 'M', '', ''),
('M00021', 'travelensa', '497c21021c47a86386f469deb12d0786', '', '', '0000-00-00', '2016-02-23', '', 'mytravelensa@gmail.com', 'M', '', ''),
('M00022', 'Vektorbdg', 'd4a95cad21bcdd9475d1361ebd21936a', '', '', '0000-00-00', '2016-02-23', '', 'Deniirawan999@gmail.com', 'M', '', ''),
('M00023', 'hendrysasmita', 'e55454d9f92aefa3911d671a3ed772b4', '', '', '0000-00-00', '2016-02-23', '', 'hendrysasmitaphotography@gmail.com', 'M', '', ''),
('M00024', '22jamalramadhan', 'b03d0357f3d22be29b8febd8ab2d5af1', '', '', '0000-00-00', '2016-02-23', '', '22jamalramadhan@gmail.com', 'M', '', ''),
('M00025', 'Deniirawan', '6490e0f12627a481856679eab931fb8d', '', '', '0000-00-00', '2016-02-24', '', 'deniirawan13@yahoo.co.id', 'M', '', ''),
('M00026', 'tjep eenk', 'ef1c10dd6a0f6007f22e6f89b6fcc976', '', '', '0000-00-00', '2016-02-24', '', 'tjep.dhit@gmail.com', 'M', '', ''),
('M00027', 'indrasyaputra', '93a1739e9d0baf391e9cd47742355684', '', '', '0000-00-00', '2016-02-24', '', 'indrasyaputra1995@gmail.com', 'M', '', ''),
('M00028', 'indrasyaputra95', '5a8f8b3102c99ff94f0b6415a63ed4e3', '', '', '0000-00-00', '2016-02-24', '', 'indrasyaputra98@ymail.com', 'M', '', ''),
('M00031', 'Fadhelananda', '06afad2e523b69810993f70d002ed0d5', '', '', '0000-00-00', '2016-02-25', '', 'fadhelananda@yahoo.com', 'M', '', ''),
('M00032', 'Mr.NAS', 'b4f309c32973ef770fac79baa92ff631', '', '', '0000-00-00', '2016-02-25', '', 'adisnasrullah@gmail.com', 'M', '', ''),
('M00033', 'rezaambiya', '70252e91c0099a1bb46afbe40bbef918', 'Ambiya Reza', 'Ambiya', '1990-02-24', '2016-02-25', '', 'reza.ambiya@ymail.com', 'M', 'fe7fd8143df7881df361a976c12f7a71.jpg', 'Meulaboh, Aceh Barat, Indonesia'),
('M00034', 'robez_vudson', 'ac81e0a6c753daac5df68b2b62ff5a14', '', '', '0000-00-00', '2016-02-26', '', 'topnten@gmail.com', 'M', '', ''),
('M00035', 'Edy Djunarko', 'af433edb28a00e6e64315248ce9a56bc', '', '', '0000-00-00', '2016-02-26', '', 'gloryphotoart@gmail.com', 'M', '', ''),
('M00036', 'Dewi_S', '0b823e13889ed3c9be49fd36e32881be', '', '', '0000-00-00', '2016-02-29', '', 'dsuzie17@gmail.com', 'M', '', ''),
('M00037', 'SutaWijaya', '5277e0eee7b1f3ed5b77ca870e3c3290', '', '', '0000-00-00', '2016-02-29', '', 'sutawijaya09@gmail.com', 'M', '', ''),
('M00038', 'Gusdanan', '2f160973f6912750afbad6c46062b6b4', '', '', '0000-00-00', '2016-02-29', '', 'gusdanan01@gmail.com', 'M', '', ''),
('M00040', 'ChristiniLo', '6ce13bfe129034c588e0db679f181bbc', '', '', '0000-00-00', '2016-02-29', '', 'christini_lo@yahoo.com', 'M', '', ''),
('M00041', 'Ridho andu purba', 'c39eb110d84895d9765806cf7784676b', '', '', '0000-00-00', '2016-02-29', '', 'ridhoandu@gmail.com', 'M', '', ''),
('M00042', 'eva_aichunink', '466a9fb982feafdd2d7f9cec2439610a', '', '', '0000-00-00', '2016-02-29', '', 'evaaichunink@gmail.com', 'M', '2a3a072facd83664510d87418c24937c.JPG', 'Mataram NTB'),
('M00043', 'Faldy_yd ', '9ebba11e4caaa942cf8fed34790872cd', '', '', '0000-00-00', '2016-03-01', '', 'fback27@gmail.com', 'M', '', ''),
('M00044', 'Adheir_Mansyah', '9bae4a03fc8436d29f2132100fa66c1b', '', '', '0000-00-00', '2016-03-01', '', 'adheir2015@gmail.com', 'M', '', ''),
('M00045', 'nelson yonathan', 'f27fe3fa35222fc8bd410d89154cde33', '', '', '0000-00-00', '2016-03-01', '', 'nelsonyonathan131199@gmail.com', 'M', '', ''),
('M00046', 'Egaryan', 'de2dc9ed97cc43838a22395daa33d2ef', '', '', '0000-00-00', '2016-03-01', '', 'ers.egaryanjm@gmail.com', 'M', '', ''),
('M00047', 'fitri nofita', '0df91f7713428fa5a27b0a45439bae01', '', '', '0000-00-00', '2016-03-01', '', 'fitrianofitasari@gmail.com', 'M', '', ''),
('M00048', 'superpaimo', '0158c1695428d9dffe76dc0a37ec1bc1', '', '', '0000-00-00', '2016-03-01', '', 'rizkyady@gmail.com', 'M', '', ''),
('M00049', 'Yusie1705', '618669533d692b10c6b82b6b6dd5432a', '', '', '0000-00-00', '2016-03-02', '', 'yusie1705@yahoo.co.id', 'M', '', ''),
('M00051', 'Papa_rocknroll', '53a77fc5e2f93c7cfb3392b828e9f10e', '', '', '0000-00-00', '2016-03-08', '', 'cwijayak@gmail.com', 'M', '', ''),
('M00052', 'Agitnaetapratana', '5b58edc00637994cd6c39d0990490915', '', '', '0000-00-00', '2016-03-08', '', 'agitnaeta0@gmail.com', 'M', '', ''),
('M00053', 'anakayamJago', 'f3efff53478e5e3628d071c34fe9ae04', '', '', '0000-00-00', '2016-03-10', '', 'naetalab@gmail.com', 'M', '', ''),
('M00054', 'susan8th', 'e2e57f113c7c412a60ce2f04dcdb7b9f', '', '', '0000-00-00', '2016-03-19', '', 'susan8th@yahoo.com', 'M', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_page` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name_page`, `isi`) VALUES
(1, 'Profile', '<p>About us :&nbsp;</p>\n\n<p>Pixtox adalah bank gambar Indonesia, yang &nbsp;menyediakan akses cepat ke&nbsp;photo&nbsp;dan&nbsp;vector&nbsp;</p>\n\n<p>untuk memastikan Anda akan selalu menemukan yang Anda butuhkan. Kami didukung oleh&nbsp;</p>\n\n<p>para fotografer professional, desain grafis dan designer. Kami berharap dapat memenuhi&nbsp;</p>\n\n<p>keperluan dari masyarakat Indonesia yang berkembang pada saat ini sampai dengan&nbsp;</p>\n\n<p>permintaan dunia akan photo&nbsp;dan vector. Koleksi Pixtox yang banyak adalah hal yang pertama&nbsp;</p>\n\n<p>yang kami tawarkan dan untuk pilihan kedua koleksi vector kami yang lengkap. Semua&nbsp;</p>\n\n<p>fotografer dan designer kami&nbsp;berkontribusi dibayar dengan harga terbaik di pasar. Itu sebabnya&nbsp;</p>\n\n<p>fotografer dan designer pembuat vector di suluruh Indonesia membawa pekerjaan mereka ke&nbsp;</p>\n\n<p>Pixtox.</p>\n\n<p>Fleksibilitas dan kebebasan</p>\n\n<p>Layanan PIXTOX &nbsp;termasuk Paket Best Deal dan Langganan Harian, membuat kami menjadi&nbsp;bank gambar&nbsp;</p>\n\n<p>yang paling fleksibel di Indonesia.&nbsp;</p>\n\n<p>Bergabunglah dengan komunitas PIXTOX</p>\n\n<p>Setiap orang dapat menggunakan Pixtox. Apakah kamu seorang desainer profesional, manajer,&nbsp;</p>\n\n<p>presenter, pemilik usaha kecil atau mahasiswa, bergabunglah dengan Pixtox&nbsp;dan mendapatkan akses&nbsp;</p>\n\n<p>cepat ke semua photo&nbsp;dan vector dengan harga yang terbaik.</p>\n'),
(2, 'FAQ', '<ol>\n	<li style="text-align:justify">Apa itu Kontributor?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Personal atau individual yang telah menjadi member dan mendaftarkan diri (sign up)&nbsp;untuk bergabung sebagai kontributor (pemasok foto atau vector) di pixtox.com.</span></p>\n\n<ol start="2">\n	<li style="text-align:justify">Bagaimana cara menjadi kontributor?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Anda dapat bergabung menjadi kontributor photo atau vector setelah anda mendaftar menjadi member di pixtox.com, dan foto yang anda upload akan dinilai oleh tim kami.</span></p>\n\n<ol start="3">\n	<li style="text-align:justify">Bagaimana saya dibayar dan melacak penjualan saya sebagai kontributor?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Anda dapat mengeceknya di dalam panel kontributor pada menu PROFILE - DETAIL ANDA disana tercantum sebagai berikut&nbsp;:</span></p>\n\n<ul style="margin-left:40px">\n	<li style="text-align:justify"><span style="color:#FF8C00">Your Foto : Seberapa banyak foto atau vector yang anda upload</span></li>\n	<li style="text-align:justify"><span style="color:#FF8C00">Earning &nbsp; &nbsp;: Berapa total pendapatan anda</span></li>\n</ul>\n\n<ol start="4">\n	<li style="text-align:justify">Bagaimana melakukan penagihan hasil penjualan saya sebagai kontributor ?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Isilah form penagihan pada menu Redeem di Dashboard member, nominal tidak boleh melebihi total earning.</span></p>\n\n<ol start="5">\n	<li style="text-align:justify">Apa itu Special Request ?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Special request merupakan layanan yang kami sediakan untuk permintaan khusus seperti foto product, foto event, jasa pembuatan design logo, stationary, brosur, flyer, ilustrasi, dan lain sebagainya.</span></p>\n\n<ol start="6">\n	<li style="text-align:justify">Apa yang saya lakukan apabila foto menggunakan model?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Foto yang menggunakan model wajib menyertakan form model release yang dapat anda download di panel member atau kontributor.</span></p>\n\n<ol start="7">\n	<li style="text-align:justify">Berapa lama saya harus menunggu photo atau vector bisa di download setelah pembayaran?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Foto atau vector dapat di download setelah melakukan pembayaran dan melakukan konfirmasi pada hari dan jam kerja maksimal 2 x 24 jam.</span></p>\n\n<ol start="8">\n	<li style="text-align:justify">Bagaimana cara bagi hasil di pixtox.com?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Bagi kontributor di pixtox.com akan mendapatkan bagi hasil 20% dari harga penjualannya dan dipotong PPH Pasal 21. Contoh : Foto yang anda upload terjual senilai Rp. 100.000,00. Maka dari hasil penjualan foto tersebut 20 % nya merupakan pendapatan yang akan anda terima setelah di potong pajak ( Penghitungan : Rp 100.000,00 x 20% = Rp. 20.000,00 &ndash; (Rp. 20.000,00 x PPH Pasal 21 ( 5% x 50% x Rp. 100.000,00 = Rp. 2.500) = Rp. 17.500,00).</span></p>\n\n<ol start="9">\n	<li style="text-align:justify">Bagaimana cara membeli photo atau vector di pixtox.com ?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Langkah-langkah membeli foto atau vector di pixtox.com :</span></p>\n\n<ul>\n	<li style="text-align:justify"><span style="color:#FF8C00">Anda harus mendaftar menjadi member.</span></li>\n	<li style="text-align:justify"><span style="color:#FF8C00">Pilih Paket yang akan anda beli, dapat juga memilih menu satuan apabila Anda hanya akan membeli satu foto atau vector.</span></li>\n	<li style="text-align:justify"><span style="color:#FF8C00">Lakukan pembayaran dengan mentransfer ke rekening Bank PT. Gudang Gambar Indonesia yang telah tercantum.</span></li>\n	<li style="text-align:justify"><span style="color:#FF8C00">Konfirmasikan pembayaran yang telah anda lakukan melalui panel member.</span></li>\n	<li style="text-align:justify"><span style="color:#FF8C00">Pilih dan download foto atau vector yang anda perlukan.</span></li>\n</ul>\n\n<ol start="10">\n	<li style="text-align:justify">Berapa banyak gambar yang dapat saya upload dalam satu minggu ?</li>\n</ol>\n\n<p style="margin-left:40px; text-align:justify"><span style="color:#FF8C00">Sebanyak &ndash; banyaknya foto atau vector terbaik yang anda miliki.</span></p>\n'),
(3, 'Career', '<p>Dengan maraknya dunia photography dan design vector sekarang ini, pixtox berkomitmen membantu dan membuka peluang bagi banyak orang untuk menyampaikan hasil karyanya dalam bentuk photo atau vector. Bagi anda yang berdedikasi dan berbakat, diundang untuk bergabung dengan pixtox.</p>\n\n<p>Kami membuat pixtox menjadi tempat terbaik dalam bekerja, berkarya dan berkreatifitas. Kami ingin anda mencapai kesuksesan bersama pixtox, karena dengan kerjasama yang baik akan menghasilkan hasil yang maksimal.</p>\n\n<p>&nbsp;</p>\n\n<p>Bergabunglah bersama kontributor-kontributor lainnya yang tersebar di seluruh dunia.</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify"><strong>Berminat beragabung dengan tim kami? Kirimkan CV anda ke <a href="mailto:hrd@pixtox.com"><span style="color:#0000CD">hrd@pixtox.com</span></a></strong></p>\n'),
(4, 'Story', '<p>Pixtox&nbsp;adalah&nbsp;gudang&nbsp;gambar&nbsp;yang berbasis di Indonesia.&nbsp;Pixtox&nbsp;menyediakan solusi foto&nbsp;dan vector&nbsp;untuk memenuhi&nbsp;kebutuhan Anda.&nbsp;Kami memiliki lebih dari satu juta foto&nbsp;dan vector untuk Anda pilih.</p>\n\n<p>Kami didukung oleh fotografer professional&nbsp;dan desainer grafis yang kreatif. Semua fotografer dan designer&nbsp;Pixtox yang berkontribusi dibayar&nbsp;dengan&nbsp;harga terbaik di pasarnya. Itulah mengapa&nbsp;banyak fotografer dan&nbsp;designer di Indonesia&nbsp;yang berminat menjadi contributor di&nbsp;Pixtox.</p>\n\n<p>Fitur unggulan dari pixtox yaitu&nbsp;special request, dimana special request merupakan fitur yang memberikan&nbsp;layanan untuk&nbsp;pembuatan logo, foto&nbsp;dan&nbsp;project tertentu.&nbsp;</p>\n\n<p>Kami menawarkan harga terbaik mulai dari harga umum dan harga best deal.</p>\n\n<p>Free Pix of the week kami berikan secara gratis untuk member setia Pixtox.</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

DROP TABLE IF EXISTS `paket`;
CREATE TABLE IF NOT EXISTS `paket` (
  `kode_paket` varchar(6) NOT NULL DEFAULT '',
  `nama_paket` varchar(20) NOT NULL,
  `lama_hari` int(11) NOT NULL,
  `harga` float NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT '',
  `kapasitas_download` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`, `lama_hari`, `harga`, `gambar`, `kapasitas_download`) VALUES
('PX.001', 'Satuan', 1, 89000, 'iconsatuann1.jpg', 1),
('PX.002', 'Deposit Spc. Request', 1, 295000, 'iconsrn1.jpg', 10),
('PX.003', 'Paket', 5, 395000, 'iconpaketn1.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `paket_user`
--

DROP TABLE IF EXISTS `paket_user`;
CREATE TABLE IF NOT EXISTS `paket_user` (
  `idpaket_user` varchar(6) NOT NULL DEFAULT '',
  `memberid` varchar(7) NOT NULL DEFAULT '',
  `sisa_hari` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpaket_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE IF NOT EXISTS `penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` int(5) NOT NULL,
  `pembagi` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `nilai`, `pembagi`) VALUES
(1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_nilai`
--

DROP TABLE IF EXISTS `perhitungan_nilai`;
CREATE TABLE IF NOT EXISTS `perhitungan_nilai` (
  `idnilai` varchar(7) NOT NULL DEFAULT '',
  `id_foto` varchar(20) NOT NULL DEFAULT '',
  `memberid` varchar(6) NOT NULL DEFAULT '',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `message` longtext NOT NULL,
  `userid` varchar(7) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `nilai` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idnilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perhitungan_nilai`
--

INSERT INTO `perhitungan_nilai` (`idnilai`, `id_foto`, `memberid`, `subject`, `message`, `userid`, `email`, `nilai`) VALUES
('N000001', '20160106132750', 'C00013', '', '', 'px', '', 0),
('N000002', '20160106140510', 'C00013', '', '', 'px', '', 0),
('N000003', '20160106152350', 'C00001', '', '', 'px', '', 0),
('N000004', '20160106152707', 'C00001', '', '', 'px', '', 0),
('N000005', '20160106152928', 'C00001', '', '', 'px', '', 0),
('N000006', '20160106153308', 'C00001', '', '', 'px', '', 0),
('N000007', '20160106152350', 'C00001', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000008', '20160106152707', 'C00001', 'greget', '	\nekspresinya kurang dapet', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000009', '20160106152928', 'C00001', 'kenapa?', 'kaya lg mabok\n', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000010', '20160106153308', 'C00001', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000011', '20160106152350', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000012', '20160106153308', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000013', '20160106152707', 'C00001', 'apa ya?', '	\nkurang aja sih', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000014', '20160106152928', 'C00001', 'hhmmm', '	\ngitu deh', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000015', '20160106152350', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000016', '20160106152707', 'C00001', 'kurang tajem', 'fotonya\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000017', '20160106152928', 'C00001', 'mabok?', 'kebanyakan nyusu	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000018', '20160106153308', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000019', '20160106152350', 'C00001', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000020', '20160106153308', 'C00001', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000021', '20160106153308', 'C00001', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000022', '20160106152707', 'C00001', 'kurang greget nya', '	\ngitu dah', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000023', '20160106152928', 'C00001', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000024', '20160106152928', 'C00001', 'mabok janda ya?', 'hahahaha\n', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000025', '20160106140510', 'C00013', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000026', '20160113105103', 'C00001', '', '', 'px', '', 0),
('N000027', '20160106132750', 'C00013', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000028', '20160106140510', 'C00013', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000029', '20160113105103', 'C00001', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000030', '20160113105524', 'C00001', '', '', 'px', '', 0),
('N000031', '20160113105741', 'C00018', '', '', 'px', '', 0),
('N000032', '20160113105846', 'C00016', '', '', 'px', '', 0),
('N000033', '20160113105524', 'C00001', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000034', '20160113105741', 'C00018', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000035', '20160113105846', 'C00016', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000036', '20160113105846', 'C00016', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000037', '20160113105741', 'C00018', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000038', '20160113105524', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000039', '20160113105103', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000040', '20160106140510', 'C00013', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000041', '20160106132750', 'C00013', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000042', '20160113110216', 'C00017', '', '', 'px', '', 0),
('N000043', '20160113105103', 'C00001', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000044', '20160113105524', 'C00001', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000045', '20160106132750', 'C00013', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000046', '20160106140510', 'C00013', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000047', '20160113105103', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000048', '20160113105524', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000049', '20160113105741', 'C00018', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000050', '20160113105846', 'C00016', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000051', '20160113105741', 'C00018', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000052', '20160113110216', 'C00017', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000053', '20160113105846', 'C00016', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000054', '20160113110216', 'C00017', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000055', '20160106132750', 'C00013', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000056', '20160113110216', 'C00017', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000057', '20160113110216', 'C00017', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000058', '20160122194523', 'C00015', '', '', 'px', '', 0),
('N000059', '20160122194523', 'C00015', 'object tidak menarik', '	Kurang jelas maksud dari photo\n', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000060', '20160122200433', 'C00019', '', '', 'px', '', 0),
('N000061', '20160122200433', 'C00019', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000062', '20160122200433', 'C00019', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000063', '20160122194523', 'C00015', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000064', '20160122200433', 'C00019', 'test', '	\nTest', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000065', '20160122194523', 'C00015', 'test', '	\nTest', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000066', '20160122200433', 'C00019', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000067', '20160122194523', 'C00015', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000068', '20160122224011', 'C00019', '', '', 'px', '', 0),
('N000069', '20160122224011', 'C00019', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000070', '20160122224011', 'C00019', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000071', '20160122224011', 'C00019', 'test', '	Test\n', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000072', '20160124225810', 'C00024', '', '', 'px', '', 0),
('N000073', '20160124225810', 'C00024', 'test', '	Test\n', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000074', '20160124225810', 'C00024', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000075', '20160124225810', 'C00024', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000076', '20160126204102', 'C00025', '', '', 'px', '', 0),
('N000077', '20160126204102', 'C00025', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000078', '20160126204102', 'C00025', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000079', '20160124225810', 'C00024', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000080', '20160122224011', 'C00019', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000081', '20160126204102', 'C00025', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000082', '20160126204102', 'C00025', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000083', '20160126213233', 'C00001', '', '', 'px', '', 0),
('N000084', '20160126213233', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000085', '20160126213848', 'C00025', '', '', 'px', '', 0),
('N000086', '20160126213848', 'C00025', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000087', '20160126213233', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000088', '20160126213233', 'C00001', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000089', '20160126213848', 'C00025', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000090', '20160126215506', 'C00025', '', '', 'px', '', 0),
('N000091', '20160126215506', 'C00025', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000092', '20160126213848', 'C00025', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000093', '20160126213233', 'C00001', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000094', '20160126213848', 'C00025', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000095', '20160126215506', 'C00025', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000096', '20160126215506', 'C00025', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000097', '20160126215506', 'C00025', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000098', '20160201231954', 'C00017', '', '', 'px', '', 0),
('N000099', '20160201234311', 'C00029', '', '', 'px', '', 0),
('N000100', '20160201234311', 'C00029', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000101', '20160201231954', 'C00017', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000102', '20160201231954', 'C00017', 'test', '	Test\n', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000103', '20160201231954', 'C00017', 'To much noise', '	\nChange the background colour', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000104', '20160201231954', 'C00017', 'Penolakan', 'Hi,\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000105', '20160201234311', 'C00029', 'No', '	to simple\n', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000106', '20160201234311', 'C00029', 'Test', '	\nTest', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000107', '20160202000417', 'C00030', '', '', 'px', '', 0),
('N000108', '20160202000417', 'C00030', 'reject', '	\nHi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000109', '20160201234311', 'C00029', 'reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000110', '20160202000417', 'C00030', 'No focus', '	\nTry again', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000111', '20160202000417', 'C00030', 'penolakan', '	\nHi,\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com\n', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000112', '20160202001547', 'C00030', '', '', 'px', '', 0),
('N000113', '20160202000417', 'C00030', 'Test', '	\nTest', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000114', '20160202001547', 'C00030', 'Test', '	\nTest', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000115', '20160202001547', 'C00030', '', '	\n', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000116', '20160202001547', 'C00030', 'To small', '	\nNo', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000117', '20160202002722', 'C00030', '', '', 'px', '', 0),
('N000118', '20160202003402', 'C00030', '', '', 'px', '', 0),
('N000119', '20160202002722', 'C00030', 'Penolakan', 'Penolakan	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000120', '20160202003402', 'C00030', 'Penolakan', '	\nPenolakan', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000121', '20160202003402', 'C00030', '', '	\n', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000122', '20160202001547', 'C00030', 'penolakan', '	\nHi,\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000123', '20160202002722', 'C00030', 'penolakan', '	\nHi,\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000124', '20160202003402', 'C00030', 'penolakan', '	\nHi,\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000125', '20160208213909', 'C00015', '', '', 'px', '', 0),
('N000126', '20160211123511', 'C00003', '', '', 'px', '', 0),
('N000127', '20160211132208', 'C00002', '', '', 'px', '', 0),
('N000128', '20160212223441', 'C00005', '', '', 'px', '', 0),
('N000129', '20160212223441', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000130', '20160212224015', 'C00005', '', '', 'px', '', 0),
('N000131', '20160211132208', 'C00002', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000132', '20160211123511', 'C00003', 'Reject', 'Reject	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000133', '20160212223441', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000134', '20160212224015', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000135', '20160212224846', 'C00005', '', '', 'px', '', 0),
('N000136', '20160211123511', 'C00003', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000137', '20160211132208', 'C00002', '', '	\n', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000138', '20160212224015', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000139', '20160212224846', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000140', '20160212224846', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000141', '20160212230141', 'C00005', '', '', 'px', '', 0),
('N000142', '20160212230141', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000143', '20160212230828', 'C00005', '', '', 'px', '', 0),
('N000144', '20160212230141', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000145', '20160212230828', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000146', '20160212231802', 'C00005', '', '', 'px', '', 0),
('N000147', '20160212232203', 'C00005', '', '', 'px', '', 0),
('N000148', '20160212231802', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000149', '20160212230828', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000150', '20160212232203', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000151', '20160212231802', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000152', '20160212232726', 'C00005', '', '', 'px', '', 0),
('N000153', '20160212233229', 'C00005', '', '', 'px', '', 0),
('N000154', '20160212233229', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000155', '20160212232726', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000156', '20160212232203', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000157', '20160212233957', 'C00005', '', '', 'px', '', 0),
('N000158', '20160212233957', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000159', '20160212234740', 'C00005', '', '', 'px', '', 0),
('N000160', '20160212234746', 'C00005', '', '', 'px', '', 0),
('N000161', '20160212234746', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000162', '20160212234740', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000163', '20160212223441', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000164', '20160211132208', 'C00002', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000165', '20160212224015', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000166', '20160211123511', 'C00003', 'penolakan', '	\nHi,\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com\n', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000167', '20160212230141', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000168', '20160212230828', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000169', '20160212231802', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000170', '20160212232203', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000171', '20160212232726', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000172', '20160212233229', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000173', '20160212233957', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000174', '20160212234740', 'C00005', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000175', '20160212232726', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000176', '20160212233229', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000177', '20160212233957', 'C00005', '', '	\n', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000178', '20160212234740', 'C00005', '', '	\n', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000179', '20160212234746', 'C00005', '', '	\n', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000180', '20160212234746', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000181', '20160212233957', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000182', '20160212233229', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000183', '20160212231802', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000184', '20160212232203', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000185', '20160212230828', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000186', '20160212224846', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000187', '20160212224015', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000188', '20160212223441', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000189', '20160211123511', 'C00003', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000190', '20160211132208', 'C00002', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000191', '20160212230141', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000192', '20160212234740', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000193', '20160212232726', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000194', '20160212224846', 'C00005', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000195', '20160212234746', 'C00005', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000196', '20160216170434', 'C00006', '', '', 'px', '', 0),
('N000197', '20160216170657', 'C00006', '', '', 'px', '', 0),
('N000198', '20160216170434', 'C00006', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000199', '20160216170657', 'C00006', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000200', '20160216170434', 'C00006', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000201', '20160211123511', 'C00003', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000202', '20160216170434', 'C00006', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000203', '20160216170657', 'C00006', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000204', '20160216170434', 'C00006', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000205', '20160216170657', 'C00006', 'No category', 'Tidak disertakan kategori\n\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000206', '20160216170657', 'C00006', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000207', '20160216192112', 'C00007', '', '', 'px', '', 0),
('N000208', '20160216192112', 'C00007', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000209', '20160216192112', 'C00007', 'Tidak memenuhi standar Ada watermark dikiri foto', '	\nPerbaiki watermark pada foto anda Dan silahkan resend. Trims', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000210', '20160216192112', 'C00007', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000211', '20160216192112', 'C00007', 'tolak', '	\nTolak', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000212', '20160216201451', 'C00007', '', '', 'px', '', 0),
('N000213', '20160216202501', 'C00008', '', '', 'px', '', 0),
('N000214', '20160216202501', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000215', '20160216201451', 'C00007', 'Tidak Boleh Ada watermark difoto', 'Watermark harus dihilangkan tlg di upload ulang trims\n', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000216', '20160216202501', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000217', '20160216203511', 'C00008', '', '', 'px', '', 0),
('N000218', '20160216201451', 'C00007', 'reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000219', '20160216192112', 'C00007', 'Tidak boleh ada watermark', '*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di  HYPERLINK "mailto:support@pixtox.com" support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com\n\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000220', '20160216203511', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000221', '20160216201451', 'C00007', 'Tidak boleh ada watermark', '*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di  HYPERLINK "mailto:support@pixtox.com" support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000222', '20160216202501', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000223', '20160216203511', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000224', '20160216204208', 'C00008', '', '', 'px', '', 0),
('N000225', '20160216204208', 'C00008', '', '*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di  HYPERLINK "mailto:support@pixtox.com" support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000226', '20160216205008', 'C00008', '', '', 'px', '', 0),
('N000227', '20160216204208', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000228', '20160216210701', 'C00008', '', '', 'px', '', 0),
('N000229', '20160216210811', 'C00008', '', '', 'px', '', 0),
('N000230', '20160216211104', 'C00005', '', '', 'px', '', 0),
('N000231', '20160216211110', 'C00005', '', '', 'px', '', 0),
('N000232', '20160216211116', 'C00005', '', '', 'px', '', 0),
('N000233', '20160216205008', 'C00008', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000234', '20160216211306', 'C00008', '', '', 'px', '', 0),
('N000235', '20160216211116', 'C00005', 'lanhut', '	\nLanhut', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000236', '20160216210701', 'C00008', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000237', '20160216203511', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000238', '20160216204208', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000239', '20160216205008', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000240', '20160216210701', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000241', '20160216210811', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000242', '20160216210811', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000243', '20160216211104', 'C00005', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000244', '20160216211110', 'C00005', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000245', '20160216211306', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000246', '20160216204208', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000247', '20160216205008', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000248', '20160216203511', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000249', '20160216212028', 'C00008', '', '', 'px', '', 0),
('N000250', '20160216201451', 'C00007', 'no watermark please :)', '	please reupload\n', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000251', '20160216202501', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000252', '20160216210701', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000253', '20160216210811', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000254', '20160216211104', 'C00005', 'No', '	No\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000255', '20160216212028', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000256', '20160216211110', 'C00005', 'No', '	\nNo', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000257', '20160216212424', 'C00008', '', '', 'px', '', 0),
('N000258', '20160216205008', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000259', '20160216213412', 'C00008', '', '', 'px', '', 0),
('N000260', '20160216210701', 'C00008', 'Over expose', 'Over expose	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000261', '20160216210811', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000262', '20160216211306', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000263', '20160216212028', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000264', '20160216212424', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000265', '20160216213412', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000266', '20160216212028', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000267', '20160216212424', 'C00008', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000268', '20160216213412', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000269', '20160216214331', 'C00008', '', '', 'px', '', 0),
('N000270', '20160216212424', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000271', '20160216214331', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000272', '20160216215216', 'C00008', '', '', 'px', '', 0),
('N000273', '20160216215744', 'C00008', '', '', 'px', '', 0),
('N000274', '20160216214331', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000275', '20160216215216', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000276', '20160216220253', 'C00008', '', '', 'px', '', 0),
('N000277', '20160216220837', 'C00008', '', '', 'px', '', 0),
('N000278', '20160216215744', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000279', '20160216221038', 'C00008', '', '', 'px', '', 0),
('N000280', '20160216220253', 'C00008', 'Rijek', 'Rijek	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000281', '20160216221239', 'C00008', '', '', 'px', '', 0),
('N000282', '20160216220837', 'C00008', 'Rijek', '	Rijek\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000283', '20160216221038', 'C00008', 'Rijek', 'Rijek	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000284', '20160216212424', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000285', '20160216213412', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000286', '20160216221554', 'C00008', '', '', 'px', '', 0),
('N000287', '20160216214331', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000288', '20160216215216', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000289', '20160216215744', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000290', '20160216220253', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000291', '20160216220837', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000292', '20160216221038', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000293', '20160216221704', 'C00009', '', '', 'px', '', 0),
('N000294', '20160216214331', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000295', '20160216221821', 'C00008', '', '', 'px', '', 0),
('N000296', '20160216215216', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000297', '20160216222047', 'C00009', '', '', 'px', '', 0),
('N000298', '20160216222220', 'C00008', '', '', 'px', '', 0),
('N000299', '20160216222337', 'C00009', '', '', 'px', '', 0),
('N000300', '20160216222441', 'C00008', '', '', 'px', '', 0),
('N000301', '20160216222947', 'C00009', '', '', 'px', '', 0),
('N000302', '20160216222220', 'C00008', 'Rijek', 'Rijek	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000303', '20160216222047', 'C00009', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000304', '20160216221821', 'C00008', 'Rijek', 'Rijek	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000305', '20160216222947', 'C00009', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000306', '20160216221704', 'C00009', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000307', '20160216221821', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000308', '20160216222441', 'C00008', 'Rijek', 'Rijek	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000309', '20160216222047', 'C00009', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000310', '20160216222337', 'C00009', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000311', '20160216222337', 'C00009', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000312', '20160216215744', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000313', '20160216222947', 'C00009', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000314', '20160216222220', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000315', '20160216221704', 'C00009', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000316', '20160216220253', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000317', '20160216221554', 'C00008', 'Rijek', 'Rijek	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000318', '20160216220837', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000319', '20160216221038', 'C00008', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000320', '20160216221554', 'C00008', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000321', '20160216221704', 'C00009', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000322', '20160216221821', 'C00008', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000323', '20160216222047', 'C00009', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000324', '20160216224320', 'C00009', '', '', 'px', '', 0),
('N000325', '20160216222220', 'C00008', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000326', '20160216222337', 'C00009', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000327', '20160216222441', 'C00008', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000328', '20160216224637', 'C00009', '', '', 'px', '', 0),
('N000329', '20160216222947', 'C00009', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000330', '20160216224320', 'C00009', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000331', '20160216224637', 'C00009', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000332', '20160216225026', 'C00009', '', '', 'px', '', 0),
('N000333', '20160216225026', 'C00009', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000334', '20160216225746', 'C00005', '', '', 'px', '', 0),
('N000335', '20160216224637', 'C00009', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000336', '20160216224320', 'C00009', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000337', '20160216230234', 'C00005', '', '', 'px', '', 0),
('N000338', '20160216225746', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000339', '20160216211104', 'C00005', 'lanhuy', '	Yuuuu\n', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000340', '20160216230234', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000341', '20160216211110', 'C00005', 'jossss', '	\nUhhj', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000342', '20160216225026', 'C00009', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000343', '20160216224637', 'C00009', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000344', '20160216224320', 'C00009', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000345', '20160216222947', 'C00009', 'OK', 'OK', 'Adm0001', 'felixsadikin@pixtox.com', 1),
('N000346', '20160216225026', 'C00009', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000347', '20160216225746', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000348', '20160216230234', 'C00005', 'OK', 'OK', 'Adm0002', 'erwinc@pixtox.com', 1),
('N000349', '20160216230234', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000350', '20160216225746', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000351', '20160216225026', 'C00009', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000352', '20160216224637', 'C00009', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000353', '20160216224320', 'C00009', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000354', '20160216222441', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000355', '20160216222337', 'C00009', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000356', '20160216222220', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000357', '20160216222047', 'C00009', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000358', '20160216211306', 'C00008', 'Ffff', '	\nFfff', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000359', '20160216212028', 'C00008', 'Ffff', '	\nFfff', 'Adm0001', 'felixsadikin@pixtox.com', 0),
('N000360', '20160216213412', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000361', '20160216215216', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000362', '20160216211306', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000363', '20160216215744', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000364', '20160216220253', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000365', '20160216220837', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000366', '20160216221038', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000367', '20160216221554', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000368', '20160216221704', 'C00009', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000369', '20160216221821', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000370', '20160216211104', 'C00005', '', '	\n', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000371', '20160216230234', 'C00005', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000372', '20160216225746', 'C00005', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000373', '20160216222441', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000374', '20160216211110', 'C00005', 'Lanhut', '	\nLanhut', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000375', '20160216211116', 'C00005', ' Lanhut', 'Lanhut	\n', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000376', '20160216211116', 'C00005', 'Reject', '	Hi,\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0002', 'erwinc@pixtox.com', 0),
('N000377', '20160216221554', 'C00008', 'No', '	\nNo', 'Adm0004', 'ramondekong@pixtox.com', 0);
INSERT INTO `perhitungan_nilai` (`idnilai`, `id_foto`, `memberid`, `subject`, `message`, `userid`, `email`, `nilai`) VALUES
('N000378', '20160216211116', 'C00005', 'Rijek', '	\nRijek', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000379', '20160217130220', 'C00007', '', '', 'px', '', 0),
('N000380', '20160217130938', 'C00007', '', '', 'px', '', 0),
('N000381', '20160217130938', 'C00007', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000382', '20160217130220', 'C00007', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000383', '20160217130938', 'C00007', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000384', '20160217130220', 'C00007', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000385', '20160217215446', 'C00005', '', '', 'px', '', 0),
('N000386', '20160217215446', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000387', '20160217215446', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000388', '20160220120914', 'C00005', '', '', 'px', '', 0),
('N000389', '20160220121436', 'C00005', '', '', 'px', '', 0),
('N000390', '20160220120914', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000391', '20160220121436', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000392', '20160220122154', 'C00005', '', '', 'px', '', 0),
('N000393', '20160220122154', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000394', '20160220122154', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000395', '20160220121436', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000396', '20160220120914', 'C00005', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000397', '20160220125929', 'C00005', '', '', 'px', '', 0),
('N000398', '20160220125929', 'C00005', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000399', '20160220125929', 'C00005', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000400', '20160222114639', 'C00012', '', '', 'px', '', 0),
('N000401', '20160222115013', 'C00012', '', '', 'px', '', 0),
('N000402', '20160222115013', 'C00012', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000403', '20160222115013', 'C00012', 'Watermark', 'Maaf foto anda terpaksa kami reject karena tidak diperbolehkan adanya watermark. Copiright dari foto anda akan otomatis tersimpan di data base kami tanpa adanya watermark	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000404', '20160222131439', 'C00008', '', '', 'px', '', 0),
('N000405', '20160222131439', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000406', '20160222115013', 'C00012', 'Watermark Jangan disertakan', 'Watermark dihapus\n', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000407', '20160222214704', 'C00013', '', '', 'px', '', 0),
('N000408', '20160222214704', 'C00013', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000409', '20160222214704', 'C00013', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000410', '20160222131439', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000411', '20160222221349', 'C00013', '', '', 'px', '', 0),
('N000412', '20160222222548', 'C00013', '', '', 'px', '', 0),
('N000413', '20160222221349', 'C00013', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000414', '20160222222548', 'C00013', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000415', '20160222222548', 'C00013', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000416', '20160222221349', 'C00013', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000417', '20160223095628', 'C00005', '', '', 'px', '', 0),
('N000418', '20160223095628', 'C00005', '', '	\n', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000419', '20160223095628', 'C00005', 'Tolak', 'Tolak	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000420', '20160223173623', 'C00001', '', '', 'px', '', 0),
('N000421', '20160223174130', 'C00001', '', '', 'px', '', 0),
('N000422', '20160223174948', 'C00001', '', '', 'px', '', 0),
('N000423', '20160223175501', 'C00001', '', '', 'px', '', 0),
('N000424', '20160223175844', 'C00001', '', '', 'px', '', 0),
('N000425', '20160223180212', 'C00001', '', '', 'px', '', 0),
('N000426', '20160223180655', 'C00001', '', '', 'px', '', 0),
('N000427', '20160223180938', 'C00001', '', '', 'px', '', 0),
('N000428', '20160223224356', 'C00013', '', '', 'px', '', 0),
('N000429', '20160223173623', 'C00001', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000430', '20160223173623', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000431', '20160223174130', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000432', '20160223174948', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000433', '20160223175501', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000434', '20160223175844', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000435', '20160223180212', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000436', '20160223180655', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000437', '20160223180938', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000438', '20160223224356', 'C00013', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000439', '20160223224356', 'C00013', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000440', '20160223174130', 'C00001', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000441', '20160224144221', 'C00015', '', '', 'px', '', 0),
('N000442', '20160224150059', 'C00016', '', '', 'px', '', 0),
('N000443', '20160224152558', 'C00017', '', '', 'px', '', 0),
('N000444', '20160224152709', 'C00016', '', '', 'px', '', 0),
('N000445', '20160223175501', 'C00001', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000446', '20160224144221', 'C00015', 'Tidak proporsional', 'Tidak proporsional	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000447', '20160224150059', 'C00016', 'Out of focus', 'Gambar out of facus dan penuh noise	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000448', '20160224152558', 'C00017', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000449', '20160224152709', 'C00016', 'Rejected', 'Rejected	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000450', '20160223174948', 'C00001', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000451', '20160224150059', 'C00016', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000452', '20160224152558', 'C00017', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000453', '20160224144221', 'C00015', 'Vertical photo', 'Vertical photo\n', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000454', '20160224152709', 'C00016', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000455', '20160223180938', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000456', '20160223180655', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000457', '20160223180212', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000458', '20160223175844', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000459', '20160224190317', 'C00008', '', '', 'px', '', 0),
('N000460', '20160224190650', 'C00008', '', '', 'px', '', 0),
('N000461', '20160224190932', 'C00008', '', '', 'px', '', 0),
('N000462', '20160224191154', 'C00008', '', '', 'px', '', 0),
('N000463', '20160224191316', 'C00008', '', '', 'px', '', 0),
('N000464', '20160224190317', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000465', '20160224191904', 'C00008', '', '', 'px', '', 0),
('N000466', '20160224190650', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000467', '20160224190932', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000468', '20160224191154', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000469', '20160224192200', 'C00008', '', '', 'px', '', 0),
('N000470', '20160224192439', 'C00008', '', '', 'px', '', 0),
('N000471', '20160224192817', 'C00008', '', '', 'px', '', 0),
('N000472', '20160224191316', 'C00008', 'Lanhut', 'Lanhut	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000473', '20160224191904', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000474', '20160224192200', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000475', '20160224192439', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000476', '20160224192817', 'C00008', 'Rijek', 'Rijek	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000477', '20160224192817', 'C00008', 'Not ', '	\n\nDengan email ini kami ingin memberitahukan kepada anda bahwa foto anda tersebut belum bisa kami terima, karena foto tersebut memiliki satu atau lebih kesalahan dibawah ini :\n\n*Blur atau Out Of Focus\n Foto harus focus atau ketika focus ada area kecil, usahakan pakai Depth Of Field yg besar utk mengantisipasi foto blur.\n*Over / Under Exposure\n*Noise atau Pixelation\n Pastikan foto anda bebas dari noise pada review 100%\n*Effect Problem\nPenggunaan special effect seperti tulisan, watermark atau efek pada gambar dilarang.\n*Size Problem\nPastikan foto anda memenuhi kriteria size yaitu minimal 4 Mega Pixel (2240x1680)\n\nJika ada hal yg tidak jelas, silahkan hubungi kami di support@pixtox.com\nKami tunggu upload anda yg berikutnya lagi, selamat mencoba.\n\nHotmat kami, \nTeam Pixtox\nwww.pixtox.com', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000478', '20160224192439', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000479', '20160224192200', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000480', '20160224191904', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000481', '20160224191316', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000482', '20160224191154', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000483', '20160224190932', 'C00008', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000484', '20160224200751', 'C00008', '', '', 'px', '', 0),
('N000485', '20160224200959', 'C00008', '', '', 'px', '', 0),
('N000486', '20160224201210', 'C00008', '', '', 'px', '', 0),
('N000487', '20160224201456', 'C00008', '', '', 'px', '', 0),
('N000488', '20160224201839', 'C00008', '', '', 'px', '', 0),
('N000489', '20160224200751', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000490', '20160224200959', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000491', '20160224201210', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000492', '20160224201456', 'C00008', 'Under exposure', 'Under exposure	\n', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000493', '20160224201839', 'C00008', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000494', '20160224200959', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000495', '20160224200751', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000496', '20160224190650', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000497', '20160224190317', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000498', '20160224201456', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000499', '20160224201839', 'C00008', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000500', '20160224201210', 'C00008', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000501', '20160227063026', 'C00021', '', '', 'px', '', 0),
('N000502', '20160227063041', 'C00021', '', '', 'px', '', 0),
('N000503', '20160227063026', 'C00021', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000504', '20160229173853', 'C00023', '', '', 'px', '', 0),
('N000505', '20160227063026', 'C00021', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000506', '20160229173853', 'C00023', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000507', '20160227063041', 'C00021', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000508', '20160227063041', 'C00021', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000509', '20160229173853', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000510', '20160229195627', 'C00024', '', '', 'px', '', 0),
('N000511', '20160229202152', 'C00023', '', '', 'px', '', 0),
('N000512', '20160229203930', 'C00023', '', '', 'px', '', 0),
('N000513', '20160229204235', 'C00023', '', '', 'px', '', 0),
('N000514', '20160229204503', 'C00023', '', '', 'px', '', 0),
('N000515', '20160229204755', 'C00023', '', '', 'px', '', 0),
('N000516', '20160229195627', 'C00024', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000517', '20160229202152', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000518', '20160229205056', 'C00023', '', '', 'px', '', 0),
('N000519', '20160229203930', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000520', '20160229205056', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000521', '20160229204755', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000522', '20160229205338', 'C00023', '', '', 'px', '', 0),
('N000523', '20160229204503', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000524', '20160229204235', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000525', '20160229205338', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000526', '20160229205604', 'C00023', '', '', 'px', '', 0),
('N000527', '20160229205803', 'C00023', '', '', 'px', '', 0),
('N000528', '20160229210205', 'C00023', '', '', 'px', '', 0),
('N000529', '20160229210404', 'C00023', '', '', 'px', '', 0),
('N000530', '20160229210855', 'C00023', '', '', 'px', '', 0),
('N000531', '20160229211333', 'C00023', '', '', 'px', '', 0),
('N000532', '20160229205604', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000533', '20160229205803', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000534', '20160229210205', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000535', '20160229210404', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000536', '20160229210855', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000537', '20160229211333', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000538', '20160229211627', 'C00023', '', '', 'px', '', 0),
('N000539', '20160229211904', 'C00023', '', '', 'px', '', 0),
('N000540', '20160229212226', 'C00023', '', '', 'px', '', 0),
('N000541', '20160229212908', 'C00023', '', '', 'px', '', 0),
('N000542', '20160229211627', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000543', '20160229211904', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000544', '20160229212226', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000545', '20160229212908', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000546', '20160229213139', 'C00023', '', '', 'px', '', 0),
('N000547', '20160229213502', 'C00023', '', '', 'px', '', 0),
('N000548', '20160229213702', 'C00023', '', '', 'px', '', 0),
('N000549', '20160229213938', 'C00023', '', '', 'px', '', 0),
('N000550', '20160229214130', 'C00023', '', '', 'px', '', 0),
('N000551', '20160229214321', 'C00023', '', '', 'px', '', 0),
('N000552', '20160229214535', 'C00023', '', '', 'px', '', 0),
('N000553', '20160229215006', 'C00023', '', '', 'px', '', 0),
('N000554', '20160229215254', 'C00023', '', '', 'px', '', 0),
('N000555', '20160229213139', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000556', '20160229215550', 'C00023', '', '', 'px', '', 0),
('N000557', '20160229213502', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000558', '20160229213702', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000559', '20160229213938', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000560', '20160229214130', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000561', '20160229214321', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000562', '20160229214535', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000563', '20160229215006', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000564', '20160229215254', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000565', '20160229215832', 'C00023', '', '', 'px', '', 0),
('N000566', '20160229220045', 'C00023', '', '', 'px', '', 0),
('N000567', '20160229220244', 'C00023', '', '', 'px', '', 0),
('N000568', '20160229220512', 'C00023', '', '', 'px', '', 0),
('N000569', '20160229220819', 'C00023', '', '', 'px', '', 0),
('N000570', '20160229204235', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000571', '20160229220512', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000572', '20160229203930', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000573', '20160229204755', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000574', '20160229221208', 'C00023', '', '', 'px', '', 0),
('N000575', '20160229221408', 'C00023', '', '', 'px', '', 0),
('N000576', '20160229221538', 'C00023', '', '', 'px', '', 0),
('N000577', '20160229221732', 'C00023', '', '', 'px', '', 0),
('N000578', '20160229221940', 'C00023', '', '', 'px', '', 0),
('N000579', '20160229222310', 'C00023', '', '', 'px', '', 0),
('N000580', '20160229215550', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000581', '20160229215832', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000582', '20160229220045', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000583', '20160229220244', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000584', '20160229220512', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000585', '20160229220819', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000586', '20160229221208', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000587', '20160229221408', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000588', '20160229221538', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000589', '20160229221732', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000590', '20160229221940', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000591', '20160229222310', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000592', '20160229204503', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000593', '20160229205056', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000594', '20160229205604', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000595', '20160229202152', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000596', '20160229205803', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000597', '20160229205338', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000598', '20160229210404', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000599', '20160229211333', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000600', '20160229210855', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000601', '20160229210205', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000602', '20160229195627', 'C00024', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000603', '20160229211627', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000604', '20160229212226', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000605', '20160229213139', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000606', '20160229212908', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000607', '20160229213502', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000608', '20160229213702', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000609', '20160229214130', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000610', '20160229214321', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000611', '20160229213938', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000612', '20160229215006', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000613', '20160229214535', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000614', '20160229215254', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000615', '20160229215550', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000616', '20160229220244', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000617', '20160229220819', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000618', '20160229221208', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000619', '20160229221408', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000620', '20160229221538', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000621', '20160229221732', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000622', '20160229221940', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000623', '20160229222310', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000624', '20160229220045', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000625', '20160229215832', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000626', '20160229211904', 'C00023', 'Reject', 'Reject', 'Adm0003', 'owensantoso@pixtox.com', 0),
('N000627', '20160301175504', 'C00023', '', '', 'px', '', 0),
('N000628', '20160301175504', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000629', '20160301181053', 'C00023', '', '', 'px', '', 0),
('N000630', '20160301181053', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000631', '20160301203424', 'C00023', '', '', 'px', '', 0),
('N000632', '20160301203424', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000633', '20160302073140', 'C00021', '', '', 'px', '', 0),
('N000634', '20160302073140', 'C00021', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000635', '20160302073140', 'C00021', 'OK', 'OK', 'Adm0004', 'ramondekong@pixtox.com', 1),
('N000636', '20160301181053', 'C00023', 'Reject', 'Reject', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000637', '20160301175504', 'C00023', 'Reject', 'Reject', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000638', '20160301203424', 'C00023', 'Reject', 'Reject', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000639', '20160302145016', 'C00023', '', '', 'px', '', 0),
('N000640', '20160302145016', 'C00023', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000641', '20160302151255', 'C00023', '', '', 'px', '', 0),
('N000642', '20160302152257', 'C00023', '', '', 'px', '', 0),
('N000643', '20160302151255', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000644', '20160302152257', 'C00023', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000645', '20160302180617', 'C00023', '', '', 'px', '', 0),
('N000646', '20160302180617', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000647', '20160302202227', 'C00026', '', '', 'px', '', 0),
('N000648', '20160302202227', 'C00026', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000649', '20160302180617', 'C00023', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000650', '20160302152257', 'C00023', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000651', '20160302151255', 'C00023', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000652', '20160302145016', 'C00023', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000653', '20160302202227', 'C00026', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000656', '20160303002418', 'C00026', '', '', 'px', '', 0),
('N000657', '20160303003258', 'C00026', '', '', 'px', '', 0),
('N000658', '20160303004358', 'C00026', '', '', 'px', '', 0),
('N000659', '20160303002418', 'C00026', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000660', '20160303003258', 'C00026', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000661', '20160303004358', 'C00026', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000662', '20160303004358', 'C00026', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000663', '20160303003258', 'C00026', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000664', '20160303002418', 'C00026', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000666', '20160305184444', 'C00023', '', '', 'px', '', 0),
('N000667', '20160305184444', 'C00023', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000668', '20160305190216', 'C00026', '', '', 'px', '', 0),
('N000669', '20160305192827', 'C00026', '', '', 'px', '', 0),
('N000670', '20160305193938', 'C00026', '', '', 'px', '', 0),
('N000671', '20160305190216', 'C00026', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000672', '20160305192827', 'C00026', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000673', '20160305193938', 'C00026', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000674', '20160305190216', 'C00026', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000675', '20160305192827', 'C00026', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000676', '20160305193938', 'C00026', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000677', '20160305184444', 'C00023', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000678', '20160307011059', 'C00024', '', '', 'px', '', 0),
('N000679', '20160307011059', 'C00024', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000680', '20160307011059', 'C00024', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000681', '20160307201217', 'C00023', '', '', 'px', '', 0),
('N000682', '20160307201217', 'C00023', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000683', '20160307201217', 'C00023', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000684', '20160308174627', 'C00001', '', '', 'px', '', 0),
('N000685', '20160308175004', 'C00001', '', '', 'px', '', 0),
('N000686', '20160308175758', 'C00001', '', '', 'px', '', 0),
('N000687', '20160308174627', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000688', '20160308175004', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000689', '20160308175758', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000690', '20160308180035', 'C00001', '', '', 'px', '', 0),
('N000691', '20160308180220', 'C00001', '', '', 'px', '', 0),
('N000692', '20160308180407', 'C00001', '', '', 'px', '', 0),
('N000693', '20160308175758', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000694', '20160308180035', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000695', '20160308180220', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000696', '20160308180407', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000697', '20160308175004', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000698', '20160308174627', 'C00001', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000699', '20160308180035', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000700', '20160308180220', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000701', '20160308180407', 'C00001', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000702', '20160318130701', 'C00024', '', '', 'px', '', 0),
('N000703', '20160318130701', 'C00024', 'OK', 'OK', 'Adm0005', 'yung.jr@pixtox.com', 1),
('N000704', '20160318130701', 'C00024', 'OK', 'OK', 'Adm0003', 'owensantoso@pixtox.com', 1),
('N000705', '20160324194819', 'C00027', '', '', 'px', '', 0),
('N000706', '20160324194819', 'C00027', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000707', '20160324201636', 'C00028', '', '', 'px', '', 0),
('N000708', '20160324201636', 'C00028', 'Reject', 'Reject', 'Adm0005', 'yung.jr@pixtox.com', 0),
('N000709', '20160324194819', 'C00027', 'Reject', 'Reject', 'Adm0004', 'ramondekong@pixtox.com', 0),
('N000710', '20160324201636', 'C00028', 'Reject', 'Reject', 'Adm0004', 'ramondekong@pixtox.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `redeem`
--

DROP TABLE IF EXISTS `redeem`;
CREATE TABLE IF NOT EXISTS `redeem` (
  `idredeem` varchar(7) NOT NULL DEFAULT '',
  `memberid` varchar(6) NOT NULL DEFAULT '',
  `nominal` float NOT NULL DEFAULT '0',
  `tanggal_request` date NOT NULL DEFAULT '0000-00-00',
  `tanggal_redeem` date NOT NULL DEFAULT '0000-00-00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `no_rekening` varchar(45) NOT NULL DEFAULT '',
  `nama_rekening` varchar(50) NOT NULL DEFAULT '',
  `bank` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idredeem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `redeem`
--

INSERT INTO `redeem` (`idredeem`, `memberid`, `nominal`, `tanggal_request`, `tanggal_redeem`, `status`, `no_rekening`, `nama_rekening`, `bank`) VALUES
('R000001', 'C00007', -6, '0000-00-00', '2015-12-18', 1, '123456781', 'john toel', 'Swiss bank'),
('R000002', 'C00005', 125000, '0000-00-00', '2016-03-07', 1, '8250022116', 'harianto', 'BCA'),
('R000003', 'C00008', 125000, '0000-00-00', '2016-03-10', 1, '8788888888', 'Ramonde', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `idreq` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `object` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `model` varchar(20) NOT NULL,
  `deadline` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `detail` longtext NOT NULL,
  `budget` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idreq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`idreq`, `name`, `theme`, `object`, `location`, `model`, `deadline`, `email`, `phone`, `status`, `detail`, `budget`) VALUES
('REQ.000001', 'MESSI', 'PANORAMA', 'VIEW', '1', 'tidak perlu model ', '2016-06-14', 'life.chandra@gmail.com', '0816301882', 0, '	pemandangan sunset di bali				\r\n				', '2000000');

-- --------------------------------------------------------

--
-- Table structure for table `reqvektor`
--

DROP TABLE IF EXISTS `reqvektor`;
CREATE TABLE IF NOT EXISTS `reqvektor` (
  `idreq` varchar(7) NOT NULL DEFAULT '',
  `category` varchar(45) NOT NULL DEFAULT '',
  `text` varchar(45) NOT NULL DEFAULT '',
  `tag_line` varchar(45) NOT NULL DEFAULT '',
  `style` varchar(45) NOT NULL DEFAULT '',
  `color1` varchar(45) NOT NULL DEFAULT '',
  `color2` varchar(45) NOT NULL DEFAULT '',
  `color3` varchar(45) NOT NULL DEFAULT '',
  `industry` varchar(45) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `phone` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `deadline` date NOT NULL DEFAULT '0000-00-00',
  `name` varchar(45) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `budget` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idreq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reqvektor`
--

INSERT INTO `reqvektor` (`idreq`, `category`, `text`, `tag_line`, `style`, `color1`, `color2`, `color3`, `industry`, `detail`, `phone`, `email`, `deadline`, `name`, `status`, `budget`) VALUES
('R000001', 'LOGO ', 'TEST', 'Anda Puas, Kami Bangga', '', '#000000', '#000000', '#000000', 'RESTAURANT', 'untuk logo perusahaan', '0816301882', 'life.chandra@gmail.com ', '2016-04-25', 'RONALDO', 0, '2000000');

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

DROP TABLE IF EXISTS `reset`;
CREATE TABLE IF NOT EXISTS `reset` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `memberid` varchar(9) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `token` varchar(15) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset`
--

INSERT INTO `reset` (`id`, `memberid`, `email`, `token`, `status`) VALUES
(5, 'C00004', 'agitnaeta@gmail.com', '6pOeDiIsg8rBUdR', 1),
(6, 'C00013', 'sukabola@ymail.com', '98vLPse2qd8yPQ6', 1),
(7, 'M00023', 'hendrysasmitaphotography@gmail.com', 'lt1Z0o2CPYd0wp2', 0),
(8, 'M00022', 'Deniirawan999@gmail.com', 'kAhWXE7LgpgPQfW', 0),
(9, 'C00019', 'indrasyaputra95.is@gmail.com', 'ddC3kygqXskHgrY', 1),
(10, 'C00019', 'indrasyaputra95.is@gmail.com', 'ddC3kygqXskHgrY', 1),
(11, 'M00023', 'hendrysasmitaphotography@gmail.com', 'TcQ9N6HjpkDuaCM', 0),
(12, 'M00030', 'zainalmuslich@gmail.com', 'FOIXDP4Vs9veDck', 0),
(13, 'M00039', 'ahmadsyaukanimk@gmail.com', '4hdQt3uKwU7FwAW', 0),
(14, 'M00039', 'ahmadsyaukanimk@gmail.com', '3UZgV0rbfnFq6ag', 0),
(15, 'M00039', 'ahmadsyaukanimk@gmail.com', 'QGJgiDDlesA3Eb4', 0),
(16, 'M00039', 'ahmadsyaukanimk@gmail.com', 'm1zybieaY7Xktff', 0),
(17, 'M00039', 'ahmadsyaukanimk@gmail.com', 'QgZLULQUAOWfi89', 0),
(18, 'M00044', 'adheir2015@gmail.com', 'PGkayYvJ3uvZzGY', 0),
(19, 'M00044', 'adheir2015@gmail.com', 'CQ9hW9bQJKOTwgh', 0),
(20, 'C00024', 'ovanmuslim@gmail.com', 'fOVCJEmBfMXn4SN', 1),
(21, 'C00008', 'ramondekong@gmail.com', 'BduHbFcHM8pUFAw', 1),
(22, 'C00008', 'ramondekong@gmail.com', 'BduHbFcHM8pUFAw', 1),
(23, 'C00017', 'a.barokah.ab@gmail.com', 'xsllljmmHZ5Kgio', 1),
(24, 'C00017', 'a.barokah.ab@gmail.com', 'xsllljmmHZ5Kgio', 1),
(25, 'M00050', 'yohan.yoyyo@gmail.com', '3XHw7fuuXe5WwAX', 1),
(26, 'C00028', 'YOSEPH_HAMDANI@YAHOO.COM', 'FpKpJx2QUXZfFWI', 0),
(27, 'C00004', 'agitnaeta@gmail.com', '6pOeDiIsg8rBUdR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting_redeem`
--

DROP TABLE IF EXISTS `setting_redeem`;
CREATE TABLE IF NOT EXISTS `setting_redeem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `minimal` float DEFAULT NULL,
  `maximal` float DEFAULT NULL,
  `penghasilan` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_redeem`
--

INSERT INTO `setting_redeem` (`id`, `minimal`, `maximal`, `penghasilan`, `status`) VALUES
(1, 100000, 0, 17800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` varchar(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama`) VALUES
('C', 'Contributor'),
('M', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bg`
--

DROP TABLE IF EXISTS `tbl_bg`;
CREATE TABLE IF NOT EXISTS `tbl_bg` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_image` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `mini_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bg`
--

INSERT INTO `tbl_bg` (`id`, `nama_image`, `status`, `mini_name`) VALUES
(7, 'ec8639adb02f6dab8dde0466a2447afa.jpg', 1, 'ec8639adb02f6dab8dde0466a2447afa_thumb.jpg'),
(8, 'bbf275ccd31260aae6a8264d16421f93.jpg', 1, 'bbf275ccd31260aae6a8264d16421f93_thumb.jpg'),
(9, '9340c5e28d018104eb26f3b4d42a56af.jpg', 1, '9340c5e28d018104eb26f3b4d42a56af_thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_langganan`
--

DROP TABLE IF EXISTS `tbl_langganan`;
CREATE TABLE IF NOT EXISTS `tbl_langganan` (
  `kode_langganan` varchar(10) NOT NULL,
  `memberID` varchar(20) NOT NULL,
  `paket` int(1) NOT NULL,
  `sisa_hari` int(11) NOT NULL,
  `pembayaran_terakhir` float NOT NULL,
  `total_pembayaran` float NOT NULL,
  `tagihan` float NOT NULL,
  `saldo` float NOT NULL,
  PRIMARY KEY (`kode_langganan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `template_email`
--

DROP TABLE IF EXISTS `template_email`;
CREATE TABLE IF NOT EXISTS `template_email` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL DEFAULT '',
  `isi` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_email`
--

INSERT INTO `template_email` (`id`, `nama`, `isi`) VALUES
(1, 'pendaftaran', '<p>Template Email</p>\n'),
(2, 'reset', '<p>Pendekin</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `temp_accept`
--

DROP TABLE IF EXISTS `temp_accept`;
CREATE TABLE IF NOT EXISTS `temp_accept` (
  `id_contributor` varchar(20) NOT NULL,
  `id_foto` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `big` varchar(255) NOT NULL,
  `mini` varchar(255) NOT NULL,
  `watermark` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `temp_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
CREATE TABLE IF NOT EXISTS `term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term`) VALUES
(1, '<p style="text-align: justify;"><strong>Hak Kekayaan Intelektual</strong></p>\n\n<p style="text-align: justify;"><strong>Definisi; </strong>Hak Kekayaan Intelektual merupakan kekayaan atas segala hasil produksi kecerdasan daya pikir seperti teknologi, pengetahuan, seni, sastra, karya tulis, karikatur, dan lain-lain yang berguna untuk manusia. Semua Hak atas Kekayaan Intelektual yang ada pada website ini (termasuk Akun User dan semua atribut yang ada di dalamnya), adalah mutlak dimiliki oleh pixtox.</p>\n\n<p style="text-align: justify;"><strong>Ketentuan terkait Hak Kekayaan Intelektual:</strong></p>\n\n<ol>\n	<li style="text-align: justify;">Pengguna mengakui tidak memiliki Hak atas Kekayaan Intelektual pada Akun member dan semua materi yang ada pada website pixtox.com</li>\n	<li style="text-align: justify;">Pengguna menyetujui bahwa kami (pixtox.com) dapat setiap saat menarik semua konten, hasil karya designer atau fotografer dalam website pixtox, apabila menurut pertimbangan kami bersifat melanggar Hak atas Kekayaan Intelektual dari pihak lain.</li>\n	<li style="text-align: justify;">Fotografer atau Designer menyatakan dan menjamin bahwa foto atau vector yang diberikan kepada pixtox.com dan Pelanggan merupakan hasil karyanya sendiri dan bukan diperoleh dari hal-hal yang bertentangan dengan hukum.</li>\n	<li style="text-align: justify;">Pengguna harus mematuhi semua hukum yang berlaku di bidang Hak atas Kekayaan Intelektual.</li>\n	<li style="text-align: justify;">Pengguna tidak diperbolehkan melakukan pendaftaran atas Hak&nbsp;Kekayaan Intelektual yang ada di website pixtox.com pada Dirjen Hak atas Kekayaan Intelektual di negara manapun.</li>\n</ol>\n\n<p style="text-align: justify;"><strong>Currency of Website</strong></p>\n\n<p style="text-align: justify;"><strong>Definisi; </strong>Nilai mata uang yang digunakan dalam website pixtox adalah Rupiah.</p>\n\n<p style="text-align: justify;"><strong>Ketentuan currency of website:</strong></p>\n\n<p style="text-align: justify;">Pixtox tidak menerima tanggung jawab atau kewajiban atas perbedaan akurasi mata uang selain yang tercantum pada website pixtox.</p>\n\n<p style="text-align: justify;"><strong>Trademarks</strong></p>\n\n<p style="text-align: justify;"><strong>Definisi; </strong>Pixtox foto atau vector dan produk layanan nama lain atau materi yang terkadung dalam situs pixtox.com adalah trademarks atau merk dagang dari pixtox.com.</p>\n\n<p style="text-align: justify;"><strong>Ketentuan trademarks:</strong></p>\n\n<ol>\n	<li style="text-align: justify;">Pengguna tidak dibenarkan menyalin, meniru, dan menggunakan secara keseluruhan atau sebagian tanpa izin tertulis dari pixtox atau pemegang merk dagang yang berlaku.</li>\n	<li style="text-align: justify;">Pengguna tidak diperkenankan memanfaatkan pixtox atau nama lain, merk dagang, nama produk, atau layanan dari pixtox tanpa izin tertulis dari pixtox.com</li>\n</ol>\n\n<p style="text-align: justify;"><strong>Royalti Free (RF)</strong></p>\n\n<p style="text-align: justify;"><br />\n<strong>Definisi; </strong>Siapa pun yang bergabung menjadi member pixtox dapat&nbsp;membeli,&nbsp;mendownload foto atau vector dan menggunakan untuk berbagai kepentingan tanpa batas waktu, baik untuk brosur, flyer, berita, blog, screen saver, iklan di TV, desktop, baliho, spanduk, kalender (untuk distribusi internal atau&nbsp;promo bukan untuk dijual umum), dan lain-lain.</p>\n\n<p style="text-align: justify;"><strong>Ketentuan Royalti Free:</strong></p>\n\n<ol>\n	<li style="text-align: justify;"><strong>PENGGUNAAN UNTUK CETAK</strong>. Foto atau vector dapat digunakan untuk semua jenis cetak apapun, termasuk iklan, materi promosi, publikasi, produk (termasuk produk tersebut dijual) sesuai dengan syarat dan ketentuan .</li>\n	<li style="text-align: justify;"><strong>PENGGUNAAN NON CETAK</strong>. Foto atau vector bisa digunakan untuk materi digital atau elektronik termasuk untuk digunakan di website, bisa digunakan untuk bahan presentasi multimedia</li>\n	<li style="text-align: justify;">Foto atau vector yang digunakan di website tidak untuk didownload ulang atau didistribusikan kepada pihak ketiga.</li>\n	<li style="text-align: justify;">Anda yang telah memiliki&nbsp;hak menggunakan lisensi foto atau vector RF dilarang untuk memindahtangankan hak lisensi, dan setiap pekerjaan menggunakan foto atau vector hanya dilakukan oleh Anda sendiri atau perusahaan serta klien sebagai pengguna terakhir (end-user). Anda tidak berhak mensublisensikan, menjual, memberi, meminjamkan mentransfer kepada siapapun melalui CD, DVD, atau media&nbsp;penyimpanan lainnya. Anda sepakat pada larangan tersebut sebagai upaya pencegahan pihak ketiga menduplikasi foto atau vector atau bahkan mendistribusikannya.&nbsp;Penggunaan lisensi foto atau vector hanya untuk Anda.</li>\n	<li style="text-align: justify;">Apabila&nbsp;Anda menjadi bagian dalam penggunaan lisensi jenis RF ini dan/atau sebagai wakil atau agen dari perusahaan Anda atau klien (end-user), maka Anda mewakili untuk menjamin bahwa:\n	<ul>\n		<li>Perusahaan dan/atau klien (end-user) ikut terikat dalam perjanjian dan berwenang untuk bertindak atas nama perusahaan dan/atau klien.</li>\n		<li>Anda akan mematuhi semua persyaratan ini dan harus bersama-sama atau sendiri, bertanggung jawab atas semua pelanggaran yang tertulis dalam perjanjian ini.</li>\n	</ul>\n	</li>\n	<li style="text-align: justify;">Foto atau vector tidak boleh digunakan sebagai bagian dari logo, trademarks, nama dagang, dan merk dagang kecuali adalah bagian dari Special Request (SR).</li>\n	<li style="text-align: justify;">Foto atau vector tidak boleh digunakan untuk tindakan bersifat pornografi, memfitnah, tindakan provokatif, tindakan melanggar hak cipta, merk dagang, atau sebagai hadiah.</li>\n</ol>\n\n<p style="text-align: justify;"><strong>Membership</strong></p>\n\n<p style="text-align: justify;"><strong>Definisi; </strong>Pengguna situs pixtox.com yang telah mendaftarkan diri menjadi member dan menyetujui syarat dan ketentuan.</p>\n\n<p style="text-align: justify;"><strong>Ketentuan member:</strong></p>\n\n<ol>\n	<li style="text-align: justify;">Member diizinkan untuk membeli dan mendownload foto atau vector yang di akses melalui web sesuai dengan syarat dan&nbsp;ketentuan yang berlaku.</li>\n	<li style="text-align: justify;">Bagi pengguna yang telah mendaftar menjadi member dapat mendownload dan menyimpan file foto atau vector dengan cara membeli sesuai dengan harga yang telah ditentukan dan telah menyetujui syarat dan ketentuan yang berlaku.</li>\n	<li style="text-align: justify;">Tidak menggunakan foto atau vector sebagai bagian dari logo, trademarks, nama dagang, dan merk dagang kecuali adalah bagian dari Special Request (SR).</li>\n	<li style="text-align: justify;">Foto atau vector tidak boleh digunakan untuk tindakan bersifat pornografi, memfitnah, tindakan provokatif, tindakan melanggar hak cipta, merk dagang, atau sebagai hadiah.</li>\n	<li style="text-align: justify;">Dengan adanya user name dan pasword,&nbsp;apabila&nbsp;telah terdaftar sebagai member pixtox, maka akun&nbsp;member hanya dapat digunakan oleh pengguna yang berwenang saja dalam pembelian foto dan vector yang terdapat di dalam situs pixtox.com.</li>\n	<li style="text-align: justify;">Tidak menggunakan akun&nbsp;member untuk tindakan yang bersifat melanggar hak cipta, merek dagang, paten, design, atau Hak atas Kekayaan Intelektual lainnya dari pihak lain.</li>\n	<li style="text-align: justify;">Setuju untuk membayar ganti rugi kepada PIXTOX yang bertindak sebagai unit usaha dari PT. GUDANG GAMBAR INDONESIA, terhadap munculnya klaim, biaya dan pengeluaran untuk pengacara akibat dari penggunaan yang tidak sah.</li>\n</ol>\n\n<p style="text-align: justify;"><strong>Contributor</strong></p>\n\n<p style="text-align: justify;"><strong>Definisi; </strong>Personal atau individual yang telah menjadi member dan mendaftarkan diri untuk bergabung sebagai contributor (pemasok foto atau vector) di pixtox.com. Contributor merupakan fotografer atau designer yang terikat dengan syarat dan ketentuan yang berlaku.</p>\n\n<p style="text-align: justify;"><strong>Ketentuan contributor:</strong></p>\n\n<ol>\n	<li style="text-align: justify;">Upload foto atau vector hasil karya sendiri.</li>\n	<li style="text-align: justify;">Upload hanya foto atau vector terbaik, bukan semua koleksi foto atau vector Anda.</li>\n	<li style="text-align: justify;">Isi data identitas profile contributor dengan detail.</li>\n	<li style="text-align: justify;">Tidak boleh mengupload foto atau vector yang bersifat pornografi, tindakan melanggar hak cipta, merk dagang, dan sejenisnya.</li>\n	<li style="text-align: justify;">Akun&nbsp;contributor hanya dapat digunakan oleh pengguna yang berwenang saja dalam mengupload foto atau vector kedalam situs pixtox.com.</li>\n	<li style="text-align: justify;">Setuju untuk membayar ganti rugi kepada PIXTOX yang bertindak sebagai unit usaha dari PT. GUDANG GAMBAR INDONESIA, terhadap munculnya klaim, biaya dan pengeluaran untuk pengacara akibat dari penggunaan yang tidak sah.</li>\n</ol>\n\n<p style="text-align: justify;"><strong>Exclusive Contributor (EC)</strong></p>\n\n<p style="text-align: justify;"><strong>Definisi; </strong>Exclusive Contributor merupakan fotografer atau designer yang telah mendaftarkan diri untuk bergabung sebagai contributor (pemasok foto atau vector) di pixtox.com dan mendapatkan ijin khusus dari tim pixtox untuk mengerjakan proyek special request, sesuai dengan syarat dan ketentuan yang berlaku. Penunjukan EC hanya ditentukan oleh tim pixtox.com.</p>\n\n<p style="text-align: justify;"><strong>Ketentuan bagi Exclusive Contributor:</strong></p>\n\n<ol>\n	<li style="text-align: justify;">Dalam hal ini, Exclusive Contributor tidak diperbolehkan memanipulasi atau memberikan hasil design kepada pixtox dan pelanggan yang bukan hasil karya sendiri.</li>\n	<li style="text-align: justify;">Setuju untuk membayar ganti rugi kepada PIXTOX yang bertindak sebagai unit usaha dari PT. GUDANG GAMBAR INDONESIA, terhadap munculnya klaim, biaya dan pengeluaran untuk pengacara akibat dari penggunaan yang tidak sah.</li>\n</ol>\n\n<p style="text-align: justify;"><strong>Special Request (SR)</strong></p>\n\n<p style="text-align: justify;"><strong>Definisi; </strong>Layanan permintaan khusus dari member pixtox untuk pembuatan suatu proyek. Diperlukan detail untuk proyek foto atau vector tersebut seperti :</p>\n\n<ol style="list-style-type:lower-roman">\n	<li style="text-align: justify;">Proyek Foto &nbsp;&nbsp;&nbsp;&nbsp; : diperlukan detail tema, object, location, model dan data kontak dengan batas waktu pengerjaan yang telah ditentukan.</li>\n	<li style="text-align: justify;">Proyek Vector&nbsp;&nbsp; : diperlukan detail kategori, text, tag line, style (perpaduan warna yang di inginkan), industri, spesifikasi yang diinginkan, data kontak dan batas waktu pengerjaan yang telah ditentukan.</li>\n</ol>\n\n<p style="text-align: justify;"><strong>Ketentuan special request :</strong></p>\n\n<p style="text-align: justify;">Bagi pengguna layanan special request di pixtox.com harus terlebih dahulu mendaftar sebagai member, dan dapat menyesuaikan request sesuai dengan kebutuhan pengguna sebagaimana&nbsp;syarat dan ketentuan pada website.</p>\n\n<p style="text-align: justify;">Semua foto atau vector yang ada di dalam situs ini untuk penggunaan dan Lisensinya telah diatur dengan syarat dan ketentuan:</p>\n\n<ol>\n	<li style="text-align: justify;">Member dapat menggunakan layanan special request dengan cara membeli deposite special request pada menu pricing.</li>\n	<li style="text-align: justify;">Menggunakan foto atau vector dengan bertanggung jawab, tidak untuk pornografi,&nbsp; tidak boleh digunakan untuk logo atau trademarks, untuk hal-hal yang menjelek-jelekkan (penghinaan, provokasi dan sejenisnya) menjual kembali, baik foto langsung atau produk yang berhubungan dengannya.</li>\n	<li style="text-align: justify;">Bagi pengguna yang memiliki akun&nbsp;member dilarang menjual, mempublikasikan atau mendistribusikan salah satu atau keseluruhan foto atau vector dalam situs ini untuk: kegiatan tindak penipuan, memfitnah dan segala jenis pelanggaran hukum.</li>\n	<li style="text-align: justify;">Setuju untuk membayar ganti rugi kepada PIXTOX yang bertindak sebagai unit usaha dari PT. GUDANG GAMBAR INDONESIA, terhadap munculnya klaim, biaya dan pengeluaran untuk pengacara akibat dari penggunaan yang tidak sah.</li>\n</ol>\n\n<p style="text-align: justify;">Anda telah menyetujui kesepakatan untuk melakukan perjanjian kerjasama&nbsp;ini secara elektronik.</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `upload_setting`
--

DROP TABLE IF EXISTS `upload_setting`;
CREATE TABLE IF NOT EXISTS `upload_setting` (
  `idupload_setting` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `max_size` varchar(45) NOT NULL DEFAULT '',
  `max_width` varchar(45) NOT NULL DEFAULT '',
  `max_height` varchar(45) NOT NULL DEFAULT '',
  `min_height` varchar(45) NOT NULL DEFAULT '',
  `min_width` varchar(45) NOT NULL DEFAULT '',
  `min_size` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idupload_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_setting`
--

INSERT INTO `upload_setting` (`idupload_setting`, `max_size`, `max_width`, `max_height`, `min_height`, `min_width`, `min_size`) VALUES
(1, '999999', '999999', '999999', '1680', '2240', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `status`, `email`) VALUES
('Adm0003', 'owensantoso', '420e6bec827d907c3caa56ea6efbe246', '1', 'owensantoso@pixtox.com'),
('Adm0004', 'ramondekong', '420e6bec827d907c3caa56ea6efbe246', '1', 'ramondekong@pixtox.com'),
('Adm0005', 'yung.jr', '420e6bec827d907c3caa56ea6efbe246', '1', 'yung.jr@pixtox.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `voting`
--
DROP VIEW IF EXISTS `voting`;
CREATE TABLE IF NOT EXISTS `voting` (
`watermark` varchar(255)
,`mini` varchar(255)
,`big` varchar(255)
,`judul` varchar(255)
,`id_foto` varchar(15)
,`status` tinyint(1)
,`vote` bigint(21)
,`nilai` decimal(25,0)
);

-- --------------------------------------------------------

--
-- Structure for view `earning`
--
DROP TABLE IF EXISTS `earning`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `earning`  AS  select distinct `d`.`id_download` AS `id_download`,`f`.`id_foto` AS `id_foto`,`d`.`earning` AS `earning`,`f`.`id_contributor` AS `id_contributor`,`d`.`memberid` AS `memberid`,`d`.`status` AS `status`,`d`.`tanggal_download` AS `tanggal_download` from (`download` `d` join `foto` `f`) where (`d`.`id_foto` = `f`.`id_foto`) ;

-- --------------------------------------------------------

--
-- Structure for view `imageweek`
--
DROP TABLE IF EXISTS `imageweek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `imageweek`  AS  select `foto`.`watermark` AS `watermark`,`foto`.`mini` AS `mini`,`foto`.`big` AS `big`,`foto`.`judul` AS `judul`,`foto`.`id_foto` AS `id_foto`,`foto`.`status` AS `status`,count(`p`.`id_foto`) AS `vote`,sum(`p`.`nilai`) AS `nilai` from (`perhitungan_nilai` `p` join `foto` on(((`p`.`id_foto` = `foto`.`id_foto`) and (`foto`.`image_week` = 1) and (`foto`.`status` = 0)))) group by `foto`.`id_foto` order by `foto`.`id_foto` ;

-- --------------------------------------------------------

--
-- Structure for view `voting`
--
DROP TABLE IF EXISTS `voting`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `voting`  AS  select `foto`.`watermark` AS `watermark`,`foto`.`mini` AS `mini`,`foto`.`big` AS `big`,`foto`.`judul` AS `judul`,`foto`.`id_foto` AS `id_foto`,`foto`.`status` AS `status`,count(`p`.`id_foto`) AS `vote`,sum(`p`.`nilai`) AS `nilai` from (`perhitungan_nilai` `p` join `foto` on(((`p`.`id_foto` = `foto`.`id_foto`) and (`foto`.`status` = 0)))) group by `foto`.`id_foto` order by `foto`.`id_foto` ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
