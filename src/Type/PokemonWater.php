<?php

namespace Ankanitti\PokemonBattle\Type;

use Ankanitti\PokemonBattle\PokemonModel;

abstract class PokemonWater extends PokemonModel
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_WATER);
    }

    /**
     * @inheritdoc
     */
    public function isTypeWeak($type)
    {
        return (self::TYPE_PLANT === $type) ? true : false;
    }

    /**
     * @inheritdoc
     */
    public function isTypeStrong($type)
    {
        return (self::TYPE_FIRE === $type) ? true : false;
    }
}