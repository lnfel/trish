-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` varchar(0) DEFAULT NULL,
  `street_address` varchar(0) DEFAULT NULL,
  `brgy` varchar(0) DEFAULT NULL,
  `municipality` varchar(0) DEFAULT NULL,
  `city` varchar(0) DEFAULT NULL,
  `province` varchar(0) DEFAULT NULL,
  `region` varchar(0) DEFAULT NULL,
  `zip_code` varchar(0) DEFAULT NULL,
  `user_id` varchar(0) DEFAULT NULL,
  `admin_id` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` tinyint(4) DEFAULT NULL,
  `first_name` varchar(6) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `email` varchar(17) DEFAULT NULL,
  `phone_number` varchar(0) DEFAULT NULL,
  `email_verified_at` varchar(0) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `remember_token` varchar(60) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Keqing','Driving Thunder','keqing@qixing.com','','','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','CrBPhMezQayBM3WDURVu92BA60ElR7iiRGMeU3lMghYysC5PazzmyZzDBfMW','','');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` varchar(0) DEFAULT NULL,
  `service_id` varchar(0) DEFAULT NULL,
  `slot_id` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` varchar(0) DEFAULT NULL,
  `connection` varchar(0) DEFAULT NULL,
  `queue` varchar(0) DEFAULT NULL,
  `payload` varchar(0) DEFAULT NULL,
  `exception` varchar(0) DEFAULT NULL,
  `failed_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` tinyint(4) DEFAULT NULL,
  `migration` varchar(60) DEFAULT NULL,
  `batch` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2021_02_13_235057_create_admins_table',1),(10,'2021_02_14_001022_create_addresses_table',1),(11,'2021_02_15_151358_create_slots_table',1),(12,'2021_02_15_151359_create_services_table',1),(13,'2021_02_15_151360_create_appointments_table',1),(14,'2021_02_15_153836_create_requirements_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(80) DEFAULT NULL,
  `user_id` tinyint(4) DEFAULT NULL,
  `client_id` tinyint(4) DEFAULT NULL,
  `name` varchar(0) DEFAULT NULL,
  `scopes` varchar(2) DEFAULT NULL,
  `revoked` tinyint(4) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL,
  `expires_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('17193df77b85632720edd4bbe9d1e484009190db73f3d6be8df1d58498609f60a536aea48a294cd0',2,6,'','[]',0,'','',''),('1b4244174836c7e2823a8b49148758938d600f25baf7a0eff9e1f2c3e66731308991e65aaf3d98c5',2,6,'','[]',0,'','',''),('f1290d95c6ed7996d8833ec31f9574bcc6d449e743757829fa563c6cf02dc1ba6fc761c4de7ca774',2,6,'','[]',0,'','',''),('21bef5b1c82d607ac23e84be5173ee2a0a0745e0900f3117cb167c8a1b94a13a9d34e0f3d7b62270',2,6,'','[]',0,'','',''),('88fc5b50d90b9a6be8dcb0ac8e93c26e31b4c5014a77e3f198b01f997c944ba693a4b3128515b353',2,6,'','[]',0,'','',''),('4afb621127448e8e4ab6f6cdba9348380e514e982201a77309c16f0ff2b7ee4f8d0c3f8c7e25fdc6',2,6,'','[]',0,'','',''),('e99c2054b5290f196425c8528fbe8d3910dc4962067ea8babc861063e96abb4c255729e86f1a84f6',2,6,'','[]',0,'','',''),('69411c7522545c4c35111a8946bc67e92b8498da848a13c41c378047a9e8af0a0fde06fa74497479',2,6,'','[]',0,'','',''),('6abbba50c58e9555c6a5aba6ec95f6a49203c93e56af8b9bbd4e451f371d75328914c43c68018662',2,6,'','[]',0,'','',''),('3b3cbe0986d36fa7d66502581d767f320430103b3653040552c4c3a1ca298162e8fb85bf611dfc7a',2,6,'','[]',0,'','',''),('0a6c6284b8158a76eca552058e649c4bffd75457ba8d996593a69eac9f13bc140dad8816edac2ddd',2,6,'','[]',0,'','',''),('f6f8a0abb793f4da39ceee4bb82189613147e303e1f66b2a6758b1cf1cf2787232951b3e94145a3a',2,6,'','[]',0,'','',''),('1dd49ad33d5b6466b748b8868e60306f6f83552690d385ce38bb1e8af02b2355a5ee5a203297db51',2,6,'','[]',0,'','',''),('317d656f842df3b7cd7b0aa008ac43269916b8e9f290ec67fc2a85e111236134c6c16558af08b118',2,6,'','[]',0,'','',''),('d7ad5fbcd48f399cee46908af50a70450291a901f84265ba28ab44a9a2e5acdc1a45be3a7157543c',2,6,'','[]',0,'','',''),('ec0406062505517c8224647009d67a85003d7cad6365ac8f30b82d1714a4c0ad1621a05023dbd931',2,6,'','[]',0,'','',''),('8b56dd91ba80b5e14de18566ab432e58be9299da716cd3869fe2cd6c9452da0a3bb69165f401324e',2,6,'','[]',0,'','',''),('c332973b7b62577e415c4adbf5df630aa440ab3e36c339f38175def6e3f237f8526e179af8fff626',2,6,'','[]',0,'','',''),('18333808c3f5468dddc31cf0070c4751d383bc00167af3b78a0a89d3d2ae741155ff6ad65dab5f57',2,6,'','[]',0,'','',''),('aee0f940d23b714149c12e9ad38744cb591b914e7288e02fdec5db2c21898fcec5b5bd88b7b2b34f',2,6,'','[]',0,'','',''),('fa460dde298a1a532862a00be91466c072a514223d74e8398e88baf9e4d4542767ea3e302304b11f',2,6,'','[]',0,'','',''),('361ce9de1af7e35cf44210c6be8a52bc9aaa4f784b7465948ca741fda93e1d7b41d69370bf125cbf',2,6,'','[]',0,'','',''),('dc167ef830539a43d0ed2bacc2c629f9729361699354cb74b1e35229932565f0ab6ea141bdcd96f4',2,6,'','[]',0,'','',''),('cfd8d2ea7540833721b3aac9f4440bd7b87d794ee359bcee91ba7421259499bebf4cd7cd53bf0add',2,6,'','[]',0,'','',''),('f30a5dc300243bcc8c5a0bb95e617408d8465d595ae12bdab34dbcd0ef786de02826dc755e3cf259',2,6,'','[]',0,'','',''),('75c08cb0dc74d95a5a842f50fa045fbe191d66ef21a03b91ab96de2089c91305a57e3d72ee5c4fd7',2,6,'','[]',0,'','',''),('532813528a920d2c2c0de4f9d0c70327f45aa66baeff7ab579f84547f544b8997d9083d03660aa99',2,6,'','[]',0,'','',''),('cc5c30c9a0f2b7d0eb63c8dfab933fcb29bf2db9ea021fcccbe7f3cd53132e9a8c48a82f32d84d89',2,6,'','[]',0,'','',''),('0966851f5571bc91ca1cb18e7afeffddb5ad856626b71721ddb7cff54b5daa321b0017cd2afe42e5',2,6,'','[]',0,'','',''),('73465636fbac0dc573737d3fe23165cf695a8c94128c05ca2ef77ec9eb2b3b3f67edd403c2b18623',2,6,'','[]',0,'','',''),('f501d22c307ed349e13a5709c041d47b36ebf28fa1bc6e8c096fbc56ce75017e048190a0d265df34',2,6,'','[]',0,'','',''),('216b4e1f30f2a57cd095ad45ac15f475f64673648dec13ece403534122a87d21e33adb0519b36828',2,6,'','[]',0,'','',''),('c456e566cc8bd27c8dc8dc371e72d06bdf39b13e3401cd401b35f2e6295952d1b5b8433cb3c5d26a',2,6,'','[]',0,'','',''),('f7a36215f97045d5711ef547e837a156b2f51f079e7d1a5f16e4da08cceaecbd93e9a1896cdaa1d1',2,6,'','[]',0,'','',''),('0282f5858308587cc90877863e2dd1bd200fcd9a7c805474ae4d0379627ce0a5377d133cf049f501',2,6,'','[]',0,'','',''),('d216567bf7f10e7f1204431a2f11e7a215a4c3adb1b8cb5bd0a225111a200110b5e0caba84ad302a',2,6,'','[]',0,'','',''),('a610cb5e31a64de7232e9a1077113a8809f61ce5ced4b0f9f3caf51a1a48a93fee586c456a8f6cb6',2,6,'','[]',0,'','',''),('854df7d6a54cd6aad37334ce26e7d25a8432fb62b0b4677e18a1a48da692dc54efd5164a6d03683e',2,6,'','[]',0,'','',''),('0c9096e21395f2e23ee8024a0a50151944524eaaaac1b3835052ce0e7d8d0b20c02d6fc5fb087de0',2,6,'','[]',0,'','',''),('215703379d2b14bb26b957a0d73b35be79ffdaddda198b63d7ffcc92f6fff808684f37419db526a9',2,6,'','[]',0,'','',''),('249a921803c750d97547765b4183b84587e1e37fbf2e350f03001521a0076ba6bcc0f677d290b78d',2,6,'','[]',0,'','',''),('495889e379f6c1078bd044f46d36e1efa6f0ba7852f2c6ac96ee993d2367e5270d9e3dbc27ae4b55',2,6,'','[]',0,'','',''),('e866d636f11b4482e361d95e0ba73b6c7bc4775da6e4236cf001f0cb45cb6eff476bd8411a80c06a',2,6,'','[]',0,'','',''),('e43ebdc805fcf604c32f63fe80b1e1585694a71934e8d77bfc668a422285deb5302e105800cb95ed',2,6,'','[]',0,'','',''),('4503ec30a6578d83c754167e83aca4b0d1825fc7e0e0c75552af0912dca6ec4b8cc575940ac2e87a',2,6,'','[]',0,'','',''),('1fcef2f9a2bdba07a2e6b2515e4aff022a48d34b6df2f8930b01b519bb27a6389648830308d41669',2,6,'','[]',0,'','',''),('e707bcde02f80aac0f723283c4283ba24d2189efd1e0c7a511b2a80687402df880a6035bf33193b2',2,6,'','[]',0,'','',''),('4333edfef4a41102066f3df09fafa6e9c61ba4b45073d6d8f0788816ea107c894f302512ff287043',2,6,'','[]',0,'','',''),('9fbcccb3887ac2757596d782069bf88630b8f5761f7df8800781e0cfc68e1a92b159fb1ec7890ff5',2,6,'','[]',0,'','',''),('b73a3c9198105595f15d791750b6c6f1e82b51ede8bd1ceaa177bb9023a3b88ce95ed4fa3f569edc',2,6,'','[]',0,'','',''),('84b35f051e809ac0d31875ba229c12165034a4242680657de352e7653fcab5446a89d37644679bc6',2,6,'','[]',0,'','',''),('a106916fbad174c922cfab10ed3c1dc8b8106191cfb49ebead82ff83caa94a9362736e0d7f127831',2,6,'','[]',0,'','',''),('dd9d5cd4603affd563180518f89c74a308df5fd0843c0ce00ed626ac3a83ec8364b87478e246cf9a',2,6,'','[]',0,'','',''),('d35fa8f6ef6d20f8817bf47c32ff8f2a53fea635e235a07fb9f4fac6137ba914d0e5bd7508c324db',2,6,'','[]',0,'','',''),('f5ce1bd35f6be00c55c982896c252d3eb8a214f0135c3c2896118e4b2da3c52b699e019ec07228ff',2,6,'','[]',0,'','',''),('10b86e242c421cfa90b1332441a47a5c1cf180a3fbf9b961069000119ab3a78a3add117d5111b7f7',2,6,'','[]',0,'','',''),('627b31d79adca181c82273810faa9a1ef625e19ead7a6320b34f3b493420eb0ee469feeb0a4ac9cd',2,6,'','[]',0,'','',''),('63d16112021c53fea0ebf03d4b99147929531d20341332ca73fdc81dcd2f40f3a8c06b84e77e20ec',2,6,'','[]',0,'','',''),('61f825827517ccc0e5e057907a237c075c27c76d7343fce61000e7d37e5c2e9e898d5ac7dbd8229c',2,6,'','[]',0,'','',''),('3e6990f84d15ba84d9215146432b76a143a2cc8bac5d558f6d3dfa9b1f7a9d0a64a9f4588af77758',2,6,'','[]',0,'','',''),('34c38aed01e3df34245b4ff3d0b28a6e9218af253c909a766a2bede84c26f1d64350cde7dcdf8fd7',2,6,'','[]',0,'','',''),('f1f90f7de79afbe01c76af52e84e17032a31b88cbd7357221b9dcaa5e0d13e73f048587e84ec8f1e',2,6,'','[]',0,'','',''),('665b0bb3de4872f06870f2ef5d77f76f2dc3c3321b4cc9606b1f615ac1133e6e186a49b509f2f87e',2,6,'','[]',0,'','',''),('548587359fb476377a4986b2f4e091f5824906db8b67158f86a5b7df8e802244230dce8d0435421e',2,6,'','[]',0,'','',''),('31773b0f63e90f6f0900385538d75167ba80a5631d36231b9b05d4fb74bcd5d6ddd374db294ed330',2,6,'','[]',0,'','',''),('892ec218fda3244048699fd8aaf887fa4718476a78dd55321e3b8b079309facd08155db623d0ad52',2,6,'','[]',0,'','',''),('ab7b014b9292d054dc2e42d067ad1e2d00d929b05fd9e1212f5bf574f5f0ffa90b0c10536d76a1bf',2,6,'','[]',0,'','',''),('82ae910a100c1045977eee36806e0751158e3f01af3c365fa65e57aa6f5b96fe04e8b43cfdda2f0d',2,6,'','[]',0,'','',''),('b3047a8b8845787247095e286b6e71707f64386b3775e5e5480c08119667f1315555edf66a701f7b',2,6,'','[]',0,'','',''),('79aa9fcdd809a349441e802ae6ae2531d3881afd52fbbacc306640c17bd82ff495e8669de4b3bc02',2,6,'','[]',0,'','',''),('ef2af68781b46d5457c5cb4fbd6b24295c244cbdcc69e16abcaa651cb5ca885cacef1cbb9d8aa504',2,6,'','[]',0,'','',''),('c015e94d0afb91e3d01a4299c0c0d25e61195038bffc95852f7a054b2dcbf658b87ad42ee6f7500b',2,6,'','[]',0,'','',''),('50563eea8cd0b3c02ec98d42422786868caeaf6795a46fb50422bb9f7036a188c9231839076ab26d',2,6,'','[]',0,'','',''),('4d607c770d6ef5247a92d66fce0b918069aa4111f109766427d416a293cd58c01a3fdec569398c25',2,6,'','[]',0,'','',''),('229cd652173af8074a2dec3b10dfd77e869a274ca9067c99a929454c31507b91f81d60085d7f4578',2,6,'','[]',0,'','',''),('6904231319ee77c98193f29fb2e0e90346bcd0f2f0769ef03d746c42d23541713cedef7a89607430',2,6,'','[]',0,'','',''),('bd0fc979779f2977d9ccd7857cd87feb37c7bfecb3bf810515251829e7652a8c410cae33cbd96f60',2,6,'','[]',0,'','',''),('2308476c56e0d9f54e5e70fd026a8bd84309dead12e6626500cd8876090bc18af58e89d725d2233c',2,6,'','[]',0,'','',''),('29f2167fb488137a8530acb83b9206a8ae48b0f14a1bac9cb35cf213ec347dc1a2c126d6d67b37fd',2,6,'','[]',0,'','',''),('576f864e25e9791612eeedd156e5e98f9bcdb0477209d14d2ae93e62570fdd98958d82b13ccd86d1',2,6,'','[]',0,'','',''),('2f623c66a53138a7f7a5e5d2818caa2b116782bd1d9e7a6bb37a67a776d38b674ea45655d6b4fe92',2,6,'','[]',0,'','',''),('4b80674447760be41088387d2da954a247827fc47abdf2116b5a6c29b62ac81469773dc00e649482',2,6,'','[]',0,'','',''),('768f5f7bcc7eb772dde181ec6785b331015018185898fc85ec1cd3ec65d282950f515888124a8287',2,6,'','[]',0,'','',''),('0da3605a3b980b849976e0d8443bcf87ffeab71415fefb70b9143e98e8719399299270bff60dda04',2,6,'','[]',0,'','',''),('53dd8cedb9c04bef3cb2f455ca17f5576760fb652ebf0af8f921b0efa35c3ee5ff985a2c2062eee0',2,6,'','[]',0,'','',''),('18e18e7f3f161948b34ef08b83506bc52c950d20f9a243c2aa383325a1bbdefb4c8a325fe36ca9d3',2,6,'','[]',0,'','',''),('8d8e429edecd86d41fa84b9d5e97c0b6239846c221c24f77e92383ab2fe2dfab9695e4c0bdcde003',2,6,'','[]',0,'','',''),('7349754ac9318232c71aeafa772d8025df9f43f12c57281c32e85ac115c07867c21ac6cb70a4e8c1',2,6,'','[]',0,'','',''),('bc2f4e557992b7089e913194e755fdc20f7fd488ceec12dfb293e09a894084a0f8596869b3efb555',2,6,'','[]',0,'','',''),('7a23c59f95e379a590019b248aa9234cd88378d2ba4844aa55efa087061c7b404efa43b6585a0545',2,6,'','[]',0,'','',''),('061c7afea8889134180898327fbad530c27adf5f01815c9469bd69959c6565018bbbadcff1abb171',2,6,'','[]',0,'','',''),('943a9f4eaf040a930c939573762f7cb0ce7b1359649cde61a23dceba713a58b019ef648d2973e1fb',2,6,'','[]',0,'','',''),('d8b16e94eb7b61d300e95cf5c87c014149cfd1ae70d9215eecdfd664709fb28d3e24832a1c4cc4a1',2,6,'','[]',0,'','',''),('9e4ed722e4cbe7949c069b981ea4b460379802a97629254a326af9386c68c6a0f89d2dc02040733e',2,6,'','[]',0,'','',''),('d8f3d95fa18c6126c620d448a9508c3b2f4223bc2c6496cb614dbfde6ebdbbc35551413bd635ca92',2,6,'','[]',0,'','',''),('6ef0e84f041c9be2d7a88f1a880c2c608dac3f5c9eeddc9fb2bced673b74d75874e870ef1ec889d5',2,6,'','[]',0,'','',''),('d5377a4a0546c5e3e0929f00e7e60399d471b5d53185a0e18c242ca6f7c908deb72679cf2e1ca1eb',2,6,'','[]',0,'','',''),('efe3fce782cb564ec7a7e23ed509e4f559486fb3e019a5bd3a01b331908ea6603b831621fb239b32',2,6,'','[]',0,'','',''),('0b563920a6cb1275543b0be00b6dfb84322df9804cc7efe25b414605e094cc8fce6451fb1ac60f9f',2,6,'','[]',0,'','',''),('d535fdd9d8288490e01757932b142f31485263d917fe343df2b2d9cc0270dc4e364c7238d75d4876',2,6,'','[]',0,'','',''),('520d227be04da172185e219dedf8b73b4eca95088c1221a87cb8383ec6a8b7b497e9ccb4e8d469d8',2,6,'','[]',0,'','',''),('69fbdd118f0a12e4d02ca5e899d3eb7aa0faea6586f507fe222664cbdd264d05d69770ea364b5203',2,6,'','[]',0,'','',''),('b70c3b77abde919eaabe0fa52ef323a502d6116c869f10f4da8c4a0749153ab9213eead52f612faa',2,6,'','[]',0,'','',''),('b6385b46d870989917c4979c5616c0cab9cbe1643253ac4550ab77cc7a1fd24d517999fde42f87e9',2,6,'','[]',0,'','',''),('e056a00f7186462581d5b4f92a3bbf3afbab98acfaf8c00cea12375084e3f0661e2458b92d51ccf5',2,6,'','[]',0,'','',''),('7b156e2598e42d75a755b60cabe00b056e5524d3326d07bb0b993876b73a2cd55f20f5d425eda5ec',2,6,'','[]',0,'','',''),('0194dc1df6b4ef555323421007d5ea27560b30cd2e3af4c0f0447a00ad90486d7557beb6959b0472',2,6,'','[]',0,'','',''),('1b710e369add0d3104dc52e622e5a4404bf35e6a9083ee9863ee056bb4155d954036ead5a82c8c72',2,6,'','[]',0,'','',''),('51ad337b1c3808dfe0efb11eaed76243351dbd25994247bc6c81325efd4f94449f6396aa4c72716e',2,6,'','[]',0,'','',''),('5e31a9c0e8cfc4f24ba955e310d1fdea5e8415676d873fc83f6589e7cc36f5e6234906d3ca71c406',2,6,'','[]',0,'','',''),('e9e0a8516b0c4a8000393ee5df8974ded30e6363e868588e260adc276ebf97348daa6fdc22d4cfbc',2,6,'','[]',0,'','',''),('bdd2555465797ec678c93cd1239187bd72c18c801d140179bb7dc6b72824f8c2d8b2472a946158e3',2,6,'','[]',0,'','',''),('dae4ab405b35c50bd8a6da25331a0613066d5065bd4d6aa874d3203d0398b6f4cee0e2fe2d9c7b13',2,6,'','[]',0,'','',''),('5ed6a94eac64e7adf967ae221e93ac2d469db803211e6327b047658647cc9ffdc3e1be2d944bd500',2,6,'','[]',0,'','',''),('6370e9c47df4d06026b5e614e7894d454b857fbb7a8403cab5cb08f8816c1b355bb4a11be3e5cd69',2,6,'','[]',0,'','',''),('7ff229761a3fc80210012b7c3aa4c7ff88b6d4152cca8f11353edfe0c587c324c14f2464a121cb98',2,6,'','[]',0,'','',''),('73e13070e4ca137ccb0c223aeb598cc2a99b4fda8adaa5ec4e21d97b7153834c0ba6ad4c2b09f03e',2,6,'','[]',0,'','',''),('a69d81620ad29d7190e06c37e4c0d187881aa8bf2c7fe6968006194cc54c0c15559fa579d186acb9',2,6,'','[]',0,'','',''),('2216e5bd77bf74cb4540e2f651c9752f3798552d211507a866352fced081904aec96874e95e0ec00',2,6,'','[]',0,'','',''),('9612a37ea6f8ac3e09573202fb5ec96979995daf5a91a16fc1e348c410c37b83d636deb2c3412479',2,6,'','[]',0,'','',''),('6b0224e35efc637d7b221e2740325923259797f53924a9f458a331ace224149bea935784e5ea2cf8',2,6,'','[]',0,'','',''),('6e2293c1c6b0450f823b942a4486b8273c2ce4061c998817efdcf1c90febf226e663e02babd99475',2,6,'','[]',0,'','',''),('e32c953326fc02865c42ade52e7ea385eccb826f586b5b05d50293587d1cf146b86535121421dfba',2,6,'','[]',0,'','',''),('896ebf8f736f347b986cd1c27546277d4341e439d7de901f0215cd721a4e1495e4f446a2591b1e64',2,6,'','[]',0,'','',''),('d19a2ae2a22b870bf026294c1ced34908b776e986a5b558d27fb8f6ed59a5333be1a07f810c101f0',2,6,'','[]',0,'','',''),('9b8c79ad8c5ad6fed48ebdb26b9c1e91dc56bfd16a50db2fcea1df9eeace1c85e7b18f8a1cc3d6af',2,6,'','[]',0,'','',''),('e16ee9b5ad654219881d2a22a5b0534daa0ede0d8fe05bf537a4b80236cb48f481a5516254d5e186',2,6,'','[]',0,'','',''),('c01f8ac2a3054b38e1b26e46ca41d884c2b106c94caf62b4064755add3c030b6dd9467e5b5c60a61',2,6,'','[]',0,'','',''),('d775d8b2dfa0bb62048426697da37e7c60221e71f28ff11b28a8f14ca92b9505acf5c280e28c454d',2,6,'','[]',0,'','',''),('906d51d4dbd12eae5b941a6c20c0571ce7adea0bdc9484cdd50b629d5b25f125747aed9a5666c84f',2,6,'','[]',0,'','',''),('4c93587101129bfb6cfdfb17b2b4c6f421d915a6e08cfde4304e64474ad71cd8539fc13d1a4601e0',2,6,'','[]',0,'','',''),('bf3c452932a082d77b90dfd9a84e07287b0efff58592f0304c1b1a3cad7149ee305f28fe04026e23',2,6,'','[]',0,'','',''),('3c852c120e2d8014e9185ded78c283b51a92fed3c59f3dde9a9f0496ac233206ce2095ad20d55408',2,6,'','[]',0,'','',''),('64145559f290909d64d8b61a2be8c843ae49830d00fbfaa4a912100bf4f9a3dc19547e65804b6d94',2,6,'','[]',0,'','',''),('41284da2a5f719de86d0e3d5a8b19a697b704544ae563c77baf33dee04290ebce44a7d7077d69fa7',2,6,'','[]',0,'','',''),('ba1780fabfd90f2a290ff0c6a5ec695eea85bf450e0e951b000925954f0c016bc312e8d9a9dcc390',2,6,'','[]',0,'','',''),('ad9bedde9337c64deba8cf3af1977b4bd76e55c2ee4b54d4c41a0c00c271f216b6d68f0deed1987b',2,6,'','[]',0,'','',''),('2e1fe019c46c35e8dfbb8ed0c31d23af69e20d89694fd133cef514bf3e3db65e300d9bf37be2b796',2,6,'','[]',0,'','',''),('7ad24351f23a046ead7c7220cc1277cee596ef9b0c78886249cfb1c39b71fc3f8733726e0cf90910',2,6,'','[]',0,'','',''),('99fca6ac6ef2534ff95f885942e10560612d9afcd8455e46f290932f82f05b3cd08aaed81529e16c',2,6,'','[]',0,'','',''),('e4c5fc1aa54dcddafff0f9f3a94e619798dc91dc050c8d6c21860a4ce022409f75772a5ba83cf845',2,6,'','[]',0,'','',''),('7367b3476d1fec998babe586bbf8b36544d3dde287ab89e08aa8d28fe2799c65d2f1118c8c13d05e',2,6,'','[]',0,'','',''),('23396679d5c80bc3494da7ac476fc0c6b9edd5e691ec01613369bcb9894e3803980b690aef9df190',2,6,'','[]',0,'','',''),('4c5d06aa744e707db83eb23d12e43e88bc105e30dd5d7627717f765ad3ca9a819ecbae643e89c680',2,6,'','[]',0,'','',''),('d1ba647c847b3a71aac7e606f5dad177ae20428556c18c16b540796f8fdf53c2b07340d68108cd01',2,6,'','[]',0,'','',''),('8800e63eb81300f54f750bf8fb590025aa641d287d7f678af10e74079cf2aabe2082cb7ca489c0af',2,6,'','[]',0,'','',''),('f087517fbc8d166a33dda71d3ded7617a4eb3e276f208593c182af6603398110c9b78a613d8bd81f',2,6,'','[]',0,'','',''),('3403ea4a1a76c019d2cb356f763b7655cd8dc02fa2a194cf52d9c31d99e74f1811001f6d7c5a0c4b',2,6,'','[]',0,'','',''),('b7bd8a45988f8db51dcaae60420e5f02f8a4c732002b68794217a3475e1dc5916735e291f03a64a5',2,6,'','[]',0,'','',''),('d528ffa3e34ee27b9007e7dc8218972ed7bbe609d148ed8fc9fb37c3c4a9c8f647b3c2a3d1e03267',2,6,'','[]',0,'','',''),('2dc7328dbe5795a0281db277aca84d7b76dcf06f10d7611e18e9566c8528b3920ed7c3d7d6a66a36',2,6,'','[]',0,'','',''),('c700a69ca67c39becf75bbc778c8a07da46230c2afe2e612d8294babd5f52cc5071daa341c8aa12b',2,6,'','[]',0,'','',''),('927fccf6e4c7d893ae3577c6a5654485597bb85b15922f5f524e8e2074c50b7f6d730fc8f667b210',2,6,'','[]',0,'','',''),('634b170b880b674968b5e6b2244d52353e49cf69bee61c137ffe5b986f44166b37b9a8bd9f7ffe7c',2,6,'','[]',0,'','',''),('528ade7576fa077c6aed730b59d55e5b46198c6da76be8374c093331562b3a8f96bff0574d49315a',2,6,'','[]',0,'','',''),('4a4d57017af3e809ea6e31a8dac1542ec24e388237c87ec9ed44d8bb424be870ad2bea1644e12a76',2,6,'','[]',0,'','',''),('2c976ad93ca43da4a5f45d1550647b18d4d760d89f88571519cca534eb8a9f3c00b04e7f978d434c',2,6,'','[]',0,'','',''),('9b910193b21045bc3fc32d4e01f7d000c4b4d67b5c98d038ff9fbc62d622c1dbfd41d6475b1731d0',2,6,'','[]',0,'','',''),('a09a19ce4a3dbee5885cd78469be25a93cfeef99a3bd3bcf90f0078c8a772d4a8b52fb9bf3047cb0',2,6,'','[]',0,'','',''),('c4308f0bef40716db7c10cc046fb5eae3586aac2905f01b9f33ac6e93a581bab97ceace6d5de0a84',2,6,'','[]',0,'','',''),('44d7f956e9bf93695525224dd03a80da3fcf65aa42ab9f3fc6c01ebde02d0051164dc9ea6d78729d',2,6,'','[]',0,'','',''),('24670cddd1b3b2a65e2dcaa063c762cd35cf7aafbc18ebee63be31ae8b093c3483fc531c62595503',2,6,'','[]',0,'','',''),('9dfdbaec04e1e3c9d246faa0788f6c27620e1c6b5b09c49a15eb13c328d1457c6230405dfa3ae575',2,6,'','[]',0,'','',''),('d66e8c723f544fff6bfdf8f129ae79630a77f0a9e9c2d20c6790c66e8e734cd5ea2f9c03bcf53354',2,6,'','[]',0,'','',''),('c4832c53e83c4aac19b827ff6662a82583c24630a4915ff449229fdd383869a47e92b7e50eca1f2b',2,6,'','[]',0,'','',''),('b01f32d86151275ee62e82b301b6a0bc1bacaad8d4876258a3fb0137bcde356e086fb5ee730a2b10',2,6,'','[]',0,'','',''),('35a6872d54b5ec913e5b65f51430556936d652bfe226a510177f101373f977fdb39272e5c3d53b13',2,6,'','[]',0,'','',''),('ad4be5282eb5ae5f990fb4de18c155e99fdc56ecd3a261baa9810c2de897eb3837c1f3f618227c32',2,6,'','[]',0,'','',''),('432661435b67b92095f35e432d5ae4d7156dcc80e32bddd491be2e074406f0fc95ba1f7c7b6fee7a',2,6,'','[]',0,'','',''),('49df4b0d45f7e328b3b5ad0b61913fd7056166d333a4b28917966947fd14df492cc2744c4e252ad3',2,6,'','[]',0,'','',''),('5861850282961a061a4be8c75f6ea0b7136fbd6f3a5bf2e1f708bdcf3338387f422b7c9b12a58730',2,6,'','[]',0,'','',''),('3c36599ec415f5c20d0c328ad6436c920c382f3182be82118999617cc5ea32680af5c6faa807c36d',2,6,'','[]',0,'','',''),('0a21ce368da9ae1195c0188d2239a0688702c7a6ecd249809bdeeb7f88c96e4a980ad6aca82db3e1',2,6,'','[]',0,'','',''),('4109ceb54194a9e65fc9ea7b81e268ba7e63dea10780faf96131135f3603b9992e89bcb8d371101e',2,6,'','[]',0,'','',''),('72f1b6454426ad56fff4cd75c56bef8f4ca51bc9839a26499b3b97f1b6be6fc12fea437ea0a8bb52',2,6,'','[]',0,'','',''),('f82fd5a60efdb17922d91d0291a8acccba333d7a7aba6ccea2208860195e9dc31e4868a050e85d86',2,6,'','[]',0,'','',''),('2f44eb0bc78b43643bae0c0aef968dbe187aa9d0ac8416d3ea639f84608df994983a4051ac57b3f3',2,6,'','[]',0,'','',''),('cef21bdd4827797c31ecb7a210408e144495460638e8f74ab6f8d832678f3a9fc06c92e90a487131',2,6,'','[]',0,'','',''),('ba05159197100603a8e5fd43d9a56c91a42e8540205790bfbea21ca41669197c9be7ac07a0999072',2,6,'','[]',0,'','','');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(0) DEFAULT NULL,
  `user_id` varchar(0) DEFAULT NULL,
  `client_id` varchar(0) DEFAULT NULL,
  `scopes` varchar(0) DEFAULT NULL,
  `revoked` varchar(0) DEFAULT NULL,
  `expires_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` tinyint(4) DEFAULT NULL,
  `user_id` varchar(0) DEFAULT NULL,
  `name` varchar(48) DEFAULT NULL,
  `secret` varchar(40) DEFAULT NULL,
  `provider` varchar(5) DEFAULT NULL,
  `redirect` varchar(16) DEFAULT NULL,
  `personal_access_client` tinyint(4) DEFAULT NULL,
  `password_client` tinyint(4) DEFAULT NULL,
  `revoked` tinyint(4) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,'','Angono Baranggay Services Password Grant Client','HedT4cehfAm1hbTMARnODnhBCyd1KE3iuBJnf5t5','users','http://localhost',0,1,0,'',''),(2,'','Angono Baranggay Services Personal Access Client','HyAS56F8qY0rKZ5XYRDgkIW5ZdMopV1nPwpPVZQB','','http://localhost',1,0,0,'',''),(3,'','Angono Baranggay Services Password Grant Client','8f2XAYgkvAOff0kDRRIv6NQ282cpEQxwT3c9js5a','users','http://localhost',0,1,0,'',''),(4,'','Angono Baranggay Services Personal Access Client','7bXZO8Zl0TbD2FlVOUmX7TkA54j2Zcg8voNIELQG','','http://localhost',1,0,0,'',''),(5,'','Angono Baranggay Services Password Grant Client','lygQKyHZzzMZ5Luvq1JSziXcslPM0kezSnyGGfTL','users','http://localhost',0,1,0,'',''),(6,'','Angono Baranggay Services Password Grant Client','apTTkkUmkOMHhC5Np2zYvbF2J4MehjvuFOwPHiIY','users','http://localhost',0,1,0,'','');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` tinyint(4) DEFAULT NULL,
  `client_id` tinyint(4) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,2,'',''),(2,4,'','');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(80) DEFAULT NULL,
  `access_token_id` varchar(80) DEFAULT NULL,
  `revoked` tinyint(4) DEFAULT NULL,
  `expires_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
INSERT INTO `oauth_refresh_tokens` VALUES ('3801fb39e454a6988583f36b20eec5b1ec8e0f45f7b987f0746796e58a76190107d7ab29fd3ee30f','ada28761bc36a0fb0cd4c25baf1e46260c7f76f77332bbb161a4fbbd26ed88459d931d9d9a25533c',0,''),('b88aaedd6b273f7fb8a1a25f5d1645df73d64f67ff3c9aa888094faac2d66e0a9c3113f9954cb2b3','8eb01bfba566ab940d00759bac06918469353cae26087fd13374f1ecf2de61b1a15190d777f664b1',0,''),('8a6cdb47f8fff91ec1fe711bcd6386e7702126b921a6ed87fabe20abcfb6def0fad36da11a346396','879b7db65ae73d2ca5a50f0920af3b54cc60466b279353a885007f81d8146f1d04fb5d3a0df21c3d',0,''),('c35bb11b89522eb8b4c7f56799f977303ce67aa75f4b5b528e640d066de93eacde13ee8746430c34','df457bf1fa0014ae6d911eae9b30960ad0333173c92ce8e6ea17fa4ecdeeaacd3a74c85f7552a54e',0,''),('fbb95c0164d88dc31fa75fc223f93fd4ddb16e5ce12c24d7c3e9caed31078a48bfa3e3cf32ce56ab','4706a16beb5b0eb3caae81dc4c719bef730601cc6b00dde0b5c8048d770222884cc6331ae57524e0',0,''),('973367176903bc30db98a9f67efc1beda00fd5eb3a3267f90f9f7f010894947f153d6b223c30b515','1ec5e45a03469c7cd70682768940d62d79f7f8aa1ecfe7a1ce4fc7eb1cb478954b537bbbbf424ca6',0,''),('de6b502e01177e3db44ed4a0f660235f2a51e4077d927625a5549477681204a2c0315a937ba7fff4','70db85479eacb76a12102896db55618c089a15aeffd5c516f581e1aad72b81bb10ab38cca61cc4d8',0,''),('9a79bba8d97d0fd01f06efb9198f2a6dea9fca6c65c56d42fbd5a26d2400b01bb7a76dc91014d8be','0cd76be24cee8b1cdfa6ed041516d56ebd11891a62b8bdbb2d7fb908befe5c73e620476bf3c47220',0,''),('c13634a5661e64b097c90e8b785fb0ec7ae10d8f6141f0741f9bfeabb93ee99b2db61d3194fdc51f','b96185b55821c3c0f15b5a848b621e2e15af13fa11136a588e05b97f2a503f9d0ea21d157388ad7e',0,''),('d38140a516e4bf031f77a09dc42820b29dba3b76ee0117f7f1a770357831cdd649fd48ab35012e04','74b29956f1be7c7fb96ae493f7502e24b2f41754d6e9fcadc75040ad35cb53957c697566852a633c',0,''),('d416ef108f02e7486431994658c65349735a6ecb9fbd0c660f4ae2e788b7771252b0475b0b9233ae','7a3847298b536ba4dd40e9236472c390d2398bc69f8a7e2f345ebf0a2ffca891c1eafa19b2794d9f',0,''),('2ff13285ef3a49104de3d8911025b9a62f6b0a0a3d2c888b385d0838db1c5e9f3fde7308e50afb22','3de64d84ee24123045fe58a1aa19c91ca002911ae2a8afa8c7c1cf236b25018c91914d3f3538d638',0,''),('357b17a4b9bc2438f3c3db98afdc6d215ba5636d7c89271e04149dfe993d6a312701f598dbd60e99','721b5a304ce331b536215e6dc4ce7bed6035151a61324c72fd5dd67895636ff085680b5344fb740e',0,''),('0269a87b56000849d9e4fc075d920e19b51c2668966fb9af5402cff8e4e86ab7d1359db7a27d5017','17193df77b85632720edd4bbe9d1e484009190db73f3d6be8df1d58498609f60a536aea48a294cd0',0,''),('36ae766957b859306e1ec4e922e04801af3c00bdd850aa980db9fdad4ca8992b24d27f0225edd3ee','1b4244174836c7e2823a8b49148758938d600f25baf7a0eff9e1f2c3e66731308991e65aaf3d98c5',0,''),('28f5897106edd102d8987ad4a2c780eaf5da713ee3f389c95e4b464e8c86bf91440bdc5c4d4eef27','f1290d95c6ed7996d8833ec31f9574bcc6d449e743757829fa563c6cf02dc1ba6fc761c4de7ca774',0,''),('5a56a2e811137d8d4477115101c16b4a37070dc36f3dfaf42c744aa0056dcc60b11ef62d160ad8b4','21bef5b1c82d607ac23e84be5173ee2a0a0745e0900f3117cb167c8a1b94a13a9d34e0f3d7b62270',0,''),('67786751894300f5eb53295545cca10de9dafb6246e9a0c08c8695cc331b99926ea9e9926811939d','88fc5b50d90b9a6be8dcb0ac8e93c26e31b4c5014a77e3f198b01f997c944ba693a4b3128515b353',0,''),('261bfe2e21a1885a71fa1567ba875123f00738fdfa0219c1523d63d448ebb42204cf5923c182e68f','4afb621127448e8e4ab6f6cdba9348380e514e982201a77309c16f0ff2b7ee4f8d0c3f8c7e25fdc6',0,''),('ebd8cdb9f7b16b1de5ad5ac961bba00f4528a6a227347bca35376293534afb39ffefe1bea8ec86b3','e99c2054b5290f196425c8528fbe8d3910dc4962067ea8babc861063e96abb4c255729e86f1a84f6',0,''),('650acd06ad697bc6eaa5cac0d02d87b603033cd46a6e811079ba90d35ad317f45ffde569b24b486f','69411c7522545c4c35111a8946bc67e92b8498da848a13c41c378047a9e8af0a0fde06fa74497479',0,''),('67eaa72294e763820d24739264784c896a4188f93bcd1716d2951010b25fd633429d5edd9007995b','6abbba50c58e9555c6a5aba6ec95f6a49203c93e56af8b9bbd4e451f371d75328914c43c68018662',0,''),('6bfdf6eaed94e6b85754e52779f1d9018d6c667c4006642ef69c628d245f6831d650d080443fd78b','3b3cbe0986d36fa7d66502581d767f320430103b3653040552c4c3a1ca298162e8fb85bf611dfc7a',0,''),('1d6bff3b4d2c741ac847ea3c53e08e73e24fe4749dca048acfdffdcfae85a1488e2f581c8b8d743c','0a6c6284b8158a76eca552058e649c4bffd75457ba8d996593a69eac9f13bc140dad8816edac2ddd',0,''),('f88236cbfdcd4e7ead077b05b245b748ec7a37bd0cfba4d1c21afaf08408e5033f6c67658dafddce','f6f8a0abb793f4da39ceee4bb82189613147e303e1f66b2a6758b1cf1cf2787232951b3e94145a3a',0,''),('ee703d9f427e3f2378d84afc78cc41a5f3b2404ac275eff5cd65c90ff59fd1f08a159e2e3edece9e','1dd49ad33d5b6466b748b8868e60306f6f83552690d385ce38bb1e8af02b2355a5ee5a203297db51',0,''),('9aa320aa55fbfc428d2526be69873670de3ea1dc277ffe42e56aee5d7b84060b9a189b228776f1f3','317d656f842df3b7cd7b0aa008ac43269916b8e9f290ec67fc2a85e111236134c6c16558af08b118',0,''),('8a5a9434e28c0753121bba1be5cc31196c9c8b0159c4371af66a41f3419f02ecd71692e68157cd09','d7ad5fbcd48f399cee46908af50a70450291a901f84265ba28ab44a9a2e5acdc1a45be3a7157543c',0,''),('23e31efb38bd1bc46d5260da7ff323cad61f363102acd8ca7fd08316705a850689545d024ef0d349','ec0406062505517c8224647009d67a85003d7cad6365ac8f30b82d1714a4c0ad1621a05023dbd931',0,''),('ee6a523db026e90f7cc383e4f1197c657198beaea59631c22b53642b0dd55ac60fba7e1c6c58de6c','8b56dd91ba80b5e14de18566ab432e58be9299da716cd3869fe2cd6c9452da0a3bb69165f401324e',0,''),('94968370e696abed26ac4f973838c16bab682ab4cdee4d49be4e65e661ce0645ba197a5642e062be','c332973b7b62577e415c4adbf5df630aa440ab3e36c339f38175def6e3f237f8526e179af8fff626',0,''),('cf976a857004d3b3e042a095717cabfe2e52e7cd75839eaceba1f84bec0520b9095eac31cbca8afb','18333808c3f5468dddc31cf0070c4751d383bc00167af3b78a0a89d3d2ae741155ff6ad65dab5f57',0,''),('d3d1d7321d149309df6149c88318b8a6231f87f326d73f4ec9dea861e2dd5718a4a3ccc773336671','aee0f940d23b714149c12e9ad38744cb591b914e7288e02fdec5db2c21898fcec5b5bd88b7b2b34f',0,''),('a1c58f05072b3c729b16bbcac269ab19ccec57505eb02da073339ade4b06aa0b15cd3e70cec5a296','fa460dde298a1a532862a00be91466c072a514223d74e8398e88baf9e4d4542767ea3e302304b11f',0,''),('09af3d56bc4b7b6efd38cbe965fbc1eed35b3a3250cc9fac9244e8e0ef737656f79039964495cbaf','361ce9de1af7e35cf44210c6be8a52bc9aaa4f784b7465948ca741fda93e1d7b41d69370bf125cbf',0,''),('87948fabc21bb474d7319734360f585a843bdd720bb4595b44fff844fe2722a5ef011f2ada55c394','dc167ef830539a43d0ed2bacc2c629f9729361699354cb74b1e35229932565f0ab6ea141bdcd96f4',0,''),('e1a84c1ebdf5385863e1eda160d517eaf886a870fb1151ef93622245a4987180b54f2ba1c554f590','cfd8d2ea7540833721b3aac9f4440bd7b87d794ee359bcee91ba7421259499bebf4cd7cd53bf0add',0,''),('d6e57088c1a87348a6c2d8ddad0554b2ed17486b5448af7a8460c221141544611281c8c70d487d66','f30a5dc300243bcc8c5a0bb95e617408d8465d595ae12bdab34dbcd0ef786de02826dc755e3cf259',0,''),('1ddf98f327e17efba79079bc796431fbd9a9f3b10a1822a2867ac7aaaecf983ba379eae3c999ae41','75c08cb0dc74d95a5a842f50fa045fbe191d66ef21a03b91ab96de2089c91305a57e3d72ee5c4fd7',0,''),('5cab8e43c5037e767706c12fd0c57ecca7a345b078f8f62acca6bde4c100514214a4c9181fd6aba9','532813528a920d2c2c0de4f9d0c70327f45aa66baeff7ab579f84547f544b8997d9083d03660aa99',0,''),('e856c130b5b7fb15c8cd6f032cfa3b471dfd8e84e15f1c5af9bf3dedcdc3450b8f0dd2b79da8a1be','cc5c30c9a0f2b7d0eb63c8dfab933fcb29bf2db9ea021fcccbe7f3cd53132e9a8c48a82f32d84d89',0,''),('07aeca2dfc0ec9c0afeff155997be48a0b31e4a5ada38315e1a036c2a53cc92f06a31baa218ee69b','0966851f5571bc91ca1cb18e7afeffddb5ad856626b71721ddb7cff54b5daa321b0017cd2afe42e5',0,''),('2e7e64dceee2bd4451c184a205a3c3915701324453c68ba319e7cf8ea8180319d0e9cfc72c5bacbc','73465636fbac0dc573737d3fe23165cf695a8c94128c05ca2ef77ec9eb2b3b3f67edd403c2b18623',0,''),('bcbec85ded78d631ba291cde60f8253b5bc1a9c515d059a8dd32e6754a2faeedc6c11b9712117816','f501d22c307ed349e13a5709c041d47b36ebf28fa1bc6e8c096fbc56ce75017e048190a0d265df34',0,''),('12dbae53b3059761da08193397ee65f2ff689395d50f58fe997152bdb86a0c17d4ecdee6d55f9033','216b4e1f30f2a57cd095ad45ac15f475f64673648dec13ece403534122a87d21e33adb0519b36828',0,''),('370610a6ed072b7229cc459ed40648494625868a7a83002155ca34ebc2d6e3be306958ea3d2be160','c456e566cc8bd27c8dc8dc371e72d06bdf39b13e3401cd401b35f2e6295952d1b5b8433cb3c5d26a',0,''),('b77e342073cb09105bff5b8f167e8272531a9798ff682358cbdb3589e0fea48a548acf7f5a087440','f7a36215f97045d5711ef547e837a156b2f51f079e7d1a5f16e4da08cceaecbd93e9a1896cdaa1d1',0,''),('d0a9b9f3d3170c445cb5a962ec05a1e547c99c97c1a737d6e46c0c2f60cece46a4e5258ba0b5aeb6','0282f5858308587cc90877863e2dd1bd200fcd9a7c805474ae4d0379627ce0a5377d133cf049f501',0,''),('f2f676f3e185cdfec62a8323332e1a9b760028fc7d39b19acf8d59003f6a73f58ff0b3a25e9588aa','d216567bf7f10e7f1204431a2f11e7a215a4c3adb1b8cb5bd0a225111a200110b5e0caba84ad302a',0,''),('6a708085bcfc272b8e538ee25e860e6724019e509f35f394d064fc8ffb2261c8f5b43209da34627b','a610cb5e31a64de7232e9a1077113a8809f61ce5ced4b0f9f3caf51a1a48a93fee586c456a8f6cb6',0,''),('43fee3df807d13446b990e8698f595065c6509d2cdcdc4a0315651a58f2f8021871fb8f0cd5881d9','854df7d6a54cd6aad37334ce26e7d25a8432fb62b0b4677e18a1a48da692dc54efd5164a6d03683e',0,''),('4581f36834b89928b88a8f66733aa831f3a3f9e86e27830e5bd7ad83e89d88a9816b3bdf6deace49','0c9096e21395f2e23ee8024a0a50151944524eaaaac1b3835052ce0e7d8d0b20c02d6fc5fb087de0',0,''),('1d4590b262ed5e7cf87596ab1179c5f489d1977a58331f6a693c65305c7cef85afca78c4a35f70ff','215703379d2b14bb26b957a0d73b35be79ffdaddda198b63d7ffcc92f6fff808684f37419db526a9',0,''),('0e618dcae49604265f15d49c03ce1e0675b80e9f15e08396b4eabe74fca3b00c8b4143deca36bc0d','249a921803c750d97547765b4183b84587e1e37fbf2e350f03001521a0076ba6bcc0f677d290b78d',0,''),('6b72dcff1860811d9bcf99b9371cc3ae3cbe8c2eccfd29f631de1976425e2dde6f85bcbb94b8b38c','495889e379f6c1078bd044f46d36e1efa6f0ba7852f2c6ac96ee993d2367e5270d9e3dbc27ae4b55',0,''),('40ad73d447b5f8279f67534800e939a6fd5483fbff3fd30f87a2476cac94e6c3ba2e44eacf619f97','e866d636f11b4482e361d95e0ba73b6c7bc4775da6e4236cf001f0cb45cb6eff476bd8411a80c06a',0,''),('0bf29880e4778d91ada11beb971d9516e25ddcb7990533914e900f6dbb7b51041e18c8ea1f4a0bb4','e43ebdc805fcf604c32f63fe80b1e1585694a71934e8d77bfc668a422285deb5302e105800cb95ed',0,''),('cabd70e4c811cf9d2e8c43642af36d8932577b07b524606558633f7dee09f188962707f3f816359d','4503ec30a6578d83c754167e83aca4b0d1825fc7e0e0c75552af0912dca6ec4b8cc575940ac2e87a',0,''),('1889b120c89677f315d9f58a09e3014301e280747a4851a49d2ee90859f8698f4089187ccdc429c7','1fcef2f9a2bdba07a2e6b2515e4aff022a48d34b6df2f8930b01b519bb27a6389648830308d41669',0,''),('f7c28360b99b1cc0eda4a62ef3b23272bee1e2edfaf30dc0d4306ff625e921ae482a238d0da0233b','e707bcde02f80aac0f723283c4283ba24d2189efd1e0c7a511b2a80687402df880a6035bf33193b2',0,''),('c63f9b1d744c15fa91ecd007a30394ce6e138f83704ca644dbb684cd49f8ade91f801417f1477c40','4333edfef4a41102066f3df09fafa6e9c61ba4b45073d6d8f0788816ea107c894f302512ff287043',0,''),('710dca0ecda890305c4b2cefc598e0830c3bea8126cb2257bf1605a01cc0923efe6051fb0c5db7cb','9fbcccb3887ac2757596d782069bf88630b8f5761f7df8800781e0cfc68e1a92b159fb1ec7890ff5',0,''),('16ccfd60ed94f39ff5147b38dca4b4e7ee8a03e704cb1a91393533dfe7852ec79c27a78e98f8b38a','b73a3c9198105595f15d791750b6c6f1e82b51ede8bd1ceaa177bb9023a3b88ce95ed4fa3f569edc',0,''),('8cf3727d67ca2be58a1a94faca32f641adbea731c6a5774454be5ffd53b265ffc5dba4d0ac0eecf7','84b35f051e809ac0d31875ba229c12165034a4242680657de352e7653fcab5446a89d37644679bc6',0,''),('93b3487e348465f0c68071577d0c22ea4f24128f04ae63d46c4d85f1dbe1564b4fb447bbb403bd98','a106916fbad174c922cfab10ed3c1dc8b8106191cfb49ebead82ff83caa94a9362736e0d7f127831',0,''),('d8995a8b0949882d50c3537b7a81ba92f0534e82d12927849567f89df3dec85cd53e5cdd43b92ef9','dd9d5cd4603affd563180518f89c74a308df5fd0843c0ce00ed626ac3a83ec8364b87478e246cf9a',0,''),('c8509c3645f1b4f9a0e95d0da901038d7a4a70b11f1b5c7ee8ceb6daf5207c7631e95d30aaca1054','d35fa8f6ef6d20f8817bf47c32ff8f2a53fea635e235a07fb9f4fac6137ba914d0e5bd7508c324db',0,''),('b9232b7701d9684d9951cef73292dee8dd1cf4e17eb6dd9c9edeaf6f8ff2b2b767b7bfe370d19ae9','f5ce1bd35f6be00c55c982896c252d3eb8a214f0135c3c2896118e4b2da3c52b699e019ec07228ff',0,''),('981a3f065c1ef831986a75caf8e1273a74c1165cd50166b160360235ef187eea51d6c510c0c5f465','10b86e242c421cfa90b1332441a47a5c1cf180a3fbf9b961069000119ab3a78a3add117d5111b7f7',0,''),('619bf4c73c2b7abae4526607adb72aade3d07bb1b5ea3a8bc77195f569aa1827623c6d1a567dc0c6','627b31d79adca181c82273810faa9a1ef625e19ead7a6320b34f3b493420eb0ee469feeb0a4ac9cd',0,''),('1cd3fa51b43ca724aa7e63b73d7ae838c7102b6c0bb50aa1ca2f4653a8c72a3586a94f57701dbe68','63d16112021c53fea0ebf03d4b99147929531d20341332ca73fdc81dcd2f40f3a8c06b84e77e20ec',0,''),('cd71dbc41bf20f52faf2007367a05b3d9af426d5c7ac45077e4b495e55e10ead217fa9cc33d93f81','61f825827517ccc0e5e057907a237c075c27c76d7343fce61000e7d37e5c2e9e898d5ac7dbd8229c',0,''),('24bf69c0fa039d198179f34a6a91f18a570f9878b1e6ce73c25e224125d69e9d69f75dfa083ab71a','3e6990f84d15ba84d9215146432b76a143a2cc8bac5d558f6d3dfa9b1f7a9d0a64a9f4588af77758',0,''),('5d65c495759a4eff3a25158c1ff74a664dea023026cc6566f6defdbd75a1889353e70f1dac17dbbf','34c38aed01e3df34245b4ff3d0b28a6e9218af253c909a766a2bede84c26f1d64350cde7dcdf8fd7',0,''),('b8e62550006f6c29dd11a91b049372dc1e4084469e29138ce3b71601258bad950935b7033adfef9d','f1f90f7de79afbe01c76af52e84e17032a31b88cbd7357221b9dcaa5e0d13e73f048587e84ec8f1e',0,''),('5f1b7f1f5e2bba502d295c9dd4a6e629287dded4f1eefb0281d2d9f3f56c2ba3e14a093b1ee1c52e','665b0bb3de4872f06870f2ef5d77f76f2dc3c3321b4cc9606b1f615ac1133e6e186a49b509f2f87e',0,''),('5f3f86f3c1de155d9149b727206cdfaaa173b5c960c58c114e6af3f999a71bbe57efa0e06c7aab86','548587359fb476377a4986b2f4e091f5824906db8b67158f86a5b7df8e802244230dce8d0435421e',0,''),('1bbb3fa698837b4d1daef1ae2a2266ec144aa74daf1ef8b24804cf7e62ea170c58d70ef21b81e9a4','31773b0f63e90f6f0900385538d75167ba80a5631d36231b9b05d4fb74bcd5d6ddd374db294ed330',0,''),('dda9b4b23be58a7f37630a3b27b396db517a481d089c094535a618137d3fd7913c46a379e574884b','892ec218fda3244048699fd8aaf887fa4718476a78dd55321e3b8b079309facd08155db623d0ad52',0,''),('09851e040482842eeb11e0732febe1e3a3fecbf91c60c53f4a85206ad3347cbd2134f7baf1e99008','ab7b014b9292d054dc2e42d067ad1e2d00d929b05fd9e1212f5bf574f5f0ffa90b0c10536d76a1bf',0,''),('1ac815d0e266910210e4d4cf21591b45e7a512509c1821f63f9fa730c5e61bc315a53e77e0e4a6cf','82ae910a100c1045977eee36806e0751158e3f01af3c365fa65e57aa6f5b96fe04e8b43cfdda2f0d',0,''),('429387c4dc9ce74b92c46c0fbded5170a58381106b475ce892c8bfdd2a3e8be98dbe127f6688135b','b3047a8b8845787247095e286b6e71707f64386b3775e5e5480c08119667f1315555edf66a701f7b',0,''),('3b312e25dd76f24e5f2ae0ee7a74123dbf3edf91d90776d880e20cde1d561e32cdd58f4678244236','79aa9fcdd809a349441e802ae6ae2531d3881afd52fbbacc306640c17bd82ff495e8669de4b3bc02',0,''),('70b98b4c8592466102574ee87cad21f32532c4820354a52922dbf47698370a6a92af40c5a0c5a933','ef2af68781b46d5457c5cb4fbd6b24295c244cbdcc69e16abcaa651cb5ca885cacef1cbb9d8aa504',0,''),('1889e3f023c3e4c94cecc280b645347fd926a957ed81a3b31a023b4c2f559906cac62a4e2c3b5457','c015e94d0afb91e3d01a4299c0c0d25e61195038bffc95852f7a054b2dcbf658b87ad42ee6f7500b',0,''),('1458016ca6ff1ef758b9eed2dc09281675145c9ef9da3b9e433855719f7a0ee2b2013ee7a67c95b8','50563eea8cd0b3c02ec98d42422786868caeaf6795a46fb50422bb9f7036a188c9231839076ab26d',0,''),('3c4766685ac1f7c5beb16328eeed6675cb0858efc2e64e17ce4032c0cf23834c9a044fa47605fdcf','4d607c770d6ef5247a92d66fce0b918069aa4111f109766427d416a293cd58c01a3fdec569398c25',0,''),('98f7b30e1a4f25a5d58b7a6d4c64d5adef1e70dc401fe0e31c216a992fc7cf049993c91efc66ac84','229cd652173af8074a2dec3b10dfd77e869a274ca9067c99a929454c31507b91f81d60085d7f4578',0,''),('ddca0e5074f54428a7a2e0ca47200f4dd7c08f8ffcec825f60dd5c48b00fb9cfc3a4e591fb54d6aa','6904231319ee77c98193f29fb2e0e90346bcd0f2f0769ef03d746c42d23541713cedef7a89607430',0,''),('7b68249c92b3f0218c51dd614a27525867174bd24cf66e0081beedd3c98c464cc755696df4af8d1a','bd0fc979779f2977d9ccd7857cd87feb37c7bfecb3bf810515251829e7652a8c410cae33cbd96f60',0,''),('39a470e8c3a52dfa73d1850c8765f5607b64f3a39dea02a86babcabc541688d07d8ff08936b2dabb','2308476c56e0d9f54e5e70fd026a8bd84309dead12e6626500cd8876090bc18af58e89d725d2233c',0,''),('92ac51f86fd3b6edf786a0dd701e16672f6389ac11a51d4ec2fa3a85f8f1a344cd60f8688b5d5b50','29f2167fb488137a8530acb83b9206a8ae48b0f14a1bac9cb35cf213ec347dc1a2c126d6d67b37fd',0,''),('1a9f284ca1f92677d0949f37e8f16eebf3c63657549c9ff0bc590b3595c9441e479b5fbe5e92b6a0','576f864e25e9791612eeedd156e5e98f9bcdb0477209d14d2ae93e62570fdd98958d82b13ccd86d1',0,''),('3e3135fcc89f183c45fd25cfd9b1d36c6059f7144526362b1de71f6d6c6f42934f250f65d20ee473','2f623c66a53138a7f7a5e5d2818caa2b116782bd1d9e7a6bb37a67a776d38b674ea45655d6b4fe92',0,''),('c4b8f406bffd362b000a0c7100b8aa914d30efc248b63a7406f74e1f2cd24e158f6cfc63c4d63a30','4b80674447760be41088387d2da954a247827fc47abdf2116b5a6c29b62ac81469773dc00e649482',0,''),('343f48d07627aeae05dd1af359393d062bc75fb2b3d4355bf53dc27b67bc04c7f5f68af44887bff1','768f5f7bcc7eb772dde181ec6785b331015018185898fc85ec1cd3ec65d282950f515888124a8287',0,''),('67ca227797102acb6bf88604c9d4c732402dbd1781553c5ed4e4bdc6379024bbbfec031d3613f819','0da3605a3b980b849976e0d8443bcf87ffeab71415fefb70b9143e98e8719399299270bff60dda04',0,''),('a86b3d0e57c59cc09d76c951b1408a18d9af52039c16f9a2e25ee9063fbdfc5cd519fa414d56eece','53dd8cedb9c04bef3cb2f455ca17f5576760fb652ebf0af8f921b0efa35c3ee5ff985a2c2062eee0',0,''),('fc59eef7be0f6053a8c79688805f4b55b3dd37a073b677ea8648b30590aaebad4d4f17a813706c0b','18e18e7f3f161948b34ef08b83506bc52c950d20f9a243c2aa383325a1bbdefb4c8a325fe36ca9d3',0,''),('01f497f2db1e8e1085cb21068413b191c10c5e0cfdf8821e9710243886762423d9ecb1917671d034','8d8e429edecd86d41fa84b9d5e97c0b6239846c221c24f77e92383ab2fe2dfab9695e4c0bdcde003',0,''),('3904717e4bd0482c905d589b37587ae15cb7b611272807dac705e5d0bbf741685d2686364b76b0dd','7349754ac9318232c71aeafa772d8025df9f43f12c57281c32e85ac115c07867c21ac6cb70a4e8c1',0,''),('cfa9e66015ed8cda8a14d1b6bd3977d7106609c17b93bf7ea98662f61ddb642dc3504726c9223ec6','bc2f4e557992b7089e913194e755fdc20f7fd488ceec12dfb293e09a894084a0f8596869b3efb555',0,''),('e3356a679532d96c2b8d0790f3b755b9d72b8bffd44dec639438e9dcabd0511d783d82d4de599b1e','7a23c59f95e379a590019b248aa9234cd88378d2ba4844aa55efa087061c7b404efa43b6585a0545',0,''),('9455e39c8b8ece1f8a62e7c38440c5581937af11e80a5dbd744d0594f341045b610eba2081ba43e7','061c7afea8889134180898327fbad530c27adf5f01815c9469bd69959c6565018bbbadcff1abb171',0,''),('c3349bbf614022806a3eedc9df522802ed89d2c534b727f34ae3193faf0ef3c78c9239673a57dc90','943a9f4eaf040a930c939573762f7cb0ce7b1359649cde61a23dceba713a58b019ef648d2973e1fb',0,''),('71efaa07c6809dcb156d74742f01c22b26ec963150bd75b6cac6783a3f8eaea391a9cbef35173f53','d8b16e94eb7b61d300e95cf5c87c014149cfd1ae70d9215eecdfd664709fb28d3e24832a1c4cc4a1',0,''),('2e6e4f3cb97975abf1ac1573bad59083bcffc28717b5b39e050a9d931cd279ea77004805bc7c5769','9e4ed722e4cbe7949c069b981ea4b460379802a97629254a326af9386c68c6a0f89d2dc02040733e',0,''),('174e5d1c3c13e34eedaf1361843d9d1ea06d339376f91b3c0bf00021df408d07ed3b57467f5b1558','d8f3d95fa18c6126c620d448a9508c3b2f4223bc2c6496cb614dbfde6ebdbbc35551413bd635ca92',0,''),('5339192e22f6c97df014c6a0ef71756d4a62788068f2367f4572daf2fde543263b65379f30459e0a','6ef0e84f041c9be2d7a88f1a880c2c608dac3f5c9eeddc9fb2bced673b74d75874e870ef1ec889d5',0,''),('746e13e25a091c3e43d4a2a82ac621925742c11e1ca0f817702ab957eeaf6196e2ae5fd486474996','d5377a4a0546c5e3e0929f00e7e60399d471b5d53185a0e18c242ca6f7c908deb72679cf2e1ca1eb',0,''),('37b332b9c5610cc08f6b00d5ee0982b046daf81a786a46680f48895f39f610e40f66652d2d8b2e91','efe3fce782cb564ec7a7e23ed509e4f559486fb3e019a5bd3a01b331908ea6603b831621fb239b32',0,''),('317613dfbddc62c663746849eec99da16f61869bb732bceb8da462004cd50e76e515a203462c1649','0b563920a6cb1275543b0be00b6dfb84322df9804cc7efe25b414605e094cc8fce6451fb1ac60f9f',0,''),('b982f35d818287c9d30ebe13615bf6e65cf9d3762c264319a87e011d57490c6a11d572538b4b8294','d535fdd9d8288490e01757932b142f31485263d917fe343df2b2d9cc0270dc4e364c7238d75d4876',0,''),('44319e2cd7490e1b2e18a177ac57ed2fce6c9aa562b08e11a616281d22dc8487ab810b21a5b57536','520d227be04da172185e219dedf8b73b4eca95088c1221a87cb8383ec6a8b7b497e9ccb4e8d469d8',0,''),('ba34fca4e9f73b0ad4d25a1556deb66550f40e817a9698487a9e6ac587ac28bfb419c004f600e94d','69fbdd118f0a12e4d02ca5e899d3eb7aa0faea6586f507fe222664cbdd264d05d69770ea364b5203',0,''),('0bd078bd3f0b747b87ffff6e5b8ef09f42026030320db33abeca1801badf31e515195a2da3587396','b70c3b77abde919eaabe0fa52ef323a502d6116c869f10f4da8c4a0749153ab9213eead52f612faa',0,''),('f5ce542799d7a43204d6ed646224b7efab47afac626929131db283527b400fd64755606d363941a1','b6385b46d870989917c4979c5616c0cab9cbe1643253ac4550ab77cc7a1fd24d517999fde42f87e9',0,''),('089e39bf66933562672f985665ee4d5871346fd45648ae34d9adf9926e339537f49adcaad84371b8','e056a00f7186462581d5b4f92a3bbf3afbab98acfaf8c00cea12375084e3f0661e2458b92d51ccf5',0,''),('a2dc14987b4a4911db10a768c5231cd7ae663c45425b854a12dd3d2098524d8eb6fe0d8fb2b6e80c','7b156e2598e42d75a755b60cabe00b056e5524d3326d07bb0b993876b73a2cd55f20f5d425eda5ec',0,''),('f1d96056b085ce1c0fcb4e1f1b321a64806b70cbf03208b762dd707a5e53aa18175b5a69a3b31dc9','0194dc1df6b4ef555323421007d5ea27560b30cd2e3af4c0f0447a00ad90486d7557beb6959b0472',0,''),('2caa98ecb9dc00b82bc70ec9c0e4735aabc16a9e199e3adda625afc1649086959c6e80e83dc820d1','1b710e369add0d3104dc52e622e5a4404bf35e6a9083ee9863ee056bb4155d954036ead5a82c8c72',0,''),('cd532bea07a372634394420b50a7211864cecb0c2fd753573919dc7255de4cac1c6303c97f4342d3','51ad337b1c3808dfe0efb11eaed76243351dbd25994247bc6c81325efd4f94449f6396aa4c72716e',0,''),('f548c143b07220d89266979c9dedbc5274f247067b804160fdb199e5eef3d0a30b39345b6fae9e5c','5e31a9c0e8cfc4f24ba955e310d1fdea5e8415676d873fc83f6589e7cc36f5e6234906d3ca71c406',0,''),('66ccda71148e45199d459ad72ba0fdc55f172d7decb170ae9fd389511233fd69a280f15decffe14b','e9e0a8516b0c4a8000393ee5df8974ded30e6363e868588e260adc276ebf97348daa6fdc22d4cfbc',0,''),('152789f7dbd7852a23926c863aedd29a0971b1debe5b7457ea8e62400a5778d0e102e33dc2944233','bdd2555465797ec678c93cd1239187bd72c18c801d140179bb7dc6b72824f8c2d8b2472a946158e3',0,''),('85dee3d4ab8e95fb24f9bec66c607d84afbd9d35bf237db76005408cc2be2380393eeeffc92c4fff','dae4ab405b35c50bd8a6da25331a0613066d5065bd4d6aa874d3203d0398b6f4cee0e2fe2d9c7b13',0,''),('0d899547699c9ae683391e4e22b2d4d60847a2ad880c267e52a39e9c1dfa52b9f2a628f519a70645','5ed6a94eac64e7adf967ae221e93ac2d469db803211e6327b047658647cc9ffdc3e1be2d944bd500',0,''),('023335a69c5fbc0895a44594ab31c8685b6261d24574735388844b4971e56dd090b4b2b105d976e3','6370e9c47df4d06026b5e614e7894d454b857fbb7a8403cab5cb08f8816c1b355bb4a11be3e5cd69',0,''),('f2889da104b565a229f5b53f99c9e155ecb3747dcad5cf308dc327efc75db69afd876ddc2b41cb24','7ff229761a3fc80210012b7c3aa4c7ff88b6d4152cca8f11353edfe0c587c324c14f2464a121cb98',0,''),('72f5e02a0894b02be9a75063c752dff412fbacae5360af02a21cfe9be21b17c271140f949b636a19','73e13070e4ca137ccb0c223aeb598cc2a99b4fda8adaa5ec4e21d97b7153834c0ba6ad4c2b09f03e',0,''),('f19b066b5a894cfaf00b150c1367432c7672b18d61b380e03068e10fd9004fef981c1bb827254c25','a69d81620ad29d7190e06c37e4c0d187881aa8bf2c7fe6968006194cc54c0c15559fa579d186acb9',0,''),('cb5e2ea466e1b5b6081f3460581e8a8350c69eb613b7c4e7c26456af9f28b2deace0e73f45afdb52','2216e5bd77bf74cb4540e2f651c9752f3798552d211507a866352fced081904aec96874e95e0ec00',0,''),('be7e6c62ae991358cc6077f1ecc83d8ccfed55d6c56eabfcf482b6db3e4ed46f0a1b8112cae887a8','9612a37ea6f8ac3e09573202fb5ec96979995daf5a91a16fc1e348c410c37b83d636deb2c3412479',0,''),('edef24109a158746ba7d1b3e33a4d2d57d8cb52ed28cd80823de0ee8e95d0c2d33220eda7dbd846d','6b0224e35efc637d7b221e2740325923259797f53924a9f458a331ace224149bea935784e5ea2cf8',0,''),('8b205127b5bcf9743846000e646a9f59280febb117734e48f4301afa3652de2111c229709dbf092f','6e2293c1c6b0450f823b942a4486b8273c2ce4061c998817efdcf1c90febf226e663e02babd99475',0,''),('334cefdc98acca0873002d21e7c945f81220994b87e46883a20b6001a09db8c90a46d3507eceeafa','e32c953326fc02865c42ade52e7ea385eccb826f586b5b05d50293587d1cf146b86535121421dfba',0,''),('2b49e6a5ad34bc0d0df12a1a954c0ba92fb8b6dcae74b496682f5ef4962d29bf42d60218e3e1e9a3','896ebf8f736f347b986cd1c27546277d4341e439d7de901f0215cd721a4e1495e4f446a2591b1e64',0,''),('5fc7c9969d4b39f56593fdc32078a68d6fc388d4aae81f2a0643a2a41f36418599d4d40e5b906ede','d19a2ae2a22b870bf026294c1ced34908b776e986a5b558d27fb8f6ed59a5333be1a07f810c101f0',0,''),('86a042d1ce5f50b4e92530ab25eb73ea0c4e7383dd1eb35c95378c2d90f4fdf83d383770a11128fb','9b8c79ad8c5ad6fed48ebdb26b9c1e91dc56bfd16a50db2fcea1df9eeace1c85e7b18f8a1cc3d6af',0,''),('574cc164537ac75b7e375104e1e10f62b6150b68842cbcc02d829576d7cbeda9b6c49f65fdd76972','e16ee9b5ad654219881d2a22a5b0534daa0ede0d8fe05bf537a4b80236cb48f481a5516254d5e186',0,''),('4e7663c61b81da6ce71bf0580f75161c21e5daeefc980eabb349890aad9e20d37541ccd58ae09c0d','c01f8ac2a3054b38e1b26e46ca41d884c2b106c94caf62b4064755add3c030b6dd9467e5b5c60a61',0,''),('f404a1ec3c4ccabbd08b6acd4fc69e429877c077e2e64877dbec3951f614667f802abedc9d147213','d775d8b2dfa0bb62048426697da37e7c60221e71f28ff11b28a8f14ca92b9505acf5c280e28c454d',0,''),('154b77e959f9e3387459248fc928504a935c7390740c54b76053f7fe259165e8e4552308bc44a6b8','906d51d4dbd12eae5b941a6c20c0571ce7adea0bdc9484cdd50b629d5b25f125747aed9a5666c84f',0,''),('36a4ee576689bc324fbe69c13c5379487a465d2e290ae2bb591d5727c7286d24776f670c8aa4ea93','4c93587101129bfb6cfdfb17b2b4c6f421d915a6e08cfde4304e64474ad71cd8539fc13d1a4601e0',0,''),('7ee653138bb50d41acda768e30bf43bf150abfdc6f7548af13af5208ed8289e13f8925f7b062ea88','bf3c452932a082d77b90dfd9a84e07287b0efff58592f0304c1b1a3cad7149ee305f28fe04026e23',0,''),('f16132740400d1b9d651f1dbd856690b02bb02ba5ca601b4883fab8e9621400087327dd65e39b60d','3c852c120e2d8014e9185ded78c283b51a92fed3c59f3dde9a9f0496ac233206ce2095ad20d55408',0,''),('869f0b1a95e5d794efc8030dd3203e2da6c02da3e428fab7ada0f3df76f23cbacfcc8a7195a273c2','64145559f290909d64d8b61a2be8c843ae49830d00fbfaa4a912100bf4f9a3dc19547e65804b6d94',0,''),('0de0a013e55e08fdd4aa6f21f689df9a382f05f197e60c269ce228127b108e58305a540d7c1d39ca','41284da2a5f719de86d0e3d5a8b19a697b704544ae563c77baf33dee04290ebce44a7d7077d69fa7',0,''),('6bdf76a2d2b3fb8d129202fa8bb07723d65a92b2de0e65f595300364d735111b601e061078fdfc55','ba1780fabfd90f2a290ff0c6a5ec695eea85bf450e0e951b000925954f0c016bc312e8d9a9dcc390',0,''),('ba1f3b355d70744d771b104d41ecfb2c89f10642a20df85e5130abfc4d11cadeabab1072a9c8e85d','ad9bedde9337c64deba8cf3af1977b4bd76e55c2ee4b54d4c41a0c00c271f216b6d68f0deed1987b',0,''),('6d26d7682bc74f6ee04bb84e1647b35f0f6654274c4f822675155766077b1a4531fdc646a2ca3cd2','2e1fe019c46c35e8dfbb8ed0c31d23af69e20d89694fd133cef514bf3e3db65e300d9bf37be2b796',0,''),('ef575a423ab55c3536eb69954aa127a6ef92a52b323dfef6be0d8eded72ac25f13b108ea5c089a5f','7ad24351f23a046ead7c7220cc1277cee596ef9b0c78886249cfb1c39b71fc3f8733726e0cf90910',0,''),('f8c7b85d2a8e826405156c012665f5d71f646d11f0123126ba123e9ea03c4043239630d739281c13','99fca6ac6ef2534ff95f885942e10560612d9afcd8455e46f290932f82f05b3cd08aaed81529e16c',0,''),('3bba4087c777a051724fcf32f403c681a0cd02fad8f663a4ff9e0fc4a01f937eb13d9f92a7658ea0','e4c5fc1aa54dcddafff0f9f3a94e619798dc91dc050c8d6c21860a4ce022409f75772a5ba83cf845',0,''),('93b3dd30feb7b4cd49ede9e64a61c9fcc1aae80069462d4f0288dbacfab2cb427280b59e64a7a434','7367b3476d1fec998babe586bbf8b36544d3dde287ab89e08aa8d28fe2799c65d2f1118c8c13d05e',0,''),('819489f3480c2955137983bdffad0e12c359c814d11af859129bd86fd9657c4a43dd4ab0d40ecb48','23396679d5c80bc3494da7ac476fc0c6b9edd5e691ec01613369bcb9894e3803980b690aef9df190',0,''),('d4523f39a8259e4474618d4cb2ae0391f28174ed4a95153813acf74a2790e769df9f59a132c221b6','4c5d06aa744e707db83eb23d12e43e88bc105e30dd5d7627717f765ad3ca9a819ecbae643e89c680',0,''),('40b1e83cd3b7eab4b6fb147faf5ca80be2b4f2614ba2680f0e751452e7ef90afee70203e878d872b','d1ba647c847b3a71aac7e606f5dad177ae20428556c18c16b540796f8fdf53c2b07340d68108cd01',0,''),('06eefdfb4df984e54092aae1aef16c46069e697c8c7850eda05e1fc4412a68c676afdfb0ff6682fb','8800e63eb81300f54f750bf8fb590025aa641d287d7f678af10e74079cf2aabe2082cb7ca489c0af',0,''),('3c64d5791a6f8182fda41d5b8d659a7906f96a3d97321ff6822eb3e41c233f9caca67565be5c36a6','f087517fbc8d166a33dda71d3ded7617a4eb3e276f208593c182af6603398110c9b78a613d8bd81f',0,''),('9203ecd0e9c84cc33855a2e4357e599b9e37822574c11e7a657811d606239526db1c1cb4ca9a8143','3403ea4a1a76c019d2cb356f763b7655cd8dc02fa2a194cf52d9c31d99e74f1811001f6d7c5a0c4b',0,''),('fbdc1d56f70ebf42a24ef91af9e98fdcd758fa3022a369a94c895fe802f73e75e41443b13a2fbd8b','b7bd8a45988f8db51dcaae60420e5f02f8a4c732002b68794217a3475e1dc5916735e291f03a64a5',0,''),('ff12db457625c6fd3403f545993679b91614084e503e3f99afc5972140e512dbe3e7d537a534ef9a','d528ffa3e34ee27b9007e7dc8218972ed7bbe609d148ed8fc9fb37c3c4a9c8f647b3c2a3d1e03267',0,''),('3061a75ae6d3fdff51a0ddddec90f22801dd1a2bcd7ecaa823d22fdfdb49e399c2dcbfe7a26187a0','2dc7328dbe5795a0281db277aca84d7b76dcf06f10d7611e18e9566c8528b3920ed7c3d7d6a66a36',0,''),('01273eec912d117f8c9637b7da811d66ba6e2b4c85a39a7ae7f77560ffe5dc402c91f355c130587c','c700a69ca67c39becf75bbc778c8a07da46230c2afe2e612d8294babd5f52cc5071daa341c8aa12b',0,''),('720095d13e83cad272c9934d85e5e0cfcb54dc7507b7717373833b1f0b69b8c6ae9d07bbc4eb215c','927fccf6e4c7d893ae3577c6a5654485597bb85b15922f5f524e8e2074c50b7f6d730fc8f667b210',0,''),('d6990b8bd66f3c2249a088355f7181c804028a29b1b3a35560fb993e6f23c7d73318ab3bc355f550','634b170b880b674968b5e6b2244d52353e49cf69bee61c137ffe5b986f44166b37b9a8bd9f7ffe7c',0,''),('452bdae3949621ca9e5d57259426db393c2cd7a271cdb73b0333daae73765a5354a755ced1510484','528ade7576fa077c6aed730b59d55e5b46198c6da76be8374c093331562b3a8f96bff0574d49315a',0,''),('5b11a12557b2379ae223e5a4b82c7893c3d0808b7268a44eda994efaa49db5d8aee622b079b87243','4a4d57017af3e809ea6e31a8dac1542ec24e388237c87ec9ed44d8bb424be870ad2bea1644e12a76',0,''),('904a2bd4e8da85f81fd5026c54dd2db066b65f122662af1a6087b1c8b99cc95a86906273258328f5','2c976ad93ca43da4a5f45d1550647b18d4d760d89f88571519cca534eb8a9f3c00b04e7f978d434c',0,''),('f83795eda0d9567fd3b2e1f72693ee322402f648723d87fc8713f6085f6b29da39851d58798c49a8','9b910193b21045bc3fc32d4e01f7d000c4b4d67b5c98d038ff9fbc62d622c1dbfd41d6475b1731d0',0,''),('d8db636b1be36927ec0bcb0c84b8cf75698b74cc92e6cac798c94f7757184c14fe7e56f732f1cda2','a09a19ce4a3dbee5885cd78469be25a93cfeef99a3bd3bcf90f0078c8a772d4a8b52fb9bf3047cb0',0,''),('dd86956b6fcfc65122c45a9310c24b9c6f850ef91a84281926d56fe53ac3f1bc5a7faec396dd2596','c4308f0bef40716db7c10cc046fb5eae3586aac2905f01b9f33ac6e93a581bab97ceace6d5de0a84',0,''),('bfa5aa0375d27b189094a86900e025b1abb45a9b818ae916a0d7f2392cc4ee2abf658289594a8738','44d7f956e9bf93695525224dd03a80da3fcf65aa42ab9f3fc6c01ebde02d0051164dc9ea6d78729d',0,''),('2cd0682292a04a03c743df01bcaf9736a5d41abf6104b1b66f17d610661e68deeb768e8d663990d1','24670cddd1b3b2a65e2dcaa063c762cd35cf7aafbc18ebee63be31ae8b093c3483fc531c62595503',0,''),('c2c9c49b2f0f3372cfbc7c53fd18a6000bbb5532db4d6e192886eec1e4e53d88d4c70687b7b84ffc','9dfdbaec04e1e3c9d246faa0788f6c27620e1c6b5b09c49a15eb13c328d1457c6230405dfa3ae575',0,''),('f07b76df29420e86458cedb4efac941ebef5a360b05419606d4f25e15711684f02a3a919adbf32ef','d66e8c723f544fff6bfdf8f129ae79630a77f0a9e9c2d20c6790c66e8e734cd5ea2f9c03bcf53354',0,''),('2e00f0d779d8d2554fe55256d8e0b8bbc4e04aabd763a34b3c6f19f424ac35ecffe735a11f0e83a1','c4832c53e83c4aac19b827ff6662a82583c24630a4915ff449229fdd383869a47e92b7e50eca1f2b',0,''),('585a10ec264b333aff0fea5209fceeb33c75615edf2940dda3fbd6dd250a267d5412ce5708cebe2b','b01f32d86151275ee62e82b301b6a0bc1bacaad8d4876258a3fb0137bcde356e086fb5ee730a2b10',0,''),('da04ab221b88b3dae30863ed693f8c8c1cb88ef5389e2a3dae7af042d373adcdbf58cbd3345f4519','35a6872d54b5ec913e5b65f51430556936d652bfe226a510177f101373f977fdb39272e5c3d53b13',0,''),('3e5584496be803ce20555b945642cbf71365a4348f1ab836437e82416015d0421843709c6a14de2f','ad4be5282eb5ae5f990fb4de18c155e99fdc56ecd3a261baa9810c2de897eb3837c1f3f618227c32',0,''),('977001850cf03ac933611d8782b03235ce6278e5a39d2e3650d034fdcbe006f94bf6befa98f31309','432661435b67b92095f35e432d5ae4d7156dcc80e32bddd491be2e074406f0fc95ba1f7c7b6fee7a',0,''),('2102d18074ec3fa4e18417dd83f21f7972b14f99c054bb369b198e3b180be6ffc6f1548e74e552c4','49df4b0d45f7e328b3b5ad0b61913fd7056166d333a4b28917966947fd14df492cc2744c4e252ad3',0,''),('ff98b3b9ff4beb12819db6fd284f848f41b9c64dfd81038bcaf9f41550df7135e41a580ebef9d2ca','5861850282961a061a4be8c75f6ea0b7136fbd6f3a5bf2e1f708bdcf3338387f422b7c9b12a58730',0,''),('da27cd1517d079724cbdc87b71ab7ae78c4c65434b517697e78a60a3314bfb46ba82d5ffa987ad12','3c36599ec415f5c20d0c328ad6436c920c382f3182be82118999617cc5ea32680af5c6faa807c36d',0,''),('2ccfd08093bcebb5014725caffa13837de463d67d299c385cef45e351d4285fc47216ed4b01bb42c','0a21ce368da9ae1195c0188d2239a0688702c7a6ecd249809bdeeb7f88c96e4a980ad6aca82db3e1',0,''),('e1e67bab4e21c873e37a1d97061606f0d67d5143e13c798521f352c5960533c74207cf954252b7f9','4109ceb54194a9e65fc9ea7b81e268ba7e63dea10780faf96131135f3603b9992e89bcb8d371101e',0,''),('4da15005cf6f86f78120e0bb37876a0d4d75884ca8c10eff2230c49f69909df771ff9672fae7db46','72f1b6454426ad56fff4cd75c56bef8f4ca51bc9839a26499b3b97f1b6be6fc12fea437ea0a8bb52',0,''),('5241a732b57a8d1ed135699a2428bde068055e14b81ea0b58cb6f855d5365402b049fcc956daba4a','f82fd5a60efdb17922d91d0291a8acccba333d7a7aba6ccea2208860195e9dc31e4868a050e85d86',0,''),('b84fe1793da93edd50133502aad702f8d93dc47e79cd5973f239c27a9d1a7ff99d08676d130ecdba','2f44eb0bc78b43643bae0c0aef968dbe187aa9d0ac8416d3ea639f84608df994983a4051ac57b3f3',0,''),('37767ee101bfa2471fa7d6e82679b55cf027c07c982e4f181c4191c807445fbce970037d06163c43','cef21bdd4827797c31ecb7a210408e144495460638e8f74ab6f8d832678f3a9fc06c92e90a487131',0,''),('88398d6a81e496b2e0a468d0e2c7ecece062b95b6f1d954f0f601ad66acc0daa0a45c303e949667e','ba05159197100603a8e5fd43d9a56c91a42e8540205790bfbea21ca41669197c9be7ac07a0999072',0,'');
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(0) DEFAULT NULL,
  `token` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requirements`
--

DROP TABLE IF EXISTS `requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requirements` (
  `id` varchar(0) DEFAULT NULL,
  `name` varchar(0) DEFAULT NULL,
  `description` varchar(0) DEFAULT NULL,
  `prerequisite` varchar(0) DEFAULT NULL,
  `service_id` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` tinyint(4) DEFAULT NULL,
  `name` varchar(21) DEFAULT NULL,
  `description` varchar(0) DEFAULT NULL,
  `price` varchar(2) DEFAULT NULL,
  `slot_id` varchar(0) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Baranggay Clearance','','','','',''),(2,'Baranggay Certificate','','60','','','');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slots` (
  `id` tinyint(4) DEFAULT NULL,
  `date` varchar(0) DEFAULT NULL,
  `time` varchar(0) DEFAULT NULL,
  `slots_left` tinyint(4) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slots`
--

LOCK TABLES `slots` WRITE;
/*!40000 ALTER TABLE `slots` DISABLE KEYS */;
INSERT INTO `slots` VALUES (1,'','',10,'',''),(2,'','',10,'',''),(3,'','',10,'',''),(4,'','',10,'',''),(5,'','',10,'',''),(6,'','',10,'',''),(7,'','',10,'',''),(8,'','',10,'',''),(9,'','',10,'',''),(10,'','',10,'',''),(12,'','',20,'','');
/*!40000 ALTER TABLE `slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sqlite_sequence`
--

DROP TABLE IF EXISTS `sqlite_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sqlite_sequence` (
  `name` varchar(29) DEFAULT NULL,
  `seq` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sqlite_sequence`
--

LOCK TABLES `sqlite_sequence` WRITE;
/*!40000 ALTER TABLE `sqlite_sequence` DISABLE KEYS */;
INSERT INTO `sqlite_sequence` VALUES ('migrations',14),('users',2),('admins',1),('slots',12),('oauth_clients',6),('oauth_personal_access_clients',2),('services',2);
/*!40000 ALTER TABLE `sqlite_sequence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` tinyint(4) DEFAULT NULL,
  `name` varchar(15) DEFAULT NULL,
  `email` varchar(26) DEFAULT NULL,
  `email_verified_at` varchar(0) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `remember_token` varchar(10) DEFAULT NULL,
  `created_at` varchar(0) DEFAULT NULL,
  `updated_at` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'YourName','bk2o1.syndicates@gmail.com','','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','MvJq4WMEL9','',''),(2,'Suction Cup Man','succman@usa.com','','$2y$10$Md0B1PtR97WE449p3UZo4u1jOjT5HaUOsbyUJzN.exEC/rVSujbfq','','','');
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

-- Dump completed on 2019-08-22 15:20:28
