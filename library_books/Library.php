<?php
require_once AbstractLibrary::class;
require_once Author::class;

class Library extends AbstractLibrary
{
    public function addAuthor(string $authorName): Author
    {
        $author = new Author($authorName);
        $this->authors[] = $author;
        return $author;
    }

    public function addBookForAuthor($authorName, Book $book)
    {
        // TODO: Implement addBookForAuthor() method.
    }

    public function getBooksForAuthor($authorName)
    {
        // TODO: Implement getBooksForAuthor() method.
    }

    public function search(string $bookName): ?Book
    {
        // TODO: Implement search() method.
    }

    public function print()
    {
        // TODO: Implement print() method.
    }
}