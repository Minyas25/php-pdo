<?php
use App\Repository\ProductRepository;

require '../vendor/autoload.php';


$repository = new ProductRepository();

$products = $repository->findAll();


/**
 * Le mélange HTML/PHP c'est un truc un peu vieux et pas top qui ne se fait plus trop à part dans du wordpress.
 * Maintenant on utilise plutôt soit des moteurs de template comme Twig, soit des frameworks front comme Angular/React/Vue.js
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <h1>Product List</h1>
        <div class="row g-3">
            <?php foreach ($products as $item) { ?>
                <div class="col-md-4">
                    <div class="card">

                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $item->getLabel() ?>
                            </h3>
                            <p class="card-text">
                                <?php echo $item->getDescription() ?>
                            </p>
                            <p class="card-text text-end">
                                <?= $item->getPrice() ?>€
                            </p>
                        </div>
                    </div>
                </div>

                <?php

            }

            ?>
        </div>
    </div>
</body>

</html>