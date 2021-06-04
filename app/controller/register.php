<?php
require_once ('Auth.php');


$user = new \App\Controller\Auth();
session_start();
$name = trim(htmlspecialchars($_POST['name']));
$surname = trim(htmlspecialchars($_POST['surname']));
$email = trim(htmlspecialchars($_POST['email']));
$pass = trim(htmlspecialchars($_POST['password']));
$birthdate = $_POST['birthdate'];

$data = $user->postSignup($name, $surname, $email, $pass, $birthdate);

echo $data;
