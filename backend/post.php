<?php
include_once("./session.php");
include_once("./connection.php");
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');
session_start();
$incoming_data = json_decode(file_get_contents('php://input'), true);

$postbox = $incoming_data['postbox'];
$sql = " SELECT * FROM `Profile` limit 5;";

$servername = "db.luddy.indiana.edu";
$username = "i494f20_team12";
$password = "my+sql=i494f20_team12";
$conn = mysqli_connect($servername, $username, $password, 'i494f20_team12');
$result = mysqli_query($conn, $sql);
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

json_encode("This is a test");
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
console_log($age)
?>








