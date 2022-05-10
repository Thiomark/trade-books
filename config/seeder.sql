CREATE TABLE `bookstore`.`tblUser` ( 
    `user_id` INT(11) NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(255) NOT NULL , 
    `name` VARCHAR(255) NOT NULL , 
    `password` VARCHAR(255) NOT NULL , 
    `role` VARCHAR(255) NOT NULL , 
    `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `is_approved` BOOLEAN NOT NULL DEFAULT FALSE , 
    PRIMARY KEY (`user_id`)
) ENGINE = InnoDB;





INSERT INTO `tblUser` (`user_id`, `username`, `name`, `password`, `role`, `created_on`, `is_approved`) VALUES (NULL, 'admin', 'admin', 'admin123', 'admin', CURRENT_TIMESTAMP, '1');
