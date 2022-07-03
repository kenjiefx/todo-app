<?php

$app = __dir__.'/app-js';

include $app.'/main.js';
if (is_dir($app.'/Factories')) {
    $factories = scandir($app.'/Factories');
    foreach ($factories as $factory) {
        if ($factory!=='.'&&$factory!=='..') {
            include $app.'/Factories/'.$factory;
        }
    }
}

if (is_dir($app.'/Modules')) {
    $modules = scandir($app.'/Modules');
    foreach ($modules as $module) {
        if ($module!=='.'&&$module!=='..') {
            include $app.'/Modules/'.$module;
        }
    }
}

if (is_dir($app.'/Services')) {
    $services = scandir($app.'/Services');
    foreach ($services as $service) {
        if ($service!=='.'&&$service!=='..') {
            include $app.'/Services/'.$service;
        }
    }
}
