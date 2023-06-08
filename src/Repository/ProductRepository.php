<?php

namespace App\Repository;

use App\Entity\Product;
/**
 * Un Repository (ou DAO, ou Composant d'Accès aux Données) est une classe dont l'objectif est de regrouper les
 * interaction avec la base de données pour une entité spécifique. Les repositories sont les seuls endroits de
 * l'application où on aura des requêtes SQL (ou autre si on est pas sur du SQL).
 * Ici, nous sommes dans un ProductRepository qui va s'occuper de faire toutes les requêtes du CRUD pour 
 * récupérer (findAll, findById), créer (persist), supprimer (delete) et modifier (update) les données de la 
 * table product de notre base de données.
 */
class ProductRepository
{

    /**
     * Méthode qui va faire une requête pour récupérer tous les produits de la base de données puis qui va boucler
     * sur les résultat de la requête pour transformer chaque ligne de résultat en instance de la classe Product
     * @return Product[];
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM product");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Product($line["label"], $line["price"], $line["description"], $line["id"]);
        }


        return $list;
    }

    public function findById(int $id):?Product {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM product WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Product($line["label"], $line["price"], $line["description"], $line["id"]);
        }
        return null;

    }

    /**
     * Méthode qui va prendre une instance de Product en argument et va la transformer en requête INSERT INTO pour 
     * la faire persister en base de données
     * Très important d'utiliser des :placeholder dans la requête et des bindValue afin d'éviter les injection SQL 
     * (le fait d'avoir des chaînes de caractères contenant du code qui pourrait être exécuté par SQL à notre insu)
     */
    public function persist(Product $product) {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO product (label,price,description) VALUES (:label,:price,:description)");
        $query->bindValue(':label', $product->getLabel());
        $query->bindValue(':price', $product->getPrice());
        $query->bindValue(':description', $product->getDescription());

        $query->execute();

        $product->setId($connection->lastInsertId());
    }

    /**
     * Méthode qui permet de supprimer un produit de la base de données en se basant sur son id
     */
    public function delete(int $id) {

        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM product WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }
}