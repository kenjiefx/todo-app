<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php site('Module Preview — '.$GLOBALS['module']); ?>
    </head>
    <body>
        <app xscope="<?php echo $GLOBALS['scope']; ?>">
            <?php module($GLOBALS['module']); ?>
        </app>
        <?php scope($GLOBALS['scope'].'.js') ?>
    </body>
</html>
