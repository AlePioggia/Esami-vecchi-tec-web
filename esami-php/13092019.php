<?php
$conn = new mysqli("localhost", "root", "", "settembre");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST["name"])
    && isset($_POST["mass"])
    && isset($_POST["height"])) {      
        $stmt = $conn->prepare("INSERT INTO starwars VALUES(?, ?, ?)");
        $stmt->bind_param('sii', $_POST["name"], $_POST["surname"], $_POST["height"]);
        $stmt->execute();
    }
} else if($_SERVER['REQUEST_METHOD'] === "GET") {
    $stmt = $conn->prepare("SELECT * FROM starwars");
    $stmt -> execute();
    $result = $stmt->get_result()->fetch_all();
    var_dump($result);
    if (!empty($result)) {
        $myfile = fopen("data.json", "w");
        fwrite($myfile, json_encode($result));
        fclose($myfile);
    }
}
$conn->close();
?>