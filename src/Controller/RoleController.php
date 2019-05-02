<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Role;

class RoleController extends AbstractController
{
    /**
     * @Route("/role", name="role")
     */
    public function index()
    {
        // return $this->render('role/index.html.twig', [
        //     'controller_name' => 'RoleController',
        // ]);

        $entityManager = $this->getDoctrine()->getManager();

        $role = new Role();
        $role->setName('tank physique');

        $entityManager->persist($role);

        $entityManager->flush();

        return $this->render('role/index.html.twig', [
            'role' => $role,
        ]);

        // return new Response('Saved new product with id '.$role->getId());
    }
}
