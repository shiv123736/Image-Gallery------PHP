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

    <div class="container my-4">
        <!-- search results -->
        <h1 class="my-4">Search Results</h1>
        <div class="grid">
        <?php
                include "component/_db_connect.php";
                $no_result_found = false;
                $keyword = $_GET['search']; 
                $sql = "select * from imageslist where title like '%$keyword%' or description like '%$keyword%'";
                $result = $conn->query($sql);
                if($result == true) {
                    while($row = $result->fetch_assoc()) {
                        $no_result_found = true;
                        $id = $row['id'];
                         $url = $row['url'];
                                echo '<div class="column card_1">
                                        <div class="fakeimage">
                                            <img src="'.$url.'" style="width:100%;">
                                            <div class="overlay">
                                                <a href="imgDetail.php?id='.$id.'" class="image-link" >Detail</a>
                                            </div>
                                        </div>
                                    </div>';
                    }
                    $conn->close();
                }
            ?>
        </div>
    <?php 
    
        if(!$no_result_found) {
        echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                    <h1 class="display-4">No Result Found</h1>
                    <p class="lead">Suggestion: 
                        <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                        </ul>
                    </p>
                </div>
            </div>';
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