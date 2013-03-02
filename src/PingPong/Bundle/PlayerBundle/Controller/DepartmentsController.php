<?php

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use PingPong\Bundle\PlayerBundle\Entity\Department;
use PingPong\Bundle\PlayerBundle\Form\DepartmentType;

/**
 * Department controller.
 *
 * @Route("/departments")
 */
class DepartmentsController extends Controller
{
    /**
     * Lists all Department entities.
     *
     * @Route("/", name="departments")
     * @Template()
     *
     * @return array
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
     * @Route("/view/{id}", name="departments_view")
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
     *
     * @Route("/edit/{id}", name="departments_edit")
     * @Template()
     *
     * @return type
     */
    public function editAction($id)
    {
        $department = $this->getDoctrine()
                           ->getRepository('PingPongPlayerBundle:Department')
                           ->findOneBy(array('id' => $id));

        $form = $this->createForm(new DepartmentType(), $department);

        // TODO: Finish this method off

        return array(
            'form' => $form->createView(),
            'department' => $department
        );
    }

}
