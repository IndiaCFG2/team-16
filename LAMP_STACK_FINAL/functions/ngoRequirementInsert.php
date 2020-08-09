<?php

include("connection.php");

if(isset($_POST)){
    $email = $_POST['ngo_email'];
    $item_type = $_POST['item_type'];
    $item_name = $_POST['item_name'];
    $qty_req = $_POST['quantity_required'];
    $description = $_POST['description'];
    if($mysqli->query("INSERT INTO ngorequire (email,item_type,item_name,qty_req,description) VALUES('$email','$item_type','$item_name',$qty_req,'$description')")){
        echo "1";
    }else{
        echo "0";
    }
}


?>