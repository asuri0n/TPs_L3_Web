<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 22/03/2018
 * Time: 16:45
 */

interface AccountStorage
{
    function checkAuth($login, $password);
}