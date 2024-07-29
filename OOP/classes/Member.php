<?php

class Member {
    private $name;
    private $memberID;
    private $borrowedBooks = [];

    public function __construct($name, $memberID) {
        $this->name = $name;
        $this->memberID = $memberID;
    }

    public function borrowBook(Book $book) {
        if (in_array($book, $this->borrowedBooks)) {
            throw new Exception("Book already borrowed.");
        }
        $book->borrowBook();
        $this->borrowedBooks[] = $book;
    }

    public function returnBook(Book $book) {
        $key = array_search($book, $this->borrowedBooks);
        if ($key === false) {
            throw new Exception("Book not borrowed.");
        }
        $book->returnBook();
        unset($this->borrowedBooks[$key]);
    }

    public function getMemberInfo() {
        $borrowedBooksInfo = [];
        foreach ($this->borrowedBooks as $book) {
            $borrowedBooksInfo[] = $book->getBookInfo();
        }
        return [
            'name' => $this->name,
            'memberID' => $this->memberID,
            'borrowedBooks' => $borrowedBooksInfo,
        ];
    }

    public function getName() {
        return $this->name;
    }
}
?>
