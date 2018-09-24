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

-- Dumping structure for table db_umvisa.applicationattachments
CREATE TABLE IF NOT EXISTS `applicationattachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` int(10) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applicationattachments_application_id_foreign` (`application_id`),
  CONSTRAINT `applicationattachments_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.applicationattachments: ~0 rows (approximately)
/*!40000 ALTER TABLE `applicationattachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `applicationattachments` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.applications
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_aid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others_remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faculty_acc_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grant_acc_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `travel_start_date` date NOT NULL,
  `travel_end_date` date NOT NULL,
  `alternate_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `applications_user_id_foreign` (`user_id`),
  CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.applications: ~1 rows (approximately)
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` (`id`, `user_id`, `title`, `venue`, `country`, `financial_aid`, `account_no_ref`, `sponsor_name`, `others_remarks`, `created_at`, `updated_at`, `faculty_acc_no`, `grant_acc_no`, `state`, `description`, `event_start_date`, `event_end_date`, `travel_start_date`, `travel_end_date`, `alternate_email`, `type`) VALUES
	(3, 2, 'josdjais', 'asdasd', 'Ashmore and Cartier Is.', '', '', '', '', '2018-09-24 23:02:53', '2018-09-24 23:02:53', NULL, NULL, 'jasdaspdka', 'aosjdaiosjdaosd', '2018-10-22', '2018-10-24', '2018-10-17', '2018-10-25', NULL, 'faculty');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint(20) unsigned NOT NULL,
  `creator_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  KEY `comments_creator_type_creator_id_index` (`creator_type`,`creator_id`),
  KEY `comments__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.comments: ~1 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `title`, `body`, `commentable_type`, `commentable_id`, `creator_type`, `creator_id`, `_lft`, `_rgt`, `parent_id`, `created_at`, `updated_at`) VALUES
	(1, 'Late Submission', 'We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than 21 days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.', 'Modules\\Application\\Entities\\Application', 1, 'App\\User', 1, 1, 2, NULL, '2018-09-24 22:56:12', '2018-09-24 22:56:12'),
	(2, 'Late Submission', 'We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than 21 days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.', 'Modules\\Application\\Entities\\Application', 2, 'App\\User', 1, 3, 4, NULL, '2018-09-24 23:01:17', '2018-09-24 23:01:17'),
	(3, 'Late Submission', 'We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than 21 days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.', 'Modules\\Application\\Entities\\Application', 3, 'App\\User', 1, 5, 6, NULL, '2018-09-24 23:02:53', '2018-09-24 23:02:53');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.financialaids
CREATE TABLE IF NOT EXISTS `financialaids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `financialinstrument_id` int(10) unsigned NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `financialaids_application_id_foreign` (`application_id`),
  KEY `financialaids_financialinstrument_id_foreign` (`financialinstrument_id`),
  CONSTRAINT `financialaids_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  CONSTRAINT `financialaids_financialinstrument_id_foreign` FOREIGN KEY (`financialinstrument_id`) REFERENCES `financialinstruments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.financialaids: ~0 rows (approximately)
/*!40000 ALTER TABLE `financialaids` DISABLE KEYS */;
/*!40000 ALTER TABLE `financialaids` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.financialinstruments
CREATE TABLE IF NOT EXISTS `financialinstruments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.financialinstruments: ~0 rows (approximately)
/*!40000 ALTER TABLE `financialinstruments` DISABLE KEYS */;
/*!40000 ALTER TABLE `financialinstruments` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.linked_social_accounts
CREATE TABLE IF NOT EXISTS `linked_social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `linked_social_accounts_provider_id_unique` (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.linked_social_accounts: ~0 rows (approximately)
/*!40000 ALTER TABLE `linked_social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `linked_social_accounts` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.migrations: ~26 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_04_12_142435_prepare_users_table_for_social_authentication', 1),
	(4, '2018_04_12_142527_create_linked_social_accounts_table', 1),
	(5, '2018_04_16_130049_create_permission_tables', 1),
	(6, '2018_04_19_043221_create_profiles_table', 1),
	(7, '2018_07_04_115504_create_statuses_table', 1),
	(8, '2018_07_10_171319_create_applications_table', 1),
	(9, '2018_07_11_101816_add_columns_to_profile', 1),
	(10, '2018_07_12_142626_create_applicationattachments_table', 1),
	(11, '2018_07_12_144126_create_comments_table', 1),
	(12, '2018_07_15_122508_add_supervisor_column_to_users', 1),
	(13, '2018_07_16_153754_add_supervisor_column_to_profiles', 1),
	(14, '2018_07_17_002540_add_columns_to_applications', 1),
	(15, '2018_08_01_155231_add_financialaids_table', 1),
	(16, '2018_08_01_160543_add_financialinstruments_table', 1),
	(17, '2018_08_01_161018_add_financialinstruments_foreign_table', 1),
	(18, '2018_08_13_184725_create_participants_table', 1),
	(19, '2018_09_24_110518_create_notifications_table', 2),
	(20, '2018_09_24_223909_add_state_column', 3),
	(21, '2018_09_24_224216_add_description_column', 4),
	(22, '2018_09_24_224731_drop_dates_column', 5),
	(23, '2018_09_24_224946_add_dates_column', 6),
	(24, '2018_09_24_225258_add_alternateEmail_column', 7),
	(25, '2018_09_24_225518_add_type_column', 8),
	(26, '2018_09_24_225937_modifying_matricnum_column', 9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.model_has_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 1),
	(2, 'App\\User', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.participants
CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` int(10) unsigned NOT NULL,
  `matric_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participants_application_id_foreign` (`application_id`),
  CONSTRAINT `participants_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.participants: ~0 rows (approximately)
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` (`id`, `application_id`, `matric_num`, `created_at`, `updated_at`) VALUES
	(2, 3, NULL, '2018-09-24 23:02:53', '2018-09-24 23:02:53');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.permissions: ~28 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_users', 'web', '2018-09-24 11:01:08', '2018-09-24 11:01:08'),
	(2, 'add_users', 'web', '2018-09-24 11:01:08', '2018-09-24 11:01:08'),
	(3, 'edit_users', 'web', '2018-09-24 11:01:08', '2018-09-24 11:01:08'),
	(4, 'delete_users', 'web', '2018-09-24 11:01:08', '2018-09-24 11:01:08'),
	(5, 'view_roles', 'web', '2018-09-24 11:01:08', '2018-09-24 11:01:08'),
	(6, 'add_roles', 'web', '2018-09-24 11:01:08', '2018-09-24 11:01:08'),
	(7, 'edit_roles', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(8, 'delete_roles', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(9, 'view_saps', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(10, 'add_saps', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(11, 'edit_saps', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(12, 'delete_saps', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(13, 'view_departments', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(14, 'add_departments', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(15, 'edit_departments', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(16, 'delete_departments', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(17, 'view_tickets', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(18, 'add_tickets', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(19, 'edit_tickets', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(20, 'delete_tickets', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(21, 'view_applications', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(22, 'add_applications', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(23, 'edit_applications', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(24, 'delete_applications', 'web', '2018-09-24 11:01:09', '2018-09-24 11:01:09'),
	(25, 'view_profiles', 'web', '2018-09-24 11:15:17', '2018-09-24 11:15:17'),
	(26, 'add_profiles', 'web', '2018-09-24 11:15:17', '2018-09-24 11:15:17'),
	(27, 'edit_profiles', 'web', '2018-09-24 11:15:17', '2018-09-24 11:15:17'),
	(28, 'delete_profiles', 'web', '2018-09-24 11:15:17', '2018-09-24 11:15:17');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matric_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ic_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_id` int(10) unsigned DEFAULT NULL,
  `supervisor_role` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  KEY `profiles_supervisor_id_foreign` (`supervisor_id`),
  CONSTRAINT `profiles_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.profiles: ~2 rows (approximately)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `user_id`, `avatar`, `created_at`, `updated_at`, `title`, `matric_num`, `study_mode`, `ic_num`, `passport_num`, `citizenship`, `department`, `faculty`, `office_num`, `mobile_num`, `supervisor_id`, `supervisor_role`) VALUES
	(1, 1, 'uploads/avatars/avatar1.jpg', '2018-09-24 11:01:16', '2018-09-24 11:01:16', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, NULL, NULL),
	(2, 2, 'uploads/avatars/avatar2.jpg', '2018-09-24 11:01:16', '2018-09-24 11:01:16', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, NULL, NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2018-09-24 11:01:14', '2018-09-24 11:01:14'),
	(2, 'User', 'web', '2018-09-24 11:01:16', '2018-09-24 11:01:16');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.role_has_permissions: ~36 rows (approximately)
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
	(1, 2),
	(5, 2),
	(9, 2),
	(13, 2),
	(17, 2),
	(21, 2),
	(23, 2),
	(24, 2),
	(25, 2),
	(27, 2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statuses_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.statuses: ~0 rows (approximately)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `name`, `state`, `reason`, `model_type`, `model_id`, `created_at`, `updated_at`) VALUES
	(1, 'Draft', NULL, 'Successfully created', 'Modules\\Application\\Entities\\Application', 2, '2018-09-24 23:01:17', '2018-09-24 23:01:17'),
	(2, 'Draft', NULL, 'Successfully created', 'Modules\\Application\\Entities\\Application', 3, '2018-09-24 23:02:53', '2018-09-24 23:02:53');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Dumping structure for table db_umvisa.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_umvisa.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Bridgette Lebsack', 'cschoen@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'VzMBu4iEybHkyM3lVI9NUvrMxLUCfiLZ1FTQdFZAyBKQhtV7bZbSaGruCv5C', '2018-09-24 11:01:15', '2018-09-24 11:01:15'),
	(2, 'Kiana Pollich II', 'bmarvin@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'UcpE6if3KCFaRB1JR7sZps0Q26VCaFLAP10SBB3yb7QWwTlZ2QnKqa9OHcDa', '2018-09-24 11:01:16', '2018-09-24 11:01:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
