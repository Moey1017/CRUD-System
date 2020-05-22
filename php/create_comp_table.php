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
$query = "DROP TABLE IF EXISTS comp";
$statement = $dbConnection->prepare($query);
$statement->execute();



/* Create table */
$query = "CREATE TABLE comp(
	comp_id INT UNSIGNED NOT NULL,
	unit_id INT UNSIGNED NOT NULL,
	PRIMARY KEY(comp_id, unit_id), 
	FOREIGN KEY(comp_id) REFERENCES compositions(comp_id),
	FOREIGN KEY(unit_id) REFERENCES units(unit_id)
	)";
$statement = $dbConnection->prepare($query);
$statement->execute();



/* Provide feedback to the user */
echo "Table 'comp' created.";
?>

</body>
</html>