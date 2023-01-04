<?php
session_start();
if(!isset($_SESSION['PHPSESSID'])) {
    $_SESSION['PHPSESSID'] = md5(random_bytes(64));
}

$upload_path = 'upload/' . $_SESSION['token'] . "/";
if (!file_exists($upload_path)) {
    mkdir($upload_path, 0777);
}

$deniedExts = array("php3", "php4", "php5", "phtml");
$deniedStrings = array("..", "/", "\\");

if (isset($_FILES)) {
    $file = $_FILES["file"];
    $error = $file["error"];
    $name = $file["name"];
    $tmp_name = $file["tmp_name"];

    for($i = 0; $i < count($deniedStrings); $i++) {
        if(strpos($name, $deniedStrings[$i])) {
            die("directory traveral attack detected !");
        }
    }
    if ( $error > 0 ) {
        echo "Error: " . $error . "<br>";
    }else {
        $temp = explode(".", $name);
        $extension = end($temp);
       
        if(in_array($extension, $deniedExts)){
            die($extension . " extension file is not allowed to upload ! ");
        }else{
            move_uploaded_file($tmp_name, $upload_path . $name);
            echo "Your File Uploaded <a target='_blank' href='/CTfd/file_storage/{$upload_path}{$name}'>Here</a><br><br>";

        }
    }
}else {
    echo "File is not selected";
}
?>