<?php
session_start();

$name=$_REQUEST['httpd_username'];
$pwd=$_REQUEST['httpd_password'];
$cookievalue = 'kaka';

setcookie('$name', '$cookievalue', time() + (15), "/");

    $_SESSION['timestamp']= $_COOKIE;


?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Directory Contents</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>
    <div id="wrapper">
    <header>
        <h1>emtestserver.ddns.net</h1>
        <a href="logout.php">Logga ut</a>
    </header>

<section class="content">

<br>

    <h2>Directory Contents</h2>

<table>
 <tr><th>Namn</th><th>Storlek</th></tr>
  <?php

    $dir = "/home/test1/public_html";
    if ( is_dir($dir)){
       if ($dh = opendir($dir)) {
         while (($file = readdir($dh)) !==false) {
          $newfile = basename($file, ".php");     // tar bort php extension på alla filer
          $pattern = "/\./";                      // tar bort alla filer som börjar på punkt
          $size=number_format(filesize($file));
          if (preg_match_all($pattern, $newfile)){   // matchar allt med ovanstående och hoppar över om det stämmer
            continue;
           }
               echo "<tr>" . "<td>" . "<a href='$file'>$newfile</a>". "</td>"  .  "<td>" . "$size" . " " . "kB" . "</td>" . "<td>" .  "<a href='.delete.php?dir=$newfile'>Ta Bort</a>" . "</td></td>";
        }
        closedir($dh);
  }
}

?>

</section>

   
   <?php
       function createDirectory() {
           $add = $_POST["add"];
   
        mkdir("".$add);
        mkdir("".$add);
        chdir("/home/test1/public_html/");
    }
?>
    <?php
        if (!isset($_POST['submit'])) {
    ?>
        <form action = "index.php" method = "post">
                    <input type = "text" name = "add" id = "add" />
                    <input type = "submit" name = "submit" value = "Skapa mapp" />
        </form>
    <?php
        }
        else {
            createDirectory();
            header("Location://emtestserver.ddns.net/~test1/");
                exit();
        }
?>

</div>

</body>
</html>
