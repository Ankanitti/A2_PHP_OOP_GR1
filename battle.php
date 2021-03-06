<?php

require __DIR__.'/_header.php';

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__.'/bootstrap.php';

$trainerRepository = $em->getRepository('Ankanitti\PokemonBattle\Trainer');

/** @var Trainer|null $user */
$trainers = $trainerRepository->findAll();

$isConnected = false;

if(isset($_SESSION['connected']) && $_SESSION['connected'] = true){
    $isConnected = true;
    echo $twig->render('battle.html.twig', [
        'isConnected' => $isConnected,
        'trainers' => $trainers
    ]);

}else{
    echo $twig->render('fail_log.html.twig', [
        'isConnected' => $isConnected,
    ]);
}