<?php define('PAGE_TITLE','To Do App'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include SERVER_ROOT.'/theme/sections/head.php'; ?>
    </head>
    <body class="bg-page">
        <?php include SERVER_ROOT.'/theme/sections/loader.php'; ?>
        <app id="main" xscope="IndexRouter" class="h100"></app>
        <script type="text/javascript">
            <?php include SERVER_ROOT.'/theme/widget/app-js/Scopes/IndexRouter.js'; ?>
        </script>
    </body>
</html>
