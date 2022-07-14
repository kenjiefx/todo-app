<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php site('Dashboard - $5 Task'); ?>
    </head>
    <body>
        <?php module('Loader'); ?>
        <app xscope="Main">
            <button type="button" name="button" xclick="test()">Get Tasks</button>
        </app>
        <?php scope('Main.js') ?>
    </body>
</html>
