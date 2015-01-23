<?php

require __DIR__.'/_header.php';


/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use Ankanitti\PokemonBattle\Trainer;

$username = !empty($_POST['username']) ? $_POST['username'] : null;
$password = !empty($_POST['password']) ? $_POST['password'] : null;


/**
 * SignIn
 */
if (null !== $username && null !== $password) {
    $trainer = new Trainer();

    $trainer
        ->setUsername($username)
        ->setPassword($password)
    ;

    $em->persist($trainer);
    $em->flush();

    echo 'Trainer created!';

    header('Location:login.php');
}


echo $twig->render('new_user.html.twig');