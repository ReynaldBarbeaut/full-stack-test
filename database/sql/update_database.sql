-- You will add in this file your changes for the database
ALTER TABLE vehicle_make ADD COLUMN state TINYINT(1) DEFAULT 1;
ALTER TABLE vehicle_model ADD COLUMN state TINYINT(1) DEFAULT 1;
ALTER TABLE vehicle ADD COLUMN state TINYINT(1) DEFAULT 1;

ALTER TABLE vehicle_make ADD COLUMN updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE vehicle_model ADD COLUMN updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE vehicle ADD COLUMN updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;