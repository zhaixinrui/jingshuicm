use demo;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL UNIQUE KEY,
  `nickname` varchar(128),
  `password` varchar(128) NOT NULL,
  `email` varchar(128),
  `phone` varchar(128),
  `role` int NOT NULL DEFAULT 0,
  `status` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO User(username, password, role, status) values('zhai', 'b330b6a6aebe430a9da8badc13464d65', 0, 0);
