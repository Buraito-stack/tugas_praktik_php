<?php

require_once 'Person.php';
require_once 'Book.php';
require_once 'Library.php';

class Librarian extends Person 
{
    private string $employeeID;

    public function __construct(
        string $name, 
        string $employeeID
    ) {
        parent::__construct($name);
        $this->employeeID = $employeeID;
    }

    public function addBook(Book $book, Library $library): void 
    {
        $library->addBook($book);
    }

    public function removeBook(Book $book, Library $library): void 
    {
        $books = $library->listAvailableBooks();

        foreach ($books as $existingBook) {
            if ($existingBook->getISBN() === $book->getISBN()) {
                $library->removeBook($book);
                
                return;
            }
        }
        
        throw new Exception("Book not found in the library.");
    }

    public function getLibrarianInfo(): array 
    {
        return [
            'name'       => $this->name,
            'employeeID' => $this->employeeID,
        ];
    }
}

?>
