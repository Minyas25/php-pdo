<?php


namespace App\Repository;
use App\Entity\Book;

class BookRepository {

    /**
     * @return Book[]
     */
    public function findAll($page = 1, $pageSize = 10):array {
        $list = [];
        $connection = Database::getConnection();
        $offset = ($page-1) * $pageSize ;
        $query = $connection->prepare("SELECT * FROM book  LIMIT :pageSize OFFSET :page");
        $query->bindValue('pageSize', $pageSize, \PDO::PARAM_INT);
        $query->bindValue('page', $offset, \PDO::PARAM_INT);

        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Book($line["title"], $line["year"], $line["author"], $line["id"]);
        }
        return $list;
    }

    public function findById(int $id):?Book{
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM book WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new Book($line["title"], $line["year"], $line["author"], $line["id"]);
        }
        return null;
    }

    public function persist(Book $book):void {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO book (title,year,author) VALUES (:title,:year,:author)");
        $query->bindValue(':title', $book->getTitle());
        $query->bindValue(':year', $book->getYear());
        $query->bindValue(':author', $book->getAuthor());
        $query->execute();

        $book->setId($connection->lastInsertId());
    }

    public function delete(int $id):void {
        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM book WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(Book $book):void {
        
        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE book SET title=:title, year=:year, author=:author WHERE id=:id");
        $query->bindValue(':title', $book->getTitle());
        $query->bindValue(':year', $book->getYear());
        $query->bindValue(':author', $book->getAuthor());
        $query->bindValue(':id', $book->getId());
        $query->execute();
    }

    /**
     * @return Book[]
     */
    public function search(string $term):array {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM book WHERE title LIKE :term OR author LIKE :term");
        $query->bindValue(":term", "%".$term."%");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Book($line["title"], $line["year"], $line["author"], $line["id"]);
        }
        return $list;
    }
}