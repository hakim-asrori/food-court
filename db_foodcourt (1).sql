-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2021 pada 22.20
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_foodcourt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `telepon_pemesan` varchar(15) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `total_belanja` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_checkout`
--

INSERT INTO `tb_checkout` (`id_checkout`, `id_user`, `nama_pemesan`, `telepon_pemesan`, `alamat_pemesan`, `total_belanja`, `tgl_beli`, `status`) VALUES
(3, 6, 'Ahmad Badjuri', '083862169726', 'Jl Raya Pantura Losarang', '30000', '2021-05-14', 3),
(4, 6, 'Ahmad Badjuri', '083862169726', 'Jl Raya Pantura Losarang', '10000', '2021-05-14', 3),
(5, 6, 'Ahmad Badjuri', '083862169726', 'Jl Raya Pantura Losarang', '20000', '2021-05-14', 3),
(6, 6, 'Ahmad Badjuri', '083862169726', 'Jl Raya Pantura Losarang', '10000', '2021-05-15', 3),
(7, 6, 'Ahmad Badjuri', '083862169726', 'Jl Raya Pantura Losarang', '40000', '2021-05-16', 3),
(8, 6, 'Ahmad Badjuri', '083862169726', 'Jl Raya Pantura Losarang', '70000', '2021-05-21', 1),
(9, 7, 'C', '083862169726', 'Jl Raya Pantura Losarang', '10000', '2021-06-03', 3),
(10, 7, 'C', '083862169726', 'Jl Raya Pantura Losarang', '30000', '2021-06-03', 3),
(11, 8, 'asol', '123', 'Desa Puntang', '20000', '2021-06-03', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komplain`
--

CREATE TABLE `tb_komplain` (
  `id_komplain` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `tgl_komplain` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_komplain`
--

INSERT INTO `tb_komplain` (`id_komplain`, `id_user`, `id_checkout`, `tgl_komplain`, `foto`, `pesan`, `status`) VALUES
(11, 7, 10, '2021-06-03 06:02:54', 'd4d7ae299276b69db02d40c30064be97679948ff', 'as', 2),
(12, 8, 11, '2021-06-03 13:50:42', '1a653c4715b3497aad3343e3cf5d97db813793ae', 'Terlalu manis', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komplain_produk`
--

CREATE TABLE `tb_komplain_produk` (
  `id_komplain_produk` int(11) NOT NULL,
  `id_komplain` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_komplain_produk`
--

INSERT INTO `tb_komplain_produk` (`id_komplain_produk`, `id_komplain`, `id_produk`) VALUES
(13, 11, 13),
(14, 11, 14),
(15, 12, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `bank` varchar(50) NOT NULL,
  `tgl_upload` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_checkout` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_checkout`, `id_produk`, `jumlah`) VALUES
(3, 3, 14, 1),
(4, 3, 13, 1),
(5, 4, 15, 1),
(6, 5, 14, 1),
(7, 6, 15, 1),
(8, 7, 15, 1),
(9, 7, 13, 1),
(10, 7, 14, 1),
(11, 8, 15, 3),
(12, 8, 14, 2),
(13, 9, 13, 1),
(14, 10, 13, 1),
(15, 10, 14, 1),
(16, 11, 14, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama`, `slug`, `harga`, `rating`, `deskripsi`, `foto`) VALUES
(14, 'Buko Pandan', 'buko-pandan', 20000, 0, 'enak loh\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Minima quos aliquam quis quam. Sunt esse, vel sed nulla quos quo dolorum quae iste laudantium a hic mollitia, tempora reprehenderit eaque, dolores culpa molestias dolore optio, consectetur rem. Ullam pariatur suscipit molestias quam commodi et architecto error, mollitia? Quibusdam porro numquam facere! Nesciunt facere autem at voluptatem, iure iusto nulla saepe ipsum, alias fuga. Laborum numquam consequatur tenetur nam repellat placeat exercitationem incidunt iusto aperiam pariatur, neque officiis impedit rerum recusandae possimus iste nisi soluta dolorem. Quibusdam optio blanditiis culpa et illo corrupti nemo eveniet voluptates quidem. Officiis eveniet dolore numquam?', '561f41b4216a9e0a1c0940da4b68d8862bacf99b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'user'),
(88, 'kurir'),
(99, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_produk`
--

CREATE TABLE `tb_status_produk` (
  `id_status` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status_produk`
--

INSERT INTO `tb_status_produk` (`id_status`, `status`) VALUES
(1, 'Sedang di proses'),
(2, 'Sedang di proses'),
(3, 'Sudah Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `email`, `password`, `telepon`, `alamat`, `foto`, `id_role`) VALUES
(3, '', 'saneglos005@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MFNPVVdxZU83R1NVdnVaQQ$Rr1anJ2M65qr8vdFvnm8ykMkoQ4nZaZDtU0fqnrsnjA', '0', '', '', 99),
(5, '', 'admin@admin.com', '$argon2i$v=19$m=65536,t=4,p=1$ZS5Kemx3UXEyZ0o1SXdSaw$0hCeTqz5TvT8fh7q+JTfHsO+0+budEAJl/fQo3VyvWU', '0', '', '', 88),
(6, 'Hakim Asrori', 'a@a.com', '$argon2i$v=19$m=65536,t=4,p=1$R3VIRVRmS1N0bzcuQ3FkSw$JXRgpJELWB83NDfyidbVxma8fEvObtalTCrNZOc2Xxo', '083862169726', 'Jl Raya Pantura Losarang', '74a7b71d121f0e142e7159ab2a0ccad3749f1e61', 1),
(7, 'C', 'c@c.com', '$argon2i$v=19$m=65536,t=4,p=1$MU50UktmOVB0QlVhNFRsOQ$kPteWOTAR1VMLMBAEKdq8/RCRX1n/xxT3CqFcHxDlg0', '083862169726', 'Jl Raya Pantura Losarang', 'e2d3ea8d2c13561f0dcb619e5e96ae1137c22eae', 2),
(8, 'asep', 'coba@coba.com', '$argon2i$v=19$m=65536,t=4,p=1$Q2hueWpIUS4yLnlwd3ZYVw$93TsBPl+GfmemTY3gmrOjiGDHu7u52kGSOn3CVOnsUI', '123', 'Jakarta', 'c8ea067896e7d6b0878e3aeb86f80be495d01d0f', 2),
(9, '', '&amp;lt;script&amp;gt;alert(&amp;#039;hello&amp;#039;)&amp;lt;/script&amp;gt;', '$argon2i$v=19$m=65536,t=4,p=1$VXAuUFMybjZyY1lOSmtZYQ$apc4gkkXbF2AbrxCFlgiRNJS9W6zaPf4+/SPPkm2dJY', '', '', '', 2),
(10, '', 'hakim@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$U2xlci5tQTBvZHFyMVI0Tg$Qvj6xYRSBwjrYzYXS8c4XataJdhiYkUjbtZYeXtd4pA', '', '', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_komplain`
--
ALTER TABLE `tb_komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indeks untuk tabel `tb_komplain_produk`
--
ALTER TABLE `tb_komplain_produk`
  ADD PRIMARY KEY (`id_komplain_produk`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_checkout` (`id_checkout`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_status_produk`
--
ALTER TABLE `tb_status_produk`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_checkout`
--
ALTER TABLE `tb_checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_komplain`
--
ALTER TABLE `tb_komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_komplain_produk`
--
ALTER TABLE `tb_komplain_produk`
  MODIFY `id_komplain_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_status_produk`
--
ALTER TABLE `tb_status_produk`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
