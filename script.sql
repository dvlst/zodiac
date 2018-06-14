DROP DATABASE IF EXISTS zodiac;
CREATE DATABASE IF NOT EXISTS zodiac;
USE zodiac;

CREATE TABLE IF NOT EXISTS users(
	userID INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(50),
    email VARCHAR(50),
    passwd VARCHAR(100),
    PRIMARY KEY(userID));

CREATE TABLE IF NOT EXISTS songs
	(songID INT NOT NULL AUTO_INCREMENT,
    songname VARCHAR(50),
    releaseyear VARCHAR(100),
    songlength VARCHAR(10),
    username VARCHAR(50),
	artist_prename VARCHAR(100),
    artist_surname VARCHAR(100),
    artistname VARCHAR(200),
	albumname VARCHAR(100),
    albumcover VARCHAR(1000),
    PRIMARY KEY(songID));

CREATE TABLE IF NOT EXISTS favorites
	(favoriteID INT NOT NULL AUTO_INCREMENT,
    artistname VARCHAR(100),
    songname VARCHAR(100),
    albumcover VARCHAR(1000),
    username VARCHAR(50),
    PRIMARY KEY(favoriteID));


USE zodiac;
SELECT * FROM songs; 
SELECT * FROM favorites; 
SELECT * FROM users;

INSERT INTO favorites(artistname, songname, albumcover) SELECT artistname, songname, albumcover FROM songs WHERE songID='1';

SELECT * FROM favorites WHERE songname = 'Hallo' AND username = 'david';

DELETE FROM songs WHERE NOT songname = 'Weisser Sand';
DELETE FROM favorites WHERE NOT songname = 'Weisser Sand';


