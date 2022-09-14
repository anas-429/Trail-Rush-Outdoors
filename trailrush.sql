-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 02:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trailrush`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` tinyint(4) NOT NULL,
  `product` varchar(100) NOT NULL,
  `category` enum('Camping','Cycling','Fishing','Rafting') NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `properties` tinytext NOT NULL,
  `values` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `category`, `price`, `image`, `description`, `properties`, `values`) VALUES
(1, 'Rebel FLSP', 'Cycling', 1200, 'rebel-flsp.png', 'The Rebel FLSP is a full-suspension mountain bike, meaning both the fork and the rear shock feature suspension components. This bike can handle bumpy trails, which allows the bike to absorb impact front and back.', '<td>Wheel Diameter</td>\r\n<td>Top Tube</td>\r\n<td>Stand-Over</td>\r\n<td class=\"margin-none\">Wheelbase</td>\r\n', '<td>26 in</td>\r\n<td>600mm</td>\r\n<td>2.8 inches</td>\r\n<td class=\"margin-none\">1120 mm</td>'),
(2, 'Level Dome', 'Camping', 400, 'level-dome.png', 'This tent is perfect for first-time campers because it utilizes two flexible poles that intersect with one another. This system makes the tent relatively easy to set up, and its material protects it from hail.', '<td>Capacity</td>\r\n<td>Weight</td>\r\n<td>Centre Height</td>\r\n<td class=\"margin-none\">Floor Space</td>\r\n', '<td>4-person</td>\r\n<td>9.8 ibs</td>\r\n<td>60 inches</td>\r\n<td class=\"margin-none\">8 ft x 7 ft</td>'),
(3, 'Waterway SOT kayak', 'Rafting', 562, 'sot-kayak.png', 'The Sit on Top kayak is wide enough that it can give you good stability on the water. This boat also has adjustable foot braces that accommodate anyone of varying heights.', '<td>Material</td>\r\n<td>Length</td>\r\n<td>Width</td>\r\n<td class=\"margin-none\">Weight Capacity</td>', '<td>Polyethylene</td>\r\n<td>10 Ft</td>\r\n<td>75 cm</td>\r\n<td class=\"margin-none\">295 ibs</td>'),
(4, 'Spinning Rod', 'Fishing', 44, 'spinning-rod.png', 'This fishing rod comes with a spinning reel, which is much simpler to use when compared to a baitcasting reel. It is ideal for catching smaller fish. The fiberglass material gives the pole a lot of flexibility while trying to catch resistant fish.', '<td>Length</td>\r\n<td>Power</td>\r\n<td>Material</td>\r\n<td class=\"margin-none\">Lure Weight</td>\r\n', '<td>6 ft</td>\r\n<td>Medium</td>\r\n<td>Fibre Glass</td>\r\n<td class=\"margin-none\">1/16 - 1/2 Oz</td>'),
(5, 'Sleeping Bag', 'Camping', 320, 'sleeping-bag.png', 'The rectangular shape of the sleeping bag ensures the ability to move your legs comfortably. The synthetic material ensures you stay warm at high altitudes or on rainy days.', '<td>Insulation</td>\r\n<td>Season</td>\r\n<td class=\"margin-none\">Capacity</td>', '<td>Synthetic</td>\r\n<td>3 Season</td>\r\n<td class=\"margin-none\">1-Person</td>'),
(6, 'Heavyweight RG', 'Cycling', 1100, 'heavyweight-rg.png', 'The Heavyweight RG is a rigid mountain bike with thick tires front and back. Even though it doesn\'t use any suspension components, the thickness of the tires is soft enough to maintain grip in rough terrain.', '<td>Wheel Diameter</td>\r\n<td>Tire Thickness</td>\r\n<td>Top Tube</td>\r\n<td>Stand-Over Height</td>\r\n<td class=\"margin-none\">Wheelbase</td>\r\n', '<td>26 in</td>\r\n<td>3 inches</td>\r\n<td>550mm</td>\r\n<td>30 inches</td>\r\n<td class=\"margin-none\">1080 mm</td>\r\n'),
(7, 'Waterway SIS Kayak', 'Rafting', 464, 'sit-inside-kayak.png', 'The Waterway Kayak is ideal for those who want a short boat maneuverable in the water. The Sit Inside feature can keep you warm in case you get covered with cold water. The High-Density Polyethylene material protects it from UV damage, abrasions, and impact.\r\n', '<td>Material</td> \r\n<td>Length</td>\r\n<td>Weight Capacity</td>\r\n<td class=\"margin-none\">Width</td>', '<td>High Density Polyethylene</td> \r\n<td>11 Ft</td>\r\n<td>300 ibs</td>\r\n<td class=\"margin-none\">72 cm</td>'),
(8, 'Circle Fish Net', 'Fishing', 30, 'circle-fish-net.png', 'If you describe this fishnet in one word, it would be easy to use. The rubber material ensures the net will not get tangled up and can hold up while trying to catch the heavier fish.\r\n', '<td>Net Depth</td>\r\n<td>Net Material</td>\r\n<td>Hoop Diameter</td>\r\n<td class=\"margin-none\">Handle Length</td>', '<td>40 cm</td>\r\n<td>Rubber</td>\r\n<td>44 cm</td>\r\n<td class=\"margin-none\">28 in</td>'),
(9, 'Geta Grip Pedals', 'Cycling', 30, 'geta-pedals.png', 'The All-Terrain Pedal is a flat pedal with removable bearings. Highly recommended for mountain biking as the base and aluminum material allow you to keep foot traction.', '<td>Material</td>\r\n<td>Pedal Type</td>\r\n<td>Spindle Material</td>\r\n<td>Weight</td>\r\n<td class=\"margin-none\">Thread Size</td>', '<td>Aluminum Alloy</td>\r\n<td>Flat Pedal</td>\r\n<td>Stainless Steel</td>\r\n<td>520 g</td>\r\n<td class=\"margin-none\">0.5625 mm</td>'),
(10, 'Mountain Peak Backpack', 'Camping', 229, 'mountain-peak-backpack.png', 'If you are looking for a waterproof backpack that can hold many items, look no further! This lightweight backpack contains five compartments and two mesh storage pockets for storing multiple items.', '<td>Material</td>\r\n<td>Volume</td>\r\n<td>Weight</td>\r\n<td class=\"margin-none\">Gender</td>', '<td>Nylon</td>\r\n<td>65 L</td>\r\n<td>1.75 KG</td>\r\n<td class=\"margin-none\">Unisex</td>'),
(11, 'Riverfloat Dinghy', 'Rafting', 1100, 'riverfloat-dinghy.png', 'The Riverfloat is very stable and buoyant on the water. The lightweight design makes this boat very easy to maneuver in the water. Perfect for those looking for an inexpensive boat for inland water fishing.\r\n', '<td>Length:</td>\r\n<td>Inner Dimensions:</td>\r\n<td>Passenger Capacity:</td>\r\n<td class=\"margin-none\">Material:</td>', '<td>10 Inches</td>\r\n<td>7.5 in by 2 in</td>\r\n<td>5 Person</td>\r\n<td class=\"margin-none\">PVC</td>'),
(12, 'J-Hook', 'Fishing', 12, 'j-hook.png', 'The J Hook is the standard used for catching fish. The sharp end is deep to prevent the fish from slipping away. The stainless steel material is strong enough to handle bigger fish.', '<td>Hook Type</td> \r\n<td>Material</td>\r\n<td class=\"margin-none\">Size</td> \r\n', '<td>Circle Hook</td>\r\n<td>Stainless Steel</td>\r\n<td class=\"margin-none\">6/0</td>\r\n'),
(13, 'Flipper Paddle', 'Rafting', 50, 'flipper-paddle.png', 'This double-bladed paddle is very easy to use because of its durability and lightweight design. The dihedral blades offer a smooth stroke that makes paddling much more efficient. ', '<td>Length</td>\r\n<td>Handle Diameter</td>\r\n<td>Shaft Material</td>\r\n<td class=\"margin-none\">Blade Material</td>\r\n', '<td>220 cm</td>\r\n<td>2.5 cm</td>\r\n<td>Carbon Fibre</td>\r\n<td class=\"margin-none\">Polyethylene</td>'),
(14, 'Prostove', 'Camping', 248, 'prostove.png', 'This stove can be used on all types of surfaces, which makes it easier to balance and work on since it is not on top of a gas canister.', '<td>Fuel</td>\r\n<td>Cooking Surface</td>\r\n<td>Boil Time</td>\r\n<td class=\"margin-none\">Material</td>', '<td>Propane</td>\r\n<td>Two Burner</td>\r\n<td>4 Min</td>\r\n<td class=\"margin-none\">Aluminum and Steel</td>'),
(15, 'Intersect Chair', 'Camping', 75, 'intersect-chair.png', 'You can fold this chair to the size of a handheld item. The curve of the seat and backrest allows you to lean back and rest with maximum comfort.', '<td>Chair Material</td>\r\n<td class=\"margin-none\">Leg Material</td>', '<td>Polyester Mesh Fabric</td>\r\n<td class=\"margin-none\">Steel</td>'),
(16, 'Geta Grip Handle Bars', 'Cycling', 74, 'geta-handlebar.png', 'The Geta Grip Drop Bar offers a variety of hand positions, depending on your personal preferences. The advantage of choosing this over a flat bar is that it doesn\'t put a lot of strain on your wrist.', '<td>Material</td>\r\n<td>Rise</td>\r\n<td>Width</td>\r\n<td class=\"margin-none\">Weight</td>\r\n', '<td>Aluminum Alloy</td>\r\n<td>35mm</td>\r\n<td>40cm</td>\r\n<td class=\"margin-none\">200g</td>'),
(17, 'Fishing Reel', 'Fishing', 44, 'fishing-reel.png', 'The fly reel offers a lightweight and easy-to-use fishing experience. Highly recommended for use in rivers and ponds. It allows the reel to cast smoothly and at longer distances.', '<td>Material</td>\r\n<td>Weight</td>\r\n<td class=\"margin-none\">Line Weight</td>\r\n\r\n', '<td>Stainless Steel</td>\r\n<td>5.6 oz</td>\r\n<td class=\"margin-none\">4/5/6</td>'),
(18, 'Waterway Lifejacket', 'Rafting', 40, 'waterway-lifejacket.png', 'The advantage of this type of lifejacket is that it will turn unconscious boaters upside down, which prevents them from drowning. We do not recommend using this lifejacket for rough water. ', '<td>Material</td>\r\n<td>Type</td>\r\n<td>Chest</td>\r\n<td class=\"margin-none\">Buoyancy</td>\r\n', '<td>Nylon</td>\r\n<td>Near-Shore</td>\r\n<td>105-120mm</td>\r\n<td class=\"margin-none\">16 ibs</td>'),
(19, 'Bicycle Helmet', 'Cycling', 35, 'bicycle-helmet.png', 'This helmet has adjustable straps that can fit the size of the head of an adult. It also features cooling vents and padding to keep your head comfortable.', '<td>Age Group</td>\r\n<td class=\"margin-none\">Helmet Diameter Range</td>\r\n', '<td>Adults</td>\r\n<td class=\"margin-none\">52-60 cm</td>'),
(20, 'Flared Fishing Float', 'Fishing', 35, 'fishing-float.png', 'This fishing float has a flare design, which means it\'s narrow at the bottom and wide at the top. This design allows the float to stay on the surface level while allowing it to sink from resistance.', '<td>Shape</td>\r\n<td>Material</td>\r\n<td>Size</td>\r\n<td class=\"margin-none\">Weight</td>\r\n', '<td>Oval</td>\r\n<td>Wood</td>\r\n<td>5 Inches</td>\r\n<td class=\"margin-none\">8 grams</td>\r\n ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
