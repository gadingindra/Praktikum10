-- Membuat tabel barang
CREATE TABLE `tb_barang` (
`id_barang` int(11) NOT NULL,
`barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Mengisi tabel barang
INSERT INTO `tb_barang` (`id_barang`, `barang`) VALUES
(1, 'Redmi Note 7'),
(2, 'Samsung M20'),
(3, 'Realme 3'),
(4, 'Iphone X');
-- Alter dan increment primary key tabel barang
ALTER TABLE `tb_barang`
ADD PRIMARY KEY (`id_barang`);

ALTER TABLE `tb_barang`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


-- Membuat tabel penjualan
CREATE TABLE `tb_penjualan` (
`id_penjualan` int(11) NOT NULL,
`id_barang` int(11) NOT NULL,
`jumlah` int(11) NOT NULL,
`tgl_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Mengisi tabel penjualan
INSERT INTO `tb_penjualan` (`id_penjualan`, `id_barang`, `jumlah`, `tgl_penjualan`) VALUES
(1, 1, 5, '2019-01-11'),
(2, 3, 3, '2019-01-04'),
(3, 2, 4, '2019-02-11'),
(4, 2, 3, '2019-03-09'),
(5, 3, 4, '2019-04-10'),
(6, 4, 1, '2019-05-11'),
(7, 1, 2, '2019-05-05'),
(8, 4, 7, '2019-06-09'),
(9, 3, 2, '2019-06-11'),
(10, 2, 5, '2019-07-11'),
(11, 1, 2, '2019-07-12');
-- Alter dan increment primary key tabel penjualan
ALTER TABLE `tb_penjualan`
ADD PRIMARY KEY (`id_penjualan`);

ALTER TABLE `tb_penjualan`
MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;