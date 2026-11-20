-- IT0049 TSA3 - Tasks for Today Management System (Laravel)
-- Optional SQL export matching the Laravel migrations and seeders.
-- Note: Running `php artisan migrate --seed` is the recommended Laravel setup method.

CREATE DATABASE IF NOT EXISTS `tasks_for_today`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `tasks_for_today`;

DROP TABLE IF EXISTS `tasks`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tasks` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `status` VARCHAR(255) NOT NULL DEFAULT 'pending',
  `task_date` DATE NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`username`, `full_name`, `email`) VALUES
  ('johnjames', 'John James', 'jpenarroyo53@gmail.com');

INSERT INTO `tasks` (`title`, `status`, `task_date`) VALUES
  ('Set up Laravel project skeleton and environment configuration', 'completed', DATE_SUB(CURDATE(), INTERVAL 1 DAY)),
  ('Draft ER diagram and migration schema for users and tasks tables', 'completed', DATE_SUB(CURDATE(), INTERVAL 1 DAY)),
  ('Implement Task and User Eloquent models with date query scopes', 'completed', CURDATE()),
  ('Review Welcome page filtering to show only tasks due today', 'pending', CURDATE()),
  ('Verify chronological ordering on the full Task List page', 'pending', CURDATE()),
  ('Update developer bio and project details on the About page', 'pending', CURDATE()),
  ('Run PHPUnit feature tests across all four application routes', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY)),
  ('Write setup and deployment instructions in README.md', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY)),
  ('Deploy Laravel application to live hosting environment', 'pending', DATE_ADD(CURDATE(), INTERVAL 3 DAY)),
  ('Submit GitHub repository link and live hosted URL for IT0049 TSA3', 'pending', DATE_ADD(CURDATE(), INTERVAL 3 DAY));
