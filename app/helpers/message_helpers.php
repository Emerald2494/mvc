<?php

function setMessage($name, $description)
{
    session_start();
    $_SESSION[$name] = $description;
}

 function unsetMessage($name)
{
    unset($_SESSION[$name]);
}