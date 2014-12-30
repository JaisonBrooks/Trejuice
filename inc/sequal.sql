/* Create Sessions DB */
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL REFERENCES `users`(`user_id`),
  `session_key` varchar(60) NOT NULL,
  `session_address` varchar(100) NOT NULL,
  `session_useragent` varchar(200) NOT NULL,
  `session_expires` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY (`session_id`),
  KEY `idx_session_key` (`session_key`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/* Create Users DB */
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_password` varchar(64) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_registered` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`),
  KEY `idx_user_login_key` (`user_email`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/* Create default users */
INSERT INTO `users` ( `user_id`, `user_password`, `user_fullname`,`user_email`, `user_registered` )
  SELECT 1, PASSWORD('admin'), 'Jaison Brooks', 'jaisonbrooks@gmail.com', NOW();

INSERT INTO `users` ( `user_id`, `user_password`, `user_fullname`,`user_email`, `user_registered` )
  SELECT 2, PASSWORD('admin'), 'Trevor Atkinson', 'trejuice09@gmail.com', NOW();

CREATE TABLE `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `url` varchar(2083) NOT NULL DEFAULT '',
  `friendly_name` text NOT NULL,
  `name` text NOT NULL,
  `posted_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text,
  `category` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;