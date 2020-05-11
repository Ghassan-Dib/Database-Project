DROP SCHEMA IF EXISTS `hospital01`;
CREATE SCHEMA `hospital01` ;

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `hospital01`.`patient` (
  `idpatient` INT NOT NULL AUTO_INCREMENT,
  `fName` VARCHAR(45) NOT NULL,
  `lName` VARCHAR(45) NOT NULL,
  `Insurance` VARCHAR(45) NULL,
  `Status` VARCHAR(45) NULL,
  `BloodType` VARCHAR(45) NOT NULL,
  `Gender` VARCHAR(45) NOT NULL,
  `BirthDate` DATE NOT NULL,
  `Address` VARCHAR(45) NULL,
  `ArrivalDate` DATE NOT NULL,
  PRIMARY KEY (`idpatient`));

DROP TABLE IF EXISTS `department`;
CREATE TABLE `hospital01`.`department` (
  `name` VARCHAR(45) NOT NULL,
  `extension` INT NOT NULL,
  `head` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  PRIMARY KEY (`name`));

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `hospital01`.`doctor` (
  `iddoctor` INT NOT NULL AUTO_INCREMENT,
  `dname` VARCHAR(45) DEFAULT NULL,
  `daddress` VARCHAR(45) DEFAULT NULL,
  `demail` VARCHAR(45) DEFAULT NULL,
  `djoiningdate` DATE DEFAULT NULL,
  `dsalary` INT DEFAULT NULL,
  `dbirthbate` DATE DEFAULT NULL,
  `dgender` VARCHAR(45) DEFAULT NULL,
  `drank` INT DEFAULT NULL,
  `dextension` INT DEFAULT NULL,
  `dspeciality` VARCHAR(45) DEFAULT NULL,
   PRIMARY KEY (`iddoctor`));


DROP TABLE IF EXISTS `nurse`;
CREATE TABLE `hospital01`.`nurse` (
  `idnurse` INT NOT NULL AUTO_INCREMENT,
  `nname` VARCHAR(45) NOT NULL,
  `naddress` VARCHAR(45) NULL,
  `nemail` VARCHAR(45) NULL,
  `njoiningdate` DATE NULL,
  `nsalary` INT NULL,
  `nbirthdate` DATE NULL,
  `ngender` VARCHAR(45) NULL,
  `nrank` INT,
PRIMARY KEY (`idnurse`));


DROP TABLE IF EXISTS `room`;
CREATE TABLE `hospital01`.`room` (
  `number` INT NOT NULL,
  `cost` INT NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`number`));


DROP TABLE IF EXISTS `medicine`;
CREATE TABLE `hospital01`.`medicine` (
  `idmedicine` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `cost` VARCHAR(45) NULL,
  PRIMARY KEY (`idmedicine`));


DROP TABLE IF EXISTS `diagnosis`;
CREATE TABLE `hospital01`.`diagnosis` (
  `number` INT NOT NULL,
  `date` DATE NULL,
  `remark` VARCHAR(45) NULL,
  `registration` VARCHAR(45) NULL,
  PRIMARY KEY (`number`));


DROP TABLE IF EXISTS `bill`;
CREATE TABLE `hospital01`.`bill` (
  `patient_id` INT NOT NULL,
  `number` INT NOT NULL,
  `amount` INT NULL,
  PRIMARY KEY (`patient_id`, `number`),
  FOREIGN KEY (`patient_id`) REFERENCES patient(`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `relative`;
CREATE TABLE `hospital01`.`relative` (
  `patient_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `phone` INT NULL,
  `relation` VARCHAR(45) NULL,
  PRIMARY KEY (`patient_id`),
  FOREIGN KEY (`patient_id`) REFERENCES patient(`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `deceased`;
CREATE TABLE `hospital01`.`deceased` (
  `id` INT NOT NULL,
  `deceased` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES patient(`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `details`;
CREATE TABLE `hospital01`.`details` (
  `diagnosis_number` INT NOT NULL,
  `detail` VARCHAR(45) NULL,
  PRIMARY KEY (`diagnosis_number`),
  FOREIGN KEY (`diagnosis_number`) REFERENCES diagnosis(`number`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `has`;
CREATE TABLE `hospital01`.`has` (
  `id` INT NOT NULL,
  `number` INT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES patient(`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `takes`;
CREATE TABLE `hospital01`.`takes` (
  `medicine_id` INT NOT NULL,
  `patient_id` INT NOT NULL,
  `quantity` INT NULL,
  PRIMARY KEY (`medicine_id`, `patient_id`),
  FOREIGN KEY (`medicine_id`) REFERENCES medicine(`idmedicine`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`patient_id`) REFERENCES patient(`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `allocated`;
CREATE TABLE `hospital01`.`allocated` (
  `patient_id` INT NOT NULL,
  `room_number` INT NULL,
  PRIMARY KEY (`patient_id`),
  FOREIGN KEY (`patient_id`) REFERENCES patient(`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`room_number`) REFERENCES room(`number`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `works_in`;
CREATE TABLE `hospital01`.`works_in` (
  `doc_id` INT NOT NULL,
  `dep_name` VARCHAR(45) NULL,
  PRIMARY KEY (`emp_id`),
  FOREIGN KEY (`doc_id`) REFERENCES doctor(`iddoctor`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `assigned`;
CREATE TABLE `hospital01`.`assigned` (
  `patient_id` INT NOT NULL,
  `doc_id` INT NOT NULL,
  PRIMARY KEY (`patient_id`, `doc_id`),
  FOREIGN KEY (`patient_id`) REFERENCES docpatient(`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`doc_id`) REFERENCES doctor(`iddoctor`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `given`;
CREATE TABLE `hospital01`.`given` (
  `patient_id` INT NOT NULL,
  `nurse_id` INT NULL,
  PRIMARY KEY (`patient_id`),
  FOREIGN KEY (`patient_id`) REFERENCES docpatient(`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`nurse_id`) REFERENCES nurse(`idnurse`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `lead`;
CREATE TABLE `hospital01`.`lead` (
  `nurse_id` INT NOT NULL,
  `doc_id` INT NOT NULL,
  PRIMARY KEY (`nurse_id`, `doc_id`),
  FOREIGN KEY (`nurse_id`) REFERENCES nurse(`idnurse`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`doc_id`) REFERENCES doctor(`iddoctor`) ON DELETE CASCADE ON UPDATE CASCADE);
  
  

DROP TABLE IF EXISTS `hospital01`.`clinicalassistant`;
CREATE TABLE `hospital01`.`clinicalassistant`(
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `manager` varchar(45) DEFAULT NULL,
  `salary` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



CREATE  OR REPLACE VIEW `Summary` AS 
(
SELECT r.dname as doctors, d.name as departments from works_in w, department d, doctor r where r.iddoctor = w.emp_id and d.name = w.dep_name
);

CREATE  OR REPLACE VIEW `Summary2` AS 
(
SELECT n.nname as nurses, d.name as departments from works_in w, department d, nurse n where n.idnurse = w.emp_id and d.name = w.dep_name
);

CREATE  OR REPLACE VIEW `Leading` AS 
(
SELECT n.nname as nurses, d.dname as doctors from `lead` l, doctor d, nurse n where n.idnurse = l.nurse_id and d.iddoctor = l.doc_id
);

CREATE  OR REPLACE VIEW `relatives` AS 
(
SELECT p.idpatient, p.fName, p.lName, r.name, r.phone, r.relation from relative r JOIN patient p on p.idpatient = r.patient_id 
);

INSERT INTO `works_in` VALUES
(100, "Cardiology"),
(101, "Radiotherapy"),
(102, "Human Resources"),
(103, "Physiotherapy"),
(106, "Sexual Health"),
(107, "Accident and emergency"),
(108, "Breast Screening");


INSERT INTO `given` VALUES 
(1, 105),
(2, 105),
(3, 106),
(4, 108),
(5, 109);


INSERT INTO `clinicalassistant` VALUES 
(1,'Mohammad Salah', "Dr. Denton", 1200),
(2,'Yasmine Hamdar', "Dr. Denton", 1000),
(3,'Mariam Dib', "Dr. Gazi", 1500),
(4,'Karim Salah', "Dr. Thomas", 600),
(4,'Ghina Atat', "Dr. Jean", 1600),
(5,'Naji Badr', "Dr. Gazi", 1400);

INSERT INTO `allocated` VALUES 
(1, 200),
(2, 100),
(4, 700);

INSERT INTO `assigned` VALUES 
(3, 100),
(5, 101),
(7, 704);

INSERT INTO `deceased` VALUES 
(1, "flu"),
(2, "flu"),
(3, "bone"),
(4, "bone"),
(5, "head"),
(6, "heart"),
(7, "lung"),
(8, "lung"),
(9, "diabetes"),
(10, "diabetes"),
(11, "diabetes"),
(12, "diabetes");
  
INSERT INTO patient VALUES
(1,"Ghassan","Dib", "Yes", "flu", "B+", "M", "2000-01-15", "Beirut, Hamra", "2019-10-2"),
(2,"Nourhan","Berjawi",  "Yes", "flu", "A+", "F", "2001-04-01", "Beirut, Burj", "2019-01-1"),
(3,"Peter","Yamout",  "Yes", "flu", "O", "M", "2001-03-03", "Beirut, Hamra", "2020-04-27"),
(4,"Karim","Barada", "Yes", "flu", "A-", "M", "2001-06-10", "Beirut, Hamra", "2018-12-12"),
(5,"Joseph","Tanios", "Yes","flu",  "B+", "M", "1999-04-12", "Mont Lebanon, Bhamdoun", "2014-11-01"),
(6,"Jamil","Mahmoud", "Yes", "heart", "AB", "M", "1999-11-05", "Beirut, Neehme",  "2020-04-29"),
(7,"Melissa","Tanios", "Yes", "lungs",  "O", "F", "1999-12-01", "Beirut, Dawra",  "2020-04-12"),
(8,"Hsen","Banjak", "Yes", "broken leg",  "A+", "M", "1999-06-23", "Tyre, Chaatiye",  "2012-07-15"),
(9,"Hassan","Mkanna",  "Yes", "asthma",  "B+", "M", "1999-07-01", "Tyre, TerDebba",  "2016-12-08"),
(10,"Khosse","Chalfoun", "Yes", "eye",  "O", "M", "1998-01-23", "Mont Lebanon, Qura",  "2019-06-28"),
(11,"Tia","Alhakim", "Yes",  "flu",  "B+", "F", "2002-01-15", "Beirut, Hamra",  "2020-03-12"),
(12,"Mary","Karaki", "Yes", "stomach", "A+", "F", "1975-11-05", "Beirut, En Mrayse",  "2004-10-22"),
(13,"Bilal","Habeeb","Yes",  "Atherosclerosis",  "B+", "M", "1950-12-15", "Syria, Demascus",  "1998-02-12"),
(14,"Rayan","Mokdad", "Yes", "Cancer", "A+", "F", "2013-12-06", "North, Tripoli",  "2018-12-22"),
(15,"Shady","Elbassuni", "Yes",  "flu",  "B+", "M", "1980-01-15", "Egypt, Cairo",  "2012-05-30");



INSERT INTO doctor VALUES
(100, "DENTON Cooley", "US", "dentoncooley@gmail.com", "1990-02-03", 20000, "1950-04-01", "M", 9, 1243, "CARDIOVASCULAR SURGERY"),
(101, "RUSSELL M. NELSON", "Australia", "russelnelson@gmail.com", "1985-02-17", 25000, "1942-04-01", "M", 10, 6534, "PLASTIC SURGERY"),
(102, "GAZI YASARGIL", "Maghreb", "gaziyasargil@gmail.com", "2000-12-23", 15000, "1970-10-01", "M", 8, 1432, "NEUROSURGERY"),
(103, "THOMAS STARZL", "Russia", "thomasstarzl@gmail.com", "2010-06-18", 40000, "1970-04-01", "M", 10, "7345, TRANSPLANT SURGERY"),
(104, "JEAN-MICHEL DUBERNARD", "Germany", "jeandubernard@gmail.com", "1980-01-15", 60000, "1940-04-01", "F", 10, 8346, "OPHTHALMOLOGY");

-- (110, "Zoulfikar Chmaysene", "Lebanon", "zoulfikarchamysene@gmail.com", "2019-11-01", 6000, "1999-07-31", "Clinical Assistant", "M", 5),
-- (111, "Nada Asssem", "Lebanon", "nadaassem@gmail.com", "2018-11-01", 2000, "1998-07-31", "Patient Service Assistant", "M", Null),
-- (112, "Ali Zein", "Lebanon", "alizein@gmail.com", "2017-11-01", 1000, "1990-07-31", "Porter", "M", Null),
-- (113, "Nour Sidani", "Lebanon", "noursidani@gmail.com", "2020-02-01", 0, "1989-07-31", "Volunteer", "F", Null),
-- (114, "Majdi Baraket", "Lebanon", "Majdi Baraket@gmail.com", "2012-06-01", 6000, "1992-07-31", "Receptionist", "M", Null);


INSERT INTO NURSE VALUES
(105, "Edith Cavell", "Texas", "edithcavell@gmail.com", "2003-07-03", 5000, "1980-11-01", "F", 6),
(106, "Martha Jane Cannary", "Texas", "marthacannary@gmail.com", "2001-05-01", 2000, "2019-01-31","F", 6),
(107, "Margaret Sanger", "Texas", "margaretsanger@gmail.com", "2006-07-01", 9000, "1998-02-28","F", 7),
(108, "Mary Seacole", "Texas", "maryseacole@gmail.com", "2018-12-01", 4000, "2000-10-01", "F", 8),
(109, "Dorothea Dix", "Texas", "dorotheadix@gmail.com", "2020-01-01", 6000, "2000-07-31","F", 5);

INSERT INTO ROOM VALUES
(100, 60, "day"),
(200, 40, "ward"),
(300, 50, "nursery"),
(400, 50, "sickroom"),
(500, 100, "delivery"),
(600, 160, "emergency"),
(700, 200, "Intensive care"),
(800, 120, "high dependency"),
(900, 300, "operating room");

INSERT INTO BILL VALUES
(1, 1, 15),
(2, 2, 6),
(3, 3, 40),
(4, 4, 20),
(5, 5, 23),
(6, 6, 400),
(7, 7, 250),
(8, 8, 60),
(9, 9, 80),
(10, 10, 100),
(11, 11, 40),
(12, 12, 110),
(13, 13, 1000),
(14, 14, 600),
(15, 15, 10);

INSERT INTO DEPARTMENT VALUES
("Admissions", 1212, "Dr. Scott Gottlieb", "Building A"),
("Finance", 1415, "Dr. Robert Grossman", "Building A"),
("General Services", 1617, "Dr. Mark Schuster", "Building A"),
("Accident and emergency", 1313, "Dr. Donald Rucker", "Building B"),
("Anesthetics", 1414, "Dr. Barbara Mcaneny", "Building A"),
("Breast Screening", 1515, "Dr. Stephen Klasko", "Building A"),
("Cardiology", 1213, "Dr. Marc Harrisson", "Building A"),
("Patient Accounts", 4556, "Dr. Kate Goodrich", "Building A"),
("Patient Services", 6778, "Dr. Nancy Agee", "Building A"),
("Pharmacy", 8990, "Dr. Patrick Conway", "Building A"),
("Human Resources", 8521, "Dr. Mitchell Katz", "Building A"),
("Coronary Care Unit (CCU)", 1314, "Dr. Tomislav Mihaljevic", "Building B"),
("Gastroenterology", 1516, "Dr. Rod Hochman", "Building B"),
("Burn Center", 1718, "Dr. Leana Wen", "Building B"),
("Gynecology", 1819, "Dr. Sachin Jain", "Building C"),
("Haematology", 1616, "Dr. Troyen Brennan", "Building C"),
("Neurology", 1717, "Dr. Gary Kaplan", "Building C"),
("Obstetrics/Gynecology", 1818, "Dr. Rhonda Medows", "Building D"),
("Occupational Therapy", 1919, "Dr. Jaewon Ryu", "Building D"),
("Otolaryngology (Ear, Nose, and Throat)", 1223, "Dr. Steven Corwin", "Building D"),
("Physiotherapy", 4332, "Dr. Gianrico Farrugia", "Building E"),
("Radiotherapy", 5321, "Dr. Chryl Pegus", "Building E"),
("Sexual Health", 1479, "Dr. Joanne Conroy", "Building F");


INSERT INTO medicine VALUES
(1, "Acetaminophen", 10),
(2, "Adderall", 13),
(3, "Alprazolam", 15),
(4, "Amitriptyline", 16),
(5, "Amoxicillin", 8),
(6, "Atenolol", 4),
(7, "Bisoprolol", 9),
(8, "Cefalixin", 30),
(9, "Clobetasol", 25),
(10, "Digoxin", 23),
(11, "Doxycyline", 11),
(12, "Fentanyl", 56),
(13, "Folic acid", 34),
(14, "Hydroxocobalamin", 32),
(15, "Indapamide", 65),
(16, "Lactulose", 14),
(17, "Metoclopramide", 87),
(18, "Morphine", 76),
(19, "Pantoprazole", 100),
(20, "Rivaroxaban", 104),
(21, "Sertraline", 90);


INSERT INTO relative VALUES
(1, "Ibrahim", 70065788, "Father"),
(2, "Mariam", 70809010, "Sister"),
(3, "Merry", 03675172, "Mother"),
(4, "Marwan", 71727374, "Brother"),
(5, "Layla", 70472621, "sister"),
(6, "Mona", 07415009, "Mother"),
(7, "Charbel", 01374374, "Father"),
(8, "Mostafa", 71353637, "Brother"),
(9, "Nancy", 70062314, "Sister"),
(10, "Vanessa", 03526987, "Mother"),
(11, "Jonason", 71650427, "husband"),
(12, "Sirene", 70042145, "Wife"),
(13, "Ali", 05152837, "husband"),
(14, "Zainab", 81413243, "Wife"),
(15, "Ghassan", 89647625, "Father");

INSERT INTO diagnosis VALUES
(1, '2020-01-12', "Patient is Very good!", Null);

INSERT INTO details VALUES
(1, "We want to inform that the patient is well!");

INSERT INTO HAS VALUES
(1, 1);

INSERT INTO `lead` VALUES
(105,100),
(106,100),
(107,102),
(108,102),
(109,103);

INSERT INTO takes VALUES
(6, 10, "30g"),
(12, 5, "20g");