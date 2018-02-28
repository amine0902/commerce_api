commerce_api
=============

A Symfony project created on February 27, 2018, 12:52 pm.


### Installation:
###### 1- Creation BDD:
```
bin/console doctrine:database:create
```
###### 2- Géneration BDD
```
bin/console doctrine:schema:update --force
```
###### 3- Installation des dépendances
```
composer update
```
###### 4- Utiliser Postman ou Curl pour tester les POSTs
*   URL pour ajouter produit
```
    /produits/
```
*   format json pour les tests
```
{
	"nom": "produit1",
	"prix": "400",
	"quantite": "9",
	"categories": [1, 4]
}
```
*   URL pour ajouter categorie
```    
       /categories/
```
*   format json pour les tests
```
{
	"nom": "categorie1"
}
```
###### 5- Les GETS urls:
*   Afficher les categories
```
       /categories/
```
*   Afficher les produits dans une catégorie
```
       /categories/1/products/
```
*   Afficher les produits dans une catégorie avec pagination
```
       /categories/1/products/?page=1
       /categories/1/products/?page=2
       ...
```
