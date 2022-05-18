<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
  <?php
// debugging
echo "Z formularu som prijal nasledujuce data";
echo "<br/>";
echo "<pre>" . print_r($_POST, true) . "</pre>";
echo "<br/>";

if (isset($_POST['delete'])) {
    echo "Stlacil si tlacitko DELETE";
    echo "<br>";
} elseif (isset($_POST['update'])) {
    echo "Stlacil si tlacitko UPDATE";
    echo "<br>";
} elseif ($_POST['action'] == "create") {
    echo "Stlacil si tlacitko CREATE";
    echo "<br>";
}
echo "<br>";
?>
  <a href="./index.php">chod na index.html</a>
  </body>
</html>

