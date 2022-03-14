<!DOCTYPE html>
<html>
    <head>
    <script src="/JS/password.js">
    </script>
    </head>
    <body onload="variables()">
        <div class="formdiv">
            <form method="POST" action="">
                <input type="text" name="user"> <br>
                <input type="password" name="pass" id="pass"> <button type="button" onclick="clicked()"><img src="/SVG/circle_full.svg" width="8rem"></button> <br>
                <input type="submit" value="Log in">
            </form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <?php 
                require_once "./SQL/DB_handleling/connect.php";
                if ($_POST["user"] != null && $_POST["pass"] != null) {
                    echo "fghjk";
                    if (!userExists($_POST["pass"])) {
                        echo "The user does not exist. You can sign up <a href='SignUp.php'>here.</a>";
                    } else if (passMatch($_POST["user"], $_POST["pass"])) {
                        $_SESSION['LoggedIn'] = true;
                        $_SESSION['UserId'] = getUserId($_POST["user"]);

                        echo "logged in";
                    } else {
                        echo "Wrong password";
                    }
                } else {
                    echo "You fucked up";
                }

            ?>

        </div>

        <?php 
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