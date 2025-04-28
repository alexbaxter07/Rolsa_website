CREATE TABLE `users`(
    `user_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `first_name` TEXT NOT NULL,
    `last_name` TEXT NOT NULL,
    `email` TEXT NOT NULL,
    `password` TEXT NOT NULL,
    `signup_date` BIGINT NOT NULL,
    `address_line_1` TEXT NOT NULL,
    `address_line_2` TEXT NULL,
    `postcode` TEXT NOT NULL,
    `city` TEXT NOT NULL
);
CREATE TABLE `staff`(
    `staff_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `first_name` TEXT NOT NULL,
    `last_name` TEXT NOT NULL,
    `email` TEXT NOT NULL,
    `password` TEXT NOT NULL,
    `signup_date` BIGINT NOT NULL,
    `address_line_1` TEXT NOT NULL,
    `address_line_2` TEXT NULL,
    `postcode` TEXT NOT NULL,
    `city` TEXT NOT NULL,
    `type` TEXT NOT NULL
);
CREATE TABLE `booking`(
    `booking_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `date` BIGINT NOT NULL,
    `made_on` BIGINT NOT NULL,
    `user_id` BIGINT NOT NULL,
    `staff_id` BIGINT NOT NULL
);
ALTER TABLE
    `booking` ADD CONSTRAINT `booking_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `booking` ADD CONSTRAINT `booking_staff_id_foreign` FOREIGN KEY(`staff_id`) REFERENCES `staff`(`staff_id`);