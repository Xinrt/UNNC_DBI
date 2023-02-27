DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`username`, `password`) VALUES
('administrator', 'administrator');

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `username` text NOT NULL,
  `realName` text NOT NULL,
  `password` text NOT NULL,
  `employeeID` text NOT NULL,
  `telephoneNumber` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `realName` text NOT NULL,
  `password` text NOT NULL,
  `employeeID` text NOT NULL,
  `telephoneNumber` text NOT NULL,
  `email` text NOT NULL,
  `regin` text,
  `quota` int NOT NULL DEFAULT '0',
  `N95` int NOT NULL DEFAULT '0',
  `surgical` int NOT NULL DEFAULT '0',
  `surgicalN95` int NOT NULL DEFAULT '0',
  `totalnumber` int NOT NULL DEFAULT '0',
  `totalcost` int NOT NULL DEFAULT '0',
  `customerordered` int NOT NULL DEFAULT '0',
  CONSTRAINT salesid PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `regin`;
CREATE TABLE IF NOT EXISTS `regin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `regin` text NOT NULL,
  `N95` int NOT NULL DEFAULT '0',
  `surgical` int NOT NULL DEFAULT '0',
  `surgicalN95` int NOT NULL DEFAULT '0',
  `totalnumber` int NOT NULL DEFAULT '0',
  `totalcost` int NOT NULL DEFAULT '0',
  CONSTRAINT reginid PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `regin` (`regin`) VALUES ('China'), ('America'),('UK'),('Japan'),('Korea'),('Italy'),('Canada');

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `realname` text NOT NULL,
  `passportId` text NOT NULL,
  `telephoneNumber` text NOT NULL,
  `regin` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `rePassword` text NOT NULL,
  `totalnumber` int NOT NULL DEFAULT '0',
  `totalcost` int NOT NULL DEFAULT '0',
  CONSTRAINT customerid PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `onlinecustomer`;
CREATE TABLE IF NOT EXISTS `onlinecustomer` (
  `username` text NOT NULL,
  `regin` text NOT NULL,
  `ip` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `maskorder`;
CREATE TABLE IF NOT EXISTS `maskorder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `N95` int NOT NULL DEFAULT '0',
  `surgical` int NOT NULL DEFAULT '0',
  `surgicalN95` int NOT NULL DEFAULT '0',
  `salerep` text NOT NULL,
  `time` text NOT NULL,
  `totalnumber` int NOT NULL DEFAULT '0',
  `totalcost` int NOT NULL DEFAULT '0',
  `orderingID` text NOT NULL,
  `regin` text NOT NULL,
  `anomaly` text,
  CONSTRAINT maskorderid PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

