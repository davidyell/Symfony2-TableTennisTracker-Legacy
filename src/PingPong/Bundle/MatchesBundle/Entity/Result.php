<?php

namespace PingPong\Bundle\MatchesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Results
 *
 * @ORM\Table(name="matches_players")
 * @ORM\Entity
 */
class Result
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var array
     *
     * @ORM\ManyToOne(targetEntity="Match", inversedBy="results")
     * @ORM\JoinColumn(name="match_id", referencedColumnName="id")
     *
     * @Assert\Valid
     */
    private $match;

    /**
     * @var array
     *
     * @ORM\ManyToOne(targetEntity="\PingPong\Bundle\PlayerBundle\Entity\Player")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     *
     * @Assert\Valid
     */
    private $player;

    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer", nullable=true)
     *
     * @Assert\NotBlank()
     * @Assert\Min(limit = "0", message = "Score must be positive")
     * @Assert\Type(type="integer", message="The score {{ score }} is not a valid.")
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="result", type="string", length=255, nullable=true)
     */
    private $outcome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * Constructor
     */
    public function __construct()
    {
        $now = new \DateTime();
        $this->created = $now;
        $this->modified = $now;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return MatchesPlayers
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return MatchesPlayers
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return MatchesPlayers
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set player
     *
     * @param \PingPong\Bundle\PlayerBundle\Entity\Player $player
     *
     * @return Result
     */
    public function setPlayer(\PingPong\Bundle\PlayerBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \PingPong\Bundle\MatchesBundle\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set match
     *
     * @param \PingPong\Bundle\MatchesBundle\Entity\Match $match
     *
     * @return Result
     */
    public function setMatch(\PingPong\Bundle\MatchesBundle\Entity\Match $match)
    {
        $this->match = $match;

        return $this;
    }

    /**
     * Get match
     *
     * @return \PingPong\Bundle\MatchesBundle\Entity\Match
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * Set outcome
     *
     * @param string $outcome
     *
     * @return Result
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;

        return $this;
    }

    /**
     * Get outcome
     *
     * @return string
     */
    public function getOutcome()
    {
        return $this->outcome;
    }
}