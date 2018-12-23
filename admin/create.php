<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
    <body>
        <?php include_once 'header.php'; ?>
        
        <form action="../includes/add.inc.php" method="post" class="form-upload" enctype="multipart/form-data">
            <h1>Admin Page</h1>
            <table>
                <tr>
                    <td>Header: </td>
                    <td><input type="text" name="header">
                </tr>
                <tr>
                    <td>Janr:</td>
                    <td><input type="text" name="janr"></td>
                </tr>
                <tr>
                    <td>Text:</td>
                    <td><textarea name="text" cols="30" rows="10" placeholder="Enter news text..."></textarea></td>
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
    </body>
</html>