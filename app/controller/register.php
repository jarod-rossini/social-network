<?php

$bdd = new PDO('mysql:host=localhost;dbname=socialnetwork;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$name = trim(htmlspecialchars($_POST['name']));
$surname = trim(htmlspecialchars($_POST['surname']));
$email = trim(htmlspecialchars($_POST['email']));
$pass = trim(htmlspecialchars($_POST['password']));
$birthdate = $_POST['birthdate'];
$statut = 42;


if (!empty($name) && !empty($surname) && !empty($email) && !empty($pass) && !empty($birthdate)){
    // check email
    $emailcheck = "SELECT `email` FROM `user` WHERE `email` = :email";
    $check = $bdd->prepare($emailcheck);
    $check->bindParam(':email', $email);
    $check->execute();
    $used = $check->rowCount();
    if ($used === 0){
        //^----pas de résultat, donc on continu
        $hashpass = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `user`(`statut`, `name`, `surname`, `email`, `password`, `birthdate`) VALUES (:statut, :name, :surname, :email, :hashpass, :birthdate)";
        $requete = $bdd->prepare($sql);
        $requete->bindParam('statut', $statut);
        $requete->bindParam('name', $name);
        $requete->bindParam('surname', $surname);
        $requete->bindParam('email', $email);
        $requete->bindParam('hashpass', $hashpass);
        $requete->bindParam('birthdate', $birthdate);
        $requete->execute();
        echo('vous êtes inscrit');
    }
    else{
        // "email dejà inscrit"
        echo ('Email déjà prit');
    }
}
else{
    echo ('Veuillez remplir tous les champs');
}