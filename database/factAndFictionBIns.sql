-- load states
INSERT INTO factandfictionB.states(state_id, state_name)
VALUES ('AK', 'Alaska'),
  ('AL', 'Alabama'),
  ('AR', 'Arkansas'),
  ('AZ', 'Arizona'),
  ('CA', 'California'),
  ('CO', 'Colorado'),
  ('CT', 'Connecticut'),
  ('DC', 'Washington, DC'),
  ('DE', 'Delaware'),
  ('FL', 'Florida'),
  ('GA', 'Georgia'),
  ('HI', 'Hawaii'),
  ('IA', 'Iowa'),
  ('ID', 'Idaho'),
  ('IL', 'Illinois'),
  ('IN', 'Indiana'),
  ('KS', 'Kansas'),
  ('KY', 'Kentucky'),
  ('LA', 'Louisiana'),
  ('MA', 'Massachusetts'),
  ('MD', 'Maryland'),
  ('ME', 'Maine'),
  ('MI', 'Michigan'),
  ('MN', 'Minnesota'),
  ('MO', 'Missouri'),
  ('MS', 'Mississippi'),
  ('MT', 'Montana'),
  ('NC', 'North Carolina'),
  ('ND', 'North Dakota'),
  ('NE', 'Nebraska'),
  ('NH', 'New Hampshire'),
  ('NJ', 'New Jersey'),
  ('NM', 'New Mexico'),
  ('NV', 'Nevada'),
  ('NY', 'New York'),
  ('OH', 'Ohio'),
  ('OK', 'Oklahoma'),
  ('OR', 'Oregon'),
  ('PA', 'Pennsylvania'),
  ('RI', 'Rhode Island'),
  ('SC', 'South Carolina'),
  ('SD', 'South Dakota'),
  ('TN', 'Tennessee'),
  ('TX', 'Texas'),
  ('UT', 'Utah'),
  ('VA', 'Virginia'),
  ('VT', 'Vermont'),
  ('WA', 'Washington'),
  ('WI', 'Wisconsin'),
  ('WV', 'West Virginia'),
  ('WY', 'Wyoming');

-- load authors
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
('213-46-8915', 'Green', 'Marjorie', '415 986-7020', '309 63rd St. #411', 'Oakland', 'CA', '94618');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('238-95-7766', 'Carson', 'Cheryl', '415 548-7723', '589 Darwin Ln.', 'Berkeley', 'CA', '94703');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('267-41-2394', 'O''Leary', 'Michael', '408 286-2428', '22 Cleveland Av. #14', 'San Jose', 'CA', '95128');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('274-80-9391', 'Straight', 'Dean', '415 834-2919', '5420 College Av.', 'Oakland', 'CA', '94618');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('341-22-1782', 'Smith', 'Meander', '913 843-0462', '10 Mississippi Dr.', 'Lawrence', 'KS', '66044');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('409-56-7008', 'Bennet', 'Abraham', '415 658-9932', '6223 Bateman St.', 'Berkeley', 'CA', '94703');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('427-17-2319', 'Dull', 'Ann', '415 836-7128', '3410 Blonde St.', 'Palo Alto', 'CA', '94301');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('472-27-2349', 'Gringlesby', 'Burt', '707 938-6445', 'PO Box 792', 'Covelo', 'CA', '94528');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('486-29-1786', 'Locksley', 'Charlene', '415 585-4620', '18 Broadway Av.', 'San Francisco', 'CA', '94111');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('527-72-3246', 'Greene', 'Morningstar', '615 297-2723', '22 Graybar House Rd.', 'Nashville', 'TN', '37243');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('648-92-1872', 'Blotchet-Halls', 'Reginald', '503 745-6402', '55 Hillsdale Bl.', 'Corvallis', 'OR', '97730');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('672-71-3249', 'Yokomoto', 'Akiko', '415 935-4228', '3 Silver Ct.', 'Walnut Creek', 'CA', '94596');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('712-45-1867', 'del Castillo', 'Innes', '615 996-8275', '2286 Cram Pl. #86', 'Ann Arbor', 'MI', '48105');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('722-51-5454', 'DeFrance', 'Michel', '219 547-9982', '3 Balding Pl.', 'Gary', 'IN', '46402');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('724-08-9931', 'Stringer', 'Dirk', '415 843-2991', '5420 Telegraph Av.', 'Oakland', 'CA', '94609');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('724-80-9391', 'MacFeather', 'Stearns', '415 354-7128', '44 Upland Hts.', 'Oakland', 'CA', '94608');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('756-30-7391', 'Karsen', 'Livia', '415 534-9219', '5720 McAuley St.', 'Oakland', 'CA', '94607');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('807-91-6654', 'Panteley', 'Sylvia', '301 946-8853', '1956 Arlington Pl.', 'Rockville', 'MD', '20850');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('846-92-7186', 'Hunter', 'Sheryl', '415 836-7128', '3410 Blonde St.', 'Palo Alto', 'CA', '94301');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('893-72-1158', 'McBadden', 'Heather', '707 448-4982', '301 Putnam', 'Vacaville', 'CA', '95688');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('899-46-2035', 'Ringer', 'Anne', '801 826-0752', '67 Seventh Av.', 'Salt Lake City', 'UT', '84111');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('172-32-1176', 'White', 'Johnson', '408 496-7223', '10932 Bigge Rd.', 'Menlo Park', 'CA', '94025');
INSERT INTO factandfictionB.authors(au_id, au_lname, au_fname, phone, address, city, state_id, zip) VALUES 
  ('998-72-3567', 'Ringer', 'Albert', '801 826-0752', '67 Seventh Av.', 'Salt Lake City', 'UT', '84102');

-- load publishers
INSERT INTO factandfictionB.publishers(pub_id, pub_name, city, state_id, country) VALUES 
  ('0736', 'New Moon Books', 'Boston', 'MA', 'USA');
INSERT INTO factandfictionB.publishers(pub_id, pub_name, city, state_id, country) VALUES 
  ('0877', 'Binnet & Hardley', 'Washington', 'DC', 'USA');
INSERT INTO factandfictionB.publishers(pub_id, pub_name, city, state_id, country) VALUES 
  ('1389', 'Algodata Infosystems', 'Berkeley', 'CA', 'USA');
INSERT INTO factandfictionB.publishers(pub_id, pub_name, city, state_id, country) VALUES 
  ('1622', 'Five Lakes Publishing', 'Chicago', 'IL', 'USA');
INSERT INTO factandfictionB.publishers(pub_id, pub_name, city, state_id, country) VALUES 
  ('1756', 'Ramona Publishers', 'Dallas', 'TX', 'USA');
INSERT INTO factandfictionB.publishers(pub_id, pub_name, city, state_id, country) VALUES 
  ('9901', 'GGG&G', 'Muenchen', 'ND', 'Germany');
INSERT INTO factandfictionB.publishers(pub_id, pub_name, city, state_id, country) VALUES 
  ('9952', 'Scootney Books', 'New York', 'NY', 'USA');
INSERT INTO factandfictionB.publishers(pub_id, pub_name, city, state_id, country) VALUES 
  ('9999', 'Lucerne Publishing', 'Paris', 'TX', 'France');

-- load titles
INSERT INTO factandfictionB.titles(title_id, title, pub_id, au_id, price, notes, pubdate)
VALUES ('BU1032', 'The Busy Executive''s Database Guide', '1389', '409-56-7008', 19.99, 'An overview of available database systems with emphasis on common business applications. Illustrated.', '1999-06-12 00:00:00'),
  ('BU1111', 'Cooking with Computers: Surreptitious Balance Sheets', '1389', '724-80-9391', 11.95, 'Helpful hints on how to use your electronic resources to the best advantage.', '2000-06-09 00:00:00'),
  ('BU2075', 'You Can Combat Computer Stress!', '0736', '213-46-8915', 2.99, 'The latest medical and psychological techniques for living with the electronic office. Easy-to-understand explanations.', '2003-01-05 00:00:00'),
  ('BU7832', 'Straight Talk About Computers', '1389', '238-95-7766', 19.99, 'Annotated analysis of what computers can do for you: a no-hype guide for the critical user.', '2002-06-22 00:00:00'),
  ('MC2222', 'Silicon Valley Gastronomic Treats', '0877', '712-45-1867', 19.99, 'Favorite recipes for quick, easy, and elegant meals.', '2003-01-09 00:00:00'),
  ('MC3021', 'The Gourmet Microwave', '0877', '899-46-2035', 2.99, 'Traditional French gourmet recipes adapted for modern microwave cooking.', '1997-06-18 00:00:00'),
  ('PC1035', 'But Is It User Friendly?', '1389', '238-95-7766', 22.95, 'A survey of software for the naive user, focusing on the ''friendliness'' of each.', '1998-06-30 00:00:00'),
  ('PC8888', 'Secrets of Silicon Valley', '1389', '846-92-7186', 20.00, 'Muckraking reporting on the world''s largest computer hardware and software manufacturers.', '2003-01-12 00:00:00'),
  ('PC9999', 'Net Etiquette', '1389', '486-29-1786', 19.95, 'A must-read for computer conferencing.', '2000-08-06 00:00:00'),
  ('PS1372', 'Computer Phobic AND Non-Phobic Individuals: Behavior Variations', '0877', '756-30-7391', 21.59, 'A must for the specialist, this book examines the difference between those who hate and fear computers and those who don''t.', '2003-01-01 00:00:00'),
  ('PS2091', 'Is Anger the Enemy?', '0736', '998-72-3567', 10.95, 'Carefully researched study of the effects of strong emotions on the body. Metabolic charts included.', '2002-06-15 00:00:00'),
  ('PS2106', 'Life Without Fear', '9952', '998-72-3567', 7.00, 'New exercise, meditation, and nutritional techniques that can reduce the shock of daily interactions. Popular audience. Sample menus included, exercise video available separately.', '2002-10-05 00:00:00'),
  ('PS3333', 'Prolonged Data Deprivation: Four Case Studies', '9952', '172-32-1176', 19.99, 'What happens when the data runs dry?  Searching evaluations of information-shortage effects.', '2001-06-12 00:00:00'),
  ('PS7777', 'Emotional Security: A New Algorithm', '0736', '486-29-1786', 7.99, 'Protecting yourself and your loved ones from undue emotional stress in the modern world. Use of computer and nutritional aids emphasized.', '1998-06-12 00:00:00'),
  ('TC3218', 'Onions, Leeks, and Garlic: Cooking Secrets of the Mediterranean', '0877', '807-91-6654', 20.95, 'Profusely illustrated in color, this makes a wonderful gift book for a cuisine-oriented friend.', '1997-10-21 00:00:00'),
  ('TC4203', 'Fifty Years in Buckingham Palace Kitchens', '0877', '648-92-1872', 11.95, 'More anecdotes from the Queen''s favorite cook describing life among English royalty. Recipes, techniques, tender vignettes.', '1998-06-12 00:00:00'),
  ('TC7777', 'Sushi, Anyone?', '0877', '672-71-3249', 14.99, 'Detailed instructions on how to make authentic Japanese sushi in your spare time.', '1999-06-12 00:00:00');

-- load customer
INSERT INTO factandfictionB.customer( userName, password, firstName, lastName)
VALUES ( 'hkari05', '$1$Yrb3wbZ/$tbZXV4lYGZd2Oiv3ZJS7B0', 'Harold', 'Carry'),
( 'annieb', '$1$tuktkKsr$5uVTiZjdN.afDFLbLRpqU/', 'Ann', 'Field'),
( 'briang', '$1$CvlRiFvV$sOcCBO7O3L/mNZP8wh4ml.', 'Brian', 'Potts'),
( 'rayfir', '$1$ll1RK.z5$Y7llTsWy5yW.UC6lCJh.E.', 'Raymond', 'Firweld'),
 ( 'carlos', '$1$wD5QEkU4$sABnbxU3xAfAJvut8VEmi/', 'Carlos', 'Lossi'),
( 'bmappli', '$1$fVn5pwr4$UowvOcjvJjr3Z0ev19h70.', 'Berni', 'Mappli'),
( 'chamtus', '$1$.ESE8ch4$aGYkGEa.Y94MldFEBLEix/', 'Chamtus', 'Safapour'),
( 'awasonce', '$1$n.exIerv$MTUbJz3PAS.weCFcia5GX/', 'Arthur', 'Winfield');
-- password pwd456#987 encrypted to $1$Yrb3wbZ/$tbZXV4lYGZd2Oiv3ZJS7B0 password not encrypted for hkari05 
-- password abf321#999 encrypted to $1$tuktkKsr$5uVTiZjdN.afDFLbLRpqU/ password not encrypted for annieb 
-- password ret637884#72 encrypted to $1$CvlRiFvV$sOcCBO7O3L/mNZP8wh4ml. password not encrypted for briang 
-- password asd765$ww32# encrypted to $1$ll1RK.z5$Y7llTsWy5yW.UC6lCJh.E. password not encrypted for rayfir 
-- password oier2315##7654 encrypted to $1$wD5QEkU4$sABnbxU3xAfAJvut8VEmi/ password not encrypted for carlos 
-- password a77559#7895 encrypted to $1$fVn5pwr4$UowvOcjvJjr3Z0ev19h70. password not encrypted for bmappli 
-- password c7653&79679 encrypted to $1$.ESE8ch4$aGYkGEa.Y94MldFEBLEix/ password not encrypted for chamtus 
-- password 7685drth8899 encrypted to $1$n.exIerv$MTUbJz3PAS.weCFcia5GX/ password not encrypted for awasonce

-- load address type
INSERT INTO factandfictionB.addressType (at_addresstype, at_description)
values ('m', 'Mailing Address'), ('s', 'Billing Address'), ('b', 'Both');

-- load customer addresses
INSERT INTO factandfictionB.custAddress( c_id, ca_streetaddress, ca_city, ca_state_id, ca_zip, ca_email, ca_phone)
VALUES ( 1, '123 Any St.', 'Any City', 'CA', '99966', 'hkari05@gmail.com', '818-555-1212'),
( 2, '16055 Tulsa St.', 'Granada Hills', 'CA', '91321', 'annib@gmail.com', '818-555-9992'),
( 3, '20741 Chase St.', 'Canoga Park', 'CA', '91311', 'bringiton@netzero.com', '818-555-1212'),
(4, '17481 Chatsworth St.', 'Granada Hills', 'CA', '91322', 'rfirwood@hotmail.com', '818-566-9792'),
 ( 5, '14639 Novice St.', 'Panarama City', 'CA', '91011', 'clossi@gmail.com', '818-375-4312'),
( 6, '16452 Index St.', 'Granada Hills', 'CA', '91322', 'bmaplib@gmail.com', '818-892-9725'),
( 7, '19612 Atwater Ave', 'Northridge', 'CA', '91324', 'chamsaf@netzero.com', '818-832-6325'),
( 8, '8307 Owens St.', 'Sunland', 'CA', '91361', 'aswood@hotmail.com', '626-766-7929');

-- preload titles with 50 books each
UPDATE factandfictionB.titles set quantityOnHand = 50;
