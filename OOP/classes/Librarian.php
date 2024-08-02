<?php
require_once 'Person.php';

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

    public function addBook(Book $book, Library $library) 
    {
        $library->addBook($book);
    }

    public function removeBook(Book $book, Library $library) 
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

    public function getLibrarianInfo() 
    {
        return [
            'name' => $this->name,
            'employeeID' => $this->employeeID,
        ];
    }
}

