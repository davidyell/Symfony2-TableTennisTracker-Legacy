<?php

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use PingPong\Bundle\PlayerBundle\Form\PlayerType;
use PingPong\Bundle\PlayerBundle\Entity\Player;

/**
 * PlayersController
 *
 * @Route("/players")
 */
class PlayersController extends Controller
{
    /**
     * @Route("/", name="players_index")
     * @Template()
     *
     * @return array Array of players
     */
    public function indexAction()
    {
        $players = $this->getDoctrine()
                        ->getRepository('PingPongPlayerBundle:Player')
                        ->findAll();

        return array('players' => $players);
    }

    /**
     * @param Request $request The http request
     *
     * @Route("/add", name="players_add")
     * @Template()
     *
     * @return mixed Array or Redirect
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(new PlayerType());

        if ($request->isMethod('POST')) {
            $form->bind($this->getRequest());
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($form->getData());
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Player created');

            return $this->redirect($this->generateUrl('players_index'));
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @param int     $id      The id of the record
     * @param Request $request The http request
     *
     * @Route("/edit/{id}", name="players_edit")
     * @Template()
     *
     * @return mixed An array or a redirect url
     */
    public function editAction($id, Request $request)
    {
        $player = $this->getDoctrine()
                       ->getRepository('PingPongPlayerBundle:Player')
                       ->findOneBy(array('id' => $id));

        $form = $this->createForm(new PlayerType(), $player);

        if ($request->isMethod('POST')) {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($form->getData());
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Player saved');

                return $this->redirect($this->generateUrl('players_index'));
            }
        }

        return array(
            'form' => $form->createView(),
            'player' => $player
        );
    }

    /**
     * @param int $id
     *
     * @Route("/delete/{id}", name="players_delete")
     * @Template()
     *
     * @return string A redirection url
     */
    public function deleteAction($id)
    {
        $player = $this->getDoctrine()
                       ->getRepository('PingPongPlayerBundle:Player')
                       ->findOneBy(array('id' => $id));

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($player);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'Player deleted');

        return $this->redirect($this->generateUrl('players_index'));
    }

}