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
<input type="text" name="message" class="message" placeholder="úloha ktoru treba spraviť">
<button class="odoslat" type="submit">ODOSLAŤ</button>
</div>
</form>
</div>
</section>
  </body>
</html>