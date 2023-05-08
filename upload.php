<?php
session_start();

    if(!empty($_POST['myFile'])){
        $_SESSION['error'] = 'Please choose a file';
        header('location: editProfileDepart.php');
        die();
    }
    
/*     echo "<pre>";
        print_r($_FILES);
    echo "</pre>";
    print_r($_POST); */

    $file = $_FILES['myFile'];
    
    $name = $file['name'];
    $_SESSION['fullFileName'] = $name;
    $type = $file['type'];
    $temp_name = $file['tmp_name'];
    $error = $file['error'];
    $size = $file['size'];
    
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $supported_files = array('png', 'jpg', 'jpeg');
    if (!in_array($ext, $supported_files)){
        $_SESSION['error'] = 'Please choose .png, jpg or jpeg image';
        header('location: editProfileDepart.php');
        die();
    }
    
    if($size > 10 * 1024 * 1024){
        $_SESSION['error'] = 'This file very large'; 
        header('location: editProfileDepart.php');
        die();
    }
    
    $root = $_SERVER['DOCUMENT_ROOT'];
    $final_path = $root .'/Final-Project-Web/images/'. $name;
    
    if (move_uploaded_file($temp_name, $final_path)){
        $_SESSION['success'] = 'This file has been saved';
        header('location: editProfileDepart.php');
        die();
    }else {
        $_SESSION['error'] = 'can not save the uploaded file';
        header('location: editProfileDepart.php');
        die();
    }
    print_r($root);
?>