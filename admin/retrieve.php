<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/retrieve.js" defer></script>
    <title>Document</title>
</head>
    <body>
        <?php 
            include_once 'header.php';
            include_once '../includes/dbh.inc.php';
            $sql = "SELECT * FROM news";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            //UPDATE `users` SET `user_last` = 'Bulanbaye' WHERE `users`.`user_id` = 1

            $json_array = Array();
            while ($row = mysqli_fetch_assoc($result)) {
                //$x = str_replace(array("\""), '"', $row["json"]);
                //$json_array = str_replace(array("\r", "\n", "\ "), ' ', $x);
                $json_array = $row["json"];
            }
            $fp = fopen('../news/news.json', 'w');
            fwrite($fp, $json_array);
            fclose($fp);

            if(isset($_GET['delete'])) {
                $delete = $_GET['delete'];
                $json_array = json_decode($json_array);
                $myFile = "../images/" . $json_array[$delete]->image;
                echo $myFile;
                unlink($myFile) or die("Couldn't delete file");
                array_splice($json_array, $delete, 1);
                $json_array = json_encode($json_array);
                $sql = "UPDATE `news` SET `json` = '$json_array'";
                $result = mysqli_query($conn,$sql);
                $fp = fopen('../news/news.json', 'w');
                fwrite($fp, $json_array);
                fclose($fp);
                header("Location: ../admin/retrieve.php");
            }

        ?>
        <div class="news">
           
        </div>  
    </body>
</html>