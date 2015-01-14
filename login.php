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

use Ankanitti\PokemonBattle\Trainer;

$username = !empty($_POST['username']) ? $_POST['username'] : null;
$password = !empty($_POST['password']) ? $_POST['password'] : null;


/**
 * Login
 */
if (null !== $username && null !== $password) {
    /** @var \Doctrine\ORM\EntityRepository $trainerRepository */
    $trainerRepository = $em->getRepository('Ankanitti\PokemonBattle\Trainer');

    /** @var Trainer|null $user */
    $trainer = $trainerRepository->findOneBy([
        'username' => $username,
        'password' => $password,
    ]);


    if (null !== $trainer) {
        $_SESSION['id'] = $trainer->getId();
        $_SESSION['username'] = $trainer->getUsername();
        $_SESSION['connected'] = true;
    }
}



echo $twig->render('login.html.twig');