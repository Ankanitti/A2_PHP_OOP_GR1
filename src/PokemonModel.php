<?php

namespace Ankanitti\PokemonBattle;
use Ankanitti\PokemonBattle\Model\PokemonInterface;


/**
 * Class PokemonModel
 * @package Ankanitti\PokemonBattle
 *
 * @Entity
 * @Table(name="pokemon")
 */
class PokemonModel implements PokemonInterface
{
    /* VARS */

    /**
     * @var int
     *
     * @Id
     *
     * @GeneratedValue(strategy="AUTO")
     *
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var int
     *
     * @Column(name="trainerId", type="integer")
     */
    private $trainerId;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=50, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @Column(name="hp", type="integer")
     */
    private $hp;

    /**
     * @var int
     *
     * @Column(name="type", type="integer")
     */
    private $type;

    const TYPE_FIRE     = 2;
    const TYPE_WATER    = 3;
    const TYPE_PLANT    = 4;

    /* FUNCTIONS */

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTrainerId()
    {
        return $this->trainerId;
    }

    /**
     * @param int $trainerId
     */
    public function setTrainerId($trainerId)
    {
        $this->trainerId = $trainerId;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setName($name)
    {
        if (is_string($name))
            $this->name = $name;
        else
            throw new \Exception('Name => string');

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setHp($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp = $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function addHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp += $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function removeHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp = ($this->hp <= $hp) ? 0 : $this->hp - $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this->hp;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setType($type)
    {
        if (true === in_array($type, [
                self::TYPE_FIRE,
                self::TYPE_WATER,
                self::TYPE_PLANT,
            ]))
            $this->type = $type;
        else
            throw new \Exception('Type => Bad');

        return $this;
    }



}