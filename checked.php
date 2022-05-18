<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$status1 = filter_input(INPUT_POST, 'status1', FILTER_SANITIZE_STRING);
$cas = date('d.m H:i' , time());
$id = $_POST["id"];
$connection = mysqli_connect("localhost", "root", "","test");
if($connection){
    echo "sme pripojený";
}else{
    echo "chyba";
}


if($status1 == "prijate"){
  $status = 
  '<option value="prijate"selected>Prijaté</option>
    <option value="proces">V procese opravy</option>
    <option value="opravene">Opravené</option>';
  $sql = "UPDATE lezitranz_db
  SET status = '{$status}', opravene = ''
  WHERE ID = $id;";
  if ($connection->query($sql) === TRUE) {
    echo "<br> New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
}elseif($status1 == "proces"){ 

     $status = 
 '<option value="prijate">Prijaté</option>
   <option value="proces"selected>V procese opravy</option>
   <option value="opravene">Opravené</option>';
 $sql = "UPDATE lezitranz_db
 SET status = '{$status}', opravene = ''
 WHERE ID = $id;";
 if ($connection->query($sql) === TRUE) {
   echo "<br> New record created successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $connection->error;
 }
}elseif($status1 == "opravene"){
  $status = 
  ' <option value="prijate">Prijaté</option>
    <option value="proces">V procese opravy</option>
    <option value="opravene"selected>Opravené</option>';
  $sql = "UPDATE lezitranz_db
  SET status = '{$status}', opravene = '{$cas}'
  WHERE ID = $id;";
  if ($connection->query($sql) === TRUE) {
    echo "<br> New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
}


header("Location: ./root_messenger.php");
?>
</body>
</html>