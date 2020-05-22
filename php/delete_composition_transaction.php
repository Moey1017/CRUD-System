<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Insert Example</title>
</head>
<body>

<?php
/* Validate and assign input data */
$comp_id = filter_input(INPUT_GET, "comp_id", FILTER_SANITIZE_NUMBER_INT);




/* Include "configuration.php" file */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception



/* Perform query */
$query = "DELETE FROM comp WHERE comp_id = :comp_id";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":comp_id", $comp_id, PDO::PARAM_INT);
$statement->execute();

$query = "DELETE FROM compositions WHERE comp_id = :comp_id;";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":comp_id", $comp_id, PDO::PARAM_INT);
$statement->execute();

header("Location:" . $siteName . "/team_compositions.php");
?>        
</body>
</html>
