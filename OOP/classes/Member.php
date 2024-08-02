<?php

require_once 'Person.php';
require_once 'Book.php';

class Member extends Person 
{
    private string $memberID;
    private array $borrowedBooks = [];

    public function __construct(string $name, string $memberID) 
    {
        parent::__construct($name);
        $this->memberID = $memberID;
    }

    public function borrowBook(Book $book): void 
    {
        if (in_array($book, $this->borrowedBooks, true)) {
            throw new Exception("Book already borrowed.");
        }
        
        $book->borrowBook();
        $this->borrowedBooks[] = $book;
    }

    public function returnBook(Book $book): void 
    {
        $key = array_search($book, $this->borrowedBooks, true);

        if ($key === false) {
            throw new Exception("Book not borrowed.");
        }

        $book->returnBook();
        unset($this->borrowedBooks[$key]);
        $this->borrowedBooks = array_values($this->borrowedBooks);
    }

    public function getMemberInfo(): array 
    {
        $borrowedBooksInfo = [];

        foreach ($this->borrowedBooks as $book) {
            $borrowedBooksInfo[] = $book->getBookInfo();
        }

        return [
            'name'          => $this->name,
            'memberID'      => $this->memberID,
            'borrowedBooks' => $borrowedBooksInfo,
        ];
    }

    public function getMemberID(): string 
    {
        return $this->memberID;
    }
}

?>
