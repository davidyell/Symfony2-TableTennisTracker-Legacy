<?php

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use PingPong\Bundle\PlayerBundle\Entity\Department;
use PingPong\Bundle\PlayerBundle\Form\DepartmentType;

/**
 * Department controller.
 */
class DepartmentsController extends Controller
{
    /**
     * Lists all Department entities.
     *
     * @Template()
     */
    public function indexAction()
    {
        $departments = $this->getDoctrine()
                            ->getRepository('PingPongPlayerBundle:Department')
                            ->findAll();

        return array(
            'departments' => $departments
        );
    }
    
    /**
     * @param type $id
     * 
     * @Template()
     * 
     * @return type
     */
    public function viewAction($id)
    {
        $department = $this->getDoctrine()
                           ->getRepository('PingPongPlayerBundle:Department')
                           ->findOneBy(array('id' => $id));
        
        return array(
            'department' => $department
        );
    }

    /**
     * @param type $id
     * @param \Symfony\Component\HttpFoundation\Request $request
     * 
     * @Template()
     * 
     * @return type
     */
    public function editAction($id, Request $request)
    {
        $department = $this->getDoctrine()
                           ->getRepository('PingPongPlayerBundle:Department')
                           ->findOneBy(array('id' => $id));
        
        $form = $this->createForm(new DepartmentType(), $department);
        
        return array(
            'form' => $form->createView(),
            'department' => $department
        );
    }
    
}
