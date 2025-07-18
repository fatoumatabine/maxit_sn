<?php
namespace App\Repository;
use App\Core\Abstract\AbstractRepository;
use App\Entity\User;
use App\Core\App;
use PDO;

class UserRepository extends AbstractRepository
{
   private static ?UserRepository $instance = null;
  

   public function __construct()
   {
       parent::__construct();
   }

   public static function getInstance(): UserRepository
   {
       if (self::$instance === null) {
           self::$instance = new UserRepository();
       }
       return self::$instance; 
   }


 

   public function findByLogin(string $login)
   {
       $query = "SELECT * FROM users WHERE login = :login";
       $stmt = $this->pdo->prepare($query);
     
       $stmt->execute([
              ':login' => $login
         ]);
      
      // $this->pdo->FETCH (PDO::FETCH_ASSOC);
             
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
       if (!$row) {
           return null;
        }
        var_dump($row);                         
       return User::toObject($row);

   }
}
