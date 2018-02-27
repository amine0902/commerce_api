<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Categorie;
use CommerceBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class CategoriesController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Commerce/Default/index.html.twig');
    }
    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/categories")
     */
    public function ajouterCategoriesAction(Request $request)
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $categorie;
        } else {
            return $form;
        }

    }

    /**
     * @Rest\View()
     * @Rest\Get("/categories")
     */
    public function getCategoriesAction(Request $request)
    {
        $categories = $this->getDoctrine()->getManager()
            ->getRepository('CommerceBundle:Categorie')
            ->findAll();

        return $categories;
    }


}
