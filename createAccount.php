<?php
$signup = false;
$showerror = false;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'component/_db_connect.php';
  $username = $password = $con_password = "";
if (!empty($_POST["uname"]) && !empty($_POST["pass"]) && !empty($_POST["con_pass"]))  {
        $username= strtolower(test_input($_POST['uname']));
        $password= strtolower(test_input($_POST['pass']));
        $con_password= test_input($_POST['con_pass']);
        if($password == $con_password){
            $sql = "select * from users where username='$username'";
            $result= $conn->query($sql);
            if($result->num_rows == 1)  {
                $showerror = true;
                header("location:signUp.php?error=usernameExist");
            }
            else {
                $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$password', SYSDATE());";
                $result= $conn->query($sql);
                header("location:logIn.php?success=accountcreatedSuccessfully");
            }
        }
        else {
            header("location:signUp.php?error=passworddonotmatch");
        }
    }
    else { 
        header("location:signUp.php?error=filldetails");
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>