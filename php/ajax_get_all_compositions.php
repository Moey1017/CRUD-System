<?php

/* Validate and assign input data */
$tier = filter_input(INPUT_GET, "tier", FILTER_SANITIZE_STRING);


/* Include "configuration.php" file */
require_once "configuration.php";


/* Connect to the database */
$dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // set the PDO error mode to exception


if ($tier != 'all') {
    $query = "SELECT cs.comp_id, cs.comp_name, cs.comp_tier, c.unit_id, u.name, u.unit_tier, u.image FROM compositions cs, comp c, units u WHERE c.comp_id = cs.comp_id AND u.unit_id = c.unit_id AND comp_tier = :tier";
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(":tier", $tier, PDO::PARAM_STR);
} else {
    $query = "SELECT cs.comp_id, cs.comp_name, cs.comp_tier, c.unit_id, u.name, u.unit_tier, u.image FROM compositions cs, comp c, units u WHERE c.comp_id = cs.comp_id AND u.unit_id = c.unit_id order by cs.comp_tier";
    $statement = $dbConnection->prepare($query);
}
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);


if ($statement->rowCount() > 0) {
    $comps = array();
    foreach ($result as $row) {
        $unit = new stdClass();
        $unit->unit_id = $row->unit_id;
        $unit->name = $row->name;
        $unit->unit_tier = $row->unit_tier;
        $unit->image = $row->image;
        if (empty($comps[$row->comp_id]->comp_id)) {
            $comps[$row->comp_id] = new stdClass();
        }
        $comps[$row->comp_id]->comp_id = $row->comp_id;
        $comps[$row->comp_id]->comp_tier = $row->comp_tier;
        $comps[$row->comp_id]->comp_name = $row->comp_name;
        $comps[$row->comp_id]->units[] = $unit;
    }
}

function cmp_obj($a, $b) {
    $al = strtolower($a->comp_tier);
    $bl = strtolower($b->comp_tier);

    if ($al == $bl) {
        return 0;
    }

    return ($al > $bl) ? +1 : -1;
}

usort($comps, "cmp_obj");
echo json_encode($comps);
?>
