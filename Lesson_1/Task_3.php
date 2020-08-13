<?php

if (empty($_GET['path'])) {
    $path = "/";
} else {
    $path = $_GET['path'];
}

$dir = new DirectoryIterator($path);

foreach ($dir as $item) {
    if ($item->isDir()) {
        echo "<p>DIR <a href='/?path=" . $item->getPathname() . "'>" . $item . "</a></p>";
    } else {
        echo "<p>FILE " . $item->getBasename() . "</p>";
    }

}