<?php

/* Validate and assign input data */
$comp_id = filter_input(INPUT_GET, "comp_id", FILTER_SANITIZE_NUMBER_INT);



/* Include "configuration.php" file */
require_once "configuration.php";


/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception


$query = "SELECT unit_id, name, unit_tier, image, cost, hp, mana, armor, magic_resist, damage, ability, ability_des from units WHERE unit_id NOT IN (SELECT unit_id FROM comp where comp_id = :comp_id);";
$statement = $dbConnection->prepare($query);

$statement->bindParam(":comp_id", $comp_id, PDO::PARAM_INT);

$statement->execute();




/* Manipulate the query result */
$json = "[";
if ($statement->rowCount() > 0) {
    /* Get field information for all fields */
    $isFirstRecord = true;
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $row) {
        if (!$isFirstRecord) {
            $json .= ",";
        }

        /* NOTE: json strings MUST have double quotes around the attribute names, as shown below */
        $json .= '{"unit_id":"' . $row->unit_id . '","name":"' . $row->name . '","unit_tier":"' . $row->unit_tier . '","image":"' . $row->image . '","cost":"' . $row->cost . '","hp":"' . $row->hp . '","mana":"' . $row->mana . '","armor":"' . $row->armor . '","magic_resist":"' . $row->magic_resist . '","damage":"' . $row->damage . '","ability":"' . $row->ability . '","ability_des":"' . $row->ability_des . '"}';

        $isFirstRecord = false;
    }
}
$json .= "]";

/* Send the $json string back to the webpage that sent the AJAX request */
echo $json;


/* Provide a link for the user to proceed to a new webpage or automatically redirect to a new webpage */
/* This webpage never actually displays. Instead, it runs in the background on the server. */
/* The data contained in the line of code "echo $json;" is automatically sent back inside the "http_request.responseText" of the calling function. */
/* Therefore, no feedback or way to proceed is necessary. */
?>
