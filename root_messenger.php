<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <link rel="stylesheet" href="style/root.css" />
    <link rel="icon" href="images/truck_icon.png" />
</head>
<body>
    
<div class='messenger'>
    <section>
<?php


$con = mysqli_connect("localhost", "root", "","test");
// Check connection
if (mysqli_connect_error())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM todo ORDER BY ID DESC");

echo "<table border='1'>
<thead>
<tr>
<th>Úloha</th>
<th>Dátum</th>
<th>Upraviť</th>
<th>Vymazať</th>
</tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result))
{
$ID = $row['ID'];
echo "<tr>";
echo "<td>" . $row['task'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td><form id='" .$ID. "' action='checked.php' method='POST'>
<button type='submit' name='update' value='" .$ID. "'> update </button>
</form></td>";
echo "<td><form id='" .$ID. "' action='delete.php' method='POST'>
<button type='submit' name='delete' value='" .$ID. "'> delete </button>
</form></td>";
echo "</tr>";
}
echo "</tbody>
</table>";
mysqli_close($con);


 ?>
 </section>
 <section>
 <form action="c_message.php" method="post">
<div class="sprava">
<input type="text" name="message" class="message" placeholder="Úlohu ktorú treba spraviť">
<button class="odoslat" type="submit">ODOSLAŤ</button>
</div>
</form>
 </section>
</div>
</body>
</html>