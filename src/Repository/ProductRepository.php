<?php

namespace App\Repository;

use App\Entity\Product;

class ProductRepository
{

    /**
     * Méthode qui va chercher les produits sur la bdd
     * @return Product[];
     */
    public function findAll(): array
    {
        $list = [];
        $connection = new \PDO("mysql:host=localhost;dbname=php_pdo", "root", "1234");

        $query = $connection->prepare("SELECT * FROM product");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Product($line["id"], $line["label"], $line["price"], $line["description"]);
        }


        return $list;
    }
    /**
     * Méthode qui va prendre une instance de Product en argument et va le faire persister en base de données
     * Très important d'utiliser des placeholder dans la requête et des bindValue afin d'éviter les injection SQL 
     * (le fait d'avoir des chaînes de caractères contenant du code qui pourrait être exécuté par SQL à notre insu)
     */
    public function persist(Product $product) {
        $connection = new \PDO("mysql:host=localhost;dbname=php_pdo", "root", "1234");

        $query = $connection->prepare("INSERT INTO product (label,price,description) VALUES (:label,:price,:description)");
        $query->bindValue(':label', $product->getLabel());
        $query->bindValue(':price', $product->getPrice());
        $query->bindValue(':description', $product->getDescription());

        $query->execute();
    }
}