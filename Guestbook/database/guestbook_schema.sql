-- -----------------------------------------------------
-- Table guestbook
-- -----------------------------------------------------
DROP TABLE IF EXISTS guestbook ;

CREATE TABLE IF NOT EXISTS guestbook (
  id INT(11) NOT NULL AUTO_INCREMENT,
  active TINYINT(4) NULL DEFAULT '1',
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  title VARCHAR(45) NOT NULL,
  company VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  linkedin_URL VARCHAR(45) NULL DEFAULT NULL,
  mailing_list varchar(25) NULL DEFAULT NULL,
  how_did_we_meet VARCHAR(45) NULL DEFAULT NULL,
  how_did_we_meet_other VARCHAR(45) NULL DEFAULT NULL,
  comments_questions VARCHAR(80) NULL DEFAULT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC));
