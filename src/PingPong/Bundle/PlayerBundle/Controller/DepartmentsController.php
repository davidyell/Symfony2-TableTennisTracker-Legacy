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
        return array();
    }
    
    /**
     * @Route("/departments/view/{id}", name="departments_view")
     * @Template()
     * 
     * @param int $id
     */
    public function viewAction($id)
    {
        return array();
    }
}