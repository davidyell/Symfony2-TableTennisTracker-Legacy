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
use PingPong\Bundle\MatchesBundle\Entity\Match;
use PingPong\Bundle\MatchesBundle\Entity\Result;
use PingPong\Bundle\MatchesBundle\Form\MatchType;
use PingPong\Bundle\MatchesBundle\Form\ResultType;

/**
 * MatchesController
 *
 * @Route("/matches")
 */
class MatchesController extends Controller
{
    /**
     * @Route("/", name="matches")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $matches = $this->getDoctrine()
                        ->getRepository('PingPongMatchesBundle:Match')
                        ->findBy(array(), array(), 20);

//        echo "<pre>";
//        \Doctrine\Common\Util\Debug::dump($matches);
//        echo "</pre>";

        return array(
            'matches' => $matches
        );
    }

    /**
     * @Route("/add", name="matches_add")
     * @Template()
     *
     * @return array
     */
    public function addAction()
    {
        $match = new Match();
        $form = $this->createForm(new MatchType(), $match);

        return array(
            'form' => $form->createView(),
        );
    }
}