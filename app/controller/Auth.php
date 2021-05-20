<?php

namespace App\Controller;

use App\Model\Connect;
use PDO;

class Auth extends Controller
{
    public function __construct()
    {
        $connect = new Connect('', '','', '');
        $this->pdo = $connect->getconnect();

        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public function postSignin()
    {   
        if(isset($_POST['login']) || isset($_POST['password'])){
            if(isset($_POST['submit'])){
                $table = $this->pdo->query('SELECT * FROM utilisateurs WHERE login="'.$_POST['login'].'"');

                if($ligne = $table->fetch(PDO::FETCH_ASSOC)){
                    if(password_verify($_POST['password'], $ligne['password'])){
                            $this->createSession();
                            $_SESSION['message'] = '<p class="connected">Connexion effectuée</p>';
                            return header('location:profil');
                    }
                    else{$_SESSION['message'] = '<p class="connexion">Le mot de passe est incorrect</p>'; return header('refresh:0');}
                }
                else{$_SESSION['message'] = '<p class="connexion">Ce login n\'existe pas</p>'; return header('refresh:0');}
            }
        }
    }

    public function postSignup()
    {
        $table = $this->pdo->query('SELECT COUNT(*) FROM utilisateurs WHERE login="'.$_POST['login'].'"');
        $result = $table->fetchColumn();

        if(!empty($_POST['login']) && !empty($_POST['password'])){
            if($_POST['password'] == $_POST['password_conf']){
                if($result == 0){

                    $this->createSession();
                    $_SESSION['message'] = '<p class="connected">Connexion effectuée</p>';
                    
                    $table2 = $this->pdo->prepare('INSERT INTO utilisateurs(login, password) VALUES("'.$_POST['login'].'","'.password_hash($_POST['password'], PASSWORD_DEFAULT).'")');
                    $table2->execute();
                    
                    return header('location:profil');
                }
                else{$_SESSION['message'] = '<p class="inscription">Ce login est déjà utilisé</p>'; return header('refresh:0');}
            }
            else{$_SESSION['message'] = '<p class="inscription">Les mots de passe ne correspondent pas</p>'; return header('refresh:0');}
        }
        else{$_SESSION['message'] = '';}
    }

    public function postProfil(){
        $table2 = $this->pdo->query('SELECT * FROM reservations WHERE id="'.$_SESSION['id'].'"');

        if(isset($_SESSION['message'])) unset($_SESSION['message']);
    
        if(isset($_POST['quit'])) $this->disconnect();
        
        if(isset($_POST['change'])){
            $table = $this->pdo->prepare('UPDATE utilisateurs SET login = "'.$_POST['login'].'", password = "'.password_hash($_POST['password'], PASSWORD_DEFAULT).'"');
            $table->execute();
            
            $this->createSession();
            
            return header('location:profil');
        }

        if($ligne = $table2->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['name'] = $ligne['name'];
        }
    }

    private function createSession()
    {
        $_SESSION['login'] = $_POST['login'];

        $table = $this->pdo->query('SELECT * FROM utilisateurs WHERE login="'.$_POST['login'].'"');

        if($ligne = $table->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['id'] = $ligne['id'];
        }
    }

    static function disconnect()
    {
        session_destroy();
        return header('location:index');
    }
}