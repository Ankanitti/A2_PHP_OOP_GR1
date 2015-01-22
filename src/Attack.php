<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 22/01/2015
 * Time: 17:09
 */

namespace Ankanitti\PokemonBattle;
use Ankanitti\PokemonBattle\Model\AttackInterface;

/**
 * Class Attack
 * @package Ankanitti\PokemonBattle
 *
 * @Entity
 * @Table(name="attack")
 */
class Attack implements AttackInterface
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @Column(name="trainer_striker_username", type="string", length=50)
     */
    private $trainerStrikerUsername;
    /**
     * @var string
     *
     * @Column(name="targeted_trainer_username", type="string", length=50)
     */
    private $targetedTrainerUsername;
    /**
     * @var string
     *
     * @Column(name="pokemon_striker_name", type="string", length=50)
     */
    private $pokemonStrikerName;
    /**
     * @var string
     *
     * @Column(name="targeted_pokemon_name", type="string", length=50)
     */
    private $targetedPokemonName;
    /**
     * @var int
     *
     * @Column(name="attack_value", type="integer")
     */
    private $attackValue;
    /**
     * @var int
     *
     * @Column(name="timestamp", type="datetime", nullable=false)
     * @Version
     */
    private $timestamp;
    /**
     * @return int
     */
    public function getAttackValue()
    {
        return $this->attackValue;
    }
    /**
     * @param int $attackValue
     * @return \Ankanitti\PokemonBattle\Model\PokemonInterface|void
     */
    public function setAttackValue($attackValue)
    {
        $this->attackValue = $attackValue;
        return $this;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getTargetedPokemonName()
    {
        return $this->targetedPokemonName;
    }
    /**
     * @param string $targetedPokemonName
     * @return \Ankanitti\PokemonBattle\Model\AttackInterface|void
     */
    public function setTargetedPokemonName($targetedPokemonName)
    {
        $this->targetedPokemonName = $targetedPokemonName;
        return $this;
    }
    /**
     * @return string
     */
    public function getPokemonStrikerName()
    {
        return $this->pokemonStrikerName;
    }
    /**
     * @param string $pokemonStrikerName
     * @return \Ankanitti\PokemonBattle\Model\AttackInterface|void
     */
    public function setPokemonStrikerName($pokemonStrikerName)
    {
        $this->pokemonStrikerName = $pokemonStrikerName;
        return $this;
    }
    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    /**
     * @param int $timestamp
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }
    /**
     * @return string
     */
    public function getTargetedTrainerUsername()
    {
        return $this->targetedTrainerUsername;
    }
    /**
     * @param string $targetedTrainerUsername
     * @return \Ankanitti\PokemonBattle\Model\AttackInterface|void
     */
    public function setTargetedTrainerUsername($targetedTrainerUsername)
    {
        $this->targetedTrainerUsername = $targetedTrainerUsername;
        return $this;
    }
    /**
     * @return string
     */
    public function getTrainerStrikerUsername()
    {
        return $this->trainerStrikerUsername;
    }
    /**
     * @param string $trainerStrikerUsername
     * @return \Ankanitti\PokemonBattle\Model\AttackInterface|void
     */
    public function setTrainerStrikerUsername($trainerStrikerUsername)
    {
        $this->trainerStrikerUsername = $trainerStrikerUsername;
        return $this;
    }
} 