<?php
namespace App\Service;
use App\Core\App;
use App\Entity\Compte;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Entity\Role; // N'oublie pas d'importer la classe Role
use App\Entity\TypeCompte;

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
        //    if (!$user || $user->getPassword() !== $password) {
        //        return null;
        //    }
        if (!$user || !password_verify($password, $user->getPassword())) {
            var_dump('Mot de passe incorrect');die();
            return null;
        }
           return $user;
       }
  public function register(array $data): ?User
    {
        $existingUser = $this->userRepository->findByLogin($data['login']);
        if ($existingUser) {
            return null;
        }

        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $user = new User();
        $user->setNom($data['nom']);
        $user->setPrenom($data['prenom']);
        $user->setLogin($data['login']);
        $user->setPassword($hashedPassword);
        $user->setAdresse($data['adresse']);
        $user->setNin($data['numerosCarteIdentite']);
       // var_dump($user);die();
        // Gestion du rôle
        $role = new Role();
        $role->setId($data['role_id'] ?? 0); // Assurez-vous que 'role_id' est passé dans $data
        $user->setRole($role);

        $savedUser = $this->userRepository->insert($user);
        if(!$savedUser) {
            return null;
        }
        $compte=new Compte();
        $compte->getUser()->setId($savedUser);
        $compte->setSolde(0);
        $compte->setNumero($data['numero'] ?? '');
        $compte->getUser()->setId($user->getId());
        $compte->setTypeCompte(TypeCompte::PRINCIPAL); // Assurez-vous que 'typeCompte' est passé dans $data

        //var_dump($user);die();

 return $savedUser instanceof User ? $savedUser : null;
    }
}