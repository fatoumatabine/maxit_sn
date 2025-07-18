<?php

namespace App\Controller;

use App\Core\App;
use Symfony\Component\Yaml\Yaml;

class ClientController extends \App\Core\Abstract\AbstractController
{
    protected $layout = 'client.layout';

     public function __construct(){
        parent::__construct();
        
       
    }
    public function index()
    {
      // $instance= App::getDependency('database');
     // dd($instance);
        $data = []; // Example data, replace with actual data fetching logic
         
         // dd($_SESSION['user']);
        $this->renderHtml('client/index', $data);
    }

    public function create()
    {
        return $this->renderHtml('account/create');
    }
}
