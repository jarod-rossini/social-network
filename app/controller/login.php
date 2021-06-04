<?php

$bdd = new PDO('mysql:host=localhost;dbname=socialnetwork;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$email = trim(htmlspecialchars($_POST['email']));
$pass = trim(htmlspecialchars($_POST['password']));

$request = $bdd->prepare("SELECT id FROM user WHERE email = :email");
$request->bindParam('email', $email);
$request->execute();
$checkuser = $request->rowCount();
if($checkuser === 1){
    $request = $bdd->prepare("SELECT password FROM user WHERE email = :email");
    $request->bindParam('email', $email);
    $request->execute();
    $result = $request->fetchAll();
    $password = $result[0][0];
    $checkpass = password_verify($pass, $password);
    if($checkpass == true){
        $request = $bdd->prepare("SELECT id, surname, name, email FROM user WHERE email = :email");
        $request->bindParam('email', $email);
        $request->execute();
        $data = $request->fetchAll();
        $user['id'] = $data[0][0];
        $user['surname'] = $data[0][1];
        $user['name'] = $data[0][2];
        $user['mail'] = $data[0][3];
        $_SESSION = $user;
        //var_dump($_SESSION);
        // $result needed pour script
        $result = true;
        echo json_encode(array("success"=>$result));
    }
    else{
        // $result needed pour script
        $result = false;
        echo json_encode(array("success"=>$result));
    }
}
else{
    // $result needed pour script
    $result = false;
    echo json_encode(array("success"=>$result));
}