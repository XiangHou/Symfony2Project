<?php

namespace Site\MobileBundle\Controller\Modules\Users;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Site\StoreBundle\Entity\Users;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DataController extends Controller
{
    /**
     * @Route("/addOne")
     */
    public function addOneAction () {
        $user = new Users();
        $user->setId(md5(time()));
        $user->setUsername('Core');
        $user->setBirthday(\DateTime::createFromFormat('Y-m-d','1986-08-22'));
        $user->setHeight(175.0);
        $user->setWeight(75.0);
        $user->setSex('1');
        $user->setType('0');
        $user->setPassword(md5('111111'));
        $user->setCreatedTime(\DateTime::createFromFormat('Y-m-d H:i:s',date('Y-m-d H:i:s',time())));

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Created user id '.$user->getId());
    }


//    /**
//     * @Route("/getRecord")
//     */
//    public function getRecordAction () {
//        $id = '5371090830d8660896d63af1';
//        $user = $this->get('doctrine_mongodb')
//            ->getRepository('SiteStoreBundle:Users')
//            ->find($id);
//
//        if (!$user) {
//            throw $this->createNotFoundException('No product found for id '.$id);
//        }
//        else {
//            return new Response($user->getName());
//        }
//    }
//
//    /**
//     * @Route("/getRecordByName")
//     */
//    public function getRecordByNameAction () {
//        $name = 'Core';
//        $repository = $this->get('doctrine_mongodb')
//            ->getManager()
//            ->getRepository('SiteStoreBundle:Users');
//        $users = $repository->findBy(
//            array('name' => $name),
//            array('age', 'ASC')
//        );
//        if (!$users) {
//            throw $this->createNotFoundException('No User found for name '.$name);
//        }
//        else {
//            return new Response('get user with name :'.' '.$users[0]->getName());
//        }
//    }
}