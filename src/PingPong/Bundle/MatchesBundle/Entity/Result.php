<?php

namespace PingPong\Bundle\MatchesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinTable;

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
     */
    private $match;

    /**
     * @var array
     *
     * @ORM\ManyToOne(targetEntity="\PingPong\Bundle\PlayerBundle\Entity\Player")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     */
    private $players;

    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer", nullable=true)
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="result", type="string", length=255, nullable=true)
     */
    private $result;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matchId
     *
     * @param integer $matchId
     *
     * @return MatchesPlayers
     */
    public function setMatchId($matchId)
    {
        $this->matchId = $matchId;

        return $this;
    }

    /**
     * Get matchId
     *
     * @return integer
     */
    public function getMatchId()
    {
        return $this->matchId;
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
     * Set result
     *
     * @param string $result
     *
     * @return MatchesPlayers
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
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
     * Set matches
     *
     * @param \PingPong\Bundle\MatchesBundle\Entity\Match $matches
     *
     * @return Result
     */
    public function setMatches(\PingPong\Bundle\MatchesBundle\Entity\Match $matches = null)
    {
        $this->matches = $matches;

        return $this;
    }

    /**
     * Get matches
     *
     * @return \PingPong\Bundle\MatchesBundle\Entity\Match
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * Set players
     *
     * @param \PingPong\Bundle\MatchesBundle\Entity\Player $players
     *
     * @return Result
     */
    public function setPlayers(\PingPong\Bundle\MatchesBundle\Entity\Player $players = null)
    {
        $this->players = $players;

        return $this;
    }

    /**
     * Get players
     *
     * @return \PingPong\Bundle\MatchesBundle\Entity\Player
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set match
     *
     * @param \PingPong\Bundle\MatchesBundle\Entity\Match $match
     *
     * @return Result
     */
    public function setMatch(\PingPong\Bundle\MatchesBundle\Entity\Match $match = null)
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
}