<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style/root.css" />
    <link rel="icon" href="images/truck_icon.png" />
</head>
<body>
    
<div class='messenger'>
    <section class="new-task">
    <h1>TO-DO LIST</h1>

<div class="plus">

 <form action="c_message.php" method="post">
<div class="sprava">
<input type="text" name="message" class="message" placeholder="Úlohu ktorú treba spraviť">
<button class="odoslat" type="submit">ODOSLAŤ</button>
</div>
</form>

<img src="stiahnut.png" alt="">

</div>

 </section>
    <section class="tabulka">
<?php


$con = mysqli_connect("localhost", "root", "","test");

if (mysqli_connect_error())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM todo ORDER BY ID DESC");

echo "<table border='1'>
<thead>
<tr>
<th class='task'>Úloha</th>
<th>Dátum</th>
<th class='edit'>Upraviť</th>
<th class='remove'>Vymazať</th>
</tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result))
{
$ID = $row['ID'];
echo "<tr>";
echo "<td>" . $row['task'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>     <form action='update.php' method='post'>
<input type='text' name='changed'>
<button type='submit' name='idecko' value='" .$ID. "'>Zmeniť</button>
</form></td>";
echo "<td><form id='" .$ID. "' action='delete.php' method='POST'>
<button type='submit' name='delete' value='" .$ID. "'>Vymazať</button>
</form></td>";
echo "</tr>";
}
echo "</tbody>
</table>";
mysqli_close($con);


 ?>
 </section>
</div>
<style>
    .messenger{
        position: absolute;
    top: 10px;
    left: 50%;
    transform: translate(-50%, 0%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 90%;
    }
    table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
table th,
table td {
    padding: 12px 15px;
}
table tbody tr {
    border-bottom: 1px solid #dddddd;
}

table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
table{
width: 100%;
}
.tabulka{
    width: 100%;
}
tr > td:nth-child(2),
tr > td:nth-child(3),
tr > td:nth-child(4) {
  white-space: nowrap;
}
.edit{
    width: 6rem;
}
.remove{
    width: 2rem;
}
tr > td:nth-child(2){
    width: 2rem;
}
.new-task{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10rem;
    width: 100%;
    padding: 0rem 4rem;
}
.plus{
    display: flex;
    align-items: center;
    gap: 1rem;
}
img{
    height: 3rem;
    cursor: pointer;
}

button{

  color: white;
  background: #ad5389;
  background: linear-gradient(0deg, rgba(20,167,62,1) 0%, rgba(102,247,113,1) 100%);
  border: none;
  box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
  border-radius: 3px;

}


</style>
<script>



$(function () {
    $(".sprava").hide();
$("img").click(function (e) { 
    e.preventDefault();

    $(".sprava").slideToggle(500);
    
});

});


</script>
</body>
</html>