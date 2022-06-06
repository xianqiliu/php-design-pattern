<?php

class Book
{
    private $bookName;
    private $bookAuthor;

    public function __construct($bookName, $bookAuthor)
    {
        $this->bookName = $bookName;
        $this->bookAuthor = $bookAuthor;
    }
    public function getNameAndAuthor()
    {
        return $this->bookName . ' - ' . $this->bookAuthor;
    }
}

class BookFactory
{
    public static function create($bookName, $bookAuthor)
    {
        return new Book($bookName, $bookAuthor);
    }
}

$book1 = BookFactory::create("Book1", "Author1");
$book2 = BookFactory::create("Book2", "Author2");
$book3 = new Book("Book3", "Author3");

print $book1->getNameAndAuthor() . "\n";
print $book2->getNameAndAuthor() . "\n";
print $book3->getNameAndAuthor() . "\n";