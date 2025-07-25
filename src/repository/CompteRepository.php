<?php
namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Compte;
use App\Entity\User;
use PDO;


class CompteRepository extends AbstractRepository

{
   private static ?CompteRepository $instance = null;
  

   public function __construct()
   {
       parent::__construct();
       $this->table='compte';
   }

   public static function getInstance(): CompteRepository
   {
       if (self::$instance === null) {
           self::$instance = new CompteRepository();
       }
       return self::$instance; 
   }
    public function selectAll(){

    }
     public function insert($entity){

     }
     public function update($entity){

     }
     public function delete(){

     }
     public function findByUser(User $user) {

        $query= 'select * from '. $this->table . ' where users_id = :user_id';

        $stmt=$this->pdo->prepare($query);
        $stmt->execute([
            'user_id'=>$user->getId()
        ]);

        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return array_map(fn($compte)=> Compte::toObject($compte),$rows);
        

     }
    public function getTransactionsByCompte($compte_id)
    {
        $sql = "SELECT 
                    id,
                    date,
                    compte_id,
                    montant,
                    typetransaction,
                    status
                FROM transaction 
                WHERE compte_id = :compte_id
                ORDER BY date DESC
                LIMIT 10";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':compte_id', $compte_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
