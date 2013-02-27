<?php

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * PlayersController
 */
class PlayersController extends Controller
{
    /**
     * @Route("/", name="players_index")
     * @Template()
     */
    public function indexAction()
    {
        $players = array(
            array(
                'id' => 1,
                'name' => 'Dave',
            ),
            array(
                'id' => 2,
                'name' => 'Simon',
            ),
            array(
                'id' => 3,
                'name' => 'Dan',
            ),
            array(
                'id' => 4,
                'name' => 'Owen',
            ),
        );

        return array('playerList'=>$players);
    }    
    
}