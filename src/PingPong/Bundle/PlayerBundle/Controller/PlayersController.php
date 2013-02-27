<?php

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use PingPong\Bundle\PlayerBundle\Entity\Player;

/**
 * PlayersController
 */
class PlayersController extends Controller
{
    /**
     * @Route("/players", name="players_index")
     * @Template()
     */
    public function indexAction()
    {
        $playerRepo = $this->getDoctrine()
                           ->getRepository('PingPongPlayerBundle:Player');
        $players = $playerRepo->findAll();
        
        return array('playerList' => $players);
    }
    
    /**
     * @Route("/players/edit/{id}", name="players_edit")
     * @Template()
     * 
     * @param int $id The id of the record
     * @param Request $request The form submission request
     */
    public function editAction($id, Request $request)
    {
        $player = $this->getDoctrine()
                       ->getRepository('PingPongPlayerBundle:Player')
                       ->findBy(array('id' => $id));
        
        $form = $this->createFormBuilder($player[0])
            ->add('first_name', 'text')
            ->add('nickname', 'text', array('required' => false))
            ->add('last_name', 'text')
            ->add('email', 'text')
            ->add('facebook_id', 'text', array('label' => 'Facebook page name or id', 'required' => false))
            ->add('department_id', 'entity', array(
                    'class' => 'PingPongPlayerBundle:Department',
                    'property' => 'name'
                )
            )
            ->getForm();
        
        if ($request->isMethod('POST')) {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($form->getData());
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('notice','Player saved');
                return $this->redirect($this->generateUrl('players_index'));
            }
        }
        
        return array(
            'form' => $form->createView(), 
            'player' => $player[0]
        );
    }
    
}