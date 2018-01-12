drop table race_participants;

drop table races;
drop table race_types;
drop table people;



CREATE TABLE `madison_hash_db_2017`.`race_types` (
`rt_id` INT NOT NULL AUTO_INCREMENT,
`rt_name` VARCHAR(100) NOT NULL UNIQUE,
`rt_slug` VARCHAR(100) NOT NULL UNIQUE,
`rt_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`rt_description` VARCHAR(1000) NOT NULL,
PRIMARY KEY (`rt_id`));

CREATE TABLE `madison_hash_db_2017`.`races` (
`race_id` INT NOT NULL AUTO_INCREMENT,
`race_rt_id` INT NOT NULL,
`race_title` VARCHAR(100) NOT NULL,
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
`p_nick_name` VARCHAR(100) NULL,
`p_gender` enum('M','F') NOT NULL,
`p_slug` VARCHAR(100) NOT NULL,
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

insert into race_types values (default, 'Finnish Five', 'finnish-five', default, 'This is a finnish run celebrating their independence 100 years ago in 2017');
insert into race_types values (default, 'Fifty Furlong', 'fifty-furlong', default, 'dont even ask, we have no clue what a furlong is either. We just know there is supposed to be 50 of them');

insert into races values (default, 1, '2017 Finnish Five', '2017', "2017-12-16 12:00:00", "2017-12-16 13:00:00", "$10.00", default, null, 'This is a hash tradition.');
insert into races values (default, 1, '2016 Finnish Five', '2016', "2016-12-17 12:00:00", "2016-12-17 13:00:00", "$15.00", default, null, 'Another description that I dont know what to say');
insert into races values (default, 2, '2017 Fifty Furlong', '2017', "2017-03-18 12:00:00", "2017-03-18 13:00:00", "$10.00", default, null, 'we dont even know what a furlong is');
insert into races values (default, 2, '2016 Fifty Furlong', '2016', "2016-03-19 12:00:00", "2016-03-19 13:00:00", "$15.00", default, null, "This hasn't happened yet. Oh well");#

insert into people values(default, 'Paul', 'Ramirez', 'nummy', 'M', 'numb-ass',  now(), null);
insert into people values(default, 'Kathryn', 'Meyer', null, 'F', 'kathryn-meyer', now(), null);
insert into people values(default, 'Grace Anne', 'Ingham', null, 'F', 'grace-anne-ingham', now(), null);
insert into people values(default, 'Kristina', 'Rohrer', null, 'F', 'kristina-rohrer', now(), null);
insert into people values(default, 'Molly', 'Fliearman', null, 'F', 'molly-fliearman', now(), null);
insert into people values(default, 'Jill', 'Sajevic', null, 'F', 'jill-sajevic', now(), null);
insert into people values(default, 'Jennifer', 'Laack', null, 'F', 'jennifer-laack', now(), null);

insert into race_participants values (default, 1,1, 'no notes', 36, 90, default, null);
insert into race_participants values (default, 1,2, 'no notes', 36, 90, default, null);
insert into race_participants values (default, 1,3, 'no notes', 36, 90, default, null);
insert into race_participants values (default, 1,4, 'no notes', 36, 90, default, null);
insert into race_participants values (default, 1,5, 'no notes', 36, 90, default, null);
insert into race_participants values (default, 1,6, 'no notes', 36, 90, default, null);





  #update race_participants set rp_race_id = 2 where rp_id = 1;