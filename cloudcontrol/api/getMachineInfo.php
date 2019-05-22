<?php
//todo get all includes into one call
//todo move to oAuth for API auth
//include 'vendor/autoload.php';
include '../inc/inc.db.php';

$key = $_GET['userKey'];
//debug
//echo $key;

//api listener
if (!isset($key)) {
    echo "No Permissions";
} else {
    $query = $pdo->prepare('SELECT * FROM machines WHERE userId=:parameter');
    $query->bindParam(':parameter', $key, PDO::PARAM_STR);
    $query->execute();
    //add the fetch for associative array
    $machine = $query->fetch(PDO::FETCH_ASSOC);


    $machineId = $machine['id'];
    $machineUserid = $machine['userId'];
    $machineName = $machine['machineName'];
    //echo json_encode(($query);
    //echo json_encode($dataArray);

    echo json_encode($machine);
    //debug
    //echo "</br>" . $machineId . " " . $machineUserid . " " . $machineName;
}
