-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 03:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slothbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Accessories'),
(2, 'Decoration'),
(3, 'Mug'),
(4, 'Painting'),
(5, 'Plush'),
(6, 'Shirts'),
(7, 'Tools');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'Sloth Portrait C', 'Display your love of animals in your home with this eye-catching adorable smiling sloth portrait. ', 10, 'images\\Shop\\Painting\\P (6).jpg', 4),
(2, 'Sloth Keychain', 'Keychain', 7.5, 'images\\Shop\\Accessories\\A (2).jpg', 1),
(3, '3-Piece Brown Sloth Rings', 'Just picture it: You can get hugged by a sloth accesso every day.', 79.8, 'images\\Shop\\Accessories\\A (3).jpg', 1),
(4, 'Sloth ring holder', 'And a little knick-knack accesso for holding your rings and melting your heart at the same time.', 28.12, 'images\\Shop\\Accessories\\A (5).jpg', 1),
(5, 'Hairy Slother keychain', 'Our Hairy Slother is now a Keychain. Printed on a high quality, laser cut acrylic. Waterproof and one of a kind.', 8, 'images\\Shop\\Accessories\\A (7).jpg', 1),
(6, 'Sloth Sleep Mask', 'Catch your beauty rest while simultaneously scaring the crap out of your accesso bed mate.\r\n', 28, 'images\\Shop\\Accessories\\A (8).jpg', 1),
(7, 'Hammerhead Shark and Sloth pin', 'Because sloths love shark rodeo, Keychain obviously.', 9.97, 'images\\Shop\\Accessories\\A (9).jpg', 1),
(8, 'iPhone 8/iPhone 7 Case S', 'It s always a good time for a sloth phone case.', 9.99, 'images\\Shop\\Accessories\\A (10).jpg', 1),
(9, 'iPhone 8/iPhone 7 Case P', 'It s always a good time for a sloth phone case.', 9.99, 'images\\Shop\\Accessories\\A (11).jpg', 1),
(10, 'iPhone 8/iPhone 7 Case Y', 'It s always a good time for a sloth phone case.', 9.99, 'images\\Shop\\Accessories\\A (12).jpg', 1),
(11, 'PopSockets', 'Cute Sloth Gift PopSockets Grip and Stand for phone and Tablets.', 15, 'images\\Shop\\Accessories\\A (14).jpg', 1),
(12, 'Team Sloth Silver Bar Chain Bracelet', 'This engraved accesso bar chain bracelet with a sterling silver pendant can become anything you want it to be.', 35.59, 'images\\Shop\\Accessories\\A (16).jpg', 1),
(13, 'Sloth Key Fob', 'Never lose your keys again. Grab one of these Keychain and bring a little sloth love with you everywhere you go.', 7.99, 'images\\Shop\\Accessories\\A (17).jpg', 1),
(14, 'Plant Holder + Plant S', 'These little deco sloth air plant holders come with an air plant already in his arms and a care instruction card as well.', 27, 'images\\Shop\\Deco\\D (4).jpg', 2),
(15, 'Plant Holder + Plant L', 'These little deco sloth air plant holders come with an air plant already in his arms and a care instruction card as well.', 35.89, 'images\\Shop\\Deco\\D (6).jpg', 2),
(16, 'Sloth Wine Bottle Labels', 'Let s Hang - Sloth deco wine bottle labels are the perfect addition to your party. Each of the four Sloth designs perfectly coordinate to help you style a party beverage bar.', 8.89, 'images\\Shop\\Deco\\D (5).jpg', 2),
(17, 'Sloth Shower Curtain L', 'A pretty incredible deco shower curtain that will have you making everyone go to the bathroom to check it out.', 32.95, 'images\\Shop\\Deco\\D (9).jpg', 2),
(18, 'Sloth Shower Curtain G', 'A pretty incredible deco shower curtain that will have you making everyone go to the bathroom to check it out.', 32.95, 'images\\Shop\\Deco\\D (10).jpg', 2),
(19, 'Sloth decal, Car decoration', 'If you ve been driving around without a deco sloth car Decal, you ve been doing life wrong.', 8, 'images\\Shop\\Deco\\D (11).jpg', 2),
(20, 'Sloth Tea Infuser', 'Enjoy a nice mugo cup of tea the way the gods intended you to. ', 14.53, 'images\\Shop\\Mug\\M (1).jpg', 3),
(21, 'Stemless Wine Glass', 'Let s Get mugo Slothed.', 16.95, 'images\\Shop\\Mug\\M (4).jpg', 3),
(22, 'Slo-Mo Cocoa, Sloth Mug', 'This isn t just a sloth mugo. It comes with hot cocoa mix, to warm even the coldest of hearts.', 9.99, 'images\\Shop\\Mug\\M (5).jpg', 3),
(23, 'Sloth Coffee Mug C', 'Simple Mug mugo', 16.99, 'images\\Shop\\Mug\\M (2).jpg', 3),
(24, 'Sloth Coffee Mug A', 'Simple Mug mugo Avengers.', 16.99, 'images\\Shop\\Mug\\M (3).jpg', 3),
(25, 'Sloth Coffee Mug WW', 'Simple Mug mugo ', 16.99, 'images\\Shop\\Mug\\M (6).jpg', 3),
(26, 'Sloth Coffee Mug WS', 'Simple Mug mugo ', 16.99, 'images\\Shop\\Mug\\M (7).jpg', 3),
(27, 'Sloth Portrait P', 'Display your love of animals in your home with this eye-catching adorable smiling sloth portrait. ', 19.99, 'images\\Shop\\Painting\\P (1).jpg', 4),
(28, 'Sloth Portrait X', 'Display your love of animals in your home with this eye-catching adorable smiling sloth portrait. ', 15.69, 'images\\Shop\\Painting\\P (2).jpg', 4),
(29, 'Sloth Portrait L', 'Display your love of animals in your home with this eye-catching adorable smiling sloth portrait. ', 20.99, 'images\\Shop\\Painting\\P (3).jpg', 4),
(30, 'Sloth Portrait O', 'Display your love of animals in your home with this eye-catching adorable smiling sloth portrait. ', 12.5, 'images\\Shop\\Painting\\P (7).jpg', 4),
(31, 'Sloth Portrait B', 'Display your love of animals in your home with this eye-catching adorable smiling sloth portrait. ', 18.99, 'images\\Shop\\Painting\\P (8).jpg', 4),
(32, 'Sloths on bikes', 'Surf s up! It is a sunny day and sloths go to the beach on their bikes.', 13.29, 'images\\Shop\\Painting\\P (4).jpg', 4),
(33, 'Sloth Print', 'Multicoloured Sloth Print from the Original Watercolour Painting: -Hang in there-', 18.3, 'images\\Shop\\Painting\\P (5).jpg', 4),
(34, 'Lifelike Plush Sloth L', 'Sitting stuffed plush lifelike sloth, Hands clasp together with self-stick tabs for hanging, piggy-back rides, and lots of hands-free hugs.', 14.99, 'images\\Shop\\Plush\\Pl (1).jpg', 5),
(35, 'Lifelike Plush Sloth S', 'Sitting stuffed plush lifelike sloth, Hands clasp together with self-stick tabs for hanging, piggy-back rides, and lots of hands-free hugs.', 13.29, 'images\\Shop\\Plush\\Pl (7).jpg', 5),
(36, 'Vibrating Sloth Pillow', 'Vibrating Sloth plush Reading Pillow Is Just What You Need To Stay Cozy On The Couch All Winter Long.', 39.99, 'images\\Shop\\Plush\\Pl (2).jpg', 5),
(37, 'Sloth happy plush toy T', 'Now available in two sizes, A happy plush toy for keeping you company on your next staycation.', 20.5, 'images\\Shop\\Plush\\Pl (3).jpg', 5),
(38, 'Sloth happy plush toy O', 'A happy plush toy for keeping you company on your next staycation.', 15.5, 'images\\Shop\\Plush\\Pl (4).jpg', 5),
(39, 'Sloth happy plush toy S', 'A happy plush toy for keeping you company on your next staycation.', 12.5, 'images\\Shop\\Plush\\Pl (5).jpg', 5),
(40, 'SIMON THE SLOTH', 'Adorably cute toy 3 toe sloth plush with soft fur, expressive face and realistic details, 10” tall.', 20, 'images\\Shop\\Plush\\Pl (6).jpg', 5),
(41, 'Classic Tank Top', 'A classic, all-purpose unisex tank. A timeless classic intended for anyone looking for great quality and softness Tank Top.', 23.45, 'images\\Shop\\Shirt\\S (1).jpg', 6),
(42, 'Long Sleeve Tee', 'Enrich your wardrobe with a versatile long sleeve tee Shirt. For a casual look, combine it with your favorite jeans.', 25.58, 'images\\Shop\\Shirt\\S (2).jpg', 6),
(43, 'Wearable Hooded Blanket', 'Thnapple Slothy Sloth Wearable Hooded Blanket Shirt', 49.99, 'images\\Shop\\Shirt\\S (3).jpg', 6),
(44, 'Sloth Hooded Neck Pillow', 'Never again do you have to fall asleep on a plane in an uncomfortable position and wake up with a horrible neck cramp.', 40.84, 'images\\Shop\\Shirt\\S (5).jpg', 6),
(45, 'Slothzilla T Shirt', 'King Kong would be vastly improved with just one minor tweak T Shirt.', 12.99, 'images\\Shop\\Shirt\\S (6).jpg', 6),
(46, 'Sloth T Shirt Funny Flip', 'Ask Me Why Im Lazy T Shirt Funny Flip Sloth Cute Graphic Animal Tees Nerdy Cool.', 16.78, 'images\\Shop\\Shirt\\S (7).jpg', 6),
(47, 'Three Sloth Moon Shirt', '100% Cotton Adult T Shirt Tee, Black, Medium', 17.95, 'images\\Shop\\Shirt\\S (8).jpg', 6),
(48, 'Social Distancing T-Shirt', 'This T Shirt is everything you ve dreamed of and more. It feels soft and lightweight, with the right amount of stretch. It s comfortable and flattering for both men and women.', 21.8, 'images\\Shop\\Shirt\\S (9).jpg', 6),
(49, 'Namastay Tank Top', 'A timeless classic intended for anyone looking for great quality and softness Tank Top.', 22, 'images\\Shop\\Shirt\\S (10).jpg', 6),
(50, 'Sloth Pencil Case', 'Sloth Students Super Large Capacity Canvas Pencil Case Pen Bag Pouch Stationary Case Makeup Cosmetic Bag.', 9.52, 'images\\Shop\\Tools\\T (1).jpg', 7),
(51, 'Toiletry bag Y', 'Our hand cosmetic bag is made of high-quality polyester and sponge liner The soft thickened lining to protect your makeup item inside well.', 11.5, 'images\\Shop\\Tools\\T (2).jpg', 7),
(52, 'Toiletry bag 3S', 'Our hand cosmetic bag is made of high-quality polyester and sponge liner The soft thickened lining to protect your makeup item inside well.', 11.5, 'images\\Shop\\Tools\\T (3).jpg', 7),
(53, 'Backpack', 'Featuring a stunning design along a padded back and adjustable shoulder straps.', 36.6, 'images\\Shop\\Tools\\T (4).jpg', 7),
(54, 'Children s Dining Set', 'Makes the perfect children s gift', 13.75, 'images\\Shop\\Tools\\T (5).jpg', 7),
(55, 'Lunch Tote Sloth Bag', 'We ve made the best lunch bag with art image on both sides and bottom side, and CUSTOMIZATION are Welcome.', 14.69, 'images\\Shop\\Tools\\T (6).jpg', 7),
(56, 'Sloth Notebook', 'You Are Awesome: Sloth Notebook (Composition Book, Journal) (8.5 x 11 Large).', 4.99, 'images\\Shop\\Tools\\T (7).jpg', 7),
(57, 'SLOTHS Paper clip, Set of 6', 'Six sloths included in each package, Everyone s favorite so-so mammal ready to hang onto your pictures.', 11.99, 'images\\Shop\\Tools\\T (8).jpg', 7),
(58, 'Sticky Memo Tab Set', 'Finally get everything done, because who could say no to a sticky note with a face like that?', 8.58, 'images\\Shop\\Tools\\T (9).jpg', 7),
(59, 'Sleepyville Critters Hang Loose Sloth Hobo Bag', 'Grab a unique crossbody bag that you ll love for you or for a friend!', 28.21, 'images\\Shop\\Tools\\T (10).jpg', 1),
(60, 'Sleepy Sloth Necklace', 'An acrylic necklace that lets you wear a sleeping accesso sloth around your neck.', 20.56, 'images\\Shop\\Accessories\\A (1).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ID_User` int(3) NOT NULL,
  `List_Items` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ID_User`, `List_Items`) VALUES
(1, 5, '15,19,12,2'),
(2, 23, '60,45'),
(3, 15, '25,21,30,33,2'),
(4, 6, '40,43,48,59'),
(5, 12, '2,9,13,59'),
(6, 9, '21,23,42,48'),
(7, 22, '41,46,45'),
(8, 8, '20,24,30,31'),
(9, 24, '28,29,30,31,32,33'),
(10, 2, '50,53,54,45,47,49'),
(11, 1, '4,7,6,8,11,12,22,20,35'),
(12, 7, '50,52,39,38,28,30,22'),
(13, 13, '11,7,4,3,5,27,29,33'),
(14, 21, '45,46,47,15'),
(15, 11, '34,40,33'),
(16, 10, '20,25,2,3,13'),
(17, 17, '41,60,32,33,27'),
(18, 9, '26,25,50,51'),
(19, 5, '14,15,19,1,27'),
(20, 25, '50,51,55,58'),
(21, 3, '41,46,45'),
(22, 20, '25,21,30,33,2'),
(23, 4, '20,25,2,3,13'),
(24, 19, '50,52,39,38,28,30,22'),
(25, 11, '8,6,20,21,22'),
(26, 16, '1,4,3,9,41,43,60'),
(27, 14, '5,3'),
(28, 6, '35,4,2,3,37'),
(29, 18, '18,9,60,7'),
(30, 11, '26,20,24'),
(31, 23, '10,20,50,60');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `User_ID` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `Rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`User_ID`, `Item_ID`, `Rating`) VALUES
(1, 1, 4),
(1, 2, 9),
(1, 3, 6),
(1, 9, 7),
(1, 11, 9),
(1, 13, 2),
(1, 14, 6),
(1, 15, 5),
(1, 17, 8),
(1, 19, 2),
(1, 21, 6),
(1, 23, 6),
(1, 26, 5),
(1, 29, 7),
(1, 30, 6),
(1, 31, 9),
(1, 32, 3),
(1, 34, 2),
(1, 35, 5),
(1, 36, 8),
(1, 37, 10),
(1, 39, 10),
(1, 41, 8),
(1, 42, 1),
(1, 43, 1),
(1, 44, 3),
(1, 45, 9),
(1, 47, 3),
(1, 48, 6),
(1, 49, 5),
(1, 50, 4),
(1, 55, 5),
(1, 56, 6),
(1, 57, 5),
(1, 60, 5),
(2, 2, 4),
(2, 6, 3),
(2, 10, 2),
(2, 11, 3),
(2, 12, 3),
(2, 13, 7),
(2, 15, 6),
(2, 19, 9),
(2, 20, 6),
(2, 22, 8),
(2, 25, 4),
(2, 30, 7),
(2, 31, 8),
(2, 32, 6),
(2, 33, 6),
(2, 34, 2),
(2, 37, 6),
(2, 44, 8),
(2, 45, 9),
(2, 46, 2),
(2, 47, 6),
(2, 49, 10),
(2, 51, 8),
(2, 52, 10),
(2, 53, 6),
(2, 55, 4),
(2, 56, 6.5),
(2, 57, 5),
(2, 58, 2),
(2, 60, 3),
(3, 1, 2),
(3, 2, 3),
(3, 3, 6),
(3, 6, 5),
(3, 7, 6),
(3, 8, 3),
(3, 10, 8),
(3, 15, 7),
(3, 18, 9),
(3, 19, 7),
(3, 21, 3),
(3, 22, 1),
(3, 25, 3),
(3, 26, 9),
(3, 27, 9),
(3, 29, 10),
(3, 30, 2),
(3, 31, 10),
(3, 32, 5),
(3, 33, 9),
(3, 36, 3),
(3, 37, 10),
(3, 40, 6),
(3, 44, 7),
(3, 45, 2),
(3, 48, 6),
(3, 51, 5),
(3, 53, 2),
(3, 57, 10),
(3, 58, 10),
(4, 1, 5),
(4, 2, 4),
(4, 3, 2),
(4, 5, 4),
(4, 6, 5),
(4, 7, 5.5),
(4, 8, 10),
(4, 9, 1),
(4, 10, 6),
(4, 12, 4),
(4, 14, 9),
(4, 15, 8),
(4, 18, 7),
(4, 19, 8),
(4, 23, 4),
(4, 24, 8),
(4, 25, 6),
(4, 27, 8),
(4, 29, 2),
(4, 30, 7),
(4, 32, 1),
(4, 33, 9),
(4, 34, 9),
(4, 35, 8),
(4, 37, 8),
(4, 38, 8),
(4, 40, 1),
(4, 44, 6),
(4, 45, 2),
(4, 46, 8),
(4, 48, 1),
(4, 49, 10),
(4, 50, 2),
(4, 52, 7),
(4, 55, 10),
(4, 59, 3),
(4, 60, 2),
(5, 1, 5),
(5, 2, 10),
(5, 3, 3),
(5, 4, 4),
(5, 7, 9),
(5, 8, 7),
(5, 9, 6),
(5, 11, 7),
(5, 12, 10),
(5, 13, 8),
(5, 14, 8),
(5, 15, 5),
(5, 17, 7),
(5, 18, 9),
(5, 20, 9),
(5, 21, 5),
(5, 24, 5),
(5, 27, 3),
(5, 29, 3),
(5, 30, 6),
(5, 31, 3),
(5, 32, 7),
(5, 33, 10),
(5, 34, 1),
(5, 36, 8),
(5, 37, 7),
(5, 39, 10),
(5, 42, 5),
(5, 43, 7),
(5, 44, 3),
(5, 45, 8),
(5, 46, 7),
(5, 48, 3),
(5, 49, 3),
(5, 53, 7),
(5, 55, 6),
(5, 58, 2),
(5, 59, 2),
(6, 1, 3),
(6, 2, 10),
(6, 6, 4),
(6, 8, 6.5),
(6, 13, 5),
(6, 14, 7),
(6, 16, 7),
(6, 18, 6),
(6, 19, 10),
(6, 21, 7),
(6, 22, 1),
(6, 23, 10),
(6, 25, 7),
(6, 27, 3),
(6, 32, 5),
(6, 33, 3),
(6, 34, 10),
(6, 35, 6),
(6, 38, 6),
(6, 39, 3),
(6, 40, 1),
(6, 41, 5),
(6, 42, 2),
(6, 43, 7),
(6, 44, 1),
(6, 45, 10),
(6, 48, 8),
(6, 49, 8),
(6, 55, 5),
(6, 58, 3),
(6, 59, 7),
(6, 60, 7),
(7, 1, 4),
(7, 2, 1),
(7, 3, 4),
(7, 4, 9),
(7, 5, 9),
(7, 6, 3),
(7, 7, 4),
(7, 8, 1),
(7, 9, 5),
(7, 10, 5),
(7, 13, 7),
(7, 14, 6),
(7, 16, 3),
(7, 19, 1),
(7, 21, 2),
(7, 22, 1),
(7, 25, 6),
(7, 28, 1),
(7, 30, 5),
(7, 31, 10),
(7, 34, 10),
(7, 35, 2),
(7, 37, 6),
(7, 39, 7),
(7, 40, 4),
(7, 42, 9),
(7, 44, 5),
(7, 47, 7),
(7, 50, 9),
(7, 51, 3),
(8, 1, 5),
(8, 2, 5),
(8, 3, 7),
(8, 4, 3),
(8, 7, 4),
(8, 9, 3),
(8, 10, 2),
(8, 13, 1),
(8, 15, 7),
(8, 21, 7),
(8, 22, 4),
(8, 27, 5),
(8, 28, 4),
(8, 30, 1),
(8, 32, 8),
(8, 33, 9),
(8, 34, 8),
(8, 35, 4),
(8, 36, 6),
(8, 37, 8),
(8, 40, 2),
(8, 44, 10),
(8, 45, 9),
(8, 46, 6),
(8, 48, 7),
(8, 50, 7),
(8, 51, 7),
(8, 53, 2),
(8, 55, 7),
(8, 56, 3),
(8, 60, 6),
(9, 1, 3),
(9, 3, 7),
(9, 4, 8),
(9, 6, 5),
(9, 8, 2),
(9, 9, 2),
(9, 13, 3),
(9, 14, 9),
(9, 15, 4),
(9, 16, 9),
(9, 18, 10),
(9, 21, 4),
(9, 23, 5),
(9, 24, 4),
(9, 25, 9),
(9, 29, 9),
(9, 30, 6),
(9, 31, 6),
(9, 33, 3),
(9, 34, 6),
(9, 36, 8),
(9, 37, 7),
(9, 38, 8),
(9, 39, 2),
(9, 41, 5),
(9, 42, 8),
(9, 45, 7),
(9, 48, 2),
(9, 50, 2),
(9, 51, 7),
(9, 54, 3),
(9, 56, 7),
(9, 57, 1),
(9, 58, 7),
(9, 59, 10),
(10, 1, 4),
(10, 2, 7),
(10, 4, 4),
(10, 6, 3),
(10, 8, 4),
(10, 10, 7),
(10, 13, 1),
(10, 14, 5),
(10, 15, 2),
(10, 18, 4),
(10, 19, 4),
(10, 20, 7),
(10, 22, 4),
(10, 23, 10),
(10, 24, 5),
(10, 25, 7),
(10, 27, 4),
(10, 28, 7),
(10, 33, 7),
(10, 35, 4),
(10, 36, 9),
(10, 37, 6),
(10, 41, 2),
(10, 44, 7),
(10, 47, 8),
(10, 49, 5),
(10, 52, 3),
(10, 53, 10),
(10, 54, 1),
(10, 56, 2),
(10, 57, 1),
(11, 1, 4),
(11, 2, 9),
(11, 3, 8),
(11, 6, 6),
(11, 7, 8),
(11, 8, 5),
(11, 9, 4),
(11, 11, 1),
(11, 15, 10),
(11, 16, 7),
(11, 18, 2),
(11, 19, 5),
(11, 20, 4),
(11, 21, 4),
(11, 22, 1),
(11, 30, 2),
(11, 31, 10),
(11, 37, 7),
(11, 39, 9),
(11, 40, 8),
(11, 43, 8),
(11, 44, 9),
(11, 45, 1),
(11, 46, 10),
(11, 47, 9),
(11, 49, 3),
(11, 50, 6),
(11, 51, 7),
(11, 52, 8),
(11, 53, 1),
(11, 54, 5),
(11, 55, 10),
(11, 58, 4),
(11, 59, 1),
(12, 1, 5),
(12, 3, 8),
(12, 4, 7),
(12, 6, 8),
(12, 8, 4),
(12, 9, 8),
(12, 10, 6),
(12, 12, 10),
(12, 16, 9),
(12, 17, 5),
(12, 18, 2),
(12, 24, 2),
(12, 26, 10),
(12, 28, 7),
(12, 29, 5),
(12, 30, 9),
(12, 32, 4),
(12, 33, 6),
(12, 34, 5),
(12, 35, 4),
(12, 38, 3),
(12, 39, 3),
(12, 40, 5),
(12, 42, 8),
(12, 45, 10),
(12, 47, 4),
(12, 48, 4),
(12, 50, 2),
(12, 54, 2),
(12, 55, 1),
(12, 56, 6),
(12, 57, 8),
(12, 58, 4),
(12, 60, 9),
(13, 3, 6),
(13, 4, 6),
(13, 5, 5),
(13, 7, 9),
(13, 8, 4),
(13, 15, 4),
(13, 16, 8),
(13, 23, 8),
(13, 24, 6),
(13, 25, 9),
(13, 27, 10),
(13, 29, 1),
(13, 31, 8),
(13, 35, 5),
(13, 37, 8),
(13, 38, 3),
(13, 41, 10),
(13, 43, 3),
(13, 44, 9),
(13, 45, 9),
(13, 47, 2),
(13, 48, 10),
(13, 49, 10),
(13, 52, 10),
(13, 53, 8),
(13, 54, 10),
(13, 55, 4),
(13, 57, 3),
(13, 58, 9),
(14, 1, 2),
(14, 2, 7),
(14, 3, 6),
(14, 6, 5),
(14, 9, 2),
(14, 16, 7),
(14, 17, 10),
(14, 19, 3),
(14, 21, 7),
(14, 23, 6),
(14, 24, 3),
(14, 26, 2),
(14, 27, 3),
(14, 29, 4),
(14, 30, 6),
(14, 34, 6),
(14, 35, 4),
(14, 38, 1),
(14, 42, 9),
(14, 43, 2),
(14, 44, 3),
(14, 45, 3),
(14, 46, 8),
(14, 48, 5),
(14, 49, 7),
(14, 51, 10),
(14, 53, 5),
(14, 54, 1),
(14, 56, 5),
(14, 57, 4),
(14, 59, 4),
(14, 60, 2),
(15, 1, 4),
(15, 2, 1),
(15, 6, 3),
(15, 7, 7),
(15, 9, 7),
(15, 11, 10),
(15, 12, 6),
(15, 14, 3),
(15, 16, 2.5),
(15, 17, 10),
(15, 18, 6),
(15, 19, 6),
(15, 21, 1),
(15, 22, 5),
(15, 25, 1),
(15, 26, 7),
(15, 28, 9),
(15, 33, 3),
(15, 34, 5),
(15, 38, 8),
(15, 39, 4),
(15, 40, 3),
(15, 41, 2),
(15, 42, 7),
(15, 46, 8),
(15, 48, 7),
(15, 50, 3),
(15, 51, 9),
(15, 55, 5),
(15, 56, 5),
(15, 57, 8),
(15, 59, 3),
(16, 5, 2),
(16, 7, 5),
(16, 9, 10),
(16, 11, 2),
(16, 12, 4),
(16, 14, 8),
(16, 15, 10),
(16, 17, 7),
(16, 18, 3),
(16, 20, 7),
(16, 21, 4),
(16, 26, 9),
(16, 27, 7),
(16, 30, 9),
(16, 32, 7),
(16, 34, 8),
(16, 35, 9),
(16, 36, 4),
(16, 39, 2),
(16, 40, 7),
(16, 42, 7),
(16, 43, 8),
(16, 44, 8),
(16, 48, 9),
(16, 51, 3),
(16, 53, 4),
(16, 54, 3),
(16, 58, 10),
(17, 1, 4),
(17, 2, 4),
(17, 4, 5),
(17, 6, 10),
(17, 7, 10),
(17, 11, 2),
(17, 14, 6),
(17, 18, 3),
(17, 19, 9),
(17, 21, 10),
(17, 23, 7),
(17, 24, 4),
(17, 25, 2),
(17, 26, 8),
(17, 28, 7),
(17, 29, 9),
(17, 33, 5),
(17, 36, 10),
(17, 37, 5),
(17, 38, 5),
(17, 39, 9),
(17, 40, 1),
(17, 44, 7),
(17, 48, 4),
(17, 49, 9),
(17, 51, 9),
(17, 52, 9),
(17, 54, 2),
(17, 56, 9),
(17, 60, 2),
(18, 1, 3),
(18, 5, 4),
(18, 7, 5),
(18, 10, 6),
(18, 11, 4),
(18, 15, 8),
(18, 16, 6.5),
(18, 18, 3),
(18, 19, 9),
(18, 20, 2),
(18, 21, 6),
(18, 22, 1),
(18, 23, 6),
(18, 25, 3),
(18, 27, 2),
(18, 28, 1),
(18, 30, 3),
(18, 31, 1),
(18, 33, 3),
(18, 34, 2),
(18, 36, 3),
(18, 37, 8),
(18, 39, 4),
(18, 41, 5),
(18, 42, 10),
(18, 43, 5),
(18, 46, 8),
(18, 47, 4),
(18, 48, 5),
(18, 49, 8),
(18, 50, 1),
(18, 52, 1),
(18, 53, 7),
(18, 54, 3),
(18, 59, 9),
(18, 60, 10),
(19, 1, 2),
(19, 3, 9),
(19, 4, 2),
(19, 8, 10),
(19, 9, 9),
(19, 10, 8),
(19, 11, 8),
(19, 13, 10),
(19, 14, 9),
(19, 15, 2),
(19, 16, 9),
(19, 17, 1),
(19, 18, 3),
(19, 19, 5),
(19, 21, 5),
(19, 22, 8),
(19, 23, 4),
(19, 25, 8),
(19, 26, 2),
(19, 29, 7),
(19, 30, 0),
(19, 32, 7),
(19, 33, 5),
(19, 34, 8),
(19, 36, 9),
(19, 40, 4),
(19, 41, 8),
(19, 42, 6),
(19, 43, 10),
(19, 46, 7),
(19, 47, 7),
(19, 48, 4),
(19, 49, 8),
(19, 54, 5),
(19, 55, 10),
(19, 56, 3),
(19, 57, 9),
(19, 58, 1),
(19, 60, 8.5),
(20, 1, 2),
(20, 5, 2),
(20, 7, 1),
(20, 9, 6),
(20, 10, 6),
(20, 11, 4),
(20, 14, 8),
(20, 15, 2),
(20, 16, 3),
(20, 17, 2),
(20, 18, 1),
(20, 19, 4),
(20, 21, 5),
(20, 22, 2),
(20, 23, 9),
(20, 24, 5),
(20, 26, 1),
(20, 27, 1),
(20, 28, 3),
(20, 29, 9),
(20, 31, 5),
(20, 34, 4),
(20, 35, 7),
(20, 36, 3),
(20, 38, 8),
(20, 40, 4),
(20, 42, 6),
(20, 44, 5),
(20, 46, 4),
(20, 47, 2),
(20, 49, 3),
(20, 50, 4),
(20, 52, 2),
(20, 53, 4),
(20, 54, 7),
(20, 55, 2),
(20, 56, 10),
(20, 57, 4),
(20, 58, 2),
(21, 1, 3),
(21, 3, 5),
(21, 4, 9),
(21, 6, 1),
(21, 8, 6),
(21, 9, 6),
(21, 11, 10),
(21, 13, 4),
(21, 16, 8),
(21, 18, 9),
(21, 20, 3),
(21, 22, 5),
(21, 23, 3),
(21, 27, 3),
(21, 29, 2),
(21, 32, 3),
(21, 33, 9),
(21, 39, 7),
(21, 41, 10),
(21, 42, 7.5),
(21, 43, 5),
(21, 44, 3),
(21, 46, 1),
(21, 47, 10),
(21, 49, 10),
(21, 50, 4),
(21, 52, 5),
(21, 53, 1),
(21, 55, 4),
(21, 56, 9),
(21, 59, 7),
(22, 2, 1),
(22, 3, 3),
(22, 5, 8),
(22, 10, 1),
(22, 12, 4),
(22, 17, 5),
(22, 18, 5),
(22, 19, 5),
(22, 20, 5),
(22, 21, 2),
(22, 22, 6),
(22, 23, 2),
(22, 24, 6),
(22, 27, 1),
(22, 28, 10),
(22, 31, 10),
(22, 32, 6),
(22, 33, 10),
(22, 34, 3),
(22, 40, 3),
(22, 41, 1),
(22, 42, 4),
(22, 43, 8),
(22, 46, 7),
(22, 47, 10),
(22, 48, 3),
(22, 49, 8),
(22, 52, 7),
(22, 54, 2),
(22, 55, 3),
(22, 56, 3),
(22, 57, 8),
(22, 58, 10),
(22, 59, 3),
(23, 1, 2),
(23, 2, 2),
(23, 4, 1),
(23, 7, 6.5),
(23, 9, 8),
(23, 10, 3),
(23, 12, 7),
(23, 14, 6),
(23, 16, 5),
(23, 19, 1),
(23, 20, 5),
(23, 24, 6),
(23, 25, 2),
(23, 27, 10),
(23, 28, 4),
(23, 29, 10),
(23, 30, 5),
(23, 31, 8),
(23, 32, 10),
(23, 36, 3),
(23, 37, 9),
(23, 38, 9),
(23, 45, 5),
(23, 46, 6),
(23, 49, 2),
(23, 51, 10),
(23, 54, 8),
(23, 56, 4),
(23, 58, 2),
(23, 59, 10),
(23, 60, 8),
(24, 1, 2),
(24, 4, 7),
(24, 5, 6),
(24, 7, 6),
(24, 9, 3),
(24, 10, 3),
(24, 12, 2),
(24, 16, 6),
(24, 18, 3),
(24, 22, 4),
(24, 23, 9),
(24, 24, 5),
(24, 27, 3),
(24, 28, 8.5),
(24, 29, 9),
(24, 31, 1),
(24, 32, 2),
(24, 34, 10),
(24, 36, 5),
(24, 37, 2),
(24, 39, 6),
(24, 40, 3),
(24, 41, 5),
(24, 42, 10),
(24, 45, 7),
(24, 46, 3),
(24, 49, 3),
(24, 50, 7),
(24, 52, 10),
(24, 53, 5),
(24, 54, 7),
(24, 55, 3),
(24, 58, 7),
(25, 1, 4),
(25, 2, 6),
(25, 4, 7),
(25, 6, 10),
(25, 7, 2),
(25, 12, 7),
(25, 14, 10),
(25, 17, 8),
(25, 19, 2),
(25, 20, 9),
(25, 21, 2),
(25, 22, 3),
(25, 23, 8),
(25, 24, 3),
(25, 25, 8),
(25, 26, 3),
(25, 27, 1),
(25, 28, 8),
(25, 29, 3),
(25, 39, 9),
(25, 40, 9),
(25, 44, 4),
(25, 45, 5),
(25, 46, 1),
(25, 47, 2),
(25, 48, 10),
(25, 52, 3),
(25, 54, 2),
(25, 55, 9),
(25, 57, 10),
(25, 58, 4);

-- --------------------------------------------------------

--
-- Table structure for table `simitem`
--

CREATE TABLE `simitem` (
  `ID_Item` int(2) NOT NULL,
  `Sim_Items` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simitem`
--

INSERT INTO `simitem` (`ID_Item`, `Sim_Items`) VALUES
(1, '27,28,29'),
(2, '13,5,7'),
(3, '36,21,32'),
(4, '9,10,8'),
(5, '2,13,7'),
(6, '60,3,4'),
(7, '2,59,13'),
(8, '9,10,11'),
(9, '10,11,8'),
(10, '9,11,8'),
(11, '9,54,8'),
(12, '3,4,6'),
(13, '2,59,7'),
(14, '19,4,15'),
(15, '19,4,14'),
(16, '19,21,54'),
(17, '18,54,32'),
(18, '17,54,32'),
(19, '17,18,60'),
(20, '25,21,23'),
(21, '25,26,23'),
(22, '25,21,23'),
(23, '25,26,24'),
(24, '25,26,23'),
(25, '26,23,24'),
(26, '25,23,24'),
(27, '1,28,29'),
(28, '1,27,29'),
(29, '1,27,28'),
(30, '1,27,28'),
(31, '1,27,28'),
(32, '9,10,8'),
(33, '1,5'),
(34, '35,3,38'),
(35, '34,3,38'),
(36, '3,38,39'),
(37, '38,39,40'),
(38, '37,39,40'),
(39, '37,38,40'),
(40, '37,38,39'),
(41, '49,20,38'),
(42, '43,46,47'),
(43, '42,45,47'),
(44, '1,60,13'),
(45, '46,47,48'),
(46, '42,45,47'),
(47, '42,45,46'),
(48, '45,22,47'),
(49, '41,20,38'),
(50, '51,52,8'),
(51, '50,52,55'),
(52, '50,51,55'),
(53, '1,16'),
(54, '17,18,11'),
(55, '51,52,59'),
(56, '50,3,36'),
(57, '17,18,3'),
(58, '3,21,40'),
(59, '1,13,7'),
(60, '3,4,21');

-- --------------------------------------------------------

--
-- Table structure for table `simuser`
--

CREATE TABLE `simuser` (
  `Id_User` int(2) NOT NULL,
  `Sim_Users` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simuser`
--

INSERT INTO `simuser` (`Id_User`, `Sim_Users`) VALUES
(1, '2,3,6,14,18,21'),
(2, '1,6,14,19,20,21'),
(3, '1,8,9,15,16,21'),
(4, '1,3,6,16,23,25'),
(5, '4,7,10,23,24,25'),
(6, '1,2,4,19,25,26'),
(7, '1,15,18,21,24,27'),
(8, '1,3,13,16,18,25'),
(9, '1,3,11,14,16,17'),
(10, '1,8,19,22,25,27'),
(11, '1,9,13,17,18,22'),
(12, '1,9,14,17,20,24'),
(13, '8,9,11,14,22,25'),
(14, '1,9,21,23,24,25'),
(15, '1,3,7,19,21,27'),
(16, '1,3,4,8,9,23'),
(17, '1,2,9,11,12,26'),
(18, '1,7,8,11,14,19'),
(19, '1,2,6,10,21,23'),
(20, '2,12,14,15,17,24'),
(21, '1,2,3,14,19,23'),
(22, '1,10,11,13,19,20'),
(23, '1,14,19,21,24,25'),
(24, '1,7,12,14,23,27'),
(25, '4,6,8,14,19,23'),
(26, '1,6,9,12,17,21'),
(27, '7,10,15,18,24,25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `First_name`, `Last_Name`, `Email`, `Password`) VALUES
(1, 'Xaviera', 'Soto', 'pede@Namnullamagna.edu', 'cursus luctus, ipsum leo eleme'),
(2, 'Hazem', 'Ben', 'hazemben@gmail.com', '2518478h'),
(3, 'Christopher', 'Stone', 'adipiscing.fringilla@quis.org', 'sed dui. Fusce aliquam, enim n'),
(4, 'Lars', 'Mccarthy', 'adipiscing@lectusrutrum.org', 'a felis ullamcorper viverra. M'),
(5, 'Tobias', 'Tyson', 'nec.diam.Duis@faucibusleo.co.uk', 'tellus. Suspendisse sed dolor.'),
(6, 'Chadwick', 'Avila', 'vel.est@velit.org', 'Maecenas mi felis, adipiscing '),
(7, 'Hyacinth', 'Hess', 'natoque.penatibus.et@justonec.co.uk', 'fames ac turpis'),
(8, 'Camille', 'Aguirre', 'rutrum.lorem@orci.net', 'semper et, lacinia vitae,'),
(9, 'Sydney', 'Bowers', 'et.commodo.at@lobortisClassaptent.net', 'a purus.'),
(10, 'Maryam', 'Fields', 'nec.metus@Quisqueaclibero.ca', 'Nam ac nulla. In tincidunt con'),
(11, 'Jin', 'Fulton', 'mi.fringilla.mi@quistristique.com', 'tellus id nunc interdum feugia'),
(12, 'Tara', 'Anthony', 'velit.dui@ipsumnon.co.uk', 'dolor sit'),
(13, 'Jane', 'Brown', 'Nunc.ac@elementumpurus.com', 'ac'),
(14, 'Ursa', 'Murphy', 'ipsum.dolor@semPellentesque.ca', 'Curabitur vel lectus. Cum'),
(15, 'Quinn', 'Roach', 'ridiculus.mus.Proin@consectetuer.org', 'libero'),
(16, 'Todd', 'Pate', 'tt@tt.tt', 'tt'),
(17, 'Ross', 'Gilliam', 'ornare@Donectempuslorem.co.uk', 'auctor quis, tristique'),
(18, 'Isaac', 'Castro', 'erat.vel@dignissimpharetra.ca', 'Cras interdum.'),
(19, 'Nicole', 'Ellison', 'sollicitudin@lacusMauris.ca', 'Aliquam vulputate'),
(20, 'Bruce', 'Zimmerman', 'purus.accumsan@sit.edu', 'Aenean'),
(21, 'Gannon', 'Bond', 'nec@orcisemeget.org', 'felis'),
(22, 'Cadman', 'Randolph', 'vitae.posuere@nunc.org', 'rhoncus. Proin nisl sem, conse'),
(23, 'Dara', 'Bonner', 'dd@dd.dd', 'dd'),
(24, 'Helen', 'Kline', 'nunc.sed.libero@tellus.ca', 'id magna'),
(25, 'Ivan', 'Campbell', 'ipsum.primis@neque.net', 'metus eu erat semper rutrum.'),
(26, 'PiPo', 'PyPy', 'pp@pp.pp', 'pp'),
(27, 'BiBa', 'BenBen', 'bb@bb.bb', 'bb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`ID_User`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`User_ID`,`Item_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `simitem`
--
ALTER TABLE `simitem`
  ADD PRIMARY KEY (`ID_Item`);

--
-- Indexes for table `simuser`
--
ALTER TABLE `simuser`
  ADD PRIMARY KEY (`Id_User`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `items` (`id`);

--
-- Constraints for table `simitem`
--
ALTER TABLE `simitem`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`ID_Item`) REFERENCES `items` (`id`);

--
-- Constraints for table `simuser`
--
ALTER TABLE `simuser`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;