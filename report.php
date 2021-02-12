

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="style/report.css?<?=filemtime("style/report.css")?>" rel="stylesheet" type="text/css" />
    <link href="style/style.css?<?=filemtime("style/style.css")?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php 
        include "component/navbar.php";
        $uname = $_SESSION['username'];
        $admin = false;
        if(isset($_SESSION['admin']) == true) {
            $admin = true;
        }
    ?>

    <div class="container">
        <h3>Report Form</h3>
        <form action="report_submit.php" method='POST'>
            <label for="fname">First Name</label>
            <input class= "input-control" type="text" id="fname" name="fname" placeholder="Your name..">
            <input class= "input-control" type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input class= "input-control" type="hidden" name="uname" value="<?php echo $uname ?>">

            <label for="lname">Last Name</label>
            <input class= "input-control" type="text" id="lname" name="lname" placeholder="Your last name..">

            <label for="reason">Reason</label>
            <select id="reason" name="reason">
                <option value="spam">Spam</option>
                <option value="Inaccurate content">Inaccurate content</option>
                <option value="Repost">Repost</option>
            </select>
            <label for="subject">Description</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

            <input class= "input-control" type="submit" value="Submit">
        </form>
    </div>
    <?php
if($admin) {
    echo '<div class="container">
        <table border="2">
            <tr>
                <th>Firstname
                <th>Lastname
                <th>Username
                <th>Image_id
                <th>Reason
                <th>Description
                <th>Date</th>
            </tr>';
                include "component/_db_connect.php";
                $sql = "select * from report";
                $result = $conn->query($sql);
                if($result == true) {
                    while($row = $result->fetch_assoc()) {
                        $fname = $row['firstname'];
                        $lname = $row['lastname'];
                        $uname = $row['username'];
                        $id = $row['image_id'];
                        $reason = $row['reason'];
                        $subject = $row['subject'];
                        $date = $row['date'];
                        echo ' <tr>
                                    <td>'.$fname.'
                                    <td>'.$lname.'
                                    <td>'.$uname.'
                                    <td>'.$id.'
                                    <td>'.$reason.'
                                    <td>'.$subject.'
                                    <td>'.$date.'</td>
                                </tr>';
                    }
                }
       echo '</table></div>';
    }
    include "component/footer.php";
?>

</body>

</html>