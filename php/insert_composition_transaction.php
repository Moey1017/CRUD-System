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
$comp_name = ltrim(rtrim(filter_input(INPUT_POST, "comp_name", FILTER_SANITIZE_STRING)));
if (empty($comp_name))
{
    header("location: insert_unit.php"); // deal with invalid input
    exit();
}

$comp_tier  = ltrim(rtrim(filter_input(INPUT_POST, "comp_tier", FILTER_SANITIZE_STRING)));
if (empty($comp_tier))
{
    header("location: insert_unit.php"); // deal with invalid input
    exit();
}

/* Include "configuration.php" file */
require_once "configuration.php";



/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception



/* Perform Query */
$query = "INSERT INTO compositions (comp_name, comp_tier) VALUES(:comp_name, :comp_tier)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":comp_name", $comp_name, PDO::PARAM_STR);
$statement->bindParam(":comp_tier", $comp_tier, PDO::PARAM_STR);
$statement->execute();



/* Provide a link for the user to proceed to a new webpage or automatically redirect to a new webpage */
header("Location:" . $siteName . "/team_compositions.php");
?>

</body>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

