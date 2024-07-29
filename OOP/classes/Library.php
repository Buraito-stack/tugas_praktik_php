<?php

class Library {
    private $books = []; 
    private $members = [];
    private $librarians = [];

    public function addBook(Book $book) {
        $this->books[] = $book; 
    }

    public function removeBook(Book $book) {
        foreach ($this->books as $key => $existingBook) {
            if ($existingBook->getISBN() === $book->getISBN()) {
                unset($this->books[$key]); // Remove the book
                $this->books = array_values($this->books); // Reindex the array
                return; // Exit after removing the book
            }
        }
        throw new Exception("Book not found in the library.");
    }

    public function listAvailableBooks() {
        return $this->books;
    }

    public function registerMember(Member $member) {
        $this->members[] = $member;
    }

    public function registerLibrarian(Librarian $librarian) {
        $this->librarians[] = $librarian;
    }

    public function findBookByISBN($isbn) {
        foreach ($this->books as $book) {
            if ($book->getISBN() === $isbn) {
                return $book;
            }
        }
        return null; // Return null if book not found
    }

    // Add setters for books if needed
    public function setBooks(array $books) {
        $this->books = $books;
    }
}
?>
