<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Messenger</title>
    <link rel="stylesheet" href="style/messenger.css" />
    <link rel="icon" href="images/truck_icon.png" />
  </head>
  <body>
    <header id="header">
      <div>
        <img class="logo" src="images/logo.png" alt="" />
      </div>
      <div>
        <ul id="navigacia_javascript">
          <li class="link"><a href="./messenger.php">DOMOV</a></li>
          <li class="link"><a href="../index.php" class="odhlasenie">ODHLÁSIŤ SA</a></li>
        </ul>
        <button class="nav_button" id="nav_button_javascript">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </header>
    <script>
      let navigacia = document.getElementById("navigacia_javascript");
      let nav_button = document.getElementById("nav_button_javascript");
      let header = document.getElementById("header");
      nav_button.onclick = function () {
        navigacia.classList.toggle("responz_navigacia");
        header.classList.toggle("header");
        nav_button.classList.toggle("nbutton");
      };
    </script>
 <?php

?> 
<section id="spet">
<button id="reset">Späť</button>
</section>
<section id="choose" class="">
<?php
      if(!empty($_SESSION["send"])){
if($_SESSION["send"] == true){
  echo "<p class='check'>Požiadavka bola odoslaná</p>";
  unset($_SESSION['send']);
}
      }
       ?>
  <div class="vyber">
<button id="new">Nová závada</button>
<button id="old">História závad</button>
</div>
</section>
<section id="send" class="">
<div class="formular">    
<h2>Nová závada</h2>
<form action="c_message.php" method="post">
<div class="sprava">
<input type="text" class="message" placeholder="<?php echo $meno; ?>" readonly>
<input type="text" name="message" class="message" placeholder="Popis závady">
<button class="odoslat" type="submit">ODOSLAŤ</button>
</div>
</form>
</div>
</section>
<section id="show" class="messenger"> 
<?php

$con = mysqli_connect("localhost", "root", "","test");
// Check connection
if (mysqli_connect_error())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM lezitranz_db ORDER BY ID DESC");
echo "<table border='1'>
<thead>
<tr>
<th>SPZ</th>
<th>Popis chyby</th>
<th>Dátum a čas</th>
<th>Stav opravy</th>
<th>Dátum opravy</th>
</tr>
</thead>
<tbody>";
while($row = mysqli_fetch_array($result))
{
$spz = $row['spz'];
if($spz == $meno){
echo "<tr>";
echo "<td>" . $row['spz'] . "</td>";
echo "<td>" . $row['porucha'] . "</td>";
echo "<td>" . $row['datum'] . "</td>";
echo "<td>
<select disabled name='status1' id='stav' onchange='this.form.submit()'>" . $row['status'] . "</select>
</td>";
echo "<td>" . $row['opravene'] . "</td>";
echo "</tr>";
} 
}
echo "</tbody>
</table>";
mysqli_close($con);



?>
</section>
<script>
      let choose = document.getElementById("choose");
      let send = document.getElementById("send");
      let show = document.getElementById("show");
      let xxx = document.getElementById("new");
      let old = document.getElementById("old");
      let reset = document.getElementById("reset");
      let spet = document.getElementById("spet");
      xxx.onclick = function () {
        choose.classList.toggle("close");
        send.classList.toggle("open");
        spet.classList.toggle("open");
      };
      old.onclick = function () {
        choose.classList.toggle("close");
        show.classList.toggle("open");
        spet.classList.toggle("open");
      };
      reset.onclick = function () {
        choose.classList.remove("close");
        send.classList.remove('open');
        show.classList.remove('open');
        spet.classList.remove('open');
      };
    </script>
       </div>
    </section>
  </body>
</html>