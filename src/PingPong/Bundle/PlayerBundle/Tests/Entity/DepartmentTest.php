<?php
/**
 * Test class for the Department Entity
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\PlayerBundle\Tests\Department;

use PingPong\Bundle\PlayerBundle\Entity\Department;
use PingPong\Bundle\PlayerBundle\Entity\Player;

class DepartmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test the adding of Players to the Department model
     * Essentially makes sure that the entity relationship will work
     */
    public function testAddPlayer() {
        $player = $this->getMock('PingPong\\Bundle\\PlayerBundle\\Entity\\Player');
        
        $department = new Department();
        $department->addPlayer($player);
        
        $departmentPlayers = $department->getPlayers();
        
        $this->assertCount(1, $departmentPlayers, "Players have not been added to Department");
        $this->assertAttributeCount(1, 'players', $department, "Department players attribute doesn't have a players dimension");
        
        return $department;
    }
    
    /**
     * Ensure that we can remove a player from the association
     */
    public function testRemovePlayer() {
        $department = $this->testAddPlayer();
        
        $player = $department->getPlayers()->get(0);
        $department->removePlayer($player);
        
        $departmentPlayers = $department->getPlayers();
        
        $this->assertCount(0, $departmentPlayers, "Player not removed from Department");
        $this->assertAttributeCount(0, 'players', $department, "Department players attribute not empty");
    }
    
    /**
     * Make sure that the Entity returns an ArrayCollection
     */
    public function testGetPlayers() {
        $department = $this->testAddPlayer();
        
        $departmentPlayers = $department->getPlayers();
        
        $this->assertInstanceOf('Doctrine\\Common\\Collections\\ArrayCollection', $departmentPlayers, "Department Players is not correct instance of ArrayCollection");
    }
}