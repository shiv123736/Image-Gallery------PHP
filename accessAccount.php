<?php 
$showerror = false;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "component/_db_connect.php";
    $username = $password = "";
    $username = test_input($_POST['uname']);
    $password = test_input($_POST['pass']);
    if( !empty($username) && !empty($password)) {
        $sql = "select * from users where username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        if($result->num_rows == 1) {            
            $sql1 = "select * from users where username = '$username' AND admin = '1'";
            $result1 = $conn->query($sql1);
            if($result1->num_rows == 1) { 
                session_start();
                $_SESSION['login_on'] = true;
                $_SESSION['username'] = $username;               
                $_SESSION['admin'] = true;
            }
            else {
                session_start();
                $_SESSION['login_on'] = true;
                $_SESSION['username'] = $username;
            }
            header('location: index.php?loginsuccess=true');
        }
        else {
            $showerror = 'Invalid Credentials.';
            header('location: logIn.php?login=false&error='.$showerror.'');
        }     
    }
    else {
        $showerror = 'Fill required details';
        header('location: logIn.php?login=false&error='.$showerror.'');
    }
} 
else {
    $showerror = 'Technical error.';
    header('location: logIn.php?login=false&error='.$showerror.''); 
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>