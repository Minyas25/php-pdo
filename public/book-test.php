<?php
use App\Entity\Book;
use App\Repository\BookRepository;

require '../vendor/autoload.php';

$repo = new BookRepository();

// $result = $repo->search("the");

// var_dump($result);

var_dump($repo->findAll(2, 2));
// var_dump($repo->findById(1));

// $repo->persist(new Book('test', 2000, 'test'));

// $repo->update(new Book('test', 2000, 'toust', 5));

// $repo->delete(5);