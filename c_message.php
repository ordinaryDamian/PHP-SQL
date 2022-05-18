<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$sprava1 = $_POST["message"];
$cas = date('d.m. H:i' , time());


$connection = mysqli_connect("localhost", "root", "","test");
$sql = "INSERT INTO todo (task, date)
VALUES ('{$sprava1}', '{$cas}')";
 

if ($connection->query($sql) === TRUE) {
    echo "<br> New record created successfully";
  } 
header("Location: ./root_messenger.php");
?>
</body>
</html>
