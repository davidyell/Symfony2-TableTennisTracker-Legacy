<?php

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use PingPong\Bundle\PlayerBundle\Form\Type\PlayerType;

use PingPong\Bundle\PlayerBundle\Entity\Player;

/**
 * PlayersController
 */
class PlayersController extends Controller
{
    /**
     * @Route("/players", name="players_index")
     * @Template()
     *
     * @return array Array of players
     */
    public function indexAction()
    {
        $playerRepo = $this->getDoctrine()
                           ->getRepository('PingPongPlayerBundle:Player');
        $players = $playerRepo->findAll();

        return array('playerList' => $players);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * 
     * @Route("/players/add", name="players_add")
     * @Template()
     *
     * @return mixed Array or Redirect
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(new PlayerType());

        if ($request->isMethod('POST')) {
            $form->bind($request);
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
     * @param int $id The id of the record
     * @param Request $request The form submission request
     *
     * @Route("/players/edit/{id}", name="players_edit")
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
            $form->bind($request);
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
     * 
     * @param int $id
     * 
     * @Route("/players/delete/{id}", name="players_delete")
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