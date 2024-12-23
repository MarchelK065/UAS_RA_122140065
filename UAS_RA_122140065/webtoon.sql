
CREATE DATABASE IF NOT EXISTS webtoon;

USE webtoon;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE webtoon (
  id int(11) NOT NULL,
  kode varchar(50) NOT NULL,
  nama varchar(100) NOT NULL,
  author varchar(100) NOT NULL,
  episode int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO film (id, kode, nama, author, episode) VALUES
(1, 'WB152', 'Deadly 7 Inside Me', 'Deruu Rio Ta', 202),
(2, 'WB340', 'Mantradeva', 'Agung Bollo', 155),
(3, 'WB009', '90 Days', 'Bekyu', 147),

CREATE TABLE login (
  id int(11) NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  email varchar(100) NOT NULL,
  akun_ig varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO login (id, username, password, email, akun_ig) VALUES
(1, 'admin1', 'admin1123', 'anonymous111@example.com', 'wbz_113'),
(2, 'admin2', 'admin2123', 'anonymous222@example.com', 'hendi_kg');

ALTER TABLE film
  ADD PRIMARY KEY (id);

ALTER TABLE login
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY username (username);

ALTER TABLE webtoon

ALTER TABLE login
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;