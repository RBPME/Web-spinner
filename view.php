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
        session_start();
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

        <hr>
        <br>
        <h2>Kommenter</h2>
        <form method="post" action="#">
            <textarea name="comm" id="" cols="30" rows="10"></textarea> <br>
            <input type="submit">
        </form>

        <?php 
            if ($_SESSION["comm"] != $_POST["comm"]) {
                $_SESSION["comm"] = $_POST["comm"];
                $comment = $_POST["comm"];
                preformQuery("INSERT INTO comment (parentId, comment) VALUES ('$id', '$comment')");

                
            }
        ?>
        <hr>
        <?php 
            $result = preformQuery("SELECT * FROM comment WHERE parentId = ".$id."");
            while ($row = mysqli_fetch_array($result)) {

                echo str_replace("\n", "<br>", $row['comment']);
                echo "<hr>";
                
            }

        ?>

    </body>
</html>