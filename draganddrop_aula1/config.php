<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 27/06/2018
 * Time: 11:29
 */

define('DATABASE', [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASS' => '',
    'NAME' => 'play_draganddrop'
]);

require_once __DIR__ . '/Source/Crud/Conn.php';
require_once __DIR__ . '/Source/Crud/Read.php';
require_once __DIR__ . '/Source/Crud/Update.php';