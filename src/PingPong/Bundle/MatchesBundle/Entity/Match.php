<?php

namespace PingPong\Bundle\MatchesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Matches
 *
 * @ORM\Table(name="matches")
 * @ORM\Entity
 */
class Match
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
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="MatchType")
     * @ORM\JoinColumn(name="match_type_id", referencedColumnName="id")
     */
    private $matchType;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Result", mappedBy="match")
     */
    private $results;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var integer
     *
     * @ORM\Column(name="tournament_id", type="integer", nullable=false)
     */
    private $tournamentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tournament_round", type="integer", nullable=false)
     */
    private $tournamentRound;

    /**
     * @var integer
     *
     * @ORM\Column(name="tournament_match_num", type="integer", nullable=false)
     */
    private $tournamentMatchNum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

    /**
     * Construct the entity
     */
    public function __construct()
    {
        $this->result = new ArrayCollection();
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
     * Set matchTypeId
     *
     * @param integer $matchTypeId
     *
     * @return Matches
     */
    public function setMatchTypeId($matchTypeId)
    {
        $this->matchTypeId = $matchTypeId;

        return $this;
    }

    /**
     * Get matchTypeId
     *
     * @return integer
     */
    public function getMatchTypeId()
    {
        return $this->matchTypeId;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Matches
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set tournamentId
     *
     * @param integer $tournamentId
     *
     * @return Matches
     */
    public function setTournamentId($tournamentId)
    {
        $this->tournamentId = $tournamentId;

        return $this;
    }

    /**
     * Get tournamentId
     *
     * @return integer
     */
    public function getTournamentId()
    {
        return $this->tournamentId;
    }

    /**
     * Set tournamentRound
     *
     * @param integer $tournamentRound
     *
     * @return Matches
     */
    public function setTournamentRound($tournamentRound)
    {
        $this->tournamentRound = $tournamentRound;

        return $this;
    }

    /**
     * Get tournamentRound
     *
     * @return integer
     */
    public function getTournamentRound()
    {
        return $this->tournamentRound;
    }

    /**
     * Set tournamentMatchNum
     *
     * @param integer $tournamentMatchNum
     *
     * @return Matches
     */
    public function setTournamentMatchNum($tournamentMatchNum)
    {
        $this->tournamentMatchNum = $tournamentMatchNum;

        return $this;
    }

    /**
     * Get tournamentMatchNum
     *
     * @return integer
     */
    public function getTournamentMatchNum()
    {
        return $this->tournamentMatchNum;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Matches
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
     * @return Matches
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
     * Set matchType
     *
     * @param \PingPong\Bundle\MatchesBundle\Entity\MatchType $matchType
     *
     * @return Match
     */
    public function setMatchType(\PingPong\Bundle\MatchesBundle\Entity\MatchType $matchType = null)
    {
        $this->matchType = $matchType;

        return $this;
    }

    /**
     * Get matchType
     *
     * @return \PingPong\Bundle\MatchesBundle\Entity\MatchType
     */
    public function getMatchType()
    {
        return $this->matchType;
    }

    /**
     * Add result
     *
     * @param \PingPong\Bundle\MatchesBundle\Entity\Result $result
     *
     * @return Match
     */
    public function addResult(\PingPong\Bundle\MatchesBundle\Entity\Result $result)
    {
        $this->results->add($result);

        return $this;
    }

    /**
     * Remove result
     *
     * @param \PingPong\Bundle\MatchesBundle\Entity\Result $result
     */
    public function removeResult(\PingPong\Bundle\MatchesBundle\Entity\Result $result)
    {
        $this->results->removeElement($result);
    }

    /**
     * Get result
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResult()
    {
        return $this->result;
    }
}