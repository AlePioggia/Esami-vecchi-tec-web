<?php
    function insertion_Sort($my_array)
    {
        for($i=0;$i<count($my_array);$i++){
            $val = $my_array[$i];
            $j = $i-1;
            while($j>=0 && $my_array[$j]> $val){
                $my_array[$j+1]= $my_array[$j];
                $j--;
            }
            $my_array[$j+1] = $val;
        }
    return $my_array;
    }

    $conn = new mysqli("localhost", "root", "", "numeri");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    $_POST["soglia"] = 10;
    if(isset($_POST["soglia"])) {
        $soglia = $_POST["soglia"];
        if ($soglia > 0) {
            /*Sort fatto direttamente nella query per poter svolgere l'ultimo punto dell'esercizio*/
            $stmt = $conn->prepare("SELECT * FROM numeri WHERE numero>?");
            $stmt->bind_param('i', $soglia);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all();
            $sorted_array = insertion_sort($result);
            echo json_encode($result);
        }
    }

    
?>