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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $email_list = isset($_POST["email_list"]) ? 1 : 0;
  $brand = $_POST["brand"];
  $ship = $_POST["ship"];
  $sail_date = $_POST["sail_date"];
  $comment = $_POST["comment"];
}
$sql1 = "SELECT first_name, last_name, email_address FROM juanpare_testing_db.guest_registration WHERE
        first_name = '".$first_name."' AND last_name = '".$last_name."' AND email_address = '".$email."'";

$result = $conn->query($sql1);
if($result->num_rows == 0){
    $sql = "INSERT INTO juanpare_testing_db.guest_registration (first_name, last_name, email_address, brand, email_list_flag, ship, sail_date, comments)
            VALUES ( '".$first_name."', '".$last_name."', '".$email."', '".$brand."', '".$email_list."', '".$ship."', '".$sail_date."', '".$comment."')";


    if($conn->query($sql) === TRUE){
        $last_id = $conn->insert_id;
        $_SESSION['msg'] = "New record created successfully.";
    }
    else{
        $_SESSION['msg'] = "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

}
else{
    $_SESSION['msg'] = "User has already been registered";
    $conn->close();
}

exit;
?>


