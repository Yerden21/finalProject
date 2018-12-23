<?php 
    include_once '../includes/dbh.inc.php';
    $sql = "SELECT * FROM news";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $json_array = $row["json"];
    
    if(isset($_POST['header'])) {
        $arr['header'] = $_POST['header'];
        $arr['janr'] = $_POST['janr'];
        $arr['content'] = $_POST['text'];

        $id = $_COOKIE['update_id'];
        echo $id;

        if (isset($_FILES['pic'])) {
            $target_dir = "../images/";
            $nameOfFile = explode(".", basename($_FILES["pic"]["name"]));
            print_r ($nameOfFile);
            $json = json_decode($json_array);
            $target_file = $target_dir . $nameOfFile[0] . sizeof($json) . "." . $nameOfFile[1];
            $arr['image'] = $nameOfFile[0] . sizeof($json) . "." . $nameOfFile[1];
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
                if ($json_array == 'null') {
                    $json_array = array();
                    echo 'nullllllll';
                }
                else 
                    $json_array = json_decode($json_array);
                $json_array[$id] = $arr;
                print_r ($json_array);
                $json_array = json_encode($json_array);
                $sql = "UPDATE `news` SET `json` = '$json_array'";
                echo $sql;
                $result = mysqli_query($conn,$sql);
                if (!$result) {
                    trigger_error('Invalid query: ' . mysql_error());
                }
                $fp = fopen('../news/news.json', 'w');
                fwrite($fp, $json_array);
                fclose($fp);
                header("Location: ../admin/retrieve.php");
                exit();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    
    }

?>