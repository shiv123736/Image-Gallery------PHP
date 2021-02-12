<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="style/log_in.css?<?=filemtime("style/imgDetail.css")?>" rel="stylesheet" type="text/css" />
    <!-- <link href="style/imgDetail.css?<?=filemtime("style/imgDetail.css")?>" rel="stylesheet" type="text/css" /> -->
    <link href="style/style.css?<?=filemtime("style/style.css")?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php 
        // $title = '';
        include "component/navbar.php";

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            include "component/_db_connect.php";
            $sql = "select * from imageslist where id = $id";
            $result = $conn->query($sql);
            if($result  == true) {
                $row = $result->fetch_assoc();
                $title = $row['title'];
                $desc = $row['description'];
                $url = $row['url'];
                $cat = $row['category'];
                $author = $row['author'];
            }        
        }
    ?>

    <div class="container">
        <section id="img">
            <div class="grid_logo">
                <img src="images/grid_logo.png" style="width:100%;">
            </div>
        </section>
        <section id="content">
            <form action="createAccount.php" method="POST">
                <h1>Sign up Form</h1>
                <div>
                    <input type="text" placeholder="Username" required="" id="username" name="uname"/>
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" id="pass" class="password" name="pass"/>
                </div>
                <div>
                    <input type="password" placeholder="Confirm Password" required="" id="Con_pass" class="password" name="con_pass"/>
                </div>
                <div>
                    <input type="submit" value="Sign Up" />
                    <a href="logIn.php">Already Have an Account ?</a>
                    <!-- <a href="#">Register</a> -->
                </div>
            </form><!-- form -->

        </section><!-- content -->
    </div><!-- container -->





    <?php 
    // include "component/footer.php";
        // $js = '';
        // $handle = '';
        // $file = '';
        // // open the "js" directory
        // if ($handle = opendir('index')) {
        //     // list directory contents
        //     while (false !== ($file = readdir($handle))) {
        //         // only grab file names
        //         if (is_file('index/dom.js' . $file)) {
        //             // insert HTML code for loading Javascript files
        //             $js .= '<script src="index/dom.js' . $file . '" type="text/javascript"></script>' . "\n";
        //         }
        //     }
        //     closedir($handle);
        //     echo $js;
        // }
    ?>
    <script src="index/dom.js"></script>
</body>

</html>