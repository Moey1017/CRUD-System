<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Create Database Table Example</title>
</head>
<body>

<?php
/* Include "configuration.php" file */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception



/* If the table already exists, then delete it */
$query = "DROP TABLE IF EXISTS units";
$statement = $dbConnection->prepare($query);
$statement->execute();



/* Create table */
$query = "CREATE TABLE units(
	unit_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
	name VARCHAR(30) NOT NULL,
	unit_tier VARCHAR(2) NOT NULL,
	image VARCHAR(300) NOT NULL,
	cost INT UNSIGNED NOT NULL,
	hp VARCHAR(30) NOT NULL,
	mana INT UNSIGNED NOT NULL,
	armor INT UNSIGNED NOT NULL,
	magic_resist INT UNSIGNED NOT NULL,
	damage VARCHAR(30) NOT NULL,
	ability VARCHAR(100) NOT NULL,
        ability_des VARCHAR(100000) NOT NULL)";
$statement = $dbConnection->prepare($query);
$statement->execute();



/* Provide feedback to the user */
echo "Table 'units' created.";
?>

</body>
</html>