<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Core\App;
use App\Core\Session;
use App\Entity\compte;
use App\Repository\CompteRepository;
use App\Entity\User;
use App\Service\CompteService;
use Symfony\Component\Yaml\Yaml;

class ClientController extends AbstractController
{
    protected $layout = 'client.layout';
    private CompteService $compteService;

     public function __construct(){

        parent::__construct();
        $this->compteService=App::getDependency('compteService');
        
       
    }
    public function index()
    {
        $user = $this->session->get('user');
                // var_dump($user); die;

        $user = User::toObject($user);

        $listComptes = $this->compteService->getComptesByUser($user);

        $comptePrincipal = null;
        $comptesSecondaires = [];
        foreach ($listComptes as $compte) {
            if (method_exists($compte, 'getTypeCompte') && $compte->getTypeCompte()->value === 'Principal') {
                $comptePrincipal = $compte;
            } else {
                $comptesSecondaires[] = $compte;
            }
        }

        // Récupérer les transactions du compte principal
        $transactions = [];
        if ($comptePrincipal) {
            $transactions = \App\Repository\CompteRepository::getInstance()->getTransactionsByCompte($comptePrincipal->getId());
        }

        $data = [
            'comptePrincipal' => $comptePrincipal ? $comptePrincipal->toArray() : null,
            'comptesSecondaires' => array_map(fn($compte) => $compte->toArray(), $comptesSecondaires),
            'transactions' => $transactions
        ];

        $this->session->set('comptePrincipal', $data['comptePrincipal']);
        $this->session->set('comptesSecondaires', $data['comptesSecondaires']);
        $this->renderHtml('client/index', $data);
    }

    public function create()
    {
        require_once __DIR__ . '/../templates/account/create.php';
    }
  
public function showTransactions() {
    $comptePrincipalId = $this->session->get('comptePrincipal')['id'] ;
    $transactions = CompteRepository::getInstance()->getTransactionsByCompte($comptePrincipalId);
    $this->session->set('transactions', $transactions);
    $this->renderHtml('client/transactions', [
        'transactions' => $transactions
    ]);
    ob_start();
    require_once __DIR__ . '/../../templates/client/transactions.php';
    $content = ob_get_clean();
    require_once __DIR__ . '/../../templates/layouts/client.layout.php';
}
}