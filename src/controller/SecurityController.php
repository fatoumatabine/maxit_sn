<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Core\Validator;
use App\Service\SecurityService;
use App\Entity\User;
use App\Core\App;


use App\Repository\UserRepository;

class SecurityController extends AbstractController
{
    private SecurityService $securityService;


    public function __construct()

    {
        parent::__construct();
        $this->securityService = App::getDependency('securityService');
        
    }

    public function index()
    {
        $this->renderHtml('login/login');
        
    }

    public function login()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //$login = $_POST['login'] ?? '';
            //$password = $_POST['password'] ?? '';
             $post=[
                'login'=>trim($_POST['login']?? '' ),
                'password'=>trim($_POST['password'])
            ];
            //min:8
             Validator::validate ($post,[
                 'login'=>['required','senegal_phone'],
                 'password'=>['required']]

             );
             
            //  var_dump(Validator::getErrors());
            //  die();
//    var_dump($post);
//    die();
             if(Validator::isValid())
             {
                extract($post);
                $user = $this->securityService->seConnecter($login, $password);
                

                if($user)
                {
                    
                   $this->session->set('user', $user->toArray());
                 
                               
                    header('Location: http://localhost:8006/client/index');
                    exit();
                    
                }
            else{
                Validator::addError('globalError', 'login ou motdepass incorrect');

                $this->session->set('errors', Validator::getErrors());

              
                 header('Location: /login');
            exit();
            }
              
            }  
             $this->session->set('errors', Validator::getErrors());

                // var_dump($_SESSION['globalError']);
                // die();
                 header('Location: /login');
            exit();
           
        }


        $this->renderHtml('login/login');
    }




   
public function register()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'nom' => trim($_POST['nom'] ?? ''),
            'prenom' => trim($_POST['prenom'] ?? ''),
            'login' => trim($_POST['phone'] ?? ''), // login = téléphone
            'password' => trim($_POST['password'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'adresse' => trim($_POST['adresse'] ?? ''),
            'numerosCarteIdentite' => trim($_POST['numerosCarteIdentite'] ?? ''),
            'photoIdentite' => $_FILES['photoIdentite'] ?? null,
        ];

        // Validation simple (à adapter selon ton Validator)
        Validator::validate($data, [
            'nom' => ['required', 'min:2', 'max:50'],
            'prenom' => ['required', 'min:2', 'max:50'],
            'phone' => ['required', 'senegal_phone'],
            'password' => ['required', 'min:4'],
            'adresse' => ['required'],
            'numerosCarteIdentite' => ['required', 'min:10', 'max:20'],
        ]);

        if (!Validator::isValid()) {
            //var_dump(Validator::getErrors());die();

            $this->session->set('errors', Validator::getErrors());
            header('Location: /register');
            exit;
        }

        // Ici, tu dois appeler ton service pour enregistrer l'utilisateur
        $user = $this->securityService->register($data);
        if ($user && $user->getId()) {

            $this->session->set('success', 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.');
            header('Location: /login');
            exit;
            
        } else {
            $this->session->set('errors', ['globalError' => 'Erreur lors de la création du compte. Veuillez réessayer.']);
            header('Location: /register');
            exit;
        }
    }

    // GET : afficher le formulaire
    $this->renderHtml('login/register');
}

    public function create()
    {

    }
    public function logout(){
        $this->session->Destroy();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  header('Location: /login');
                  exit;

        }
         header('Location: /client/index');
         exit;
        

    }


    
    }

