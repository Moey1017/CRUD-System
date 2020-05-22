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
$name = ltrim(rtrim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));
if (empty($name))
{
    header("location: insert_unit.php"); // deal with invalid input
    exit();
}

$unit_tier  = ltrim(rtrim(filter_input(INPUT_POST, "unit_tier", FILTER_SANITIZE_STRING)));
if (empty($unit_tier))
{
    header("location: insert_unit.php"); // deal with invalid input
    exit();
}

$image = ltrim(rtrim(filter_input(INPUT_POST, "image", FILTER_SANITIZE_STRING)));
if ((empty($image)) || (!filter_var($image, FILTER_SANITIZE_STRING)))
{
    header("location: insert_unit.php"); // deal with invalid input
    exit();
}

$cost  = ltrim(rtrim(filter_input(INPUT_POST, "cost", FILTER_SANITIZE_NUMBER_INT)));
if ((empty($cost)) || (!filter_var($cost, FILTER_VALIDATE_INT))) // deal with invalid input
{
    header("location: insert_unit.php");
    exit();
}

$hp  = ltrim(rtrim(filter_input(INPUT_POST, "hp", FILTER_SANITIZE_STRING)));
if (empty($hp))
{
    header("location: insert_unit.php"); // deal with invalid input
    exit();
}

$mana  = ltrim(rtrim(filter_input(INPUT_POST, "mana", FILTER_SANITIZE_NUMBER_INT)));
if ((empty($mana)) || (!filter_var($mana, FILTER_VALIDATE_INT))) // deal with invalid input
{
    header("location: insert_unit.php");
    exit();
}

$armor  = ltrim(rtrim(filter_input(INPUT_POST, "armor", FILTER_SANITIZE_NUMBER_INT)));
if ((empty($armor)) || (!filter_var($armor, FILTER_VALIDATE_INT))) // deal with invalid input
{
    header("location: insert_unit.php");
    exit();
}

$magic_resist  = ltrim(rtrim(filter_input(INPUT_POST, "magic_resist", FILTER_SANITIZE_NUMBER_INT)));
if ((empty($magic_resist)) || (!filter_var($magic_resist, FILTER_VALIDATE_INT))) // deal with invalid input
{
    header("location: insert_unit.php");
    exit();
}

$damage  = ltrim(rtrim(filter_input(INPUT_POST, "damage", FILTER_SANITIZE_STRING)));
if (empty($damage))
{
    header("location: insert_unit.php"); // deal with invalid input
    exit();
}

$ability  = ltrim(rtrim(filter_input(INPUT_POST, "ability", FILTER_SANITIZE_STRING)));
if (empty($ability))
{
    header("location: insert_unit.php"); // deal with invalid input
    exit();
}

$ability_des  = ltrim(rtrim(filter_input(INPUT_POST, "ability_des", FILTER_SANITIZE_STRING)));
if (empty($ability_des))
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
$query = "INSERT INTO units (name, unit_tier, image, cost, hp, mana, armor, magic_resist, damage, ability, ability_des) VALUES(:name, :unit_tier, :image, :cost, :hp, :mana, :armor, :magic_resist, :damage, :ability, :ability_des)";
$statement = $dbConnection->prepare($query);
$statement->bindParam(":name", $name, PDO::PARAM_STR);
$statement->bindParam(":unit_tier", $unit_tier, PDO::PARAM_STR);
$statement->bindParam(":image", $image, PDO::PARAM_STR);
$statement->bindParam(":cost", $cost, PDO::PARAM_INT);
$statement->bindParam(":hp", $hp, PDO::PARAM_STR);
$statement->bindParam(":mana", $mana, PDO::PARAM_INT);
$statement->bindParam(":armor", $armor, PDO::PARAM_INT);
$statement->bindParam(":magic_resist", $magic_resist, PDO::PARAM_INT);
$statement->bindParam(":damage", $damage, PDO::PARAM_STR);
$statement->bindParam(":ability", $ability, PDO::PARAM_STR);
$statement->bindParam(":ability_des", $ability_des, PDO::PARAM_STR);
$statement->execute();



/* Provide feedback that the record has been added */
if ($statement->rowCount() > 0)
{
    echo "<p>Record successfully added to database.</p>";
}
else
{
    echo "<p>Record not added to database.</p>";
}



/* Provide a link for the user to proceed to a new webpage or automatically redirect to a new webpage */
echo "<a href=" . $siteName . "/insert_unit.php>Click here to add another record</>";
?>

</body>
</html>