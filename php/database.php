<?php
declare(strict_types=1);
namespace Pandas;

function db_connect(string $db_name): \mysqli {
    $host = "localhost:3306";
    $ini = parse_ini_file("/var/www/database.ini", TRUE);

    if (! $ini ) {
        die("Failed to load database.ini");
    }

    $user = $ini["credentials"]["username"];
    $pass = $ini["credentials"]["password"];

    if (! $user || ! $pass ) {
        die("Failed to load database credentials.\n");
    }

    $conn = mysqli_connect($host, $user, $pass);
    if (! $conn ) {
        die("Connection failed: " . mysqli_error($conn));
    }

    if (! mysqli_select_db($conn, $db_name) ) {
        die("Failed to select database \"${db_name}\": " . mysqli_error($conn));
    }

    echo "Connection successful.\n";
    return $conn;
}

function db_insert_team(\mysqli $conn, array $team): bool {
    if (! isset($team["team_name"]) ) {
        die("db_insert_team: team_name must not be NULL.\n");
    }

    $query = "INSERT INTO teams(team_name) VALUES ('";
    $query .= mysqli_real_escape_string($conn, $team["team_name"]);
    $query .= "');";

    if ( mysqli_query($conn, $query) ) {
        echo "New team added!\n";
        return TRUE;
    } else {
        echo "Failed to add new team: " . $query . " => " . mysqli_error($conn);
        return FALSE;
    }
}

function db_get_all_teams(\mysqli $conn): \mysqli_result {
    $query = "SELECT * FROM teams;";

    $teams = mysqli_query($conn, $query);
    if (! $teams ) {
        die("db_get_all_teams: " . mysqli_error($conn) . "\n");
    }

    return $teams;
}
