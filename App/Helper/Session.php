<?php
session_start();


/**
 * isLoggedIn
 *checks if user is logged in or not
 * @return boolean
 */
function isLoggedIn()
{
    if (isset($_SESSION["username"])) {
        return true;
    }
    return false;
}
/**
 * logout
 *destroys and unset session
 * @return void
 */
