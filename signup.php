<!DOCTYPE html>
<!-- html for udsene-->
<html>
    <head>
        <title>RASMUS</title>
        <link rel="icon" type="image/x-icon" href="../../SVG/terminal.svg">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>


<!-- indput af vores email kode og brugernavn-->
    <body>
        <?php require_once './SQL/DB_handleling/connect.php'; ?>
        <form action="#" method="post">
            E-mail: <input type="text" name="Email"><br>
            Username: <input type="text" name="user"><br>
            Password: <input type="password" name="pass"><br>
            <input type="submit">
        </form>

        <?php

//læser DB
            $Email=$_POST["Email"];
            $name=$_POST["user"];
            $pass=$_POST["pass"];
            $passhash=hash('sha256', $pass, false);

            $result = preformQuery("SELECT * From user");

//tjekker om email er tilgengeligt
            function EmailAvailable($e) {
                global $result;
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['email'] == $e || $e == null) {
                        return false;
                    }
                }
                return true;
            }

//tjekker om brugernavnet er tilgengeligt
            function nameAvailable($e) {
                global $result;
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['username'] == $e || $e == null) {
                        return false;
                    }
                }
                return true;
            }

            if (EmailAvailable($Email) && nameAvailable($name) && $pass != null) {
                preformQuery("INSERT INTO user (username, password, email) VALUES ('$name', '$passhash', '$Email')");
            }

        ?>

    </body>
</html>
