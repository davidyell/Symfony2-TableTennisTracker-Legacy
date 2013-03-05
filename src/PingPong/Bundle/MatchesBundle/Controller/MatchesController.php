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
use Symfony\Component\HttpFoundation\Request;
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
                        ->findBy(
                            array(),
                            array(
                                'created' => 'DESC'
                            ),
                            20
                        );

//        echo "<pre>";
//        \Doctrine\Common\Util\Debug::dump($matches);
//        echo "</pre>";

        return array(
            'matches' => $matches
        );
    }

    /**
     * @param Request $request The http request
     *
     * @Route("/add", name="matches_add")
     * @Template()
     *
     * @return mixed
     */
    public function addAction(Request $request)
    {
        $match = new Match();
        $form = $this->createForm(new MatchType(), $match);

        if ($request->isMethod('POST')) {
            $form->bind($this->getRequest());

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($match);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Match saved');

                return $this->redirect($this->generateUrl('matches'));
            } else {
                $this->get('session')->getFlashBag()->add('notice', 'Match could not be saved. Please try again');
            }
        }

        return array(
            'form' => $form->createView(),
        );
    }
}