<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require '../app/db.php';

$id = $_GET["id"];
$sql = "SELECT * FROM devices WHERE id=$id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);
//print_r($row);
$mac = $row["mac"];
$deviceID = $row["id"];

$sql1 = "SELECT * FROM recorded_values WHERE mac='$mac' ORDER BY id  DESC LIMIT 1";
$res1 = mysqli_query($con, $sql1);

$s = "SELECT * FROM custom_graph WHERE device_id=$deviceID";
$s1 = mysqli_query($con, $s);
$s2 = mysqli_fetch_array($s1);

$s = "SELECT * FROM custom_sections WHERE device_id=$deviceID";
$s1 = mysqli_query($con, $s);
$s3= mysqli_fetch_array($s1);


$obj = array();
if (mysqli_num_rows($res1)) {
    $row = mysqli_fetch_array($res1);
        array_push($obj, $row[$s3["vertical_bar_channel"]]);
}
echo json_encode($obj);
?>
