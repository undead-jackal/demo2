<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
  use ResponseTrait;
  protected $request;

  public function index(){
    return $this->loadLayout('content/home/home', array(),true);
  }

}


?>
