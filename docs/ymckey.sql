--
-- Table structure for table `ymckey`
--

CREATE TABLE IF NOT EXISTS `ymckey` (
  `id` int(11) NOT NULL DEFAULT '1' PRIMARY KEY,
  `local_key` text COLLATE utf8_unicode_ci NOT NULL,
  `rc_date` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ymckey`
--

INSERT INTO `ymckey` SELECT t.* FROM (SELECT 1 as `id`, '' as `local_key`, 0 as `rc_date`) t WHERE NOT EXISTS (SELECT * FROM `ymckey`);