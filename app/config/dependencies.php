<?php

use App\Core\Database;
use App\Core\Session;
use App\Entity\CompteRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Service\CompteService;
use App\Service\SecurityService;

$dependencies=[
"core"=>[
    'database'=>Database::class,
    'session'=>Session::class

],
"repository"=>[
     
    'transactionRepository'=>TransactionRepository::class,
    'userRepository'=>UserRepository::class

],
"service"=>[
     'compteService'=>CompteService::class,
     'securityService'=>SecurityService::class
]
];
return $dependencies;
