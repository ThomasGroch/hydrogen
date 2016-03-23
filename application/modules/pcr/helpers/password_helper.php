<?php

/**
 * Helper to work with password hash
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
function hash_password($password, $salt)
{

    if ( !isset($password, $salt) )
    {
        return FALSE;
    }

    return sha1($password . $salt);
}