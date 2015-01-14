<?php

namespace CharlesBAP\PokemonBattle\Type;

use CharlesBAP\PokemonBattle\PokemonModel;

abstract class PokemonFire extends PokemonModel
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_FIRE);
    }

    /**
     * @inheritdoc
     */
    public function isTypeWeak($type)
    {
        return (self::TYPE_WATER === $type) ? true : false;
    }

    /**
     * @inheritdoc
     */
    public function isTypeStrong($type)
    {
        return (self::TYPE_PLANT === $type) ? true : false;
    }
}