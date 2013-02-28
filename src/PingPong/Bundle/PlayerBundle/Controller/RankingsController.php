<?php
/**
 * RankingsController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Controller for generating stats for players and departments
 */
class RankingsController extends Controller
{
    /**
     * @Template()
     *
     * @return array
     */
    public function playerRankingsAction()
    {
        $rankings = $this->getDoctrine()
                         ->getRepository('PingPongPlayerBundle:Player')
                         ->findAll();

        return $this->render('PingPongPlayerBundle:Rankings:player_rankings.html.twig', array(
            'rankings' => $rankings
        ));
    }
}