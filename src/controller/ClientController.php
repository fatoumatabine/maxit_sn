<?php

namespace App\Controller;

use App\Core\App;
use App\Entity\compte;
use App\Entity\User;
use App\Service\CompteService;
use Symfony\Component\Yaml\Yaml;

class ClientController extends \App\Core\Abstract\AbstractController
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
        $user = User::toObject($user);
        $listComptes = $this->compteService->getComptesByUser($user);
       // var_dump($listComptes); die;
        $comptePrincipal = null;
        $comptesSecondaires = [];
        foreach ($listComptes as $compte) {
            if (method_exists($compte, 'getTypeCompte') && $compte->getTypeCompte()->value ==='Principal') {
                $comptePrincipal = $compte;
            } else {
                $comptesSecondaires[] = $compte;
            }
        }
        
        $data = [
            'user' => $user->toArray(),
            'comptePrincipal' => $comptePrincipal->toArray(),
            'comptesSecondaires' => array_map(fn($compte)=>$compte->toArray(), $comptesSecondaires)
        ];

        $this->renderHtml('client/index', $data);
    }

    public function create()
    {
        return $this->renderHtml('account/create');
    }
}
