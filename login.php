<?php

require __DIR__.'/_header.php';

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use Ankanitti\PokemonBattle\Trainer;

$username = !empty($_POST['username']) ? $_POST['username'] : null;
$password = !empty($_POST['password']) ? $_POST['password'] : null;

if(!isset($_SESSION['connected'])) {
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
            echo '<div class="alert alert-success" role="alert">Connected!</div>';

            header('Location: new_pokemon.php');
        }
    }

} else {
    header('Location: index.php');
}
echo $twig->render('login.html.twig');