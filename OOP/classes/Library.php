<?php

require_once 'Book.php';
require_once 'Member.php';
require_once 'Librarian.php';

class Library {
    private array $books = []; 
    private array $members = [];
    private array $librarians = [];

    public function __construct(array $books = [], array $members = [], array $librarians = []) 
    {
        $this->books = $books;
        $this->members = $members;
        $this->librarians = $librarians;
    }

    public function addBook(Book $book): void 
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $book): void 
    {
        foreach ($this->books as $key => $existingBook) {
            if ($existingBook->getISBN() === $book->getISBN()) {
                unset($this->books[$key]);
                $this->books = array_values($this->books);

                return;
            }
        }

        throw new Exception("Book not found in the library.");
    }

    public function registerMember(Member $member): void 
    {
        $this->members[] = $member;
    }

    public function registerLibrarian(Librarian $librarian): void 
    {
        $this->librarians[] = $librarian;
    }

    public function findBookByISBN(string $isbn): ?Book 
    {
        foreach ($this->books as $book) {
            if ($book->getISBN() === $isbn) {
                return $book;
            }
        }

        return null;
    }

    public function listAvailableBooks(): array 
    {
        return $this->books;
    }

    public function listMembers(): array 
    {
        return $this->members;
    }

    public function listLibrarians(): array 
    {
        return $this->librarians;
    }
}

?>
