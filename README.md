commerce_api
=============

A Symfony project created on February 27, 2018, 12:52 pm.


###Installation:
######1- Creation BDD:
bin/console doctrine:database:create

######2- Géneration BDD
bin/console doctrine:schema:update --force

######3- Installation des dépendances
composer update

######3- Utiliser Postman ou Curl pour tester les POSTs
*   URL pour ajouter produit
    *   /produits/
*   URL pour ajouter categorie
    *   /categories/
######4- Les GETS urls:
*   Afficher les categories
    *   /categories/
*   Afficher les produits dans une catégorie + pagination
    *   /categories/1/products/?page=1

