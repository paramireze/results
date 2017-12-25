###################
Build Tables
###################

 CREATE TABLE `madison_hash_db_2017`.`race_types` (
  `rt_id` INT NOT NULL AUTO_INCREMENT,
  `rt_name` VARCHAR(100) NOT NULL UNIQUE,
  `rt_slug` VARCHAR(100) NOT NULL UNIQUE,
  `rt_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rt_id`));

 CREATE TABLE `madison_hash_db_2017`.`races` (
	`race_id` INT NOT NULL AUTO_INCREMENT,
	`race_type_id` INT NOT NULL,
	`race_title` VARCHAR(100) NOT NULL,
	`race_description` VARCHAR(1000) NULL,
	`race_registration_time` DATETIME NULL,
	`race_start_time` DATETIME NULL,
	`race_cost` VARCHAR(45) NULL,
	`race_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`race_deleted_at` DATETIME NULL,
  PRIMARY KEY (`race_id`),
  FOREIGN KEY (race_type_id) REFERENCES race_types(rt_id));

CREATE TABLE `madison_hash_db_2017`.`people` (
  `p_id` INT NOT NULL AUTO_INCREMENT,
  `p_first_name` VARCHAR(45) NULL,
  `p_last_name` VARCHAR(45) NULL,
  `p_email` VARCHAR(85) NULL,
  `p_phone` VARCHAR(45) NULL,
  `p_address` VARCHAR(100) NULL,
  `p_dob` DATE NULL,
  `p_created_at` DATETIME NULL DEFAULT NOW(),
  `p_deleted_at` DATETIME NULL,
  PRIMARY KEY (`p_id`));


insert into race_types values (default, 'Finnish Five', 'finnish-five', default);
insert into race_types values (default, 'Fifty Furlong', 'fifty-furlong', default);

insert into races values (default, 1, '2017 Finnish Five', 'This is a hash tradition.', now(), now(), "$10.00", default, null);
insert into races values (default, 2, '2017 Fifty Furlong', "we don't even know what a furlong is", now(),now(), "15.00", default, null);#

insert into people values(default, 'Paul', 'Ramirez', 'paramireze@gmail.com', '608-445-3478', '16n bassett st.', '04/06/1981', now(), null);
