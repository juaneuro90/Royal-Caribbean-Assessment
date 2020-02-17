<?php
session_start();
header('Location: http://' . $_SERVER['HTTP_HOST'] );
require_once('config.php');
$msg='';
$db=$config['db'];

$conn= new mysqli($db['host'],$db['user'],$db['password']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$id = $_GET['id']; // $id is now defined

$sql = "DELETE FROM juanpare_testing_db.guest_registration WHERE personal_id='".$id."'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Record deleted successfully";
} else {
    $_SESSION['msg'] = "Error deleting record: " . $conn->error;
}

?>