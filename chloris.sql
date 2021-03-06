-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2016 at 11:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chloris`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(70) NOT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created_date`, `updated_date`) VALUES
(10, 'to', '2016-06-06', '2016-06-06'),
(11, 'edit', '2016-06-06', '2016-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(75) NOT NULL,
  `description` text,
  `qty` int(11) NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `sprice` decimal(10,4) DEFAULT NULL,
  `specification` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `name`, `description`, `qty`, `price`, `sprice`, `specification`, `category_id`) VALUES
(1, 1, 'prod_name', '', 1, '0.0000', '0.0000', '', 0),
(2, 1, 'prod_name', '', 1, '0.0000', '0.0000', '', 0),
(3, 1, 'prod_name', '', 1, '0.0000', '0.0000', '', 0),
(4, 1, 'prod_name', 'advad', 1, '1500.0000', '1600.0000', '', 0),
(5, 1, 'prod_name', '', 1, '0.0000', '0.0000', '', 0),
(6, 1, 'asd', 'asd', 1, '234.0000', '234.0000', '', 10),
(7, 1, 'flower', 'nice flower', 1, '1234.0000', '1234.0000', '', 10),
(8, 1, 'Red Flower', 'A beautiful red flower', 1, '200.0000', '150.0000', '', 10),
(9, 1, 'Red Flower', 'A beautiful red flower', 1, '200.0000', '150.0000', '', 10),
(10, 1, 'Red Flower', 'A beautiful red flower', 1, '200.0000', '150.0000', '', 10),
(11, 1, 'Red Flower', 'A beautiful red flower', 1, '200.0000', '150.0000', '', 10),
(12, 1, 'Red Flower', 'A beautiful red flower', 1, '200.0000', '150.0000', '', 10),
(13, 1, 'Blue Flower', 'A beautiful blue flower', 1, '300.0000', '150.0000', '', 10),
(14, 1, 'asd', 'asd', 1, '234.0000', '234234.0000', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `image_name`, `product_id`) VALUES
(1, 'chloris_product_13_image_0.jpeg', 13),
(2, 'chloris_product_13_image_1.jpg', 13),
(3, 'chloris_product_13_image_2.jpg', 13),
(4, 'chloris_product_13_image_3.jpg', 13),
(5, 'chloris_product_14_image_0.jpeg', 14),
(6, 'chloris_product_14_image_1.jpg', 14),
(7, 'chloris_product_14_image_2.jpg', 14),
(8, 'chloris_product_14_image_3.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `product_reg`
--

CREATE TABLE IF NOT EXISTS `product_reg` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `stock` int(11) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `field1` varchar(200) NOT NULL,
  `field2` varchar(200) NOT NULL,
  `field3` varchar(200) NOT NULL,
  `field4` varchar(200) NOT NULL,
  `field5` varchar(200) NOT NULL,
  `category` enum('BOUQUETS','ORNAMENTAL','WEDDING FLOWER','GIFTING') NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_reg`
--

INSERT INTO `product_reg` (`id`, `name`, `description`, `stock`, `mrp`, `price`, `field1`, `field2`, `field3`, `field4`, `field5`, `category`, `image1`, `image2`, `image3`, `image4`) VALUES
(1447664270, 'Peony,rose brochet', 'Boutonniere with peony, peony bud and rose. All the flowers made by hand from Deco clay. The boutonniere is very light, each flower is flexible.\r\n\r\nAbout 4,5 inches tall.\r\n\r\nRecommendations for care\r\nDry clean only. Suffice it to periodically remove dust from the flowers, using a brush.', 1, 100, 100, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447664350.jpg', 'product_images/photo_1447664384.jpg', 'product_images/photo_1447664400.jpg', 'product_images/photo_1447664415.jpg'),
(1447664603, 'Rose and lilac Corsage', 'Corsage with rose and lilac. All the flowers made by hand from Deco clay. The boutonniere is very light, each flower is flexible.\r\n\r\nAbout 4,5 inches tall.\r\n\r\nRecommendations for care\r\nDry clean only. Suffice it to periodically remove dust from the flowers, using a brush.\r\n', 1, 50, 50, 'Handmade item', ' Material: clay Claycraft by Deco, clay flowers', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447664616.jpg', 'product_images/photo_1447664632.jpg', 'product_images/photo_1447664645.jpg', 'product_images/photo_1447664660.jpg'),
(1447664691, 'Boutonniere for groom, Calla lilly Boutonniere, Lilac Pin, peony boutonniere', 'This is the perfect boutonniere for groom with Calla lilly ,Lilac Pin, or peony. All the flowers made by hand from Deco clay. The boutonniere is very light, each flower is flexible.\r\n\r\nAbout 4,5 inches tall.\r\n\r\nRecommendations for care\r\nDry clean only. Suffice it to periodically remove dust from the flowers, using a brush.\r\n', 1, 50, 50, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447664711.jpg', 'product_images/photo_1447665120.jpg', 'product_images/photo_1447665143.jpg', 'product_images/photo_1447665156.jpg'),
(1447665188, 'Mini Hand Tied Bouquet of roses, anemone, peony and stephanotis', 'The flowers roses, anemone, peony and stephanotis are handmade from air-dry clay and are uniquely beautiful! \r\nThis handmade bridal bouquet is approximately 20cm in diameter \r\n\r\nThis mini hand tied bouquet will decorate any wedding ceremony. Bouquet doesn''t fade. It will keep the memory of the happy day for years to come. We can also create boutonniere in the bouquet style.\r\n\r\n\r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flowers are lifelike, lightweight, and durable, making them beautiful keepsakes.', 1, 150, 150, '', '', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447665203.jpg', 'product_images/photo_1447665220.jpg', 'product_images/photo_1447665244.jpg', 'product_images/photo_1447665256.jpg'),
(1447665282, 'Bouquet with cascading of Lilies and Roses', 'The flowers lilies and roses are handmade from air-dry clay and are uniquely beautiful! \r\nThis handmade bridal bouquet is about 7.5"(20 cm) wide and 13"(40 cm) tall.\r\n\r\nThis bridal bouquet will decorate any wedding ceremony. It''s best choice for winter wedding. Bouquet doesn''t fade. It will keep the memory of the happy day for years to come. We can also create boutonniere in the bouquet style.\r\n\r\n\r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flowers are lifelike, lightweight, and durable, making them beautiful keepsakes.', 1, 250, 250, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447665293.jpg', 'product_images/photo_1447665309.jpg', 'product_images/photo_1447665327.jpg', 'product_images/photo_1447665338.jpg'),
(1447665363, 'Stem Flower Bouquet of Calla lily', 'Want something simple, yet elegant and unique for your most special occasion? Then this bouquet is yours.\r\n\r\nEach flower was handmade out of polymer clay using unique techniques to give it the most realistic look. The best part is you get to keep this bouquet for many (I mean MANY) years to come.\r\n\r\nThe bouquet consists of one dozen of calla lilies and is super lightweight (about 4 oz. or 100g.). It measures 24" (60 cm) in length and 6" (15 cm) in diameter.', 1, 250, 250, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447665621.jpg', 'product_images/photo_1447665651.jpg', 'product_images/photo_1447665668.jpg', 'product_images/photo_1447665682.jpg'),
(1447665719, 'Bouquet Bag/Purse with Ranunculus and Viburnum', 'This Bouquet Bag/Purse with Ranunculus and Viburnum is fixed on form covered with artificial leaf and a green ribbon to hold it. The flowers are handmade from air-dry clay (Deco Clay) and are uniquely beautiful! \r\nThis handmade bridal bouquet is about 12cm wide and 20cm tall.\r\n\r\nIs your wedding scheduled for the time when these gorgeous Ranunculus flowers are out of season?\r\nNot only will you have a uniquely handmade bouquet with your favorite flowers for your wedding, but also you will get to keep and enjoy these flowers for many years to come!\r\n\r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flowers are lifelike, lightweight, and durable, making them beautiful keepsakes.', 1, 250, 250, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447666344.jpg', 'product_images/photo_1447665746.jpg', 'product_images/photo_1447665759.jpg', 'product_images/photo_1447666495.jpg'),
(1447666705, 'Bouquet of english rose and stephanotis', 'This bouquet consists of 20 roses.\r\nPeach rose wedding bouquet --bridal bouquet\r\nColor - dark coral, peachy\r\nAll the flowers made by hand from polymer clay (claycraft by DECO)\r\nDiameter of approximately 24cm\r\n\r\nThese are a one of a kind bouquet and all handmade. A wonderful keepsake after your wedding.\r\n\r\nThe actual colors of goods may slightly vary from photo. Because all goods are made by hands.', 1, 200, 200, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447666716.jpg', 'product_images/photo_1447666746.jpg', 'product_images/photo_1447666762.jpg', 'product_images/photo_1447666790.jpg'),
(1447666884, 'Wedding Bouquet with Phalaenopsis Orchid, Lilac, Single and Double english Rose', '\r\nWant something simple, yet elegant and unique for your most special occasion? Then this bouquet is yours.\r\nThis handmade bridal bouquet is about 20cm wide and 30cm tall with Phalaenopsis Orchid, Lilac, Single and Double english Rose wrapped with white ribbon to match colour theme\r\n\r\nNot only will you have a uniquely handmade bouquet with your favorite flowers for your wedding, but also you will keep the memory of the happy day for years to come. Bouquet doesn''t fade. \r\n\r\nThis beautiful vase arrangement is handcrafted so the size will vary from flower to flower. Each flower is slightly different, but every bit as beautiful. \r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flower is lightweight and durable. \r\n\r\nRecommendations for care\r\nDry clean only. Keep away from water. Suffice it to periodically remove dust from the flowers, using a brush or pen usual hairdryer cold jet. Dust can be removed only with a slightly damp cloth\r\n', 1, 500, 500, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447666903.jpg', 'product_images/photo_1447666924.jpg', 'product_images/photo_1447666951.jpg', 'product_images/photo_1447666983.jpg'),
(1447667015, 'Bird Basket with 2 birds', 'This beautiful bird nest with two lovely couple birds would look stunning on top of your wedding cake or in between cake layers. This piece measures 5â€ in diameter. The nest is made of floral wire and is wrapped with clay.\r\n\r\n\r\nMade by hand from Deco clay. It is very light, and flexible.\r\n', 1, 50, 50, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1447667405.jpg', 'product_images/photo_1447667417.jpg', 'product_images/photo_1447667428.jpg', 'product_images/photo_1447667441.jpg'),
(1447667521, 'Daisy', 'The listing is for a three daisy flower(vase not included). This beautiful 2 inch daisy flower is perfect for a small vase. \r\nEach flower is handcrafted so the size will vary from flower to flower.  All flowers are handmade from air dry polymer clay ClayCraft by Deco. Each flower is slightly different, but every bit is detailed to perfection. No need to water, blooms all day long.', 1, 60, 60, 'Color = You can customise the flower colour', 'Flower = Daisy', 'Handmade item', 'Material: clay Claycraft by Deco', 'Made to order', 'ORNAMENTAL', 'product_images/photo_1447667535.jpg', 'product_images/photo_1447667563.jpg', 'product_images/photo_1447667602.jpg', 'product_images/photo_1447667631.jpg'),
(1447667722, 'Daffodils', 'The listing is for a three daisy flower(vase not included). This beautiful 2 inch daffodils flower is perfect for a small vase. \r\nEach flower is handcrafted so the size will vary from flower to flower.  All flowers are handmade from air dry polymer clay ClayCraft by Deco. Each flower is slightly different, but every bit is detailed to perfection. No need to water, blooms all day long.', 1, 60, 60, 'Color = You can customise the flower colour', 'Flower = daffodils', 'Handmade item', 'Material: clay Claycraft by Deco', 'Made to order', 'ORNAMENTAL', 'product_images/photo_1447667737.jpg', 'product_images/photo_1447667757.jpg', 'product_images/photo_1447667775.jpg', 'product_images/photo_1447667797.jpg'),
(1447667922, 'Basket', 'This beautiful basket can be used as a center piece or can be used as a flower/fruit basket.\r\nThis cute piece is handmade from air dry polymer clay ClayCraft by Deco. Its lightweight and durable. Store in a dry place, keep it away from water or liquids. So please avoid getting wet, or try to dry them as soon as when contact with water\r\n', 1, 75, 75, '', '', '', '', '', 'ORNAMENTAL', 'product_images/photo_1447667934.jpg', 'product_images/photo_1447667962.jpg', 'product_images/photo_1447667988.jpg', 'product_images/photo_1447668027.jpg'),
(1447668058, 'Strawberry man', 'This beautiful arrangement is totally handmade from air dry polymer clay Clay Craft by Deco. The figure, flowers, strawberry and leafs  are  beautifully arranged on a had sculpted shoes. Every thing is made petal by petal and detailed to perfection.\r\n\r\nBeautiful and unusual gift for friends and family. \r\n\r\nFlowers, berries and leaves are not absolutely waterproof. They are gentle, realistic, and require careful handling. Please avoid any contact with water!\r\n', 1, 100, 100, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447668073.jpg', 'product_images/photo_1447668125.jpg', 'product_images/photo_1447668148.jpg', 'product_images/photo_1447668168.jpg'),
(1447668218, 'Teddy Bear', 'This cute teddy bear and mini flower bouquet \r\nis handmade from air dry polymer clay ClayCraft by Deco. Its lightweight and durable. Store in a dry place, keep it away from water or liquids\r\n', 1, 100, 100, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447668229.jpg', 'product_images/photo_1447668330.jpg', 'product_images/photo_1447668347.jpg', 'product_images/photo_1447668365.jpg'),
(1447668412, 'Clay House', 'Clay house is handmade from air dry polymer clay ClayCraft by Deco. Each piece is hand sculpted step by step giving the detail textures . The design of the wall is made using decoupage. Itâ€™s lightweight and durable. Store in a dry place, keep it away from water .', 1, 100, 100, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447668422.jpg', 'product_images/photo_1447668449.jpg', 'product_images/photo_1447668482.jpg', 'product_images/photo_1447668508.jpg'),
(1447668542, 'Santa Claus and Christmas Tree', 'This Santa Claus and christmas tree is handmade from air dry polymer clay ClayCraft by Deco. Its lightweight and durable. Store in a dry place, keep it away from water or liquids\r\n', 1, 75, 75, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447668554.jpg', 'product_images/photo_1447668577.jpg', 'product_images/photo_1447668599.jpg', 'product_images/photo_1447668619.jpg'),
(1447668647, 'Angel', 'This Santa Claus and christmas tree is handmade from air dry polymer clay ClayCraft by Deco. Its lightweight and durable. Store in a dry place, keep it away from water or liquids\r\n', 1, 60, 60, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447668655.jpg', 'product_images/photo_1447668671.jpg', 'product_images/photo_1447668688.jpg', 'product_images/photo_1447668705.jpg'),
(1447669037, 'Vase arrangement with Peony, Roses and Daisy', 'This beautiful arrangement is totally handmade from air dry polymer clay ClayCraft by Deco. All Flowers are hand sculpted petal by petal.\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.', 1, 150, 150, 'Flowers included : 3 Peony, 10 rose, 3 gerber daisy, and small filler flowers', 'Vase: included', 'Handmade item', 'Material: clay Claycraft by Deco,flower pot, clay flowers', '', 'ORNAMENTAL', 'product_images/photo_1447669139.jpg', 'product_images/photo_1447669160.jpg', 'product_images/photo_1447669185.jpg', 'product_images/photo_1447669206.jpg'),
(1447669245, 'Vase Arrangement with Daffodils, rose and small filler flower', 'his beautiful vase arrangement is handcrafted so the size will vary from flower to flower. Each flower is slightly different, but every bit as beautiful. \r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flower is lightweight and durable. \r\n\r\nRecommendations for care\r\nDry clean only. Keep away from water. Suffice it to periodically remove dust from the flowers, using a brush or pen usual hairdryer cold jet. Dust can be removed only with a slightly damp cloth', 1, 150, 150, 'Flowers included : 8 Roses, 30-40 hydrangea and 6 Ochid', 'Vase: included ', 'Handmade item', 'Material: clay Claycraft by Deco,flower pot, clay flowers', '', 'ORNAMENTAL', 'product_images/photo_1447669262.jpg', 'product_images/photo_1447669294.jpg', 'product_images/photo_1447669315.jpg', 'product_images/photo_1447669340.jpg'),
(1447669380, 'Vase Arrangement with Daffodils, rose and small filler flower', 'This beautiful arrangement is totally handmade from air dry polymer clay ClayCraft by Deco. All Flowers are hand sculpted petal by petal.\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.\r\nIt can be made in any color.', 1, 100, 100, 'Flowers included :  Daffodils, rose, leafs and small filler flowers', 'Vase: included', 'Handmade item', 'Material: clay Claycraft by Deco,flower pot, clay flowers', '', 'ORNAMENTAL', 'product_images/photo_1447669391.jpg', 'product_images/photo_1447669410.jpg', 'product_images/photo_1447669431.jpg', 'product_images/photo_1447669470.jpg'),
(1447735974, 'Flower Basket', 'Note the listing is for a sunflower, eucharist, rose, daisies and small flowers.This beautiful 4.25-4.5 inch flower basket is perfect for a wall/door hanging. Each flower is handcrafted so the size will vary from flower to flower. Each flower is slightly different, but every bit as beautiful.\r\nFlowers made of air dry clay, very light and flexible.\r\nEach flower petal and leaves made by hand.\r\nLength 10cm.', 1, 100, 100, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447736001.jpg', 'product_images/photo_1447736021.jpg', 'product_images/photo_1447736038.jpg', 'product_images/photo_1447736073.jpg'),
(1447736389, 'Duck', 'This cute duck in pond is handmade from air dry polymer clay ClayCraft by Deco. Its lightweight and durable. Store in a dry place, keep it away from water or liquids\r\n', 1, 75, 75, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447736404.jpg', 'product_images/photo_1447736431.jpg', 'product_images/photo_1447736453.jpg', 'product_images/photo_1447736478.jpg'),
(1447736516, 'Vase Arrangement with Calla Lily,Tulip and Hydrengia', 'This beautiful vase arrangement is handcrafted so the size will vary from flower to flower. Each flower is slightly different, but every bit as beautiful. \r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flower is lightweight and durable. \r\n\r\nRecommendations for care\r\nDry clean only. Keep away from water. Suffice it to periodically remove dust from the flowers, using a brush or pen usual hairdryer cold jet. Dust can be removed only with a slightly damp cloth', 1, 250, 250, 'Flowers: 5 Calla lily, 9 tulip and 30-40 hydrangea. ', 'Vase: included', 'Color: The actual colors of goods may slightly vary from photo. Because all goods are made by hands.', 'Material: clay Claycraft by Deco,flower pot, clay flowers', ' Handmade item', 'ORNAMENTAL', 'product_images/photo_1447736530.jpg', 'product_images/photo_1447736560.jpg', 'product_images/photo_1447736603.jpg', 'product_images/photo_1447736633.jpg'),
(1447736669, 'Magnolia Tree', 'Its a beautiful Magnolia Tree and is totally handmade from air dry polymer clay ClayCraft by Deco. All Flowers and branches are hand sculpted petal by petal and textured to perfection\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.', 1, 250, 250, 'Flowers included :   3 Magnolia flower and buds', 'Vase: included', 'Handmade item', 'Material: clay Claycraft by Deco,flower pot, clay flowers', '', 'ORNAMENTAL', 'product_images/photo_1447736683.jpg', 'product_images/photo_1447736702.jpg', 'product_images/photo_1447736726.jpg', 'product_images/photo_1447736750.jpg'),
(1447736790, 'Christmas Wreath with poppy,christmas rose, pear and apple', 'Christmas wreath with handmade flowers.\r\nAbsolutely all of the flowers handmade from polymer clay Deco. Perfectly complement your interior, filling it with a unique charm, sunlight and really cold winter. It serves unusual and exquisite gift for your dear and loved ones for any special occasions.\r\nFlowers could be different and can be in any colour.\r\n\r\nThe wreath is lightweight and durable. Store in a dry place, keep it away from water or liquids. In the case of soaking - better to use the hair dryer. The product requires careful handling.', 1, 300, 300, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447736803.jpg', 'product_images/photo_1447736835.jpg', 'product_images/photo_1447736861.jpg', 'product_images/photo_1447736880.jpg'),
(1447736907, 'Wreath', 'Interior wreath with handmade flowers.\r\nAbsolutely all of the flowers handmade from polymer clay Deco. Perfectly complement your interior, filling it with a unique charm, sunlight and really warm spring. It serves unusual and exquisite gift for your dear and loved ones for any special occasions.\r\nFlowers could be different and can be in any colour.\r\n\r\n The wreath is lightweight and durable. Store in a dry place, keep it away from water or liquids. In the case of soaking - better to use the hair dryer. The product requires careful handling.', 1, 350, 350, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447736924.jpg', 'product_images/photo_1447736972.jpg', 'product_images/photo_1447736993.jpg', 'product_images/photo_1447737014.jpg'),
(1447737043, 'Flower Ball Topiary', 'Are you in search of something unique and pretty for your home?\r\n\r\nThis is how a topiary came to be. \r\n\r\nEach flower is slightly different, but every bit as beautiful. \r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flower is lightweight and durable. \r\n\r\nRecommendations for care\r\nDry clean only. Keep away from water. Suffice it to periodically remove dust from the flowers, using a brush or pen usual hairdryer cold jet. Dust can be removed only with a slightly damp cloth\r\n\r\nThe topiary is 7" in diameter and 18" inches in height.', 1, 200, 200, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447737057.jpg', 'product_images/photo_1447737106.jpg', 'product_images/photo_1447737122.jpg', 'product_images/photo_1447737144.jpg'),
(1447737674, 'Iris plant', 'Its a beautiful Magnolia Plant and is totally handmade from air dry polymer clay ClayCraft by Deco. All Flowers and branches are hand sculpted petal by petal , textured to perfection  and coloured to get the realistic appeal\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.\r\n', 1, 200, 200, 'Flowers included :   4 Iris flower and 2 buds', 'Vase: included', 'Color: The actual colors of goods may slightly vary from photo. Because all goods are made by hands', 'Material: clay Claycraft by Deco,flower pot, clay flowers', ' Handmade item', 'ORNAMENTAL', 'product_images/photo_1447737695.jpg', 'product_images/photo_1447737721.jpg', 'product_images/photo_1447737741.jpg', 'product_images/photo_1447737767.jpg'),
(1447737797, 'Water Lily', 'Its a beautiful Water Lily and is totally handmade from air dry polymer clay ClayCraft by Deco. All Flowers and branches are hand sculpted petal by petal , textured to perfection  and coloured to get the realistic appeal. The lilies are permantly fixed to the vase using magic water\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.', 1, 200, 200, 'Flowers included :   2 water lily and leaf', 'Vase: included', 'Color: The actual colors of goods may slightly vary from photo. Because all goods are made by hands', 'Material: clay Claycraft by Deco,flower pot, clay flowers', ' Handmade item', 'ORNAMENTAL', 'product_images/photo_1447737808.jpg', 'product_images/photo_1447737830.jpg', 'product_images/photo_1447737848.jpg', 'product_images/photo_1447737869.jpg'),
(1447737897, 'Anthurium,cymbidium rose and pincushion', 'This beautiful arrangement is totally handmade from air dry polymer clay ClayCraft by Deco. All flowers are hand sculpted petal by petal. This piece makes a beautiful and exceptional wall hanging.\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.', 1, 400, 400, 'Flowers included : 3 Anthurium, 5 rose, 2 pincushion, and 2 cymbidium', ' The actual colors of goods may slightly vary from photo. Because all goods are made by hands', 'Handmade item', 'Material: clay Claycraft by Deco,flower pot, clay flowers', '', 'ORNAMENTAL', 'product_images/photo_1447738673.jpg', 'product_images/photo_1447738691.jpg', 'product_images/photo_1447738703.jpg', 'product_images/photo_1447738717.jpg'),
(1447738855, 'Braided Vine Floral Arrangement with hydrengia and cattleya', 'This beautiful arrangement is totally handmade from air dry polymer clay ClayCraft by Deco. All flowers are hand sculpted petal by petal. This piece makes a beautiful and exceptional center piece for the table.\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.', 1, 300, 300, 'Flowers included : 2 bunch of hydrengia and 2 cattleya ', 'The actual colors of goods may slightly vary from photo. Because all goods are made by hands', 'Vase: not included', 'Material: clay Claycraft by Deco,flower pot, clay flowers', ' Handmade item', 'ORNAMENTAL', 'product_images/photo_1447738880.jpg', 'product_images/photo_1447738903.jpg', 'product_images/photo_1447738922.jpg', 'product_images/photo_1447738948.jpg'),
(1447738981, 'Tulips', 'This beautiful arrangement is totally handmade from air dry polymer clay ClayCraft by Deco. All flowers are hand sculpted petal by petal. This piece makes a beautiful and exceptional centerpiece for the table.\r\nBeautiful and unusual gift for friends and family. \r\nThese flowers will never fade and will delight for years to come.\r\n\r\nThe flower is lightweight and durable. Store in a dry place, keep it away from water or liquids. In the case of soaking - better to use the hair dryer. The product requires careful handling.', 1, 300, 300, 'Flowers included : 10 tulips ', 'The actual colors of goods may slightly vary from photo. Because all goods are made by hands', 'Vase: not included', 'Material: clay Claycraft by Deco,flower pot, clay flowers', ' Handmade item', 'ORNAMENTAL', 'product_images/photo_1447739004.jpg', 'product_images/photo_1447739019.jpg', 'product_images/photo_1447739034.jpg', 'product_images/photo_1447739075.jpg'),
(1447739103, 'Miniature bakery', 'This beautiful arrangement is totally handmade from air dry polymer clay ClayCraft by Deco. All bakery items like cakes, pastry , the wreath, and display cabinet are all hand sculpted piece by piece giving details for all the items. The wall is tectured using decoupage. This piece makes a beautiful and exceptional wall hanging.\r\nBeautiful and unusual gift for friends and family. ', 1, 300, 300, '', 'Material: clay Claycraft by Deco, clay flowers', 'Handmade item', '', '', 'ORNAMENTAL', 'product_images/photo_1447739266.jpg', 'product_images/photo_1447739299.jpg', 'product_images/photo_1447739338.jpg', 'product_images/photo_1447739362.jpg'),
(1447739413, 'Bonsai cherry', 'Its a beautiful handcrafted clay pink plum/cherry blossoms and buds that are handwired and is totally handmade from air dry polymer clay ClayCraft by Deco. All Flowers and branches are hand sculpted petal by petal and textured to perfection\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.\r\n', 1, 250, 250, 'Flowers included :   cherry flowers', 'Vase: included', 'Handmade item', 'Material: clay Claycraft by Deco,flower pot, clay flowers', '', 'ORNAMENTAL', 'product_images/photo_1447739426.jpg', 'product_images/photo_1447739729.jpg', 'product_images/photo_1447739759.jpg', 'product_images/photo_1447739781.jpg'),
(1447739850, 'Girl', 'This cute girl is handmade from air dry polymer clay ClayCraft by Deco. Its lightweight and durable. Store in a dry place, keep it away from water or liquids', 1, 100, 100, '', '', '', '', '', 'ORNAMENTAL', 'product_images/photo_1447739864.jpg', 'product_images/photo_1447739884.jpg', 'product_images/photo_1447739901.jpg', 'product_images/photo_1447739913.jpg'),
(1447739980, 'Box Arrangement with Hybiscus, Plumeria and gardenia', 'This beautiful box arrangement is handcrafted so the size will vary from flower to flower. Each flower is slightly different, but every bit as beautiful. \r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flower is lightweight and durable\r\n', 1, 70, 70, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'GIFTING', 'product_images/photo_1447739999.jpg', 'product_images/photo_1447740023.jpg', 'product_images/photo_1447740045.jpg', 'product_images/photo_1447740066.jpg'),
(1447740088, 'Wall hanging with Roses, Berry and tube rose ', 'This beautiful wall hanging with Roses, Berry and tube rose is handcrafted.\r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flower is lightweight and durable\r\n\r\nEach petal and leaf of the flower is made by hand, for this reason can not be perfectly accurate repetition, and bespoke flowers may differ slightly from that shown in the photo.\r\n\r\nRecommendations for care\r\nDry clean only. Keep away from water. Suffice it to periodically remove dust from the flowers, using a brush or pen usual hairdryer cold jet. Dust can be removed only with a slightly damp cloth.', 1, 100, 100, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'GIFTING', 'product_images/photo_1447740099.jpg', 'product_images/photo_1447740126.jpg', 'product_images/photo_1447740148.jpg', 'product_images/photo_1447740170.jpg'),
(1447740200, 'Mirror', 'This mirror is handcrafted. Each flower is slightly different, but every bit as beautiful. \r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The mirror is lightweight and durable', 1, 30, 30, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers', '', '', '', 'GIFTING', 'product_images/photo_1447741035.jpg', 'product_images/photo_1447741080.jpg', 'product_images/photo_1447741108.jpg', 'product_images/photo_1447741142.jpg'),
(1447741170, 'Wall hanging with Roses', 'This beautiful wall hanging with Roses, Berry and tube rose is handcrafted.\r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flower is lightweight and durable\r\n\r\nEach petal and leaf of the flower is made by hand, for this reason can not be perfectly accurate repetition, and bespoke flowers may differ slightly from that shown in the photo.\r\n\r\nRecommendations for care\r\nDry clean only. Keep away from water. Suffice it to periodically remove dust from the flowers, using a brush or pen usual hairdryer cold jet. Dust can be removed only with a slightly damp cloth.', 1, 100, 100, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers', '', '', '', 'GIFTING', 'product_images/photo_1447741182.jpg', 'product_images/photo_1447741212.jpg', 'product_images/photo_1447741241.jpg', 'product_images/photo_1447741254.jpg'),
(1447741278, 'Wall hanging with Roses', 'This beautiful wall hanging with Roses, Berry and tube rose is handcrafted.\r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flower is lightweight and durable\r\n\r\nEach petal and leaf of the flower is made by hand, for this reason can not be perfectly accurate repetition, and bespoke flowers may differ slightly from that shown in the photo.\r\n\r\nRecommendations for care\r\nDry clean only. Keep away from water. Suffice it to periodically remove dust from the flowers, using a brush or pen usual hairdryer cold jet. Dust can be removed only with a slightly damp cloth.\r\n', 1, 100, 100, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers', '', '', '', 'GIFTING', 'product_images/photo_1447741288.jpg', 'product_images/photo_1447741304.jpg', 'product_images/photo_1447741326.jpg', 'product_images/photo_1447741348.jpg'),
(1447741383, 'Shell and Rose Wreath', 'This beautiful wall hanging with Roses, Berry and tube rose is handcrafted.\r\nAll flowers and shell are handmade from air dry polymer clay ClayCraft by Deco. The piece is lightweight and durable\r\n\r\nEach petal of the flower is made by hand, for this reason can not be perfectly accurate repetition, and bespoke flowers may differ slightly from that shown in the photo.', 1, 100, 100, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers', '', '', '', 'GIFTING', 'product_images/photo_1447741395.jpg', 'product_images/photo_1447741413.jpg', 'product_images/photo_1447741425.jpg', 'product_images/photo_1447741442.jpg'),
(1447741468, 'Door Hanging', 'This beautiful arrangement is totally handmade from air dry polymer clay ClayCraft by Deco. All Flowers are hand sculpted petal by petal.\r\nBeautiful and unusual gift for friends and family which can make a perfect front door hanging.\r\nThis flowers will never fade and will delight for years to come.\r\nIt can be made in any color.', 1, 1, 1, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers', '', '', '', 'GIFTING', 'product_images/photo_1447742678.jpg', 'product_images/photo_1447742764.jpg', 'product_images/photo_1447742790.jpg', 'product_images/photo_1447742806.jpg'),
(1447742849, 'Favor Box with Tiare, Orchid and gardenia', 'This beautiful favor box arrangement is totally handmade from air dry polymer clay ClayCraft by Deco. All Flowers are hand sculpted petal by petal.\r\nBeautiful and unusual gift for friends and family. \r\nThis flowers will never fade and will delight for years to come.\r\n\r\nFlowers included : 1 Tiare, 1  Orchid and 1 gardenia\r\nVase: included\r\n', 1, 100, 100, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers', '', '', '', 'GIFTING', 'product_images/photo_1447743341.jpg', 'product_images/photo_1447743358.jpg', 'product_images/photo_1447743374.jpg', 'product_images/photo_1447743393.jpg'),
(1449477953, 'Bouquet with Peony', 'This lush bridal bouquet with pink peonies is wrapped with yellow ribbon to match the flowers'' centers. The flowers are handmade from air-dry clay and are uniquely beautiful! \r\nThis handmade bridal bouquet is about 7.5"(20 cm) wide and 11"(28 cm) tall.\r\n\r\nAre you someone who LOVES peonies? Is your wedding scheduled for the time when these gorgeous flowers are out of season?\r\nNot only will you have a uniquely handmade bouquet with your favorite flowers for your wedding, but also you will get to keep and enjoy these flowers for many years to come!\r\n\r\nAll flowers are handmade from air dry polymer clay ClayCraft by Deco. The flowers are lifelike, lightweight, and durable, making them beautiful keepsakes.', 1, 400, 400, 'Handmade item', 'Material: clay Claycraft by Deco, clay flowers, brocade ribbon', '', '', '', 'WEDDING FLOWER', 'product_images/photo_1449477995.jpg', 'product_images/photo_1449478020.jpg', 'product_images/photo_1449478037.jpg', 'product_images/photo_1449478072.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tenp_reg`
--

CREATE TABLE IF NOT EXISTS `tenp_reg` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1200) NOT NULL,
  `stock` int(11) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `field1` varchar(200) NOT NULL,
  `field2` varchar(200) NOT NULL,
  `field3` varchar(200) NOT NULL,
  `field4` varchar(200) NOT NULL,
  `field5` varchar(200) NOT NULL,
  `category` enum('BOUQUETS','ORNAMENTAL','WEDDING FLOWER','GIFTING') NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenp_reg`
--

INSERT INTO `tenp_reg` (`id`, `name`, `description`, `stock`, `mrp`, `price`, `field1`, `field2`, `field3`, `field4`, `field5`, `category`, `image1`, `image2`, `image3`, `image4`) VALUES
(1458364153, '', '', 0, 0, 0, '', '', '', '', '', 'BOUQUETS', '', '', '', ''),
(1458364688, '', '', 0, 0, 0, '', '', '', '', '', 'BOUQUETS', '', '', '', ''),
(1464931708, '', '', 0, 0, 0, '', '', '', '', '', 'BOUQUETS', '', '', '', ''),
(1464931801, '', '', 0, 0, 0, '', '', '', '', '', 'BOUQUETS', '', '', '', ''),
(1464932030, '', '', 0, 0, 0, '', '', '', '', '', 'BOUQUETS', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'chloris@gmail.com', '83a06f0d171a5035b726fa3bd70fc538');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
