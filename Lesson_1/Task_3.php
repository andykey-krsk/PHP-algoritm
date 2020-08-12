<?php
if ($_GET['path'] != '') {
    $path = $_GET['path'];
}else{
    $path = '/';
}
$dir = new DirectoryIterator($path);

foreach ($dir as $item) {
    echo "<p><a href='/?path=". $item ."'>" . $item . "</a></p>" . PHP_EOL;
}