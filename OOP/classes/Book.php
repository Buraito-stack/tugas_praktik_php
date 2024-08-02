<?php

class Book 
{
    private string $title;
    private string $author;
    private string $isbn;
    private int $publicationYear;
    private int $availableCopies;

    public function __construct(
        string $title, 
        string $author, 
        string $isbn, 
        int $publicationYear, 
        int $availableCopies
    ) {
        $this->title           = $title;
        $this->author          = $author;
        $this->isbn            = $isbn;
        $this->publicationYear = $publicationYear;
        $this->availableCopies = $availableCopies;
    }

    public function borrowBook() {
        
        if ($this->availableCopies <= 0) {
            throw new Exception("No copies available to borrow.");
        }
        
        $this->availableCopies--;
    }

    public function returnBook() {
        $this->availableCopies++;
    }

    public function getBookInfo() {
        return [
            'title'           => $this->title,
            'author'          => $this->author,
            'isbn'            => $this->isbn,
            'publicationYear' => $this->publicationYear,
            'availableCopies' => $this->availableCopies,
        ];
    }

    public function getTitle() {
        return $this->title;
    }

    public function getISBN() {
        return $this->isbn;
    }
}

