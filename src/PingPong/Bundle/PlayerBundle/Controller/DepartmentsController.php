<?php
/**
 * Description of DepartmentsController
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DepartmentsController extends Controller
{
    /**
     * @Route("/departments", name="departments_index")
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
     * @Route("/departments/view/{id}", name="departments_view")
     * @Template()
     * 
     * @param int $id
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
}