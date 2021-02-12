<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="style/style.css?<?=filemtime("style/style.css")?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php 
        include "component/navbar.php";
    ?>

    <!-- <div class="header">
        <h1>photo grid</h1>
    </div> -->
    <div class="grid">
        <?php
                include "component/_db_connect.php";
                $sql = "select * from imageslist";
                $result = $conn->query($sql);
                if($result == true) {
                    while($row = $result->fetch_assoc()) {
                        $url = $row['url'];
                        $id = $row['id'];
                        echo '<div class="column card_1">
                                <div class="fakeimage">
                                    <img src="'.$url.'" style="width:100%;">
                                    <div class="overlay"><a href="imgDetail.php?id='.$id.'" class="image-link" >Detail</a></div>
                                </div>
                            </div>';
                    }
                }
        ?>
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