<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web-Spinner</title>
        <script src='JS/darkmode.js'></script>
        <link rel="stylesheet" href="index.css">
    </head>
    <body class="light" onload="loaded()">
        <?php 
            session_start();
        ?>
        <!--
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="662.000000pt" height="496.000000pt" viewBox="0 0 662.000000 496.000000" preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,496.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                <path d="M2811 3954 c121 -131 189 -268 189 -384 0 -103 -42 -198 -182 -408
                -126 -189 -150 -245 -156 -353 -3 -71 0 -99 17 -150 22 -65 98 -196 86 -149
                -3 14 -15 58 -25 99 -24 89 -25 128 -5 205 23 88 34 101 28 31 -13 -150 65
                -314 234 -491 63 -66 206 -194 217 -194 4 0 -25 37 -65 82 -140 161 -220 312
                -240 454 -18 132 3 221 111 460 90 199 103 244 98 353 -3 77 -7 96 -40 163
                -42 83 -169 228 -254 287 l-49 34 36 -39z"/>
                <path d="M3559 3693 c-73 -61 -191 -210 -230 -288 -74 -150 -82 -256 -39 -504
                40 -228 16 -381 -86 -543 l-26 -41 55 48 c99 85 159 177 173 266 l8 44 17 -55
                c32 -103 44 -213 31 -296 -26 -163 -105 -333 -229 -489 -81 -101 -81 -101 -46
                -77 50 35 223 229 276 308 91 139 136 261 137 379 l1 60 14 -33 c40 -92 35
                -214 -15 -319 -16 -35 -25 -63 -21 -63 12 0 88 112 113 166 17 39 21 68 21
                144 1 119 -22 181 -144 396 -144 252 -174 341 -166 484 2 47 14 114 25 150 21
                63 94 190 148 258 32 39 26 41 -17 5z"/>
                <path d="M3220 3565 c-15 -19 1 -65 23 -65 18 0 56 29 39 30 -8 0 -12 9 -10
                23 4 27 -32 36 -52 12z"/>
            </g>
        </svg>
        -->
        <div class="bar">
            <h2>OPSLAG</h2>
        </div>
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