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

