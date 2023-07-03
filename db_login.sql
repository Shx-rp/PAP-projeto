CREATE TABLE `clientes` (
  `mem_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userType` varchar(12) NOT NULL,
  `balance` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;