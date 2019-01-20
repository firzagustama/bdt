CREATE DATABASE airport;
CREATE TABLE airport.cargo(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, DataExtractDate datetime, ReportPeriod datetime, Arrival_Departure varchar(30), Domestic_International varchar(30), CargoType varchar(30), AirCargoTons INT(11));

LOAD DATA INFILE '/var/lib/mysql-files/cargo.csv'
INTO TABLE airport.cargo
COLUMNS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
ESCAPED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES;
