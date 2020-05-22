<?php

/* Validate and assign input data */
$tier = filter_input(INPUT_GET, "tier", FILTER_SANITIZE_STRING);



/* Include "configuration.php" file */
require_once "configuration.php";


/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception


if ($tier != 'all') 
    {
    $query = "SELECT comp_id, name, comp_tier from compositions WHERE comp_tier = :tier";
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(":tier", $tier, PDO::PARAM_STR);
}
else
{
    $query = "SELECT comp_id, name, comp_tier from compositions";
    $statement = $dbConnection->prepare($query);
}
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
        $json .= '{"comp_id":"' . $row->comp_id . '","name":"' . $row->name . '","comp_tier":"' . $row->comp_tier . '"}';

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
