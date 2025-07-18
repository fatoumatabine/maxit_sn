<?php
namespace App\Service;
use App\Core\App;
use App\Repository\UserRepository;
use App\Entity\User;

    class SecurityService
    {
        private static ?SecurityService $securityService = null;
        private UserRepository $userRepository;

        private function __construct()
        {
            $this->userRepository = App::getDependency('userRepository');
        }

        public static function getInstance(): SecurityService
        {
            if (self::$securityService === null) {
                self::$securityService = new SecurityService();
            }
            return self::$securityService;
        }
       public function seConnecter(string $login, string $password){

        $user = $this->userRepository->findByLogin($login);
           if (!$user || $user->getPassword() !== $password) {
               return null;
           }
           return $user;
       }

       
    }