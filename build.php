<?php

/**
* php -S 127.0.0.1:5701 build.php
* http://127.0.0.1:5701/preview/module/footer?scope=IndexPage
**/

chdir(__dir__);
define('ROOT',__dir__);
require 'strawberry/autoloader.php';

$builder = new Builder;
$builder->build();
