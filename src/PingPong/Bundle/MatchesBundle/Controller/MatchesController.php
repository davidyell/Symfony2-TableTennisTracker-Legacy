<?php
/**
 * Controller for dealing with Matches
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\MatchesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * MatchesController
 *
 * @Route("/matches")
 */
class MatchesController extends Controller
{
    /**
     * @Route("/add", name="matches_add")
     * @Template()
     *
     * @return array
     */
    public function addAction()
    {
        
        return array();
    }
}