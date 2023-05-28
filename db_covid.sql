-- Membuat tabel angka_penderita
CREATE TABLE `angka_penderita` (
  `id` float NOT NULL AUTO_INCREMENT,
  `country` varchar(25) NOT NULL,
  `total_case` varchar(25) NOT NULL,
  `total_death` varchar(25) NOT NULL,
  `total_recovered` varchar(25) NOT NULL,
  `active_case` varchar(25) NOT NULL,
  `total_test` varchar(25) NOT NULL,
  `population` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Mengisi tabel angka_penderita
insert into db_covid.angka_penderita (country, total_case, total_death, total_recovered, active_case, total_test, population)
values ('India', '44986461', '531832', '44446514', '8115', '929430169', '1406631776'),
	('Japan', '33803572', '74694', 'N/A', 'N/A', '100414883', '125584838'),
	('S.Korea', '31548083', '34687', '31198069', '315327', '15804065', '51329899'),
	('Turkey', '17232066', '102174', 'N/A', 'N/A', '162743369', '85561976'),
	('Vietnam', '11602738', '43203', '10635065', '924470', '85826548', '98953541'),
	('Taiwan', '10239998', '19005', '10220993', '0', '30742304', '23888595'),
	('Iran', '7611224', '146236', '7364870', '100118', '56596583', '860222837'),
	('Indonesia', '6802090', '161674', '6625209', '15207', '114158919', '279134505'),
	('Malaysia', '5088009', '37046', '5029873', '21090', '68352292', '33181072'),
	('Israel', '4824551', '12509', '4798473', '13569', '41373364', '9326000');

-- Alter primary key tabel angka_penderita
ALTER TABLE `angka_penderita`
ADD PRIMARY KEY (`id`);

-- Alter increment primary key tabel angka_penderita
ALTER TABLE `angka_penderita`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;