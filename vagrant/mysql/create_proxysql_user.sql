CREATE USER 'monitor'@'%' IDENTIFIED BY 'monitorpassword';
GRANT SELECT on sys.* to 'monitor'@'%';
FLUSH PRIVILEGES;

CREATE USER 'playgrounduser'@'%' IDENTIFIED BY 'playgroundpassword';
GRANT ALL PRIVILEGES on playground.* to 'playgrounduser'@'%';
FLUSH PRIVILEGES;

CREATE USER 'apuser'@'%' IDENTIFIED BY 'appwd';
GRANT ALL PRIVILEGES on airport.* to 'apuser'@'%';
FLUSH PRIVILEGES;
