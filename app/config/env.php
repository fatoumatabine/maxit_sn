<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
define ('DSN',$_ENV['DSN_POSTGRES']);
define ('DB_USER',$_ENV['DB_USER']);
define ('DB_PASSWORD',$_ENV['DB_PASSWORD']);
