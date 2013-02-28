<?php
/**
 * Controller for serving static pages
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * StaticController
 */
class StaticController extends Controller
{
    /**
     * @Template()
     * 
     * @return array
     */
    public function homeAction()
    {
        return array();
    }
    
}