<?php
namespace App\Repository;
use App\Core\Abstract\AbstractRepository;
use App\Entity\User;
use PDO;

class userRepository extends AbstractRepository

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
       // var_dump($row);                         
       return User::toObject($row);


   }
    public function selectAll(){

    }
     public function insert($entity){
        $query = "INSERT INTO users (nom, prenom, login, password, adresse, nin, role_id,copie_cni) VALUES (:nom, :prenom, :login, :password, :adresse, :nin, :role_id, :copie_cni)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':nom' => $entity->getNom(),
            ':prenom' => $entity->getPrenom(),
            ':login' => $entity->getLogin(),
            ':password' => $entity->getPassword(),
            ':adresse' => $entity->getAdresse(),
            ':nin' => $entity->getNin(),
            ':role_id' => 1,
            ':copie_cni' => $entity->getCopieCni()
        ]);
        return $this->pdo->lastInsertId();

     }
     public function update($entity){

     }
     public function delete(){

     }

}
