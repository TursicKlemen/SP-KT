SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `todo_category` (
  `cat_id` int(11) NOT NULL,
  `cat` varchar(30) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

CREATE TABLE `todo_task` (
  `task_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `date` datetime NOT NULL,
  `taskDesc` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

CREATE TABLE `todo_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `ime` varchar(20) NOT NULL,
  `priimek` varchar(20) NOT NULL,
  `active` int(1) DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `slika` varchar(40) NOT NULL,
  `tel` varchar(9) NOT NULL,
  `opomnikmail` tinyint(1) NOT NULL,
  `opomniktel` tinyint(1) NOT NULL,
  `vrstaopomnika` int(11) NOT NULL,
  `ura` time NOT NULL,
  `last_login` datetime NOT NULL,
  `last_login_ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `todo_task`
  ADD PRIMARY KEY (`task_id`);

ALTER TABLE `todo_users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `todo_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `todo_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
