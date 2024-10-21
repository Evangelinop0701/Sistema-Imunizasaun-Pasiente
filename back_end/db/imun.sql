-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 04:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imun`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_aldeia`
--

CREATE TABLE `t_aldeia` (
  `id_aldeia` int(11) NOT NULL,
  `naran_aldeia` varchar(20) NOT NULL,
  `naran_suku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_aldeia`
--

INSERT INTO `t_aldeia` (`id_aldeia`, `naran_aldeia`, `naran_suku`) VALUES
(1, 'Liacuda', 'Liaruca'),
(2, 'Selele', 'Liaruca'),
(3, 'Liaruca', 'Liaruka'),
(4, 'Kai-wa', 'Liaruka'),
(5, 'Bahaneo', 'Liaruka');

-- --------------------------------------------------------

--
-- Table structure for table `t_control`
--

CREATE TABLE `t_control` (
  `id_control` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlf` bigint(20) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facabook` varchar(100) NOT NULL,
  `wa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_control`
--

INSERT INTO `t_control` (`id_control`, `email`, `no_tlf`, `instagram`, `facabook`, `wa`) VALUES
(3, 'evange.21028@gmail.com', 74546488, 'http://www.google.com', 'http://www.facebook.com', 74546488);

-- --------------------------------------------------------

--
-- Table structure for table `t_dose`
--

CREATE TABLE `t_dose` (
  `id_dose` int(11) NOT NULL,
  `id_imunisasaun` int(11) NOT NULL,
  `naran_dose` varchar(50) NOT NULL,
  `data_dose` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_dose`
--

INSERT INTO `t_dose` (`id_dose`, `id_imunisasaun`, `naran_dose`, `data_dose`, `status`) VALUES
(27, 3, 'DO-2', '2023-10-01', ''),
(28, 3, 'DO-3', '2023-10-07', ''),
(29, 5, 'DO-1', '2023-09-30', ''),
(40, 5, 'DO-2', '2023-09-29', ''),
(42, 2, 'DO-2', '2023-10-07', ''),
(44, 2, 'DO-1', '2023-09-30', ''),
(45, 1, 'DO-1', '2023-10-17', ''),
(46, 1, 'DO-2', '2023-10-21', ''),
(48, 1, 'DO-4', '2024-09-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_doutor`
--

CREATE TABLE `t_doutor` (
  `id_doutor` int(11) NOT NULL,
  `naran_doutor` varchar(70) NOT NULL,
  `sexu` enum('M','F') NOT NULL,
  `data_moris` date NOT NULL,
  `area_espesifiku` text NOT NULL,
  `id_aldeia` int(11) NOT NULL,
  `hela_fatin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_doutor`
--

INSERT INTO `t_doutor` (`id_doutor`, `naran_doutor`, `sexu`, `data_moris`, `area_espesifiku`, `id_aldeia`, `hela_fatin`) VALUES
(2, 'Evangelino Soares Saldanha', 'M', '2001-01-07', 'Doutor Espesial Ba Sistema imunisasaun', 1, 'Tasi-Tolu'),
(3, 'Clarinho Fernandes', 'M', '2001-09-20', 'Doutor Espesila ba Sistema vasinasaun ', 1, 'Tasi-Tolu'),
(4, 'Teresa Marlin Godinho', 'F', '2003-10-16', 'Doutora Espesial ba Imunizasaun', 1, 'Liaruka');

-- --------------------------------------------------------

--
-- Table structure for table `t_imunisasaun`
--

CREATE TABLE `t_imunisasaun` (
  `id_imunisasaun` int(11) NOT NULL,
  `id_pasiente` int(11) NOT NULL,
  `data_imunizasaun` date NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `data_durasaun` date NOT NULL,
  `doses` int(11) NOT NULL,
  `id_doutor` int(11) NOT NULL,
  `komentario` text NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `obs` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_imunisasaun`
--

INSERT INTO `t_imunisasaun` (`id_imunisasaun`, `id_pasiente`, `data_imunizasaun`, `id_tipo`, `data_durasaun`, `doses`, `id_doutor`, `komentario`, `id_periodo`, `obs`) VALUES
(1, 3, '2022-01-26', 2, '2023-09-30', 3, 2, 'fdfsdfdsf', 4, 'Kompletu'),
(2, 3, '2023-09-28', 4, '2023-09-29', 2, 2, 'dsfdsfsfsdf', 4, 'Kompletu'),
(3, 5, '2023-09-27', 5, '0000-00-00', 0, 2, 'fgfdgd', 4, ''),
(4, 5, '2023-09-28', 3, '2023-09-30', 2, 2, 'dsdsad', 4, ''),
(5, 5, '2023-09-30', 2, '0000-00-00', 0, 2, 'vxvx', 4, ''),
(6, 7, '2022-10-28', 4, '0000-00-00', 0, 2, 'Presisa hetan kuidado makas husi Inan Aman', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_informsasaun`
--

CREATE TABLE `t_informsasaun` (
  `id_informasaun` int(11) NOT NULL,
  `titulu_informasaun` varchar(100) NOT NULL,
  `data_puvlica` date NOT NULL,
  `conten` text NOT NULL,
  `refersensia` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_informsasaun`
--

INSERT INTO `t_informsasaun` (`id_informasaun`, `titulu_informasaun`, `data_puvlica`, `conten`, `refersensia`, `foto`) VALUES
(6, 'Vasinasaun BCG', '2023-09-26', 'Vasinasaun BCG (Bacillus Calmette-Guerin) iha nia objetivu primáriu atu prevene infezaun husi bakteria Mycobacterium tuberculosis, nebe kausa tuberculose (TB).', 'wikipedia', 'BCG-download.jpeg'),
(7, 'Vasinasaun Hepatites B', '2023-10-16', 'Vasinasaun hepatite B iha funsaun atu fornese imunidade ba ema kontra hepatite B, nebe hanesan infezaun viral ba figadu. Vasinasaun sira hetan husi sistema imunitariu, liu husi halo imunidade ba vírus hepatite B no impede sira atu hetan doensa hepatite B.', 'wikipedia.com', '-images.jpeg'),
(8, 'Vasinasaun PCV', '2023-10-16', 'Vasinasaun pentavalent mak uma hanesan kompozisaun ida neebe inklui imunizasaun kontra haemophilus influenzae tipu b (Hib), difteria, tos baixa (pertussis), tetanus, hepatitis B, no infeksaun husi virus poliovirus. Vasinasaun nee iha forma likida no administradu liu husi injesaun intramuscular.', 'wikipedia.com', '-images.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `t_mun`
--

CREATE TABLE `t_mun` (
  `id_mun` int(11) NOT NULL,
  `naran_mun` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_pasiente`
--

CREATE TABLE `t_pasiente` (
  `id_pasiente` int(11) NOT NULL,
  `naran_pasiente` varchar(50) NOT NULL,
  `data_moris` date NOT NULL,
  `sexu` enum('M','F') NOT NULL,
  `naran_aman` varchar(50) NOT NULL,
  `naran_inan` varchar(50) NOT NULL,
  `no_tlf` int(11) NOT NULL,
  `id_aldeia` int(11) NOT NULL,
  `bairo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pasiente`
--

INSERT INTO `t_pasiente` (`id_pasiente`, `naran_pasiente`, `data_moris`, `sexu`, `naran_aman`, `naran_inan`, `no_tlf`, `id_aldeia`, `bairo`) VALUES
(3, 'Galenia Maria Saldanha', '2018-09-26', 'F', 'Santiago Soares Saldanha', 'Olga maria Sarmento', 76788789, 1, 'Lekiluka'),
(4, 'Marciana Maria', '2022-09-21', 'F', 'Santiago Soares Saldanha', 'Olga maria Sarmento', 74546488, 1, 'Lesu-Bau'),
(5, 'Mario Fernande ', '2023-09-04', 'M', 'Santiago Soares Saldanha', 'Olga maria Sarmento', 74546488, 1, 'BGU'),
(6, 'Cristiano Monteiro do Rosario', '2010-06-24', 'M', 'Helio do Rosario', 'Idalina da Costa Monteiro', 76788789, 2, 'Kuna-Rame'),
(7, 'Clarinha Fernandes', '2022-10-09', 'F', 'Mario Fernandes', 'Maria Sarmento', 76788789, 4, 'Bubu-Anan');

-- --------------------------------------------------------

--
-- Table structure for table `t_periodo`
--

CREATE TABLE `t_periodo` (
  `id_periodo` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_periodo`
--

INSERT INTO `t_periodo` (`id_periodo`, `periodo`, `status`) VALUES
(1, 2020, ''),
(2, 2021, ''),
(3, 2022, ''),
(4, 2023, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_postu`
--

CREATE TABLE `t_postu` (
  `id_postu` int(11) NOT NULL,
  `naran_postu` varchar(25) NOT NULL,
  `id_mun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_suku`
--

CREATE TABLE `t_suku` (
  `id_suku` int(11) NOT NULL,
  `naran_suku` varchar(20) NOT NULL,
  `id_postu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_tipu`
--

CREATE TABLE `t_tipu` (
  `id_tipo` int(11) NOT NULL,
  `naran_tipo` varchar(100) NOT NULL,
  `deskrisaun` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_tipu`
--

INSERT INTO `t_tipu` (`id_tipo`, `naran_tipo`, `deskrisaun`) VALUES
(2, 'BCG', 'Vasinasaun BCG (Bacillus Calmette-Guérin) iha nia objetivu primáriu atu prevene infezaun husi bakteria Mycobacterium tuberculosis,\r\n ne\'ebé kausa tuberculose (TB).'),
(3, 'IPV', 'Vasinasaun IPV (Inactivated Polio Vaccine) iha objetivu atu prevene poliomielite,\r\n mós konhesidu hanesan paralizia infantil, ne\'ebé kausa husi poliovirus. Vasinasaun IPV utiliza poliovirus ne\'ebé iha forma inativadu, \r\nka mate, no la\'ós iha forsa atu kausa doensa.\r\n'),
(4, 'Hepatitis B', 'Vasinasaun hepatite B iha funsaun atu fornese imunidade ba ema kontra hepatite B, \r\nne\'ebé hanesan infezaun viral ba figadu. Vasinasaun sira hetan husi sistema imunitáriu,\r\n liu husi halo imunidade ba vírus hepatite B no impede sira atu hetan doensa hepatite B.'),
(5, 'DTP 4', 'Vasinasaun pentavalent mak uma hanesan kompozisaun ida ne\'ebé inklui imunizasaun kontra haemophilus influenzae tipu b (Hib), \r\ndifteria, tos baixa (pertussis), tetanus, hepatitis B, no infeksaun husi virus poliovirus. Vasinasaun ne\'e iha forma líkida no administradu liu husi injeção intramuscular.\r\n'),
(9, 'Sarampu Rubela', 'Vasinasaun ne\'e iha objetivu atu prevene doensas infeksioza ne\'ebé kausa husi virus sarampu no rubela.');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `id_doutor` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `level_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `id_doutor`, `username`, `password`, `pass`, `level_user`) VALUES
(1, 2, 'admin', '55c3b5386c486feb662a0785f340938f518d547f', 'password', 'admin'),
(2, 4, 'user', '55c3b5386c486feb662a0785f340938f518d547f', 'password', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_aldeia`
--
ALTER TABLE `t_aldeia`
  ADD PRIMARY KEY (`id_aldeia`),
  ADD KEY `id_suku` (`naran_suku`);

--
-- Indexes for table `t_control`
--
ALTER TABLE `t_control`
  ADD PRIMARY KEY (`id_control`);

--
-- Indexes for table `t_dose`
--
ALTER TABLE `t_dose`
  ADD PRIMARY KEY (`id_dose`),
  ADD KEY `id_imunisasaun` (`id_imunisasaun`);

--
-- Indexes for table `t_doutor`
--
ALTER TABLE `t_doutor`
  ADD PRIMARY KEY (`id_doutor`),
  ADD KEY `id_aldeia` (`id_aldeia`);

--
-- Indexes for table `t_imunisasaun`
--
ALTER TABLE `t_imunisasaun`
  ADD PRIMARY KEY (`id_imunisasaun`),
  ADD KEY `id_pasiente` (`id_pasiente`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_doutor` (`id_doutor`),
  ADD KEY `id_periodo` (`id_periodo`);

--
-- Indexes for table `t_informsasaun`
--
ALTER TABLE `t_informsasaun`
  ADD PRIMARY KEY (`id_informasaun`);

--
-- Indexes for table `t_mun`
--
ALTER TABLE `t_mun`
  ADD PRIMARY KEY (`id_mun`);

--
-- Indexes for table `t_pasiente`
--
ALTER TABLE `t_pasiente`
  ADD PRIMARY KEY (`id_pasiente`),
  ADD KEY `id_aldeia` (`id_aldeia`);

--
-- Indexes for table `t_periodo`
--
ALTER TABLE `t_periodo`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indexes for table `t_postu`
--
ALTER TABLE `t_postu`
  ADD PRIMARY KEY (`id_postu`),
  ADD KEY `id_mun` (`id_mun`);

--
-- Indexes for table `t_suku`
--
ALTER TABLE `t_suku`
  ADD PRIMARY KEY (`id_suku`),
  ADD KEY `id_postu` (`id_postu`);

--
-- Indexes for table `t_tipu`
--
ALTER TABLE `t_tipu`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_doutor` (`id_doutor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_aldeia`
--
ALTER TABLE `t_aldeia`
  MODIFY `id_aldeia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_control`
--
ALTER TABLE `t_control`
  MODIFY `id_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_dose`
--
ALTER TABLE `t_dose`
  MODIFY `id_dose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `t_doutor`
--
ALTER TABLE `t_doutor`
  MODIFY `id_doutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_imunisasaun`
--
ALTER TABLE `t_imunisasaun`
  MODIFY `id_imunisasaun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_informsasaun`
--
ALTER TABLE `t_informsasaun`
  MODIFY `id_informasaun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_pasiente`
--
ALTER TABLE `t_pasiente`
  MODIFY `id_pasiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_periodo`
--
ALTER TABLE `t_periodo`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_postu`
--
ALTER TABLE `t_postu`
  MODIFY `id_postu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_suku`
--
ALTER TABLE `t_suku`
  MODIFY `id_suku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tipu`
--
ALTER TABLE `t_tipu`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_dose`
--
ALTER TABLE `t_dose`
  ADD CONSTRAINT `t_dose_ibfk_1` FOREIGN KEY (`id_imunisasaun`) REFERENCES `t_imunisasaun` (`id_imunisasaun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_doutor`
--
ALTER TABLE `t_doutor`
  ADD CONSTRAINT `t_doutor_ibfk_1` FOREIGN KEY (`id_aldeia`) REFERENCES `t_aldeia` (`id_aldeia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
