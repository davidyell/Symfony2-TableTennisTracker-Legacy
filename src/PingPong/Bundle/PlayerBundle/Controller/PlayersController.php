<?php

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use PingPong\Bundle\PlayerBundle\Entity\Player;

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
        $players = $this->getDoctrine()
                        ->getRepository('PingPongPlayerBundle:Player')
                        ->findAll();

        return array('playerList'=>$players);
    }    
    
}