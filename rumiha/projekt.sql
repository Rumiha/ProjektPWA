-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 09:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `korisnicko_ime` varchar(255) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(3, 'admin', 'admin', 'admin', '$2y$10$abZi.dy52RnsoneG2IF5tu5kxlwR.wSdNH2.Di8985mcIGFBiLjIu', 1),
(4, 'administrator', 'administrator', 'administrator', '$2y$10$8TZlJCPvB5rhGG220g3OGuQ1oelwpZqGyluHx/amMYVyrXc22uyCu', 1),
(5, 'Petar', 'Rumiha', 'pero', '$2y$10$geK3A./1uI.j9/6Ltqz3gOBHsyI1NlpTTlAC.uC8SehgNchwgi1o6', 0),
(6, 'Ana', 'Banana', 'anabanana', '$2y$10$47u9NCWPZFMtkMie75DFje3K5tkT2mnyPLj4nhAmtjHetu6tSyOle', 0),
(7, 'Gabrijel', 'Šugar', 'gabsi', '$2y$10$Sn6wQsB46KtVDCBrD8.4vOLrAQhXcJhiph5UQm87.NTLi4Kt3agDy', 0),
(8, 'aaa', 'aaa', 'aaa', '$2y$10$8BiTr2Kpnf8tAo.3PjkccOML3PaIwdkmWaL7d1kJ6Ya/cyTRchhZG', 0),
(9, 'bbb', 'bbb', 'bbb', '$2y$10$urK1l2CgXepIDN.tVpHEIegPbr1Jm0me48ChV94HTeK9yTMElT9rK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(3, '23.06.2022.', 'Invitations to G7', 'Zelenskyy accepts invitations to G7 and NATO summits', 'Day 112 of the war in Ukraine : In the east of the country bitter fighting for Sievjerodonetsk continues. According to British intelligence, the Kremlin troops now control a large part of the city. According to pro-Russian separatists, the creation of a humanitarian corridor announced by Russia has failed for the time being. Hundreds of civilians who have sought refuge at the local chemical plant Azot are said to be able to get to safety through the corridor. Meanwhile, Ukrainian President Volodymyr Zelenskyy is urging his country to be granted EU candidate status.\r\n\r\n', 'slika3.jpg', 'politik', 0),
(4, '23.06.2022.', 'ATTORNEY LETTER', 'Gerhard Schröder is fighting for his office as former chancellor', 'Gerhard Schröder is apparently not prepared to accept the deletion of his former chancellor\'s office without objection. According to media reports, his lawyer has contacted the responsible budget committee. But Schröder probably doesn\'t want to take the conflict to the extreme either.\r\nAccording to reports, former chancellor Gerhard Schröder (SPD) is opposing the Bundestag\'s decision to cut his office and staff positions. The decision by the Budget Committee in May was \"evidently illegal and unconstitutional,\" according to the letter from Schröder\'s lawyer. The lawyer now wants to try to clarify the matter in a conversation.\r\n\r\nAccording to the \"Bild\" newspaper, the lawyers in the two-page letter referred to a decision by the Bundestag on November 8, 2012, according to which Schröder\'s Bundestag offices and four employees were \"fixed for life\". In terms of employee positions, Schröder claims four positions with salary levels B6, B3, E14 and E8. ', 'slika4.jpg', 'politik', 0),
(5, '07.06.2022.', 'TRIP TO KYIV', 'A result of the Scholz visit that cannot (yet) be measured', 'Better late than never: Chancellor Olaf Scholz (SPD) traveled to Kyiv. His visit could possibly have an effect that has already been observed with previous visitors.\r\nIn hindsight, it is of course possible to discuss what Olaf Scholz had in his luggage during his long-awaited visit of actual importance for Ukraine, but this much could be said beforehand: the first politician of rank and name to tr', 'slika5.jpg', 'politik', 0),
(6, '20.05.2022.', 'LAWSUIT', '\"A bad day for democracy\": Angela Merkel also played her part in this', 'Ex-Chancellor Angela Merkel violated the Basic Law with her call to reverse the election of the prime minister in Thuringia. That is how the Constitutional Court ruled. Is the decision unrealistic? The press reviews.\r\nThe violation of the Basic Law is official. As Chancellor, Angela Merkel should not have done what she was allowed to do as a CDU official: to demand the revocation of the election o', 'slika6.jpg', 'politik', 0),
(7, '31.05.2022.', 'Good to know', 'How much water do I actually have to drink in this heat?', 'The sun is burning and the temperatures are climbing over 30 degrees: Summer heat is also hard on the body. What is the daily fluid requirement?\r\nWater, water, water: Choosing the right thirst quencher is easy. It gets more difficult when it comes to drinking the right amount, especially in summer. How much liquid should it be a day to be adequately supplied?\r\n\r\nIt is often said that adults need b', 'slika7.jpg', 'gesundheit', 0),
(8, '16.06.2022.', 'Nutrition', 'Lose two pounds in three days? Reporter tests watermelon diet', 'Preservation by heating is currently experiencing a hype similar to that of fermentation. Summer and fall are the perfect time to stock up for winter. Fruity jams, hearty chutneys, sweet tomato sauces - the possibilities are almost unlimited. The most important thing about canning is to sterilize the jars before filling. This works, for example, by washing glasses and lids either very hot in the d', 'slika8.jpg', 'gesundheit', 0),
(9, '17.06.2022.', 'WORLD NO TOBACCO DAY', 'This is what happens in the body when you stop smoking', 'The health consequences of smoking range from chronic irritation of the bronchial tubes and weakening of the immune system to lung cancer. In Germany, the number of  smokers has recently increased to almost 33 percent, as a long-term study shows . Every smoker knows that smoking is not good for your health, but getting rid of the fag is difficult for many. The facts speak in favor of quitting. According to the Federal Ministry of Health, 127,000 Germans die every year as a result of tobacco consumption. On average, heavy smokers lose ten years of their lifetime.\r\n\r\n', 'slika9.jpg', 'gesundheit', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
