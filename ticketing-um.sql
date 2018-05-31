-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table db_ticket.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Uzzair Baharudin', 'uze@brillanteinsights.com', '$2y$10$ue66YK532VZbUy5wEoiNeOCgUwdHBgSomDT91Ol.3hKGVCPuN9mTy', '6n2pA4FNKNN1Ero7ZhSnQaC0aMEaGzJ3DTkoBuafh9MD3kDDrRt9UrflOzc8', '2018-05-30 18:10:36', '2018-05-31 17:48:45'),
	(2, 'Alfonso Johns', 'dach.erick@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'MJy2UNVcRORW9KwNwn7CMnNhjunAAFH0LWiM2XlzQacW7RX9Q3VZIDP94ycy', '2018-05-30 18:10:36', '2018-05-30 18:10:36'),
	(3, 'Rizal Tamin', 'rizal@brillanteinsights.com', '$2y$10$A/zrlKedvyfdgksldKPBKO6e131V6Yz3O.IPrlODNvk1R7V2rFJDy', NULL, '2018-05-31 17:47:28', '2018-05-31 17:47:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
