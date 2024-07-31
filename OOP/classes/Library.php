<?php
require_once 'Book.php';
require_once 'Member.php';
require_once 'Librarian.php';

class Library {
    private $books = []; 
    private $members = [];
    private $librarians = [];

    // Konstruktor
    public function __construct(array $books = [], array $members = [], array $librarians = []) {
        $this->books = $books;
        $this->members = $members;
        $this->librarians = $librarians;
    }

    // Menambahkan buku ke perpustakaan
    public function addBook(Book $book) {
        $this->books[] = $book; 
    }

    // Menghapus buku dari perpustakaan
    public function removeBook(Book $book) {
        foreach ($this->books as $key => $existingBook) {
            if ($existingBook->getISBN() === $book->getISBN()) {
                unset($this->books[$key]); // Hapus buku
                $this->books = array_values($this->books); // Reindex array
                return; // Keluar setelah menghapus buku
            }
        }

        throw new Exception("Book not found in the library.");
    }

    // Mendaftar anggota
    public function registerMember(Member $member) {
        $this->members[] = $member;
    }

    // Mendaftar pustakawan
    public function registerLibrarian(Librarian $librarian) {
        $this->librarians[] = $librarian;
    }

    // Mencari buku berdasarkan ISBN
    public function findBookByISBN($isbn) {
        foreach ($this->books as $book) {
            if ($book->getISBN() === $isbn) {
                return $book;
            }
        }
        return null; // Kembalikan null jika buku tidak ditemukan
    }

    // Menampilkan daftar buku yang tersedia
    public function listAvailableBooks() {
        return $this->books;
    }

    // Menampilkan daftar anggota
    public function listMembers() {
        return $this->members;
    }

    // Menampilkan daftar pustakawan
    public function listLibrarians() {
        return $this->librarians;
    }
}
