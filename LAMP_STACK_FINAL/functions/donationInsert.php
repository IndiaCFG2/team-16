<?php

include("connection.php");

// if(ini_get('file_uploads')){
//     echo 'file_uploads is set to "1". File uploads are allowed.';
// } else{
//     echo 'Warning! file_uploads is set to "0". File uploads are NOT allowed.';
// }

if(isset($_POST)){

    $post_data = json_encode($_POST);

    $item_name = $_POST['item_name'];
    $item_type = $_POST['item_type'];
    $years_old = $_POST['years_old'];
    $quality = $_POST['quality_rating'];
    $description = $_POST['donate_desc'];

    $file = $_FILES['file']; // getting the main file array

	$fileName = $_FILES["file"]["name"]; // getting name of file

	$fileTmpName = $_FILES["file"]["tmp_name"]; // temporary name of the file

    $err = $_FILES["file"]["error"]; // error count if any , count is 0 if no error

    $size = $_FILES["file"]["size"]; // size of image in bytes

    $fileExt = explode('.',$fileName); // array of filename and extension
    
    $fileActualExt = strtolower(end($fileExt)); // converting extension to a lower case 

    $fileNameNew = uniqid('',true).".".$fileActualExt; // making a file name by salting current time to avoid files with same name

       	$fileDestination = "donation_images/".$fileNameNew; // setting the destination address

		move_uploaded_file($fileTmpName, $fileDestination);



if($mysqli->query("INSERT INTO donations (item_type,old_years,rating,description,img_url) VALUES('$item_type',$years_old,$quality,'$description','$fileNameNew')")){
    echo "1";
}else{
    echo "0";
}


}


?>