# Royal Caribbean Assessment
 Coding Assessment 
 
Coding assessment for Royal Caribbean. Follwed instructions provided in the pdf document.
The database used is MySQL and here is the table creation query:

CREATE TABLE `guest_registration` (
  `personal_id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `brand` enum('R','C','Z') NOT NULL COMMENT '(Royal = R, Celebrity = C, Azamara = Z)',
  `email_list_flag` tinyint(1) unsigned NOT NULL,
  `ship` varchar(100) NOT NULL,
  `sail_date` date NOT NULL,
  `comments` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

The following code has been uploaded to one of my personal sub-domains: http://code-assessment.juanparedes.it/
 
