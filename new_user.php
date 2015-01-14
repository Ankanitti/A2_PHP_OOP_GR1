<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 13/01/2015
 * Time: 14:32
 */
require __DIR__.'/_header.php';


/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use CharlesBAP\PokemonBattle\Trainer;

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
}


echo $twig->render('new_user.html.twig');