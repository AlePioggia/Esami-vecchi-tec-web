<?php
$conn = new mysqli("localhost", "root", "", "febbraio");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
 <?php
    if(!empty($_COOKIE["username"]) && !empty($_COOKIE["categoria"])) {
        $stmt = $conn->prepare("SELECT * from articoli where categoria=?");
        $stmt->bind_param('s', $_COOKIE["categoria"]);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();
    } else{
        $stmt = $conn->prepare("SELECT * from articoli");
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all();
    }
?>
<html lang="it">
  <head>
    <title>Esercizio PHP</title>
  </head>
  <body>
    <div class="header">
      <a  class="home">Esercizio PHP</a>
      <div class="products">
        <a href="index.php">Homepage</a>
        <a href="21022020-settings.php">Settings</a>
        <div>
            <?php foreach($result as $res): ?>
            <h1><?php echo $res[1]?></h1>
            <p><?php echo $res[2]?></p>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
    <article>
    </article>
  </body>
</html>
