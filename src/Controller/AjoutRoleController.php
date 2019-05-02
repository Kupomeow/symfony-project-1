<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Role;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AjoutRoleController extends AbstractController
{
    /**
     * @Route("/ajout/role", name="ajout_role")
     */
    public function index()
    {
        //     return $this->render('ajout_role/index.html.twig', [
        //         'controller_name' => 'AjoutRoleController',
        //     ]);

        $role = new Role();

        $form = $this->createFormBuilder($role)
            ->add('name', TextType::class)
            ->add('ajout', SubmitType::class, ['label' => 'ajouter role'])
            ->getForm();

        return $this->render('ajout_role/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
