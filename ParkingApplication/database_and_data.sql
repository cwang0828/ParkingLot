-- CREATE DATABASE ParkingLots;
--
-- USE ParkingLots

USE cinwan12;


DROP TABLE IF EXISTS SpaceBooking;

DROP TABLE IF EXISTS StaffSpace;

DROP TABLE IF EXISTS Staff;

DROP TABLE IF EXISTS UncoveredSpace;

DROP TABLE IF EXISTS CoveredSpace;

DROP TABLE IF EXISTS ParkingSpace;

DROP TABLE IF EXISTS Lot;



CREATE TABLE Lot (

	lotName VARCHAR(20),

	location VARCHAR(10) NOT NULL,

	capacity INT NOT NULL,

	floors INT NOT NULL,

	PRIMARY KEY (lotName)

);


DROP TABLE IF EXISTS ParkingSpace;

CREATE TABLE ParkingSpace (

	spaceNumber INT NOT NULL,

	spaceType VARCHAR(10) NOT NULL,

	lotName VARCHAR(20),

-- 	monthlyRate DECIMAL(8, 2) DEFAULT 0,


	PRIMARY KEY (spaceNumber),

	FOREIGN KEY (lotName) REFERENCES Lot (lotName),

	CHECK (spaceType IN ('uncovered', 'covered'))
);


CREATE TABLE UncoveredSpace (

 	spaceNumber INT REFERENCES ParkingSpace (spaceNumber),

 	PRIMARY KEY (spaceNumber)
);



CREATE TABLE CoveredSpace (

 	spaceNumber INT(10) REFERENCES ParkingSpace (spaceNumber),

 	monthlyRate DECIMAL(8, 2) DEFAULT 0,

 	PRIMARY KEY (spaceNumber)
 );



CREATE TABLE Staff (

	staffNumber INT,

	`name` VARCHAR(30) NOT NULL,

	telephone_Ext INT NOT NULL UNIQUE,

	vehicleLicenseNumber VARCHAR(7) NOT NULL UNIQUE,

	PRIMARY KEY (staffNumber)

);



CREATE TABLE StaffSpace (

	staffNumber INT REFERENCES Staff (staffNumber),

	spaceNumber INT REFERENCES ParkingSpace (spaceNumber),

	PRIMARY KEY (staffNumber, spaceNumber)



);



CREATE TABLE SpaceBooking (

	bookingId INT UNIQUE,

	spaceNumber INT,

	staffNumber INT,

	visitorLicense VARCHAR(12) NOT NULL,

	dateOfVisit VARCHAR(10) NOT NULL,

	PRIMARY KEY (spaceNumber),

	FOREIGN KEY (staffNumber) REFERENCES Staff (staffNumber)



);


-- ------------------ DATA -------------------
INSERT INTO Lot VALUES
('Kings Landing', 'S', 300, 5),
('Winterfell', 'N', 150, 3),
('Braavos', 'W', 200, 5),

('Myr', 'E', 250, 3);

INSERT INTO ParkingSpace VALUES


(10, 'uncovered', 'Kings Landing'),
(13, 'uncovered', 'Winterfell'),
(15, 'uncovered', 'Braavos'),
(75, 'covered', 'Winterfell'),
(22, 'covered', 'Braavos'),
(27, 'covered', 'Kings Landing'),
(32, 'covered', 'Braavos'),
(54, 'covered', 'Kings Landing'),
(66, 'covered', 'Kings Landing'),
(38, 'covered', 'Braavos'),

(12, 'covered', 'Winterfell'),

(33, 'covered', 'Braavos'),

(41, 'covered', 'Kings Landing'),

(72, 'covered', 'Winterfell'),

(19, 'covered', 'Braavos'),
(37, 'covered', 'Winterfell'),

(34, 'covered', 'Winterfell'),

(55, 'covered', 'Kings Landing'),

(71, 'covered', 'Braavos'),

(60, 'covered', 'Kings Landing'),

(30, 'covered', 'Kings Landing'),

(42, 'covered', 'Braavos'),

(16, 'covered', 'Winterfell'),

(81, 'covered', 'Braavos'),

(56, 'covered', 'Kings Landing'),

(20, 'covered', 'Winterfell'),

(31, 'covered', 'Braavos'),

(39, 'covered', 'Winterfell');
--
--
--
INSERT INTO UncoveredSpace VALUES
(10),
(13),
(15);

INSERT INTO CoveredSpace VALUES
(75, 50),

(22, 30),

(27, 47),

(32, 100),

(54, 80),

(66, 80),

(38, 100),

(12, 50),

(33, 100),

(41, 80),

(72, 50),

(19, 100),

(37, 50),

(34, 50),

(67, 100),

(55, 80),

(71, 100),

(60, 80),

(30, 80),

(42, 100),

(16, 50),

(81, 100),

(56, 80),

(20, 50),

(31, 100),

(39, 50);

INSERT INTO StaffSpace VALUES
(123456, 75),
(234567, 22),
(345678, 27),
(456789, 32);

INSERT INTO Staff VALUES
(123456, 'Jon Snow', 3487, 'sno6378'),
(234567, 'Tyrion Lannister', 3490, 'lan4592'),
(345678, 'Eddard Stark', 3470, 'sta3217'),
(456789, 'Daenarys Targaryen', 3462, 'tar7356'),

(567890, 'Arya Stark', 3412, 'sta2766'),

(678901, 'Sandor Clegane', 3445, 'cle5623'),

(789012, 'Khal Drogo', 3410, 'dro1702');

-- INSERT INTO SpaceBooking (spaceNumber, staffNumber, visitorLicense, dateOfVisit) VALUES
-- (54, 123456, 'wlkerwh18077', '02-25-2017'),
-- (38, 345678, 'wolfgrey6359', '02-26-2017'),
--
-- (71, 456789, 'stormbor6359', '02-27-2017');
