<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web-Spinner</title>
    </head>
    <body>
        <form method="post" action="">
            <textarea name="textinp" id="" cols="30" rows="10"></textarea><br>
            <input type="file" name="imgup"> <br>
            <input type="submit">
        </form>

        <?php 

            $storetext = str_replace("\n", "<br>", $_POST['textinp']);
        
        ?>

    </body>
</html>