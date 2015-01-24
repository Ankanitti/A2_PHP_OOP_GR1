<?php

require __DIR__.'/_header.php';

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use Ankanitti\PokemonBattle\PokemonModel;

$pokemonName = !empty($_POST['name']) ? $_POST['name'] : null;
$pokemonType = !empty($_POST['pokemonType']) ? $_POST['pokemonType'] : null;

$isConnected = false;

if(isset($_SESSION['connected']) && $_SESSION['connected'] = true){
    $isConnected = true;
}

if(isset($_SESSION['connected'])) {

    if (null !== $pokemonName && null !== $pokemonType) {
        if ($pokemonType = '2') {

            $pokemon = new PokemonModel();
            $pokemon
                ->setName($pokemonName)
                ->setType(2)
                ->setHP(100)
                ->setTrainerId($_SESSION['id']);

            $em->persist($pokemon);
            $em->flush();

            echo '<div class="alert alert-success" role="alert">Fire Pokemon created!</div>';

        } else if ($pokemonType = '3') {

            $pokemon = new PokemonModel();
            $pokemon
                ->setName($pokemonName)
                ->setType(3)
                ->setHp(100)
                ->setTrainerId($_SESSION['id']);

            $em->persist($pokemon);
            $em->flush();

            echo '<div class="alert alert-success" role="alert">Water Pokemon created!</div>';

        } else {

            $pokemon = new PokemonModel();
            $pokemon
                ->setName($pokemonName)
                ->setType(4)
                ->setHP(100)
                ->setTrainerId($_SESSION['id']);

            $em->persist($pokemon);
            $em->flush();

            echo '<div class="alert alert-success" role="alert">Plant Pokemon created!</div>';

        }
    }
} else{
    header('Location: index.php');
}

echo $twig->render('new_pokemon.html.twig',[
    'isConnected' => $isConnected,
]);