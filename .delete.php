<?php

$dir = $_GET['dir'];

if (is_dir($dir)) {
rmdir($dir);
}
else {
unlink();
}

header("Location://emtestserver.ddns.net/~test1/");
exit();

?>
