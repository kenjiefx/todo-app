<?php

$app = __dir__.'/app-js';
include $app.'/main.js';

$factories = scandir($app.'/Factories');
foreach ($factories as $factory) {
    if ($factory!=='.'&&$factory!=='..') {
        include $app.'/Factories/'.$factory;
    }
}

$services = scandir($app.'/Services');
foreach ($services as $service) {
    if ($service!=='.'&&$service!=='..') {
        include $app.'/Services/'.$service;
    }
}

$scopes = scandir($app.'/Scopes');
foreach ($scopes as $scope) {
    if ($scope!=='.'&&$scope!=='..') {
        include $app.'/Scopes/'.$scope;
    }
}
