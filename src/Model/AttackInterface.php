<?php

namespace Ankanitti\PokemonBattle\Model;

interface AttackInterface {

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getTrainerStrikerUsername();

    /**
     * @param string $name
     *
     * @return AttackInterface
     */
    public function setTrainerStrikerUsername($name);

    /**
     * @return string
     */
    public function getTargetedTrainerUsername();

    /**
     * @param string $name
     *
     * @return AttackInterface
     */
    public function setTargetedTrainerUsername($name);

    /**
     * @return string
     */
    public function getPokemonStrikerName();

    /**
     * @param string $name
     *
     * @return AttackInterface
     */
    public function setPokemonStrikerName($name);

    /**
     * @return string
     */
    public function getTargetedPokemonName();

    /**
     * @param string $name
     *
     * @return AttackInterface
     */
    public function setTargetedPokemonName($name);

    /**
     * @return int
     */
    public function getAttackValue();

    /**
     * @param int $attack
     *
     * @return PokemonInterface
     */
    public function setAttackValue($attack);

    /**
     * @internal param int $time
     *
     * @return int
     */
    public function getTimestamp();

} 