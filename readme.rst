drop table race_participants;

drop table races;
drop table race_types;
drop table people;



CREATE TABLE `madison_hash_db_2017`.`race_types` (
`rt_id` INT NOT NULL AUTO_INCREMENT,
`rt_name` VARCHAR(100) NOT NULL UNIQUE,
`rt_slug` VARCHAR(100) NOT NULL UNIQUE,
`rt_image_url` VARCHAR(100) NOT NULL,
`rt_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`rt_description` VARCHAR(1000) NOT NULL,
PRIMARY KEY (`rt_id`));
	
CREATE TABLE `madison_hash_db_2017`.`races` (
`race_id` INT NOT NULL AUTO_INCREMENT,
`race_rt_id` INT NOT NULL,
`race_name` VARCHAR(100) NOT NULL,
`race_image_url` VARCHAR(100) NOT NULL,
`race_slug` VARCHAR(100) NOT NULL,
`race_registration_time` DATETIME NULL,
`race_start_time` TIME NULL,
`race_cost` VARCHAR(45) NULL,
`race_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`race_deleted_at` DATETIME NULL,
`race_description` VARCHAR(1000) NULL,
PRIMARY KEY (`race_id`),
FOREIGN KEY (race_rt_id) REFERENCES race_types(rt_id));

CREATE TABLE `madison_hash_db_2017`.`people` (
`p_id` INT NOT NULL AUTO_INCREMENT,
`p_first_name` VARCHAR(100) NOT NULL,
`p_last_name` VARCHAR(100) NOT NULL,
`p_display_name` VARCHAR(100) NULL,
`p_nick_name` VARCHAR(100) NULL,
`p_gender` enum('M','F') NOT NULL,
`p_slug` VARCHAR(100) NULL,
`p_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`p_deleted_at` DATETIME NULL,
PRIMARY KEY (`p_id`));

 CREATE TABLE `madison_hash_db_2017`.`race_participants` (
  `rp_id` INT NOT NULL AUTO_INCREMENT,
  `rp_race_id` INT NOT NULL,
  `rp_p_id` INT NOT NULL,
  `rp_notes` VARCHAR(500) NULL,
  `rp_age` VARCHAR(100) NULL,
  `rp_time` TIME NULL,
  `rp_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rp_deleted_at` DATETIME NULL,
  PRIMARY KEY (`rp_id`),
  FOREIGN KEY (rp_race_id) REFERENCES races(race_id),
  FOREIGN KEY (rp_p_id) REFERENCES people(p_id));

insert into race_types values (default, 'Finnish Five', 'finnish-five', 'https://snag.gy/ajsHy5.jpg', default, 'We raised over $500 for River Pantry Shelter for the last two years. Help us keep the streak alive.');
insert into race_types values (default, 'Fifty Furlong', 'fifty-furlong', 'https://snag.gy/CUFWEQ.jpg', default, 'dont even ask, we have no clue what a furlong is either. We just know there is supposed to be 50 of them');
SET @fiftyFurlongID = last_insert_id();

insert into race_types values (default, 'Beer Mile', 'beer-mile', 'https://snag.gy/viDGtK.jpg', default, 'This is when we run in circles and drink beer');

insert into races values (default, @fiftyFurlongID, '2017 Fifty Furlong', '2017', "2017-03-18 12:00:00", "2017-03-18 13:00:00", "$10.00", default, null, 'we dont even know what a furlong is');

#insert into races values (default, 1, '2017 Finnish Five', '2017', "2017-12-16 12:00:00", "2017-12-16 13:00:00", "$10.00", default, null, 'This is a hash tradition.');
#insert into races values (default, 1, '2016 Finnish Five', '2016', "2016-12-17 12:00:00", "2016-12-17 13:00:00", "$15.00", default, null, 'Another description that I dont know what to say');
#insert into races values (default, 2, '2016 Fifty Furlong', '2016', "2016-03-19 12:00:00", "2016-03-19 13:00:00", "$15.00", default, null, "This hasn't happened yet. Oh well");#

/*
create display name and person slug trigger
*/
DELIMITER $$
CREATE TRIGGER create_display_name BEFORE INSERT ON people
FOR EACH ROW
BEGIN
  IF (NEW.p_display_name IS NULL) THEN BEGIN
    SET NEW.p_display_name = CONCAT(NEW.p_first_name, ' ', NEW.p_last_name); END;
  END IF;
  IF (NEW.p_slug IS NULL) THEN BEGIN
    SET NEW.p_slug = LOWER(TRIM(CONCAT(NEW.p_first_name, '-', NEW.p_last_name)));
	SET NEW.p_slug = REPLACE(NEW.p_slug, ' ', '-');
	SET NEW.p_slug = REPLACE(NEW.p_slug, '--', '-'); END;
  END IF;
END$$

DELIMITER ;

##### 2017 FIFTY FURLONG
##### MALE
SET @raceID = (select race_id from races where race_name="2017 Fifty Furlong");
insert into people values(default, 'Travis', 'Bashaw', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 37, "00:31:56", default, null);

insert into people values(default, 'Zachary', 'Redding', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 39, "00:33:10", default, null);

insert into people values(default, 'Michael', 'Thomas', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 47, "00:33:34", default, null);

insert into people values(default, 'Clayton', 'Griessmeyer', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 39, "00:36:27", default, null);

insert into people values(default, 'Andrew', 'Paffel', null, 'Blown Shart', 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 25, "00:37:21", default, null);

insert into people values(default, 'Jean-Luc', 'Thiffeault', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 46, "00:38:00", default, null);

insert into people values(default, 'Kevin', 'Williams', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 37, "00:38:34", default, null);

insert into people values(default, 'Jim', 'Berkelman', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 53, "00:38:39", default, null);

insert into people values(default, 'Scott', 'Jones', null, 'Blown Shart', 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 45, "00:39:48", default, null);

insert into people values(default, 'Dylan', 'Gerhart', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 31, "00:40:05", default, null);

insert into people values(default, 'Eric', 'Barber', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 47, "00:42:21", default, null);

insert into people values(default, 'Michael', 'Falk', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 50, "00:42:54", default, null);

insert into people values(default, 'Brian', 'Plachetka', null, 'Porkins', 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 36, "00:43:08", default, null);

insert into people values(default, 'Joshua', 'Turner', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 43, "00:43:22", default, null);

insert into people values(default, 'Tom', 'Alesia', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 51, "00:43:59", default, null);

insert into people values(default, 'Victor', 'Lai', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 39, "00:44:08", default, null);

insert into people values(default, 'Dave', 'Turck', null, 'Ronald Mexico', 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 48, "00:44:50", default, null);

insert into people values(default, 'Daithi', 'Wolfe', null, 'Fiddles', 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 54, "00:46:05", default, null);

insert into people values(default, 'Billy', 'Maybee', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 61, "00:46:16", default, null);

insert into people values(default, 'Tom', 'Deits', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 70, "00:47:09", default, null);

insert into people values(default, 'Phillip', 'Kesling', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 38, "00:47:12", default, null);

insert into people values(default, 'Raphael', 'Lo', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 46, "00:48:09", default, null);

insert into people values(default, 'David', 'Dewald', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 48, "00:48:34", default, null);

insert into people values(default, 'Taylor', 'Moermond', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 48, "00:48:52", default, null);

insert into people values(default, 'Frederick', 'Paffel', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 27, "00:52:05", default, null);

insert into people values(default, 'Tim', 'Potter', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 61, "00:54:43", default, null);

insert into people values(default, 'Gary', 'Foster', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 65, "00:55:30", default, null);

insert into people values(default, 'Frank', 'Flack', null, 'Poopeye', 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 63, "01:07:43", default, null);

insert into people values(default, 'Tony', 'Greig', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 63, "00:37:21", default, null);


##### FEMALE
insert into people values(default, 'Amber', 'Converse', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 35, "00:38:07", default, null);

insert into people values(default, 'Sally', 'Younger', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 29, "00:41:28", default, null);

insert into people values(default, 'Christina', 'Newman', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 30, "00:42:05", default, null);

insert into people values(default, 'Ann', 'Heaslett', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 53, "00:43:42", default, null);

insert into people values(default, 'Trisha', 'Casey', null, 'Fedora', 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 38, "00:45:56", default, null);

insert into people values(default, 'Elizbeth', 'Sprehe', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 31, "00:47:42", default, null);

insert into people values(default, 'Jenny', 'Hayes', null, 'Jelly Boobs', 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 49, "00:49:59", default, null);

insert into people values(default, 'Michelle', 'Stocker', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 41, "00:50:40", default, null);

insert into people values(default, 'Claire', 'Nerenhausen', null, 'White Cliffs', 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 31, "00:50:40", default, null);

insert into people values(default, 'Nicole', 'Jenkins', null, 'White Cliffs', 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 38, "00:50:40", default, null);

insert into people values(default, 'Emily', 'Lupton-Metrish', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 33, "00:50:40", default, null);

insert into people values(default, 'Meghan', 'Steinke', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 31, "00:50:40", default, null);

insert into people values(default, 'Michele', 'Bahl', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 43, "00:50:40", default, null);

insert into people values(default, 'Laurel', 'Stewart', null, 'DJ Jizzy Jew', 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 22, "00:50:40", default, null);

insert into people values(default, 'Lu', 'Greig', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 63, "00:50:40", default, null);

insert into people values(default, 'Sarah', 'Kangas', null, 'Michelle Vick', 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 27, "00:50:40", default, null);

insert into people values(default, 'Janet', 'Hagen', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 67, "00:50:40", default, null);

insert into people values(default, 'Susan', 'Skinner', null, null, 'F', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 49, "00:50:40", default, null);



DROP TABLE IF EXISTS `groups`;

#
# Table structure for table 'groups'
#

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table 'groups'
#

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
     (1,'admin','Administrator'),
     (2,'members','General User');



DROP TABLE IF EXISTS `users`;

#
# Table structure for table 'users'
#

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Dumping data for table 'users'
#

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
     ('1','127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,'1268889823','1268889823','1', 'Admin','istrator','ADMIN','0');


DROP TABLE IF EXISTS `users_groups`;

#
# Table structure for table 'users_groups'
#

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `uc_users_groups` UNIQUE (`user_id`, `group_id`),
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
     (1,1,1),
     (2,1,2);

#race_id, race_rt_id, race_name, race_slug, race_registration_time, race_start_time, race_cost, race_description
DROP TABLE IF EXISTS `login_attempts`;

#
# Table structure for table 'login_attempts'
#

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;