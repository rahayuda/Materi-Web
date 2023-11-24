CREATE TABLE kategori
(
  id_kategori INT NOT NULL AUTO_INCREMENT,
  nama_kategori VARCHAR(255) NOT NULL,
  PRIMARY KEY (id_kategori)
);

CREATE TABLE pesanan
(
  id_pesanan INT NOT NULL AUTO_INCREMENT,
  tanggal_pesanan DATE NOT NULL,
  PRIMARY KEY (id_pesanan)
);

CREATE TABLE produk
(
  id_produk INT NOT NULL AUTO_INCREMENT,
  nama_produk VARCHAR(255) NOT NULL,
  harga INT NOT NULL,
  gambar VARCHAR(255) NOT NULL,
  id_kategori INT NOT NULL,
  PRIMARY KEY (id_produk),
  FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori) ON DELETE CASCADE
);

CREATE TABLE detailpesanan
(
  id_detailpesanan INT NOT NULL AUTO_INCREMENT,
  jumlah INT NOT NULL,
  id_produk INT NOT NULL,
  id_pesanan INT NOT NULL,
  PRIMARY KEY (id_detailpesanan),
  FOREIGN KEY (id_produk) REFERENCES produk(id_produk) ON DELETE CASCADE,
  FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan) ON DELETE CASCADE
);

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Elektronik'),
(2, 'Pakaian'),
(3, 'Alat Rumah Tangga'),
(4, 'Olahraga'),
(5, 'Kesehatan'),
(6, 'Mainan'),
(7, 'Buku'),
(8, 'Makanan'),
(9, 'Minuman'),
(10, 'Kecantikan');

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`, `gambar`) VALUES
(1, 'Laptop', 1, 15000000, 'laptop.png'),
(2, 'T-shirt', 2, 300000, 't-shirt.png'),
(3, 'Blender', 3, 1000000, 'blender.png'),
(4, 'Sepatu Lari', 4, 500000, 'sepatulari.png'),
(5, 'Vitamin C', 5, 40000, 'vitaminc.png'),
(6, 'Action Figure', 6, 700000, 'actionfigure.png'),
(7, 'Novel', 7, 250000, 'novel.png'),
(8, 'Snack', 8, 10000, 'snack.png'),
(9, 'Mineral Water', 9, 4000, 'mineralwat.png'),
(10, 'Lipstick', 10, 100000, 'lipstick.png');

INSERT INTO `pesanan` (`id_pesanan`, `tanggal_pesanan`) VALUES
(1, '2023-01-01'),
(2, '2023-01-02'),
(3, '2023-01-03'),
(4, '2023-01-04'),
(5, '2023-01-05'),
(6, '2023-01-06'),
(7, '2023-01-07'),
(8, '2023-01-08'),
(9, '2023-01-09'),
(10, '2023-01-10');

INSERT INTO `detailpesanan` (`id_detailpesanan`, `jumlah`, `id_produk`, `id_pesanan`) VALUES
(1, 2, 1, 1),
(2, 5, 2, 1),
(3, 1, 3, 2),
(4, 3, 1, 3),
(5, 4, 5, 4),
(6, 1, 6, 5),
(7, 2, 7, 6),
(8, 1, 8, 7),
(9, 3, 9, 8),
(10, 1, 10, 9);
