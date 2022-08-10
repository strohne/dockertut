
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(500),
  `content` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `pages` (`id`, `caption`, `content`) VALUES
(1, 'The rabbit-hole', 'The rabbit-hole went straight on like a tunnel for some way, and then dipped suddenly down, so suddenly that Alice had not a moment to think about stopping herself before she found herself falling down a very deep well.');
