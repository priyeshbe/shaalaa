CREATE DATABASE school;

USE school;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` text NOT NULL,
  `api_key` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
);

CREATE TABLE IF NOT EXISTS `businfo` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `busno` TINYINT(1) NOT NULL,
  `busroute` TINYINT(1) NOT NULL,
  `drivername` VARCHAR(20) NOT NULL,
  `drivermobile` VARCHAR(10) NOT NULL,
  UNIQUE KEY `busno` (`busno`)
);

CREATE TABLE IF NOT EXISTS `buslocation` (
 `busno` TINYINT(1) NOT NULL,
 `lat` DECIMAL(9,6) NOT NULL,
 `lng` DECIMAL(9,6) NOT NULL
);

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO tasks (task, status) VALUES ('task 2', 0);

CREATE TABLE IF NOT EXISTS `user_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `task_id` (`task_id`)
);

ALTER TABLE  `user_tasks` ADD FOREIGN KEY (  `user_id` ) REFERENCES  `task_manager`.`users` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `user_tasks` ADD FOREIGN KEY (  `task_id` ) REFERENCES  `task_manager`.`tasks` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;
