-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2023 pada 15.05
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptyongki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id_transaksi` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `total_harga` int(50) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_transaksi_total` varchar(50) NOT NULL,
  `bukti_transaksi` varchar(255) NOT NULL,
  `alamat_pengirim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id_transaksi`, `tanggal`, `keterangan`, `total_harga`, `jumlah_barang`, `id_user`, `id_produk`, `id_transaksi_total`, `bukti_transaksi`, `alamat_pengirim`) VALUES
(5, '2023-11-20', 'Pesanan dari toko online', 50000, 1, 1, 2, '655b62f101093', 'asset/img/9E76B3AB-C8C7-444F-9E75-D089625CCA2F.jpeg', 'jalan jalan'),
(6, '2023-11-20', 'Pesanan dari toko online', 78000, 2, 1, 4, '655b62f101093', '9E76B3AB-C8C7-444F-9E75-D089625CCA2F.jpeg', 'jalan jalan'),
(7, '2023-11-20', 'Pesanan dari toko online', 26000, 1, 1, 3, '655b63a10649c', '1(4).png', 'oke bang'),
(29, '2023-11-25', 'Pesanan dari toko online', 250000, 5, 17, 2, '6561f41124dd1', '891fb6463e4533d3ec1873fe84a7e403.jpg', 'jalan aja gak kemana mana tapi'),
(31, '2023-11-25', 'Pesanan dari toko online', 75000, 3, 1, 5, '6561f854686ea', 'asset/img/6-2-aston-martin-png-hd.png', 'yowiii'),
(32, '2023-11-25', 'Pesanan dari toko online', 75000, 3, 17, 5, '6561f90000fd0', 'dist/asset/img/5v7a23vten991.webp', 'apasi luu '),
(33, '2023-11-25', 'Pesanan dari toko online', 100000, 2, 17, 2, '6561f9a8dcc3b', 'dist/asset/img/6-2-aston-martin-png-hd.png', 'oke woiii'),
(34, '2023-11-20', 'Pesanan dari toko online', 50000, 1, 1, 2, '655b62f101093', 'asset/img/9E76B3AB-C8C7-444F-9E75-D089625CCA2F.jpeg', 'jalan jalan'),
(35, '2023-11-25', 'Pesanan dari toko online', 26000, 1, 17, 3, '6561fbb584456', 'asset/img/b5.png', 'jalan jalan'),
(36, '2023-11-25', 'Pesanan dari toko online', 75000, 3, 17, 5, '6561fd8031741', '../dist/asset/img/1658958601_386792_1658958709_noticia_normal.jpg', 'nih woy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contactus`
--

CREATE TABLE `contactus` (
  `id_cu` int(10) NOT NULL,
  `nama_cu` varchar(50) NOT NULL,
  `email_cu` varchar(50) NOT NULL,
  `subject_cu` text NOT NULL,
  `pesan_cu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contactus`
--

INSERT INTO `contactus` (`id_cu`, `nama_cu`, `email_cu`, `subject_cu`, `pesan_cu`) VALUES
(2, 'yoyow', 'yoyow123@gmail.com', 'besi', 'barang belum sampai pak dari kemaren saya sudah nunggu sampe gamakan minum ini\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop`
--

CREATE TABLE `shop` (
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `shop`
--

INSERT INTO `shop` (`id_produk`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `gambar_produk`, `stok`) VALUES
(2, 'ipin', 50000, '', '../dist/asset/img/0_Japan-Portraits-FIFA-World-Cup-Qatar-2022.jpg', 0),
(3, 'belatung', 26000, '', '../dist/asset/img/654249.png', 0),
(4, 'burung', 39000, '', '../dist/asset/img/272825_620.jpg', 0),
(5, 'besi', 25000, '', '../dist/asset/img/akenodaichi.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(11) NOT NULL DEFAULT 'user',
  `notelp` int(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `email`, `password`, `usertype`, `notelp`, `alamat`) VALUES
(1, 'anjay', 'admin', 'admin@gmail.com', 'rahasia', 'admin', 812315436, 'bekasi\r\n'),
(3, 'woiiya', 'ipin', 'ipin@gmail.com', 'ipin123', 'user', 812315436, 'kp.pengasinan bekasi'),
(17, 'yowis', 'yow', 'yow@gmail.com', '123', 'user', 8329013, 'jalan jalan enak kali ya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fkcheckout_users` (`id_user`),
  ADD KEY `fkcheckout_shop` (`id_produk`);

--
-- Indeks untuk tabel `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id_cu`);

--
-- Indeks untuk tabel `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id_cu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `shop`
--
ALTER TABLE `shop`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `fkcheckout_shop` FOREIGN KEY (`id_produk`) REFERENCES `shop` (`id_produk`),
  ADD CONSTRAINT `fkcheckout_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
