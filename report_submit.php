<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'component/_db_connect.php';
  $fname = $lname = $subject = "";
  $id = $_POST['id'];
    if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["id"]) && !empty($_POST["subject"]))  {
            $uname= strtolower(test_input($_POST['uname']));
            $fname= strtolower(test_input($_POST['fname']));
            $lname= strtolower(test_input($_POST['lname']));
            $reason= strtolower(test_input($_POST['reason']));
            $id= test_input($_POST['id']);
            $subject= test_input($_POST['subject']);
            $sql = "INSERT INTO `report` (`firstname`, `lastname`, `username`, `image_id`, `reason`, `subject`, `date`) VALUES ('$fname', '$lname', '$uname', '$id', '$reason', '$subject', SYSDATE())";
            $result= $conn->query($sql);
            if($result == true)
              header("location: report.php?success");
            else
              header("location: report.php?id='$id'&failed");
    }
    else {
        header("location: report.php?id=$id&filldetails");
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>