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
`race_start_time` DATETIME NULL,
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

insert into people values(default, 'Paul', 'Ramirez', null, 'nummy', 'M', null,  now(), null);
insert into people values(default, 'Ben', 'Schaefer', 'Ben Schaefer', 'nummy', 'M', 'numb-ass',  now(), null);



insert into people values(default, 'Kathryn', 'Meyer', 'Kathyrn Meyer', null, 'F', 'kathryn-meyer', now(), null);
insert into people values(default, 'Grace Anne', 'Ingham', 'Grace Anne Ingham', null, 'F', 'grace-anne-ingham', now(), null);
insert into people values(default, 'Kristina', 'Rohrer', 'Kristina Rohrer', null, 'F', 'kristina-rohrer', now(), null);
insert into people values(default, 'Molly', 'Fliearman', 'Molly Fliearman', null, 'F', 'molly-fliearman', now(), null);
insert into people values(default, 'Jill', 'Sajevic', 'Jill Sajevic', null, 'F', 'jill-sajevic', now(), null);
insert into people values(default, 'Jennifer', 'Laack', 'Jennifer Laack', null, 'F', 'jennifer-laack', now(), null);
insert into people values(default, 'Stephanie', 'Skladzien', 'Stephanie Skladzien', null, 'F', 'stephanie-skladzien', now(), null);
insert into people values(default, 'Sarah', 'Hoekstra', 'Sarah Hoekstra', null, 'F', 'sarah-hoekstra', now(), null);
insert into people values(default, 'Lynn', 'Hoekstra', 'Lynn Hoekstra', null, 'F', 'lynn-hoekstra', now(), null);
insert into people values(default, 'Tonya', 'Martynorski', 'Tonya Martynorski', null, 'F', 'tonya-martynorski', now(), null);
insert into people values(default, 'Kim', 'Clark', 'Kim Clark', null, 'F', 'kim-clark', now(), null);
insert into people values(default, 'Laura', 'Cray', 'Laura Cray', null, 'F', 'laura-cray', now(), null);
insert into people values(default, 'Katie', 'Mears', 'Katie Mears', null, 'F', 'katie-mears', now(), null);
insert into people values(default, 'Teresa', 'Fosdick', 'Teresa Fosdick', null, 'F', 'teresa-fosdick', now(), null);
insert into people values(default, 'Jelly', 'Boobs', 'Jelly Boobs', null, 'F', 'jelly-boobs', now(), null);
insert into people values(default, 'Cant', 'Holdit', 'Can\'t Hold It', null, 'F', 'cant-hold-it', now(), null);
insert into people values(default, 'Samori', 'Sex', 'Samori Sex', null, 'F', 'samori-sex', now(), null);
insert into people values(default, 'Stacy', 'Schumaker', 'Stacy Schumaker', null, 'F', 'stacy-schumaker', now(), null);
insert into people values(default, 'Michele', 'Ball', 'Michele Ball', null, 'F', 'michele-ball', now(), null);
insert into people values(default, 'Blow', 'Hole', 'Blow Hole', null, 'F', 'blow-hole', now(), null);
insert into people values(default, 'Kracka', 'Showa', 'Kracka Showa', null, 'F', 'kracka-showa', now(), null);
insert into people values(default, 'Christy', 'Blank', 'Christy Blank', null, 'F', 'christy-blank', now(), null);
insert into people values(default, 'Lisa', 'Buss', 'Lisa Buss', null, 'F', 'lisa-buss', now(), null);



#2017 finish five
insert into race_participants values (default, 1,1, 'no notes', 36, "14:10:00", default, null);
insert into race_participants values (default, 1,2, 'no notes', 36, "14:12:00", default, null);
insert into race_participants values (default, 1,3, 'no notes', 36, "14:14:00", default, null);
insert into race_participants values (default, 1,4, 'no notes', 36, "14:18:00", default, null);
insert into race_participants values (default, 1,5, 'no notes', 36, "14:21:00", default, null);
insert into race_participants values (default, 1,6, 'no notes', 36, "14:22:00", default, null);


#2016 test finish five
insert into race_participants values (default, 2,1, 'no notes', 36, "14:10:00", default, null);
insert into race_participants values (default, 2,2, 'no notes', 36, "14:12:00", default, null);
insert into race_participants values (default, 2,3, 'no notes', 36, "14:14:00", default, null);
insert into race_participants values (default, 2,4, 'no notes', 36, "14:18:00", default, null);
insert into race_participants values (default, 2,5, 'no notes', 36, "14:21:00", default, null);
insert into race_participants values (default, 2,6, 'no notes', 36, "14:22:00", default, null);

#2017 test fifty furlong
insert into race_participants values (default, 3,1, 'no notes', 36, "14:10:00", default, null);
insert into race_participants values (default, 3,2, 'no notes', 36, "14:12:00", default, null);
insert into race_participants values (default, 3,3, 'no notes', 36, "14:14:00", default, null);
insert into race_participants values (default, 3,4, 'no notes', 36, "14:18:00", default, null);
insert into race_participants values (default, 3,5, 'no notes', 36, "14:21:00", default, null);
insert into race_participants values (default, 3,6, 'no notes', 36, "14:22:00", default, null);

#2016 test fifty furlong
#2017 finish five
insert into race_participants values (default, 4,1, 'no notes', 36, "14:10:00", default, null);
insert into race_participants values (default, 4,2, 'no notes', 36, "14:12:00", default, null);
insert into race_participants values (default, 4,3, 'no notes', 36, "14:14:00", default, null);
insert into race_participants values (default, 4,4, 'no notes', 36, "14:18:00", default, null);
insert into race_participants values (default, 4,5, 'no notes', 36, "14:21:00", default, null);
insert into race_participants values (default, 4,6, 'no notes', 36, "14:22:00", default, null);

#2016 fifty furlong
#update race_participants set rp_race_id = 2 where rp_id = 1;