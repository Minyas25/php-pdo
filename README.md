# php-pdo

## How To use
1. Cloner le projet
2. Créer une base de données `php_pdo`
3. Importer le contenu du fichier database.sql dans la base de données
4. Lancer un `composer install`
5. Lancer le projet avec `composer start`
6. Accéder au résultat sur http://localhost:8000


## Exercices

### Créer une entité et un Repository
#### La bdd et l'entité
1. Créer un fichier database.sql à la racine du projet php-pdo	
2. Dans ce fichier faire le create table pour un product puis quelques insert into pour avoir un petit jeu de données
3. Dans le dossier src du projet php-pdo, créer un sous dossier Entity et dans celui ci, créer une classe Product en lui mettant les propriétés correspondantes et un constructeur

#### Le findAll du repository
1. Créer un dossier Repository dans src et dans ce dossier, créer une classe ProductRepository
2. Dans cette classe, créer une méthode findAll() dans laquelle on va commencer par créer une variable $list avec un tableau vide dedans
3. Ensuite on créer une connexion PDO comme l'index.php, on prépare et on exécute une requête pour récupérer tous les produits, on boucle sur les résultat, et pour chaque ligne de résultat, on va créer une instance de la classe Product qu'on va push dans la $list
4. A la fin de la boucle, on return la liste
5. Côté index, on dégage tout, on fait une instance de ProductRepository et on var_dump le findAll voir si ça marche

#### Le persist
1. Dans la classe ProductRepository, créer une nouvelle méthode persist (qu'on pourrait appeler aussi save, ou add, ou insert ou peu importe) qui va attendre en argument une instance de Product
2. Créer une connexion à la base de données et préparer une requête exactement comme dans la méthode findAll sauf que cette fois ci, la requête SQL va être un INSERT INTO pour ajouter un nouveau produit à la bdd
3. On peut commencer par faire un INSERT INTO en dur (par exemple mettre directement dans la requête un label "test", un price 10 et une description "test"), faire un execute puis voir si déjà ça, ça fonctionne en appelant la méthode persist côté index.php
4. Maintenant qu'on fait persister un product en dur, l'idée va être de modifier la requête dans le prepare pour y insérer les valeurs qui viennent de l'argument Product (via de la concaténation...ou autre ?)
5. Maintenant si dans le index.php je lance un $repo->persist(new Product(0, 'mon produit', 50, 'ma description')); alors je devrais avoir le produit en question ajouté dans ma base de données

#### Le delete
1. Dans la classe ProductRepository, rajouter une méthode delete qui va attendre en argument un id en int
2. Faire une connexion et préparer une requête de suppression avec un :placeholder pour l'id de l'élément à supprimer
3. Faire un bindValue dans lequel on lui donne l'id
4. Exécuter, et tester ça dans le index

#### Le findById
1. Dans la classe ProductRepository, rajouter une méthode findById qui va attendre un id en int en argument
2. Faire pareil que pour le delete mais cette fois ci au lieu de faire un DELETE FROM on fait un SELECT
3. Faire comme dans le findAll pour créer une instance de Product, mais là pas besoin de faire une boucle car on est sensé récupérer un seul résultat
4. Faire un return du produit récupérer

#### Le update
1. Dans la classe ProductRepository rajouter une méthode update qui va attendre un Product en argument (il faudra que ça soit un product avec un id existant en bdd)
2. Faire une requête update avec des placeholder pour toutes les valeurs du product
3. Exécuter la requête et tester dans le index si ça a marché

### Affichage en PHP pur

#### La liste des produits
1. Dans le index.php, dégager tout ce qu'il y a dedans sauf le require autoload et l'instaciation du repository
2. Utiliser le findAll du repository pour récupérer la liste des produits, puis faire un foreach et pour chaque produit afficher en html une div qui aura le label du produit en h3, la description en paragraphe et le prix dans un autre paragraphe
3. Rajouter le link du css de bootstrap, rajouter un container-fluid et une row (avec des echo ou en fermant/rouvrant les balises php) et modifier le contenu du foreach pour faire une structure sous forme de cards par exemple

#### L'ajout d'un produit
1. Créer un nouveau fichier public/add-product.php et dans celui ci mettre le require autoload, l'instance du repository et le lien du bootstrap (on y accédera via http://localhost:8000/add-product.php)
2. Créer un formulaire en html qui n'aura pas d'action et sera en method POST avec dedans les différents input pour le produit (et pourquoi pas un textarea pour la description). Bien mettre un name à chaque champ car c'est ce qui permettra de récupérer les valeurs en php
3. Dans la partie PHP du fichier, rajouter un if( isset($_POST['label']) { } (où label correspond au name de l'un de vos input) et dans ce if, utilisez le $_POST pour récupérer chaque valeur du fomulaire et s'en servir pour créer une instance de Product
4. Utiliser le repository pour faire persister ce nouveau produit (et pourquoi pas écrire un petit message "you added a new product with id 5" ou autre)

#### Page pour un produit spécifique
1. Créer un nouveau fichier public/single-product.php et on remet comme pour les deux autres le require et l'instance du repository, le lien bootstrap
2. L'idée dans cette page va être de récupérer l'id du produit à afficher dans l'url, pour ça, si on va par exemple sur : http://localhost:8000/single-product.php?id=3 alors on pourra récupérer le 3 dans le php avec $_GET['id']
3. On utilise cet id pour appeler un findById sur notre repository
4. On fait l'affichage html/php comme on peut
5. Dans le index, on peut essayer de rajouter dans le foreach un a qui aura un href pointant vers single-product concaténé avec l'id du produit