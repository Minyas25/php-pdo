<?php
/**
 * Le fichier index.php fait ici office de fichier de test. C'est le fichier qui est lancé lorsqu'on va
 * sur localhost:8000 et qui va donc servir de "point de départ" à l'application
 */

use App\Entity\Product;
use App\Repository\ProductRepository;

require '../vendor/autoload.php';

$repository = new ProductRepository();
// $products = $repository->findAll();

// $toPersist = new Product("Chaussette", 10, "Ma description de chaussette");

// $repository->persist($toPersist);


// var_dump($toPersist);

$product = $repository->findById(1);
// var_dump($product);
$product->setPrice(300);

$repository->update($product);



// $repository->delete(1);






/*
//On crée une connexion à la base de données SQL qu'on veut utiliser
$connection = new PDO("mysql:host=localhost;dbname=php_pdo", "root", "1234");
//Avec cette connexion, on prépare la requête que l'on souhaite exécuter, ici récupérer tous les produits
$query = $connection->prepare("SELECT * FROM product");
//On exécute la requête
$query->execute();
//On fait une boucle sur les résultat de la requête et pour le moment on fait juste un echo de chaque
foreach($query->fetchAll() as $line) {
    echo $line['label'];
}

*/