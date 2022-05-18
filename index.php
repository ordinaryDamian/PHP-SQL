<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="mystyle.css" />
  </head>
  <body>
    <?php
  $meno = $_SESSION["meno"];
if(empty($meno)){
    header("Location: ./formular.php");
};

$con = mysqli_connect("sql22.dnsserver.eu", "db15531xmarek", "Marek2022","db15531xmarek");
// Check connection
if (mysqli_connect_error())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM lezitranz_db ORDER BY ID DESC");

echo "<table border='1'>
<thead>
<tr>
<th>ŠPZ</th>
<th>Popis chyby</th>
<th>Dátum a čas</th>
<th>Stav opravy</th>
<th>Dátum opravy</th>
</tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result))
{
$ID = $row['ID'];
echo "<tr>";
echo "<td>" . $row['spz'] . "</td>";
echo "<td>" . $row['porucha'] . "</td>";
echo "<td>" . $row['datum'] . "</td>";
echo "<td><form id='" .$ID. "' action='checked.php' method='POST'>
<input type='hidden' name='id' value='$ID'>
<select name='status1' id='stav' onchange='this.form.submit()'>" . $row['status'] . "</select>
</form></td>";
echo "<td>" . $row['opravene'] . "</td>";
echo "</tr>";
}
echo "</tbody>
</table>";
mysqli_close($con);
?>

  </body>
</html>
