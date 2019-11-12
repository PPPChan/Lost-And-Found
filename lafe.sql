CREATE database try;
use try;
CREATE TABLE `laf` (
  
  `title` varchar(40) NOT NULL,
  `time` date ,
  `place` varchar(10) NOT NULL,
  `ttype` varchar(20) NOT NULL,
  `infopro` varchar(50) NOT NULL,
  `name` varchar(15) NOT NULL,
  `pnumber` varchar(11) NOT NULL,
  `wnumber` varchar(20) NOT NULL,
  `infotype` varchar(8) NOT NULL,
  `campus` varchar(10) NOT NULL,
  `nowdate` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8