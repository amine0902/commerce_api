<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Categorie;
use CommerceBundle\Entity\Produit;
use CommerceBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ProduitsController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"produits"})
     * @Rest\Get("/categories/{id}/products/")
     */
    public function getProduitsAction(Request $request)
    {
        $categorie = $this->getDoctrine()->getManager()
            ->getRepository('CommerceBundle:Categorie')
            ->find($request->get('id'));

        if (empty($categorie)) {
            return $this->categorieNotFound();
        }
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $categorie->getProduits(),
            $request->query->getInt('page', 1),
            5
        );

        return $pagination;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED, serializerGroups={"produits","categories"})
     * @Rest\Post("/produits/")
     */
    public function ajouterProduitAction(Request $request)
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            return $produit;
        } else {
            return $form;
        }
    }
    private function categorieNotFound()
    {
        return \FOS\RestBundle\View\View::create(['message' => 'Catégorie non trouvée.'], Response::HTTP_NOT_FOUND);
    }

}
