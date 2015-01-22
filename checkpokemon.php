<?php

require __DIR__.'/_header.php';

$em = require __DIR__.'/bootstrap.php';

$pokemonRepository = $em->getRepository('Ankanitti\PokemonBattle\PokemonModel');

$isConnected = false;

if(isset($_SESSION['connected']) && $_SESSION['connected'] = true){
    $isConnected = true;

    $userName = $_SESSION['username'];
    $userId = $_SESSION['id'];
    $criteria = array('trainerId' => $userId);
    $userPokemon = $pokemonRepository->findOneBy($criteria);
    $pokemonHp = $userPokemon->getHp();

    echo $twig->render('checkpokemon.html.twig',[
        'isConnected' => $isConnected,
        'userPokemon' => $userPokemon,
        'userName' => $userName,
        'pokemonHp' => $pokemonHp
    ]);

}else{
    header('Location: index.php');
}