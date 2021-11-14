<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index() {
      echo view('template/header.php');
      echo view('public/main_view.php');
      echo view('template/footer.php');
      //echo view('welcome_message');
    }
}
