<!DOCTYPE html>
<!-- html for udsene-->
<html>
    <head>
        <title>Web-Spinner</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>


    <!-- input af vores email kode og brugernavn-->
    <body>
        <?php require_once './SQL/DB_handleling/connect.php'; ?>

        <!-- får brugerens input -->
        <form action="#" method="post">
            E-mail: <input type="text" name="Email"><br>
            Username: <input type="text" name="user"><br>
            Password: <input type="password" name="pass"><br>
            <input type="submit">
        </form>

        <?php

            
            $Email=$_POST["Email"];
            $name=$_POST["user"];
            $pass=$_POST["pass"];
            $passhash=hash('sha256', $pass, false);

            //Læser DB
            $result = preformQuery("SELECT * From user");

            //Tjekker om E-mail er tilgængelig
            function EmailAvailable($e) {
                global $result;
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['email'] == $e || $e == null) {
                        return false;
                    }
                }
                return true;
            }

            //Tjekker om brugernavn er tilgængelig
            function nameAvailable($e) {
                global $result;
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['username'] == $e || $e == null) {
                        return false;
                    }
                }
                return true;
            }

            //Indsætter værdier i DB
            if (EmailAvailable($Email) && nameAvailable($name) && $pass != null) {
                preformQuery("INSERT INTO user (username, password, email) VALUES ('$name', '$passhash', '$Email')");
            }

        ?>

    </body>
</html>
