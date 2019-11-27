<?php
function isActive($url) {
    $query = $_SERVER['PHP_SELF'];
    $path = pathinfo($query);
    $base = $path['basename'];
    if($url === $base) {
        echo "active";
    } else if($url . ".php" === $base) {
        echo "active";
    } else {
        echo "";
    }
}
?>