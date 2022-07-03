<?php

function site(
    string $title
    )
{
    echo '<title>'.$title.'</title>';
    include ROOT.'/theme/assets/stylesheets.php';
    include ROOT.'/theme/assets/scripts.php';
}

function scope(
    string $name
    )
{
    echo '<script type="text/javascript">';
    include ROOT.'/theme/widgets/app-js/Scopes/'.$name;
    echo '</script>';
}

function module(
    string $name
    )
{
    include ROOT.'/theme/modules/'.$name.'.php';
}
