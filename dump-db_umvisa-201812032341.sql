-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: db_umvisa
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `applicationattachments`
--

DROP TABLE IF EXISTS `applicationattachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicationattachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` int(10) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applicationattachments_application_id_foreign` (`application_id`),
  CONSTRAINT `applicationattachments_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicationattachments`
--

LOCK TABLES `applicationattachments` WRITE;
/*!40000 ALTER TABLE `applicationattachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `applicationattachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applications` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (3,2,'josdjais','asdasd','Ashmore and Cartier Is.','','','','','2018-09-24 15:02:53','2018-09-24 15:02:53',NULL,NULL,'jasdaspdka','aosjdaiosjdaosd','2018-10-22','2018-10-24','2018-10-17','2018-10-25',NULL,'faculty');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Late Submission','We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than 21 days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.','Modules\\Application\\Entities\\Application',1,'App\\User',1,1,2,NULL,'2018-09-24 14:56:12','2018-09-24 14:56:12'),(2,'Late Submission','We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than 21 days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.','Modules\\Application\\Entities\\Application',2,'App\\User',1,3,4,NULL,'2018-09-24 15:01:17','2018-09-24 15:01:17'),(3,'Late Submission','We have received your application, however we wish you to draw your attention for you to submit the application to our office not less than 21 days prior to the event as to ensure that you are granted permission from the University before attending any activity in the future. Thank you.','Modules\\Application\\Entities\\Application',3,'App\\User',1,5,6,NULL,'2018-09-24 15:02:53','2018-09-24 15:02:53');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financialaids`
--

DROP TABLE IF EXISTS `financialaids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financialaids` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financialaids`
--

LOCK TABLES `financialaids` WRITE;
/*!40000 ALTER TABLE `financialaids` DISABLE KEYS */;
/*!40000 ALTER TABLE `financialaids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financialinstruments`
--

DROP TABLE IF EXISTS `financialinstruments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financialinstruments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financialinstruments`
--

LOCK TABLES `financialinstruments` WRITE;
/*!40000 ALTER TABLE `financialinstruments` DISABLE KEYS */;
/*!40000 ALTER TABLE `financialinstruments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linked_social_accounts`
--

DROP TABLE IF EXISTS `linked_social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linked_social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `linked_social_accounts_provider_id_unique` (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linked_social_accounts`
--

LOCK TABLES `linked_social_accounts` WRITE;
/*!40000 ALTER TABLE `linked_social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `linked_social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maklumat_staf_sis_vw`
--

DROP TABLE IF EXISTS `maklumat_staf_sis_vw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maklumat_staf_sis_vw` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NO_STAF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KOD_GELARAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_GELARAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_NAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_IC_NEW` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_IC_OLD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PASSPORT_NO` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMPLOYMENT_STATUS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `APPOINTMENT_DATE` date DEFAULT NULL,
  `EMP_EMPLOYMENT_END_DATE` date DEFAULT NULL,
  `GRADE_DESCRIPTION` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `POSITION_CODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `POSITION_DESC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UNIT_CODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SECTION_CODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DEPARTMENT_CODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PTJ_CODE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_PHONE_NO2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_ADDRESS_CURR_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_ADDRESS_CURR_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_ADDRESS_CURR_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_POSTCODE_CURR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BIO_NEGERI_SEMASA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_EMAIL_ADD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_EMAIL_ALT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BIO_AGAMA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BIO_STATUS_STAF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KTRGN_STATUS_STAF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RKH_TARAF_KHIDMAT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JANTINA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_KAHWIN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NEGARA_ASAL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WARGANEGARA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TEL_PEJ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FAX_PEJ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JENIS_JAWATAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UNIT_DESC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JABATAN_DESC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PTJ_DESC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TKH_LAHIR` date DEFAULT NULL,
  `TEL_HP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STAFUM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KECACATAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maklumat_staf_sis_vw`
--

LOCK TABLES `maklumat_staf_sis_vw` WRITE;
/*!40000 ALTER TABLE `maklumat_staf_sis_vw` DISABLE KEYS */;
/*!40000 ALTER TABLE `maklumat_staf_sis_vw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_04_12_142435_prepare_users_table_for_social_authentication',1),(4,'2018_04_12_142527_create_linked_social_accounts_table',1),(5,'2018_04_16_130049_create_permission_tables',1),(6,'2018_04_19_043221_create_profiles_table',1),(7,'2018_07_04_115504_create_statuses_table',1),(8,'2018_07_10_171319_create_applications_table',1),(9,'2018_07_11_101816_add_columns_to_profile',1),(10,'2018_07_12_142626_create_applicationattachments_table',1),(11,'2018_07_12_144126_create_comments_table',1),(12,'2018_07_15_122508_add_supervisor_column_to_users',1),(13,'2018_07_16_153754_add_supervisor_column_to_profiles',1),(14,'2018_07_17_002540_add_columns_to_applications',1),(15,'2018_08_01_155231_add_financialaids_table',1),(16,'2018_08_01_160543_add_financialinstruments_table',1),(17,'2018_08_01_161018_add_financialinstruments_foreign_table',1),(18,'2018_08_13_184725_create_participants_table',1),(19,'2018_09_24_110518_create_notifications_table',2),(20,'2018_09_24_223909_add_state_column',3),(21,'2018_09_24_224216_add_description_column',4),(22,'2018_09_24_224731_drop_dates_column',5),(23,'2018_09_24_224946_add_dates_column',6),(24,'2018_09_24_225258_add_alternateEmail_column',7),(25,'2018_09_24_225518_add_type_column',8),(26,'2018_09_24_225937_modifying_matricnum_column',9),(27,'2018_09_25_105928_create_sites_table',10),(28,'2018_11_29_213827_create_SN_VW_MAKL_PENYANDANG',10),(29,'2018_11_29_213906_create_MAKLUMAT_STAF_SIS_VW',10),(30,'2018_11_29_213927_create_VIEW_PROFILE_EDUCATION',10),(31,'2018_11_29_214115_create_SN_LOGIN',10),(32,'2018_11_29_214220_create_UMM_PLJR_MAKL',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(2,'App\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_id` int(10) unsigned NOT NULL,
  `matric_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participants_application_id_foreign` (`application_id`),
  CONSTRAINT `participants_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view_users','web','2018-09-24 03:01:08','2018-09-24 03:01:08'),(2,'add_users','web','2018-09-24 03:01:08','2018-09-24 03:01:08'),(3,'edit_users','web','2018-09-24 03:01:08','2018-09-24 03:01:08'),(4,'delete_users','web','2018-09-24 03:01:08','2018-09-24 03:01:08'),(5,'view_roles','web','2018-09-24 03:01:08','2018-09-24 03:01:08'),(6,'add_roles','web','2018-09-24 03:01:08','2018-09-24 03:01:08'),(7,'edit_roles','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(8,'delete_roles','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(9,'view_saps','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(10,'add_saps','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(11,'edit_saps','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(12,'delete_saps','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(13,'view_departments','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(14,'add_departments','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(15,'edit_departments','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(16,'delete_departments','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(17,'view_tickets','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(18,'add_tickets','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(19,'edit_tickets','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(20,'delete_tickets','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(21,'view_applications','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(22,'add_applications','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(23,'edit_applications','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(24,'delete_applications','web','2018-09-24 03:01:09','2018-09-24 03:01:09'),(25,'view_profiles','web','2018-09-24 03:15:17','2018-09-24 03:15:17'),(26,'add_profiles','web','2018-09-24 03:15:17','2018-09-24 03:15:17'),(27,'edit_profiles','web','2018-09-24 03:15:17','2018-09-24 03:15:17'),(28,'delete_profiles','web','2018-09-24 03:15:17','2018-09-24 03:15:17');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,1,'uploads/avatars/avatar1.jpg','2018-09-24 03:01:16','2018-09-24 03:01:16',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL),(2,2,'uploads/avatars/avatar2.jpg','2018-09-24 03:01:16','2018-09-24 03:01:16',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(1,2),(5,2),(9,2),(13,2),(17,2),(21,2),(23,2),(24,2),(25,2),(27,2),(9,3),(13,3),(17,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','web','2018-09-24 03:01:14','2018-09-24 03:01:14'),(2,'User','web','2018-09-24 03:01:16','2018-09-24 03:01:16'),(3,'Bana','web','2018-11-30 07:47:54','2018-11-30 07:47:54');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serialnum_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sn_login`
--

DROP TABLE IF EXISTS `sn_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sn_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `STA_NOSTAF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STA_ID_PENGGUNA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STA_KATA_LALUAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STA_AKTIF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sn_login`
--

LOCK TABLES `sn_login` WRITE;
/*!40000 ALTER TABLE `sn_login` DISABLE KEYS */;
INSERT INTO `sn_login` VALUES (1,'3403300','staf1','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(2,'9303800','staf2','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(3,'2001000','staf3','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(4,'1804700','staf4','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(5,'6804700','staf5','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(6,'4206000','staf6','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(7,'9606300','staf7','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(8,'9806900','staf8','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(9,'9809600','staf9','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(10,'1803300','staf10','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(11,'9105800','staf11','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(12,'8707200','staf12','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(13,'8908700','staf13','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(14,'6608800','staf14','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(15,'6303700','staf15','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(16,'4710600','staf16','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(17,'3908900','staf17','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(18,'7310700','staf18','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(19,'3714000','staf19','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(20,'6813200','staf20','202cb962ac59075b964b07152d234b70','Y',NULL,NULL),(21,'2414700','staf21','202cb962ac59075b964b07152d234b70','Y',NULL,NULL);
/*!40000 ALTER TABLE `sn_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sn_vw_makl_penyandang`
--

DROP TABLE IF EXISTS `sn_vw_makl_penyandang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sn_vw_makl_penyandang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `GLR_KTRGN_GELARAN_BM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BIO_NOSTAF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BIO_NAMA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JWT_KTRGN_JAWATAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JWT_KOD_JAWATAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UNT_KTRGN_UNIT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UNT_KOD_UNIT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JBT_KTRGN_JABATAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JBT_KOD_JABATAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PTG_KTRGN_PTJ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PTG_KOD_PTJ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RKH_TKH_LANTIK_SEMASA` date DEFAULT NULL,
  `RKH_TKH_AKHIR_KHIDMAT` date DEFAULT NULL,
  `BIO_USERID_UMMAIL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SKS_KOD_SEKSYEN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SKS_KTRGN_SEKSYEN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PERINGKAT_SANDANG` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sn_vw_makl_penyandang`
--

LOCK TABLES `sn_vw_makl_penyandang` WRITE;
/*!40000 ALTER TABLE `sn_vw_makl_penyandang` DISABLE KEYS */;
INSERT INTO `sn_vw_makl_penyandang` VALUES (1,'PROFESOR DR.','3403300','YAHAYA MAD','MENJALANKAN FUNGSI SEBAGAI DEKAN','J814','PEJABAT DEKAN','Z0101','PEJABAT DEKAN FAKULTI ALAM BINA','Z01','FAKULTI ALAM BINA','Z','2018-01-01','2018-12-31','staf1@um.edu.my','Z0101','PEJABAT DEKAN','PTJ',NULL,NULL),(2,'PROFESOR DR.','1804700','RUHANA ISA','DEKAN','J227','PEJABAT DEKAN','V0101','PEJABAT DEKAN FAKULTI PERNIAGAAN & PERAKAUNAN','V01','FAKULTI PERNIAGAAN & PERAKAUNAN','V','2018-01-01','2018-12-31','staf4@um.edu.my','V0101','PEJABAT DEKAN','PTJ',NULL,NULL),(3,'PROFESOR MADYA DR.','2001000','SUTRA DALI','TIMBALAN DEKAN (IJAZAH TINGGI)','J401','PEJABAT DEKAN','Z0101','PEJABAT DEKAN FAKULTI ALAM BINA','Z01','FAKULTI ALAM BINA','Z','2018-01-01','2018-12-31','staf3@um.edu.my','Z0101','PEJABAT DEKAN','PTJ',NULL,NULL),(4,'PROFESOR MADYA DR.','1803300','AZLI RAHIM','TIMBALAN DEKAN (PENYELIDIKAN & PEMBANGUNAN)','J407','PEJABAT DEKAN','Z0101','PEJABAT DEKAN FAKULTI ALAM BINA','Z01','FAKULTI ALAM BINA','Z','2018-01-01','2018-12-31','staf10@um.edu.my','Z0101','PEJABAT DEKAN','PTJ',NULL,NULL),(5,'PROFESOR MADYA DR.','9303800','ZARA HUSSIN','TIMBALAN DEKAN (IJAZAH TINGGI)','J401','PEJABAT DEKAN','P0101','PEJABAT DEKAN FAKULTI PENDIDIKAN','P01','FAKULTI PENDIDIKAN','P','2018-01-01','2018-12-31','staf2@um.edu.my','P0101','PEJABAT DEKAN','PTJ',NULL,NULL),(6,'PROFESOR MADYA DR.','6804700','ZAKIAH SALEHUDDIN','TIMBALAN DEKAN (IJAZAH DASAR)','J402','PEJABAT DEKAN','V0101','PEJABAT DEKAN FAKULTI PERNIAGAAN & PERAKAUNAN','V01','FAKULTI PERNIAGAAN & PERAKAUNAN','V','2018-01-01','2018-12-31','staf5@um.edu.my','V0101','PEJABAT DEKAN','PTJ',NULL,NULL),(7,'PROFESOR MADYA DR.','9105800','ZABIDI RAZAK','TIMBALAN DEKAN (PENYELIDIKAN & PEMBANGUNAN)','J407','PEJABAT DEKAN','P0101','PEJABAT DEKAN FAKULTI PENDIDIKAN','P01','FAKULTI PENDIDIKAN','P','2018-01-01','2018-12-31','staf11@um.edu.my','P0101','PEJABAT DEKAN','PTJ',NULL,NULL),(8,'PROFESOR MADYA DR.','9606300','WATI JAAFAR','TIMBALAN DEKAN (PENYELIDIKAN & PEMBANGUNAN)','J407','PEJABAT DEKAN','V0101','PEJABAT DEKAN FAKULTI PERNIAGAAN & PERAKAUNAN','V01','FAKULTI PERNIAGAAN & PERAKAUNAN','V','2018-01-01','2018-12-31','staf7@um.edu.my','V0101','PEJABAT DEKAN','PTJ',NULL,NULL),(9,'PROFESOR MADYA DR.','9806900','AWI MAIL','TIMBALAN DEKAN IJAZAH DASAR','J303','PEJABAT DEKAN','P0101','PEJABAT DEKAN FAKULTI PENDIDIKAN','P01','FAKULTI PENDIDIKAN','P','2018-01-01','2018-12-31','staf8@um.edu.my','P0101','PEJABAT DEKAN','PTJ',NULL,NULL),(10,'PROFESOR MADYA DR.','9809600','YUS KAMAL','TIMBALAN DEKAN (IJAZAH TINGGI)','J401','PEJABAT DEKAN','V0101','PEJABAT DEKAN FAKULTI PERNIAGAAN & PERAKAUNAN','V01','FAKULTI PERNIAGAAN & PERAKAUNAN','V','2018-01-01','2018-12-31','staf9@um.edu.my','V0101','PEJABAT DEKAN','PTJ',NULL,NULL),(11,'PROFESOR MADYA. DR. SR','4206000','NUAR LIAS','TIMBALAN DEKAN (IJAZAH DASAR)','J402','PEJABAT DEKAN','Z0101','PEJABAT DEKAN FAKULTI ALAM BINA','Z01','FAKULTI ALAM BINA','Z','2018-01-01','2018-12-31','staf6@um.edu.my','Z0101','PEJABAT DEKAN','PTJ',NULL,NULL);
/*!40000 ALTER TABLE `sn_vw_makl_penyandang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Draft',NULL,'Successfully created','Modules\\Application\\Entities\\Application',2,'2018-09-24 15:01:17','2018-09-24 15:01:17'),(2,'Draft',NULL,'Successfully created','Modules\\Application\\Entities\\Application',3,'2018-09-24 15:02:53','2018-09-24 15:02:53');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `umm_pljr_makl`
--

DROP TABLE IF EXISTS `umm_pljr_makl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `umm_pljr_makl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SIS_INT` int(11) DEFAULT NULL,
  `SIS_NOMKPB` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_USERNAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_KATALALUAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_NAMA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_KOD_IJAZAH` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_KOD_MAJOR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_USER_UID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_EMEL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_HP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `umm_pljr_makl`
--

LOCK TABLES `umm_pljr_makl` WRITE;
/*!40000 ALTER TABLE `umm_pljr_makl` DISABLE KEYS */;
INSERT INTO `umm_pljr_makl` VALUES (1,405513,'6688086','stud1','202cb962ac59075b964b07152d234b70','CAESARIA','PIC','','','myaltemail1@email.com','',NULL,NULL),(2,398514,'910208108980','stud6','202cb962ac59075b964b07152d234b70','CHING SIEW CHONG','PWA','','','myaltemail2@email.com','',NULL,NULL),(3,403644,'910902178792','stud7','202cb962ac59075b964b07152d234b70','ATIQAH MAT DAN','BVA','','','myaltemail3@email.com','',NULL,NULL),(4,402870,'970170078686','stud9','202cb962ac59075b964b07152d234b70','UMI MIRA NORDIN','BID','','','myaltemail4@email.com','',NULL,NULL),(5,405140,'890207088989','stud5','202cb962ac59075b964b07152d234b70','YOO KOK WING','COA','','','myaltemail5@email.com','',NULL,NULL),(6,405349,'E96078007','stud12','202cb962ac59075b964b07152d234b70','NISHAT DAFI','PQC','','','myaltemail6@email.com','',NULL,NULL),(7,403709,'YS7107622','stud15','202cb962ac59075b964b07152d234b70','BURHAN','CVA','','','myaltemail7@email.com','',NULL,NULL),(8,405617,'970709028812','stud8','202cb962ac59075b964b07152d234b70','NAJIAH ZALI','PQF','','','myaltemail8@email.com','',NULL,NULL),(9,397579,'K726668','stud13','202cb962ac59075b964b07152d234b70','FAIHAN','PHA','','','myaltemail9@email.com','',NULL,NULL),(10,391136,'970816018727','stud10','202cb962ac59075b964b07152d234b70','NUR MOKHTAR','CIC','','','myaltemail10@email.com','',NULL,NULL),(11,406657,'BN0712797','stud11','202cb962ac59075b964b07152d234b70','RINA HAQ','PVA','','','myaltemail11@email.com','',NULL,NULL),(12,391489,'800910078677','stud3','202cb962ac59075b964b07152d234b70','SALLEH DIN','CGA','','','myaltemail12@email.com','',NULL,NULL),(13,392903,'NBE701286','stud14','202cb962ac59075b964b07152d234b70','ALI','BQB','','','myaltemail13@email.com','',NULL,NULL),(14,395694,'720106078279','stud2','202cb962ac59075b964b07152d234b70','RAHIM ABDUL','CXA','','','myaltemail14@email.com','',NULL,NULL),(15,395215,'870601108601','stud4','202cb962ac59075b964b07152d234b70','HAN JEE DUNG','CHA','','','myaltemail15@email.com','',NULL,NULL);
/*!40000 ALTER TABLE `umm_pljr_makl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Bridgette Lebsack','cschoen@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','JsMkNFYybuk1RumGQ4uihUysvKuwgYzES9In5BwiALTBIZ39Z6jUNktXSqNy','2018-09-24 03:01:15','2018-09-24 03:01:15'),(2,'Kiana Pollich II','bmarvin@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','UcpE6if3KCFaRB1JR7sZps0Q26VCaFLAP10SBB3yb7QWwTlZ2QnKqa9OHcDa','2018-09-24 03:01:16','2018-09-24 03:01:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `view_profile_education`
--

DROP TABLE IF EXISTS `view_profile_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `view_profile_education` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MBUT_NOMKPB` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_NOMKP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_NAMA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_ALAMAT1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_ALAMAT2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_POSKOD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_BANDAR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_NEGERI` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_TELEFON` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_TEL_BIMBIT` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_WARGA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_ASAL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_JANTINA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_TRKHLAHIR` date DEFAULT NULL,
  `MBUT_MASTATUTIN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PBP_NODAFTAR` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PBP_NOMKPB` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PBP_KOD_IJAZAH` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PBP_JENIS_PENGAJIAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PBP_PROGRAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MP_TRKH_DAFTAR` date DEFAULT NULL,
  `SIS_USERNAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SIS_KATALALUAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JAB_HRIS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FKLTI_KOD_SIS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FKLTI_KOD_HRIS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FKLTI_KTRGN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PBP_STATUS_PEMOHON` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_ASRAMA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MBUT_KTRGN_ASRAMA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_AKTIF` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KPNG_TARIKH_SENAT` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `view_profile_education`
--

LOCK TABLES `view_profile_education` WRITE;
/*!40000 ALTER TABLE `view_profile_education` DISABLE KEYS */;
INSERT INTO `view_profile_education` VALUES (1,'6688086','','CAESARIA','ALAMA PERTAMA','ALAMAT KEDUA','16132','Bogor','ID','','018-7859538','ID','','3','1991-01-01','ID','PIC177100','6688086','PIC','SPLS','3','2018-01-01','stud1','202cb962ac59075b964b07152d234b70','-','P','P','PENDIDIKAN','AK','','','Y',NULL,NULL,NULL),(2,'720106078279','','RAHIM ABDUL','ALAMA PERTAMA','ALAMAT KEDUA','70400','SEREMBAN','5','067600077','','MY','MALAYSIA','1','1991-01-01','','CXA160001','720106078279','CXA','KS','5','2018-01-01','stud2','202cb962ac59075b964b07152d234b70','V01','C','V','PERNIAGAAN DAN PERAKAUNAN','AK','','','Y',NULL,NULL,NULL),(3,'800910078677','','SALLEH DIN','ALAMA PERTAMA','ALAMAT KEDUA','40400','SHAH ALAM','12','60162022273','','MY','MALAYSIA','1','1991-01-01','','CGA160503','800910078677','CGA','KS','6','2018-01-01','stud3','202cb962ac59075b964b07152d234b70','V01','C','V','PERNIAGAAN DAN PERAKAUNAN','AK','','','Y',NULL,NULL,NULL),(4,'870601108601','','HAN JEE DUNG','ALAMA PERTAMA','ALAMAT KEDUA','41200','KLANG','12','0162012071','','MY','MALAYSIA','1','1991-01-01','','CHA160504','870601108601','CHA','TS','5','2018-01-01','stud4','202cb962ac59075b964b07152d234b70','V04','C','V','PERNIAGAAN DAN PERAKAUNAN','AK','','','Y',NULL,NULL,NULL),(5,'890207088989','','YOO KOK WING','ALAMA PERTAMA','ALAMAT KEDUA','31400','IPOH','8','010-3703276','','MY','MALAYSIA','1','1991-01-01','','COA170300','890207088989','COA','KD','6','2018-01-01','stud5','202cb962ac59075b964b07152d234b70','V01','C','V','PERNIAGAAN DAN PERAKAUNAN','AK','','','Y',NULL,NULL,NULL),(6,'910208108980','','CHING SIEW CHONG','ALAMA PERTAMA','ALAMAT KEDUA','43000','KAJANG','12','-','','MY','MALAYSIA','3','1991-01-01','','PWA170600','910208108980','PWA','KD','5','2018-01-01','stud6','202cb962ac59075b964b07152d234b70','P01','P','P','PENDIDIKAN','AK','','','Y',NULL,NULL,NULL),(7,'910902178792','','ATIQAH MAT DAN','ALAMA PERTAMA','ALAMAT KEDUA','62250','PUTRAJAYA','19','0322226227','','MY','MALAYSIA','3','1991-01-01','','BVA170500','910902178792','BVA','TS','5','2018-01-01','stud7','202cb962ac59075b964b07152d234b70','Z01','B','Z','ALAM BINA','AK','','','Y',NULL,NULL,NULL),(8,'970709028812','','NAJIAH ZALI','ALAMA PERTAMA','ALAMAT KEDUA','40150','SHAH ALAM','12','0133657762','','MY','MALAYSIA','3','1991-01-01','','PQF170500','970709028812','PQF','KS','6','2018-01-01','stud8','202cb962ac59075b964b07152d234b70','P01','P','P','PENDIDIKAN','AK','','','Y',NULL,NULL,NULL),(9,'970170078686','','UMI MIRA NORDIN','ALAMA PERTAMA','ALAMAT KEDUA','17500','TANAH MERAH','3','055777265','','MY','','3','1991-01-01','MY','BID170403','970170078686','BID','SPLS','3','2018-01-01','stud9','202cb962ac59075b964b07152d234b70','-','B','Z','ALAM BINA','AK','12','KOLEJ KEDIAMAN KEDUABELAS','Y',NULL,NULL,NULL),(10,'970816018727','','NUR MOKHTAR','ALAMA PERTAMA','ALAMAT KEDUA','81100','JOHOR BAHRU','1','073772772','175605862','MY','','3','1991-01-01','MY','CIC160006','970816018727','CIC','SPTS','3','2018-01-01','stud10','202cb962ac59075b964b07152d234b70','-','C','V','PERNIAGAAN DAN PERAKAUNAN','AK','12','KOLEJ KEDIAMAN KEDUABELAS','Y',NULL,NULL,NULL),(11,'BN0712797','','RINA HAQ','ALAMA PERTAMA','ALAMAT KEDUA','43000','KAJANG','12','-','','ZZ','BANGLADESH','3','1991-01-01','','PVA170207','BN0712797','PVA','TS','5','2018-01-01','stud11','202cb962ac59075b964b07152d234b70','P04','P','P','PENDIDIKAN','AK','','','Y',NULL,NULL,NULL),(12,'E96078007','','NISHAT DAFI','ALAMA PERTAMA','ALAMAT KEDUA','68000','KUALA LUMPUR','12','01123102077','','ZZ','IRAN','3','1991-01-01','','PQC170600','E96078007','PQC','KS','6','2018-01-01','stud12','202cb962ac59075b964b07152d234b70','P01','P','P','PENDIDIKAN','AK','','','Y',NULL,NULL,NULL),(13,'K726668','','FAIHAN','ALAMA PERTAMA','ALAMAT KEDUA','43000','KAJANG','12','0327707067','','ZZ','SAUDI ARABIA','1','1991-01-01','','PHA160605','K726668','PHA','TS','5','2018-01-01','stud13','202cb962ac59075b964b07152d234b70','P03','P','P','PENDIDIKAN','AK','','','Y',NULL,NULL,NULL),(14,'NBE701286','','ALI','ALAMA PERTAMA','ALAMAT KEDUA','-','MORONI','CC','+601122276172','','ZZ','COMOROS','1','1991-01-01','','BQB160802','NBE701286','BQB','KS','6','2018-01-01','stud14','202cb962ac59075b964b07152d234b70','Z01','B','Z','ALAM BINA','AK','','','Y',NULL,NULL,NULL),(15,'YS7107622','','BURHAN','ALAMA PERTAMA','ALAMAT KEDUA','22060','ABBOTTABAD','PK','0052552327760','','ZZ','PAKISTAN','1','1991-01-01','','CVA170900','YS7107622','CVA','TS','5','2018-01-01','stud15','202cb962ac59075b964b07152d234b70','V02','C','V','PERNIAGAAN DAN PERAKAUNAN','AK','','','Y',NULL,NULL,NULL);
/*!40000 ALTER TABLE `view_profile_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_umvisa'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-03 23:41:01
