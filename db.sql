CREATE TABLE Movie_Critic (
ID Integer(10) PRIMARY KEY,
Name VarChar(20)
);
INSERT INTO `Movie_Critic` (`ID`, `Name`) VALUES
(1, 'Jeff'),
(2, 'David'),
(3, 'Jimmy'),
(4, 'Susan'),
(5, 'Sandy');

CREATE TABLE Customer_Representitive_2(
Phone_num Integer(10) PRIMARY KEY,
Name VarChar(20)
);
INSERT INTO `Customer_Representitive_2` (`Phone_num`, `Name`) VALUES
(778244234, 'RunningMan'),
(778462533, 'BigApple'),
(778511032, 'BigApple'),
(778543134, 'BigPen'),
(778942645, 'HappyCat');

CREATE TABLE Customer_Representitive_1(
Staff_ID Integer(10) PRIMARY KEY,
Email VarChar(20),
Phone_num Integer(10),
Unique(Email, Phone_num),
FOREIGN KEY(Phone_num) REFERENCES Customer_Representitive_2 (Phone_num)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Customer_Representitive_1` (`Staff_ID`, `Email`, `Phone_num`) VALUES
(1, '1@gmail.com', 778511032),
(2, '2@gmail.com', 778543134),
(3, '3@gmail.com', 778244234),
(4, '4@gmail.com', 778942645),
(5, '5@gmail.com', 778462533);


CREATE TABLE Movie_2 (
Name VarChar(20),
Type VarChar(15),
Director VarChar(10),
Language VarChar(10),
PRIMARY KEY (Name, Director)
);
INSERT INTO `Movie_2` (`Name`, `Type`, `Director`, `Language`) VALUES
('AWonderfulDay', 'RomanticFilm', 'Bob', 'English'),
('FutureWaterWorld', 'AdventureFilm', 'Micheal', 'English'),
('FutureFireWorld', 'AdventureFilm', 'Micheal', 'English'),
('IronMan', 'ActionFilm', 'Kim', 'English'),
('Léon', 'RomanticFilm', 'David', 'French'),
('ManchesterByTheSea', 'RomanticFilm', 'Jeff', 'English'),
('Monkey\'sComing', 'ComedyFilm', 'Lebron', 'Chinese'),
('MonsterHunter', 'ActionFilm', 'Sam', 'English'),
('RunningMan', 'ComedyFilm', 'Justin', 'Korean'),
('TomAndJerry', 'ComedyFilm', 'Zac', 'Japanese'),
('Victoria\'sDream', 'RomanticFilm', 'Jim', 'French'),

('ABadDay', 'RomanticFilm', 'Bob', 'French'),
('FutureWorld', 'ActionFilm', 'Micheal', 'English'),
('Man', 'ActionFilm', 'Kim', 'English'),
('Léo', 'RomanticFilm', 'David', 'French'),
('TheSea', 'ComedyFilm', 'Jeffre', 'English'),
('Monkey', 'ComedyFilm', 'Leb', 'Chinese'),
('Monster', 'ActionFilm', 'Samii', 'English'),
('RunningWomen', 'RomanticFilm', 'Justin', 'Korean'),
('Tom', 'ComedyFilm', 'Zacob', 'Japanese'),
('Dream', 'AdventureFilm', 'Jim', 'French'),

('DaybyDay', 'RomanticFilm', 'Bob', 'English'),
('WaterWorld', 'AdventureFilm', 'Sam', 'English'),
('IronWoman', 'ActionFilm', 'Kim', 'English'),
('éon', 'RomanticFilm', 'David', 'French'),
('Manchester', 'RomanticFilm', 'Jeff', 'English'),
('Mom\'sComing', 'ComedyFilm', 'Lebron', 'Chinese'),
('Hunter', 'ActionFilm', 'Micheal', 'English'),
('RunningChild', 'ComedyFilm', 'Justin', 'Korean'),
('TomAndJeffery', 'ComedyFilm', 'Zac', 'Japanese'),
('Sophia\'sDream', 'RomanticFilm', 'Jim', 'French');



CREATE TABLE Movie_1 (
ID Integer(10) PRIMARY KEY,
Name VarChar(20),
Year Integer(4),
Director VarChar(10),
FOREIGN KEY(Name, Director) REFERENCES Movie_2 (Name, Director)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Movie_1` (`ID`, `Name`, `Year`, `Director`) VALUES
(1, 'ManchesterByTheSea', 1995, 'Jeff'),
(2, 'Léon', 1992, 'David'),
(3, 'FutureWaterWorld', 2007, 'Micheal'),
(4, 'TomAndJerry', 2017, 'Zac'),
(5, 'MonsterHunter', 2020, 'Sam'),
(6, 'AWonderfulDay', 1998, 'Bob'),
(7, 'RunningMan', 2019, 'Justin'),
(8, 'Victoria\'sDream', 2011, 'Jim'),
(9, 'Monkey\'sComing', 2016, 'Lebron'),
(10, 'IronMan', 2019, 'Kim'),

(11, 'TheSea', 1995, 'Jeffre'),
(12, 'Léo', 2001, 'David'),
(13, 'FutureWorld', 2020, 'Micheal'),
(14, 'Tom', 2010, 'Zacob'),
(15, 'Monster', 2002, 'Samii'),
(16, 'ABadDay', 1935, 'Bob'),
(17, 'RunningWomen', 1988, 'Justin'),
(18, 'Dream', 2001, 'Jim'),
(19, 'Monkey', 2021, 'Leb'),
(20, 'Man', 2005, 'Kim'),

(21, 'Manchester', 1967, 'Jeff'),
(22, 'éon', 2002, 'David'),
(23, 'WaterWorld', 1999, 'Sam'),
(24, 'TomAndJeffery', 2000, 'Zac'),
(25, 'Hunter', 2021, 'Micheal'),
(26, 'DayByDay', 1949, 'Bob'),
(27, 'RunningChild', 2009, 'Justin'),
(28, 'Sophia\'sDream', 2011, 'Jim'),
(29, 'Mom\'sComing', 2016, 'Lebron'),
(30, 'IronWoman', 2008, 'Kim'),
(31, 'FutureFireWorld', 2009, 'Micheal');

CREATE TABLE Profitable_Movie (
ID Integer(10) PRIMARY KEY,
Box_office Integer(10),
FOREIGN KEY(ID) REFERENCES Movie_1 (ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Profitable_Movie` (`ID`, `Box_office`) VALUES
(1, 500000000),
(2, 2000000000),
(3, 300000000),
(4, 200000000),
(5, 300000000),
(16, 150000000),
(17, 270000000),
(18, 561000000),
(19, 278900000),
(20, 500250000),
(21, 500180000),
(22, 204805000),
(23, 301027500),
(24, 200526880),
(25, 300253300),
(26, 500044400),
(27, 200371520),
(28, 300002510),
(29, 571820000),
(30, 745600000);

CREATE TABLE Non_Profitable_Movie (
ID Integer(10) PRIMARY KEY,
Donation Integer(10),
FOREIGN KEY(ID) REFERENCES Movie_1 (ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Non_Profitable_Movie` (`ID`, `Donation`) VALUES
(6, 50000000),
(7, 70000000),
(8, 55000000),
(9, 65000000),
(10, 35000000),
(11, 50000000),
(12, 2000000),
(13, 30000000),
(14, 20000000),
(15, 30000000);



CREATE TABLE Award_Win (
Reward_Name VarChar(20) PRIMARY KEY,
Bonus Integer(10),
MID Integer(10),
Year Integer(4),
FOREIGN KEY (MID) REFERENCES Profitable_Movie (ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Award_Win` (`Reward_Name`, `Bonus`, `MID`, `Year`) VALUES
('BestMovies', 1000000, 3, 2008),
('ChampionMovie', 1500000, 1, 1999),
('GoldenMovie', 2000000, 2, 1993),
('RecommendedMovie', 900000, 4, 2019),
('ValuableMovie', 1200000, 5, 2021);

CREATE TABLE Snacks (
Name VarChar(20) PRIMARY KEY,
Price Integer(2),
Expiration_date Date,
Brand VarChar(15)
);
INSERT INTO `Snacks` (`Name`, `Price`, `Expiration_date`, `Brand`) VALUES
('Coke', 3, '2021-03-11', 'Pepsi'),
('Crisps', 3, '2021-03-12', 'McDonalds'),
('FrenchFries', 4, '2021-03-09', 'McDonalds'),
('IceCreams', 4, '2021-03-15', 'Häagen-Dazs'),
('PopCorn', 5, '2021-03-10', 'NiceDay');

CREATE TABLE Movies_Theatre (
Location VarChar(20), Name VarChar(20),
Rating_Num Integer(3),
PRIMARY KEY(Name, Location)
);
INSERT INTO `Movies_Theatre` (`Location`, `Name`, `Rating_Num`) VALUES
('1032 Champlain St', 'Champlain Theatre', 9),
('1545 Melform Rd', 'Champlain Theatre', 10),
('1211 New York St', 'Ocean Theatre', 9),
('2333 Robinson Rd', 'Ocean Theatre', 10),
('1211 New York St', 'Shelton Theatre', 9),
('1928 Steve St', 'Shelton Theatre', 9);

CREATE TABLE Play_at (
Location VarChar(20),
Name VarChar(20),
MID Integer(10),
PRIMARY KEY(Name, Location, MID),
FOREIGN KEY(Name, Location) REFERENCES Movies_Theatre (Name, Location)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY(MID) REFERENCES Movie_1 (ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Play_at` (`Location`, `Name`, `MID`) VALUES
('1032 Champlain St', 'Champlain Theatre', 2),
('1032 Champlain St', 'Champlain Theatre', 8),
('1545 Melform Rd', 'Champlain Theatre', 4),
('1545 Melform Rd', 'Champlain Theatre', 10),
('1211 New York St', 'Ocean Theatre', 6),
('2333 Robinson Rd', 'Ocean Theatre', 1),
('2333 Robinson Rd', 'Ocean Theatre', 7),
('1211 New York St', 'Shelton Theatre', 5),
('1928 Steve St', 'Shelton Theatre', 3),
('1928 Steve St', 'Shelton Theatre', 9),
('1032 Champlain St', 'Champlain Theatre', 1),
('1928 Steve St', 'Shelton Theatre', 1),
('1545 Melform Rd', 'Champlain Theatre', 1),
('1211 New York St', 'Shelton Theatre', 1),
('1211 New York St', 'Ocean Theatre', 1),
('1032 Champlain St', 'Champlain Theatre', 3),
('2333 Robinson Rd', 'Ocean Theatre', 3),
('1545 Melform Rd', 'Champlain Theatre', 3),
('1211 New York St', 'Shelton Theatre', 3),
('1211 New York St', 'Ocean Theatre', 3),
('2333 Robinson Rd', 'Ocean Theatre', 11),
('1032 Champlain St', 'Champlain Theatre', 11),
('1928 Steve St', 'Shelton Theatre', 11),
('1545 Melform Rd', 'Champlain Theatre', 11),
('1211 New York St', 'Shelton Theatre', 11),
('1211 New York St', 'Ocean Theatre', 11),
('2333 Robinson Rd', 'Ocean Theatre', 15),
('1032 Champlain St', 'Champlain Theatre', 15),
('1928 Steve St', 'Shelton Theatre', 15),
('1545 Melform Rd', 'Champlain Theatre', 15),
('1211 New York St', 'Shelton Theatre', 15),
('1211 New York St', 'Ocean Theatre', 15);


CREATE TABLE Peripheral_Merchandise_Sell_Own (
MID Integer(10),
Product_ID Integer(10),
Price Integer (10),
Location VarChar(20) NOT NULL,
Name VarChar(20) NOT NULL,
PRIMARY KEY(MID, Product_ID),
FOREIGN KEY(MID) REFERENCES Movie_1 (ID)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY(Name, Location) REFERENCES Movies_Theatre (Name, Location)
ON DELETE NO ACTION
ON UPDATE CASCADE
);
INSERT INTO `Peripheral_Merchandise_Sell_Own` (`MID`, `Product_ID`, `Price`, `Location`, `Name`) VALUES
(6, 1, 2, '2333 Robinson Rd', 'Ocean Theatre'),
(7, 3, 80, '1032 Champlain St', 'Champlain Theatre'),
(8, 3, 80, '1928 Steve St', 'Shelton Theatre'),
(9, 4, 150, '1545 Melform Rd', 'Champlain Theatre'),
(10, 5, 400, '1211 New York St', 'Ocean Theatre'),
(11, 7, 8, '1032 Champlain St', 'Champlain Theatre'),
(12, 2, 200, '2333 Robinson Rd', 'Ocean Theatre'),
(13, 6, 150, '1545 Melform Rd', 'Champlain Theatre'),
(14, 5, 16, '1928 Steve St', 'Shelton Theatre'),
(15, 0, 200, '1211 New York St', 'Ocean Theatre');

CREATE TABLE Provide (
SName VarChar(20),
MT_Name VarChar(20),
Location VarChar(20),
PRIMARY KEY(SName, MT_Name, Location),
FOREIGN KEY (SName) REFERENCES Snacks (Name)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY(MT_Name, Location) REFERENCES Movies_Theatre (Name, Location)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Provide` (`SName`, `MT_Name`, `Location`) VALUES
('Coke', 'Champlain Theatre', '1545 Melform Rd'),
('Coke', 'Ocean Theatre', '1211 New York St'),
('Coke', 'Shelton Theatre', '1211 New York St'),
('Crisps', 'Champlain Theatre', '1545 Melform Rd'),
('Crisps', 'Shelton Theatre', '1211 New York St'),
('FrenchFries', 'Champlain Theatre', '1032 Champlain St'),
('FrenchFries', 'Shelton Theatre', '1928 Steve St'),
('IceCreams', 'Ocean Theatre', '1211 New York St'),
('IceCreams', 'Ocean Theatre', '2333 Robinson Rd'),
('PopCorn', 'Champlain Theatre', '1032 Champlain St'),
('PopCorn', 'Ocean Theatre', '2333 Robinson Rd'),
('PopCorn', 'Shelton Theatre', '1928 Steve St');


CREATE TABLE Customer_Help (
ID Integer(10) PRIMARY KEY,
Email VarChar(20) Unique,
Staff_ID Integer(10),
Phone_num Integer(10) Unique,
Name VarChar(20),
FOREIGN KEY(Staff_ID) REFERENCES Customer_Representitive_1 (Staff_ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Customer_Help` (`ID`, `Email`, `Staff_ID`, `Phone_num`, `Name`) VALUES
(1, 'c1@gmail.com', 1, 778456362, 'James'),
(2, 'c2@gmail.com', 2, 778644915, 'Chole'),
(3, 'c3@gmail.com', 3, 778433631, 'Fandy'),
(4, 'c4@gmail.com', 4, 778944561, 'Kevin'),
(5, 'c5@gmail.com', 5, 778634635, 'Delvin'),
(6, 'c6@gmail.com', 5, 778635414, 'Dustin'),
(7, 'c7@gmail.com', 1, 778963514, 'Daniel'),
(8, 'c8@gmail.com', 2, 778123635, 'Jermise'),
(9, 'c9@gmail.com', 3, 778534651, 'Jimmy'),
(10, 'c10@gmail.com', 4, 778887635, 'Chole'),
(11, 'c11@gmail.com', 3, 772384832, 'Gary'),
(12, 'c12@gmail.com', 1, 778832932, 'Wendy'),
(13, 'c13@gmail.com', 5, 828382432, 'Suffee'),
(14, 'c14@gmail.com', 2, 827874432, 'Arai'),
(15, 'c15@gmail.com', 3, 827827232, 'Huky');

CREATE TABLE Evaluates (
Rating Integer(3),
MCID Integer(10),
MID Integer(10),
PRIMARY KEY(MCID,MID),
FOREIGN KEY(MCID) REFERENCES Movie_Critic (ID)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY(MID) REFERENCES Movie_1 (ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);
INSERT INTO `Evaluates` (`Rating`, `MCID`, `MID`) VALUES
(9, 1, 3),
(8, 2, 2),
(9, 3, 1),
(7, 4, 4),
(8, 5, 5);
INSERT INTO `Evaluates` (`Rating`, `MCID`, `MID`) VALUES
(4, 5, 11);


CREATE TABLE Watch (
CID Integer(10),
MID Integer(10),
PRIMARY KEY(CID,MID),
FOREIGN KEY(CID) REFERENCES Customer_Help (ID)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY(MID) REFERENCES Movie_1 (ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);

INSERT INTO `Watch` (`CID`, `MID`) VALUES
(1, 2),
(2, 3),
(3, 1),
(4, 5),
(5, 4);

