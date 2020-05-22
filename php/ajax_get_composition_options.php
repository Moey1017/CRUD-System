<?php

/* Include "configuration.php" file */
require_once "configuration.php";


/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception


$query = "SELECT cs.comp_id AS comp_id, cs.comp_name AS comp_name, cs.comp_tier As comp_tier, COUNT(c.comp_id) AS NoC FROM compositions cs LEFT JOIN comp c ON c.comp_id = cs.comp_id GROUP BY cs.comp_id HAVING Noc <= 7";
$statement = $dbConnection->prepare($query);
$statement->execute();


$json = "[";
if ($statement->rowCount() > 0)
{
    /* Get field information for all fields */
    $isFirstRecord = true;
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $row)
    {
        if(!$isFirstRecord)
        {
            $json .= ",";
        }
        
        /* NOTE: json strings MUST have double quotes around the attribute names, as shown below */
        $json .= '{"comp_id":"' . $row->comp_id . '","comp_name":"' . $row->comp_name  . '","comp_tier":"' . $row->comp_tier .'","Number of Champions":"' . $row->NoC . '"}';
        
        $isFirstRecord = false;
    }  
}     
$json .= "]";
/* Send the $json string back to the webpage that sent the AJAX request */
echo $json;

?>
