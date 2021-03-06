<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web-Spinner</title>
        <script language="JavaScript" type="text/javascript" src='JS/darkmode.js'></script>
        <link rel="stylesheet" href="css/index.min.css">
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
    <?php 
        /*
        if ($_SESSION['LoggedIn']) {
            echo '<a href="Logout.php">Log-out</a><br><a href="Writepost.php">make a post</a><br>';
        } else {
            echo '<a href="Login.php">Log-in</a><br><a href="signup.php">Sign-up</a><br>';
        }
        */
        ?>



        <main id="content">
            <div class="posts">
                <ul>
                    <?php 
                        require_once "./SQL/DB_handleling/connect.php";
                        $result = preformQuery("SELECT * FROM content");
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<li>';
                            echo "<a href='https://rasm245r.elev.vtg.dk/view.php/?id=".$row['id']."'><div class='postdiv' id='postdiv'><div class='img'><img src='https://rasm245r.elev.vtg.dk/".$row['imgpath']."' width='100px'></div>";
                            echo '<div class="title">'.$row['title']."</div></div>";
                            echo "</a></li>";
                        }
                    ?>
                </ul>
            </div>



        </main>
        <div class="sidebar" id="sidebar" onclick="expand()">
            <ul class="navlist">
                <li class="nav-item">
                    <a href="http://rasm245r.elev.vtg.dk/">
                        <div class="logodiv">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="266.1 96.7 105.21 224.82" class="logo">
                                <g transform="translate(0.000000,496.000000) scale(0.100000,-0.100000)" stroke="none">
                                    <path d="M2811 3954 c121 -131 189 -268 189 -384 0 -103 -42 -198 -182 -408 -126 -189 -150 -245 -156 -353 -3 -71 0 -99 17 -150 22 -65 98 -196 86 -149 -3 14 -15 58 -25 99 -24 89 -25 128 -5 205 23 88 34 101 28 31 -13 -150 65 -314 234 -491 63 -66 206 -194 217 -194 4 0 -25 37 -65 82 -140 161 -220 312 -240 454 -18 132 3 221 111 460 90 199 103 244 98 353 -3 77 -7 96 -40 163 -42 83 -169 228 -254 287 l-49 34 36 -39z"/>
                                    <path d="M3559 3693 c-73 -61 -191 -210 -230 -288 -74 -150 -82 -256 -39 -504 40 -228 16 -381 -86 -543 l-26 -41 55 48 c99 85 159 177 173 266 l8 44 17 -55 c32 -103 44 -213 31 -296 -26 -163 -105 -333 -229 -489 -81 -101 -81 -101 -46 -77 50 35 223 229 276 308 91 139 136 261 137 379 l1 60 14 -33 c40 -92 35 -214 -15 -319 -16 -35 -25 -63 -21 -63 12 0 88 112 113 166 17 39 21 68 21 144 1 119 -22 181 -144 396 -144 252 -174 341 -166 484 2 47 14 114 25 150 21 63 94 190 148 258 32 39 26 41 -17 5z"/>
                                    <path d="M3220 3565 c-15 -19 1 -65 23 -65 18 0 56 29 39 30 -8 0 -12 9 -10 23 4 27 -32 36 -52 12z"/>
                                </g>
                            </svg>
                            <span>web-spinner</span>
                        </div>
                    </a>
                </li>
                    <?php 

                        if ($_SESSION["LoggedIn"]) {

                            //Profil
                            echo "<li class='nav-item'><a href='http://rasm245r.elev.vtg.dk/profile.php/?id=".$_SESSION["UserId"]."'><div class='logodiv'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d='M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z'/></svg><span>profile</span></div></a></li>";
                            
                            //Skriv opslag
                            echo "<li class='nav-item'><a href='http://rasm245r.elev.vtg.dk/Writepost.php'><div class='logodiv'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d='M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V299.6L289.3 394.3C281.1 402.5 275.3 412.8 272.5 424.1L257.4 484.2C255.1 493.6 255.7 503.2 258.8 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM564.1 250.1C579.8 265.7 579.8 291 564.1 306.7L534.7 336.1L463.8 265.1L493.2 235.7C508.8 220.1 534.1 220.1 549.8 235.7L564.1 250.1zM311.9 416.1L441.1 287.8L512.1 358.7L382.9 487.9C378.8 492 373.6 494.9 368 496.3L307.9 511.4C302.4 512.7 296.7 511.1 292.7 507.2C288.7 503.2 287.1 497.4 288.5 491.1L303.5 431.8C304.9 426.2 307.8 421.1 311.9 416.1V416.1z'/></svg><span>Write a post</span></div></a></li>";
                            
                            //Log ud
                            echo "<li class='nav-item'><a href='http://rasm245r.elev.vtg.dk/Logout.php'><div class='logodiv'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d='M96 480h64C177.7 480 192 465.7 192 448S177.7 416 160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64C177.7 96 192 81.67 192 64S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256C0 437 42.98 480 96 480zM504.8 238.5l-144.1-136c-6.975-6.578-17.2-8.375-26-4.594c-8.803 3.797-14.51 12.47-14.51 22.05l-.0918 72l-128-.001c-17.69 0-32.02 14.33-32.02 32v64c0 17.67 14.34 32 32.02 32l128 .001l.0918 71.1c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C514.4 264.4 514.4 247.6 504.8 238.5z'/></svg><span>Log-out</span></div></a></li>";
                        } else {
                            //Log in
                            echo "<li class='nav-item'><a href='http://rasm245r.elev.vtg.dk/Login.php'><div class='logodiv'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d='M344.7 238.5l-144.1-136C193.7 95.97 183.4 94.17 174.6 97.95C165.8 101.8 160.1 110.4 160.1 120V192H32.02C14.33 192 0 206.3 0 224v64c0 17.68 14.33 32 32.02 32h128.1v72c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C354.3 264.4 354.3 247.6 344.7 238.5zM416 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c17.67 0 32 14.33 32 32v256c0 17.67-14.33 32-32 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c53.02 0 96-42.98 96-96V128C512 74.98 469 32 416 32z'/></svg><span>Log-in</span></div></a></li>";
                        }

                    ?>
                    <!--
                        <a href='Writepost.php'>
                            <div class='logodiv'>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. <path d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V299.6L289.3 394.3C281.1 402.5 275.3 412.8 272.5 424.1L257.4 484.2C255.1 493.6 255.7 503.2 258.8 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM564.1 250.1C579.8 265.7 579.8 291 564.1 306.7L534.7 336.1L463.8 265.1L493.2 235.7C508.8 220.1 534.1 220.1 549.8 235.7L564.1 250.1zM311.9 416.1L441.1 287.8L512.1 358.7L382.9 487.9C378.8 492 373.6 494.9 368 496.3L307.9 511.4C302.4 512.7 296.7 511.1 292.7 507.2C288.7 503.2 287.1 497.4 288.5 491.1L303.5 431.8C304.9 426.2 307.8 421.1 311.9 416.1V416.1z"/></svg>
                                <span>Write a post</span>
                            </div>
                        </a>
                    -->
            </ul>
        </div>
    </body>
</html>