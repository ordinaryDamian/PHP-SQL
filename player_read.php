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
  <h2>Get Player</h2>
  <?php
require 'credentials.php';

try {
    // prikaz ktory sa ma vykonat nad databazou
    $query = "SELECT * FROM player";

    // vytvorenia spojenia s dataazou
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // vykonanie prikazu v databaze
    $stmt = $conn->query($query);

    $tableHeader = <<<EOT
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Action</th>
    </tr>
    EOT;
    echo "$tableHeader";

    // vrati zaznamy aj ako kluce a aj ako asociativne pole
    while ($row = $stmt->fetch()) {
        $tableContent = <<<EOT
        <tr>
          <td>
            {$row["id"]}
          </td>
          <td>
            {$row["name"]}
          </td>
          <td>
            {$row["surname"]}
          </td>
          <td>
            {$row["age"]}
          </td>
          <td>
            {$row["gender"]}
          </td>
          <td>
            <form action="process_id.php" method=post>
            <button type=submit name="delete" value="{$row['id']}"> delete </button>
            <button type=submit name="update" value="{$row['id']}"> update </button>
            <input type="hidden" name="hidden1" value="{$row['id']}"/>
            </form>
          </td>
        </tr>
        EOT;
        echo "$tableContent";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

<a href="./index.php">index</a>

  </body>
</html>




