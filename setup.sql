CREATE DATABASE volleyball;
USE volleyball;

CREATE TABLE teams (
       team_id INT NOT NULL AUTO_INCREMENT,
       team_name VARCHAR(128) NOT NULL,
       team_logo VARCHAR(128),
       PRIMARY KEY (team_id));

CREATE TABLE matches (
       match_id INT NOT NULL AUTO_INCREMENT,
       date_time DATETIME NOT NULL,
       team_1_id INT NOT NULL,
       team_1_score INT NOT NULL,
       team_2_id INT NOT NULL,
       team_2_score INT NOT NULL,
       PRIMARY KEY (match_id),
       FOREIGN KEY (team_1_id) REFERENCES teams(team_id),
       FOREIGN KEY (team_2_id) REFERENCES teams(team_id));

CREATE TABLE players (
       player_id INT NOT NULL AUTO_INCREMENT,
       name_last CHAR(32) NOT NULL,
       name_first CHAR(32),
       gender ENUM('m','f'),
       dob DATE,
       PRIMARY KEY (player_id));

CREATE TABLE match_players (
       match_id INT NOT NULL,
       player_id INT NOT NULL,
       PRIMARY KEY (match_id, player_id),
       FOREIGN KEY (match_id) REFERENCES matches(match_id),
       FOREIGN KEY (player_id) REFERENCES players(player_id));

CREATE TABLE team_players (
       team_id INT NOT NULL,
       player_id INT NOT NULL,
       PRIMARY KEY (team_id, player_id),
       FOREIGN KEY (team_id) REFERENCES teams(team_id),
       FOREIGN KEY (player_id) REFERENCES players(player_id));


