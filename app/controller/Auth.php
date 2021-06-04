<?php

namespace App\Controller;

use App\Model\Connect;
use PDO;
require_once ('Controller.php');

class Auth extends Controller
{
    public function __construct()
    {
        $connect = new Connect('localhost', 'socialnetwork','root', '');
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

    /**
     * s'enregistrer, fait à vérifier
     */
    public function postSignup($name, $surname, $email, $pass, $birthdate)
    {
        /**$table = $this->pdo->query('SELECT COUNT(*) FROM utilisateurs WHERE login="'.$_POST['login'].'"');
        $result = $table->fetchColumn();
        $name = trim(htmlspecialchars($_POST['name']));
        $surname = trim(htmlspecialchars($_POST['surname']));
        $email = trim(htmlspecialchars($_POST['email']));
        $pass = trim(htmlspecialchars($_POST['password']));
        $birthdate = $_POST['birthdate'];*/
        //check email
        $emailcheck = "SELECT `email` FROM `user` WHERE `email` = $email";
        $check = $this->pdo->prepare($emailcheck);
        $check->execute();
        $used = $check->rowCount();
        if ($used === 0){
            //^----pas de résultat, donc on continu
            $hashpass = password_hash($pass, PASSWORD_BCRYPT);
            $sql = "INSERT INTO `user`(`name`, `surname`, `email`, `password`, `birthdate`) VALUES ($name, $surname, $email, $hashpass, $birthdate)";
            $requete = $this->pdo->prepare($sql);
            $requete->execute();
            //$this->createSession();
            //$_SESSION['message'] = '<p class="connected">Connexion effectuée</p>';
            $result = true;
            echo json_encode(array("success"=>$result));
            //return header('location:profil');
        }
        else{
            // "email dejà inscrit"
            $result = false;
            echo json_encode(array("success"=>$result));
        }
    }

    /**
     * Modifier ses données de profil, A faire
     */
    public function BioProfil()
    {
        $bio = $_POST['bio'];
        $id = $_SESSION['id'];
        $sql = "UPDATE `user` SET `bio`= $bio WHERE `id`= $id";
        $request = $this->pdo->prepare($sql);
        $request->execute();
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
        $_SESSION['name'] = $_POST['name'];

        $table = $this->pdo->query('SELECT * FROM user WHERE name="'.$_POST['name'].'"');

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