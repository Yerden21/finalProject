<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/details.css">
    <title>Last News</title>
</head>
<body>
    <?php 
        include_once 'header.php';
        include_once './includes/dbh.inc.php';
        if(isset($_GET['null'])) {
            $id = $_GET['null'];
            $sql = "SELECT * FROM news";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $json_array = $row["json"];
            $json_array = json_decode($json_array);
    ?>
    <div class="body">
        <div class="side-bar-left">
                <?php 
                    for ($i = 0; $i < 4; $i++) {
                        echo "<a href='details.php?null=".$i."' class='item'>".
                        "<h5>".$json_array[$i]->header."</h5>".
                        "<img src='images/".$json_array[$i]->image."'>".
                        "</a>";
                    }
                ?>
        </div>
        <div class="main-info">
            <h1><?php echo $json_array[$id]->header; ?></h1>
            <img src="images/<?php echo $json_array[$id]->image; ?>">
            <p>
            <?php echo $json_array[$id]->content; ?>
            </p>
        </div>
        <div class="side-bar-right">
                <?php 
                    for ($i = 2; $i < 6; $i++) {
                        echo "<a href='details.php?null=".$i."' class='item'>".
                        "<h5>".$json_array[$i]->header."</h5>".
                        "<img src='images/".$json_array[$i]->image."'>".
                        "</a>";
                    }
                ?>
        </div>    
    </div>
    <?php } ?>
</body>
</html>