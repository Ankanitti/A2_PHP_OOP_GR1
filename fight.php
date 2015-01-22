<?php


require __DIR__.'/_header.php';

use Ankanitti\PokemonBattle\Attack;

$em = require __DIR__.'/bootstrap.php';

$pokemonRepository = $em->getRepository('Ankanitti\PokemonBattle\PokemonModel');
$trainerRepository = $em->getRepository('Ankanitti\PokemonBattle\Trainer');
$attackRepository = $em->getRepository('Ankanitti\PokemonBattle\Attack');



$isConnected = false;
if(isset($_SESSION['connected']) && $_SESSION['connected'] = true){
    $isConnected = true;
}else{
    header('Location: index.php');
}


$strikerId = $_SESSION['id'];
$criteria1 = array('trainerId' => $strikerId);
$strikerPokemon = $pokemonRepository->findOneBy($criteria1);

$targetedId = $_GET['targetedId'];
$criteria2= array('trainerId' => $targetedId);
$targetedPokemon = $pokemonRepository->findOneBy($criteria2);


$strikerPokemonType = $strikerPokemon->getType();
$targetedPokemonType = $targetedPokemon->getType();

if(($strikerPokemonType = 0 && $targetedPokemonType = 2) ||
    ($strikerPokemonType = 1 && $targetedPokemonType = 0) ||
    ($strikerPokemonType = 2 && $targetedPokemonType = 1)){
    $pokemonAttack = mt_rand(5,10);
}elseif(($strikerPokemonType = 2 && $targetedPokemonType = 0) ||
    ($strikerPokemonType = 0 && $targetedPokemonType = 1) ||
    ($strikerPokemonType = 1 && $targetedPokemonType = 2)){
    $pokemonAttack = mt_rand(15,30);
}else{
    $pokemonAttack = mt_rand(10,20);
}

$targetedHp = $targetedPokemon->removeHP($pokemonAttack);

$criteria_targeted_username = array('id' => $targetedId);
$targetedTrainer = $trainerRepository->findOneBy($criteria_targeted_username);
$targetedTrainerUsername = $targetedTrainer->getUsername();

$date = new DateTime('now');

$timestamp = $date->format('U');


$criteria_test_attack = array('trainerStrikerUsername' => $_SESSION['username']);
$test_attack = $attackRepository->findOneBy($criteria_test_attack);

if(empty($test_attack)) {
    $attack = new Attack();
    $attack
        ->setTrainerStrikerUsername($_SESSION['username'])
        ->setTargetedTrainerUsername($targetedTrainerUsername)
        ->setPokemonStrikerName($strikerPokemon->getName())
        ->setTargetedPokemonName($targetedPokemon->getName())
        ->setAttackValue($pokemonAttack)
        ->setTimestamp($date);

    $em->persist($attack);

    $em->flush();

    echo $twig->render('fight.html.twig',[
        'strikerPokemon' => $strikerPokemon,
        'targetedPokemon' => $targetedPokemon,
        'pokemonAttack' => $pokemonAttack,
        'targetedHp' => $targetedHp,
        'isConnected' => $isConnected
    ]);

}else {
    if ($timestamp < $timestamp + 21600) {
        echo $twig->render('error_time.html.twig', [
            'isConnected' => $isConnected
        ]);
    } else {
        $test_attack
            ->setTargetedTrainerUsername($targetedTrainerUsername)
            ->setPokemonStrikerName($strikerPokemon->getName())
            ->setTargetedPokemonName($targetedPokemon->getName())
            ->setAttackValue($pokemonAttack);
        $em->flush();

        echo $twig->render('fight.html.twig',[
            'strikerPokemon' => $strikerPokemon,
            'targetedPokemon' => $targetedPokemon,
            'pokemonAttack' => $pokemonAttack,
            'targetedHp' => $targetedHp,
            'isConnected' => $isConnected
        ]);
    }
}