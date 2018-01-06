###################
Build Tables
###################

drop table race_participants;

drop table races;
drop table race_types;
drop table people;



CREATE TABLE `madison_hash_db_2017`.`race_types` (
`rt_id` INT NOT NULL AUTO_INCREMENT,
`rt_name` VARCHAR(100) NOT NULL UNIQUE,
`rt_slug` VARCHAR(100) NOT NULL UNIQUE,
`rt_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`rt_id`));

CREATE TABLE `madison_hash_db_2017`.`races` (
`race_id` INT NOT NULL AUTO_INCREMENT,
`race_rt_id` INT NOT NULL,
`race_title` VARCHAR(100) NOT NULL,
`race_slug` VARCHAR(100) NOT NULL,
`race_description` VARCHAR(1000) NULL,
`race_registration_time` DATETIME NULL,
`race_start_time` DATETIME NULL,
`race_cost` VARCHAR(45) NULL,
`race_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`race_deleted_at` DATETIME NULL,
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
  `rp_slug` VARCHAR(100) NOT NULL UNIQUE,
  `rp_notes` VARCHAR(500) NULL,
  `rp_age` VARCHAR(100) NULL,
  `rp_time` TIME NULL,
  `rp_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rp_deleted_at` DATETIME NULL,
  PRIMARY KEY (`rp_id`),
  FOREIGN KEY (rp_race_id) REFERENCES races(race_id),
  FOREIGN KEY (rp_p_id) REFERENCES people(p_id));

insert into race_types values (default, 'Finnish Five', 'finnish-five', default);
insert into race_types values (default, 'Fifty Furlong', 'fifty-furlong', default);
insert into races values (default, 1, '2017 Finnish Five', '2017', 'This is a hash tradition.', now(), now(), "$10.00", default, null);
insert into races values (default, 2, '2017 Fifty Furlong', '2017', "we don't even know what a furlong is", now(),now(), "15.00", default, null);
insert into races values (default, 2, '2018 Fifty Furlong', '2018', "This hasn't happened yet. Oh well", now(),now(), "15.00", default, null);#
insert into people values(default, 'Paul', 'Ramirez', 'nummy', 'M', 'numb-ass',  now(), null);
insert into people values(default, 'Kathryn', 'Meyer', null, 'F', 'kathryn-meyer', now(), null);
insert into people values(default, 'Grace Anne', 'Ingham', null, 'F', 'grace-anne-ingham', now(), null);

insert into race_participants values (default, 2,1, 'paul-ramirez-1', 'no notes', 36, 90, default, null);



  #update race_participants set rp_race_id = 2 where rp_id = 1;