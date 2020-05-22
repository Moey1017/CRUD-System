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
$comp_id = ltrim(rtrim(filter_input(INPUT_POST, "comp_id", FILTER_SANITIZE_NUMBER_INT)));


$unit_id  = ltrim(rtrim(filter_input(INPUT_POST, "unit_id", FILTER_SANITIZE_NUMBER_INT)));

/* Include "configuration.php" file */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception



/* Perform Query */
$query = "INSERT INTO comp (comp_id, unit_id) VALUES(:comp_id, :unit_id)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":comp_id", $comp_id, PDO::PARAM_INT);
$statement->bindParam(":unit_id", $unit_id, PDO::PARAM_INT);
$statement->execute();


header("Location:" . $siteName . "/team_compositions.php");
?>

</body>
</html>

