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
}