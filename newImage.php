<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="style/addImage.css?<?=filemtime("style/addImage.css")?>" rel="stylesheet" type="text/css" />
    <link href="style/style.css?<?=filemtime("style/style.css")?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php 
        include "component/navbar.php";
    ?>

    <div class="container">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <h2>Upload Images</h2>
            <div class="small-container">
                <div class="title label">
                    <label>Title:</label>
                </div>
                <div class="title-input input">
                    <input type="text" name="title" required>
                </div>
                <br>
                <div class="desc label">
                    <label>Description:</label>
                </div>
                <div class="desc-input input" required>
                    <textarea type="text" name="desc"></textarea>
                </div>
                <br>
                <div class="category label">
                    <label>Category:</label>
                </div>
                <div class="category-input input">
                    <input type="text" name="category" required>
                </div>
                <br>
                <!-- <div class="author label">
                    <label>Author:</label>
                </div> -->
                <!-- <div class="author-input input"> -->
                    <input type="hidden" name="author" value="<?php echo $_SESSION['username'];?>" required>
                <!-- </div> -->
                <br>
                <div class="choose-image label">
                    <label>Choose Image: </label>
                </div>
                <div class="choose-image-input input">
                    <input type="file" name="file" class="custom-file-input" required>
                </div>
                <br>
                <button type="submit" name="submit" class="submit-btn">Upload</button>
            </div>
        </form>
    </div>


    <!-- <div class="footer">
        <h1>footer</h1>
    </div> -->

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