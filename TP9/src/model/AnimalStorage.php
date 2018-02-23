<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 23/02/2018
 * Time: 10:51
 */

interface AnimalStorage
{
    function read($id);

    function readAll(): array;
}