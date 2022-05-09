<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web-Spinner</title>
    </head>
    <body>
        <?php 
            require_once "./SQL/DB_handleling/connect.php";
            $id = $_GET["id"];
            $result = preformQuery("SELECT * FROM user WHERE id = ".$id);
            $row = mysqli_fetch_array($result);
            if ($row["PFPath"] != null) {
                echo "<img class='pfp' src='http://rasm245r.elev.vtg.dk/".$row['PFPath']."'>";
            } else {
                echo "<svg class='pfp' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d='M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z'/></svg>";
            }
        ?>
        <br><br><br><br>
        <h4>Upload nyt profilbillede</h4><br>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="imgup"> <br>
            <input type="submit" name="sub">
        </form>
        <a href="../index.php">Back to main menu</a>
        <?php 
            $tempname = $_FILES['imgup']['tmp_name'];
            $imgname = $_FILES['imgup']['name'];
            $imgpath = 'DBimg/PFP/'.$imgname;

            if (isset($_POST["sub"])) {
                move_uploaded_file($tempname,$imgpath);
                preformQuery("UPDATE user SET PFPath = '$imgpath' WHERE id = '$id'");
                header("Location: https://rasm245r.elev.vtg.dk");
            }
        ?>
    </body>
</html>