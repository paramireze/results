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

insert into race_types values (default, 'Finnish Five', 'finnish-five', 'https://snag.gy/wl9OJ8.jpg', default, 'This is a finnish run celebrating their independence 100 years ago in 2017');
insert into race_types values (default, 'Fifty Furlong', 'fifty-furlong', '', default, 'dont even ask, we have no clue what a furlong is either. We just know there is supposed to be 50 of them');

insert into races values (default, 1, '2017 Finnish Five', '2017', "2017-12-16 12:00:00", "2017-12-16 13:00:00", "$10.00", default, null, 'This is a hash tradition.');
insert into races values (default, 1, '2016 Finnish Five', '2016', "2016-12-17 12:00:00", "2016-12-17 13:00:00", "$15.00", default, null, 'Another description that I dont know what to say');
insert into races values (default, 2, '2017 Fifty Furlong', '2017', "2017-03-18 12:00:00", "2017-03-18 13:00:00", "$10.00", default, null, 'we dont even know what a furlong is');
insert into races values (default, 2, '2016 Fifty Furlong', '2016', "2016-03-19 12:00:00", "2016-03-19 13:00:00", "$15.00", default, null, "This hasn't happened yet. Oh well");#

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
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 37, "14:10:00", default, null);

insert into people values(default, 'Zachary', 'Redding', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 39, "00:31:56", default, null);

insert into people values(default, 'Michael', 'Thomas', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 47, "00:33:10", default, null);

insert into people values(default, 'Clayton', 'Griessmeyer', null, null, 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 39, "00:33:34", default, null);

insert into people values(default, 'Andrew', 'Paffel', null, 'Blown Shart', 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 25, "00:36:27", default, null);

insert into people values(default, 'Jean-Luc', 'Thiffeault', null, 'Blown Shart', 'M', null, now(), null);
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 46, "00:37:21", default, null);

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
insert into race_participants values (default, @raceID, LAST_INSERT_ID(), 'no notes', 38, "00:43:42", default, null);

