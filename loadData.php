
<?php

$conn = new mysqli('localhost', 'root', '', 'db_sig');

    $return_arr = array();

    $select = "SELECT * FROM marker";

    $result = mysqli_query($conn,$select);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $lat = $row['lat'];
        $lng = $row['lng'];
        $katagori = $row['katagori'];
    
        $return_arr[] = array("id" => $id,"lat" => $lat, "lng" => $lng, "type"=>$katagori);
    }
    
    echo json_encode($return_arr);

?>
  


    
    
