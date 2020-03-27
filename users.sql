CREATE TABLE `users`(
	`id` int(10) NOT NULL,
	`fullname` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
	`username` varchar(20) NOT NULL,
	`id_num` varchar(20) NOT NULL,
	`email` varchar(20) NOT NULL,
	`password` varchar(20) NOT NULL,
	`secretpin` int(10) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	
ALTER TABLE `users`
	ADD PRIMARY KEY (`id`);
ALTER TABLE `users`
	MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;