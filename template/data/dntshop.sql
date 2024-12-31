-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: dntshop
-- ------------------------------------------------------
-- Server version	9.0.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `bannerID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `position` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bannerID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (15,'/uploads/banners/1734545923-67631203ac726.webp',0,1,'2024-12-18 18:18:43','2024-12-18 18:18:43'),(16,'/uploads/banners/1734546261-676313552ac0c.webp',0,2,'2024-12-18 18:24:21','2024-12-18 18:24:21'),(17,'/uploads/banners/1734546270-6763135e959f7.webp',0,3,'2024-12-18 18:24:30','2024-12-18 18:24:30');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `brandID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brandID`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Nike','nike','/uploads/brands/nike_logo.jpg','2024-11-07 08:04:18','2024-11-07 08:04:18'),(2,'Adidas','adidas','/uploads/brands/adidas_logo.jpg','2024-11-07 08:04:18','2024-11-07 08:04:18'),(3,'Puma','puma','/uploads/brands/puma_logo.jpg','2024-11-07 08:04:18','2024-11-07 08:04:18'),(4,'Gucci','gucci','/uploads/brands/gucci_logo.jpg','2024-11-07 08:04:18','2024-11-07 08:04:18'),(5,'Chanel','chanel','/uploads/brands/chanel_logo.jpg','2024-11-07 08:04:18','2024-11-07 08:04:18'),(6,'Louis Vuitton','louis-vuitton','/uploads/brands/louis_vuitton_logo.jpg','2024-11-07 08:04:18','2024-11-07 08:04:18'),(7,'Dior','dior','/uploads/brands/dior_logo.jpg','2024-11-07 08:04:18','2024-11-07 08:04:18'),(8,'Zara','zara','/uploads/brands/zara_logo.jpg','2024-11-07 08:04:18','2024-11-07 08:04:18');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `categoryID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Áo thun','ao-thun','/uploads/categories/ao_thun.jpg','áo thun thời trang','2024-11-07 08:04:18','2024-11-07 08:04:18'),(2,'Quần jean','quan-jean','/uploads/categories/quan_jean.jpg','quần jean đa dạng kiểu dáng','2024-11-07 08:04:18','2024-11-07 08:04:18'),(3,'Áo khoác','ao-khoac','/uploads/categories/ao_khoac.jpg','áo khoác phong cách','2024-11-07 08:04:18','2024-11-07 08:04:18'),(4,'Đầm váy','dam-vay','/uploads/categories/dam_vay.jpg','đầm váy nữ tính','2024-11-07 08:04:18','2024-11-07 08:04:18'),(5,'Phụ kiện','phu-kien','/uploads/categories/phu_kien.jpg','Danh mục các phụ kiện thời trang','2024-11-07 08:04:18','2024-11-07 08:04:18'),(6,'Giày dép','giay-dep','/uploads/categories/giay_dep.jpg','giày dép đa dạng','2024-11-07 08:04:18','2024-11-07 08:04:18'),(7,'Túi xách','tui-xach','/uploads/categories/tui_xach.jpg','túi xách thời trang','2024-11-07 08:04:18','2024-11-07 08:04:18'),(8,'Mũ nón','mu-non','/uploads/categories/mu_non.jpg','mũ nón phong cách','2024-11-07 08:04:18','2024-11-07 08:04:18'),(9,'Đồ bộ','do-bo','/uploads/categories/do_bo.jpg','đồ bộ tiện lợi','2024-11-07 08:04:18','2024-11-07 08:04:18'),(10,'Đồ ngủ','do-ngu','/uploads/categories/do_ngu.jpg','đồ ngủ thoải mái','2024-11-07 08:04:18','2024-11-07 08:04:18');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `commentID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`commentID`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_post_id_foreign` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`postID`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (11,'Cảm ơn bài viết! Mình luôn thích những phong cách thời trang nam đơn giản mà vẫn rất cuốn hút. Những gợi ý rất hữu ích!',1,32,'2024-12-18 19:15:52','2024-12-18 19:15:52'),(12,'Phong cách này thật sự rất dễ áp dụng trong cuộc sống hàng ngày. Mình sẽ thử áp dụng những bộ đồ này cho công việc và đi chơi.',57,32,'2024-12-18 19:16:01','2024-12-18 19:16:01'),(13,'Một bài viết rất thực tế. Thời trang nam không cần quá phức tạp, chỉ cần chú ý một chút đến chi tiết là đã đẹp rồi.',58,32,'2024-12-18 19:16:11','2024-12-18 19:16:11'),(14,'Một bài viết rất thực tế. Thời trang nam không cần quá phức tạp, chỉ cần chú ý một chút đến chi tiết là đã đẹp rồi.',59,33,'2024-12-18 19:16:42','2024-12-18 19:16:42'),(15,'Bài viết rất thú vị. Thật sự mình cảm thấy khó khăn trong việc lựa chọn trang phục theo mùa, bài viết này đã giúp mình rất nhiều.',60,33,'2024-12-18 19:16:50','2024-12-18 19:16:50'),(16,'Phong cách thời trang này không chỉ đẹp mà còn rất thoải mái. Mình sẽ thử ngay các gợi ý trong mùa này.',61,33,'2024-12-18 19:16:58','2024-12-18 19:16:58'),(17,'Mình rất thích cách bài viết gợi ý cách mix đồ công sở. Dễ dàng áp dụng cho cả những ngày làm việc căng thẳng.',62,34,'2024-12-18 19:17:10','2024-12-18 19:17:10'),(18,'Cảm ơn bài viết, mình luôn cảm thấy khó khăn khi chọn trang phục công sở. Những gợi ý này thật sự rất hữu ích!',63,34,'2024-12-18 19:17:17','2024-12-18 19:17:17'),(19,'Phong cách công sở này thật sự vừa thanh lịch vừa thoải mái. Cảm thấy dễ dàng áp dụng vào môi trường làm việc của mình.',64,34,'2024-12-18 19:17:24','2024-12-18 19:17:24'),(20,'Thật sự yêu thích những bộ trang phục dạo phố này. Phong cách này vừa thoải mái vừa năng động!',65,35,'2024-12-18 19:17:36','2024-12-18 19:17:36'),(21,'Mình luôn tìm kiếm những ý tưởng mới cho những ngày đi dạo phố, bài viết này thật tuyệt vời!',66,35,'2024-12-18 19:17:42','2024-12-18 19:17:42'),(22,'Cảm ơn vì những gợi ý trang phục dạo phố rất dễ thực hiện. Chắc chắn mình sẽ thử ngay!',67,35,'2024-12-18 19:17:55','2024-12-18 19:17:55'),(23,'Bài viết đã giúp mình hiểu thêm về thế giới thời trang cao cấp. Quả thật, mỗi món đồ cao cấp đều có giá trị riêng.',68,36,'2024-12-18 19:18:04','2024-12-18 19:18:04'),(24,'Mặc dù giá thành cao, nhưng những món đồ cao cấp luôn mang lại sự khác biệt. Cảm ơn bài viết!',69,36,'2024-12-18 19:18:16','2024-12-18 19:18:16'),(25,'Thời trang cao cấp không chỉ về chất liệu mà còn là cách mà mỗi bộ đồ thể hiện phong cách cá nhân. Mình sẽ tìm hiểu thêm.',70,36,'2024-12-18 19:18:23','2024-12-18 19:18:23'),(26,'Thật sự yêu thích cách bạn mix đồ với phụ kiện! Một chiếc túi xách hoặc khăn choàng nhỏ cũng làm bộ đồ trở nên khác biệt.',71,37,'2024-12-18 19:18:36','2024-12-18 19:18:36'),(27,'Bài viết rất hữu ích, mình luôn gặp khó khăn khi chọn phụ kiện. Những gợi ý này rất dễ dàng áp dụng.',72,37,'2024-12-18 19:18:42','2024-12-18 19:18:42'),(28,'Cảm ơn bài viết! Mình sẽ thử những phụ kiện này để làm mới bộ trang phục hàng ngày.',73,37,'2024-12-18 19:18:49','2024-12-18 19:18:49'),(29,'Mùa đông mặc gì cũng phải ấm, nhưng đồng thời cũng phải thời trang. Cảm ơn bài viết về cách phối đồ cực kỳ hữu ích!',74,38,'2024-12-18 19:18:57','2024-12-18 19:18:57'),(30,'Thật tuyệt vời, mùa đông không chỉ có áo khoác dày, còn có rất nhiều phong cách khác mà mình chưa biết!',75,38,'2024-12-18 19:19:03','2024-12-18 19:19:03'),(31,'Các mẫu áo khoác và phụ kiện mùa đông này chắc chắn sẽ giúp mình giữ ấm mà vẫn đẹp.',76,38,'2024-12-18 19:19:12','2024-12-18 19:19:12'),(32,'Mùa hè là mùa mình yêu thích, và những trang phục này thật sự rất hợp. Cảm ơn bài viết!',58,39,'2024-12-18 19:19:28','2024-12-18 19:19:28'),(33,'Những chiếc váy và áo phông này thật sự rất mát mẻ và dễ mặc. Mình sẽ thử ngay trong mùa hè tới.',59,39,'2024-12-18 19:19:34','2024-12-18 19:19:34'),(34,'Bài viết rất tuyệt, mùa hè này mình sẽ thay đổi phong cách một chút với những gợi ý này.',60,39,'2024-12-18 19:19:41','2024-12-18 19:19:41'),(35,'Giày dép là phần không thể thiếu trong bộ trang phục, bài viết này giúp mình chọn lựa giày cho từng hoàn cảnh thật dễ dàng',61,40,'2024-12-18 19:19:54','2024-12-18 19:19:54'),(36,'Mình rất thích những mẫu giày thể thao được gợi ý trong bài. Chắc chắn sẽ sắm một đôi!',62,40,'2024-12-18 19:20:00','2024-12-18 19:20:00'),(37,'Giày dép luôn là yếu tố quan trọng để hoàn thiện trang phục. Bài viết này cung cấp rất nhiều lựa chọn hay.',63,40,'2024-12-18 19:20:06','2024-12-18 19:20:06'),(38,'Mình thích sự kết hợp giữa thể thao và thời trang trong bài viết này. Những bộ đồ thể thao vừa thoải mái lại đẹp mắt!',64,41,'2024-12-18 19:20:18','2024-12-18 19:20:18'),(39,'Giày thể thao, áo hoodie và quần jogger luôn là lựa chọn của mình. Bài viết đã gợi ý rất nhiều món đồ tuyệt vời.',65,41,'2024-12-18 19:20:24','2024-12-18 19:20:24'),(40,'Mình luôn tìm kiếm những bộ đồ thể thao vừa phù hợp với việc tập luyện, vừa thời trang. Bài viết này hoàn hảo!',66,41,'2024-12-18 19:20:32','2024-12-18 19:20:32'),(41,'Thật dễ thương khi nhìn những bộ đồ cho trẻ em trong bài viết này. Bé nhà mình chắc chắn sẽ thích!',67,42,'2024-12-18 19:20:43','2024-12-18 19:20:43'),(42,'Cảm ơn bài viết! Mình luôn muốn tìm những bộ đồ thoải mái và đáng yêu cho bé, bài viết này thật hữu ích.',68,42,'2024-12-18 19:20:50','2024-12-18 19:20:50'),(43,'Thời trang trẻ em không chỉ phải dễ thương mà còn phải thoải mái cho các bé. Bài viết đã giúp mình có nhiều lựa chọn.',69,42,'2024-12-18 19:20:58','2024-12-18 19:20:58'),(44,'Mình luôn yêu thích phong cách vintage. Những gợi ý trong bài viết giúp mình cập nhật xu hướng một cách dễ dàng.',70,43,'2024-12-18 19:21:10','2024-12-18 19:21:10'),(45,'Bài viết này thật sự giúp mình hiểu thêm về thời trang vintage. Cảm ơn bạn đã chia sẻ!',71,43,'2024-12-18 19:21:18','2024-12-18 19:21:18'),(46,'Thời trang vintage luôn mang đến cảm giác cổ điển và thanh lịch. Mình sẽ thử áp dụng phong cách này ngay.',72,43,'2024-12-18 19:21:26','2024-12-18 19:21:26'),(47,'Mình yêu thích phong cách streetwear, nó thể hiện sự tự do và cá tính mạnh mẽ. Bài viết rất hay!',73,44,'2024-12-18 19:21:47','2024-12-18 19:21:47'),(48,'Bài viết rất thú vị, streetwear thật sự là phong cách không bao giờ lỗi thời. Những món đồ này rất đáng thử.',74,44,'2024-12-18 19:21:54','2024-12-18 19:21:54'),(49,'Streetwear là sự kết hợp hoàn hảo giữa sự thoải mái và phong cách. Mình sẽ tìm những món đồ này để làm mới tủ đồ.',75,44,'2024-12-18 19:21:59','2024-12-18 19:21:59'),(50,'Áo sơ mi luôn là món đồ không thể thiếu trong tủ đồ của mình. Bài viết giúp mình hiểu thêm cách kết hợp chúng sao cho đẹp',76,45,'2024-12-18 19:22:11','2024-12-18 19:22:11'),(51,'Bài viết rất hữu ích, mình sẽ thử nhiều cách phối đồ với áo sơ mi để không bao giờ cảm thấy nhàm chán.',58,45,'2024-12-18 19:22:19','2024-12-18 19:22:19'),(52,'Áo sơ mi không chỉ dành cho công sở mà còn có thể mặc trong nhiều dịp khác. Cảm ơn bài viết tuyệt vời!',70,45,'2024-12-18 19:22:26','2024-12-18 19:22:26');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('new','read') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (5,'Nguyễn Văn A','0987654321','nguyenvana@gmail.com','Giao diện website rất đẹp, dễ sử dụng.','new','2024-11-10 08:30:00','2024-11-10 08:30:00'),(6,'Trần Thị B','0965432109','tranthib@gmail.com','Mong rằng sẽ có thêm nhiều mẫu thời trang công sở.','read','2024-10-25 03:15:00','2024-10-25 05:45:00'),(7,'Phạm Hoàng C','0932154789','phamhoangc@yahoo.com','Tôi không tìm thấy chính sách đổi trả trên website.','new','2024-12-01 13:00:00','2024-12-01 13:00:00'),(8,'Lê Hồng D','0912345678','lehongd@outlook.com','Hệ thống lọc sản phẩm hơi khó sử dụng, mong được cải thiện.','read','2024-11-18 01:30:00','2024-11-18 02:00:00'),(9,'Võ Minh E','0976543210','vominhe@gmail.com','Tôi rất thích tính năng wishlist trên website.','new','2024-12-12 15:15:00','2024-12-12 15:15:00'),(10,'Đặng Thị F','0921456789','dangthif@hotmail.com','Cần bổ sung thêm bảng size cho từng loại quần áo.','read','2024-09-20 07:25:00','2024-09-20 07:50:00'),(11,'Ngô Hải G','0945678123','ngohaig@gmail.com','Chất lượng hình ảnh sản phẩm rất rõ ràng.','new','2024-10-05 09:45:00','2024-10-05 09:45:00'),(12,'Đinh Hồng H','0911223344','dinhhongh@yahoo.com','Tôi gặp khó khăn trong việc thanh toán bằng MoMo.','read','2024-12-05 12:00:00','2024-12-05 12:20:00'),(13,'Phan Minh I','0933221100','phanminhi@gmail.com','Website hoạt động ổn định, tôi rất hài lòng.','new','2024-10-15 05:10:00','2024-10-15 05:10:00'),(14,'Nguyễn Thị J','0988776655','nguyenthij@gmail.com','Cần bổ sung thêm các chương trình khuyến mãi.','read','2024-11-22 10:00:00','2024-11-22 10:20:00'),(15,'Lê Văn K','0977889988','levank@gmail.com','Đặt hàng rất dễ dàng, tôi sẽ tiếp tục ủng hộ.','new','2024-10-18 07:15:00','2024-10-18 07:15:00'),(16,'Trần Hải L','0922334455','tranhail@yahoo.com','Mong có thêm sản phẩm giày và phụ kiện.','read','2024-12-10 03:25:00','2024-12-10 03:30:00'),(17,'Phạm Mai M','0965544332','phammaim@gmail.com','Website tải khá nhanh, rất tiện lợi.','new','2024-11-02 14:40:00','2024-11-02 14:40:00'),(18,'Ngô Thị N','0934998877','ngothin@yahoo.com','Mong có thêm tính năng chat trực tiếp với nhân viên.','read','2024-11-12 02:45:00','2024-11-12 03:00:00'),(19,'Đặng Văn O','0971002003','dangvano@gmail.com','Hệ thống tìm kiếm hoạt động không chính xác.','new','2024-12-08 11:35:00','2024-12-08 11:35:00'),(20,'Võ Thị P','0912345566','vothip@hotmail.com','Cần cải thiện phần quản lý đơn hàng.','read','2024-11-30 06:15:00','2024-11-30 06:30:00'),(21,'Lê Hoàng Q','0945123789','lehoangq@gmail.com','Tôi rất hài lòng với dịch vụ giao hàng nhanh.','new','2024-10-28 04:20:00','2024-10-28 04:20:00'),(22,'Nguyễn Văn R','0932110022','nguyenvanr@yahoo.com','Website nên có thêm phần đánh giá sản phẩm.','read','2024-09-30 01:50:00','2024-09-30 02:15:00'),(23,'Phạm Thị S','0913221144','phamthis@gmail.com','Chương trình ưu đãi khá hấp dẫn.','new','2024-10-20 08:30:00','2024-10-20 08:30:00'),(24,'Trần Văn T','0965432199','tranvant@gmail.com','Cần thêm các sản phẩm thời trang theo mùa.','read','2024-12-14 09:45:00','2024-12-14 10:00:00');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_09_19_000549_create_tags_table',1),(5,'2024_09_19_000831_create_posts_table',1),(6,'2024_09_19_002543_create_comments_table',1),(7,'2024_09_21_001341_create_categories_table',1),(8,'2024_09_21_013204_create_products_table',1),(9,'2024_09_21_094235_create_ratings_table',1),(10,'2024_09_21_102255_create_promotions_table',1),(11,'2024_09_22_044535_create_banners_table',1),(12,'2024_09_26_072025_create_orders_table',1),(13,'2024_10_21_050840_create_brands_table',1),(14,'2024_10_26_055522_add_brand_id_to_product',1),(15,'2024_10_31_180449_create_promotions_table',1),(16,'2024_11_23_211129_create_contacts_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `order_detailID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `variant_id` bigint unsigned DEFAULT NULL,
  `order_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_detailID`),
  KEY `order_detail_variant_id_foreign` (`variant_id`),
  KEY `order_detail_order_id_foreign` (`order_id`),
  CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE,
  CONSTRAINT `order_detail_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`variantID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (101,40,91,1,99000.00),(102,83,91,1,149000.00),(103,80,92,1,398000.00),(104,79,92,1,599000.00),(105,120,93,1,809000.00),(106,45,93,1,649000.00),(107,80,94,1,398000.00),(108,90,95,2,206000.00),(109,88,95,2,299000.00),(110,95,95,10,70000.00),(111,109,96,1,449000.00),(112,100,96,2,404000.00),(113,90,96,1,206000.00),(114,79,97,1,599000.00),(115,70,97,1,699000.00),(116,71,97,1,649000.00),(117,78,97,1,649000.00),(118,68,98,1,99000.00),(119,59,98,1,649000.00),(120,56,98,1,599000.00),(121,45,98,1,649000.00),(122,119,99,2,591000.00),(123,80,100,1,398000.00),(124,56,100,1,599000.00),(125,50,100,1,599000.00),(126,68,100,1,99000.00),(127,95,100,1,70000.00),(128,109,100,1,449000.00),(129,100,101,1,404000.00),(130,95,101,1,70000.00),(131,59,101,1,649000.00),(132,100,102,1,404000.00),(133,119,102,1,591000.00),(134,120,102,1,809000.00),(135,25,102,1,399000.00),(136,13,102,1,349000.00),(137,10,102,1,349000.00),(138,38,103,1,200000.00),(139,45,103,1,649000.00),(140,13,104,1,349000.00),(141,75,104,1,649000.00),(142,70,104,1,699000.00),(143,27,105,1,449000.00),(144,38,105,1,200000.00),(145,50,105,1,599000.00),(146,120,106,1,809000.00),(147,93,106,1,166000.00),(148,96,106,1,70000.00),(149,90,107,1,206000.00),(150,80,107,1,398000.00),(151,119,108,1,591000.00),(152,115,108,1,404000.00),(153,109,109,1,449000.00),(154,95,109,3,70000.00),(155,83,110,2,149000.00),(156,38,110,1,200000.00),(157,96,111,1,70000.00),(158,119,111,1,591000.00),(159,80,112,1,398000.00);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_method` enum('cash','bank_transfer','momo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `payment_status` enum('pending','completed','failed','refunded','paid on delivery') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `order_status` enum('pending','processing','shipped','delivered','cancelled','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint unsigned DEFAULT NULL,
  `promotion_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  UNIQUE KEY `orders_order_code_unique` (`order_code`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_promotion_id_foreign` (`promotion_id`),
  CONSTRAINT `orders_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`promotionID`) ON DELETE SET NULL,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (91,'ODNT302452',300080.00,0.00,'cash','paid on delivery','delivered',1,NULL,'2024-11-14 20:57:31','2024-11-14 20:57:31'),(92,'ODNT908696',997000.00,0.00,'cash','paid on delivery','delivered',57,NULL,'2024-10-14 21:00:07','2024-10-14 21:12:13'),(93,'ODNT841597',729000.00,0.00,'momo','failed','cancelled',57,4,'2024-12-18 20:27:39','2024-12-18 21:00:57'),(94,'ODNT536241',398000.00,0.00,'cash','paid on delivery','delivered',57,NULL,'2024-11-18 20:29:02','2024-11-18 20:53:23'),(95,'ODNT351680',810000.00,0.00,'momo','failed','pending',58,5,'2024-08-18 20:31:02','2024-09-18 20:38:17'),(96,'ODNT599952',1463000.00,0.00,'cash','paid on delivery','delivered',70,NULL,'2024-08-18 20:41:02','2024-08-18 20:41:02'),(97,'ODNT713267',2596000.00,0.00,'cash','paid on delivery','delivered',65,NULL,'2024-08-18 20:41:39','2024-12-18 20:56:55'),(98,'ODNT260049',998000.00,0.00,'cash','paid on delivery','cancelled',76,4,'2024-10-18 20:42:06','2024-04-18 20:53:12'),(99,'ODNT756627',282000.00,0.00,'cash','paid on delivery','delivered',60,5,'2024-10-18 20:42:42','2024-12-18 20:56:52'),(100,'ODNT654387',2214000.00,0.00,'momo','failed','pending',59,NULL,'2024-11-18 20:43:26','2024-06-18 20:43:37'),(101,'ODNT661465',1123000.00,0.00,'momo','failed','pending',72,NULL,'2024-12-18 20:44:25','2024-08-18 20:44:37'),(102,'ODNT354766',1450500.00,0.00,'cash','paid on delivery','delivered',65,4,'2024-10-18 20:46:02','2024-05-18 20:46:02'),(103,'ODNT041016',849000.00,0.00,'cash','paid on delivery','delivered',72,NULL,'2024-09-18 20:46:21','2024-06-18 20:46:21'),(104,'ODNT675453',1697000.00,0.00,'momo','completed','delivered',65,NULL,'2024-08-18 20:46:49','2024-12-18 20:56:48'),(105,'ODNT961039',1248000.00,0.00,'momo','completed','delivered',69,NULL,'2024-09-18 20:47:53','2024-12-18 20:56:46'),(106,'ODNT458151',1045000.00,0.00,'momo','failed','cancelled',59,NULL,'2024-12-18 20:51:36','2024-12-18 21:00:51'),(107,'ODNT369139',604000.00,0.00,'cash','paid on delivery','delivered',73,NULL,'2024-08-18 20:52:19','2024-12-18 20:56:43'),(108,'ODNT498378',995000.00,0.00,'cash','paid on delivery','delivered',61,NULL,'2024-12-18 20:59:46','2024-12-18 21:00:11'),(109,'ODNT720351',659000.00,0.00,'cash','paid on delivery','delivered',76,NULL,'2024-12-18 21:00:03','2024-12-18 21:00:09'),(110,'ODNT142236',498000.00,0.00,'cash','paid on delivery','processing',72,NULL,'2024-12-18 21:01:25','2024-12-18 21:01:31'),(111,'ODNT317221',661000.00,0.00,'cash','paid on delivery','shipped',58,NULL,'2024-12-18 21:01:47','2024-12-18 21:01:52'),(112,'ODNT675499',398000.00,0.00,'cash','paid on delivery','pending',66,NULL,'2024-12-18 21:35:23','2024-12-18 21:35:23');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('doantrungnhan24@gmail.com','cr57OGcG3FxQCXZLyq8Pkb2VvB9UndtSkEV73clVa8Y6GCLk8pH52Ab6P71K','2024-12-14 20:43:32');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tag` (
  `post_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`postID`) ON DELETE CASCADE,
  CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tagID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (32,9),(46,9),(33,10),(47,10),(49,10),(34,11),(48,11),(35,12),(36,13),(37,14),(38,15),(39,16),(40,17),(41,18),(42,19),(43,20),(44,21),(45,22),(51,25),(49,27),(50,28);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `postID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (32,'Phong Cách Đơn Giản Nhưng Đầy Quyến Rũ','<p>Thời trang nam ng&agrave;y nay kh&ocirc;ng c&ograve;n g&oacute;i gọn trong những bộ đồ cứng nhắc m&agrave; đ&atilde; trở n&ecirc;n linh hoạt v&agrave; đa dạng hơn bao giờ hết. Từ những bộ đồ c&ocirc;ng sở lịch l&atilde;m đến những bộ trang phục dạo phố thoải m&aacute;i, nam giới hiện nay c&oacute; thể lựa chọn phong c&aacute;ch ph&ugrave; hợp với từng ho&agrave;n cảnh. H&atilde;y c&ugrave;ng kh&aacute;m ph&aacute; những xu hướng thời trang nam đơn giản nhưng đầy quyến rũ trong b&agrave;i viết n&agrave;y.</p>','phong-cach-don-gian-nhung-day-quyen-ru','/uploads/posts/1734547514-6763183a5fb3b.jpg',6,'2024-12-18 18:45:14','2024-12-18 19:16:11'),(33,'Xu Hướng Thời Trang Nữ Cập Nhật Mùa Này','<p>Thời trang nữ lu&ocirc;n biến h&oacute;a kh&ocirc;ng ngừng theo từng m&ugrave;a v&agrave; xu hướng mới. Đặc biệt, sự kết hợp ho&agrave;n hảo giữa sự thanh lịch v&agrave; năng động tạo n&ecirc;n phong c&aacute;ch ri&ecirc;ng biệt. Từ những bộ v&aacute;y dạ hội sang trọng đến &aacute;o ph&ocirc;ng casual dễ thương, b&agrave;i viết n&agrave;y sẽ giới thiệu những xu hướng thời trang nữ bạn kh&ocirc;ng thể bỏ qua trong m&ugrave;a n&agrave;y.</p>','xu-huong-thoi-trang-nu-cap-nhat-mua-nay','/uploads/posts/1734547687-676318e7c7632.jpg',5,'2024-12-18 18:48:07','2024-12-18 19:16:58'),(34,'Bí Quyết Lựa Chọn Trang Phục Cho Mỗi Ngày Làm Việc','<p>Phong c&aacute;ch c&ocirc;ng sở kh&ocirc;ng chỉ cần sự chỉn chu m&agrave; c&ograve;n phải thể hiện được c&aacute; t&iacute;nh của người mặc. B&agrave;i viết n&agrave;y sẽ giới thiệu một số gợi &yacute; về những trang phục c&ocirc;ng sở vừa thanh lịch, vừa thoải m&aacute;i gi&uacute;p bạn tự tin tỏa s&aacute;ng tại nơi l&agrave;m việc.</p>','bi-quyet-lua-chon-trang-phuc-cho-moi-ngay-lam-viec','/uploads/posts/1734547769-6763193973981.png',4,'2024-12-18 18:49:29','2024-12-18 19:17:24'),(35,'Những Trang Phục Phù Hợp Cho Mùa Dạo Phố','<p>Thời trang dạo phố kh&ocirc;ng cần qu&aacute; cầu kỳ nhưng vẫn phải thể hiện được phong c&aacute;ch c&aacute; nh&acirc;n. Dưới đ&acirc;y l&agrave; một số gợi &yacute; về những bộ trang phục dạo phố cho cả nam v&agrave; nữ, gi&uacute;p bạn tr&ocirc;ng thời thượng m&agrave; vẫn thoải m&aacute;i trong những buổi đi chơi hay gặp gỡ bạn b&egrave;.</p>','nhung-trang-phuc-phu-hop-cho-mua-dao-pho','/uploads/posts/1734547941-676319e59122d.jpg',4,'2024-12-18 18:52:21','2024-12-18 19:17:55'),(36,'Tại Sao Thời Trang Cao Cấp Luôn Được Ưa Chuộng?','<p>Thời trang cao cấp lu&ocirc;n thu h&uacute;t sự ch&uacute; &yacute; bởi chất liệu cao cấp, sự tỉ mỉ trong từng chi tiết v&agrave; sự s&aacute;ng tạo vượt trội. B&agrave;i viết n&agrave;y sẽ giới thiệu về những thương hiệu thời trang cao cấp nổi bật v&agrave; l&yacute; do tại sao ch&uacute;ng lu&ocirc;n được giới y&ecirc;u th&iacute;ch thời trang t&igrave;m đến.</p>','tai-sao-thoi-trang-cao-cap-luon-duoc-ua-chuong','/uploads/posts/1734548013-67631a2d1460f.jpg',4,'2024-12-18 18:53:33','2024-12-18 19:18:23'),(37,'Cách Lựa Chọn Phụ Kiện Hoàn Hảo Cho Mỗi Bộ Trang Phục','<p>Phụ kiện thời trang c&oacute; thể biến h&oacute;a bất kỳ bộ trang phục n&agrave;o th&agrave;nh một t&aacute;c phẩm nghệ thuật thực sự. Trong b&agrave;i viết n&agrave;y, bạn sẽ t&igrave;m thấy những lời khuy&ecirc;n về c&aacute;ch kết hợp phụ kiện như t&uacute;i x&aacute;ch, gi&agrave;y d&eacute;p v&agrave; trang sức để n&acirc;ng tầm phong c&aacute;ch của m&igrave;nh.</p>','cach-lua-chon-phu-kien-hoan-hao-cho-moi-bo-trang-phuc','/uploads/posts/1734548194-67631ae2b67a2.webp',4,'2024-12-18 18:56:34','2024-12-18 19:18:49'),(38,'Cách Phối Đồ Ấm Áp Và Thời Thượng Cho Mùa Đông','<p>M&ugrave;a đ&ocirc;ng kh&ocirc;ng chỉ l&agrave; thời gian để giữ ấm m&agrave; c&ograve;n l&agrave; cơ hội để thể hiện phong c&aacute;ch c&aacute; nh&acirc;n qua những trang phục ấm &aacute;p. &Aacute;o kho&aacute;c d&agrave;y dặn, khăn cho&agrave;ng, v&agrave; những m&oacute;n đồ như găng tay hay boots sẽ gi&uacute;p bạn giữ ấm m&agrave; vẫn thời trang trong m&ugrave;a lạnh.</p>','cach-phoi-do-am-ap-va-thoi-thuong-cho-mua-dong','/uploads/posts/1734548261-67631b25140e9.jpg',4,'2024-12-18 18:57:41','2024-12-18 19:19:12'),(39,'Những Mẫu Trang Phục Thời Thượng Cho Mùa Hè','<p>M&ugrave;a h&egrave; đến với những trang phục thoải m&aacute;i, nhẹ nh&agrave;ng v&agrave; m&aacute;t mẻ. &Aacute;o sơ mi m&aacute;t mẻ, quần short năng động v&agrave; những chiếc v&aacute;y nhẹ nh&agrave;ng l&agrave; lựa chọn ho&agrave;n hảo cho những ng&agrave;y h&egrave; oi ả. C&ugrave;ng kh&aacute;m ph&aacute; những xu hướng thời trang m&ugrave;a h&egrave; trong b&agrave;i viết n&agrave;y.</p>','nhung-mau-trang-phuc-thoi-thuong-cho-mua-he','/uploads/posts/1734548312-67631b584be68.jpg',4,'2024-12-18 18:58:32','2024-12-18 19:19:41'),(40,'Lựa Chọn Giày Dép Phù Hợp Với Phong Cách Của Bạn','<p>Gi&agrave;y d&eacute;p kh&ocirc;ng chỉ gi&uacute;p bạn di chuyển m&agrave; c&ograve;n l&agrave; một phần quan trọng của trang phục. B&agrave;i viết n&agrave;y sẽ chia sẻ những xu hướng gi&agrave;y d&eacute;p thời trang mới nhất, từ những đ&ocirc;i gi&agrave;y thể thao năng động đến những đ&ocirc;i sandal thanh lịch, gi&uacute;p bạn chọn được đ&ocirc;i gi&agrave;y ph&ugrave; hợp với phong c&aacute;ch của m&igrave;nh.</p>','lua-chon-giay-dep-phu-hop-voi-phong-cach-cua-ban','/uploads/posts/1734548357-67631b8585733.jpg',4,'2024-12-18 18:59:17','2024-12-18 19:20:06'),(41,'Sự Kết Hợp Giữa Thời Trang Và Tính Thực Tế','<p>Thời trang thể thao kh&ocirc;ng chỉ d&agrave;nh cho những buổi tập gym m&agrave; c&ograve;n l&agrave; lựa chọn l&yacute; tưởng cho c&aacute;c hoạt động ngo&agrave;i trời. C&aacute;c trang phục thể thao hiện nay kh&ocirc;ng chỉ c&oacute; t&iacute;nh năng vượt trội m&agrave; c&ograve;n rất thời trang. H&atilde;y c&ugrave;ng kh&aacute;m ph&aacute; những bộ trang phục thể thao đang được y&ecirc;u th&iacute;ch.</p>','su-ket-hop-giua-thoi-trang-va-tinh-thuc-te','/uploads/posts/1734548403-67631bb34d9c2.png',4,'2024-12-18 19:00:03','2024-12-18 19:20:32'),(42,'Những Bộ Trang Phục Dễ Thương Và Thoải Mái Cho Bé','<p>Thời trang trẻ em lu&ocirc;n đặc biệt với những bộ đồ dễ thương v&agrave; thoải m&aacute;i. Từ những bộ đồ cho b&eacute; g&aacute;i dịu d&agrave;ng đến trang phục năng động cho b&eacute; trai, b&agrave;i viết n&agrave;y sẽ mang đến những gợi &yacute; về thời trang trẻ em m&agrave; ba mẹ c&oacute; thể tham khảo.</p>','nhung-bo-trang-phuc-de-thuong-va-thoai-mai-cho-be','/uploads/posts/1734548500-67631c14ea6e6.jpg',4,'2024-12-18 19:01:40','2024-12-18 19:20:58'),(43,'Trở Lại Với Phong Cách Cổ Điển','<p>Thời trang vintage lu&ocirc;n thu h&uacute;t bởi vẻ đẹp cổ điển v&agrave; sự thanh lịch vượt thời gian. Những chiếc &aacute;o sơ mi, v&aacute;y, hay &aacute;o kho&aacute;c vintage mang đến cảm gi&aacute;c như đưa bạn về qu&aacute; khứ. Kh&aacute;m ph&aacute; phong c&aacute;ch vintage trong b&agrave;i viết n&agrave;y.</p>','tro-lai-voi-phong-cach-co-dien','/uploads/posts/1734548555-67631c4b3215c.jpg',4,'2024-12-18 19:02:35','2024-12-18 19:21:26'),(44,'Phong Cách Đường Phố Không Thể Bỏ Qua','<p>Thời trang streetwear kh&ocirc;ng chỉ d&agrave;nh cho giới trẻ m&agrave; c&ograve;n được nhiều người y&ecirc;u th&iacute;ch nhờ v&agrave;o sự kết hợp giữa sự thoải m&aacute;i v&agrave; phong c&aacute;ch độc đ&aacute;o. T&igrave;m hiểu về những m&oacute;n đồ streetwear nổi bật v&agrave; c&aacute;ch kết hợp ch&uacute;ng trong bộ trang phục h&agrave;ng ng&agrave;y.</p>','phong-cach-duong-pho-khong-the-bo-qua','/uploads/posts/1734548588-67631c6c2f4ee.jpg',4,'2024-12-18 19:03:08','2024-12-18 19:22:00'),(45,'Tại Sao Áo Sơ Mi Là Lựa Chọn Mặc Đẹp Đến Mọi Thời Đại?','<p>&Aacute;o sơ mi kh&ocirc;ng chỉ l&agrave; trang phục c&ocirc;ng sở m&agrave; c&ograve;n c&oacute; thể dễ d&agrave;ng biến h&oacute;a th&agrave;nh nhiều phong c&aacute;ch kh&aacute;c nhau. Trong b&agrave;i viết n&agrave;y, bạn sẽ kh&aacute;m ph&aacute; những c&aacute;ch phối đồ s&aacute;ng tạo với &aacute;o sơ mi cho mọi dịp.</p>','tai-sao-ao-so-mi-la-lua-chon-mac-dep-den-moi-thoi-dai','/uploads/posts/1734548652-67631cac7562b.jpg',4,'2024-12-18 19:04:12','2024-12-18 19:22:26'),(46,'Những Trang Phục Nam Cần Có Trong Tủ Đồ','<p>Những trang phục cơ bản như &aacute;o sơ mi, quần t&acirc;y, hay &aacute;o kho&aacute;c l&agrave; những m&oacute;n đồ kh&ocirc;ng thể thiếu trong tủ đồ của mỗi ch&agrave;ng trai. B&agrave;i viết n&agrave;y sẽ gi&uacute;p bạn hiểu r&otilde; hơn về những trang phục nam cần c&oacute; v&agrave; c&aacute;ch phối ch&uacute;ng sao cho thật phong c&aacute;ch.</p>','nhung-trang-phuc-nam-can-co-trong-tu-do','/uploads/posts/1734548714-67631ceaae4dd.webp',0,'2024-12-18 19:05:14','2024-12-18 19:05:14'),(47,'Mách Bạn Cách Phối Đồ Để Trở Nên Cuốn Hút','<p>Phối đồ lu&ocirc;n l&agrave; thử th&aacute;ch đối với nhiều chị em. B&agrave;i viết n&agrave;y sẽ hướng dẫn bạn c&aacute;ch mix đồ sao cho vừa đẹp lại vừa ph&ugrave; hợp với từng sự kiện, gi&uacute;p bạn lu&ocirc;n nổi bật v&agrave; tự tin.</p>','mach-ban-cach-phoi-do-de-tro-nen-cuon-hut','/uploads/posts/1734548776-67631d28e80c3.jpg',0,'2024-12-18 19:06:16','2024-12-18 19:06:16'),(48,'Các Mẫu Trang Phục Phù Hợp Với Môi Trường Làm Việc','<p>Kh&ocirc;ng chỉ đơn giản l&agrave; sự chỉn chu, trang phục c&ocirc;ng sở c&ograve;n gi&uacute;p bạn thể hiện bản th&acirc;n một c&aacute;ch tinh tế. Kh&aacute;m ph&aacute; những bộ trang phục c&ocirc;ng sở phong c&aacute;ch trong b&agrave;i viết n&agrave;y để lu&ocirc;n tự tin tại nơi l&agrave;m việc.</p>','cac-mau-trang-phuc-phu-hop-voi-moi-truong-lam-viec','/uploads/posts/1734548827-67631d5bd4cdd.png',0,'2024-12-18 19:07:07','2024-12-18 19:07:07'),(49,'Phong Cách Minimalism – Tối Giản Nhưng Không Bao Giờ Lỗi Mốt','<h2>T&igrave;m hiểu phong c&aacute;ch thời trang Minimalism</h2>\r\n\r\n<h3>Phong c&aacute;ch Minimalism l&agrave; g&igrave;?</h3>\r\n\r\n<p><strong>Minimalism</strong>&nbsp;hay c&ograve;n gọi l&agrave;&nbsp;<strong>thời trang tối giản</strong>, ch&iacute;nh l&agrave; những outfit basic, những bộ trang phục thiết kế kiểu d&aacute;ng b&igrave;nh thường, c&aacute;c đường cắt may hoặc chi tiết đơn giản, kh&ocirc;ng c&oacute; những chi tiết cutout rườm r&agrave; hay m&agrave;u sắc bắt mắt.</p>\r\n\r\n<p style=\"margin-left:280px\"><img src=\"https://file.hstatic.net/1000197303/file/duy_9794_copy_44cc777fff6d473f867d72c308189128_grande.jpg\" /></p>\r\n\r\n<p><em>Minimalism hay c&ograve;n gọi l&agrave; thời trang tối giản, ch&iacute;nh l&agrave; những outfit basic</em></p>\r\n\r\n<p>Thời trang Minimalism chuộng những gam m&agrave;u nhẹ, nhạt hoặc c&aacute;c gam m&agrave;u trung t&iacute;nh, tuy đơn giản l&agrave; vậy nhưng bạn đừng tưởng lầm thời trang tối giản sẽ nh&agrave;m ch&aacute;n n&agrave;ng ơi. Mix match minimalism vẫn c&oacute; thể đem đến cho n&agrave;ng những set đồ xinh xắn, s&agrave;nh điệu. V&igrave; đơn giản, simple is the best.</p>\r\n\r\n<h3>Đặc điểm của phong c&aacute;ch minimalism</h3>\r\n\r\n<p>Những item thường thấy nhất của phong c&aacute;ch thời trang n&agrave;y l&agrave; &aacute;o sơ mi hay những chiếc &aacute;o thun, họa tiết đơn giản hoặc m&agrave;u trơn sẽ c&agrave;ng ph&ugrave; hợp hơn. C&aacute;c n&agrave;ng cũng n&ecirc;n nhớ khi chọn đồ&nbsp;<strong>phong c&aacute;ch minimalism</strong>&nbsp;cần lưu &yacute; phụ kiện. Kh&ocirc;ng chọn những phụ kiện qu&aacute; m&agrave;u m&egrave; v&agrave; sặc sỡ, ch&uacute;ng sẽ l&agrave;m cho set đồ của bạn bị lạc quẻ, kh&ocirc;ng đẹp ch&uacute;t n&agrave;o.</p>\r\n\r\n<p>Ngo&agrave;i ra, chất liệu vải cũng l&agrave; điều kh&aacute; được mọi người quan t&acirc;m khi mix đồ phong c&aacute;ch minimalism. C&aacute;c nh&agrave; thiết kế sẽ chọn những loại chất liệu mềm, c&oacute; độ rủ hoặc kh&ocirc;ng bị nhăn. Như&nbsp;&nbsp;vậy trang phục mặc l&ecirc;n sẽ tinh tế, sang trọng m&agrave; vẫn t&ocirc;n d&aacute;ng. Phong c&aacute;ch tối giản chỉ n&ecirc;n c&oacute; từ 2-3 m&agrave;u đơn sắc tr&ecirc;n tổng thể trang phục, mọi phụ kiện, họa tiết viền, ren đều được c&aacute;c t&iacute;n đồ thời trang tối giản h&oacute;a hết mức c&oacute; thể theo nguy&ecirc;n tắc &ldquo;less is more&quot;</p>\r\n\r\n<p><strong>Xem th&ecirc;m:</strong>&nbsp;<a href=\"https://marc.com.vn/blogs/mac-dep/phong-cach-hippie\"><em>Hippie L&agrave; G&igrave;? T&igrave;m Hiểu Từ A-Z Về Phong C&aacute;ch Hippie</em></a></p>\r\n\r\n<h2>Hướng dẫn c&aacute;ch phối đồ phong c&aacute;ch minimalism</h2>\r\n\r\n<h3>&Aacute;o măng t&ocirc; v&agrave; &aacute;o thun basic</h3>\r\n\r\n<p>Với m&agrave;u caro ho&agrave;n to&agrave;n kh&aacute;c biệt, chiếc &aacute;o kho&aacute;c măng t&ocirc; d&agrave;i n&agrave;y sẽ gi&uacute;p g&acirc;y ấn tượng với mọi người, thiết kế độc đ&aacute;o, phần caro nổi bật, kh&ocirc;ng c&agrave;i c&uacute;c từ tr&ecirc;n xuống dưới. Kết hợp &aacute;o thun basic m&agrave;u trắng, v&agrave; quần ống loe kh&ocirc;ng những c&oacute; thể k&eacute;o d&agrave;i đ&ocirc;i ch&acirc;n của bạn m&agrave; c&ograve;n l&agrave; một chi tiết thiết kế đầy tinh tế, th&uacute; vị.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Thiết kế d&aacute;ng d&agrave;i, kiểu d&aacute;ng phong c&aacute;ch, thường được mặc trong m&ugrave;a đ&ocirc;ng. Chất liệu cũng kh&aacute; nổi bật, mix c&ugrave;ng quần ống loe l&agrave; đ&atilde; c&oacute; ngay outfit ho&agrave;n hảo</em></p>\r\n\r\n<p>So với những style kh&aacute;c, phong c&aacute;ch tối giản c&oacute; phần basic, nh&agrave;m ch&aacute;n hơn, nhưng ch&iacute;nh v&igrave; điều đ&oacute; m&agrave; n&oacute; lại l&agrave;m người mặc to&aacute;t l&ecirc;n vẻ sang chảnh, hiện đại m&agrave; kh&ocirc;ng phải style n&agrave;o cũng l&agrave;m được. Phối &aacute;o măng t&ocirc; v&agrave; &aacute;o thun basic rất nhanh v&agrave; tiện lợi. Bạn sẽ kh&ocirc;ng phải tốn nhiều thời gian lựa chọn phụ kiện v&agrave; kiểu d&aacute;ng đẻ mix với nhau.</p>\r\n\r\n<p><strong>Xem th&ecirc;m</strong>:&nbsp;<a href=\"https://marc.com.vn/blogs/mac-dep/high-fashion\"><em>High Fashion L&agrave; G&igrave;? Những Ti&ecirc;u Chuẩn V&agrave; Quy Tắc Của High Fashion</em></a></p>\r\n\r\n<h3>Phong c&aacute;ch tối giản c&ugrave;ng quần jean</h3>\r\n\r\n<p>&Aacute;o cardigan b&ecirc;n trong với chất liệu cao cấp, gam m&agrave;u nhẹ nh&agrave;ng, si&ecirc;u bền. th&ecirc;m v&agrave;o đ&oacute; với thiết kế đơn giản, basic đảm bảo n&agrave;ng sẽ vừa thoải m&aacute;i m&agrave; vẫn ấn tượng với mọi người. Chiếc quần jean basic, m&agrave;u xanh c&ugrave;ng thiết kế ống su&ocirc;ng t&ocirc;n d&aacute;ng, c&oacute; thể kết hợp với đ&ocirc;i bốt cổ ngắn hoặc gi&agrave;y cao g&oacute;t hay sandal th&igrave; c&agrave;ng khiến n&agrave;ng b&ugrave;ng nổ hơn.</p>\r\n\r\n<p style=\"margin-left:240px\"><img src=\"https://file.hstatic.net/1000197303/file/duy_5857_copy_a32af88fc9954e139ff3cf342c83600a_grande.jpg\" /></p>\r\n\r\n<p><em>Đối với những ng&agrave;y n&agrave;ng muốn hướng phong c&aacute;ch thời trang của m&igrave;nh sang hơn item quần jean kh&ocirc;ng bao giờ sai lầm khi mix match</em></p>\r\n\r\n<p>Quần jean lu&ocirc;n l&agrave; item kh&ocirc;ng thể thiếu của bất kỳ t&iacute;n đồ thời trang n&agrave;o, ưu điểm của n&oacute; ch&iacute;nh l&agrave; kiểm d&aacute;ng trẻ trung, thiết kế năng động v&agrave; t&iacute;nh linh hoạt. Mọi người ho&agrave;n to&agrave;n c&oacute; thể kết hợp với quần jean nhiều style kh&aacute;c nhau m&agrave; kh&ocirc;ng lo tổng thể bị rườm r&agrave;, lỗi mốt.</p>\r\n\r\n<h3>Ch&acirc;n v&aacute;y/quần&nbsp;c&ugrave;ng blazer</h3>\r\n\r\n<p>Kh&ocirc;ng thể phủ nhận sức hấp dẫn vượt thời gian nhờ kiểu phối ch&acirc;n v&aacute;y c&ugrave;ng blazer n&agrave;y, với t&ocirc;ng m&agrave;u hiện đại, blazer d&aacute;ng rộng với vai đệm v&agrave; ve &aacute;o&nbsp;&nbsp;c&oacute; kh&iacute;a. Ngo&agrave;i ch&acirc;n v&aacute;y th&igrave; bạn c&oacute; thể kết hợp c&ugrave;ng quần, v&iacute; dụ như một chiếc quần ống rộng hay quần denim giản dị chẳng hạn, tuy nhi&ecirc;n nếu kết hợp với ch&acirc;n v&aacute;y th&igrave; cũng kh&ocirc;ng giảm bớt đi sức hấp dẫn đ&acirc;u nh&eacute;, set đồ vẫn đem tới sự tinh tế v&agrave; thướt tha cho n&agrave;ng.</p>\r\n\r\n<p style=\"margin-left:240px\"><img src=\"https://file.hstatic.net/1000197303/file/duy_6023_copy_56f3ca92341e4e8faed70ea45db2b42b_grande.jpg\" /></p>\r\n\r\n<p><em>Những chiếc blazer nhiều m&agrave;u sắc sẽ linh hoạt hơn nhiều trong phối đồ, đ&acirc;y c&ugrave;ng l&agrave; item kh&ocirc;ng thể thiếu trong tủ quần &aacute;o của bạn</em></p>\r\n\r\n<p>Sang trọng, lịch sự ch&iacute;nh l&agrave; những g&igrave; bạn sẽ nhận được khi phối đồ theo phong c&aacute;ch tối giản, minimalist style c&oacute; rất nhiều mẫu &aacute;o blazer kh&aacute;c nhau&hellip;. T&ugrave;y v&agrave;o những trường hợp kh&aacute;c nhau m&agrave; bạn c&oacute; thể lựa chọn cho m&igrave;nh item ph&ugrave; hợp, những item n&agrave;y đều gi&uacute;p người mặc to&aacute;t l&ecirc;n vẻ thời thượng.</p>\r\n\r\n<p><strong>Xem th&ecirc;m</strong>:&nbsp;<a href=\"https://marc.com.vn/blogs/mac-dep/thoi-trang-di-da-lat\"><em>C&aacute;ch Phối Đồ Đi Đ&agrave; Lạt Cho Nữ Si&ecirc;u Xinh</em></a></p>\r\n\r\n<h3>Phong c&aacute;ch tối giản c&ugrave;ng quần ống loe</h3>\r\n\r\n<p style=\"margin-left:240px\"><img src=\"https://file.hstatic.net/1000197303/file/duy_6018_copy_b9c5da8048d242ec8928f542b728fe22_grande.jpg\" /></p>\r\n\r\n<p><em>Quần ống loe l&agrave; item s&aacute;ng gi&aacute; của phong c&aacute;ch Minimalism</em></p>\r\n\r\n<p>N&agrave;ng c&oacute; thể chọn một em quần vải ống loe để mix phong c&aacute;ch tối giản cho m&igrave;nh, kh&ocirc;ng những hợp diện đi l&agrave;m m&agrave; c&ograve;n đi họp, đi gặp mặt đối t&aacute;c nữa đấy. Quần ống loe lu&ocirc;n gi&uacute;p c&aacute;c chị em m&igrave;nh t&ocirc;n d&aacute;ng ở mọi trường hợp, khi kết hợp với &aacute;o thun hay &aacute;o sơ mi đều được.</p>\r\n\r\n<h3>&Aacute;o thun</h3>\r\n\r\n<p style=\"margin-left:240px\"><img src=\"https://file.hstatic.net/1000197303/file/duy_9032_copy_d27e98de55e94534adae721a3df250a6_grande.jpg\" /></p>\r\n\r\n<p><em>N&agrave;ng đừng tưởng &aacute;o thun kh&ocirc;ng qu&yacute; ph&aacute;i, n&oacute; đ&atilde; l&agrave; item thời trang quốc d&acirc;n, đặc trưng cho phong c&aacute;ch thời trang tối giản. Hơn nữa, &aacute;o thun cũng đơn giản, thanh lịch v&agrave; cực kỳ thoải m&aacute;i bạn nh&eacute;</em></p>\r\n\r\n<p>Những item &aacute;o ph&ocirc;ng hay &aacute;o thun ch&iacute;nh l&agrave; những m&oacute;n trang phục kh&ocirc;ng thể bỏ qua khi mix phong c&aacute;ch tối giản với quần &aacute;o. Phong c&aacute;ch Minimalism trong thời trang nữ cũng kh&ocirc;ng hề kh&oacute; nhằn như n&agrave;ng tưởng. Chỉ cần những m&oacute;n đồ basic l&agrave; c&oacute; thể an t&acirc;m xuống phố rồi.</p>','phong-cach-minimalism-toi-gian-nhung-khong-bao-gio-loi-mot','/uploads/posts/1734549003-67631e0b7f2a5.webp',0,'2024-12-18 19:09:04','2024-12-18 19:10:03'),(50,'Style unisex là gì? Quần áo unisex là gì?','<p>Style unisex l&agrave; g&igrave;? Quần &aacute;o unisex l&agrave; g&igrave;?</p>\r\n\r\n<p>Style unisex hay c&ograve;n gọi l&agrave; phi giới t&iacute;nh. Đ&acirc;y l&agrave; từ d&ugrave;ng để m&ocirc; tả c&aacute;ch phối hợp trang phục v&agrave; phụ kiện ph&ugrave; hợp cho cả nam lẫn nữ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Phong c&aacute;ch Unisex l&agrave; phong c&aacute;ch trung t&iacute;nh d&agrave;nh cho cả hai giới nam v&agrave; nữ. N&oacute; đ&atilde; v&agrave; đang lan rộng tr&ecirc;n khắp thế giới, trong đ&oacute; c&oacute; Việt Nam.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Những c&ocirc; g&aacute;i sẽ kh&ocirc;ng c&ograve;n bị g&ograve; b&oacute; bởi những chiếc v&aacute;y hay gi&agrave;y cao g&oacute;t. M&agrave; c&oacute; thể thoải m&aacute;i diện l&ecirc;n những bộ trang phục mạnh mẽ đầy c&aacute; t&iacute;nh. Hay những ch&agrave;ng trai sẽ kh&ocirc;ng bị ph&aacute;n x&eacute;t bởi những bộ Outfit c&oacute; hơi hướng nữ t&iacute;nh. Đ&oacute; l&agrave; c&aacute;ch m&agrave; thời trang Unisex đang l&agrave;m thay đổi &ldquo;định kiến&rdquo; về sự kh&aacute;c biệt trong phong c&aacute;ch ăn mặc giữa nam v&agrave; nữ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unisex fashion l&agrave; g&igrave; v&agrave; qu&aacute; tr&igrave;nh ph&aacute;t triển</p>\r\n\r\n<p>Unisex l&agrave; sao? Mặc d&ugrave; chỉ mới xuất hiện trong thời gian gần đ&acirc;y, nhưng quần &aacute;o Unisex kh&ocirc;ng phải l&agrave; một kh&aacute;i niệm mới. C&aacute;c thương hiệu thời trang cao cấp đ&atilde; đi trước, dẫn đầu xu hướng, v&agrave; gần đ&acirc;y c&aacute;c cửa h&agrave;ng thời trang cũng đ&atilde; ph&aacute;t triển v&agrave; bắt kịp xu hướng Unisex độc đ&aacute;o n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>V&agrave;o những năm 60, tại Selfridges một trong những cửa hiệu quần &aacute;o nổi tiếng ở London, đ&atilde; trưng b&agrave;y d&ograve;ng quần &aacute;o unisex ở tất cả 3 tầng mặt tiền ngay tr&ecirc;n con phố Oxford. Để quảng b&aacute; phong c&aacute;ch n&agrave;y th&ecirc;m nhiều người biết đến, tất cả những nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng đều mặc trang phục unisex của c&aacute;c nh&agrave; thiết kế nổi tiếng như Haider Ackermann, Ann Demeulemeester v&agrave; Gareth Pugh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>V&agrave;o năm 2015, Selfridges đưa ra s&aacute;ng kiến ​​&rsquo;Agender&rsquo;, hợp nhất c&aacute;c bộ phận trang phục nam v&agrave; nữ. Đồng thời họ trưng b&agrave;y c&aacute;c sản phẩm Unisex từ hơn 40 thương hiệu. Một năm sau, Zara cho ra mắt d&ograve;ng sản phẩm &lsquo;Ungender&rsquo; &ndash; tuyển chọn quần jean, &aacute;o hoodie v&agrave; &aacute;o sơ mi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>V&agrave;o năm 2017, H&amp;M đ&atilde; ph&aacute;t h&agrave;nh &lsquo;Denim United&rsquo;, một bộ sưu tập đồ bảo hộ lao động được thiết kế cho tất cả mọi người. Ngay sau đ&oacute;, John Lewis đ&atilde; x&oacute;a nh&atilde;n giới t&iacute;nh khỏi tất cả sản phẩm quần &aacute;o trẻ em của m&igrave;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>V&agrave;o năm 2015, gi&aacute;m đốc s&aacute;ng tạo của Gucci, Alessandro Michele đ&atilde; giới thiệu nơ v&agrave; &aacute;o sơ mi ren trong buổi tr&igrave;nh diễn thời trang nam đầu ti&ecirc;n của m&igrave;nh. Điều n&agrave;y đ&atilde; c&oacute; một t&aacute;c động đ&aacute;ng kể kể chuyển đổi Gucci v&agrave; ảnh hưởng đến xu hướng thời trang thế giới.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gần đ&acirc;y, tại buổi tr&igrave;nh diễn thời trang nam Celine 2018 đầu ti&ecirc;n của m&igrave;nh, Hedi Slimane đ&atilde; tuy&ecirc;n bố trong th&ocirc;ng c&aacute;o b&aacute;o ch&iacute; k&egrave;m theo rằng &ldquo;to&agrave;n bộ quần &aacute;o của c&aacute;c người mẫu nam l&agrave; Unisex, v&agrave; do đ&oacute; ch&uacute;ng cũng sẽ d&agrave;nh cho phụ nữ&rdquo;. C&aacute;c &ocirc;ng lớn như Burberry v&agrave; Balenciaga cũng đ&atilde; giới thiệu cả trang phục Unisex trong những m&ugrave;a gần đ&acirc;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gi&agrave;y unisex l&agrave; g&igrave;?</p>\r\n\r\n<p>Đ&acirc;y l&agrave; phụ kiện đang v&ocirc; c&ugrave;ng hot v&agrave; th&ocirc;ng dụng đối với c&aacute;c gia đ&igrave;nh, bạn b&egrave;, cặp đ&ocirc;i. D&ugrave; l&agrave; gi&agrave;y thể thao, Sneaker hay những đ&ocirc;i Sandal đơn giản. Gi&agrave;y Unisex lu&ocirc;n đưa ra cho bạn nhiều sự lựa chọn tuyệt vời.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đồng hồ unisex l&agrave; g&igrave;?</p>\r\n\r\n<p>Kh&aacute;c với đồng hồ c&oacute; k&iacute;ch thước lớn d&agrave;nh cho nam giới hay cầu kỳ nhiều chi tiết d&agrave;nh cho nữ. Đồng hồ Unisex lu&ocirc;n hướng đến những thiết kế tối giản, để ph&ugrave; hợp khi đeo l&ecirc;n tay cả nam v&agrave; nữ. Những đồng hồ theo phong c&aacute;ch Unisex l&agrave; sự lựa chọn ho&agrave;n hảo cho những cặp đ&ocirc;i muốn sắm đồng hồ đ&ocirc;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>K&iacute;nh unisex l&agrave; g&igrave;?</p>\r\n\r\n<p>Mắt k&iacute;nh unisex kh&ocirc;ng kén chọn giới t&iacute;nh, ph&ugrave; hợp cho cả nam v&agrave; nữ, r&acirc;́t thời trang v&agrave; dễ phối với nhi&ecirc;̀u phong cách thời trang khác nhau.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>M&ugrave;i nước hoa hương unisex l&agrave; g&igrave;?</p>\r\n\r\n<p>Nước hoa Unisex được hiểu l&agrave; loại nước hoa ph&ugrave; hợp cho mọi giới t&iacute;nh. M&ugrave;i hương Unisex kh&ocirc;ng qu&aacute; đỗi ngọt ng&agrave;o như d&agrave;nh cho nữ hay mang đậm m&ugrave;i gỗ d&agrave;nh cho nam giới. M&agrave; ở đ&acirc;y, nước hoa Unisex l&agrave; sự h&ograve;a trộn v&agrave; c&acirc;n bằng của tất cả, rất ri&ecirc;ng biệt v&agrave; mang lại sự mới lạ!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kh&aacute;c với những d&ograve;ng nước hoa chuy&ecirc;n biệt d&agrave;nh cho ri&ecirc;ng một giới t&iacute;nh cụ thể. Nước hoa Unisex đ&atilde; tạo ra m&ugrave;i hương nhằm t&ocirc;n l&ecirc;n vẻ quyến rũ của từng c&aacute; thể. Nghĩa l&agrave; khi nam giới sử dụng th&igrave; sẽ trở n&ecirc;n lịch l&atilde;m, mạnh mẽ, c&ograve;n ph&aacute;i đẹp th&igrave; sẽ t&ocirc;n l&ecirc;n vẻ y&ecirc;u kiều v&agrave; quyến rũ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Người mẫu unisex l&agrave; g&igrave;?</p>\r\n\r\n<p>C&ugrave;ng với sự du nhập những phong c&aacute;ch thời trang hiện đại, nền thời trang Việt c&ograve;n đ&oacute;n nhận th&ecirc;m một luồng người mẫu ho&agrave;n to&agrave;n mới, những người mẫu unisex.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mở đầu cho phong tr&agrave;o người mẫu c&oacute; phần lạ l&ugrave;ng n&agrave;y ch&iacute;nh l&agrave; fashionista Kelbin Lei. Ch&iacute;nh phong c&aacute;ch thời trang thời thượng giao thoa giữa sự nữ t&iacute;nh của ph&aacute;i nữ v&agrave; n&eacute;t mạnh mẽ của c&aacute;c đấng m&agrave;y r&acirc;u đ&atilde; tạo n&ecirc;n những l&agrave;n s&oacute;ng mạnh mẽ ủng hộ nhiệt t&igrave;nh từ giới trẻ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&ograve;n nhớ trong một show diễn của thương hiệu thời trang nam Maschio, Kelbin đ&atilde; khiến kh&aacute;n giả sửng sốt khi anh sải bước tr&ecirc;n đ&ocirc;i gi&agrave;y m&oacute;ng ngựa cao l&ecirc;nh kh&ecirc;nh, trải đầy đinh t&aacute;n. Ch&iacute;nh từ cột mốc đ&oacute;, m&agrave; c&oacute; rất nhiều những lớp trẻ cũng bắt đầu đi theo con đường ch&ocirc;ng gai n&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Song h&agrave;nh với sự ph&aacute;t triển của những người mẫu ch&iacute;nh thống, người mẫu unisex ở nước ngo&agrave;i đ&atilde; c&oacute; một chặng đường ph&aacute;t triển kh&aacute; d&agrave;i, m&agrave; đỉnh cao l&agrave; những t&ecirc;n tuổi như Grace Jones, Andrej Pejic, Agyness Dein, Stanyslas Fedyanin..., vốn được xem l&agrave; tượng đ&agrave;i của giới mẫu lưỡng t&iacute;nh.</p>','style-unisex-la-gi-quan-ao-unisex-la-gi','/uploads/posts/1734549088-67631e60f0c89.jpg',0,'2024-12-18 19:11:28','2024-12-18 19:11:28'),(51,'Đầm dạ hội dự tiệc sang trọng và quyến rũ cho các quý cô','<h3><strong>1.Đầm dạ hội c&uacute;p ngực</strong></h3>\r\n\r\n<p>Những chiếc&nbsp;<strong>đầm dạ hội c&uacute;p ngực</strong>&nbsp;lu&ocirc;n d&agrave;nh được t&igrave;nh y&ecirc;u của c&aacute;c chị em bởi v&igrave; ch&uacute;ng kh&ocirc;ng những gi&uacute;p chị em khoe được v&ograve;ng 1 quyến rũ m&agrave; c&ograve;n khoe được đ&ocirc;i vai tr&acirc;n thon thả. Ch&iacute;nh v&igrave; vậy, mỗi khi xuất hiện c&ugrave;ng chiếc đầm n&agrave;y, c&aacute;c n&agrave;ng sẽ trở n&ecirc;n quyến rũ hơn bao giờ hết.</p>\r\n\r\n<p>Đơn giản nhưng kh&ocirc;ng hề đơn điệu, một ch&uacute;t nhấn nh&aacute; bằng nếp xếp ly nhẹ hay những vi&ecirc;n đ&aacute; lấp l&aacute;nh được kết tỉ mỉ tr&ecirc;n c&uacute;p ngực c&ugrave;ng gam m&agrave;u pastel nền n&atilde; những chiếc đầm dạ hội năm nay sẽ khiến bạn trở n&ecirc;n v&ocirc; c&ugrave;ng quyến rũ v&agrave; nổi bật.</p>\r\n\r\n<h3><em>&nbsp;</em><strong>2.Đầm dạ hội lệch vai</strong></h3>\r\n\r\n<p>Nếu n&agrave;ng n&agrave;o kh&ocirc;ng đủ tự tin khoe trọn bờ với những chiếc đầm dạ hội c&uacute;p ngực th&igrave; những&nbsp; chiếc&nbsp;<strong>đầm dạ hội lệch vai</strong>&nbsp;&ldquo;nửa k&iacute;n nửa hở&rdquo; ch&iacute;nh l&agrave; sự lựa chọn tuyệt vời d&agrave;nh cho bạn bởi vẻ đẹp ki&ecirc;u sa, b&iacute; ẩn m&agrave; n&oacute; mang đến cho người mặc.</p>\r\n\r\n<p>N&oacute;i đến thời trang m&ugrave;a lễ hội, ta sẽ nghĩ ngay đến những chiếc đầm mang những tone m&agrave;u bắt mắt v&agrave; tr&aacute;nh xa m&agrave;u đen với định kiến đ&acirc;y l&agrave; m&agrave;u sắc của sự ảm đạm. Nhưng c&ocirc;ng bằng m&agrave; n&oacute;i, đen thực sự l&agrave; một gam m&agrave;u th&uacute; vị với những quyền năng m&agrave; kh&ocirc;ng phải m&agrave;u sắc n&agrave;o cũng c&oacute; được bởi khả năng dễ mặc, dễ phối đồ v&agrave; dễ đẹp. Với những chiếc&nbsp;đầm dạ hội&nbsp;c&oacute; gam m&agrave;u n&agrave;y, bạn chỉ chọn son m&ocirc;i m&agrave;u mận ch&iacute;n&nbsp;l&agrave; đủ nổi bật rồi.</p>\r\n\r\n<p>Tạo dựng cho m&igrave;nh phong c&aacute;ch của một qu&yacute; c&ocirc; sang trọng,khi quyến rũ ki&ecirc;u sa, khi mạnh mẽ quyền lực qua những chiếc&nbsp;<a href=\"https://www.kkfashion.vn/vay-dam-du-tiec\" rel=\"noreferrer noopener\" target=\"_blank\">đầm dự tiệc sang trọng</a>&nbsp;cũng kh&ocirc;ng hề kh&oacute; phải kh&ocirc;ng n&agrave;o? H&atilde;y thoải m&aacute;i lựa chọn cho m&igrave;nh những thiết kế ph&ugrave; hợp với v&oacute;c d&aacute;ng v&agrave; c&aacute; t&iacute;nh ri&ecirc;ng của m&igrave;nh, đ&oacute; l&agrave; c&aacute;ch m&agrave; bạn sẽ nổi bật trước mọi &aacute;nh nh&igrave;n.</p>\r\n\r\n<p>&nbsp;</p>','dam-da-hoi-du-tiec-sang-trong-va-quyen-ru-cho-cac-quy-co','/uploads/posts/1734549201-67631ed164c13.webp',0,'2024-12-18 19:13:21','2024-12-18 19:13:21');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_colors` (
  `colorID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`colorID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_colors`
--

LOCK TABLES `product_colors` WRITE;
/*!40000 ALTER TABLE `product_colors` DISABLE KEYS */;
INSERT INTO `product_colors` VALUES (1,'Đỏ','#FF0000'),(2,'Xanh lá cây','#008000'),(3,'Xanh dương','#0000FF'),(4,'Đen','#000000'),(5,'Trắng','#FFFFFF'),(6,'Vàng','#FFFF00'),(7,'Cam','#FFA500'),(8,'Tím','#800080'),(9,'Hồng','#FFC0CB'),(10,'Xám','#808080'),(11,'Hoa kem','#e5a88e'),(12,'Nâu','#c6b39c');
/*!40000 ALTER TABLE `product_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `imageID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`imageID`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`productID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a071f2.webp',1),(2,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a089b1.webp',1),(3,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a0a086.webp',1),(4,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a0aff9.webp',1),(5,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a0bec7.jpg',1),(6,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a0cfa7.webp',1),(7,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a0de9f.webp',1),(8,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a0ed2f.jpg',1),(9,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a0f9d1.jpg',1),(10,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a10900.jpg',1),(11,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a1163b.webp',1),(12,'/uploads/products/ao-thun-dai-tay-dinh-da/1730967098-672c763a124ec.webp',1),(13,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a78fe5.webp',2),(14,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a7a135.webp',2),(15,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a7afae.webp',2),(16,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a7c1eb.webp',2),(17,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a7d13e.webp',2),(18,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a7e351.webp',2),(19,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a7f1d0.jpg',2),(20,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a802b2.webp',2),(21,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a81031.jpg',2),(22,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a81d7a.jpg',2),(23,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a82c1e.webp',2),(24,'/uploads/products/ao-thun-tay-phoi-ren/1730967418-672c777a83b4c.webp',2),(25,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c78401376e.webp',3),(26,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c784014934.webp',3),(27,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c784015739.webp',3),(28,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c784016759.webp',3),(29,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c7840179be.webp',3),(30,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c784018ca4.webp',3),(31,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c784019c54.webp',3),(32,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c78401aa22.webp',3),(33,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c78401b72e.webp',3),(34,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c78401c41e.jpg',3),(35,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c78401d120.webp',3),(36,'/uploads/products/ao-thun-tho-junnie-tay-raglan/1730967616-672c78401df05.webp',3),(37,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922b3057.webp',4),(38,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922b4299.webp',4),(39,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922b51b6.webp',4),(40,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922b620f.webp',4),(41,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922b71b5.webp',4),(42,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922b81b0.jpg',4),(43,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922b9393.webp',4),(44,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922ba816.webp',4),(45,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922bb82d.webp',4),(46,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922bc69d.jpg',4),(47,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922bd5d0.webp',4),(48,'/uploads/products/ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie/1730967842-672c7922be448.webp',4),(49,'/uploads/products/ao-somi-croptop-dai-tay/1730967975-672c79a7df6df.webp',5),(50,'/uploads/products/ao-somi-croptop-dai-tay/1730967975-672c79a7e079e.webp',5),(51,'/uploads/products/ao-somi-croptop-dai-tay/1730967975-672c79a7e1615.webp',5),(52,'/uploads/products/ao-somi-croptop-dai-tay/1730967975-672c79a7e2861.webp',5),(53,'/uploads/products/ao-somi-croptop-dai-tay/1730967975-672c79a7e3bf0.webp',5),(54,'/uploads/products/ao-somi-croptop-dai-tay/1730967975-672c79a7e50a9.webp',5),(55,'/uploads/products/quan-short-basic/1730969518-672c7faedf873.webp',6),(56,'/uploads/products/quan-short-basic/1730969518-672c7faee0f1d.webp',6),(57,'/uploads/products/quan-short-basic/1730969518-672c7faee1dec.webp',6),(58,'/uploads/products/quan-short-basic/1730969518-672c7faee2ce8.webp',6),(59,'/uploads/products/quan-short-basic/1730969518-672c7faee3b68.webp',6),(60,'/uploads/products/quan-short-basic/1730969518-672c7faee4c02.webp',6),(61,'/uploads/products/quan-short-basic/1730969518-672c7faee5b8d.jpg',6),(62,'/uploads/products/quan-short-basic/1730969518-672c7faee68c5.jpg',6),(63,'/uploads/products/quan-dai-jean-ong-suong/1730969693-672c805d0c1c3.webp',7),(64,'/uploads/products/quan-dai-jean-ong-suong/1730969693-672c805d0d6d6.jpg',7),(65,'/uploads/products/quan-dai-jean-ong-suong/1730969693-672c805d0e4c7.webp',7),(66,'/uploads/products/quan-dai-jean-ong-suong/1730969693-672c805d0f38e.jpg',7),(67,'/uploads/products/quan-dai-jean-ong-suong/1730969693-672c805d1027f.webp',7),(68,'/uploads/products/quan-dai-jean-ong-suong/1730969693-672c805d11192.webp',7),(69,'/uploads/products/quan-dai-jean-ong-suong/1730969693-672c805d12074.jpg',7),(70,'/uploads/products/quan-dai-jean-ong-suong/1730969693-672c805d12fe4.jpg',7),(71,'/uploads/products/quan-tay-dang-dung-ui-li/1730969828-672c80e484fe0.webp',8),(72,'/uploads/products/quan-tay-dang-dung-ui-li/1730969828-672c80e4862d8.webp',8),(73,'/uploads/products/quan-tay-dang-dung-ui-li/1730969828-672c80e4874bb.webp',8),(74,'/uploads/products/quan-tay-dang-dung-ui-li/1730969828-672c80e4882b5.webp',8),(75,'/uploads/products/quan-tay-dang-dung-ui-li/1730969828-672c80e4893df.webp',8),(76,'/uploads/products/quan-tay-dang-dung-ui-li/1730969828-672c80e48a6ad.jpg',8),(77,'/uploads/products/quan-dai-ong-dung-phoi-buckle/1730969971-672c8173c5af4.webp',9),(78,'/uploads/products/quan-dai-ong-dung-phoi-buckle/1730969971-672c8173c6c73.webp',9),(79,'/uploads/products/quan-dai-ong-dung-phoi-buckle/1730969971-672c8173c7ad4.webp',9),(80,'/uploads/products/quan-dai-ong-dung-phoi-buckle/1730969971-672c8173c8b77.webp',9),(81,'/uploads/products/quan-dai-ong-dung-phoi-buckle/1730969971-672c8173c9bfd.webp',9),(82,'/uploads/products/quan-dai-ong-dung-phoi-buckle/1730969971-672c8173cae6e.webp',9),(83,'/uploads/products/quan-tay-ong-dung-xep-ly/1730971104-672c85e027ad5.webp',10),(84,'/uploads/products/quan-tay-ong-dung-xep-ly/1730971104-672c85e028ebe.webp',10),(85,'/uploads/products/quan-tay-ong-dung-xep-ly/1730971104-672c85e029deb.webp',10),(86,'/uploads/products/quan-tay-ong-dung-xep-ly/1730971104-672c85e02acdc.webp',10),(87,'/uploads/products/quan-tay-ong-dung-xep-ly/1730971104-672c85e02bbd6.webp',10),(88,'/uploads/products/quan-tay-ong-dung-xep-ly/1730971104-672c85e02cbe5.webp',10),(89,'/uploads/products/quan-tay-ong-dung-xep-ly/1730971104-672c85e02dd25.webp',10),(90,'/uploads/products/quan-tay-ong-dung-xep-ly/1730971104-672c85e02ee58.webp',10),(91,'/uploads/products/ao-khoac-dang-lung/1730971355-672c86db51be6.webp',11),(92,'/uploads/products/ao-khoac-dang-lung/1730971355-672c86db52f2f.jpg',11),(93,'/uploads/products/ao-khoac-dang-lung/1730971355-672c86db53e6a.webp',11),(94,'/uploads/products/ao-khoac-dang-lung/1730971355-672c86db54e84.jpg',11),(95,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780baf6f.webp',12),(96,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780bc107.webp',12),(97,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780bd04d.webp',12),(98,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780bde7c.webp',12),(99,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780bef91.webp',12),(100,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780bff76.webp',12),(101,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780c0ff7.webp',12),(102,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780c1e23.webp',12),(103,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780c2bdf.webp',12),(104,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780c3999.webp',12),(105,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780c4a99.webp',12),(106,'/uploads/products/ao-cardigan-co-tron-theu-charm-no/1730971520-672c8780c5ca6.jpg',12),(107,'/uploads/products/ao-vest-xop-noi-hoa-van-tay-ngan/1730971648-672c880075fed.webp',13),(108,'/uploads/products/ao-vest-xop-noi-hoa-van-tay-ngan/1730971648-672c880077036.jpg',13),(109,'/uploads/products/ao-vest-xop-noi-hoa-van-tay-ngan/1730971648-672c8800781dc.jpg',13),(110,'/uploads/products/ao-vest-xop-noi-hoa-van-tay-ngan/1730971648-672c8800791aa.jpg',13),(111,'/uploads/products/ao-vest-xop-noi-hoa-van-tay-ngan/1730971648-672c88007a391.webp',13),(112,'/uploads/products/ao-vest-xop-noi-hoa-van-tay-ngan/1730971648-672c88007b318.webp',13),(113,'/uploads/products/ao-vest-xop-noi-hoa-van-tay-ngan/1730971648-672c88007c0d3.webp',13),(114,'/uploads/products/ao-vest-xop-noi-hoa-van-tay-ngan/1730971648-672c88007ce75.webp',13),(115,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d062017.webp',14),(116,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d0631da.webp',14),(117,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d064147.webp',14),(118,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d065056.webp',14),(119,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d0663ad.webp',14),(120,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d06745e.webp',14),(121,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d06844e.webp',14),(122,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d06921d.webp',14),(123,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d06a2b7.webp',14),(124,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d06b230.webp',14),(125,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d06c246.webp',14),(126,'/uploads/products/ao-blazer-tay-ngan-form-rong/1730971856-672c88d06d18d.webp',14),(127,'/uploads/products/khoac-vest-form-om-khong-tay/1730972620-672c8bcc317d7.webp',15),(128,'/uploads/products/khoac-vest-form-om-khong-tay/1730972620-672c8bcc32890.webp',15),(129,'/uploads/products/khoac-vest-form-om-khong-tay/1730972620-672c8bcc33844.webp',15),(130,'/uploads/products/khoac-vest-form-om-khong-tay/1730972620-672c8bcc347ae.webp',15),(131,'/uploads/products/dam-mini-bet-vai-phoi-beo-nhun-voan-hoa/1730972830-672c8c9ed2020.webp',16),(132,'/uploads/products/dam-mini-bet-vai-phoi-beo-nhun-voan-hoa/1730972830-672c8c9ed324b.webp',16),(133,'/uploads/products/dam-mini-bet-vai-phoi-beo-nhun-voan-hoa/1730972830-672c8c9ed4035.webp',16),(134,'/uploads/products/dam-mini-bet-vai-phoi-beo-nhun-voan-hoa/1730972830-672c8c9ed50e5.webp',16),(135,'/uploads/products/dam-mini-bet-vai-phoi-beo-nhun-voan-hoa/1730972830-672c8c9ed60a9.jpg',16),(136,'/uploads/products/dam-mini-bet-vai-phoi-beo-nhun-voan-hoa/1730972830-672c8c9ed6f14.webp',16),(137,'/uploads/products/dam-mini-phoi-co-somi/1730973000-672c8d4836419.webp',17),(138,'/uploads/products/dam-mini-phoi-co-somi/1730973000-672c8d4837c80.webp',17),(139,'/uploads/products/dam-mini-phoi-co-somi/1730973000-672c8d4838c37.webp',17),(140,'/uploads/products/dam-mini-phoi-co-somi/1730973000-672c8d4839958.webp',17),(141,'/uploads/products/dam-mini-phoi-co-somi/1730973000-672c8d483a977.webp',17),(142,'/uploads/products/dam-mini-phoi-co-somi/1730973000-672c8d483bb3c.webp',17),(143,'/uploads/products/dam-mini-phoi-co-somi/1730973000-672c8d483cc13.webp',17),(144,'/uploads/products/dam-mini-phoi-co-somi/1730973000-672c8d483da64.webp',17),(145,'/uploads/products/dam-midi-soc-ngang/1730973209-672c8e19db6bb.webp',18),(146,'/uploads/products/dam-midi-soc-ngang/1730973209-672c8e19dc7aa.webp',18),(147,'/uploads/products/dam-midi-soc-ngang/1730973209-672c8e19dd956.webp',18),(148,'/uploads/products/dam-midi-soc-ngang/1730973209-672c8e19deb56.webp',18),(149,'/uploads/products/dam-midi-soc-ngang/1730973209-672c8e19df9c3.webp',18),(150,'/uploads/products/dam-midi-soc-ngang/1730973209-672c8e19e0afb.webp',18),(151,'/uploads/products/dam-midi-soc-ngang/1730973209-672c8e19e1bd2.webp',18),(152,'/uploads/products/dam-midi-soc-ngang/1730973209-672c8e19e2b2f.webp',18),(153,'/uploads/products/dam-bi-ha-vai/1730973287-672c8e67b99c8.webp',19),(154,'/uploads/products/dam-bi-ha-vai/1730973287-672c8e67baa21.webp',19),(155,'/uploads/products/dam-bi-ha-vai/1730973287-672c8e67bba7b.webp',19),(156,'/uploads/products/dam-bi-ha-vai/1730973287-672c8e67bc8f5.webp',19),(157,'/uploads/products/dam-lung-duoi-ca-tay-canh-tien/1730973660-672c8fdc1d1eb.webp',20),(158,'/uploads/products/dam-lung-duoi-ca-tay-canh-tien/1730973660-672c8fdc1e408.webp',20),(159,'/uploads/products/dam-lung-duoi-ca-tay-canh-tien/1730973660-672c8fdc1f2c6.webp',20),(160,'/uploads/products/dam-lung-duoi-ca-tay-canh-tien/1730973660-672c8fdc2020b.webp',20),(161,'/uploads/products/mat-kinh-polygon-oversize/1730974206-672c91fee4526.webp',21),(162,'/uploads/products/mat-kinh-polygon-oversize/1730974206-672c91fee564a.jpg',21),(163,'/uploads/products/mat-kinh-polygon-oversize/1730974206-672c91fee667f.webp',21),(164,'/uploads/products/mat-kinh-polygon-oversize/1730974206-672c91fee75d1.webp',21),(173,'/uploads/products/mat-kinh-thoi-trang/1734550512-676323f085acc.webp',24),(174,'/uploads/products/mat-kinh-thoi-trang/1734550512-676323f087010.webp',24),(175,'/uploads/products/mat-kinh-thoi-trang/1734550512-676323f0882d2.webp',24),(176,'/uploads/products/mat-kinh-thoi-trang/1734550512-676323f0894be.webp',24),(177,'/uploads/products/mat-kinh-thoi-trang/1734550512-676323f08a611.webp',24),(178,'/uploads/products/mat-kinh-slim-square-classic-gong-kim-loai/1734550885-676325652201a.webp',25),(179,'/uploads/products/mat-kinh-slim-square-classic-gong-kim-loai/1734550885-6763256523330.webp',25),(180,'/uploads/products/mat-kinh-slim-square-classic-gong-kim-loai/1734550885-676325652441f.webp',25),(181,'/uploads/products/mat-kinh-slim-square-classic-gong-kim-loai/1734550885-676325652561f.webp',25),(182,'/uploads/products/mat-kinh-round-plannet/1734551041-676326019a720.webp',26),(183,'/uploads/products/mat-kinh-round-plannet/1734551041-676326019bcad.webp',26),(184,'/uploads/products/mat-kinh-round-plannet/1734551041-676326019ce16.webp',26),(185,'/uploads/products/mat-kinh-round-plannet/1734551041-676326019e064.webp',26),(186,'/uploads/products/vo-co-cao-bo-2-doi-kieu-tron/1734551249-676326d18b1ef.webp',27),(187,'/uploads/products/vo-co-cao-bo-2-doi-kieu-tron/1734551249-676326d18c573.webp',27),(188,'/uploads/products/vo-co-cao-bo-2-doi-kieu-tron/1734551249-676326d18da1a.webp',27),(189,'/uploads/products/vo-co-cao-bo-2-doi-kieu-tron/1734551249-676326d18eace.webp',27),(190,'/uploads/products/vo-luoi-bo-2-doi-kieu-tron/1734551335-67632727cf506.webp',28),(191,'/uploads/products/vo-luoi-bo-2-doi-kieu-tron/1734551335-67632727d0aee.webp',28),(192,'/uploads/products/giay-sandal-de-bet-quai-xo-ngon-cach-dieu/1734551618-676328420445e.jpg',29),(193,'/uploads/products/giay-sandal-de-bet-quai-xo-ngon-cach-dieu/1734551618-6763284205c66.webp',29),(194,'/uploads/products/giay-sandal-de-bet-quai-xo-ngon-cach-dieu/1734551618-6763284206de1.jpg',29),(195,'/uploads/products/giay-sandal-de-bet-quai-xo-ngon-cach-dieu/1734551618-6763284207e88.webp',29),(196,'/uploads/products/giay-sandal-de-bet-quai-xo-ngon-cach-dieu/1734551618-6763284209256.webp',29),(197,'/uploads/products/giay-sandal-de-bet-quai-xo-ngon-cach-dieu/1734551618-676328420a3ce.webp',29),(198,'/uploads/products/giay-sandal-de-bang-quai-ngang/1734551856-6763293068dbe.webp',30),(199,'/uploads/products/giay-sandal-de-bang-quai-ngang/1734551856-676329306a246.webp',30),(200,'/uploads/products/giay-sandal-de-bang-quai-ngang/1734551856-676329306b4d1.webp',30),(201,'/uploads/products/giay-sandal-de-bang-quai-ngang/1734551856-676329306c63a.webp',30),(202,'/uploads/products/giay-sandal-de-bang-quai-ngang/1734551856-676329306d8b9.webp',30),(203,'/uploads/products/giay-sandal-de-bang-quai-ngang/1734551856-676329306e974.webp',30),(204,'/uploads/products/giay-sandal-dep-dan-quai/1734552043-676329ebea028.webp',31),(205,'/uploads/products/giay-sandal-dep-dan-quai/1734552043-676329ebeb503.webp',31),(206,'/uploads/products/giay-sandal-dep-dan-quai/1734552043-676329ebec77e.webp',31),(207,'/uploads/products/giay-sandal-dep-dan-quai/1734552043-676329ebed8a3.webp',31),(208,'/uploads/products/tui-xach-nho-phoi-tay-cam-la-dolce-vita/1734552292-67632ae478788.jpg',32),(209,'/uploads/products/tui-xach-nho-phoi-tay-cam-la-dolce-vita/1734552292-67632ae479c1e.webp',32),(210,'/uploads/products/tui-xach-nho-phoi-tay-cam-la-dolce-vita/1734552292-67632ae47adfb.webp',32),(211,'/uploads/products/tui-xach-nho-phoi-tay-cam-la-dolce-vita/1734552292-67632ae47beb6.webp',32),(212,'/uploads/products/tui-xach-nho-phoi-tay-cam-la-dolce-vita/1734552292-67632ae47d573.jpg',32),(213,'/uploads/products/tui-xach-nho-phoi-tay-cam-la-dolce-vita/1734552292-67632ae47e764.jpg',32),(214,'/uploads/products/tui-xach-nho-phoi-tay-cam-la-dolce-vita/1734552292-67632ae47fece.jpg',32),(215,'/uploads/products/tui-xach-nho-hobo-in-hoa-tiet-chuyen-mau/1734552391-67632b47c1507.webp',33),(216,'/uploads/products/tui-xach-nho-hobo-in-hoa-tiet-chuyen-mau/1734552391-67632b47c29c0.webp',33),(217,'/uploads/products/tui-xach-nho-hobo-in-hoa-tiet-chuyen-mau/1734552391-67632b47c3c18.webp',33),(218,'/uploads/products/tui-xach-nho-hobo-in-hoa-tiet-chuyen-mau/1734552391-67632b47c5057.webp',33),(219,'/uploads/products/tui-xach-nho-hobo-in-hoa-tiet-chuyen-mau/1734552391-67632b47c65dd.webp',33),(220,'/uploads/products/tui-xach-nho-hobo-in-hoa-tiet-chuyen-mau/1734552391-67632b47c781a.jpg',33);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_sizes` (
  `sizeID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`sizeID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sizes`
--

LOCK TABLES `product_sizes` WRITE;
/*!40000 ALTER TABLE `product_sizes` DISABLE KEYS */;
INSERT INTO `product_sizes` VALUES (1,'S'),(2,'M'),(3,'L'),(4,'XL'),(5,'XXL'),(6,'XXXL'),(7,'XXXXL'),(8,'29'),(9,'30'),(10,'31'),(11,'32'),(12,'33'),(13,'34'),(14,'35'),(15,'36'),(16,'37'),(17,'38'),(18,'39'),(19,'40'),(20,'41'),(21,'42'),(22,'43');
/*!40000 ALTER TABLE `product_sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_variants` (
  `variantID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `size_id` bigint unsigned DEFAULT NULL,
  `color_id` bigint unsigned DEFAULT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`variantID`),
  UNIQUE KEY `product_variants_product_id_size_id_color_id_unique` (`product_id`,`size_id`,`color_id`),
  KEY `product_variants_color_id_foreign` (`color_id`),
  KEY `product_variants_size_id_foreign` (`size_id`),
  CONSTRAINT `product_variants_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`colorID`) ON DELETE SET NULL,
  CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`productID`) ON DELETE CASCADE,
  CONSTRAINT `product_variants_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `product_sizes` (`sizeID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_variants`
--

LOCK TABLES `product_variants` WRITE;
/*!40000 ALTER TABLE `product_variants` DISABLE KEYS */;
INSERT INTO `product_variants` VALUES (1,1,1,4,1794),(2,1,2,4,150),(3,1,3,4,140),(4,1,1,10,148),(5,1,2,10,105),(6,1,3,10,178),(7,2,1,10,150),(8,2,2,10,137),(9,2,3,10,492),(10,2,1,5,148),(11,2,2,5,105),(12,2,3,5,179),(13,3,1,5,1048),(14,3,2,5,500),(15,3,3,5,233),(16,3,1,10,101),(17,3,2,10,104),(18,3,3,10,847),(19,4,1,5,145),(20,4,2,5,135),(21,4,3,5,146),(22,4,1,3,99),(23,4,2,3,10),(24,4,3,3,15),(25,5,2,4,1799),(26,5,3,4,100),(27,6,1,5,148),(28,6,2,5,1500),(29,6,3,5,105),(30,6,4,5,180),(31,6,1,10,195),(32,6,2,10,450),(33,6,3,10,250),(34,6,4,10,540),(35,7,1,3,200),(36,7,2,3,330),(37,7,3,3,330),(38,8,2,5,1797),(39,8,4,5,500),(40,9,2,3,1499),(41,10,2,5,149),(42,10,4,5,180),(43,10,2,4,190),(44,10,4,4,500),(45,11,2,4,147),(46,11,3,4,500),(47,12,1,9,100),(48,12,2,9,500),(49,12,3,9,600),(50,12,1,4,-1),(51,12,2,4,1),(52,12,3,4,1),(53,13,1,9,100),(54,13,2,9,100),(55,13,3,9,100),(56,13,1,4,97),(57,13,2,4,100),(58,13,3,4,100),(59,14,1,4,98),(60,14,2,4,100),(61,14,3,4,100),(62,14,1,5,100),(63,14,2,5,100),(64,14,3,5,100),(65,14,1,9,100),(66,14,2,9,99),(67,14,3,9,100),(68,15,2,1,1498),(69,15,3,1,500),(70,16,1,11,1478),(71,17,1,4,499),(72,17,2,4,500),(73,17,3,4,500),(74,17,1,12,500),(75,17,2,12,499),(76,17,3,12,500),(77,18,2,12,248),(78,18,2,3,248),(79,19,2,4,482),(80,20,1,7,132),(81,20,2,7,499),(82,21,NULL,4,500),(83,21,NULL,3,495),(85,21,NULL,7,500),(86,24,NULL,4,500),(87,24,NULL,5,500),(88,24,NULL,10,1497),(89,25,NULL,12,800),(90,25,NULL,3,395),(91,25,NULL,4,700),(92,26,NULL,4,1000),(93,26,NULL,3,199),(94,26,NULL,9,350),(95,27,NULL,5,786),(96,28,NULL,9,802),(97,29,9,12,505),(98,29,10,12,404),(99,29,12,12,303),(100,29,9,5,198),(101,29,10,5,808),(102,29,11,5,123),(103,30,14,11,500),(104,30,15,11,500),(105,30,16,11,500),(106,30,14,12,500),(107,30,15,12,500),(108,30,16,12,500),(109,30,14,4,497),(110,30,15,4,500),(111,30,16,4,500),(112,31,14,4,600),(113,31,15,4,300),(114,31,16,4,100),(115,31,14,3,499),(116,31,15,3,500),(117,31,16,3,500),(118,32,NULL,4,800),(119,32,NULL,3,694),(120,33,NULL,4,497),(121,33,NULL,9,800);
/*!40000 ALTER TABLE `product_variants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `productID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `views` int NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`productID`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brandID`) ON DELETE CASCADE,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`categoryID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'TT44380254T','Áo Thun Dài Tay đính đá','<p>- &Aacute;o Thun D&agrave;i Tay đ&iacute;nh đ&aacute; thanh lịch, nữ t&iacute;nh</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;dạo phố, đi chơi, du lịch</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o: S - M - L</p>\r\n\r\n<p>S : 40.5cm - M : 41.5cm - L: 42.5cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>&nbsp;- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>M&atilde; sản phẩm:&nbsp;JNATH064</li>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o thun</li>\r\n	<li>Chất liệu:&nbsp;jersey</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-X&aacute;m</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-thun-dai-tay-dinh-da',349000.00,0.00,0,1,1,'2024-11-07 08:11:38','2024-11-07 08:57:20',1),(2,'TT19682595R','Áo thun tay phối ren','<p>&nbsp;&Aacute;o thun tay phối ren&nbsp;c&aacute; t&iacute;nh, trẻ trung v&agrave; nổi bật</p>\r\n\r\n<p>- Thiết kế in chữ tạo n&ecirc;n n&eacute;t đặc biệt khi diện</p>\r\n\r\n<p>- Trang phục ph&ugrave; hợp dạo phố, thường ng&agrave;y, đi học...</p>\r\n\r\n<p>- C&oacute; 02&nbsp;m&agrave;u cho n&agrave;ng th&ecirc;m sự lựa chọn</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o:</p>\r\n\r\n<p>S : 62&nbsp;cm - M : 63&nbsp;cm - L: 64&nbsp;cm</p>\r\n\r\n<p>Hướng dẫn sử dụng</p>\r\n\r\n<p>- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o thun</li>\r\n	<li>Chất liệu:&nbsp;jersey</li>\r\n	<li>M&agrave;u sắc:&nbsp;X&aacute;m-Trắng</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-thun-tay-phoi-ren',349000.00,0.00,0,0,1,'2024-11-07 08:16:58','2024-11-07 08:16:58',1),(3,'TT17649674I','Áo thun thỏ Junnie tay raglan','<p>&nbsp;Thun thun thỏ&nbsp;c&aacute; t&iacute;nh, trẻ trung v&agrave; nổi bật</p>\r\n\r\n<p>- Thiết kế in chữ tạo n&ecirc;n n&eacute;t đặc biệt khi diện</p>\r\n\r\n<p>- Trang phục ph&ugrave; hợp dạo phố, thường ng&agrave;y, đi học...</p>\r\n\r\n<p>- C&oacute; 02&nbsp;m&agrave;u cho n&agrave;ng th&ecirc;m sự lựa chọn</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o:</p>\r\n\r\n<p>S : 42&nbsp;cm - M : 43&nbsp;cm - L: 44&nbsp;cm</p>\r\n\r\n<p>Hướng dẫn sử dụng</p>\r\n\r\n<p>- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o thun</li>\r\n	<li>Chất liệu:&nbsp;jersey</li>\r\n	<li>M&agrave;u sắc:&nbsp;Trắng-X&aacute;m</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-thun-tho-junnie-tay-raglan',349000.00,0.00,0,0,1,'2024-11-07 08:20:16','2024-11-07 08:20:16',1),(4,'TT87163333R','Áo dệt kim cổ lọ thêu chữ “Meilleur jour de ma vie\"','<p>&Aacute;o dệt kim cổ lọ th&ecirc;u chữ Meilleur jour de ma vie&nbsp;thời trang,&nbsp;thanh lịch</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;dạo phố, đi l&agrave;m, đi tiệc....</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i: S : 45cm - M : 47cm - L : 49 cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o kiểu</li>\r\n	<li>Chất liệu:&nbsp;Knit</li>\r\n	<li>M&agrave;u sắc:&nbsp;Trắng-Xanh đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-det-kim-co-lo-theu-chu-meilleur-jour-de-ma-vie',599000.00,0.00,0,1,1,'2024-11-07 08:24:02','2024-11-07 08:57:15',1),(5,'TT84758404S','Áo sơmi croptop dài tay','<p>&Aacute;o sơmi croptop d&agrave;i tay thanh lịch, c&ocirc;ng sở</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp đi l&agrave;m, thường ng&agrave;y,...</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i:</p>\r\n\r\n<p>S : 48 cm - M : 49 cm - L : 50 cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>&nbsp;- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o kiểu</li>\r\n	<li>Chất liệu:&nbsp;silk</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-somi-croptop-dai-tay',399000.00,0.00,1,0,1,'2024-11-07 08:26:15','2024-12-15 18:39:05',1),(6,'TT86064130Q','Quần short basic','<p>&nbsp;&nbsp;Quần short basic&nbsp;thời trang, năng động</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;dạo phố, thường ng&agrave;y, du lịch...</p>\r\n\r\n<p>- K&iacute;ch thước: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i quần&nbsp;: S : 42,5cm - M : 44cm - L : 45.5cm - XL : 47cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>&nbsp;- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Quần short</li>\r\n	<li>Chất liệu:&nbsp;Khaki</li>\r\n	<li>M&agrave;u sắc:&nbsp;X&aacute;m-Trắng</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','quan-short-basic',449000.00,0.00,0,1,2,'2024-11-07 08:51:58','2024-11-07 08:57:17',2),(7,'TT46049952N','Quần dài jean ống suông','<p>Quần jeans d&agrave;i ống su&ocirc;ng c&aacute; t&iacute;nh, trẻ trung, năng động</p>\r\n\r\n<p>- Trang phục ph&ugrave; hợp dạo phố, đi chơi, đi học</p>\r\n\r\n<p>- K&iacute;ch thước: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i:</p>\r\n\r\n<p>S : 103 cm -&nbsp;M : 105 cm&nbsp;-&nbsp;L: 107 cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Quần d&agrave;i</li>\r\n	<li>Chất liệu:&nbsp;denim</li>\r\n	<li>M&agrave;u sắc:&nbsp;Xanh nhạt-Xanh đậm</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','quan-dai-jean-ong-suong',599000.00,0.00,0,0,2,'2024-11-07 08:54:53','2024-11-07 08:54:53',2),(8,'TT62356027F','Quần tây dáng đứng ủi li',NULL,'quan-tay-dang-dung-ui-li',599000.00,399000.00,0,1,2,'2024-11-07 08:57:08','2024-11-07 08:57:13',2),(9,'TT89854318G','Quần dài ống đứng phối buckle','<p>&nbsp;Quần d&agrave;i ống đứng phối buckle thanh lịch, dễ diện</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;dạo phố, thường ng&agrave;y,...</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i</p>\r\n\r\n<p>S: 100&nbsp;cm - M: 102,5&nbsp; cm - L: 104&nbsp;cm</p>\r\n\r\n<p><strong>Hướng dẫn sử&nbsp;dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>&nbsp;- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Quần d&agrave;i</li>\r\n	<li>Chất liệu:&nbsp;Khaki</li>\r\n	<li>M&agrave;u sắc:&nbsp;Xanh-Đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','quan-dai-ong-dung-phoi-buckle',595000.00,496000.00,0,0,2,'2024-11-07 08:59:31','2024-11-07 08:59:31',2),(10,'TT08200895J','Quần tây ống đứng xếp ly','<p>- Quần t&acirc;y ống đứng xếp ly hiện đại, thanh lịch<br />\r\n<br />\r\n- Trang phục ph&ugrave; hợp đi học, đi l&agrave;m, thường ng&agrave;y,...<br />\r\n<br />\r\n- 02 Phối m&agrave;u Đen v&agrave; Kem cơ bản, dễ sử dụng, cho n&agrave;ng th&ecirc;m lựa chọn<br />\r\n<br />\r\n- K&iacute;ch thước: S - M - L - XL<br />\r\n<br />\r\nS : 103&nbsp;cm - M : 103,5&nbsp;cm - L: 104&nbsp;cm - XL: 104,5 cm<br />\r\n<br />\r\n<strong>Hướng dẫn sử dụng</strong><br />\r\n<br />\r\n- Giặt tay bằng nước lạnh<br />\r\n<br />\r\n- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy<br />\r\n<br />\r\n- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u<br />\r\n<br />\r\n- Kh&ocirc;ng vắt<br />\r\n<br />\r\n- L&agrave; ủi ở nhiệt độ thấp.<br />\r\n<br />\r\n- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Quần d&agrave;i</li>\r\n	<li>Chất liệu:&nbsp;Poly</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-Kem</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','quan-tay-ong-dung-xep-ly',599000.00,0.00,0,1,2,'2024-11-07 09:18:24','2024-11-21 05:57:09',2),(11,'TT48622999I','Áo Khoác dáng Lửng','<p>- &Aacute;o Kho&aacute;c d&aacute;ng cũn thời trang,&nbsp;thanh lịch</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;dạo phố, đi l&agrave;m, đi tiệc....</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i: S : 43 cm - M : 44 cm - L : 45 cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>M&atilde; sản phẩm:&nbsp;JNKHC017</li>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o kho&aacute;c</li>\r\n	<li>Chất liệu:&nbsp;Tweed</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-khoac-dang-lung',649000.00,0.00,2,1,3,'2024-11-07 09:22:35','2024-12-18 20:27:22',3),(12,'TT97109979O','Áo cardigan cổ tròn thêu charm nơ','<p>&nbsp;&Aacute;o cardigan cổ tr&ograve;n th&ecirc;u charm nơ thời trang,&nbsp;thanh lịch</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;dạo phố, đi l&agrave;m, đi tiệc....</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i: S : 49 cm - M : 51&nbsp;cm - L : 53cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o kho&aacute;c</li>\r\n	<li>Chất liệu:&nbsp;Knit</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-Hồng</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-cardigan-co-tron-theu-charm-no',599000.00,0.00,0,1,3,'2024-11-07 09:25:20','2024-11-07 09:27:37',3),(13,'TT94294552Q','Áo vest xốp nổi hoa văn tay ngắn','<p>&Aacute;o vest xốp nổi hoa văn tay ngắn&nbsp;thanh lịch, thời trang</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;dạo phố, đi l&agrave;m, đi tiệc....</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i:&nbsp;</p>\r\n\r\n<p>S: 62 cm - M: 63 cm - L: 64cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o kho&aacute;c</li>\r\n	<li>Chất liệu:&nbsp;Poly</li>\r\n	<li>M&agrave;u sắc:&nbsp;Hồng-Đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-vest-xop-noi-hoa-van-tay-ngan',599000.00,0.00,0,1,3,'2024-11-07 09:27:28','2024-12-09 07:07:35',3),(14,'TT95243985H','Áo blazer tay ngắn form rộng','<p>&nbsp;&Aacute;o blazer tay ngắn form rộng thanh lịch, nữ t&iacute;nh v&agrave; hiện đại</p>\r\n\r\n<p>- &Aacute;o với d&aacute;ng tay ngắn, cắt may phần dọc lưng&nbsp;v&agrave; chất liệu vải nhẹ nhưng vẫn rất t&ocirc;n d&aacute;ng</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;đi l&agrave;m, đi tiệc, dạo phố....</p>\r\n\r\n<p>- K&iacute;ch thước &aacute;o: S - M - L</p>\r\n\r\n<p>- Chiều d&agrave;i:&nbsp;</p>\r\n\r\n<p>S: 61cm - M: 62cm - L: 62cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong><br />\r\n- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o kho&aacute;c</li>\r\n	<li>Chất liệu:&nbsp;twill</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-Kem-Xanh-Hồng</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','ao-blazer-tay-ngan-form-rong',649000.00,0.00,0,0,3,'2024-11-07 09:30:56','2024-11-07 09:30:56',3),(15,'TT66239131F','Khoác vest form ôm không tay','<p>Mi&ecirc;u tả: &Aacute;O BLAZER FORM D&Agrave;I KH&Ocirc;NG TAY.</p>\r\n\r\n<p>Đặc t&iacute;nh: Thanh lịch - Hiện đại</p>\r\n\r\n<p>Thể loại: Trang phục dạo phố, c&ocirc;ng sở, tiệc nhẹ.</p>\r\n\r\n<p>Size: S/M/L.</p>\r\n\r\n<p>Chất liệu: Vải sợi poly tổng hợp.</p>\r\n\r\n<p>M&agrave;u sắc: Đỏ / Đen.</p>\r\n\r\n<p>Lưu &yacute;: Kh&ocirc;ng tẩy, ng&acirc;m. Giặt hấp. Ủi nhiệt độ thấp.</p>\r\n\r\n<p>Số đo mẫu nữ: Chiều cao: 168 cm. Số đo 3 v&ograve;ng: 83 - 59 - 86 (Mặc size S).</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;&Aacute;o kho&aacute;c</li>\r\n	<li>Chất liệu:&nbsp;Poly</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-Đỏ</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','khoac-vest-form-om-khong-tay',649000.00,550000.00,0,1,3,'2024-11-07 09:43:40','2024-11-07 09:43:43',3),(16,'TT75565198G','Đầm mini bẹt vai phối bèo nhún voan hoa','<p>- Đầm mini bẹt vai phối b&egrave;o nh&uacute;n voan hoa trẻ trung, nữ t&iacute;nh<br />\r\n- Đầm hoa phối b&egrave;o nh&uacute;n nữ t&iacute;nh, trẻ trung kết hợp với phần bẹt vai gi&uacute;p n&agrave;ng th&ecirc;m phần quyến rũ<br />\r\n- Chất liệu vải organza cao cấp tạo sự thoải m&aacute;i tối đa cho người mặc<br />\r\n- Ph&ugrave; hợp với nhiều mục đ&iacute;ch sử dụng như đi học, đi chơi, dạo phố,...<br />\r\n- K&iacute;ch thước:<br />\r\nS: 68cm - M: 70cm&nbsp;<br />\r\nHướng dẫn sử dụng<br />\r\n- Giặt tay bằng nước lạnh<br />\r\n- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy<br />\r\n- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u<br />\r\n- Kh&ocirc;ng vắt<br />\r\n- L&agrave; ủi ở nhiệt độ thấp<br />\r\n- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Đầm ngắn</li>\r\n	<li>Chất liệu:&nbsp;Organza</li>\r\n	<li>M&agrave;u sắc:&nbsp;Hoa kem</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','dam-mini-bet-vai-phoi-beo-nhun-voan-hoa',699000.00,0.00,2,0,4,'2024-11-07 09:47:10','2024-12-18 20:46:43',4),(17,'TT95043808C','Đầm Mini phối cổ sơmi','<p>Đầm Mini phối cổ sơmi&nbsp;trẻ trung, năng động</p>\r\n\r\n<p>- Trang phục được thiết kế đơn giản tập trung v&agrave;o chất liệu vải denim cao cấp tạo sự thoải m&aacute;i tối đa cho người mặc</p>\r\n\r\n<p>- Ph&ugrave; hợp với nhiều mục đ&iacute;ch sử dụng như đi học, đi chơi, dạo phố,..</p>\r\n\r\n<p>- K&iacute;ch thước: S - M - L</p>\r\n\r\n<p>Hướng dẫn sử dụng<br />\r\n- Giặt tay bằng nước lạnh<br />\r\n- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy<br />\r\n- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u<br />\r\n- Kh&ocirc;ng vắt<br />\r\n- L&agrave; ủi ở nhiệt độ thấp<br />\r\n- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Đầm ngắn</li>\r\n	<li>Chất liệu:&nbsp;Carolan</li>\r\n	<li>M&agrave;u sắc:&nbsp;N&acirc;u-Đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','dam-mini-phoi-co-somi',649000.00,0.00,2,0,4,'2024-11-07 09:50:00','2024-12-18 20:46:37',4),(18,'TT72109064J','Đầm midi sọc ngang','<p>Đầm midi sọc ngang nữ t&iacute;nh, thanh lịch<br />\r\n- Trang phục thiết kế với form đơn giản, t&ocirc;n d&aacute;ng người mặc với điểm nhấn l&agrave; phần nơ th&acirc;n sau<br />\r\n- Chất liệu jersey&nbsp;kim cao cấp tạo sự thoải m&aacute;i tối đa cho người mặc<br />\r\n- Ph&ugrave; hợp với nhiều mục đ&iacute;ch sử dụng kh&aacute;c nhau như đi dạo, đi chơi, mặc thường ng&agrave;y,...<br />\r\n- K&iacute;ch thước:<br />\r\nS: 118cm - M: 120cm - L: 122cm<br />\r\nHướng dẫn sử dụng<br />\r\n- Giặt tay bằng nước lạnh<br />\r\n- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy<br />\r\n- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u<br />\r\n- Kh&ocirc;ng vắt<br />\r\n- L&agrave; ủi ở nhiệt độ thấp<br />\r\n- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Đầm d&agrave;i</li>\r\n	<li>Chất liệu:&nbsp;jersey</li>\r\n	<li>M&agrave;u sắc:&nbsp;N&acirc;u Sọc Trắng-Xanh sọc trắng</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','dam-midi-soc-ngang',649000.00,0.00,0,1,4,'2024-11-07 09:53:29','2024-11-07 09:53:29',4),(19,'TT42617077O','Đầm Bí Hạ Vai','<p>Đầm B&iacute; Hạ Vai nữ t&iacute;nh, nổi bật v&agrave; thu h&uacute;t</p>\r\n\r\n<p>- Trang phục ph&ugrave;&nbsp;hợp&nbsp;dạo phố, thường ng&agrave;y, đi tiệc...</p>\r\n\r\n<p>- K&iacute;ch thước:</p>\r\n\r\n<p>S : 65&nbsp;cm -&nbsp;M : 67&nbsp;cm&nbsp;-&nbsp;L: 69&nbsp;cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>- Giặt tay bằng nước lạnh</p>\r\n\r\n<p>&nbsp;- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy&nbsp;</p>\r\n\r\n<p>- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>\r\n\r\n<p>- Kh&ocirc;ng vắt</p>\r\n\r\n<p>- L&agrave; ủi ở nhiệt độ thấp.</p>\r\n\r\n<p>- Khuyến k&iacute;ch giặt kh&ocirc;</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Đầm ngắn</li>\r\n	<li>Chất liệu:&nbsp;Linen</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','dam-bi-ha-vai',599000.00,0.00,0,1,4,'2024-11-07 09:54:47','2024-12-02 07:11:46',4),(20,'TT62614229M','Đầm lửng đuôi cá tay cánh tiên','<p>Mi&ecirc;u tả: Đầm lửng đu&ocirc;i c&aacute; tay c&aacute;nh ti&ecirc;n.</p>\r\n\r\n<p>Đặc t&iacute;nh: Trẻ trung - Nữ t&iacute;nh.</p>\r\n\r\n<p>Thể loại: Trang phục dạo phố.</p>\r\n\r\n<p>Size: S/M/L/XL.</p>\r\n\r\n<p>Chất liệu: Cotton.</p>\r\n\r\n<p>M&agrave;u sắc: Cam/Xanh l&aacute;.</p>\r\n\r\n<p>Chiều d&agrave;i : S : 110 cm - M: 112 cm - L :114 cm - XL :116&nbsp;cm</p>\r\n\r\n<p>Lưu &yacute;: Kh&ocirc;ng tẩy, vắt. Kh&ocirc;ng ng&acirc;m. Ủi với chế độ thấp hoặc ủi hơi nước. Kh&ocirc;ng giặt chung với những sản phẩm dễ g&acirc;y xước lụa.</p>\r\n\r\n<p>Số đo mẫu nữ: Chiều cao: 168 cm. Số đo 3 v&ograve;ng: 83 - 59 - 86 (Mặc size S).</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Đầm lửng</li>\r\n	<li>Chất liệu:&nbsp;cotton</li>\r\n	<li>M&agrave;u sắc:&nbsp;Cam-Xanh l&aacute;</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;S-M-L</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','dam-lung-duoi-ca-tay-canh-tien',699000.00,301000.00,8,1,4,'2024-11-07 10:01:00','2024-12-18 21:30:19',4),(21,'TT24805917F','Mắt kính polygon oversize','<p>Mắt k&iacute;nh polygon oversize mới lạ</p>\r\n\r\n<p>Đệm mũi silicon mềm kh&ocirc;ng in hằn</p>\r\n\r\n<p>Hộp k&iacute;nh tam gi&aacute;c da PU chống nước, nắp nam ch&acirc;m v&agrave; k&egrave;m khăn lau k&iacute;nh</p>\r\n\r\n<hr />\r\n<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Mắt k&iacute;nh thời trang</li>\r\n	<li>Chất liệu:&nbsp;Kim loại</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-Xanh-X&aacute;m t&iacute;m</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','mat-kinh-polygon-oversize',455000.00,306000.00,6,1,5,'2024-11-07 10:10:06','2024-12-15 00:15:44',5),(24,'TT26216307X','Mắt Kính Thời Trang','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Mắt k&iacute;nh thời trang</li>\r\n	<li>Chất liệu:&nbsp;Kim loại</li>\r\n	<li>M&agrave;u sắc:&nbsp;Trắng-X&aacute;m-Đen</li>\r\n	<li>Gi&aacute; đ&atilde; bao gồm VAT</li>\r\n</ul>','mat-kinh-thoi-trang',500000.00,201000.00,2,1,5,'2024-12-18 19:35:12','2024-12-18 20:29:31',5),(25,'TT68084521C','Mắt Kính Slim Square classic Gọng kim loại','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Mắt k&iacute;nh thời trang</li>\r\n	<li>Chất liệu:&nbsp;Kim loại</li>\r\n	<li>M&agrave;u sắc:&nbsp;N&acirc;u-Xanh dương-Đen</li>\r\n</ul>','mat-kinh-slim-square-classic-gong-kim-loai',455000.00,249000.00,2,1,5,'2024-12-18 19:41:25','2024-12-18 20:29:20',5),(26,'TT25639302K','Mắt kính round plannet','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Mắt k&iacute;nh thời trang</li>\r\n	<li>Chất liệu:&nbsp;Kim loại</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-Xanh-Hồng</li>\r\n</ul>','mat-kinh-round-plannet',455000.00,289000.00,0,0,5,'2024-12-18 19:44:01','2024-12-18 19:44:01',5),(27,'TT59964449X','Vớ Cổ Cao Bộ 2 Đôi Kiểu Trơn','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Vớ</li>\r\n	<li>Chất liệu:</li>\r\n	<li>M&agrave;u sắc: Trắng</li>\r\n</ul>','vo-co-cao-bo-2-doi-kieu-tron',70000.00,0.00,6,0,5,'2024-12-18 19:47:29','2024-12-18 20:30:46',5),(28,'TT59281129F','Vớ lười bộ 2 đôi kiểu trơn','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Vớ</li>\r\n	<li>Chất liệu:</li>\r\n	<li>M&agrave;u sắc: Hồng</li>\r\n</ul>','vo-luoi-bo-2-doi-kieu-tron',70000.00,0.00,0,0,5,'2024-12-18 19:48:55','2024-12-18 19:48:55',5),(29,'TT04380752E','Giày Sandal Đế Bệt Quai Xỏ Ngón Cách Điệu','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Gi&agrave;y xăng đan</li>\r\n	<li>Chất liệu:&nbsp;Si mờ trơn</li>\r\n	<li>Độ cao:&nbsp;3cm</li>\r\n	<li>M&agrave;u sắc:&nbsp;N&acirc;u-Trắng kem</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;30-31-32</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n</ul>','giay-sandal-de-bet-quai-xo-ngon-cach-dieu',449000.00,45000.00,2,0,6,'2024-12-18 19:53:38','2024-12-18 20:11:43',6),(30,'TT10529205P','Giày Sandal Đế Bằng Quai Ngang','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Gi&agrave;y xăng đan</li>\r\n	<li>Chất liệu:&nbsp;Si b&oacute;ng</li>\r\n	<li>Độ cao:&nbsp;3cm</li>\r\n	<li>M&agrave;u sắc:&nbsp;Kem-N&acirc;u-Đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;35-36-37</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n</ul>','giay-sandal-de-bang-quai-ngang',449000.00,0.00,0,1,6,'2024-12-18 19:57:36','2024-12-18 19:57:39',6),(31,'TT24263850F','Giày Sandal Dép Đan Quai','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;Gi&agrave;y xăng đan</li>\r\n	<li>Chất liệu:&nbsp;Si mờ trơn</li>\r\n	<li>Độ cao:&nbsp;3cm</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-Xanh</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;35-36-37</li>\r\n	<li>Xuất xứ:&nbsp;Việt Nam</li>\r\n</ul>','giay-sandal-dep-dan-quai',449000.00,45000.00,0,0,6,'2024-12-18 20:00:43','2024-12-18 20:00:43',6),(32,'TT22348123N','Túi Xách Nhỏ Phối Tay Cầm La Dolce Vita','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;T&uacute;i x&aacute;ch thời trang</li>\r\n	<li>Chất liệu:&nbsp;Si mờ trơn</li>\r\n	<li>M&agrave;u sắc:&nbsp;Đen-Xanh</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;18cmx15cmx9cm</li>\r\n	<li>Xuất xứ:&nbsp;Trung Quốc</li>\r\n</ul>','tui-xach-nho-phoi-tay-cam-la-dolce-vita',845000.00,254000.00,0,1,7,'2024-12-18 20:04:52','2024-12-18 20:04:52',7),(33,'TT77587386W','Túi Xách Nhỏ Hobo In Hoạ Tiết Chuyển Màu','<ul>\r\n	<li>Kiểu d&aacute;ng:&nbsp;T&uacute;i x&aacute;ch thời trang</li>\r\n	<li>Chất liệu:&nbsp;Da tổng hợp</li>\r\n	<li>M&agrave;u sắc:&nbsp;Kem-Hồng-Đen</li>\r\n	<li>K&iacute;ch cỡ:&nbsp;19cmx18cmx6cm</li>\r\n	<li>Xuất xứ:&nbsp;Trung Quốc</li>\r\n</ul>','tui-xach-nho-hobo-in-hoa-tiet-chuyen-mau',809000.00,0.00,0,1,7,'2024-12-18 20:06:31','2024-12-18 20:06:31',7);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotions` (
  `promotionID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_type` enum('fixed','percentage') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`promotionID`),
  UNIQUE KEY `promotions_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
INSERT INTO `promotions` VALUES (2,'KM001',50.00,'2024-11-01','2024-11-30','active','2024-11-21 07:13:37','2024-11-21 07:13:37','percentage'),(3,'KM002',500000.00,'2024-11-01','2024-11-30','active','2024-11-21 07:23:35','2024-11-21 07:23:35','fixed'),(4,'TET2025',50.00,'2024-12-05','2025-12-05','active','2024-12-18 20:19:14','2024-12-18 20:19:14','percentage'),(5,'NOEN2024',900000.00,'2024-12-04','2024-12-27','active','2024-12-18 20:20:01','2024-12-18 20:20:48','fixed');
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `ratingID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rating` tinyint NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ratingID`),
  KEY `ratings_user_id_foreign` (`user_id`),
  KEY `ratings_product_id_foreign` (`product_id`),
  CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`productID`) ON DELETE CASCADE,
  CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,5,'ádasdaádasdas',1,4,'2024-11-21 06:31:16','2024-11-21 06:31:16'),(2,3,'Sản phẩm như quần què',1,4,'2024-11-21 06:31:49','2024-11-21 06:31:49'),(3,5,'Sản phẩm tốt',1,14,'2024-11-21 11:21:25','2024-11-21 11:21:25');
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('2MYvv3cfXGbyApUY0CG8o7fePuWMXydWnZQpKIow',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVWZPOXZhVlVWbUlQZVZ6dlR0eDdZa2FWNVZjUGpJY1FlbWdlbllhRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hcGkvcmV2ZW51ZT9maWx0ZXI9eWVhcmx5Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImNhcnQiO2E6MDp7fX0=',1734557853),('86ib9h3U33bCjBiUPFgBuBVwuz6MorvB1L5JvNiC',74,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiR2ZjV2tyNTFUeDNpTDdnSHJIZ2JWdm5wNVZhdGhYS1VsWWR5UFJqTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc0O3M6NDoiY2FydCI7YTowOnt9czo1OiJvcmRlciI7YTozOntzOjg6Im9yZGVyX2lkIjtpOjkzO3M6MTA6Im9yZGVyX2NvZGUiO3M6MTA6Ik9ETlQ4NDE1OTciO3M6MTI6InRvdGFsX2Ftb3VudCI7czo5OiI3MjkwMDAuMDAiO319',1734553725);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `tagID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tagID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (9,'Thời trang nam','thoi-trang-nam','2024-12-18 17:00:00','2024-12-18 17:00:00'),(10,'Thời trang nữ','thoi-trang-nu','2024-12-18 17:00:00','2024-12-18 17:00:00'),(11,'Phong cách công sở','phong-cach-cong-so','2024-12-18 17:00:00','2024-12-18 17:00:00'),(12,'Thời trang dạo phố','thoi-trang-dao-pho','2024-12-18 17:00:00','2024-12-18 17:00:00'),(13,'Thời trang cao cấp','thoi-trang-cao-cap','2024-12-18 17:00:00','2024-12-18 17:00:00'),(14,'Phụ kiện thời trang','phu-kien-thoi-trang','2024-12-18 17:00:00','2024-12-18 17:00:00'),(15,'Thời trang mùa đông','thoi-trang-mua-dong','2024-12-18 17:00:00','2024-12-18 17:00:00'),(16,'Thời trang mùa hè','thoi-trang-mua-he','2024-12-18 17:00:00','2024-12-18 17:00:00'),(17,'Giày dép thời trang','giay-dep-thoi-trang','2024-12-18 17:00:00','2024-12-18 17:00:00'),(18,'Thời trang thể thao','thoi-trang-the-thao','2024-12-18 17:00:00','2024-12-18 17:00:00'),(19,'Thời trang trẻ em','thoi-trang-tre-em','2024-12-18 17:00:00','2024-12-18 17:00:00'),(20,'Thời trang vintage','thoi-trang-vintage','2024-12-18 17:00:00','2024-12-18 17:00:00'),(21,'Thời trang streetwear','thoi-trang-streetwear','2024-12-18 17:00:00','2024-12-18 17:00:00'),(22,'Áo sơ mi','ao-so-mi','2024-12-18 17:00:00','2024-12-18 17:00:00'),(23,'Áo thun','ao-thun','2024-12-18 17:00:00','2024-12-18 17:00:00'),(24,'Quần jean','quan-jean','2024-12-18 17:00:00','2024-12-18 17:00:00'),(25,'Đầm dạ hội','dam-da-hoi','2024-12-18 17:00:00','2024-12-18 17:00:00'),(26,'Thời trang công sở nữ','thoi-trang-cong-so-nu','2024-12-18 17:00:00','2024-12-18 17:00:00'),(27,'Thời trang tối giản','thoi-trang-toi-gian','2024-12-18 17:00:00','2024-12-18 17:00:00'),(28,'Phong cách unisex','phong-cach-unisex','2024-12-18 17:00:00','2024-12-18 17:00:00');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_google_id_unique` (`google_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Quản trị viên',NULL,'admin@dntshop.com','116 Nguyễn Huy Tưởng, Hoà An, Liên Chiểu, Đà Nẵng','0987654321','2024-12-18 14:17:01','$2y$12$MOj/YvvMs4kjPBrcgtUQQevy4.G6.GXxmBg7FsqeaShyGlOwgmG6O','/uploads/avatars/1731933689-673b35f93a224.jpg',1,'6d7CWFCt1GhOBzd3rIUaAeHtHsEq3eAZ0ml6p3POwRxxi9fBZC7B1ucQPP2R','2024-11-07 08:04:18','2024-11-18 12:41:29'),(57,'Nguyễn Văn An',NULL,'an.nguyen@example.com','123 Đường Nguyễn Huệ, Quận 1, TP.HCM','0901234567',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-10-10 01:30:00','2024-10-10 01:30:00'),(58,'Trần Thị Bích',NULL,'bich.tran@example.com','456 Đường Trần Phú, Quận 5, TP.HCM','0907654321','2024-10-12 02:00:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-10-12 02:00:00','2024-10-12 02:00:00'),(59,'Lê Văn Cường',NULL,'cuong.le@example.com','789 Đường Hoàng Văn Thụ, Quận Tân Bình, TP.HCM','0912345678',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-10-15 03:15:00','2024-10-15 03:15:00'),(60,'Phạm Thị Dung',NULL,'dung.pham@example.com','101 Đường Lý Thường Kiệt, TP. Đà Nẵng','0909876543',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-10-18 04:45:00','2024-10-18 04:45:00'),(61,'Võ Văn Đức',NULL,'duc.vo@example.com','202 Đường Hùng Vương, TP. Huế','0932123456','2024-10-20 05:30:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-10-20 05:30:00','2024-10-20 05:30:00'),(62,'Ngô Thị Hằng',NULL,'hang.ngo@example.com','303 Đường Lê Lợi, TP. Hải Phòng','0943214567',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-10-22 06:20:00','2024-10-22 06:20:00'),(63,'Đinh Văn Hải',NULL,'hai.dinh@example.com','404 Đường Nguyễn Văn Cừ, TP. Hà Nội','0954321678','2024-10-25 07:00:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-10-25 07:00:00','2024-10-25 07:00:00'),(64,'Hoàng Thị Lan',NULL,'lan.hoang@example.com','505 Đường Cách Mạng Tháng 8, TP. Vinh','0965432789','2024-10-28 08:15:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-10-28 08:15:00','2024-10-28 08:15:00'),(65,'Trương Văn Minh',NULL,'minh.truong@example.com','606 Đường Phan Đình Phùng, TP. Cần Thơ','0976543890','2024-11-01 09:45:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-01 09:45:00','2024-11-01 09:45:00'),(66,'Bùi Thị Nhung',NULL,'nhung.bui@example.com','707 Đường Hàm Nghi, TP. Nha Trang','0987654901',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-05 10:30:00','2024-11-05 10:30:00'),(67,'Nguyễn Thị Oanh',NULL,'oanh.nguyen@example.com','808 Đường Tôn Đức Thắng, TP. Quy Nhơn','0998765012','2024-11-08 11:15:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-08 11:15:00','2024-11-08 11:15:00'),(68,'Lý Văn Phong',NULL,'phong.ly@example.com','909 Đường Lê Hồng Phong, TP. Phan Thiết','0910987123',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-12 01:00:00','2024-11-12 01:00:00'),(69,'Phan Văn Quý',NULL,'quy.phan@example.com','1010 Đường Trường Chinh, TP. Đà Lạt','0921098234','2024-11-14 02:30:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-14 02:30:00','2024-11-14 02:30:00'),(70,'Nguyễn Thị Rạng',NULL,'rang.nguyen@example.com','1111 Đường Nguyễn Trãi, TP. Bắc Ninh','0932109345','2024-11-17 03:15:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-17 03:15:00','2024-11-17 03:15:00'),(71,'Vũ Văn Sơn',NULL,'son.vu@example.com','1212 Đường Phạm Văn Đồng, TP. Nam Định','0943210456',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-20 04:45:00','2024-11-20 04:45:00'),(72,'Đỗ Văn Thắng',NULL,'thang.do@example.com','1313 Đường Điện Biên Phủ, TP. Quảng Ngãi','0954321567','2024-11-25 05:30:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-25 05:30:00','2024-11-25 05:30:00'),(73,'Phạm Thị Uyên',NULL,'uyen.pham@example.com','1414 Đường Võ Nguyên Giáp, TP. Đồng Nai','0965432678','2024-11-30 06:20:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-11-30 06:20:00','2024-11-30 06:20:00'),(74,'Trần Văn Vinh',NULL,'vinh.tran@example.com','1515 Đường Lý Sơn, TP. Tây Ninh','0976543789',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-12-02 07:00:00','2024-12-02 07:00:00'),(75,'Võ Thị Xuân',NULL,'xuan.vo@example.com','1616 Đường Hồ Chí Minh, TP. Vũng Tàu','0987654890','2024-12-08 08:15:00','$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-12-08 08:15:00','2024-12-08 08:15:00'),(76,'Lê Văn Yên',NULL,'yen.le@example.com','1717 Đường Nguyễn Hữu Cảnh, TP. Long An','0998765901',NULL,'$2y$12$oEssKjQht9SlMaZzxRN0iOoytqDjO6q5dRe9z/NSSazC.5jMqT3yC',NULL,0,NULL,'2024-12-15 09:45:00','2024-12-15 09:45:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-19  4:40:25
