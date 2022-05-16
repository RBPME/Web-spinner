<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web-Spinner</title>
    </head>
    <body>
        <a href="\index.php">Tilbage til hovedmenuen</a>

    <?php
        require_once "./SQL/DB_handleling/connect.php"; 
        session_start();
        $id = $_GET['id'];
        $result = preformQuery("SELECT * FROM content WHERE id = ".$id."");
        $row = mysqli_fetch_array($result);


        echo "<h1>".$row['title']."</h1> <br>";
        echo str_replace("\n", "<br>", $row['text']);
        echo '<br><br>';
        echo "<img src='https://rasm245r.elev.vtg.dk/".$row['imgpath']."' width='100px'>";
    
    ?>

        <hr>
        <br>
        <h2>Kommenter</h2>

        <?php 
            if ($_SESSION["LoggedIn"]) {
                echo "<form method='post' action='#'><textarea name='comm' id='' cols='30' rows='10'></textarea> <br><input type='submit' name='comt'></form>";
    
                if (isset($_POST["comt"])) {
                    $comment = $_POST["comm"];
                    $user = $_SESSION["UserId"];
                    preformQuery("INSERT INTO comment (parentId, comment, id) VALUES ('$id', '$comment', '$user')");
    
                    
                }
            }
        ?>
        <hr>
        <?php 
            $result = preformQuery("SELECT * FROM comment WHERE parentId = ".$id."");
            while ($row = mysqli_fetch_array($result)) {   
                $res = preformQuery("SELECT * FROM user WHERE id = ".$row['id']);
                $ro = mysqli_fetch_array($res);
                echo "<h5>".$ro['username']."</h5><br>";
                echo str_replace("\n", "<br>", $row['comment']);
                echo "<hr>";
                
            }

        ?>

    </body>
</html>