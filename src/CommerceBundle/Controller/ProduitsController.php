<?php
/**
 * Created by PhpStorm.
 * User: Amine
 * Date: 27/02/2018
 * Time: 15:18
 */

namespace CommerceBundle\Controller;


use CommerceBundle\Entity\Produit;
use CommerceBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ProduitsController extends Controller
{
    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/produits")
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

}