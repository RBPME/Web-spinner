<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web-Spinner</title>
    </head>
    <body>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="text" name="title"><br>
            <textarea name="textinp" id="" cols="30" rows="10"></textarea><br>
            <input type="file" name="imgup"> <br>
            <input type="submit">
        </form>

        <?php 
            require_once "./SQL/DB_handleling/connect.php";
            $title = $_POST['title'];
            $text = $_POST['textinp'];
            $tempname = $_FILES['imgup']['tmp_name'];
            $imgname = $_FILES['imgup']['name'];
            $imgpath = 'DBimg/'.$imgname;


            
            //echo "<img src='".$row['img_path']."' width='100px'>";
            if ($title != null) {
                move_uploaded_file($tempname,$imgpath);
                preformQuery("INSERT INTO content (text, imgpath, title) VALUES ('$text', '$imgpath', '$title')");
            }

            //$storetext = str_replace("\n", "<br>", $_POST['textinp']);


            // **************************************************************************************
            //PLAN
            // *************************************************************************************


            //how to store
            //Store text in DB
            //Store img on serv
            //Store img path on DB
            //give auto id in DB

            //how to view
            //GET id (store in url)
            //get text
            //get img
            //display on page
        
        ?>

    </body>
</html>