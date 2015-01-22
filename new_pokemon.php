<?php

require __DIR__.'/_header.php';


/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

use Ankanitti\PokemonBattle\PokemonModel;

$pokemonName = !empty($_POST['name']) ? $_POST['name'] : null;
$pokemonType = !empty($_POST['pokemonType']) ? $_POST['pokemonType'] : null;

var_dump($pokemonType);

$isConnected = false;

if(isset($_SESSION['connected']) && $_SESSION['connected'] = true){
    $isConnected = true;
}

if(isset($_SESSION['connected'])) {

    if (null !== $pokemonName && null !== $pokemonType) {

        if ($pokemonType = '0') {
            $pokemon = new PokemonModel();
            $pokemon
                ->setName($pokemonName)
                ->setType(0)
                ->setHP(100)
                ->setTrainerId($_SESSION['id']);

            $em->persist($pokemon);
            $em->flush();

            echo '<div class="alert alert-success" role="alert">Fire pokemon created!</div>';

        } else if ($pokemonType = '1') {
            $pokemon = new PokemonModel();
            $pokemon
                ->setName($pokemonName)
                ->setType(1)
                ->setHp(100)
                ->setTrainerId($_SESSION['id']);

            $em->persist($pokemon);
            $em->flush();

            echo '<div class="alert alert-success" role="alert">Water pokemon created!</div>';

        } else {
            $pokemon = new PokemonModel();
            $pokemon
                ->setName($pokemonName)
                ->setType(2)
                ->setHP(100)
                ->setTrainerId($_SESSION['id']);

            $em->persist($pokemon);
            $em->flush();

            echo '<div class="alert alert-success" role="alert">Plant pokemon created!</div>';
        }
    }

} else{
    header('Location: index.php');
}

echo $twig->render('new_pokemon.html.twig',[
    'isConnected' => $isConnected,
]);