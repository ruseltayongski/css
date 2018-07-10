<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

//PDO
$db['default'] = array(
'dsn'  => 'mysql:host=localhost; dbname=survey; charset=utf8;',
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => '',
'dbdriver' => 'pdo');

