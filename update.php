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
$obsah = $_POST["changed"];
$identifikator = $_POST["idecko"];
echo $obsah;
echo $identifikator;

$conn = new mysqli("localhost", "root", "", "test");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE todo SET task='" .$obsah. "' WHERE id=" .$identifikator;

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

header("Location: ./root_messenger.php");
?>
</body>
</html>