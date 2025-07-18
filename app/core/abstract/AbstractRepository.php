<?php
 namespace App\Core\Abstract;
use App\Core\App;



abstract class AbstractRepository
{
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo = App::getDependency('database');
    }
}