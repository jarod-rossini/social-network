<?php

namespace App\Controller;

use Autoloader;

class Network extends Controller
{
    protected $pdo;

    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public function postChat(){
        $_POST['msg'] = trim($_POST['msg']);

        if(!empty($_POST['msg'])){
            $msg = $_POST['msg'].'</br>';
            $success = 0;
            $res = ['success' => $success, 'msg' => $msg];
            echo json_encode($res);
        }
        else{return false;}
    }
}