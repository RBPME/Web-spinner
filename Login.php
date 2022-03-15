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
            
            <?php 
                require_once "./SQL/DB_handleling/connect.php";
                if ($_POST["user"] != null && $_POST["pass"] != null) {
                    if (!userExists($_POST["pass"])) {
                        echo "The user does not exist. You can sign up <a href='SignUp.php'>here.</a>";
                    } else if (passMatch($_POST["user"], $_POST["pass"])) {
                        $_SESSION['LoggedIn'] = true;
                        $_SESSION['UserId'] = getUserId($_POST["user"]);
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
                global $result;
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['username'] == $e) {
                        return true;
                        break;
                    } else {
                        continue;
                    }
                }
                return false;  
            }

            //Tjekker om password passer til brugernavn
            function passMatch($u, $p) {
                global $result;
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['username'] == $u) {
                        if ($row['password'] == hash('sha256', $p, false)) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        continue;
                    }
                }
                return false;
            }

            //Finder brugerid i DB
            function getUserId($e) {
                global $result;
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['username'] == $e) {
                        return $row['id'];
                        break;
                    } else {
                        continue;
                    }
                }
                return null;
            }
        ?>

    </body>
</html>