<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
define ('DSN',$_ENV['DSN_POSTGRES']);
define ('DB_USER',$_ENV['DB_USER']);
define ('DB_PASSWORD',$_ENV['DB_PASSWORD']);
define ('DB_NAME',$_ENV['DB_NAME']);
define ('DB_CONNECTION',$_ENV['DB_CONNECTION']);
define ('BASE_DSN_MYSQL',$_ENV['BASE_DSN_MYSQL']);
define ('BASE_DSN_PGSQL',$_ENV['BASE_DSN_PGSQL']);




