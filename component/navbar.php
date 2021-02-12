<?php 
$show = false;
$admin = false;
session_start();
if(isset($_SESSION['login_on']) == true) {
    $uname = $_SESSION['username'];
    $show = true;
}
if(isset($_SESSION['admin']) == true) {
    $admin = true;
}
?>
<header>
    <nav>
        <div>
            <img src="images/grid_logo.png" class="logo" width="50px">
        </div>
        <ul class='menuItems mxHeight'>
            <?php
            if($show) {
                echo '<li><a href="" class="link scroll">User: '.$uname.'</a></li>';
            }
        ?>
            <li><a href="index.php" class="link scroll">Home</a></li>
            <li><a href="#" class="link scroll">About us</a></li>
            <?php
                if(!$show) { 
                    echo '<li><a href="signUp.php" class="link signUp-btn">Sign Up</a></li>
                            <li><a href="logIn.php" class="link logIn-btn">Login</a></li> ';
                } 
                if($show) {
                    echo '
                        <li><a href="logOut.php" class="link logIn-btn">Log Out</a></li>';
                }
                ?>
        </ul>
        <div class="bar">
            <i class="fa fa-bars"></i>
        </div>
    </nav>
</header>
<div class="sharing">
    <div class="new_img">
        <?php
                $address = $_SERVER['PHP_SELF'];
                if(!$show) { 
                    echo '<a href="" class="share-btn">Add a Image</a>
                            <small style="color:red;">You must Log in First*</small>';
                }
                if($show) {
                    echo '<a href="newImage.php" class="share-btn">Add a Image</a>';
                }
                ?>
    </div>
    <div class="search_img">
        <form action="search.php" method='get'>
            <input type="text" name="search">
            <button type="submit" id="search">Search</button>
        </form>
        <?php 
            if($admin) {
                echo '<a href="reset.php" class="share-btn">Reset Database</a>';
            }
        ?>
    </div>
</div>