<?php

require __DIR__.'/_header.php';

$em = require __DIR__.'/bootstrap.php';

$pokemonRepository = $em->getRepository('Ankanitti\PokemonBattle\PokemonModel');

$isConnected = false;

if(isset($_SESSION['connected']) && $_SESSION['connected'] = true){
    $isConnected = true;
    $criteria = array('trainerId' => $_SESSION['id']);
    $userPokemon = $pokemonRepository->findOneBy($criteria);
    $userPokemon->setHp(100);

    $em->flush();

    echo $twig->render('revive.html.twig',[
        'isConnected' => $isConnected,
    ]);

}else{
    header('Location: index.php');
}