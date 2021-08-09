<?php
$nameCheck = file_get_contents("data.rtf");
$lines = explode(":", $nameCheck);

if (isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['radio'])) {
    session_start();
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['pass'] = $_POST['pass'];
    $_SESSION['radio'] = $_POST['radio'];
    if (isset($_SESSION["name"]) && isset($_SESSION["pass"]) && isset($_SESSION['radio'])) {
        $name = htmlspecialchars($_SESSION['name']);
        $pass = htmlspecialchars($_SESSION['pass']);
        $radio = htmlspecialchars($_SESSION['radio']);
        setcookie("name", $name, time() + 900);
        setcookie("radio", $radio, time() + 900);
        for ($i=0;$i<count($lines);$i++) {
            if (preg_match('/^[A-Za-z0-9]*$/', $name) && $name == trim($lines[$i]) && $pass == trim($lines[$i + 1]) && $radio == trim($lines[$i+2])) {
                switch ($radio) {
                    case "1":
                    {
                        echo '<p><h3>' . 'User page (You are next to Odins palace)' . '</h3></p>';
                        echo '<p><a href="https://blog.qagoma.qld.gov.au/wp-content/media/digital-blog-feature_Asgardian-throne-room.jpg">To the Palace</a></p>';
                        break;
                    }
                    case "2":
                    {
                        echo '<p><h3>' . 'Admin panel (Use Thors hammer)' . '</h3></p>';
                        echo '<p><a href="https://i.pinimg.com/474x/ab/e7/20/abe720f49fe94bb99e0af803aadbe356.jpg">Take a Hammer</a></p>';
                        break;
                    }
                    case "3":
                    {
                        echo '<p><h3>' . 'Manager page (Use Lokis deception)' . '</h3></p>';
                        echo '<p><a href="https://am24.mediaite.com/tms/cnt/uploads/2021/07/king-loki-loki-series.jpg">Use his deception</a></p>';
                        break;
                    }
                }
            }
        }
    }
}