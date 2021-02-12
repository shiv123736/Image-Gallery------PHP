<?php
if(isset($_POST["submit"])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
            if($fileSize < 100000000) {
                    include "component/_db_connect.php";
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $title = $_POST['title'];
                    $desc = $_POST['desc'];
                    $url = $fileDestination;
                    $cat = $_POST['category'];
                    $author = $_POST['author'];
                    $sql = "INSERT INTO `imageslist` (`title`, `description`, `url`, `category`, `author`, `date`) VALUES ('$title', '$desc', '$url', '$cat', '$author', SYSDATE())";
                    $result = $conn->query($sql);
                    if($result == true) {
                        $conn->close();
                        header("location: newImage.php?fileUploaded");                        
                    }
                    else
                        echo 'error';
            }
            else 
                echo "Your file is too large!";
        }
        else 
            echo 'There was an error uploading your file!';
    }
    else
        echo "file not supported";

}


?>