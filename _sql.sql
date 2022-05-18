START TRANSACTION;

-- zmazanie databazy ak existuje
DROP DATABASE IF EXISTS sport;

-- vytvorenie databazy
CREATE DATABASE sport;

-- prepnutie sa do databazy
USE sport;

-- vytvorenie tabulky
CREATE TABLE `player` (
	`id` int(6) NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL,
	`surname` varchar(30) NOT NULL,
	`age` int(6) NOT NULL,
	`nick` varchar(30),
	`gender` ENUM('M', 'F'),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4;

-- vytvorenie tabulky
CREATE TABLE `team` (
	`id` int(6) NOT NULL AUTO_INCREMENT,
	`name` varchar(30) NOT NULL,
	`abbreviation` varchar(6) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4;

-- vytvorenie spojovacej tabulky
CREATE TABLE `player_team` (
	`playerID` int(6) NOT NULL,
	`teamID` int(6) NOT NULL,
	`start_time` int(6) NOT NULL,
	`end_time` int(6),
	FOREIGN KEY (playerID) REFERENCES player (id),
	FOREIGN KEY (teamID) REFERENCES team (id),
	PRIMARY KEY (`playerID`, `teamID`)
) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8mb4;

INSERT INTO
	player (id, name, surname, age, gender)
VALUES
	-- BOS
	(1, 'Connor', 'McDavid', 25, 'M'),
	(2, 'Sidney', 'Crosby', 25, 'M'),
	(3, 'Marian', 'Hossa', 30, 'M'),
	-- ANA
	(4, 'Evgeni', 'Malkin', 30, 'M'),
	(5, 'Sean', 'Couturier', 30, 'M'),
	(6, 'Steven', 'Stamkos', 30, 'M'),
	-- BUF
	(7, 'Vladimir', 'Tarasenko', 30, 'M'),
	(8, 'Erik', 'Karlsson', 30, 'M'),
	(9, 'John', 'Tavares', 30, 'M');

INSERT INTO
	team (id, name, abbreviation)
VALUES
	(1, 'Boston Bruins', 'BOS'),
	(2, 'Anaheim (Mighty) Ducks', 'ANA'),
	(3, 'Buffalo Sabres', 'BUF'),
	(4, 'Arizona Coyotes', 'ARI');

INSERT INTO
	player_team (`playerID`, `teamID`, `start_time`, `end_time`)
VALUES
	-- BOS
	(1, 1, 1, 10),
	(2, 1, 1, 10),
	(3, 1, 1, NULL),
	-- ANA
	(4, 2, 1, NULL),
	(5, 2, 1, NULL),
	(6, 2, 1, 10),
	-- BUF
	(7, 3, 1, NULL),
	(8, 3, 1, NULL),
	(9, 3, 1, 10),
	(4, 3, 1, 10),
	(5, 3, 1, 10);

-- ARI -- v arizone momenatlne nehraju ziadni hraci
SELECT
	*
FROM
	player;

SELECT
	*
FROM
	team;

-- SELECT V1
-- ktory stlpec chcem vybrat (<tabulka>.<stlpec>)
SELECT
	player.name,
	player.surname,
	team.name,
	team.abbreviation -- z ktorej tabulky chcem vyberat
FROM
	player -- z ktorej dalsej tabulky chcem vyberat (ako keby dalsia tabulka kt ide za FROM)
	JOIN player_team -- podmienka ktora musi platit pri prepojeni (FK ukazuje na PK)
	ON player.id = player_team.playerID -- z ktorej dalsej tabulky chcem vyberat (ako keby dalsia tabulka kt ide za FROM)
	JOIN team -- podmienka ktora musi platit pri prepojeni (FK ukazuje na PK)
	ON team.id = player_team.teamID;

-- JOIN mozem pouzit len so SELECTOM
-- poradie v JOIN v tomto pripade nehra ulohu
-- prapajam cez spojovaciu tabulku lebo player a team nemaju priame spojenie
-- SELECT V2
SELECT
	player.name,
	player.surname,
	team.name,
	team.abbreviation
FROM
	player
	JOIN player_team ON player.id = player_team.playerID
	JOIN team ON team.id = player_team.teamID
WHERE
	player_team.end_time IS NULL;

-- DELETE
-- odkomentuj a vyskusaj !!!
-- nasledujuci prikaz vymaze hraca z tabulky player
-- vzdy pri mazani sa riadim podla IDcka
-- prikaz doslovne hovori: vymaz hraca z tabulky player tam kde sa id hraca rovna 1
--
-- DELETE FROM
-- 	`player`
-- WHERE
-- 	id = 1;
--
--
-- ak existuje zaznam v prepojovacej tabulke (player_team) ktory ukazuje na hraca (alebo na team) tak vyssie spomenuty prikaz nebude fungovat
-- nebude fungovat pretoze ak by sme vymazali hraca z tabulky player tak prepojovacia tabulka by ukazovala na neexistujuci zaznam
-- rovnako to plati aj pre team
-- preto treba zmazat najprv zaznam z prepojovacej tabulky a az potom z tabulky player (resp team)
--
-- 	`player_team`
-- WHERE
-- 	playerID = 1;
--
--
-- UPDATE
-- odkomentuj a vyskusaj !!!
-- nasledujuci prikaz zmeni vek, meno a priezvisko hracovi s danym IDckom
--
-- UPDATE
-- 	player
-- SET
-- 	age = 60,
-- 	`name` = "jaromir",
-- 	surname = "jagr"
-- WHERE
-- 	id = 2;
--
COMMIT;
