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
            session_start();
        ?>
        <img src="Images/LogoWebSpinner.svg" alt="">
        <br>
        <br>
        <?php 
            if ($_SESSION['LoggedIn']) {
                echo '<a href="Logout.php">Log-out</a><br><a href="Writepost.php">make a post</a><br>';
            } else {
                echo '<a href="Login.php">Log-in</a><br><a href="signup.php">Sign-up</a><br>';
            }
        ?>
        <br>
        <br>
        <br>
        <br>
        <h4>Opslag</h4>
        <?php 
            require_once "./SQL/DB_handleling/connect.php";
            $result = preformQuery("SELECT * FROM content");
            while ($row = mysqli_fetch_array($result)) {
                echo '<br><br>';
                echo '<a href="https://rasm245r.elev.vtg.dk/view.php/?id='.$row['id'].'">'.$row['title'].'</a>';
                echo "<br><img src='https://rasm245r.elev.vtg.dk/".$row['imgpath']."' width='100px'>";
            }
        ?>
    </body>
</html>