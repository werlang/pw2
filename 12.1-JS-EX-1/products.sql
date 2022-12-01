CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT "",
  `price` float DEFAULT 0,
  `quantity` int DEFAULT 0,
  `image` varchar(2048) DEFAULT "",
  PRIMARY KEY (`id`)
);
