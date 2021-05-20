<?php

namespace App\Controller;

use Autoloader;

class Controller
{
    protected $pdo;

    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public function indexView()
    {
        $this->layout(Autoloader::autoload('view/index.view'));
    }

    static function headerView()
    {
        Autoloader::autoload('view/header');
    }

    static function footerView()
    {
        Autoloader::autoload('view/footer');
    }

    public function layout($content)
    {
        $this->headerView();
        $content;
        $this->footerView();
    }

    public function getPDO()
    {
        return $this->pdo;
    }
} 