<?php

namespace App\Controller;

use Autoloader;

class User extends Controller
{
    public function signin()
    {
        $this->layout(Autoloader::autoload('view/connexion.view'));
    }

    public function signup()
    {
        $this->layout(Autoloader::autoload('view/inscription.view'));
    }

    public function profil()
    {
        $this->layout(Autoloader::autoload('view/profil.view'));
    }
}