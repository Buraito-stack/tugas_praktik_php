<?php

require_once 'classes/Book.php';
require_once 'classes/Member.php';
require_once 'classes/Librarian.php';
require_once 'classes/Library.php';

// Create book objects with updated titles
$book1 = new Book("Belajar PHP dalam 60 Menit", "Timedoor Indonesia", "1234567890", 2020, 2);
$book2 = new Book("Belajar Laravel dalam 120 Menit", "Timedoor Idn.", "0987654321", 2023, 1);

// Create library
$library = new Library();

// Create members
$member1 = new Member("Arya", "M001");
$member2 = new Member("Restu", "M002");

// Create librarian
$librarian1 = new Librarian("Bryant", "L001");

// Register members and librarian
$library->registerMember($member1);
$library->registerMember($member2);

$library->registerLibrarian($librarian1);

// Add books to the library
$librarian1->addBook($book1, $library);
$librarian1->addBook($book2, $library);

// Function to display book info
function displayBookInfo($book) {
    $info = $book->getBookInfo();
    echo "Title: " . $info['title'] . "<br>";
    echo "Author: " . $info['author'] . "<br>";
    echo "ISBN: " . $info['isbn'] . "<br>";
    echo "Publication Year: " . $info['publicationYear'] . "<br>";
    echo "Available Copies: " . $info['availableCopies'] . "<br>";
    echo str_repeat("-", 30) . "<br>";
}

// Function to display member info
function displayMemberInfo($member) {
    $info = $member->getMemberInfo();
    echo "Name: " . $info['name'] . "<br>";
    echo "Member ID: " . $info['memberID'] . "<br>";
    echo "Borrowed Books: <br>";
    foreach ($info['borrowedBooks'] as $book) {
        displayBookInfo($book);
    }
}

// Function to display librarian info
function displayLibrarianInfo($librarian) {
    $info = $librarian->getLibrarianInfo();
    echo "Name: " . $info['name'] . "<br>";
    echo "Employee ID: " . $info['employeeID'] . "<br>";
    echo str_repeat("-", 30) . "<br>";
}

echo "<h4>MEMBER</h4>";
displayMemberInfo($member1);
echo str_repeat("-", 30) . "<br>";
displayMemberInfo($member2);
echo str_repeat("-", 30) . "<br>";

echo "<h4>Librarian</h4>";
displayLibrarianInfo($librarian1);
echo str_repeat("-", 30) . "<br>";

// Test Case 1: Borrowing and Returning Books
echo "Test Case 1: Borrowing and Returning Books<br>";
echo str_repeat("-", 30) . "<br>";
try {
    // Arya borrows "Belajar PHP dalam 60 Menit"
    $member1->borrowBook($book1);
    echo $member1->getName() . " borrowed '" . $book1->getTitle() . "'.<br>";
    echo str_repeat("-", 30) . "<br>";

    // Display book info after borrowing
    echo "Book info after borrowing:<br>";
    echo str_repeat("-", 30) . "<br>";
    displayBookInfo($library->findBookByISBN("1234567890"));

    // Arya returns "Belajar PHP dalam 60 Menit"
    $member1->returnBook($book1);
    echo $member1->getName() . " returned '" . $book1->getTitle() . "'.<br>";
    echo str_repeat("-", 30) . "<br>";

    // Display book info after returning
    echo "Book info after returning:<br>";
    echo str_repeat("-", 30) . "<br>";
    displayBookInfo($library->findBookByISBN("1234567890"));

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

// Test Case 2: Adding and Removing Books
echo "Test Case 2: Adding and Removing Books<br>";
echo str_repeat("-", 30) . "<br>";
try {
    // Display all available books
    echo "Available books in the library:<br>";
    echo str_repeat("-", 30) . "<br>";
    foreach ($library->listAvailableBooks() as $book) {
        displayBookInfo($book);
    }

    // Librarian removes "Belajar PHP dalam 60 Menit"
    $librarian1->removeBook($book1, $library);
    echo $librarian1->getName() . " removed '" . $book1->getTitle() . "'.<br>";
    echo str_repeat("-", 30) . "<br>";

    // Display all available books after removal
    echo "Available books in the library after removal:<br>";
    echo str_repeat("-", 30) . "<br>";
    foreach ($library->listAvailableBooks() as $book) {
        displayBookInfo($book);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

// Test Case 3: Borrowing and Returning Non-Existent Books
echo "Test Case 3: Borrowing and Returning Non-Existent Books<br>";
echo str_repeat("-", 30) . "<br>";
try {
    // Restu attempts to borrow a non-existent book
    $nonExistentBook = new Book("Non-Existent Book", "Unknown Author", "0000000000", 2024, 0);
    $member2->borrowBook($nonExistentBook);
} catch (Exception $e) {
    echo "Error (Borrowing): " . $e->getMessage() . "<br>";
}

try {
    // Restu attempts to return a non-existent book
    $nonExistentBook = new Book("Non-Existent Book", "Unknown Author", "0000000000", 2024, 0);
    $member2->returnBook($nonExistentBook);
} catch (Exception $e) {
    echo "Error (Returning): " . $e->getMessage() . "<br>";
}

// Test Case 4: Removing a Non-Existent Book
echo str_repeat("-", 30) . "<br>";
echo "Test Case 4: Removing a Non-Existent Book<br>";
echo str_repeat("-", 30) . "<br>";
try {
    // Create a non-existent book
    $nonExistentBook = new Book("Another Non-Existent Book", "Unknown Author", "1111111111", 2025, 0);
    $librarian1->removeBook($nonExistentBook, $library);
} catch (Exception $e) {
    echo "Error (Removing): " . $e->getMessage() . "<br>";
}

// Test Case 5: Borrowing a Book Already Borrowed by Another Member
echo str_repeat("-", 30) . "<br>";
echo "Test Case 5: Borrowing a Book Already Borrowed by Another Member<br>";
echo str_repeat("-", 30) . "<br>";
try {
    // Arya borrows "Belajar Laravel dalam 120 Menit"
    $member1->borrowBook($book2);
    echo $member1->getName() . " borrowed '" . $book2->getTitle() . "'.<br>";

    // Restu attempts to borrow "Belajar Laravel dalam 120 Menit" already borrowed by Arya
    $member2->borrowBook($book2);
} catch (Exception $e) {
    echo "Error (Borrowing): " . $e->getMessage() . "<br>";
}

// Test Case 6: Adding a Book That Already Exists
echo str_repeat("-", 30) . "<br>";
echo "Test Case 6: Adding a Book That Already Exists<br>";
echo str_repeat("-", 30) . "<br>";
try {
    // Librarian attempts to add an existing book
    $librarian1->addBook($book1, $library);
    echo $librarian1->getName() . " attempted to add '" . $book1->getTitle() . "' again.<br>";
} catch (Exception $e) {
    echo "Error (Adding): " . $e->getMessage() . "<br>";
}
