-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 26 août 2020 à 10:42
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `miniprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `ledition` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qunt` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`book_id`, `name`, `description`, `auteur`, `ledition`, `prix`, `resume`, `image`, `qunt`, `date`) VALUES
(5, 'sderltre', 'QSHHNGFDSZZSFG', '', 'dfglrffgth', 225252, 'sdfjgfdfg', '40_cyberpun.jpg', 52525252, '2020-08-24'),
(6, 'qsertyuitr', 'QSHHNGFDSZZSFG', '', 'sdfgjuytr', 4575525, '5', '92_cyberpun.jpg', 0, '2020-08-24'),
(7, 'bgcbnvbn', 'QSHHNGFDSZZSFG', '', 'sdghj', 424242, 'sdfghjjhg', '2_cyberpun.jpg', 54545345, '2020-08-24'),
(8, 'فقه اللغة وأسرار العربية', 'يمكننا أن نقول ان هذا هو أفضل وأمتع كتاب في اللغة، حيث يجعلك تشعر بجمال اللغة الحقيقي وغزارة مفرداتها. وقد يظن المطلع أن الكتاب في فقه اللغة الذي يهتم بظواهر وتعريفاتها وتعليلاتها وأسبابها، ولكن في الحقيقة الكتاب هو عبارة عن جزأين، الجزء الأول فقه اللغة ويبدأ بمقدمة عن فضل العربية وسبب تأليف الكتاب، ثم يبدأ الكتاب تحت كل موضوع الكلمات التي تعبر عنها وكل كلمة معناها الدقيق، ثم الجزء الثاني وهو أصغر من الجزء الأول واسمه سر العربية، يتكلم عن بعض أساليب اللغة بإيجاز يورد التعريف ثم شاهد عليه', 'الثعالبى', '**********', 1520, 'نبذة عن الثعالبى: عبد الملك بن محمد بن إسماعيل:  (350 هـ - 429 هـ / 961 1038م) الذي يُعرف بأبي منصور الثعالبي النيسابوري، أديب عربي فصيح عاش في نيسابور وضلع في النحو والأدب وأمتاز في حصره وتبيانه لمعاني الكلمات والمصطلحات.لقب أبو منصور بالثعالبي لأن والده', '85_3d glass waaindow logo mockup.png', 150, '2020-08-25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '0',
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `GroupID`, `Date`) VALUES
(152, 'youcef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '2019-05-31'),
(154, 'aymen', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, '2020-08-24'),
(155, 'admin2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, '2020-08-24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
