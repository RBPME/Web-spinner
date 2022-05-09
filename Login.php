<!DOCTYPE html>
<html>
    <head>
        <script src="/JS/password.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web-Spinner</title>
    </head>
    <body onload="variables()">
        <div class="formdiv">
            <form method="POST" action="">
                <input type="text" name="user"> <br>
                <input type="password" name="pass" id="pass"> <button type="button" onclick="clicked()"><img src="Find et billede senere" width="8rem"></button> <br>
                <input type="submit" value="Log in">
            </form>
            <a href="index.php">Back to main menu</a>
            
            <?php 
                require_once "./SQL/DB_handleling/connect.php";



                if ($_POST["user"] != null && $_POST["pass"] != null) {
                    if (!userExists($_POST["user"])) {
                        echo "The user does not exist. You can sign up <a href='signup.php'>here.</a>";
                    } else if (passMatch($_POST["user"], $_POST["pass"])) {
                        $_SESSION['LoggedIn'] = true;
                        $_SESSION['UserId'] = getUserId($_POST["user"]);
                        header("Location: https://rasm245r.elev.vtg.dk");
                    } else {
                        echo "Wrong password";
                    }
                }



                //never gonna give you up
                //never gonna let you down
                //never gonna run around and desert you
                
                //never gonna make you cry
                //never gonna say goodbye
                //never gonna tell a lie and hurt you

            ?>

        </div>

        <?php 

            //Tjekker om brugernavn er i DB
            function userExists($e) {
                $result = preformQuery("SELECT username FROM user");
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['username'] == $e) {
                        return true;
                    }
                }
            }

            //Tjekker om password passer til brugernavn
            function passMatch($u, $p) {
                $result = preformQuery("SELECT password FROM user WHERE username = '$u'");
                while ($row = mysqli_fetch_array($result)) {
                    return $row['password'] == hash('sha256', $p, false);
                }
            }

            //Finder brugerid i DB
            function getUserId($e) {
                $result = preformQuery("SELECT id FROM user WHERE username = '$e'");
                while ($row = mysqli_fetch_array($result)) {
                    return $row['id'];
                }
            }
        ?>

    </body>
</html>