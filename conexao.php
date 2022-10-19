<?php
define('HOST','localhost');
define('DB','rede_facil');
define('USER','root');
define('PASSW', '');

$cx = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSW);