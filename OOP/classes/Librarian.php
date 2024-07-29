<?php

class Librarian {
    private $name;
    private $employeeID;

    public function __construct($name, $employeeID) {
        $this->name = $name;
        $this->employeeID = $employeeID;
    }

    public function getName() {
        return $this->name;
    }

    public function addBook(Book $book, Library $library) {
        $library->addBook($book);
    }

    public function removeBook(Book $book, Library $library) {
        $books = $library->listAvailableBooks();
        foreach ($books as $existingBook) {
            if ($existingBook->getISBN() === $book->getISBN()) {

                // If the book is found, remove it
                $library->removeBook($book);
                
                return; // Exit after removing the book
            }
        }

        // If the book was not found, throw an exception
        throw new Exception("Book not found in the library.");
    }

    public function getLibrarianInfo() {
        return [
            'name' => $this->name,
            'employeeID' => $this->employeeID,
        ];
    }
}
?>
