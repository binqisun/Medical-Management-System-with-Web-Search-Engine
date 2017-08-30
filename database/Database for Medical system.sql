
USE hospital;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS login; 
CREATE TABLE login(
	username CHAR(200),
	password CHAR(200),
	PRIMARY KEY(username));

DROP TABLE IF EXISTS Patient; 
CREATE TABLE Patient(
	healthid INTEGER(9),
	healthinfo CHAR(100),
	name CHAR(20),
	phonenum CHAR(10),
	address CHAR(100),
	city CHAR(25),
	postal_code CHAR(7),
	state CHAR(30),
	PRIMARY KEY(healthid));

/*This is the trigger to check for constraints on patient inserts*/
DROP TRIGGER IF EXISTS check_patient_insert;
DELIMITER $$
CREATE TRIGGER `check_patient_insert` BEFORE INSERT ON `Patient`
FOR EACH ROW
BEGIN
    IF (new.healthid < 0) THEN
    SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'heatlhid must be positive';
	ELSEIF (char_length(new.phonenum) <> 10) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'phonenum must contain only 10 digits';
	ELSEIF (not (new.state = 'Alabama' OR new.state ='Alaska' OR new.state = 'Arizona' OR new.state = 'Arkansas' OR new.state = 'California'
		OR new.state = 'Colorado' OR new.state = 'Connecticut' OR new.state = 'Delaware' OR new.state = 'Florida' OR new.state = 'Georgia'
	OR new.state = 'Hawaii' OR new.state = 'Idaho' OR new.state = 'Illinois' OR new.state ='Indiana' OR new.state = 'Iowa' OR new.state = 'Kansas' OR new.state = 'Kentucky'
		OR new.state = 'Louisiana' OR new.state = 'Maine' OR new.state = 'Maryland' OR new.state = 'Massachusetts' OR new.state = 'Michigan'
	OR new.state = 'Minnesota' OR new.state = 'Mississippi' OR new.state = 'Missouri' OR new.state = 'Montana' OR new.state = 'Nebraska' OR new.state = 'Nevada'
	OR new.state = 'New Hampshire' OR new.state = 'New Jersey' OR new.state = 'New Mexico' OR new.state ='New York' OR new.state = 'North Carolina' OR new.state = 'North Dakota' 
	OR new.state = 'Ohio' OR new.state = 'Oklahoma' OR new.state = 'Oregon' OR new.state = 'Pennsylvania' OR new.state = 'Rhode Island' OR new.state = 'South Carolina'
	OR new.state = 'South Dakota' OR new.state = 'Tennessee' OR new.state = 'Texas' OR new.state = 'Utah' OR new.state = 'Vermont' OR new.state = 'Virginia' OR new.state = 'Washington'
	OR new.state = 'West Virginia' OR new.state = 'Wisconsin' OR new.state = 'Wyoming')) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not a defined state';
	ELSEIF (char_length(new.postal_code) <> 5) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Postal code must contain only 5 digits';
    END IF;
END$$   
DELIMITER ;

/*This is the trigger to check for constraints on patient updates*/
DROP TRIGGER IF EXISTS check_patient_update;
DELIMITER $$
CREATE TRIGGER `check_patient_update` BEFORE UPDATE ON `Patient`
FOR EACH ROW
BEGIN
	IF (char_length(new.phonenum) <> 10) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'phonenum must contain only 10 digits';
	ELSEIF (not (new.state = 'Alabama' OR new.state ='Alaska' OR new.state = 'Arizona' OR new.state = 'Arkansas' OR new.state = 'California'
		OR new.state = 'Colorado' OR new.state = 'Connecticut' OR new.state = 'Delaware' OR new.state = 'Florida' OR new.state = 'Georgia'
	OR new.state = 'Hawaii' OR new.state = 'Idaho' OR new.state = 'Illinois' OR new.state ='Indiana' OR new.state = 'Iowa' OR new.state = 'Kansas' OR new.state = 'Kentucky'
		OR new.state = 'Louisiana' OR new.state = 'Maine' OR new.state = 'Maryland' OR new.state = 'Massachusetts' OR new.state = 'Michigan'
	OR new.state = 'Minnesota' OR new.state = 'Mississippi' OR new.state = 'Missouri' OR new.state = 'Montana' OR new.state = 'Nebraska' OR new.state = 'Nevada'
	OR new.state = 'New Hampshire' OR new.state = 'New Jersey' OR new.state = 'New Mexico' OR new.state ='New York' OR new.state = 'North Carolina' OR new.state = 'North Dakota' 
	OR new.state = 'Ohio' OR new.state = 'Oklahoma' OR new.state = 'Oregon' OR new.state = 'Pennsylvania' OR new.state = 'Rhode Island' OR new.state = 'South Carolina'
	OR new.state = 'South Dakota' OR new.state = 'Tennessee' OR new.state = 'Texas' OR new.state = 'Utah' OR new.state = 'Vermont' OR new.state = 'Virginia' OR new.state = 'Washington'
	OR new.state = 'West Virginia' OR new.state = 'Wisconsin' OR new.state = 'Wyoming')) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not a defined state';
	ELSEIF (char_length(new.postal_code) <> 5) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Postal code must contain only 5 digits';
    END IF;
END$$   
DELIMITER ;

DROP TABLE IF EXISTS Staff; 
CREATE TABLE Staff(
	ssn INTEGER(9),
	name CHAR(20),
	phonenum CHAR(10),
	address CHAR(100),
	city CHAR(25),
	postal_code CHAR(7),
	state CHAR(30),
	PRIMARY KEY(ssn));


/*This is the trigger to check for constraints on staff inserts*/
DROP TRIGGER IF EXISTS check_staff_insert;
DELIMITER $$
CREATE TRIGGER `check_staff_insert` BEFORE INSERT ON `Staff`
FOR EACH ROW
BEGIN
    IF (new.ssn < 0) THEN
    SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ssn must be positive';
	ELSEIF (char_length(new.phonenum) <> 10) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'phonenum must contain only 10 digits';
	ELSEIF (not (new.state = 'Alabama' OR new.state ='Alaska' OR new.state = 'Arizona' OR new.state = 'Arkansas' OR new.state = 'California'
		OR new.state = 'Colorado' OR new.state = 'Connecticut' OR new.state = 'Delaware' OR new.state = 'Florida' OR new.state = 'Georgia'
	OR new.state = 'Hawaii' OR new.state = 'Idaho' OR new.state = 'Illinois' OR new.state ='Indiana' OR new.state = 'Iowa' OR new.state = 'Kansas' OR new.state = 'Kentucky'
		OR new.state = 'Louisiana' OR new.state = 'Maine' OR new.state = 'Maryland' OR new.state = 'Massachusetts' OR new.state = 'Michigan'
	OR new.state = 'Minnesota' OR new.state = 'Mississippi' OR new.state = 'Missouri' OR new.state = 'Montana' OR new.state = 'Nebraska' OR new.state = 'Nevada'
	OR new.state = 'New Hampshire' OR new.state = 'New Jersey' OR new.state = 'New Mexico' OR new.state ='New York' OR new.state = 'North Carolina' OR new.state = 'North Dakota' 
	OR new.state = 'Ohio' OR new.state = 'Oklahoma' OR new.state = 'Oregon' OR new.state = 'Pennsylvania' OR new.state = 'Rhode Island' OR new.state = 'South Carolina'
	OR new.state = 'South Dakota' OR new.state = 'Tennessee' OR new.state = 'Texas' OR new.state = 'Utah' OR new.state = 'Vermont' OR new.state = 'Virginia' OR new.state = 'Washington'
	OR new.state = 'West Virginia' OR new.state = 'Wisconsin' OR new.state = 'Wyoming')) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not a defined state';
	ELSEIF (char_length(new.phonenum) <> 10) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'phonenum must contain only 10 digits';
	ELSEIF (char_length(new.postal_code) <> 5) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Postal code must contain only 5 digits';
    END IF;
END$$   
DELIMITER ;

/*This is the trigger to check for constraints on staff updates*/
DROP TRIGGER IF EXISTS check_staff_updates;
DELIMITER $$
CREATE TRIGGER `check_staff_updates` BEFORE UPDATE ON `Staff`
FOR EACH ROW
BEGIN
    IF (new.ssn < 0) THEN
    SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'ssn must be positive';
	ELSEIF (char_length(new.phonenum) <> 10) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'phonenum must contain only 10 digits';
	ELSEIF (not (new.state = 'Alabama' OR new.state ='Alaska' OR new.state = 'Arizona' OR new.state = 'Arkansas' OR new.state = 'California'
		OR new.state = 'Colorado' OR new.state = 'Connecticut' OR new.state = 'Delaware' OR new.state = 'Florida' OR new.state = 'Georgia'
	OR new.state = 'Hawaii' OR new.state = 'Idaho' OR new.state = 'Illinois' OR new.state ='Indiana' OR new.state = 'Iowa' OR new.state = 'Kansas' OR new.state = 'Kentucky'
		OR new.state = 'Louisiana' OR new.state = 'Maine' OR new.state = 'Maryland' OR new.state = 'Massachusetts' OR new.state = 'Michigan'
	OR new.state = 'Minnesota' OR new.state = 'Mississippi' OR new.state = 'Missouri' OR new.state = 'Montana' OR new.state = 'Nebraska' OR new.state = 'Nevada'
	OR new.state = 'New Hampshire' OR new.state = 'New Jersey' OR new.state = 'New Mexico' OR new.state ='New York' OR new.state = 'North Carolina' OR new.state = 'North Dakota' 
	OR new.state = 'Ohio' OR new.state = 'Oklahoma' OR new.state = 'Oregon' OR new.state = 'Pennsylvania' OR new.state = 'Rhode Island' OR new.state = 'South Carolina'
	OR new.state = 'South Dakota' OR new.state = 'Tennessee' OR new.state = 'Texas' OR new.state = 'Utah' OR new.state = 'Vermont' OR new.state = 'Virginia' OR new.state = 'Washington'
	OR new.state = 'West Virginia' OR new.state = 'Wisconsin' OR new.state = 'Wyoming')) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not a defined state';
	ELSEIF (char_length(new.phonenum) <> 10) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'phonenum must contain only 10 digits';
	ELSEIF (char_length(new.postal_code) <> 5) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Postal code must contain only 5 digits';
    END IF;
END$$   
DELIMITER ;

DROP TABLE IF EXISTS Hospital; 
CREATE TABLE Hospital(
	name CHAR(50),
	city CHAR(25),
	address CHAR(100),
	postal_code CHAR(7),
	state CHAR(30),
	PRIMARY KEY(name, city));

/*This is the trigger to check for constraints on hospital*/
DROP TRIGGER IF EXISTS check_hospital;
DELIMITER $$
CREATE TRIGGER `check_hospital` BEFORE INSERT ON `Hospital`
FOR EACH ROW
BEGIN
	IF (not (new.state = 'Alabama' OR new.state ='Alaska' OR new.state = 'Arizona' OR new.state = 'Arkansas' OR new.state = 'California'
		OR new.state = 'Colorado' OR new.state = 'Connecticut' OR new.state = 'Delaware' OR new.state = 'Florida' OR new.state = 'Georgia'
	OR new.state = 'Hawaii' OR new.state = 'Idaho' OR new.state = 'Illinois' OR new.state ='Indiana' OR new.state = 'Iowa' OR new.state = 'Kansas' OR new.state = 'Kentucky'
		OR new.state = 'Louisiana' OR new.state = 'Maine' OR new.state = 'Maryland' OR new.state = 'Massachusetts' OR new.state = 'Michigan'
	OR new.state = 'Minnesota' OR new.state = 'Mississippi' OR new.state = 'Missouri' OR new.state = 'Montana' OR new.state = 'Nebraska' OR new.state = 'Nevada'
	OR new.state = 'New Hampshire' OR new.state = 'New Jersey' OR new.state = 'New Mexico' OR new.state ='New York' OR new.state = 'North Carolina' OR new.state = 'North Dakota' 
	OR new.state = 'Ohio' OR new.state = 'Oklahoma' OR new.state = 'Oregon' OR new.state = 'Pennsylvania' OR new.state = 'Rhode Island' OR new.state = 'South Carolina'
	OR new.state = 'South Dakota' OR new.state = 'Tennessee' OR new.state = 'Texas' OR new.state = 'Utah' OR new.state = 'Vermont' OR new.state = 'Virginia' OR new.state = 'Washington'
	OR new.state = 'West Virginia' OR new.state = 'Wisconsin' OR new.state = 'Wyoming')) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not a defined state';
	ELSEIF (char_length(new.postal_code) <> 5) THEN
	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Postal code must contain only 5 digits';
    END IF;
END$$   
DELIMITER ;

DROP TABLE IF EXISTS Room; 
CREATE TABLE Room(
	level INTEGER(1),
	roomnum INTEGER(3),
	name CHAR(50),
	city CHAR(25),
	PRIMARY KEY(level, roomnum, name, city),
	FOREIGN KEY(name, city) references Hospital(name, city)
	ON DELETE CASCADE);


DROP TABLE IF EXISTS Office; 
CREATE TABLE Office(
	level INTEGER(1),
	roomnum INTEGER(3),
	name CHAR(50),
	city CHAR(25),
	PRIMARY KEY(level, roomnum, name, city),
	FOREIGN KEY(level, roomnum, name, city) references
	Room(level, roomnum, name, city)
	ON DELETE cascade);

DROP TABLE IF EXISTS SurgeryRoom;
CREATE TABLE SurgeryRoom(
	level INTEGER(1),
	roomnum INTEGER(3),
	name CHAR(50),
	city CHAR(25),
	PRIMARY KEY(level, roomnum, name, city),
	FOREIGN KEY(level, roomnum, name, city) references
	Room(level, roomnum, name, city)
	ON DELETE cascade);

DROP TABLE IF EXISTS Nurse;
CREATE TABLE Nurse(
	ssn INTEGER(9),
	PRIMARY KEY(ssn),
	FOREIGN KEY(ssn) references Staff(ssn)
	ON DELETE cascade
	ON UPDATE CASCADE);

DROP TABLE IF EXISTS Security;
CREATE TABLE Security(
	ssn INTEGER(9),
	PRIMARY KEY(ssn),
	FOREIGN KEY(ssn) references Staff(ssn)
	ON DELETE cascade
	ON UPDATE CASCADE);

DROP TABLE IF EXISTS Janitor;
CREATE TABLE Janitor(
	ssn INTEGER(9),
	PRIMARY KEY(ssn),
	FOREIGN KEY(ssn) references Staff(ssn)
	ON DELETE cascade
	ON UPDATE CASCADE);

DROP TABLE IF EXISTS Receptionist;
CREATE TABLE Receptionist(
	ssn INTEGER(9),
	PRIMARY KEY(ssn),
	FOREIGN KEY(ssn) references Staff(ssn)
	ON DELETE cascade
	ON UPDATE CASCADE);


DROP TABLE IF EXISTS Physician;
CREATE TABLE Physician(
	ssn INTEGER(9),
	specialty CHAR(20),
	office_room INTEGER(3),
	office_name CHAR(50),
	office_level INTEGER(1),
	office_city CHAR(25),
	PRIMARY KEY(ssn),
	FOREIGN KEY(ssn) references Staff(ssn)
	ON DELETE cascade 
	ON UPDATE CASCADE,
	FOREIGN KEY(office_level,office_room,office_name,office_city) references Office(level,roomnum,name,city)
	ON DELETE SET NULL
	ON UPDATE CASCADE);

DROP TABLE IF EXISTS Procedures; 
CREATE TABLE Procedures(
	proid INTEGER(11),
	healthid INTEGER(11),
	ssn INTEGER(9),
	description CHAR(100),
	date DATE,
	time CHAR(5),
	PRIMARY KEY(proid),
	FOREIGN KEY(healthid) references Patient(healthid)
	ON DELETE cascade 
	ON UPDATE CASCADE,
	FOREIGN KEY(ssn) references Physician(ssn)
	ON DELETE cascade
	ON UPDATE CASCADE);


DROP TABLE IF EXISTS PatientStaysIn; 
CREATE TABLE PatientStaysIn(
	healthid INTEGER(11),
	roomnum INTEGER(3),
	level INTEGER(1),
	name CHAR(50),
	city CHAR(25),
	PRIMARY KEY(healthid, roomnum, level, name, city),
	FOREIGN KEY(level,roomnum,name,city) references Room(level,roomnum,name,city)
	ON DELETE cascade 
	ON UPDATE CASCADE,
	FOREIGN KEY(healthid) references Patient(healthid)
	ON DELETE cascade
	ON UPDATE CASCADE);

DROP TABLE IF EXISTS ProcedureInRoom; 
CREATE TABLE ProcedureInRoom(
	proid INTEGER(11),
	level INTEGER(1),
	roomnum INTEGER(3),
	name CHAR(50),
	city CHAR(25),
	PRIMARY KEY(proid, level, roomnum, name, city),
	FOREIGN KEY(level, roomnum, name, city) references
	Room(level, roomnum, name, city)
	ON DELETE cascade 
	ON UPDATE CASCADE,
	FOREIGN KEY(proid) references Procedures(proid)
	ON DELETE cascade 
	ON UPDATE CASCADE);
	
DROP TABLE IF EXISTS WorksAt; 
CREATE TABLE WorksAt(
	ssn INTEGER(9),
	name CHAR(50),
	city CHAR(25),
	PRIMARY KEY(ssn, name, city),
	FOREIGN KEY(name, city) references Hospital(name, city)
	ON DELETE cascade 
	ON UPDATE CASCADE,
	FOREIGN KEY(ssn) references Staff(ssn)
	ON DELETE cascade
	ON UPDATE CASCADE);

SET FOREIGN_KEY_CHECKS=1;

INSERT INTO login (username, password) VALUES ("admin", "admin");
INSERT INTO login (username, password) VALUES ("binqi", "123");

INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000000, "Oberyn Martell", 5017883456, "1234 Cambie St", "Little Rock", "72002", "Arkansas");
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000001, "Sansa Stark", 5014455778, "3453 Main St", 'Little Rock', '72002', "Arkansas");
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000002, "Arya Stark", 5014445778, "3453 Main St", 'Little Rock', '72002', "Arkansas");
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000003, "Cercie Lannister", 5016663666, '4433 Wicked Drive', 'Little Rock', '72002', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000004, "Master Pycelle", 5019985674, '6969 Sexsmith Drive', 'Little Rock', '72002', 'Arkansas');

INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000000, "Jaime Lannister", 3347783438, '3443 Sexsmith Drive', 'Montgomery', '36043', 'Alabama');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000001, "Tyrion Lannister", 3343458765, '9221 Halfman St', 'Montgomery', '36043', 'Alabama');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000002, "Tywin Lannister", 3345539834, '3221 Lemons St', 'Montgomery', '36043', 'Alabama');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000003, "Shae Jor", 4055527843, '642 Perki St', 'Oklahoma City', '73008', 'Oklahoma');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000004, "Sandor Clegane", 2142348745, '1742 Main St', 'Dallas', '75001', 'Texas');

INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000000, "Jon Snow", 5042319203, '5643 Lost Drive', 'Topeka', '66546', 'Kansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000001, "Peter Baelish", 5014422558, '1135 Creek Lake', 'Conway', '72034', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000002, "Varys Bald", 5012255994, '9642, Sneeky St', 'Conway', '72034', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000003, "Lysa Stark", 5015533425, '3312 Robson St', 'Conway', '72034', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000004, "Robert Baratheon", 5015792452, '8201 Swine St', 'Fort Smith', '72901', 'Arkansas');

INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (400000000, "Gregor Clegane", 5018823491, '3326 Trout Lake', 'Fort Smith', '72901', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (400000001, "Rafaat Mir", 5014422557, '4564 Main Mall', 'Hot Spring', '71901', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (400000002, "Theon Grinch", 6012345135, '5211 Cold St', 'Jackson', '39056', 'Mississippi');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (400000003, "Stannis Baratheon", 5012348549, '7632 Dragonwell St', 'Hot Spring', '71901', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (400000004, "Dany Targaryen", 5042383451, '5322 Workman St', 'New Orleans', '70032', 'Louisiana');

INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (500000000, 'Jorah Mormont', 5017783452, '6363 Burrard St', 'Little Rock', '72002', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (500000001, 'Grey Worm', 5017628412, '6930 West Mall', 'Little Rock', '72002', 'Arkansas' );
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (500000002, 'Noble Man', 5013258932, '9205 Argyle Drive', 'Little Rock', '72002', 'Arkansas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (500000003, 'Harry Potter', 2813456789, '5443 Magic St', 'Houston', '77001', 'Texas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (500000004, 'Renly Baratheon', 2143352484, '619 Mysterous Drive', 'Dallas', '75001', 'Texas');

/* */
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000005, 'Bobby Ryan', 2147783452, '6363 Burrard St', 'Dallas', '75001', 'Texas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000006, 'Gabriel Lam', 4057628412, '6930 West Mall', 'Austin', '73301', 'Texas' );
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000007, 'Hodar Sadar', 4053258932, '9205 Argyle Drive', 'Austin', '73301', 'Texas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000008, 'Harry Wong', 2813456789, '5443 Magic St', 'Houston', '77001', 'Texas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (100000009, 'Renly Wu', 2813352484, '619 Mysterous Drive', 'Houston', '77001', 'Texas');

INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000005, 'Dion Phaneuf', 5127783452, '6363 Burrard St', 'Austin', '73301', 'Texas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000006, 'Carey Price', 5047628412, '6930 West Mall', 'New Orleans', '70032', 'Louisiana' );
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000007, 'P.K. Subban', 5043245634, '9205 Argyle Drive', 'New Orleans', '70032', 'Louisiana');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000008, 'Dale Weise', 5043100069, '5443 Magic St', 'New Orleans', '70032', 'Louisiana');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (200000009, 'Henrik Sedin', 9013876484, '619 Mysterous Drive', 'Memphis', '37501', 'Tennessee');

INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000005, 'Megan Wong', 5126423452, '6363 Burrard St', 'Austin', '73301', 'Texas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000006, 'Rachel Adams', 2147645612, '6930 West Mall', 'Dallas', '75001', 'Texas' );
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000007, 'Melissa White', 2143568932, '9205 Argyle Drive', 'Dallas', '75001', 'Texas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000008, 'Melody Brown', 2816466789, '5443 Magic St', 'Houston', '77001', 'Texas');
INSERT INTO Staff(ssn,name,phonenum,address,city,postal_code,state) VALUES (300000009, 'Julie Winters', 2143352484, '619 Mysterous Drive', 'Dallas', '75001', 'Texas');
/* */



INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000000, 'Has severe asthma','Walter White','5012224432','3125 Blackwaters St','Little Rock','72002','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000001, 'Has HIV','Robb Stark','5013324432','6364 Gerald St','Little Rock','72002','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000002, 'No known diseases','Roose Bolton','5016464432','4353 Traitors Drive','Little Rock','72002','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000003, 'No known diseases','Scarlett Johannson','5012624552','124 Main St','Fayetteville','72701','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000004, 'Has breast cancer','Catelyn Tully','5012724432','3179 Blackwaters St','Conway','72034','Arkansas');

INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000005, 'No known diseases','Skyler White','5012224432','3125 Blackwaters St','Little Rock','72002','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000006, 'Heart disease','Tony Stark','5013324432','6364 Gerald St','Little Rock','72002','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000007, 'Has mental illness','Ramsay Bolton','5016464432','4353 Traitors Drive','Little Rock','72002','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000008, 'No known diseases','Max Payne','7782678222','550 Ackoryd Rd.','Fayetteville','72701','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000009, 'Has colon cancer','Richard Tully','5012724432','3179 Blackwaters St','Conway','72034','Arkansas');

INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000010, 'Has cerebral palsy','Flynn White','5012224432','3125 Blackwaters St','Little Rock','72002','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000011, 'No known diseases','Nina Fung','7789222554','111 Lones Way','Fort Smith','72901','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000012, 'No known diseases','Angela King','5016464432','5531 Street & Kingsway','Little Rock','72002','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000013, 'No known diseases','Megan Fox','5012624552','124 Main St','Fayetteville','72701','Arkansas');
INSERT INTO Patient(healthid, healthinfo, name, phonenum ,address, city, postal_code, state) VALUES (00000014, 'No known diseases','Katy Tully','5012724432','3179 Blackwaters St','Conway','72034','Arkansas');
	
	
INSERT INTO Hospital(name,city,address,postal_code,state) VALUES ('University of Arkansas for Medical Science', 'Little Rock', '4301 W Markham St', '72205', 'Arkansas');
INSERT INTO Hospital(name,city,address,postal_code,state) VALUES ('Arkansas Children Hospital', 'Little Rock', '1 Children Way', '72202', 'Arkansas');

-- Hospitals with no rooms
INSERT INTO Hospital(name,city,address,postal_code,state) VALUES ('Baptist Health Medical Center-Little Rock', 'Little Rock', '9601 Baptist Health Dr','72205', 'Arkansas');
INSERT INTO Hospital(name,city,address,postal_code,state) VALUES ('Arkansas Heart Hospital', 'Little Rock', '1701 S Shackleford Rd', '72211', 'Arkansas');
INSERT INTO Hospital(name,city,address,postal_code,state) VALUES ('Arkansas Surgical Hospital', 'Little Rock', '5201 Northshore Dr','72118', 'Arkansas');

INSERT INTO Nurse( ssn) VALUES (100000000);
INSERT INTO Nurse( ssn) VALUES (100000001);
INSERT INTO Nurse( ssn) VALUES (100000002);
INSERT INTO Nurse( ssn) VALUES (100000003);
INSERT INTO Nurse( ssn) VALUES (100000004);
INSERT INTO Nurse( ssn) VALUES (100000005);
INSERT INTO Nurse( ssn) VALUES (100000006);
INSERT INTO Nurse( ssn) VALUES (200000007);
INSERT INTO Nurse( ssn) VALUES (200000008);

INSERT INTO Security( ssn) VALUES (200000000);
INSERT INTO Security( ssn) VALUES (200000001);
INSERT INTO Security( ssn) VALUES (200000002);
INSERT INTO Security( ssn) VALUES (200000003);
INSERT INTO Security( ssn) VALUES (200000004);
INSERT INTO Security( ssn) VALUES (300000000);
INSERT INTO Security( ssn) VALUES (100000007);
INSERT INTO Security( ssn) VALUES (200000009);

INSERT INTO Janitor( ssn) VALUES (200000004);
INSERT INTO Janitor( ssn) VALUES (400000000);
INSERT INTO Janitor( ssn) VALUES (400000001);
INSERT INTO Janitor( ssn) VALUES (400000002);
INSERT INTO Janitor( ssn) VALUES (400000003);
INSERT INTO Janitor( ssn) VALUES (400000004);
INSERT INTO Janitor( ssn) VALUES (100000008);
INSERT INTO Janitor( ssn) VALUES (300000005);

INSERT INTO Receptionist( ssn) VALUES (300000000);
INSERT INTO Receptionist( ssn) VALUES (300000001);
INSERT INTO Receptionist( ssn) VALUES (300000002);
INSERT INTO Receptionist( ssn) VALUES (300000003);
INSERT INTO Receptionist( ssn) VALUES (300000004);
INSERT INTO Receptionist( ssn) VALUES (200000003);
INSERT INTO Receptionist( ssn) VALUES (200000004);
INSERT INTO Receptionist( ssn) VALUES (100000008);
INSERT INTO Receptionist( ssn) VALUES (300000006);

INSERT INTO Room(level,roomnum,name,city) VALUES (1, 100, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 200, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 300, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 400, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 500, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 101, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 201, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 301, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 401, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 501, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 102, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 202, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 302, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 402, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 502, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 103, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 203, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 303, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 403, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 503, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 104, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 204, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 304, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 404, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 504, 'University of Arkansas for Medical Science', 'Little Rock');

INSERT INTO Room(level,roomnum,name,city) VALUES (1, 100, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 200, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 300, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 400, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 500, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 101, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 201, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 301, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 401, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 501, 'Arkansas Children Hospital', 'Little Rock');

INSERT INTO Room(level,roomnum,name,city) VALUES (1, 100, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 200, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 300, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 400, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 500, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (6, 600, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (7, 700, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (8, 800, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 101, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 201, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 301, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (4, 401, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (5, 501, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (6, 601, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (7, 701, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (8, 801, 'Baptist Health Medical Center-Little Rock', 'Little Rock');

INSERT INTO Room(level,roomnum,name,city) VALUES (1, 100, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 101, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 102, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (1, 103, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 200, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 201, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 202, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (2, 203, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 300, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 301, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Room(level,roomnum,name,city) VALUES (3, 302, 'Arkansas Heart Hospital', 'Little Rock');

INSERT INTO Office(level,roomnum,name,city) VALUES (3, 300, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (4, 400, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (5, 500, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (5, 501, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (4, 400, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (2, 200, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (2, 201, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (3, 300, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (3, 301, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (3, 300, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (3, 301, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO Office(level,roomnum,name,city) VALUES (3, 302, 'Arkansas Heart Hospital', 'Little Rock');

INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (1,100,'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (1,101,'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (1,102,'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (1,100,'Arkansas Children Hospital', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (1,101,'Arkansas Children Hospital', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (2,200,'Arkansas Children Hospital', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (2,201,'Arkansas Children Hospital', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (1,100,'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (1,101,'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (1,100,'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO SurgeryRoom(level,roomnum,name,city) VALUES (2,200,'Arkansas Heart Hospital', 'Little Rock');

INSERT INTO WorksAt(ssn, name, city) VALUES (100000000, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (100000001, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (100000002, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000000, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000001, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000002, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000000, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000001, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000002, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (400000000, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (400000001, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (500000000, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (500000001, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (500000004, 'University of Arkansas for Medical Science', 'Little Rock');

INSERT INTO WorksAt(ssn, name, city) VALUES (100000003, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (100000004, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000003, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000004, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000003, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000004, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (400000002, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (400000003, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (400000004, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (500000002, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (500000003, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (500000004, 'Arkansas Children Hospital', 'Little Rock');

INSERT INTO WorksAt(ssn, name, city) VALUES (100000005, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (100000006, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (100000007, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (100000008, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (100000009, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000005, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000006, 'Baptist Health Medical Center-Little Rock', 'Little Rock');

INSERT INTO WorksAt(ssn, name, city) VALUES (200000007, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000008, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (200000009, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000005, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000006, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000007, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000008, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO WorksAt(ssn, name, city) VALUES (300000009, 'Arkansas Heart Hospital', 'Little Rock');

INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (500000000,'Cancer Specialist',300,'University of Arkansas for Medical Science', 3, 'Little Rock');
INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (500000001,'Family',500,'Arkansas Children Hospital', 5, 'Little Rock' );
INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (500000002,'Neurosurgery',400,'Arkansas Children Hospital', 4, 'Little Rock' );
INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (500000003,'Family', 501, 'Arkansas Children Hospital', 5, 'Little Rock' );
INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (500000004,'General Surgery', 400, 'University of Arkansas for Medical Science', 4, 'Little Rock');

INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (100000009,'General Surgery', 200, 'Baptist Health Medical Center-Little Rock', 2, 'Little Rock');
INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (200000005,'Family', 201, 'Baptist Health Medical Center-Little Rock', 2, 'Little Rock');
INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (200000006,'Cardiologist', 300, 'Baptist Health Medical Center-Little Rock', 3, 'Little Rock');

INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (300000007,'Family', 300, 'Arkansas Heart Hospital', 3, 'Little Rock');
INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (300000008,'Family', 301, 'Arkansas Heart Hospital', 3, 'Little Rock');
INSERT INTO Physician(ssn, specialty,office_room,office_name,office_level,office_city) VALUES (300000009,'General Surgery', 302, 'Arkansas Heart Hospital', 3, 'Little Rock');

INSERT INTO Procedures(proid,healthid,ssn,description,date,time) VALUES (00000, 000000000, 500000001, 'Asthma treatment', '2016-12-12', '12:30');
INSERT INTO Procedures(proid,healthid,ssn,description,date,time) VALUES (00001, 000000000, 500000001, 'Asthma treatment', '2016-12-14', '9:30');
INSERT INTO Procedures(proid,healthid,ssn,description,date,time) VALUES (00002, 000000000, 500000003, 'Asthma treatment', '2016-12-17', '15:30');
INSERT INTO Procedures(proid,healthid,ssn,description,date,time) VALUES (00003, 000000001, 500000001, 'Check up', '2017-01-04', '12:15');
INSERT INTO Procedures(proid,healthid,ssn,description,date,time) VALUES (00004, 000000002, 500000003, 'Check up', '2017-01-19', '14:45');
INSERT INTO Procedures(proid,healthid,ssn,description,date,time) VALUES (00005, 000000003, 500000004, 'Biospy', '2016-12-12', '10:45');
INSERT INTO Procedures(proid,healthid,ssn,description,date,time) VALUES (00006, 000000004, 500000000, 'Cancer treatment', '2016-12-19', '12:30');
INSERT INTO Procedures(proid,healthid,ssn,description,date,time) VALUES (00007, 000000004, 500000000, 'Cancer treatment', '2017-01-07', '12:30');

INSERT INTO ProcedureInRoom(proid, level, roomnum, name, city) VALUES(00005, 2, 200, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO ProcedureInRoom(proid, level, roomnum, name, city) VALUES(00000, 5, 500, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO ProcedureInRoom(proid, level, roomnum, name, city) VALUES(00001, 5, 500, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO ProcedureInRoom(proid, level, roomnum, name, city) VALUES(00002, 5, 501, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO ProcedureInRoom(proid, level, roomnum, name, city) VALUES(00003, 5, 500, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO ProcedureInRoom(proid, level, roomnum, name, city) VALUES(00004, 5, 501, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO ProcedureInRoom(proid, level, roomnum, name, city) VALUES(00006, 3, 300, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO ProcedureInRoom(proid, level, roomnum, name, city) VALUES(00007, 3, 300, 'University of Arkansas for Medical Science', 'Little Rock');

INSERT INTO PatientStaysIn(healthid, roomnum, level, name, city) VALUES(00000003, 200, 2, 'University of Arkansas for Medical Science', 'Little Rock');
INSERT INTO PatientStaysIn(healthid, roomnum, level, name, city) VALUES(00000007, 100, 1, 'Arkansas Children Hospital', 'Little Rock');
INSERT INTO PatientStaysIn(healthid, roomnum, level, name, city) VALUES(00000011, 500, 5, 'Baptist Health Medical Center-Little Rock', 'Little Rock');
INSERT INTO PatientStaysIn(healthid, roomnum, level, name, city) VALUES(00000012, 202, 2, 'Arkansas Heart Hospital', 'Little Rock');
INSERT INTO PatientStaysIn(healthid, roomnum, level, name, city) VALUES(00000013, 201, 2, 'Arkansas Heart Hospital', 'Little Rock');
