<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
    <body>
        <?php 
            include_once 'header.php'; 
            include_once '../includes/dbh.inc.php';
            if (isset($_GET['num'])) {
                $id = $_GET['num'];
                $sql = "SELECT * FROM news";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $json_array = $row["json"];
                $json_array = json_decode($json_array);
                $expireTime = time() + 60*60*24;
                setcookie("update_id", $id, $expireTime, '../../finalProject/');
        ?>
        
        <form action="update.inc.php" method="post" class="form-upload" enctype="multipart/form-data">
            <h1>Admin Page</h1>
            <table>
                <tr>
                    <td>Header: </td>
                    <td><input type="text" name="header" value="<?php echo $json_array[$id]->header; ?>"></td>
                </tr>
                <tr>
                    <td>Janr:</td>
                    <td><input type="text" name="janr" value="<?php echo $json_array[$id]->janr; ?>"></td>
                </tr>
                <tr>
                    <td>Text:</td>
                    <td><textarea name="text" cols="30" rows="10" placeholder="Enter news text..."><?php echo $json_array[$id]->content; ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="file" name="pic"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add new"></td>
                </tr>
            </table>
        </form>
        <?php } ?>
    </body>
</html>
            