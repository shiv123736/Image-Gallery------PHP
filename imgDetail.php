<?php 
// $show = false;
// session_start();
// if(isset($_SESSION['login_on']) == true) {
//     $show = true;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="style/imgDetail.css?<?=filemtime("style/imgDetail.css")?>" rel="stylesheet" type="text/css" />
    <link href="style/style.css?<?=filemtime("style/style.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
        <div class="image">
            <div class="fakeimage">
                <img src="<?php echo $url ?>" style="width:100%;">
            </div>
        </div>
        <div class="details">
            <h1 class="img-title"><?php echo $title ?></h1>
            <p><?php echo $desc ?></p>
            <small>Category: </small><button><?php echo $cat ?></button><br>
            <small>Author: </small><button><?php echo $author ?></button>
            <?php
                if(!$show) { 
                    echo '
                        <div class="report">
                            <a href="">Report</a>
                            <small style="color:red;">You must Log in First*</small>
                        <div>';
                }
                if($show) {
                    echo ' <div class="report">
                    <a href="report.php?id='.$id.'">Report</a>
                    <div>';
                }
                ?>
        </div>
    </div>
    
    

    <?php 
    include "component/footer.php";
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