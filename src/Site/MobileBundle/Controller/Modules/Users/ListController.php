<?php

namespace Site\MobileBundle\Controller\Modules\Users;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ListController extends Controller
{
    /**
     * @Route("/all/{name}")
     */
    public function allAction ($name) {
        return new Response('<html><body>Hello '.$name.'!</body></html>');
    }

    /**
     * @Route("/regular")
     */
    public function regularAction () {
        return new Response('<html><body>Regular List</body></html>');
    }
}
