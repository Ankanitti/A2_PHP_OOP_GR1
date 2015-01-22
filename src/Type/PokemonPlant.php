<?php

namespace Ankanitti\PokemonBattle\Type;
use Ankanitti\PokemonBattle\PokemonModel;

/**
 * @ORM\Entity
 * Class PokemonFire
 * @package Ankanitti\PokemonBattle\Type
 */
class PokemonPlant extends PokemonModel
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_PLANT);
    }

    /**
     * @inheritdoc
     */
    public function isTypeWeak($type)
    {
        return (self::TYPE_FIRE === $type) ? true : false;
    }

    /**
     * @inheritdoc
     */
    public function isTypeStrong($type)
    {
        return (self::TYPE_WATER === $type) ? true : false;
    }
}