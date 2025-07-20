<?php
namespace App\Repository;
class TransactionRepository {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getSoldePrincipalByUserId($userId, $typePrincipalId) {
        $sql = "SELECT solde FROM compte WHERE users_id = :user_id AND typecompte_id = :type_principal_id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':type_principal_id' => $typePrincipalId
        ]);
        $result = $stmt->fetch();
        return $result ? $result['solde'] : 0;
    }

    public function selectLastTransactions($compteId, $limit = 10) {
        $sql = "SELECT date, typetransaction, montant FROM transaction WHERE compte_id = :compte_id ORDER BY date DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':compte_id', $compteId, \PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
