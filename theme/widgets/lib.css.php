<?php

$dir = __dir__.'/lib-css/styles';
$libs = scandir($dir);
foreach ($libs as $lib) {
    if ($lib!=='.'&&$lib!=='..') {
        include $dir.'/'.$lib;
    }
}

$dir = __dir__.'/lib-css/modules';
$libs = scandir($dir);
foreach ($libs as $lib) {
    if ($lib!=='.'&&$lib!=='..') {
        include $dir.'/'.$lib;
    }
}
