<?php
use App\Entity\Product;
use App\Repository\ProductRepository;

require '../vendor/autoload.php';


$repository = new ProductRepository();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <h1>Add Product</h1>
        <form method="post">
            <label for="label">label</label>
            <input type="text" name="label" id="label" class="form-control" required>
            <label for="price">Price</label>
            <input type="number" step=".01" name="price" id="price" class="form-control">
            <label for="description">description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            <button class="btn btn-primary">Add</button>
        </form>
        <?php

        if (!empty($_POST['label']) && !empty($_POST['price']) && !empty($_POST['description'])) {

            $product = new Product($_POST['label'], $_POST['price'], $_POST['description']);
            $repository->persist($product);
            echo "<p class=\"text-success\">You successfully added a product with id {$product->getId()}</p>";
        }

        ?>
    </div>
</body>

</html>