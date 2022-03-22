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
        $id = $_GET['id'];
        $result = preformQuery("SELECT * FROM content WHERE id = ".$id."");
        $row = mysqli_fetch_array($result);
    ?>

    <h1><?php echo $row['title']; ?></h1> <br>
        <?php
        
            echo str_replace("\n", "<br>", $row['text']);
            echo '<br><br>';
            echo "<img src='https://rasm245r.elev.vtg.dk/".$row['imgpath']."' width='100px'>";
        
        ?>

    </body>
</html>