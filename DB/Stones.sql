-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Jun 2019 um 18:37
-- Server-Version: 10.1.35-MariaDB
-- PHP-Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `stones`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `product_producingTime` int(11) NOT NULL,
  `product_special` varchar(200) COLLATE utf8_bin NOT NULL,
  `product_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`product_id`, `pc_id`, `product_name`, `product_producingTime`, `product_special`, `product_image`, `product_status`, `price`) VALUES
                                                                                                                                                             (1, 3, 'Muffin Mix - Banana Nut', 4, 'China', 'https://robohash.org/quisquamtemporamagni.png?size=100x100&set=set1', 0, '2.20'),
                                                                                                                                                             (2, 1, 'Island Oasis - Sweet And Sour Mix', 7, 'Indonesia', 'https://robohash.org/voluptatemaliasest.png?size=100x100&set=set1', 0, '4.20'),
                                                                                                                                                             (3, 2, 'Carbonated Water - Orange', 3, 'Burkina Faso', 'https://robohash.org/iuretemporaconsectetur.png?size=100x100&set=set1', 0, '3.55'),
                                                                                                                                                             (4, 1, 'Mushroom Morel Fresh', 10, 'Peru', 'https://robohash.org/doloremlaudantiumsunt.png?size=100x100&set=set1', 0, '4.00'),
                                                                                                                                                             (5, 1, 'Tuna - Canned, Flaked, Light', 7, 'Indonesia', 'https://robohash.org/occaecatietet.png?size=100x100&set=set1', 1, '1.35'),
                                                                                                                                                             (6, 3, 'Octopus - Baby, Cleaned', 4, 'China', 'https://robohash.org/sitasperioresodio.png?size=100x100&set=set1', 1, '3.95'),
                                                                                                                                                             (7, 2, 'Fish - Bones', 7, 'Slovenia', 'https://robohash.org/autemquisnulla.png?size=100x100&set=set1', 1, '1.55'),
                                                                                                                                                             (8, 3, 'Oil - Avocado', 7, 'China', 'https://robohash.org/exveronihil.png?size=100x100&set=set1', 0, '1.60'),
                                                                                                                                                             (9, 1, 'Compound - Pear', 2, 'Philippines', 'https://robohash.org/rationecupiditatecorporis.png?size=100x100&set=set1', 0, '2.85'),
                                                                                                                                                             (10, 1, 'Wasabi Paste', 3, 'China', 'https://robohash.org/adipiscitemporasequi.png?size=100x100&set=set1', 0, '3.10'),
                                                                                                                                                             (11, 1, 'C - Plus, Orange', 1, 'Sweden', 'https://robohash.org/animireiciendissimilique.png?size=100x100&set=set1', 0, '1.95'),
                                                                                                                                                             (12, 3, 'Flour - All Purpose', 2, 'China', 'https://robohash.org/optioquasidicta.png?size=100x100&set=set1', 1, '0.20'),
                                                                                                                                                             (13, 2, 'Mints - Striped Red', 1, 'China', 'https://robohash.org/aliquidcumamet.png?size=100x100&set=set1', 1, '2.10'),
                                                                                                                                                             (14, 3, 'Tart Shells - Sweet, 2', 2, 'Sri Lanka', 'https://robohash.org/voluptatemducimusquis.png?size=100x100&set=set1', 1, '2.45'),
                                                                                                                                                             (15, 3, 'Doilies - 12, Paper', 10, 'Croatia', 'https://robohash.org/quiavoluptasin.png?size=100x100&set=set1', 1, '4.60'),
                                                                                                                                                             (16, 3, 'Pasta - Shells, Medium, Dry', 10, 'Portugal', 'https://robohash.org/seddoloremet.png?size=100x100&set=set1', 1, '3.00'),
                                                                                                                                                             (17, 1, 'Onions - Pearl', 2, 'Sweden', 'https://robohash.org/etdolorummaxime.png?size=100x100&set=set1', 1, '1.00'),
                                                                                                                                                             (18, 3, 'Wine - Domaine Boyar Royal', 3, 'Ireland', 'https://robohash.org/utquasofficia.png?size=100x100&set=set1', 0, '2.35'),
                                                                                                                                                             (19, 3, 'Wine - Redchard Merritt', 5, 'China', 'https://robohash.org/modiexcepturialias.png?size=100x100&set=set1', 1, '3.45'),
                                                                                                                                                             (20, 3, 'Parsley - Fresh', 6, 'Philippines', 'https://robohash.org/anihilquaerat.png?size=100x100&set=set1', 0, '2.85'),
                                                                                                                                                             (21, 2, 'Ice Cream - Vanilla', 3, 'Portugal', 'https://robohash.org/etutrecusandae.png?size=100x100&set=set1', 1, '3.15'),
                                                                                                                                                             (22, 1, 'Pickerel - Fillets', 10, 'China', 'https://robohash.org/fugiatreiciendisquidem.png?size=100x100&set=set1', 0, '1.55'),
                                                                                                                                                             (23, 3, 'Steampan - Half Size Shallow', 1, 'Norway', 'https://robohash.org/aspernatureosvoluptates.png?size=100x100&set=set1', 1, '1.00'),
                                                                                                                                                             (24, 3, 'Quiche Assorted', 5, 'United States', 'https://robohash.org/corporisdolorenemo.png?size=100x100&set=set1', 1, '2.00'),
                                                                                                                                                             (25, 3, 'Soup - Campbells Beef Noodle', 6, 'Portugal', 'https://robohash.org/voluptasimpeditfugit.png?size=100x100&set=set1', 0, '3.00'),
                                                                                                                                                             (26, 2, 'Dill - Primerba, Paste', 5, 'United States', 'https://robohash.org/autquiet.png?size=100x100&set=set1', 0, '1.80'),
                                                                                                                                                             (27, 3, 'Crawfish', 9, 'Argentina', 'https://robohash.org/verooccaecatidolores.png?size=100x100&set=set1', 0, '3.50'),
                                                                                                                                                             (28, 1, 'Gooseberry', 10, 'Democratic Republic of the Congo', 'https://robohash.org/voluptateconsequatureligendi.png?size=100x100&set=set1', 1, '1.20'),
                                                                                                                                                             (29, 3, 'Sauce - Soy Low Sodium - 3.87l', 7, 'Indonesia', 'https://robohash.org/commodivoluptatibushic.png?size=100x100&set=set1', 0, '2.95'),
                                                                                                                                                             (30, 1, 'Sprouts - Alfalfa', 2, 'Honduras', 'https://robohash.org/etveniamquibusdam.png?size=100x100&set=set1', 1, '3.10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `productcategory`
--

CREATE TABLE `productcategory` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `productcategory`
--

INSERT INTO `productcategory` (`pc_id`, `pc_name`) VALUES
                                                          (1, 'Drink'),
                                                          (2, 'Soup'),
                                                          (3, 'Tostie');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `productspurchased`
--

CREATE TABLE `productspurchased` (
  `pp_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `productspurchased`
--

INSERT INTO `productspurchased` (`pp_id`, `product_id`, `purchase_id`) VALUES
                                                                              (1, 14, 23),
                                                                              (2, 2, 26),
                                                                              (3, 11, 20),
                                                                              (4, 23, 7),
                                                                              (5, 20, 3),
                                                                              (6, 5, 10),
                                                                              (7, 16, 1),
                                                                              (8, 18, 6),
                                                                              (9, 13, 7),
                                                                              (10, 29, 22),
                                                                              (11, 11, 27),
                                                                              (12, 4, 12),
                                                                              (13, 27, 7),
                                                                              (14, 15, 25),
                                                                              (15, 16, 30),
                                                                              (16, 1, 8),
                                                                              (17, 1, 21),
                                                                              (18, 29, 19),
                                                                              (19, 30, 13),
                                                                              (20, 25, 19),
                                                                              (21, 27, 26),
                                                                              (22, 18, 15),
                                                                              (23, 26, 1),
                                                                              (24, 28, 15),
                                                                              (25, 19, 2),
                                                                              (26, 4, 5),
                                                                              (27, 17, 2),
                                                                              (28, 8, 18),
                                                                              (29, 26, 28),
                                                                              (30, 6, 24),
                                                                              (31, 3, 26),
                                                                              (32, 8, 7),
                                                                              (33, 17, 5),
                                                                              (34, 6, 8),
                                                                              (35, 1, 5),
                                                                              (36, 27, 20),
                                                                              (37, 24, 21),
                                                                              (38, 24, 19),
                                                                              (39, 10, 20),
                                                                              (40, 24, 30),
                                                                              (41, 16, 30),
                                                                              (42, 30, 12),
                                                                              (43, 29, 4),
                                                                              (44, 20, 22),
                                                                              (45, 8, 26),
                                                                              (46, 17, 27),
                                                                              (47, 29, 3),
                                                                              (48, 30, 25),
                                                                              (49, 24, 8),
                                                                              (50, 26, 18),
                                                                              (51, 8, 6),
                                                                              (52, 19, 16),
                                                                              (53, 24, 28),
                                                                              (54, 29, 19),
                                                                              (55, 4, 3),
                                                                              (56, 17, 25),
                                                                              (57, 20, 13),
                                                                              (58, 5, 14),
                                                                              (59, 12, 1),
                                                                              (60, 27, 9),
                                                                              (61, 28, 4),
                                                                              (62, 26, 14),
                                                                              (63, 21, 7),
                                                                              (64, 23, 22),
                                                                              (65, 12, 26),
                                                                              (66, 19, 26),
                                                                              (67, 21, 30),
                                                                              (68, 24, 12),
                                                                              (69, 2, 25),
                                                                              (70, 22, 28),
                                                                              (71, 6, 22),
                                                                              (72, 28, 20),
                                                                              (73, 13, 24),
                                                                              (74, 25, 28),
                                                                              (75, 17, 4),
                                                                              (76, 1, 1),
                                                                              (77, 26, 17),
                                                                              (78, 29, 10),
                                                                              (79, 2, 15),
                                                                              (80, 13, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_verificationNumber` int(11) NOT NULL,
  `purchase_status` enum('pending','in_process','ready','picked_up') COLLATE utf8_bin NOT NULL,
  `purchase_isPaid` tinyint(1) NOT NULL,
  `purchase_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_verificationNumber`, `purchase_status`, `purchase_isPaid`, `purchase_date`) VALUES
                                                                                                                                    (1, 449, 'in_process', 1, '2018-09-10 18:06:54'),
                                                                                                                                    (2, 801, 'pending', 0, '2018-10-30 15:23:50'),
                                                                                                                                    (3, 254, 'ready', 1, '2019-06-22 09:23:13'),
                                                                                                                                    (4, 843, 'pending', 0, '2018-09-25 04:59:30'),
                                                                                                                                    (5, 257, 'pending', 1, '2018-05-27 18:22:57'),
                                                                                                                                    (6, 517, 'ready', 1, '2018-08-12 12:56:51'),
                                                                                                                                    (7, 876, 'pending', 0, '2018-07-06 19:00:15'),
                                                                                                                                    (8, 755, 'ready', 0, '2019-07-17 23:22:01'),
                                                                                                                                    (9, 337, 'pending', 1, '2019-05-21 03:08:18'),
                                                                                                                                    (10, 893, 'picked_up', 0, '2018-10-30 17:49:20'),
                                                                                                                                    (11, 684, 'ready', 1, '2019-05-20 21:05:35'),
                                                                                                                                    (12, 786, 'in_process', 1, '2019-03-22 05:14:09'),
                                                                                                                                    (13, 749, 'picked_up', 1, '2019-05-10 06:26:42'),
                                                                                                                                    (14, 162, 'ready', 1, '2019-04-29 05:39:09'),
                                                                                                                                    (15, 136, 'in_process', 1, '2019-06-28 21:40:21'),
                                                                                                                                    (16, 244, 'ready', 0, '2019-04-22 01:58:52'),
                                                                                                                                    (17, 112, 'ready', 0, '2019-05-08 21:49:05'),
                                                                                                                                    (18, 779, 'in_process', 0, '2018-05-15 11:02:31'),
                                                                                                                                    (19, 489, 'picked_up', 1, '2018-10-12 07:19:28'),
                                                                                                                                    (20, 421, 'ready', 1, '2018-10-01 10:54:28'),
                                                                                                                                    (21, 338, 'pending', 0, '2018-11-16 05:33:05'),
                                                                                                                                    (22, 502, 'pending', 1, '2018-11-13 08:15:19'),
                                                                                                                                    (23, 107, 'ready', 1, '2019-03-22 05:35:02'),
                                                                                                                                    (24, 737, 'ready', 0, '2019-06-21 02:27:44'),
                                                                                                                                    (25, 245, 'pending', 0, '2019-06-27 14:42:55'),
                                                                                                                                    (26, 149, 'ready', 0, '2019-05-03 23:44:00'),
                                                                                                                                    (27, 760, 'ready', 1, '2018-05-31 13:25:54'),
                                                                                                                                    (28, 342, 'pending', 0, '2018-08-31 21:44:54'),
                                                                                                                                    (29, 539, 'ready', 1, '2018-06-03 07:43:18'),
                                                                                                                                    (30, 419, 'in_process', 1, '2019-06-19 12:59:50');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `settings`
--

CREATE TABLE `settings` (
  `settingsId` int(11) NOT NULL,
  `openingHours` time NOT NULL DEFAULT '00:00:09',
  `closingHours` time NOT NULL DEFAULT '00:00:16',
  `emergencyStop` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `settings`
--

INSERT INTO `settings` (`settingsId`, `openingHours`, `closingHours`, `emergencyStop`) VALUES
                                                                                              (1, '09:30:00', '17:30:00', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_type` enum('admin','staff') COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `user_type`) VALUES
                                                                             (1, 'Aloïs', 'I3ZAlHA', 'admin'),
                                                                             (2, 'Marylène', '2JRyFT0DKtCc', 'admin'),
                                                                             (3, 'Vérane', 'aoaeRwmfra2f', 'staff'),
                                                                             (4, 'Léana', 'SEmfVr5mBF4r', 'staff'),
                                                                             (5, 'Hélèna', 'EPPuVg', 'admin'),
                                                                             (6, 'Régine', 'n5cPHCo4B18O', 'admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Product_fk0` (`pc_id`);

--
-- Indizes für die Tabelle `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indizes für die Tabelle `productspurchased`
--
ALTER TABLE `productspurchased`
  ADD PRIMARY KEY (`pp_id`),
  ADD KEY `ProductsPurchased_fk0` (`product_id`),
  ADD KEY `ProductsPurchased_fk1` (`purchase_id`);

--
-- Indizes für die Tabelle `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indizes für die Tabelle `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settingsId`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT für Tabelle `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `productspurchased`
--
ALTER TABLE `productspurchased`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT für Tabelle `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT für Tabelle `settings`
--
ALTER TABLE `settings`
  MODIFY `settingsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Product_fk0` FOREIGN KEY (`pc_id`) REFERENCES `productcategory` (`pc_id`);

--
-- Constraints der Tabelle `productspurchased`
--
ALTER TABLE `productspurchased`
  ADD CONSTRAINT `ProductsPurchased_fk0` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `ProductsPurchased_fk1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`purchase_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
