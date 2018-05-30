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

-- Dumping data for table db_ticket.applications: ~4 rows (approximately)
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'EPROC', '2018-05-30 18:15:02', '2018-05-30 18:15:02'),
	(2, 'Sistem Booking', '2018-05-30 18:15:02', '2018-05-30 18:15:02'),
	(3, 'E-kemajuan', '2018-05-30 18:15:02', '2018-05-30 18:15:02'),
	(4, 'E-KESELAMATAN', '2018-05-30 18:15:02', '2018-05-30 18:15:02');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;

-- Dumping data for table db_ticket.departments: ~6 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Bahagian Akaun Dan Pelaburan', 'akaun@um.com', '2018-05-30 18:15:24', '2018-05-30 18:15:24'),
	(2, 'Bahagian Pembayaran Dan Perbelanjaan', 'bayar@um.com', '2018-05-30 18:15:24', '2018-05-30 18:15:24'),
	(3, 'Bahagian Pengurusan Pembayaran Kewangan Dan Staf', 'urusakaun@um.com', '2018-05-30 18:15:24', '2018-05-30 18:15:24'),
	(4, 'Bahagian Belanjawan Dan Kewangan Korporat', 'belanjawan@um.com', '2018-05-30 18:15:24', '2018-05-30 18:15:24'),
	(5, 'Bahagian Perolehan', 'oleh@um.com', '2018-05-30 18:15:24', '2018-05-30 18:15:24'),
	(6, 'Unit Pentadbiran Dan Kewangan Am', 'tadbir@um.com', '2018-05-30 18:15:24', '2018-05-30 18:15:24');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping data for table db_ticket.department_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `department_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `department_user` ENABLE KEYS */;

-- Dumping data for table db_ticket.linked_social_accounts: ~0 rows (approximately)
/*!40000 ALTER TABLE `linked_social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `linked_social_accounts` ENABLE KEYS */;

-- Dumping data for table db_ticket.migrations: ~27 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(28, '2014_10_12_000000_create_users_table', 1),
	(29, '2014_10_12_100000_create_password_resets_table', 1),
	(30, '2018_04_12_142435_prepare_users_table_for_social_authentication', 1),
	(31, '2018_04_12_142527_create_linked_social_accounts_table', 1),
	(32, '2018_04_16_130049_create_permission_tables', 1),
	(33, '2018_04_17_083355_create_saps_table', 1),
	(34, '2018_04_18_164918_create_departments_table', 1),
	(35, '2018_04_19_043221_create_profiles_table', 1),
	(36, '2018_04_19_075736_create_department_user_table', 1),
	(37, '2018_04_19_102753_create_sap_user_table', 1),
	(38, '2018_04_20_011007_create_tickets_table', 1),
	(39, '2018_04_20_030137_modify_tickets_table', 1),
	(40, '2018_04_20_070421_create_t_attachments_table', 1),
	(41, '2018_04_23_104631_create_applications_table', 1),
	(42, '2018_04_23_233818_add_integration_application_id', 1),
	(43, '2018_04_24_043407_add_recurring_ticket_id', 1),
	(44, '2018_04_24_073447_add_ticket_number_to_tickets', 1),
	(45, '2018_04_24_145713_add_draft_column_to_tickets', 1),
	(46, '2018_04_24_223231_create_replies_table', 1),
	(47, '2018_04_24_224540_add_ticket_id_to_replies', 1),
	(48, '2018_04_25_093548_create_ticket_user_table', 1),
	(49, '2018_04_25_232910_add_hod_id_to_dept', 1),
	(50, '2018_05_03_225918_add_dates_to_tickets', 1),
	(51, '2018_05_04_002620_add_submitted_dates_to_tickets', 1),
	(52, '2018_05_04_112822_adding_readby_dates_to_tickets', 1),
	(53, '2018_05_28_131713_create_notifications_table', 1),
	(54, '2018_05_30_072444_add_assigned_date_to_tickets', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table db_ticket.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping data for table db_ticket.model_has_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 1),
	(2, 'App\\User', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping data for table db_ticket.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table db_ticket.permissions: ~28 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_users', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(2, 'add_users', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(3, 'edit_users', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(4, 'delete_users', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(5, 'view_roles', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(6, 'add_roles', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(7, 'edit_roles', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(8, 'delete_roles', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(9, 'view_saps', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(10, 'add_saps', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(11, 'edit_saps', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(12, 'delete_saps', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(13, 'view_departments', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(14, 'add_departments', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(15, 'edit_departments', 'web', '2018-05-30 18:10:29', '2018-05-30 18:10:29'),
	(16, 'delete_departments', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(17, 'view_tickets', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(18, 'add_tickets', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(19, 'edit_tickets', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(20, 'delete_tickets', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(21, 'view_applications', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(22, 'add_applications', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(23, 'edit_applications', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(24, 'delete_applications', 'web', '2018-05-30 18:10:30', '2018-05-30 18:10:30'),
	(25, 'view_profiles', 'web', '2018-05-30 18:12:10', '2018-05-30 18:12:10'),
	(26, 'add_profiles', 'web', '2018-05-30 18:12:10', '2018-05-30 18:12:10'),
	(27, 'edit_profiles', 'web', '2018-05-30 18:12:10', '2018-05-30 18:12:10'),
	(28, 'delete_profiles', 'web', '2018-05-30 18:12:10', '2018-05-30 18:12:10');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping data for table db_ticket.profiles: ~2 rows (approximately)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `user_id`, `avatar`, `created_at`, `updated_at`, `hod_id`) VALUES
	(1, 1, 'uploads/avatars/avatar1.jpg', '2018-05-30 18:10:37', '2018-05-30 18:10:37', NULL),
	(2, 2, 'uploads/avatars/avatar2.jpg', '2018-05-30 18:10:37', '2018-05-30 18:10:37', NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;

-- Dumping data for table db_ticket.roles: ~6 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2018-05-30 18:10:34', '2018-05-30 18:10:34'),
	(2, 'User', 'web', '2018-05-30 18:10:36', '2018-05-30 18:10:36'),
	(3, 'HOD', 'web', '2018-05-30 18:13:12', '2018-05-30 18:13:12'),
	(4, 'Dasar', 'web', '2018-05-30 18:13:18', '2018-05-30 18:13:18'),
	(5, 'PTM', 'web', '2018-05-30 18:13:22', '2018-05-30 18:13:22'),
	(6, 'Brillante', 'web', '2018-05-30 18:13:27', '2018-05-30 18:13:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping data for table db_ticket.role_has_permissions: ~69 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(3, 2),
	(7, 2),
	(11, 2),
	(15, 2),
	(17, 2),
	(18, 2),
	(19, 2),
	(23, 2),
	(27, 2),
	(3, 3),
	(7, 3),
	(11, 3),
	(15, 3),
	(17, 3),
	(19, 3),
	(23, 3),
	(27, 3),
	(3, 4),
	(7, 4),
	(11, 4),
	(15, 4),
	(17, 4),
	(19, 4),
	(23, 4),
	(27, 4),
	(3, 5),
	(7, 5),
	(11, 5),
	(15, 5),
	(17, 5),
	(19, 5),
	(23, 5),
	(27, 5),
	(3, 6),
	(7, 6),
	(11, 6),
	(15, 6),
	(17, 6),
	(19, 6),
	(23, 6),
	(27, 6);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping data for table db_ticket.saps: ~9 rows (approximately)
/*!40000 ALTER TABLE `saps` DISABLE KEYS */;
INSERT INTO `saps` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'General Ledger', 'GL', '2018-05-30 18:15:37', '2018-05-30 18:15:37'),
	(2, 'Asset Accounting', 'AA', '2018-05-30 18:15:37', '2018-05-30 18:15:37'),
	(3, 'Treasury And Risk Management', 'TR', '2018-05-30 18:15:37', '2018-05-30 18:15:37'),
	(4, 'Accounts Payable', 'AP', '2018-05-30 18:15:37', '2018-05-30 18:15:37'),
	(5, 'Human Capital Management', 'HR', '2018-05-30 18:15:37', '2018-05-30 18:15:37'),
	(6, 'Funds Management', 'FM', '2018-05-30 18:15:37', '2018-05-30 18:15:37'),
	(7, 'Material Management', 'MM', '2018-05-30 18:15:37', '2018-05-30 18:15:37'),
	(8, 'Gst-related', 'GS', '2018-05-30 18:15:37', '2018-05-30 18:15:37'),
	(9, 'Basis', 'BS', '2018-05-30 18:15:37', '2018-05-30 18:15:37');
/*!40000 ALTER TABLE `saps` ENABLE KEYS */;

-- Dumping data for table db_ticket.sap_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `sap_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `sap_user` ENABLE KEYS */;

-- Dumping data for table db_ticket.t_attachments: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_attachments` ENABLE KEYS */;

-- Dumping data for table db_ticket.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Mark Johns V', 'audie85@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'e1FnnPver1KVShRNtbiJ5ZSAQJClz6xhV07ZXSxOGcrgBmONo7KXL2ffV4Wp', '2018-05-30 18:10:36', '2018-05-30 18:10:36'),
	(2, 'Alfonso Johns', 'dach.erick@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'MJy2UNVcRORW9KwNwn7CMnNhjunAAFH0LWiM2XlzQacW7RX9Q3VZIDP94ycy', '2018-05-30 18:10:36', '2018-05-30 18:10:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
